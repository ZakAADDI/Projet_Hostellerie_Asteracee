<?php

namespace App\Http\Controllers;

use App\Mail\BookingRecap;
use App\Mail\Subscribe;
use App\Models\Booking;
use App\Models\Option;
use App\Models\User;
use App\Models\RoomType;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Storage;
use DateTime;

class EmailController extends Controller
{
    public function sendBookingRecap(Request $request)
    {
        /**
         * Store a receiver email address to a variable.
         */
        /**
         * Import the Mail class at the top of this page,
         * and call the to() method for passing the
         * receiver email address.
         *
         * Also, call the send() method to incloude the
         * HelloEmail class that contains the email template.
         */

        $booking = Booking::findOrFail($request->booking_id);
        if($request->user_id === $booking->getUser()->firstOrFail()->id){
            $optionIds = $booking->getBookingOptions()->pluck('option_id');
            $options = [];
            foreach ($optionIds as $id){
                $options[] = Option::findOrFail($id);
            }

            $roomType = RoomType::findOrFail($booking->getRoom()->firstOrFail()->room_type_id);
            $user = User::findOrFail($booking->user_id);
            $reveiverEmailAddress = $user->email;
            $date1 = new DateTime($booking->starting_date);
            $date2 = new DateTime($booking->ending_date);
            $nbNights = $date2->diff($date1)->format("%a");

            $occupants = $booking->occupants;

            $qr = New SimpleQRcodeController;
            $qr->generate($booking->id);

            $weatherAPI = Http::get('https://api.open-meteo.com/v1/dwd-icon?latitude=45.91&longitude=6.13&daily=weathercode,temperature_2m_max,temperature_2m_min&timezone=auto&start_date='. $booking->starting_date .'&end_date=' . $booking->ending_date)->json();
            Mail::to($reveiverEmailAddress)->send(new BookingRecap($user,$booking,$options, $roomType, $weatherAPI, $occupants, $nbNights));

        }


//        Storage::delete('qr-code/'.$hash.'.png');
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
