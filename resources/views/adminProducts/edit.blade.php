@extends('dashboard')
@section('content')
<button>
    <a href="/admin/products" class="p-2 bg-gray-400 rounded-lg hover:bg-gray-500">back</a>
</button>
<div class="flex flex-col px-8 pt-6 pb-8 my-2 mt-12 mb-4 bg-white rounded shadow-md">
    <div class="mb-6">
        <h1 class="text-2xl">Edit a Product</h1>
    </div>
    <form method="POST" action="{{ route('products.update', $products->id) }}" enctype="multipart/form-data">
        @csrf
        @method('PATCH')

        <div class="px-3 mb-6 md:w-1/2 md:mb-0">
            <label class="block mb-2 text-xs font-bold tracking-wide uppercase text-grey-darker" for="name">
               Product Name
            </label>
            <input class="block w-full px-4 py-3 mb-3 border rounded appearance-none bg-grey-lighter text-grey-darker border-red" name="product_name" id="product_name" type="text" value="{{$products->product_name}}">
        </div>

        <div class="px-3 mb-6 md:w-1/2 md:mb-0">
            <label class="block mb-2 text-xs font-bold tracking-wide uppercase text-grey-darker" for="price">
              Price
            </label>
            <input class="block w-full px-4 py-3 mb-3 border rounded appearance-none bg-grey-lighter text-grey-darker border-red" name="price" id="price" type="text" value="{{$products->price}}">
        </div>

        <div class="px-3 mb-6 md:w-1/2 md:mb-0">
            <label class="block mb-2 text-xs font-bold tracking-wide uppercase text-grey-darker" for="img">
              Image
            </label>
            <input class="block w-full px-4 py-3 mb-3 border rounded appearance-none bg-grey-lighter text-grey-darker border-red" name="img" id="img" type="file">
            <img class="w-48 mb-6 mr-6" src="{{$products->img ? asset('storage/'. $products->img) : asset('ProductImage/default.png')}}" alt="">
        </div>

      <button class="p-2 text-white bg-blue-500 rounded-lg hover:bg-blue-600">Update</button>
    </form>
  </div>
@endsection
