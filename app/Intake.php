<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Intake extends Model
{

    protected $table='intakes';
    protected $fillable = [
        'logo',
        'name',
        'address',
        'phone',
        'email',
        'date_of_birth',
        'emergency',
        'contact',
        'help',
        
    ];

    
}
