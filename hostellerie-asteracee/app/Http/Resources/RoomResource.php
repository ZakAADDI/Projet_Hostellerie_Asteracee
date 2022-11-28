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
        $roomType = new RoomTypeResource($this->roomType);
        $media = new MediaResource($roomType->media);

        return [
            'id' => $this->id,
            'room_name'=> $roomType['name'],
            'room_description'=> $roomType['description'],
            'room_capacity'=> $roomType['capacity'],
            'room_price'=> $roomType['price'],
            'room_image' => $media['url'],
            'room_alt' => $media['alt'],
            'room_number' => $this->room_number
        ];
    }
}
