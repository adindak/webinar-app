<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Question extends Model
{
    protected $table = 'question_webinar';

    protected $fillable = [
        'webinar_id',
        'question',
        'user_id'
    ];

    public function webinar() {
        return $this->belongsTo(Webinar::class, 'webinar_id', 'id');
    }

    public function user() {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }
}
