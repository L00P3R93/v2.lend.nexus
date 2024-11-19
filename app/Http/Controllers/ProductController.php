<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller {
    public function index() {
        $products = Product::all();
        return view('products.list', compact('products'));
    }

    public function create() {
        return view('products.create');
    }

    public function store(Request $request) {
        $request->validate([
            'name' => 'required',
            'rate' => 'required'
        ]);
        Product::create($request->all());
        return redirect('products')->with('success', 'Product created successfully!');
    }

    public function show($id) {
        $product = Product::findOrFail($id);
        return view('products.view', compact('product'));
    }

    public function edit($id) {
        $product = Product::findOrFail($id);
        return view('products.edit', compact('product'));
    }

    public function update(Request $request, $id) {
        $request->validate([
            'name' => 'required',
            'rate' => 'required'
        ]);
        $product = Product::findOrFail($id);
        $product->update($request->all());
        return redirect('products')->with('success', 'Product updated successfully!');
    }
}
