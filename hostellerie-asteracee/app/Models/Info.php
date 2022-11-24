<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;

class Info extends Model
{
    use HasFactory, HasTranslations;

    protected $fillable = ['title','content','section','media_id','publication_date'];
    public $translatable = ['title','content','section'];
    public function media(): \Illuminate\Database\Eloquent\Relations\HasOne
    {
        return $this->hasOne(Media::class,'id','media_id');
    }

}
