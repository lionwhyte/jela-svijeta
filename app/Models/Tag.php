<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Astrotomic\Translatable\Translatable;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Tag extends Model
{
    use HasFactory;
    use Translatable;

    public $translatedAttributes = ['title'];

    public function meals()
    {
        return $this->belongsToMany(Meal::class, 'meal_tag');
    }

    public function translations()
    {
        return $this->hasMany(TagTranslation::class);
    }
}
