<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;
class Hero extends Model
{
    use HasFactory, HasTranslations;

    protected $fillable = ['text','logo_media_id', 'left_media_id', 'center_media_id', 'right_media_id'];
    public $translatable = ['text'];

    public function logoMedia(): \Illuminate\Database\Eloquent\Relations\HasOne
    {
        return $this->hasOne(Media::class,'id','logo_media_id');
    }

    public function centerMedia(): \Illuminate\Database\Eloquent\Relations\HasOne
    {
        return $this->hasOne(Media::class,'id','center_media_id');
    }

    public function leftMedia(): \Illuminate\Database\Eloquent\Relations\HasOne
    {
        return $this->hasOne(Media::class,'id','left_media_id');
    }

    public function rightMedia(): \Illuminate\Database\Eloquent\Relations\HasOne
    {
        return $this->hasOne(Media::class,'id','right_media_id');
    }
}
