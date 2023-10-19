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

    {{-- -- start three box --  --}}
    <div class="box-3 mt-1">
      <div class="row p-0 m-0">
        <div class="col-lg-4 col-md-12 m-0 p-0">
          <div class="store-brand">
            <div class="cont-a">
              <h2><span>STORES &amp; BRANDS</span></h2>
              <p>Create Your own store to maximize sales </p>
            </div>
          </div>
        </div>
        <div class="col-lg-4 col-md-12 m-0 p-0">
          <div class="channel-network">
            <div class="cont-b">
              <h2><img src="{{ url('/') }}/public/assets/images/box-3/tv_channels_logo.png"
                alt="ampletheater.net"></h2>
              <p>A rewards based video on-demand streaming service</p>
            </div>
          </div>
        </div>
        <div class="col-lg-4 col-md-12 m-0 p-0">
          <div class="mall">
            <div class="cont-c">
              <h2><span> MALL </span></h2>
              <p>FIND YOUR FAVORITE SHOPS AT OUR ONLINE MALL</p>
            </div>
          </div>
        </div>
      </div>
    </div>
    {{-- -- end three box --  --}}


    {{-- -- start price --  --}}
    <div class="price-sec">
      <div class="how-it">
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
                        <img src="{{ url('/') }}/public/assets/images/price/how-1.png"
                          alt="">
                      </div>
                    </div>
                    <div class="price-box">
                      <h4 class="price">JOIN FOR FREE</h4>
                    </div>
                    <div class="features">
                      <p>Sign Up For A Free AmplePoints
                        Membership and Receive
                        42 Free Ample Points
                        (Cash-Value: $5.00)
                      </p>
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
                        <img src="{{ url('/') }}/public/assets/images/price/how-2.png"
                          alt="">
                      </div>
                    </div>
                    <div class="price-box">
                      <h4 class="price">EARN FOR FREE</h4>
                    </div>
                    <div class="features">
                      <p>Earn Ample Points For
                        Shopping, Sharing Links and
                        Watching Personalized Ads
                      </p>
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
                        <img src="{{ url('/') }}/public/assets/images/price/how-3.png"
                          alt="">
                      </div>
                    </div>
                    <div class="price-box">
                      <h4 class="price">REDEEM AMPLES</h4>
                    </div>
                    <div class="features">
                      <p>Redeem Your Ample Points
                        To Receive Free Products, Services,
                        and Discounts!
                      </p>
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
                <img src="https://amplepoints.com/amplepoints_videos/big_idea.png" alt=""
                  class="img-fluid">
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
    </div>
    {{-- -- end price --  --}}


    {{-- -- start two box images --  --}}
    <div class="two-imgs-box">
      <div class="container">
        <div class="row">
          <div class="col-md-6 col-12 my-2">
            <div class="banner-border-zoom">
              <a href="#">
              <img alt="ads" src="{{ url('/') }}/public/assets/images/box-img/banner1.jpg"
                class="img-fluid">
              </a>
            </div>
          </div>
          <div class="col-md-6 col-12 my-2">
            <div class="banner-border-zoom">
              <a href="#">
              <img alt="ads" src="{{ url('/') }}/public/assets/images/box-img/banner2.jpg"
                class="img-fluid">
              </a>
            </div>
          </div>
        </div>
      </div>
    </div>
    {{-- -- end two box images --  --}}


    <!-- -- start sopping product --  -->
    <div class="sec-padding">
      <div class="shopping-products">
        <div class="container">
          <div class="row">
            <div class="col-md-2 col-12 m-0 p-0 card-side-menu">
              <div class="sidebar-header">
                <div class="fashion"> JEWELRY<span>></span></div>
                <nav class="navbar navbar-expand-lg navbar-light bg-light">
                  <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#sidebarTabMenu" aria-controls="sidebarTabMenu" aria-expanded="false" aria-label="Toggle navigation">
                  <span class="navbar-toggler-icon"></span>
                  </button>
                </nav>
              </div>
              <div class="collapse navbar-collapse py-2" id="sidebarTabMenu">
                <button class="sideTab-button active" id="sideTab1">AMOUR</button>
                <button class="sideTab-button" id="sideTab2">RADO WATCH</button>
                <button class="sideTab-button" id="sideTab3">KORS</button>
              </div>
            </div>
            <div class="col-md-10 col-12 p-0 m-0">
              <div class="tab-container ps-2">
                <button class="tab-button tab-active" data-top-item="new">New Arrivals</button>
                <button class="tab-button" data-top-item="on-sale">On Sale</button>
                <button class="tab-button" data-top-item="trending">Trending</button>
              </div>

              <div id="sideTab-content1" class="side-tab-content">
                <div class="main-tab p-0">
                  <div class="row p-0 m-0">
                    <div class="col-md-4 col-12 p-0 mob">
                      <div class="product-single-img">
                        <img src="{{ url('/') }}/public/assets/images/products/amplifyon_home_jewelry.jpg"
                          alt="" class="img-fluid">
                      </div>
                    </div>
                    <div class="col-md-8 col-12 p-0">
                      <div class="product-imgs">
                        <!-- -- first tab --  -->
                        <div id="tab1" class="tab-content" style="display:block">
                          <div class="row p-0 m-0">
                            <div class="col-md-4 col-12 p-0 item-each item-new">
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
                            <div class="col-md-4 col-12 p-0 item-each item-on-sale">
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
                            <div class="col-md-4 col-12 p-0 item-each item-new">
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
                            <div class="col-md-4 col-12 p-0 item-each item-new">
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
                            <div class="col-md-4 col-12 p-0 item-each item-on-sale">
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
                            <div class="col-md-4 col-12 p-0 item-each item-on-sale">
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
              
              <div id="sideTab-content2" class="side-tab-content" style="display: none;">
                <div class="main-tab p-0">
                  <div class="row p-0 m-0">
                    <div class="col-md-4 col-12 p-0 mob">
                      <div class="product-single-img">
                        <img src="{{ url('/') }}/public/assets/images/products/watch.jpg"
                          alt="" class="img-fluid">
                      </div>
                    </div>
                    <div class="col-md-8 col-12 p-0">
                      <div class="product-imgs">
                        <!-- -- first tab --  -->
                        <div id="tab4" class="tab-content" style="display:block">
                          <div class="row p-0 m-0">
                            <div class="col-md-4 col-12 p-0">
                              <div class="product-single-card">
                                <div class="product-top-area">
                                  <div class="product-discount">
                                    50% OFF
                                  </div>
                                  <div class="product-img">
                                    <div class="first-view">
                                      <img src="{{ url('/') }}/public/assets/images/products/watch18.jpg"
                                        alt="logo" class="img-fluid"
                                        onerror="this.src='https://i.ibb.co/qpB9ZCZ/placeholder.png'">
                                    </div>
                                    <div class="hover-view">
                                      <img src="{{ url('/') }}/public/assets/images/products/watch18.jpg"
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
                                  <h6 class="product-category">Rado Watch</h6>
                                  <h6 class="product-title text-truncate"><a
                                    href="#">Watch 14.5mm Figaro</a></h6>
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
                                      <img src="{{ url('/') }}/public/assets/images/products/watch1.jpg"
                                        alt="logo" class="img-fluid"
                                        onerror="this.src='https://i.ibb.co/qpB9ZCZ/placeholder.png'">
                                    </div>
                                    <div class="hover-view">
                                      <img src="{{ url('/') }}/public/assets/images/products/watch1.jpg"
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
                                  <h6 class="product-category">Rado Watch</h6>
                                  <h6 class="product-title text-truncate"><a
                                    href="#">Watch 14.5mm Figaro</a></h6>
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
                                      <img src="{{ url('/') }}/public/assets/images/products/watch2.jpg"
                                        alt="logo" class="img-fluid"
                                        onerror="this.src='https://i.ibb.co/qpB9ZCZ/placeholder.png'">
                                    </div>
                                    <div class="hover-view">
                                      <img src="{{ url('/') }}/public/assets/images/products/watch2.jpg"
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
                                  <h6 class="product-category">Rado Watch</h6>
                                  <h6 class="product-title text-truncate"><a
                                    href="#">Watch 14.5mm Figaro</a></h6>
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
                                      <img src="{{ url('/') }}/public/assets/images/products/watch3.jpg"
                                        alt="logo" class="img-fluid"
                                        onerror="this.src='https://i.ibb.co/qpB9ZCZ/placeholder.png'">
                                    </div>
                                    <div class="hover-view">
                                      <img src="{{ url('/') }}/public/assets/images/products/watch3.jpg"
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
                                  <h6 class="product-category">Rado Watch</h6>
                                  <h6 class="product-title text-truncate"><a
                                    href="#">Watch 14.5mm Figaro</a></h6>
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
                                      <img src="{{ url('/') }}/public/assets/images/products/watch4.jpg"
                                        alt="logo" class="img-fluid"
                                        onerror="this.src='https://i.ibb.co/qpB9ZCZ/placeholder.png'">
                                    </div>
                                    <div class="hover-view">
                                      <img src="{{ url('/') }}/public/assets/images/products/watch4.jpg"
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
                                  <h6 class="product-category">Rado Watch</h6>
                                  <h6 class="product-title text-truncate"><a
                                    href="#">Watch 14.5mm Figaro</a></h6>
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
                                      <img src="{{ url('/') }}/public/assets/images/products/watch5.jpg"
                                        alt="logo" class="img-fluid"
                                        onerror="this.src='https://i.ibb.co/qpB9ZCZ/placeholder.png'">
                                    </div>
                                    <div class="hover-view">
                                      <img src="{{ url('/') }}/public/assets/images/products/watch5.jpg"
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
                                  <h6 class="product-category">Rado Watch</h6>
                                  <h6 class="product-title text-truncate"><a
                                    href="#">Watch 14.5mm Figaro</a></h6>
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
                        <div id="tab5" class="tab-content">
                          <div class="row p-0 m-0">
                            <div class="col-md-4 col-12 p-0">
                              <div class="product-single-card">
                                <div class="product-top-area">
                                  <div class="product-discount">
                                    50% OFF
                                  </div>
                                  <div class="product-img">
                                    <div class="first-view">
                                      <img src="{{ url('/') }}/public/assets/images/products/watch6.jpg"
                                        alt="logo" class="img-fluid"
                                        onerror="this.src='https://i.ibb.co/qpB9ZCZ/placeholder.png'">
                                    </div>
                                    <div class="hover-view">
                                      <img src="{{ url('/') }}/public/assets/images/products/watch6.jpg"
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
                                  <h6 class="product-category">Rado Watch</h6>
                                  <h6 class="product-title text-truncate"><a
                                    href="#">Watch 14.5mm Figaro</a></h6>
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
                                      <img src="{{ url('/') }}/public/assets/images/products/watch7.jpg"
                                        alt="logo" class="img-fluid"
                                        onerror="this.src='https://i.ibb.co/qpB9ZCZ/placeholder.png'">
                                    </div>
                                    <div class="hover-view">
                                      <img src="{{ url('/') }}/public/assets/images/products/watch7.jpg"
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
                                  <h6 class="product-category">Rado Watch</h6>
                                  <h6 class="product-title text-truncate"><a
                                    href="#">Watch 14.5mm Figaro</a></h6>
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
                                      <img src="{{ url('/') }}/public/assets/images/products/watch8.jpg"
                                        alt="logo" class="img-fluid"
                                        onerror="this.src='https://i.ibb.co/qpB9ZCZ/placeholder.png'">
                                    </div>
                                    <div class="hover-view">
                                      <img src="{{ url('/') }}/public/assets/images/products/watch8.jpg"
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
                                  <h6 class="product-category">Rado Watch</h6>
                                  <h6 class="product-title text-truncate"><a
                                    href="#">Watch 14.5mm Figaro</a></h6>
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
                                      <img src="{{ url('/') }}/public/assets/images/products/watch8.jpg"
                                        alt="logo" class="img-fluid"
                                        onerror="this.src='https://i.ibb.co/qpB9ZCZ/placeholder.png'">
                                    </div>
                                    <div class="hover-view">
                                      <img src="{{ url('/') }}/public/assets/images/products/watch8.jpg"
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
                                  <h6 class="product-category">Rado Watch</h6>
                                  <h6 class="product-title text-truncate"><a
                                    href="#">Watch 14.5mm Figaro</a></h6>
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
                                      <img src="{{ url('/') }}/public/assets/images/products/watch9.jpg"
                                        alt="logo" class="img-fluid"
                                        onerror="this.src='https://i.ibb.co/qpB9ZCZ/placeholder.png'">
                                    </div>
                                    <div class="hover-view">
                                      <img src="{{ url('/') }}/public/assets/images/products/watch9.jpg"
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
                                  <h6 class="product-category">Rado Watch</h6>
                                  <h6 class="product-title text-truncate"><a
                                    href="#">Watch 14.5mm Figaro</a></h6>
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
                                      <img src="{{ url('/') }}/public/assets/images/products/watch10.jpg"
                                        alt="logo" class="img-fluid"
                                        onerror="this.src='https://i.ibb.co/qpB9ZCZ/placeholder.png'">
                                    </div>
                                    <div class="hover-view">
                                      <img src="{{ url('/') }}/public/assets/images/products/watch10.jpg"
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
                                  <h6 class="product-category">Rado Watch</h6>
                                  <h6 class="product-title text-truncate"><a
                                    href="#">Watch 14.5mm Figaro</a></h6>
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
                        <div id="tab6" class="tab-content">
                          <div class="row p-0 m-0">
                            <div class="col-md-4 col-12 p-0">
                              <div class="product-single-card">
                                <div class="product-top-area">
                                  <div class="product-discount">
                                    50% OFF
                                  </div>
                                  <div class="product-img">
                                    <div class="first-view">
                                      <img src="{{ url('/') }}/public/assets/images/products/watch11.jpg"
                                        alt="logo" class="img-fluid"
                                        onerror="this.src='https://i.ibb.co/qpB9ZCZ/placeholder.png'">
                                    </div>
                                    <div class="hover-view">
                                      <img src="{{ url('/') }}/public/assets/images/products/watch11.jpg"
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
                                  <h6 class="product-category">Rado Watch</h6>
                                  <h6 class="product-title text-truncate"><a
                                    href="#">Watch 14.5mm Figaro</a></h6>
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
                                      <img src="{{ url('/') }}/public/assets/images/products/watch12.jpg"
                                        alt="logo" class="img-fluid"
                                        onerror="this.src='https://i.ibb.co/qpB9ZCZ/placeholder.png'">
                                    </div>
                                    <div class="hover-view">
                                      <img src="{{ url('/') }}/public/assets/images/products/watch12.jpg"
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
                                  <h6 class="product-category">Rado Watch</h6>
                                  <h6 class="product-title text-truncate"><a
                                    href="#">Watch 14.5mm Figaro</a></h6>
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
                                      <img src="{{ url('/') }}/public/assets/images/products/watch13.jpg"
                                        alt="logo" class="img-fluid"
                                        onerror="this.src='https://i.ibb.co/qpB9ZCZ/placeholder.png'">
                                    </div>
                                    <div class="hover-view">
                                      <img src="{{ url('/') }}/public/assets/images/products/watch13.jpg"
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
                                  <h6 class="product-category">Rado Watch</h6>
                                  <h6 class="product-title text-truncate"><a
                                    href="#">Watch 14.5mm Figaro</a></h6>
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
                                      <img src="{{ url('/') }}/public/assets/images/products/watch14.jpg"
                                        alt="logo" class="img-fluid"
                                        onerror="this.src='https://i.ibb.co/qpB9ZCZ/placeholder.png'">
                                    </div>
                                    <div class="hover-view">
                                      <img src="{{ url('/') }}/public/assets/images/products/watch14.jpg"
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
                                  <h6 class="product-category">Rado Watch</h6>
                                  <h6 class="product-title text-truncate"><a
                                    href="#">Watch 14.5mm Figaro</a></h6>
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
                                      <img src="{{ url('/') }}/public/assets/images/products/watch15.jpg"
                                        alt="logo" class="img-fluid"
                                        onerror="this.src='https://i.ibb.co/qpB9ZCZ/placeholder.png'">
                                    </div>
                                    <div class="hover-view">
                                      <img src="{{ url('/') }}/public/assets/images/products/watch15.jpg"
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
                                  <h6 class="product-category">Rado Watch</h6>
                                  <h6 class="product-title text-truncate"><a
                                    href="#">Watch 14.5mm Figaro</a></h6>
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
                                      <img src="{{ url('/') }}/public/assets/images/products/watch16.jpg"
                                        alt="logo" class="img-fluid"
                                        onerror="this.src='https://i.ibb.co/qpB9ZCZ/placeholder.png'">
                                    </div>
                                    <div class="hover-view">
                                      <img src="{{ url('/') }}/public/assets/images/products/watch16.jpg"
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
                                  <h6 class="product-category">Rado Watch</h6>
                                  <h6 class="product-title text-truncate"><a
                                    href="#">Watch 14.5mm Figaro</a></h6>
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

              <div id="sideTab-content3" class="side-tab-content" style="display: none;">
                <div class="main-tab p-0">
                  <div class="row p-0 m-0">
                    <div class="col-md-4 col-12 p-0 mob">
                      <div class="product-single-img">
                        <img src="{{ url('/') }}/public/assets/images/products/kors.jpg"
                          alt="" class="img-fluid">
                      </div>
                    </div>
                    <div class="col-md-8 col-12 p-0">
                      <div class="product-imgs">
                        <!-- -- first tab --  -->
                        <div id="tab7" class="tab-content" style="display:block">
                          <div class="row p-0 m-0">
                            <div class="col-md-4 col-12 p-0">
                              <div class="product-single-card">
                                <div class="product-top-area">
                                  <div class="product-discount">
                                    50% OFF
                                  </div>
                                  <div class="product-img">
                                    <div class="first-view">
                                      <img src="{{ url('/') }}/public/assets/images/products/kors18.jpg"
                                        alt="logo" class="img-fluid"
                                        onerror="this.src='https://i.ibb.co/qpB9ZCZ/placeholder.png'">
                                    </div>
                                    <div class="hover-view">
                                      <img src="{{ url('/') }}/public/assets/images/products/kors18.jpg"
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
                                  <h6 class="product-category">KORS</h6>
                                  <h6 class="product-title text-truncate"><a
                                    href="#">Kors 14.5mm Figaro</a></h6>
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
                                      <img src="{{ url('/') }}/public/assets/images/products/kors1.jpg"
                                        alt="logo" class="img-fluid"
                                        onerror="this.src='https://i.ibb.co/qpB9ZCZ/placeholder.png'">
                                    </div>
                                    <div class="hover-view">
                                      <img src="{{ url('/') }}/public/assets/images/products/kors1.jpg"
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
                                  <h6 class="product-category">KORS</h6>
                                  <h6 class="product-title text-truncate"><a
                                    href="#">Kors 14.5mm Figaro</a></h6>
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
                                      <img src="{{ url('/') }}/public/assets/images/products/kors2.jpg"
                                        alt="logo" class="img-fluid"
                                        onerror="this.src='https://i.ibb.co/qpB9ZCZ/placeholder.png'">
                                    </div>
                                    <div class="hover-view">
                                      <img src="{{ url('/') }}/public/assets/images/products/kors2.jpg"
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
                                  <h6 class="product-category">KORS</h6>
                                  <h6 class="product-title text-truncate"><a
                                    href="#">Kors 14.5mm Figaro</a></h6>
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
                                      <img src="{{ url('/') }}/public/assets/images/products/kors3.jpg"
                                        alt="logo" class="img-fluid"
                                        onerror="this.src='https://i.ibb.co/qpB9ZCZ/placeholder.png'">
                                    </div>
                                    <div class="hover-view">
                                      <img src="{{ url('/') }}/public/assets/images/products/kors3.jpg"
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
                                  <h6 class="product-category">KORS</h6>
                                  <h6 class="product-title text-truncate"><a
                                    href="#">Kors 14.5mm Figaro</a></h6>
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
                                      <img src="{{ url('/') }}/public/assets/images/products/kors4.jpg"
                                        alt="logo" class="img-fluid"
                                        onerror="this.src='https://i.ibb.co/qpB9ZCZ/placeholder.png'">
                                    </div>
                                    <div class="hover-view">
                                      <img src="{{ url('/') }}/public/assets/images/products/kors4.jpg"
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
                                  <h6 class="product-category">KORS</h6>
                                  <h6 class="product-title text-truncate"><a
                                    href="#">Kors 14.5mm Figaro</a></h6>
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
                                      <img src="{{ url('/') }}/public/assets/images/products/kors5.jpg"
                                        alt="logo" class="img-fluid"
                                        onerror="this.src='https://i.ibb.co/qpB9ZCZ/placeholder.png'">
                                    </div>
                                    <div class="hover-view">
                                      <img src="{{ url('/') }}/public/assets/images/products/kors5.jpg"
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
                                  <h6 class="product-category">KORS</h6>
                                  <h6 class="product-title text-truncate"><a
                                    href="#">Kors 14.5mm Figaro</a></h6>
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
                        <div id="tab8" class="tab-content">
                          <div class="row p-0 m-0">
                            <div class="col-md-4 col-12 p-0">
                              <div class="product-single-card">
                                <div class="product-top-area">
                                  <div class="product-discount">
                                    50% OFF
                                  </div>
                                  <div class="product-img">
                                    <div class="first-view">
                                      <img src="{{ url('/') }}/public/assets/images/products/kors6.jpg"
                                        alt="logo" class="img-fluid"
                                        onerror="this.src='https://i.ibb.co/qpB9ZCZ/placeholder.png'">
                                    </div>
                                    <div class="hover-view">
                                      <img src="{{ url('/') }}/public/assets/images/products/kors6.jpg"
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
                                  <h6 class="product-category">KORS</h6>
                                  <h6 class="product-title text-truncate"><a
                                    href="#">Kors 14.5mm Figaro</a></h6>
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
                                      <img src="{{ url('/') }}/public/assets/images/products/kors7.jpg"
                                        alt="logo" class="img-fluid"
                                        onerror="this.src='https://i.ibb.co/qpB9ZCZ/placeholder.png'">
                                    </div>
                                    <div class="hover-view">
                                      <img src="{{ url('/') }}/public/assets/images/products/kors7.jpg"
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
                                  <h6 class="product-category">KORS</h6>
                                  <h6 class="product-title text-truncate"><a
                                    href="#">Kors 14.5mm Figaro</a></h6>
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
                                      <img src="{{ url('/') }}/public/assets/images/products/kors8.jpg"
                                        alt="logo" class="img-fluid"
                                        onerror="this.src='https://i.ibb.co/qpB9ZCZ/placeholder.png'">
                                    </div>
                                    <div class="hover-view">
                                      <img src="{{ url('/') }}/public/assets/images/products/kors8.jpg"
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
                                  <h6 class="product-category">KORS</h6>
                                  <h6 class="product-title text-truncate"><a
                                    href="#">Kors 14.5mm Figaro</a></h6>
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
                                      <img src="{{ url('/') }}/public/assets/images/products/kors8.jpg"
                                        alt="logo" class="img-fluid"
                                        onerror="this.src='https://i.ibb.co/qpB9ZCZ/placeholder.png'">
                                    </div>
                                    <div class="hover-view">
                                      <img src="{{ url('/') }}/public/assets/images/products/kors8.jpg"
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
                                  <h6 class="product-category">KORS</h6>
                                  <h6 class="product-title text-truncate"><a
                                    href="#">Kors 14.5mm Figaro</a></h6>
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
                                      <img src="{{ url('/') }}/public/assets/images/products/kors9.jpg"
                                        alt="logo" class="img-fluid"
                                        onerror="this.src='https://i.ibb.co/qpB9ZCZ/placeholder.png'">
                                    </div>
                                    <div class="hover-view">
                                      <img src="{{ url('/') }}/public/assets/images/products/kors9.jpg"
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
                                  <h6 class="product-category">KORS</h6>
                                  <h6 class="product-title text-truncate"><a
                                    href="#">Kors 14.5mm Figaro</a></h6>
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
                                      <img src="{{ url('/') }}/public/assets/images/products/kors10.jpg"
                                        alt="logo" class="img-fluid"
                                        onerror="this.src='https://i.ibb.co/qpB9ZCZ/placeholder.png'">
                                    </div>
                                    <div class="hover-view">
                                      <img src="{{ url('/') }}/public/assets/images/products/kors10.jpg"
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
                                  <h6 class="product-category">KORS</h6>
                                  <h6 class="product-title text-truncate"><a
                                    href="#">Kors 14.5mm Figaro</a></h6>
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
                        <div id="tab9" class="tab-content">
                          <div class="row p-0 m-0">
                            <div class="col-md-4 col-12 p-0">
                              <div class="product-single-card">
                                <div class="product-top-area">
                                  <div class="product-discount">
                                    50% OFF
                                  </div>
                                  <div class="product-img">
                                    <div class="first-view">
                                      <img src="{{ url('/') }}/public/assets/images/products/kors11.jpg"
                                        alt="logo" class="img-fluid"
                                        onerror="this.src='https://i.ibb.co/qpB9ZCZ/placeholder.png'">
                                    </div>
                                    <div class="hover-view">
                                      <img src="{{ url('/') }}/public/assets/images/products/kors11.jpg"
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
                                  <h6 class="product-category">KORS</h6>
                                  <h6 class="product-title text-truncate"><a
                                    href="#">Kors 14.5mm Figaro</a></h6>
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
                                      <img src="{{ url('/') }}/public/assets/images/products/kors12.jpg"
                                        alt="logo" class="img-fluid"
                                        onerror="this.src='https://i.ibb.co/qpB9ZCZ/placeholder.png'">
                                    </div>
                                    <div class="hover-view">
                                      <img src="{{ url('/') }}/public/assets/images/products/kors12.jpg"
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
                                  <h6 class="product-category">KORS</h6>
                                  <h6 class="product-title text-truncate"><a
                                    href="#">Kors 14.5mm Figaro</a></h6>
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
                                      <img src="{{ url('/') }}/public/assets/images/products/kors13.jpg"
                                        alt="logo" class="img-fluid"
                                        onerror="this.src='https://i.ibb.co/qpB9ZCZ/placeholder.png'">
                                    </div>
                                    <div class="hover-view">
                                      <img src="{{ url('/') }}/public/assets/images/products/kors13.jpg"
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
                                  <h6 class="product-category">KORS</h6>
                                  <h6 class="product-title text-truncate"><a
                                    href="#">Kors 14.5mm Figaro</a></h6>
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
                                      <img src="{{ url('/') }}/public/assets/images/products/kors14.jpg"
                                        alt="logo" class="img-fluid"
                                        onerror="this.src='https://i.ibb.co/qpB9ZCZ/placeholder.png'">
                                    </div>
                                    <div class="hover-view">
                                      <img src="{{ url('/') }}/public/assets/images/products/kors14.jpg"
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
                                  <h6 class="product-category">KORS</h6>
                                  <h6 class="product-title text-truncate"><a
                                    href="#">Kors 14.5mm Figaro</a></h6>
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
                                      <img src="{{ url('/') }}/public/assets/images/products/kors15.jpg"
                                        alt="logo" class="img-fluid"
                                        onerror="this.src='https://i.ibb.co/qpB9ZCZ/placeholder.png'">
                                    </div>
                                    <div class="hover-view">
                                      <img src="{{ url('/') }}/public/assets/images/products/kors15.jpg"
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
                                  <h6 class="product-category">KORS</h6>
                                  <h6 class="product-title text-truncate"><a
                                    href="#">Kors 14.5mm Figaro</a></h6>
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
                                      <img src="{{ url('/') }}/public/assets/images/products/kors16.jpg"
                                        alt="logo" class="img-fluid"
                                        onerror="this.src='https://i.ibb.co/qpB9ZCZ/placeholder.png'">
                                    </div>
                                    <div class="hover-view">
                                      <img src="{{ url('/') }}/public/assets/images/products/kors16.jpg"
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
                                  <h6 class="product-category">KORS</h6>
                                  <h6 class="product-title text-truncate"><a
                                    href="#">Kors 14.5mm Figaro</a></h6>
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
            </div>
          </div>
        </div>
      </div>
    </div>
    <!-- -- end sopping product --  -->


    {{-- -- start home text sec --  --}}
    <div class="sec-padding home-text-sec">
      <div class="container">
        <h4>Online shopping made easy with Ample Points</h4>
        <p>Today with online shopping, everything you need is right at your fingertips. On Ample Points you can shop the
          hottest brands, book hotels, find local deals, restaurants, properties and so much more. We reward our
          members for shopping, sharing and watching your favorite ads. Use your points at checkout towards free
          products and every time you shop you earn extra benefits. With Ample Points you can always rest assured
          about the quality of the products you are buying online at our website. Together with our trusted partners
          we promise to deliver only original and brand-new products.
        </p>
        <p>Ample Points makes online shopping as hassle-free as possible. Enjoy easy and quality shopping at Ample
          Points with product assurance, return policy and reliable delivery system.
        </p>
        <h4>Sell on Ample Points</h4>
        <p>Set up your store on amplepoints.com, showcase and sell your products online across the USA and the world by
          using our easy listing tools or through our professional Service Partners. Ample Points will help you
          market, advertise and highlight your products to targeted customers.
        </p>
        <h4>Payment</h4>
        <p>Ample Points makes payment easy. You have easy payment options including MasterCard, Visa, Discover, American
          Express, PayPal or checkout with your Ample Points.
        </p>
        <p>Happy Shopping!!</p>
        <h4>Contact Us</h4>
        <p>Phone: <a href="#">+1(702) 466-8571</a></p>
      </div>
    </div>
    {{-- -- end home text sec --  --}}


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
