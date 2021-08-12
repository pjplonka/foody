<?php

namespace App\Http\Controllers;

use App\Models\Day;
use App\Models\Meal;
use Facade\FlareClient\Http\Exceptions\NotFound;
use Illuminate\Http\Request;

class DayMealsController extends Controller
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

        $day->meals()->attach($payload['meal_id']);

        return redirect(route('days.show', ['day' => $day]))->with('success', 'Success.');
    }

    public function destroy(Day $day, int $mealId)
    {
        $meal = Meal::find($mealId);

        if (!$meal) {
            throw new NotFound('Meal not found');
        }

        $day->meals()->detach($mealId);

        return redirect(route('days.show', ['day' => $day]))->with('success', 'Success.');
    }
}
