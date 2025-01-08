<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;

class UserController extends Controller
{
	public function index() {
		$apiKey = '08fee9c47e5a4cbeeddf14b06173ad4c';
		$city = 'Surabaya';
		$url = "https://api.openweathermap.org/data/2.5/weather?q={$city}&appid={$apiKey}&units=metric";

		$response = Http::get($url);
		$weatherData = $response->json();

		$date = Carbon::now()->translatedFormat('l, F d, Y');

		$user = session('user');
		$profilePictureUrl = $user['profile_picture'] ?? null;

		return view('user.home', [
			'weatherData' => $weatherData,
			'date' => $date,
			'user' => $user,
			'profile_picture' => $profilePictureUrl,
		]);

	}

	public function menu(Request $request) {
		$user = session('user');
		$profilePictureUrl = $user['profile_picture'] ?? null;

		$categoryFilter = $request->query('category', null);
		$subcategoryFilter = $request->query('subcategory', 'All');

		$subcategories = [];
		if ($categoryFilter) {
			$subcategories = \App\Models\Subcategory::whereHas('category', function ($query) use ($categoryFilter) {
				$query->where('name', $categoryFilter);
			})->get();
		}

		$query = Product::query();

		if ($categoryFilter) {
			$query->join('categories', 'products.id_category', '=', 'categories.id')
				->where('categories.name', $categoryFilter);
		}

		if ($subcategoryFilter !== 'All') {
			$query->join('subcategories', 'products.id_subcategory', '=', 'subcategories.id')
				->where('subcategories.name', $subcategoryFilter);
		}

		$products = $query->select('products.*')->get();

		return view('user.menu' ,[
			'profile_picture' => $profilePictureUrl, 
			'user' => $user,
			'product' => $products,
			'categoryFilter' => $categoryFilter,
        	'subcategoryFilter' => $subcategoryFilter,
			'subcategories' => $subcategories,
		]);
	}

	public function detailMenu() {
		$user = session('user');
		$profilePictureUrl = $user['profile_picture'] ?? null;

		return view('user.detailMenu' , [
			'profile_picture' => $profilePictureUrl, 
			'user' => $user
		]);
	}
	public function displayProfile(){
		$user = session('user');
		$profilePictureUrl = $user['profile_picture'] ?? null;

		$totalSpent = $user['total_spent'] ?? 0;
		$membership = 'Bronze'; 
		if ($totalSpent >= 200000) {
			$membership = 'Diamond';
		} elseif ($totalSpent >= 100000) {
			$membership = 'Gold';
		} elseif ($totalSpent >= 50000) {
			$membership = 'Silver';
		}

		return view('user.profile', [
			'user' => $user,
			'profile_picture' => $profilePictureUrl,  
			'membership' => $membership,
		]);
	}

	public function editProfile(Request $request)
	{
		$request->validate([
			'name' => 'required|string|max:255',
			'password' => 'nullable|string|min:5',
			'profile_picture' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
		]);

		$user = User::find(session('user')['id']);
		if (!$user) {
			return redirect()->route('user.index')->withErrors(['error' => 'User not found.']);
		}

		$user->name = $request->input('name');

		if ($request->filled('password')) {
			$user->password = bcrypt($request->input('password'));
		}

		if ($request->hasFile('profile_picture')) {
			if ($user->profile_picture) {
				Storage::disk('public')->delete($user->profile_picture);
			}

			$fileName = $user->id . '.jpg';
			$filePath = $request->file('profile_picture')->storeAs('profile_pictures', $fileName, 'public');
			$user->profile_picture = $filePath;
		}

		$user->save();

		$sessionData = session('user');
		$sessionData['name'] = $user->name;
		$sessionData['profile_picture'] = $user->profile_picture ? asset('storage/' . $user->profile_picture) : null;

		session(['user' => $sessionData]);

		return redirect()->route('user.index')->with('success', 'Profile updated successfully.');
	}


	
	public function displayTopUp(){
		$user = session('user');
		$profilePictureUrl = $user['profile_picture'] ?? null;

		return view('user.topup' , [
			'profile_picture' => $profilePictureUrl, 
			'user' => $user
		]);
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
		$user = session('user');
		$profilePictureUrl = $user['profile_picture'] ?? null;

		return view('user.listPromo', [
			'user' => $user,
			'profile_picture' => $profilePictureUrl, 
		]);
	}

	public function redeemPromo(){

	}
}
