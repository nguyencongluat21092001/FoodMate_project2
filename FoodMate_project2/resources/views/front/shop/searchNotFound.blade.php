@extends('front.layout.master')
@section('body')
    <div class="bread-crumbs-wrapper">
        <div class="container">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="#" title="" itemprop="url">Home</a></li>
                <li class="breadcrumb-item"><a href="#" title="" itemprop="url">Search Food</a></li>
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
                                        <p itemprop="description">It's seem like no food with this name in our website, let's discover other tasty food now !</p>
                                        <h2 itemprop="headline">No Results Found - Search a Relevant Keyword</h2>
                                        <form class="search-frm" method="post" action="/product-search">
                                            @csrf
                                            <input type="text" style="font-size: 14px;border: 1px solid #cccccc;" name="key-word" placeholder="Feel like eating" />
                                            <button class="red-bg" type="submit"><i class="fa fa-search"></i></button>
                                        </form>
                                    </div>
                                </div>
                                @include('front.components.shopSideBar')
                            </div>
                        </div>
                    </div><!-- Section Box -->
                </div>
            </div>

        </div>
    </section>
@endsection
