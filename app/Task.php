<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    //
    protected $fillable = [
        'user_id',
        'customer_id',
        'project_id',
        'name',
        'start_date',
        'end_date',
        'status',
        'description',
    ];
}
