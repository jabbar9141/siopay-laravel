<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Queue\SerializesModels;

class requiredDocRequestEmail extends Mailable
{
    use Queueable, SerializesModels;
    public $supportEmail;
    public $registrationDoc;
    public $fullDoc;
    public $user;
    /**
     * Create a new message instance.
     *
     * @return void
     */


    public function __construct($supportEmail, $registrationDoc, $fullDoc, $user)
    {
          $this->supportEmail = $supportEmail;
          $this->registrationDoc = $registrationDoc;
          $this->fullDoc = $fullDoc;
          $this->user = $user;

    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view('required_doc');
    }

    // public function content(): Content
    // {
    //     return new Content(
    //         view: 'requiredDoc',

    //     );
    // }
}
