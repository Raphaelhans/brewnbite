<?php

namespace App\Http\Controllers;

use App\Models\Addon;
use App\Models\Category;
use App\Models\Dtrans;
use App\Models\Ingredient;
use App\Models\Product;
use App\Models\Promo;
use App\Models\Rating;
use App\Models\Subcategory;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class AdminController extends Controller
{
    // Site Controller

    // Main Sites
    public function dashboard()
    {
        $dtrans = Dtrans::select('id_product', DB::raw('SUM(amount) as total_amount'))
        ->with('product') // Load the product relationship with only id and name columns
        ->groupBy('id_product')
        ->orderBy('total_amount', 'desc')
        ->take(5)
        ->get();
        $ingredients = Ingredient::orderBy('stock', 'asc')->take(5)->get();
        $topspenders = User::where('role', 1)->orderBy('total_spent', 'desc')->take(5)->get();
        $sales = DB::table('htrans')
        ->select(DB::raw('DATE_FORMAT(created_at, "%Y-%m") as month'), DB::raw('SUM(grandtotal) as total_grandtotal'))
        ->groupBy(DB::raw('DATE_FORMAT(created_at, "%Y-%m")'))
        ->orderBy(DB::raw('DATE_FORMAT(created_at, "%Y-%m")'), 'asc')
        ->take(7)
        ->get();
        $total_sales = DB::table('htrans')->sum('grandtotal');
        $this_month_sales = $sales[6]->total_grandtotal;
        $prev_month_sales = $sales[5]->total_grandtotal;
        if ($prev_month_sales > 0) {
            $percentageChange = (($this_month_sales - $prev_month_sales) / $prev_month_sales) * 100;
        } else {
            $percentageChange = $this_month_sales > 0 ? 100 : 0;
        }
        return view('admin.dashboard', ['dtrans' => $dtrans, 'ingredients' => $ingredients, 'topspenders' => $topspenders, 'sales' => $sales, 'total_sales' => $total_sales, 'percentageChange' => $percentageChange]);
    }

    public function sales()
    {
        $sales = DB::table('htrans')
        ->select(DB::raw('DATE_FORMAT(created_at, "%Y-%m") as month'), DB::raw('SUM(grandtotal) as total_grandtotal'))
        ->groupBy(DB::raw('DATE_FORMAT(created_at, "%Y-%m")'))
        ->orderBy(DB::raw('DATE_FORMAT(created_at, "%Y-%m")'), 'asc')
        ->take(7)
        ->get();
        $total_sales = DB::table('htrans')->sum('grandtotal');
        $this_month_sales = $sales[6]->total_grandtotal;
        $prev_month_sales = $sales[5]->total_grandtotal;
        $all_sales = DB::table('htrans')
        ->leftJoinSub(
            DB::table('dtrans')
                ->select('id_htrans', DB::raw('SUM(amount) as total_amount'))
                ->groupBy('id_htrans'),
            'dtrans_summary',
            'htrans.id',
            '=',
            'dtrans_summary.id_htrans'
        )
        ->select(
            DB::raw('DATE_FORMAT(htrans.created_at, "%Y-%m") as month'),
            DB::raw('SUM(htrans.grandtotal) as total_grandtotal'),
            DB::raw('SUM(dtrans_summary.total_amount) as total_amount')
        )
        ->groupBy(DB::raw('DATE_FORMAT(htrans.created_at, "%Y-%m")'))
        ->orderBy(DB::raw('DATE_FORMAT(htrans.created_at, "%Y-%m")'), 'desc')
        ->get();
        if ($prev_month_sales > 0) {
            $percentageChange = (($this_month_sales - $prev_month_sales) / $prev_month_sales) * 100;
        } else {
            $percentageChange = $this_month_sales > 0 ? 100 : 0;
        }
        return view('admin.sales', ['sales' => $sales, 'total_sales' => $total_sales, 'percentageChange' => $percentageChange, 'all_sales' => $all_sales]);
    }

    public function bestsellers()
    {
        $bestsellers1 = DB::table('products')
        ->join('dtrans', 'products.id', '=', 'dtrans.id_product')
        ->select(
            'products.id',
            'products.name',
            'products.price',
            'products.rating',
            DB::raw('products.price * SUM(dtrans.amount) as total_revenue'),
            DB::raw('SUM(dtrans.amount) as total_sold')
        )
        ->groupBy('products.id', 'products.name', 'products.price', 'products.rating')
        ->orderBy('total_sold', 'desc')
        ->get();
        // dd($bestsellers1);
        return view('admin.bestsellers', ['bestsellers1' => $bestsellers1]);
    }

    public function ratings()
    {
        $ratings = Rating::with(['product','user'])->orderBy('id', 'desc')->get();
        // dd($ratings);
        return view('admin.ratings', ['ratings' => $ratings]);
    }

    public function topspenders()
    {
        $topspenders = User::where('role', 1)->orderBy('total_spent', 'desc')->take(5)->get();
        $alltopspenders = User::where('role', 1)->orderBy('total_spent', 'desc')->get();
        return view('admin.topspenders', ['topspenders' => $topspenders, 'alltopspenders' => $alltopspenders]);
    }

    public function production(Request $request, $id){
        $item = Product::where('id', $id)->first();
        return view('admin.form.production', ['item' => $item]);
    }

    public function restock(Request $request, $id){
        $item = Ingredient::where('id', $id)->first();
        return view('admin.form.restock', ['item' => $item]);
    }

    public function updateRestock(Request $request){
        $validated = $request->validate([
            'id' => 'required|exists:ingredients,id',
            'qty' => 'required|numeric|min:0',
            'price' => 'required|numeric|min:0',
        ]);
        $item = Ingredient::where('id', $validated['id'])->first();
        $item->stock += $validated['qty'];
        $item->save();
        DB::table('procurements')->insert([
            'id_ingredient' => $validated['id'],
            'amount' => $validated['qty'],
            'price_per_item' => $validated['price'],
            'item_subtotal' => $validated['price'] * $validated['qty'],
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        return redirect()->route('admin.restock.restock', ['id' => $item->id, 'item' => $item])->with('success', 'Restock successful');
    }
    public function updateProduction(Request $request){
        $validated = $request->validate([
            'id' => 'required|exists:products,id',
            'qty' => 'required|numeric|min:0',
        ]);
        $item = Product::where('id', $validated['id'])->first();
        $recipe = DB::table('recipes')->where('id_product', $validated['id'])->get();
        $continue = true;
        foreach ($recipe as $r) {
            $ingredient = Ingredient::where('id', $r->id_ingredient)->first();
            if ($ingredient->stock < $r->amount * $validated['qty']) {
                $continue = false;
            }
        }
        if ($continue) {
            foreach ($recipe as $r) {
                $ingredient = Ingredient::where('id', $r->id_ingredient)->first();
                $ingredient->stock -= $r->amount * $validated['qty'];
                $ingredient->save();
            }
            $item->stock += $validated['qty'];
            $item->save();
            DB::table('production')->insert([
                'id_product' => $validated['id'],
                'amount' => $validated['qty'],
                'created_at' => now(),
                'updated_at' => now(),
            ]);
            return redirect()->route('admin.production.production', ['id' => $item->id, 'item' => $item])->with('success', 'Production successful');
        }else{
            return redirect()->route('admin.production.production', ['id' => $item->id, 'item' => $item])->with('error', 'Not enough stock');
        }
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
        DB::table('procurements')->insert([
            'id_ingredient' => DB::table('ingredients')->max('id'),
            'amount' => $validated['stock'],
            'price_per_item' => 0,
            'item_subtotal' => 0,
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
            'rating' => 'required|numeric|min:0',
            'description' => 'required|string',
            'weather' => 'required|string',
            'image' => 'required|string',
        ]);
        Product::create([
            'name' => $validated['name'],
            'id_category' => $validated['category'],
            'id_subcategory' => $validated['subcategory'],
            'price' => $validated['price'],
            'stock' => 0,
            'rating' => $validated['rating'],
            'description' => $validated['description'],
            'weather' => $validated['weather'],
            'img_url' => $validated['image'],
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
        DB::table('products')->where('id', $request->id)->update([
            'name' => $request->name,
            'id_category' => $request->category,
            'id_subcategory' => $request->subcategory,
            'price' => $request->price,
            'stock' => $request->stock,
            'rating' => $request->rating,
            'description' => $request->description,
            'weather' => $request->weather,
            'img_url' => $request->image
        ]);
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
            $file = $request->file('profile');
            $tujuan_upload = 'profile_pictures';
            $profilePictureName = $request->id . '.' . $file->getClientOriginalExtension();
            $user = User::where('id', $request->id)->first();
            Storage::disk('public')->delete($user->profile_picture);
            DB::table('users')->where('id', $request->id)->update([
                'name' => $request->name,
                'email' => $request->email,
                'updated_at' => now(),
                'profile_picture' => $tujuan_upload . '/' . $profilePictureName
            ]);
            Storage::disk('public')->putFileAs($tujuan_upload, $file, $profilePictureName);
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
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users,email',
            'password' => 'required|string|min:8|confirmed',
        ]);
        $file = $request->file('profile');
        $tujuan_upload = 'profile_pictures';
        // dd($file);
        DB::table('users')->insert([
            'name' => $request->name,
            'email' => $request->email,
            'password' => bcrypt($request->password),
            'membership' => 0,
            'role' => 2,
            'credit' => 0,
            'total_spent' => 0,
            'profile_picture'=> "",
            'created_at' => now(),
            'updated_at' => now()
        ]);
        $emp = DB::table('users')->where('email', $request->email)->first();
        $profilePictureName = $emp->id . '.' . $file->getClientOriginalExtension();
        DB::table('users')
        ->where('email', $request->email)
        ->update(['profile_picture' => $tujuan_upload . '/' . $profilePictureName]);
        Storage::disk('public')->putFileAs($tujuan_upload, $file, $profilePictureName);
        return redirect()->route('admin.master.users.add')->with('success', 'Employee added successfully');
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
