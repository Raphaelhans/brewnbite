@extends('template')
@section('content')

<div class="min-h-screen bg-gray-100 flex items-center justify-center">
    <div class="bg-white p-8 rounded-lg shadow-md w-full max-w-md m-6">
        <h2 class="text-2xl font-bold text-emerald-600 text-center mb-6">Edit Profile</h2>

        <div class="flex justify-center mb-4">
            @if ($profile_picture)
                <img 
                    src="{{ $profile_picture }}" 
                    alt="Profile Picture"
                    class="h-24 w-24 bg-[#fcdad0] rounded-full"
                >
            @else
                @php
                    $words = explode(' ', trim($user['name'] ?? ''));
                    $initials = '';
                    foreach ($words as $index => $word) {
                        if ($index > 1) break;
                        $initials .= strtoupper(substr($word, 0, 1));
                    }
                @endphp
                <div class="h-24 w-24 bg-[#fcdad0] rounded-full flex items-center justify-center text-emerald-600 font-semibold text-center text-4xl">
                    {{ $initials }} 
                </div>
            @endif
        </div>
        <form action="{{ route('user.update') }}" method="post" enctype="multipart/form-data">
            @csrf
            <div class="mb-4">
                <label for="email" class="block text-sm font-medium text-gray-600 mb-1">Email</label>
                <input 
                    type="email" 
                    id="email"
                    name="email"
                    value="{{ $user['email'] }}" 
                    disabled
                    class="w-full px-4 py-2 bg-gray-100 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-gray-400 focus:border-transparent cursor-not-allowed"
                >
            </div>

            <div class="mb-4">
                <label for="name" class="block text-sm font-medium text-gray-600 mb-1">Name</label>
                <input 
                    type="text" 
                    id="name" 
                    name="name"
                    value="{{ $user['name']}}"
                    placeholder="Enter your name" 
                    class="w-full px-4 py-2 bg-white border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-400 focus:border-transparent"
                >
            </div>

            <div class="mb-4">
                <label for="password" class="block text-sm font-medium text-gray-600 mb-1">Password</label>
                <input 
                    type="password" 
                    id="password" 
                    name="password"
                    placeholder="Enter your password" 
                    class="w-full px-4 py-2 bg-white border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-400 focus:border-transparent"
                >
            </div>

            <div class="mb-6">
                <label for="profile-picture" class="block text-sm font-medium text-gray-600 mb-1">Profile Picture</label>
                <input 
                    type="file" 
                    id="profile-picture" 
                    name="profile_picture"
                    class="w-full px-4 py-2 bg-white border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-400 focus:border-transparent"
                >
            </div>

            <button 
                type="submit" 
                class="tracking-wide font-semibold bg-emerald-500 text-gray-100 w-full py-4 rounded-xl hover:bg-emerald-700 transition-all duration-300 ease-in-out flex items-center justify-center focus:shadow-outline focus:outline-none">
                Save Profile
            </button>
        </form>
    </div>
</div>

@endsection