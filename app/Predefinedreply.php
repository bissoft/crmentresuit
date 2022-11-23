<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Predefinedreply extends Model
{
    //

    protected $fillable = [
        'question',
        'answer'
    ];
}
