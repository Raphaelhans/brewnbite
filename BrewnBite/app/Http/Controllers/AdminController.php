<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Subcategory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AdminController extends Controller
{
    // Site Controller
    public function dashboard()
    {
        return view('admin.dashboard');
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

    public function editUser($id)
    {
        $user = DB::table('users')->where('id', $id)->first();
        return view('admin.form.edituser', ['user' => $user]);
    }

    public function users()
    {
        $customers = DB::table('users')->where('role', 1)->get();
        $employees = DB::table('users')->where('role', 2)->get();
        $admins = DB::table('users')->where('role', 3)->get();
        return view('admin.master.users', ['customers' => $customers, 'employees' => $employees, 'admins' => $admins]);
    }

    public function addEmployee()
    {
        return view('admin.form.addemployee');
    }

    public function categories()
    {
        $categories = DB::table('categories')->get();
        return view('admin.master.categories', ['categories' => $categories]);
    }

    public function products()
    {
        $products = Product::with(['category', 'subcategory'])->get();
        return view('admin.master.products', ['products' => $products]);
    }

    public function promos()
    {
        $promos = DB::table('promos')->get();
        return view('admin.master.promos', ['promos' => $promos]);
    }

    public function subcategories()
    {
        $subcategories = Subcategory::with('category')->get();
        return view('admin.master.subcategories', ['subcategories' => $subcategories]);
    }

    public function ingredients()
    {
        $ingredients = DB::table('ingredients')->get();
        return view('admin.master.ingredients', ['ingredients' => $ingredients]);
    }

    // Main Controller

    public function suspendUser(Request $request)
    {
        DB::table('users')->where('id', $request->id)->update([
            'deleted_at' => now()
        ]);
        return redirect()->route('admin.master.users.users');
    }

    public function activateUser(Request $request)
    {
        DB::table('users')->where('id', $request->id)->update([
            'deleted_at' => null
        ]);
        return redirect()->route('admin.master.users.users');
    }

    public function doEditUser(Request $request)
    {
        // cek foto keisi ga
        // kalo keisi, upload foto, kalo kosong, variabel foto = url lama
        if ($request->hasFile('profile')) {
            DB::table('users')->where('id', $request->id)->update([
                'name' => $request->name,
                'email' => $request->email,
                'updated_at' => now(),
                // 'profile' => $request->file('profile')->store('profile')
            ]);
        }else{
            DB::table('users')->where('id', $request->id)->update([
                'name' => $request->name,
                'email' => $request->email,
                'updated_at' => now(),
            ]);
        }
        return redirect()->route('admin.master.users.users');
    }

    public function doAddEmployee(Request $request)
    {
        DB::table('users')->insert([
            'name' => $request->name,
            'email' => $request->email,
            'password' => bcrypt($request->password),
            'membership' => 0,
            'role' => 2,
            'credit' => 0,
            'total_spent' => 0,
            'created_at' => now(),
            'updated_at' => now()
        ]);
        return redirect()->route('admin.addemployee.add')->with('success', 'Employee added successfully');
    }
}
