<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UserZoomCredential extends Model
{
   protected $fillable = [
		'user_id',
		'name',
		'api_url',
		'api_key',
		'api_secret',
	];
}
