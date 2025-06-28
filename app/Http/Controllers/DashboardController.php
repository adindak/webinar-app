<?php

namespace App\Http\Controllers;

use App\Models\Webinar;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
    /**
     * Display the dashboard.
     */
    public function index()
    {
        $user = Auth::user();
        
        if ($user->hasRole('admin')) {
            return $this->adminDashboard();
        } else {
            return $this->userDashboard();
        }
    }

    /**
     * Admin Dashboard Data
     */
    private function adminDashboard()
    {
        // Get all webinars for admin
        $webinars = Webinar::with(['participants'])
                          ->orderBy('start_date', 'desc')
                          ->take(6)
                          ->get();

        // Calculate admin statistics
        $totalWebinar = Webinar::count();
        
        $totalParticipants = DB::table('participant')
                              ->join('master_webinar', 'participant.webinar_id', '=', 'master_webinar.id')
                              ->distinct('user_id')
                              ->count();
        
        // Calculate total revenue from paid webinars
        $totalRevenue = DB::table('participant')
                         ->join('master_webinar', 'participant.webinar_id', '=', 'master_webinar.id')
                         ->where('master_webinar.price', '>', 0)
                         ->sum('master_webinar.price');
        
        // Calculate completion rate (attended vs registered)
        $totalRegistered = DB::table('participant')->count();
        $totalAttended = DB::table('participant')->where('is_participant', true)->count();
        $completionRate = $totalRegistered > 0 ? round(($totalAttended / $totalRegistered) * 100) : 0;

        // Recent activities for admin
        $recentActivities = $this->getAdminActivities();

        return view('dashboard', compact(
            'webinars',
            'totalWebinar', 
            'totalParticipants', 
            'totalRevenue', 
            'completionRate',
            'recentActivities'
        ));
    }

    /**
     * User Dashboard Data
     */
    private function userDashboard()
    {
        $userId = Auth::id();
        
        // Get webinars user has participated in
        $userWebinars = Webinar::whereHas('participants', function($query) use ($userId) {
                                 $query->where('user_id', $userId);
                             })
                             ->orderBy('start_date', 'desc')
                             ->take(6)
                             ->get();

        // Get upcoming webinars for user
        $upcomingWebinars = Webinar::where('access', 'public')
                                  ->where('start_date', '>=', now()->format('Y-m-d'))
                                  ->orderBy('start_date', 'asc')
                                  ->take(3)
                                  ->get();

        // Calculate user statistics
        $userStats = [
            'totalWebinar' => Webinar::whereHas('participants', function($query) use ($userId) {
                $query->where('user_id', $userId);
            })->count(),
            
            'totalParticipants' => DB::table('participant')
                                    ->join('master_webinar', 'participant.webinar_id', '=', 'master_webinar.id')
                                    ->whereExists(function($query) use ($userId) {
                                        $query->select(DB::raw(1))
                                              ->from('participant as p2')
                                              ->whereColumn('p2.webinar_id', 'participant.webinar_id')
                                              ->where('p2.user_id', $userId);
                                    })
                                    ->distinct('user_id')
                                    ->count(),
            
            'totalRevenue' => DB::table('participant')
                               ->join('master_webinar', 'participant.webinar_id', '=', 'master_webinar.id')
                               ->whereExists(function($query) use ($userId) {
                                   $query->select(DB::raw(1))
                                         ->from('participant as p2')
                                         ->whereColumn('p2.webinar_id', 'participant.webinar_id')
                                         ->where('p2.user_id', $userId);
                               })
                               ->where('master_webinar.price', '>', 0)
                               ->sum('master_webinar.price'),
            
            'completionRate' => $this->getUserCompletionRate($userId)
        ];

        // Recent activities for user
        $recentActivities = $this->getUserActivities($userId);

        return view('dashboard', compact(
            'userWebinars',
            'upcomingWebinars', 
            'userStats',
            'recentActivities'
        ));
    }

    /**
     * Get admin recent activities
     */
    private function getAdminActivities()
    {
        $activities = [];

        // Get recent registrations
        $recentRegistrations = DB::table('participant')
            ->join('users', 'participant.user_id', '=', 'users.id')
            ->join('master_webinar', 'participant.webinar_id', '=', 'master_webinar.id')
            ->select('users.fullname', 'master_webinar.name as webinar_name', 'participant.created_at')
            ->orderBy('participant.created_at', 'desc')
            ->take(3)
            ->get();

        foreach ($recentRegistrations as $registration) {
            $activities[] = [
                'type' => 'registration',
                'icon' => 'user-plus',
                'color' => 'blue',
                'title' => 'Peserta baru bergabung',
                'description' => $registration->fullname . ' mendaftar webinar "' . $registration->webinar_name . '"',
                'time' => $this->timeAgo($registration->created_at)
            ];
        }

        // Get recent completed webinars
        $completedWebinars = Webinar::where('start_date', '<', now()->format('Y-m-d'))
            ->orderBy('start_date', 'desc')
            ->take(2)
            ->get();

        foreach ($completedWebinars as $webinar) {
            $attendanceRate = $this->getWebinarAttendanceRate($webinar->id);
            $activities[] = [
                'type' => 'completion',
                'icon' => 'check-circle',
                'color' => 'green',
                'title' => 'Webinar selesai',
                'description' => '"' . $webinar->name . '" telah selesai dengan ' . $attendanceRate . '% kehadiran',
                'time' => $this->timeAgo($webinar->start_date . ' ' . $webinar->start_time)
            ];
        }

        return collect($activities)->sortByDesc('time')->take(5)->values();
    }

    /**
     * Get user recent activities
     */
    private function getUserActivities($userId)
    {
        $activities = [];

        // Get user's recent webinar registrations
        $userRegistrations = DB::table('participant')
            ->join('master_webinar', 'participant.webinar_id', '=', 'master_webinar.id')
            ->where('participant.user_id', $userId)
            ->select('master_webinar.name as webinar_name', 'participant.created_at')
            ->orderBy('participant.created_at', 'desc')
            ->take(3)
            ->get();

        foreach ($userRegistrations as $registration) {
            $activities[] = [
                'type' => 'registration',
                'icon' => 'calendar-plus',
                'color' => 'blue',
                'title' => 'Mendaftar webinar baru',
                'description' => 'Anda mendaftar webinar "' . $registration->webinar_name . '"',
                'time' => $this->timeAgo($registration->created_at)
            ];
        }

        return collect($activities)->take(3)->values();
    }

    /**
     * Calculate user completion rate
     */
    private function getUserCompletionRate($userId)
    {
        $totalRegistered = DB::table('participant')->where('user_id', $userId)->count();
        $totalAttended = DB::table('participant')
                          ->where('user_id', $userId)
                          ->where('is_participant', true)
                          ->count();
        
        return $totalRegistered > 0 ? round(($totalAttended / $totalRegistered) * 100) : 0;
    }

    /**
     * Get webinar attendance rate
     */
    private function getWebinarAttendanceRate($webinarId)
    {
        $totalRegistered = DB::table('participant')->where('webinar_id', $webinarId)->count();
        $totalAttended = DB::table('participant')
                          ->where('webinar_id', $webinarId)
                          ->where('is_participant', true)
                          ->count();
        
        return $totalRegistered > 0 ? round(($totalAttended / $totalRegistered) * 100) : 0;
    }

    /**
     * Calculate time ago
     */
    private function timeAgo($datetime)
    {
        $time = time() - strtotime($datetime);
        
        if ($time < 60) return 'Baru saja';
        if ($time < 3600) return floor($time/60) . ' menit yang lalu';
        if ($time < 86400) return floor($time/3600) . ' jam yang lalu';
        if ($time < 2592000) return floor($time/86400) . ' hari yang lalu';
        
        return date('d M Y', strtotime($datetime));
    }
}