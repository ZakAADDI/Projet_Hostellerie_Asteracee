<?php

namespace App\Mail;

use App\Models\Booking;
use App\Models\User;
use App\Models\Option;
use App\Models\RoomType;
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
    public RoomType $room_type;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(User $user, Booking $booking, $options, RoomType $roomType)
    {
        $this->booking = $booking;
        $this->user = $user;
        $this->options = $options;
        $this->room_type = $roomType;
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
                'userName' => $this->user->firstname . ' ' . $this->user->lastname,
                'startDate' => $this->booking->starting_date,
                'endDate' => $this->booking->ending_date, 
                'totalPrice' => $this->booking->total_price,
                'roomName' => $this->room_type->name,
                'roomPrice' => $this->room_type->price,
                'options' => $this->options,
            ]);
    }
}
