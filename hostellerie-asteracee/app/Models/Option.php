<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;

class Option extends Model
{
    use HasFactory, HasTranslations;
    public $translatable = ['name','description','frequency'];
    protected $fillable = ['name', 'price', 'description', 'frequency'];
}