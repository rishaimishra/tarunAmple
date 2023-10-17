<!-- -- start header --  -->
<nav class="navbar navbar-expand-lg navbar-light py-3 fixed-top">
  <div class="container">
    <div class="row w-100">
      <div class="col-md-12">
        <div class="row">
          <div class="col-md-2">
            <a class="navbar-brand" href="{{route('index.page')}}">
              <img src="{{asset('public/assets/images/header/ampdesktop.png')}}" alt="">
            </a>
          </div>
          <div class="col-md-6 col-6 pe-0 ps-5">
            <div class="collapse navbar-collapse">
              <!-- <div> -->
              <ul class="navbar-nav me-auto mb-lg-0 mt-1">

                <li class="nav-item custom-dropdown">
                  <a class="nav-link" href="#">Stores</a>
                  <div class="custom-dropdown-content">
                    <a class="dropdown-item" href="#"> Brands</a>
                    <hr class="m-0 p-0">
                    <a class="dropdown-item" href="#">Malls</a>
                    <hr class="m-0 p-0">
                    <a class="dropdown-item" href="#">Promotional Cards</a>
                  </div>
                </li>

                <li class="nav-item">
                  <a class="nav-link" href="#">Give-aways</a>
                </li>

                <li class="nav-item">
                  <a class="nav-link" href="#">Social</a>
                </li>

                <li class="nav-item custom-dropdown">
                  <a class="nav-link" href="#">Ample Theater</a>
                  <div class="custom-dropdown-content">
                    <a class="dropdown-item" href="#">Videos</a>
                  </div>
                </li>

                <li class="nav-item custom-dropdown">
                  <a class="nav-link" href="#">Travel</a>
                  <div class="custom-dropdown-content">
                    <a class="dropdown-item" href="#">Hotel Booking</a>
                    <hr class="m-0 p-0">
                    <a class="dropdown-item" href="#">Flight Booking</a>
                    <hr class="m-0 p-0">
                    <a class="dropdown-item" href="#">Group Booking</a>
                  </div>
                </li>

              </ul>
            </div>
          </div>
          <div class="col-md-4 col-6 header-icons">
            <!-- login / register -->
            <a href="#" class="open-menu-login-account" data-bs-toggle="modal" data-bs-target="#exampleModal">
              <i class="far fa-user"></i> <span>Sign Up</span>
            </a>
            <a href="#" class="open-menu-login-account" data-bs-toggle="modal" data-bs-target="#vendorModal">
              <i class="far fa-user"></i> <span>Login</span>
            </a>





            <!-- cart  -->
            <div class="nav-item m-0">
              <a class="nav-link cart-sec" href="#" id="sidebarCart-toggle" onclick="toggleSidebarCart()">
                <i class="fas fa-shopping-cart"></i><sup>4</sup>
              </a>
              <div class="sidebarCart" id="sidebarCart">
                <div class="sidebar-header">
                  <h4>Shopping Cart</h4>
                  <button class="sidebarCart-close" onclick="toggleSidebarCart()">✕</button>
                </div>

                <div class="cart-contents cart-item-div">
                  <div class="main-cart-item">
                    <div class="cart-item">
                      <div class="cart-item-img">
                        <img src="{{url('/')}}/public/assets/images/header/01.jpg" alt="">
                      </div>
                      <div class="cart-item-content">
                        <a class="dropdown-item" href="#">Women color block</a>
                        <div class="cart-item-content-price">
                          <p>$150.00</p>
                          <span>Qty: 1</span>
                        </div>
                      </div>
                      <div class="cross">
                        ✕
                      </div>
                    </div>
                    <div class="cart-item">
                      <div class="cart-item-img">
                        <img src="{{url('/')}}/public/assets/images/header/02.jpg" alt="">
                      </div>
                      <div class="cart-item-content">
                        <a class="dropdown-item" href="#">Women color block</a>
                        <div class="cart-item-content-price">
                          <p>$150.00</p>
                          <span>Qty: 2</span>
                        </div>
                      </div>
                      <div class="cross">
                        ✕
                      </div>
                    </div>
                  </div>

                  <div class="sub-total">
                    <p>Total:</p>
                    <span>$265.00</span>
                  </div>
                  <button class="checkout">Checkout</button>
                </div>
              </div>
            </div>



            <!-- wishlist -->
            <a class="wishlist" href="#"><i class="fas fa-heart"></i></a>

            <li class="nav-item dropdown me-0 ms-4">
              <a class="nav-link" href="#" id="searchBar" role="button" data-bs-toggle="dropdown"
                aria-expanded="false">
                <i class="fas fa-search"></i>
              </a>
              <div class="dropdown-menu custom-search" aria-labelledby="searchBar">
                <input type="text" class="searching" placeholder="Search here...">
              </div>
            </li>

            <!-- hamburger menu  -->
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
              data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
              aria-label="Toggle navigation">
              <span class="navbar-toggler-icon"></span>
            </button>
          </div>
        </div>
      </div>
      <!-- -- menu links --  -->
      <div class="col-md-12 mobile-menu-links">
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
          <ul class="navbar-nav me-auto mb-2 mb-lg-0 mt-3">

            <li class="nav-item custom-dropdown">
              <a class="nav-link" href="#">Stores</a>
              <div class="custom-dropdown-content">
                <a class="dropdown-item" href="#"> Brands</a>
                <hr class="m-0 p-0">
                <a class="dropdown-item" href="#">Malls</a>
                <hr class="m-0 p-0">
                <a class="dropdown-item" href="#">Promotional Cards</a>
              </div>
            </li>

            <li class="nav-item">
              <a class="nav-link" href="#">Give-aways</a>
            </li>

            <li class="nav-item">
              <a class="nav-link" href="#">Social</a>
            </li>

            <li class="nav-item custom-dropdown">
              <a class="nav-link" href="#">Ample Theater</a>
              <div class="custom-dropdown-content">
                <a class="dropdown-item" href="#">Videos</a>
              </div>
            </li>

            <li class="nav-item custom-dropdown">
              <a class="nav-link" href="#">Travel</a>
              <div class="custom-dropdown-content">
                <a class="dropdown-item" href="#">Hotel Booking</a>
                <hr class="m-0 p-0">
                <a class="dropdown-item" href="#">Flight Booking</a>
                <hr class="m-0 p-0">
                <a class="dropdown-item" href="#">Group Booking</a>
              </div>
            </li>

          </ul>
        </div>
      </div>
    </div>
  </div>
</nav>




<!-- Member & Vendor Login Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header" style="background:#f6f9fc">
        <h4 class="modal-heading text-center">Ample Points</h4>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <div class="signup-btn">
          <button onclick="window.location.href='{{route('member.signup.page')}}'" class="btn checkout"> Sign Up As A
          Member</button>
          <button onclick="window.location.href='{{route('vendor.signup.page')}}'" class="btn checkout mt-3"> Sign Up As A
          Vendor</button>
        </div>
      </div>
    </div>
  </div>
</div>
<!--Member & Vendor Register Modal -->
<div class="modal fade" id="vendorModal" tabindex="-1" aria-labelledby="vendorModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header" style="background:#f6f9fc">
        <h4 class="modal-heading text-center">Ample Points</h4>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <div class="signup-btn">
          <button onclick="window.location.href='{{route('member.login.page')}}'" class="btn checkout"> Login As A Member</button>
          <button onclick="window.location.href='{{route('vendor.login.page')}}'" class="btn checkout mt-3"> Login As A
          Vendor</button>
        </div>
      </div>
    </div>
  </div>
</div>
<!-- -- end header --  -->