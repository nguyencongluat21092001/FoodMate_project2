@extends('front.layout.master')
@section('title', 'FoodMate - About Us')
@section('body')
  <section>
    <div class="bread-crumbs-wrapper">
      <div class="container">
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="/" title="" itemprop="url">Home</a></li>
          <li class="breadcrumb-item active">About Us</li>

        </ol>
      </div>
    </div>
  </section>

  <section>

    <div class="block less-spacing gray-bg top-padd30">

      <div class="container">
        <div class="row">
          <div class="col-md-12 col-sm-12 col-lg-12">
            <div class="sec-box">
              <div class="about-feat text-center wow fadeIn" data-wow-delay="0.2s">
                <h2 class="title3" itemprop="headline">We Are Provide Food Online Service</h2>
                <img src="images/resource/about-img.jpg" alt="about-img.jpg" itemprop="image">
              </div>
                <div class="toggle-wrapper text-center top-padd80">
                    <div id="toggle" class="toggle">
                        @foreach($faqs as $faq)
                        <div class="toggle-item">
                            <h4><i class="fa fa-angle-right brd-rd50"></i>{{$faq->title}}</h4>
                            <div class="content">
                                <p>{{$faq->content}}</p>
                            </div>
                        </div>
                        @endforeach
                    </div><!-- Accordions -->
                </div>
              <div class="block less-spacing">
                <div class="row">
                  <div class="col-md-12 col-sm-12 col-lg-12">
                    <div class="title2-wrapper text-center">
                      <h2 class="sudo-bottom sudo-width70 sudo-bg-yellow" itemprop="headline">Easy 3 Step Order</h2>
                    </div>
                    <div class="remove-ext text-center">
                      <div class="row">
                        <div class="col-md-4 col-sm-4 col-lg-4">
                          <div class="step-box wow fadeIn" data-wow-delay="0.2s">
                            <i><img src="images/resource/setp-img1.png" alt="setp-img1.png" itemprop="image"> <span class="brd-rd50 red-bg">1</span></i>
                            <div class="setp-box-inner">
                              <h4 itemprop="headline">Explore Restaurants</h4>
                              <p itemprop="description">Lorem Ipsum is simply dummy text of the printing and typesetting industry</p>
                            </div>
                          </div><!-- Step Box -->
                        </div>
                        <div class="col-md-4 col-sm-4 col-lg-4">
                          <div class="step-box wow fadeIn" data-wow-delay="0.4s">
                            <i><img src="images/resource/setp-img2.png" alt="setp-img2.png" itemprop="image"> <span class="brd-rd50 red-bg">2</span></i>
                            <div class="setp-box-inner">
                              <h4 itemprop="headline">Choose a Tasty Dish</h4>
                              <p itemprop="description">Lorem Ipsum is simply dummy text of the printing and typesetting industry</p>
                            </div>
                          </div><!-- Step Box -->
                        </div>
                        <div class="col-md-4 col-sm-4 col-lg-4">
                          <div class="step-box wow fadeIn" data-wow-delay="0.6s">
                            <i><img src="images/resource/setp-img3.png" alt="setp-img3.png" itemprop="image"> <span class="brd-rd50 red-bg">3</span></i>
                            <div class="setp-box-inner">
                              <h4 itemprop="headline">Follow The Status</h4>
                              <p itemprop="description">Lorem Ipsum is simply dummy text of the printing and typesetting industry</p>
                            </div>
                          </div><!-- Step Box -->
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <div class="featured-restaurant-food text-center bottom-padd80">
                <div class="featured-restaurant-food-thumb">
                  <ul class="featured-restaurant-food-img-carousel">
                    <li><img src="images/resource/featured-restaurant-food-img1.jpg" alt="featured-restaurant-food-img1.jpg" itemprop="url"> <a class="brd-rd50 vimeo" data-fancybox href="https://vimeo.com/49674259" title="Click To play" itemprop="url"><i class="fa fa-vimeo"></i></a></li>
                    <li><img src="images/resource/featured-restaurant-food-img2.jpg" alt="featured-restaurant-food-img2.jpg" itemprop="url"> <a class="brd-rd50 youtube" data-fancybox href="https://www.youtube.com/embed/V6Vd1E9OL-U" title="Click To play" itemprop="url"><i class="fa fa-youtube-play"></i></a></li>
                    <li><img src="images/resource/featured-restaurant-food-img3.jpg" alt="featured-restaurant-food-img3.jpg" itemprop="url"></li>
                    <li><img src="images/resource/featured-restaurant-food-img4.jpg" alt="featured-restaurant-food-img4.jpg" itemprop="url"></li>
                    <li><img src="images/resource/featured-restaurant-food-img5.jpg" alt="featured-restaurant-food-img5.jpg" itemprop="url"></li>
                    <li><img src="images/resource/featured-restaurant-food-img6.jpg" alt="featured-restaurant-food-img6.jpg" itemprop="url"></li>
                  </ul>
                  <ul class="featured-restaurant-food-thumb-carousel">
                    <li><img class="brd-rd3" src="images/resource/featured-restaurant-food-thumb-img1.jpg" alt="featured-restaurant-food-thumb-img1.jpg" itemprop="image"></li>
                    <li><img class="brd-rd3" src="images/resource/featured-restaurant-food-thumb-img2.jpg" alt="featured-restaurant-food-thumb-img2.jpg" itemprop="image"></li>
                    <li><img class="brd-rd3" src="images/resource/featured-restaurant-food-thumb-img3.jpg" alt="featured-restaurant-food-thumb-img3.jpg" itemprop="image"></li>
                    <li><img class="brd-rd3" src="images/resource/featured-restaurant-food-thumb-img4.jpg" alt="featured-restaurant-food-thumb-img4.jpg" itemprop="image"></li>
                    <li><img class="brd-rd3" src="images/resource/featured-restaurant-food-thumb-img5.jpg" alt="featured-restaurant-food-thumb-img5.jpg" itemprop="image"></li>
                    <li><img class="brd-rd3" src="images/resource/featured-restaurant-food-thumb-img6.jpg" alt="featured-restaurant-food-thumb-img6.jpg" itemprop="image"></li>
                  </ul>
                </div>
              </div>
              <div class="title1-wrapper text-center style2">
                <div class="title1-inner">
                  <h2 itemprop="headline">Top Restaurants</h2>
                  <p itemprop="description">Things that get tricky are things like burgers and fries, or things that are deep-fried. We do have a couple of burger restaurants that are capable of doing a good job transporting but it's definitely a lot harder to do that. Fries are almost impossible</p>
                </div>
              </div>
              <div class="top-restaurant-carousel2 less-btm-margin">
                  @if(count($restaurants) > 0)
                      @foreach($restaurants as $restaurant)
                        <div class="top-restaurant-item">
                          <a href="#" title="{{$restaurant->restaurant_name}}" itemprop="url"><img src="images/resource/{{$restaurant->avatar}}" alt="top-restaurant1.png" itemprop="image"></a>
                        </div>
                      @endforeach
                  @endif
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
@endsection
