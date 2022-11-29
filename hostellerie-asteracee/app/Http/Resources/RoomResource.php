<?php

namespace App\Http\Resources;
use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Support\Facades\App;
use App\Http\Resources\RoomTypeResource;


class RoomResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        $roomType = $this->roomType;
        $media = $roomType->media;

        return [
            'id' => $this->id,
            'room_name'=> $roomType['name'],
            'room_description'=> $roomType['description'],
            'capacity'=> $roomType['capacity'],
            'price'=> $roomType['price'],
            'image' => $media['url'],
            'imageAlt' => $media['alt'],
            'room_number' => $this->room_number
        ];
    }
}
