<?php

namespace App\Http\Controllers;

use App\Models\Day;
use App\Models\Product;
use Facade\FlareClient\Http\Exceptions\NotFound;
use Illuminate\Http\Request;

class DayProductsController extends Controller
{
    public function create(Day $day)
    {
        return view('day-products.create', [
            'day' => $day,
            'products' => Product::all()
        ]);
    }

    public function store(Day $day, Request $request)
    {
        $payload = $request->validate([
            'product_id' => 'required|integer',
        ]);

        $day->products()->attach($payload['product_id']);

        return redirect(route('days.show', ['day' => $day]))->with('success', 'Success.');
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
