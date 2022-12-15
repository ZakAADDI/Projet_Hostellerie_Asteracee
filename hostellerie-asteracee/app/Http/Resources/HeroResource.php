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
        $logoMedia = $this->getLogoMedia;
        $leftMedia = $this->getLeftMedia;
        $centerMedia = $this->getCenterMedia;
        $rightMedia = $this->getRightMedia;
        return [
            'text' => $this->getTranslation('text', App::getLocale()),
            'logo_media_id' => $logoMedia->url,
            'logo_media_alt' => $logoMedia->alt,
            'left_img' => $leftMedia->url,
            'left_img_alt' => $leftMedia->alt,
            'center_media' => $centerMedia->url,
            'center_media_alt' => $centerMedia->alt,
            'right_img' => $rightMedia->url,
            'right_img_alt' => $rightMedia->alt
        ];
    }
}
