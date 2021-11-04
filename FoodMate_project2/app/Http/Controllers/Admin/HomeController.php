<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\OrderDetail;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    //
    public function show($type)
    {
        $orders = Order::where('restaurant_id', Auth::user()->restaurant_id)->whereMonth('created_at', '=', date('m'))->where('status','delivered')->get();
        $monthlyEarning = 0;
        foreach ($orders as $order) {
            $monthlyEarning += $order->total;
        }
        $customers = Order::where('restaurant_id', Auth::user()->restaurant_id)->whereMonth('created_at', '=', date('m'))->where('status','<>','in cart')->distinct('user_id')->count();
        $orderNumber = Order::where('restaurant_id', Auth::user()->restaurant_id)->whereMonth('created_at', '=', date('m'))->where('status','<>','in cart')->count();
        $todayOrderNumber = Order::where('restaurant_id', Auth::user()->restaurant_id)->where('status','<>','in cart')->whereDate('created_at', '=', date('Y-m-d'))->count();
        $data = array();
        $months = date('m');
        for ($i = 1; $i <= $months; $i++) {
            $orders = Order::where('restaurant_id', Auth::user()->restaurant_id)->whereMonth('created_at', '=', $i)->where('status', 'delivered')->get();
            $monthlyEarn = 0;
            foreach ($orders as $order) {
                $monthlyEarn += $order->total;
            }
            $data[$i] = $monthlyEarn;
        }
        $productIds = array();
        $products = Product::where('restaurant_id', Auth::user()->restaurant_id)->get();
        for ($i = 0; $i < count($products); $i++) {
            $productIds[$i] = $products[$i]->id;
        }
        if ($type == 1){
            $orderDetails = DB::table('order_details')->whereMonth('created_at', '=',date('m'))->get();
        }elseif($type == 2){
            $orderDetails = DB::table('order_details')->whereDate('created_at', '=',date('Y-m-d'))->get();
        }else{
            $orderDetails = DB::table('order_details')->whereYear('created_at', '=',date('Y'))->get();
        }
        $allProductSold = $this->group_by("product_id", $orderDetails);
        $productWithQty = array();
        $totalSales = 0;
        foreach ($allProductSold as $product) {
            $qty = 0;
            if (Product::find($product[0]['product_id'])->restaurant_id == Auth::user()->restaurant_id){
                for ($j = 0; $j < count($product);$j++) {
                    $qty += $product[$j]["qty"];
                }
                $totalSales += $qty;
                $productWithQty[count($productWithQty)] = array("product_id" => $product[$j - 1]['product_id'], "qty" => $qty);
            }
        }
        $quantity = array_column($productWithQty, 'qty');
        array_multisort($quantity, SORT_DESC, $productWithQty);
        if (count($productWithQty) > 5){
            $productWithQty = array_slice($productWithQty, 0, 5);
        }
        return view('admin.index', compact('orderNumber', 'monthlyEarning', 'customers', 'todayOrderNumber', 'data','productWithQty', 'totalSales', 'type'));
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

    public function showEarning(){
        $orders = Order::where('restaurant_id', Auth::user()->restaurant_id)->where('status', 'delivered')->orderBy('created_at', 'DESC')->paginate(6);

        return view('admin.earning', compact('orders'));
    }

    public function earningFilter()
    {
        $orders = Order::where('email', '<>', 'undefined')->where('restaurant_id', Auth::user()->restaurant_id)->where('status', 'delivered');
        $start = $_GET['start-time'];
        $end = $_GET['end-time'];
        if ($start!=null && $end != null) {
            $orders = $orders->whereBetween('created_at', [$start, $end]);
        }elseif ($start!=null && $end == null){
            $orders = $orders->where('created_at', '>=', $start);
        }elseif($start == null && $end != null){
            $orders = $orders->where('created_at', '<=', $end);
        }
        $orders = $orders->orderBy('created_at', 'DESC')->paginate(6);
        return view('admin.earning', compact('orders'));
    }
}
