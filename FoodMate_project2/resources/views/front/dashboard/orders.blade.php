@extends('front.layout.master')
@section('title', 'Dashboard')
@section('body')
    <div class="bread-crumbs-wrapper">
        <div class="container">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="#" title="" itemprop="url">Home</a></li>
                <li class="breadcrumb-item active">Orders</li>
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
                                                    <h4 itemprop="headline">MY Orders</h4>
                                                    <form action="order/filter-order-status" method="get">
                                                    <div class="select-wrap-inner" style="max-width: 100%">
                                                        <div class="select-wrp2"style="width: 30%">
                                                                <div class="input-daterange input-group">
                                                                    <input type="date" style="padding: 22px;color: #a2a2a2; border: 0; box-shadow: 0 3px 10px rgb(0 0 0 / 4%);" class="input-sm form-control" name="start-time" onchange="this.form.submit()" value="{{request('start-time')}}" />
                                                                </div>
                                                        </div>
                                                        <span class="input-group-text" style="display: inline-block;padding: 12px 0px; float: left; font-size: 14px;">To</span>
                                                        <div class="select-wrp2"style="width: 30%;margin-left: 10px">
                                                            <div class="input-daterange input-group">
                                                                <input type="date" class="input-sm form-control" style="padding: 22px;color: #a2a2a2;border: 0;box-shadow: 0 3px 10px rgb(0 0 0 / 4%);" name="end-time" onchange="this.form.submit()" value="{{request('end-time')}}" />
                                                            </div>
                                                        </div>
                                                        <div class="select-wrp2" style="float:right; width: 30%">
                                                                <select onchange="this.form.submit()" name="status" style="width: 90%;float: right;color: #a2a2a2;padding: 12px 30px; text-align: center">
                                                                    <option style="text-align: left" value="all" {{request("status") == 'all' ? 'selected' : '' }}>All</option>
                                                                    <option style="text-align: left" value="pending" {{request("status") == 'pending' ? 'selected' : '' }}>Pending</option>
                                                                    <option style="text-align: left" value="canceled" {{request("status") == 'canceled' ? 'selected' : '' }}>Canceled</option>
                                                                    <option style="text-align: left" value="processing" {{request("status") == 'processing' ? 'selected' : '' }}>Processing</option>
                                                                    <option style="text-align: left" value="on-delivery" {{request("status") == 'on-delivery' ? 'selected' : '' }}>On delivery</option>
                                                                    <option style="text-align: left" value="delivered" {{request("status") == 'delivered' ? 'selected' : '' }}>Delivered</option>
                                                                    <option style="text-align: left" value="rejected" {{request("status") == 'rejected' ? 'selected' : '' }}>Rejected</option>
                                                                </select>
                                                        </div>
                                                    </div>
                                                    </form>
                                                    <div class="booking-table">
                                                        <table class="table-bordered">
                                                            <thead>
                                                            <tr>
                                                                <th>ID</th>
                                                                <th>DISH NAME</th>
                                                                <th>QTY</th>
                                                                <th>TIME</th>
                                                                <th>RESTAURANT</th>
                                                                <th>STATUS</th>

                                                            </tr>
                                                            </thead>
                                                            <tbody>
                                                            @foreach($orders as $order)
                                                                @if(count($order->orderDetails) > 1)
                                                                    @for($i = 0; $i < count($order->orderDetails); $i++)
                                                                        @if($i == 0)
                                                                            <tr>
                                                                                <td rowspan="{{count($order->orderDetails)}}">
                                                                                    #{{$order->id}}</td>
                                                                                <td class="order-dish-name">
                                                                                    <h5 itemprop="headline"><a href="#"
                                                                                                               title=""
                                                                                                               itemprop="url">{{\App\Models\Product::find($order->orderDetails[0]->product_id)->name}}
                                                                                        </a></h5>
                                                                                </td>
                                                                                <td>{{$order->orderDetails[0]->qty}}</td>
                                                                                <td rowspan="{{count($order->orderDetails)}}">{{date('H:i - M d, Y', strtotime($order->created_at))}}</td>
                                                                                <td rowspan="{{count($order->orderDetails)}}">{{\App\Models\Product::find($order->orderDetails[0]->product_id)->restaurant->restaurant_name}}</td>
                                                                                <td rowspan="{{count($order->orderDetails)}}"><span
                                                                                        class="brd-rd3 {{$order->status}}">
                                                                                        @if($order->status == 'pending')
                                                                                            pending
                                                                                        @elseif($order->status == 'on-delivery')
                                                                                            on delivery
                                                                                        @elseif($order->status == 'rejected')
                                                                                            rejected
                                                                                        @elseif($order->status == 'canceled')
                                                                                            canceled
                                                                                        @elseif($order->status == 'processing')
                                                                                            processing
                                                                                        @else
                                                                                            delivered
                                                                                        @endif
                                                                                    </span>
                                                                                    <a class="detail-link brd-rd50"
                                                                                       href="/order/order-detail/{{$order->id}}"
                                                                                       title="Order Detail"
                                                                                       itemprop="url"><i
                                                                                            class="fa fa-chain"></i></a>
                                                                                </td>
                                                                            </tr>
                                                                        @else
                                                                            <tr>
                                                                                <td>
                                                                                    <h5 itemprop="headline"><a href="#"
                                                                                                               title=""
                                                                                                               itemprop="url"
                                                                                                               class="text-truncate">{{\App\Models\Product::find($order->orderDetails[$i]->product_id)->name}}
                                                                                        </a></h5>
                                                                                </td>
                                                                                <td>{{$order->orderDetails[$i]->qty}}</td>

                                                                            </tr>
                                                                        @endif
                                                                    @endfor
                                                                @else
                                                                    <tr>
                                                                        <td>#{{$order->id}}</td>
                                                                        <td>
                                                                            <h5 itemprop="headline"><a href="#" title=""
                                                                                                       itemprop="url"
                                                                                                       class="text-truncate">{{\App\Models\Product::find($order->orderDetails[0]->product_id)->name}}
                                                                                </a></h5>
                                                                        </td>
                                                                        <td>{{$order->orderDetails[0]->qty}}</td>
                                                                        <td>{{date('H:i - M d, Y', strtotime($order->created_at))}}</td>
                                                                        <td>{{\App\Models\Product::find($order->orderDetails[0]->product_id)->restaurant->restaurant_name}}</td>
                                                                        <td>
                                                                            <span class="brd-rd3 {{$order->status}}">
                                                                                @if($order->status == 'pending')
                                                                                    pending
                                                                                @elseif($order->status == 'on-delivery')
                                                                                    on delivery
                                                                                @elseif($order->status == 'rejected')
                                                                                    rejected
                                                                                @elseif($order->status == 'canceled')
                                                                                    canceled
                                                                                @elseif($order->status == 'processing')
                                                                                    processing
                                                                                @else
                                                                                    delivered
                                                                                @endif
                                                                            </span>
                                                                            <a class="detail-link brd-rd50"
                                                                               href="/order/order-detail/{{$order->id}}"
                                                                               title="Order Detail" itemprop="url"><i
                                                                                    class="fa fa-chain"></i></a>
                                                                        </td>
                                                                    </tr>
                                                                @endif
                                                            @endforeach
                                                            </tbody>
                                                        </table>
{{--                                                        @else--}}
{{--                                                        <h4>Your order is now empty :( <br/><br/>Let's discover some tasty food and place an order now !</h4>--}}
{{--                                                        @endif--}}
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="rite-meta" style="padding-left: 10%">
                                            @if($orders instanceof \Illuminate\Pagination\LengthAwarePaginator)
                                                {!! $orders->appends(request()->all())->links("pagination::bootstrap-4")!!}
                                            @endif
                                        </div>
                                    </div>
                                    @include('front.components.signOutModal')
                                </div>
                            </div>
                        </div><!-- Section Box -->
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
