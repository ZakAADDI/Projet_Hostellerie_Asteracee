<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Prestation extends Model
{
    use HasFactory;

    protected $fillable = ['name','media_id'];

    public function getMedia(): \Illuminate\Database\Eloquent\Relations\HasOne
    {
        return $this->hasOne(Media::class, 'id', 'media_id');
    }

    public function getRoomPrestations(): \Illuminate\Database\Eloquent\Relations\HasMany
    {
        return $this->hasMany(RoomsPrestation::class);
    }

}
