<?php


namespace App\Http\Controllers\Front;


use App\Models\Restaurant;
use App\Models\RestaurantMenu;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class RegisterReservationController
{
    public function registerReservation($userID){
        $restaurant = DB::table('restaurants')->where('user_id',$userID)->first();
        if (isset($restaurant)){
            $restaurant_status = $restaurant->status;
            $restaurant_id  = $restaurant->id;
            $restaurant_menu = DB::table('restaurant_menu')->where('restaurant_id',$restaurant->id)->get();
        }else{
            $restaurant_status = 0;
            $restaurant_menu = 0;
            $restaurant_id = 0;
        }
        $category = DB::table('categories')->get();
//        return view('front.restaurant.registerReservation',compact('restaurant_status','restaurant_status'),compact('restaurant','restaurant'));
        return view('front.restaurant.registerReservation')->with('restaurant_status',$restaurant_status)
            ->with('restaurant',$restaurant)
            ->with('category',$category)
            ->with('restaurant_menu',$restaurant_menu)
            ->with('restaurant_id',$restaurant_id);
    }

    public function add(Request $request){
//        dd($request->file_restaurant);
        if (isset($request)){
            $newRestaurant = new Restaurant();
            $newRestaurant->restaurant_name = $request->name_restaurant;
            $newRestaurant->address = $request->street_restaurant.', '.$request->district.', '.$request->city_restaurant.', '.$request->country_restaurant;
            $newRestaurant->telephone = $request->phone_restaurant;
            $newRestaurant->email = $request->email_restaurant;
            $newRestaurant->owner_name = $request->name_manager;
            $newRestaurant->tel_owner = $request->phone_manager;
            $newRestaurant->user_id = $request->user_id;
            if ($request->hasFile('file_restaurant')){
//                dd($request->file_restaurant);
                if (count($request->file_restaurant) == 1){
                    $file = $request->file_restaurant[0];
                    $newRestaurant->business_license = $file->getClientOriginalName();
                    $file->move('./fileUpload', $file->getClientOriginalName());
                }else{
                    $newRestaurant->business_license = '';
                    for ($j = 0; $j < count($request->file_restaurant) ; $j++){
                        $file = $request->file_restaurant[$j];
                        if ($j == (count($request->file_restaurant) - 1)){
                            $newRestaurant->business_license .= $file->getClientOriginalName();
                        }else{
                            $newRestaurant->business_license .= $file->getClientOriginalName().',';
                        }
                        $file->move('./fileUpload', $file->getClientOriginalName());
                    }
                }
            }

            if ($request->hasFile('avatar_restaurant')){
                $avatar = $request->avatar_restaurant;
                $newRestaurant->avatar = $avatar->getClientOriginalName();
                $avatar->move('./images/resource', $avatar->getClientOriginalName());
            }

            $newRestaurant->save();
        }

        if (isset($request->category)){
            $restaurant = DB::table('restaurants')->where('user_id',$request->user_id)->first();
            for($i = 0; $i < count($request->category) ; $i++){
                $menuRestaurant = new RestaurantMenu();
                $menuRestaurant->cate_id = $request->category[$i];
                $menuRestaurant->restaurant_id = $restaurant->id;
                $menuRestaurant->save();
            }
        }

        return redirect()->back();
    }

    public function package(Request $request){
//        $restaurant = DB::table('restaurants')->where('id',$request->restaurant_id)->first();
        $restaurant = Restaurant::find($request->input('restaurant_id'));
//        dd($restaurant);
        if ($restaurant->package == 0){
            $today = date('Y-m-d');
            $month = strtotime(date("Y-m-d",strtotime($today)). " +".$request->package." month");
            $month = strftime("%Y-%m-%d", $month);
            $restaurant->package = $request->package;
            $restaurant->start_date = $today;
            $restaurant->end_date = $month;
        }else{
            $month = strtotime(date("Y-m-d",strtotime($restaurant->end_date)). " +".$request->package." month");
            $month = strftime("%Y-%m-%d", $month);
            $restaurant->package = $restaurant->package + $request->package;
            $restaurant->end_date = $month;
        }
        $restaurant->save();

        return redirect()->back();
    }
}
