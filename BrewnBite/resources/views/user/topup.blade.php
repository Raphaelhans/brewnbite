@extends('template')
@section('content')
<div class="min-h-screen bg-gray-100 flex items-center justify-center">
    <div class="bg-white p-10 rounded-xl shadow-lg w-full max-w-md">
        <h2 class="text-4xl font-bold text-emerald-600 text-center mb-8">Top Up Balance</h2>

        <div class="text-center mb-8">
            <p class="text-xl text-black-600">Current Balance:</p>
            <p class="text-3xl font-semibold text-black-700">Rp.50.000</p>
        </div>

        <form action="" method="post" class="space-y-8">
            <div>
                <label for="topup" class="block text-lg font-medium text-gray-700 mb-3">Enter Amount</label>
                <input 
                    type="number" 
                    id="topup" 
                    name="topup" 
                    placeholder="e.g., 1000"
                    class="w-full px-5 py-3 bg-gray-100 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent text-lg"
                >
            </div>

            <button 
                type="submit" 
                class="tracking-wide font-semibold bg-emerald-500 text-gray-100 w-full py-5 rounded-xl hover:bg-emerald-700 transition-all duration-300 ease-in-out flex items-center justify-center focus:shadow-outline focus:outline-none text-lg">
                Top Up Now
            </button>
        </form>
    </div>
</div>

@endsection
