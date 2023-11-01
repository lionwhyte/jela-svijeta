<?php

namespace Database\Seeders;

use App\Models\Ingredient;
use Illuminate\Database\Seeder;
use App\Models\IngredientTranslation;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class IngredientTranslationsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $languages = ['en', 'hr'];

        Ingredient::all()->each(function ($ingredient) use ($languages) {
            foreach ($languages as $locale) {
                IngredientTranslation::factory()->create([
                    'ingredient_id' => $ingredient->id,
                    'locale' => $locale,
                ]);
            }
        });
    }
}
