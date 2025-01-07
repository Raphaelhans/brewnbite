@extends('template')
@section('content')
<div class="flex justify-center items-center min-h-screen bg-cover bg-center py-10 w-full" style="background-image: url('{{ asset('assets/linen.jpg') }}');">
  <div class="max-w-6xl w-full flex space-x-10">
    <div class="w-1/2">
      {{-- <img src="https://images.pexels.com/photos/20106383/pexels-photo-20106383/free-photo-of-hands-holding-a-matcha-cup.jpeg?auto=compress&cs=tinysrgb&w=1260&h=750&dpr=1" class="rounded-2xl w-full shadow-lg"> --}}
      <img src="https://images.pexels.com/photos/20106383/pexels-photo-20106383/free-photo-of-hands-holding-a-matcha-cup.jpeg?auto=compress&cs=tinysrgb&w=1260&h=750&dpr=1" style="border-radius:32% 68% 64% 36% / 33% 53% 47% 67% ;" class="shadow-lg">
    </div>
    <div class="w-1/2 flex flex-col justify-between">
      <h1 class="font-bold tracking-[0.75em] text-sm mb-4 text-emerald-700">BEVERAGE</h1>
      <h1 class="text-5xl font-bold text-emerald-700 mb-2">Refreshing Mango Smoothie</h1>
      <button class="w-fit bg-gradient-to-b from-[#F4A298] to-[#F27D6A] text-white rounded-full px-4 py-1 text-xs shadow-md">Coffee
      </button>
      <div class="flex items-center mt-3 space-x-2">
        <i class="fa-solid fa-star text-yellow-400 text-sm"></i>
        <span class="text-gray-600 font-medium text-sm">4.96</span>
        <span class="text-gray-600 text-sm">(76 reviews)</span>
      </div>
      <p class="text-sm text-gray-700 mt-4 leading-relaxed">
        A tropical blend of fresh mango, yogurt, and ice, perfect for cooling off on a hot day. 
        Enjoy the natural sweetness with a creamy texture!
      </p>
      <div class="mt-6 flex flex-col md:flex-row md:space-x-14">
        <div>
          <h2 class="text-xl font-semibold text-gray-800">Temperature</h2>
          <div class="flex space-x-4 mt-3">
            <label class="flex flex-col items-center space-y-1">
              <input type="radio" name="mood" value="hot" class="hidden peer">
              <div class="w-12 h-12 flex items-center justify-center rounded-full border-2 border-gray-300 bg-white shadow-sm peer-checked:border-emerald-700 peer-checked:shadow-md transition">
                <span>🔥</span>
              </div>
              <span class="text-sm text-gray-600">Hot</span>
            </label>
            <label class="flex flex-col items-center space-y-1">
              <input type="radio" name="mood" value="cold" class="hidden peer">
              <div class="w-12 h-12 flex items-center justify-center rounded-full border-2 border-gray-300 bg-white shadow-sm peer-checked:border-emerald-700 peer-checked:shadow-md transition">
                <span>❄️</span>
              </div>
              <span class="text-sm text-gray-600">Cold</span>
            </label>
          </div>
        </div>
      
        <!-- Size -->
        <div>
          <h2 class="text-xl font-semibold text-gray-800">Size</h2>
          <div class="flex space-x-4 mt-3">
            <label class="flex flex-col items-center space-y-1">
              <input type="radio" name="size" value="small" class="hidden peer">
              <div class="w-12 h-12 flex items-center justify-center rounded-full border-2 border-gray-300 bg-white shadow-sm peer-checked:border-emerald-700 peer-checked:shadow-md transition">
                <span class="text-lg font-medium text-gray-800">S</span>
              </div>
              <span class="text-sm text-gray-600">Small</span>
            </label>
            <label class="flex flex-col items-center space-y-1">
              <input type="radio" name="size" value="medium" class="hidden peer">
              <div class="w-12 h-12 flex items-center justify-center rounded-full border-2 border-gray-300 bg-white shadow-sm peer-checked:border-emerald-700 peer-checked:shadow-md transition">
                <span class="text-lg font-medium text-gray-800">M</span>
              </div>
              <span class="text-sm text-gray-600">Medium</span>
            </label>
            <label class="flex flex-col items-center space-y-1">
              <input type="radio" name="size" value="large" class="hidden peer">
              <div class="w-12 h-12 flex items-center justify-center rounded-full border-2 border-gray-300 bg-white shadow-sm peer-checked:border-emerald-700 peer-checked:shadow-md transition">
                <span class="text-lg font-medium text-gray-800">L</span>
              </div>
              <span class="text-sm text-gray-600">Large</span>
            </label>
          </div>
        </div>
      </div>
      
      <p class="text-sm text-rose-500 italic mt-5">*Suitable for {weather name} condition</p>
      {{-- <button class="mt-8 bg-gradient-to-b from-[#F4A298] to-[#F27D6A] text-white py-3 px-8 rounded-lg text-xl shadow-md hover:from-[#F27D6A] hover:to-[#F4A298] focus:ring-4 focus:ring-[#F4A298] focus:outline-none transition-all">
        Add to Cart
      </button> --}}
      <button class="bg-gradient-to-r from-[#F4A298] to-[#E8897A] hover:from-[#e8897a] hover:to-[#d97060] text-white text-lg font-bold py-3 px-8 rounded-full w-fit shadow-lg transition-all duration-300  mt-10">
        Add to Cart
      </button>
      
    </div>
  </div>
</div>

@endsection