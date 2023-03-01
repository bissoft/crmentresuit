<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Lead extends Model
{
    //
    protected $fillable = [
        'name',
        'source_id',
        'company_name',
        'position',
        'status_id',
        'estimate_budget',
        'member_id',
        'phone',
        'website',
        'country',
        'description',
        'gender',
        'email',
        'land_line',
        'contact',
        'email',
        'is_customer'
    ];

    public function source()
    {
        return $this->belongsTo(LeadSource::class,'source_id');
    }

    public function status()
    {
        return $this->belongsTo(LeadStatus::class,'status_id');
    }

    public function member()
    {
        return $this->belongsTo(Customer::class,'member_id');
    }
}
