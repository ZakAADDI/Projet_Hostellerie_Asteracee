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
            'first_name' => $this->first_name,
            'last_name' => $this->last_name,
            'picture' => $this->picture,
            'gender' => $this->gender,
            'birth_date' => $this->birth_date,
            'loyalty' => $this->loyalty,
            'address' => $this->address,
            'email' => $this->email,
//            'role' => $this->role
        ];
    }
}
