<?php
namespace App\Http\Controllers\Front;
use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Restaurant;
use App\Models\RestaurantMenu;
use Illuminate\Http\Request;

class RestaurantController extends Controller
{
    public function show(){
        $categories = Category::all();
        $restaurants = Restaurant::where('status', 3)->where('stop', 0)->orderBy('created_at')->paginate(6);
        return view('front.shop.restaurants', compact('restaurants', 'categories'));
    }
    public function showCategory($cateId, Request $request){
        $categories = Category::all();
        $search = null;
        $restaurantMenus = RestaurantMenu::where('cate_id', $cateId)->select('restaurant_id')->distinct()->get()->toArray();
        $restaurantIds = array_column($restaurantMenus, 'restaurant_id');
        $restaurants = Restaurant::where('status', 3)->where('stop', 0)->whereIn('id', $restaurantIds);
        $restaurants = $restaurants->paginate(6);
        return view('front.shop.restaurants', compact('restaurants', 'search', 'categories'));
    }

    public function searchRestaurant(Request $request){
        $categories = Category::all();
        $restaurantName = $request->input('key-word');
        $restaurants = Restaurant::where('status', 3)->where('stop', 0)->where('address', 'like', "%$restaurantName%")->orderBy('created_at')->get();
        if (count($restaurants) > 0){
            $restaurants = Restaurant::where('status', 3)->where('stop', 0)->where('address', 'like', "%$restaurantName%")->orderBy('created_at')->paginate(9);
            $search = 'Search Restaurant';
            return view('front.shop.restaurants', compact('restaurants', 'search', 'categories'))->with(['keyWord' => $restaurantName]);
        }else{
            return redirect('/restaurant-not-found')->with(['keyWord' => $restaurantName]);
        }
    }
    public function showNotfound(){
        $categories = Category::all();
        return view('front.shop.restaurantNotFound', compact('categories'));
    }

    public function category($cate_id){
        $categories = Category::all();
        $restaurantMenus = RestaurantMenu::where('cate_id', $cate_id);
        $ids = $restaurantMenus->get('restaurant_id');
        $restaurants = Restaurant::whereIn('id', $ids)->where('stop', 0)->where('status', 3)->limit(24)->paginate(6);
        return view('front.shop.restaurants', compact('restaurants', 'categories'));
    }
}

