<?php

namespace App\Http\Controllers;

use App\Http\Resources\MealResource;
use App\Models\Meal;
use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;


class MealController extends Controller
{
    protected $meal;
    public function __construct(Meal $meal)
    {
        $this->meal = $meal;
    }
    //Dependency Injection example

    
    public function index(Request $request)
    {
        // Define custom validation messages
        $messages = [
            'lang.required' => 'The language parameter is required.',
            'lang.in' => 'The language must be either "en" or "hr".',
        ];

        // Initialize $query
        $query = Meal::query();

        try {
            // Validate query parameters
            $request->validate([
                'per_page' => 'integer|nullable',
                'page' => 'integer|nullable',
                'lang' => 'required|in:en,hr',
                'with' => 'string|nullable', // Add validation for the 'with' parameter
                // Add other validation rules as needed
            ], $messages);
        } catch (ValidationException $exception) {
            // If validation fails, manually return a JSON response
            return response()->json(['errors' => $exception->validator->errors()], 422);
        }

        // Apply filters and retrieve meals
        $query
            ->filter($request->all())
            ->paginate($request->input('per_page', 10));

        // Check for additional relationships to load
        $withKeywords = explode(',', $request->input('with'));

        foreach ($withKeywords as $keyword) {
            // Dynamically load the specified relationships
            if (in_array($keyword, ['ingredients', 'category', 'tags'])) {
                $query->with($keyword);
            }
        }

        $meals = $query->get();

        // Return the response
        return MealResource::collection($meals);
    }
}
