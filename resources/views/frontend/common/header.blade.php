<header class="header axil-header header-style-2">
    <div class="header-top-campaign">
        <div class="container position-relative">
            <div class="campaign-content">
                <div class="campaign-countdown"></div>
                <p>Open Doors To A World Of Fashion Get <a href="#">Get Your Offer</a></p>
            </div>
        </div>
        <button class="remove-campaign"><i class="fal fa-times"></i></button>
    </div>
    <!-- Start Header Top Area  -->
    <div class="axil-header-top">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-2 col-sm-3 col-5">
                    <div class="header-brand">
                        <a href="{{route('home')}}" class="logo logo-dark">
                            <img src="{{ asset('/') }}frontend/assets/images/logo/logo.png" alt="Site Logo">
                        </a>
                        <a href="{{route('home')}}" class="logo logo-light">
                            <img src="{{ asset('/') }}frontend/assets/images/logo/logo-light.png" alt="Site Logo">
                        </a>
                    </div>
                </div>
                <div class="col-lg-10 col-sm-9 col-7">
                    <div class="header-top-dropdown dropdown-box-style">
                        <div class="axil-search">
                            <button type="submit" class="icon wooc-btn-search">
                                <i class="far fa-search"></i>
                            </button>
                            <input type="search" class="placeholder product-search-input" name="search2" id="search2"
                                value="" maxlength="128" placeholder="What are you looking for...."
                                autocomplete="off">
                        </div>
                        <div class="dropdown">
                            <button class="dropdown-toggle" type="button" data-bs-toggle="dropdown"
                                aria-expanded="false">
                                USD
                            </button>
                            <ul class="dropdown-menu">
                                <li><a class="dropdown-item" href="#">USD</a></li>
                                <li><a class="dropdown-item" href="#">AUD</a></li>
                                <li><a class="dropdown-item" href="#">EUR</a></li>
                            </ul>
                        </div>
                        <div class="dropdown">
                            <button class="dropdown-toggle" type="button" data-bs-toggle="dropdown"
                                aria-expanded="false">
                                EN
                            </button>
                            <ul class="dropdown-menu">
                                <li><a class="dropdown-item" href="#">EN</a></li>
                                <li><a class="dropdown-item" href="#">ARB</a></li>
                                <li><a class="dropdown-item" href="#">SPN</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End Header Top Area  -->

    <!-- Start Mainmenu Area  -->
    <div class="axil-mainmenu aside-category-menu">
        <div class="container">
            <div class="header-navbar">
                <div class="header-nav-department">
                    <aside class="header-department">
                        <button class="header-department-text department-title" id="openCat">
                            <span class="icon"><i class="fal fa-bars"></i></span>
                            <span class="text">Categories</span>
                        </button>
                        <nav class="department-nav-menu" id="closeCat">
                            <button class="sidebar-close"><i class="fas fa-times"></i></button>
                            <ul class="nav-menu-list">
                                @foreach ($categories as $category)
                                    <li>
                                        <a href="#" class="nav-link {{count($category->subCategory) > 0 ? 'has-megamenu' : ''}}">
                                            <span class="menu-icon"><img
                                                    src="{{ asset('/') }}frontend/assets/images/product/categories/cat-01.png"
                                                    alt="Department"></span>
                                            <span class="menu-text">{{ $category->name }}</span>
                                        </a>
                                        @if (count($category->subCategory) > 0)
                                            <div class="department-megamenu">
                                                <div class="department-megamenu-wrap">
                                                    <div class="department-submenu-wrap">
                                                        <div class="department-submenu">
                                                            <ul>
                                                                @foreach ($category->subCategory as $subCategory)
                                                                    <li><a
                                                                            href="{{ route('products') }}">{{ $subCategory->name }}</a>
                                                                    </li>
                                                                @endforeach

                                                            </ul>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        @endif

                                    </li>
                                @endforeach


                            </ul>
                        </nav>
                    </aside>
                </div>
                <div class="header-main-nav">
                    <!-- Start Mainmanu Nav -->
                    <nav class="mainmenu-nav">
                        <button class="mobile-close-btn mobile-nav-toggler"><i class="fas fa-times"></i></button>
                        <div class="mobile-nav-brand">
                            <a href="index.html" class="logo">
                                <img src="{{ asset('/') }}frontend/assets/images/logo/logo.png" alt="Site Logo">
                            </a>
                        </div>
                        <ul class="mainmenu">
                            <li class="menu-item-has-children">
                                <a href="#">Home</a>
                                <ul class="axil-submenu">
                                    <li><a href="index-1.html">Home - Electronics</a></li>
                                    <li><a href="index-2.html">Home - NFT</a></li>
                                    <li><a href="index-3.html">Home - Fashion</a></li>
                                    <li><a href="index-4.html">Home - Jewellery</a></li>
                                    <li><a href="index-5.html">Home - Furniture</a></li>
                                    <li><a href="index-7.html">Home - Multipurpose</a></li>
                                    <li><a href="https://new.axilthemes.com/demo/template/etrade-rtl/">RTL Version</a>
                                    </li>
                                </ul>
                            </li>
                            <li class="menu-item-has-children">
                                <a href="#">Shop</a>
                                <ul class="axil-submenu">
                                    <li><a href="shop-sidebar.html">Shop With Sidebar</a></li>
                                    <li><a href="shop.html">Shop no Sidebar</a></li>
                                    <li><a href="single-product.html">Product Variation 1</a></li>
                                    <li><a href="single-product-2.html">Product Variation 2</a></li>
                                    <li><a href="single-product-3.html">Product Variation 3</a></li>
                                    <li><a href="single-product-4.html">Product Variation 4</a></li>
                                    <li><a href="single-product-5.html">Product Variation 5</a></li>
                                    <li><a href="single-product-6.html">Product Variation 6</a></li>
                                    <li><a href="single-product-7.html">Product Variation 7</a></li>
                                </ul>
                            </li>
                            <li class="menu-item-has-children">
                                <a href="#">Pages</a>
                                <ul class="axil-submenu">
                                    <li><a href="wishlist.html">Wishlist</a></li>
                                    <li><a href="{{ route('cart') }}">Cart</a></li>
                                    <li><a href="checkout.html">Checkout</a></li>
                                    <li><a href="{{ route('dashboard.customer') }}">Account</a></li>
                                    <li><a href="{{ route('register.customer') }}">Sign Up</a></li>
                                    <li><a href="{{ route('login.customer') }}">Sign In</a></li>
                                    <li><a href="forgot-password.html">Forgot Password</a></li>
                                    <li><a href="reset-password.html">Reset Password</a></li>
                                    <li><a href="privacy-policy.html">Privacy Policy</a></li>
                                    <li><a href="coming-soon.html">Coming Soon</a></li>
                                    <li><a href="404.html">404 Error</a></li>
                                    <li><a href="typography.html">Typography</a></li>
                                </ul>
                            </li>
                            <li><a href="about-us.html">About</a></li>
                            <li class="menu-item-has-children">
                                <a href="#">Blog</a>
                                <ul class="axil-submenu">
                                    <li><a href="blog.html">Blog List</a></li>
                                    <li><a href="blog-grid.html">Blog Grid</a></li>
                                    <li><a href="blog-details.html">Standard Post</a></li>
                                    <li><a href="blog-gallery.html">Gallery Post</a></li>
                                    <li><a href="blog-video.html">Video Post</a></li>
                                    <li><a href="blog-audio.html">Audio Post</a></li>
                                    <li><a href="blog-quote.html">Quote Post</a></li>
                                </ul>
                            </li>
                            <li><a href="contact.html">Contact</a></li>
                        </ul>
                    </nav>
                    <!-- End Mainmanu Nav -->
                </div>
                <div class="header-action">
                    <ul class="action-list">
                        <li class="axil-search d-sm-none d-block">
                            <a href="javascript:void(0)" class="header-search-icon" title="Search">
                                <i class="flaticon-magnifying-glass"></i>
                            </a>
                        </li>
                        <li class="wishlist">
                            <a href="wishlist.html">
                                <i class="flaticon-heart"></i>
                            </a>
                        </li>
                        {{-- for counting how much product is in cart --}}
                        @php($cartProductCount = count(Cart::content()))    
                        <li class="shopping-cart">
                            <a href="#" class="cart-dropdown-btn">
                                <span class="cart-count">{{$cartProductCount}}</span>
                                <i class="flaticon-shopping-cart"></i>
                            </a>
                        </li>
                        <li class="my-account">
                            <a href="javascript:void(0)">
                                <i class="flaticon-person"></i>
                            </a>
                            <div class="my-account-dropdown">

                                @if (Session::get('customer_id'))
                                    <ul>
                                        <li>
                                            <h6 class="m-0">{{Session::get('customer_name')}}</h6>
                                        </li>
                                        <li>
                                            <a href="{{ route('dashboard.customer') }}">My Account</a>
                                        </li>
                                    </ul>
                                @else
                                    <div class="login-btn">
                                        <a href="{{ route('login.customer') }}" class="axil-btn btn-bg-primary">Login</a>
                                    </div>
                                    <div class="reg-footer text-center">No account yet? <a href="{{ route('register.customer') }}" class="btn-link">REGISTER HERE.</a></div>
                                @endif
                                
                            </div>
                        </li>
                        <li class="axil-mobile-toggle">
                            <button class="menu-btn mobile-nav-toggler">
                                <i class="flaticon-menu-2"></i>
                            </button>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <!-- End Mainmenu Area  -->
</header>
