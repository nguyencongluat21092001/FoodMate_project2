@extends('front.layout.master')
@section('body')
    <div class="bread-crumbs-wrapper">
        <div class="container">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="#" title="" itemprop="url">Home</a></li>
                <li class="breadcrumb-item"><a href="#" title="" itemprop="url">Search Restaurant</a></li>
                <li class="breadcrumb-item active">Search Not Found</li>
            </ol>
        </div>
    </div>

    <section>
        <div class="block top-padd30 gray-bg">
            <div class="container">
                <div class="row">
                    <div class="sec-box">
                        <div class="col-md-12 col-sm-12 col-lg-12">
                            <div class="row">
                                <div class="col-md-9 col-sm-12 col-lg-9">
                                    <div class="search-found">
                                        <h3 itemprop="headline">Search Result Found <span class="red-clr">"{{Session::get('keyWord') ?? ''}}"</span>
                                        </h3>
                                        <p itemprop="description">It's seem like no restaurant with this name in our website, let's discover other restaurants now !</p>
                                        <h2 itemprop="headline">No Restaurant Found - Search a Relevant Keyword</h2>
                                        <form class="search-frm" method="post" action="/restaurant-search">
                                            @csrf
                                            <input type="text" style="font-size: 14px;border: 1px solid #cccccc;" name="key-word" placeholder="Enter restaurant name" />
                                            <button class="red-bg" type="submit"><i class="fa fa-search"></i></button>
                                        </form>
                                    </div>
                                </div>
                                <div class="col-md-3 col-sm-12 col-lg-3">
                                    <div class="sidebar left">
                                        <div class="widget style2 Search_filters">
                                            <h4 class="widget-title2 sudo-bg-red" itemprop="headline">Search
                                                Filters</h4>
                                            <div class="widget-data">
                                                <ul>
                                                    @foreach($categories as $category)
                                                        <li><a href="restaurants/{{$category->id}}" title="" itemprop="url" style="text-transform: capitalize">{{$category->cate_name}}</a></li>
                                                    @endforeach
                                                </ul>
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
    </section>
@endsection
