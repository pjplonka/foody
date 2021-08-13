<?php

namespace App\Http\Controllers;

use App\Models\Day;
use App\Models\DayProduct;
use App\Models\Product;
use Facade\FlareClient\Http\Exceptions\NotFound;
use Illuminate\Http\Request;

class DayProductsController extends Controller
{
    public function create(Day $day)
    {
        return view('day-products.create', [
            'dayProduct' => new DayProduct(),
            'day' => $day,
            'products' => Product::all()
        ]);
    }

    public function store(Day $day, Request $request)
    {
        $payload = $request->validate([
            'product_id' => 'required|integer',
            'weight' => 'required|numeric',
        ]);

        $day->products()->attach($payload['product_id'], ['weight' => $payload['weight']]);

        return redirect(route('days.show', ['day' => $day]))->with('success', 'Success.');
    }

    public function edit(DayProduct $dayProduct)
    {
        return view('day-products.edit', [
            'dayProduct' => $dayProduct,
            'products' => Product::all()
        ]);
    }

    public function update(Request $request, DayProduct $dayProduct)
    {
        $payload = $request->validate([
            'product_id' => 'required|integer',
            'weight' => 'required|integer',
        ]);

        $dayProduct->update($payload);

        return redirect(route('days.show', ['day' => $dayProduct->day]))->with('success', 'Success.');
    }

    public function destroy(Day $day, int $productId)
    {
        $product = Product::find($productId);

        if (!$product) {
            throw new NotFound('Product not found');
        }

        $day->products()->detach($productId);

        return redirect(route('days.show', ['day' => $day]))->with('success', 'Success.');
    }
}
