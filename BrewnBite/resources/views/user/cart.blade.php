@extends('template')
@section('content')
<div class="max-w-5xl mx-auto mt-10 p-8">
  <h2 class="text-xl font-bold text-gray-800 text-center mb-8">Shopping Cart</h2>
  <div class="space-y-6">
    <div class="flex items-center justify-between bg-gradient-to-br from-white to-[#f0f4f8] rounded-3xl border border-gray-200 p-6 ">
      <div class="flex items-center space-x-6">
        <img src="https://images.pexels.com/photos/20106383/pexels-photo-20106383/free-photo-of-hands-holding-a-matcha-cup.jpeg?auto=compress&cs=tinysrgb&w=1260&h=750&dpr=1" alt="Product Image" class="w-24 h-24 rounded-xl object-cover shadow-md border border-gray-300">
        <div>
          <h3 class="text-lg font-bold text-gray-800">Matcha Latte</h3>
          <div class="flex gap-2 items-center mb-2">
            <i class="fa-solid fa-money-bill-wave text-emerald-500"></i>
            <h3 class="text-sm font-semibold text-emerald-500">Rp 50000</h3>
          </div>
          <p class="text-sm text-gray-500">Cold / M</p>
        </div>
      </div>
      <div class="flex items-center space-x-10">
        <div class="flex items-center bg-[#eaf1f8] rounded-full">
          <button class="px-3 py-2 text-gray-600 hover:bg-gray-200 focus:outline-none rounded-l-full transition-colors">-</button>
          <span class="px-4 py-2 text-gray-800 font-semibold">1</span>
          <button class="px-3 py-2 text-gray-600 hover:bg-gray-200 focus:outline-none rounded-r-full transition-colors">+</button>
        </div>
        <p class="text-lg font-bold text-emerald-700">Rp 50000</p>
      </div>
      <button class="text-gray-400 hover:text-red-600 transition-colors focus:outline-none">
        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
        </svg>
      </button>
    </div>
  </div>

  <div class="border-t border-gray-300 my-8"></div>

  <div class="flex flex-col md:flex-row  justify-between">
    <p class="text-xl font-bold text-gray-800">Total <span class="text-emerald-700"> Rp 50000</span></p>
    <button class="w-fit mt-4 md:mt-0 bg-gradient-to-r from-emerald-600 to-emerald-400 text-white px-8 py-3 rounded-3xl shadow-lg text-lg  font-semibold hover:from-emerald-700 hover:to-emerald-500  focus:ring-emerald-200 focus:outline-none transition-all mb-10">
      Proceed to Checkout
    </button>
  </div>
</div>
@endsection
