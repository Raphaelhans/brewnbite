<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Str;
use App\Models\User;

class NewsController extends Controller
{
    public function news()
    {
        $key = '8882727ad8564d3ab0383c421f328972';
        $response = Http::get('https://newsapi.org/v2/top-headlines?sources=bbc-news&apiKey=' . $key);
        $news = $response->json();
		$user = User::find(session('user')['id']);
        $profilePictureUrl = $user['profile_picture'] ? asset('storage/' . $user['profile_picture']) : null;
        $articles = collect($news['articles']);
		$initials = $this->getInitials($user['name']);

        $totalSpent = $user->total_spent;
		$membership = 'Bronze'; 
		if ($totalSpent >= 200000) {
			$membership = 'Diamond';
		} elseif ($totalSpent >= 100000) {
			$membership = 'Gold';
		} elseif ($totalSpent >= 50000) {
			$membership = 'Silver';
		}

    
        return view('user.news', ['articles' => $articles, 'profile_picture' => $profilePictureUrl, 'membership' => $membership, 'initials' => $initials]); 
    }

    public function detailNews($id)
    {
        $key = '8882727ad8564d3ab0383c421f328972';
        $response = Http::get('https://newsapi.org/v2/top-headlines?sources=bbc-news&apiKey=' . $key);
        $news = $response->json();

        $articles = collect($news['articles']);

        $article = $articles->get($id);
        $user = User::find(session('user')['id']);
        $profilePictureUrl = $user['profile_picture'] ? asset('storage/' . $user['profile_picture']) : null;
		$initials = $this->getInitials($user['name']);

        $totalSpent = $user->total_spent;
		$membership = 'Bronze'; 
		if ($totalSpent >= 200000) {
			$membership = 'Diamond';
		} elseif ($totalSpent >= 100000) {
			$membership = 'Gold';
		} elseif ($totalSpent >= 50000) {
			$membership = 'Silver';
		}

        return view('user.detailnews', ['article' => $article, 'profile_picture' => $profilePictureUrl, 'membership' => $membership, 'initials' => $initials]);
    }

    public function getInitials($name)
	{
		$words = explode(' ', trim($name));
		$initials = '';

		foreach ($words as $index => $word) {
			if ($index > 1) break; 
			$initials .= strtoupper(substr($word, 0, 1));
		}

		return $initials;
	} 
}
