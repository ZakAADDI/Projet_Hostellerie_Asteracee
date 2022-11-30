<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RoomsPrestation extends Model
{
    use HasFactory;
    protected $fillable = ['prestation_id','room_type_id'];

    public function findRoomType()
    {
        return $this->hasOne(RoomType::class,'id','room_type_id');
    }
    public function findPrestation()
    {
        return $this->hasOne(Prestation::class,'id','prestation_id');
    }
}
