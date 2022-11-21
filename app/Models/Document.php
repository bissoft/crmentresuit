<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Signature;

class Document extends Model
{
    use SoftDeletes;
    protected $table = 'documents';
    protected $guarded = [];
    protected $dates = ['deleted_at'];

    public function getRouteKeyName(){
        return 'id';
    }

    public function signature()
    {
        return $this->hasOne(Signature::class);
    }

    public function user()
    {
        return $this->hasOne(DocumentUser::class);
    }

    public function staff()
    {
        return $this->belongsTo(User::class, 'created_by');
    }
}
