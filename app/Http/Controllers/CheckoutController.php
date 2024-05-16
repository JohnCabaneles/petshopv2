<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Checkout;
use App\Models\ProductCart;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Gloudemans\Shoppingcart\CartItem;

class CheckoutController extends Controller
{
    public function index()
    {
        // Retrieve cart items for the authenticated user
        $cartItems = ProductCart::where('user_id', Auth::id())->get();
        $totalPrice = 0;

        // Calculate total price
        foreach ($cartItems as $item) {
        $totalPrice += $item->product->price * $item->quantity;
    }

        return view('checkout.index', compact('cartItems', 'totalPrice'));
    }


    public function store(Request $request, $id)
{

    $product = Product::findOrFail($id);

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
    ]);

    // Retrieve cart items for the authenticated user
    $cartItems = ProductCart::where('user_id', Auth::id())->get();

    if ($cartItems->isEmpty()) {
        return redirect()->route('checkout.index')->with('error', 'Your cart is empty.');
    } else {
        // Calculate total amount
        $totalPrice = 0;
        foreach ($cartItems as $item) {
            $totalPrice += $item->price * $item->quantity;
        }

        // Update quantities if provided in the request
        if ($request->filled('quantities')) {
            foreach ($request->input('quantities') as $itemId => $quantity) {
                $cartItem = $cartItems->firstWhere('id', $itemId);
                if ($cartItem) {
                    $cartItem->quantity = $quantity;
                    $cartItem->save();
                }
            }
        }

        // Create a checkout record
        $formFields['amount'] = $totalPrice;
        $formFields['user_id'] = auth()->id();
        $formFields['product_id'] = $product->id;
        $formFields['status'] = 'pending'; // Initial status
        $formFields['type'] = 'purchase'; // Type of transaction

        Checkout::create($formFields);
    }

    return redirect()->route('checkout.success')->with('success', 'Your order has been placed successfully.');
}


    public function success()
    {
        return view('checkout.success');
    }

    public function destroy(Checkout $checkout)
    {
        $checkout->delete();

        return back()->with('message', 'Checkout deleted successfully');
    }
}
