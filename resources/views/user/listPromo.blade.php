@extends('template')
@section('content')
<div class="max-w-5xl mx-auto p-8 bg-white mb-10">
  <h2 class="text-xl font-bold text-gray-800 text-center mb-8">All Promotions</h2>
  <div class="flex items-center justify-between border border-gray-300 rounded-full px-4 py-2 shadow-md mb-8">
    <div>
      <i class="fa-solid fa-tag text-emerald-700 pl-2"></i>
      <input type="text" placeholder="Enter promo code here" class="outline-none px-4 py-2 text-sm text-gray-600 w-64" />
    </div>
    <button class="bg-gradient-to-b from-emerald-500 to-emerald-700 hover:bg-emerald-600 text-white rounded-full px-4 py-2 text-sm">Redeem</button>
  </div>

  <div class="grid gap-6 grid-cols-1 md:grid-cols-2 lg:grid-cols-3">
    @foreach ($listPromo as $item)
      <div class="bg-gradient-to-br from-white to-gray-50 border border-gray-200 rounded-3xl shadow-md p-6">
        <h3 class="text-lg font-semibold text-gray-800">{{$item->name}}</h3>
        <p class="text-sm text-gray-600 mt-2">Discount: <span class="text-emerald-700 font-semibold">{{ number_format($item->discount, 0) }}%</span></p>
        <p class="text-sm text-gray-600">Min Transaction: Rp {{ number_format($item->min_transaction, 0, ',', '.') }}</p>
        <p class="text-sm text-gray-600">Max Discount: Rp {{ number_format($item->max_discount, 0, ',', '.') }}</p>
      </div>
    @endforeach

  </div>
</div>

@endsection
