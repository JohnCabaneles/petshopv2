<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class DashboardOverviewController extends Controller
{
    public function index() {
        $product = Product::orderBy('created_at', 'desc')->paginate(10);
        
        return view('dashboardOverview.index', [
            'products' => $product
        ]);
    }
}
