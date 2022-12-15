<?php

namespace App\Http\Resources;
use Illuminate\Http\Resources\Json\JsonResource;
use App\Http\Repositories\RoomRepository;
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
        return [
            'room_id' => $this->id,
            'room_type' => RoomTypeResource::make($this->getRoomType),
            'number' => $this->room_number,
            'prestations' => PrestationResource::collection(RoomRepository::getRoomPrestations($this))
        ];
    }
}
