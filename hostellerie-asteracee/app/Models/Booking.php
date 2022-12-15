<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Booking extends Model
{
    use HasFactory;

    protected $fillable = [
        'room_id',
        'user_id',
        'starting_date',
        'ending_date',
        'status',
        'total_price'
    ];

    public function getRoom(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(Room::class, 'room_id','id');
    }

    public function getUser(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(User::class,'user_id','id');
    }

    public function getBookingOptions(): \Illuminate\Database\Eloquent\Relations\HasMany
    {
        return $this->hasMany(BookingOption::class,'booking_id');
    }
}
