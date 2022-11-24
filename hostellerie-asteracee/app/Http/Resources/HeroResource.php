<?php

namespace App\Http\Resources;
use Illuminate\Support\Facades\App;
use Illuminate\Http\Resources\Json\JsonResource;
use App\Http\Resources\MediaResource;

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
            'text' => $this->getTranslation('text', App::getLocale()),
            'logo_media' => new MediaResource($this->logoMedia),
            'left_media' => new MediaResource($this->leftMedia),
            'center_media' => new MediaResource($this->centerMedia),
            'right_media' => new MediaResource($this->rightMedia)
        ];
    }
}
