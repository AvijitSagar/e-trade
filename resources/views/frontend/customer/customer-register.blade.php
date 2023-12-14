@extends('frontend.login-master')

@section('title')
    Register
@endsection

@section('content')
    <section>
        <div class="axil-signin-area">

            <!-- Start Header -->
            <div class="signin-header">
                <div class="row align-items-center">
                    <div class="col-md-6">
                        <a href="{{route('home')}}" class="site-logo"><img src="{{asset('/')}}frontend/assets/images/logo/logo.png" alt="logo"></a>
                    </div>
                    <div class="col-md-6">
                        <div class="singin-header-btn">
                            <p>Already a member?</p>
                            <a href="{{route('login.customer')}}" class="axil-btn btn-bg-secondary sign-up-btn">Sign In</a>
                        </div>
                    </div>
                </div>
            </div>
            <!-- End Header -->

            <div class="row">
                <div class="col-xl-4 col-lg-6">
                    <div class="axil-signin-banner bg_image bg_image--10">
                        <h3 class="title">We Offer the Best Products</h3>
                    </div>
                </div>
                <div class="col-lg-6 offset-xl-2">
                    <div class="axil-signin-form-wrap">
                        <div class="axil-signin-form">
                            <h3 class="title">I'm New Here</h3>
                            <p class="b2 mb--55">Enter your detail below</p>

                            <form class="singin-form" action="{{route('register.customer')}}" method="POST">
                                @csrf
                                <div class="form-group">
                                    <label>User Name</label>
                                    <input type="text" class="form-control" name="name" placeholder="Name">
                                    <p class="text-danger">{{$errors->has('name') ? $errors->first('name') : ''}}</p>
                                </div>
                                <div class="form-group">
                                    <label>Email</label>
                                    <input type="email" class="form-control" name="email" placeholder="Email">
                                    <p class="text-danger">{{$errors->has('email') ? $errors->first('email') : ''}}</p>
                                </div>
                                <div class="form-group">
                                    <label>Mobile</label>
                                    <input type="number" class="form-control" name="mobile" placeholder="Mobile">
                                    <p class="text-danger">{{$errors->has('mobile') ? $errors->first('mobile') : ''}}</p>
                                </div>
                                <div class="form-group">
                                    <label>Password</label>
                                    <input type="password" class="form-control" name="password" placeholder="Password">
                                    <p class="text-danger">{{$errors->has('password') ? $errors->first('password') : ''}}</p>
                                </div>
                                
                                <div class="form-group">
                                    <button type="submit" class="axil-btn btn-bg-primary submit-btn">Create Account</button>
                                </div>
                            </form>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
