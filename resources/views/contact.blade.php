@extends('user-home')
@section('content')

  <div class="-ml-44">
    <p class="w-full p-5 text-lg font-bold uppercase">Contact Us</p>
  </div>
  <div class="lg:mx-auto lg:max-w-full">
    <div class="">
      <div class="mt-10">
        <div class="flex container-xl">
            <div class="">
                <img src="{{ asset('images/PetKv.png') }}" alt="Pet Image" class="pet-width">
            </div>
            <div class="z-20 flex items-center justify-center p-20 mt-10 text-lg opacity-75 content-width bg-slate-300 rounded-3xl">
                <p class=""><span class="font-extrabold">Jennie's Pet Supplies Shop</span>, we're your one-stop for all pet needs. From food to toys and grooming supplies, we offer top-quality products with passion and dedication. Our team is here to assist both seasoned pet owners and newcomers alike. Come see us and make your furry friends even happier!</p>
            </div>
        </div>
    </div>
    </div>
  </div>
  <section class="px-6 py-8 space-y-4 bg-white rounded-md drop-shadow-lg md:container md:mx-auto ">
    <div class="flex items-center py-10 ml-10 justify-evenly mt-18">
        <div class="text-center">

            <i class="text-red-500 fa-solid fa-location-dot"></i>
            <p>Address</p>
            <p>General Santos Ave., Lower
                Bicutan Taguig City</p>
        </div>

        <div class="text-center">
            <i class="fa-solid fa-phone"></i>
            <p>Contact Number</p>
            <p>(+63) 9474475371</p>
        </div>

        <div class="text-center">
            <a href="/https://www.facebook.com/profile.php?id=100086414124728">
                <i class="text-blue-500 fa-brands fa-square-facebook"></i>
            </a>
            <p>Facebook Page</p>
            <p>Jennie's Pet Supplies </p>
        </div>

        <div class="text-center">
            <i class="fa-regular fa-clock"></i>
            <p>Opening Hours</p>
            <p>9:00 AM - 10:00 PM</p>
        </div>
    </div>
  </section>

@endsection


