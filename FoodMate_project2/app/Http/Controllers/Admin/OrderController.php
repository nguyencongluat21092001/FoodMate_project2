<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\Product;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Validator;

class OrderController extends Controller
{
    //
    public function showOrders()
    {
        $orders = Order::where('email', '<>', 'undefined')->where('restaurant_id', Auth::user()->restaurant_id)->orderBy('created_at', 'DESC')->paginate(6);
        return view('admin.order.orders', compact('orders'));
    }

    public function statusFilter()
    {
        $orders = Order::where('email', '<>', 'undefined')->where('restaurant_id', Auth::user()->restaurant_id);
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
        if ($status != 'all') {
            $orders = $orders->where('status', $status);
        }
        $orders = $orders->orderBy('created_at', 'DESC')->paginate(6);
        return view('admin.order.orders', compact('orders'));
    }

    public function orderDetail($orderId)
    {
        $order = Order::find($orderId);
        return view('admin.order.order_detail', compact('order'));
    }

//    public function acceptOrder(Request $request)
//    {
//        $orderId = $request->input('order-id');
//        $timeAmount = $request->input('estimated-amount');
//        $order = Order::find($orderId);
//        $order->delivery_amount = $timeAmount;
//        $order->status = 'processing';
//        $order->save();
//
//        return back();
//    }
    public function acceptOrder(Request $request)
    {
        $orderId = $request->input('order-id');
        $date = $request->input('delivery-date');
        $time = $request->input('delivery-time');
        $dateTime = $date." ".$time;
        $order = Order::find($orderId);
        $order->delivery_estimated = date('y-m-d H:i:s', strtotime($dateTime));
        $order->status = 'processing';
        $order->save();

        return back();
    }
    private function sendEmail($order){
        $email_to = $order->email;
        Mail::send('front.components.mail', compact('order'), function($message) use ($email_to){
            $message->from('foodMate@gmail.com', 'FoodMate');
            $message->to($email_to, $email_to);
            $message->subject('Order Notification');
        });
    }
    public function startDelivery($orderId)
    {
        $order = Order::find($orderId);
        $order->status = 'on-delivery';
        $order->save();
        $this->sendEmail($order);
        return back();
    }

    public function rejectOrder(Request $request)
    {
        $orderId = $request->input('order-id');
        $reason = $request->input('reject-reason');
        $order = Order::find($orderId);
        $order->status = 'rejected';
        $order->extra_info = $reason;
        $order->save();
        return back();
    }

    public function markDelivered(Request $request)
    {
        $orderId = $request->input('order-id');
        $order = Order::find($orderId);

        if ($request->hasFile('img-confirm')) {
            $validator = Validator::make(['imageConfirm' => $request->file('img-confirm')], [
                'imageConfirm' => 'mimes:jpg,png,jpeg,gif|max:10000'
            ]);
            if ($validator->fails()) {
                $error = $validator->errors();
                return back()->withErrors($error);
            } else {
                $file = $request->file('img-confirm');
                $imageName = time() . '.' . $file->getClientOriginalName();
                // store new confirm image
                $file->move(public_path('images/resource'), $imageName);
                // store path in database
                $order->delivered_confirm = $imageName;
                $order->status = 'delivered';
                $order->delivered_time = date('Y-m-d H:i:s');
                $order->save();
            }

            //check for setting product as featured
            foreach ($order->orderDetails as $orderDetail) {
                $orders = Order::where('user_id', $order->user_id)->whereMonth('created_at', '=', date('m'))
                    ->where('status','delivered')
                    ->get();
                $totalSoldQty = 0;
                foreach ($orders as $ord) {
                    foreach ($ord->orderDetails as $detail) {
                        if ($detail->product_id == Product::find($orderDetail->product_id)->id) {
                            $totalSoldQty += $detail->qty;
                        }
                    }
                }
                if ($totalSoldQty >= 30) {
                    Product::find($orderDetail->product_id)->update(['featured' => 1]);
                }
            }
        }
        return back();
    }
}
