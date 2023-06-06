<?php

namespace App\Http\Resources;

use App\Models\Nfc;
use Illuminate\Http\Resources\Json\JsonResource;

class NfcResource extends JsonResource
{
    /**
     * Transform the resource collection into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        $nfc = Nfc::findOrFail($this->id);
        $booking = $nfc->booking;

        return [
            'booking' => BookingResource::make($booking),
            'hash' => $this->hash,
            'ended_at' => $this->ended_at,
            'created_at' => $this->created_at
        ];
    }
}
