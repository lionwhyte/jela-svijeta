<?php

namespace Database\Seeders;

use App\Models\Meal;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class MealsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Meal::factory()->count(50)->create(); // Creating 50 meals
    }
}
