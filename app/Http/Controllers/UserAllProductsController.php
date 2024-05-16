<?php

namespace App\Http\Controllers;

use App\Models\Product;

class UserAllProductsController extends Controller
{
    public function index()
    {
        $product = Product::orderBy('created_at', 'desc')->paginate(12);

        return view('welcome', ['products' => $product]);
    }

    /**
     * Handle the incoming request.
     */
    public function __invoke()
    {
        $product = Product::orderBy('created_at', 'desc')->paginate(12);

        return view('users.userProducts.index', ['products' => $product]);
    }
}
