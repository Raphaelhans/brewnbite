@extends('template')
@section('content')

<div class="min-h-screen bg-gray-100">
    <h1 class="font-semibold text-emerald-600 pb-1 ml-2 text-3xl mb-4 text-center pt-5">Today's News</h1>  
    <div class="max-h-[800px] overflow-y-auto px-4">
        @if (count($articles) > 0)
        <div class="flex flex-col gap-4 items-center">
            @foreach ($articles as $article)
                <a href="{{route('user.detail.news')}}" class="w-full flex flex-col items-center bg-white rounded-lg shadow-lg md:flex-row md:max-w-3xl hover:bg-gray-100 dark:bg-white dark:hover:bg-gray-200 p-3">
                    <img class="object-cover w-full rounded-t-lg h-32 md:h-32 md:w-48 md:rounded-none md:rounded-s-lg" 
                        src="{{ $article['urlToImage']}}" 
                        alt="{{ $article['title'] }}">
                    <div class="flex flex-col justify-between p-2 leading-normal">
                        <h5 class="mb-2 text-lg font-semibold tracking-tight text-gray-900 dark:text-black line-clamp-2">
                            {{ $article['title'] }}
                        </h5>
                        <p class="mb-3 font-normal text-gray-700 dark:text-gray-600 text-sm line-clamp-2">
                            {{ $article['description'] }}
                        </p>
                        <p class="text-xs text-gray-500">
                            Published: {{ \Carbon\Carbon::parse($article['publishedAt'])->format('M d, Y H:i') }}
                        </p>
                    </div>
                </a> 
            @endforeach
        </div>
        @endif
    </div>
</div>

@endsection