<?php

namespace App\Http\Controllers;

use App\Mail\BookingRecap;
use App\Mail\Subscribe;
use App\Models\Booking;
use App\Models\Option;
use App\Models\User;
use App\Models\RoomType;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class EmailController extends Controller
{
    public function sendBookingRecap(Request $request)
    {
        /**
         * Store a receiver email address to a variable.
         */
        $reveiverEmailAddress = $request->email;
        //dd($reveiverEmailAddress);
        /**
         * Import the Mail class at the top of this page,
         * and call the to() method for passing the
         * receiver email address.
         *
         * Also, call the send() method to incloude the
         * HelloEmail class that contains the email template.
         */

        $user = User::findOrFail($request->user_id);
        $booking = Booking::findOrFail($request->booking_id);
        $optionIds = $booking->getBookingOptions()->pluck('option_id');
        $options = [];
        foreach ($optionIds as $id){
            $options[] = Option::findOrFail($id);
        }
        $roomType = RoomType::findOrFail($booking->getRoom()->firstOrFail()->room_type_id);

        Mail::to($reveiverEmailAddress)->send(new BookingRecap($user,$booking,$options, $roomType));

        /**
         * Check if the email has been sent successfully, or not.
         * Return the appropriate message.
         */
//        if (Mail::failures() != 0) {
//            return "Email has been sent successfully.";
//        }
//        return "Oops! There was some error sending the email.";
    }

    public function sendSubscribe(Request $request)
    {
        dd("ok");
        $reveiverEmailAddress = $request->email;
        // dd($reveiverEmailAddress);

        $user = User::findOrFail($request->user_id);

        Mail::to($reveiverEmailAddress)->send(new Subscribe($user));
    }

}
