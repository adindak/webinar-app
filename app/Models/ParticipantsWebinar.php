<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ParticipantsWebinar extends Model
{
    protected $table = 'participant';
    protected $fillable = [
        'webinar_id',
        'user_id',
        'status',
        'is_participant',
        'link_certificate',
    ];

    public function webinar() {
        return $this->belongsTo(Webinar::class, 'webinar_id', 'id');
    }

    public function user() {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }
}
