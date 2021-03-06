<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Support\Facades\Auth;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class ContactMail extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */

     public $contact;

    public function __construct($contact)
    {
        $this->contact=$contact;

    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        $userMail=Auth::user()->email;
        return $this->from($userMail)->view('mails.revisorMail');
    }
}
