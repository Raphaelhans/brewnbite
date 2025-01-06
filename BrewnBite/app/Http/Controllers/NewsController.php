<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Str;

class NewsController extends Controller
{
    public function news()
    {
        $response = Http::get('https://newsapi.org/v2/top-headlines?sources=bbc-news&apiKey=' . '8882727ad8564d3ab0383c421f328972');
        $news = $response->json();
        
        $articles = collect($news['articles']);
    
        return view('user.news', compact('articles')); 
    }

    public function detailNews($id)
    {
        $response = Http::get('https://newsapi.org/v2/top-headlines?sources=bbc-news&apiKey=' . '8882727ad8564d3ab0383c421f328972');
        $news = $response->json();

        $articles = collect($news['articles']);

        $article = $articles->get($id);

        return view('user.detailnews', compact('article'));
    }

}
