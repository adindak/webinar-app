<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Likes extends Model
{
    protected $table = 'like_questions';

    protected $fillable = [
        'question_id',
        'user_id',
        'is_like'
    ];
}
