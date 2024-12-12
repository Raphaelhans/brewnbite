<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function dashboard()
    {
        return view('admin.dashboard');
    }

    public function inventory()
    {
        return view('admin.inventory');
    }

    public function ratings()
    {
        return view('admin.ratings');
    }

    public function sales()
    {
        return view('admin.sales');
    }

    public function bestsellers()
    {
        return view('admin.bestsellers');
    }
}
