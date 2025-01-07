@extends('template')
@section('content')
<div class="max-w-4xl mx-auto p-8 bg-gradient-to-br from-gray-50 to-gray-100 shadow-lg rounded-3xl my-10">
  <h2 class="text-xl font-bold text-gray-800 text-center mb-8">Checkout Summary</h2>
  <div class="space-y-4 mb-8">
    <div class="grid grid-cols-3 items-center bg-white p-4 rounded-xl shadow-lg hover:shadow-lg transition-shadow duration-300">
      <p class="text-gray-800 font-medium">Matcha Latte</p>
      <p class="text-center text-gray-500 text-sm">1 x Rp 50,000</p>
      <p class="text-right text-emerald-700 font-semibold">Rp 50,000</p>
    </div>
    <div class="grid grid-cols-3 items-center bg-white p-4 rounded-xl shadow-lg hover:shadow-lg transition-shadow duration-300">
      <p class="text-gray-800 font-medium"> Chocolate Waffle</p>
      <p class="text-center text-gray-500 text-sm">1 x Rp 60,000</p>
      <p class="text-right text-emerald-700 font-semibold">Rp 60,000</p>
    </div>
  </div>

  <div class="mb-8">
    <label for="promo" class="block text-gray-700 font-medium mb-2">Choose a Promo</label>
    <div class="relative">
      <select id="promo" class="w-full border border-gray-300 rounded-xl shadow-lg focus:ring-emerald-500 focus:border-emerald-500 px-4 py-2 bg-white appearance-none">
        <option value="">Select a promo</option>
        <option value="1">Waffle Wednesdays (10%)</option>
        <option value="2">Tea Time Treats (15%)</option>
        <option value="3">Coffee Lovers Delight (20%)</option>
      </select>
      <span class="absolute inset-y-0 right-4 flex items-center pointer-events-none text-gray-400">
        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 9l6 6 6-6" />
        </svg>
      </span>
    </div>
  </div>

  <div class="bg-white p-6 rounded-xl shadow-lg">
    <div class="flex justify-between items-center mb-4">
      <p class="text-gray-700">Subtotal</p>
      <p class="text-gray-800 font-semibold">Rp 150,000</p>
    </div>
    <div class="flex justify-between items-center mb-4">
      <p class="text-red-500">Discount</p>
      <p class="text-red-500 font-semibold">-Rp 22,500</p>
    </div>
    <div class="border-t border-gray-300 my-4"></div>
    <div class="flex justify-between items-center">
      <p class="text-lg font-bold text-gray-800">Total</p>
      <p class="text-lg font-bold text-emerald-700">Rp 127,500</p>
    </div>
  </div>

  <div class="mt-8 text-center">
    <button class="w-full mt-4 md:mt-0 bg-gradient-to-r from-emerald-600 to-emerald-400 text-white px-8 py-3 rounded-3xl shadow-lg text-lg  font-semibold hover:from-emerald-700 hover:to-emerald-500  focus:ring-emerald-200 focus:outline-none transition-all mb-10">
      Checkout
    </button>
  </div>
</div>

@endsection
