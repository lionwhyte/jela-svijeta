<?php

namespace App\Http\Controllers;

use App\Http\Resources\MealResource;
use App\Models\Meal;
use Illuminate\Http\Request;

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
        // Validate query parameters
        $request->validate([
            'per_page' => 'integer|nullable',
            'page' => 'integer|nullable',
            // Add other validation rules as needed
        ]);

        // Apply filters and retrieve meals
        $meals = Meal::query()
            ->filter($request->all())
            ->paginate($request->input('per_page', 10));

        // Return the response
        return MealResource::collection($meals);
    }
}
