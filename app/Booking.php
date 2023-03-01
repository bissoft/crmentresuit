<?php

namespace App;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Booking extends Model
{
    protected $fillable = [
        'user_id',
        'title',
        'from_date',
        'customer_id',
        'vender_id',
        'meeting_link',
        'invite_email',
        'to_date',
        'email_addresses',
        'from',
        'to'
    ];
}
