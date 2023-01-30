<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Emails extends Model
{
    protected $fillable = [
        'name',
        'email',
        'via',
        'user_id',
        'is_sent'
    ];
}
