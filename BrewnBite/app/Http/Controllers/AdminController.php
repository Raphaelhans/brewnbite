<?php

namespace App\Http\Controllers;

use App\Models\Addon;
use App\Models\Category;
use App\Models\Ingredient;
use App\Models\Product;
use App\Models\Promo;
use App\Models\Subcategory;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AdminController extends Controller
{
    // Site Controller

    // Main Sites
    public function dashboard()
    {
        $user= session('user');
        return view('admin.dashboard' , ['user' => $user]);
    }

    public function sales()
    {
        return view('admin.sales');
    }

    public function bestsellers()
    {
        return view('admin.bestsellers');
    }

    public function ratings()
    {
        return view('admin.ratings');
    }
    // --- End of Main Sites

    // Master Sites
    public function addons()
    {
        $addons = Addon::withTrashed()->with('category')->get();
        return view('admin.master.addons', ['addons' => $addons]);
    }

    public function categories()
    {
        $categories = Category::withTrashed()->get();
        return view('admin.master.categories', ['categories' => $categories]);
    }

    public function ingredients()
    {
        $ingredients = Ingredient::withTrashed()->get();
        return view('admin.master.ingredients', ['ingredients' => $ingredients]);
    }

    public function products()
    {
        $products = Product::withTrashed()->with(['category', 'subcategory'])->get();
        return view('admin.master.products', ['products' => $products]);
    }

    public function promos()
    {
        $promos = Promo::withTrashed()->get();
        return view('admin.master.promos', ['promos' => $promos]);
    }

    public function subcategories()
    {
        $subcategories = Subcategory::withTrashed()->with('category')->get();
        return view('admin.master.subcategories', ['subcategories' => $subcategories]);
    }

    public function users()
    {
        $customers = User::withTrashed()->where('role', 1)->get();
        $employees = User::withTrashed()->where('role', 2)->get();
        $admins = User::withTrashed()->where('role', 3)->get();
        return view('admin.master.users', ['customers' => $customers, 'employees' => $employees, 'admins' => $admins]);
    }
    // --- End of Master Sites

    // Add Sites
    public function addEmployee()
    {
        return view('admin.form.addemployee');
    }

    public function addAddon()
    {
        $categories = DB::table('categories')->get();
        return view('admin.form.addaddon', ['categories' => $categories]);
    }

    public function addCategory()
    {
        return view('admin.form.addcategory');
    }

    public function addIngredient()
    {
        return view('admin.form.addingredient');
    }

    public function addProduct()
    {
        $categories = DB::table('categories')->get();
        $subcategories = DB::table('subcategories')->get();
        return view('admin.form.addproduct', ['categories' => $categories, 'subcategories' => $subcategories]);
    }

    public function addPromo()
    {
        return view('admin.form.addpromo');
    }

    public function addSubcategory()
    {
        $categories = DB::table('categories')->get();
        return view('admin.form.addsubcategory', ['categories' => $categories]);
    }
    // --- End of Add Sites

    // Edit Sites
    public function editUser($id)
    {
        $user = User::withTrashed()->where('id', $id)->first();
        return view('admin.form.edituser', ['user' => $user]);
    }

    public function editAddon($id)
    {
        $addon = Addon::withTrashed()->with('category')->where('id', $id)->first();
        $categories = Category::get();
        return view('admin.form.editaddon', ['addon' => $addon, 'categories' => $categories]);
    }

    public function editCategory($id)
    {
        $category = Category::withTrashed()->where('id', $id)->first();
        return view('admin.form.editcategory', ['category' => $category]);
    }

    public function editIngredient($id)
    {
        $ingredient = Ingredient::withTrashed()->where('id', $id)->first();
        return view('admin.form.editingredient', ['ingredient' => $ingredient]);
    }

    public function editProduct($id)
    {
        $product = Product::withTrashed()->with(['category', 'subcategory'])->where('id', $id)->first();
        $categories = Category::get();
        $subcategories = Subcategory::where('id_category', $product->id_category)->get();
        return view('admin.form.editproduct', ['product' => $product, 'categories' => $categories, 'subcategories' => $subcategories]);
    }

    public function editPromo($id)
    {
        $promo = Promo::withTrashed()->where('id', $id)->first();
        return view('admin.form.editpromo', ['promo' => $promo]);
    }

    public function editSubcategory($id)
    {
        $subcategory = Subcategory::withTrashed()->with('category')->where('id', $id)->first();
        $categories = Category::get();
        return view('admin.form.editsubcategory', ['subcategory' => $subcategory, 'categories' => $categories]);
    }
    // --- End of Edit Sites


    // Main Controller

    // Master Addons
    public function doAddAddon(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255|unique:addons,name',
            'price' => 'required|numeric|min:0',
            'category' => 'required|exists:categories,id',
        ]);
        DB::table('addons')->insert([
            'name' => $validated['name'],
            'price' => $validated['price'],
            'id_category' => $validated['category'],
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        return redirect()->route('admin.master.addons.add')->with('success', 'Addon added successfully');
    }

    public function deactivateAddon(Request $request)
    {
        DB::table('addons')->where('id', $request->id)->update([
            'deleted_at' => now()
        ]);
        return redirect()->route('admin.master.addons.addons');
    }

    public function activateAddon(Request $request)
    {
        DB::table('addons')->where('id', $request->id)->update([
            'deleted_at' => null
        ]);
        return redirect()->route('admin.master.addons.addons');
    }

    public function doEditAddon(Request $request)
    {
        DB::table('addons')->where('id', $request->id)->update([
            'name' => $request->name,
            'price' => $request->price,
            'id_category' => $request->category,
            'updated_at' => now(),
        ]);
        return redirect()->route('admin.master.addons.addons');
    }
    // --- End of Master Addons

    // Master Categories
    public function doAddCategory(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255|unique:categories,name',
            'description' => 'required|string',
        ]);
        DB::table('categories')->insert([
            'name' => $validated['name'],
            'description' => $validated['description'],
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        return redirect()->route('admin.master.categories.add')->with('success', 'Category added successfully');
    }

    public function deactivateCategory(Request $request)
    {
        DB::table('categories')->where('id', $request->id)->update([
            'deleted_at' => now()
        ]);
        return redirect()->route('admin.master.categories.categories');
    }

    public function activateCategory(Request $request)
    {
        DB::table('categories')->where('id', $request->id)->update([
            'deleted_at' => null
        ]);
        return redirect()->route('admin.master.categories.categories');
    }

    public function doEditCategory(Request $request)
    {
        DB::table('categories')->where('id', $request->id)->update([
            'name' => $request->name,
            'description' => $request->description,
            'updated_at' => now(),
        ]);
        return redirect()->route('admin.master.categories.categories');
    }
    // --- End of Master Categories

    // Master Ingredients
    public function doAddIngredient(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255|unique:ingredients,name',
            'stock' => 'required|numeric|min:0',
            'unit' => 'required|string',
        ]);
        DB::table('ingredients')->insert([
            'name' => $validated['name'],
            'stock' => $validated['stock'],
            'unit' => $validated['unit'],
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        return redirect()->route('admin.master.ingredients.add')->with('success', 'Ingredient added successfully');
    }

    public function deactivateIngredient(Request $request)
    {
        DB::table('ingredients')->where('id', $request->id)->update([
            'deleted_at' => now()
        ]);
        return redirect()->route('admin.master.ingredients.ingredients');
    }

    public function activateIngredient(Request $request)
    {
        DB::table('ingredients')->where('id', $request->id)->update([
            'deleted_at' => null
        ]);
        return redirect()->route('admin.master.ingredients.ingredients');
    }

    public function doEditIngredient(Request $request)
    {
        DB::table('ingredients')->where('id', $request->id)->update([
            'name' => $request->name,
            'stock' => $request->stock,
            'unit' => $request->unit,
            'updated_at' => now(),
        ]);
        return redirect()->route('admin.master.ingredients.ingredients');
    }
    // --- End of Master Ingredients

    // Master Products
    public function doAddProduct(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255|unique:products,name',
            'category' => 'required|exists:categories,id',
            'subcategory' => 'required|exists:subcategories,id',
            'price' => 'required|numeric|min:0',
            'stock' => 'required|numeric|min:0',
            'rating' => 'required|numeric|min:0',
            'description' => 'required|string',
            'weather' => 'required|string',
        ]);
        // Kurang foto
        Product::create([
            'name' => $validated['name'],
            'id_category' => $validated['category'],
            'id_subcategory' => $validated['subcategory'],
            'price' => $validated['price'],
            'stock' => $validated['stock'],
            'rating' => $validated['rating'],
            'description' => $validated['description'],
            'weather' => $validated['weather'],
            'img_url' => "-",
        ]);
        return redirect()->route('admin.master.products.add')->with('success', 'Product added successfully');
    }

    public function deactivateProduct(Request $request)
    {
        DB::table('products')->where('id', $request->id)->update([
            'deleted_at' => now()
        ]);
        return redirect()->route('admin.master.products.products');
    }

    public function activateProduct(Request $request)
    {
        DB::table('products')->where('id', $request->id)->update([
            'deleted_at' => null
        ]);
        return redirect()->route('admin.master.products.products');
    }

    public function doEditProduct(Request $request)
    {
        // cek foto keisi ga
        // kalo keisi, upload foto, kalo kosong, variabel foto = url lama
        if ($request->hasFile('img_url')) {
            DB::table('products')->where('id', $request->id)->update([
                'name' => $request->name,
                'id_category' => $request->category,
                'id_subcategory' => $request->subcategory,
                'price' => $request->price,
                'stock' => $request->stock,
                'rating' => $request->rating,
                'description' => $request->description,
                'weather' => $request->weather,
                'img_url' => $request->file('img_url')->store('product')
            ]);
        }else{
            DB::table('products')->where('id', $request->id)->update([
                'name' => $request->name,
                'id_category' => $request->category,
                'id_subcategory' => $request->subcategory,
                'price' => $request->price,
                'stock' => $request->stock,
                'rating' => $request->rating,
                'description' => $request->description,
                'weather' => $request->weather,
            ]);
        }
        return redirect()->route('admin.master.products.products');
    }
    // --- End of Master Products

    // Master Promos
    public function doAddPromo(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255|unique:promos,name',
            'discount' => 'required|numeric|min:0',
            'min_transaction' => 'required|numeric|min:0',
            'max_discount' => 'required|numeric|min:0',
            'requirement' => 'required|numeric|min:0',
        ]);
        DB::table('promos')->insert([
            'name' => $validated['name'],
            'discount' => $validated['discount'],
            'min_transaction' => $validated['min_transaction'],
            'max_discount' => $validated['max_discount'],
            'requirement' => $validated['requirement'],
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        return redirect()->route('admin.master.promos.add')->with('success', 'Promo added successfully');
    }

    public function deactivatePromo(Request $request)
    {
        DB::table('promos')->where('id', $request->id)->update([
            'deleted_at' => now()
        ]);
        return redirect()->route('admin.master.promos.promos');
    }

    public function activatePromo(Request $request)
    {
        DB::table('promos')->where('id', $request->id)->update([
            'deleted_at' => null
        ]);
        return redirect()->route('admin.master.promos.promos');
    }

    public function doEditPromo(Request $request)
    {
        DB::table('promos')->where('id', $request->id)->update([
            'name' => $request->name,
            'discount' => $request->discount,
            'min_transaction' => $request->min_transaction,
            'max_discount' => $request->max_discount,
            'requirement' => $request->requirement,
            'updated_at' => now(),
        ]);
        return redirect()->route('admin.master.promos.promos');
    }
    // --- End of Master Promos

    // Master Subcategories
    public function doAddSubcategory(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255|unique:subcategories,name',
            'description' => 'required|string',
            'category' => 'required|exists:categories,id',
        ]);
        Subcategory::create([
            'name' => $validated['name'],
            'description' => $validated['description'],
            'id_category' => $validated['category'],
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        return redirect()->route('admin.master.subcategories.add')->with('success', 'Subcategory added successfully');
    }

    public function deactivateSubcategory(Request $request)
    {
        DB::table('subcategories')->where('id', $request->id)->update([
            'deleted_at' => now()
        ]);
        return redirect()->route('admin.master.subcategories.subcategories');
    }

    public function activateSubcategory(Request $request)
    {
        DB::table('subcategories')->where('id', $request->id)->update([
            'deleted_at' => null
        ]);
        return redirect()->route('admin.master.subcategories.subcategories');
    }

    public function doEditSubcategory(Request $request)
    {
        DB::table('subcategories')->where('id', $request->id)->update([
            'name' => $request->name,
            'description' => $request->description,
            'id_category' => $request->category,
            'updated_at' => now(),
        ]);
        return redirect()->route('admin.master.subcategories.subcategories');
    }
    // --- End of Master Subcategories

    // Master Users
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
    // --- End of Master Users

    // Extras
    public function getSubcategories($categoryId)
    {
        $subcategories = Subcategory::where('id_category', $categoryId)->get();
        return response()->json($subcategories);
    }
    // --- End of Extras

    // --- End of Main Controller
}
