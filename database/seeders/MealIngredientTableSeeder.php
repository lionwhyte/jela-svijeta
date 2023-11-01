<?php

namespace Database\Seeders;

use App\Models\Meal;
use App\Models\Ingredient;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class MealIngredientTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Get all the meals
        $meals = Meal::all();

        // Get all the ingredients
        $ingredients = Ingredient::all();

        // Attach random ingredients to each meal
        foreach ($meals as $meal) {
            $selectedIngredients = $ingredients->random(rand(1, 5));
            $meal->ingredients()->attach($selectedIngredients);
        }
    }
}
