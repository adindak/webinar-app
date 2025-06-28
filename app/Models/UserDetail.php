<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class UserDetail extends Model
{
    protected $table = 'user_detail';

    protected $guarded = [
        'id'
    ];

    public function user() {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }
}
