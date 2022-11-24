<?php

namespace App\Http\Resources;
use Illuminate\Support\Facades\App;
use Illuminate\Http\Resources\Json\JsonResource;

class DealResource extends JsonResource
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
                'title' => $this->getTranslation('title', App::getLocale()),
                'content' => $this->getTranslation('content', App::getLocale()),
                'section' => $this->getTranslation('section', App::getLocale()),
                'is_active' => $this->is_active,
                'created_at' => $this->created_at,
                'updated_at' => $this->updated_at

                ];
    }
}
