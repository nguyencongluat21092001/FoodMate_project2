@extends('front.layout.master')
@section('title', 'FoodChow - Cloud Kitchen')
@section('body')
    <div class="bread-crumbs-wrapper">
        <div class="container">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="#" title="" itemprop="url">Home</a></li>
                <li class="breadcrumb-item"><a href="/restaurants" title="" itemprop="url">Restaurant</a></li>
                <li class="breadcrumb-item active">Restaurant Details</li>
            </ol>
        </div>
    </div>

    <section>
        <div class="block gray-bg top-padd30">
            <div class="container">
                <div class="row">
                    <div class="col-md-12 col-sm-12 col-lg-12">
                        <div class="sec-box">
                            <div class="sec-wrapper">
                                <div class="row">
                                    <div class="col-md-8 col-sm-12 col-lg-8">
                                        <div class="restaurant-detail-wrapper">
                                            <div class="restaurant-detail-info">
                                                <div class="restaurant-detail-thumb">
                                                    <ul class="restaurant-detail-img-carousel">
                                                        @foreach($restaurant->restaurantImages as $image)
                                                            <li><img class="brd-rd3"
                                                                     src="images/resource/{{$image->path}}"
                                                                     alt="{{$image->path}}" itemprop="image" width="743px" height="473px"></li>
                                                        @endforeach
                                                    </ul>
                                                    <ul class="restaurant-detail-thumb-carousel">
                                                        @foreach($restaurant->restaurantImages as $image)
                                                            <li><img class="brd-rd3"
                                                                     src="images/resource/{{$image->path}}"
                                                                     alt="{{$image->path}}" itemprop="image" width="89px" height="56px"></li>
                                                        @endforeach
                                                    </ul>
                                                </div>
                                                <div class="restaurant-detail-title">
                                                    <h1 itemprop="headline"
                                                        style="font-size: 26px">{{$restaurant->restaurant_name}}</h1>
                                                    <div class="info-meta">
                                                        <span>{{$restaurant->owner_name}}</span>
                                                        <span>
                                                            @foreach($restaurant->restaurantMenus as $menu)
                                                                @if(count($restaurant->restaurantMenus) == 1)
                                                                    <a href="#" title=""
                                                                       itemprop="url">{{$menu->category->cate_name}}</a>
                                                                @else
                                                                    @if($loop->index == count($restaurant->restaurantMenus) -1)
                                                                        <a href="#" title="" itemprop="url">{{$menu->category->cate_name}}.</a>
                                                                    @else
                                                                        <a href="#" title="" itemprop="url">{{$menu->category->cate_name}} | </a>
                                                                    @endif
                                                                @endif
                                                            @endforeach
                                                        </span>
                                                    </div>
                                                    <div class="rating-wrapper">
                                                        <a class="gradient-brd brd-rd2" title=""
                                                           itemprop="url"><i class="fa fa-star"></i> Rate <i>{{number_format($restaurant->rating, 1)}}</i></a>
                                                    </div>
                                                </div>
                                                <div class="restaurant-detail-tabs">
                                                    <ul class="nav nav-tabs">
                                                        <li class="active"><a href="#tab1-1" data-toggle="tab"><i
                                                                    class="fa fa-cutlery"></i> Menu</a></li>
                                                        <li><a href="#tab1-2" data-toggle="tab"><i
                                                                    class="fa fa-picture-o"></i> Gallery</a></li>
                                                        <li><a href="#tab1-3" data-toggle="tab"><i
                                                                    class="fa fa-star"></i> Reviews</a></li>
                                                        <li><a href="#tab1-5" data-toggle="tab"><i
                                                                    class="fa fa-info"></i> Restaurant Info</a></li>
                                                    </ul>
                                                    <div class="tab-content">
                                                        <div class="tab-pane fade in active" id="tab1-1">

                                                            @foreach($products as $product)
                                                                <div class="dishes-list-wrapper">
                                                                    <h4 class="title3" itemprop="headline"><span
                                                                            class="sudo-bottom sudo-bg-red">{{\App\Models\Category::find($product[0]["cate_id"])->cate_name}}</span>
                                                                    </h4>
                                                                    @if(count($product) > 1)
                                                                        @foreach($product as $item)
                                                                            <ul class="dishes-list">
                                                                                <li class="wow fadeInUp"
                                                                                    data-wow-delay="0.1s">
                                                                                    <div class="featured-restaurant-box"
                                                                                         style="margin-bottom: 20px">
                                                                                        <div
                                                                                            class="featured-restaurant-thumb">
                                                                                            <a href="/product-detail/{{$item["id"]}}" title=""
                                                                                               itemprop="url"><img
                                                                                                    src="images/resource/{{\App\Models\Product::find($item["id"])->productImages[0]->path}}"
                                                                                                    alt="dish-img1-1.jpg"
                                                                                                    itemprop="image"
                                                                                                    width="111px"
                                                                                                    height="92px"></a>
                                                                                        </div>
                                                                                        <div
                                                                                            class="featured-restaurant-info">
                                                                                            <h4 itemprop="headline"
                                                                                                style=" float: left;width: 100%;display:-webkit-box;max-width: 75%;-webkit-line-clamp: 1;-webkit-box-orient: vertical;overflow: hidden; height: 22px">
                                                                                                <a href="/product-detail/{{$item["id"]}}"
                                                                                                   title="{{\App\Models\Product::find($item["id"])->name}}"
                                                                                                   itemprop="url">{{\App\Models\Product::find($item["id"])->name}}</a>
                                                                                            </h4>
                                                                                            <span class="price">${{\App\Models\Product::find($item["id"])->discount ?? \App\Models\Product::find($item["id"])->price}}.00</span>
                                                                                            <p itemprop="description"
                                                                                               style=" float: left;display: -webkit-box;max-width: 100%;-webkit-line-clamp: 1;-webkit-box-orient: vertical;overflow: hidden;">{{\App\Models\Product::find($item["id"])->description}}</p>
                                                                                        </div>
                                                                                        <div class="ord-btn">
                                                                                            <a class="brd-rd2"
                                                                                               title="Add to cart"
                                                                                               itemprop="url" style="padding: 0">
                                                                                                <form action="cart/add-from-detail" method="get" class="detail-to-cart">
                                                                                                    <input type="hidden" name="itemId" value="{{$item["id"]}}">
                                                                                                    <input name="qty" type="hidden" value="1">
                                                                                                    <button type="submit" style="width: 100%; height: 100%; padding: 9px 26px; background-color: transparent">
                                                                                                    ADD TO CART
                                                                                                    </button>
                                                                                                </form>
                                                                                            </a>

                                                                                        </div>
                                                                                    </div>
                                                                                </li>
                                                                            </ul>
                                                                        @endforeach
                                                                    @else
                                                                        <ul class="dishes-list">
                                                                            <li class="wow fadeInUp"
                                                                                data-wow-delay="0.1s">
                                                                                <div class="featured-restaurant-box"
                                                                                     style="margin-bottom: 20px">
                                                                                    <div
                                                                                        class="featured-restaurant-thumb">
                                                                                        <a href="/product-detail/{{$product[0]["id"]}}" title=""
                                                                                           itemprop="url"><img
                                                                                                src="images/resource/{{\App\Models\Product::find($product[0]["id"])->productImages[0]->path}}"
                                                                                                alt="dish-img1-1.jpg"
                                                                                                itemprop="image"
                                                                                                width="111px"
                                                                                                height="92px"></a>
                                                                                    </div>
                                                                                    <div
                                                                                        class="featured-restaurant-info">
                                                                                        <h4 itemprop="headline"
                                                                                            style=" float: left;width: 100%;display: -webkit-box;max-width: 75%;-webkit-line-clamp: 1;-webkit-box-orient: vertical;overflow: hidden;height: 22px">
                                                                                            <a href="/product-detail/{{$product[0]["id"]}}"
                                                                                               title="{{\App\Models\Product::find($product[0]["id"])->name}}"
                                                                                               itemprop="url">{{\App\Models\Product::find($product[0]["id"])->name}}</a>
                                                                                        </h4>
                                                                                        <span class="price">${{\App\Models\Product::find($product[0]["id"])->discount ?? \App\Models\Product::find($product[0]["id"])->price}}.00</span>
                                                                                        <p itemprop="description"
                                                                                           style=" float: left;display: -webkit-box;max-width: 100%;-webkit-line-clamp: 1;-webkit-box-orient: vertical;overflow: hidden;">{{\App\Models\Product::find($product[0]["id"])->description}}</p>
                                                                                    </div>
                                                                                    <div class="ord-btn">
                                                                                        <a class="brd-rd2"
                                                                                           title="Add to cart"
                                                                                           itemprop="url" style="padding: 0">
                                                                                            <form action="cart/add-from-detail" method="get" class="detail-to-cart">
                                                                                                <input type="hidden" name="itemId" value="{{$product[0]["id"]}}">
                                                                                                <input name="qty" type="hidden" value="1">
                                                                                                <button type="submit" style="width: 100%; height: 100%; padding: 9px 26px; background-color: transparent">
                                                                                            ADD TO CART
                                                                                                </button>
                                                                                            </form>
                                                                                        </a>
                                                                                    </div>
                                                                                </div>
                                                                            </li>
                                                                        </ul>
                                                                    @endif
                                                                </div>
                                                            @endforeach
                                                        </div>
                                                        <div class="tab-pane fade" id="tab1-2">
                                                            <div class="restaurant-gallery">
                                                                <h4 class="title3" itemprop="headline"><span
                                                                        class="sudo-bottom sudo-bg-red">{{$restaurant->restaurant_name}}</span>
                                                                </h4>
                                                                <div class="remove-ext">
                                                                    <div class="row">
                                                                        @foreach($restaurant->restaurantImages as $image)
                                                                        <div class="col-md-6 col-sm-6 col-lg-6">
                                                                            <div class="restaurant-gallery-img"><a
                                                                                    href="images/resource/{{$image->path}}"
                                                                                    data-fancybox="gallery" title=""
                                                                                    itemprop="url"><img
                                                                                        src="images/resource/{{$image->path}}"
                                                                                        alt="{{$image->path}}"
                                                                                        itemprop="image"></a></div>
                                                                        </div>
                                                                        @endforeach
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="tab-pane fade" id="tab1-3">
                                                            <div class="customer-review-wrapper">
                                                                <h4 class="title3" itemprop="headline"><span
                                                                        class="sudo-bottom sudo-bg-red">Custo</span>mer
                                                                    Reviews</h4>
                                                                <ul class="comments-thread customer-reviews">
                                                                    @if($comments != null)
                                                                        @foreach($comments as $comment)
                                                                            <li>
                                                                                <div class="comment">
                                                                                    <img class="brd-rd50" style="width: 110px; height: 110px"
                                                                                         src="images/user/{{$comment->user->avatar ?? 'default-user-avt.png'}}"
                                                                                         alt="review-img1.jpg"
                                                                                         itemprop="image">
                                                                                    <div class="comment-info">
                                                                                        <h4 itemprop="headline"><a
                                                                                                href="#"
                                                                                                title=""
                                                                                                itemprop="url">{{$comment->user->name}}</a></h4>
                                                                                        <p itemprop="description">{{$comment->messages}}</p>
                                                                                        <span class="customer-rating">
                                                                                            @if($comment->rating < 5)
                                                                                                @for($i = 1; $i <=$comment->rate; $i++)
                                                                                                    <i class="fa fa-star on"></i>
                                                                                                @endfor
                                                                                                @for($j = 1; $j <= 5 - $comment->rate; $j++)
                                                                                                    <i class="fa fa-star-o"></i>
                                                                                                @endfor
                                                                                            @else
                                                                                                <i class="fa fa-star on"></i>
                                                                                                <i class="fa fa-star on"></i>
                                                                                                <i class="fa fa-star on"></i>
                                                                                                <i class="fa fa-star on"></i>
                                                                                                <i class="fa fa-star-on"></i>
                                                                                            @endif
                                                                                        <span>({{$comment->rate}})</span>
                                                                                    </span>
                                                                                    </div>
                                                                                </div>
                                                                            </li>
                                                                        @endforeach
                                                                    @endif
                                                                    @if(count($comments) == 0)
                                                                        <div style="width: 100%; height: 200px"><h4 style="color: #5c5c5c">There is no comment about this restaurant now.</h4></div>
                                                                    @endif
                                                                </ul>
                                                                <div class="your-review">
                                                                    <h4 class="title3" itemprop="headline"><span
                                                                            class="sudo-bottom sudo-bg-red">Write</span>
                                                                        Review Here</h4>
                                                                    <form class="review-form" method="post"
                                                                          action="/restaurant-review">
                                                                        @csrf
                                                                        <input type="hidden" name="restaurant-id"
                                                                               value="{{$restaurant->id}}">
                                                                        <textarea class="brd-rd30" name="message"
                                                                                  placeholder="Your review"></textarea>
                                                                        <button class="brd-rd2 red-bg"
                                                                                type="submit">
                                                                            POST REVIEW
                                                                        </button>
                                                                        <div class="rate-box">
                                                                            <span>RATE US</span>
                                                                            <div class="rate">
                                                                                <input type="radio" id="star5"
                                                                                       name="rate" value="5"/>
                                                                                <label for="star5">5
                                                                                    stars</label>
                                                                                <input type="radio" id="star4"
                                                                                       name="rate" value="4"/>
                                                                                <label for="star4">4
                                                                                    stars</label>
                                                                                <input type="radio" id="star3"
                                                                                       name="rate" value="3"/>
                                                                                <label for="star3">3
                                                                                    stars</label>
                                                                                <input type="radio" id="star2"
                                                                                       name="rate" value="2"/>
                                                                                <label for="star2">2
                                                                                    stars</label>
                                                                                <input type="radio" id="star1"
                                                                                       name="rate" value="1"/>
                                                                                <label for="star1">1
                                                                                    star</label>
                                                                            </div>
                                                                        </div>
                                                                    </form>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="tab-pane fade" id="tab1-5">
                                                            <div class="restaurant-info-wrapper">
                                                                <h3 class="title3" itemprop="headline"><span
                                                                        class="sudo-bottom sudo-bg-red">Res</span>taurant Information</h3>

                                                                <ul class="restaurant-info-list">
                                                                    <li>
                                                                        <i class="fa fa-map-marker red-clr"></i>
                                                                        <strong>Address :</strong>
                                                                        <span>{{$restaurant->address}}</span>
                                                                    </li>
                                                                    <li>
                                                                        <i class="fa fa-phone red-clr"></i>
                                                                        <strong>Call us & Hire us</strong>
                                                                        <span>{{$restaurant->telephone}}</span>
                                                                    </li>
                                                                    <li>
                                                                        <i class="fa fa-envelope-o red-clr"></i>
                                                                        <strong>Have any questions?</strong>
                                                                        <span>{{$restaurant->email}}</span>
                                                                    </li>
                                                                    <li>
                                                                        <i class="fa fa-fax red-clr"></i>
                                                                        <strong>Fax</strong>
                                                                        <span>+652 235 89658965</span>
                                                                    </li>
                                                                </ul>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div style="padding-left: 70px;" class="col-md-4 col-sm-12 col-lg-4">
                                        <div class="sidebar right">
                                            <div class="widget style2 Search_filters wow fadeIn" data-wow-delay="0.2s"
                                                 style="visibility: visible; animation-delay: 0.2s; animation-name: fadeIn;">
                                                <h4 class="widget-title2 sudo-bg-red" itemprop="headline">Search
                                                    Filters</h4>
                                                <div class="widget-data">
                                                    <ul>
                                                        @foreach($categories as $category)
                                                            <li><a href="restaurants/{{$category->id}}" title=""
                                                                   itemprop="url"
                                                                   style="text-transform: capitalize">{{$category->cate_name}}</a>
                                                            </li>
                                                        @endforeach
                                                    </ul>
                                                </div>
                                            </div>
                                        </div><!--Sidebar -->
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

@endsection
