<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;

class Review extends Model
{
    use HasFactory, HasTranslations;
    public $translatable = ['section'];
    protected $fillable = ['title','content','score','user_firstname','user_lastname','gender','section'];
}
