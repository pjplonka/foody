<?php

namespace App\Http\Controllers\Day;

use App\Http\Controllers\Controller;
use App\Models\Day;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductsController extends Controller
{
    public function create(Day $day, Day\Meal $meal)
    {
        return view('day-products.create', [
            'product' => new Day\Product(),
            'day' => $day,
            'meal' => $meal,
            'products' => Product::all()
        ]);
    }

    public function store(Day $day, Day\Meal $meal, Request $request)
    {
        $payload = $request->validate([
            'product_id' => 'required|integer',
            'weight' => 'required|numeric',
        ]);

        $meal->products()->create($payload);

        return redirect(route('days.show', ['day' => $day]))->with('success', 'Success.');
    }

    public function edit(Day\Product $product)
    {
        return view('day-products.edit', [
            'product' => $product,
            'products' => Product::all()
        ]);
    }

    public function update(Request $request, Day\Product $product)
    {
        $payload = $request->validate([
            'product_id' => 'required|integer',
            'weight' => 'required|integer',
        ]);

        $product->update($payload);

        return redirect(route('days.show', ['day' => $product->meal->day]))->with('success', 'Success.');
    }

    public function destroy(Day\Product $product)
    {
        $day = $product->meal->day;
        $product->delete();

        return redirect(route('days.show', ['day' => $day]))->with('success', 'Success.');
    }
}
