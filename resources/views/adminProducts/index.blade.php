@extends('dashboard')
@section('content')
<div class="flex flex-col px-8 pt-6 pb-8 my-2 mt-12 mb-4 bg-white rounded shadow-lg">
    <div class="mb-6">
      <h1 class="text-2xl">Product Management</h1>
    </div>
    <form method="POST" action="{{ route('products.store') }}" enctype="multipart/form-data">
        @csrf
      <div class="mb-6 -mx-3 md:flex">

        <div class="px-3 mb-6 md:w-1/2 md:mb-0">
          <label class="block mb-2 text-xs font-bold tracking-wide uppercase text-grey-darker" for="product_name">
            Product Name
          </label>
          <input class="block w-full px-4 py-3 mb-3 border rounded appearance-none bg-grey-lighter text-grey-darker border-red" name="product_name" id="product_name" type="text" placeholder="Please enter product name">
        </div>

        <div class="px-3 mb-6 md:w-1/2 md:mb-0">
            <label class="block mb-2 text-xs font-bold tracking-wide uppercase text-grey-darker" for="price">
              Price
            </label>
            <input class="block w-full px-4 py-3 mb-3 border rounded appearance-none bg-grey-lighter text-grey-darker border-red" name="price" id="price" type="text" placeholder="Please enter price">
        </div>

        <div class="px-3 mb-6 md:w-1/2 md:mb-0">
            <label class="block mb-2 text-xs font-bold tracking-wide uppercase text-grey-darker" for="price">
              Category
            </label>
            <select class="block w-full px-4 py-3 mb-3 border rounded appearance-none bg-grey-lighter text-grey-darker border-red" name="category_id" id="category_id" type="text" placeholder="Please select category">
                @foreach ($categories as $category )
                    <option value="{{$category->id}}">{{$category->name}}</option>
                @endforeach
            </select>
        </div>

         <div class="px-3 mb-6 md:w-1/2 md:mb-0">
            <label class="block mb-2 text-xs font-bold tracking-wide uppercase text-grey-darker" for="img">
             Image
            </label>
            <input class="block w-full px-4 py-2 mb-3 border rounded appearance-none bg-grey-lighter text-grey-darker border-red" name="img" id="img" type="file" placeholder="Please enter image">
        </div>

      </div>
      <button class="p-2 text-white bg-blue-500 rounded-lg hover:bg-blue-600">Add Product</button>
    </form>
  </div>
  <hr />
  <div class="pt-2">
      <div class="flex-col table w-full p-5 bg-white rounded-lg shadow-md">
          <h1 class="pb-3 text-2xl">All Products</h1>
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
                            Image
                        </div>
                    </th>

                    <th class="w-4/12 p-2 text-sm font-bold text-gray-500 border-r">
                        <div class="flex items-center justify-center">
                           Product Name
                        </div>
                    </th>


                    <th class="w-4/12 p-2 text-sm font-bold text-gray-500 border-r">
                        <div class="flex items-center justify-center">
                           Category
                        </div>
                    </th>

                    <th class="w-2/12 p-2 text-sm font-bold text-gray-500 border-r">
                        <div class="flex items-center justify-center">
                           Price
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
                    @foreach( $products as $key => $product)
                        <tr class="text-sm text-center text-gray-600 bg-gray-100 border-b">
                            <td class="border-r">{{ $product->id }}</td>
                            <td class="border-r">
                                <img src="{{ asset('storage/' . $product->img) }}" alt="" class="w-24 h-12">
                            </td>
                            <td class="border-r">{{ $product->product_name}}</td>
                            <td class="border-r">{{ $product->category->name}}</td>
                            <td class="border-r">{{ $product->price}}</td>
                            <td class="flex justify-center p-2 space-x-2">
                                <a href="{{ route('products.edit', $product->id)}}">
                                    <button class="p-2 text-xs font-thin text-white bg-blue-500 rounded-lg hover:bg-blue-600 hover:shadow-lg">Edit</button>
                                </a>

                                <form action="{{ route('products.destroy', $product->id)}}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button class="p-2 text-xs font-thin text-white bg-red-500 rounded-lg hover:bg-red-600 hover:shadow-lg">Remove</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
              </tbody>
          </table>
            <div class="mt-6">
                {{$products->links()}}
            </div>
      </div>
  </div>
@endsection
