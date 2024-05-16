<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Checkout;
use Illuminate\Http\Request;

class SingleOrderController extends Controller
{
    public function index() {
        $orders = Checkout::with('product')->orderBy('created_at', 'desc')->paginate(10);
        return view('users.orders.index', compact('orders'));
    }

    public function show($id) {
        $product = Product::findOrFail($id);
        return view('checkout.show', compact('product'));
    }

    public function store(Request $request, $id)
{
    // Find the product by its ID
    $product = Product::findOrFail($id);

    // Check if the product was found
    if (!$product) {
        // If the product does not exist, return an error response or redirect back
        return redirect()->back()->with('error', 'Product not found.');
    }

    // Validate the form fields
    $formFields = $request->validate([
        'name' => 'required|string|max:255',
        'phone_number' => 'required|string|max:20',
        'address' => 'required|string|max:255',
        'city' => 'required|string|max:100',
        'zip_code' => 'required|string|max:20',
        'card_holder_name' => 'required|string|max:255',
        'credit_card_number' => 'required|string|max:20',
        'expiration_date' => 'required|string|max:5',
        'cvv' => 'required|string|max:4',
        'quantity' => 'integer'
    ]);

    // Calculate total amount for the single product
    $totalPrice = $product->price * $request->quantity;

    // Create a checkout record
    $formFields['amount'] = $totalPrice;
    $formFields['user_id'] = auth()->id();
    $formFields['product_id'] = $product->id;
    $formFields['status'] = 'pending'; // Initial status
    $formFields['type'] = 'purchase'; // Type of transaction

    Checkout::create($formFields);

    return redirect()->route('checkout.success')->with('success', 'Your order has been placed successfully.');
}

}
