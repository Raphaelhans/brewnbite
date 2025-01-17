@extends('template')
@section('content')
<div class="max-w-4xl mx-auto p-8 bg-gradient-to-br from-gray-50 to-gray-100 shadow-lg rounded-3xl my-10">
    <h2 class="text-xl font-bold text-gray-800 text-center mb-8">Checkout Summary</h2>
    
    <div class="space-y-4 mb-8">
        @foreach($cart as $item)
        <div class="grid grid-cols-3 items-center bg-white p-4 rounded-xl shadow-lg hover:shadow-lg transition-shadow duration-300">
            <p class="text-gray-800 font-medium">{{ $item['name'] }}</p>
            <p class="text-center text-gray-500 text-sm">{{ $item['quantity'] }} x Rp {{ number_format($item['price'], 0, ',', '.') }}</p>
            <p class="text-right text-emerald-700 font-semibold">Rp {{ number_format($item['price'] * $item['quantity'], 0, ',', '.') }}</p>
        </div>
        @endforeach
    </div>

    <form method="GET" action="{{ route('user.cart.summary') }}" id="promoForm">
        <div class="mb-8">
            <label for="promo" class="block text-gray-700 font-medium mb-2">Choose a Promo</label>
            <div class="relative">
                <select name="promo" id="promo" onchange="document.getElementById('promoForm').submit()" class="w-full border border-gray-300 rounded-xl shadow-lg focus:ring-emerald-500 focus:border-emerald-500 px-4 py-2 bg-white appearance-none">
                    <option value="">Select a promo</option>
                    @foreach($promos as $listPromo)
                    <option value="{{ $listPromo->id }}" {{ ($promo && $promo->id == $listPromo->id) ? 'selected' : '' }}>
                        {{ $listPromo->name }} ({{ $listPromo->discount }}% off)
                    </option>
                    @endforeach
                </select>
                <span class="absolute inset-y-0 right-4 flex items-center pointer-events-none text-gray-400">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 9l6 6 6-6" />
                    </svg>
                </span>
            </div>
        </div>
    </form>

    <div class="bg-white p-6 rounded-xl shadow-lg">
        <div class="flex justify-between items-center mb-4">
            <p class="text-gray-700">Subtotal</p>
            <p class="text-gray-800 font-semibold">Rp {{ number_format($totalPrice, 0, ',', '.') }}</p>
        </div>
        
        @if ($promo)
        <div class="flex justify-between items-center mb-4">
            <p class="text-gray-700">Promo Discount ({{ $promo->discount }}%)</p>
            <p class="text-green-500 font-semibold">-Rp {{ number_format(min($totalPrice * ($promo->discount / 100), $promo->max_discount), 0, ',', '.') }}</p>
        </div>
        @endif

        @if($disc_member > 0)
        <div class="flex justify-between items-center mb-4">
            <p class="text-gray-700">Membership Discount ({{ $disc_member }}%)</p>
            <p class="text-green-500 font-semibold">-Rp {{ number_format($totalPrice * ($disc_member / 100), 0, ',', '.') }}</p>
        </div>
        @endif

        <div class="border-t border-gray-300 my-4"></div>
        <div class="flex justify-between items-center">
            <p class="text-lg font-bold text-gray-800">Total</p>
            <p class="text-lg font-bold text-emerald-700">
                Rp {{ number_format(
                    $totalPrice 
                    - ($totalPrice * ($disc_member / 100))
                    - ($promo ? min($totalPrice * ($promo->discount / 100), $promo->max_discount) : 0),
                    0, ',', '.'
                ) }}
            </p>
        </div>
    </div>

    <form method="POST" action="{{ route('user.cart.checkout') }}">
        @csrf
        <div class="mt-8 text-center">
            <button type="submit" class="w-full mt-4 bg-gradient-to-r from-emerald-600 to-emerald-400 text-white px-8 py-3 rounded-3xl shadow-lg text-lg font-semibold hover:from-emerald-700 hover:to-emerald-500 focus:ring-emerald-200 focus:outline-none transition-all mb-10">
                Checkout
            </button>
        </div>
    </form>
</div>
@endsection
