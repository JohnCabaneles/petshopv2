@extends('dashboard')
@section('content')
<button>
    <a href="/admin/complains" class="p-2 bg-gray-400 rounded-lg hover:bg-gray-500">back</a>
</button>
<div class="flex flex-col px-8 pt-6 pb-8 my-2 mt-12 mb-4 bg-white rounded shadow-md">
    <form>
        <div class="flex flex-col mt-12">
            {{-- Delivery address --}}
            <div class="space-y-3 rounded-xl shadow-lg p-3 w-full">
                <div class="flex justify-between">
                    <p class="uppercase text-xl font-bold">
                        Messages
                    </p>
                </div>
                <div class="w-full p-5 bg-white flex flex-col justify-between space-y-2">
                    <label class="text-md font-bold text-gray-800">ID:</label>
                    <input value="{{$complains->user->id}}" class="text-sm font-light text-gray-800 border-none"></input>
                    <hr class="my-4" />
                    <label class="text-md font-bold text-gray-800">Name:</label>
                    <input value="{{$complains->user->name}}" class="text-sm font-light text-gray-800 border-none"></input>
                    <hr class="my-4" />
                    <label class="text-md font-bold text-gray-800">Contact Number:</label>
                    <input value="{{$complains->user->contactNumber}}" class="text-sm font-light text-gray-800 border-none"></input>
                    <hr class="my-4" />
                    <label class="text-md font-bold text-gray-800">Subject:</label>
                    <input value="{{$complains->subject}}" class="text-sm font-light text-gray-800 border-none"></input>
                    <hr class="my-4" />
                    <label class="text-md font-bold text-gray-800">Complain:</label>
                    <input value="{{$complains->complaint}}" class="text-sm font-light text-gray-800 border-none"></input>
                    <hr class="my-4" />
                </div>
            </div>
        </div>
    </form>  
    <form action="{{ route('complains.destroy', $complains->id)}}" method="POST">
        @csrf
        @method('DELETE')
        <div class="mt-2">
            <button class="w-full p-2 text-xs font-thin text-white bg-red-500 rounded-lg hover:bg-red-600 hover:shadow-lg">Remove</button>
        </div>
    </form>
  </div>
@endsection
