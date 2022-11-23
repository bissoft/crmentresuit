<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Ticket extends Model
{
    //
    protected $fillable = [
        'created_by',
        'subject',
        'customer_contact_id',
        'department_id',
        'email_cc',
        'tag_id',
        'assigned_to',
        'ticket_status_id',
        'ticket_priority_id',
        'ticket_service_id',
        'project_id',
        'pre_defined_replies_id',
        'details'
    ];

    public function createdBy()
    {
        return $this->belongsTo(User::class,'created_by');
    }

    public function assignedTo()
    {
        return $this->belongsTo(User::class,'assigned_to');
    }

    public function customerContact()
    {
        return $this->belongsTo(User::class,'customer_contact_id');
    }

    public function department()
    {
        return $this->belongsTo(Department::class,'department_id');
    }

    public function service()
    {
        return $this->belongsTo(Services::class,'ticket_service_id');
    }

    public function ticketStatus()
    {
        return $this->belongsTo(TicketStatus::class,'ticket_status_id');
    }
    public function ticketPriority()
    {
        return $this->belongsTo(TicketPriority::class,'ticket_priority_id');
    }
}
