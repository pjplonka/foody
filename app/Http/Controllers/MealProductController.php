<?php

namespace App\Http\Controllers;

use App\Models\Meal;
use App\Models\MealProduct;
use App\Models\Product;
use Illuminate\Http\Request;

class MealProductController extends Controller
{
    public function create(Meal $meal)
    {
        return view('meal-products.create', [
            'meal' => $meal,
            'mealProduct' => new MealProduct(),
            'products' => Product::all()
        ]);
    }

    public function store(Meal $meal, Request $request)
    {
        $payload = $request->validate([
            'product_id' => 'required|integer',
            'weight' => 'required|integer',
        ]);

        MealProduct::create(array_merge($payload, [
            'meal_id' => $meal->id
        ]));

        return redirect(route('meals.edit', ['meal' => $meal]))->with('success', 'Success.');
    }

    public function edit(MealProduct $mealProduct)
    {
        return view('meal-products.edit', [
            'meal' => $mealProduct->meal,
            'mealProduct' => $mealProduct,
            'products' => Product::all()
        ]);
    }

    public function update(Request $request, MealProduct $mealProduct)
    {
        $payload = $request->validate([
            'product_id' => 'required|integer',
            'weight' => 'required|integer',
        ]);

        $mealProduct->update($payload);

        return redirect(route('meals.edit', ['meal' => $mealProduct->meal]))->with('success', 'Success.');
    }

    public function destroy(MealProduct $mealProduct)
    {
        $mealProduct->delete();

        return redirect(route('meals.edit', ['meal' => $mealProduct->meal]))->with('success', 'Success.');
    }
}
