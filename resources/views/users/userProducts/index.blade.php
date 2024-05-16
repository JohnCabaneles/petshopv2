@extends('user-home')
@section('content')

  <div class="p-10">
    <p class="text-lg font-bold uppercase">Products</p>
  </div>
  <div class="lg:mx-auto lg:max-w-full">
    <div class="mb-6 lg:mb-0">
      <div class="">
          <div class="flex justify-evenly">
            <div class="grid grid-cols-1 gap-8 mt-2 md:grid-cols-2 lg:grid-cols-4">
              @foreach ($products as $product)
                <div class="flex flex-col max-w-xs p-5 overflow-hidden rounded-lg shadow-md bg-slate-300">
                  <div class="h-48 flex-grow-1">
                    <img class="object-cover w-full h-full rounded-lg shadow-xl" src="{{ asset('/storage/' . $product->img)}}" alt="Product Image">
                  </div>
                  <div class="p-4">
                    <h3 class="h-16 font-semibold text-gray-800 dynamic-font-size">{{$product->product_name}}</h3>
                    <p class="mt-1 text-gray-600">{{$product->price}}</p>
                  </div>
                  <div class="flex gap-2">
                    <a href="{{ route('single.show', $product->id) }}" class="flex items-center justify-center flex-1 gap-1 px-4 py-2 text-gray-800 bg-blue-500 rounded-lg shadow-xl hover:bg-blue-600 hover:text-white">
                      Buy now
                    </a>
                    <form action="{{ route('cart.add', $product->id) }}" method="POST">
                        @csrf
                        <input type="hidden" name="quantity" value="1">
                        <button class="flex items-center justify-center flex-1 gap-1 px-4 py-2 text-gray-800 bg-orange-500 rounded-lg shadow-xl hover:bg-orange-600 hover:text-white">
                          Add to cart
                        </button>
                    </form>
                  </div>
                </div>
              @endforeach
            </div>
          </div>
          <div class="mt-6">
              {{$products->links()}}
          </div>
        </section>
      </div>
    </div>
  </div>

@endsection
