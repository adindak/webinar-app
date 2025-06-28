<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class RegisterWebinar extends Model
{
    protected $table = 'registration_webinar';

    protected $fillable = [
        'webinar_id',
        'user_id',
        'status',
        'is_paid'
    ];

    public function webinar() {
        return $this->belongsTo(Webinar::class, 'webinar_id', 'id');
    }

    public function user() {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }
}
