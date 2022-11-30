<?php

namespace App\Http\Repositories;
use App\Models\Room;
use Illuminate\Support\Facades\DB;

class RoomRepository
{
    public static function getUnavailableRooms($from,$to): array
    {
        return DB::table('bookings')->whereRaw(
            "(starting_date <= ? AND ending_date >= ?)",
            [$to, $from]
        )->pluck('room_id')->toArray();
    }

    public static function getAvailableRooms($from,$to): \Illuminate\Support\Collection
    {
        return Room::whereNotIn('id',self::getUnavailableRooms($from,$to))->get();
    }
}
