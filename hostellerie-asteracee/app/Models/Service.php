<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Service extends Model
{
    use HasFactory;

    protected $fillable = ['title_fr','title_en','content_fr','content_en','media_id'];

    public function media(): \Illuminate\Database\Eloquent\Relations\HasOne
    {
        return $this->hasOne(Media::class, 'id','media_id');
    }
}
