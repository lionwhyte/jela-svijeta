<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call([
            CategoriesTableSeeder::class,
            TagsTableSeeder::class,
            IngredientsTableSeeder::class,
            MealsTableSeeder::class,
            CategoryTranslationsTableSeeder::class,
            TagTranslationsTableSeeder::class,
            IngredientTranslationsTableSeeder::class,
            MealTranslationsTableSeeder::class,
            MealIngredientTableSeeder::class,
            MealTagTableSeeder::class,
        ]);
    }
}
