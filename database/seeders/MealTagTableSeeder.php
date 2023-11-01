<?php

namespace Database\Seeders;

use App\Models\Tag;
use App\Models\Meal;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class MealTagTableSeeder extends Seeder
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

        // Get all the tags
        $tags = Tag::all();

        // Attach random tags to each meal
        foreach ($meals as $meal) {
            $selectedTags = $tags->random(rand(1, 3));
            $meal->tags()->attach($selectedTags);
        }
    }
}
