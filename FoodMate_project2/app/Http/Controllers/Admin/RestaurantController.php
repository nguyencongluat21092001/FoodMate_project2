<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Order;
use App\Models\Restaurant;
use App\Models\RestaurantImage;
use App\Models\RestaurantMenu;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class RestaurantController extends Controller
{
    //
    public function showRestaurantInfo()
    {
        $categories = Category::all();
        $restaurant = Restaurant::find(Auth::user()->restaurant_id);
        return view('admin.restaurant.restaurant_info', compact('restaurant', 'categories'));
    }

    public function editInfo(Request $request)
    {
        $ownerName = $request->input('owner-name');
        $telephone = $request->input('telephone');
        $ownerTel = $request->input('owner-telephone');
        $address = $request->address;
        $restaurantName = $request->input('restaurant-name');
        $email = $request->input('email');
        $restaurantId = $request->input('restaurant-id');
        $restaurant = Restaurant::find($restaurantId);
        $restaurant->owner_name = $ownerName;
        $restaurant->tel_owner = $ownerTel;
        $restaurant->telephone = $telephone;
        $restaurant->address = $address;
        $restaurant->restaurant_name = $restaurantName;
        $restaurant->email = $email;
        $menus = $request->menus;
        if ($menus != null) {
            if (count($menus) > 0) {
                //add new menus
                foreach ($menus as $menu) {
                    $newMenu = new RestaurantMenu();
                    $newMenu->restaurant_id = $restaurant->id;
                    $newMenu->cate_id = $menu;
                    $newMenu->save();
                }
            }
        }
        $restaurant->save();
        return back();
    }

    public function editAvatar(Request $request)
    {
        $restaurant = Restaurant::find(Auth::user()->restaurant_id);
        if ($request->hasFile('img-avatar')) {
            $validator = Validator::make(['imageavatar' => $request->file('img-avatar')], [
                'imageavatar' => 'mimes:jpg,png,jpeg,gif|max:10000'
            ]);
            if ($validator->fails()) {
                $error = $validator->errors();
                return back()->withErrors($error);
            } else {
                $file = $request->file('img-avatar');
                $imageName = time() . '.' . $file->getClientOriginalName();
                // remove old avatar image if exist
                if ($restaurant->avatar != null) {
                    unlink('images/resource/' . $restaurant->avatar);
                }
                // store new avatar image
                $file->move(public_path('images/resource'), $imageName);
                // store path in database
                $restaurant->avatar = $imageName;
                $restaurant->save();
            }
        }
        return back();
    }

    public function editImages(Request $request)
    {
        $restaurant = Restaurant::find(Auth::user()->restaurant_id);
        if ($request->hasFile('img-0')) {
            $this->checkAndSaveImage(0, $request, $restaurant);
        }
        if ($request->hasFile('img-1')) {
            $this->checkAndSaveImage(1, $request, $restaurant);
        }
        if ($request->hasFile('img-2')) {
            $this->checkAndSaveImage(2, $request, $restaurant);
        }
        if ($request->hasFile('img-3')) {
            $this->checkAndSaveImage(3, $request, $restaurant);
        }
        return back();
    }

    public function deleteImage($id)
    {
        $img = RestaurantImage::find($id);
        unlink('images/resource/' . $img->path);
        $img->delete();
        return back();
    }

    protected function checkAndSaveImage($key, Request $request, $restaurant)
    {
        $validator = Validator::make(['image' . $key => $request->file('img-' . $key)], [
            'image' . $key => 'mimes:jpg,png,jpeg,gif|max:10000'
        ]);
        if ($validator->fails()) {
            $error = $validator->errors();
            return back()->withErrors($error);
        } else {
            $img = $request->file('img-' . $key);
            $this->saveImage($img, $key, $restaurant);
        }
    }

    private function saveImage($file, $index, Restaurant $restaurant)
    {
        $imageName = time() . '.' . $file->getClientOriginalName();
        // remove old product image if exist
        if (count($restaurant->restaurantImages) > $index) {
            if ($restaurant->restaurantImages[$index]->path != null) {
                unlink('images/resource/' . $restaurant->restaurantImages[$index]->path);
            }
            // store new product image
            $file->move(public_path('images/resource'), $imageName);
            // store path in database
            $image = $restaurant->restaurantImages[$index];
        } else {
            // store new product image
            $file->move(public_path('images/resource'), $imageName);
            // store path in database
            $image = new RestaurantImage();
            $image->restaurant_id = $restaurant->id;
        }
        $image->path = $imageName;
        $image->save();
    }

}
