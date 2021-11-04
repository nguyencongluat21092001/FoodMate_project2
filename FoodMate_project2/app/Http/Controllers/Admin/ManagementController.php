<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use App\Models\Restaurant;
use App\Models\User;
use Illuminate\Http\Request;
//use Illuminate\View\View;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\View;

class ManagementController extends Controller
{
    //

    public function showRestaurants(){
        $restaurants = DB::table('restaurants')->where('stop','0')->orderBy('status')->get();
        return View::make('admin.management.admin_restaurant',['restaurants'=>$restaurants]);
    }

    public function searchRestaurantResult(Request $request)
    {
        $restaurants = DB::table('restaurants')->where('stop','0')->orderBy('status')->get();
        $search_restaurant = DB::table('restaurants')->where('restaurant_name', 'like',"%$request->restaurant_name%")
                ->get();
        if (count($search_restaurant) == 0){
            $search = 0;
            $search_restaurant = 1;
        }else{
            $search = 1;
        }
//                dd($search_restaurant);

//        dd($search);
        return View::make('admin.management.admin_restaurant')->with('search_restaurant',$search_restaurant)
            ->with('name_search',$request->restaurant_name)
            ->with('restaurants',$restaurants)
            ->with('search',$search);
    }

    public function showDetail($id){
        $restaurant_detail = DB::table('restaurants')->where('id',$id)->get();
        return view('admin.management.admin_restaurant_detail',compact('restaurant_detail',$restaurant_detail));
    }
    public function updateStatus($id,$status){
        $restaurant_detail = Restaurant::find($id);
        $user_id = User::find($restaurant_detail->user_id);
        if ($status == 1){
            $this->sendAcceptedEmail($restaurant_detail);
        }
        if ($status == 2){
            //set restaurant_id and change role for user
            $user_id->restaurant_id = $id;
            $user_id->role = 2;
            $user_id->save();
            $this->sendActiveEmail($restaurant_detail);
        }
        if (isset($restaurant_detail)){
            $restaurant_detail->status = ($status + 1 );
            $restaurant_detail->save();
        }
        return back();
    }

    private function sendAcceptedEmail($restaurant){
        $email_to = $restaurant->email;
        Mail::send('front.components.acceptRegisterRestaurantMail', compact('restaurant'), function($message) use ($email_to){
            $message->from('foodMate@gmail.com', 'FoodMate');
            $message->to($email_to, $email_to);
            $message->subject('Registration Notification');
        });
    }
    private function sendActiveEmail($restaurant){
        $email_to = $restaurant->email;
        Mail::send('front.components.activeRestaurantMail', compact('restaurant'), function($message) use ($email_to){
            $message->from('foodMate@gmail.com', 'FoodMate');
            $message->to($email_to, $email_to);
            $message->subject('Active restaurant Notification');
        });
    }

    public function stopRestaurant($id){
        $restaurant_detail = Restaurant::find($id);
            $restaurant_detail->stop = 1;
            $restaurant_detail->save();
        return back();
    }

    public function download($file,$id){
        if (!empty($file)) {
            $file_name = basename($file);
//            $file_path = "./fileUpload/" . $file_name;
            $file_path = public_path('./fileUpload/'.trim($file_name));
//            dd(file_exists($file_path));
            if (file_exists($file_path) == true){
                return response()->download($file_path);
            }else{
                echo "File not exit! <a href='/management-restaurant-detail/".$id."' class='btn btn-dark' >Back</a>";
            }
        }
    }

    public function delete($id){
        $restaurant = Restaurant::find($id);
        if (!empty($restaurant)){
            $restaurant->delete();
        }
        return redirect('/management-restaurants');
    }
}
