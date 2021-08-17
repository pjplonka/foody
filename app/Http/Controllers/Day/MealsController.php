<?php

namespace App\Http\Controllers\Day;

use App\Http\Controllers\Controller;
use App\Models\Day;
use App\Models\Meal;
use Facade\FlareClient\Http\Exceptions\NotFound;
use Illuminate\Http\Request;

class MealsController extends Controller
{
    public function create(Day $day)
    {
        return view('day-meals.create', [
            'day' => $day,
            'meals' => Meal::all()
        ]);
    }

    public function store(Day $day, Request $request)
    {
        $payload = $request->validate([
            'meal_id' => 'required|integer',
        ]);

        $predefinedMeal = Meal::find($payload['meal_id']);

        if (!$predefinedMeal) {
            throw new NotFound('Meal not found');
        }

        /** @var Day\Meal $meal */
        $meal = $day->meals()->create([
            'name' => $predefinedMeal->name
        ]);

        foreach ($predefinedMeal->products as $product) {
            $meal->products()->create([
                'product_id' => $product->product->id,
                'weight' => $product->weight,
            ]);
        }

        return redirect(route('days.show', ['day' => $day]))->with('success', 'Success.');
    }

    public function destroy(Day\Meal $meal)
    {
        $day = $meal->day;

        $meal->products()->delete();
        $meal->delete();

        return redirect(route('days.show', ['day' => $day]))->with('success', 'Success.');
    }
}
