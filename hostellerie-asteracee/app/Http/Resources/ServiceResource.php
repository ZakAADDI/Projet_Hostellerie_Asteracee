<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Support\Facades\App;
use App\Http\Resources\MediaResource;

class ServiceResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        $media = new MediaResource($this->media);
        return [
            'id' => $this->id,
            'title'=> $this->getTranslation('title', App::getLocale()),
            'section'=> $this->getTranslation('section', App::getLocale()),
            'content'=> $this->getTranslation('content', App::getLocale()),
            'media_url' => $media['url'],
            'media_alt' => $media['alt']
        ];
    }
}
