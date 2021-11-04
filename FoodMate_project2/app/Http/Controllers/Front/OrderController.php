<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\OrderDetail;
use App\Models\UserCart;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class OrderController extends Controller
{
    public function show($userId, $restaurantId)
    {
        $order = Order::where('user_id', $userId)->where('restaurant_id', $restaurantId)->where('status', 'in cart')->get();
        $products = UserCart::where('order_id', $order[0]->id)->get();
        return view('front.shop.placeOrder', compact('order', 'products'));
    }


    public function showOrderList(){
        $orders = Order::where('email', '<>', 'undefined')->where('user_id', Auth::id())->orderBy('created_at', 'DESC')->paginate(4);
        return \view('front.dashboard.orders', compact('orders'));
    }

    public function statusFilter(){
        $orders = Order::where('email', '<>', 'undefined')->where('user_id', Auth::id());
        $start = $_GET['start-time'] ?? null;
        $end = $_GET['end-time'] ?? null;
        if ($start!=null && $end != null) {
            $orders = $orders->whereBetween('created_at', [$start, $end]);
        }elseif ($start!=null && $end == null){
            $orders = $orders->where('created_at', '>=', $start);
        }elseif($start == null && $end != null){
            $orders = $orders->where('created_at', '<=', $end);
        }
        $status = $_GET['status'];
        if ($status != 'all'){
            $orders = $orders->where('status', $status);
        }
        $orders = $orders->orderBy('created_at','DESC')->paginate(4);
        return \view('front.dashboard.orders', compact('orders'));
   }

    public function placeOrder(Request $request){
        if ($request->input('checkout-method') == 'later') {
            $order = Order::find($request->input('order-id'));
            $order->full_name = $request->input('full-name');
            $order->email = $request->input('email');
            $order->phone = $request->input('phone');
            $order->address = $request->input('address');
            $order->status = 'pending';
            $order->created_at = date('Y-m-d H:i:s');
            $order->save();

            $products = UserCart::where('order_id', $order->id)->get();
            foreach ($products as $product){
                //insert products to order_details table

                $orderDetail = new OrderDetail();
                $orderDetail->order_id = $order->id;
                $orderDetail->product_id = $product->product_id;
                $orderDetail->user_id = $order->user_id;
                $orderDetail->qty = $product->qty;
                $orderDetail->total = $product->total;
                $orderDetail->save();

            }

            //delete products in cart after place order
            UserCart::where('order_id', $order->id)->delete();
            return \view('front.shop.thank');
        }else {
            return 'We are not support online checkout now !';
        }
    }

    public function orderDetail($orderId){
        $orderDetails = DB::table('order_details')->where('order_id', $orderId)->get();
        return view('front.shop.orderDetail')->with('orderDetails', $orderDetails);
    }

    public function cancelOrder(Request $request){
        $orderId = $request->input('order-id');
        $reason = $request->input('cancel-reason');
        $order = Order::find($orderId);
        $order->status = 'canceled';
        $order->extra_info = $reason;
        $order->save();
        return back();
    }
}
