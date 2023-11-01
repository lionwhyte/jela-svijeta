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

        return [
            'id' => $this->id,
            'title' => $translatedAttributes->title ?? $this->title,
            'description' => $translatedAttributes->description ?? $this->description,
            // Add other translated attributes as needed
        ];
    }
}
