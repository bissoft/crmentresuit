<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Schedule extends Model
{
   
    protected $table = 'schedules';
    protected $fillable =[
		'schedule_name',
		'start_time',
		'end_time',
		'days',  
		'monday',
		'tuesday',
		'wednesday',
		'thursday',
		'friday',
		'saturday',
		'sunday',
		'campaign_id',
		'campaign_enable_disable',
    ];

	 public function campaign()
    {
        return $this->belongsTo(Campaign::class);
    }
}
