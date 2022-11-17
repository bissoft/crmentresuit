<?php

namespace App;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Chat extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'user1_id', 'user2_id'
    ];

    public function user1()
    {
        //return $this->belongsTo('App\Models\User', 'user1_id');
        return $this->belongsTo(User::class,'user1_id');
    }

    public function user2()
    {
        //return $this->belongsTo('App\User', 'user2_id');
        return $this->belongsTo(User::class,'user2_id');
    }
    
    public function messages()
    {
        //return $this->hasMany('App\Models\Messages', 'chat_id');
        return $this->hasMany(Messages::class,'chat_id');
    }
    
    public function last_msg()
    {
        //return $this->hasOne('App\Models\Messages', 'chat_id')->latest();
        return $this->hasOne(Messages::class,'chat_id')->latest();
    }
}
