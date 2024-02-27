@php
$baseUrl=url('/');
$currentRoute = Route::currentRouteName();
// dd($currentRoute);
@endphp



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
                                        <a class="dropdown-item" href="{{route('brands.page')}}"> Brands</a>
                                        <hr class="m-0 p-0">
                                        <a class="dropdown-item" href="{{route('mall.page')}}">Malls</a>
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
                                @if(@Auth::user()->user_id)
                                <li class="nav-item custom-dropdown">
                                    <a class="nav-link" href="{{route('all.videos')}}">Ample Theater</a>
                                    <div class="custom-dropdown-content">
                                        <a class="dropdown-item" href="{{route('all.videos')}}">Videos</a>
                                    </div>
                                </li>
                                @endif
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
                        {{--  @php
                        dd(@Auth::user());
                        @endphp --}}
                        @if(!@Auth::user()->user_id)
                        <a href="#" class="open-menu-login-account" data-bs-toggle="modal"
                            data-bs-target="#exampleModal">
                            <i class="far fa-user"></i> <span>Sign Up</span>
                        </a>
                        <a href="#" class="open-menu-login-account" data-bs-toggle="modal"
                            data-bs-target="#vendorModal">
                            <i class="far fa-user"></i> <span>Login</span>
                        </a>
                        @else
                        
                        <span>{{@Auth::user()->first_name}} {{@Auth::user()->last_name}}</span>
                        @endif
                        <!-- cart  -->
                        @if(@Auth::user()->user_id)
                        <div class="nav-item m-0">
                            @php
                            $countOfProductAdded = DB::table('products_added')
                            ->where('customer_Id', '=', @Auth::user()->user_id)
                            ->where('is_purchased', '=', 0)
                            ->orderBy('id', 'asc')->sum('quantity');
                            @endphp
                            <a   {{-- href="#"  class="open-menu-login-account"  data-bs-toggle="modal"
                            data-bs-target="#cartmodel" --}} class="nav-link cart-sec" href="#" id="sidebarCart-toggle"
                                onclick="openCustomModal()">
                                <i class="fas fa-shopping-cart"></i><span id="itemcount">{{@$countOfProductAdded}}</span>
                            </a>
                            
                        </div>
                        @endif
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
        <div class="modal-content" style="position: fixed;top: 10px;max-width: 470px;left: 50%;transform: translate(-50%, 0);">
            <div class="modal-header" style="background:#f6f9fc">
                <h4 style="width: 100%;" class="modal-heading text-center">Ample Points</h4>
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
        <div class="modal-content" style="position: fixed;top: 10px;max-width: 470px;left: 50%;transform: translate(-50%, 0);">
            <div class="modal-header" style="background:#f6f9fc">
                <h4 style="width: 100%;" class="modal-heading text-center">Ample Points</h4>
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




























{{-- if product details page then load add_to_cart_modal.php page html within the below div, from ajax--}}
<div id="addtocartmodalheader"></div>



{{-- for other pages other than product details page load below modal --}}

@php
if(@Auth::user()->user_id){

$usrmakey= @Auth::user()->user_id;

$vpb_check_all_items = DB::table('products_added')
->select('*')
->where('customer_Id', '=', $usrmakey)
->where('is_purchased', '=', 0)
->orderBy('id', 'asc')
->get();
$currencySymbol="$";


$data=$vpb_check_all_items;
$count = DB::table('products_added')->where('customer_Id', $usrmakey)
->where('is_purchased', 0)
->get();
// Calculate sums
$itemsTotal = $count->sum('amount');
$taxTotal = $count->sum('tax');
$shippingTotal = $count->sum('shipping');
$itemsQuant = $count->sum('quantity');
}
@endphp


{{-- modal code --}}
@if(@Auth::user()->user_id)
<div class="modal fade" id="cartmodel" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header" style="background:#f6f9fc">
                <h4  class="modal-heading text-center">Ample Points</h4>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                  @foreach($data as $row)
        @php
        $img = DB::table('product_images')->where('product_id', @$row->product_id)->first();
        @endphp
        <div class="sidebar-cart-item">
            <a href="#{{-- {{ url('/productdetail/' . $row->product_id) }} --}}" target="_blank" class="product-image">
                <img src="{{ 'https://amplepoints.com/product_images/' . $row->product_id . '/' . $img->image_name }}" alt="Product Image" style="width:20px !important">
            </a>
            <div class="product-info">
                <a href="{{ url('/productdetail/' . $row->product_id) }}" title="{{ $row->item_added }}" class="product-name">
                    {{ $row->item_added }}
                </a>
                <div class="product-price">
                    <span>Price: {{ $currencySymbol . $row->amount }}</span>
                </div>
                <div class="product-quantity">
                    <span>Qty: {{ $row->quantity }}</span>
                </div>
            </div>
            <div class="remove-cart-item">
                <button class="btn-remove" onclick="remove_this_item('{{ $row->id }}', '{{ $usrmakey }}')">
               X
                </button>
            </div>
        </div>
        @endforeach
        </div>

         <div >
            <h5 >
            Total
            <span class="totalitemamount">{{ $currencySymbol .$itemsTotal }}</span>
            </h5>
            @if (!empty($usrmakey))
            <div >
                <a href="javascript:void(0);" onclick="processCheckout('{{ $usrmakey }}');"
                    class="btn btn-primary btn-checkout">
                    CHECKOUT
                </a>
            </div>
            @else
            <div >
                <a href="{{ url('/checkout') }}" class="btn btn-primary btn-checkout">
                    CHECKOUT
                </a>
            </div>
            @endif

            </div>
        </div>
    </div>
</div>

@endif




<script>
    function openCustomModal(){
    $.ajaxSetup({
    headers: {
    'X-CSRF-TOKEN': "{{csrf_token()}}"
    }
    });

    var currentRoute = "{{ $currentRoute }}";

    $.ajax({
    type: "GET",
    url: '<?php echo $baseUrl; ?>/add-to-cart-header',
    success: function (b) {
    // console.log(b)
    if (currentRoute === 'member.product.details.page') {
     $('#addtocartmodalheader').html(b);
    }else{
        // alert(1)
        $('#cartmodel').modal('show');
    }

    },
    });

    }





function remove_this_item(id,userid){
    console.log(id,userid)
    if (confirm('Are you sure you want to delete?')) {

    $.ajaxSetup({
    headers: {
    'X-CSRF-TOKEN': "{{csrf_token()}}"
    }
    });


    $.ajax({
    type: "POST",
    url: '<?php echo $baseUrl; ?>/shopping_cart/shopping_cart_operation.php',
    data: "item_id=" + id + "&usrmaid=" + userid + "&page=remove_this_item",
    success: function (res) {
    console.log(res)
    location.reload();
   
    },
    });


   }

}




function processCheckout(user_id) {
    $.ajaxSetup({
    headers: {
    'X-CSRF-TOKEN': "{{csrf_token()}}"
    }
    });

    $.ajax({
        url: '<?php echo $baseUrl; ?>/checkbeforecheckout',
        data: {userid: user_id},
        type: 'POST',
        success: function (data) {
        console.log(data.trim())
        if (data.trim() == 'process') {
            window.location.href = "<?php echo $baseUrl; ?>/checkout";
        } else {
            alert(data);
            //location.reload();
        }
        },
    });

}
</script>
