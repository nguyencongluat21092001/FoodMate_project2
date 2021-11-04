@extends('front.layout.master')
@section('title', 'Dashboard')
@section('body')
    <div class="bread-crumbs-wrapper">
        <div class="container">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="#" title="" itemprop="url">Home</a></li>
                <li class="breadcrumb-item active">Cart</li>
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
                                                    <li class="active"><a href="/dashboard/cart"><i
                                                                class="fa fa-shopping-basket"></i> MY CART</a></li>
                                                    <li><a href="/dashboard/orders"><i
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
                                            <div class="tab-pane fade in active" id="my-cart">
                                                <div class="tabs-wrp brd-rd5">
                                                    <div class="order-list">
                                                        {{--                                                        @if(count($data) > 0)--}}
                                                        {{--                                                            @foreach($data as $product)--}}
                                                        {{--                                                                @if(count($product) > 1)--}}
                                                        {{--                                                                    <div class="row restaurant-products">--}}
                                                        {{--                                                                        <div class="restaurant-info">--}}
                                                        {{--                                                                            <img style="width: 66px;height: 65px" src="images/resource/{{\App\Models\Restaurant::find($product[0]['restaurant_id'])->avatar}}"--}}
                                                        {{--                                                                                 alt="restaurant-logo2.png" itemprop="image">--}}
                                                        {{--                                                                            <div class="restaurant-info-inner">--}}
                                                        {{--                                                                                <h6 itemprop="headline"><a--}}
                                                        {{--                                                                                        href="restaurant-detail.html" title=""--}}
                                                        {{--                                                                                        itemprop="url">{{\App\Models\Restaurant::find($product[0]['restaurant_id'])->restaurant_name}}</a>--}}
                                                        {{--                                                                                </h6>--}}
                                                        {{--                                                                            </div>--}}
                                                        {{--                                                                        </div>--}}
                                                        {{--                                                                    @for($i = 0; $i < count($product); $i++)--}}
                                                        {{--                                                                            <div class="order-item brd-rd5">--}}
                                                        {{--                                                                                <div class="order-thumb brd-rd5">--}}
                                                        {{--                                                                                    <a href="#" title="" itemprop="url"><img--}}
                                                        {{--                                                                                            src="images/resource/{{\App\Models\Product::find($product[$i]['product_id'])->productImages[0]->path}}"--}}
                                                        {{--                                                                                            alt="order-img2.jpg"--}}
                                                        {{--                                                                                            itemprop="image" style="width: 180px; height: 159px"></a>--}}
                                                        {{--                                                                                    <span class="post-rate yellow-bg brd-rd2"><i--}}
                                                        {{--                                                                                            class="fa fa-star-o"></i> 3.0</span>--}}
                                                        {{--                                                                                </div>--}}
                                                        {{--                                                                                <div class="order-info">--}}
                                                        {{--                                                                                    <h4 itemprop="headline"><a href="#" title=""--}}
                                                        {{--                                                                                                               itemprop="url">--}}
                                                        {{--                                                                                            {{\App\Models\Product::find($product[$i]['product_id'])->name}}--}}
                                                        {{--                                                                                        </a></h4>--}}

                                                        {{--                                                                                    <span class="price">${{\App\Models\Product::find($product[$i]['product_id'])->discount ?? \App\Models\Product::find($product[$i]['product_id'])->price}}.00</span>--}}
                                                        {{--                                                                                    <div class="qty-wrap dashboard-pro-qty">--}}
                                                        {{--                                                                                        <input type="hidden" value="{{$product[$i]['id']}}">--}}
                                                        {{--                                                                                        <input class="qty" type="text" value="{{\App\Models\UserCart::find($product[$i]['id'])->qty}}">--}}
                                                        {{--                                                                                    </div>--}}

                                                        {{--                                                                                    <a class="brd-rd2" href="cart/delete/{{\Illuminate\Support\Facades\Auth::id()}}/{{\App\Models\Product::find($product[$i]['product_id'])->id}}" title=""--}}
                                                        {{--                                                                                       itemprop="url"><i class="fa fa-lg fa-close"></i></a>--}}
                                                        {{--                                                                                    <p class="total">Total :<span class="product-total"> ${{\App\Models\UserCart::find($product[$i]['id'])->total}}.00</span>--}}
                                                        {{--                                                                                    </p>--}}
                                                        {{--                                                                                </div>--}}
                                                        {{--                                                                            </div>--}}
                                                        {{--                                                                        </div>--}}
                                                        {{--                                                                    @endfor--}}
                                                        {{--                                                                    <div class="total-block">--}}
                                                        {{--                                                                        <table>--}}
                                                        {{--                                                                            <tr>--}}
                                                        {{--                                                                                <th>Total :</th>--}}
                                                        {{--                                                                                <td>${{$orderTotals[$loop->index]->total}}.00</td>--}}

                                                        {{--                                                                            </tr>--}}
                                                        {{--                                                                        </table>--}}
                                                        {{--                                                                        <a href="/order/place-order/{{\Illuminate\Support\Facades\Auth::id()}}/{{\App\Models\Restaurant::find($product[0]['restaurant_id'])->id}}"--}}
                                                        {{--                                                                           class="red-bg brd-rd4 place-order">Place Order</a>--}}
                                                        {{--                                                                        <a href="cart/destroy/{{\Illuminate\Support\Facades\Auth::id()}}/{{\App\Models\Restaurant::find($product[0]['restaurant_id'])->id}}" class="brd-rd4 remove-all">Remove All</a>--}}
                                                        {{--                                                                    </div>--}}
                                                        {{--                                                                @else--}}
                                                        {{--                                                                    <div class="row restaurant-products">--}}
                                                        {{--                                                                        <div class="restaurant-info">--}}
                                                        {{--                                                                            <img style="width: 66px; height: 65px" src="images/resource/{{\App\Models\Restaurant::find($product[0]['restaurant_id'])->avatar}}"--}}
                                                        {{--                                                                                 alt="restaurant-logo2.png" itemprop="image">--}}
                                                        {{--                                                                            <div class="restaurant-info-inner">--}}
                                                        {{--                                                                                <h6 itemprop="headline"><a--}}
                                                        {{--                                                                                        href="restaurant-detail.html" title=""--}}
                                                        {{--                                                                                        itemprop="url">{{\App\Models\Restaurant::find($product[0]['restaurant_id'])->restaurant_name}}</a>--}}
                                                        {{--                                                                                </h6>--}}
                                                        {{--                                                                            </div>--}}
                                                        {{--                                                                        </div>--}}
                                                        {{--                                                                        <div class="order-item brd-rd5">--}}
                                                        {{--                                                                            <div class="order-thumb brd-rd5">--}}
                                                        {{--                                                                                <a href="#" title="" itemprop="url"><img--}}
                                                        {{--                                                                                        src="images/resource/{{\App\Models\Product::find($product[0]['product_id'])->productImages[0]->path}}"--}}
                                                        {{--                                                                                        alt="order-img2.jpg"--}}
                                                        {{--                                                                                        itemprop="image" style="width: 180px; height: 159px"></a>--}}
                                                        {{--                                                                                <span class="post-rate yellow-bg brd-rd2"><i--}}
                                                        {{--                                                                                        class="fa fa-star-o"></i> 3.0</span>--}}
                                                        {{--                                                                            </div>--}}
                                                        {{--                                                                            <div class="order-info">--}}
                                                        {{--                                                                                <h4 itemprop="headline"><a href="#" title=""--}}
                                                        {{--                                                                                                           itemprop="url">--}}
                                                        {{--                                                                                        {{\App\Models\Product::find($product[0]['product_id'])->name}}--}}
                                                        {{--                                                                                    </a></h4>--}}

                                                        {{--                                                                                <span class="price">${{\App\Models\Product::find($product[0]['product_id'])->discount ?? \App\Models\Product::find($product[0]['product_id'])->price}}.00</span>--}}
                                                        {{--                                                                                <div class="qty-wrap dashboard-pro-qty">--}}
                                                        {{--                                                                                    <input type="hidden" value="{{$product[0]['id']}}">--}}
                                                        {{--                                                                                    <input class="qty" type="text" value="{{\App\Models\UserCart::find($product[0]['id'])->qty}}">--}}
                                                        {{--                                                                                </div>--}}

                                                        {{--                                                                                <a class="brd-rd2" href="cart/delete/{{\Illuminate\Support\Facades\Auth::id()}}/{{\App\Models\Product::find($product[0]['product_id'])->id}}" title=""--}}
                                                        {{--                                                                                   itemprop="url"><i class="fa fa-lg fa-close"></i></a>--}}
                                                        {{--                                                                                <p class="total">Total :<span class="product-total"> ${{\App\Models\UserCart::find($product[0]['id'])->total}}.00</span>--}}
                                                        {{--                                                                                </p>--}}
                                                        {{--                                                                            </div>--}}
                                                        {{--                                                                        </div>--}}
                                                        {{--                                                                    </div>--}}
                                                        {{--                                                                    <div class="total-block">--}}
                                                        {{--                                                                        <table>--}}
                                                        {{--                                                                            <tr>--}}
                                                        {{--                                                                                <th>Total :</th>--}}
                                                        {{--                                                                                <td>${{$orderTotals[$loop->index]->total}}.00</td>--}}
                                                        {{--                                                                            </tr>--}}
                                                        {{--                                                                        </table>--}}
                                                        {{--                                                                        <a href="/order/place-order/{{\Illuminate\Support\Facades\Auth::id()}}/{{\App\Models\Restaurant::find($product[0]['restaurant_id'])->id}}"--}}
                                                        {{--                                                                           class="red-bg brd-rd4 place-order">Place Order</a>--}}
                                                        {{--                                                                        <a href="cart/destroy/{{\Illuminate\Support\Facades\Auth::id()}}/{{\App\Models\Restaurant::find($product[0]['restaurant_id'])->id}}" class="brd-rd4 remove-all">Remove All</a>--}}
                                                        {{--                                                                    </div>--}}
                                                        {{--                                                                @endif--}}
                                                        {{--                                                            @endforeach--}}
                                                        {{--                                                                <div class="pagination-wrapper text-center style2">--}}
                                                        {{--                                                                    <ul class="pagination justify-content-center">--}}
                                                        {{--                                                                        <li class="page-item prev"><a class="page-link brd-rd2"--}}
                                                        {{--                                                                                                      href="#"--}}
                                                        {{--                                                                                                      itemprop="url">PREV</a></li>--}}
                                                        {{--                                                                        <li class="page-item"><a class="page-link brd-rd2"--}}
                                                        {{--                                                                                                 href="#" itemprop="url">1</a></li>--}}
                                                        {{--                                                                        <li class="page-item"><a class="page-link brd-rd2"--}}
                                                        {{--                                                                                                 href="#" itemprop="url">2</a></li>--}}
                                                        {{--                                                                        <li class="page-item active"><span--}}
                                                        {{--                                                                                class="page-link brd-rd2">3</span></li>--}}
                                                        {{--                                                                        <li class="page-item"><a class="page-link brd-rd2"--}}
                                                        {{--                                                                                                 href="#" itemprop="url">4</a></li>--}}
                                                        {{--                                                                        <li class="page-item"><a class="page-link brd-rd2"--}}
                                                        {{--                                                                                                 href="#" itemprop="url">5</a></li>--}}
                                                        {{--                                                                        <li class="page-item">........</li>--}}
                                                        {{--                                                                        <li class="page-item"><a class="page-link brd-rd2"--}}
                                                        {{--                                                                                                 href="#" itemprop="url">18</a></li>--}}
                                                        {{--                                                                        <li class="page-item next"><a class="page-link brd-rd2"--}}
                                                        {{--                                                                                                      href="#"--}}
                                                        {{--                                                                                                      itemprop="url">NEXT</a></li>--}}
                                                        {{--                                                                    </ul>--}}
                                                        {{--                                                                </div><!-- Pagination Wrapper -->--}}
                                                        {{--                                                        @else--}}

                                                        {{--                                                        @endif--}}
                                                        @foreach($cartGroups as $cartGroup)
                                                            @if(count($cartGroup->userCarts) > 1)
                                                                <div class="row restaurant-products">
                                                                    <div class="restaurant-info">
                                                                        <img style="width: 66px;height: 65px"
                                                                             src="images/resource/{{$cartGroup->userCarts[0]->restaurant->avatar}}"
                                                                             alt="restaurant-logo2.png"
                                                                             itemprop="image">
                                                                        <div class="restaurant-info-inner">
                                                                            <h6 itemprop="headline"><a
                                                                                    href="" title=""
                                                                                    itemprop="url">{{$cartGroup->userCarts[0]->restaurant->restaurant_name}}</a>
                                                                            </h6>
                                                                        </div>
                                                                    </div>
                                                                    @for($i = 0; $i < count($cartGroup->userCarts); $i++)
                                                                        <div class="order-item brd-rd5">
                                                                            <div class="order-thumb brd-rd5">
                                                                                <a href="#" title="" itemprop="url"><img
                                                                                        src="images/resource/{{$cartGroup->userCarts[$i]->product->productImages[0]->path}}"
                                                                                        alt="order-img2.jpg"
                                                                                        itemprop="image"
                                                                                        style="width: 180px; height: 159px"></a>
                                                                                {{--                                                                                    <span class="post-rate yellow-bg brd-rd2"><i--}}
                                                                                {{--                                                                                            class="fa fa-star-o"></i> 3.0</span>--}}
                                                                            </div>
                                                                            <div class="order-info">
                                                                                <h4 itemprop="headline"><a href="#"
                                                                                                           title=""
                                                                                                           itemprop="url">
                                                                                        {{$cartGroup->userCarts[$i]->product->name}}
                                                                                    </a></h4>

                                                                                <span class="price">${{$cartGroup->userCarts[$i]->product->discount ?? $cartGroup->userCarts[$i]->product->price}}.00</span>
                                                                                <div class="qty-wrap dashboard-pro-qty">
                                                                                    <input type="hidden"
                                                                                           value="{{$cartGroup->userCarts[$i]->id}}">
                                                                                    <input class="qty" type="text"
                                                                                           value="{{$cartGroup->userCarts[$i]->qty}}">
                                                                                </div>

                                                                                <a class="brd-rd2"
                                                                                   href="cart/delete/{{\Illuminate\Support\Facades\Auth::id()}}/{{$cartGroup->userCarts[$i]->product->id}}"
                                                                                   title=""
                                                                                   itemprop="url"><i
                                                                                        class="fa fa-lg fa-close"></i></a>
                                                                                <p class="total">Total :<span
                                                                                        class="product-total"> ${{$cartGroup->userCarts[$i]->total}}.00</span>
                                                                                </p>
                                                                            </div>
                                                                        </div>
                                                                </div>
                                                                @endfor
                                                                <div class="total-block">
                                                                    <table>
                                                                        <tr>
                                                                            <th>Total :</th>
                                                                            <td>${{$cartGroup->total}}.00
                                                                            </td>

                                                                        </tr>
                                                                    </table>
                                                                    <a href="/order/place-order/{{\Illuminate\Support\Facades\Auth::id()}}/{{$cartGroup->restaurant->id}}"
                                                                       class="red-bg brd-rd4 place-order">Place
                                                                        Order</a>
                                                                    <a href="cart/destroy/{{\Illuminate\Support\Facades\Auth::id()}}/{{$cartGroup->restaurant->id}}"
                                                                       class="brd-rd4 remove-all">Remove All</a>
                                                                </div>
                                                            @else
                                                                <div class="row restaurant-products">
                                                                    <div class="restaurant-info">
                                                                        <img style="width: 66px; height: 65px"
                                                                             src="images/resource/{{$cartGroup->userCarts[0]->restaurant->avatar}}"
                                                                             alt="restaurant-logo2.png"
                                                                             itemprop="image">
                                                                        <div class="restaurant-info-inner">
                                                                            <h6 itemprop="headline"><a
                                                                                    href="restaurant-detail.html"
                                                                                    title=""
                                                                                    itemprop="url">{{$cartGroup->userCarts[0]->restaurant->restaurant_name}}</a>
                                                                            </h6>
                                                                        </div>
                                                                    </div>
                                                                    <div class="order-item brd-rd5">
                                                                        <div class="order-thumb brd-rd5">
                                                                            <a href="#" title="" itemprop="url"><img
                                                                                    src="images/resource/{{$cartGroup->userCarts[0]->product->productImages[0]->path}}"
                                                                                    alt="order-img2.jpg"
                                                                                    itemprop="image"
                                                                                    style="width: 180px; height: 159px"></a>
                                                                            <span class="post-rate yellow-bg brd-rd2"><i
                                                                                    class="fa fa-star-o"></i> {{number_format($cartGroup->userCarts[0]->product->rating, 1)}}</span>
                                                                        </div>
                                                                        <div class="order-info">
                                                                            <h4 itemprop="headline"><a href="#" title=""
                                                                                                       itemprop="url">
                                                                                    {{$cartGroup->userCarts[0]->product->name}}
                                                                                </a></h4>

                                                                            <span class="price">${{$cartGroup->userCarts[0]->product->discount ?? $cartGroup->userCarts[0]->product->price}}.00</span>
                                                                            <div class="qty-wrap dashboard-pro-qty">
                                                                                <input type="hidden"
                                                                                       value="{{$cartGroup->userCarts[0]->id}}">
                                                                                <input class="qty" type="text"
                                                                                       value="{{$cartGroup->userCarts[0]->qty}}">
                                                                            </div>

                                                                            <a class="brd-rd2"
                                                                               href="cart/delete/{{\Illuminate\Support\Facades\Auth::id()}}/{{$cartGroup->userCarts[0]->product->id}}"
                                                                               title=""
                                                                               itemprop="url"><i
                                                                                    class="fa fa-lg fa-close"></i></a>
                                                                            <p class="total">Total :<span
                                                                                    class="product-total"> ${{$cartGroup->userCarts[0]->total}}.00</span>
                                                                            </p>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="total-block">
                                                                    <table>
                                                                        <tr>
                                                                            <th>Total :</th>
                                                                            <td>${{$cartGroup->total}}.00</td>
                                                                        </tr>
                                                                    </table>
                                                                    <a href="/order/place-order/{{\Illuminate\Support\Facades\Auth::id()}}/{{$cartGroup->restaurant->id}}"
                                                                       class="red-bg brd-rd4 place-order">Place
                                                                        Order</a>
                                                                    <a href="cart/destroy/{{\Illuminate\Support\Facades\Auth::id()}}/{{$cartGroup->restaurant->id}}"
                                                                       class="brd-rd4 remove-all">Remove All</a>
                                                                </div>
                                                            @endif
                                                        @endforeach
                                                        @if($cartGroups instanceof \Illuminate\Pagination\LengthAwarePaginator)
                                                            <div class="pagination-wrapper text-center style2">
                                                                {!!$cartGroups->links("pagination::bootstrap-4")!!}
                                                            </div><!-- Pagination Wrapper -->
                                                        @endif
                                                        <h4 style="color: #5c5c5c">{{$emptyCart == 0 ? 'Your cart is empty' : ''}}</h4>
                                                    </div>
                                                </div>
                                            </div>
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
