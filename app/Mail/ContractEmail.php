<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class ContractEmail extends Mailable
{
    use Queueable, SerializesModels;
    protected $details;

    public function __construct($details)
    {
        $this->details = $details;
    }


    public function build()
    {
        return $this->view('email.contract_mail',['content' => $this->details['content']]);
    }
}
