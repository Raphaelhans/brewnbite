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
	public function displayProfile(){
		return view('user.profile');
	}

	public function displayTopUp(){
		return view('user.topup');
	}

	public function cart(){
		return view('user.cart');
	}

	public function summary(){
		return view('user.checkoutSummary');
	}

	public function checkout(){

	}

	public function history(){
		return view('user.history');
	}

	public function detailHistory(){
		return view('user.detailHistory');
	}

	public function rating(){

	}

	public function promo(){
		return view('user.listPromo');
	}

	public function redeemPromo(){

	}
}
