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
}
