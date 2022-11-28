<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Room extends Model
{
    use HasFactory;

    protected $fillable = ['room_types_id', 'room_number'];

    public function roomType(): \Illuminate\Database\Eloquent\Relations\HasOne
    {
        return $this->hasOne(RoomType::class, 'id', 'room_types_id');
    }
}
