<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Astrotomic\Translatable\Translatable;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Category extends Model
{
    use HasFactory;
    use Translatable;

    public $translatedAttributes = ['title'];

    public function translations()
    {
        return $this->hasMany(CategoryTranslation::class);
    }
}
