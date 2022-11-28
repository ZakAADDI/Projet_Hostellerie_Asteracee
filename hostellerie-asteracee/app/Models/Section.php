<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;


class Section extends Model
{
    use HasFactory;
    use HasTranslations;

    protected $fillable = ['name','description'];

    public $translatable = ['name','description'];
}
