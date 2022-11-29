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
        'card_number'
    ];

    public function room(): \Illuminate\Database\Eloquent\Relations\HasOne
    {
        return $this->hasOne(Room::class, 'id', 'room_id');
    }

    public function user(): \Illuminate\Database\Eloquent\Relations\HasOne
    {
        return $this->hasOne(User::class, 'id', 'user_id');
    }
}
