@extends('Layouts.app')

@section('meta')
    {{-- all meta tags --}}
@endsection

@section('title')
    <title>Amplepoints | Category By Mail</title>
@endsection

@include('includes.head')
@include('includes.new_head')
@include('includes.header')

<style>
.header-logo .imgroundeds {
height: auto;
position: relative;
width: 100%;
/*top: 9px;*/
}

.bannerplayer {
height: 800px;
overflow: hidden;
}
a.header-logo img:first-child {
display: none;
}
a.header-logo img {
height: 100%;
width: auto;
}
.vendor-div > ul {
border-bottom: 1px solid #eaeaea;
position: relative;
top: 30px;
width: 100%;
}
/*.maxxvendor-detail .vendor-div-box {
margin: 11px;
width: 14.7%;
}*/
.content.maxxvendor-detail {
margin: 40px 0 0;
}
#page_navigation a {
padding: 3px;
border: 1px solid gray;
margin: 2px;
color: black;
text-decoration: none
}
.active_page {
background: #f75d00 none repeat scroll 0 0;
color: #fff;
}
@media (min-width: 1280px) {
.carousel-inner {
max-height: 630px;
}
.mall-banner #carousel-example-generic .carousel-inner .item, #carousel-example-generic.vendor-section-bnr .carousel-inner .item {
background-size: auto 560px !important;
height: 540px !important;
width: 100%;
}
#parallex-div-div-a {
bottom: -18px;
left: 0;
margin: 0 auto;
position: absolute;
right: 0;
text-align: center;
top: auto;
width: 1149px;
}
#parallex-div-div-a .container {
margin: 0 !important;
padding: 0 !important;
width: 100%;
background-color: transparent;
height: auto;
}
.parallax-img-a {
background: #ffffff none repeat scroll 0 0;
border: 4px solid #ffffff;
border-radius: 9px;
bottom: 0;
box-shadow: 0 3px 5px 1px #565656;
display: block;
float: right;
height: 177px !important;
left: 0;
margin: 0 0 -38px !important;
padding: 5px 10px;
position: static;
right: 0;
top: auto;
width: 168px;
}
}
</style>








<?php $admin_model_obj =  new \App\Models\AdminImpFunctionModel; 
 //dd($resultonecatbymalllist[0]->banner_status);
?>

<div class="mallpages">
    <section>
        <div class="mall-banner">
            <div class="all-start-a social-img-social">
                <?php if ($resultonecatbymalllist[0]->banner_status == '1') { ?>

                    <div class="bannerplayer">
                        <video autoplay loop muted>
                        	https://amplepoints.com/mall/video/Las Vegas - Top 10 Attractions  2017 4K.mp4

                        	 <source src="https://amplepoints.com/mall/video/{{$resultonecatbymalllist[0]->banner_video}}" type="video/mp4"/>
                            <source src="https://amplepoints.com/mall/video/{{$resultonecatbymalllist[0]->banner_video}}"
                                    type="video/webm"/>

                           {{--  <source src="<?php echo $admin_model_obj->cdnUrl('public/mall/video/' . $resultonecatbymalllist[0]->banner_video); ?>"
                                    type="video/mp4"/>
                            <source src="<?php echo $admin_model_obj->cdnUrl('public/mall/video/' . $resultonecatbymalllist[0]->banner_video); ?>"
                                    type="video/webm"/> --}}
                        </video>
                    </div>

                    <div id="parallex-div-div">
                        <div class="container">

                            <div class="col-lg-3 img-parallax-img-img">
                                <div class="img-parallax">
                                    <div class="top-banner-img-a">
                                        <img src="<?php if ($resultonecatbymalllist[0]->logo_image) {
                                            echo $admin_model_obj->cdnUrl('public/mall/logo/' . $resultonecatbymalllist[0]->logo_image);
                                        } else {
                                            echo $admin_model_obj->cdnUrl('public/images/img/user2.jpg');
                                        } ?>" class="imgrounded">
                                    </div>



                                    <div style="display:none;">
                                        <img src="<?php if ($resultonecatbymalllist[0]->top_logo) {
                                            echo $admin_model_obj->cdnUrl('public/mall/top_logo/' . $resultonecatbymalllist[0]->top_logo);
                                        } else {
                                            echo $admin_model_obj->cdnUrl('public/images/img/user2.jpg');
                                        } ?>" class="imgroundeds">
                                    </div>

                                    <div class="top-banner-text-a">
                                        <h6><?php echo substr($resultonecatbymalllist[0]->display_name, 0, 19); ?></h6>
                                    </div>
                                </div>
                            </div>

                            <div class="col-lg-6  no-space">
                            </div>

                        </div>
                    </div>
                    <div id="parallex-div-div-a">
                        <div class="container">
                            <ul class="mall-des">
                                <li><a href="{{-- <?php echo $this->baseUrl('/about-us'); ?> --}}">About Us</a></li>
                                <li><a href="">Map</a></li>
                                <li><a href="#">Hours</a></li>
                                <li><a href="#">Events</a></li>
                                <li><a href="#">Video Reviews</a></li>
                                <li><a href="{{-- <?php echo $this->baseUrl('/social'); ?> --}}">Social</a></li>
                            </ul>
                            <div class="col-lg-3 img-parallax-img-img  parallax-img-a ">
                                <div class="img-parallax">
                                    <div class="top-banner-text-a">
                                        <h6><?php echo substr($resultonecatbymalllist[0]->display_name, 0, 19); ?></h6>
                                    </div>
                                    <div class="top-banner-img-a">
                                        <img src="<?php if ($resultonecatbymalllist[0]->logo_image) {
                                            echo $admin_model_obj->cdnUrl('public/mall/logo/' . $resultonecatbymalllist[0]->logo_image);
                                        } else {
                                            echo $admin_model_obj->cdnUrl('public/images/img/user2.jpg');
                                        } ?>" class="imgrounded"></div>
                                    <div style="display:none;">
                                        <img src="<?php if ($resultonecatbymalllist[0]->top_logo) {
                                            echo $admin_model_obj->cdnUrl('public/mall/top_logo/' . $resultonecatbymalllist[0]->top_logo);
                                        } else {
                                            echo $admin_model_obj->cdnUrl('public/images/img/user2.jpg');
                                        } ?>" class="imgroundeds">
                                    </div>
                                </div>
                            </div>

                            <div class="col-lg-6  no-space">
                            </div>

                        </div>
                    </div>















                <?php } else { ?>

                    <div id="carousel-example-generic" class="carousel fadeIn" data-ride="carousel">
                        <!-- Indicators -->

                        <!-- Wrapper for slides -->
                        <div class="carousel-inner" role="listbox">

                            <div class="item active"
                                 style="background:url(<?php if ($resultonecatbymalllist[0]->banner_img1) {
                                     echo $admin_model_obj->cdnUrl('public/mall/banner/' . str_replace(' ', '%20', $resultonecatbymalllist[0]->banner_img1));
                                 } else {
                                     echo $admin_model_obj->cdnUrl('public/images/loock-boock.jpg');
                                 } ?>) /*no-repeat fixed 50% 0%;  height:500px;*/">
                                &nbsp;
                            </div>
                            <div class="item"
                                 style="background:url(<?php if ($resultonecatbymalllist[0]->banner_img2) {
                                     echo $admin_model_obj->cdnUrl('public/mall/banner/' . str_replace(' ', '%20', $resultonecatbymalllist[0]->banner_img2));
                                 } else {
                                     echo $admin_model_obj->cdnUrl('public/images/loock-boock.jpg');
                                 } ?>) /*no-repeat fixed 50% 0%;  height:500px;*/">
                                &nbsp;
                            </div>
                            <div class="item"
                                 style="background:url(<?php if ($resultonecatbymalllist[0]->banner_img3) {
                                     echo $admin_model_obj->cdnUrl('public/mall/banner/' . str_replace(' ', '%20', $resultonecatbymalllist[0]->banner_img3));
                                 } else {
                                     echo $admin_model_obj->cdnUrl('public/images/loock-boock.jpg');
                                 } ?>) /*no-repeat fixed 50% 0%;  height:500px;*/">
                                &nbsp;
                            </div>
                            <div class="item"
                                 style="background:url(<?php if ($resultonecatbymalllist[0]->banner_img4) {
                                     echo $admin_model_obj->cdnUrl('public/mall/banner/' . str_replace(' ', '%20', $resultonecatbymalllist[0]->banner_img4));
                                 } else {
                                     echo $admin_model_obj->cdnUrl('public/images/loock-boock.jpg');
                                 } ?>) /*no-repeat fixed 50% 0%;  height:500px;*/">
                                &nbsp;
                            </div>
                        </div>
















                        <div id="parallex-div-div">
                            <div class="container">

                                <div class="col-lg-3 img-parallax-img-img">
                                    <div class="img-parallax">
                                        <div class="top-banner-img-a"><img
                                                    src="<?php if ($resultonecatbymalllist[0]->logo_image) {
                                                        echo $admin_model_obj->cdnUrl('public/mall/logo/' . $resultonecatbymalllist[0]->logo_image);
                                                    } else {
                                                        echo $admin_model_obj->cdnUrl('public/images/img/user2.jpg');
                                                    } ?>" class="imgrounded"></div>
                                        <div style="display:none;">
                                            <img src="<?php if ($resultonecatbymalllist[0]->top_logo) {
                                                echo $admin_model_obj->cdnUrl('public/mall/top_logo/' . $resultonecatbymalllist[0]->top_logo);
                                            } else {
                                                echo $admin_model_obj->cdnUrl('public/images/img/user2.jpg');
                                            } ?>" class="imgroundeds">
                                        </div>
                                        <div class="top-banner-text-a">
                                            <h6><?php echo substr($resultonecatbymalllist[0]->display_name, 0, 19); ?></h6>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-lg-6  no-space">
                                </div>

                            </div>
                        </div>

















                        <div id="parallex-div-div-a">
                            <div class="container">
                                <ul class="mall-des">
                                    <li><a href="{{-- <?php echo $this->baseUrl('/about-us'); ?> --}}">About Us</a></li>
                                    <li><a href="">Map</a></li>
                                    <li><a href="#">Hours</a></li>
                                    <li><a href="#">Events</a></li>
                                    <li><a href="#">Video Reviews</a></li>
                                    <li><a href="{{-- <?php echo $this->baseUrl('/social'); ?> --}}">Social</a></li>
                                </ul>
                                <div class="col-lg-3 img-parallax-img-img  parallax-img-a ">
                                    <div class="img-parallax">
                                        <div class="top-banner-text-a">
                                            <h6><?php echo substr($resultonecatbymalllist[0]->display_name, 0, 19); ?></h6>
                                        </div>
                                        <div class="top-banner-img-a"><img
                                                    src="<?php if ($resultonecatbymalllist[0]->logo_image) {
                                                        echo $admin_model_obj->cdnUrl('public/mall/logo/' . $resultonecatbymalllist[0]->logo_image);
                                                    } else {
                                                        echo $admin_model_obj->cdnUrl('public/images/img/user2.jpg');
                                                    } ?>" class="imgrounded"></div>
                                        <div style="display:none;">
                                            <img src="<?php if ($resultonecatbymalllist[0]->top_logo) {
                                                echo $admin_model_obj->cdnUrl('public/mall/top_logo/' . $resultonecatbymalllist[0]->top_logo);
                                            } else {
                                                echo $admin_model_obj->cdnUrl('public/images/img/user2.jpg');
                                            } ?>" class="imgroundeds">
                                        </div>
                                    </div>
                                </div>

                                <div class="col-lg-6  no-space">
                                </div>

                            </div>
                        </div>
                    </div>
                <?php } ?>
    </section>
</div>












<div class="container">
    <div class="content" id="productContainer">
        <div class="row">
            <div class="col-md-12 col-sm-12 col-xs-12">
                <?php

                if (!empty($resultcatmalllist)) {
                    foreach ($resultcatmalllist as $key) {
                        $CategoruWuseMall = $admin_model_obj->getvendorbymallIdAndCat($key->mall_id, $key->mall_direct_id);
                        if (!empty($CategoruWuseMall)) {

                            ?>
                            <div class="vendor-div">
                                <ul>
                                    <li><h4><?php echo $key->directory_name; ?> </h4></li>
                                </ul>









                                <div class="content" id="productContainer">
                                    <?php foreach ($CategoruWuseMall as $keyss) { ?>

                                        <?php $vendorName2 = strtolower(preg_replace('/\s+/', '', $keyss->vendor_displayname)); ?>

                                        <div class="vendor-div-box">
                                            <a href="{{url('/')}}/public/productbyseller/{{$vendorName2}}/{{$keyss->tbl_vndr_id}}">
                                                <div class="vendor-divimg">
                                                   

                                                    <img src="<?php if (!empty($keyss->vendor_profileimage)) {
                                                        echo $admin_model_obj->cdnUrl('public/vendor-data/' . $keyss->tbl_vndr_id . '/profile/' . $keyss->vendor_profileimage);
                                                    } else {
                                                        echo $admin_model_obj->cdnUrl('public/img/profile-img/avtar.jpg');
                                                    } ?>"
                                                         alt="<?php echo substr($keyss->vendor_displayname, 0, 12); ?>"/>
                                                </div>
                                                <div class="vendor-detail">
                                                    <h4>
                                                        <span><i class="fa fa-user"></i></span> <?php echo substr($keyss->vendor_displayname, 0, 17); ?>
                                                    </h4>
                                                    <h3>
                                                        <span><i class="fa fa-map-marker"></i></span> <?php echo $keyss->vendor_city; ?>
                                                    </h3>
                                                    <h5>
                                                        <span><i class="fa fa-thumb-tack"></i></span> <?php echo $keyss->tbl_vndr_zip; ?>
                                                    </h5>

                                                </div>
                                            </a>
                                        </div>

                                    <?php } ?>

                                </div>

                                <div class="clearfix"></div>

                            </div>

                        <?php }
                    }
                } else { ?>


                    <div class="alert alert-success alert-dismissable" style="margin-top: 100px;">
                        <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                        Sorry No Data Found!
                    </div>

                <?php } ?>
            </div>
        </div>
    </div>
</div>
</div>
</section>
</div>
<div class="all-start">
    <div class="columns-container">
        <div class="container" id="columns" style="display: none;">
            <!-- breadcrumb -->

            <!-- ./breadcrumb -->

            <!-- row -->
            <div class="row">
                <!-- Left colunm -->

                <!-- ./left colunm -->
                <!-- Center colunm-->
                <div class="center_column col-lg-12">

                    <div id="view-product-list" class="view-product-list social-me-a category-mall">


                        <!-- ./ Center colunm -->

                        <div class="sortPagiBar">
                            <div class="bottom-pagination">
                                <div class="pagination" style="margin-top:7px;" id='page_navigation'></div>
                                <!--<nav>
                                <ul class="pagination">
                                <li class="active"><a href="#">1</a></li>
                                <li><a href="#">2</a></li>
                                <li><a href="#">3</a></li>
                                <li><a href="#">4</a></li>
                                <li><a href="#">5</a></li>
                                <li>
                                <a href="#" aria-label="Next">
                                <span aria-hidden="true">Next &raquo;</span>
                                </a>
                                </li>
                                </ul>
                                </nav>-->
                            </div>
                            <!--<div class="show-product-item">
                            <select name="">
                            <option value="">Show 18</option>
                            <option value="">Show 20</option>
                            <option value="">Show 50</option>
                            <option value="">Show 100</option>
                            </select>
                            </div>-->
                            <div class="sort-product">
                                <select>
                                    <option value="">Store Name</option>
                                    <option value="">Zip</option>
                                </select>
                                <div class="sort-product-icon">
                                    <i class="fa fa-sort-alpha-asc"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- ./row-->
                </div>
            </div>
        </div>
        </section>
        <!-- ./page wapper-->
    </div>
 

  

 @include('includes.footer')
    @include('includes.script')

       <script>
        $(document).ready(function () {

            $(".header-logo img").remove();
            $(".header-logo").append($(".imgroundeds").clone());

        });
    </script>

    <script type="text/javascript">
    $(document).ready(function () {

        //how much items per page to show
        var show_per_page = 24;
        //getting the amount of elements inside content div
        var number_of_items = $('#productContainer').children().size();
        //calculate the number of pages we are going to have
        var number_of_pages = Math.ceil(number_of_items / show_per_page);

        //set the value of our hidden input fields
        $('#current_page').val(0);
        $('#show_per_page').val(show_per_page);

        //now when we got all we need for the navigation let's make it '

        /*
        what are we going to have in the navigation?
        - link to previous page
        - links to specific pages
        - link to next page
        */
        var navigation_html = '<a class="previous_link" href="javascript:previous();">Prev</a>';
        var current_link = 0;
        while (number_of_pages > current_link) {
            navigation_html += '<a class="page_link" href="javascript:go_to_page(' + current_link + ')" longdesc="' + current_link + '">' + (current_link + 1) + '</a>';
            current_link++;
        }
        navigation_html += '<a class="next_link" href="javascript:next();">Next</a>';

        $('#page_navigation').html(navigation_html);

        //add active_page class to the first page link
        $('#page_navigation .page_link:first').addClass('active_page');

        //hide all the elements inside content div
        $('#productContainer').children().css('display', 'none');

        //and show the first n (show_per_page) elements
        $('#productContainer').children().slice(0, show_per_page).css('display', 'block');

    });

    function previous() {

        new_page = parseInt($('#current_page').val()) - 1;
        //if there is an item before the current active link run the function
        if ($('.active_page').prev('.page_link').length == true) {
            go_to_page(new_page);
        }

    }

    function next() {
        new_page = parseInt($('#current_page').val()) + 1;
        //if there is an item after the current active link run the function
        if ($('.active_page').next('.page_link').length == true) {
            go_to_page(new_page);
        }

    }

    function go_to_page(page_num) {
        //get the number of items shown per page
        var show_per_page = parseInt($('#show_per_page').val());

        //get the element number where to start the slice from
        start_from = page_num * show_per_page;

        //get the element number where to end the slice
        end_on = start_from + show_per_page;

        //hide all children elements of content div, get specific items and show them
        $('#productContainer').children().css('display', 'none').slice(start_from, end_on).css('display', 'block');

        /*get the page link that has longdesc attribute of the current page and add active_page class to it
        and remove that class from previously active page link*/
        $('.page_link[longdesc=' + page_num + ']').addClass('active_page').siblings('.active_page').removeClass('active_page');

        //update the current page input field
        $('#current_page').val(page_num);
    }

</script>