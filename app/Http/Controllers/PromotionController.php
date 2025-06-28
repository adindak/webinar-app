<?php

namespace App\Http\Controllers;

use App\Models\Webinar;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PromotionController extends Controller
{
    /**
     * Display the promotional landing page.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // Ambil webinar yang bersifat publik (hapus filter tanggal untuk debug)
        $webinars = Webinar::where('access', 'public')
                          ->orderBy('start_date', 'asc')
                          ->take(6) // Ambil 6 webinar terdekat
                          ->get();
        
        // Debug: cek jumlah webinar yang ditemukan
        \Log::info('Total webinar found: ' . $webinars->count());
        \Log::info('Webinar data: ', $webinars->toArray());
        
        // Statistics untuk hero section
        $totalWebinar = Webinar::where('access', 'public')->count();
        
        // Total participants (bisa disesuaikan dengan model relationship)
        $totalParticipants = DB::table('participant')
                               ->join('master_webinar', 'participant.webinar_id', '=', 'master_webinar.id')
                               ->where('master_webinar.access', 'public')
                               ->distinct('user_id')
                               ->count();
        
        // Jika tidak ada data, berikan default values
        if ($totalParticipants == 0) {
            $totalParticipants = 1250; // Default untuk demo
        }
        
        // Pastikan nama view sesuai dengan file blade
        return view('promotion.promotion', compact('webinars', 'totalWebinar', 'totalParticipants'));
    }

    /**
     * Show webinar details for public access
     *
     * @param  \App\Models\Webinar  $webinar
     * @return \Illuminate\Http\Response
     */
    public function showWebinar(Webinar $webinar)
    {
        // Pastikan webinar bersifat publik
        if ($webinar->access !== 'public') {
            abort(404);
        }

        return view('webinar-detail', compact('webinar'));
    }

    /**
     * Handle webinar registration (redirect to login if not authenticated)
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Webinar  $webinar
     * @return \Illuminate\Http\Response
     */
    public function registerWebinar(Request $request, Webinar $webinar)
    {
        // Jika user belum login, redirect ke login
        if (!auth()->check()) {
            return redirect()->route('login')->with('message', 'Silakan login terlebih dahulu untuk mendaftar webinar.');
        }

        // Pastikan webinar bersifat publik
        if ($webinar->access !== 'public') {
            abort(404);
        }

        // Check if user already registered
        $existingRegistration = DB::table('participant')
                                  ->where('webinar_id', $webinar->id)
                                  ->where('user_id', auth()->id())
                                  ->first();

        if ($existingRegistration) {
            return back()->with('error', 'Anda sudah terdaftar untuk webinar ini.');
        }

        // Check quota
        $currentParticipants = DB::table('participant')
                                 ->where('webinar_id', $webinar->id)
                                 ->count();

        if ($webinar->total_participants && $currentParticipants >= $webinar->total_participants) {
            return back()->with('error', 'Maaf, kuota webinar sudah penuh.');
        }

        // Register user to webinar
        DB::table('participant')->insert([
            'webinar_id' => $webinar->id,
            'user_id' => auth()->id(),
            'is_participant' => false, // Will be marked true when attending
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        return back()->with('success', 'Berhasil mendaftar webinar! Anda akan menerima informasi lebih lanjut melalui email.');
    }

    /**
     * Get popular webinar for homepage
     *
     * @return \Illuminate\Http\Response
     */
    public function getPopularWebinars()
    {
        $popularWebinars = Webinar::where('access', 'public')
                                 ->withCount('participants')
                                 ->orderBy('participants_count', 'desc')
                                 ->take(3)
                                 ->get();

        return response()->json($popularWebinars);
    }

    /**
     * Debug function to check webinar data
     *
     * @return \Illuminate\Http\Response
     */
    public function debugWebinars()
    {
        $allWebinars = Webinar::all();
        $publicWebinars = Webinar::where('access', 'public')->get();
        
        return response()->json([
            'total_webinars' => $allWebinars->count(),
            'public_webinars' => $publicWebinars->count(),
            'all_webinars' => $allWebinars->toArray(),
            'public_webinars_data' => $publicWebinars->toArray(),
            'table_name' => (new Webinar())->getTable(),
        ]);
    }
}