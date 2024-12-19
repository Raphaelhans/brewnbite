<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserController extends Controller
{
	public function index() {
		return view('user.home');
	}

	public function displayProfile(){
		return view('user.profile');
	}

	public function displayTopUp(){
		return view('user.topup');
	}
}
