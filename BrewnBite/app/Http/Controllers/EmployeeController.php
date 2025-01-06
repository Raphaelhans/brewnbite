<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Ingredient;
use App\Models\Product;
use App\Models\Subcategory;
use Illuminate\Http\Request;

class EmployeeController extends Controller
{
    public function dashboard()
    {
        $category = Category::select('id','name')->get();
        $subcategory = Subcategory::select('id','name','id_category')->get();
        $menu = Product::all();
        $ingredient = Ingredient::all();
        return view('employee.dashboard',['category' => $category, 'subcategory' => $subcategory, 'menu' => $menu, 'ingredient' => $ingredient]);
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
        $menu = Product::with('category')->with('subcategory')->get();
        return view('employee.listmenu',['menu' => $menu]);
    }

    public function getCategory($id)
    {
        $subcategory = Subcategory::where('id_category', $id)->get();
        return response()->json($subcategory);
    }   

    public function addMenu(Request $req){
        $check = Product::where('name', $req->name)->get();  

        if($check){
            return redirect()->back()->with('fail', 'Menu already exist');
        }else{
            $menu = new Product;
            $menu->name = $req->name;
            $menu->category = $req->category;
            $menu->id_subcategory = $req->subcategory;
            $menu->price = $req->price;
            $menu->stock = 0;
            $menu->rating = 0.00;
            $menu->description = $req->desc;
            $menu->save();
            return redirect()->back()->with('success', 'Menu added successfully');
        }
    }
}
