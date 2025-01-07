<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
	public function login(Request $request) {
		$request->validate([
			'email' => 'required|email',
			'password' => 'required'
		]);
	
		$user = User::where('email', $request->email)->first();
		if ($user && Hash::check($request->password, $user->password)) {
			$request->session()->put('user', [
				'id' => $user->id,
				'name' => $user->name,
				'email' => $user->email,
				'membership' => $user->membership, 
				'credit' => $user->credit,  
				'total_spent' => $user->total_spent,
				'profile_picture' => $user->profile_picture,
			]);
	
			return redirect('/user');
		}
	
		return back()->withErrors(['password' => 'Email/password invalid']);
	}
	

	public function register(Request $request){
		$request->validate([
			'name' => 'required|string|max:255',
			'email' => 'required|string|email|max:255|unique:users',
			'password' => 'required|string|min:5',
			'confirm_password' => 'required|same:password'
		]);
		
		$user = new User();
		$user->name = $request->name;
		$user->email = $request->email;
		$user->password = Hash::make($request->password);
		$user->role = 1; 
		$user->membership = 0; 
		$user->credit = 0;
		$user->total_spent = 0;

		$user->save();

		return redirect('/login')->with('success', 'Account created successfully');
	}

  	public function logout(){
		session()->forget(['user']);

		return redirect('/');
	}

}
