<?php

namespace App\Models;

use Database\Seeders\Deals;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;

class RoomType extends Model
{
    use HasFactory, HasTranslations;
    protected $fillable = ['name', 'description', 'capacity', 'price', 'media_id'];
    public $translatable = ['description'];

    public function getMedia(): \Illuminate\Database\Eloquent\Relations\HasOne
    {
        return $this->hasOne(Media::class,'id','media_id');
    }

    public function getDeals(): \Illuminate\Database\Eloquent\Relations\HasMany
    {
        return $this->hasMany(Deal::class);
    }

    public function getRooms(): \Illuminate\Database\Eloquent\Relations\HasMany
    {
        return $this->hasMany(Room::class);
    }

    public function getRoomPrestations(): \Illuminate\Database\Eloquent\Relations\HasMany
    {
        return $this->hasMany(RoomsPrestation::class,'prestation_id');
    }
}
