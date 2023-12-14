@extends('frontend.login-master')

@section('title')
    Login
@endsection

@section('content')
    <section>
        <div class="axil-signin-area">

            <!-- Start Header -->
            <div class="signin-header">
                <div class="row align-items-center">
                    <div class="col-sm-4">
                        <a href="{{route('home')}}" class="site-logo"><img
                                src="{{ asset('/') }}frontend/assets/images/logo/logo.png" alt="logo"></a>
                    </div>
                    <div class="col-sm-8">
                        <div class="singin-header-btn">
                            <p>Not a member?</p>
                            <a href="{{route('register.customer')}}" class="axil-btn btn-bg-secondary sign-up-btn">Sign Up Now</a>
                        </div>
                    </div>
                </div>
            </div>
            <!-- End Header -->

            <div class="row">
                <div class="col-xl-4 col-lg-6">
                    <div class="axil-signin-banner bg_image bg_image--9">
                        <h3 class="title">We Offer the Best Products</h3>
                    </div>
                </div>
                <div class="col-lg-6 offset-xl-2">
                    <div class="axil-signin-form-wrap">
                        <div class="axil-signin-form">
                            <h3 class="title">Sign in to eTrade.</h3>
                            <p class="b2 mb--55 {{Session('message') == '' ? '' : 'text-danger'}}">{{Session('message') == '' ? 'Enter your detail below' : Session('message')}}</p>
                            {{-- <p class="b2 mb--10 text-danger">{{Session('message')}}</p> --}}

                            <form class="singin-form" action="{{route('login.customer')}}" method="POST">
                                @csrf
                                <div class="form-group">
                                    <label>Email or Mobile</label>
                                    <input type="text" class="form-control" name="user_id">
                                    <p class="text-danger">{{$errors->has('user_id') ? $errors->first('user_id') : ''}}</p>
                                </div>
                                <div class="form-group">
                                    <label>Password</label>
                                    <input type="password" class="form-control" name="password">
                                    <p class="text-danger">{{$errors->has('password') ? $errors->first('password') : ''}}</p>
                                </div>
                                <div class="form-group d-flex align-items-center justify-content-between">
                                    <button type="submit" class="axil-btn btn-bg-primary submit-btn">Sign In</button>
                                    <a href="{{route('recover.password.customer')}}" class="forgot-btn">Forget password?</a>
                                </div>
                            </form>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
