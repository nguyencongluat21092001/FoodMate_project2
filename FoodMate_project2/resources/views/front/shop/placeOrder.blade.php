@extends('front.layout.master')
@section('title', 'Place Order')
@section('body')
    <div class="bread-crumbs-wrapper">
        <div class="container">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="/" title="" itemprop="url">Home</a></li>
                <li class="breadcrumb-item"><a href="/dashboard/cart" title="" itemprop="url">Cart</a></li>
                <li class="breadcrumb-item active">Place Order</li>
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
                                    <form action="/order/place-order" method="post">
                                        @csrf
                                        <div class="col-md-6 col-sm-12 col-lg-6">
                                            <div class="tab-content">
                                                <div class="tab-pane fade in active" id="my-orders">
                                                    <div class="tabs-wrp brd-rd5">
                                                        <h4 itemprop="headline" style="margin-bottom: 15px;">Your
                                                            Order</h4>
                                                        <div class="statement-table booking-table">
                                                            <table>
                                                                <thead>
                                                                <tr>

                                                                    <th>DISH NAME</th>
                                                                    <th>QTY</th>
                                                                    <th>RESTAURANT</th>
                                                                </tr>
                                                                </thead>
                                                                <tbody>
                                                                @if(count($products) > 1)
                                                                    @for($i = 0; $i < count($products); $i++)
                                                                        @if($i === 0)
                                                                            <tr>
                                                                                <td class="order-dish-name">
                                                                                    <h5 itemprop="headline"><a href="#"
                                                                                                               title=""
                                                                                                               itemprop="url">{{\App\Models\Product::find($products[0]->product_id)->name}}
                                                                                        </a></h5>
                                                                                </td>
                                                                                <td>{{$products[0]->qty}}</td>
                                                                                <td rowspan="{{count($products)}}">{{\App\Models\Restaurant::find($products[0]->restaurant_id)->restaurant_name}}</td>
                                                                            </tr>
                                                                        @else
                                                                        <tr>
                                                                            <td>
                                                                                <h5 itemprop="headline"><a href="#"
                                                                                                           title=""
                                                                                                           itemprop="url"
                                                                                                           class="text-truncate">{{\App\Models\Product::find($products[$i]->product_id)->name}}
                                                                                    </a></h5>
                                                                            </td>
                                                                            <td>{{$products[$i]->qty}}</td>
                                                                        </tr>
                                                                        @endif
                                                                    @endfor
                                                                @else
                                                                    <tr>
                                                                        <td class="order-dish-name">
                                                                            <h5 itemprop="headline"><a href="#"
                                                                                                       title=""
                                                                                                       itemprop="url">{{\App\Models\Product::find($products[0]->product_id)->name}}
                                                                                </a></h5>
                                                                        </td>
                                                                        <td>{{$products[0]->qty}}</td>
                                                                        <td>{{\App\Models\Restaurant::find($products[0]->restaurant_id)->restaurant_name}}</td>
                                                                    </tr>
                                                                @endif
                                                                </tbody>
                                                            </table>
                                                            <div class="total-block" style="background-color: white;">
                                                                <table class="checkout-price-table">
                                                                    <tr>
                                                                        <th>Subtotal :</th>
                                                                        <td>${{$order[0]->total}}.00</td>

                                                                    </tr>
                                                                    <tr>
                                                                        <th>Total :</th>
                                                                        <td>${{$order[0]->total}}.00</td>

                                                                    </tr>
                                                                </table>
                                                            </div>

                                                        </div>
                                                    </div>
                                                    <div class="checkout-methods">
                                                        <table>
                                                            <tr>
                                                                <td>
                                                                    <input type="radio" id="checkout-later"
                                                                           name="checkout-method" value="later" checked required>
                                                                    <label for="checkout-later">Check out on
                                                                        delivery</label>
                                                                </td>
                                                                <td>
                                                                    <input type="radio" id="online-checkout"
                                                                           name="checkout-method" value="online" disabled title="We will support online payment in future!">
                                                                    <label for="online-checkout" title="We will support online payment in future!">Online check
                                                                        out</label>
                                                                </td>
                                                            </tr>
                                                        </table>

                                                    </div>
                                                    <div class="order-action">
                                                        <div class="col-md-12 col-sm-12 col-lg-12">
                                                            <button type="button" class="btn primary-btn"
                                                                    id="back-to-order" style="margin-left: 30px;"
                                                                    onclick="window.location.href = '/dashboard/cart'">
                                                                <i
                                                                    class="fa fa-chevron-left"></i> Back to cart
                                                            </button>
                                                            <button class="btn primary-btn red-bg" id="cancel-order-btn"
                                                                    type="submit">Place Order
                                                            </button>
                                                        </div>
                                                    </div>

                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6 col-sm-12 col-lg-6">

                                            <div class="order-action">
                                                <div class="place-order-bl">
                                                    <div class="profile-info-form-wrap">
                                                        <div class="profile-info-form">
                                                            <div class="tabs-wrp row mrg20">
                                                                <h4 itemprop="headline">Billing Details</h4>
                                                                <div
                                                                    class="col-md-12 col-sm-12 col-lg-12">
                                                                    <label>Complete Name
                                                                        <sup>*</sup></label>
                                                                    <input class="brd-rd3" type="text" value="{{\Illuminate\Support\Facades\Auth::user()->name}}"
                                                                           placeholder="Enter Your Name" name="full-name" required>
                                                                </div>
                                                                <div
                                                                    class="col-md-12 col-sm-12 col-lg-12">
                                                                    <label>Email Address
                                                                        <sup>*</sup></label>
                                                                    <input class="brd-rd3" type="email" name="email" value="{{\Illuminate\Support\Facades\Auth::user()->email}}"
                                                                           placeholder="Enter Your Email Address" required>
                                                                </div>
                                                                <div
                                                                    class="col-md-12 col-sm-12 col-lg-12">
                                                                    <label>Phone No <sup>*</sup></label>
                                                                    <input class="brd-rd3" type="text" name="phone" value="{{\Illuminate\Support\Facades\Auth::user()->telephone ?? ''}}"
                                                                           placeholder="Enter Your Phone No" required>
                                                                </div>
                                                                <div class="col-md-12 col-sm-12 col-lg-12">
                                                                    <label>Address <sup>*</sup></label>
                                                                    <textarea name="address" id="" cols="30" placeholder="Enter delivery address"
                                                                              rows="10" required>{{\Illuminate\Support\Facades\Auth::user()->address ?? ''}}</textarea>
                                                                </div>
                                                                <input type="hidden" name="order-id" value="{{$order[0]->id}}">
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </form>
                                    <!--Confirm signout Modal -->
                                    <div class="modal fade" id="signout" tabindex="-1" role="dialog" aria-labelledby=""
                                         aria-hidden="true">
                                        <div class="modal-dialog" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <!-- <h5 class="modal-title" id="exampleModalLabel">Sign Out Comfirm.</h5> -->
                                                    <button type="button" class="close" data-dismiss="modal"
                                                            aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                                <div class="modal-body">
                                                    Do you really want to sign out ?
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary"
                                                            data-dismiss="modal">No
                                                    </button>
                                                    <button type="button" class="btn red-bg" style="color: white;">Yes
                                                    </button>
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
