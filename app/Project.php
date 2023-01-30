<?php

namespace App;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    protected $fillable = [
        'name',
        'customer_id',
        'calculate_progress_through_tasks',
        'progress',
        'billing_type_id',
        'status_id',
        'billing_rate',
        'start_date',
        'dead_line',
        'user_id',
        'tag_id',
        'description',
    ];

    public function customer()
    {
        return $this->belongsTo(User::class,'customer_id');
    }

    public function status()
    {
        return $this->belongsTo(TicketStatus::class,'status_id');
    }

    /**
     * Set attribute to date format
     * @param $input
     */
    // public function setStartDateAttribute($input)
    // {
    //     if ($input != null && $input != '') {
    //         $this->attributes['start_date'] = Carbon::createFromFormat('Y-m-d H:i:s', $input)->format('Y-m-d H:i:s');
    //     } else {
    //         $this->attributes['start_date'] = null;
    //     }
    // }

    /**
     * Get attribute from date format
     * @param $input
     *
     * @return string
     */
    public function getStartDateAttribute($input)
    {
        $zeroDate = str_replace(['Y', 'm', 'd'], ['0000', '00', '00'], config('app.date_format') . ' H:i:s');

        if ($input != $zeroDate && $input != null) {
            return Carbon::createFromFormat('Y-m-d H:i:s', $input)->format('Y-m-d H:i:s');
        } else {
            return '';
        }
    }

}
