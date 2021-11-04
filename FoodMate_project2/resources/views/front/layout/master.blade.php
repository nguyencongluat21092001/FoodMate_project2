<!DOCTYPE html>
<html lang="en">
<head>
    <base href="{{asset('/')}}">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content=""/>
    <meta name="keywords" content=""/>
    <title>@yield('title')</title>
    <link rel="shortcut icon" href="images/favicon.png" type="image/x-icon">

    <link rel="stylesheet" href="css/icons.min.css">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/animate.min.css">
    <link rel="stylesheet" href="css/main.css">
    <link rel="stylesheet" href="css/red-color.css">
    <link rel="stylesheet" href="css/yellow-color.css">
    <link rel="stylesheet" href="css/responsive.css">
    <!-- CSS -->
    <link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/css/alertify.min.css"/>
    <!-- Default theme -->
    <link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/css/themes/semantic.min.css"/>

</head>
<body itemscope>
<main>
    <div class="preloader">
        <div id="cooking">
            <div class="bubble"></div>
            <div class="bubble"></div>
            <div class="bubble"></div>
            <div class="bubble"></div>
            <div class="bubble"></div>
            <div id="area">
                <div id="sides">
                    <div id="pan"></div>
                    <div id="handle"></div>
                </div>
                <div id="pancake">
                    <div id="pastry"></div>
                </div>
            </div>
        </div>
    </div>

    <header class="stick">
        <div class="topbar">
            <div class="container">

                <div class="location-block">
                    <button id="show-input-address">ENTER LOCATION <i class="fa fa-caret-down" id="down-icon"></i>
                    </button>
                    <br>
                    <form action="" id="autocomplete-container">
                        <button type="submit" class="red-bg">OK</button>
                    </form>
                </div>
                <div class="topbar-register" style="height: 45px">
                    @if(\Illuminate\Support\Facades\Auth::check())

                    @else
                    <a class="log-popup-btn" href="/login" title="Login" itemprop="url">LOGIN</a> / <a class="sign-popup-btn"
                                                                                                  href="/register"
                                                                                                  title="Register" itemprop="url">REGISTER</a>
                    @endif
                </div>
                <div class="social1">
                    <a href="#" title="Facebook" itemprop="url" target="_blank"><i
                            class="fa fa-facebook-square"></i></a>
                    <a href="#" title="Twitter" itemprop="url" target="_blank"><i class="fa fa-twitter"></i></a>
                    <a href="#" title="Google Plus" itemprop="url" target="_blank"><i class="fa fa-google-plus"></i></a>
                </div>
            </div>
        </div><!-- Topbar -->
        <div class="logo-menu-sec">
            <div class="container">
                <div class="logo"><h1 itemprop="headline"><a href="/" title="Home" itemprop="url"><img
                                src="images/logo_ok.png" alt="logo.png" itemprop="image"></a></h1></div>
                <nav>
                    <div class="menu-sec">
                        <ul>
                            <li class="menu-item-has-children"><a href="/" title="HOMEPAGE" itemprop="url"><span
                                        class="red-clr"></span>HOMEPAGE</a>
                            </li>
                            <li class="menu-item-has-children"><a title="RESTAURANTS" itemprop="url"><span
                                        class="red-clr"></span>DISCOVER</a>
                                <ul class="sub-dropdown">
                                    <li class="menu-item-has-children"><a href="/shop" title="Shop" itemprop="url"><span class="red-clr"></span>FOOD</a>
                                    </li>
                                    <li class="menu-item-has-children"><a href="/restaurants" title="RESTAURANTS" itemprop="url"><span
                                                class="red-clr"></span>RESTAURANTS</a></li>
                                </ul>
                            </li>
                            <li class="menu-item-has-children"><a href="/about-us" title="ABOUT FOODMATE" itemprop="url"><span
                                        class="red-clr"></span>ABOUT US</a>
                            </li>
                            <li><a href="/contact-us" title="CONTACT US" itemprop="url"><span class="red-clr"></span>CONTACT
                                    US</a></li>
                        </ul>


                        @if(\Illuminate\Support\Facades\Auth::check())
                            <a class="red-bg brd-rd4" href="/register-reservation/{{\Illuminate\Support\Facades\Auth::user()->id}}" title="Register" itemprop="url">REGISTER
                                RESTAURANT</a>
                        @else
                            <a class="red-bg brd-rd4" href="#" itemprop="url" data-toggle="modal" data-target="#registerrestaurant" >REGISTER
                                RESTAURANT</a>
                        @endif

                        @if(\Illuminate\Support\Facades\Auth::check())
                            <div class="user-info-header">
                                <div class="notification"><i class="fa fa-circle red-clr"></i></div>
                                <img class="brd-rd50" src="images/user/{{\Illuminate\Support\Facades\Auth::user()->avatar ?? 'default-user-avt.png'}}" alt="user-avatar"
                                     itemprop="image">
                                <div class="user-info-inner" id="master-user-info">
                                    <h5 itemprop="headline"><a href="/dashboard/setting" title="" itemprop="url">{{\Illuminate\Support\Facades\Auth::user()->name}}</a>
                                    </h5>
                                </div>
                            </div>
                            <div class="col-md-4 col-sm-12 col-lg-4 user-dashboard">
                                <div class="profile-sidebar-header brd-rd5">
                                    <div class="profile-sidebar-inner brd-rd5">
                                        <ul class="nav nav-tabs">
                                            <li id="cart-menu" class="{{$active ?? ''}}"><a href="/dashboard/cart"><i
                                                        class="fa fa-shopping-basket"></i> MY CART</a></li>
                                            <li><a href="/dashboard/orders"><i class="fa fa-file-text"></i>MY ORDERS</a></li>
                                            <li><a href="/dashboard/setting"><i class="fa fa-cog"></i>ACCOUNT SETTINGS</a>
                                            </li>
                                            @if(\Illuminate\Support\Facades\Auth::user()->role == 2)
                                            <li><a href="/admin-dashboard/1"><i class="fa fa-window-maximize"></i>MY RESTAURANT</a></li>
                                            @endif
                                            <li><a class="brd-rd3 sign-out-btn yellow-bg" href="#" title=""
                                                   itemprop="url" data-toggle="modal" data-target="#signout"><i class="fa fa-sign-out"></i>SIGN OUT</a></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        @endif
                    </div>
                </nav><!-- Navigation -->
            </div>
        </div><!-- Logo Menu Section -->
    </header><!-- Header -->

    <div class="responsive-header">
        <div class="responsive-topbar">
            <div class="select-wrp">
                <select data-placeholder="Choose Location">
                    <option>CHOOSE LOCATION</option>
                    <option>New york</option>
                    <option>Washington</option>
                    <option>Chicago</option>
                    <option>Los Angeles</option>
                </select>
            </div>
        </div>
        <div class="responsive-logomenu">
            <div class="logo"><h1 itemprop="headline"><a href="index.html" title="Home" itemprop="url"><img
                            src="images/logo.png" alt="logo.png" itemprop="image"></a></h1></div>
            <span class="menu-btn yellow-bg brd-rd4"><i class="fa fa-align-justify"></i></span>
        </div>
        <div class="responsive-menu">
            <span class="menu-close red-bg brd-rd3"><i class="fa fa-close"></i></span>
            <div class="menu-lst">
                <ul>
                    <li class="menu-item-has-children"><a href="#" title="HOMEPAGES" itemprop="url"><span
                                class="yellow-clr"></span>HOMEPAGE</a>
                    </li>
                    <li class="menu-item-has-children"><a href="/restaurants" title="RESTAURANTS" itemprop="url"><span
                                class="yellow-clr"></span>RESTAURANTS</a>
                    </li>
                    <li class="menu-item-has-children"><a href="#" title="PAGES" itemprop="url"><span
                                class="yellow-clr"></span>CATEGORIES</a>
                        <ul class="sub-dropdown">
                            <li class="menu-item-has-children"><a href="#" title="BLOG" itemprop="url">CATEGORY 1</a>
                                <ul class="sub-dropdown">
                                    <li class="menu-item-has-children"><a href="#" title="BLOG LAYOUTS" itemprop="url">SUB-CATE
                                            1</a>
                                        <ul class="sub-dropdown">
                                            <li><a href="blog-right-sidebar.html" title="BLOG WITH RIGHT SIDEBAR"
                                                   itemprop="url">SUB-CATE</a></li>
                                            <li><a href="blog-left-sidebar.html" title="BLOG WITH LEFT SIDEBAR"
                                                   itemprop="url">SUB-CATE</a></li>
                                            <li><a href="blog.html" title="BLOG WITH NO SIDEBAR"
                                                   itemprop="url">SUB-CATE</a></li>
                                        </ul>
                                    </li>
                                    <li class="menu-item-has-children"><a href="#" title="BLOG DETAIL" itemprop="url">SUB-CATE
                                            2</a>
                                        <ul class="sub-dropdown">
                                            <li><a href="blog-detail-right-sidebar.html"
                                                   title="BLOG DETAIL WITH RIGHT SIDEBAR" itemprop="url">SUB-CATE</a>
                                            </li>
                                            <li><a href="blog-detail-left-sidebar.html"
                                                   title="BLOG DETAIL WITH LEFT SIDEBAR" itemprop="url">SUB-CATE</a>
                                            </li>
                                            <li><a href="blog-detail.html" title="BLOG DETAIL WITH NO SIDEBAR"
                                                   itemprop="url">SUB-CATE</a></li>
                                        </ul>
                                    </li>
                                    <li class="menu-item-has-children"><a href="#" title="BLOG FORMATES" itemprop="url">SUB-CATE
                                            3</a>
                                        <ul class="sub-dropdown">
                                            <li><a href="blog-detail-video.html" title="BLOG DETAIL WITH VIDEO"
                                                   itemprop="url">SUB-CATE</a></li>
                                            <li><a href="blog-detail-audio.html" title="BLOG DETAIL WITH AUDIO"
                                                   itemprop="url">SUB-CATE</a></li>
                                            <li><a href="blog-detail-carousel.html" title="BLOG DETAIL WITH CAROUSEL"
                                                   itemprop="url">SUB-CATE</a></li>
                                        </ul>
                                    </li>
                                </ul>
                            </li>

                            <li><a href="register-reservation.html" title="REGISTER RESERVATION" itemprop="url">CATEGORY
                                    2</a></li>
                            <li><a href="how-it-works.html" title="HOW IT WORKS" itemprop="url">CATEGORY 3</a></li>
                            <li><a href="dashboard.html" title="USER PROFILE" itemprop="url">CATEGORY 4</a></li>
                            <li><a href="about-us.html" title="ABOUT US" itemprop="url">CATEGORY 5</a></li>
                            <li><a href="food-detail.html" title="FOOD DETAIL" itemprop="url">CATEGORY 6</a></li>
                        </ul>
                    </li>
                    <li><a href="contact.html" title="CONTACT US" itemprop="url"><span class="yellow-clr"></span>CONTACT
                            US</a></li>
                </ul>
            </div>
            <div class="user-info-header">
                <div class="notification"><i class="fa fa-circle red-clr"></i></div>
                <img class="brd-rd50" src="images/resource/user-avatar.jpg" alt="user-avatar.jpg" itemprop="image">
                <div class="user-info-inner">
                    <h5 itemprop="headline"><a href="#" title="" itemprop="url">BUYER DEMO</a></h5>
                </div>
            </div>
            <div class="col-md-4 col-sm-12 col-lg-4 user-dashboard">
                <div class="profile-sidebar-header brd-rd5 wow fadeIn" data-wow-delay="0.2s">
                    <div class="profile-sidebar-inner brd-rd5">
                        <ul class="nav nav-tabs">
                            <li class="active"><a href="#my-orders" data-toggle="tab"><i
                                        class="fa fa-shopping-basket"></i> MY CART</a></li>
                            <li><a href="#my-bookings" data-toggle="tab"><i class="fa fa-file-text"></i>MY ORDERS</a>
                            </li>
                            <li><a href="#account-settings" data-toggle="tab"><i class="fa fa-cog"></i> ACCOUNT SETTINGS</a>
                            </li>
                            <li><a class="brd-rd3 sign-out-btn yellow-bg" href="#" title="" itemprop="url"><i
                                        class="fa fa-sign-out"></i> SIGN OUT</a></li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="topbar-register">
                <a class="log-popup-btn" href="#" title="Login" itemprop="url">LOGIN</a> / <a class="sign-popup-btn"
                                                                                              href="#" title="Register"
                                                                                              itemprop="url">REGISTER</a>
            </div>
            <div class="social1">
                <a href="#" title="Facebook" itemprop="url" target="_blank"><i class="fa fa-facebook-square"></i></a>
                <a href="#" title="Twitter" itemprop="url" target="_blank"><i class="fa fa-twitter"></i></a>
                <a href="#" title="Google Plus" itemprop="url" target="_blank"><i class="fa fa-google-plus"></i></a>
            </div>
            <div class="register-btn">
                <a class="yellow-bg brd-rd4" href="register-reservation.html" title="Register" itemprop="url">REGISTER
                    RESTAURANT</a>
            </div>
        </div><!-- Responsive Menu -->
    </div><!-- Responsive Header -->

    @yield('body')
    @include('front.components.signOutModal')
    @include('front.components.registerRestaurantModal')
    <footer>
        <div class="block top-padd80 bottom-padd80 dark-bg">
            <div class="container">
                <div class="row">
                    <div class="col-md-12 col-sm-12 col-lg-12">
                        <div class="footer-data">
                            <div class="row">
                                <div class="col-md-3 col-sm-6 col-lg-3">
                                    <div class="widget about_widget wow fadeIn" data-wow-delay="0.1s">
                                        <div class="logo"><h1 itemprop="headline"><a href="/" title="Home"
                                                                                     itemprop="url"><img
                                                        src="images/logo_footer_ok.png" alt="logo.png" itemprop="image"></a></h1>
                                        </div>
                                        <p itemprop="description">Satisfy your cravings by getting the food you love
                                            from your favourite restaurants delivered to you fast.</p>
                                        <div class="social2">
                                            <a class="brd-rd50" href="#" title="Facebook" itemprop="url"
                                               target="_blank"><i class="fa fa-facebook"></i></a>
                                            <a class="brd-rd50" href="#" title="Google Plus" itemprop="url"
                                               target="_blank"><i class="fa fa-google-plus"></i></a>
                                            <a class="brd-rd50" href="#" title="Twitter" itemprop="url" target="_blank"><i
                                                    class="fa fa-twitter"></i></a>
                                            <a class="brd-rd50" href="#" title="Pinterest" itemprop="url"
                                               target="_blank"><i class="fa fa-pinterest"></i></a>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-3 col-sm-6 col-lg-3">
                                    <div class="widget information_links wow fadeIn" data-wow-delay="0.2s">
                                        <h4 class="widget-title" itemprop="headline">INFORMATION</h4>
                                        <ul>
                                            <li><a href="/about-us" title="" itemprop="url">About Us</a></li>
                                            <li><a href="/how-it-work" title="" itemprop="url">How It Works</a></li>
                                            <li><a href="#" title="" itemprop="url">Press Releases</a></li>
                                            <li><a href="#" title="" itemprop="url">Shop with Points</a></li>
                                            <li><a href="#" title="" itemprop="url">More Branches</a></li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="col-md-3 col-sm-6 col-lg-3">
                                    <div class="widget customer_care wow fadeIn" data-wow-delay="0.3s">
                                        <h4 class="widget-title" itemprop="headline">CUSTOMER CARE</h4>
                                        <ul>
                                            <li><a href="/dashboard/setting" title="" itemprop="url">My Account</a></li>
                                            <li><a href="/dashboard/cart" title="" itemprop="url">My Cart</a></li>
                                            <li><a href="/contact-us" title="" itemprop="url">Contact</a></li>
                                            <li><a href="/dahsboard/orders" title="" itemprop="url">My Orders</a></li>
                                            <li><a href="#" title="" itemprop="url">Money Back</a></li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="col-md-3 col-sm-6 col-lg-3">
                                    <div class="widget get_in_touch wow fadeIn" data-wow-delay="0.4s">
                                        <h4 class="widget-title" itemprop="headline">GET IN TOUCH</h4>
                                        <ul>
                                            <li class="align-middle"><i class="fa fa-map-marker"></i>No. 08, Ton That Thuyet Street, My Dinh Ward, Tu Liem District, Hanoi City.</li>
                                            <li class="align-middle"><i class="fa fa-phone"></i> 033937165</li>
                                            <li class="align-middle"><i class="fa fa-envelope"></i> <a href="mailto:hellofoodmate@gmail.com" title="" itemprop="url">hello@foodmate.com</a>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div><!-- Footer Data -->
                    </div>
                </div>
            </div>
        </div>
    </footer>

    <div class="log-popup text-center">
        <div class="sign-popup-wrapper brd-rd5">
            <div class="sign-popup-inner brd-rd5">
                <a class="log-close-btn" href="#" title="" itemprop="url"><i class="fa fa-close"></i></a>
                <div class="sign-popup-title text-center">
                    <h4 itemprop="headline">SIGN IN</h4>
                </div>

                <span class="popup-seprator text-center"></span>
                <form class="sign-form" action="/login" method="post">
                    @csrf
                    <div class="row">
                        <div class="col-md-12 col-sm-12 col-lg-12">
                            <input class="brd-rd3" type="email" name="email" placeholder="Email">
                        </div>
                        <div class="col-md-12 col-sm-12 col-lg-12">
                            <input class="brd-rd3" type="password" name="password" placeholder="Password">
                        </div>
                        <div class="col-md-12 col-sm-12 col-lg-12">
                            <button class="red-bg brd-rd3" type="submit">SIGN IN</button>
                        </div>
                        <div class="col-md-12 col-sm-12 col-lg-12">
                            <a class="sign-btn" href="#" title="" itemprop="url">Not a member? Sign up</a>
                            <a class="recover-btn" href="#" title="" itemprop="url">Recover my password</a>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <div class="sign-popup text-center">
        <div class="sign-popup-wrapper brd-rd5">
            <div class="sign-popup-inner brd-rd5">
                <a class="sign-close-btn" href="#" title="" itemprop="url"><i class="fa fa-close"></i></a>
                <div class="sign-popup-title text-center">
                    <h4 itemprop="headline">SIGN UP</h4>
                </div>
                <span class="popup-seprator text-center"></span>
                <form class="sign-form" action="/register" method="post">
                    @csrf
                    <div class="row">
                        <div class="col-md-12 col-sm-12 col-lg-12">
                            <input class="brd-rd3" type="text" name="name" placeholder="Username"
                                   value="{{old('name')}}">
                            <span class="text-danger">@error('name'){{$message}}@enderror</span>
                        </div>
                        <div class="col-md-12 col-sm-12 col-lg-12">
                            <input class="brd-rd3" type="email" name="email" placeholder="Email"
                                   value="{{old('email')}}">
                            <span class="text-danger">@error('email'){{$message}}@enderror</span>
                        </div>
                        <div class="col-md-12 col-sm-12 col-lg-12">
                            <input class="brd-rd3" type="password" name="password" placeholder="Password">
                            <span class="text-danger">@error('password'){{$message}}@enderror</span>
                        </div>
                        <div class="col-md-12 col-sm-12 col-lg-12">
                            <button class="red-bg brd-rd3" type="submit">REGISTER NOW</button>
                        </div>
                        <div class="col-md-12 col-sm-12 col-lg-12">
                            <a class="sign-btn" href="#" title="" itemprop="url">Already Registered? Sign in</a>
                            <a class="recover-btn" href="#" title="" itemprop="url">Recover my password</a>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</main><!-- Main Wrapper -->

<script src="js/jquery.min.js"></script>
<script src="js/bootstrap.min.js"></script>
<script src="js/plugins.js"></script>
<script src="js/main.js"></script>
<script src="js/address-autoComplete.js"></script>
<script src="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/alertify.min.js"></script>
<script src="js/districts.min.js"></script>
@if(session('message') != null)
<script type="text/javascript">
    alertify.set('notifier','position', 'top-center');
    alertify.success('This food has been added to your cart !');
</script>
@endif
</body>

</html>
