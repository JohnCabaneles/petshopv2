<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\ProductCart;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Gloudemans\Shoppingcart\Facades\Cart;

class ProductCartController extends Controller
{
    public function addToCart(Request $request, $product_id)
    {
        $product = Product::findOrFail($product_id);

        if (Auth::check()) {
            // Add the product to the cart
            Cart::add([
                'id' => $product->id,
                'name' => $product->product_name,
                'qty' => 1,
                'price' => $product->price,
                'options' => [
                    'img' => $product->img,
                ],
            ]);

            // Retrieve the cart item from the collection
            $cartItem = Cart::content()->where('id', $product->id)->first();

            // Save the cart contents to the database
            ProductCart::create([
                'user_id' => auth()->id(),
                'product_id' => $cartItem->id,
                'product_name' => $cartItem->name,
                'price' => $cartItem->price,
                'img' => $cartItem->options->img,
                'quantity' => $cartItem->qty,
            ]);

            return redirect()->back()->with('success', 'Product added to cart successfully');
        } else {
            // If user is not authenticated, redirect to login page with an error message
            return redirect()->route('login')->with('error', 'Please login to add products to cart');
        }
    }

    public function showCart()
    {
        $cartItems = [];
        $totalPrice = 0;

        if (Auth::check()) {
            // If user is authenticated, fetch cart items belonging to the user
            $user_id = auth()->id();
            $cartItems = ProductCart::where('user_id', $user_id)->get();
        } else {
            // If user is not authenticated, fetch cart items from session
            $cartItems = Session::get('cart', []);
        }

        // Calculate total price
        foreach ($cartItems as $item) {
            if (Auth::check()) {
                // For authenticated users, $item is an object
                $totalPrice += $item->price * $item->quantity;
            } else {
                // For non-authenticated users, $item is an array
                $totalPrice += $item['price'] * $item['quantity'];
            }
        }

        return view('users.cart', [
            'cartItems' => $cartItems,
            'totalPrice' => $totalPrice
        ]);
    }

    public function update(Request $request)
    {
        $formFields = $request->validate([
            'quantities' => 'required|array',
            'quantities.*' => 'integer|min:1',
        ]);

        foreach ($formFields['quantities'] as $id => $quantity) {
            $cartItem = ProductCart::findOrFail($id);
            if ($cartItem) {
                $cartItem->update([
                    'quantity' => $quantity,
                    'total_price' => $cartItem->price * $quantity,
                ]);
            }
        }

        // dd($formFields);

        return redirect('user/checkout')->with('success', 'Cart updated successfully');
    }

    public function destroy($id)
    {
        $productCart = ProductCart::find($id);

        if ($productCart) {
            $productCart->delete();
            return back()->with('message', 'Cart item removed successfully');
        } else {
            return back()->with('error', 'Cart item not found');
        }
    }
}
