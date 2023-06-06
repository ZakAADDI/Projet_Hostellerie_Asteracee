<?php

namespace App\Http\Resources;

use App\Models\Nfc;
use App\Models\History;
use Illuminate\Http\Resources\Json\JsonResource;

class HistoryResource extends JsonResource
{
    /**
     * Transform the resource collection into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        $nfc = Nfc::findOrFail($this->nfc_id);
      
        return [
            'used_at' => $this->used_at,
            'nfc' => NfcResource::make($nfc)
        ];
    }
}
