@extends('template')
@section('content')


<div class="min-h-screen bg-gray-100">
    <h1 class="font-semibold text-emerald-600 pb-1 ml-2 text-3xl mb-4 text-center pt-5">Today's News</h1>  
    <div class="max-h-[800px] overflow-y-auto px-4">
        <div class="flex flex-col gap-4 items-center">
            <a href="{{route('user.detail.news')}}" class="w-full flex flex-col items-center bg-white rounded-lg shadow-lg md:flex-row md:max-w-3xl hover:bg-gray-100 dark:bg-white dark:hover:bg-gray-200 p-3">
                <img class="object-cover w-full rounded-t-lg h-128 md:h-auto md:w-64 md:rounded-none md:rounded-s-lg" src="/assets/news1.jpg" alt="">
                <div class="flex flex-col justify-between p-2 leading-normal">
                    <h5 class="mb-2 text-xl font-semibold tracking-tight text-gray-900 dark:text-black">Noteworthy technology acquisitions 2021</h5>
                    <p class="mb-3 font-normal text-gray-700 dark:text-gray-600 text-xs">Here are the biggest enterprise technology acquisitions of 2021 so far, in reverse chronological order.</p>
                </div>
            </a>

            <a href="" class="w-full flex flex-col items-center bg-white rounded-lg shadow-lg md:flex-row md:max-w-3xl hover:bg-gray-100 dark:bg-white dark:hover:bg-gray-200 p-3">
                <img class="object-cover w-full rounded-t-lg h-128 md:h-auto md:w-64 md:rounded-none md:rounded-s-lg" src="/assets/news1.jpg" alt="">
                <div class="flex flex-col justify-between p-2 leading-normal">
                    <h5 class="mb-2 text-xl font-semibold tracking-tight text-gray-900 dark:text-black">Second News Item</h5>
                    <p class="mb-3 font-normal text-gray-700 dark:text-gray-600 text-xs">Description for the second news item goes here.</p>
                </div>
            </a>

            <a href="" class="w-full flex flex-col items-center bg-white rounded-lg shadow-lg md:flex-row md:max-w-3xl hover:bg-gray-100 dark:bg-white dark:hover:bg-gray-200 p-3">
                <img class="object-cover w-full rounded-t-lg h-128 md:h-auto md:w-64 md:rounded-none md:rounded-s-lg" src="/assets/news1.jpg" alt="">
                <div class="flex flex-col justify-between p-2 leading-normal">
                    <h5 class="mb-2 text-xl font-semibold tracking-tight text-gray-900 dark:text-black">Third News Item</h5>
                    <p class="mb-3 font-normal text-gray-700 dark:text-gray-600 text-xs">Description for the third news item goes here.</p>
                </div>
            </a>

            <a href="" class="w-full flex flex-col items-center bg-white rounded-lg shadow-lg md:flex-row md:max-w-3xl hover:bg-gray-100 dark:bg-white dark:hover:bg-gray-200 p-3">
                <img class="object-cover w-full rounded-t-lg h-128 md:h-auto md:w-64 md:rounded-none md:rounded-s-lg" src="/assets/news1.jpg" alt="">
                <div class="flex flex-col justify-between p-2 leading-normal">
                    <h5 class="mb-2 text-xl font-semibold tracking-tight text-gray-900 dark:text-black">Fourth News Item</h5>
                    <p class="mb-3 font-normal text-gray-700 dark:text-gray-600 text-xs">Description for the fourth news item goes here.</p>
                </div>
            </a>
            
        </div>
    </div>
</div>

@endsection