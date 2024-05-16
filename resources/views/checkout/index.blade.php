@extends('user-home')
@section('content')
<div class="container mx-auto mt-5">
    <h1 class="mb-5 text-2xl font-bold">Checkout</h1>

    <div class="flex">
        <form action="{{ route('checkout.store', $product->id) }}" method="POST" class="flex w-full">
        @csrf
        <div class="w-1/2 p-5 mr-5 rounded-lg bg-slate-300">
            <div class="mb-4">
                <label for="name" class="block text-sm font-medium text-gray-700">Name</label>
                <input type="text" name="name" id="name" class="block w-full mt-1 border-gray-300 rounded-md shadow-sm" required>
            </div>
            <div class="mb-4">
                <label for="phone_number" class="block text-sm font-medium text-gray-700">Phone Number</label>
                <input type="text" name="phone_number" id="phone_number" class="block w-full mt-1 border-gray-300 rounded-md shadow-sm" required>
            </div>
            <div class="mb-4">
                <label for="address" class="block text-sm font-medium text-gray-700">Address</label>
                <input type="text" name="address" id="address" class="block w-full mt-1 border-gray-300 rounded-md shadow-sm" required>
            </div>
            <div class="mb-4">
                <label for="city" class="block text-sm font-medium text-gray-700">City</label>
                <input type="text" name="city" id="city" class="block w-full mt-1 border-gray-300 rounded-md shadow-sm" required>
            </div>
            <div class="mb-4">
                <label for="zip_code" class="block text-sm font-medium text-gray-700">Zip Code</label>
                <input type="text" name="zip_code" id="zip_code" class="block w-full mt-1 border-gray-300 rounded-md shadow-sm" required>
            </div>
            <div class="mb-4">
                <label for="card_holder_name" class="block text-sm font-medium text-gray-700">Card Holder Name</label>
                <input type="text" name="card_holder_name" id="card_holder_name" class="block w-full mt-1 border-gray-300 rounded-md shadow-sm" required>
            </div>
            <div class="mb-4">
                <label for="credit_card_number" class="block text-sm font-medium text-gray-700">Credit Card Number</label>
                <input type="text" name="credit_card_number" id="credit_card_number" class="block w-full mt-1 border-gray-300 rounded-md shadow-sm" required>
            </div>
            <div class="mb-4">
                <label for="expiration_date" class="block text-sm font-medium text-gray-700">Expiration Date</label>
                <input type="text" name="expiration_date" id="expiration_date" class="block w-full mt-1 border-gray-300 rounded-md shadow-sm" required>
            </div>
            <div class="mb-4">
                <label for="cvv" class="block text-sm font-medium text-gray-700">CVV</label>
                <input type="text" name="cvv" id="cvv" class="block w-full mt-1 border-gray-300 rounded-md shadow-sm" required>
            </div>
        </div>

        <div class="w-1/2 p-5 rounded-lg h-1/2 bg-slate-300">
             <h2 class="mb-4 text-xl font-bold">Order Summary</h2>
        <table class="w-full mb-4">
            <thead>
                <tr class="border-b">
                    <th class="p-2 text-left">Product</th>
                    <th class="p-2 text-left">Quantity</th>
                    <th class="p-2 text-left">Price</th>
                </tr>
            </thead>
            <tbody>
                @foreach($cartItems as $item)
                <tr class="border-b">
                    <td class="p-2">{{ $item->product->product_name }}</td>
                   <td class="p-2">
                        <input type="number" id="quantity" name="quantity" class="form-control quantity" value="{{ $item->quantity }}">
                    </td>
                    <td class="p-2">{{ number_format($item->price, 2) }}</td>
                </tr>
                @endforeach
            </tbody>
        </table>

        <div class="mb-4">
            <span class="text-lg font-bold">Total: ${{ number_format($totalPrice, 2) }}</span>
        </div>

        <button type="submit" class="px-4 py-2 text-white bg-blue-500 rounded-md">Place Order</button>
        </div>

    </form>

    </div>


</div>
@endsection
