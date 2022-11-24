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
        return [
            'id' => $this->id,
            'section' => $this->getTranslation('section', App::getLocale()),
            'title'=> $this->getTranslation('title', App::getLocale()),
            'content'=> $this->getTranslation('content', App::getLocale()),
            'media' => new MediaResource($this->media)
        ];
    }
}
