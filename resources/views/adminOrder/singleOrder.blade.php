@extends('dashboard')
@section('content')
<div class="p-5 bg-white rounded-lg shadow-md">
    <h1 class="py-5 text-2xl">Order Details</h1>
    <table class="w-full border">
            <thead>
                <tr class="border-b bg-gray-50">
                   <th class="w-1/12 p-2 text-sm font-bold text-gray-500 border-r">
                      <div class="flex items-center justify-center">
                          ID
                      </div>
                  </th>
                  <th class="w-2/12 p-2 text-sm font-bold text-gray-500 border-r">
                      <div class="flex items-center justify-center">
                         Name
                      </div>
                  </th>
                  <th class="w-2/12 p-2 text-sm font-bold text-gray-500 border-r">
                      <div class="flex items-center justify-center">
                         Price
                      </div>
                  </th>
                  <th class="w-2/12 p-2 text-sm font-bold text-gray-500 border-r">
                      <div class="flex items-center justify-center">
                         Quantity
                      </div>
                  </th>
                  <th class="w-2/12 p-2 text-sm font-bold text-gray-500 border-r">
                    <div class="flex items-center justify-center">
                       Total
                    </div>
                  </th>
                  <th class="p-2 text-sm font-bold text-gray-500 border-r">
                      <div class="flex items-center justify-center">
                          Action
                      </div>
                  </th>
                </tr>
            </thead>
            <tbody>
                @foreach($orders as $order)
                    <tr class="text-sm text-center text-gray-600 bg-gray-100 border-b">
                        <td class="border-r">{{ $order->id }}</td>
                        <td class="border-r">{{ $order->product->product_name ?? 'N/A' }}</td>
                        <td class="border-r">₱ {{ $order->product->price ?? 'N/A' }}</td>
                        <td class="border-r">{{ $order->quantity }}</td>
                        <td class="border-r">₱ {{ $order->quantity * $order->product->price }}</td>
                        <td class="flex justify-center p-2 space-x-2">
                            {{-- Actions if any --}}
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        <div class="py-5 ">
            <a href="{{ url()->previous() }}" class="text-blue-500 hover:underline">Back to Orders</a>
        </div>
</div>
@endsection
