<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Contract extends Model
{
    //
    protected $fillable = [
        'name',
        'contract_type',
        'customer_id',
        'contract_value',
        'start_date',
        'end_date',
        'description',
        'contract_docs',
        'email'
    ];

    public function customer()
    {
        return $this->belongsTo(User::class,'customer_id');
    }

    public function contractType()
    {
        return $this->belongsTo(ContractType::class,'contract_type');
    }
}
