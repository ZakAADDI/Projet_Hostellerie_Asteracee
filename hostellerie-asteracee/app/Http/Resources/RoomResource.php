<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Support\Facades\App;
use App\Http\Resources\MediaResource;


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
            'id' => $this->id,
            'description'=> $this->getTranslation('description', App::getLocale()),
            'price' => $this->price,
            'type' => $this->type,
            'capacity' => $this->capacity,
            'media' => new MediaResource($this->media)
        ];
    }
}
