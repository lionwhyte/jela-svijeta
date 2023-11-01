<?php

namespace Database\Seeders;

use App\Models\Meal;
use App\Models\MealTranslation;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class MealTranslationsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $languages = ['en', 'hr'];

        Meal::all()->each(function ($meal) use ($languages) {
            foreach ($languages as $locale) {
                MealTranslation::factory()->create([
                    'meal_id' => $meal->id,
                    'locale' => $locale,
                ]);
            }
        });
    }
}
