@extends('Layouts.app')
@section('title')
    <title>Amplepoint</title>
@endsection

@include('includes.head')
@include('includes.header')
<style>
  .slick-slide img {
    width: 301px;
    display: block;
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
        z-index: 1; /* Adjust the z-index to bring the button above other elements */
    }

    .slick-prev {
        left: 50px;
    }

    .slick-next {
        right: 10px;
    }
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
  









{{-- home slider --}}
<br>
<br>
@foreach($datas as $key=>$val)
@if($val->productAvailable==true)

<div class="slider-info" style="text-align: right;" id="sliderInfo{{$val->id}}">
  Group 1 of {{$val->slider_no}}
</div>


<h1 class="text-center">{{$val->vendorDetails->tbl_vndr_dispname}}</h1>
<div class="slider-container" id="slider{{$val->id}}">
  
  @foreach($val->products_under_a_brand as $val2)
  <div class="product-slide">
    <img src="https://amplepoints.com/product_images/{{$val2->pid}}/{{$val2->img_name}}"
    alt="1595664013_t_las-vegas-mall.png">
    <h3>Product name: {{$val2->pname}}</h3>
    <p>{{$val->vendorDetails->tbl_vndr_dispname}}</p>
    <p>price: ${{$val2->pprice}}</p>
    <p>discount: {{$val2->pdiscount}}% Back</p>
    <p>Get {{$val2->pamples}} AmplePoints (${{$val2->pdiscountprice}})
      <br>
    or get it FREE with {{$val2->pfwamples}} points</p>
  </div>
  @endforeach
    
</div>
<br>
<hr>
<br>

<script>
    $(document).ready(function(){
        // Initialize slider 1
        $('#slider{{$val->id}}').slick({
            slidesToShow: 5,
           slidesToScroll: 5,
            autoplay: true,
            autoplaySpeed: 5000,
            // dots: true,
            infinite: true,
             prevArrow: '<button type="button" class="slick-prev">Previous</button>',
            nextArrow: '<button type="button" class="slick-next">Next</button>'
        });



        var slidesToShow = 5; // Adjust the number of slides to show at a time
        var slidesToScroll = 5; // Adjust the number of slides to scroll

         // Add event listener to update slider info
            $('#slider{{$val->id}}').on('afterChange', function (event, slick, currentSlide, nextSlide) {
                updateSliderInfo{{$val->id}}(currentSlide);
            });

            // Function to update slider info
            function updateSliderInfo{{$val->id}}(currentSlide) {
                var totalSlides = $('#slider{{$val->id}}').slick('getSlick').slideCount;
                var currentGroup = Math.floor(currentSlide / slidesToScroll) + 1;
                var totalGroups = Math.ceil(totalSlides / slidesToScroll);

                $('#sliderInfo{{$val->id}}').text('Group ' + currentGroup + ' of ' + totalGroups);
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
@endsection
