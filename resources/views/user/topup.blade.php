@extends('template')
@section('content')
<div class="bg-gray-100 flex items-center justify-center">
  <div class="bg-white p-6 rounded-3xl shadow-md w-full max-w-sm my-20">
    <h2 class="text-2xl font-bold text-emerald-600 text-center mb-4">Top Up Balance</h2>
    <div class="text-center mb-4">
      <p class="text-sm text-black-600">Current Balance:</p>
      <p class="text-xl font-semibold text-black-700">Rp {{ number_format(session('user.credit'), 0, ',', '.')}}</p>
    </div>
    <form action="{{ route('user.topup.process') }}" method="post" class="space-y-4">
			@csrf
      <div>
        <label for="topup" class="block text-sm font-medium text-gray-700 mb-1">Amount</label>
        <input 
          type="number" 
          id="topup" 
          name="amount" 
					min="0"
          placeholder="Enter amount here"
          class="w-full px-4 py-2 bg-gray-100 border border-gray-300 rounded-xl focus:outline-none focus:ring-1 focus:ring-blue-500 focus:border-transparent text-sm"
        >
      </div>
      <button 
        type="submit" 
        class="tracking-wide font-medium bg-emerald-500 text-white w-full py-3 rounded-xl hover:bg-emerald-700 transition duration-200 ease-in-out flex items-center justify-center focus:shadow-outline focus:outline-none text-sm">
        Proceed to Payment
      </button>
    </form>
		@if(session('error'))
        <div class="p-4 mb-4 mx-4 mt-4 text-sm text-red-800 rounded-lg bg-red-200" role="alert">
            <span class="font-medium">{{ session('error') }}</span> try submitting again.
        </div>
    @endif

    @if(session('success'))
        <div class="p-4 mb-4 mx-4 mt-4 text-sm text-green-800 rounded-lg bg-green-200" role="alert">
            <span class="font-medium">{{ session('success') }}</span>
        </div>
    @endif

    @if ($errors->any())
        <div class="p-4 mb-4 mx-4 mt-4 text-sm text-red-800 rounded-lg bg-red-200" role="alert">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
  </div>
</div>

@endsection