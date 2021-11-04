@extends('front.layout.master')
@section('body')
    <div class="bread-crumbs-wrapper">
        <div class="container">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="/" title="" itemprop="url">Home</a></li>
                <li class="breadcrumb-item"><a href="/dashboard/orders" title="" itemprop="url">Orders</a></li>
                <li class="breadcrumb-item active">Order Details</li>
            </ol>
        </div>
    </div>

    <section>
        <div class="block less-spacing gray-bg top-padd30">
            <div class="container">
                <div class="row">
                    <div class="col-md-12 col-sm-12 col-lg-12">
                        <div class="sec-box">
                            <div class="dashboard-tabs-wrapper">
                                <div class="row">
                                    <div class="col-md-4 col-sm-12 col-lg-4">
                                        <div class="profile-sidebar brd-rd5 wow fadeIn" data-wow-delay="0.2s">
                                            <div class="profile-sidebar-inner brd-rd5">
                                                @include('front.components.userInfo')
                                                <ul class="nav nav-tabs">
                                                    <li><a href="/dashboard/cart"><i
                                                                class="fa fa-shopping-basket"></i> MY CART</a></li>
                                                    <li class="active"><a href="/dashboard/orders"><i
                                                                class="fa fa-file-text"></i>MY ORDERS</a></li>
                                                    <li><a href="/dashboard/setting"><i
                                                                class="fa fa-cog"></i> ACCOUNT SETTINGS</a></li>
                                                    @if(\Illuminate\Support\Facades\Auth::user()->role == 2)
                                                        <li><a href="/admin-dashboard/1"><i class="fa fa-window-maximize"></i>MY RESTAURANT</a></li>
                                                    @endif
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-8 col-sm-12 col-lg-8">
                                        <div class="tab-content">
                                            <div class="tab-pane fade in active" id="my-orders">
                                                <div class="tabs-wrp brd-rd5">
                                                    <h4 itemprop="headline"
                                                        style="margin-top:-10px; margin-bottom: 10px;">Order
                                                        Details</h4>
                                                    <div class="booking-table">
                                                        <table class="table-bordered">
                                                            <thead>
                                                            <tr>
                                                                <th>ID</th>
                                                                <th>DISH NAME</th>
                                                                <th>QTY</th>
                                                                <th>RESTAURANT</th>
                                                                <th>STATUS</th>
                                                            </tr>
                                                            </thead>
                                                            <tbody>
                                                            @for($i = 0; $i < count($orderDetails); $i++)
                                                                @if($i ==0)
                                                                    <tr>
                                                                        <td rowspan="{{count($orderDetails)}}">
                                                                            #{{$orderDetails[0]->order_id}}</td>
                                                                        <td class="order-dish-name">
                                                                            <h5 itemprop="headline"><a href="#" title=""
                                                                                                       itemprop="url">{{\App\Models\Product::find($orderDetails[0]->product_id)->name}}
                                                                                </a></h5>
                                                                        </td>
                                                                        <td>{{$orderDetails[0]->qty}}</td>
                                                                        <td rowspan="{{count($orderDetails)}}">{{\App\Models\Product::find($orderDetails[0]->product_id)->restaurant->restaurant_name}}</td>
                                                                        <td rowspan="{{count($orderDetails)}}"><span
                                                                                class="brd-rd3 {{\App\Models\Order::find($orderDetails[0]->order_id)->status}}">
                                                                                @if(\App\Models\Order::find($orderDetails[0]->order_id)->status == 'pending')
                                                                                    pending
                                                                                @elseif(\App\Models\Order::find($orderDetails[0]->order_id)->status == 'on-delivery')
                                                                                    on delivery
                                                                                @elseif(\App\Models\Order::find($orderDetails[0]->order_id)->status == 'rejected')
                                                                                    rejected
                                                                                @elseif(\App\Models\Order::find($orderDetails[0]->order_id)->status == 'canceled')
                                                                                    canceled
                                                                                @elseif(\App\Models\Order::find($orderDetails[0]->order_id)->status == 'processing')
                                                                                    processing
                                                                                @else
                                                                                    delivered
                                                                                @endif
                                                                            </span>
                                                                        </td>
                                                                    </tr>
                                                                @else
                                                                    <tr>
                                                                        <td>
                                                                            <h5 itemprop="headline"><a href="#" title=""
                                                                                                       itemprop="url"
                                                                                                       class="text-truncate">{{\App\Models\Product::find($orderDetails[$i]->product_id)->name}}
                                                                                </a></h5>
                                                                        </td>
                                                                        <td>{{$orderDetails[$i]->qty}}</td>
                                                                    </tr>
                                                                @endif
                                                            @endfor
                                                            </tbody>
                                                        </table>
                                                        <div class="total-block" style="background-color: white;">
                                                            <table class="checkout-price-table">
                                                                <tr>
                                                                    <th>Subtotal :</th>
                                                                    <td>
                                                                        ${{\App\Models\Order::find($orderDetails[0]->order_id)->total}}
                                                                        .00
                                                                    </td>

                                                                </tr>
                                                                <tr>
                                                                    <th>Total :</th>
                                                                    <td>
                                                                        ${{\App\Models\Order::find($orderDetails[0]->order_id)->total}}
                                                                        .00
                                                                    </td>

                                                                </tr>
                                                            </table>
                                                        </div>
                                                        <div id="time-container">

                                                            <table id="order-time-table" class="table-bordered">
                                                                <tr>
                                                                    <td>Phone:</td>
                                                                    <td>{{\App\Models\Order::find($orderDetails[0]->order_id)->phone}}</td>
                                                                </tr>
                                                                <tr>
                                                                    <td>Email:</td>
                                                                    <td>{{\App\Models\Order::find($orderDetails[0]->order_id)->email}}</td>
                                                                </tr>
                                                                <tr>
                                                                    <td>Address:</td>
                                                                    <td>{{\App\Models\Order::find($orderDetails[0]->order_id)->address}}</td>
                                                                </tr>
                                                                <tr>
                                                                    <th>Order time:</th>
                                                                    <td>{{date('H:i - M d, Y', strtotime(\App\Models\Order::find($orderDetails[0]->order_id)->created_at))}}</td>
                                                                </tr>
                                                                <tr>
                                                                    <th>Estimated processing & delivery amount:</th>
                                                                    <td>
                                                                        {{date('H:i - M d, Y', strtotime(\App\Models\Order::find($orderDetails[0]->order_id)->delivery_estimated)) ?? 'Not Yet'}}
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <th>Delivered time:</th>
                                                                    <td>
                                                                        @if(\App\Models\Order::find($orderDetails[0]->order_id)->delivered_time != null)
                                                                            {{date('H:i - M d, Y', strtotime(\App\Models\Order::find($orderDetails[0]->order_id)->delivered_time))}}
                                                                        @else
                                                                            Not yet
                                                                        @endif
                                                                    </td>
                                                                </tr>
                                                            </table>

                                                        </div>
                                                        @if(\App\Models\Order::find($orderDetails[0]->order_id)->status === 'pending')
                                                            <div class="order-action" style="margin-top: 50px;">
                                                                <button class="btn primary-btn" id="back-to-order"
                                                                        onclick="window.location.href = '/dashboard/orders'">
                                                                    <i class="fa fa-chevron-left"></i> Back to orders
                                                                </button>
                                                                <button class="btn primary-btn red-bg"
                                                                        id="cancel-order-btn">Cancel this order
                                                                </button>
                                                            </div>
                                                            <div class="cancel-order">
                                                                <form method="post" action="/order/cancel">
                                                                    @csrf
                                                                    <div class="form-group">
                                                                        <label for="cancel-reason">Reason of
                                                                            Cancelation: </label>
                                                                        <textarea class="form-control" rows="4"
                                                                                  id="cancel-reason"
                                                                                  name="cancel-reason"
                                                                                  required></textarea>
                                                                        <input type="hidden" name="order-id"
                                                                               value="{{\App\Models\Order::find($orderDetails[0]->order_id)->id}}">
                                                                    </div>
                                                                    <button class="btn primary-btn red-bg"
                                                                            id="send-cancel" type="submit">Send
                                                                    </button>
                                                                    <button class="btn primary-btn" id="back"
                                                                            type="button">Cancel
                                                                    </button>
                                                                </form>
                                                            </div>
                                                        @endif
                                                        @if(\App\Models\Order::find($orderDetails[0]->order_id)->status === 'rejected' || \App\Models\Order::find($orderDetails[0]->order_id)->status === 'canceled')
                                                            <div class="cancel-order" style="display: block">
                                                                <form action="#">
                                                                    <div class="form-group">
                                                                        <label for="cancel-reason">Reason of
                                                                            Cancelation: </label>
                                                                        <textarea class="form-control" rows="4"
                                                                                  id="cancel-reason"
                                                                                  disabled>{{\App\Models\Order::find($orderDetails[0]->order_id)->extra_info}}</textarea>
                                                                    </div>
                                                                </form>
                                                            </div>
                                                        @endif
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div><!-- Section Box -->
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
