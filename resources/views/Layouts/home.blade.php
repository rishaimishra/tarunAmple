@extends('Layouts.app')
@section('title')
<title>Amplepoint</title>
@endsection

@include('includes.head')
@include('includes.header')


@section('content')
<div class="hero-sec">
  <video class="background" autoplay muted loop>
    <source src="https://amplepoints.com/home_banners/aboutamplepoints.mp4" type="video/mp4">
  </video>
</div>

<!-- -- start carousel sopping product --  -->


   <div class="sec-padding">
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
                      <button class="tab-button tab-active" onclick="openTab('tab1')">New Arrivals</button>
                      <button class="tab-button" onclick="openTab('tab2')">On Sale</button>
                      <button class="tab-button" onclick="openTab('tab3')">Trending</button>
                    </div>
                  </div>
                </div>
                <div class="row p-0 m-0">
                  <div class="col-md-4 col-12 p-0">
                    <div class="product-single-img">
                      <img src="{{url('/')}}/public/assets/images/products/amplifyon_home_jewelry.jpg" alt="" class="img-fluid">
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
                                    <img src="{{url('/')}}/public/assets/images/products/locket.jpg" alt="logo" class="img-fluid"
                                      onerror="this.src='https://i.ibb.co/qpB9ZCZ/placeholder.png'">
                                  </div>
                                  <div class="hover-view">
                                    <img src="{{url('/')}}/public/assets/images/products/locket.jpg" alt="logo" class="img-fluid"
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
                                <h6 class="product-title text-truncate"><a href="#">Amour 14.5mm Figaro</a></h6>
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
                                    <img src="{{url('/')}}/public/assets/images/products/jewelry1.jpg" alt="logo" class="img-fluid"
                                      onerror="this.src='https://i.ibb.co/qpB9ZCZ/placeholder.png'">
                                  </div>
                                  <div class="hover-view">
                                    <img src="{{url('/')}}/public/assets/images/products/jewelry1.jpg" alt="logo" class="img-fluid"
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
                                <h6 class="product-title text-truncate"><a href="#">Amour 14.5mm Figaro</a></h6>
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
                                    <img src="{{url('/')}}/public/assets/images/products/jewelry2.jpg" alt="logo" class="img-fluid"
                                      onerror="this.src='https://i.ibb.co/qpB9ZCZ/placeholder.png'">
                                  </div>
                                  <div class="hover-view">
                                    <img src="{{url('/')}}/public/assets/images/products/jewelry2.jpg" alt="logo" class="img-fluid"
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
                                <h6 class="product-title text-truncate"><a href="#">Amour 14.5mm Figaro</a></h6>
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
                                    <img src="{{url('/')}}/public/assets/images/products/jewelry3.jpg" alt="logo" class="img-fluid"
                                      onerror="this.src='https://i.ibb.co/qpB9ZCZ/placeholder.png'">
                                  </div>
                                  <div class="hover-view">
                                    <img src="{{url('/')}}/public/assets/images/products/jewelry3.jpg" alt="logo" class="img-fluid"
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
                                <h6 class="product-title text-truncate"><a href="#">Amour 14.5mm Figaro</a></h6>
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
                                    <img src="{{url('/')}}/public/assets/images/products/jewelry4.jpg" alt="logo" class="img-fluid"
                                      onerror="this.src='https://i.ibb.co/qpB9ZCZ/placeholder.png'">
                                  </div>
                                  <div class="hover-view">
                                    <img src="{{url('/')}}/public/assets/images/products/jewelry4.jpg" alt="logo" class="img-fluid"
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
                                <h6 class="product-title text-truncate"><a href="#">Amour 14.5mm Figaro</a></h6>
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
                                    <img src="{{url('/')}}/public/assets/images/products/jewelry5.jpg" alt="logo" class="img-fluid"
                                      onerror="this.src='https://i.ibb.co/qpB9ZCZ/placeholder.png'">
                                  </div>
                                  <div class="hover-view">
                                    <img src="{{url('/')}}/public/assets/images/products/jewelry5.jpg" alt="logo" class="img-fluid"
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
                                <h6 class="product-title text-truncate"><a href="#">Amour 14.5mm Figaro</a></h6>
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
                                    <img src="{{url('/')}}/public/assets/images/products/jewelry6.jpg" alt="logo" class="img-fluid"
                                      onerror="this.src='https://i.ibb.co/qpB9ZCZ/placeholder.png'">
                                  </div>
                                  <div class="hover-view">
                                    <img src="{{url('/')}}/public/assets/images/products/jewelry6.jpg" alt="logo" class="img-fluid"
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
                                <h6 class="product-title text-truncate"><a href="#">Amour 14.5mm Figaro</a></h6>
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
                                    <img src="{{url('/')}}/public/assets/images/products/jewelry7.jpg" alt="logo" class="img-fluid"
                                      onerror="this.src='https://i.ibb.co/qpB9ZCZ/placeholder.png'">
                                  </div>
                                  <div class="hover-view">
                                    <img src="{{url('/')}}/public/assets/images/products/jewelry7.jpg" alt="logo" class="img-fluid"
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
                                <h6 class="product-title text-truncate"><a href="#">Amour 14.5mm Figaro</a></h6>
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
                                    <img src="{{url('/')}}/public/assets/images/products/jewelry8.jpg" alt="logo" class="img-fluid"
                                      onerror="this.src='https://i.ibb.co/qpB9ZCZ/placeholder.png'">
                                  </div>
                                  <div class="hover-view">
                                    <img src="{{url('/')}}/public/assets/images/products/jewelry8.jpg" alt="logo" class="img-fluid"
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
                                <h6 class="product-title text-truncate"><a href="#">Amour 14.5mm Figaro</a></h6>
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
                                    <img src="{{url('/')}}/public/assets/images/products/jewelry8.jpg" alt="logo" class="img-fluid"
                                      onerror="this.src='https://i.ibb.co/qpB9ZCZ/placeholder.png'">
                                  </div>
                                  <div class="hover-view">
                                    <img src="{{url('/')}}/public/assets/images/products/jewelry8.jpg" alt="logo" class="img-fluid"
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
                                <h6 class="product-title text-truncate"><a href="#">Amour 14.5mm Figaro</a></h6>
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
                                    <img src="{{url('/')}}/public/assets/images/products/jewelry9.jpg" alt="logo" class="img-fluid"
                                      onerror="this.src='https://i.ibb.co/qpB9ZCZ/placeholder.png'">
                                  </div>
                                  <div class="hover-view">
                                    <img src="{{url('/')}}/public/assets/images/products/jewelry9.jpg" alt="logo" class="img-fluid"
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
                                <h6 class="product-title text-truncate"><a href="#">Amour 14.5mm Figaro</a></h6>
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
                                    <img src="{{url('/')}}/public/assets/images/products/jewelry10.jpg" alt="logo" class="img-fluid"
                                      onerror="this.src='https://i.ibb.co/qpB9ZCZ/placeholder.png'">
                                  </div>
                                  <div class="hover-view">
                                    <img src="{{url('/')}}/public/assets/images/products/jewelry10.jpg" alt="logo" class="img-fluid"
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
                                <h6 class="product-title text-truncate"><a href="#">Amour 14.5mm Figaro</a></h6>
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
                                    <img src="{{url('/')}}/public/assets/images/products/jewelry11.jpg" alt="logo" class="img-fluid"
                                      onerror="this.src='https://i.ibb.co/qpB9ZCZ/placeholder.png'">
                                  </div>
                                  <div class="hover-view">
                                    <img src="{{url('/')}}/public/assets/images/products/jewelry11.jpg" alt="logo" class="img-fluid"
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
                                <h6 class="product-title text-truncate"><a href="#">Amour 14.5mm Figaro</a></h6>
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
                                    <img src="{{url('/')}}/public/assets/images/products/jewelry12.jpg" alt="logo" class="img-fluid"
                                      onerror="this.src='https://i.ibb.co/qpB9ZCZ/placeholder.png'">
                                  </div>
                                  <div class="hover-view">
                                    <img src="{{url('/')}}/public/assets/images/products/jewelry12.jpg" alt="logo" class="img-fluid"
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
                                <h6 class="product-title text-truncate"><a href="#">Amour 14.5mm Figaro</a></h6>
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
                                    <img src="{{url('/')}}/public/assets/images/products/jewelry13.jpg" alt="logo" class="img-fluid"
                                      onerror="this.src='https://i.ibb.co/qpB9ZCZ/placeholder.png'">
                                  </div>
                                  <div class="hover-view">
                                    <img src="{{url('/')}}/public/assets/images/products/jewelry13.jpg" alt="logo" class="img-fluid"
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
                                <h6 class="product-title text-truncate"><a href="#">Amour 14.5mm Figaro</a></h6>
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
                                    <img src="{{url('/')}}/public/assets/images/products/jewelry14.jpg" alt="logo" class="img-fluid"
                                      onerror="this.src='https://i.ibb.co/qpB9ZCZ/placeholder.png'">
                                  </div>
                                  <div class="hover-view">
                                    <img src="{{url('/')}}/public/assets/images/products/jewelry14.jpg" alt="logo" class="img-fluid"
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
                                <h6 class="product-title text-truncate"><a href="#">Amour 14.5mm Figaro</a></h6>
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
                                    <img src="{{url('/')}}/public/assets/images/products/jewelry15.jpg" alt="logo" class="img-fluid"
                                      onerror="this.src='https://i.ibb.co/qpB9ZCZ/placeholder.png'">
                                  </div>
                                  <div class="hover-view">
                                    <img src="{{url('/')}}/public/assets/images/products/jewelry15.jpg" alt="logo" class="img-fluid"
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
                                <h6 class="product-title text-truncate"><a href="#">Amour 14.5mm Figaro</a></h6>
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
                                    <img src="{{url('/')}}/public/assets/images/products/jewelry16.jpg" alt="logo" class="img-fluid"
                                      onerror="this.src='https://i.ibb.co/qpB9ZCZ/placeholder.png'">
                                  </div>
                                  <div class="hover-view">
                                    <img src="{{url('/')}}/public/assets/images/products/jewelry16.jpg" alt="logo" class="img-fluid"
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
                                <h6 class="product-title text-truncate"><a href="#">Amour 14.5mm Figaro</a></h6>
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
  </div>


  <!-- -- end carousel sopping product --  -->

@include('includes.footer')
@include('includes.script')
@endsection