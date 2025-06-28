<?php

namespace App\Http\Controllers;

use App\Models\Likes;
use App\Models\ParticipantsWebinar;
use App\Models\Payment;
use App\Models\Question;
use App\Models\RegisterWebinar;
use App\Models\Webinar;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\View\View;

class EventWebinarController extends Controller
{
    public function index(): View
    {
        $webinars = Webinar::select('id','name', 'description', 'start_date', 'start_time', 'place_location', 'price', 'total_participants')
            ->get()
            ->map(function ($webinar) {
                $webinar->registered = RegisterWebinar::where('webinar_id', $webinar->id)->where('user_id', auth()->user()->id)->exists();
                return $webinar;
            });

        return view('dashboard.events.index')->with([
            'webinars' => $webinars
        ]);
    }

    public function show(string $id): View {
        $webinar = Webinar::with(['participants', 'participants.user', 'participants.webinar', 'participants.user.userDetail'])->find($id);

        $webinar->registered = RegisterWebinar::where('webinar_id', $id)->where('user_id', auth()->user()->id)->exists();

        $showLink = false;
        if((now()->format('Y-m-d H:i:s') > date('Y-m-d H:i:s', strtotime($webinar->start_date . ' ' . $webinar->start_time))) && $webinar->registered) {
            $showLink = true;
        }

        return view('dashboard.events.detail')->with([
            'webinar' => $webinar,
            'showLink' => $showLink
        ]);
    }

    public function register(string $id): View {
        $webinar = Webinar::find($id);
        return view('dashboard.events.register')->with([
            'webinar' => $webinar
        ]);
    }

    public function payment(string $id, Request $request): RedirectResponse {
        $webinar = Webinar::find($id);

        DB::beginTransaction();
        try {
            Payment::create([
                'webinar_id' => $webinar->id,
                'user_id' => auth()->user()->id,
                'payment_method' => $request->payment,
                'amount' => $webinar->price,
                'status' => 'paid',
                'currency' => 'IDR'
            ]);

            RegisterWebinar::create([
                'webinar_id' => $webinar->id,
                'user_id' => auth()->user()->id,
                'payment_method' => $request->payment,
                'status' => auth()->user()->userDetail->status,
                'is_paid' => true
            ]);

            ParticipantsWebinar::create([
                'webinar_id' => $webinar->id,
                'user_id' => auth()->user()->id,
                'status' => auth()->user()->userDetail->status,
                'is_participant' => false,
                'link_certificate' => null
            ]);
        } catch (\Exception $e) {

            DB::rollBack();
            return redirect()->back()->with([
                'status' => 'error',
                'message' => 'Payment failed'
            ]);
        }
        DB::commit();

        return redirect()->route('events.show', ['id' => $webinar->id]);
    }

    public function history(): View {
        $webinars = Webinar::with(['participants', 'participants.user', 'participants.webinar', 'participants.user.userDetail'])
            ->whereHas('participants', function ($query) {
                $query->where('user_id', auth()->user()->id)
                    ->where('is_participant', true);
            })
            ->get();

        return view('dashboard.histories.index')->with([
            'webinars' => $webinars
        ]);
    }

    public function showHistory(string $id): View {
        $webinars = Webinar::with(['participants', 'participants.user', 'participants.webinar', 'participants.user.userDetail'])
            ->whereHas('participants', function ($query) {
                $query->where('user_id', auth()->user()->id)
                    ->where('is_participant', true);
            })
            ->first();
        return view('dashboard.histories.detail')->with([
            'webinar' => $webinars
        ]);
    }

    public function addQuestion(Request $request): RedirectResponse {
        $question = new Question();
        $question->fill([
            'webinar_id' => $request->route('id'),
            'question' => $request->question,
            'user_id' => auth()->user()->id
        ]);
        $question->save();

        return redirect()->back()->with([
            'message' => 'Berhasil menambahkan pertanyaan'
        ]);
    }

    public function setLike(Request $request): JsonResponse {
        $likeQuestion = Likes::where('user_id', auth()->user()->id)->where('question_id', $request->input('question_id'))->first();
        if ($likeQuestion) {
            $likeQuestion->delete();
        } else {
            Likes::create([
                'question_id' => $request->input('question_id'),
                'user_id' => auth()->user()->id,
                'is_like' => true
            ]);
        }

        return response()->json([
            'status' => 'success',
            'message' => 'Berhasil menambahkan like'
        ]);
    }
}
