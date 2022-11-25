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
        $logoMedia = new MediaResource($this->logoMedia);
        $leftMedia = new MediaResource($this->leftMedia);
        $centerMedia = new MediaResource($this->centerMedia);
        $rightMedia = new MediaResource($this->rightMedia);
        return [
            'text' => $this->getTranslation('text', App::getLocale()),
            'logo_media' => $logoMedia['url'],
            'left_media' => $leftMedia['url'],
            'center_media' => $centerMedia['url'],
            'right_media' => $rightMedia['url']
        ];
    }
}
