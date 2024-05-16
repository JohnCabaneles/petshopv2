<div>
    <tbody>
        @if($cartItems)
            @foreach($cartItems as $index => $item)
                <tr class="text-sm text-center text-gray-600 bg-gray-100 border-none">
                    <td class="flex">
                        <img src="{{ asset('/storage/' . $item->img) }}" alt="{{$item->product_name}}" class="flex w-24 h-20 p-2">
                        <p class="mt-5 ml-5">{{$item->product_name}}</p>
                    </td>
                    <td class="border-none">{{ $item->price}}</td>
                    <td class="border-none">
                        <div class="flex items-center justify-center">
                            <input type="number" id="quantity" name="quantity" class="form-control" value="1" min="1" max="100" step="1" data-decimals="0" required>
                        </div>
                    </td>
                    <td class="border-none">{{ $item->total_price }}</td>
                    <td class="border-none">
                        <span class="flex items-center justify-center mb-2 text-red-600">Find Similar
                            <a href="">
                                <svg class="w-4 h-6 font-bold text-red-600" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="m19.5 8.25-7.5 7.5-7.5-7.5" />
                                </svg>
                            </a>
                        </span>
                        <form action="{{ route('cart.destroy', $item->id) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="px-2 py-1 text-white bg-red-500 rounded-lg hover:bg-red-600 hover:shadow-lg">Remove</button>
                        </form>
                    </td>
                </tr>
            @endforeach
            @else
                <tr>
                    <td colspan="5">Cart is empty</td>
                </tr>
             @endif
        </tbody>
</div>


