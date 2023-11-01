<?php

namespace Database\Seeders;

use App\Models\Tag;
use App\Models\TagTranslation;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class TagTranslationsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $languages = ['en', 'hr'];

        Tag::all()->each(function ($tag) use ($languages) {
            foreach ($languages as $locale) {
                TagTranslation::factory()->create([
                    'tag_id' => $tag->id,
                    'locale' => $locale,
                ]);
            }
        });
    }
}
