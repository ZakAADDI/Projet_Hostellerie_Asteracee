<?php

namespace App\Http\Resources;
use Illuminate\Support\Facades\App;
use Illuminate\Http\Resources\Json\JsonResource;

class ReviewResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        $user = $this->getUser;
        return [
            'id' => $this->id,
            'title' => $this->title,
            'content' => $this->content,
            'score' => $this->score,
            'user_firstname' => $user['firstname'],
            'user_lastname' => $user['lastname'],
            'gender' => $user['gender'],
            'user_picture' => $user['picture']

        ];
    }
}
