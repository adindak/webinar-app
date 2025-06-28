<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{
    protected $table = 'payment';

    protected $fillable = [
        'user_id',
        'webinar_id',
        'amount',
        'currency',
        'payment_method',
        'status',
        'payment_link',
        'payment_proof'
    ];
}
