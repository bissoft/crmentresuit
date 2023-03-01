<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Docments extends Model
{
    protected $fillable = [
        'user_id',
        'customer_id',
        'document_type',
        'expiry_date',
        'document_number',
        'file'
    ];

    public function customer()
    {
        return $this->belongsTo(Customer::class,'customer_id');
    }
}
