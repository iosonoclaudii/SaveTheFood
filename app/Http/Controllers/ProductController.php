<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use Inertia\Inertia;

class ProductController extends Controller
{
    public function index()
    {
        return inertia('Products/Index', [
            'products' => Product::all()
        ]);
    }

    public function create()
    {
        return inertia('Products/Create');
    }

    public function store(Request $request)
{
    $request->validate([
        'name' => 'required',
        'type' => 'required|in:vegetable,fruit',
        'price' => 'required|numeric',
        'discounted_price' => 'nullable|numeric',
        'store' => 'nullable|string',
        'city' => 'nullable|string',
    ]);

    Product::create($request->all());

    return redirect()->route('products.index');
}

    public function show(Product $product)
    {
        return Inertia::render('Products/Show', [
            'product' => $product
        ]);
    }

    public function edit(Product $product)
    {
        return inertia('Products/Edit', ['product' => $product]);
    }

    public function update(Request $request, Product $product)
{
    $request->validate([
        'name' => 'required',
        'type' => 'required|in:vegetable,fruit',
        'price' => 'required|numeric',
        'discounted_price' => 'nullable|numeric',
        'store' => 'nullable|string',
        'city' => 'nullable|string',
    ]);

    $product->update($request->all());

    return redirect()->route('products.index');
}
    public function destroy(Product $product)
    {
        $product->delete();

        return redirect()->route('products.index');
    }
}
