<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class UserResource extends JsonResource
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
            'firstname' => $this->firstname,
            'lastname' => $this->lastname,
            'picture' => $this->avatar,
            'gender' => $this->gender,
            'birth_date' => $this->birth_date,
            'loyalty' => $this->loyalty,
            'address' => $this->address,
            'email' => $this->email,
        ];
    }
}
