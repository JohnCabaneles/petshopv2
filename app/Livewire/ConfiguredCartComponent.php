<?php

namespace App\Livewire;

use App\Models\Cart;
use Livewire\Component;

class ConfiguredCartComponent extends Component
{
    public $cart;

   public function mount()
    {
        // Check if the user is logged in
        if (auth()->check()) {
            // Retrieve the user's cart if it exists
            $user = auth()->user();
            $this->cart = $user->carts()->with('product')->first();
        } else {
            // If the user is not logged in, initialize an empty cart
            $this->cart = new Cart();
        }
    }

    public function loadCartItems()
    {
        // Ensure that the cart items are loaded
        if ($this->cart) {
            $this->cart->load('product');
        }
    }

    public function increaseQuantity($productId)
    {
        $cartItem = $this->cart->items()->where('product_id', $productId)->first();
        $cartItem->quantity++;
        $this->updateCartItem($cartItem);
    }

    public function decreaseQuantity($productId)
    {
        $cartItem = $this->cart->items()->where('product_id', $productId)->first();
        if ($cartItem->quantity > 1) {
            $cartItem->quantity--;
            $this->updateCartItem($cartItem);
        }
    }

    protected function updateCartItem($cartItem)
    {
        $cartItem->total_price = $cartItem->quantity * $cartItem->product->price;
        $cartItem->save();
        $this->loadCart(); // Reload the cart after updating the item
        $this->emit('cartUpdated');
    }

    public function render()
    {
        $cartItems = $this->cart->product ?? [];

        return view('livewire.configured-cart-component', [
            'cartItems' => $cartItems // Ensure $cartItems is an array
        ]);
    }
}
