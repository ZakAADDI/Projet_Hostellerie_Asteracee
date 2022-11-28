<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;

class RoomType extends Model
{
    use HasFactory, HasTranslations;
    protected $fillable = ['name', 'description', 'capacity', 'price', 'media_id'];
    public $translatable = ['description'];

    public function media(): \Illuminate\Database\Eloquent\Relations\HasOne
    {
        return $this->hasOne(Media::class, 'id', 'media_id');
    }
}
