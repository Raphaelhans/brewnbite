<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Dtrans;
use App\Models\Ingredient;
use App\Models\Product;
use App\Models\Recipe;
use App\Models\Subcategory;
use App\Models\User;
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
        $dtrans = Dtrans::with([
            'htrans.user', 
            'htrans.promo', 
            'product' => function ($query) {
                $query->withTrashed();
            }
        ])->get();        

        return view('employee.history', ['dtrans' => $dtrans]);
    }

    public function inventory()
    {
        $ingredient = Ingredient::withTrashed()->get();
        return view('employee.inventory', ['ingredient'=>$ingredient]);
    }
    public function listmenu()
    {
        $menu = Product::withTrashed()->with('category')->with('subcategory')->get();
        return view('employee.listmenu',['menu' => $menu]);
    }

    public function getCategory($id)
    {
        $subcategory = Subcategory::where('id_category', $id)->get();
        return response()->json($subcategory);
    
    }   
    public function getUnit($id)
    {
        $unit = Ingredient::where('id', $id)->first();
        return response()->json($unit);
    }   

    public function toeditMenu($id)
    {
        $category = Category::select('id','name')->get();
        $subcategory = Subcategory::select('id','name','id_category')->get();
        $curringredients = Recipe::where('id_product', $id)->with('ingredients')->get();
        $ingredient = Ingredient::all();
        $current = Product::where('id', $id)->first();
        
        return view('employee.editmenu', ['category' => $category, 'subcategory' => $subcategory, 'curringredients' => $curringredients, 'ingredient' => $ingredient, 'current' => $current]);
    }

    public function addMenu(Request $req)
    {
        $check = Product::where('name', $req->name)->get();  

        $validasi = $req->validate([
            'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048'
        ]);

        if(count($check)>0){
            return redirect()->back()->with('error', 'Menu already exist');
        }else{
            $imagePath = $req->file('image')->storeAs('images',$req->name, 'public');

            $menu = new Product;
            $menu->name = $req->name;
            $menu->id_category = $req->category;
            $menu->id_subcategory = $req->subcategory;
            $menu->price = $req->price;
            $menu->stock = 0;
            $menu->rating = 0.00;
            $menu->description = $req->desc;
            $menu->img_url = $imagePath;
            $menu->save();
            return redirect()->back()->with('success', 'Menu added successfully');
        }
    }

    public function insertIngredient(Request $req)
    {
        $check = Ingredient::where('name', $req->name)->first();

        if($check){
            return redirect()->back()->with('error', 'Ingredient already exist');
        }
        else{
            $ingredient = new Ingredient;
            $ingredient->name = $req->name;
            $ingredient->stock = $req->stock;
            $ingredient->unit = $req->unit;
            $ingredient->save();
    
            return redirect()->back()->with('success', 'Ingredient added successfully');
        }
    }

    public function updateIngredient(Request $req)
    {
        $ingredient = Ingredient::where('id', $req->idingredient)->first();

        $ingredient->name = $req->name;
        $ingredient->stock = $req->stock;
        $ingredient->unit = $req->unit;
        $ingredient->save();

        return redirect()->back()->with('success', 'Ingredient updated successfully');
    }

    public function deleteIngredient(Request $req)
    {
        $ingredient = Ingredient::where('id', $req->id)->first();
        $ingredient->delete();
        return redirect()->back()->with('success', 'Ingredient deleted successfully');
    }

    public function addrecipe(Request $req)
    {
        $recipe = new Recipe;
        $recipe->id_product = $req->menu;
        $recipe->id_ingredient = $req->ingredient;
        $recipe->amount = $req->amount;
        $recipe->save();

        $this->updateProductStock($req->menu);
        return redirect()->back()->with('success', 'Recipe added successfully');
    }

    public function deletemenu(Request $req)
    {
        $menu = Product::where('id', $req->id)->first();
        $menu->delete();
        return redirect()->back()->with('success', 'Menu deleted successfully');
    }

    public function editmenu(Request $req)
    {
        $menu = Product::where('id', $req->id)->first();

        $menu->name = $req->name;
        $menu->id_category = $req->category;
        $menu->id_subcategory = $req->subcategory;
        $menu->price = $req->price;
        $menu->description = $req->desc;
        $menu->img_url = $req->file('image')? $req->file('image')->store('images', 'public') : $menu->img_url;
        $menu->save();
        return redirect()->back()->with('success', 'Menu updated successfully');
    }

    public function editrecipe(Request $req)
    {
        $recipe = Recipe::where('id', $req->curringredient)->first();
        $recipe->id_ingredient = $req->editingredient;
        $recipe->amount = $req->amount;
        $recipe->save();

        $this->updateProductStock($recipe->id_product);
        return redirect()->back()->with('success', 'Recipe updated successfully');
    }

    private function updateProductStock($productId)
    {
        $recipes = Recipe::where('id_product', $productId)->get();

        if ($recipes->isEmpty()) {
            $product = Product::find($productId);
            $product->stock = 0;
            $product->save();
            return;
        }

        $minStock = PHP_INT_MAX;

        foreach ($recipes as $recipe) {
            $ingredient = Ingredient::find($recipe->id_ingredient);

            if (!$ingredient || $ingredient->stock < $recipe->amount) {
                $minStock = 0;
                break;
            }

            $possibleStock = floor($ingredient->stock / $recipe->amount);
            $minStock = min($minStock, $possibleStock);
        }

        $product = Product::find($productId);
        $product->stock = $minStock;
        $product->save();
    }

}
