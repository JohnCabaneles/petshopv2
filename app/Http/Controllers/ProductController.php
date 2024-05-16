<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index()
    {
        $product = Product::orderBy('created_at', 'desc')->paginate(10);
        $category = Category::orderBy('created_at', 'desc')->paginate(10);

        return view('adminProducts.index', [
            'products' => $product,
            'categories' => $category
        ]);
    }


    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $formFields = $request->validate([
            'product_name' => 'required',
            'price' => 'required',
        ]);

        $formFields['category_id'] = $request->input('category_id');


        if($request->hasFile('img')) {
            $formFields['img'] = $request->file('img')->store('ProductImage', 'public');
        }

        Product::create($formFields);

        return redirect()->back();
    }


    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Product $product)
    {
        return view('adminProducts.edit', ['products' => $product]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Product $product)
    {
       $formFields = $request->validate([
            'product_name' => 'required',
            'price' => 'required',

        ]);

        if($request->hasFile('img')) {
            $formFields['img'] = $request->file('img')->store('ProductImage', 'public');
        }

        $product->update($formFields);

        return redirect('/admin/products')->with('message', 'Product updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Product $product)
    {
        $product->delete();

        return back()->with('message', 'Product deleted successfully');
    }
}
