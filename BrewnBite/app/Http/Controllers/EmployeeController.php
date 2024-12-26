<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class EmployeeController extends Controller
{
    public function dashboard()
    {
        return view('employee.dashboard');
    }
    
    public function history()
    {
        return view('employee.history');
    }

    public function inventory()
    {
        return view('employee.inventory');
    }
    public function listmenu()
    {
        return view('employee.listmenu');
    }
}
