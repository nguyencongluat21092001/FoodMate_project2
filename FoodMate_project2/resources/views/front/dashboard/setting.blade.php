@extends('front.layout.master')
@section('title', 'Dashboard')
@section('body')
    <div class="bread-crumbs-wrapper">
        <div class="container">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="#" title="" itemprop="url">Home</a></li>
                <li class="breadcrumb-item active">Account Setting</li>
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
                                                    <li><a href="/dashboard/cart"><i
                                                                class="fa fa-shopping-basket"></i> MY CART</a></li>
                                                    <li><a href="/dashboard/orders"><i
                                                                class="fa fa-file-text"></i>MY ORDERS</a></li>
                                                    <li class="active"><a href="/dashboard/setting"><i
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
                                            <div class="tab-pane fade in active" id="account-settings">
                                                <div class="tabs-wrp account-settings brd-rd5">
                                                    <h4 itemprop="headline">ACCOUNT SETTINGS</h4>
                                                    <div class="account-settings-inner">
                                                        <div class="row">
                                                            <form action="dashboard/setting/update-profile" method="post" class="profile-info-form" enctype="multipart/form-data" name="updateProfile" onsubmit="validateUpdateProfileForm()">
                                                                @csrf
                                                                <div class="col-md-4 col-sm-4 col-lg-4">
                                                                    <div class="profile-info text-center">
                                                                        <div class="profile-thumb brd-rd50">
                                                                            <img id="profile-display"
                                                                                 src="images/user/{{Auth::user()->avatar ?? 'default-user-avt.png'}}"
                                                                                 alt="{{Auth::user()->avatar}}"
                                                                                 itemprop="image">
                                                                        </div>
{{--                                                                        <a class="red-clr change-password" href="#"--}}
{{--                                                                           title="" itemprop="url">Change Password</a>--}}
                                                                        <div class="profile-img-upload-btn">
                                                                            <label
                                                                                class="fileContainer brd-rd5 yellow-bg">
                                                                                UPLOAD PICTURE
                                                                                <input id="profile-upload" name="avatar"
                                                                                       type="file"/>
                                                                            </label>
                                                                            <span class="text-danger" style="float: left">{{$errors->first('avatar')}}</span>
                                                                        </div>
                                                                        <p itemprop="description">Upload a profile
                                                                            picture</p>
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-8 col-sm-8 col-lg-8">
                                                                    <div class="profile-info-form-wrap">

                                                                        <div class="row mrg20">
                                                                            <div
                                                                                class="col-md-12 col-sm-12 col-lg-12">
                                                                                <label>Complete Name :</label>
                                                                                <input class="brd-rd3" type="text" name="full-name"
                                                                                       placeholder="{{Auth::user()->name}}">
                                                                            </div>
{{--                                                                            <div--}}
{{--                                                                                class="col-md-12 col-sm-12 col-lg-12">--}}
{{--                                                                                <label>Email Address--}}
{{--                                                                                    <sup>*</sup></label>--}}
{{--                                                                                <input class="brd-rd3" type="email" name="email"--}}
{{--                                                                                       placeholder="{{Auth::user()->email}}">--}}
{{--                                                                            </div>--}}
                                                                            <div
                                                                                class="col-md-12 col-sm-12 col-lg-12">
                                                                                <label>Phone No :</label>
                                                                                <input class="brd-rd3" type="text" name="phone-number"
                                                                                       placeholder="{{Auth::user()->telephone ?? 'Enter your phone'}}">
                                                                            </div>
                                                                            <div class="col-md-12 col-sm-12 col-lg-12">
                                                                                <label>Address :</label>
                                                                                <textarea name="address" id="" cols="30"
                                                                                          rows="10" placeholder="{{Auth::user()->address ?? 'Enter your address'}}"></textarea>
                                                                                <button class="brd-rd3 red-bg"
                                                                                        type="submit"
                                                                                        id="update-user-profile">Update
                                                                                </button>
                                                                            </div>
                                                                        </div>

                                                                    </div>
                                                                </div>
                                                            </form>
                                                        </div>
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
    <script type="text/javascript">
        function validateUpdateProfileForm() {
            var fullName = document.forms["updateProfile"]["full-name"].value;
            var avatar = document.forms["updateProfile"]["avatar"].value;
            var telephone = document.forms["updateProfile"]["phone-number"].value;
            var address = document.forms["updateProfile"]["address"].value;
            if ((fullName == null || fullName === "") && (avatar == null || avatar === "") && (telephone == null || telephone === "")&& (address == null || address === "")) {
                alert("Please fill in at least 1 field!");
                return false;
            }
        }
    </script>
@endsection
