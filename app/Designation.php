<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Designation extends Model
{
    protected $fillable = [
        'name',
        'department_id',
        'description'
    ];

    public function department()
    {
        return $this->belongsTo(Department::class,'department_id');
    }
}
