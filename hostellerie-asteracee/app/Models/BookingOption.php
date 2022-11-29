<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BookingOption extends Model
{
    use HasFactory;
    protected $fillable = [
        'booking_id',
        'option_id'
    ];

    public function getBooking(): \Illuminate\Database\Eloquent\Relations\HasOne
    {
        return $this->hasOne(Booking::class, 'id', 'booking_id');
    }

    public function getOption(): \Illuminate\Database\Eloquent\Relations\HasOne
    {
        return $this->hasOne(Option::class, 'id', 'option_id');
    }
}
