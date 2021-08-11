<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ProductsController extends Controller
{
    public function index()
    {
        return view('products.index', [
            'products' => Product::all(),
        ]);
    }

    public function create()
    {
        return view('products.create', [
            'product' => new Product(),
            'products' => Product::all(),
        ]);
    }

    public function store(Request $request)
    {
        $payload = $request->validate([
            'name' => 'required|string',
            'protein' => 'required|numeric',
            'carbohydrates' => 'required|numeric',
            'fat' => 'required|numeric',
        ]);

        Product::create($payload);

        return redirect('/products')->with('success', 'Success.');
    }

    public function edit(Product $product)
    {
        return view('products.edit', [
            'product' => $product,
            'products' => Product::all(),
        ]);
    }

    public function update(Request $request, Product $product)
    {
        $payload = $request->validate([
            'name' => 'required|string',
            'protein' => 'required|numeric',
            'carbohydrates' => 'required|numeric',
            'fat' => 'required|numeric',
        ]);

        $product->update($payload);

        return redirect('/products')->with('success', 'Success.');
    }

    public function destroy(Product $product)
    {
        $product->delete();

        return redirect('/products')->with('success', 'Success.');
    }
}
