<?php

namespace App\Http\Resources;

use App\Models\Booking;
use App\Models\Option;
use Illuminate\Http\Resources\Json\JsonResource;

class BookingResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
         $booking = Booking::findOrFail($this->id);
         $optionIds = $booking->getBookingOptions()->pluck('option_id');
         $options = [];
         foreach ($optionIds as $id){
             $options[] = Option::findOrFail($id);
         }
        return [
            'room' => RoomResource::make($this->getRoom),
            'user' => UserResource::make($this->getUser),
            'options' => $options,
            'starting_date' => $this->starting_date,
            'ending_date' => $this->ending_date,
            'status' => $this->status,
            'booking_id' => $this->id,
            'total_price' => $this->total_price
        ];
    }
}
