@extends('front.layout.master')
@section('title', 'Restaurant')
@section('body')
    <div class="bread-crumbs-wrapper">
        <div class="container">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="#" title="" itemprop="url">Home</a></li>
                <li class="breadcrumb-item active">Restaurant</li>
            </ol>
        </div>
    </div>

    <section>
        <div class="block gray-bg bottom-padd210 top-padd30">
            <div class="container">
                <div class="row">
                    <div class="col-md-12 col-sm-12 col-lg-12">
                        <div class="sec-box">
                            <div class="sec-wrapper top-padd30">
                                <div class="row">
                                    <div class="col-md-9 col-sm-12 col-lg-9">
                                        @isset($keyWord)
                                            <div class="search-found" style="margin: 0;">
                                                <h4 itemprop="headline" style="margin-bottom: 10px; font-size: 20px">
                                                    Search Result Found <span
                                                        class="red-clr">"{{Session::get('keyWord') ?? ''}}{{$keyWord ?? ''}}"</span>
                                                </h4>
                                            </div>
                                        @endisset
                                        <form class="search-frm" method="post" action="/restaurant-search"
                                              style="margin-bottom: 30px; margin-top: 5px">
                                            @csrf
                                            <input type="text" name="key-word" placeholder="Enter address "
                                                   style="border: 1px solid #cccccc;height: 50px; font-size: 14px">
                                            <button class="red-bg" type="submit"><i class="fa fa-search"></i></button>
                                        </form>

                                        <div class="remove-ext">
                                            <div class="row">
                                                @foreach($restaurants as $restaurant)
                                                    <div class="col-md-6 col-sm-6 col-lg-6">
                                                        <div
                                                            class="featured-restaurant-box with-bg style2 brd-rd12 wow fadeIn"
                                                            data-wow-delay="0.1s">
                                                            <div class="featured-restaurant-thumb">
                                                                <a href="restaurant-detail/{{$restaurant->id}}" title=""
                                                                   itemprop="url"><img
                                                                        src="images/resource/{{$restaurant->avatar}}"
                                                                        alt="" style="width: 44px; height: 44px"
                                                                        itemprop="image"></a>
                                                            </div>
                                                            <div class="featured-restaurant-info">
                                                                <span class="red-clr">{{$restaurant->address}}</span>
                                                                <h4 itemprop="headline"><a
                                                                        href="restaurant-detail/{{$restaurant->id}}"
                                                                        title=""
                                                                        itemprop="url">{{$restaurant->restaurant_name}}</a>
                                                                </h4>
                                                                <span class="food-types" style="width: 100%; height: 40px">Type of food:
                                                                    @foreach($restaurant->restaurantMenus as $menu)
                                                                        @if($loop->index == count($restaurant->restaurantMenus) -1)
                                                                            <a title="" itemprop="url">{{\App\Models\Category::find($menu->cate_id)->cate_name}}</a>
                                                                        @else
                                                                            <a  title="" itemprop="url">{{\App\Models\Category::find($menu->cate_id)->cate_name}}</a>,
                                                                        @endif
                                                                    @endforeach
                                                                    </span>
                                                                <ul class="post-meta">
                                                                    <li><i class="flaticon-money"></i> Accepts cash
                                                                    </li>
                                                                </ul>
                                                                <a class="brd-rd30"
                                                                   href="restaurant-detail/{{$restaurant->id}}"
                                                                   title="View restaurant detail"><i
                                                                        class="fa fa-angle-double-right"></i>Discover
                                                                    now</a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                @endforeach
                                                <div class="rite-meta">
                                                    @if($restaurants instanceof \Illuminate\Pagination\LengthAwarePaginator)
                                                        {!! $restaurants->links("pagination::bootstrap-4")!!}
                                                    @endif
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    @include('front.components.restaurantSideBar')
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
