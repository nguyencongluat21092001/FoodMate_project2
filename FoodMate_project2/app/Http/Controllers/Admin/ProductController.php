<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Product;
use App\Models\ProductImage;
use App\Models\RestaurantMenu;
use Faker\Core\File;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class ProductController extends Controller
{
    //
    public function showProducts()
    {
        $products = Product::where('restaurant_id', Auth::user()->restaurant_id)->where('is_deleted', 0)->orderBy('name')->paginate(5);
//        $products = $products->paginate(6);
        return view('admin.product.product_list', compact('products'));
    }

    public function searchProductResult(Request $request)
    {
        $oldName = '';
        if ($request->input('product-name') !== null) {
            $name = $request->input('product-name');
            $products = Product::where('restaurant_id', Auth::user()->restaurant_id)
                ->where('is_deleted', 0)
                ->where('name', 'like', "%$name%");
            if (count($products->get()) == 0) {
                $products = null;
                $oldName = $name;
            } else {
                $products = Product::where('restaurant_id', Auth::user()->restaurant_id)
                    ->where('is_deleted', 0)
                    ->where('name', 'like', "%$name%")->paginate(5);
            }
        }
        return view('admin.product.product_list', compact('products', 'oldName'));
    }

    public function productEditShow($productId)
    {
        $restaurantMenus = RestaurantMenu::where('restaurant_id', Auth::user()->restaurant_id)->get();
        $product = Product::find($productId);
        return view('admin.product.product_edit', compact('product', 'restaurantMenus'));
    }

    public function editInfo(Request $request)
    {
        $product = Product::find($request->input('product-id'));
        $product->name = $request->input('product-name');
        $product->cate_id = $request->input('category');
        $product->price = $request->input('price');
        if ($request->input('discount') == 0) {
            $product->discount = null;
        } else {
            $product->discount = $request->input('discount');
        }
        $product->status = $request->input('status');
        $product->description = $request->input('description');
        $product->save();

        return redirect('/admin-product');
    }

    public function checkAndSaveImage($key, Request $request, $product)
    {
        $validator = Validator::make(['image' . $key => $request->file('img-' . $key)], [
            'image' . $key => 'mimes:jpg,png,jpeg,gif|max:10000'
        ]);
        if ($validator->fails()) {
            $error = $validator->errors();
            return back()->withErrors($error);
        } else {
            $img = $request->file('img-' . $key);
            $this->saveImage($img, $key, $product);
        }
    }

    public function editImages(Request $request)
    {
        $product = Product::find($request->input('product-id'));
        if ($request->hasFile('img-0')) {
            $this->checkAndSaveImage(0, $request, $product);
        }
        if ($request->hasFile('img-1')) {
            $this->checkAndSaveImage(1, $request, $product);
        }
        if ($request->hasFile('img-2')) {
            $this->checkAndSaveImage(2, $request, $product);
        }
        if ($request->hasFile('img-3')) {
            $this->checkAndSaveImage(3, $request, $product);
        }
        return back();
    }

    protected function saveImage($file, $index, Product $product)
    {
        $imageName = time() . '.' . $file->getClientOriginalName();
        // remove old product image if exist
        if (count($product->productImages) > $index) {
            if ($product->productImages[$index]->path != null) {
                unlink('images/resource/' . $product->productImages[$index]->path);
            }
            // store new product image
            $file->move(public_path('images/resource'), $imageName);
            // store path in database
            $image = $product->productImages[$index];
        } else {
            // store new product image
            $file->move(public_path('images/resource'), $imageName);
            // store path in database
            $image = new ProductImage();
            $image->product_id = $product->id;
        }
        $image->path = $imageName;
        $image->save();
    }

    public function deleteImage($id)
    {
        $img = ProductImage::find($id);
        unlink('images/resource/' . $img->path);
        $img->delete();
        return back();
    }

    public function deleteProduct($id)
    {
        $product = Product::find($id);
        $product->is_deleted = 1;
        $product->save();
        return back();
    }

    public function showAdd()
    {
        $restaurantMenus = RestaurantMenu::where('restaurant_id', Auth::user()->restaurant_id)->get();
        return view('admin.product.add_product', compact('restaurantMenus'));
    }

    public function addProduct(Request $request)
    {
        $product = new Product();
        $name = $request->input('product-name');
        $category = $request->input('category');
        $price = $request->input('price');
        $discount = $request->input('discount');
        $description = $request->input('description');
        if (!$request->hasFile('img-0') && !$request->hasFile('img-1') && !$request->hasFile('img-2') && !$request->hasFile('img-3')) {
            $error = 'Please input at least 1 product image !';
            return back()->with('error', $error)->withInput();
        } else {
            //add product information
            $product->name = $name;
            $product->cate_id = $category;
            $product->price = $price;
            $product->status = 1;
            $product->restaurant_id = Auth::user()->restaurant_id;
            $product->featured = 0;
            if ($discount == 0) {
                $product->discount = null;
            } else {
                $product->discount = $discount;
            }
            $product->description = $description;
            $product->save();
            //upload and save images
            if ($request->hasFile('img-0')) {
                $this->checkAndSaveImage(0, $request, $product);
            }
            if ($request->hasFile('img-1')) {
                $this->checkAndSaveImage(1, $request, $product);
            }
            if ($request->hasFile('img-2')) {
                $this->checkAndSaveImage(2, $request, $product);
            }
            if ($request->hasFile('img-3')) {
                $this->checkAndSaveImage(3, $request, $product);
            }
            $productImage = ProductImage::where('product_id', $product->id)->get();
            if (count($productImage) < 1) {
                $product->delete();
            }
        }
        return back();
    }
}
