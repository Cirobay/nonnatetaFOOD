<?php

namespace App\Http\Controllers\Dash;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Dash\Product;

class ProductController extends Controller
{


    public function index()
    {
        $products = Product::latest()->paginate(5);

        return view('dash.product.index', compact('products'))
            ->with('i', (request()->input('page', 1) - 1) * 5);
    }



    public function create()
    {
        return view('dash.product.create');
    }



    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'quantity' => 'required',
            'price' => 'required',
        ]);

        Product::create($request->all());

        return redirect()->route('dash.products.index')
            ->with('success', 'Product created successfully.');
    }


    public function show(Product $product)
    {
        return view('dash.product.show', compact('product'));
    }



    public function edit(Product $product)
    {
        return view('dash.product.edit', compact('product'));
    }



    public function update(Request $request, Product $product)
    {
        $request->validate([
            'name' => 'required',
            'quantity' => 'required',
            'price' => 'required',
        ]);

        $product->update($request->all());

        return redirect()->route('dash.products.index')
            ->with('success', 'Product updated successfully');
    }



    public function destroy(Product $product)
    {
        $product->delete();

        return redirect()->route('dash.products.index')
            ->with('success', 'Product deleted successfully');
    }
}
