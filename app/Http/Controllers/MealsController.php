<?php

namespace App\Http\Controllers;

use App\Models\Meal;
use App\Models\MyGoal;
use Illuminate\Http\Request;

class MealsController extends Controller
{
    public function index()
    {
        return view('meals.index', [
            'meals' => Meal::all(),
            'myGoal' => MyGoal::get(),
        ]);
    }

    public function create()
    {
        return view('meals.create', [
            'meal' => new Meal(),
            'meals' => Meal::all(),
        ]);
    }

    public function store(Request $request)
    {
        $payload = $request->validate([
            'name' => 'required|string',
        ]);

        Meal::create($payload);

        return redirect('/meals')->with('success', 'Success.');
    }

    public function edit(Meal $meal)
    {
        return view('meals.edit', [
            'meal' => $meal,
            'meals' => Meal::all(),
        ]);
    }

    public function update(Request $request, Meal $meal)
    {
        $payload = $request->validate([
            'name' => 'required|string',
        ]);

        $meal->update($payload);

        return redirect('/meals')->with('success', 'Success.');
    }

    public function destroy(Meal $meal)
    {
        $meal->delete();

        return redirect('/meals')->with('success', 'Success.');
    }
}
