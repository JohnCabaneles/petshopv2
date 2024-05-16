<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Checkout;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class OrderController extends Controller
{
    public function index() {
        // Fetch all orders grouped by user_id and count total orders per user
        $orders = Checkout::with('user')
            ->select('user_id', 'name', DB::raw('count(*) as total_orders'), 'created_at')
            ->groupBy('user_id', 'name', 'created_at')
            ->orderBy('created_at', 'desc')
            ->get();

        return view('adminOrder.index', [
            'orders' => $orders,
        ]);
    }

    public function show($id)
    {
        $order = Checkout::where('user_id', $id)->with('product')->get();

        return view('adminOrder.singleOrder', [
            'orders' => $order,
        ]);
    }
}
