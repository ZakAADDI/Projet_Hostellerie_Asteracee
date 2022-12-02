<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RoomsPrestation extends Model
{
    use HasFactory;
    protected $fillable = ['prestation_id','room_type_id'];

    public function getRoomType()
    {
        return $this->belongsTo(RoomType::class);
    }
    public function getPrestation()
    {
        return $this->belongsTo(Prestation::class);
    }
}
