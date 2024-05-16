<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Category;
use Illuminate\Http\Request;

class ByCategoryFetchProductController extends Controller
{
    public function bestSellers()
    {
    // Get the "Best Sellers" category ID
    $bestSellersCategoryId = Category::where('name', 'Best Sellers')->value('id');

    // Fetch products with the "Best Sellers" category
    $bestSellersProducts = Product::where('category_id', $bestSellersCategoryId)->paginate(10);

    return view('users.userProducts.best-sellers', [
        'products' => $bestSellersProducts,
    ]);
    }

    public function promos()
    {
        $promosCategoryId = Category::where('name', 'Promos')->value('id');

        $promosProducts = Product::where('category_id', $promosCategoryId)->paginate(10);

        return view('users.userProducts.promos', [
            'products' => $promosProducts,
        ]);
    }

     public function accessories()
    {
        $accessoriesCategoryId = Category::where('name', 'Accessories')->value('id');

        $accessoriesProducts = Product::where('category_id', $accessoriesCategoryId)->paginate(10);

        return view('users.userProducts.accessories', [
            'products' => $accessoriesProducts,
        ]);
    }

     public function foodsAndTreats()
    {
        $foodsAndTreatsCategoryId = Category::where('name', 'Foods and Treats')->value('id');

        $foodsAndTreatsProducts = Product::where('category_id', $foodsAndTreatsCategoryId)->paginate(10);

        return view('users.userProducts.foods-and-treats', [
            'products' => $foodsAndTreatsProducts,
        ]);
    }

}
