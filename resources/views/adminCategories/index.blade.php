@extends('dashboard')
@section('content')
<div class="flex flex-col px-8 pt-6 pb-8 my-2 mt-12 mb-4 bg-white rounded shadow-lg">
    <div class="mb-6">
      <h1 class="text-2xl">Add a Category</h1>
    </div>
    <form method="POST" action="{{ route('categories.store') }}" enctype="multipart/form-data">
        @csrf
      <div class="mb-6 -mx-3 md:flex">

        <div class="px-3 mb-6 md:w-1/2 md:mb-0">
          <label class="block mb-2 text-xs font-bold tracking-wide uppercase text-grey-darker" for="name">
            Category Name
          </label>
          <input class="block w-full px-4 py-3 mb-3 border rounded appearance-none bg-grey-lighter text-grey-darker border-red" name="name" id="name" type="text" placeholder="Please enter category name">
        </div>
      </div>
      <button class="p-2 text-white bg-blue-500 rounded-lg hover:bg-blue-600">Add category</button>
    </form>
  </div>
  <hr />

  <div class="pt-2">
      <div class="flex-col table w-full p-5 bg-white rounded-lg shadow-md">
          <h1 class="pb-3 text-2xl">All Categories</h1>
          <table class="w-full border">
              <thead>
                  <tr class="border-b bg-gray-50">
                     <th class="w-1/12 p-2 text-sm font-bold text-gray-500 border-r">
                        <div class="flex items-center justify-center">
                            ID
                        </div>
                    </th>
                    <th class="w-4/12 p-2 text-sm font-bold text-gray-500 border-r">
                        <div class="flex items-center justify-center">
                           Category Name
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
                    @foreach( $categories as $key => $category)
                        <tr class="text-sm text-center text-gray-600 bg-gray-100 border-b">
                            <td class="border-r">{{ $category->id }}</td>
                            <td class="border-r">{{ $category->name}}</td>
                            <td class="flex justify-center p-2 space-x-2">
                                <form action="{{ route('categories.destroy', $category->id)}}" method="POST">
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
                {{$categories->links()}}
            </div>
      </div>
  </div>
@endsection
