<?php

namespace App\Http\Controllers;

use App\Models\Htrans;
use App\Models\Product;
use App\Models\Topup;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use App\Models\User;
use App\Models\Promo;
use App\Models\Addon;
use App\Models\Daddon;
use App\Models\Htrans;
use App\Models\Dtrans;
use App\Models\Promo;
use App\Models\Rating;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Log;

class UserController extends Controller
{
	public function index() {
		$apiKey = '08fee9c47e5a4cbeeddf14b06173ad4c';
		$city = 'Surabaya';
		$url = "https://api.openweathermap.org/data/2.5/weather?q={$city}&appid={$apiKey}&units=metric";

		$response = Http::get($url);
		$weatherData = $response->json();
		$currentWeather = ucfirst($weatherData['weather'][0]['main']);

		$date = Carbon::now()->translatedFormat('l, F d, Y');

		$topProducts = Product::where('weather', $currentWeather)
			->where('stock', '>', 0) 
			->orderBy('rating', 'desc')
			->take(3)
			->get();

		$topProducts->each(function ($product) {
			$product->reviewCount = Rating::where('id_product', $product->id)->count() ?: 0;
		});


		$user = session('user');
		$profilePictureUrl = $user['profile_picture'] ?? null;

		return view('user.home', [
			'weatherData' => $weatherData,
			'date' => $date,
			'user' => $user,
			'profile_picture' => $profilePictureUrl,
			'topProducts' => $topProducts,
		]);

	}

	public function menu(Request $request) {
		$user = session('user');
		$profilePictureUrl = $user['profile_picture'] ?? null;

		$categoryFilter = $request->query('category', null);
		$subcategoryFilter = $request->query('subcategory', 'All');

		$searchQuery = $request->query('search', null);

		$subcategories = [];
		if ($categoryFilter) {
			$subcategories = \App\Models\Subcategory::whereHas('category', function ($query) use ($categoryFilter) {
				$query->where('name', $categoryFilter);
			})->get();
		}

		$query = Product::query();

		if ($categoryFilter) {
			$query->join('categories', 'products.id_category', '=', 'categories.id')
				->where('categories.name', $categoryFilter);
		}

		if ($subcategoryFilter !== 'All') {
			$query->join('subcategories', 'products.id_subcategory', '=', 'subcategories.id')
				->where('subcategories.name', $subcategoryFilter);
		}

		if ($searchQuery) {
			$query->where('products.name', 'LIKE', '%' . $searchQuery . '%');
		}

		$products = $query->select('products.*')->get();

		$products->each(function ($product) {
			$product->reviewCount = Rating::where('id_product', $product->id)->count() ?: 0;
		});

		return view('user.menu' ,[
			'profile_picture' => $profilePictureUrl, 
			'user' => $user,
			'product' => $products,
			'categoryFilter' => $categoryFilter,
			'subcategoryFilter' => $subcategoryFilter,
			'subcategories' => $subcategories,
		]);
	}

	public function detailMenu($id) {
		$user = session('user');
		$profilePictureUrl = $user['profile_picture'] ?? null;

		$data = Product::find($id);
		$reviewCount = Rating::where('id_product', $id)->count() ?: 0;

		return view('user.detailMenu' , [
			'profile_picture' => $profilePictureUrl, 
			'user' => $user,
			'data' => $data,
			'reviewCount' => $reviewCount,
		]);
	}
	public function displayProfile(){
		$user = session('user');
		$profilePictureUrl = $user['profile_picture'] ?? null;

		$totalSpent = $user['total_spent'] ?? 0;
		$membership = 'Bronze'; 
		if ($totalSpent >= 200000) {
			$membership = 'Diamond';
		} elseif ($totalSpent >= 100000) {
			$membership = 'Gold';
		} elseif ($totalSpent >= 50000) {
			$membership = 'Silver';
		}

		return view('user.profile', [
			'user' => $user,
			'profile_picture' => $profilePictureUrl,  
			'membership' => $membership,
		]);
	}

	public function editProfile(Request $request)
	{
		$request->validate([
			'name' => 'required|string|max:255',
			'password' => 'nullable|string|min:5',
			'profile_picture' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
		]);

		$user = User::find(session('user')['id']);
		if (!$user) {
			return redirect()->route('user.index')->withErrors(['error' => 'User not found.']);
		}

		$user->name = $request->input('name');

		if ($request->filled('password')) {
			$user->password = bcrypt($request->input('password'));
		}

		if ($request->hasFile('profile_picture')) {
			if ($user->profile_picture) {
				Storage::disk('public')->delete($user->profile_picture);
			}

			$fileName = $user->id . '.jpg';
			$filePath = $request->file('profile_picture')->storeAs('profile_pictures', $fileName, 'public');
			$user->profile_picture = $filePath;
		}

		$user->save();

		$sessionData = session('user');
		$sessionData['name'] = $user->name;
		$sessionData['profile_picture'] = $user->profile_picture ? asset('storage/' . $user->profile_picture) : null;

		session(['user' => $sessionData]);

		return redirect()->route('user.index')->with('success', 'Profile updated successfully.');
	}

	public function topup(){
		$user = session('user');
		$profilePictureUrl = $user['profile_picture'] ?? null;

		return view('user.topup' , [
			'profile_picture' => $profilePictureUrl, 
			'user' => $user
		]);
	}

	function process(Request $req) {
		$req->validate([
			'amount' => 'required|integer|min:1',
		]);
		
		try {
			$data = $req->all();
			
			
			$topup = Topup::create([
				'id_user' => session('user.id'),
				'amount' => $data['amount'],
			]);
			

			\Midtrans\Config::$serverKey = config('midtrans.serverKey');
			\Midtrans\Config::$isProduction = false;
			\Midtrans\Config::$isSanitized = true;
			\Midtrans\Config::$is3ds = true;
	
			$params = array(
				'transaction_details' => array(
					'order_id' => rand(),
					'gross_amount' => $data['amount'],
				),
				'customer_details' => array(
					'first_name' => session('user.name'),
					'email' => session('user.email'),
				),
			);
	
			$snapToken = \Midtrans\Snap::getSnapToken($params);

	
			$topup->snap_token = $snapToken;
			$topup->save();
	
			return redirect()->route('user.topup.payment', $topup->id);
		} catch (\Exception $e) {
			dd($e->getMessage());
			Log::error('Midtrans Error: ' . $e->getMessage());
			return redirect()->back()->withErrors(['error' => 'An error occurred while processing your request. Please try again.']);
		}
	}
	
	function payment(Topup $topup) {
		$data = Topup::where('id', $topup->id)->first();
		return view('user.payment', compact('topup', 'data'));
	}
	
	function success(Topup $topup) {
		$topup->status = 1;
		$topup->save();
	
		$user = User::find($topup->id_user);
		$user->increment('credit', $topup->amount);
	
		session()->put('user.credit', $user->credit);
	
		return redirect()->route('user.topup.index');
	}
	

	public function cart(){
		$cart = session('cart', []);
		return view('user.cart', compact('cart'));
	}

	
	public function addCart(Request $request) {
		$request->validate([
			'id_product' => 'required|integer',
			'quantity' => 'required|integer|min:1',
		]);
	
		$product = Product::find($request->input('id_product'));
		if (!$product) {
			return redirect()->route('user.menu')->withErrors(['error' => 'Product not found.']);
		}
	
		$extraCost = 0;
	
		if ($product->category->name == "Beverage") {
			$request->validate([
				'temperature' => 'required|in:hot,cold',
				'size' => 'required|in:small,medium,large',
			]);
	
			$addon = Addon::where('name', $request->input('size'))->where('id_category', $product->category->id)->first();
	
			if ($addon) {
				$extraCost = $addon->price;
			} else {
				if ($request->input('size') == 'small') {
					$extraCost = 5000;
				} elseif ($request->input('size') == 'medium') {
					$extraCost = 10000;
				} elseif ($request->input('size') == 'large') {
					$extraCost = 12000;
				}
			}
		}
	
		$cart = session('cart', []);
		$found = false;
	
		
		foreach ($cart as &$item) {
			if ($item['id_product'] == $product->id &&
				($item['temperature'] == $request->input('temperature', null)) &&
				($item['size'] == $request->input('size', null))) {
				$item['quantity'] += $request->input('quantity');
				$found = true;
				break;
			}
		}
	
		if (!$found) {
			$cart[] = [
				'id_product' => $product->id,
				'name' => $product->name,
				'price' => $product->price + $extraCost,
				'quantity' => $request->input('quantity'),
				'temperature' => $request->input('temperature', null),
				'size' => $request->input('size', null),
			];
		}
	
		session(['cart' => $cart]);
	
		return redirect()->back();
	}

	public function removeCart($index)
    {
        $cart = session('cart', []);
        if (isset($cart[$index])) {
            unset($cart[$index]); 
            session(['cart' => array_values($cart)]); 
        }
		return redirect()->back();    
	}
	public function addQuantity($index){
		$cart = session('cart', []);
        if (isset($cart[$index])) {
            $cart[$index]['quantity'] += 1; 
            $cart[$index]['price'] = $cart[$index]['price'] / $cart[$index]['quantity'] * $cart[$index]['quantity']; 
            session(['cart' => $cart]); 
        }
        return redirect()->back();
	}
	
	public function reduceQuantity($index){
		$cart = session('cart', []);
        if (isset($cart[$index]) && $cart[$index]['quantity'] > 1) {
            $cart[$index]['quantity'] -= 1;
            $cart[$index]['total_price'] = $cart[$index]['price'] * $cart[$index]['quantity'];
            session(['cart' => $cart]); 
        }
		return redirect()->back();
	}
	public function summary(Request $request) {
		$cart = session('cart', []);
		
		$totalPrice = collect($cart)->sum(function($item) {
			return $item['price'] * $item['quantity'];
		});
	
		$promos = Promo::where('min_transaction', '<=', $totalPrice)->get();
		
		$promo = null;
		if ($request->has('promo') && $request->promo != '') {
			$promo = Promo::find($request->promo);
		}
		
		$user = session('user');
		$disc_member = 0;
	
		if ($user) {
			switch ($user['membership']) {
				case 1 :
					$disc_member = 2;
					break;
				case 2:
					$disc_member = 5;
					break;
				case 3:
					$disc_member = 10;
					break;
				default:
					$disc_member = 0;
			}
		}
	
		return view('user.checkoutSummary', compact('cart', 'totalPrice', 'promos', 'disc_member', 'promo'));
	}

	public function checkout(Request $request)
	{
		$cart = session('cart', []);
		$user = session('user');
		if (!$user || !isset($user['id'])) {
			return redirect()->route('login')->with('error', 'You need to be logged in to proceed with checkout.');
		}
		
		$totalPrice = collect($cart)->sum(function ($item) {
			return $item['price'] * $item['quantity'];
		});
	
		$promo = null;
		if ($request->has('promo') && $request->promo != '') {
			$promo = Promo::find($request->promo);
		}
		
		$disc_member = 0;
		if ($user) {
			switch ($user['membership']) {
			case 1:
				$disc_member = 2;
				break;
			case 2:
				$disc_member = 5;
				break;
			case 3:
				$disc_member = 10;
				break;
			default:
				$disc_member = 0;
			}
		}
					
			$discountedPrice = $totalPrice - ($totalPrice * ($disc_member / 100));
			if ($promo) {
				$discountedPrice -= min($discountedPrice * ($promo->discount / 100), $promo->max_discount);
			}
					
			$htrans = Htrans::create([
			'id_user' => $user['id'],
			'subtotal' => $totalPrice,
			'id_promo' => $promo ? $promo->id : null,
			'grandtotal' => $discountedPrice,
		]);
		
		foreach ($cart as $item) {
			$dtrans = Dtrans::create([
				'id_htrans' => $htrans->id,
				'id_product' => $item['id_product'],
				'amount' => $item['quantity'],
				'price_per_item' => $item['price'],
				'item_subtotal' => $item['price'] * $item['quantity'],
			]);
			
			if (!is_null($item['temperature']) && !is_null($item['size']) && isset($item['addons'])) {
				foreach ($item['addons'] as $addon) {
					Daddon::create([
						'id_dtrans' => $dtrans->id,
						'id_addon' => $addon['id'],
						'qty' => $addon['quantity'],
						'subtotal' => $addon['price'] * $addon['quantity'],
					]);
				}
			}
		}
		
		session()->forget('cart');
		
		return redirect()->route('user.index');
	}
	
	public function history(){
		$listTrans = Htrans::with(['dtrans.product'])
			->where('id_user', session('user.id'))
			->orderBy('created_at', 'desc')
			->get();

		return view('user.history', [
			'listTrans' => $listTrans,
		]);
	}

	public function detailHistory(){
		return view('user.detailHistory');
	}

	public function rating(Request $req) {

		$rating = new Rating();
		$rating->id_user = session('user.id'); 
		$rating->id_product = $req->id_product;
		$rating->id_dtrans = $req->id_dtrans;
		$rating->rating = $req->rating;
		$rating->save();

		$this->updateProductRating($req->id_product);

		return redirect()->back();
	}

	private function updateProductRating($productId) {
		$averageRating = Rating::where('id_product', $productId)
				->avg('rating');

		$product = Product::find($productId);
		$product->rating = round($averageRating, 1);
		$product->save();
	}

	public function promo(){
		$user = session('user');
		$profilePictureUrl = $user['profile_picture'] ?? null;
		$listPromo = Promo::all();

		return view('user.listPromo', [
			'user' => $user,
			'profile_picture' => $profilePictureUrl, 
			'listPromo' => $listPromo,
		]);
	}

	public function redeemPromo(){

	}
}
