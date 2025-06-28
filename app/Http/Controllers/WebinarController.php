<?php

namespace App\Http\Controllers;

use App\Models\ParticipantsWebinar;
use App\Models\Webinar;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;
use Illuminate\View\View;

class WebinarController extends Controller
{
    public function index(): View {
        // $webinar = Webinar::select('id','name', 'description', 'start_date', 'start_time', 'place_location', 'price', 'total_participants')->get();
        $webinars = Webinar::paginate(10);
        // dd($webinars);

        return view('dashboard.webinar.index')->with([
            'webinars' => $webinars
        ]);
    }

    public function create(): View {
        return view('dashboard.webinar.create');
    }

    public function store(Request $request): RedirectResponse {
        $validation = Validator::make($request->all(), [
            'name' => 'required',
            'description' => 'string',
            'start_date' => 'date',
            'start_time' => 'date_format:H:i',
            'place_location' => 'required|string',
            'price' => 'numeric',
            'total_participants' => 'numeric',
            'access' => 'string|in:public,private',
        ]);

        if ($validation->fails()) {
            return redirect()->route('webinar.create')
                ->withErrors($validation)
                ->withInput();
        }

        Webinar::create([
            'name' => request('name'),
            'description' => request('description'),
            'start_date' => request('start_date'),
            'start_time' => request('start_time'),
            'place_location' => request('place_location'),
            'price' => request('price'),
            'total_participants' => request('total_participants'),
            'access' => request('access'),
            'published' => true,
        ]);

        return redirect()->route('webinar.index')->with([
            'status' => 'success',
            'message' => 'Webinar berhasil dibuat'
        ]);
    }

    public function absent(int $id): View {
        $webinar = Webinar::with(['participants', 'participants.user', 'participants.webinar', 'participants.user.userDetail'])->find($id);
        $participants = $webinar->participants;
        return view('dashboard.webinar.absent')->with([
            'webinar' => $webinar,
            'participants' => $participants
        ]);
    }

    public function absentStore(Request $request): RedirectResponse {
        $webinar = Webinar::find($request->webinar_id);

        if (!$webinar) {
            return redirect()->route('webinar.index')->with([
                'status' => 'error',
                'message' => 'Webinar tidak ditemukan'
            ]);
        }

        $participants = ParticipantsWebinar::where('webinar_id', $request->webinar_id)->where('user_id', $request->user_id)->first();

        if (!$participants) {
            return redirect()->route('webinar.index')->with([
                'status' => 'error',
                'message' => 'Peserta tidak ditemukan'
            ]);
        }

        $participants->is_participant = true;
        $participants->save();

        return redirect()->route('webinar.index')->with([
            'status' => 'success',
            'message' => 'Peserta berhasil absent'
        ]);
    }

    public function updateLink(int $id, Request $request): RedirectResponse {
        $webinar = Webinar::find($id);

        $validation = Validator::make($request->all(), [
            'link' => 'required|url',
        ]);

        if ($validation->fails()) {
            return redirect()->route('webinar.index')
                ->withErrors($validation)
                ->withInput();
        }

        if (!$webinar) {
            return redirect()->route('webinar.index')->with([
                'status' => 'error',
                'message' => 'Webinar tidak ditemukan'
            ]);
        }

        $webinar->link = $request->link;
        $webinar->save();

        return redirect()->route('webinar.index')->with([
            'status' => 'success',
            'message' => 'Link berhasil diupdate'
        ]);
    }

    public function getUrl ($id): JsonResponse {
        $webinar = Webinar::find($id);
        return response()->json([
            'status' => 'success',
            'data' => [
                'link' => $webinar->link
            ]
        ]);
    }
}
