<?php

namespace App\Http\Resources;
use Illuminate\Support\Facades\App;
use Illuminate\Http\Resources\Json\JsonResource;

class HeroResource extends JsonResource
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
            'logo' => new MediaResource($this->media),
            'text' => $this->getTranslation('text', App::getLocale()),
            'left_img' => new MediaResource($this->media),
            'right_img' => new MediaResource($this->media),
            'center_media' => new MediaResource($this->media)
        ];
    }
}
