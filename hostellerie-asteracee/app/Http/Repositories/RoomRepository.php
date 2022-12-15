<?php

namespace App\Http\Repositories;
use App\Models\Prestation;
use App\Models\Room;
use App\Models\RoomsPrestation;
use Illuminate\Support\Facades\DB;

class RoomRepository
{
    /**
     * return array of all UNAVAILABLE rooms between between an interval $from = arrival, $to = departure
     * @param $from
     * @param $to
     * @return array
     */
    public static function getUnavailableRooms($from, $to): array
    {
        return DB::table('bookings')->whereRaw(
            "(starting_date <= ? AND ending_date > ?)",
            [$to, $from]
        )->pluck('room_id')->toArray();
    }

    /**
     * return all the available rooms between an interval $from = arrival, $to = departure
     * @param $from
     * @param $to
     * @return \Illuminate\Support\Collection
     */
    public static function getAvailableRooms($from, $to): \Illuminate\Support\Collection
    {
        return Room::whereNotIn('id',self::getUnavailableRooms($from,$to))->get();
    }

    /**
     * return all the prestations available for the room
     * @param $room
     * @return \Illuminate\Support\Collection
     */
    public static function getRoomPrestations($room): \Illuminate\Support\Collection
    {
        $prestationsIds = RoomsPrestation::where('room_type_id','=',$room->room_type_id)
            ->pluck('prestation_id')
            ->toArray();

        return Prestation::whereIn('id',$prestationsIds)->get();
    }
}


