@extends('template') 
@section('content')
<div class="flex justify-center items-center min-h-screen bg-cover bg-center py-8 w-full" style="background-image: url('{{ asset('assets/linen.jpg') }}');">
  <div class="max-w-2xl w-full flex flex-col space-y-6 bg-white p-6 rounded-xl shadow-lg">
    <h2 class="text-xl font-bold text-gray-700 text-center mb-6">Payment Detail</h2>
    <div class="space-y-4">
      <div class="text-left">
        <h3 class="text-sm font-normal text-gray-500">Top Up ID #{{ $data->id }}</h3>
      </div>
      <div class="space-y-1">
        <h3 class="text-xs font-normal text-gray-700">Top Up Date</h3>
        <h2 class="text-base font-semibold text-gray-800">{{ $data->transdate }}</h2>
      </div>
      <div class="space-y-1">
        <h3 class="text-xs font-normal text-gray-700">Customer Name</h3>
        <h2 class="text-base font-semibold text-gray-800">{{ session('user.name') }}</h2>
      </div>
      <div class="space-y-1">
        <h3 class="text-xs font-normal text-gray-700">Top-up Amount</h3>
        <h2 class="text-base font-semibold text-emerald-700">Rp {{ number_format($data->amount, 0, ',', '.') }}</h2>
      </div>
    </div>
    <div class="flex justify-center">
      <button id="pay-button" class="w-full bg-gradient-to-r from-[#F4A298] to-[#E8897A] text-white text-lg font-semibold py-2 px-6 rounded-full shadow-lg hover:from-[#e8897a] hover:to-[#d97060] focus:ring-4 focus:ring-[#F4A298] focus:outline-none transition-all duration-300">
        Pay Now
      </button>
    </div>
  </div>
</div>

@endsection

@section('scripts')
  <script src="https://app.sandbox.midtrans.com/snap/snap.js" data-client-key="{{ env('MIDTRANS_CLIENT_KEY') }}"></script>
  <script type="text/javascript">
    document.getElementById('pay-button').onclick = function(){
      snap.pay('{{ $topup->snap_token }}', {
        onSuccess: function(result){
          window.location.href = '{{ route('user.topup.success', ['topup' => $topup->id]) }}';
        },
        onPending: function(result){
          document.getElementById('result-json').innerHTML += JSON.stringify(result, null, 2);
        },
        onError: function(result){
          document.getElementById('result-json').innerHTML += JSON.stringify(result, null, 2);
        }
      });
    };
  </script>
@endsection
