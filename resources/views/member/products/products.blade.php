@extends('Layouts.app')

@section('meta')
    {{-- all meta tags --}}
@endsection

@section('title')
    <title>Amplepoints | Products</title>
@endsection

@include('includes.head')
@include('includes.header')


@section('content')
    <div class="banner-sec" style="background: url('https://amplepoints.com/vendor-data/209/banner/1616493086_t_banner_Toryburch2.jpg')">
        <div class="container">
            <div class="img-parallax">
                <div class="top-banner-img-a">
                  <img src="https://amplepoints.com/vendor-data/209/profile/1581151083_t_toryb.png" class="imgrounded">
                </div>
            </div>
        </div>
    </div>


    <div class="products">
      <div class="container">
        <div class="channel">
          <a href="#" class="open-menu-login-account" data-bs-toggle="modal"
            data-bs-target="#vendorModal">
          My Channel
          </a>
        </div>
        <div class="row">
          {{-- -- filter --  --}}
          <div class="col-lg-3 col-md-4 col-12 my-2">
            <div class="filter">
              <h4 class="filter-heading">Filter</h4>
              <div class="filter-content">
                <div class="wrapper">
                  <h4 class="price-head mt-2">Price</h4>
                  <fieldset class="filter-price">
                    <div class="price-field">
                      <input type="range"  min="100" max="500" value="100" id="lower">
                      <input type="range" min="100" max="500" value="500" id="upper">
                    </div>
                    <div class="price-wrap">
                      <span class="price-title">FILTER</span>
                      <div class="price-wrap-1">
                        <input id="one">
                        <label for="one">$</label>
                      </div>
                      <div class="price-wrap_line">-</div>
                      <div class="price-wrap-2">
                        <input id="two">
                        <label for="two">$</label>
                      </div>
                    </div>
                  </fieldset>
                </div>
                <div class="price-range">
                  <div class="mb-1 form-check">
                    <input type="checkbox" class="form-check-input" id="price1">
                    <label class="form-check-label" for="price1">$0 - $50 <span>(14)</span></label>
                  </div>
                  <div class="mb-1 form-check">
                    <input type="checkbox" class="form-check-input" id="price2">
                    <label class="form-check-label" for="price2">$50 - $100  <span>(20)</span></label>
                  </div>
                  <div class="mb-1 form-check">
                    <input type="checkbox" class="form-check-input" id="price3">
                    <label class="form-check-label" for="price3">$100 - $500  <span>(5)</span></label>
                  </div>
                  <div class="mb-1 form-check">
                    <input type="checkbox" class="form-check-input" id="price4">
                    <label class="form-check-label" for="price4">$500 - $1000  <span>(4)</span></label>
                  </div>
                  <div class="mb-1 form-check">
                    <input type="checkbox" class="form-check-input" id="price5">
                    <label class="form-check-label" for="price5">$1000 - $500 0  <span>(1)</span></label>
                  </div>
                  <div class="mb-1 form-check">
                    <input type="checkbox" class="form-check-input" id="price6">
                    <label class="form-check-label" for="price6">Greater Than $5000 <span>(14)</span></label>
                  </div>
                </div>
                <hr>
                <div class="price-range">
                  <h4 class="price-head">FILTER BY REWARD</h4>
                  <div class="mb-1 form-check">
                    <input type="checkbox" class="form-check-input" id="price7">
                    <label class="form-check-label" for="price7">0 - 24% <span>(1)</span></label>
                  </div>
                  <div class="mb-1 form-check">
                    <input type="checkbox" class="form-check-input" id="price8">
                    <label class="form-check-label" for="price8">25 - 49% <span>(200)</span></label>
                  </div>
                  <div class="mb-1 form-check">
                    <input type="checkbox" class="form-check-input" id="price9">
                    <label class="form-check-label" for="price9">25 - 74% <span>(0)</span></label>
                  </div>
                  <div class="mb-1 form-check">
                    <input type="checkbox" class="form-check-input" id="price10">
                    <label class="form-check-label" for="price10">75 - 100% <span>(4)</span></label>
                  </div>
                </div>
                <div class="price-range brand first mt-4">
                  <div class="mb-1 form-check">
                    <input type="checkbox" class="form-check-input" id="price11">
                    <label class="form-check-label" for="price11">DRESSES</label>
                  </div>
                </div>
                <div class="price-range brand">
                  <div class="mb-1 form-check">
                    <input type="checkbox" class="form-check-input" id="price12">
                    <label class="form-check-label" for="price12">CLOTHING</label>
                  </div>
                </div>
                <div class="price-range brand">
                  <div class="mb-1 form-check">
                    <input type="checkbox" class="form-check-input" id="price13">
                    <label class="form-check-label" for="price13">SHOES</label>
                  </div>
                </div>
                <div class="price-range brand mb-3">
                  <div class="mb-1 form-check">
                    <input type="checkbox" class="form-check-input" id="price14">
                    <label class="form-check-label" for="price14">ACCESSORIES</label>
                  </div>
                </div>
              </div>
            </div>
            <div class="testimonials">
              <h4 class="filter-heading">Testimonials</h4>
              <div class="testimonial-cont">
                <div id="slick-slider-2" class="slick-init">
                  <div class="slick-img-div">
                    <div class="testimonial-card">
                      <h4 class="user-name">THEO B</h4>
                      <div class="user-img">
                        <img src="https://amplepoints.com/home_banners/testinomialsliders/testinomial_48_1604756102_test1.png" alt="">
                      </div>
                      <p class="user-desc"> This store has a lot of great buys, but has limited selection of sizes.   Some of the store clerks are pushy and stuffed my dressing room with clothes that are her tastes not mine.</p>
                    </div>
                  </div>
                  <div class="slick-img-div">
                    <div class="testimonial-card">
                      <h4 class="user-name">ROHIT KUMAR</h4>
                      <div class="user-img">
                        <img src="https://amplepoints.com/home_banners/testinomialsliders/testinomial_48_1604756102_test1.png" alt="">
                      </div>
                      <p class="user-desc"> I love BCBG!  And their outlet store was a great find!  They have a lot of sale racks: $19, $29, $39, etc. you can't beat the sale racks here!</p>
                    </div>
                  </div>
                  <div class="slick-img-div">
                    <div class="testimonial-card">
                      <h4 class="user-name">THEO B</h4>
                      <div class="user-img">
                        <img src="https://amplepoints.com/home_banners/testinomialsliders/testinomial_48_1604756102_test1.png" alt="">
                      </div>
                      <p class="user-desc"> I love BCBG!  And their outlet store was a great find!  They have a lot of sale racks: $19, $29, $39, etc. you can't beat the sale racks here!</p>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>

          {{-- -- products --  --}}
          <div class="col-lg-9 col-md-8 col-12 my-2">
            <h4 class="products-heading">BCBGMAXZARIA</h4>
            <div class="products-tab-buttons">
              <h4>Tiles View</h4>
              <button class="products-tab-button active" onclick="showTab(0)">
              <i class="fas fa-th"></i> Products With Amples
              </button>
              <button class="products-tab-button" onclick="showTab(1)">
              <i class="fas fa-th"></i> Products Without Amples
              </button>
            </div>
            <div class="products-tab" id="productsTab1">
              <div class="row">
                <div class="col-lg-4 col-md-6 col-12 my-2">
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
                <div class="col-lg-4 col-md-6 col-12 my-2">
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
                <div class="col-lg-4 col-md-6 col-12 my-2">
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
                <div class="col-lg-4 col-md-6 col-12 my-2">
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
              </div>
            </div>
            <div class="products-tab" id="productsTab2">
              <div class="row">
                <div class="col-lg-4 col-md-6 col-12 my-2">
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
                <div class="col-lg-4 col-md-6 col-12 my-2">
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
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>



    @include('includes.footer')
    @include('includes.script')
@endsection
