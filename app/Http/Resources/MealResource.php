<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class MealResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        // Get the requested language from the request
        $language = $request->query('lang');

        // Translate the meal attributes for the requested language
        $translatedAttributes = $this->translate($language);

        $data = [
            'id' => $this->id,
            'title' => $translatedAttributes->title ?? $this->title,
            'description' => $translatedAttributes->description ?? $this->description,
            // Add other translated attributes as needed
        ];

        // Check if 'ingredients' relationship was loaded
        if ($this->relationLoaded('ingredients')) {
            $data['ingredients'] = $this->ingredients->map(function ($ingredient) {
                return [
                    // 'id' => $ingredient->id,
                    'title' => $ingredient->title,
                    // Add other ingredient attributes as needed
                ];
            });
        }

        // Check if 'category' relationship was loaded
        if ($this->relationLoaded('category')) {
            $data['category'] = [
                // 'id' => $this->category->id,
                'title' => $this->category->title,
                // Add other category attributes as needed
            ];
        }

        // Check if 'tags' relationship was loaded
        if ($this->relationLoaded('tags')) {
            $data['tags'] = $this->tags->map(function ($tag) {
                return [
                    // 'id' => $tag->id,
                    'title' => $tag->title,
                    // Add other tag attributes as needed
                ];
            });
        }

        return $data;
    }
}
