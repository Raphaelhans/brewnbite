@extends('template')
@section('content')
<div class="px-40 py-10 bg-gray-100 container">
  <h2 class="text-xl font-bold text-indigo-500 text-left mb-2">Detail Topup</h2>
  <div class="container w-full flex flex-col bg-white rounded-xl  border border-gray-200 p-8">
    <div class="mb-4">
      <h2 class="text-xs font-normal text-gray-400 text-left mb-2">Top Up ID #{{ $data->id }}</h2>
    </div>
    <div class="mb-4">
      <h2 class="text-xs font-normal text-gray-800 text-left mb-2">Top Up Date</h2>
      <h2 class="text-md font-semibold text-gray-800 text-left ">{{ $data->transdate }}</h2>
    </div>
    <div class="mb-4">
      <h2 class="text-xs font-normal text-gray-800 text-left mb-2">Customer Name</h2>
      <h2 class="text-md font-semibold text-gray-800 text-left "> {{ $data->customer }}</h2>
    </div>
    <div class="mb-4">
      <h2 class="text-xs font-normal text-gray-800 text-left mb-2">Top-up amount</h2>
      <h2 class="text-md font-semibold text-gray-800 text-left ">Rp {{ number_format($data->amount, 0, ',', '.')  }}</h2>
    </div>
    {{-- <form action="{{ route('topup.process')}}" method="post"> --}}
      {{-- @csrf --}}
      <div class="flex justify-center">
        <button type="submit" id="pay-button" class="mt-5 tracking-wide w-full font-semibold bg-indigo-500 text-gray-100 py-2 rounded-lg hover:bg-indigo-700 transition-all duration-300 ease-in-out flex items-center justify-center focus:shadow-outline focus:outline-none px-5">Pay</button>
      </div>
    {{-- </form> --}}
  </div>
</div>

@endsection

@section('scripts')
  <script src="https://app.sandbox.midtrans.com/snap/snap.js" data-client-key="{{ env('MIDTRANS_CLIENT_KEY') }}"></script>
  <script type="text/javascript">
    document.getElementById('pay-button').onclick = function(){
      snap.pay('{{ $topup->snap_token }}', {
        // Optional
        onSuccess: function(result){
          window.location.href = '{{ route('topup.success', ['topup' => $topup->id]) }}';
        },
        // Optional
        onPending: function(result){
          document.getElementById('result-json').innerHTML += JSON.stringify(result, null, 2);
        },
        // Optional
        onError: function(result){
          document.getElementById('result-json').innerHTML += JSON.stringify(result, null, 2);
        }
      });
    };
  </script>
@endsection