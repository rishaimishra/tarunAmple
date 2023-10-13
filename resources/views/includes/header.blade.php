 <!-- -- start header --  -->
 <nav class="navbar navbar-expand-lg navbar-light py-3 fixed-top">
  <div class="container">
    <div class="row w-100">
      <div class="col-md-12">
        <div class="row">
          <div class="col-md-3">
            <a class="navbar-brand" href="index.html">
              <img src="{{url('/')}}/public/assets/images/header/ampdesktop.png" alt="">
            </a>
          </div>
          <div class="col-md-5 col-6 pe-0">
            <!-- search  -->
            <form class="">
              <div class="search-form">
                <input class="form-control" type="search" placeholder="Search" aria-label="Search">
                <button class="button-search"><i class="fas fa-search"></i></button>
              </div>
            </form>
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
            <div class="nav-item dropdown m-0">
              <a class="nav-link cart-sec" href="#" id="navbarDropdownCart" role="button" data-bs-toggle="dropdown"
                aria-expanded="false">
                <i class="fas fa-shopping-cart"></i><sup>4</sup>
              </a>
              <ul class="dropdown-menu cart-item-div" aria-labelledby="navbarDropdownCart">
                <div class="main-cart-item">
                  <div class="cart-item">
                    <div class="cart-item-img">
                      <img src="{{url('/')}}/public/assets/images/header/01.jpg" alt="">
                    </div>
                    <div class="cart-item-content">
                      <a class="dropdown-item" href="#">Women color block</a>
                      <p>$150.<sub>00 </sub> × 1</p>
                    </div>
                  </div>
                  <div class="cart-item">
                    <div class="cart-item-img">
                      <img src="{{url('/')}}/public/assets/images/header/02.jpg" alt="">
                    </div>
                    <div class="cart-item-content">
                      <a class="dropdown-item" href="#">Women color block</a>
                      <p>$150.<sub>00 </sub> × 1</p>
                    </div>
                  </div>
                </div>
                <div class="sub-total">
                  <p>Subtotal: <span>$265.00</span></p>
                  <button>Expend cart ></button>
                </div>
                <button class="checkout">Checkout</button>
              </ul>
            </div>

            <!-- wishlist -->
            <a class="wishlist" href="#"><i class="fas fa-heart"></i></a>

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
      <div class="col-md-12">
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
          <ul class="navbar-nav me-auto mb-2 mb-lg-0 mt-3">

            <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle" href="#" id="stores" role="button" data-bs-toggle="dropdown"
                aria-expanded="false">
                Stores
              </a>
              <ul class="dropdown-menu" aria-labelledby="stores">
                <li><a class="dropdown-item" href="#"> Brands</a></li>
                <li>
                  <hr class="dropdown-divider">
                </li>
                <li><a class="dropdown-item" href="#">Malls</a></li>
                <li>
                  <hr class="dropdown-divider">
                </li>
                <li><a class="dropdown-item" href="#">Promotional Cards</a></li>
              </ul>
            </li>

            <li class="nav-item">
              <a class="nav-link" href="#">Give-aways</a>
            </li>

            <li class="nav-item">
              <a class="nav-link" href="#">Social</a>
            </li>

            <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle" href="#" id="ampletheater" role="button" data-bs-toggle="dropdown"
                aria-expanded="false">
                Ample Theater
              </a>
              <ul class="dropdown-menu" aria-labelledby="ampletheater">
                <li><a class="dropdown-item" href="#">Videos</a></li>
              </ul>
            </li>

            <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle" href="#" id="travels" role="button" data-bs-toggle="dropdown"
                aria-expanded="false">
                Travel
              </a>
              <ul class="dropdown-menu" aria-labelledby="travels">
                <li><a class="dropdown-item" href="#">Hotel Booking</a></li>
                <li>
                  <hr class="dropdown-divider">
                </li>
                <li><a class="dropdown-item" href="#">Flight Booking</a></li>
                <li>
                  <hr class="dropdown-divider">
                </li>
                <li><a class="dropdown-item" href="#">Group Booking</a></li>
              </ul>
            </li>

          </ul>
        </div>
      </div>
    </div>
  </div>
</nav>
<!-- -- end header --  -->