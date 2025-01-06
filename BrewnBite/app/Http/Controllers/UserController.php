<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class UserController extends Controller
{
	public function index() {
		$apiKey = '08fee9c47e5a4cbeeddf14b06173ad4c';
		$city = 'Surabaya';
		$url = "https://api.openweathermap.org/data/2.5/weather?q={$city}&appid={$apiKey}&units=metric";

		$response = Http::get($url);
		$weatherData = $response->json();

		$date = Carbon::now()->translatedFormat('l, F d, Y');
		return view('user.home', [
			'weatherData' => $weatherData,
			'date' => $date,
		]);
	}

	public function menu() {
		return view('user.menu');
	}

	public function detailMenu() {
		return view('user.detailMenu');
	}
}
