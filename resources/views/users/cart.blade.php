@extends('user-home')

@section('content')
<div class="p-10">
    <p class="text-lg font-bold uppercase">Cart</p>
</div>
<div class="lg:mx-auto lg:max-w-full">
    <div class="mb-6 lg:mb-0">
        <div class="mx-10">
            <form action="{{ route('cart.update') }}" method="POST" id="cart-form">
                {{-- @method('PATCH') --}}
                @csrf
                <section class="px-6 py-8 pt-10 mb-8 space-y-4 rounded-md bg-slate-300 drop-shadow-lg">
                    <div class="">
                        <table class="w-full">
                            <thead>
                                <tr class="border-none bg-gray-50">
                                    <th class="w-4/12 p-2 text-sm font-bold text-gray-500 border-none">
                                        <div class="flex items-center justify-center">Products</div>
                                    </th>
                                    <th class="w-2/12 p-2 text-sm font-bold text-gray-500 border-none">
                                        <div class="flex items-center justify-center">Unit Price</div>
                                    </th>
                                    <th class="w-2/12 p-2 text-sm font-bold text-gray-500 border-none">
                                        <div class="flex items-center justify-center">Quantity</div>
                                    </th>
                                    <th class="w-2/12 p-2 text-sm font-bold text-gray-500 border-none">
                                        <div class="flex items-center justify-center">Total Price</div>
                                    </th>
                                    <th class="p-2 text-sm font-bold text-gray-500 border-none">
                                        <div class="flex items-center justify-center">Action</div>
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                @if(auth()->check())
                                    @if($cartItems->isNotEmpty())
                                        @foreach($cartItems as $item)
                                            <tr class="text-sm text-center text-gray-600 bg-gray-100 border-none">
                                                <td class="flex">
                                                    <img src="{{ asset('/storage/' . $item->img) }}" alt="{{ $item->product_name }}" class="w-24 h-20 p-2">
                                                    <p class="mt-5 ml-5">{{ $item->product_name }}</p>
                                                </td>
                                                <td class="border-none price">{{ $item->price }}</td>
                                                <td class="border-none">
                                                    <div class="flex items-center justify-center">
                                                        <input type="number" name="quantities[{{ $item->id }}]" class="form-control quantity" value="{{ $item->quantity }}">
                                                    </div>
                                                </td>
                                                <td class="border-none totalPrice">{{ number_format($item->price * $item->quantity, 2) }}</td>
                                                <td class="border-none">
                                                    <span class="flex items-center justify-center mb-2 text-red-600">Find Similar
                                                        <a href="">
                                                            <svg class="w-4 h-6 font-bold text-red-600" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                                                                <path stroke-linecap="round" stroke-linejoin="round" d="m19.5 8.25-7.5 7.5-7.5-7.5" />
                                                            </svg>
                                                        </a>
                                                    </span>
                                                    <form action="{{ route('cart.destroy', $item->id) }}" class="remove" method="POST">
                                                        @csrf
                                                        <button type="submit" class="px-2 py-1 text-xs font-thin text-white bg-red-500 rounded-lg hover:bg-red-600 hover:shadow-lg">Remove</button>
                                                    </form>
                                                </td>
                                            </tr>
                                        @endforeach
                                    @else
                                        <tr>
                                            <td colspan="5" class="p-5 text-center">
                                                <div class="flex flex-col items-center">
                                                    <span>Cart is empty</span>
                                                    <a href="/user/products" class="px-4 py-2 mt-3 text-gray-800 bg-green-500 rounded-lg hover:bg-green-600 hover:text-white">Add items to cart</a>
                                                </div>
                                            </td>
                                        </tr>
                                    @endif
                                @else
                                    {{-- Display cart items from session for guest users
                                    @foreach(Session::get('cart', []) as $item)
                                        <tr class="text-sm text-center text-gray-600 bg-gray-100 border-none">
                                            <td class="flex">
                                                <img src="{{ asset('/storage/' . $item['img']) }}" alt="{{ $item['product_name'] }}" class="w-24 h-20 p-2">
                                                <p class="mt-5 ml-5">{{ $item['product_name'] }}</p>
                                            </td>
                                            <td class="border-none">{{ $item['price'] }}</td>
                                            <td class="border-none">
                                                <div class="flex items-center justify-center">
                                                    <input type="number" name="quantities[{{ $item['id'] }}]" class="form-control quantity" value="{{ $item['quantity'] }}" min="1" max="100" step="1" onchange="updateTotalPrice(this)">
                                                </div>
                                            </td>
                                            <td class="border-none">{{ number_format($item['price'] * $item['quantity'], 2) }}</td>
                                            <td class="border-none">
                                                <span class="flex items-center justify-center mb-2 text-red-600">Find Similar
                                                    <a href="">
                                                        <svg class="w-4 h-6 font-bold text-red-600" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                                                            <path stroke-linecap="round" stroke-linejoin="round" d="m19.5 8.25-7.5 7.5-7.5-7.5" />
                                                        </svg>
                                                    </a>
                                                </span>
                                                <form id="" action="#" method="POST">
                                                    @csrf
                                                    <button class="px-2 py-1 text-xs font-thin text-white bg-red-500 rounded-lg hover:bg-red-600 hover:shadow-lg">Remove</button>
                                                </form>
                                            </td>
                                        </tr>
                                    @endforeach --}}
                                @endif
                            </tbody>
                        </table>
                        <div class="flex justify-end">
                            @if(auth()->check() && $cartItems->isNotEmpty())
                                <div class="pt-7">
                                    <span>Total (<span id="totalItemCount">{{ $cartItems->sum('quantity') }}</span> items): </span>
                                    <span class="pr-5 text-center pt-7 totalPriceDisplay">{{ number_format($totalPrice, 2) }}</span>
                                </div>
                                <button type="submit" class="px-4 py-2 mt-5 text-gray-800 bg-orange-500 rounded-lg hover:bg-orange-600 hover:text-white">Checkout</button>
                            @endif
                        </div>
                    </div>
                </section>
            </form>
        </div>
    </div>
</div>

<script>
    function updateTotalPrice(input) {
        var row = input.closest('tr');
        var price = parseFloat(row.querySelector('.price').innerText);
        var quantity = parseInt(input.value);
        var totalPrice = price * quantity;
        row.querySelector('.totalPrice').innerText = totalPrice.toFixed(2);
        updateTotalPriceDisplay();
    }

    function updateTotalPriceDisplay() {
        var totalPrice = 0;
        var totalItemCount = 0;
        var quantityInputs = document.querySelectorAll('.quantity');
        quantityInputs.forEach(function(input) {
            var row = input.closest('tr');
            var price = parseFloat(row.querySelector('.price').innerText);
            var quantity = parseInt(input.value);
            totalPrice += price * quantity;
            totalItemCount += quantity;
        });
        document.querySelector('.totalPriceDisplay').innerText = totalPrice.toFixed(2);
        document.getElementById('totalItemCount').innerText = totalItemCount;
    }

    document.addEventListener("DOMContentLoaded", function() {
        document.querySelectorAll('.quantity').forEach(function(input) {
            input.addEventListener('change', function() {
                updateTotalPrice(this);
            });
        });
        updateTotalPriceDisplay();

        const removeBtn = document.querySelectorAll('.remove');
        removeBtn.forEach(function(element){
            console.log('checkk >', element);
            element.addEventListener("submit", function(e){
                const input = document.createElement('input');
                input.type = 'hidden';
                input.name = '_method';
                input.value = 'DELETE';
                this.appendChild(input);
            })
        })
    });


</script>
@endsection
