<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class BookingResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        $room = $this->room;
        $roomType = $room->roomType;
        $user = $this->user;

        return [
            'user_first_name' => $user['first_name'],
            'user_last_name' => $user['last_name'],
            'user_email' => $user['email'],
            'room_type' => $roomType["name"],
            'room_price' => $roomType["price"],
            'room_number' => $room["room_number"],
            'starting_date' => $this->starting_date,
            'ending_date' => $this->ending_date,
            'status' => $this->status,
        ];
    }
}
