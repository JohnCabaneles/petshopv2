@extends('dashboard')
@section('content')
<div class="">
    <div class="">
        <a href="/" class="items-center p-2 text-base font-normal text-gray-900 rounded-lg group">
          <span class="hover:underline underline-offset-1"></i>Back</span>
        </a>
    </div>
    <div class="pt-2">
        <div class="flex-col table w-full p-5 bg-white rounded-lg shadow-md">
            <h1 class="pb-3 text-2xl">All Orders</h1>
            <table class="w-full border">
                <thead>
                    <tr class="border-b bg-gray-50">

                        <th class="w-2/12 p-2 text-sm font-bold text-gray-500 border-r">
                            <div class="flex items-center justify-center">
                               Order Number
                            </div>
                        </th>

                      <th class="w-2/12 p-2 text-sm font-bold text-gray-500 border-r">
                          <div class="flex items-center justify-center">
                             Product Name
                          </div>
                      </th>

                      <th class="w-2/12 p-2 text-sm font-bold text-gray-500 border-r">
                          <div class="flex items-center justify-center">
                             Price
                          </div>
                      </th>

                      <th class="w-2/12 p-2 text-sm font-bold text-gray-500 border-r">
                        <div class="flex items-center justify-center">
                           Name
                        </div>
                      </th>

                      <th class="p-2 text-sm font-bold text-gray-500 border-r">
                          <div class="flex items-center justify-center">
                              Delivery Address
                          </div>
                      </th>

                      <th class="p-2 text-sm font-bold text-gray-500 border-r">
                          <div class="flex items-center justify-center">
                              Contact Number
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
                              <td class="border-r">{{ $order->name }}</td>
                              <td class="border-r">{{ $order->address }}</td>
                              <td class="border-r">{{ $order->phone_number }}</td>
                              <td class="flex justify-center p-2 space-x-2">
                                {{-- <a href="{{ route('complains.edit', $complain->id)}}">
                                    <button class="p-2 text-xs font-thin text-white bg-blue-500 rounded-lg hover:bg-blue-600 hover:shadow-lg">View</button>
                                </a> --}}
                              </td>
                          </tr>
                      @endforeach
                </tbody>
            </table>

            <div>
                {{ $orders->links()}}
              </div>
        </div>
    </div>
  </div>
@endsection
