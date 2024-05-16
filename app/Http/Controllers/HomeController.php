<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    public function index(){
        if(Auth::id()) {
            $role = Auth()->user()->role;
            $product = Product::orderBy('created_at', 'desc')->get();
            $category = Category::orderBy('created_at', 'desc')->get();

            if($role == 'user') {
                return view('user.index');
            } else if($role == 'admin') {
                return view('adminProducts.index', [
                    'products' => $product,
                    'categories' => $category
                ]);
            } else {
                return redirect()->back();
            }
        }
    }
}
