<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class NewsController extends Controller
{
    public function news()
    {

        // GET https://newsapi.org/v2/top-headlines?sources=bbc-news&apiKey=API_KEY

        $response = Http::get('https://newsapi.org/v2/top-headlines?sources=bbc-news&apiKey=' . '8882727ad8564d3ab0383c421f328972');
        $news = $response->json();
        
        $articles = collect($news['articles'] ?? []);
    
        return view('user.news', compact('articles')); 
    }

    public function detailNews()
    {
        $response = Http::get('https://newsapi.org/v2/top-headlines?sources=bbc-news&apiKey=' . '8882727ad8564d3ab0383c421f328972');
        $detail = $response->json();

        $detailArticles = collect($detail['articles']);

        return view('user.detailnews', compact('articles'));
    }
}
