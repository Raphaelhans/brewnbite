@extends('template')

@section('content')
<div class="py-16 px-8 sm:px-16 lg:px-32">
  <h2 class="text-xl font-bold text-gray-800 text-center mb-8">Order History</h2>
  <div class="space-y-8">
    <div class="bg-white shadow-xl rounded-2xl border border-gray-100 overflow-hidden">
      <div class="bg-emerald-500 text-white rounded-t-2xl px-4 py-3 flex justify-between items-center">
        <h3 class="text-sm font-semibold">Order ID: #0001</h3>
        <p class="text-xs">12/12/23</p>
      </div>
      <div class="px-4 py-4 space-y-6">
        <div class="flex justify-between items-center space-x-4">
          <div>
            <h3 class="text-sm font-semibold text-gray-800">Matcha Latte<span> x1</span></h3>
            <div class="flex gap-2 items-center mb-1">
              <h3 class="text-xs font-semibold text-emerald-500">Rp 50,000</h3>
            </div>
            <p class="text-xs text-gray-500">Cold / M</p>
          </div>
          <div class="flex items-center space-x-4">
            <button class="bg-gradient-to-b from-emerald-500 to-emerald-700 hover:bg-emerald-600 text-white rounded-full px-4 py-2 text-sm">Rate</button>
          </div>
        </div>
        <div class="flex justify-between items-center space-x-4">
          <div>
            <h3 class="text-sm font-semibold text-gray-800">Chocolate Waffle<span> x1</span></h3>
            <div class="flex gap-2 items-center mb-1">
              <h3 class="text-xs font-semibold text-emerald-500">Rp 20,000</h3>
            </div>
          </div>
          <div class="flex items-center space-x-4">
            <button class="bg-gradient-to-b from-emerald-500 to-emerald-700 hover:bg-emerald-600 text-white rounded-full px-4 py-2 text-sm">Rate</button>
          </div>
        </div>
      </div>
      <div class="px-4 py-3 border-t border-gray-200">
        <div class="flex justify-between items-center">
          <p class="text-sm font-bold text-gray-700">Grand Total</p>
          <p class="text-sm font-bold text-emerald-600">Rp 50,000</p>
        </div>
      </div>
    </div>
  </div>
</div>

@endsection
