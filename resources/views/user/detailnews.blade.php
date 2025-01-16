@extends('template')
@section('content')

<div class="min-h-screen flex justify-center items-center bg-gray-100">
    <div class="w-1/2 bg-white rounded-lg shadow-lg overflow-hidden m-8">
        <div>
            <img src="{{ $article['urlToImage'] }}" alt="Image" class="w-full h-auto object-contain">
        </div>
        <div class="p-10">
            <h1 class="text-2xl font-bold mb-8">{{ $article['title'] }}</h1>
            <p class="text-gray-600 leading-relaxed mb-6 text-lg">
                {{$article['content'] }}
            </p>
            <p class="text-gray-500 text-sm mt-4">
                <a href="{{ $article['url'] }}" target="_blank" class="text-blue-500 underline">
                    Read More
                </a>
            </p>
            <p class="text-gray-500 text-sm">
                Published: {{ \Carbon\Carbon::parse($article['publishedAt'])->format('M d, Y H:i') }}
            </p>
        </div>
    </div>
</div>
@endsection