@extends('dashboard')
@section('content')
<div class="flex flex-col px-8 pt-6 pb-8 my-2 mt-12 mb-4 bg-white rounded shadow-lg">
    <div class="mb-6">
      <h1 class="text-2xl">Submit Complain</h1>
    </div>
    <form method="POST" action="{{ route('complains.store') }}">
        @csrf
        <div class="form-group mb-6">
            <label class="block mb-2 text-xs font-bold tracking-wide uppercase text-grey-darker" for="subject">
               Subject
            </label>
            <input type="text" name="subject" id="subject" class="form-control block w-full px-3 py-1.5 text-base font-normal text-gray-700 bg-white bg-clip-padding border border-solid border-gray-300 rounded transition ease-in-out m-0 focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none" placeholder="Please enter subject">
        </div>
        <div class="form-group mb-6">
            <label class="block mb-2 text-xs font-bold tracking-wide uppercase text-grey-darker" for="complaint">
                Complain
            </label>
            <textarea name="complaint" id="complaint" cols="30" rows="10" class="form-control block w-full px-3 py-1.5 text-base font-normal text-gray-700 bg-white bg-clip-padding border border-solid border-gray-300 rounded transition ease-in-out m-0 focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none" rows="3" placeholder="Please enter message"></textarea>
        </div>
        <button class="p-2 w-full text-white bg-blue-500 rounded-lg hover:bg-blue-600">Submit</button>
    </form>
  </div>
@endsection