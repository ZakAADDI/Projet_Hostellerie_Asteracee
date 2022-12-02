<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class TestMail extends Mailable
{
    use Queueable, SerializesModels;

    public $user = [];

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(Array $user1 )
    {
        $this->user = $user1;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->from('zakaria.aaddi@le-campus-numerique.fr')
                    ->subject('Mon projet Hoestellerie Asteracee')
                    ->view('emails.testemail');
    }
}
