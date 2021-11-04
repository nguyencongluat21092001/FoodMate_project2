@extends('front.layout.master')
@section('body')
    <div class="bread-crumbs-wrapper">
        <div class="container">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="#" title="" itemprop="url">Home</a></li>
                <li class="breadcrumb-item active">{{$search ?? 'Shop'}}</li>
            </ol>
        </div>
    </div>

    <section>
        <div class="block top-padd30 gray-bg">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <div class="col-md-9 col-sm-12 col-lg-9">
                            <div class="sec-box" style="padding: 20px">
                                <div class="search-found" style="margin-top: -30px; margin-bottom: 40px">
                                    @isset($keyWord)
                                    <div class="search-found" style="margin: 0;">
                                        <h4 itemprop="headline" style="padding-top: 20px; font-size: 20px">Search Result Found <span class="red-clr">"{{Session::get('keyWord') ?? ''}}{{$keyWord ?? ''}}"</span>
                                        </h4>
                                    </div>
                                    @endisset
                                    <form class="search-frm" method="post" action="/product-search">
                                        @csrf
                                        <input type="text" name="key-word" placeholder="Feel like eating "
                                               style="border: 1px solid #cccccc;height: 50px; font-size: 14px">
                                        <button class="red-bg" type="submit"><i class="fa fa-search"></i></button>
                                    </form>
                                </div>
                                @if($products != null)
                                <div class="remove-ext">
                                    <div class="row">
                                        @foreach($products as $product)
                                            <div class="col-md-4 col-sm-6 col-lg-4">
                                                <div class="popular-dish-box wow fadeIn" data-wow-delay="0.2s">
                                                    <div class="popular-dish-thumb">
                                                        <a href="/product-detail/{{$product->id}}" title="" itemprop="url"><img
                                                                src="images/resource/{{$product->productImages[0]->path}}"
                                                                alt="" itemprop="image" style="width: 249px;height: 159px"></a>
                                                        <span class="post-rate yellow-bg brd-rd2"><i
                                                                class="fa fa-star-o"></i> {{number_format($product->rating, 1)}}</span>
                                                    </div>
                                                    <div class="popular-dish-info" style="padding: 10px">
                                                        <h4 itemprop="headline" style="font-size: 16px;height: 40px;display: -webkit-box;max-width: 100%;-webkit-line-clamp: 2;-webkit-box-orient: vertical;overflow: hidden;"><a
                                                                href="/product-detail/{{$product->id}}" title="" itemprop="url">{{$product->name}}</a>
                                                        </h4>
                                                        <span><a href="/shop/{{$product->category->id}}}" title=""
                                                                 itemprop="url" style="display: block;text-transform: capitalize; color: #ea1b25; margin-bottom: 5px">{{$product->category->cate_name}}</a></span>
                                                        <p itemprop="description" style="font-size: 14px; margin-bottom: 15px">{{$product->description}}</p>
                                                        <div style="margin-bottom: 10px">
                                                        @if($product->discount != null)
                                                        <span class="discount-price" style="display: inline-block">${{$product->price}}.00</span>
                                                        <span class="price" style="float: none">${{$product->discount}}.00</span>
                                                        @else
                                                            <span class="price" style="float: none">${{$product->price}}.00</span>
                                                        @endif
                                                        </div>
                                                        <a class="brd-rd2" href="/cart/add/{{\Illuminate\Support\Facades\Auth::id() ?? 0}}/{{$product->id}}" title="Add to cart"
                                                           itemprop="url">Add to cart</a>
                                                        <div class="restaurant-info">
                                                            <img src="images/resource/{{$product->restaurant->avatar}}"
                                                                 style="width: 40px;height: 40px" alt="{{$product->restaurant->avatar}}"
                                                                 itemprop="image">
                                                            <div class="restaurant-info-inner">
                                                                <h6 itemprop="headline" style="font-size: 13px"><a
                                                                        href="restaurant-detail.html" title=""
                                                                        itemprop="url">{{$product->restaurant->restaurant_name}}</a></h6>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div><!-- Popular Dish Box -->
                                                <br>
                                            </div>
                                        @endforeach
{{--                                        <a href="#" title="" class="view-more">view more</a>--}}
                                        @endif
                                    </div>
                                </div>
                            </div>
                            <div style="width: 100%;margin: 10px auto" class="shop">
                                @if($products instanceof \Illuminate\Pagination\LengthAwarePaginator)
                                {!! $products->appends(request()->all())->links("pagination::bootstrap-4")!!}
                                    @endif
                            </div>
                        </div>

                       @include('front.components.shopSideBar')
                    </div>
                </div>
            </div>
        </div>
        </div>
    </section>
@endsection
