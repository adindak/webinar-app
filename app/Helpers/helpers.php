<?php

use App\Models\Likes;
use App\Models\Question;

function getQuestion($id = null) {
    $question = Question::with(['user', 'webinar'])->where('webinar_id', $id)
        ->get()
        ->map(function($val) {
            $val->like = Likes::where('question_id', $val->id)
                ->where('user_id', auth()->user()->id)
                ->where('is_like', true)
                ->exists();
            return $val;
        });

    return $question;
}
