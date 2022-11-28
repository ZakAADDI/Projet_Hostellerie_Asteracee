<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;

class Review extends Model
{
    use HasFactory, HasTranslations;
    protected $fillable = ['title','content','score','user_firstname','user_lastname','gender'];
}
