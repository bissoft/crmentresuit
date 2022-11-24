<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PlanAttribute extends Model
{
    //

    protected $fillable = [
        'name',
        'plan_id',
        'included'
    ];

    public function plan()
    {
        return $this->belongsTo(Plan::class);
    }
}
