<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Log;

class SendEmailMarketing extends Mailable
{
    use Queueable, SerializesModels;
    protected $details;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($details)
    {
        $this->details = $details;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        Log::info($this->details['content']);
        if ($this->details['type'] == 'booking') {
            return $this->subject($this->details['subject'])            
            ->view('email.email-marketings',['content' => $this->details['content']]);
        }elseif($this->details['type'] == 'contract'){
            return $this->subject($this->details['subject'])            
            ->view('email.contract_mail',['content' => $this->details['content'],'subject'=>$this->details['subject'],'detail'=>$this->details['detail']]);
        } else {
            return $this->subject($this->details['subject'])            
            ->view('email.email-marketing',['content' => $this->details['content'],'title' => $this->details['title'],'company_name' => $this->details['company_name'],'user_name' => $this->details['user_name'],'logo' => $this->details['logo'],'author' => $this->details['author']]);
        }
        
        
    }
}
