@extends('Layouts.app')
@section('title')
<title>Amplepoint</title>
@endsection
@include('includes.head')
@if(@Auth::user()->user_id)
@include('includes.new_head')
@endif
@include('includes.header')
<link href="https://fonts.googleapis.com/css2?family=Bebas+Neue&display=swap" rel="stylesheet">
<style>
    .modal-backdrop {
    opacity: 0.5;
    background-color: rgba(0, 0, 0, 0.5); /* Adjust as needed */
}

/* Override Bootstrap's modal fade class */
.fade {
    opacity: 1 !important;
    visibility: visible !important;
}
</style>
<style>
html,body{
overflow-x: hidden;
}
.slick-prev,
.slick-next {
font-size: 18px;
background-color: #fff;
border: 1px solid #ddd;
padding: 10px;
cursor: pointer;
position: absolute;
top: 50%;
transform: translateY(-50%);
z-index: 1;
/* Adjust the z-index to bring the button above other elements */
}
.slick-prev {
left: 10px;
}
.slick-next {
right: 30px;
}
.slick-prev, .slick-next {
background: none;
border: none;
}
/* home banner slider */
.p-wrapper {
border: 2px solid #afaeae;
background-color: #fff;
display: inline-block;
border-radius: 5px;
font-size: 18px;
color: #000;
font-weight: bold;
width: 100%;
position: relative;
overflow: hidden;
}
.p-title {
font-size: 18px;
color: #000;
font-weight: bold;
height: 21px;
overflow: hidden;
text-overflow: ellipsis;
white-space: nowrap;
width: 100%;
margin-bottom: 10px;
}
.p-a-tag {
text-decoration: none !important;
}
.p-slide {
padding: 6px;
font-family: sans-serif;
}
.p-img {
min-height: 325px;
object-fit: cover;
vertical-align: middle;
}
.p-name {
margin: 10px 0 0;
}
.p-price-main {
margin: 6px 0 7px;
}
.p-price {
color: #4177e2;
font-size: 22px;
font-weight: 500;
outline: 0;
font-family: "Bebas Neue", sans-serif;
}
.p-off-back {
text-align: center;
background: #d5dff3;
color: #4177e2;
font-weight: bold;
font-size: 16px;
border: 1px solid #d5dff3;
border-radius: 5px;
padding: 5px !important;
margin-left: 5px;
}
.p-ample-offer {
font-size: 14px;
white-space: nowrap;
overflow: hidden;
text-overflow: ellipsis;
margin-bottom: 5px;
}
.p-ample-offer b {
color: #f75d00;
}
.p-btn {
background-color: #f96d10;
position: absolute;
left: 0;
right: 0;
bottom: -70px;
width: 93%;
background-color: rgba(0, 0, 0, .4);
color: #fff;
text-align: center;
line-height: 50px;
-moz-transition: all .45s ease;
-webkit-transition: all .45s ease;
-o-transition: all .45s ease;
-ms-transition: all .45s ease;
transition: all .45s ease;
margin: 0 auto;
outline: none !important;
border: none !important;
}
.p-wrapper:hover .p-btn {
margin: 0 auto;
background-color: rgba(255, 65, 0, .8);
bottom: 30%;
transform: scale(1.1);
}
.p-title,
.p-name,
.p-price-main,
.p-ample-offer {
padding-left: 10px;
}
.p-img {
object-fit: contain;
}
/* home banner slider */
</style>
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
{{-- home slider --}}
<br>
<br>
@foreach ($datas as $key => $val)
@if ($val->productAvailable == true)
{{-- <div class="slider-info" style="text-align: right;" id="sliderInfo{{ $val->id }}">
    Group 1 of {{ $val->slider_no }}
</div> --}}
<h1 class="text-center">{{ $val->vendorDetails->tbl_vndr_dispname }}</h1>
<div class="slider-container" id="slider{{ $val->id }}">
    @foreach ($val->products_under_a_brand as $val2)
    {{-- <div class="product-slide">
        <img src="https://amplepoints.com/product_images/{{$val2->pid}}/{{$val2->img_name}}"
        alt="1595664013_t_las-vegas-mall.png">
        <h3>Product name: {{$val2->pname}}</h3>
        <p>{{$val->vendorDetails->tbl_vndr_dispname}}</p>
        <p>price: ${{$val2->pprice}}</p>
        <p>discount: {{$val2->pdiscount}}% Back</p>
        <p>Get {{$val2->pamples}} AmplePoints (${{$val2->pdiscountprice}})
            <br>
        or get it FREE with {{$val2->pfwamples}} points</p>
    </div> --}}
    <div class="product-slide p-slide">
        <div class="p-wrapper">
            <div class="p-title">{{ $val2->pname }}</div>
            <a href="{{route('member.product.details.page',$val2->pid)}}" class="p-a-tag"><img class="p-img"
            src="https://amplepoints.com/product_images/{{ $val2->pid }}/{{ $val2->img_name }}"></a>
            <div class="p-name">{{ $val->vendorDetails->tbl_vndr_dispname }}</div>
            <div class="p-price-main">
                <span class="p-price">${{ $val2->pprice }}</span>
                <span class="p-off-back">{{ $val2->pdiscount }}% Back</span>
            </div>
            <div class="p-ample-offer">
                Get <b>{{ $val2->pamples }}</b> AmplePoints (<b>${{ $val2->pdiscountprice }}</b>)
                <br>
                or get it <b>FREE</b> with <b>{{ $val2->pfwamples }}</b> points
            </div>
            <button type="button" class="p-btn">Add to Cart</button>
        </div>
    </div>
    @endforeach
</div>
<br>
<hr>
<br>
<script>
$(document).ready(function() {
// Initialize slider 1
$('#slider{{ $val->id }}').slick({
slidesToShow: 5,
slidesToScroll: 5,
// autoplay: true,
autoplaySpeed: 5000,
// dots: true,
infinite: true,
prevArrow: '<button type="button" class="slick-prev">Previous</button>',
nextArrow: '<button type="button" class="slick-next">Next</button>',
responsive: [
    {
        breakpoint: 600,
        settings: {
            slidesToShow: 1,
            slidesToScroll: 1
        }
    },
    {
        breakpoint: 480,
        settings: {
            slidesToShow: 1,
            slidesToScroll: 1
        }
    }
]
});
var slidesToShow = 5; // Adjust the number of slides to show at a time
var slidesToScroll = 5; // Adjust the number of slides to scroll
// Add event listener to update slider info
$('#slider{{ $val->id }}').on('afterChange', function(event, slick, currentSlide, nextSlide) {
updateSliderInfo{{ $val->id }}(currentSlide);
});
// Function to update slider info
function updateSliderInfo{{ $val->id }}(currentSlide) {
var totalSlides = $('#slider{{ $val->id }}').slick('getSlick').slideCount;
var currentGroup = Math.floor(currentSlide / slidesToScroll) + 1;
var totalGroups = Math.ceil(totalSlides / slidesToScroll);
$('#sliderInfo{{ $val->id }}').text('Group ' + currentGroup + ' of ' + totalGroups);
}
});
</script>
@endif
@endforeach
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
@include('member.videos.advertisement')

@endsection