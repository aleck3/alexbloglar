<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class Contact extends Mailable
{

    use Queueable,
        SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public $mail;

    public function __construct($request)
    {
        $this->mail = $request;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view('emails.message')
                        ->with([
                            'sendername' => $this->mail->sendername,
                            'senderemail' => $this->mail->senderemail,
                            'sendermessage' => $this->mail->sendermessage
        ]);
    }

}
