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
        return [
            'room' => RoomResource::make($this->getRoom),
            'user' => UserResource::make($this->getUser),
            'starting_date' => $this->starting_date,
            'ending_date' => $this->ending_date,
            'status' => $this->status
        ];
    }
}
