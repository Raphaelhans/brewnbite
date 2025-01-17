@extends('template')
@section('content')
<div class="py-16 px-8 sm:px-16 lg:px-32 min-h-[59vh]">
  <h2 class="text-xl font-bold text-gray-800 text-center mb-8">Order History</h2>
  <div class="space-y-8">
    @foreach ($listTrans as $htrans)
    <div class="bg-white shadow-xl rounded-2xl border border-gray-100 overflow-hidden">
      <div class="bg-emerald-500 text-white rounded-t-2xl px-4 py-3 flex justify-between items-center">
        <h3 class="text-sm font-semibold">Order ID #{{$htrans->id}}</h3>
        <p class="text-xs">{{ $htrans->created_at->format('d/m/Y') }}</p>
      </div>
      <div class="px-4 py-4 space-y-6">
        @foreach ($htrans->dtrans as $dtrans)
        @php
          $isRated = $dtrans->rating()->exists();
        @endphp
        <!-- Modal -->
        <div id="modal-{{ $dtrans->id }}" class="fixed inset-0 hidden z-50 bg-gray-900 bg-opacity-50 flex justify-center items-center">
          <div class="bg-white rounded-3xl shadow-xl w-96">
            <!-- Modal Header -->
            <div class="flex justify-between items-center bg-gradient-to-r from-emerald-500 to-emerald-700 text-white rounded-t-2xl px-4 py-3">
              <h2 class="text-lg font-semibold">Rate Your Order</h2>
              <button onclick="closeModal('modal-{{ $dtrans->id }}')" class="text-white hover:text-gray-200">
                <svg class="w-5 h-5" fill="none" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" stroke="currentColor">
                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                </svg>
              </button>
            </div>
      
            <!-- Modal Body -->
            <div class="py-6 px-4 space-y-4">
              <p class="text-sm text-gray-600">How would you rate the item you ordered?</p>
              <div class="flex items-center justify-between">
                <span class="text-md font-semibold text-gray-700">{{ $dtrans->product->name }}</span>
                <form method="POST" action="{{ route('user.history.rating') }}">
                  @csrf
                  <input type="hidden" name="id_dtrans" value="{{ $dtrans->id }}">
                  <input type="hidden" name="id_product" value="{{ $dtrans->product->id }}">
                  <input type="number" name="rating" min="1" max="5" class="w-20 px-2 py-1 border border-gray-300 rounded-md" placeholder="1-5">
                </div>
              </div>
              
              <!-- Modal Footer -->
              <div class="flex justify-end space-x-2 px-4 py-3 bg-gray-50 rounded-b-2xl">
                <button onclick="closeModal('modal-{{ $dtrans->id }}')" class="bg-gray-300 text-gray-700 px-4 py-2 rounded-xl hover:bg-gray-400">
                  Cancel
                </button>
                <button onclick="closeModal('modal-{{ $dtrans->id }}')" class="bg-emerald-500 text-white px-4 py-2 rounded-xl hover:bg-emerald-700">
                  Submit
                </button>
              </form>
            </div>
          </div>
        </div>
        <div class="flex justify-between items-center space-x-4">
          <div>
            <h3 class="text-sm font-semibold text-gray-800">{{ $dtrans->product->name }}<span> x{{ $dtrans->amount }}</span></h3>
            <div class="flex gap-2 items-center mb-1">
              <h3 class="text-xs font-semibold text-emerald-500">Rp {{ number_format($dtrans->price_per_item, 0, ',', '.') }}</h3>
            </div>
                <p class="text-xs text-gray-500">
                  @foreach ($dtrans->daddons as $daddon)
                    {{ $daddon->addon->name }} / 
                  @endforeach
                </p>
              </div>
              <div class="flex items-center space-x-4">
                {{-- <button onclick="openModal('modal-{{ $dtrans->id }}')" class="bg-gradient-to-b from-emerald-500 to-emerald-700 hover:bg-emerald-600 text-white rounded-full px-4 py-2 text-sm">Rate</button> --}}
                @if (!$isRated)
                    <button onclick="openModal('modal-{{ $dtrans->id }}')" class="bg-gradient-to-b from-emerald-500 to-emerald-700 hover:bg-emerald-600 text-white rounded-full px-4 py-2 text-sm">Rate</button>
                @else
                    <button class="bg-gray-400 text-white rounded-full px-4 py-2 text-sm" disabled>Rated</button>
                @endif
              </div>
            </div>
          @endforeach
        </div>
        <div class="px-4 py-3 border-t border-gray-200">
          <div class="flex justify-between items-center">
            <p class="text-sm font-bold text-gray-700">Grand Total</p>
            <p class="text-sm font-bold text-emerald-600">Rp {{ number_format($htrans->grandtotal, 0, ',', '.') }}</p>
          </div>
        </div>
      </div>
    @endforeach
  </div>
</div>


@endsection

@section('scripts')
<script>
  function openModal(modalId) {
    const modal = document.getElementById(modalId);
    if (modal) {
      modal.classList.remove("hidden");
    }
  }

  function closeModal(modalId) {
    const modal = document.getElementById(modalId);
    if (modal) {
      modal.classList.add("hidden");
    }
  }
</script>

@endsection
