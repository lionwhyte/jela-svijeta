<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Seeder;
use App\Models\CategoryTranslation;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class CategoryTranslationsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $languages = ['en', 'hr'];

        Category::all()->each(function ($category) use ($languages) {
            foreach ($languages as $locale) {
                CategoryTranslation::factory()->create([
                    'category_id' => $category->id,
                    'locale' => $locale,
                ]);
            }
        });
    }
}
