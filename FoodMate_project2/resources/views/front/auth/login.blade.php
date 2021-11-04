@extends('front.layout.master')
@section('title', 'Login')
@section('body')

    <div class="bread-crumbs-wrapper">
        <div class="container">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="#" title="" itemprop="url">Home</a></li>
                <li class="breadcrumb-item active">Login</li>
            </ol>
        </div>
    </div>

    <section>
        <div class="block" style="padding: 0 0 68px 0;">
            <div class="container">
                <div class="row">
                    <div class="col-md-12 col-sm-12 col-lg-12">
                        <div class="login-register-wrapper">
                            <div class="row">
                                <div class="col-md-6 col-sm-12 col-lg-6 ">
                                    <div class="sign-popup-wrapper brd-rd5" style="margin-left: 50%;">
                                        <div class="sign-popup-inner brd-rd5">
                                            <div class="sign-popup-title text-center">
                                                <h4 itemprop="headline">SIGN IN</h4>
                                                <span class="popup-seprator text-center"><i
                                                        class="brd-rd50">or</i></span>
                                                <form class="sign-form" action="/login" method="post">
                                                    @csrf
                                                    <div class="row">
                                                        <div class="col-md-12 col-sm-12 col-lg-12 col-xs-12">
                                                            <input class="brd-rd3" type="text" name="email"
                                                                   placeholder="Email">
                                                            <span class="text-danger" style="float: left">{{$errors->first('email')}}</span>
                                                        </div>
                                                        <div class="col-md-12 col-sm-12 col-lg-12 col-xs-12">
                                                            <input class="brd-rd3" type="password" name="password"
                                                                   placeholder="Password">
                                                            <span class="text-danger" style="float: left">{{$errors->first('password')}}</span>
                                                        </div>
                                                        <div class="col-md-12 col-sm-12 col-lg-12 col-xs-12">
                                                            <button class="red-bg brd-rd3" type="submit">SIGN IN
                                                            </button>
                                                        </div>
                                                        <div class="col-md-12 col-sm-12 col-lg-12 col-xs-12">
                                                            <a class="sign-btn" href="/register" title="" itemprop="url"
                                                               style="float: left;">Not a member? Sign up</a>
                                                            <a class="recover-btn" href="#" title="" itemprop="url">Recover
                                                                my password</a>
                                                        </div>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
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
