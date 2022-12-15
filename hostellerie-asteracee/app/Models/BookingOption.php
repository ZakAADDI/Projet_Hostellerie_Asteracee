<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BookingOption extends Model
{
    use HasFactory;
    protected $fillable = [
        'booking_id',
        'option_id',
        'count'
    ];

    public function getBooking(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(Booking::class,'booking_id','id');
    }

    public function getOption(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(Option::class,'option_id','id');
    }
}
