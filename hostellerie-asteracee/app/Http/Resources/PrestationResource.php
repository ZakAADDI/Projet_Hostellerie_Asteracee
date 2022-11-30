<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class PrestationResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        $media = $this->media;
        return [
            'id' => $this->id,
            'name' => $this->name,
            'media_id' => $media['id'],
            'media_url' => $media['url'],
            'media_alt' => $media['alt']
        ];
    }
}
