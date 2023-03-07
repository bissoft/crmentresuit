<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Campaign extends Model
{
    protected $table = 'campaigns';
    protected $fillable =[
        'name',
    ];
	 public function schedule()
    {
        return $this->hasOne(Schedule::class);
    }
	 public function sendemailstatus()
    {
        return $this->hasMany(Sendemailstatus::class);
    }
}
