<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Interview extends Model
{
	protected $fillable =[
		'uuid',
		'topic',
		'start_time',
		'invite_link',
		'duration',
		'user_id',
		'creater_user_id',
	];
	public function user_name()
	{
		 return $this->belongsTo(User::class, 'user_id');
	}
}
