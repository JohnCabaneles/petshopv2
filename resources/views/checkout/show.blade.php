@extends('user-home')
@section('content')
<div class="container mx-auto">
    <div class="flex justify-center my-12">
        <div class="w-full max-w-2xl p-6 bg-white rounded-lg shadow-lg">
            <div class="flex flex-col items-center">
                <img class="object-cover w-full h-64 rounded-lg shadow-md" src="{{ asset('/storage/' . $product->img)}}" alt="Product Image">
                <div class="mt-6">
                    <h2 class="text-2xl font-bold">{{ $product->product_name }}</h2>
                    <p class="mt-4 text-lg text-gray-600">{{ $product->description }}</p>
                    
                </div>
                <form action="{{ route('single.store', $product->id) }}" method="POST" class="w-full mt-6">
                    @csrf
                    <div class="grid grid-cols-1 gap-4">
                        <div class="flex items-center justify-center">
                            <input type="number" id="quantity" name="quantity" class="form-control quantity" value="{{ $product->quantity }}">
                        </div>
                        <div>
                            <label for="name" class="block text-sm font-medium text-gray-700">Name</label>
                            <input type="text" name="name" id="name" class="mt-1 block w-full" required>
                        </div>
                        <div>
                            <label for="phone_number" class="block text-sm font-medium text-gray-700">Phone Number</label>
                            <input type="text" name="phone_number" id="phone_number" class="mt-1 block w-full" required>
                        </div>
                        <div>
                            <label for="address" class="block text-sm font-medium text-gray-700">Address</label>
                            <input type="text" name="address" id="address" class="mt-1 block w-full" required>
                        </div>
                        <div>
                            <label for="city" class="block text-sm font-medium text-gray-700">City</label>
                            <input type="text" name="city" id="city" class="mt-1 block w-full" required>
                        </div>
                        <div>
                            <label for="zip_code" class="block text-sm font-medium text-gray-700">Zip Code</label>
                            <input type="text" name="zip_code" id="zip_code" class="mt-1 block w-full" required>
                        </div>
                        <div>
                            <label for="card_holder_name" class="block text-sm font-medium text-gray-700">Card Holder Name</label>
                            <input type="text" name="card_holder_name" id="card_holder_name" class="mt-1 block w-full" required>
                        </div>
                        <div>
                            <label for="credit_card_number" class="block text-sm font-medium text-gray-700">Credit Card Number</label>
                            <input type="text" name="credit_card_number" id="credit_card_number" class="mt-1 block w-full" required>
                        </div>
                        <div>
                            <label for="expiration_date" class="block text-sm font-medium text-gray-700">Expiration Date</label>
                            <input type="text" name="expiration_date" id="expiration_date" class="mt-1 block w-full" required>
                        </div>
                        <div>
                            <label for="cvv" class="block text-sm font-medium text-gray-700">CVV</label>
                            <input type="text" name="cvv" id="cvv" class="mt-1 block w-full" required>
                        </div>
                    </div>
                    <div class="flex justify-end mt-6">
                        <button type="submit" class="px-4 py-2 bg-blue-500 text-white rounded-lg">Place Order</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
