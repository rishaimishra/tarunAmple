@extends('Layouts.app')
@section('title')
    <title>Amplepoint</title>
@endsection

@include('includes.head')
@include('includes.header')


@section('content')


@include('includes.message')


    <div class="hero-sec">
        <video class="background" autoplay muted loop>
            <source src="https://amplepoints.com/home_banners/aboutamplepoints.mp4" type="video/mp4">
        </video>
    </div>




    {{-- -- start price --  --}}
    <div class="sec-padding price-sec">
        <h4>HOW IT WORKS</h4>
        <div class="container">
            <div class="row">
                <div class="outer-box">
                    <div class="row">
                        <!-- Pricing Block -->
                        <div class="pricing-block col-lg-4 col-md-6 col-sm-12 wow fadeInUp">
                            <div class="inner-box">
                                <div class="icon-box">
                                    <div class="icon-outer">
                                        <img src="{{ url('/') }}/public/assets/images/price/how-1.png" alt="">
                                    </div>
                                </div>
                                <div class="price-box">
                                    <h4 class="price">JOIN FOR FREE</h4>
                                </div>
                                <div class="features">
                                    <p>Sign Up For A Free AmplePoints
                                        Membership and Receive
                                        42 Free Ample Points
                                        (Cash-Value: $5.00)</p>
                                </div>
                                <div class="btn-box">
                                    <a href="#" class="theme-btn">1 AmplePoint = 12 cents</a>
                                </div>
                            </div>
                        </div>

                        <!-- Pricing Block -->
                        <div class="pricing-block col-lg-4 col-md-6 col-sm-12 wow fadeInUp" data-wow-delay="400ms">
                            <div class="inner-box">
                                <div class="icon-box">
                                    <div class="icon-outer">
                                        <img src="{{ url('/') }}/public/assets/images/price/how-2.png" alt="">
                                    </div>
                                </div>
                                <div class="price-box">
                                    <h4 class="price">EARN FOR FREE</h4>
                                </div>
                                <div class="features">
                                    <p>Earn Ample Points For
                                        Shopping, Sharing Links and
                                        Watching Personalized Ads</p>
                                </div>
                                <div class="btn-box">
                                    <a href="#" class="theme-btn">60 min = 60 AmplePoints = $7.20</a>
                                </div>
                            </div>
                        </div>

                        <!-- Pricing Block -->
                        <div class="pricing-block col-lg-4 col-md-6 col-sm-12 wow fadeInUp" data-wow-delay="800ms">
                            <div class="inner-box">
                                <div class="icon-box">
                                    <div class="icon-outer">
                                        <img src="{{ url('/') }}/public/assets/images/price/how-3.png" alt="">
                                    </div>
                                </div>
                                <div class="price-box">
                                    <h4 class="price">REDEEM AMPLES</h4>
                                </div>
                                <div class="features">
                                    <p>Redeem Your Ample Points
                                        To Receive Free Products, Services,
                                        and Discounts!</p>
                                </div>
                                <div class="btn-box">
                                    <a href="#" class="theme-btn">100 AmplePoints = $12.00</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-3 col-12 my-2">
                    <div class="video-card">
                        <a href="" class="play-btn" data-bs-toggle="modal" data-bs-target="#videoModal1">
                            <img src="{{ url('/') }}/public/assets/images/price/play-btn.png" alt="">
                        </a>
                        <img src="https://amplepoints.com/amplepoints_videos/big_idea.png" alt="" class="img-fluid">
                        <span class="ampl_video_time">01:15</span>
                    </div>
                </div>
                <div class="col-md-3 col-12 my-2">
                    <div class="video-card">
                        <a href="" class="play-btn" data-bs-toggle="modal" data-bs-target="#videoModal2">
                            <img src="{{ url('/') }}/public/assets/images/price/play-btn.png" alt="">
                        </a>
                        <img src="https://amplepoints.com/amplepoints_videos/how_to_signup.png" alt=""
                            class="img-fluid">
                        <span class="ampl_video_time">00:44</span>
                    </div>
                </div>
                <div class="col-md-3 col-12 my-2">
                    <div class="video-card">
                        <a href="" class="play-btn" data-bs-toggle="modal" data-bs-target="#videoModal3">
                            <img src="{{ url('/') }}/public/assets/images/price/play-btn.png" alt="">
                        </a>
                        <img src="https://amplepoints.com/amplepoints_videos/how_to_shop_with_amplepoints.png"
                            alt="" class="img-fluid">
                        <span class="ampl_video_time">01:30</span>
                    </div>
                </div>
                <div class="col-md-3 col-12 my-2">
                    <div class="video-card">
                        <a href="" class="play-btn" data-bs-toggle="modal" data-bs-target="#videoModal4">
                            <img src="{{ url('/') }}/public/assets/images/price/play-btn.png" alt="">
                        </a>
                        <img src="https://amplepoints.com/amplepoints_videos/how_to_watch_ads_and_earn_amplepoints.png"
                            alt="" class="img-fluid">
                        <span class="ampl_video_time">01:54</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
    {{-- -- end price --  --}}





    <!-- -- start sopping product --  -->

    {{-- <div class="sec-padding">
        <div class="shopping-products">
            <div class="container">
                <div class="row">

                    <div class="col-md-2 col-12 m-0 p-0 card-side-menu">
                        <div class="fashion">
                            FASHION <span>></span>
                        </div>

                        <button class="sideTab-button active" id="sideTab1">AMOUR</button>
                        <button class="sideTab-button" id="sideTab2">On Sale</button>
                        <button class="sideTab-button" id="sideTab3">Trending</button>

                    </div>

                    <div class="col-md-10 col-12 p-0 m-0">
                        <div id="sideTab-content1">

                            <div class="main-tab p-0">
                                <div class="row p-0 m-0" style="border-bottom:1px solid #dbdcdc">
                                    <div class="col-md-12 p-0">
                                        <div class="tab-container ps-2">
                                            <button class="tab-button tab-active" onclick="openTab('tab1')">New
                                                Arrivals</button>
                                            <button class="tab-button" onclick="openTab('tab2')">On Sale</button>
                                            <button class="tab-button" onclick="openTab('tab3')">Trending</button>
                                        </div>
                                    </div>
                                </div>
                                <div class="row p-0 m-0">
                                    <div class="col-md-4 col-12 p-0">
                                        <div class="product-single-img">
                                            <img src="{{ url('/') }}/public/assets/images/products/amplifyon_home_jewelry.jpg"
                                                alt="" class="img-fluid">
                                        </div>
                                    </div>
                                    <div class="col-md-8 col-12 p-0">
                                        <div class="product-imgs">
                                            <!-- -- first tab --  -->
                                            <div id="tab1" class="tab-content">
                                                <div class="row p-0 m-0">
                                                    <div class="col-md-4 col-12 p-0">
                                                        <div class="product-single-card">
                                                            <div class="product-top-area">
                                                                <div class="product-discount">
                                                                    50% OFF
                                                                </div>
                                                                <div class="product-img">
                                                                    <div class="first-view">
                                                                        <img src="{{ url('/') }}/public/assets/images/products/locket.jpg"
                                                                            alt="logo" class="img-fluid"
                                                                            onerror="this.src='https://i.ibb.co/qpB9ZCZ/placeholder.png'">
                                                                    </div>
                                                                    <div class="hover-view">
                                                                        <img src="{{ url('/') }}/public/assets/images/products/locket.jpg"
                                                                            alt="logo" class="img-fluid"
                                                                            onerror="this.src='https://i.ibb.co/qpB9ZCZ/placeholder.png'">
                                                                    </div>
                                                                </div>
                                                                <div class="sideicons">
                                                                    <button class="sideicons-btn">
                                                                        <i class="far fa-heart"></i>
                                                                    </button>
                                                                    <button class="sideicons-btn">
                                                                        <i class="fas fa-cart-plus"></i>
                                                                    </button>
                                                                </div>
                                                            </div>
                                                            <div class="product-info">
                                                                <h6 class="product-category">Amour Jewelry</h6>
                                                                <h6 class="product-title text-truncate"><a
                                                                        href="#">Amour 14.5mm Figaro</a></h6>
                                                                <div class="d-flex align-items-center">
                                                                    <div class="review-star me-1">
                                                                        <i class="fas fa-star"></i>
                                                                        <i class="fas fa-star"></i>
                                                                        <i class="fas fa-star"></i>
                                                                        <i class="fas fa-star-half-alt"></i>
                                                                        <i class="far fa-star"></i>
                                                                    </div>
                                                                    <span class="review-count">(13)</span>
                                                                </div>
                                                                <div class="d-flex flex-wrap align-items-center py-2">
                                                                    <div class="old-price">
                                                                        $100
                                                                    </div>
                                                                    <div class="new-price">
                                                                        $50
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-4 col-12 p-0">
                                                        <div class="product-single-card">
                                                            <div class="product-top-area">
                                                                <div class="product-discount">
                                                                    50% OFF
                                                                </div>
                                                                <div class="product-img">
                                                                    <div class="first-view">
                                                                        <img src="{{ url('/') }}/public/assets/images/products/jewelry1.jpg"
                                                                            alt="logo" class="img-fluid"
                                                                            onerror="this.src='https://i.ibb.co/qpB9ZCZ/placeholder.png'">
                                                                    </div>
                                                                    <div class="hover-view">
                                                                        <img src="{{ url('/') }}/public/assets/images/products/jewelry1.jpg"
                                                                            alt="logo" class="img-fluid"
                                                                            onerror="this.src='https://i.ibb.co/qpB9ZCZ/placeholder.png'">
                                                                    </div>
                                                                </div>
                                                                <div class="sideicons">
                                                                    <button class="sideicons-btn">
                                                                        <i class="far fa-heart"></i>
                                                                    </button>
                                                                    <button class="sideicons-btn">
                                                                        <i class="fas fa-cart-plus"></i>
                                                                    </button>
                                                                </div>
                                                            </div>
                                                            <div class="product-info">
                                                                <h6 class="product-category">Amour Jewelry</h6>
                                                                <h6 class="product-title text-truncate"><a
                                                                        href="#">Amour 14.5mm Figaro</a></h6>
                                                                <div class="d-flex align-items-center">
                                                                    <div class="review-star me-1">
                                                                        <i class="fas fa-star"></i>
                                                                        <i class="fas fa-star"></i>
                                                                        <i class="fas fa-star"></i>
                                                                        <i class="fas fa-star-half-alt"></i>
                                                                        <i class="far fa-star"></i>
                                                                    </div>
                                                                    <span class="review-count">(13)</span>
                                                                </div>
                                                                <div class="d-flex flex-wrap align-items-center py-2">
                                                                    <div class="old-price">
                                                                        $100
                                                                    </div>
                                                                    <div class="new-price">
                                                                        $50
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-4 col-12 p-0">
                                                        <div class="product-single-card">
                                                            <div class="product-top-area">
                                                                <div class="product-discount">
                                                                    50% OFF
                                                                </div>
                                                                <div class="product-img">
                                                                    <div class="first-view">
                                                                        <img src="{{ url('/') }}/public/assets/images/products/jewelry2.jpg"
                                                                            alt="logo" class="img-fluid"
                                                                            onerror="this.src='https://i.ibb.co/qpB9ZCZ/placeholder.png'">
                                                                    </div>
                                                                    <div class="hover-view">
                                                                        <img src="{{ url('/') }}/public/assets/images/products/jewelry2.jpg"
                                                                            alt="logo" class="img-fluid"
                                                                            onerror="this.src='https://i.ibb.co/qpB9ZCZ/placeholder.png'">
                                                                    </div>
                                                                </div>
                                                                <div class="sideicons">
                                                                    <button class="sideicons-btn">
                                                                        <i class="far fa-heart"></i>
                                                                    </button>
                                                                    <button class="sideicons-btn">
                                                                        <i class="fas fa-cart-plus"></i>
                                                                    </button>
                                                                </div>
                                                            </div>
                                                            <div class="product-info">
                                                                <h6 class="product-category">Amour Jewelry</h6>
                                                                <h6 class="product-title text-truncate"><a
                                                                        href="#">Amour 14.5mm Figaro</a></h6>
                                                                <div class="d-flex align-items-center">
                                                                    <div class="review-star me-1">
                                                                        <i class="fas fa-star"></i>
                                                                        <i class="fas fa-star"></i>
                                                                        <i class="fas fa-star"></i>
                                                                        <i class="fas fa-star-half-alt"></i>
                                                                        <i class="far fa-star"></i>
                                                                    </div>
                                                                    <span class="review-count">(13)</span>
                                                                </div>
                                                                <div class="d-flex flex-wrap align-items-center py-2">
                                                                    <div class="old-price">
                                                                        $100
                                                                    </div>
                                                                    <div class="new-price">
                                                                        $50
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-4 col-12 p-0">
                                                        <div class="product-single-card">
                                                            <div class="product-top-area">
                                                                <div class="product-discount">
                                                                    50% OFF
                                                                </div>
                                                                <div class="product-img">
                                                                    <div class="first-view">
                                                                        <img src="{{ url('/') }}/public/assets/images/products/jewelry3.jpg"
                                                                            alt="logo" class="img-fluid"
                                                                            onerror="this.src='https://i.ibb.co/qpB9ZCZ/placeholder.png'">
                                                                    </div>
                                                                    <div class="hover-view">
                                                                        <img src="{{ url('/') }}/public/assets/images/products/jewelry3.jpg"
                                                                            alt="logo" class="img-fluid"
                                                                            onerror="this.src='https://i.ibb.co/qpB9ZCZ/placeholder.png'">
                                                                    </div>
                                                                </div>
                                                                <div class="sideicons">
                                                                    <button class="sideicons-btn">
                                                                        <i class="far fa-heart"></i>
                                                                    </button>
                                                                    <button class="sideicons-btn">
                                                                        <i class="fas fa-cart-plus"></i>
                                                                    </button>
                                                                </div>
                                                            </div>
                                                            <div class="product-info">
                                                                <h6 class="product-category">Amour Jewelry</h6>
                                                                <h6 class="product-title text-truncate"><a
                                                                        href="#">Amour 14.5mm Figaro</a></h6>
                                                                <div class="d-flex align-items-center">
                                                                    <div class="review-star me-1">
                                                                        <i class="fas fa-star"></i>
                                                                        <i class="fas fa-star"></i>
                                                                        <i class="fas fa-star"></i>
                                                                        <i class="fas fa-star-half-alt"></i>
                                                                        <i class="far fa-star"></i>
                                                                    </div>
                                                                    <span class="review-count">(13)</span>
                                                                </div>
                                                                <div class="d-flex flex-wrap align-items-center py-2">
                                                                    <div class="old-price">
                                                                        $100
                                                                    </div>
                                                                    <div class="new-price">
                                                                        $50
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-4 col-12 p-0">
                                                        <div class="product-single-card">
                                                            <div class="product-top-area">
                                                                <div class="product-discount">
                                                                    50% OFF
                                                                </div>
                                                                <div class="product-img">
                                                                    <div class="first-view">
                                                                        <img src="{{ url('/') }}/public/assets/images/products/jewelry4.jpg"
                                                                            alt="logo" class="img-fluid"
                                                                            onerror="this.src='https://i.ibb.co/qpB9ZCZ/placeholder.png'">
                                                                    </div>
                                                                    <div class="hover-view">
                                                                        <img src="{{ url('/') }}/public/assets/images/products/jewelry4.jpg"
                                                                            alt="logo" class="img-fluid"
                                                                            onerror="this.src='https://i.ibb.co/qpB9ZCZ/placeholder.png'">
                                                                    </div>
                                                                </div>
                                                                <div class="sideicons">
                                                                    <button class="sideicons-btn">
                                                                        <i class="far fa-heart"></i>
                                                                    </button>
                                                                    <button class="sideicons-btn">
                                                                        <i class="fas fa-cart-plus"></i>
                                                                    </button>
                                                                </div>
                                                            </div>
                                                            <div class="product-info">
                                                                <h6 class="product-category">Amour Jewelry</h6>
                                                                <h6 class="product-title text-truncate"><a
                                                                        href="#">Amour 14.5mm Figaro</a></h6>
                                                                <div class="d-flex align-items-center">
                                                                    <div class="review-star me-1">
                                                                        <i class="fas fa-star"></i>
                                                                        <i class="fas fa-star"></i>
                                                                        <i class="fas fa-star"></i>
                                                                        <i class="fas fa-star-half-alt"></i>
                                                                        <i class="far fa-star"></i>
                                                                    </div>
                                                                    <span class="review-count">(13)</span>
                                                                </div>
                                                                <div class="d-flex flex-wrap align-items-center py-2">
                                                                    <div class="old-price">
                                                                        $100
                                                                    </div>
                                                                    <div class="new-price">
                                                                        $50
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-4 col-12 p-0">
                                                        <div class="product-single-card">
                                                            <div class="product-top-area">
                                                                <div class="product-discount">
                                                                    50% OFF
                                                                </div>
                                                                <div class="product-img">
                                                                    <div class="first-view">
                                                                        <img src="{{ url('/') }}/public/assets/images/products/jewelry5.jpg"
                                                                            alt="logo" class="img-fluid"
                                                                            onerror="this.src='https://i.ibb.co/qpB9ZCZ/placeholder.png'">
                                                                    </div>
                                                                    <div class="hover-view">
                                                                        <img src="{{ url('/') }}/public/assets/images/products/jewelry5.jpg"
                                                                            alt="logo" class="img-fluid"
                                                                            onerror="this.src='https://i.ibb.co/qpB9ZCZ/placeholder.png'">
                                                                    </div>
                                                                </div>
                                                                <div class="sideicons">
                                                                    <button class="sideicons-btn">
                                                                        <i class="far fa-heart"></i>
                                                                    </button>
                                                                    <button class="sideicons-btn">
                                                                        <i class="fas fa-cart-plus"></i>
                                                                    </button>
                                                                </div>
                                                            </div>
                                                            <div class="product-info">
                                                                <h6 class="product-category">Amour Jewelry</h6>
                                                                <h6 class="product-title text-truncate"><a
                                                                        href="#">Amour 14.5mm Figaro</a></h6>
                                                                <div class="d-flex align-items-center">
                                                                    <div class="review-star me-1">
                                                                        <i class="fas fa-star"></i>
                                                                        <i class="fas fa-star"></i>
                                                                        <i class="fas fa-star"></i>
                                                                        <i class="fas fa-star-half-alt"></i>
                                                                        <i class="far fa-star"></i>
                                                                    </div>
                                                                    <span class="review-count">(13)</span>
                                                                </div>
                                                                <div class="d-flex flex-wrap align-items-center py-2">
                                                                    <div class="old-price">
                                                                        $100
                                                                    </div>
                                                                    <div class="new-price">
                                                                        $50
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                            <!-- -- second tab --  -->
                                            <div id="tab2" class="tab-content">
                                                <div class="row p-0 m-0">
                                                    <div class="col-md-4 col-12 p-0">
                                                        <div class="product-single-card">
                                                            <div class="product-top-area">
                                                                <div class="product-discount">
                                                                    50% OFF
                                                                </div>
                                                                <div class="product-img">
                                                                    <div class="first-view">
                                                                        <img src="{{ url('/') }}/public/assets/images/products/jewelry6.jpg"
                                                                            alt="logo" class="img-fluid"
                                                                            onerror="this.src='https://i.ibb.co/qpB9ZCZ/placeholder.png'">
                                                                    </div>
                                                                    <div class="hover-view">
                                                                        <img src="{{ url('/') }}/public/assets/images/products/jewelry6.jpg"
                                                                            alt="logo" class="img-fluid"
                                                                            onerror="this.src='https://i.ibb.co/qpB9ZCZ/placeholder.png'">
                                                                    </div>
                                                                </div>
                                                                <div class="sideicons">
                                                                    <button class="sideicons-btn">
                                                                        <i class="far fa-heart"></i>
                                                                    </button>
                                                                    <button class="sideicons-btn">
                                                                        <i class="fas fa-cart-plus"></i>
                                                                    </button>
                                                                </div>
                                                            </div>
                                                            <div class="product-info">
                                                                <h6 class="product-category">Amour Jewelry</h6>
                                                                <h6 class="product-title text-truncate"><a
                                                                        href="#">Amour 14.5mm Figaro</a></h6>
                                                                <div class="d-flex align-items-center">
                                                                    <div class="review-star me-1">
                                                                        <i class="fas fa-star"></i>
                                                                        <i class="fas fa-star"></i>
                                                                        <i class="fas fa-star"></i>
                                                                        <i class="fas fa-star-half-alt"></i>
                                                                        <i class="far fa-star"></i>
                                                                    </div>
                                                                    <span class="review-count">(13)</span>
                                                                </div>
                                                                <div class="d-flex flex-wrap align-items-center py-2">
                                                                    <div class="old-price">
                                                                        $100
                                                                    </div>
                                                                    <div class="new-price">
                                                                        $50
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-4 col-12 p-0">
                                                        <div class="product-single-card">
                                                            <div class="product-top-area">
                                                                <div class="product-discount">
                                                                    50% OFF
                                                                </div>
                                                                <div class="product-img">
                                                                    <div class="first-view">
                                                                        <img src="{{ url('/') }}/public/assets/images/products/jewelry7.jpg"
                                                                            alt="logo" class="img-fluid"
                                                                            onerror="this.src='https://i.ibb.co/qpB9ZCZ/placeholder.png'">
                                                                    </div>
                                                                    <div class="hover-view">
                                                                        <img src="{{ url('/') }}/public/assets/images/products/jewelry7.jpg"
                                                                            alt="logo" class="img-fluid"
                                                                            onerror="this.src='https://i.ibb.co/qpB9ZCZ/placeholder.png'">
                                                                    </div>
                                                                </div>
                                                                <div class="sideicons">
                                                                    <button class="sideicons-btn">
                                                                        <i class="far fa-heart"></i>
                                                                    </button>
                                                                    <button class="sideicons-btn">
                                                                        <i class="fas fa-cart-plus"></i>
                                                                    </button>
                                                                </div>
                                                            </div>
                                                            <div class="product-info">
                                                                <h6 class="product-category">Amour Jewelry</h6>
                                                                <h6 class="product-title text-truncate"><a
                                                                        href="#">Amour 14.5mm Figaro</a></h6>
                                                                <div class="d-flex align-items-center">
                                                                    <div class="review-star me-1">
                                                                        <i class="fas fa-star"></i>
                                                                        <i class="fas fa-star"></i>
                                                                        <i class="fas fa-star"></i>
                                                                        <i class="fas fa-star-half-alt"></i>
                                                                        <i class="far fa-star"></i>
                                                                    </div>
                                                                    <span class="review-count">(13)</span>
                                                                </div>
                                                                <div class="d-flex flex-wrap align-items-center py-2">
                                                                    <div class="old-price">
                                                                        $100
                                                                    </div>
                                                                    <div class="new-price">
                                                                        $50
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-4 col-12 p-0">
                                                        <div class="product-single-card">
                                                            <div class="product-top-area">
                                                                <div class="product-discount">
                                                                    50% OFF
                                                                </div>
                                                                <div class="product-img">
                                                                    <div class="first-view">
                                                                        <img src="{{ url('/') }}/public/assets/images/products/jewelry8.jpg"
                                                                            alt="logo" class="img-fluid"
                                                                            onerror="this.src='https://i.ibb.co/qpB9ZCZ/placeholder.png'">
                                                                    </div>
                                                                    <div class="hover-view">
                                                                        <img src="{{ url('/') }}/public/assets/images/products/jewelry8.jpg"
                                                                            alt="logo" class="img-fluid"
                                                                            onerror="this.src='https://i.ibb.co/qpB9ZCZ/placeholder.png'">
                                                                    </div>
                                                                </div>
                                                                <div class="sideicons">
                                                                    <button class="sideicons-btn">
                                                                        <i class="far fa-heart"></i>
                                                                    </button>
                                                                    <button class="sideicons-btn">
                                                                        <i class="fas fa-cart-plus"></i>
                                                                    </button>
                                                                </div>
                                                            </div>
                                                            <div class="product-info">
                                                                <h6 class="product-category">Amour Jewelry</h6>
                                                                <h6 class="product-title text-truncate"><a
                                                                        href="#">Amour 14.5mm Figaro</a></h6>
                                                                <div class="d-flex align-items-center">
                                                                    <div class="review-star me-1">
                                                                        <i class="fas fa-star"></i>
                                                                        <i class="fas fa-star"></i>
                                                                        <i class="fas fa-star"></i>
                                                                        <i class="fas fa-star-half-alt"></i>
                                                                        <i class="far fa-star"></i>
                                                                    </div>
                                                                    <span class="review-count">(13)</span>
                                                                </div>
                                                                <div class="d-flex flex-wrap align-items-center py-2">
                                                                    <div class="old-price">
                                                                        $100
                                                                    </div>
                                                                    <div class="new-price">
                                                                        $50
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-4 col-12 p-0">
                                                        <div class="product-single-card">
                                                            <div class="product-top-area">
                                                                <div class="product-discount">
                                                                    50% OFF
                                                                </div>
                                                                <div class="product-img">
                                                                    <div class="first-view">
                                                                        <img src="{{ url('/') }}/public/assets/images/products/jewelry8.jpg"
                                                                            alt="logo" class="img-fluid"
                                                                            onerror="this.src='https://i.ibb.co/qpB9ZCZ/placeholder.png'">
                                                                    </div>
                                                                    <div class="hover-view">
                                                                        <img src="{{ url('/') }}/public/assets/images/products/jewelry8.jpg"
                                                                            alt="logo" class="img-fluid"
                                                                            onerror="this.src='https://i.ibb.co/qpB9ZCZ/placeholder.png'">
                                                                    </div>
                                                                </div>
                                                                <div class="sideicons">
                                                                    <button class="sideicons-btn">
                                                                        <i class="far fa-heart"></i>
                                                                    </button>
                                                                    <button class="sideicons-btn">
                                                                        <i class="fas fa-cart-plus"></i>
                                                                    </button>
                                                                </div>
                                                            </div>
                                                            <div class="product-info">
                                                                <h6 class="product-category">Amour Jewelry</h6>
                                                                <h6 class="product-title text-truncate"><a
                                                                        href="#">Amour 14.5mm Figaro</a></h6>
                                                                <div class="d-flex align-items-center">
                                                                    <div class="review-star me-1">
                                                                        <i class="fas fa-star"></i>
                                                                        <i class="fas fa-star"></i>
                                                                        <i class="fas fa-star"></i>
                                                                        <i class="fas fa-star-half-alt"></i>
                                                                        <i class="far fa-star"></i>
                                                                    </div>
                                                                    <span class="review-count">(13)</span>
                                                                </div>
                                                                <div class="d-flex flex-wrap align-items-center py-2">
                                                                    <div class="old-price">
                                                                        $100
                                                                    </div>
                                                                    <div class="new-price">
                                                                        $50
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-4 col-12 p-0">
                                                        <div class="product-single-card">
                                                            <div class="product-top-area">
                                                                <div class="product-discount">
                                                                    50% OFF
                                                                </div>
                                                                <div class="product-img">
                                                                    <div class="first-view">
                                                                        <img src="{{ url('/') }}/public/assets/images/products/jewelry9.jpg"
                                                                            alt="logo" class="img-fluid"
                                                                            onerror="this.src='https://i.ibb.co/qpB9ZCZ/placeholder.png'">
                                                                    </div>
                                                                    <div class="hover-view">
                                                                        <img src="{{ url('/') }}/public/assets/images/products/jewelry9.jpg"
                                                                            alt="logo" class="img-fluid"
                                                                            onerror="this.src='https://i.ibb.co/qpB9ZCZ/placeholder.png'">
                                                                    </div>
                                                                </div>
                                                                <div class="sideicons">
                                                                    <button class="sideicons-btn">
                                                                        <i class="far fa-heart"></i>
                                                                    </button>
                                                                    <button class="sideicons-btn">
                                                                        <i class="fas fa-cart-plus"></i>
                                                                    </button>
                                                                </div>
                                                            </div>
                                                            <div class="product-info">
                                                                <h6 class="product-category">Amour Jewelry</h6>
                                                                <h6 class="product-title text-truncate"><a
                                                                        href="#">Amour 14.5mm Figaro</a></h6>
                                                                <div class="d-flex align-items-center">
                                                                    <div class="review-star me-1">
                                                                        <i class="fas fa-star"></i>
                                                                        <i class="fas fa-star"></i>
                                                                        <i class="fas fa-star"></i>
                                                                        <i class="fas fa-star-half-alt"></i>
                                                                        <i class="far fa-star"></i>
                                                                    </div>
                                                                    <span class="review-count">(13)</span>
                                                                </div>
                                                                <div class="d-flex flex-wrap align-items-center py-2">
                                                                    <div class="old-price">
                                                                        $100
                                                                    </div>
                                                                    <div class="new-price">
                                                                        $50
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-4 col-12 p-0">
                                                        <div class="product-single-card">
                                                            <div class="product-top-area">
                                                                <div class="product-discount">
                                                                    50% OFF
                                                                </div>
                                                                <div class="product-img">
                                                                    <div class="first-view">
                                                                        <img src="{{ url('/') }}/public/assets/images/products/jewelry10.jpg"
                                                                            alt="logo" class="img-fluid"
                                                                            onerror="this.src='https://i.ibb.co/qpB9ZCZ/placeholder.png'">
                                                                    </div>
                                                                    <div class="hover-view">
                                                                        <img src="{{ url('/') }}/public/assets/images/products/jewelry10.jpg"
                                                                            alt="logo" class="img-fluid"
                                                                            onerror="this.src='https://i.ibb.co/qpB9ZCZ/placeholder.png'">
                                                                    </div>
                                                                </div>
                                                                <div class="sideicons">
                                                                    <button class="sideicons-btn">
                                                                        <i class="far fa-heart"></i>
                                                                    </button>
                                                                    <button class="sideicons-btn">
                                                                        <i class="fas fa-cart-plus"></i>
                                                                    </button>
                                                                </div>
                                                            </div>
                                                            <div class="product-info">
                                                                <h6 class="product-category">Amour Jewelry</h6>
                                                                <h6 class="product-title text-truncate"><a
                                                                        href="#">Amour 14.5mm Figaro</a></h6>
                                                                <div class="d-flex align-items-center">
                                                                    <div class="review-star me-1">
                                                                        <i class="fas fa-star"></i>
                                                                        <i class="fas fa-star"></i>
                                                                        <i class="fas fa-star"></i>
                                                                        <i class="fas fa-star-half-alt"></i>
                                                                        <i class="far fa-star"></i>
                                                                    </div>
                                                                    <span class="review-count">(13)</span>
                                                                </div>
                                                                <div class="d-flex flex-wrap align-items-center py-2">
                                                                    <div class="old-price">
                                                                        $100
                                                                    </div>
                                                                    <div class="new-price">
                                                                        $50
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                            <!-- -- third tab --  -->
                                            <div id="tab3" class="tab-content">
                                                <div class="row p-0 m-0">
                                                    <div class="col-md-4 col-12 p-0">
                                                        <div class="product-single-card">
                                                            <div class="product-top-area">
                                                                <div class="product-discount">
                                                                    50% OFF
                                                                </div>
                                                                <div class="product-img">
                                                                    <div class="first-view">
                                                                        <img src="{{ url('/') }}/public/assets/images/products/jewelry11.jpg"
                                                                            alt="logo" class="img-fluid"
                                                                            onerror="this.src='https://i.ibb.co/qpB9ZCZ/placeholder.png'">
                                                                    </div>
                                                                    <div class="hover-view">
                                                                        <img src="{{ url('/') }}/public/assets/images/products/jewelry11.jpg"
                                                                            alt="logo" class="img-fluid"
                                                                            onerror="this.src='https://i.ibb.co/qpB9ZCZ/placeholder.png'">
                                                                    </div>
                                                                </div>
                                                                <div class="sideicons">
                                                                    <button class="sideicons-btn">
                                                                        <i class="far fa-heart"></i>
                                                                    </button>
                                                                    <button class="sideicons-btn">
                                                                        <i class="fas fa-cart-plus"></i>
                                                                    </button>
                                                                </div>
                                                            </div>
                                                            <div class="product-info">
                                                                <h6 class="product-category">Amour Jewelry</h6>
                                                                <h6 class="product-title text-truncate"><a
                                                                        href="#">Amour 14.5mm Figaro</a></h6>
                                                                <div class="d-flex align-items-center">
                                                                    <div class="review-star me-1">
                                                                        <i class="fas fa-star"></i>
                                                                        <i class="fas fa-star"></i>
                                                                        <i class="fas fa-star"></i>
                                                                        <i class="fas fa-star-half-alt"></i>
                                                                        <i class="far fa-star"></i>
                                                                    </div>
                                                                    <span class="review-count">(13)</span>
                                                                </div>
                                                                <div class="d-flex flex-wrap align-items-center py-2">
                                                                    <div class="old-price">
                                                                        $100
                                                                    </div>
                                                                    <div class="new-price">
                                                                        $50
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-4 col-12 p-0">
                                                        <div class="product-single-card">
                                                            <div class="product-top-area">
                                                                <div class="product-discount">
                                                                    50% OFF
                                                                </div>
                                                                <div class="product-img">
                                                                    <div class="first-view">
                                                                        <img src="{{ url('/') }}/public/assets/images/products/jewelry12.jpg"
                                                                            alt="logo" class="img-fluid"
                                                                            onerror="this.src='https://i.ibb.co/qpB9ZCZ/placeholder.png'">
                                                                    </div>
                                                                    <div class="hover-view">
                                                                        <img src="{{ url('/') }}/public/assets/images/products/jewelry12.jpg"
                                                                            alt="logo" class="img-fluid"
                                                                            onerror="this.src='https://i.ibb.co/qpB9ZCZ/placeholder.png'">
                                                                    </div>
                                                                </div>
                                                                <div class="sideicons">
                                                                    <button class="sideicons-btn">
                                                                        <i class="far fa-heart"></i>
                                                                    </button>
                                                                    <button class="sideicons-btn">
                                                                        <i class="fas fa-cart-plus"></i>
                                                                    </button>
                                                                </div>
                                                            </div>
                                                            <div class="product-info">
                                                                <h6 class="product-category">Amour Jewelry</h6>
                                                                <h6 class="product-title text-truncate"><a
                                                                        href="#">Amour 14.5mm Figaro</a></h6>
                                                                <div class="d-flex align-items-center">
                                                                    <div class="review-star me-1">
                                                                        <i class="fas fa-star"></i>
                                                                        <i class="fas fa-star"></i>
                                                                        <i class="fas fa-star"></i>
                                                                        <i class="fas fa-star-half-alt"></i>
                                                                        <i class="far fa-star"></i>
                                                                    </div>
                                                                    <span class="review-count">(13)</span>
                                                                </div>
                                                                <div class="d-flex flex-wrap align-items-center py-2">
                                                                    <div class="old-price">
                                                                        $100
                                                                    </div>
                                                                    <div class="new-price">
                                                                        $50
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-4 col-12 p-0">
                                                        <div class="product-single-card">
                                                            <div class="product-top-area">
                                                                <div class="product-discount">
                                                                    50% OFF
                                                                </div>
                                                                <div class="product-img">
                                                                    <div class="first-view">
                                                                        <img src="{{ url('/') }}/public/assets/images/products/jewelry13.jpg"
                                                                            alt="logo" class="img-fluid"
                                                                            onerror="this.src='https://i.ibb.co/qpB9ZCZ/placeholder.png'">
                                                                    </div>
                                                                    <div class="hover-view">
                                                                        <img src="{{ url('/') }}/public/assets/images/products/jewelry13.jpg"
                                                                            alt="logo" class="img-fluid"
                                                                            onerror="this.src='https://i.ibb.co/qpB9ZCZ/placeholder.png'">
                                                                    </div>
                                                                </div>
                                                                <div class="sideicons">
                                                                    <button class="sideicons-btn">
                                                                        <i class="far fa-heart"></i>
                                                                    </button>
                                                                    <button class="sideicons-btn">
                                                                        <i class="fas fa-cart-plus"></i>
                                                                    </button>
                                                                </div>
                                                            </div>
                                                            <div class="product-info">
                                                                <h6 class="product-category">Amour Jewelry</h6>
                                                                <h6 class="product-title text-truncate"><a
                                                                        href="#">Amour 14.5mm Figaro</a></h6>
                                                                <div class="d-flex align-items-center">
                                                                    <div class="review-star me-1">
                                                                        <i class="fas fa-star"></i>
                                                                        <i class="fas fa-star"></i>
                                                                        <i class="fas fa-star"></i>
                                                                        <i class="fas fa-star-half-alt"></i>
                                                                        <i class="far fa-star"></i>
                                                                    </div>
                                                                    <span class="review-count">(13)</span>
                                                                </div>
                                                                <div class="d-flex flex-wrap align-items-center py-2">
                                                                    <div class="old-price">
                                                                        $100
                                                                    </div>
                                                                    <div class="new-price">
                                                                        $50
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-4 col-12 p-0">
                                                        <div class="product-single-card">
                                                            <div class="product-top-area">
                                                                <div class="product-discount">
                                                                    50% OFF
                                                                </div>
                                                                <div class="product-img">
                                                                    <div class="first-view">
                                                                        <img src="{{ url('/') }}/public/assets/images/products/jewelry14.jpg"
                                                                            alt="logo" class="img-fluid"
                                                                            onerror="this.src='https://i.ibb.co/qpB9ZCZ/placeholder.png'">
                                                                    </div>
                                                                    <div class="hover-view">
                                                                        <img src="{{ url('/') }}/public/assets/images/products/jewelry14.jpg"
                                                                            alt="logo" class="img-fluid"
                                                                            onerror="this.src='https://i.ibb.co/qpB9ZCZ/placeholder.png'">
                                                                    </div>
                                                                </div>
                                                                <div class="sideicons">
                                                                    <button class="sideicons-btn">
                                                                        <i class="far fa-heart"></i>
                                                                    </button>
                                                                    <button class="sideicons-btn">
                                                                        <i class="fas fa-cart-plus"></i>
                                                                    </button>
                                                                </div>
                                                            </div>
                                                            <div class="product-info">
                                                                <h6 class="product-category">Amour Jewelry</h6>
                                                                <h6 class="product-title text-truncate"><a
                                                                        href="#">Amour 14.5mm Figaro</a></h6>
                                                                <div class="d-flex align-items-center">
                                                                    <div class="review-star me-1">
                                                                        <i class="fas fa-star"></i>
                                                                        <i class="fas fa-star"></i>
                                                                        <i class="fas fa-star"></i>
                                                                        <i class="fas fa-star-half-alt"></i>
                                                                        <i class="far fa-star"></i>
                                                                    </div>
                                                                    <span class="review-count">(13)</span>
                                                                </div>
                                                                <div class="d-flex flex-wrap align-items-center py-2">
                                                                    <div class="old-price">
                                                                        $100
                                                                    </div>
                                                                    <div class="new-price">
                                                                        $50
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-4 col-12 p-0">
                                                        <div class="product-single-card">
                                                            <div class="product-top-area">
                                                                <div class="product-discount">
                                                                    50% OFF
                                                                </div>
                                                                <div class="product-img">
                                                                    <div class="first-view">
                                                                        <img src="{{ url('/') }}/public/assets/images/products/jewelry15.jpg"
                                                                            alt="logo" class="img-fluid"
                                                                            onerror="this.src='https://i.ibb.co/qpB9ZCZ/placeholder.png'">
                                                                    </div>
                                                                    <div class="hover-view">
                                                                        <img src="{{ url('/') }}/public/assets/images/products/jewelry15.jpg"
                                                                            alt="logo" class="img-fluid"
                                                                            onerror="this.src='https://i.ibb.co/qpB9ZCZ/placeholder.png'">
                                                                    </div>
                                                                </div>
                                                                <div class="sideicons">
                                                                    <button class="sideicons-btn">
                                                                        <i class="far fa-heart"></i>
                                                                    </button>
                                                                    <button class="sideicons-btn">
                                                                        <i class="fas fa-cart-plus"></i>
                                                                    </button>
                                                                </div>
                                                            </div>
                                                            <div class="product-info">
                                                                <h6 class="product-category">Amour Jewelry</h6>
                                                                <h6 class="product-title text-truncate"><a
                                                                        href="#">Amour 14.5mm Figaro</a></h6>
                                                                <div class="d-flex align-items-center">
                                                                    <div class="review-star me-1">
                                                                        <i class="fas fa-star"></i>
                                                                        <i class="fas fa-star"></i>
                                                                        <i class="fas fa-star"></i>
                                                                        <i class="fas fa-star-half-alt"></i>
                                                                        <i class="far fa-star"></i>
                                                                    </div>
                                                                    <span class="review-count">(13)</span>
                                                                </div>
                                                                <div class="d-flex flex-wrap align-items-center py-2">
                                                                    <div class="old-price">
                                                                        $100
                                                                    </div>
                                                                    <div class="new-price">
                                                                        $50
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-4 col-12 p-0">
                                                        <div class="product-single-card">
                                                            <div class="product-top-area">
                                                                <div class="product-discount">
                                                                    50% OFF
                                                                </div>
                                                                <div class="product-img">
                                                                    <div class="first-view">
                                                                        <img src="{{ url('/') }}/public/assets/images/products/jewelry16.jpg"
                                                                            alt="logo" class="img-fluid"
                                                                            onerror="this.src='https://i.ibb.co/qpB9ZCZ/placeholder.png'">
                                                                    </div>
                                                                    <div class="hover-view">
                                                                        <img src="{{ url('/') }}/public/assets/images/products/jewelry16.jpg"
                                                                            alt="logo" class="img-fluid"
                                                                            onerror="this.src='https://i.ibb.co/qpB9ZCZ/placeholder.png'">
                                                                    </div>
                                                                </div>
                                                                <div class="sideicons">
                                                                    <button class="sideicons-btn">
                                                                        <i class="far fa-heart"></i>
                                                                    </button>
                                                                    <button class="sideicons-btn">
                                                                        <i class="fas fa-cart-plus"></i>
                                                                    </button>
                                                                </div>
                                                            </div>
                                                            <div class="product-info">
                                                                <h6 class="product-category">Amour Jewelry</h6>
                                                                <h6 class="product-title text-truncate"><a
                                                                        href="#">Amour 14.5mm Figaro</a></h6>
                                                                <div class="d-flex align-items-center">
                                                                    <div class="review-star me-1">
                                                                        <i class="fas fa-star"></i>
                                                                        <i class="fas fa-star"></i>
                                                                        <i class="fas fa-star"></i>
                                                                        <i class="fas fa-star-half-alt"></i>
                                                                        <i class="far fa-star"></i>
                                                                    </div>
                                                                    <span class="review-count">(13)</span>
                                                                </div>
                                                                <div class="d-flex flex-wrap align-items-center py-2">
                                                                    <div class="old-price">
                                                                        $100
                                                                    </div>
                                                                    <div class="new-price">
                                                                        $50
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
                            </div>

                        </div>
                        <div id="sideTab-content2" style="display: none;">No Data Found 2</div>
                        <div id="sideTab-content3" style="display: none;">No Data Found 3</div>
                    </div>
                </div>
            </div>
        </div>
    </div> --}}

    <!-- -- end sopping product --  -->

    {{-- -- video modal --  --}}
    <!-- Modal -->
    <div class="modal fade video-modal" id="videoModal1" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-lg">
            <div class="modal-content">
                <div class="modal-body">
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">✕</button>
                    <div class="video-play">
                        <video class="background" controls>
                            <source src="https://amplepoints.com/amplepoints_videos/big_idea.mp4" type="video/mp4">
                        </video>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Modal 2 -->
    <div class="modal fade video-modal" id="videoModal2" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-lg">
            <div class="modal-content">
                <div class="modal-body">
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">✕</button>
                    <div class="video-play">
                        <video class="background" controls>
                            <source src="https://amplepoints.com/amplepoints_videos/how_to_signup.mp4" type="video/mp4">
                        </video>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Modal 3 -->
    <div class="modal fade video-modal" id="videoModal3" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-lg">
            <div class="modal-content">
                <div class="modal-body">
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">✕</button>
                    <div class="video-play">
                        <video class="background" controls>
                            <source src="https://amplepoints.com/amplepoints_videos/how_to_shop_with_amplepoints.mp4"
                                type="video/mp4">
                        </video>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Modal 4 -->
    <div class="modal fade video-modal" id="videoModal4" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-lg">
            <div class="modal-content">
                <div class="modal-body">
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">✕</button>
                    <div class="video-play">
                        <video class="background" controls>
                            <source
                                src="https://amplepoints.com/amplepoints_videos/how_to_watch_ads_and_earn_amplepoints.mp4"
                                type="video/mp4">
                        </video>
                    </div>
                </div>
            </div>
        </div>
    </div>


    @include('includes.footer')
    @include('includes.script')
@endsection
