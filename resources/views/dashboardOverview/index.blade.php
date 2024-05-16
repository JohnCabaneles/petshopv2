@extends('dashboard')
@section('content')
<div class="pt-2 -ml-24">
    <div class="flex-col table w-full p-5 bg-white rounded-lg shadow-md">
        <h1 class="pb-3 text-2xl">All Products</h1>
        <table class="w-full border">
            <thead>
                <tr class="border-b bg-gray-50">
                    <th class="w-1/12 p-2 text-sm font-bold text-gray-500 border-r">
                       <div class="flex items-center justify-center">
                           Order #
                       </div>
                    </th>

                    <th class="w-1/12 p-2 text-sm font-bold text-gray-500 border-r">
                        <div class="flex items-center justify-center">
                            Ordered Date
                        </div>
                     </th>
    
                   <th class="w-2/12 p-2 text-sm font-bold text-gray-500 border-r">
                       <div class="flex items-center justify-center">
                           Item Name
                       </div>
                   </th>
    
                   <th class="w-2/12 p-2 text-sm font-bold text-gray-500 border-r">
                       <div class="flex items-center justify-center">
                          Quantity
                       </div>
                   </th>
    
    
                   <th class="w-2/12 p-2 text-sm font-bold text-gray-500 border-r">
                       <div class="flex items-center justify-center">
                          Status
                       </div>
                   </th>

                   <th class="w-2/12 p-2 text-sm font-bold text-gray-500 border-r">
                    <div class="flex items-center justify-center">
                       Action
                    </div>
                </th>
                </tr>
            </thead>
            <tbody>
                  @foreach( $products as $key => $product)
                      <tr class="text-sm text-center text-gray-600 bg-gray-100 border-b">
                          <td class="border-r">{{ $product->id }}</td>
                          <td class="border-r">{{ $product->created_at->format('m-d-Y')}}</td>
                          <td class="border-r">{{ $product->product_name}}</td>
                          <td class="border-r">2</td>
                          <td class="border-r p-2">waiting</td>
                          <td class="">
                            <a href="{{ route('overview.edit', $product->id)}}">
                                <button class="p-2 text-xs font-thin text-white bg-blue-500 rounded-lg hover:bg-blue-600 hover:shadow-lg">View</button>
                            </a>
                          </td>
                      </tr>
                  @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection