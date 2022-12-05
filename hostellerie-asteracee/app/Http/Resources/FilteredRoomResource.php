<?php

namespace App\Http\Resources;

use App\Http\Controllers\API\RoomTypeController;
use App\Http\Repositories\RoomRepository;
use App\Models\RoomType;
use Illuminate\Http\Resources\Json\JsonResource;

class FilteredRoomResource extends JsonResource
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
