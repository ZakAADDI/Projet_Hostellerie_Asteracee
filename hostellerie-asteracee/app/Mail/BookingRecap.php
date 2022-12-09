<?php

namespace App\Mail;

use App\Models\Booking;
use App\Models\User;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class BookingRecap extends Mailable
{
    use Queueable, SerializesModels;

    public Booking $booking;
    public User $user;
    public $options;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(User $user, Booking $booking, $options)
    {
        $this->booking = $booking;
        $this->user = $user;
        $this->options = $options;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view('emails.bookingRecap')
            ->with([
                'options' => $this->options
            ]);
    }
}
