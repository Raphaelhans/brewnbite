<?php

namespace App\Http\Controllers;

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

		return view('user.home', [
			'weatherData' => $weatherData,
			'date' => $date,
			'user' => $user,
			'initials' => $initials,
			'profile_picture' => $profilePictureUrl,
			'membership' => $membership,
		]);

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

	public function menu() {
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

		return view('user.menu' ,[
			'initials' => $initials, 
			'membership' => $membership, 
			'profile_picture' => $profilePictureUrl, 
			'user' => $user
		]);
	}

	public function detailMenu() {
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

		return view('user.detailMenu' , [
			'initials' => $initials, 
			'membership' => $membership, 
			'profile_picture' => $profilePictureUrl, 
			'user' => $user
		]);
	}
	public function displayProfile(){
		$user = User::find(session('user')['id']);
		$initials = $this->getInitials($user['name']);
		$profilePictureUrl = $user['profile_picture'] ? asset('storage/' . $user['profile_picture']) : null;

		$totalSpent = $user->total_spent;
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
			'initials' => $initials, 
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
		$user->name = $request->input('name');

		$sessionData = session('user');
		$sessionData['name'] = $user->name;
		$sessionData['initials'] = $this->getInitials($user->name);

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
			
			$sessionData['profile_picture'] = asset('storage/' . $filePath);
		}

		$user->save();
		
		session(['user' => $sessionData]);

		return redirect()->route('user.index')->with('success', 'Profile updated successfully.');
	}


	public function displayTopUp(){
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

		return view('user.topup' , [
			'initials' => $initials, 
			'membership' => $membership, 
			'profile_picture' => $profilePictureUrl, 
			'user' => $user
		]);
	}

	
}
