<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Astrotomic\Translatable\Translatable;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Ingredient extends Model
{
    use HasFactory;
    use Translatable;

    public $translatedAttributes = ['title'];
    
    public function meals()
    {
        return $this->belongsToMany(Meal::class, 'meal_ingredient');
    }

    public function translations()
    {
        return $this->hasMany(IngredientTranslation::class);
    }
}
