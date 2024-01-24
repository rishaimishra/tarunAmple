@extends('Layouts.app')

@section('meta')
    {{-- all meta tags --}}
@endsection

@section('title')
    <title>Amplepoints | Checkout</title>
@endsection

@include('includes.head')
@include('includes.header')

<style type="text/css">
    /*.dropdown-menu{
    left:15px !important;
    }
    .mega-dropdown {
    position: static !important;
    } */
    .dropdown-menu { left: -407px !important; }
    .mega-dropdown-menu { padding: 20px 0px; width: 1172px; box-shadow: none; -webkit-box-shadow: none; }
    .mega-dropdown-menu > li > ul { padding: 0; margin: 0; }
    .mega-dropdown-menu > li > ul > li { list-style: none; }
    .mega-dropdown-menu > li > ul > li > a { display: block; color: #222; padding: 0px 5px !important; line-height: 30px; }
    .mega-dropdown-menu > li ul > li > a:hover,  .mega-dropdown-menu > li ul > li > a:focus { text-decoration: none; color: #ff3546 !important; }
    .mega-dropdown-menu .dropdown-header { font-size: 18px; color: #ff3546; padding: 5px 60px 5px 5px; line-height: 30px; }
    .carousel-control { width: 30px; height: 30px; top: -35px; }
    .left.carousel-control { right: 30px; left: inherit; }
    .amplifyonli { float: left; width: 166px; }
    .n nav a { padding: 5px 12px !important;font-family: sans-serif; }
    .tab-content.cus-dash-board { min-height: 1100px; }
    #totalitemdata .p-right { color: #929292; float: left; font-size: 15px; padding: 0 0 0 12px; width: 60%; }
    #totalitemdata .p-right .remove_link { border: 2px solid #f2676b !important; color: #f2676b; display: block; float: none; height: auto !important; margin: 8px 0 0; padding: 5px 0; position: static; text-align: center; width: 100px; }
    #totalitemdata .p-right .p-rice { color: #f2676b; font-size: 17px; }
    .wishist-iteam { background: #ffffff none repeat scroll 0 0; box-shadow: 0 12px 4px rgba(0, 0, 0, 0.4); height: 600px; overflow: auto; position: absolute; right: 0; width: 300px; }
    #header .header-mini-cart .shopping-cart-content { height: 600px; overflow: auto; }
    .wishist-iteam .col-md-12 { margin: 0; padding: 0; }
    .wishist-iteam th { display: none; }
    .wishist-iteam .qty { display: none; }
    .wishist-iteam .item-content-a { padding: 0; }
    .wishist-iteam .cart_product { padding: 0; width: auto; }
    .wishist-iteam .cart_description { padding: 0 0 0 15px; position: relative; text-align: left; }
    .wishist-iteam .cart_description span { background: rgba(0, 0, 0, 0) none repeat scroll 0 0 !important; color: #ff0000 !important; display: block !important; font-size: 16px !important; position: static !important; }
    .wishist-iteam .cart_description .product-name a { width: 100% !important; }
    .filterable { margin-top: 15px; }
    .filterable .panel-heading .pull-right { margin-top: -20px; }
    .filterable .filters input[disabled] { background-color: rgba(0, 0, 0, 0); border: medium none; box-shadow: none; cursor: auto; height: auto; padding: 0; }
    .filterable .filters input[disabled]::-moz-placeholder {
    color: #333333;
    }
    #header { z-index: 2147483647 !important; }
    .images-popsme { position: absolute; z-index: 9999; }
    .multiple_emails-container { border: 1px solid #cccccc; border-radius: 4px; box-shadow: 0 1px 1px rgba(0, 0, 0, 0.075) inset; cursor: text; margin: 0; padding: 0; width: 100%; }
    .multiple_emails-container input { border: 0 none; box-sizing: border-box; clear: both; height: 25px; margin-bottom: 3px; outline: medium none; padding-left: 5px; width: 100%; }
    .multiple_emails-container input { border: 0 none !important; }
    .multiple_emails-container input.multiple_emails-error { box-shadow: 0 1px 1px rgba(0, 0, 0, 0.075) inset, 0 0 6px #ff0000 !important; outline: thin auto #ff0000 !important; }
    .multiple_emails-container ul { list-style-type: none; padding-left: 0; }
    .multiple_emails-email { background: #f3f7fd none repeat scroll 0 0; border: 1px solid #bbd8fb; border-radius: 3px; float: left; margin: 3px 5px; padding: 3px 5px; }
    .multiple_emails-close { float: left; margin: 0 3px; }
    ul.first-forth li:nth-child(1) { z-index: 999; }
    ul.first-forth li:nth-child(2) { z-index: 999; }
    ul.first-forth li:nth-child(3) { z-index: 999; }
    ul.first-forth li:nth-child(4) { z-index: 999; }
    ul.first-forth li:nth-child(5) { z-index: 99; }
    ul.first-forth li:nth-child(6) { z-index: 99; }
    ul.first-forth li:nth-child(7) { z-index: 99; }
    ul.first-forth li:nth-child(8) { z-index: 99; }
    ul.first-forth li:nth-child(9) { z-index: 9; }
    ul.first-forth li:nth-child(10) { z-index: 9; }
    ul.first-forth li:nth-child(11) { z-index: 9; }
    ul.first-forth li:nth-child(12) { z-index: 9; }
    .first { left: 0; top: 0; }
    .second { right: 0; top: 0; }
    .third { bottom: 0; left: 0; }
    .forth { bottom: 0; right: 0; }
    .ash-col .col-lg-4.col-padding-right-site { width: 32.4%; }
    .ash-col ul.first-forth li { position: absolute; }
    #ample-reward { background: #e3e4e3 none repeat scroll 0 0; float: left; padding: 25px 5px 100px; }
    .first-forth li.mylogoset { display: block !important; opacity: 1 !important; }
</style>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd"><head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="keywords" content="Ample Points,amplepoints.com,Online Shoping,entertainment,nightlife,restaurants,local deals,local services,beauty,spas,fashion,jewelry,watches,electronics,office,home,movies,music,games,health,fitness,automotive,real estate,travel,getaway,gifts,seasonal">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="Ample points is an exclusive online shopping destination that rewards users for watching ads, shopping the hottest brands, and sharing with their friends. Shop on Ample points from local merchants and top brands all while earning reward points to use towards your next purchase.">
    <meta name="author" content="Ample points">
    <meta name="google-site-verification" content="QXEBSr4FV-Sfy7uosGahydp2QUMcIFWo6ytLXLKAIzo" />
    <meta name="p:domain_verify" content="475ee70ebbc9453eae72d248b1658a93"/>

    <title>Earn</title>
    <link rel='shortcut icon' type='image/x-icon' href="https://amplepoints.com/images/favicon.ico" >
    <link href="https://fonts.googleapis.com/css?family=Roboto+Condensed:400,700|Roboto+Mono:300,400,500,700|Roboto:100,300,400,500,900" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="https://amplepoints.com/newcss/css/font-awesome/css/font-awesome.css" />
    <link rel="stylesheet" type="text/css" href="https://amplepoints.com/newcss/css/font-awesome/css/font-awesome.min.css" />

    <link rel="stylesheet" type="text/css" href="https://amplepoints.com/newcss/fonts/glyphicons-halflings-regular.ttf" />
    <link rel="stylesheet" type="text/css" href="https://amplepoints.com/newcss/css/bootstrap.min.css" />
    <link rel="stylesheet" type="text/css" href="https://amplepoints.com/newcss/css/main-style.css" />
    <link rel="stylesheet" type="text/css" href="https://amplepoints.com/newcss/css/amplepoint-style.css" />
    <link rel="stylesheet" type="text/css" href="https://amplepoints.com/newcss/css/amples.css" />
    <link rel="stylesheet" type="text/css" href="https://amplepoints.com/newcss/css/variables.css" >
    <link rel="stylesheet" type="text/css" href="https://amplepoints.com/newcss/css/prodect-a.css" >
    <link rel="stylesheet" type="text/css" href="https://amplepoints.com/newcss/css/prodect-b.css" >
    <link rel="stylesheet" type="text/css" href="https://amplepoints.com/newcss/css/search-header.css" />
    <link rel="stylesheet" type="text/css" href="https://amplepoints.com/newcss/css/POPUP.css" >
    <link rel="stylesheet" type="text/css" href="https://amplepoints.com/newcss/css/responsive.css" >
    <link rel="stylesheet" type="text/css" href="https://amplepoints.com/newcss/css/flyPanels.css" >
    <link rel="stylesheet" type="text/css" href="https://amplepoints.com/newcss/css/prodect-detail.css" >
    <link rel="stylesheet" type="text/css" href="https://amplepoints.com/newcss/css/jquery-ui.css" >
    <link rel="stylesheet" type="text/css" href="https://amplepoints.com/newcss/css/animate-login.css" >
    <link rel="stylesheet" type="text/css" href="https://amplepoints.com/newcss/css/replica.css" >

    <link rel="stylesheet" type="text/css" href="https://amplepoints.com/shopping_cart/vasplus_programming_blog_shopping_cart_v4.css" >




<?php
$baseUrl = url('/');
$admin_model_obj =  new \App\Models\AdminImpFunctionModel;
?>
<!--<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>-->

{{-- <script type="text/javascript"  src="<?php echo $admin_model_obj->cdnUrl('newcss/css/jquery.fullscreen.js'); ?>"></script> --}}





{{-- part-1 --}}

<script type="text/javascript"
        src="https://amplepoints.com/newcss/css/jquery.fullscreen.js"></script>
<style>
    <?php if( @$displayTopBar == true) { ?>

    .game-wrapper {
        margin: 10% auto 0;
        background: url(/images/moviescreen_1.png);
        background-repeat: no-repeat;
        background-size: cover;
    }

    <?php }else { ?>

    .game-wrapper {
        margin: 5% auto 0;
        background: url(/images/moviescreen_1.png);
        background-repeat: no-repeat;
        background-size: cover;
    }

    <?php } ?>

</style>
@include('member.videos.all_videos_css')






<?php


?>



















{{-- part-2 --}}

<?php

$adverise = array();

if (count($amplesdatas) > 0) {

    $db_host_name = env('DB_HOST');
    $db_user_name = env('DB_USERNAME');
    $db_user_password = env('DB_PASSWORD');
    $db_database_name = env('DB_DATABASE');
    $port = env('DB_PORT');

    $con = mysqli_connect($db_host_name, $db_user_name, $db_user_password, $db_database_name,$port);

    if (!$con) {
        die('could not connect' . mysqli_error($con));
    }
    mysqli_select_db($con, $db_database_name);

  $igd = 38441;   //$record->user_id;

    //$forTotalRecord = mysqli_query($con,"SELECT * FROM `tbl_advertises` WHERE `status` = '1'");
    //$toatalAdds = mysqli_num_rows($forTotalRecord);

    $resrfff = mysqli_query($con, "SELECT  * FROM `tbl_user_interest` where customerId = '$igd' and isselected = 1 ");

    $interestrow = mysqli_num_rows($resrfff);

    if ($interestrow > 0) {

        while ($rowyrff = mysqli_fetch_row($resrfff)) {
            $datarff[] = $rowyrff['2'];
        }

        $arrd1 = array_unique($datarff);

        foreach ($amplesdatas as $key) {

            $my_id = $key->adver_id;

            $datarhh = array();

            $resrhh = mysqli_query($con, "SELECT  * FROM `adver_intrest` where add_id = '$my_id' ");

            $adverinterst = mysqli_num_rows($resrhh);

            if ($adverinterst > 0) {

                while ($rowyrhh = mysqli_fetch_row($resrhh)) {
                    $datarhh[] = $rowyrhh['2'];
                }
                $arrd2 = array_unique($datarhh);
                //print_r($arrd2);
                //print_r($arrd1);
                //print_r($arrd2);
                $resultfix = array_intersect($arrd2, $arrd1);

                $resultfixrow = count($resultfix);
                //echo $resultfixrow;
                if ($resultfixrow > 0) {

                    $adverise[] = $key;
                }

            }

        }
    }
}

// echo "<pre>";print_r($adverise);die;

$toatalAdds = count($adverise);

?>


















{{-- part-3 --}}
<script>
    var incadd = 1;
    var from_row = 3;
    var totalAdds = '<?php echo $toatalAdds - 1; ?>';
    var UserIdAdd = '<?php echo $usrmakey; ?>';
    var rotationaddInterval;



    function startAddRotation() {

        rotationaddInterval = setInterval(function () {
            /* $('.first-forth li').fadeTo();
            $('.first-forth li:nth-child(1)').appendTo('.first-forth');*/
            if (totalAdds == from_row) {
                from_row = 0;
            } else {
                from_row = from_row + 1;
            }
             $.ajaxSetup({
                headers: {
                'X-CSRF-TOKEN': "{{csrf_token()}}"
                }
                });


            if (incadd == 1) {
                $.ajax({
                    url: '<?php echo $baseUrl; ?>/category_filter/loadmorelplayeraddnew.php',
                    data: {user_id: UserIdAdd, from_add: from_row},
                    type: 'GET'
                })
                    .done(function (data) {
                        //alert(data);
                        $('#addid_1').html(data);
                    })
                incadd = 4;
            } else if (incadd == 4) {
                $.ajax({
                    url: '<?php echo $baseUrl; ?>/category_filter/loadmorelplayeraddnew.php',
                    data: {user_id: UserIdAdd, from_add: from_row},
                    type: 'GET'
                })
                    .done(function (data) {
                        //alert(data);
                        $('#addid_4').html(data);
                    })
                incadd = 2
            } else if (incadd == 2) {
                $.ajax({
                    url: '<?php echo $baseUrl; ?>/category_filter/loadmorelplayeraddnew.php',
                    data: {user_id: UserIdAdd, from_add: from_row},
                    type: 'GET'
                })
                    .done(function (data) {
                        //alert(data);
                        $('#addid_2').html(data);
                    })
                incadd = 3
            } else if (incadd == 3) {
                $.ajax({
                    url: '<?php echo $baseUrl; ?>/category_filter/loadmorelplayeraddnew.php',
                    data: {user_id: UserIdAdd, from_add: from_row},
                    type: 'GET'
                })
                    .done(function (data) {
                        //alert(data);
                        $('#addid_3').html(data);
                    })
                incadd = 1
            }


        }, 4000);

    }






    function stopAddRotation() {

        clearInterval(rotationaddInterval);
        console.log("Stop Add Rotation");
    }
</script>




















{{-- part-4 --}}

<div class="game-wrapper mynewgame" id="fullscreen">
    <script type="text/javascript">
        $(function () {
            // check native support
            $('#support').text($.fullscreen.isNativelySupported() ? 'supports' : 'doesn\'t support');

            // open in fullscreen
            $('#fullscreen .requestfullscreen').click(function () {
                $('#fullscreen').addClass("makeactive-full");
                $('#fullscreen').fullscreen();
                return false;
            });

            // exit fullscreen
            $('.exitfullscreen-close').click(function () {
                $('#fullscreen').removeClass("makeactive-full");
                $.fullscreen.exit();
                return false;
            });

            // document's event
            $(document).bind('fscreenchange', function (e, state, elem) {
                // if we currently in fullscreen mode
                if ($.fullscreen.isFullScreen()) {

                } else {
                    $('#fullscreen .requestfullscreen').show();

                }

                $('#state').text($.fullscreen.isFullScreen() ? '' : 'not');
            });
        });

    </script>
























    {{-- part-5 --}}
    <div id="fullscreen-btn">
        <a href="#" class="requestfullscreen">fullscreen</a>
        <a href="#" class="exitfullscreen-close"> closefullscreen</a>
        <!--<a href="#" class="showme-full">showwwwwwwwww</a>
        <a href="#" class="exitshowme-full"> ***************</a>-->
    </div>
    <div class="game-left-box">

        <!------------strat video page----------------->
        <div class="video-player">

            <div class="player">
                <div class="mediaplayer">
                    <video class="src1"
                           poster="<?php echo $admin_model_obj->cdnUrl('adver_images/video/The 30-Second Video.mp4'); ?>"
                           preload="none">
                        <source class="src2"
                                src="<?php echo $admin_model_obj->cdnUrl('adver_images/video/The 30-Second Video.mp4'); ?>"
                                type="video/mp4"/>
                        <source class="src3"
                                src="<?php echo $admin_model_obj->cdnUrl('adver_images/video/The 30-Second Video.mp4'); ?>"
                                type="video/webm"/>
                    </video>
                </div>


                <div class="top-set-video">

                    <input value="play" type="button" class="play"/>
                    <span><span class="current-time timersspan"></span><br/><span class="duration"></span></span>
                </div>
            </div>

        </div>
        <div class="frame">
            <div class="player">
                <div class="mediaplayer" id="mymeidas">

                </div>
            </div>
        </div>






















{{-- part-6 --}}
        <script>
            //add some controls
            jQuery(function ($) {
                $('div.player').each(function () {
                    var player = this;
                    var getSetCurrentTime = createGetSetHandler(
                        function () {
                            $('input.time-slider', player).prop('value', $.prop(this, 'currentTime'));
                        }, function () {

                        });

                    $('video, audio', this).bind('durationchange updateMediaState', function () {
                        var duration = $.prop(this, 'duration');
                        if (!duration) {
                            return;
                        }

                        $('span.duration', player).text(duration);
                    }).bind('timeupdate', function () {


                        $('span.current-time', player).text($.prop(this, 'currentTime'));
                    }).bind('timeupdate', getSetCurrentTime.get).bind('emptied', function () {
                        $('input.time-slider', player).prop('disabled', true);
                        $('span.duration', player).text('--');
                        $('span.current-time', player).text(0);
                    })

                    $('input.play', player).bind('click', function () {
                        $('video, audio', player)[0].play();
                    });
                    $('input.pause', player).bind('click', function () {
                        $('video, audio', player)[0].pause();
                    });

                });
            });

            function createGetSetHandler(get, set) {

                return {
                    get: function () {
                        if (blocked) {
                            return;
                        }
                        return get.apply(this, arguments);
                    },

                };
            };
        </script>
        <script>
            $("body").on("click", ".clocse-my-video", function (event) {
                condole.log('clocse-my-video call in earn file');
                clearTimeout(mytimeout);
                $('.video-player').css('display', 'none');
                $('.main-wpappers').css('display', 'block');
                startAddRotation();
            });

            $("body").on("click", ".main-logo", function (event) {

                stopAddRotation();
                console.log("Main Logo Click");
                $('.game-left-box .main-wpappers').append("<div class='myunick'></div>");

                //alert("hy");
                var ID = $(this).attr('id');
                var vedioname = $("#" + ID).siblings("input[name=hiddenvaldd]").val();
                var type = $("#" + ID).siblings("input[name=hiddenvaldver]").val();
                var poster = $("#" + ID).siblings("input[name=hiddenposter]").val();
                var adver_id = $("#" + ID).siblings("input[name=hiddenaddverid]").val();
                var user_id = $("#" + ID).siblings("input[name=hiddenuserid]").val();
                var vedio_link = '<?php echo $admin_model_obj->cdnUrl("adver_images/video/"); ?>' + vedioname;
                //var vedio_link = 'http://amplepoints.local/adver_images/video/'+vedioname;

                //alert(vedioname);
                //alert(type);
                //alert(poster);
                //alert(adver_id);
                //alert(user_id);
                if (type == 'static') {
                     $.ajaxSetup({
                    headers: {
                    'X-CSRF-TOKEN': "{{csrf_token()}}"
                    }
                    });


                    $.ajax({
                        url: '<?php echo $baseUrl; ?>/category_filter/staticfilter.php',
                        //url: 'http://amplepoints.local/category_filter/staticfilter.php',
                        data: {adverid: adver_id, user_id: user_id},
                        type: 'GET'
                    })
                        .done(function (data) {

                            //  alert(data);
                            //$('.cf').addClass('slider-mainbox');
                            //$('.main-slider-shocase-box').css('display','block');
                            //$('.main-slider-shocase-box').html(data);

                            $('.main-slider-shocase-box').css('display', 'block');
                            $('.box-l-player-slid').html(data);

                            $('.l-player-slid li:nth-child(1)').addClass('first-l');
                            $('.l-player-slid li:nth-child(2)').addClass('second-l');
                            $('.l-player-slid li:nth-child(3)').addClass('third-l');
                            $('.l-player-slid li:nth-child(4)').addClass('forth-l');
                            $('.l-player-slid li:nth-child(5)').addClass('fifth-l');
                            //timedCount();

                        })
                    newmyFunction();
                } else {

                    $('.mediaplayer iframe')[0].contentWindow.postMessage('{"event":"command","func":"' + 'pauseVideo' + '","args":""}', '*');
                    $('.game-left-box > .frame').css('zIndex', 0);
                    $('.mynewgame .video-player').css('zIndex', 3000);

                    //alert(vedio_link);
                    //$('.src1').attr('poster',vedio_link);
                    //$('.src2').attr('src',vedio_link);
                    //$('.src3').attr('src',vedio_link);
                     $.ajaxSetup({
                        headers: {
                        'X-CSRF-TOKEN': "{{csrf_token()}}"
                        }
                        });
                    $.ajax({
                        url: '<?php echo $baseUrl; ?>/category_filter/vediohomefilter.php',
                        //url: 'http://amplepoints.local/category_filter/vediohomefilter.php',
                        data: {adver_id: adver_id, vedio_link: vedio_link, user_id: user_id, poster: poster},
                        type: 'GET'
                    })
                        .done(function (data) {
                            $('.video-player').html(data);

                        })

                }

            });

        </script>


























{{-- part-7 --}}


        <!------------end video page----------------->
        <!------------start home page----------------->
        <?php if (!empty($adverise)) { ?>
            <script>
                jQuery(document).ready(function () {
                    startAddRotation();
                    /* var sixtime = 15;
                    var sixtyinterval = setInterval(function() {
                    $('.sixtysectime').text(sixtime);
                    console.log(sixtime);
                    sixtime = sixtime - 1;
                    if (sixtime == 0) {
                    clearInterval(sixtyinterval);
                    }
                    }, 1000);
                    setTimeout(function() {
                    $('.myunick').remove();
                    startAddRotation();
                    }, 16000);*/
                });
            </script>
        <?php } ?>
        <div class="main-wpappers">
            <?php //echo($this->userid);?>
            <?php if (!empty($adverise)) { ?>
                <!-- <div class='myunick' style=" background-color: #ffffff;opacity: 0.8;">
                <span class="sixtysectime"></span>
                <div class="clearfix"></div>
                <span class="sixtysec">Please Wait...</span>
                </div>-->
            <?php } else { ?>

                <div class='myunick' style=" background-color: #ffffff;opacity: 0.8;">
                   <span class="nointerest">We show you interest-based ads, please select your interests from the dashboard <a
                                 href="{{$baseUrl}}/dashboard"
                                 style="color: #f75d00;text-decoration: underline;">interests</a> section</span>
                </div>

            <?php } ?>





















{{-- part-8  --}}
@php
//dd($adverise);
@endphp

            <div class="lshapbottom"></div>
            <ul class="first-forth youtubeplayerfourcol">
                <?php if (!empty($adverise)) {
                    $i = 1;
                    foreach ($adverise as $key) {
                    	//dd($key->adver_id);

                        if ($i == 5) {

                            break;

                        } else {

                            ?>
                            <li id="addid_<?php echo $i; ?>">
                                <div class="ads-setss">
                                    <div id="dd_<?= $key->adver_id; ?>" class="main-logo">
                                        <img src="<?php echo $admin_model_obj->cdnUrl('adver_images/image/' . $key->adver_logo); ?>"
                                             class="bigsize"/>
                                    </div>
                                    <input type="hidden" name="hiddenvaldd" value="<?= $key->adver_video ?>">
                                    <input type="hidden" class="commentId" name="hiddenvaldver"
                                           value="<?= $key->adver_type ?>">
                                    <input type="hidden" name="hiddenposter" value="<?= $key->adver_logo ?>">
                                    <input type="hidden" name="hiddenaddverid" value="<?= $key->adver_id ?>">
                                    <input type="hidden" name="hiddenuserid" id="user"
                                           value="<?php echo $user = $usrmakey; ?>">

                                    <div class="ads-band">
                                        <h2 class="ads-band-left"><span><?php if ($key->view == '') {
                                                    echo '0';
                                                } else {
                                                    echo $key->view;
                                                } ?><span> Views</h2>
                                        <?php if ($key->adver_type == 'video') { ?>
                                            <div class="ads-band-right"><span class="timer"><?= $key->length_video ?>Sec<img
                                                            src="<?php echo $admin_model_obj->cdnUrl('adver_images/icon-viedo.png'); ?>"></span>
                                            </div>
                                        <?php } else { ?>
                                            <div class="ads-band-right"><span class="timer">15Sec<img
                                                            src="<?php echo $admin_model_obj->cdnUrl('adver_images/icon-static.png'); ?>"></span>
                                            </div>
                                        <?php } ?>

                                    </div>
                                </div>
                            </li>
                        <?php }
                        $i++;
                    }
                } ?>


            </ul>
            <div class="blanck-me"></div>
        </div>
        <div class="imcas"></div>
        <!------------end home page----------------->
    </div>




























    {{-- part-9 --}}
    <!------------start slider page----------------->
    <div class="slideshow-histroybox-main"></div>
    <div class="lshapright"></div>
    <div class="main-slider-shocase-box" style="display:none;">
        <span class="pause clocse-my-videoa">X</span>
        <div class="box-l-player-slid"></div>
    </div>
    <div id="" class="cf slider-mainbox">
        <div class="slideshow-histroybox"></div>
        <div id="main" role="main">
            <section class="slider">

                <link rel="stylesheet" type="text/css"
                      href="<?php echo $admin_model_obj->cdnUrl('slider/demoStyleSheet.css'); ?>"/>
                 <script type="text/javascript"
                            src="https://amplepoints.com/slider/fadeSlideShow.js"></script>
                <script type="text/javascript">
                    $(document).ready(function () {
                        //$('#slideshow').fadeSlideShow();
                    });

                    /*
                    $(window).load(function(){
                    $('#slideshow').fadeSlideShow();
                    });
                    */
                </script>

               

                <link rel="stylesheet" type="text/css"
                      href="<?php echo $admin_model_obj->OnlyCdnUrl('newcss/css/bebas.css'); ?>"/>

                <?php
                //$allmyGiveways = $admin_model_obj->getallgivewaydata();
                $allSideBarProductsData = $admin_model_obj->getNewSidebarProductsList($currentRemoteCountryCode);
                //dd($allSideBarProductsData);
                ?>


                <div id="slideshowWrapper">
                    <ul id="slideshow">

                        <?php

                        if (!empty($allSideBarProductsData)) {

                            foreach ($allSideBarProductsData as $key) { ?>

                                <li class="slide_show_li">
                                    <div class="new_add_top_slider_txt">
                                        <div class="new_add_tilter">
                                            <a href="<?php echo $admin_model_obj->almplePointsUrl('/productdetail/' . $key->product_id); ?>"
                                               target="_blank"
                                               title="<?php echo ucfirst($key->product_name); ?>">
                                                <?php echo ucfirst($key->product_name); ?>
                                            </a>
                                        </div>
                                        <?php if ($key->product_discount >= 50) { ?>
                                            <div class="new_add_content_price3">
                                                <h5>Free&nbsp;</h5>
                                                <span>with&nbsp;</span>
                                                <h6><?php echo $key->free_with_amples; ?></h6>
                                                &nbsp;AmplePoints
                                            </div>
                                        <?php } ?>
                                    </div>
                                    <a class="new_add_main_images"
                                       href="<?php echo $admin_model_obj->almplePointsUrl('/productdetail/' . $key->product_id); ?>"
                                       target="_blank" title="<?php echo ucfirst($key->product_name); ?>">
                                        <img src="<?php echo $admin_model_obj->OnlyCdnUrl('product_images/' . $key->product_id . '/' . $key->image); ?>">
                                    </a>
                                    <div class="new_add_bottom_slider_txt">
                                        <div class="three_bod">
                                            <div class="new_add_paty1">
                                                <strong>Buy &amp; Earn</strong>
                                                <br>
                                                <span>
                                                            <b><?php echo $key->no_of_amples; ?></b>
                                                            <br>
                                                            Amples
                                                        </span>
                                            </div>
                                            <div class="new_add_paty1 new_add_border_right">
                                                <strong>Reward value</strong><br>
                                                <span><b>$<?php echo $key->discount_price; ?></b></span>
                                            </div>
                                            <div class="new_add_paty1">
                                                <strong>You Earn</strong><br>
                                                <span><b><?php echo (int)$key->product_discount; ?>%</b></span>
                                            </div>
                                        </div>
                                        <div class="new_add_pri_bod">
                                            <div class="new_add_sel_Price new_add_pricess">
                                                <span class=""> $<?php echo $key->single_price; ?></span>
                                            </div>
                                            <div class="new_add_sel_by">
                                                <strong>By</strong>:&nbsp;
                                                <span><?php echo $key->tbl_vndr_dispname; ?></span>
                                            </div>
                                        </div>
                                    </div>
                                </li>


                            <?php }
                        } ?>
































{{-- part-10 --}}
                        <?php /* if ($this->getgamebannerlist > 0) {

                            foreach ($this->getgamebannerlist as $data) {

                                $vendorName = $admin_model_obj->getsinglevendor($data['vendor_id']);
                                //print_r($data);die;
                                ?>
                                <li>
                                    <a href="<?php echo $baseUrl; ?>/productbyseller/<?php echo str_replace(' ', '', $vendorName); ?>/<?php echo $data['vendor_id']; ?>"
                                       target="_blank">
                                        <img src="<?php echo $admin_model_obj->cdnUrl('game_images/' . $data['banner_image']); ?>"/>
                                    </a>
                                    <div class="category_banner">
                                        <?php
                                        $data['game_banner_category'];
                                        $banner_id = $data['user_id'];
                                        ?>
                                    </div>
                                    <div id="playlistreply">
                                    </div>
                                    <div class="bottom-catergorylisting">
                                        <a class="addplay" id="<?php echo $banner_id; ?>" href="javascript:void(0);">Add
                                            to Playlist</a>
                                        <a class="aadfav" id="<?php echo $banner_id; ?>" id="<?php echo $banner_id; ?>"
                                           href="javascript:void(0);">Favorite</a>
                                    </div>
                                </li>

                                <?php

                            }
                        }
                        */ ?>

                    </ul>
                    <br clear="all"/>
                </div>
                <div class="defcaategories">
                    <ul class="iterst-sec">
                        <li class="cat_bann actives">Category Banner</li>
                        <li class="ch_in">Interest</li>
                    </ul>
                    <ul class="catgoryss">
                        <li><a class="game_banner" href="#" id="Popular">Popular</a></li>
                        <li><a class="game_banner" href="#" id="Editors Pick">Editor's Pick</a></li>
                        <li><a class="game_banner" href="#" id="Everything">Everything</a></li>
                        <li><a class="game_banner" href="#" id="Entertainment">Entertainment</a></li>
                        <li><a class="game_banner" href="#" id="Art and Design">Art & Design</a></li>
                        <li><a class="game_banner" href="#" id="Womens Fashion">Women's Fashion</a></li>
                        <li><a class="game_banner" href="#" id="Health and Fitness">Health & Fitness</a></li>
                        <li><a class="game_banner" href="#" id="Food and Drink">Food & Drink</a></li>
                        <li><a class="game_banner" href="#" id="Hair and Beauty">Hair & Beauty</a></li>
                        <li><a class="game_banner" href="#" id="Mens Fashion">Men's Fashion</a></li>
                        <li><a class="game_banner" href="#" id="Trends and Lifestyle">Trends and Lifestyle</a></li>
                        <li><a class="game_banner" href="#" id="Hobbies">Hobbies</a></li>
                        <li><a class="game_banner" href="#" id="Home">Home</a></li>
                        <li><a class="game_banner" href="#" id="Gardening">Gardening</a></li>
                        <li><a class="game_banner" href="#" id="Music">Music</a></li>
                        <li><a class="game_banner" href="#" id="Celebrities">Celebrities</a></li>
                        <li><a class="game_banner" href="#" id="Movies">Movies</a></li>
                        <li><a class="game_banner" href="#" id="Cars and Motorcycles">Cars & Motorcycles</a></li>
                        <li><a class="game_banner" href="#" id="News and Politics">News & Politics</a></li>
                        <li><a class="game_banner" href="#" id="Kids and Parenting">Kids & Parenting</a></li>
                        <li><a class="game_banner" href="#" id="Finance">Finance</a></li>
                        <li><a class="game_banner" href="#" id="Pets and Animals">Pets & Animals</a></li>
                        <li><a class="game_banner" href="#" id="Comedy">Comedy</a></li>
                        <li><a class="game_banner" href="#" id="Shopping">Shopping</a></li>
                        <li><a class="game_banner" href="#" id="Local Offers and Services">Local Offers & Services</a>
                        </li>
                        <li><a class="game_banner" href="#" id="Gifts">Gifts</a></li>
                        <li><a class="game_banner" href="#" id="Sports and Outdoors">Sports & Outdoors</a></li>
                        <li><a class="game_banner" href="#" id="Tech and Gadgets">Tech & Gadgets</a></li>
                        <li><a class="game_banner" href="#" id="Games">Games</a></li>
                        <li><a class="game_banner" href="#" id="Education">Education</a></li>
                        <li><a class="game_banner" href="#" id="Travel">Travel</a></li>
                        <li><a class="game_banner" href="#" id="Luxury">Luxury</a></li>
                        <li><a class="game_banner" href="#" id="Wedding">Wedding</a></li>
                        <li><a class="game_banner" href="#" id="Holidays and Events">Holidays & Events</a></li>
                        <li><a class="game_banner" href="#" id="Career">Career</a></li>


                    </ul>
                    <div class="ch_in_div" style="display:;">

                        <!--<iframe class="socail-adss" src="http://amplepoints.com/dashboard" width="244" height="178"></iframe>-->

                        <?php /* new code for interest start */ ?>


                        <div id="Mycontainer-right">

                            <div class="bs-example">
                                <div class="row">
                                    <div class="wmg-container my-grid">

                                        <?php
                                        //dd(1);

                                        $db_host_name = env('DB_HOST');
                                        $db_user_name = env('DB_USERNAME');
                                        $db_user_password = env('DB_PASSWORD');
                                        $db_database_name = env('DB_DATABASE');
                                        $port = env('DB_PORT');

                                        $connew = mysqli_connect($db_host_name, $db_user_name, $db_user_password, $db_database_name,$port);


                                        if (!$connew) {
                                            die('could not connect' . mysqli_error($connew));
                                        }
                                        mysqli_select_db($connew, $db_database_name);
                                        //dd($maincatdata);

                                        if (!empty($maincatdata)) {
                                            $myuserkey = $usrmakey;
                                            //print_r($this->maincatdata);
                                            foreach ($maincatdata as $maincatdata) {
                                                $ctid = $maincatdata->id;
                                                $chbox = mysqli_query($connew, "SELECT  * FROM `tbl_user_interest` where customerId = '$myuserkey' and umaincatId = '$ctid' ");
                                                $rowchbox = mysqli_fetch_row($chbox);
                                               // dd($rowchbox);
                                               // die();

                                                ?>

                                                <div class="wmg-item">
                                                    <input type="hidden" name="user" id="cuuser"
                                                           value="<?php echo $myuserkey; ?>">
                                                    <?php if (@$rowchbox[5] == 1) { ?>
                                                        <input type="checkbox" class="checkboxin" id="checkboxin"
                                                               name="<?php echo ucwords(strtolower(substr($maincatdata->category_name, 0, 25))); ?>"
                                                               value="<?php echo $maincatdata->id; ?>"
                                                               onclick="myFunction(<?php echo $myuserkey; ?>,<?php echo $ctid ?>)"
                                                               checked>
                                                    <?php } else { ?>
                                                        <input type="checkbox" class="checkboxin" id="checkboxin"
                                                               name="<?php echo ucwords(strtolower(substr($maincatdata->category_name, 0, 25))); ?>"
                                                               value="<?php echo $maincatdata->id; ?>"
                                                               onclick="myFunction(<?php echo $myuserkey; ?>,<?php echo $ctid ?>)">
                                                    <?php } ?>
                                                    <div class="wmg-thumbnail">
                                                        <div class="wmg-thumbnail-content">
                                                            <div class="avatar"><img class="interestimg"
                                                                                     src="<?php echo $admin_model_obj->cdnUrl('category_images/' . $maincatdata->id . '/' . $maincatdata->cat_mainimage); ?>"
                                                                                     alt=""></div>

                                                            <div class="text-chackbox">
                                                                <span><?php echo ucwords(strtolower(substr($maincatdata->category_name, 0, 25))); ?></span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>



























{{-- part-11 --}}
                                                <script>

                                                    function myFunction(x, y) {
                                                        var xx = x;
                                                        var yy = y;
                                                         $.ajaxSetup({
                                                        headers: {
                                                        'X-CSRF-TOKEN': "{{csrf_token()}}"
                                                        }
                                                        });
                                                        $.ajax({
                                                            type: "POST",
                                                            url: "<?php echo $baseUrl; ?>/category_filter/checkaction.php",
                                                            //url: "http://amplepoints.local/category_filter/checkaction.php",
                                                            data: {xx: xx, yy: yy},
                                                            cache: true,
                                                            success: function (html) {
                                                                alertt(data);
                                                                //$("#showbyappoint").after(html);
                                                                //$("#flashbyappoint").hide();
                                                            }
                                                        });
                                                        //alert(xx);
                                                        //alert(yy);
                                                    }

                                                </script>
                                            <?php }
                                        } ?>

                                    </div>
                                </div>
                            </div>

                        </div>
                        <script>
                            $('.checkboxin:checked').addClass('ches');
                            //$('#purchase .table.table-bordered-a.table-responsive.cart_summary tr:nth-child(2)').html('ches');
                            $('.checkboxin:checkbox').change(function () {
                                if ($(this).is(":checked")) {
                                    $(this).addClass('ches');
                                } else {
                                    $(this).removeClass('ches');
                                }
                            });
                        </script>
                        <?php /*new code interest End*/ ?>
                    </div>
                    <script>
                        $(document).ready(function () {

                            $('#loginsocial').click(function () {
                                $('#modal').addClass('mynewloginbox');
                            });
                            $('.cat_bann').click(function () {
                                $('.ch_in_div').css('display', 'none');
                                $('.defcaategories>.catgoryss').css('display', 'block');
                                $('.iterst-sec li').removeClass('actives');
                                $(this).addClass('actives');
                            });
                            $('.ch_in').click(function () {
                                $('.ch_in_div').css('display', 'block');
                                $('.defcaategories>.catgoryss').css('display', 'none');
                                $('.iterst-sec li').removeClass('actives');
                                $(this).addClass('actives');
                            });

                            $('#slideshow').fadeSlideShow({
                                speed: 'slow',
                                interval: 5000,
                                autoplay: true
                            });

                        });

                        /*Load All Slideshow After Some time */

                        function LoadAllLplayerSlides() {
                             $.ajaxSetup({
                                headers: {
                                'X-CSRF-TOKEN': "{{csrf_token()}}"
                                }
                                });

                            $.ajax({
                                url: '<?php echo $baseUrl; ?>/category_filter/allplayersides.php',
                                //url: 'http://amplepoints.local/category_filter/lpayerbannercatefilter.php',
                                data: {load_slide: 1},
                                type: 'POST'
                            })
                                .done(function (data) {

                                    if ($.trim(data) == 'nodata') {

                                        alert("No Data Exist");

                                    } else {
                                        $('#slideshowWrapper').html(data);
                                        $('#slideshow').fadeSlideShow({speed: 'slow', interval: 9000, autoplay: false});
                                    }

                                })
                        }


                       /* setTimeout(function () {

                            $('#slideshow').fadeSlideShow();
                            LoadAllLplayerSlides();

                        }, 12000);*/

                    </script>
                    <style>
                        .game-wrapper.mynewgame.makeactive-full .catgoryss {
                            display: none;
                        }
                    </style>
                </div>
                <div class="clearfix"></div>
            </section>


        </div>
        <div class="footer-bottom-btn">
            <!--<ul class="four-btnss">
            <li><a href="#">History</a></li>
            <li><a href="javascript:void(0)" class="dims">Dim</a></li>
            </ul>-->

        </div>
        <div class="blanck-me"></div>
    </div>
</div>

<!-- The social box  start-->
<?php $baseurl = url('/'); ?>

<script>
    var xmlHttpRequest;

    function createXMLHttpRequest() {
        if (xmlHttpRequest != null) {
            return;
        }
        if (window.ActiveXObject) {
            try {
                xmlHttpRequest = new ActiveXObject('Msxml2.XMLHTTP');
            } catch (exception_1) {
                try {
                    xmlHttpRequest = new ActiveXObject('Microsoft.XMLHTTP');
                } catch (exception_2) {
                }
            }
        } else if (window.XMLHttpRequest) {
            xmlHttpRequest = new XMLHttpRequest();
        }
    }

    function addgivewayamples(giveawaykey) {
        var baseurl = '<?PHP echo $baseurl; ?>';
        var SITEROOT = baseurl;
        createXMLHttpRequest();
        var url = SITEROOT + '/default/index/savegiveawayamples/';
        var strURL = url;

        if (typeof giveawaykey != '') {
            var query = "giveawayId=" + giveawaykey;
            if (xmlHttpRequest != null) {
                xmlHttpRequest.open("post", strURL, true);
                xmlHttpRequest.onreadystatechange = addgiveawayamplesuccess;
                xmlHttpRequest.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
                xmlHttpRequest.send(query);
            }
        }


    }

    function addgiveawayamplesuccess() {
        if (xmlHttpRequest.readyState == 4) {
            if (xmlHttpRequest.status == 200) {
                var ss = xmlHttpRequest.responseText;
                var result1 = ss;

                if (result1 == 4) {
                    alert("You are already entered in this giveaway.");
                    return false;
                }

                if (result1 == 5) {
                    alert("Sorry! The required enteries have been fullfilled. Try next time...");
                    return false;
                }

                if (result1 == 2) {
                    alert("This giveaway has been expired.");
                    return false;
                }

                if (result1 == 3) {
                    alert("You don't have sufficient number of amples to enter in this giveaway.");
                    return false;
                }

                if (result1 == 0) {
                    alert("Thank you for entering in this giveaway.");
                    window.location.href = '<?PHP echo $baseurl; ?>' + '/default/index/dashboard';
                }


            }
        }
    }
</script>


<div class="columns-container eranvideoamps" style="background-color:#fff;">
    <div class="container">
        <!-- breadcrumb -->

        <!-- ./breadcrumb -->
        <!-- row -->
        <div class="row">
            <div class="watchadd">WATCH ADS & EARN UPTO $14.40/HR IN AMPLE POINTS</div>
            <div class="div-menu" style="display:none;">
                <!-- <ul id="portfolio-filter" class="menu-media">
                <li><a class="grey-a box-i"  id="dharampagal" href="#all-a">All</a></li>
                <script>
                $(document).ready(function(){

                $('#loginsocial').click(function(){
                $('#modal').addClass('mynewloginbox');
                });
                $('.cat_bann').click(function(){
                $('.ch_in_div').css('display','none');
                $('.defcaategories>.catgoryss').css('display','block');
                $('.iterst-sec li').removeClass('actives');
                $(this).addClass('actives');
                });
                $('.ch_in').click(function(){
                $('.ch_in_div').css('display','block');
                $('.defcaategories>.catgoryss').css('display','none');
                $('.iterst-sec li').removeClass('actives');
                $(this).addClass('actives');
                });

                });
                </script>
                <?php if (empty($usrmakey)) { ?>
                    <?php } else { ?>
                    <li><a href="http://amplepoints.com/index/Earn" title="" class="parpal box-i">Earn Amples</a></li>
                    <?php } ?>
                <li><a href="http://amplepoints.com/index/social#products" title="" class="blue box-i">Products</a></li>
                <li><a href="http://amplepoints.com/index/social#giveaways" title="" class="yello-a  box-i" style="color:#000 !important;">Giveaways</a></li>
                <li><a href="http://amplepoints.com/index/social#photo" title="" class="green box-i">Photo</a></li>
                <li><a href="http://amplepoints.com/index/social#video" title="" class="parpal-2 box-i">Videos</a></li>
                <li><a href="http://amplepoints.com/index/social#blogs" title="" class="oreang box-i">Blogs</a></li>
                <li><a href="http://amplepoints.com/index/social#tv" data-toggle="tab" class="red box-i">Movies &amp; TV</a></li>
                <li><a href="http://amplepoints.com/index/social#charity" data-toggle="tab" class="pink box-i">Charity</a></li>

                </ul>-->
            </div>
            <!----------------menu-color---------->
            <div class="wrapper-a" id="contentWrapper">

                <!-------------------menu-color-end-------->

                <div class="col-xs-12 col-sm-3" id="portfoliolist">
                    <!-- block category -->

                    <!-- ./block category  -->
                    <!-- block filter -->


                    <div class="block left-module video">
                        <p class="title_block parpal-2">Videos</p>
                        <div class="block_content">
                            <!-- layered -->
                            <div class="layered layered-filter-price">
                                <!-- filter categgory -->
                                <div class="layered_subtitle">FILTER CATEGORIES</div>
                                <div class="layered-content">
                                    <ul class="check-box-list">

                                        <?php if (count($gamevedioscat) > 0) {
                                            $i = 1;
                                            foreach ($gamevedioscat as $key3) {

                                                //print_r($key3);

                                                ?>

                                                <li class="game_video"><a href="#" class="gamecat"
                                                                          id="<?= $key3->cat; ?>">

                                                        <?php echo $key3->cat; ?></a>
                                                </li>
                                                <?php
                                            }
                                        }
                                        ?>
                                    </ul>
                                </div>

                                <!-- ./filter size -->
                            </div>
                            <!-- ./layered -->

                        </div>
                    </div>
                    <!-- ./layered -->
                </div>
























{{-- part-12 --}}
                <!-------Companies End--------->

                <div id="center_column" class="center_column col-xs-12 col-sm-9">


                    <ul class="product-media  product-list ni hb_class" id="portfolio-list">


                        <?php if ($allvideosData) {
                            $i = 1;
                            foreach ($allvideosData as $key2) {

                                ?>
                                <li class="all-a video col-sm-3 product-container no-space a1 vid"
                                    id='<?php echo $key2->vedio_name; ?>' style="">
                                    <div class="left-block">

                                        <?php

                                        $videoVode = $key2->video_code;
                                        $videoType = $key2->video_type;

                                        $VideoCode = $key2->video_code;
                                        $VideoType = $key2->video_type;

                                        $thumbURL = '';

                                       //$thumbURL = GetVideoThumbnailTwo($videoType, $videoVode);


									    $videoimageUrl = '';
									    if ($VideoType == 'youtube') {
									        $videoimageUrl = "https://img.youtube.com/vi/$VideoCode/0.jpg";
									    } else if ($VideoType == 'vimeo') {
									        $vimeo = unserialize(file_get_contents("http://vimeo.com/api/v2/video/$VideoCode.php"));
									        //$small = $vimeo[0]['thumbnail_small'];
									        //$medium = $vimeo[0]['thumbnail_medium'];
									        $large = $vimeo[0]['thumbnail_large'];
									        $videoimageUrl = $large;

									    } else if ($VideoType == 'dailymotion') {
									        $videoimageUrl = "https://www.dailymotion.com/thumbnail/video/$VideoCode";
									    } else {
									        $videoFram = '';
									    }

									    $thumbURL=$videoimageUrl;



                                        if (empty($thumbURL)) {

                                            $thumbURL = $url('images/defaultvideo.png');
                                        }
                                        ?>
                                        <figure><img src="<?php echo $thumbURL; ?>" style="height: 100%;width: 100%;">
                                        </figure>
                                    </div>
                                    <div class="box-text-a">
                                        <div class="blog-text-a">
                                            <!--p> <a href="#"></a>
                <?php //echo $key2->tags;
                                            ?></p>-->
                                            <h5><?php echo $key2->vediotitle; ?></h5>
                                        </div>
                                        <div style=padding-left:10px><span
                                                    style="float:left; padding-right:5px; color:#ff0000">By:</span> <a
                                                    href="#">Amplepoints</a></div>

                                        <div class="by_aria">
                                            <a href="#" title="Add to Cart"><i class="fa fa-play"></i> PLAY</a>
                                        </div>
                                    </div>
                                </li>


                                <?php
                            }
                        }
                        ?>
                    </ul>
                    <div class="text-center myallloadmore">
                        <input type="hidden" id="row" value="0">
                        <a style="width: 150px;font-size: 20px;margin: 15px;" class="btn btn-primary load-more">Load
                            More</a>
                    </div>
                    <div class="text-center mycateloadmore" style="display: none;">
                        <input type="hidden" id="crow" value="0">
                        <a style="width: 150px;font-size: 20px;margin: 15px;" class="btn btn-primary load-more-cat"
                           onclick="loadMoreCategoryVideo();">Load More</a>
                    </div>
                    <input type="hidden" id="curruntcattId" value="">
                </div>
            </div>
        </div>


        <!-- ./block filter  -->

    </div>
    <!-- ./PRODUCT LIST -->
</div>
<!-- ./view-product-list-->

</div>
</div>
<!-- ./row-->
</div>
</div>
</div>




@include('includes.script')
<!-- jQuery library -->
<script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>

<script type="text/javascript">
    $(document).ready(function () {

        $('.load-more').click(function () {

            var row = Number($('#row').val());
            var allcount = 99999999;
            row = row + 20;

            if (row <= allcount) {

                $("#row").val(row);
                 $.ajaxSetup({
                    headers: {
                    'X-CSRF-TOKEN': "{{csrf_token()}}"
                    }
                    });

                $.ajax({
                    url: "{{route('loadmoreearnvideos')}}",
                    type: 'post',
                    data: {row: row},
                    beforeSend: function () {
                        $(".load-more").text("Loading...");
                    },
                    success: function (response) {

                        // Setting little delay while displaying new content
                        setTimeout(function () {
                            // appending posts after last post with class="post"
                            //$(".post:last").after(response).show().fadeIn("slow");
                            $('.hb_class').append(response);

                            var rowno = row + 20;

                            // checking row value is greater than allcount or not
                            if (rowno > allcount) {

                                // Change the text and background
                                $('.load-more').text("Hide");
                                $('.load-more').css("background", "darkorchid");
                            } else {
                                $(".load-more").text("Load more");
                            }
                        }, 2000);


                    }
                });
            }
        });

    });

    function loadMoreCategoryVideo() {

        //alert("hello");

        var row = Number($('#crow').val());
        var allcount = 99999999;
        row = row + 20;
        var catId = $('#curruntcattId').val();

        if (row <= allcount) {

            $("#crow").val(row);
             $.ajaxSetup({
                headers: {
                'X-CSRF-TOKEN': "{{csrf_token()}}"
                }
                });

            $.ajax({
                url: "{{route('loadmorearncatevideos')}}",
                type: 'post',
                data: {catid: catId, row: row},
                beforeSend: function () {
                    $(".load-more-cat").text("Loading...");
                },
                success: function (response) {

                    if (response == 'novideo') {

                        $(".load-more-cat").text("Load more");
                        $('.mycateloadmore').hide();

                    } else {

                        // Setting little delay while displaying new content
                        setTimeout(function () {
                            // appending posts after last post with class="post"
                            //$(".post:last").after(response).show().fadeIn("slow");
                            $('.hb_class').append(response);

                            var rowno = row + 20;

                            // checking row value is greater than allcount or not
                            if (rowno > allcount) {

                                // Change the text and background
                                $('.load-more-cat').text("Hide");
                                $('.load-more-cat').css("background", "darkorchid");
                            } else {
                                $(".load-more-cat").text("Load more");
                            }
                        }, 2000);
                    }

                }
            });
        }

    }

</script>

<script>
    $('.modal_close').click(function () {
        $('#modal').removeClass('mynewloginbox');
    });
</script>
<style>

    .popupContainer.mynewloginbox {
        box-shadow: 0 0 88px 28px #000;
        display: block !important;
        float: none;
        left: 0;
        margin: 0 auto;
        right: 1px;
    }

</style>

<div class="div-menu">
    <script>
        function toggleVideo(state) {
            // if state == 'hide', hide. Else: show video
            //alert('myyyyy');
            var div = document.getElementById("mymeidas");
            var iframe = div.getElementsByTagName("iframe")[0].contentWindow;
            div.style.display = state == 'hide' ? 'none' : '';
            func = state == 'hide' ? 'pauseVideo' : 'playVideo';
            iframe.postMessage('{"event":"command","func":"' + func + '","args":""}', '*');
        }
    </script>
    <script>
        $(document).ready(function () {
            $(".current-time timersspan").clone().appendTo(".amplis-no");

            $('.gamecat').click(function () {

                var ID = $(this).attr('id');
                $("#curruntcattId").val(ID);
                $('.myallloadmore').hide();
                $('.mycateloadmore').show();
                $("#crow").val(0);
                //alert();
                 $.ajaxSetup({
                    headers: {
                    'X-CSRF-TOKEN': "{{csrf_token()}}"
                    }
                    });


                $.ajax({
                    url: "{{route('loadmorearncatevideos')}}",
                    //url: 'http://amplepoints.local/category_filter/filetrearnvideo.php',
                    data: {catid: ID, row: 0},
                    type: 'POST'
                })
                    .done(function (data) {
                        if (data == 'novideo') {

                            $('.mycateloadmore').hide();
                            var htmldata = '<div class="alert alert-success alert-dismissable">';
                            htmldata += '<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>';
                            htmldata += 'No Video Data Found';
                            htmldata += '</div>';
                            $('.hb_class').html(htmldata);
                            $('div.alert .close').on('click', function () {
                                $(this).parent().remove();
                            });

                        } else {

                            $('.hb_class').html(data);
                        }

                        //$('.pagination').hide();

                    })


            });

            $('a.game_banner').click(function () {

                var game_banner = $(this).attr('id');

                $('.catgoryss li a').removeClass('actives');

                $(this).addClass('actives');

                /*old url is url: 'http://amplepoints.local/category_filter/catgamefilters.php'*/
                //alert(ID);
                 $.ajaxSetup({
                    headers: {
                    'X-CSRF-TOKEN': "{{csrf_token()}}"
                    }
                    });

                $.ajax({
                    url: '<?php echo $baseUrl; ?>/category_filter/lpayerbannercatefilter.php',
                    //url: 'http://amplepoints.local/category_filter/lpayerbannercatefilter.php',
                    data: {game_banner_id: game_banner},
                    type: 'POST'
                })
                    .done(function (data) {

                        if ($.trim(data) == 'nodata') {

                            alert("Data Not Found For Category " + game_banner);

                        } else {
                            $('#slideshowWrapper').html(data);
                            $('#slideshow').fadeSlideShow({speed: 'slow', interval: 9000, autoplay: false});
                        }

                    })


            });


            $('a.addplay').click(function () {
                var banner_id = $(this).attr('id');
                var user_id = "<?php echo $usrmakey; ?>";
                //alert(banner_id);
                //    var ID = $(this).attr('id');

                //alert(ID);
                 $.ajaxSetup({
                    headers: {
                    'X-CSRF-TOKEN': "{{csrf_token()}}"
                    }
                    });

                $.ajax({
                    url: '<?php echo $baseUrl; ?>/category_filter/addplaylist.php',
                    //url: 'http://amplepoints.local/category_filter/addplaylist.php',
                    data: {banner_id: banner_id, user_id: user_id},
                    type: 'POST'
                })
                    .done(function (data) {
                        $('#playlistreply').css('display', 'block');
                        $('#playlistreply').html(data);
                        setTimeout(function () {
                            $('#playlistreply').fadeOut('fast');
                        }, 5000);
                        //alert(data);


                    })


            });
            $('a.aadfav').click(function () {
                var banner_id_fav = $(this).attr('id');
                var user_id = "<?php echo $usrmakey; ?>";
                //alert(banner_id_fav);
                 $.ajaxSetup({
                        headers: {
                        'X-CSRF-TOKEN': "{{csrf_token()}}"
                        }
                        });

                $.ajax({
                    url: '<?php echo $baseUrl; ?>/category_filter/addplaylist.php',
                    //url: 'http://amplepoints.local/category_filter/addplaylist.php',
                    data: {banner_id_fav: banner_id_fav, user_id: user_id},
                    type: 'POST'
                })
                    .done(function (data) {
                        // alert(data);
                        $('#playlistreply').css('display', 'block');

                        $('#playlistreply').html(data);
                        setTimeout(function () {
                            $('#playlistreply').fadeOut('fast');
                        }, 5000);

                    })


            });


            $("body").on("click", ".vid", function (event) {

                var ID = $(this).attr('id');
                //var title = "<?php echo $key2->vediotitle; ?>";
                var tags = "<?php echo $key2->tags; ?>";


                //alert(ID);
                //alert(title);
                //alert(tags);
                $('meta[name=keywords]').remove();
                $('head').append('<meta name="keywords" content="<?php echo $key2->tags; ?>">');

                $(".frame .mediaplayer").html('');
                $(".frame .mediaplayer").append(ID);
                $('.game-left-box > .frame').css('zIndex', 3000);
                $('.mynewgame .video-player').css('zIndex', 0);
                var _src = $(".mediaplayer iframe").attr("src");

                if (_src.indexOf("?") >= 0) {

                    $(".mediaplayer iframe").attr("src", _src + '&enablejsapi=1&autoplay=1');

                } else {

                    $(".mediaplayer iframe").attr("src", _src + '?enablejsapi=1&autoplay=1');
                }


            });

            var IDD = '<iframe src="https://www.youtube.com/embed/vCaZcanop6E" allowfullscreen="" height="315" frameborder="0" width="560" id="megyou"></iframe>';

            $('head').append('<meta name="keywords" content="AmplePoints">');
            //alert(IDD);
            //$(".frame .mediaplayer").html('');
            $(".frame .mediaplayer").append(IDD);
            $('.game-left-box > .frame').css('zIndex', 3000);
            $('.mynewgame .video-player').css('zIndex', 0);
            var _srcc = $(".mediaplayer iframe").attr("src");
            $(".mediaplayer iframe").attr("src", _srcc + '?enablejsapi=1');
            $(".mediaplayer iframe")[0].src += "&autoplay=1&loop=1&playlist=vCaZcanop6E";

        });
    </script>
    <script>
        $("body").on("click", ".vid", function (event) {
            window.setTimeout(function () {
                toggleVideo();
            }, 1000);
        });
    </script>

    <script>
        $(document).ready(function () {
            $('#portfolio-list .first-forth').on('click', function (ev) {

                $(".mediaplayer iframe")[0].src += "&autoplay=1";
                ev.preventDefault();

            });
        });
    </script>

    <script>
        $(document).ready(function () {
            $('.video-game-show .first-forth').on('click', function (ev) {

                $(".mediaplayer iframe")[0].src += "&autoplay=1";
                ev.preventDefault();

            });
        });
    </script>
    <script>
        $('.video-game-show .first-forth').click(function () {
            var videoURL = $('.mediaplayer iframe').prop('src');
            videoURL += "&autoplay=1";
            $('.mediaplayer iframe').prop('src', videoURL);
        });

    </script>


</div>
<div class="clear"></div>
</div>
</div>
<script>
    $(document).ready(function () {
        $('.dims').click(function () {
            $('.blanck-me').toggle();
        });
    });
</script>
<!-- jQuery -->
<!--<script src="js/jquery.min.js"></script>-->
<script>

    var c = 30;
    var t;
    var timer_is_on = 0;

    function timedCount() {
        document.getElementById("txt").value = c;
        c = c - 1;
        t = setTimeout(function () {
            timedCount()
        }, 1000);
    }


</script>
<!-- FlexSlider -->
<!--<script defer src="js/jquery.flexslider.js"></script>-->
<script type="text/javascript">
    /* $(function(){

    SyntaxHighlighter.all();
    });*/

    /*
    $(window).load(function(){

    $('.flexslider').flexslider({

    animation: "slide",
    start: function(slider){
    $('body').removeClass('loading');
    }
    });
    }); */

    //var _src = $(".vid iframe").attr("src");
    //$(".vid iframe").attr("src", _src + '?enablejsapi=1&autohide=1&controls=0&showinfo=0');

    $("video.src1").click(function () {
        this.paused ? this.play() : this.pause();
        return false;
    });


</script>

<!------------end slider page----------------->
<script>
    $(document).ready(function () {
        $(".product-media").clone().appendTo(".imcas");
        $("video.src1").click(function () {
            this.paused ? this.play() : this.pause();
            return false;
        });
        $('#buynow').click(function () {
            playAudiochaching();
        });

    });
</script>

</div>
<script>
    $("body").on("click", ".clocse-my-videoa", function (event) {
        clearTimeout(MyfirstTimer);
        clearTimeout(MysecondTimer);
        $('.myunick').remove();
        $('.box-l-player-slid').html('');
        $('.main-slider-shocase-box').css('display', 'none');
        $('.main-slider-shocase-box').removeClass('main-sliderfixedd');
        startAddRotation();
        console.log(".clocse-my-videoa Called");
    });
    $("body").on("click", ".clocse-my-historytab", function (event) {
        $('.slideshow-histroybox').css('display', 'none');
    });
    $("body").on("click", ".lshapright", function (event) {
        $('.lshapright').css('display', 'none');
        $('.lshapbottom').css('display', 'none');
    });
    $("body").on("click", ".lshapbottom", function (event) {
        $('.lshapright').css('display', 'none');
        $('.lshapbottom').css('display', 'none');
    });
</script>

<script>

    function newmyFunction() {

        //$('.l-player-slid li').css('display','block');
        $('.l-player-slidbtn li').removeClass('atvclr');
        $('.first-lbtn').addClass('atvclr');

        setTimeout(function () {
            $('.l-player-slidbtn li').removeClass('atvclr');
            $('.first-l').css('display', 'block');
            $('.first-lbtn').addClass('atvclr');
        }, 1000);
        setTimeout(function () {
            $('.l-player-slidbtn li').removeClass('atvclr');
            $('.first-l').css('display', 'none');
            $('.second-l').css('display', 'block');
            $('.second-lbtn').addClass('atvclr');
        }, 3000);
        setTimeout(function () {
            $('.l-player-slidbtn li').removeClass('atvclr');
            $('.second-l').css('display', 'none');
            $('.third-l').css('display', 'block');
            $('.third-lbtn').addClass('atvclr');
        }, 6000);
        setTimeout(function () {
            $('.l-player-slidbtn li').removeClass('atvclr');
            $('.third-l').css('display', 'none');
            $('.forth-l').css('display', 'block');
            $('.forth-lbtn').addClass('atvclr');
        }, 9000);
        setTimeout(function () {
            $('.l-player-slidbtn li').removeClass('atvclr');
            $('.forth-l').css('display', 'none');
            $('.fifth-l').css('display', 'block');
            $('.fifth-lbtn').addClass('atvclr');
        }, 12000);
        setTimeout(function () {
            $('.l-player-slidbtn li').removeClass('atvclr');
            $('.fifth-lbtn').addClass('atvclr');
            $('.youhave30s').css('display', 'block');

            if ($('.youhave30s').css('display') == 'block') {


//clearInterval(timeres);

            }
        }, 15000);

        //newmyFunction().stop();

    }

</script>

<script src="https://www.youtube.com/player_api"></script>
