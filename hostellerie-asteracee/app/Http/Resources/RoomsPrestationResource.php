<?php

namespace App\Http\Resources;

use Database\Seeders\Prestations;
use Illuminate\Http\Resources\Json\JsonResource;
use Symfony\Component\Mime\Encoder\Base64Encoder;

class RoomsPrestationResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        $prestation = PrestationResource::make($this->findPrestation);
        $room_type = RoomTypeResource::make($this->findRoomType);
        $string = "test";
        $_SERVER['token'] = base64_encode($string);
        dd(base64_decode($_SERVER['token']));
        return [

            "prestation" => $prestation,
            "room_type" => $room_type
        ];
    }
}
