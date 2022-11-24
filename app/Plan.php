<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Plan extends Model
{
    protected $fillable = [
        'name',
        'price',
        'type',
        'stripe_plan_id'
    ];

    public function attributes()
    {
        return $this->hasMany(PlanAttribute::class);
    }
}
