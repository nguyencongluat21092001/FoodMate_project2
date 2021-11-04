<?php


namespace App\Http\Controllers\Front;

use App\Models\Category;
use App\Models\Comment;
use App\Models\Product;
use App\Models\Restaurant;
use App\Models\RestaurantReview;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\Models\RestaurantMenu;
class RestaurantDetailController
{
    public function restaurantDetail($id){
        $comments = RestaurantReview::where('restaurant_id', $id)->orderBy('created_at', 'DESC')->limit(3)->get();
        $categories = Category::all();
        $restaurant = Restaurant::find($id);
        $products = DB::table('products')->where('restaurant_id', $id)->where('is_deleted', 0)->get();
        $products = $this->group_by('cate_id', $products);
        return view('front.restaurant.restaurantDetail', compact('products', 'restaurant', 'categories', 'comments'));
    }

    public function review(Request $request){
        $restaurantId = $request->input('restaurant-id');
        $previousReview = RestaurantReview::where('user_id', Auth::id())->where('restaurant_id', $restaurantId)->first();
        if ($request->rate != null) {
            $rate = $request->rate;
        } else {
            $rate = 0;
        }
        if ($request->message != null) {
            $message = $request->message;
        } else {
            $message = '';
        }
        if ($previousReview == null) {
            $review = new RestaurantReview();
        }else{
            $review = $previousReview;
        }
        $review->messages = $message;
        $review->rate = $rate;
        $review->restaurant_id = $restaurantId;
        $review->user_id = Auth::id();
        $review->save();

        //update rating in products table
        $restaurant = Restaurant::find($restaurantId);
        $allComment = RestaurantReview::where('restaurant_id', $restaurantId)->where('rate', '>', 0)->get();
        $sum = 0;
        if (count($allComment) > 0) {
            foreach ($allComment as $comment){
                $sum += $comment->rate;
            }
            $rating = number_format($sum / count($allComment), 1);
        }else{
            $rating = $restaurant->rating;
        }
        $restaurant->rating = number_format($rating, 1);
        $restaurant->save();
        return back();
    }

    function group_by($key, $data)
    {
        $result = array();

        foreach ($data as &$val) {
            $val = get_object_vars($val);
            if (array_key_exists($key, $val)) {
                $result[$val[$key]][] = $val;
            } else {
                $result[""][] = $val;
            }
        }

        return $result;
    }
}
