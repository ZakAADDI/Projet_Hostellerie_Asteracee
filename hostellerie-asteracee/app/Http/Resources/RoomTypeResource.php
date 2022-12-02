<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Support\Facades\App;
class RoomTypeResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        $media = $this->getMedia;

        return [
            'id' => $this->id,
            'name' => $this->name,
            'description'=> $this->getTranslation('description', App::getLocale()),
            'capacity' => $this->capacity,
            'price' => $this->price,
            'media_url' => $media->url,
            'media_alt' => $media->alt
        ];
    }
}
