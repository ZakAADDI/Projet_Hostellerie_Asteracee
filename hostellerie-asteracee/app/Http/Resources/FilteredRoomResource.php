<?php

namespace App\Http\Resources;

use App\Http\Repositories\RoomRepository;
use Illuminate\Http\Resources\Json\JsonResource;

class FilteredRoomResource extends JsonResource
{
//    private static $data;

    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        $prestations = RoomRepository::getRoomPrestations($this);
//        dd($prestations);

        return [
            'room_type' => $this->room_types_id,
            'description' => $this->id,
            'prestations' => $prestations
        ];
    }

//    public static function customCollection($resource, $data): \Illuminate\Http\Resources\Json\AnonymousResourceCollection
//    {
//        // You can add as many params as you want.
//        self::$data = $data;
//        return parent::collection($resource);
//    }
}
