<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
class NewsController extends Controller
{
    public function news(){
        
        // GET https://newsapi.org/v2/top-headlines?sources=bbc-news&apiKey=API_KEY
        
        // $response = Http::get('https://newsapi.org/v2/top-headlines?sources=bbc-news&apiKey='.env('NEWS_API_KEY'));
        // dd($response->json());
        // // dd(env('NEWS_API_KEY')); 
		return view('user.news');
	}

	public function detailNews(){
		return view('user.detailnews');
	}
}
