<!-- -- start header --  -->
<nav class="navbar navbar-expand-lg navbar-light py-3 fixed-top">
    <div class="container">
        <div class="row w-100">
            <div class="col-md-12">
                <div class="row">
                    <div class="col-md-2">
                        <a class="navbar-brand" href="{{ route('index.page') }}">
                            <img src="{{ asset('public/assets/images/header/ampdesktop.png') }}" alt="">
                        </a>
                    </div>
                    <div class="col-md-6 col-6 pe-0 ps-5">
                        <div class="collapse navbar-collapse">
                            <!-- <div> -->
                            <ul class="navbar-nav me-auto mb-lg-0 mt-1">

                                <li class="nav-item custom-dropdown">
                                    <a class="nav-link" href="{{route('store.page')}}">Stores</a>
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
                        <a href="#" class="open-menu-login-account" data-bs-toggle="modal"
                            data-bs-target="#exampleModal">
                            <i class="far fa-user"></i> <span>Sign Up</span>
                        </a>
                        <a href="#" class="open-menu-login-account" data-bs-toggle="modal"
                            data-bs-target="#vendorModal">
                            <i class="far fa-user"></i> <span>Login</span>
                        </a>





                        <!-- cart  -->
                        <div class="nav-item m-0">
                            <a class="nav-link cart-sec" href="#" id="sidebarCart-toggle"
                                onclick="toggleSidebarCart()">
                                <i class="fas fa-shopping-cart"></i><sup>4</sup>
                            </a>
                            <div class="sidebarCart" id="sidebarCart">
                                <div class="sidebar-header">
                                    <h4>Shopping Cart</h4>
                                    <button class="sidebarCart-close" onclick="toggleSidebarCart()">✕</button>
                                </div>

                                <div class="cart-contents cart-item-div">

                                    <div class="empty-message" id="sidebarCartEmptyMsg" style="display:none">
                                        <svg version="1.1" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 500 500"
                                            preserveAspectRatio="xMidYMid meet">
                                            <g>
                                                <path d="M477.52,135.43c3.72-20.13-6.84-37.6-26.3-43.52c-90.6-27.43-180.44-54.64-267.05-80.8
                            c-5.18-1.57-10.17-2.36-14.82-2.36c-15.49,0-27.41,8.74-34.46,25.26l-22.12,51.7c-12.92,30.19-25.82,60.37-38.74,90.56
                            c-0.44,1.04-0.92,2.06-1.46,3.14l-3.03-0.9c-3.42-1.04-6.68-2.03-9.92-2.98c-2.89-0.86-5.59-1.29-8-1.29
                            c-8.27,0-13.96,4.97-16.94,14.77c-3.79,12.5-7.58,25.03-11.33,37.54c-4.35,14.4-0.09,22.37,14.17,26.7l27.25,8.25
                            c52.7,15.97,107.2,32.47,160.77,48.86c1.8,0.53,3.95,2.33,4.9,4.07c8.71,15.9,17.4,32.15,25.79,47.87
                            c2.66,4.95,5.29,9.89,7.93,14.84l13.61,25.42c12.37,23.11,25.17,47.03,37.81,70.54c6.12,11.37,16.85,18.17,28.68,18.17
                            c2.15,0,4.32-0.21,6.45-0.67c10.38-2.17,18.79-8.69,23.09-17.89c4.41-9.41,3.98-20.36-1.2-30.07
                            c-19.28-36.24-38.99-73.04-58.04-108.61l-10.82-20.18c-0.23-0.44-0.44-0.88-0.67-1.32c-1.34-2.75-3.21-6.49-7.56-6.49
                            c-1.13,0-2.33,0.28-3.68,0.83c-1.99,0.86-3.33,2.15-3.93,3.84c-0.9,2.54-0.18,5.69,2.4,10.49l17.75,33.19
                            c16.99,31.71,33.95,63.4,50.89,95.13c5.11,9.57,2.5,19.65-6.33,24.52c-2.57,1.41-5.25,2.1-8.02,2.1c-6.4,0-12.32-3.88-15.83-10.42
                            c-32.06-59.82-63.33-118.29-92.96-173.81c-4.95-9.29-2.91-17.66,5.73-23.6c6.1-4.16,5.22-8.44,3.42-11.28
                            c-1.9-2.94-4.32-3.56-6.03-3.56c-1.8,0-3.74,0.67-5.8,2.03c-10.42,6.86-15.44,16.48-14.93,28.57c0.12,2.8,0.67,5.55,1.2,8.21
                            c0.02,0.12,0.05,0.23,0.07,0.35c-18.95-5.76-37.91-11.53-56.86-17.29c-40.93-12.46-81.87-24.92-122.82-37.35
                            c-1.39-0.42-2.27-0.97-2.61-1.59c-0.39-0.74-0.3-1.99,0.28-3.84c2.45-7.93,4.88-16.02,7.21-23.85c1.32-4.39,2.63-8.78,3.95-13.17
                            c1.78-5.85,2.22-6.08,3.14-6.08c1.23,0,3.35,0.62,6.01,1.43l29.58,8.97c40.66,12.32,81.29,24.64,121.94,36.93
                            c3.04,0.92,6.09,1.85,9.13,2.77c3.06,0.93,6.11,1.85,9.17,2.78c3.06,0.93,6.11,1.85,9.17,2.78c3.06,0.93,6.11,1.85,9.17,2.78
                            c3.06,0.93,6.12,1.85,9.17,2.78c1.13,0.34,2.28,0.65,3.39,1.03c-0.8-0.32-1.58-0.33-2.41-0.07c-1.3,0.42-2.39,1.28-3.42,2.14
                            c-0.94,0.78-1.86,1.68-2.22,2.88c-0.11,0.37-0.16,0.75-0.15,1.14c0.05,2.98,2.08,7.12,4.9,8.32c5.2,2.2,8.85,5.73,11.46,11.09
                            c0.32,0.62,0.62,1.27,0.92,1.92c1.53,3.21,3.1,6.52,5.45,9.29c1.59,1.87,4.67,2.7,6.98,2.7c0.95,0,1.78-0.14,2.5-0.39
                            c1.18-0.42,2.15-1.53,2.89-3.31c0.25-0.62,1.5-3.84,0.46-6.08c-3.19-6.91-6.7-13.2-10.45-18.74c-3.1-4.55-7.56-7.84-13.59-9.92
                            c36.22,11,72.46,21.96,108.68,32.94l85.08,25.75c1.62,0.51,4.62,1.41,5.06,2.24c0.44,0.86-0.49,3.91-0.97,5.57
                            c-1.55,5.11-3.07,10.24-4.62,15.37c-2.1,7.05-4.23,14.12-6.36,21.17c-1.48,4.9-2.03,4.9-2.89,4.9c-1.09,0-2.87-0.49-4.6-1.02
                            l-13.54-4.09c-31.36-9.48-62.73-18.95-94.07-28.45c-1.8-0.55-3.24-0.81-4.51-0.81c-3.4,0-5.82,1.87-6.86,5.29
                            c-2.17,7.21,4.74,9.31,7.03,9.98c15.37,4.65,30.74,9.31,46.11,13.98c21.31,6.45,42.62,12.92,63.95,19.35
                            c2.2,0.67,4.37,0.99,6.43,0.99c7.9,0,14.15-4.95,16.73-13.22c3.79-12.3,7.81-25.63,12.62-42.02c3.14-10.77-1.55-19.58-12.25-23.02
                            c-3.58-1.13-7.17-2.22-10.93-3.37c-1.16-0.35-2.33-0.69-3.54-1.06c0.02-0.37,0.05-0.69,0.09-0.95
                            C458.17,239.95,467.83,187.66,477.52,135.43z M438.92,261.3l-4.78,25.86c-0.09,0.53-0.25,1.06-0.46,1.66l-200.41-60.72
                            L87.39,183.92c0.28-0.76,0.55-1.48,0.86-2.17l6.73-15.72c18.07-42.37,36.15-84.71,54.25-127.05c4.25-9.94,11.33-15.21,20.5-15.21
                            c2.8,0,5.82,0.49,8.97,1.46c88.85,26.86,177.67,53.76,266.49,80.69c14.03,4.23,19.81,13.68,17.17,28.04
                            C454.61,176.41,446.64,219.56,438.92,261.3z"></path>
                                                <path d="M193,311.18c0-2.33,0.02-9.41-7.47-9.64h-0.35c-3.63,0-5.41,1.8-6.24,3.33c-1.04,1.87-1.16,4.21-1.16,6.03
                            c0.02,27,0.02,53.97,0,80.94c0,1.83,0.12,4.18,1.18,6.06c0.83,1.53,2.61,3.33,6.24,3.33h0.32c7.49-0.21,7.47-7.3,7.47-9.64
                            c-0.02-9.75-0.02-19.51-0.02-29.26v-22.07C192.97,330.57,192.97,320.86,193,311.18z"></path>
                                                <path d="M125.84,370.79c-0.07-1.02-0.16-2.05-0.27-3.07c-0.3-2.78-0.93-5.86-3.24-7.43c-2.42-1.64-6.8-1.21-9.02,0.6
                            c-2.46,2.02-2.74,5.1-2.73,8.11c0.03,6.85,0.06,13.7,0.1,20.55c0.04,7.64-0.06,15.77-4.21,22.18c-3.96,6.14-11.15,9.67-18.39,10.62
                            c-2.53,0.33-5.31,0.47-7.18,2.21c-1.47,1.36-2.05,3.47-2.03,5.47c0.02,2.01,0.63,4.1,2.08,5.48c1.85,1.76,4.64,2.05,7.19,1.98
                            c7.61-0.2,15.14-2.74,21.3-7.2c6.17-4.46,10.94-10.81,13.51-17.97c2.32-6.47,2.85-13.43,3.08-20.3c0.15-4.48,0.19-8.95,0.11-13.43
                            C126.11,375.99,126.02,373.38,125.84,370.79z"></path>
                                                <path d="M220.11,462.08c-1.62,0-3.33,0.51-5.59,1.62c-2.43,1.2-4.9,1.8-7.35,1.8c-8.07,0-13.98-6.4-14.1-15.25
                            c-0.07-5.69-0.07-11.74,0-18.51c0.07-7.81-4.62-9.11-7.44-9.18l-0.3-0.02c-2.2,0-3.95,0.67-5.25,1.99
                            c-1.53,1.55-2.24,3.84-2.2,6.96c0.05,2.47,0.05,5.02,0.02,7.47v5.62h0.02v0.95c-0.02,2.33-0.05,4.76,0.05,7.16
                            c0.67,15.81,13.73,28.17,29.75,28.17c4.74,0,9.27-1.13,13.52-3.35c2.08-1.11,8.41-4.44,5.11-11.12
                            C224.59,462.85,221.98,462.08,220.11,462.08z"></path>
                                                <path
                                                    d="M447.44,404.04c-0.56-0.14-1.12-0.2-1.68-0.18c-2.22,0.05-4.44,1.14-6.63,1.81
                            c-4.65,1.44-10.07,0.9-13.83-2.18c-3.13-2.57-4.8-6.58-5.3-10.6c-0.29-2.29-0.27-4.73-1.46-6.71c-1.17-1.93-3.41-3.1-5.66-3.21
                            c-1.81-0.08-3.61,0.47-5.15,1.42c-0.38,0.23-0.75,0.48-1.09,0.77c-0.29,0.24-0.48,0.7-0.65,1.04c-0.4,0.77-0.71,1.59-0.93,2.44
                            c-0.44,1.72-0.54,3.51-0.43,5.27c0.04,0.68,0.12,1.36,0.22,2.04c0.97,6.45,4.08,12.56,8.68,17.18c4.6,4.63,10.66,7.77,17.09,8.92
                            c1.36,0.24,2.75,0.4,4.12,0.25c0.96-0.11,1.9-0.37,2.84-0.63c1.94-0.54,3.89-1.08,5.83-1.62c1.83-0.51,3.67-1.02,5.32-1.95
                            c1.65-0.93,3.11-2.33,3.73-4.13c0.54-1.57,0.38-3.32-0.15-4.89C451.53,406.77,449.8,404.64,447.44,404.04z">
                                                </path>
                                                <path d="M153.01,332.44h-0.07c-4.78,0-7.65,3.14-7.67,8.39c-0.05,9.18-0.05,18.84,0,30.39
                            c0.02,5.36,2.77,8.48,7.56,8.53h0.14c4.69,0,7.53-3.12,7.58-8.39c0.05-3.54,0.05-7.1,0.02-10.63v-9.08
                            c0.02-3.56,0.02-7.12-0.02-10.68C160.48,333.3,155.25,332.44,153.01,332.44z"></path>
                                                <path d="M111.69,315.61c0.79,1.52,2.01,2.79,3.43,3.74c0.81,0.54,1.72,1,2.7,1.02c1.06,0.03,2.07-0.46,3-0.96
                            c1.32-0.71,2.65-1.51,3.51-2.74c0.9-1.3,1.18-2.92,1.33-4.49c0.27-2.84,0.21-5.7,0.21-8.55c0-2.36,0.02-4.79-0.85-6.98
                            c-0.8-2.01-2.38-3.73-4.39-4.54c-2.03-0.82-4.58-0.68-6.28,0.74c-1.83,1.53-2.95,3.38-3.44,5.73c-0.48,2.28-0.39,4.64-0.43,6.97
                            c-0.05,2.83-0.26,5.79,0.56,8.44C111.21,314.55,111.42,315.09,111.69,315.61z"></path>
                                                <g>
                                                    <path d="M244.57,72.74c-8.33-2.49-17.13,2.25-19.62,10.58l-29.95,100.01c-2.49,8.33,2.25,17.13,10.58,19.62
                                c8.33,2.49,17.13-2.25,19.62-10.58l29.95-100.01C257.64,84.03,252.89,75.23,244.57,72.74z M213.7,188.93
                                c-0.6,1.99-2.7,3.12-4.69,2.53s-3.12-2.7-2.53-4.69l29.95-100.01c0.6-1.99,2.7-3.12,4.69-2.53c1.99,0.6,3.12,2.7,2.53,4.69
                                L213.7,188.93z"></path>
                                                    <path d="M303.62,90.42c-8.33-2.49-17.13,2.25-19.62,10.58l-29.95,100.01c-2.49,8.33,2.25,17.13,10.58,19.62
                                c8.33,2.49,17.13-2.25,19.62-10.58l29.95-100.01C316.69,101.72,311.95,92.92,303.62,90.42z M272.75,206.62
                                c-0.6,1.99-2.7,3.12-4.69,2.53c-1.99-0.6-3.12-2.7-2.53-4.69l29.95-100.01c0.6-1.99,2.7-3.12,4.69-2.53s3.12,2.7,2.53,4.69
                                L272.75,206.62z"></path>
                                                    <path
                                                        d="M362.67,108.11c-8.33-2.49-17.13,2.25-19.62,10.58L313.09,218.7c-2.49,8.33,2.25,17.13,10.58,19.62
                                s17.13-2.25,19.62-10.58l29.95-100.01C375.74,119.4,371,110.6,362.67,108.11z M331.8,224.3c-0.6,1.99-2.7,3.12-4.69,2.53
                                c-1.99-0.6-3.12-2.7-2.53-4.69l29.95-100.01c0.6-1.99,2.7-3.12,4.69-2.53c1.99,0.6,3.12,2.7,2.53,4.69L331.8,224.3z">
                                                    </path>
                                                    <path d="M421.72,125.79c-8.33-2.49-17.13,2.25-19.62,10.58l-29.95,100.01c-2.49,8.33,2.25,17.13,10.58,19.62
                                c8.33,2.49,17.13-2.25,19.62-10.58l29.95-100.01C434.79,137.09,430.05,128.29,421.72,125.79z M390.85,241.98
                                c-0.6,1.99-2.7,3.12-4.69,2.53s-3.12-2.7-2.53-4.69l29.95-100.01c0.6-1.99,2.7-3.12,4.69-2.53c1.99,0.6,3.12,2.7,2.53,4.69
                                L390.85,241.98z"></path>
                                                    <path d="M185.52,55.05c-8.33-2.49-17.13,2.25-19.62,10.58l-29.95,100.01c-2.49,8.33,2.25,17.13,10.58,19.62
                                c8.33,2.49,17.13-2.25,19.62-10.58L196.1,74.68C198.59,66.35,193.84,57.55,185.52,55.05z M154.65,171.25
                                c-0.6,1.99-2.7,3.12-4.69,2.53s-3.12-2.7-2.53-4.69l29.95-100.01c0.6-1.99,2.7-3.12,4.69-2.53c1.99,0.6,3.12,2.7,2.53,4.69
                                L154.65,171.25z"></path>
                                                </g>
                                            </g>
                                        </svg>
                                        <h4>Your cart is empty</h4>
                                    </div>

                                    <div class="main-cart-item">
                                        <div class="cart-item">
                                            <div class="cart-item-img">
                                                <img src="{{ url('/') }}/public/assets/images/header/01.jpg"
                                                    alt="">
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
                                                <img src="{{ url('/') }}/public/assets/images/header/02.jpg"
                                                    alt="">
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

                                    <div class="sidebar-footer">
                                        <div class="sub-total">
                                            <p>Total:</p>
                                            <span>$265.00</span>
                                        </div>
                                        <div class="sidebar-cart-actions">
                                            <button class="checkout">Checkout</button>
                                        </div>
                                    </div>

                                </div>
                            </div>
                        </div>



                        <!-- wishlist -->
                        <a class="wishlist" href="#"><i class="fas fa-heart"></i></a>

                        <li class="nav-item dropdown me-0 ms-4">
                            <a class="nav-link" href="#" id="searchBar" role="button"
                                data-bs-toggle="dropdown" aria-expanded="false">
                                <i class="fas fa-search"></i>
                            </a>
                            <div class="dropdown-menu custom-search" aria-labelledby="searchBar">
                                <input type="text" class="searching" placeholder="Search here...">
                            </div>
                        </li>

                        <!-- hamburger menu  -->
                        <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                            data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                            aria-expanded="false" aria-label="Toggle navigation">
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
                            <a class="nav-link" href="{{route('store.page')}}">Stores</a>
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
                    <button onclick="window.location.href='{{ route('member.signup.page') }}'" class="btn checkout">
                        Sign Up As A
                        Member</button>
                    <button onclick="window.location.href='{{ route('vendor.signup.page') }}'"
                        class="btn checkout mt-3"> Sign Up As A
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
                    <button onclick="window.location.href='{{ route('member.login.page') }}'" class="btn checkout">
                        Login As A Member</button>
                    <button onclick="window.location.href='{{ route('vendor.login.page') }}'"
                        class="btn checkout mt-3"> Login As A
                        Vendor</button>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- -- end header --  -->
