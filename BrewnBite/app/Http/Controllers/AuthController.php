<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AuthController extends Controller
{
  public function login(Request $req) {

	}

	public function register(Request $req){
		// $validatedData = $req->validate([
		// 	'email' => 'required|email|unique:users,email',
		// 	'password' => 'required|same:confirm_password', 
		// 	'confirm_password' => 'required', 
		// 	'name' => 'required'
		// ]);

		// Users::create([
		// 	'email' => $validatedData['email'],
		// 	'password' => $validatedData['password'],
		// 	'name' => $validatedData['name'],
		// ]);

		// return redirect('/');
	}

  public function logout(){
		session()->forget(['user']);

		return redirect('/');
	}
	
}
