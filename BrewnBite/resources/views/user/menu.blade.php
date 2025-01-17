@extends('template')
@section('content')
<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 320"><path fill="#F4A298" fill-opacity="1" d="M0,128L34.3,112C68.6,96,137,64,206,85.3C274.3,107,343,181,411,192C480,203,549,149,617,144C685.7,139,754,181,823,170.7C891.4,160,960,96,1029,74.7C1097.1,53,1166,75,1234,74.7C1302.9,75,1371,53,1406,42.7L1440,32L1440,0L1405.7,0C1371.4,0,1303,0,1234,0C1165.7,0,1097,0,1029,0C960,0,891,0,823,0C754.3,0,686,0,617,0C548.6,0,480,0,411,0C342.9,0,274,0,206,0C137.1,0,69,0,34,0L0,0Z"></path></svg>
<div class="flex flex-col items-center justify-center mb-10">
  <div class="flex flex-col items-center space-y-4">
    <h1 class="text-5xl font-bold text-emerald-700 animate-bounce">Our Menu</h1>
  </div>
  <div class="flex items-center border border-gray-300 rounded-full px-4 py-2 shadow-sm mt-8 transition-shadow duration-200 hover:shadow-lg">
    <form action="{{ route('user.menu.index') }}" method="GET" class="flex items-center w-full">
      <i class="fa-solid fa-magnifying-glass text-emerald-700 pl-2"></i>
      <input 
        type="text" 
        name="search" 
        value="{{ request('search') }}" 
        placeholder="Search here" 
        class="outline-none px-4 py-2 text-sm text-gray-600 w-full placeholder-gray-400 focus:ring-2 focus:ring-emerald-500 focus:border-emerald-500"
      />
      <button 
        type="submit" 
        class="ml-2 bg-gradient-to-b from-emerald-500 to-emerald-700 hover:from-emerald-600 hover:to-emerald-800 text-white rounded-full px-6 py-2 text-sm transition-colors duration-200"
      >
        Search
      </button>
    </form>
  </div>
  

  <div class="flex gap-12 my-10">
    {{-- <button href="{{ route('user.menu.index') }}" class="bg-gradient-to-b from-emerald-500 to-emerald-700 hover:bg-brown-600 text-white rounded-full px-6 text-sm">All</button> --}}
    <a href="{{ route('user.menu.index', ['category' => 'Beverage']) }}" class="flex flex-col items-center gap-2 text-sm text-gray-600">
        <img src="{{ asset('assets/beverage.png') }}" class="w-14">
        <p class="font-semibold">Beverage</p>
    </a>
    <a href="{{ route('user.menu.index', ['category' => 'Snack']) }}" class="flex flex-col items-center gap-2 text-sm text-gray-600">
        <img src="{{ asset('assets/snack.png') }}" class="w-14">
        <p class="font-semibold">Snack</p>
    </a>
    <a href="{{ route('user.menu.index', ['category' => 'Dessert']) }}" class="flex flex-col items-center gap-2 text-sm text-gray-600">
        <img src="{{ asset('assets/dessert.png') }}" class="w-14">
        <p class="font-semibold">Dessert</p>
    </a>
  </div>
  @if ($categoryFilter === 'Beverage')
      <p>All kinds of beverages</p>
  @elseif ($categoryFilter === 'Snack')
      <p>All kinds of snacks</p>
  @elseif ($categoryFilter === 'Dessert')
      <p>All kinds of desserts</p>
  @else
      <p>Browse our menu</p>
  @endif
  @if ($categoryFilter)
    <div class="flex gap-4 mt-10">
      <a href="{{ route('user.menu.index', ['subcategory' => 'All', 'category' => $categoryFilter]) }}" 
        class="bg-gradient-to-b from-emerald-500 to-emerald-700 hover:bg-brown-600 text-white rounded-full px-4 py-2 text-sm">
          All
      </a>
      @foreach ($subcategories as $subcategory)
          <a href="{{ route('user.menu.index', ['subcategory' => $subcategory->name, 'category' => $categoryFilter]) }}" 
            class="bg-gradient-to-b from-emerald-500 to-emerald-700 hover:bg-brown-600 text-white rounded-full px-4 py-2 text-sm">
              {{ $subcategory->name }}
          </a>
      @endforeach
    </div>
  @endif
  <div class="flex items-center justify-center p-4 my-10">
    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-8">
      @foreach ($product as $item) 
      <form action="{{ route('user.menu.detail', ['id' => $item->id]) }}" method="get">
        @csrf
        <div class="bg-white rounded-3xl shadow-xl overflow-hidden w-full transform hover:scale-105 transition-transform duration-300">
            <div class="absolute top-3 left-3 bg-gradient-to-b from-[#F4A298] to-[#F27D6A] text-white rounded-full px-4 py-1 text-xs shadow-md">
                {{ $item->subcategory->name }}
            </div>
            <img src="{{ $item->img_url }}" alt="img" class="w-full h-48 object-cover">
            <div class="p-5">
                <div class="flex justify-between items-center">
                    <h3 class="font-bold text-emerald-600 text-base">{{ $item->name }}</h3>
                    <p class="text-gray-500 text-sm font-medium">Rp {{ number_format($item->price, 0, ',', '.') }}</p>
                </div>
                <div class="flex items-center mt-3 space-x-2">
                    <i class="fa-solid fa-star text-yellow-400 text-sm"></i>
                    <span class="text-gray-600 font-medium text-sm">{{ $item->rating }}</span>
                    <span class="text-gray-400 text-sm">({{ $item->reviewCount }} reviews)</span>
                </div>
                <button class="mt-6 w-full bg-gradient-to-r from-emerald-500 to-emerald-700 text-white py-3 px-6 text-sm font-semibold rounded-xl hover:from-emerald-600 hover:to-emerald-800 shadow-md transition-all duration-300">
                    Buy Now
                </button>
            </div>
        </div>
      </form>       
      @endforeach
    </div>
  </div>
</div>
@endsection