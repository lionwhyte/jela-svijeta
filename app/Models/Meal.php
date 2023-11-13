<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Astrotomic\Translatable\Translatable;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;


class Meal extends Model
{
    use HasFactory;
    use Translatable;

    public $translatedAttributes = ['title', 'description'];

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function ingredients()
    {
        return $this->belongsToMany(Ingredient::class, 'meal_ingredient');
    }

    public function tags()
    {
        return $this->belongsToMany(Tag::class, 'meal_tag');
    }

    public function translations() //translations is default name for translation method
    {
        return $this->hasMany(MealTranslation::class);
    }

    public function scopeFilter(Builder $query, array $filters): Builder
    {
        // Filter by category
        if ($category = $filters['category'] ?? null) {
            if ($category === 'NULL') {
                $query->whereNull('category_id');
            } elseif ($category === '!NULL') {
                $query->whereNotNull('category_id');
            } else {
                $query->where('category_id', $category);
            }
        }

        // Filter by tags
        if ($tags = $filters['tags'] ?? null) {
            $tagIds = explode(',', $tags);
            $query->whereHas('tags', function ($query) use ($tagIds) {
                $query->whereIn('tag_id', $tagIds);
            }, '=', count($tagIds));
        }

        // Filter by language
        if ($language = $filters['lang'] ?? null) {
            $query->whereHas('translations', function ($query) use ($language) {
                $query->where('locale', $language);
            });
        }

        // Add other filters as needed...

        return $query;
    }
}
