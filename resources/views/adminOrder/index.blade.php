@extends('dashboard')
@section('content')
<div class="">
    <a href="/admin/products" class="items-center p-2 text-base font-normal text-gray-900 rounded-lg group">
        <span class="hover:underline underline-offset-1">Back</span>
    </a>
</div>
<div class="pt-2">
    <div class="flex-col table w-full p-5 bg-white rounded-lg shadow-md">
        <h1 class="pb-3 text-2xl">All Orders</h1>
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
                        Placed On
                      </div>
                  </th>
                  <th class="w-2/12 p-2 text-sm font-bold text-gray-500 border-r">
                    <div class="flex items-center justify-center">
                       Total Orders
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
                        <td class="border-r">{{ $order->user_id }}</td>
                        <td class="border-r">{{ $order->name }}</td>
                        <td class="border-r">{{ $order->created_at->format('M d, Y') }}</td>
                        <td class="border-r">{{ $order->total_orders }}</td>
                        <td class="flex justify-center p-2 space-x-2">
                            <a href="{{ route('order.show', ['order' => $order->user_id]) }}">
                                <button class="p-2 text-xs font-thin text-white bg-blue-500 rounded-lg hover:bg-blue-600 hover:shadow-lg">View</button>
                            </a>

                            <form action="{{ route('order.destroy', ['order' => $order->user_id]) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button class="p-2 text-xs font-thin text-white bg-red-500 rounded-lg hover:bg-red-600 hover:shadow-lg">Remove</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection
