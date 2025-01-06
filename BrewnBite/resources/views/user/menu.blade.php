@extends('template')
@section('content')
<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 320"><path fill="#F4A298" fill-opacity="1" d="M0,128L34.3,112C68.6,96,137,64,206,85.3C274.3,107,343,181,411,192C480,203,549,149,617,144C685.7,139,754,181,823,170.7C891.4,160,960,96,1029,74.7C1097.1,53,1166,75,1234,74.7C1302.9,75,1371,53,1406,42.7L1440,32L1440,0L1405.7,0C1371.4,0,1303,0,1234,0C1165.7,0,1097,0,1029,0C960,0,891,0,823,0C754.3,0,686,0,617,0C548.6,0,480,0,411,0C342.9,0,274,0,206,0C137.1,0,69,0,34,0L0,0Z"></path></svg>
<div class="flex flex-col items-center justify-center mb-10">
  <div class="flex flex-col items-center space-y-4">
    <h1 class="text-5xl font-bold text-emerald-700 animate-bounce">Our Menu <span></span></h1>
  </div>
  <div class="flex items-center border border-gray-300 rounded-full px-4 py-2 shadow-md mt-8">
    <i class="fa-solid fa-magnifying-glass text-emerald-700 pl-2"></i>
    <input type="text" placeholder="Search here" class="outline-none px-4 py-2 text-sm text-gray-600 w-64"
    />
    <button class="bg-gradient-to-b from-emerald-500 to-emerald-700 hover:bg-brown-600 text-white rounded-full px-4 py-2 text-sm">Search</button>
  </div>

  <div class="flex gap-12 my-10">
    {{-- <button class="bg-gradient-to-b from-emerald-500 to-emerald-700 hover:bg-brown-600 text-white rounded-full px-6 text-sm">All</button> --}}
    <a href="" class="flex flex-col items-center gap-2 text-sm text-gray-600">
      <img src="{{ asset('assets/beverage.png') }}"class="w-14">
      <p class="font-semibold">Beverage</p>
    </a>
    <a href="" class="flex flex-col items-center gap-2 text-sm text-gray-600">
      <img src="{{ asset('assets/snack.png') }}"class="w-14">
      <p class="font-semibold">Snack</p>
    </a>
    <a href="" class="flex flex-col items-center gap-2 text-sm text-gray-600">
      <img src="{{ asset('assets/dessert.png') }}"class="w-14">
      <p class="font-semibold">Dessert</p>
    </a>
  </div>
  <p>All kinds of beverages</p>
  <div class="flex gap-4 mt-10">
    <button class="bg-gradient-to-b from-emerald-500 to-emerald-700 hover:bg-brown-600 text-white rounded-full px-4 py-2 text-sm">All</button>
    <button class="bg-gradient-to-b from-emerald-500 to-emerald-700 hover:bg-brown-600 text-white rounded-full px-4 py-2 text-sm">Non Coffe</button>
    <button class="bg-gradient-to-b from-emerald-500 to-emerald-700 hover:bg-brown-600 text-white rounded-full px-4 py-2 text-sm">Tea</button>
  </div>
  <div class="flex items-center justify-center p-4 my-10">
    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-8">
      <div class="bg-white rounded-3xl shadow-xl overflow-hidden w-full transform hover:scale-105 transition-transform duration-300">
        <button class="absolute top-3 left-3 bg-gradient-to-b from-[#F4A298] to-[#F27D6A] text-white rounded-full px-4 py-1 text-xs shadow-md">Coffee
        </button>
        <img src="https://assets.promediateknologi.id/crop/0x0:0x0/750x500/webp/photo/2023/05/22/Red-Velvet-cake-2453917777.png" alt="Red Velvet Cake" class="w-full h-48 object-cover">
        <div class="p-5">
          <div class="flex justify-between items-center">
            <h3 class="font-bold text-emerald-600 text-base">Red Velvet Cake</h3>
            <p class="text-gray-500 text-sm font-medium">Rp 50.000</p>
          </div>
          <div class="flex items-center mt-3 space-x-2">
            <i class="fa-solid fa-star text-yellow-400 text-sm"></i>
            <span class="text-gray-600 font-medium text-sm">4.96</span>
            <span class="text-gray-400 text-sm">(76 reviews)</span>
          </div>
          <button class="mt-6 w-full bg-gradient-to-r from-emerald-500 to-emerald-700 text-white py-3 px-6 text-sm font-semibold rounded-xl hover:from-emerald-600 hover:to-emerald-800 shadow-md transition-all duration-300">
            Add to Cart
          </button>
        </div>
      </div>
      <div class="bg-white rounded-3xl shadow-xl overflow-hidden w-full transform hover:scale-105 transition-transform duration-300">
        <button class="absolute top-3 left-3 bg-gradient-to-b from-[#F4A298] to-[#F27D6A] text-white rounded-full px-4 py-1 text-xs shadow-md">Coffee
        </button>
        <img src="https://assets.promediateknologi.id/crop/0x0:0x0/750x500/webp/photo/2023/05/22/Red-Velvet-cake-2453917777.png" alt="Red Velvet Cake" class="w-full h-48 object-cover">
        <div class="p-5">
          <div class="flex justify-between items-center">
            <h3 class="font-bold text-emerald-600 text-base">Red Velvet Cake</h3>
            <p class="text-gray-500 text-sm font-medium">Rp 50.000</p>
          </div>
          <div class="flex items-center mt-3 space-x-2">
            <i class="fa-solid fa-star text-yellow-400 text-sm"></i>
            <span class="text-gray-600 font-medium text-sm">4.96</span>
            <span class="text-gray-400 text-sm">(76 reviews)</span>
          </div>
          <button class="mt-6 w-full bg-gradient-to-r from-emerald-500 to-emerald-700 text-white py-3 px-6 text-sm font-semibold rounded-xl hover:from-emerald-600 hover:to-emerald-800 shadow-md transition-all duration-300">
            Add to Cart
          </button>
        </div>
      </div>
      <div class="bg-white rounded-3xl shadow-xl overflow-hidden w-full transform hover:scale-105 transition-transform duration-300">
        <button class="absolute top-3 left-3 bg-gradient-to-b from-[#F4A298] to-[#F27D6A] text-white rounded-full px-4 py-1 text-xs shadow-md">Coffee
        </button>
        <img src="https://assets.promediateknologi.id/crop/0x0:0x0/750x500/webp/photo/2023/05/22/Red-Velvet-cake-2453917777.png" alt="Red Velvet Cake" class="w-full h-48 object-cover">
        <div class="p-5">
          <div class="flex justify-between items-center">
            <h3 class="font-bold text-emerald-600 text-base">Red Velvet Cake</h3>
            <p class="text-gray-500 text-sm font-medium">Rp 50.000</p>
          </div>
          <div class="flex items-center mt-3 space-x-2">
            <i class="fa-solid fa-star text-yellow-400 text-sm"></i>
            <span class="text-gray-600 font-medium text-sm">4.96</span>
            <span class="text-gray-400 text-sm">(76 reviews)</span>
          </div>
          <button class="mt-6 w-full bg-gradient-to-r from-emerald-500 to-emerald-700 text-white py-3 px-6 text-sm font-semibold rounded-xl hover:from-emerald-600 hover:to-emerald-800 shadow-md transition-all duration-300">
            Add to Cart
          </button>
        </div>
      </div>
      
    </div>
  </div>
</div>

@endsection