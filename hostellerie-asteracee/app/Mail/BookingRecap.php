<?php

namespace App\Mail;

use App\Models\Booking;
use App\Models\User;
use App\Models\Option;
use App\Models\RoomType;
use Carbon\Carbon;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Storage;
use PhpParser\Node\Stmt\If_;

class BookingRecap extends Mailable
{
    use Queueable, SerializesModels;

    public Booking $booking;
    public User $user;
    public $options;
    public RoomType $room_type;
    public string $logo;
    public string $qrcode;
    public float $tempMin;
    public float $tempMax;
    public int $weatherCode;
    public bool $showWeather;


    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(User $user, Booking $booking, $options, RoomType $roomType, array $weatherAPI)
    {
        $this->booking = $booking;
        $this->user = $user;
        $this->options = $options;
        $this->room_type = $roomType;
        $this->logo = Storage::temporaryUrl('LogoHeader.png', now()->addMinutes(1));
        $this->qrcode = Storage::temporaryUrl('qr-code/'.$booking->id.'.png', now()->addMinutes(1));

        $diffDate = Carbon::now()->diffInDays(Carbon::createFromFormat('Y-m-d',$booking->starting_date)->toDateTimeString());
        $this->showWeather = $diffDate<6;

        $this->tempMin = 0;
        $this->tempMax = 0;
        $this->weatherCode = 0;

        if ($diffDate<6){
            $this->tempMin = $weatherAPI["daily"]["temperature_2m_min"][0];
            $this->tempMax = $weatherAPI["daily"]["temperature_2m_max"][0];
            $this->weatherCode = $weatherAPI["daily"]["weathercode"][0];
        }
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        $weatherIconLink = '';
        switch ($this->weatherCode){
            case 0:
                $weatherIconLink = Storage::temporaryUrl('weather/sunshine.png', now()->addMinutes(1));
                break;
            case 95||96||99:
                $weatherIconLink = Storage::temporaryUrl('weather/thunderstorm.png', now()->addMinutes(1));
                break;
            case 61||63||65||66||67||80||81||82||51||53||55||56||57:
                $weatherIconLink = Storage::temporaryUrl('weather/rainy-day.png', now()->addMinutes(1));
                break;
            case 71||73||75||77||85||86:
                $weatherIconLink = Storage::temporaryUrl('weather/snows.png', now()->addMinutes(1));
                break;
            case 1||2||3||45||48:
                $weatherIconLink = Storage::temporaryUrl('weather/sun-cloud.png', now()->addMinutes(1));
                break;
        }


        return $this->view('emails.bookingRecap')
            ->with([
                'userName' => $this->user->firstname . ' ' . $this->user->lastname,
                'startDate' => $this->booking->starting_date,
                'endDate' => $this->booking->ending_date,
                'totalPrice' => $this->booking->total_price,
                'roomName' => $this->room_type->name,
                'roomPrice' => $this->room_type->price,
                'options' => $this->options,
                'weatherIconLink'=> $weatherIconLink
            ]);
    }
}
