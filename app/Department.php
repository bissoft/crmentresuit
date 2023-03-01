<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Department extends Model
{
    //

    protected $fillable = [
        'name',
        'head_id',
        'email'
    ];

    public function head()
    {
        return $this->belongsTo(Customer::class,'head_id');
    }
}
