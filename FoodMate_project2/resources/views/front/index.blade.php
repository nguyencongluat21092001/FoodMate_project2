@extends('front.layout.master')
@section('title', 'FoodChow - Cloud Kitchen')
@section('body')
    <section>
        <div class="block">
            <div style="background-image: url(images/parallax2.jpg);" class="fixed-bg"></div>
            <div class="restaurant-searching text-center">
                <div class="restaurant-searching-inner">
                    <h2 itemprop="headline">Order <span>Food Online From</span> the Best Restaurants</h2>
                    <form class="restaurant-search-form2 brd-rd30" method="post" action="/product-search">
                        @csrf
                        <input style="font-size: 14px" class="brd-rd30" type="text" name="key-word" placeholder="FEEL LIKE EATING ...">
                        <button class="brd-rd30 red-bg" type="submit">SEARCH</button>
                    </form>
                    <div class="funfacts">
                        <div class="col-md-3 col-sm-6 col-lg-3">
                            <div class="fact-box">
                                <i class="brd-rd50"><img src="images/resource/fact-icon1.png" alt="fact-icon1"
                                                         itemprop="image"></i>
                                <div class="fact-inner">
                                    <strong><span class="counter">137</span></strong>
                                    <h5>Restaurant</h5>
                                </div>
                            </div><!-- Fact Box -->
                        </div>
                        <div class="col-md-3 col-sm-6 col-lg-3">
                            <div class="fact-box">
                                <i class="brd-rd50"><img src="images/resource/fact-icon2.png" alt="fact-icon2"
                                                         itemprop="image"></i>
                                <div class="fact-inner">
                                    <strong><span class="counter">158</span></strong>
                                    <h5>People Served</h5>
                                </div>
                            </div><!-- Fact Box -->
                        </div>
                        <div class="col-md-3 col-sm-6 col-lg-3">
                            <div class="fact-box">
                                <i class="brd-rd50"><img src="images/resource/fact-icon3.png" alt="fact-icon3"
                                                         itemprop="image"></i>
                                <div class="fact-inner">
                                    <strong><span class="counter">659</span>K</strong>
                                    <h5>Happy Service</h5>
                                </div>
                            </div><!-- Fact Box -->
                        </div>
                        <div class="col-md-3 col-sm-6 col-lg-3">
                            <div class="fact-box">
                                <i class="brd-rd50"><img src="images/resource/fact-icon4.png" alt="fact-icon4"
                                                         itemprop="image"></i>
                                <div class="fact-inner">
                                    <strong><span class="counter">235</span></strong>
                                    <h5>Regular users</h5>
                                </div>
                            </div><!-- Fact Box -->
                        </div>
                    </div><!-- Fun Facts -->
                </div>
                <img class="bottom-clouds-mockup" src="images/resource/clouds.png" alt="clouds.png" itemprop="image">
            </div><!-- Restaurant Searching -->
        </div>
    </section>

    <section>
        <div class="block remove-bottom">
            <div class="container">
                <div class="row">
                    <div class="col-md-12 col-sm-12 col-lg-12">
                        <div class="title1-wrapper text-center">
                            <div class="title1-inner">
                                <h2 itemprop="headline">Top Restaurants</h2>
                                <p itemprop="description">Things that get tricky are things like burgers and fries, or
                                    things that are deep-fried. We do have a couple of burger restaurants that are
                                    capable of doing a good job transporting but it's Fries are almost impossible.</p>
                            </div>
                        </div>
                        <div class="top-restaurants-wrapper">
                            <ul class="restaurants-wrapper style2">
                                @foreach($restaurants as $restaurant)
                                    <li class="wow bounceIn" data-wow-delay="0.2s">
                                    <div class="top-restaurant"><a class="brd-rd50" href="/restaurant-detail/{{$restaurant->id}}" title=""
                                                                   itemprop="url"><img
                                                src="images/resource/{{$restaurant->avatar}}" alt="top-restaurant1.png"
                                                itemprop="image" style="width: 113px;height: 113px"></a></div>
                                    </li>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section><!-- top restaurants -->

    <section>
        <div class="block">
            <div class="container">
                <div class="row">
                    <div class="col-md-12 col-sm-12 col-lg-12">
                        <div class="title1-wrapper text-center">
                            <div class="title1-inner">
                                <span>Tasty food near you</span>
                                <h2 itemprop="headline">Choose & Enjoy</h2>
                            </div>
                        </div>
                        <div class="row remove-ext5">
                            @foreach($products as $product)
                                <div class="col-md-4 col-sm-6 col-lg-4">
                                <div class="popular-dish-box wow fadeIn" data-wow-delay="0.2s">
                                    <div class="popular-dish-thumb">
                                        <a href="/product-detail/{{$product->id}}" title="" itemprop="url"><img
                                                src="images/resource/{{$product->productImages[0]->path}}"
                                                alt="popular-dish-img1.jpg" itemprop="image" style="width: 370px;height: 236px"></a>
                                        <span class="post-rate yellow-bg brd-rd2"><i
                                                class="fa fa-star-o"></i> {{number_format($product->rating, 1)}}</span>
                                    </div>
                                    <div class="popular-dish-info">
                                        <h4 itemprop="headline"><a href="/product-detail/{{$product->id}}" title="" itemprop="url">
                                                {{$product->name}}</a>
                                        </h4>
                                        <span><a href="/shop/{{$product->category->id}}}" title=""
                                                 itemprop="url" style="display: block;text-transform: capitalize; color: #ea1b25; margin-bottom: 5px">{{$product->category->cate_name}}</a></span>
                                        <p itemprop="description" style="height: 50px">{{$product->description}}</p>
                                        @if($product->discount != null)
                                            <span class="discount-price">${{$product->price}}.00</span>
                                            <span class="price">${{$product->discount}}.00</span>
                                        @else
                                            <span class="price">${{$product->price}}.00</span>
                                        @endif
                                        <input type="hidden" id="user-id" value="{{\Illuminate\Support\Facades\Auth::id()}}">
                                        <input type="hidden" id="product-id" value="{{$product->id}}">
                                        @if(\Illuminate\Support\Facades\Auth::check())
                                        <a class="brd-rd2 add-to-cart"
{{--                                           href="/cart/add/{{\Illuminate\Support\Facades\Auth::id() ?? 0}}/{{$product->id}}" --}}
                                           title="Order Now" itemprop="url">Add
                                            to cart</a>
                                        @else
                                            <a class="brd-rd2" data-toggle="modal" data-target="#registerrestaurant"
                                               {{--                                           href="/cart/add/{{\Illuminate\Support\Facades\Auth::id() ?? 0}}/{{$product->id}}" --}}
                                               title="Order Now" itemprop="url" style="cursor: pointer">Add
                                                to cart</a>
                                        @endif
                                        <div class="restaurant-info">
                                            <img src="images/resource/{{$product->restaurant->avatar}}"
                                                 alt="{{$product->restaurant->avatar}}" itemprop="image" style="width: 66px;height: 66px">
                                            <div class="restaurant-info-inner" style="width: 70%">
                                                <h6 itemprop="headline"><a href="/restaurant-detail/{{$product->restaurant->id}}" title=""
                                                                           itemprop="url">{{$product->restaurant->restaurant_name}}</a>
                                                </h6>
                                                <span class="red-clr" style="float: left;width: 100%;display: -webkit-box;max-width: 75%;-webkit-line-clamp: 1;-webkit-box-orient: vertical;overflow: hidden;">{{$product->restaurant->address}}</span>
                                            </div>
                                        </div>
                                    </div>
                                </div><!-- Popular Dish Box -->
                            </div>
                            @endforeach
                            <div class="rite-meta">
                                <a href="/shop" title="" class="view-more">view more food</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section><!-- choose and enjoy meal -->

    <section>
        <div class="block grayish low-opacity">
            <div class="fixed-bg" style="background-image: url(images/pattern.png)"></div>
            <div class="top-mockup"><img src="images/resource/mockup2.png" alt=""></div>
            <div class="container">
                <div class="row">
                    <div class="col-md-12 col-sm-12 col-lg-12 col-xs-12">
                        <div class="filters-wrapper">
                            <div class="title1-wrapper text-center">
                                <div class="title1-inner">
                                    <span>Find Favourite Food</span>
                                    <h2 itemprop="headline">Popular This Month</h2>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4 col-xs-12">
                        <div class="dishes-caro wow fadeIn" data-wow-delay="0.3s">
                            @foreach($promotions as $product)
                                <div class="dish-item" style="padding-bottom: 50px">
                                <figure><a href="/product-detail/{{$product->id}}"><img src="images/resource/{{$product->productImages[0]->path}}" alt="" style="width: 370px;height: 283px"></a></figure>
                                <div class="item-meta" style="padding: 15px">
                                    <img src="images/resource/{{$product->restaurant->avatar}}" style="width: 54px; height: 54px" alt="">
                                    <div>
                                        <a href=""><span>{{$product->restaurant->restaurant_name}}</span></a>
                                        <p>{{$product->restaurant->address}}</p>
                                    </div>
                                </div>
                                <div class="caro-dish-name">
                                    <h4 style="font-size: 15px"><a href="/product-detail/{{$product->id}}">{{$product->name}}</a></h4>
                                    <span><a href="/shop/{{$product->category->id}}}" title=""
                                             itemprop="url" style="display: block;text-transform: capitalize; color: #ea1b25; margin-bottom: 5px; font-size: 14px">{{$product->category->cate_name}}</a></span>
                                    @if($product->discount != null)
                                        <span class="discount-price" style="text-align: right;display: inline-block; width: 40%; height: 40px;color: #1a1a1a">${{$product->price}}.00</span>
                                        <span class="price" style="display: inline-block; width: 40%; height: 40px; padding-top: 5px;color: #1a1a1a">${{$product->discount}}.00</span>
                                    @endif
                                </div>
                            </div>
                            @endforeach
                        </div>
                    </div>
                    <div class="col-md-8 col-xs-12">
                        <div class="popular-of-month">
                            @foreach($populars as $popular)
                                <div class="pop-dish wow fadeIn" data-wow-delay="0.3s">
                                    <div class="poplr-dish">
                                        <img src="images/resource/{{$popular->productImages[0]->path}}" alt="" style="width: 88px;height: 88px">
                                        <div class="dish-meta">
                                            @if($popular->discount != null)
                                                <span style="color: #1a1a1a">${{$popular->discount}}.00</span>
                                            @else
                                                <span style="color: #1a1a1a">${{$popular->price}}.00</span>
                                            @endif
                                            <h4 style="font-size: 14px"><a href="/product-detail/{{$popular->id}}" title="">{{$popular->name}}</a></h4>
                                                <span><a href="/shop/{{$popular->category->id}}}" title=""
                                                         itemprop="url" style="display: block;text-transform: capitalize; color: #ea1b25; margin-bottom: 5px">{{$popular->category->cate_name}}</a></span>
                                        </div>
                                    </div>
                                    <div class="item-meta">
                                        <a href=""><img alt="" width="55px" height="55px" src="images/resource/{{$popular->restaurant->avatar}}"></a>
                                        <div>
                                            <a href=""><span>{{$popular->restaurant->restaurant_name}}</span></a>
                                            <p>{{$popular->restaurant->address}}</p>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                        <div class="rite-meta">
                            <a href="/shop-featured" title="" class="view-more">view more food</a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="bottom-mockup"><img src="images/resource/mockup1.png" alt=""></div>
        </div>
    </section><!--popular this month-->

    <section>
        <div class="block blackish low-opacity">
            <div class="fixed-bg" style="background-image: url(images/parallax1.jpg);"></div>
            <div class="container">
                <div class="row">
                    <div class="col-md-12 col-sm-12 col-lg-12">
                        <div class="title1-wrapper text-center">
                            <div class="title1-inner">
                                <span>Welcome to FoodMate</span>
                                <h2 class="text-white" itemprop="headline">easy order in 3 steps</h2>
                            </div>
                        </div>
                        <div class="remove-ext text-center">
                            <div class="row">
                                <div class="col-md-4 col-sm-4 col-lg-4">
                                    <div class="step-box wow fadeIn" data-wow-delay="0.2s">
                                        <i><img src="images/resource/setp-img1.png" alt="setp-img1.png"
                                                itemprop="image"> <span class="brd-rd50 red-bg">1</span></i>
                                        <div class="setp-box-inner">
                                            <h4 itemprop="headline">Explore Food & Restaurants</h4>
                                            <p itemprop="description">Just explore food from a great number of famous
                                                restaurants.</p>
                                        </div>
                                    </div><!-- Step Box -->
                                </div>
                                <div class="col-md-4 col-sm-4 col-lg-4">
                                    <div class="step-box wow fadeIn" data-wow-delay="0.4s">
                                        <i><img src="images/resource/setp-img2.png" alt="setp-img2.png"
                                                itemprop="image"> <span class="brd-rd50 red-bg">2</span></i>
                                        <div class="setp-box-inner">
                                            <h4 itemprop="headline">Choose a Tasty Dish</h4>
                                            <p itemprop="description">Find out the food that you love.</p>
                                        </div>
                                    </div><!-- Step Box -->
                                </div>
                                <div class="col-md-4 col-sm-4 col-lg-4">
                                    <div class="step-box wow fadeIn" data-wow-delay="0.6s">
                                        <i><img src="images/resource/setp-img3.png" alt="setp-img3.png"
                                                itemprop="image"> <span class="brd-rd50 red-bg">3</span></i>
                                        <div class="setp-box-inner">
                                            <h4 itemprop="headline">Follow The Status</h4>
                                            <p itemprop="description">Add your favorite food in cart and place an order
                                                now.</p>
                                        </div>
                                    </div><!-- Step Box -->
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section><!-- order steps -->
@endsection

