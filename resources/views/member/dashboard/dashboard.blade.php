@extends('Layouts.app')

@section('meta')
    {{-- all meta tags --}}
@endsection

@section('title')
    <title>Amplepoints | Checkout</title>
@endsection

@include('includes.head')
@include('includes.new_head')
@include('includes.header')
@include('includes.script')









{{-- part-1 --}}

<?php error_reporting(0); ?>
<?php $InviteActive = (isset($_GET['invitetab']) ? $_GET['invitetab'] : 0); ?>
<?php $InterestTabActive = (isset($_GET['interesttab']) ? $_GET['interesttab'] : 0); ?>
<?php
$baseUrl = url('/');
$admin_model_obj = new \App\Models\AdminImpFunctionModel;
?>

@include('member.dashboard.dashboard_css')
{{-- @include('member.dashboard.dashboard_script') --}}

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/17.0.8/css/intlTelInput.css"/>
<link rel="stylesheet" href="https://code.jquery.com/ui/1.10.3/themes/smoothness/jquery-ui.css"/>

<div class="ajax-loader" style="display: none;">
    <img src="<?php echo $baseUrl; ?>/img/img-amples-win.gif" alt="" width="100" height="100">
    <span>Please Wait..</span>
</div>

<?php
$db_host_port = env('DB_PORT');
$db_host_name = env('DB_HOST');
$db_user_name = env('DB_USERNAME');
$db_user_password = env('DB_PASSWORD');
$db_database_name = env('DB_DATABASE');

$dbcon = mysqli_connect($db_host_name, $db_user_name, $db_user_password, $db_database_name, $db_host_port);

if (!$dbcon) {
    die('could not connect' . mysqli_error($dbcon));
}
mysqli_select_db($dbcon, $db_database_name);


?>


<!-- Page Content -->
<section>
    <div class="row top-slider sng"
         style="background:rgba(0, 0, 0, 0) linear-gradient(<?php if ($record->user_bgcolor) {
             echo $record->user_bgcolor;
         } else {
             echo "#5367ce";
         } ?>, rgb(130, 127, 127)) repeat scroll 0 0 !important;">
        
        <div class="container">
            <div class="row ash-col">
              {{--   <script>
                    $(document).ready(function () {

                        jQuery('.popsup').click(function () {
                            var width = window.innerWidth * 0.66;
                            // define the height in
                            var height = width * window.innerHeight / window.innerWidth;
                            // Ratio the hight to the width as the user screen ratio
                            //window.open("<?PHP echo $this->baseUrl('popupadds'); ?>" , 'newwindow','newwindow','width=' + 380 + ', height=' + 343 + ', top=' + ((window.innerHeight - height) / 2) + ', left=' + ((window.innerWidth - width) / 2));
                            window.open("<?PHP echo $this->baseUrl('popout'); ?>", 'newwindow', 'width=376,height=345,left=0,top=0');
                            return false;

                        });
                    });
                </script> --}}
                <a href="javascript:void(0);" class="popsup">Pop Out</a>
                <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12 col-padding-right-site deek">
                    <div>
                        <div class="main-wpappers">
                            <?php

                            $adverise = array();
                            $toatalAdds = 0;

                            if (count($amplesdatas) > 0) {

                                $igd = $record->user_id;
                                $resrfff = mysqli_query($dbcon, "SELECT  * FROM `tbl_user_interest` where customerId = '$igd' and isselected = 1 ");
                                $interestrow = mysqli_num_rows($resrfff);
                                //dd($interestrow);

                                if ($interestrow > 0) {
                                    while ($rowyrff = mysqli_fetch_row($resrfff)) {
                                        $datarff[] = $rowyrff['2'];
                                    }

                                    $arrd1 = array_unique($datarff);
                                    foreach ($amplesdatas as $key) {

                                        $my_id = $key->adver_id;
                                        //dd($my_id);
                                        $datarhh = array();

                                        $resrhh = mysqli_query($dbcon, "SELECT  * FROM `adver_intrest` where add_id = '$my_id' ");
                                        $adverinterst = mysqli_num_rows($resrhh);
                                        //dd($adverinterst,1);

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
                            ?>




















{{--  part-2  --}}
@php
//dd($adverise);
@endphp
                            <?php if (!empty($adverise)) { ?>
                                <ul class="first-forth inredjnm_hgh">
                                    <?php
                                    $toatalAdds = count($adverise);
                                    $i = 1;
                                    foreach ($adverise as $key) {

                                    	//dd($key->adver_id);
                                    	//die;
                                        if ($i == 5) {
                                            break;
                                        } else {
                                            ?>
                                            <li id="addid_<?php echo $i; ?>">
                                                <div class="ads-setss">
                                                    <div id="dd_<?= $key->adver_id; ?>" class="main-logo"><img
                                                                src="<?php echo $admin_model_obj->cdnUrl('adver_images/image/' . $key->adver_logo); ?>"/>
                                                    </div>
                                                    <input type="hidden" name="hiddenvaldd"
                                                           value="<?= $key->adver_id ?>">
                                                    <input type="hidden" class="commentId" name="hiddenvaldver"
                                                           value="<?= $key->adver_type ?>">
                                                    <input type="hidden" class="commentId" name="hiddenuserid"
                                                           value="<?php echo $usrmakey; ?>">
                                                    <div class="ads-band">
                                                        <h2 class="ads-band-left"><span>
                                                                <?php if ($key->view == '') {
                                                                    echo '0';
                                                                } else {
                                                                    echo $key->view;
                                                                } ?>
                                                            </span> View</h2>

                                                        <!--<span>you are earning <?= $key->ad_price ?> amples<span>-->
                                                        <?php if ($key->adver_type == 'video') { ?>
                                                            <div class="ads-band-right"><span class="timer">
                                                                    <?= $key->length_video ?>
                                                                Sec<img src="<?php echo $admin_model_obj->cdnUrl('adver_images/icon-viedo.png'); ?>"></span>
                                                            </div>
                                                        <?php } else { ?>
                                                            <div class="ads-band-right"><span class="timer">15Sec<img
                                                                            src="<?php echo $admin_model_obj->cdnUrl('adver_images/icon-static.png'); ?>"></span>
                                                            </div>
                                                        <?php } ?>
                                                        <div class="clear"></div>
                                                    </div>
                                                </div>
                                            </li>
                                            <?php

                                        }
                                        $i++;
                                    } ?>
                                </ul>
                            <?php } else { ?>
                                <div class='myunicknointerest'><span class="nointerest">Please choose at least 5 interests from the <a
                                                data-toggle="tab" href="#interests"
                                                style="color: #f75d00;text-decoration: underline;">interests</a> Page.</span>
                                </div>
                            <?php } ?>
                        </div>



















 {{--  part-3  --}}
                        <div class="show_hide_desk resposighr">
                            <button id="hide">hide</button>
                            <button id="show">show</button>
                            <div class="kjhejn"><img src="<?php echo $admin_model_obj->cdnUrl('img/gof.gif'); ?>"class="images-popsme"></div>
                        </div>
                        <div id="member"></div>
                        <div id="guddies"></div>
                        <div id="adverpro"></div>
                        
                    </div>
                </div>
              

                <div class="col-lg-8 col-md-8 col-sm-8 col-xs-12 col-padding-left-site seek">
                    <div class="left_slider2s img-responsive">
                        <div class="main-pro">
                            <img src="<?php if ($record->user_banner) {
                                echo $admin_model_obj->cdnUrl('user_images/' . $record->user_id . '/profile_banner/' . $record->user_banner);
                            } else {
                                echo $admin_model_obj->cdnUrl('images/1200.jpg');
                            } ?>"/>
                            <div class="slider-text">
                                <div class="col-lg-9"></div>
                                <div class="row top-marrgin">
                                    <div class="col-lg-2 col-padding-right-site">
                                        <div class="top-banner-img">
                                            <a href="javascript:void(0);" data-toggle="modal"
                                               data-target="#changeprofile" title="Click To Change">
                                                <img src="<?php if ($record->user_image) {
                                                    echo $admin_model_obj->cdnUrl('user_images/' . $record->user_id . '/profile_image/' . $record->user_image);
                                                } else {
                                                    echo $admin_model_obj->cdnUrl('images/img/user2.jpg');
                                                } ?>" class="imgrounded"/>
                                            </a>
                                        </div>
                                    </div>

                                    <div class="col-lg-6  no-space banner_txt_ctn">
                                        <div class="top-banner-text">
                                            <h6><?php echo($record->first_name . ' ' . $record->last_name); ?></h6>

                                            <h5><?php if ($record->tag_desc) {
                                                    echo '"' . $record->tag_desc . '"';
                                                } ?></h5>
                                        </div>
                                    </div>
                                    <div class="col-lg-4 ">
                                        <div class="following-follw">
                                            <button type="button"
                                                    onclick="clickforfollowers('<?php echo $record->email; ?>');"
                                                    class="btn-fallowin btn-xs btn-default">
                                                <span><?php if (!empty($followerdata) && $followerdata > 0) {
                                                        echo count($followerdata);
                                                    } else {
                                                        echo "0";
                                                    } ?></span><br/>
                                                Followers
                                            </button>
                                            <button type="button"
                                                    onclick="clickforfollowings('<?php echo $record->email; ?>');"
                                                    class="btn-fallowin btn-xs btn-default">
                                                <span><?php if (!empty($followingdata) && $followingdata > 0) {
                                                        echo count($followingdata);
                                                    } else {
                                                        echo "0";
                                                    } ?></span><br/>
                                                Followings
                                            </button>

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
</section>
























{{--   part-4 --}}

<section>
    <div class="container">
        <div class="row user-profile">
            <div class="container nv_tb">
                <div class="col-md-12 user-name">
                    <h3>Welcome, <?php echo $record->first_name; ?></h3>
                    <h4>Amplepoints will not sell or distribute your info to anyone</h4>
                </div>
                <div class="user-profile-tabs">
                    <ul class="nav nav-tabs">
                        <li class="active"><a data-toggle="tab" href="#dashboard" class="text-center"><i
                                        class="fa fa-bolt"></i> <span>DashBoard</span></a></li>
                        <li><a data-toggle="tab" id="myprofile-tab" href="#profile" class="text-center"><i
                                        class="fa fa-user"></i> <span>Profile</span></a></li>
                        <li><a data-toggle="tab" href="#purchase" class="text-center"
                               onclick="LoadDashboardContent('my_purchases');"><i class="fa fa-cart-plus"></i> <span>My Purchases</span></a>
                        </li>
                        <li><a data-toggle="tab" href="#local_purchase" class="text-center"
                               onclick="LoadDashboardContent('my_local_purchase');"><i class="fa fa-truck"></i> <span>My Local Purchases</span></a>
                        </li>
                        <li><a data-toggle="tab" href="#checkoutwithamples" class="text-center"
                               onclick="LoadDashboardContent('checkout_with_amples');"><i class="fa fa-cart-plus"></i>
                                <span>Checkout With Amplepoints</span></a></li>
                        <li><a data-toggle="tab" href="#bookingswithamples" class="text-center"
                               onclick="LoadDashboardContent('bookings_with_amples');"><i class="fa fa-calendar"></i>
                                <span>Bookings</span></a></li>
                        <li><a data-toggle="tab" href="#wishlist" class="text-center"><i class="fa fa-heart-o"></i>
                                <span>Wishlist</span></a></li>
                        <li><a data-toggle="tab" href="#ample-detail" class="text-center"><i
                                        class="fa fa-credit-card"></i> <span>Ample Details</span></a></li>
                        <li><a data-toggle="tab" href="#ample-reward" class="text-center"><i
                                        class="fa fa-credit-card"></i> <span> Reward Time</span></a></li>
                        <li><a data-toggle="tab" href="#interests" id="myinterestTab" class="text-center"><i
                                        class="fa fa-thumb-tack"></i>
                                <span>Interests</span></a></li>
                        <li><a data-toggle="tab" href="#craving" class="text-center"><i class="fa fa-gift"></i> <span>Request A Craving</span></a>
                        </li>
                        <li><a data-toggle="tab" href="#invite" id="myinviteTab" class="text-center"
                               onclick="LoadDashboardContent('my_invite_friend');"><i class="fa fa-users"></i> <span>Invite Friends</span></a>
                        </li>
                        <?php if ($record->is_driver == 1) { ?>
                            <li><a data-toggle="tab" href="#inviteUber" class="text-center"
                                   onclick="LoadDashboardContent('my_invite_uber_lyft');"><i class="fa fa-users"></i>
                                    <span>Invite Uber / Lyft Friend</span></a></li>
                        <?php } ?>
                        <?php if ($record->is_driver == 1) { ?>
                            
                        <?php } ?>
                        <li><a data-toggle="tab" href="#invite_business" class="text-center"
                               onclick="LoadDashboardContent('my_invite_business');"><i class="fa fa-users"></i> <span>Invite Business</span></a>
                        </li>

                        <li><a data-toggle="tab" href="#blog-l" class="text-center"
                               onclick="LoadDashboardContent('my_blog');"><i class="fa fa-book"></i>
                                <span>Blog</span></a></li>
                        <li><a data-toggle="tab" href="#photo" class="text-center"
                               onclick="LoadDashboardContent('my_photos');"><i class="fa fa-photo"></i>
                                <span>Photo</span></a></li>
                        <li><a data-toggle="tab" href="#video" class="text-center"
                               onclick="LoadDashboardContent('my_video');"><i class="fa fa-video-camera"></i> <span>Video</span></a>
                        </li>
                        <li><a data-toggle="tab" href="#Movies-TV" class="text-center"
                               onclick="LoadDashboardContent('my_movie_tv');"><i class="fa fa-laptop"></i> <span>Movies & TV</span></a>
                        </li>
                    </ul>
                </div>
                <div align="justify" class="tb_contnt">
                    <div class="tab-content cus-dash-board res-tab">
                        <div id="dashboard" class="tab-pane fade in active">
                            <div class="col-md-6">
                                <div class="brief-info">
                                    <div class="brief-info-footer"><a><i class="fa fa-info-circle"></i>Profile</a></div>
                                    <div class="col-md-2 col-sm-2 clear-padding"><img
                                                src="<?php if ($record->user_image) {
                                                    echo $admin_model_obj->cdnUrl('user_images/' . $record->user_id . '/profile_image/' . $record->user_image);
                                                } else {
                                                    echo $admin_model_obj->cdnUrl('images/img/user2.jpg');
                                                } ?>" alt=""></div>
                                    <div class="col-md-10 col-sm-10">
                                        <h3><?php echo $record->first_name . " " . $record->last_name; ?></h3>
                                        <h5>
                                            <i class="fa fa-envelope-o"></i><?php echo $record->email; ?>
                                        </h5>
                                        <h5><i class="fa fa-phone"></i><?php echo $record->mobile; ?>
                                        </h5>
                                        <h5>
                                            <i class="fa fa-map-marker"></i><?php echo $record->address; ?>
                                        </h5>
                                        <h5>
                                            <i class="fa fa-map-marker"></i><?php echo $record->user_id; ?>
                                        </h5>
                                    </div>
                                    <div class="clearfix"></div>
                                </div>
                                <div class="clearfix"></div>
                                <div class="most-recent-booking">
                                    <h4>Recent Give-aways</h4>
                                    <div class="field-entry">
                                        <div class="col-md-4 col-sm-4 col-xs-4 clear-padding">
                                            <p> ID </p>
                                        </div>
                                        <div class="col-md-2 col-sm-4 col-xs-4 clear-padding">
                                            <p>Give-away Name</p>
                                        </div>
                                        <div class="col-md-2 col-sm-6 col-xs-6">
                                            <p style="text-align: center;">Entered Amples</p>
                                        </div>
                                        <div class="recen-div-date col-md-2 col-sm-2 col-xs-2 text-center clear-padding">
                                            <p>#Entries</p>
                                        </div>
                                        <div class="col-md-2 col-sm-6 col-xs-6">
                                            <p style="text-align: center;">Draw Date</p>
                                        </div>
                                    </div>






















{{-- part-5 --}}
                                    <div class="clearfix"></div>
                                    <div style="max-height: 630px;overflow-y: auto;">
                                        <?php

                                        $givewaydata = $admin_model_obj->dashboardRecentgivewaydata($record->user_id);

                                        //echo "<pre>";print_r($givewaydata);

                                        if (!empty($givewaydata)) {
                                            foreach ($givewaydata as $usegiveways) { ?>
                                                <div class="field-entry">
                                                    <div class="col-md-4 col-sm-4 col-xs-4 clear-padding"
                                                         style="padding: 0px;">
                                                        <p><a title="View Detail" style="color:#3f3f3f;"
                                                              href="{{url('/')}}/giveaway/gid/{{$usegiveways->tcg_gw_id}}">

                                                                <img src="<?php echo $admin_model_obj->cdnUrl('giveway_images/' . $usegiveways->tcg_gw_id . '/' . str_replace(' ', '%20', $usegiveways->gimage)); ?>"
                                                                     alt="" style="width: 100%;"> </br>
                                                                <span style="margin: 0 0 0 35px;font-weight: bold;"><?php echo $usegiveways->gunique_id; ?></span>
                                                            </a></p>
                                                    </div>
                                                    <div class="col-md-2 col-sm-4 col-xs-4 clear-padding">
                                                        <p> <?php echo substr($usegiveways->title, 0, 20); ?> </p>
                                                    </div>
                                                    <div class="col-md-2 col-sm-6 col-xs-6">
                                                        <p class="confirmed"
                                                           style="text-align: center;"><?php echo count($usegiveways->tcg_amples_entered); ?></p>
                                                    </div>
                                                    <div class="recen-div-date col-md-2 col-sm-2 col-xs-2 text-center clear-padding">
                                                        <p><?php echo  count($usegiveways->tcg_id); ?></p>
                                                    </div>
                                                    <div class="col-md-2 col-sm-4 col-xs-4 clear-padding"
                                                         style="padding: 0px;">
                                                        <p> <?php echo date('m/d/Y', strtotime($usegiveways->expire_date)); ?> </p>
                                                    </div>
                                                </div>
                                                <div class="clearfix"></div>
                                            <?php }
                                        } ?>
                                        <div class="col-md-12 text-center">
                                            <a href="{{url('/')}}/giveawayentry"
                                               class="btn btn-default"
                                               style="width: auto;height: auto;margin: 10px 0px 10px 0px;background: #f75d00;color: #fff;">View
                                                All Entrys</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="user-profile-offer">
                                    <h4>Complete your profile now to earn more Ample Points</h4>
                                    <div class="offer-body">
                                        <div class="offer-entry">
                                            <div class=" no-space">
                                                <div class="card hovercard">
                                                    <div class="cardheader"><img
                                                                src="<?php if ($record->user_banner) {
                                                                    echo $admin_model_obj->cdnUrl('user_images/' . $record->user_id . '/profile_banner/' . $record->user_banner);
                                                                } else {
                                                                    echo $admin_model_obj->cdnUrl('images/1200.jpg');
                                                                } ?>"></div>
                                                    <div class="profileimg"><img alt=""
                                                                                 src="<?php if ($record->user_image) {
                                                                                     echo $admin_model_obj->cdnUrl('user_images/' . $record->user_id . '/profile_image/' . $record->user_image);
                                                                                 } else {
                                                                                     echo $admin_model_obj->cdnUrl('images/img/user2.jpg');
                                                                                 } ?>"></div>
                                                    <div class="profileimg">
                                                        <ul>
                                                            <li class="chart" data-percent="0"><span
                                                                        id="completion_meter"></span>
                                                                <canvas height="95" width="95"></canvas>
                                                            </li>
                                                        </ul>
                                                    </div>
                                                    <div class="info">
                                                        <div class="col-lg-12">
                                                            <div class="title">
                                                                <a><?php echo($record->first_name . ' ' . $record->last_name); ?></a>
                                                                <br/>
                                                                <div class="desc">Amples : &nbsp;
                                                                    <?php if ($record->total_ample) {
                                                                        echo (int)($record->total_ample);
                                                                    } else {
                                                                        echo "0";
                                                                    } ?>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-6"></div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="clearfix"></div>
                                        <div class="clearfix"></div>
                                    </div>
                                </div>
                               
                                <div class="user-notification">
                                    <h4>Special Offers</h4>
                                    <?php $AllNotiFication = $admin_model_obj->GetCustomerNotification($record->user_id); ?>
                                    <?php //echo "<pre>";print_r($AllNotiFication); ?>
                                    <div class="notification-body" style="max-height: 580px;overflow-y: scroll;">
                                        <?php if (!empty($AllNotiFication)) {
                                            foreach ($AllNotiFication as $notification) {

                                                $TotalOffer = 0;
                                                $displayNoti = true;

                                                if (!empty($notification->end_date) && $notification->end_date != '0000-00-00 00:00:00') {

                                                    if (strtotime($notification->end_date) < time()) {
                                                        //echo '$datetime is in the past.';
                                                        $displayNoti = false;
                                                    }

                                                }

                                                if ($notification->product_id > 0) {

                                                    $productData = $admin_model_obj->GetSingle_Product_Data($notification->product_id);
                                                    $NoOfProductPurchase = $admin_model_obj->countproducttotalpurchase($notification->product_id);
                                                    if (!empty($productData->quantity)) {
                                                        $TotalOffer = $productData->quantity - count($NoOfProductPurchase);
                                                    }
                                                }
                                                ?>






                                                <?php if ($displayNoti) { ?>
                                                    <div class="notification-entry"
                                                         id="notification_<?php echo $notification->id; ?>">
                                                        <div class="vendor_img_container">
                                                            <img class="noti_vendor_img"
                                                                 src="<?php echo $admin_model_obj->cdnUrl('vendor-data/' . $notification->from_user . '/profile/' . $notification->vendor_image); ?>"
                                                                 alt="">
                                                        </div>
                                                        <div class="descreption_container">
                                                            <p class="noti_vendor_descreption"><?php echo $notification->subject; ?>
                                                                <span>-@php
															    $datetime=$notification->date_added;       
															    $full = false;                                 	
															    $now = new DateTime;
															    $ago = new DateTime($datetime);
															    $diff = $now->diff($ago);

															    $diff->w = floor($diff->d / 7);
															    $diff->d -= $diff->w * 7;

															    $string = array(
															        'y' => 'year',
															        'm' => 'month',
															        'w' => 'week',
															        'd' => 'day',
															        'h' => 'hour',
															        'i' => 'minute',
															        's' => 'second',
															    );
															    foreach ($string as $k => &$v) {
															        if ($diff->$k) {
															            $v = $diff->$k . ' ' . $v . ($diff->$k > 1 ? 's' : '');
															        } else {
															            unset($string[$k]);
															        }
															    }

															    if (!$full) $string = array_slice($string, 0, 1);
															    echo $string ? implode(', ', $string) . ' ago' : 'just now';
															    @endphp

                                                                	<?php echo time_elapsed_string($notification->date_added); ?></span>
                                                                



                                                                <?php if ($TotalOffer > 0) { ?>
                                                                    </br>
                                                                    <span style="margin-left: 23px;"> Offer Available :- <?php echo $TotalOffer; ?> </span>
                                                                <?php } ?>
                                                                <?php if (!empty($notification->end_date) && $notification->end_date != '0000-00-00 00:00:00') { ?>
                                                                    </br>
                                                                    <span style="margin-left: 23px;">
                                                                <?php $totalSec = (strtotime(date("Y-m-d H:i:s", strtotime($notification->end_date))) - time()); ?>
                                                                Offer Expire After :- <?php echo $admin_model_obj->secondsToWords($totalSec); ?> </span>
                                                                <?php } ?>
                                                            </p>
                                                        </div>















{{-- part - 6 --}}
                                                        <div class="offer_btn_cnt">
                                                            <a class="btn btn-primary offer_btn_cls"
                                                               href="{{url('/')}}/specialofferdetail/msgid/{{$notification->id}} ?>"
                                                               style="text-decoration: none;margin-left: 10px;"><i
                                                                        class="fa fa-eye"
                                                                        style="background: no-repeat;padding: 0px;"></i></a>

                                                            <a class="btn btn-primary offer_btn_cls"
                                                               href="javascript:void(0);"
                                                               onclick="deletenotification('<?php echo $notification->id; ?>');"><i
                                                                        class="fa fa-trash"
                                                                        style="background: no-repeat;padding: 0px;"></i></a>

                                                        </div>
                                                    </div>
                                                <?php } ?>
                                            <?php }
                                        } ?>
                                        <div class="clearfix"></div>
                                        <div class="col-md-12 text-center" style="border-top: 1px solid #f75d00;">
                                            <a href="{{url('/')}}/specialoffers"
                                               class="btn btn-default"
                                               style="width: auto;height: auto;margin: 10px 0px 10px 0px;background: #f75d00;color: #fff;">View
                                                All Offers</a>
                                        </div>
                                    </div>

                                    
                                    <div class="modal fade" id="notificationmodel" tabindex="-1" role="dialog"
                                         aria-labelledby="exampleModalLabel">
                                        <div class="modal-dialog" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h4 class="modal-title" id="exampleModalLabel">Special Offer
                                                        From </h4>
                                                </div>
                                                <div class="modal-body" id="special-offer"></div>
                                                <div class="modal-footer">
                                                    <button style="width: 100px;" type="button" class="btn btn-default"
                                                            data-dismiss="modal">Close
                                                    </button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div id="profile" class="tab-pane fade in">
                            <div class="col-md-12">
                                <h4 class="accurate_info"
                                    style="text-transform: uppercase;color: #f75d00;font-weight: bold;">By giving us
                                    accurate information
                                    we can serve you better</h4>
                            </div>
                            <div class="col-md-12">
                                <div class="user-personal-info">
                                    <h4>Personal Information change</h4>
                                    <div class="user-info-body">
                                        <form action="{{url('/')}}/default/index/customereditsignup"
                                              method="post" enctype="multipart/form-data">
                                            <div class="col-md-6 col-sm-12 profile_control_main profile_tagline">
                                                <label class="profile_pg_label">Tag Line</label>
                                                <input type="text" name="tagline"
                                                       value="<?php echo $record->tag_desc; ?>"
                                                       placeholder="Tag Line" class="form-control profile_pg_controle">
                                            </div>

                                            <div class="col-md-6 col-sm-12 profile_control_main profile_email">
                                                <label class="profile_pg_label">Email</label>
                                                <input type="text" name="email"
                                                       value="<?php echo $record->email; ?>" required
                                                       placeholder="lenore@example.com" readonly
                                                       class="form-control profile_pg_controle">
                                            </div>
                                            <div class="col-md-12 col-sm-12">
                                                <hr>
                                            </div>
                                            <div class="col-md-12 col-sm-12 profile_control_main">
                                                <label class="profile_ample_descreption"
                                                       style="text-transform: uppercase;color: #f75d00;">BY ENTERING
                                                    YOUR NAME YOU WILL EARN 5 AMPLE POINTS</label>
                                            </div>
                                            <div class="col-md-3 col-sm-12 profile_control_main profile_first_name">
                                                <label class="profile_pg_label">First Name</label>
                                                <input type="text" name="c_first_name"
                                                       value="<?php echo $record->first_name; ?>"
                                                       required placeholder="First Name"
                                                       class="form-control profile_pg_controle">
                                            </div>
                                            <div class="col-md-3 col-sm-12 profile_control_main profile_last_name">
                                                <label class="profile_pg_label">Last Name</label>
                                                <input type="text" name="c_last_name"
                                                       value="<?php echo $record->last_name; ?>"
                                                       required placeholder="Last Name"
                                                       class="form-control profile_pg_controle">
                                            </div>
                                            <div class="col-md-3 col-sm-12 select-style-profile-full profile_control_main profile_gender mobClear">
                                                <label class="profile_pg_label"
                                                       style="margin-left: 12px;">Gender</label>
                                                <select class="gender_drp profile_pg_controle" name="gender">
                                                    <option value="" disabled="disabled">Select Gender</option>
                                                    <option value="male" <?php if ($record->gender == 'male') {
                                                        echo "selected";
                                                    } ?>>Male
                                                    </option>
                                                    <option value="female" <?php if ($record->gender == 'female') {
                                                        echo "selected";
                                                    } ?>> Female
                                                    </option>
                                                </select>
                                            </div>
                                            <div class="col-md-3 col-sm-12 profile_control_main profile_age mobClear">
                                                <label class="profile_pg_label">Age</label>
                                                <input type="number" name="user_age"
                                                       value="<?php echo $record->user_age; ?>"
                                                       min="1" class="form-control profile_pg_controle">
                                            </div>
                                            <div class="col-md-12 col-sm-12">
                                                <hr>
                                            </div>
                                            <div class="col-md-4 col-sm-12 profile_control_main profile_contact"
                                                 style="padding-left: 0px">

                                                <div class="col-md-12 col-sm-12">
                                                    <label class="profile_ample_descreption"
                                                           style="text-transform: uppercase;color: #f75d00;">BY ENTERING
                                                        YOUR CELL PHONE YOU WILL EARN 4 AMPLE POINTS</label>
                                                </div>
                                                <div class="col-md-12">
                                                    <label class="profile_pg_label">Contact Number - Cell Phone</label>
                                                    <input type="text" name="cmobile"
                                                           value="<?php echo $record->mobile; ?>"
                                                           required class="form-control profile_pg_controle"
                                                           placeholder="Enter 10 Digit Number">
                                                </div>

                                            </div>
                                            <div class="col-md-4 col-sm-12 profile_control_main profile_dob"
                                                 style="padding-left: 0px">
                                                <div class="col-md-12 col-sm-12">
                                                    <label class="profile_ample_descreption"
                                                           style="text-transform: uppercase;color: #f75d00;">BY ENTERING
                                                        YOUR BIRTH DATE YOU WILL EARN 5 AMPLE POINTS</label>
                                                </div>
                                                <div class="col-md-12 col-sm-12 col-xs-12 clear-padding inmobile_date">
                                                    <label class="notification">Format: MM/DD/YEAR eg.07/14/1993</label>
                                                    <div class="control-group">
                                                        <div class="controls">
                                                            <input id="datepicker" type="text"
                                                                   class="date-picker form-control lb profile_pg_controle"
                                                                   name="birthday"
                                                                   value="<?php if ($record->birthday) {
                                                                       echo date('m/d/Y', strtotime($record->birthday));
                                                                   } ?>" placeholder="Birthday"/>
                                                            <!--<label id="datepicker" class="input-group-addon btn" style="cursor:default;"><i class="glyphicon glyphicon-calendar"></i></label>-->
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-4 col-sm-12 profile_control_main profile_education"
                                                 style="padding-left: 0px">
                                                <div class="col-md-12 col-sm-12">
                                                    <label class="profile_ample_descreption"
                                                           style="text-transform: uppercase;color: #f75d00;">BY ENTERING
                                                        YOUR EDUCATION YOU WILL EARN 5 AMPLE POINTS</label>
                                                </div>
                                                <div class="col-md-12 col-sm-12 col-xs-12 select-style-profile-full">
                                                    <label class="profile_pg_label"
                                                           style="margin-left: 12px;">Education</label>
                                                    <select class="profile_pg_controle"
                                                            name="education" <?php if ($record->education) { ?> required <?php } ?> >
                                                        <option value="" disabled="disabled">Choose Qualification
                                                        </option>


                                                        <option value="Post Graduate" <?php if (!empty($record->education) && $record->education == 'Post Graduate') {
                                                            echo "selected";
                                                        } ?>>Post Graduate
                                                        </option>
                                                        <option value="Graduate" <?php if (!empty($record->education) && $record->education == 'Graduate') {
                                                            echo "selected";
                                                        } ?>> Graduate
                                                        </option>
                                                        <option value="Under Graduate" <?php if (!empty($record->education) && $record->education == 'Under Graduate') {
                                                            echo "selected";
                                                        } ?>>Under Graduate
                                                        </option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-md-12 col-sm-12 mobClear">
                                                <hr>
                                            </div>
                                            <div class="col-md-12 col-sm-12 profile_control_main">
                                                <label class="profile_ample_descreption"
                                                       style="text-transform: uppercase;color: #f75d00;">BY ENTERING
                                                    YOUR INCOME YOU WILL EARN 4 AMPLE POINTS</label>
                                            </div>
                                            <div class="col-md-6 col-sm-12 col-xs-12 select-style-profile-full profile_control_main profile_income">
                                                <label class="profile_pg_label"
                                                       style="margin-left: 12px;">Income</label>
                                                <select class="profile_pg_controle"
                                                        name="income" <?php if ($record->income) { ?> required <?php } ?>>
                                                    <option value="" disabled="disabled">Choose Amount</option>

                                                  

                                                    <option value="$0 - $10,000" <?php if (!empty($record->income) && $record->income == '$0 - $10,000') {
                                                        echo "selected";
                                                    } ?>>$0 - $10,000
                                                    </option>
                                                    <option value="$10,000 - $20,000" <?php if (!empty($record->income) && $record->income == '$10,000 - $20,000') {
                                                        echo "selected";
                                                    } ?>>$10,000 - $20,000
                                                    </option>
                                                    <option value="$20,000 - $50,000" <?php if (!empty($record->income) && $record->income == '$20,000 - $50,000') {
                                                        echo "selected";
                                                    } ?>>$20,000 - $50,000
                                                    </option>
                                                    <option value="$50,000 - $100,000" <?php if (!empty($record->income) && $record->income == '$50,000 - $100,000') {
                                                        echo "selected";
                                                    } ?>>$50,000 - $100,000
                                                    </option>
                                                    <option value="Over $100,000 +" <?php if (!empty($record->income) && $record->income == 'Over $100,000 +') {
                                                        echo "selected";
                                                    } ?>>Over $100,000 +
                                                    </option>
                                                    <option value="student" <?php if (!empty($record->income) && $record->income == 'student') {
                                                        echo "selected";
                                                    } ?>>Student
                                                    </option>
                                                </select>
                                            </div>
                                            <div class="col-md-6 col-sm-12 col-xs-12 select-style-profile-full profile_control_main profile_employment mobMtop15">
                                                <label class="profile_pg_label"
                                                       style="margin-left: 12px;">Employment</label>
                                                <select class="profile_pg_controle"
                                                        name="employment" <?php if ($record->employment) { ?> required <?php } ?>>
                                                    <option value="" disabled="disabled">Choose Criteria</option>

                                                    <option value="Government" <?php if (!empty($record->employment) && $record->employment == 'Government') {
                                                        echo "selected";
                                                    } ?>>Government
                                                    </option>
                                                    <option value="Private Jobs" <?php if (!empty($record->employment) && $record->employment == 'Private Jobs') {
                                                        echo "selected";
                                                    } ?>> Private Jobs
                                                    </option>
                                                    <option value="Self Employed" <?php if (!empty($record->employment) && $record->employment == 'Self Employed') {
                                                        echo "selected";
                                                    } ?>>Self Employed
                                                    </option>
                                                    <option value="Student" <?php if (!empty($record->employment) && $record->employment == 'Student') {
                                                        echo "selected";
                                                    } ?>>Student
                                                    </option>
                                                </select>
                                            </div>
                                            <div class="col-md-12 col-sm-12 mobClear">
                                                <hr>
                                            </div>

                                            <div class="col-md-12 col-sm-12 profile_control_main">
                                                <label class="profile_ample_descreption"
                                                       style="text-transform: uppercase;color: #f75d00;">BY ENTERING
                                                    YOUR ZIP CODE YOU WILL EARN 5 AMPLE POINTS</label>
                                            </div>

                                            <div class="col-md-3 col-sm-12 col-xs-12 profile_control_main profile_zip">
                                                <label class="profile_pg_label">Zip Code</label>
                                                <input type="text" name="zip_code" id="user_zip"
                                                       class="form-control profile_pg_controle"
                                                       placeholder="Zip Code"
                                                       value="<?php if ($record->zip_code) {
                                                           echo $record->zip_code;
                                                       } ?>" style="margin: 0px !important;">
                                                <div id="zip_error"
                                                     style="color:red; margin:0px; padding:0px; position:absolute; bottom:2px;"></div>
                                            </div>
                                            <div class="col-md-3 col-sm-12 col-xs-12 select-style-profile-full profile_control_main profile_country mobClear mobMtop15">
                                                <label class="profile_pg_label"
                                                       style="margin-left: 12px;">Country</label>
                                                <select id="user_country" data-role="none" name="user_country"
                                                        onchange="changecount(this.value);"
                                                        class="countries profile_pg_controle">
                                                    <option value="" disabled="disabled">Choose Country</option>


                                                    <?php foreach ($countrylist as $contlst) { ?>
                                                        <option value="<?php echo $contlst->id; ?>" <?php if (!empty($record->user_countrykey) && $contlst->id == $record->user_countrykey) {
                                                            echo "selected";
                                                        } ?>><?php echo $contlst->name; ?></option>
                                                    <?php } ?>
                                                </select>
                                                <div id="country_error"
                                                     style="color:red; margin:0px; padding:0px; position:absolute; bottom:2px;"></div>
                                            </div>
                                            <div class="col-md-3 col-sm-12 col-xs-12 select-style-profile-full profile_control_main profile_state mobClear mobMtop15">
                                                <label class="profile_pg_label" style="margin-left: 12px;">State</label>
                                                <select id="user_state" name="user_state"
                                                        onchange="changecity(this.value);"
                                                        class="states profile_pg_controle" <?php if ($record->user_state) { ?> required <?php } ?>>
                                                    <option value="" disabled="disabled">Choose State</option>


                                                    <?php if (!empty($record->user_statekey)) { ?>

                                                        <option value="<?php echo $record->user_statekey; ?>"
                                                                selected><?php echo $record->user_state; ?></option>

                                                    <?php } ?>

                                                </select>
                                                <div id="state_error"
                                                     style="color:red; margin:0px; padding:0px; position:absolute; bottom:2px;"></div>
                                            </div>
                                            <div class="col-md-3 col-sm-12 col-xs-12 select-style-profile-full profile_control_main profile_city mobClear mobMtop15">
                                                <label class="profile_pg_label" style="margin-left: 12px;">City</label>
                                                <select id="user_city" name="user_city"
                                                        class="cities profile_pg_controle" <?php if ($record->user_city) { ?> required <?php } ?>>
                                                    <option value="" disabled="disabled">Choose City</option>

                                                    <?php if (!empty($record->user_citykey)) { ?>

                                                        <option value="<?php echo $record->user_citykey; ?>"
                                                                selected><?php echo $record->user_city; ?></option>
                                                    <?php } ?>
                                                </select>
                                                <div id="city_error"
                                                     style="color:red; margin:0px; padding:0px; position:absolute; bottom:2px;"></div>
                                            </div>
                                            <div class="col-md-12 col-sm-12 col-xs-12 profile_control_main profile_address mobMtop15"
                                                 style="margin-top: 15px;">
                                                <label class="profile_pg_label">Address</label>
                                                <textarea placeholder="Your Current Address" name="address"
                                                          id="current-address" class="form-control profile_pg_controle"
                                                          rows="5"
                                                          style="height: 60px;"><?php echo $record->address; ?></textarea>
                                                <div id="adr_error"
                                                     style="color:red; margin:0px; padding:0px; position:absolute; bottom:2px;"></div>
                                            </div>
                                            <div class="col-md-12 col-sm-12 mobClear">
                                                <hr>
                                            </div>
                                            <div class="col-md-12 col-sm-12 profile_control_main">
                                                <label class="profile_ample_descreption"
                                                       style="text-transform: uppercase;color: #f75d00;">BY UPLOADING
                                                    YOUR PROFILE IMAGE YOU WILL EARN 4 AMPLE POINTS</label>
                                            </div>
                                            <div class="col-md-4 col-sm-12 col-xs-12 profile_control_main profile_pic_upload">
                                                <label class="profile_pg_label">Change Profile Image <br> <span>(W-80 / H-80)</span>
                                                </label>
                                                <input type="file" name="profile-pic"
                                                       class="form-control upload-pic profile_pg_controle">
                                            </div>
                                            <br/>
                                            <br/>
                                            <div class="col-md-4 col-sm-12 col-xs-12 profile_control_main profile_banner_upload">
                                                <label class="profile_pg_label">Change Profile Banner <br> <span>(W-717 / H-310)</span>
                                                </label>
                                                <input type="file" name="user-banner"
                                                       class="form-control upload-pic profile_pg_controle">
                                            </div>
                                            <div class="col-md-4 col-sm-12 col-xs-12 profile_control_main profile_background_color">
                                                <label class="profile_pg_label">Change Background Color</label>
                                                <input type="color" class="form-control profile_pg_controle"
                                                       name="usrbg_color"
                                                       value="<?php if ($record->user_bgcolor) {
                                                           echo $record->user_bgcolor;
                                                       } else {
                                                           echo "#5367ce";
                                                       } ?>"/>
                                                <!--<div class="input-group demo1">
                                        <input type="text" class="form-control" name="usrbg_color" value="<?php if ($record->user_bgcolor) {
                                                    echo $record->user_bgcolor;
                                                } else {
                                                    echo "#5367ce";
                                                } ?>" />
                                        <span class="input-group-addon"><i></i></span>
                                        </div>-->
                                            </div>
                                            <br/>
                                            <br/>
                                            <?php if ($record->is_driver == 1) { ?>
                                                <input type="hidden" name="is_driver" value="1">
                                                <div class="col-md-12 col-sm-12" style="margin-top: 5px;">
                                                    <label>Bank Account Number</label>
                                                    <input type="text" name="bank_acc_no"
                                                           value="<?php echo $record->bank_acc_no; ?>"
                                                           required placeholder="Bank Account Number"
                                                           class="form-control">
                                                </div>
                                                <div class="col-md-12">
                                                    <label>Business License</label>
                                                    <input type="file"
                                                           name="business_license" <?php if (empty($record->business_license)) {
                                                        echo "required";
                                                    } ?> class="upload-pic">
                                                    <?php if (!empty($record->business_license)) { ?>
                                                        <a href="{{url('/')}}/user_images/{{$record->user_id}}/profile_banner/{{$record->business_license}} ?>"
                                                           title="Business License"
                                                           style="background: #00000000;padding: 0px;margin: 0px;"> <img
                                                                    src="<?php echo $admin_model_obj->cdnUrl('/user_images/' . $record->user_id . '/profile_banner/' . $record->business_license); ?>"
                                                                    alt="Business License"
                                                                    style="width: 100%;height: 115px;"> </a>
                                                    <?php } ?>
                                                </div>
                                                <br/>
                                                <br/>
                                                <div class="col-md-12 col-sm-12" style="margin-top: 10px;">
                                                    <label>Social security number / Fed tex id number</label>
                                                    <input type="text" name="business_number"
                                                           value="<?php echo $record->business_number; ?>"
                                                           required
                                                           placeholder="social security number / fed tex id number"
                                                           class="form-control">
                                                </div>
                                                <div class="col-md-12">
                                                    <label>Driving License</label>
                                                    <input type="file"
                                                           name="driving_license" <?php if (empty($record->driving_license)) {
                                                        echo "required";
                                                    } ?> class="upload-pic">
                                                    <?php if (!empty($record->driving_license)) { ?>
                                                        <a href="<?php echo $admin_model_obj->cdnUrl('/user_images/' . $record->user_id . '/profile_banner/' . $record->driving_license); ?>"
                                                           title="Driving License"
                                                           style="background: #00000000;padding: 0px;margin: 0px;"> <img
                                                                    src="<?php echo $admin_model_obj->cdnUrl('/user_images/' . $record->user_id . '/profile_banner/' . $record->driving_license); ?>"
                                                                    alt="Driving License"
                                                                    style="width: 100%;height: 115px;"> </a>
                                                    <?php } ?>
                                                </div>
                                                <br/>
                                                <br/>
                                            <?php } ?>

                                            <div class="clearfix"></div>
                                            <div class="col-md-6 col-sm-6 col-xs-6 text-left button_in_mobie">
                                                <button type="submit">SAVE CHANGES</button>
                                            </div>
                                            <div class="col-md-6 col-sm-6 col-xs-6 text-center"></div>
                                        </form>
                                    </div>
                                </div>
                            </div>





























{{-- part-7 --}}
                            <div class="clearfix"></div>
                            <div class="col-md-12 col-sm-12">
                                <hr>
                            </div>
                            <div class="col-md-6">
                                <div class="user-change-password">
                                    <h4>Change Password</h4>
                                    <div class="change-password-body">
                                        <form name="changepassword" action="" method="post"
                                              enctype="multipart/form-data">
                                            <div class="col-md-12">
                                                <label>Current Password</label>
                                                <input type="password" placeholder="Old Password" class="form-control"
                                                       id="old_pwd" name="old_password">
                                                <p id="oldpwd_err" style="color:#D8000C; display:none;"></p>
                                            </div>
                                            <div class="col-md-12">
                                                <label>New Password</label>
                                                <input type="password" placeholder="New Password" class="form-control"
                                                       id="new_pwd" name="new_password">
                                                <p id="newpwd_err" style="color:#D8000C; display:none;"></p>
                                            </div>
                                            <div class="col-md-12">
                                                <label>Confirm Password</label>
                                                <input type="password" placeholder="Confirm Password"
                                                       class="form-control" id="cnfrm_pwd" name="confirm_password">
                                                <p id="confrmpwd_err" style="color:#D8000C; display:none;"></p>
                                            </div>
                                            <div class="col-md-12 text-center">
                                                <button type="button" href="javascript:void(0);"
                                                        onclick="cchangepassword(document.getElementById('old_pwd').value,document.getElementById('new_pwd').value,document.getElementById('cnfrm_pwd').value);">
                                                    SAVE CHANGES
                                                </button>
                                            </div>
                                        </form>
                                    </div>
                                </div>

@php
die();
@endphp
                            </div>
                            <div class="col-md-6">
                                <div class="user-change-password">
                                    <h4>Change Your Referral Code</h4>
                                    <div class="change-password-body">
                                        <form name="changerefferalcode" action="" method="post"
                                              enctype="multipart/form-data">
                                            <div class="col-md-12">
                                                <label>Your Referral Code</label>
                                                <input type="text" class="form-control"
                                                       value="<?php echo $this->record['data'][0]['referral_no']; ?>"
                                                       id="referral_no" name="referral_no">
                                                <p id="referral_no_err" style="color:#D8000C; display:none;"></p>
                                                <p id="referral_no_suc"
                                                   style="color:#198754;display:none;font-weight: bold;text-align: center;"></p>
                                            </div>

                                            <div class="col-md-12 text-center">
                                                <button type="button"
                                                        onclick="changeRefferalCode(document.getElementById('referral_no').value);">
                                                    SAVE CHANGES
                                                </button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div id="updatednew"></div>
                        <div id="purchase" class="tab-pane fade in">
                            <div class="col-md-3 col-sm-3 col-xs-6">
                                <form>
                                    <select id="filterpurchase" class="form-control"
                                            style="height: 35px !important;max-width: 140px !important;">
                                        <option value="">All Orders</option>
                                        <option value="amples">Amples</option>
                                        <option value="amplecash">Amples & Cash</option>
                                        <option value="cash">Cash</option>
                                    </select>
                                </form>
                            </div>
                            <div class="clearfix"></div>
                            <div class="col-md-12">
                                <script>
                                    var filterTable = function (item) {
                                        var val = item.val();
                                        $('tbody tr').show();
                                        if (val) {
                                            $('tbody tr').not($('tbody tr[data-year="' + val + '"]')).hide();
                                        }
                                    };
                                    $('#filterpurchase').on('change', function (e) {
                                        filterTable($(this));
                                    });
                                    filterTable($('#filterpurchase'));
                                    //# sourceURL=pen.js
                                </script>
                                <div class="item-content-a table-responsive replace_my_purchases"
                                     style="/*max-height: 1000px;overflow-y: auto;*/">

                                </div>
                                <div class="col-md-12 text-center">
                                    <a href="<?php echo $this->baseUrl('/purchase'); ?>" class="btn btn-default"
                                       style="width: auto;height: auto;padding: 15px;margin: 10px 0px 10px 0px;background: #f75d00;color: #fff;">View
                                        All Orders</a>
                                </div>
                            </div>
                        </div>
                        <div id="local_purchase" class="tab-pane fade in">
                            <div class="col-md-3 col-sm-3 col-xs-6">
                                <form>
                                    <select id="localfilter" class="form-control"
                                            style="height: 35px !important;max-width: 140px !important;">
                                        <option value="">All Orders</option>
                                        <option value="amples">Amples</option>
                                        <option value="amplecash">Amples & Cash</option>
                                        <option value="cash">Cash</option>
                                    </select>
                                </form>
                            </div>
                            <script>
                                var filterLocalTable = function (item) {
                                    var val = item.val();
                                    $('#localtable tbody tr').show();
                                    if (val) {
                                        $('#localtable tbody tr').not($('tbody tr[data-year="' + val + '"]')).hide();
                                    }
                                };
                                $('#localfilter').on('change', function (e) {
                                    filterLocalTable($(this));
                                });
                                filterLocalTable($('#localfilter'));
                                //# sourceURL=pen.js
                            </script>
                            <div class="clearfix"></div>
                            <div class="col-md-12">
                                <div class="item-content-a table-responsive replace_my_local_purchase"
                                     style="margin-top: 15px;">

                                </div>
                                <div class="col-md-12 text-center">
                                    <a href="<?php echo $this->baseUrl('/localpurchase'); ?>" class="btn btn-default"
                                       style="width: auto;height: auto;padding: 15px;margin: 10px 0px 10px 0px;background: #f75d00;color: #fff;">View
                                        All Orders</a>
                                </div>
                            </div>
                        </div>
                        <div id="checkoutwithamples" class="tab-pane fade in">
                            <div class="col-md-12">
                                <div class="item-content-a table-responsive replace_checkout_with_amples"
                                     style="/*max-height: 1000px;overflow-y: auto;*/">

                                </div>

                                <div class="col-md-12 text-center">
                                    <a href="<?php echo $this->baseUrl('/amplecheckoutpurchase'); ?>"
                                       class="btn btn-default"
                                       style="width: auto;height: auto;padding: 15px;margin: 10px 0px 10px 0px;background: #f75d00;color: #fff;">View
                                        All Orders</a>
                                </div>
                            </div>
                        </div>
                        <div id="bookingswithamples" class="tab-pane fade in">
                            <div class="col-md-12">
                                <div class="item-content-a table-responsive replace_bookings_with_amples"
                                     style="/*max-height: 1000px;overflow-y: auto;*/">

                                </div>


                            </div>
                        </div>
                        <div id="wishlist" class="tab-pane fade in">
                            <div class="col-md-12">
                                <div class="item-content-a table-responsive">
                                    <table class="table table-bordered-a table-responsive cart_summary">
                                        <thead>
                                        </thead>
                                        <tr class="wcart">
                                            <th class="th-a back-color">Product</th>
                                            <th class="th-a">Description</th>
                                            <th class="th-a">Vendor</th>
                                            <th class="th-a">Qty</th>
                                            <th class="th-a">Total</th>
                                            <th class="action th-a">Action</th>
                                        </tr>
                                        <?php if ($this->wishcartdata > 0) {
                                            foreach ($this->wishcartdata as $wishlistdatakey) { ?>
                                                <tbody>
                                                <tr>
                                                    <td class="cart_product"><a
                                                                href="<?php echo $this->baseUrl('/productdetail/' . $wishlistdatakey['product_id']); ?>"><img
                                                                    src="<?php echo $admin_model_obj->cdnUrl('product_images/' . $wishlistdatakey['product_id'] . '/' . $wishlistdatakey['image_name']); ?>"
                                                                    alt="Product"></a></td>
                                                    <td class="cart_description"><p class="product-name"><a
                                                                    href="#"><?php echo $wishlistdatakey['product_name']; ?> </a>
                                                        </p>
                                                        <small class="cart_ref">SKU :
                                                            #<?php echo $wishlistdatakey['product_sku']; ?></small>
                                                        <br></td>
                                                    <td class="price">
                                                        <span><?php echo $wishlistdatakey['supplier_name']; ?></span>
                                                    </td>
                                                    <td class="qty"><input class="form-control input-sm" value="1"
                                                                           type="text"></td>
                                                    <td class="price">
                                                        <span><?php echo $wishlistdatakey['single_price']; ?></span>
                                                    </td>
                                                    <td>
                                                        <div class="item-footer-a"><a
                                                                    href="<?php echo $this->baseUrl('/productdetail/') . $this->escape($wishlistdatakey['product_id']); ?>">Buy
                                                                Now</a> <a href="javascript:void(0);"
                                                                           onclick="remove_wishlist_item('<?php echo strip_tags($wishlistdatakey['product_id']); ?>','<?php echo $this->usrmakey; ?>');">Remove</a>
                                                        </div>
                                                    </td>
                                                </tr>
                                                <tr class="bottem-line"></tr>
                                                </tbody>
                                            <?php }
                                        } ?>
                                    </table>
                                </div>
                            </div>
                        </div>
                        <!--Edited  -->
                        <div id="ample-reward" class="tab-pane fade in">
                            <?php

                            foreach ($this->progressdata as $progressdatarow) {

                                //print_r($progressdatarow);
                                $reward_timeuser = $progressdatarow['reward_time'];

                            }

                            /*
                        if(count($this->rewardorder)> 0) {

                        $totalspent= $reward_timeuser;
                        // $totalspent= 0;
                        //echo"</br>";
                        foreach($this->rewardorder as $row) {

                        //print_r($row);
                        $totalspent += $row['total_price'];
                        }


                        }
                        //$totalspent;

                        //die;

                        $reward_time=0;
                        $reward_minutes=0;
                        if(!empty($totalspent)){
                        if($totalspent <= 500 ){

                        //echo "Ample silver";

                        $totalspent;
                        //echo "</br>";
                        $reward_time= $totalspent*5/100;

                        //    echo "</br>";

                        $reward_minutes= $reward_time*100/12;
                        //    echo "</br>";

                        }else if($totalspent <= 1000){

                        //    echo "Ample Gold";
                        $reward_time= $totalspent*7/100;
                        $reward_minutes= $reward_time*100/12;


                        }else if($totalspent >= 1000){

                        //echo "Ample Platinum";
                        $reward_time= $totalspent*10/100;
                        $reward_minutes= $reward_time*100/12;
                        }
                        }

                        //$admin_model_obj    = new Admin_Model_Admin();
                        // $userkeyid= $this->usrmakey;
                        // $updaterewardevery = $admin_model_obj->updaterewardevery($reward_minutes, $userkeyid);
                        */

                            ?>
                            <div class="col-md-7">
                                <div class="top-amples-detail">
                                    <div>
                                        <div class="col-lg-6 ail">
                                            <p class="first-parab"
                                               style="background-color: #eeeeee;margin: -13px -15px;padding: 12px 8px; width: 196px; text-transform: uppercase;color: #131032;font-size: 15px;">
                                                <img src="<?php echo $admin_model_obj->cdnUrl('img/social-icon/dollerr.png'); ?>"/>
                                                Invite Friends & Earn</p>
                                        </div>
                                        <div class="col-lg-6 amples-text-right ail">
                                            <p class="second-parab" style="font-size:17px;"><img
                                                        src="<?php echo $admin_model_obj->cdnUrl('img/social-icon/i-icon.png'); ?>"/>
                                                REWARD TIME FAQ</p>
                                        </div>
                                    </div>
                                    <div style="background-color: rgb(255, 255, 255); height: 163px; margin-left: 82px; margin-top: 52px; width: 68%; box-shadow: 2px -1px 0px 2px rgb(212, 212, 212);"
                                         class="col-lg-6 col-xs-offset-3 inner-box">
                                        <div class="Your-amples"
                                             style="float: right;margin-right: 42px;margin-top: 49px;width: 41%;color: #747474;">
                                            <h4 style="font-size:20px;width:129%;">Your <span style="color:#000">Reward Time</span><br>
                                                Balance</h4>
                                        </div>
                                        <div class="Your-amples-a"
                                             style="margin-left:3px; margin-top: 7px; width: 40%;"><img
                                                    src="<?php echo $admin_model_obj->cdnUrl('img/social-icon/new-logo.png'); ?>"/>
                                            <p class="myrevrd">
                                                <?php // if($this->record['data'][0]['total_ample']) { echo (int) ($this->record['data'][0]['total_ample']); } else { echo "0"; }
                                                // if(!empty($reward_minutes)){ echo round($reward_minutes); }else{
                                                echo $reward_timeuser;
                                                // }   ?>
                                                <span>Reward Time</span></p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-5">
                                <div class="top-amples-detail-right-boxs" style="background-color: #f6f6fc;">
                                    <div class="fixed-class-div">
                                        <h2 style="background-color: #fff;color:#006a42;font-weight:700;margin-top: 27px;letter-spacing: 2px;padding: 0 6px;width: 262px;">
                                            WHAT IS REWARD TIME?</h2>
                                        <!--<h4>Here's a rundown of where you've been and what you've earned so far.</h4>-->
                                        <p style="background-color: #ffffff;font-size: 18px;font-weight: bolder; margin-top: 20px;padding: 1px 34px 17px 18px; margin-left: 15px;margin-right: 15px">
                                            Reward Time is separate from Ample Points. Reward Time is the time you are
                                            allotted to watch Ads in the Cube so you can earn more Ample Points!</p>
                                        <h3 style="background-color: #fff;color:#006a42;font-size: 18px;font-weight: 700;margin-left: 14px;padding: 3px 8px;width: 240px;">
                                            MORE REWARD TIME FAQ</h3>
                                        <i class="fa fa-caret-right"
                                           style="color: #036e45;float: right;font-size: 25px;position: relative;top: -41px;right: 78px;"
                                           aria-hidden="true"></i></div>
                                    <!--<div class="top-amples-detail-right-box">

                            <!--<h3>You purchased Trove Hoops,Hejsa (Neon Pink)-size 8.5 ,Broderick T (Lilac Rose)-size4 for 375 points,(07/05/13)</h3>
                            <h3>You purchased Lady Lioness Bracelet on for 135 points.(12/22/12)</h3>
                            <h3>You received 500points for being a valued customer!(08/14/12) </h3>

                            <?php if ($this->userpurchased > 0) {
                                        foreach ($this->userpurchased as $userpurchasedkey) { ?>

                                    <div class="order-no">
                                    <div>
                                    <div class="order-amples"><h2>Order No. <span><a href="#" class="order-a" style="font-size:11px;"><?php echo substr($userpurchasedkey['order_id'], 0, 7); ?></a></span></h2> </div>

                                    <div class="order-amples"><h2>Date:
                                    <span><?php echo date('m/d/Y', strtotime($userpurchasedkey['date'])); ?></span></h2>
                                    </div>
                                    </div>
                                    <div class="produect-name">
                                    <h2><span>Product Name </span> <?php echo substr($userpurchasedkey['product_name'], 0, 20); ?></h2>
                                    </div>
                                    <div class="produect-name">
                                    <h2><span>Price </span> $<?php echo $userpurchasedkey['amount']; ?></td></h2>
                                    </div>
                                    <div class="produect-name">
                                    <h2><span>Amples Earn </span> <?php echo (int)$userpurchasedkey['earned_amples']; ?> &nbsp;<img src="<?php echo $this->baseUrl('img/amples-sall.png'); ?>"/></h2>
                                    </div>
                                    <div class="produect-name">
                                    <h2><span>Amples Redeem </span> <?php echo (int)$userpurchasedkey['apply_amples']; ?> &nbsp;<img src="<?php echo $this->baseUrl('img/amples-sall.png'); ?>"/></h2>
                                    </div>
                                    </div>

                                    <?php }
                                    } ?>
                            </div>-->
                                </div>
                            </div>
                            <div class="col-lg-12">
                                <div class="what-are-amples" style="background-color: #f6f6fc;">
                                    <div class="col-lg-12">
                                        <div class="arrow-amples-a" style="font-size: 40px;margin: 18px 107px;"><i
                                                    class="fa fa-arrow-right"></i></div>
                                        <!--<div class="arrow-amples-b">or</div>-->
                                        <div class="arrow-amples-c" style="font-size: 40px;margin:18px 80px;"><i
                                                    class="fa fa-arrow-right"></i></div>
                                        <div class="star-a" style="margin: 40px;"><img
                                                    src="<?php echo $admin_model_obj->cdnUrl('img/social-icon/new-sublogo1.png'); ?>"/>
                                            <h2 style="color:#5fceb9;font-weight:bold;font-size:18px;border-bottom:none">
                                                EARN REWARD TIME</h2>
                                            <p style="font-size:15px;font-weight:900;color:#000;line-height:20px;padding: 6px 11px;width: 111%; background-color: #ffffff;">
                                                Get Reward Time by Signing Up as a Member, Shopping and Inviting
                                                Friends!</p>
                                        </div>
                                        <!--<div class="star-a"> <img src="<?php echo $this->baseUrl('img/social-icon/shopping-icon.png'); ?>" />
                                <h2>GO SHOPPING</h2>
                                <p>Use Your Amples to Get your purchase for free or at a discountsof your choice !</p></div>-->
                                        <div class="star-a" style="margin: 40px;"><img
                                                    src="<?php echo $admin_model_obj->cdnUrl('img/social-icon/new-sublogo2.png'); ?>"/>
                                            <h2 style="color:#5fceb9;font-weight:bold;font-size:18px;border-bottom:none;width: 234px;">
                                                WATCH ENTERTAINING ADS</h2>
                                            <p style="font-size:15px;font-weight:900;color:#000;line-height:20px;width:101%;padding: 6px 11px;width: 111%; background-color: #ffffff;">
                                                Choose from a variety of entertaining ads that interest you and earn
                                                Ample Points!</p>
                                        </div>
                                        <div class="star-a" style="margin: 30px;"><img
                                                    src="<?php echo $admin_model_obj->cdnUrl('img/social-icon/new-sublogo3.png'); ?>"/>
                                            <h2 style="color:#5fceb9;font-weight:bold;font-size:18px;border-bottom:none;width:114%;">
                                                GET MORE AMPLE POINTS!</h2>
                                            <p style="font-size:15px;font-weight:900;color:#000;line-height:20px;padding: 6px 11px;width: 111%; background-color: #ffffff;">
                                                Use Ample Points towards your purchases and to enter giveaways!</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="ample-icon">
                                    <!--<p>*Amples can be used towards products with the Ample icon <img src="<?php echo $this->baseUrl('img/amples-sall.png'); ?>"/></p>-->
                                </div>
                                <div class="col-md-12 sectn increas-points">
                                    <div class="section-two"
                                         style="text-align:center; margin-bottom: 30px;margin-top: 30px;">
                                        <h2 style="background-color: #fff;color: #006a42;text-align: center;width: 36%;margin-left: 27%;width:48%;">
                                            INCREASE MY REWARD TIME</h2>
                                        <p style="background-color: #fff;font-size: 18px;margin-left: 24%;width: 53%;">
                                            You can earn Reward Time for doing the following activities!</p>
                                    </div>
                                    <div class="box-one"
                                         style="background-color: #f3fbf3;float: left;width: 48%;height: 94px; margin-left: 10px;">
                                        <i class="fa fa-check"
                                           style="background-color: #37a849;border-radius: 10em;color: #ffffff;font-size: 25px;height: 37px;text-align: center;width: 37px;margin: 24px 20px;padding: 1px 0;"
                                           aria-hidden="true"></i>
                                        <h2 style="color: #2a966d;font-size:18px;font-weight: bold;margin: 0;position: relative;top: -51px;left: 70px;">
                                            Become a Member</h2>
                                        <p style="float: right;margin: 0;position: relative;right: 68px;font-weight: bold;color: #026242;bottom: 92px;">
                                            Earn</p>
                                        <h3 style="bottom: 89px;color: #696969;float: right;font-weight: bold;position: relative;right: 19px;">
                                            10:00<img src="/img/social-icon/mini-logo.png" alt="" height="22"
                                                      width="28"></h3>
                                    </div>
                                    <div class="box-two"
                                         style="background-color: #ffffff;width: 48%;height: 94px;float: right; margin-right: 10px;">
                                        <div class="watch-adsss">Watch Advertisements and Earn Reward Time <span>coming soon...</span>
                                        </div>
                                    </div>
                                    <!-- <div class="box-three" style="background-color: #f3fbf3;float: left;margin-top: 13px;width: 48%;height: 94px; clear: both; margin-left: 10px; margin-bottom: 20px;">
                            <i class="fa fa-users" style="background-color: #1d695e;border-radius: 10em;color: #ffffff;font-size: 23px;padding: 2px 0;height: 37px;text-align: center;width: 37px;margin: 24px 20px;"aria-hidden="true"></i>
                            <h2 style=" bottom: 79px; color:#2a966d;font-size: 18px;font-weight:700;left:67px; position: relative;">Invite friends to join<br>AmplePoints</h2>
                            <p style="float: right;margin: 0;position: relative;right: 68px;font-weight: bold;color: #026242;bottom: 144px;">Earn</p>
                            <h3 style="bottom: 142px;color: #696969;float: right;font-weight: bold;position: relative;right: 19px;">60s<img src="/img/social-icon/mini-logo.png" alt="" height="22" width="28"></h3></div>
                            <div class="box-four" style="background-color: #f3fbf3;width: 48%;height: 94px;;float: right;margin-top: 13px; margin-right: 10px;">
                            <i class="fa fa-shopping-cart" style="background-color: #ff0c38;border-radius: 10em;color: #ffffff;font-size: 24px;padding: 2px 0;height: 37px;text-align: center;width: 37px;margin: 24px 20px;" aria-hidden="true"></i>
                            <h2 style="bottom: 71px;color:#2a966d;font-size: 20px;font-weight: 600;left: 72px;position: relative;">Purchase Products</h2>
                            <p style="float: right;margin: 0;position: relative;right: 68px;font-weight: bold;color: #026242;bottom: 122px;">Earn<br><img width="71" height="80" style="bottom: 28px;padding: 10px 0;position: relative;" src="/img/social-icon/mini-logo2.png" alt=""></p></div>-->
                                </div>
                                <div class="col-md-12 sectn2 packegeses" style="background-color:#fff; margin: 10px 0;">
                                    <h1 style="color: #006a42;font-size: 20px;font-weight: 700;padding: 2px 31px;">
                                        MEMBER STATUS LEVELS AND REWARD TIME ALLOWED <br>
                                        For Every $1 EARN 5%-10% Reward Time</h1>
                                    <div class="col-md-4 silver">
                                        <h1 style="font-size: 20px;">AMPLE SILVER</h1>
                                        <h1 style="font-size: 20px;">Consumer Spends</h1>
                                        <p style="font-size: 17px;text-align: center;color: #7f7f7f; letter-spacing: 2px;">
                                            $1-$500</p>
                                        <h1 style="font-size: 20px;">Earns 5% Reward Time</h1>
                                    </div>
                                    <div class="col-md-4 gold">
                                        <h1 style="font-size: 20px;">AMPLE GOLD</h1>
                                        <h1 style="font-size: 20px;">Consumer Spends</h1>
                                        <p style="font-size: 17px;text-align: center;color: #eab600; letter-spacing: 2px;">
                                            $501-$1000</p>
                                        <h1 style="font-size: 20px;">Earns 7% Reward Time</h1>
                                    </div>
                                    <div class="col-md-4 platinum">
                                        <h1 style="font-size: 20px;">AMPLE PLATINUM</h1>
                                        <h1 style="font-size: 20px;">Consumer Spends</h1>
                                        <p style="font-size: 17px;text-align: center;color: #595978; letter-spacing: 2px;">
                                            $1001+</p>
                                        <h1 style="font-size: 20px;">Earns 10% Reward Time</h1>
                                    </div>
                                </div>
                                <div class="monmthwise">
                                    <input type="text" class="form-control has-feedback-left" name="startingdate"
                                           id="datepickerfrom" placeholder="From Date">
                                    <input type="text" class="form-control has-feedback-left" name="enddates"
                                           id="datepickerto" placeholder="To Date">
                                    <input type="hidden" class="form-control has-feedback-left" name="hidereward"
                                           id="hidereward">
                                    <button id="getdays">Get data</button>
                                    <div id="my"></div>
                                    <script>
                                        $(document).ready(function () {
                                            $('#getdays').click(function () {
                                                var startnew = $('#datepickerfrom').val();
                                                var endnew = $('#datepickerto').val();
                                                var usrid = '<?php echo $this->usrmakey; ?>';
                                                if (startnew != '' && endnew != '') {
                                                    $.ajax({
                                                        url: '<?php echo $baseUrl; ?>/category_filter/getuserewardhistory.php',
                                                        data: {rewardstart: startnew, rewardend: endnew, usrid: usrid},
                                                        type: 'POST'
                                                    })
                                                        .done(function (data) {
                                                            //alert(data);
                                                            $('#rewarddata').html(data);

                                                        })
                                                } else {

                                                    alert("Please Enter Start Date and End Date");
                                                }
                                            });
                                        });
                                    </script>
                                </div>

                                <!-- Reward time table -->

                                <style>


                                </style>
                                <div class="panel panel-primary filterable">
                                    <div class="panel-heading"></div>
                                    <table class="table">
                                        <thead>
                                        <tr class="filters">
                                            <th style="background: #005cb9;color: #ffffff;">Date</th>
                                            <th style="background: #005cb9;color: #ffffff;">TOTAL SPEND</th>
                                            <th style="background: #005cb9;color: #ffffff;">5%</th>
                                            <th style="background: #005cb9;color: #ffffff;">7%</th>
                                            <th style="background: #005cb9;color: #ffffff;">10%</th>
                                            <th style="background: #005cb9;color: #ffffff;">TOTAL REWARDS VALUE</th>
                                            <th style="background: #005cb9;color: #ffffff;">TOTAL REWARD TIME</th>
                                        </tr>
                                        </thead>
                                        <tbody id="rewarddata">
                                        <?php $RewardHistory = $admin_model_obj->GetUserRewardHistory($this->record['data'][0]['user_id']); ?>
                                        <?php if (!empty($RewardHistory)) {

                                            foreach ($RewardHistory as $rhistory) {

                                                $totalPercent = ($rhistory['five_percent_total'] + $rhistory['seven_percent_total'] + $rhistory['ten_percent_total']);
                                                ?>
                                                <tr>
                                                    <td style="text-align: center;"><?php echo date('d M Y', strtotime($rhistory['date_added'])); ?></td>
                                                    <td style="text-align: center;">
                                                        $<?php echo number_format($rhistory['order_amount'], 2); ?></td>
                                                    <td style="text-align: center;">
                                                        $<?php echo number_format($rhistory['five_percent_total'], 2); ?></td>
                                                    <td style="text-align: center;">
                                                        $<?php echo number_format($rhistory['seven_percent_total'], 2); ?></td>
                                                    <td style="text-align: center;">
                                                        $<?php echo number_format($rhistory['ten_percent_total'], 2); ?></td>
                                                    <td style="text-align: center;">
                                                        $<?php echo number_format($totalPercent, 2); ?></td>
                                                    <td style="text-align: center;"><?php echo str_replace('.', ':', number_format($rhistory['total_reward'], 2, '.', '')); ?></td>
                                                </tr>
                                            <?php }
                                        } else { ?>
                                            <tr>
                                                <td colspan="8" style="text-align: center;">No Data Found</td>
                                            </tr>
                                        <?php } ?>
                                        </tbody>
                                    </table>
                                </div>
                                <!-- END of Reward time table -->

                            </div>
                            <div class="col-lg-12"></div>
                        </div>

                        <!--Edited  -->

                        <div id="ample-detail" class="tab-pane fade in">
                            <div class="col-md-7">
                                <div class="top-amples-detail">
                                    <div>
                                        <div class="col-lg-6 ail">
                                            <p>
                                                <img src="<?php echo $admin_model_obj->cdnUrl('img/social-icon/doller.png'); ?>"/>
                                                Invite Friends & Earn</p>
                                        </div>
                                        <div class="col-lg-6 amples-text-right ail">
                                            <p>
                                                <img src="<?php echo $admin_model_obj->cdnUrl('img/social-icon/i-icon.png'); ?>"/>
                                                Amples FAQ</p>
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-xs-offset-3">
                                        <div class="Your-amples">
                                            <h2>Your</h2>
                                            <h3><span>Amples</span></h3>
                                            <h4>Balance</h4>
                                        </div>
                                        <div class="Your-amples-a"><img
                                                    src="<?php echo $admin_model_obj->cdnUrl('img/social-icon/logo-a.png'); ?>"/>
                                            <p>
                                                <?php if ($this->record['data'][0]['total_ample']) {
                                                    echo (int)($this->record['data'][0]['total_ample']);
                                                } else {
                                                    echo "0";
                                                } ?>
                                            </p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-5 main-historyss">
                                <ul class="main-historyss-ul">
                                    <li>
                                        <span class="main-historyss-ul-1 main-historyss-ul-active">REWARDS HISTORY</span>
                                    </li>
                                    <li><span class="main-historyss-ul-2">Earned Amples HISTORY</span></li>
                                </ul>
                                <div class="top-amples-detail-right" style="display:block;">
                                    <div class="fixed-class-div">
                                        <h2>REWARDS HISTORY</h2>
                                        <h4>Here's a rundown of where you've been and what you've earned so far.</h4>
                                    </div>
                                    <div class="top-amples-detail-right-box">

                                        <!--<h3>You purchased Trove Hoops,Hejsa (Neon Pink)-size 8.5 ,Broderick T (Lilac Rose)-size4 for 375 points,(07/05/13)</h3>
                                <h3>You purchased Lady Lioness Bracelet on for 135 points.(12/22/12)</h3>
                                <h3>You received 500points for being a valued customer!(08/14/12) </h3>-->

                                        <?php if ($this->userpurchased > 0) {
                                            foreach ($this->userpurchased as $userpurchasedkey) {

                                                $SingleOrdrRow = $admin_model_obj->getSingleOrderRow($userpurchasedkey['order_id']);

                                                if (isset($SingleOrdrRow[0]['order_date']) && !empty($SingleOrdrRow[0]['order_date'])) {

                                                    $timestamp = strtotime($SingleOrdrRow[0]['order_date']);

                                                } else {

                                                    $timestamp = strtotime($userpurchasedkey['updated_date']);
                                                }


                                                ?>
                                                <div class="order-no">
                                                    <div>
                                                        <div class="order-amples">
                                                            <h2>Order No. <span><a href="#" class="order-a"
                                                                                   style="font-size:11px;"><?php echo substr($userpurchasedkey['order_id'], 0, 7); ?></a></span>
                                                            </h2>
                                                        </div>
                                                        <div class="order-amples">
                                                            <h2>Date:
                                                                <span><?php echo date('m/d/Y', $timestamp); ?></span>
                                                            </h2>
                                                        </div>
                                                    </div>
                                                    <div class="produect-name">
                                                        <h2>
                                                            <span>Product Name </span> <?php echo substr($userpurchasedkey['product_name'], 0, 20); ?>
                                                        </h2>
                                                    </div>
                                                    <div class="produect-name">
                                                        <h2><span>Price </span>
                                                            $<?php echo $userpurchasedkey['amount']; ?>
                                                            </td>
                                                        </h2>
                                                    </div>
                                                    <div class="produect-name">
                                                        <h2>
                                                            <span>Amples Earn </span> <?php echo (int)$userpurchasedkey['earned_amples']; ?>
                                                            &nbsp;<img
                                                                    src="<?php echo $admin_model_obj->cdnUrl('img/amples-sall.png'); ?>"/>
                                                        </h2>
                                                    </div>
                                                    <div class="produect-name">
                                                        <h2>
                                                            <span>Amples Redeem </span> <?php echo (int)$userpurchasedkey['apply_amples']; ?>
                                                            &nbsp;<img
                                                                    src="<?php echo $admin_model_obj->cdnUrl('img/amples-sall.png'); ?>"/>
                                                        </h2>
                                                    </div>
                                                </div>
                                            <?php }
                                        } ?>
                                    </div>
                                    <div class="col-md-12 text-center">
                                        <a href="<?php echo $this->baseUrl('/purchase'); ?>" class="btn btn-default"
                                           style="width: auto;height: auto;margin: 10px 0px 10px 0px;background: #f75d00;color: #fff;">View
                                            All Details</a>
                                    </div>
                                </div>
                                <div class="fhistory" style="display:none">
                                    <?php
                                    if ($this->gethistorylist > 0) {
                                        foreach ($this->gethistorylist as $gethistorys) {
                                            //    print_r($gethistorys);
                                            $adnewid = $gethistorys['adver_id'];
                                            $Responds = $gethistorys['respond'];
                                            ?>
                                            <div class="hisno"> <?php echo $adnewid ?> </div>
                                            <?php
                                            $resultnewsat = $admin_model_obj->get_advertisenew($adnewid);
                                            foreach ($resultnewsat as $histrysety) {
                                                echo "<ul>";
                                                echo "<li>Respond : $Responds</li>";
                                                //echo"<li>buynow</li>";
                                                // echo "<li><p>'".$histrysety['campagine_name']."'</li>";
                                                echo "<li class='earn-a'>Earned Amples<p>" . $histrysety['length_video'] . "</p></li>";
                                                ?>
                                                <li>
                                                    <p>
                                                        <img src="<?php echo $admin_model_obj->cdnUrl('adver_images/image/' . $histrysety['adver_logo']); ?>"/>
                                                    </p>
                                                </li>
                                                <?php
                                                echo "</ul>";


                                            }

                                        }
                                    }

                                    ?>
                                    <div class="col-md-12 text-center">
                                        <a href="<?php echo $this->baseUrl('/adverhistory'); ?>" class="btn btn-default"
                                           style="width: auto;height: auto;margin: 10px 0px 10px 0px;background: #f75d00;color: #fff;">View
                                            All Details</a>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-12">
                                <div class="what-are-amples">
                                    <div class="col-lg-3">
                                        <div class="what-are">
                                            <h2><span>WHAT</span> ARE AMPLES</h2>
                                            <p>Amples are our biggest reward! We always say, time is money, so why not
                                                get paid for your time online! You can use Amples towards your purchases
                                                in the AMPLEPOINTS store and to enter Giveaways!</p>
                                            <a href="#">MORE AMPLES FAQ &nbsp;&#10095;</a></div>
                                    </div>
                                    <div class="col-lg-9">
                                        <div class="arrow-amples-a"><i class="fa fa-arrow-right"></i></div>
                                        <div class="arrow-amples-b">or</div>
                                        <div class="arrow-amples-c"><i class="fa fa-arrow-right"></i></div>
                                        <div class="star-a"><img
                                                    src="<?php echo $admin_model_obj->cdnUrl('img/social-icon/star.png'); ?>"/>
                                            <h2>EARN AMPLES</h2>
                                            <p>Get Amples every time you make a purchase, share link, and invite your
                                                friends.</p>
                                        </div>
                                        <div class="star-a"><img
                                                    src="<?php echo $admin_model_obj->cdnUrl('img/social-icon/shopping-icon.png'); ?>"/>
                                            <h2>GO SHOPPING</h2>
                                            <p>Use Your Amples to Get your purchase for free or at a discountsof your
                                                choice!</p>
                                        </div>
                                        <div class="star-a"><img
                                                    src="<?php echo $admin_model_obj->cdnUrl('img/social-icon/gift-icon.png'); ?>"/>
                                            <h2>ENTER GIVEAWAYS</h2>
                                            <p>use your Amples to enter for a chance to win giveaways!</p>
                                        </div>
                                        <div class="star-a"><img
                                                    src="<?php echo $admin_model_obj->cdnUrl('img/social-icon/happy.png'); ?>"/>
                                            <h2>LEAVE HAPPY</h2>
                                            <p>We have so many rewards to give out again really soon!</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="ample-icon">
                                    <p>*Amples can be used towards products with the Ample icon <img
                                                src="<?php echo $admin_model_obj->cdnUrl('img/amples-sall.png'); ?>"/>
                                    </p>
                                </div>
                            </div>
                            <div class="col-lg-12">
                                <div class="ready-to">
                                    <h2>READY TO SPEND YOURS AMPLES !</h2>
                                    <div class="col-lg-6">
                                        <div class="make">
                                            <h2>Make a Purchase</h2>
                                            <p>Redeem Your Amples at anyone of our amazing e-stores! Get the Products Of
                                                your Choice for free or at a discount!</p>
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="make">
                                            <h2>Enter a Giveaway</h2>
                                            <p>Use Your Amples for a chance to win some amazing goodies from our
                                                Giveaway store! </p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-12">
                                <div class="earn-amples">
                                    <h2>HOW TO EARN AMPLES !</h2>
                                    <p>You can earn Amples for doing the following activities!</p>
                                    <span style="color: #07253F;font-size: 13px;text-transform: uppercase;font-weight: bold;margin-left: 3px;">Invite your friends and receive 84 AmplePoints (valued $10) when they shop their first $100.</span>
                                    <div class="col-lg-12 no-space">
                                        <div class="row rowcls">
                                            <div class="cplo  cplo-a">
                                                <div class="share-images-amples"><img class="img-share-amples-a"
                                                                                      src="<?php echo $admin_model_obj->cdnUrl('img/social-icon/invite.png'); ?>"/>
                                                    <h2>Invite Friends to Join Amplepoints</h2>
                                                    <p><span>Earn</span> <samp>1 Ample</samp></p>
                                                    <img src="<?php echo $admin_model_obj->cdnUrl('img/dashboard/amples-sall.png'); ?>"/>
                                                </div>
                                            </div>
                                            <div class="cplo">
                                                <div class="share-images-amples"><img class="img-share-amples-a"
                                                                                      src="<?php echo $admin_model_obj->cdnUrl('img/social-icon/Tumb.png'); ?>"/>
                                                    <h2>Share something from our site to your Tumbler</h2>
                                                    <p><span>Earn</span> <samp>1 Ample</samp></p>
                                                    <img src="<?php echo $admin_model_obj->cdnUrl('img/dashboard/amples-sall.png'); ?>"/>
                                                </div>
                                            </div>
                                            <div class="cplo">
                                                <div class="share-images-amples"><img class="img-share-amples-a"
                                                                                      src="<?php echo $admin_model_obj->cdnUrl('img/social-icon/google-pluse-icon.png'); ?>"/>
                                                    <h2>Share something from our site to your Google+</h2>
                                                    <p><span>Earn</span> <samp>1 Ample</samp></p>
                                                    <img src="<?php echo $admin_model_obj->cdnUrl('img/dashboard/amples-sall.png'); ?>"/>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row rowcls">
                                            <div class="cplo cplo-b">
                                                <div class="share-images-amples"><img class="img-share-amples-a"
                                                                                      src="<?php echo $admin_model_obj->cdnUrl('img/social-icon/chack.png'); ?>"/>
                                                    <h3>Become a Member</h3>
                                                    <p><span>Earn</span> <samp>42 Amples</samp></p>
                                                    <img src="<?php echo $admin_model_obj->cdnUrl('img/dashboard/amples-sall.png'); ?>"/>
                                                </div>
                                            </div>
                                            <div class="cplo">
                                                <div class="share-images-amples"><img class="img-share-amples-a"
                                                                                      src="<?php echo $admin_model_obj->cdnUrl('img/social-icon/p.png'); ?>"/>
                                                    <h2>Pin something from our site to your pintrest Board</h2>
                                                    <p><span>Earn</span> <samp>1 Ample</samp></p>
                                                    <img src="<?php echo $admin_model_obj->cdnUrl('img/dashboard/amples-sall.png'); ?>"/>
                                                </div>
                                            </div>
                                            <div class="cplo">
                                                <div class="share-images-amples"><img class="img-share-amples-a"
                                                                                      src="<?php echo $admin_model_obj->cdnUrl('img/social-icon/Facebook-amples.png'); ?>"/>
                                                    <h2>Share something from our site to your Facebook</h2>
                                                    <p><span>Earn</span> <samp>1 Ample</samp></p>
                                                    <img src="<?php echo $admin_model_obj->cdnUrl('img/dashboard/amples-sall.png'); ?>"/>
                                                </div>
                                            </div>
                                            <div class="cplo">
                                                <div class="share-images-amples"><img class="img-share-amples-a"
                                                                                      src="<?php echo $admin_model_obj->cdnUrl('img/social-icon/linked-icon.png'); ?>"/>
                                                    <h2>Tweet something from our site to your Twitter</h2>
                                                    <p><span>Earn</span> <samp>1 Ample</samp></p>
                                                    <img src="<?php echo $admin_model_obj->cdnUrl('img/dashboard/amples-sall.png'); ?>"/>
                                                </div>
                                            </div>
                                            <div class="cplo cplo-c">
                                                <div class="share-images-amples"><img class="img-share-amples-a"
                                                                                      src="<?php echo $admin_model_obj->cdnUrl('img/social-icon/shopping-icon-amples.png'); ?>"/>
                                                    <h2>Purchase an Ample Eligible Product</h2>
                                                    <p><span>Earn</span> <samp>more Ample</samp></p>
                                                    <img src="<?php echo $admin_model_obj->cdnUrl('img/dashboard/amples-sall.png'); ?>"/>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- Ample point table -->

                                <style>


                                </style>
                                <?php

                                $igd = $this->record['data'][0]['user_id'];

                                $restablet = mysqli_query($dbcon, "SELECT  user_id,amply_point,month,year FROM `userearn_info` where user_id ='$igd'");

                                while ($rowyttt = mysqli_fetch_array($restablet)) {
                                    $datattt[] = $rowyttt;
                                }

                                ?>
                                <div class="panel panel-primary filterable">
                                    <div class="panel-heading">

                                        <!-- <div class="pull-right">
                                <button class="btn btn-default btn-xs btn-filter"><span class="glyphicon glyphicon-filter"></span> Filter</button>
                                </div> -->
                                    </div>
                                    <table class="table">
                                        <thead>
                                        <tr class="filters">
                                            <th><input type="text" class="form-control" placeholder="Month"></th>
                                            <th><input type="text" class="form-control" placeholder="Year"></th>
                                            <th><input type="text" class="form-control" placeholder="Ample Points"></th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        <?php foreach ($datattt as $rowtt) {

                                            $monthy = $rowtt['month'];


                                            ?>
                                            <tr>
                                                <td><?php echo date('M', strtotime(date('Y-' . $monthy . '-d'))); ?></td>
                                                <td><?php echo $rowtt['year']; ?></td>
                                                <td><?php echo $rowtt['amply_point']; ?></td>
                                            </tr>
                                        <?php } ?>
                                        </tbody>
                                    </table>
                                </div>
                                <!-- END of Ample points table -->
                            </div>
                        </div>
                        <div id="interests" class="tab-pane fade in">
                            <div class="col-md-12">
                                <div class="recent-complaint">
                                    <h3>Select Your Interests <span
                                                style="text-transform: uppercase;color: #f75d00; font-size: 14px;">(Select at least 5 interests and receive 10 more amplepoints)</span>
                                    </h3>
                                    <div class="bs-example">
                                        <div class="row">
                                            <div class="wmg-container my-grid">
                                                <?php
                                                if (!empty($this->maincatdata)) {
                                                    $myuserkey = $this->usrmakey;
                                                    //print_r($this->maincatdata);
                                                    foreach ($this->maincatdata as $maincatdata) {
                                                        $ctid = $maincatdata['id'];
                                                        $chbox = mysqli_query($dbcon, "SELECT  * FROM `tbl_user_interest` where customerId = '$myuserkey' and umaincatId = '$ctid' ");
                                                        $rowchbox = mysqli_fetch_row($chbox);
                                                        //print_r($rowchbox);

                                                        ?>
                                                        <div class="wmg-item">
                                                            <input type="hidden" name="user" id="cuuser"
                                                                   value="<?php echo $myuserkey; ?>">
                                                            <?php if ($rowchbox[5] == 1) { ?>
                                                                <input type="checkbox" class="checkboxin"
                                                                       id="checkboxin"
                                                                       name="<?php echo ucwords(strtolower(substr($maincatdata['category_name'], 0, 25))); ?>"
                                                                       value="<?php echo $maincatdata['id']; ?>"
                                                                       onclick="myFunction(<?php echo $myuserkey; ?>,<?php echo $ctid ?>,'unchecked')"
                                                                       checked>
                                                            <?php } else { ?>
                                                                <input type="checkbox" class="checkboxin"
                                                                       id="checkboxin"
                                                                       name="<?php echo ucwords(strtolower(substr($maincatdata['category_name'], 0, 25))); ?>"
                                                                       value="<?php echo $maincatdata['id']; ?>"
                                                                       onclick="myFunction(<?php echo $myuserkey; ?>,<?php echo $ctid ?>,'checked')">
                                                            <?php } ?>
                                                            <div class="wmg-thumbnail">
                                                                <div class="wmg-thumbnail-content">
                                                                    <div class="avatar"><img
                                                                                src="<?php echo $admin_model_obj->cdnUrl('category_images/' . $maincatdata['id'] . '/' . $maincatdata['cat_mainimage']); ?>"
                                                                                alt=""></div>
                                                                    <div class="text-chackbox">
                                                                        <div class="col-lg-11 col-pad">
                                                                            <p>
                                                                                <span><?php echo ucwords(strtolower(substr($maincatdata['category_name'], 0, 25))); ?></span>
                                                                            </p>
                                                                        </div>
                                                                        <div class="col-lg-1 col-padding-right">

                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    <?php }
                                                } ?>

                                                <script>

                                                    function myFunction(x, y, chk) {
                                                        var userId = x;
                                                        var catid = y;
                                                        $.ajax({
                                                            type: "POST",
                                                            url: "<?php echo $baseUrl; ?>/category_filter/dashboardinterest.php",
                                                            data: {userid: userId, catid: catid, ischk: chk},
                                                            cache: true,
                                                            success: function (html) {

                                                                html = $.trim(html);

                                                                if (html == 'notok') {

                                                                    alert('Please Select at Least 5 Interests');
                                                                    location.reload(true);

                                                                } else if (html == 'done') {

                                                                    alert('Thank For Selecting Interest We Have Added 10 Amples On your Account');
                                                                    location.reload(true);

                                                                } else if (html == 'reaload') {

                                                                    alert('Thank For Selecting Interest');
                                                                    location.reload(true);

                                                                }

                                                            }
                                                        });
                                                        //alert(xx);
                                                        //alert(yy);
                                                    }

                                                </script>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div id="craving" class="tab-pane fade in">
                            <div class="col-md-7">
                                <div class="user-personal-info">
                                    <h4>Craving</h4>
                                    <textarea id="cravinput" class="creving-text"></textarea>
                                    <p id="craverror" style="display:none; color:red;"></p>
                                    <a href="javascript:void(0);" onclick="postcraving();" class="btn-text btn-default">Submit </a>
                                </div>
                            </div>
                            <div class="col-md-5">
                                <div class="user-personal-info">
                                    <div class="user-notification Latest-Craving">
                                        <h4>Latest Craving</h4>
                                        <div class="notification-body">
                                            <?php if ($this->cravingdatalist > 0) {
                                                foreach ($this->cravingdatalist as $cravkey) { ?>
                                                    <div class="notification-entry">
                                                        <p>
                                                            <i class="fa fa-support"></i> <?php echo $cravkey['craving_msg']; ?>
                                                        </p>
                                                    </div>
                                                <?php }
                                            } ?>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>


                        <div id="invite" class="tab-pane fade in">

                            <style>
                                .st-btn {
                                    display: inline-block !important;
                                }
                            </style>

                            <div class="col-md-12">

                                <div class="user-personal-info">
                                    <h4>Invite Friends</h4>
                                    <?php if ($this->record['data'][0]['is_driver'] == 1) { ?>
                                        <span style="color: #07253F;font-size: 13px;text-transform: uppercase;font-weight: bold;margin-left: 3px;">Invite your friends and receive $10 when they shop their first $100.</span>
                                    <?php } else { ?>
                                        <div class="col-md-12 newinvitetxt">
                                            <span style="color: #07253F;font-size: 13px;text-transform: uppercase;font-weight: bold;margin-left: 3px;">INVITE YOUR FRIENDS AND RECEIVE 2% OF ALL THEIR CASH SHOPPING FOR ONE YEAR, IN AMPLE REWARD POINTS. <a
                                                        href="https://amplepoints.com/images/invite_and_earn.jpg"
                                                        target="_blank" class="chekinvitebtn"
                                                        type="button">Check Now</a></span>
                                        </div>
                                    <?php } ?>
                                    <div class="clearfix"></div>
                                    <div class="col-md-12" style="padding-left: 0px;margin: 5px 0px 0px 3px;">
                                        <span style="font-weight: 700;">Invite Your Friends Via Link:  <span
                                                    style="color: #f75d00;"><?php echo 'https://www.amplepoints.com/signupbyfriend/' . preg_replace('/\s+/', '', $this->record['data'][0]['first_name'] . $this->record['data'][0]['last_name']) . '/' . $this->record['data'][0]['user_id']; ?></span></span>
                                    </div>
                                    <div class="clearfix"></div>
                                    <div class="share-link">
                                        <span class="social-invite">Invite Your Friends Via Sharing Link On Social Media:</span>
                                        <div class="social-share">

                                            <div class="sharethis-inline-share-buttons"
                                                 data-url="<?php echo 'https://www.amplepoints.com/signupbyfriend/' . trim($this->record['data'][0]['first_name'] . $this->record['data'][0]['last_name']) . '/' . $this->record['data'][0]['user_id']; ?>"
                                                 data-title="Registration - amplepoints.com"
                                                 data-image="<?php echo $this->ogImage; ?>"
                                                 data-description="Today with online shopping, everything you need is right at your fingertips. On Ample Points you can shop the hottest brands, book hotels, find local deals, restaurants, properties and so much more. We reward our members for shopping, sharing and watching your favorite ads. Use your points at checkout towards free products and every time you shop you earn extra benefits. With Ample Points you can always rest assured about the quality of the products you are buying online at our website. Together with our trusted partners we promise to deliver only original and brand-new products.">
                                            </div>
                                        </div>
                                    </div>

                                    <div class="clearfix"></div>
                                    <span class="refno">Your Referral Code: <?php echo $this->record['data'][0]['referral_no']; ?></span>

                                    <div class="replace_my_invite_friend"></div>


                                </div>
                            </div>

                        </div>

                        <?php /*

                    <div id="invite" class="tab-pane fade in">
                    <div class="col-md-12">
                    <div class="user-personal-info">
                    <style type="text/css">

                    </style>
                    <h4>Invite Uber / Lyft Friend</h4>
                    <?php if($this->record['data'][0]['is_driver'] == 1){ ?>
                    <span style="color: #07253F;font-size: 13px;text-transform: uppercase;font-weight: bold;margin-left: 3px;">Invite your friends and receive $10 when they shop their first $100.</span>
                    <?php }else{ ?>
                    <span style="color: #07253F;font-size: 13px;text-transform: uppercase;font-weight: bold;margin-left: 3px;">Invite your friends and receive 84 AmplePoints (valued $10) when they shop their first $100.</span>
                    <?php } ?>
                    <span class="refno">Your Referral Code: <?php echo $this->record['data'][0]['referral_no']; ?></span>
                    <div class='row'>
                    <div class="col-lg-5">
                    <div class='form-group'>
                    <form name="invitefriend" action="" method="post" enctype="multipart/form-data">
                    <div class="col-lg-12">
                    <h4 for='example_emailBS'>Email/Phone</h4>
                    <input type="text" name="invitemail" id="my_input" placeholder="Email OR Phone" class="form-control" required>
                    <span id="sendsuccess"></span> </div>
                    <div class="email-button"> <a href="javascript:void(0);" onclick="sendinvitation();">Send Invitation</a> </div>
                    </form>
                    </div>
                    </div>
                    <div class="col-lg-7 invitefrd">
                    <table class="table table-hover">
                    <thead>
                    <tr class="headings">
                    <th>Sn. </th>
                    <th>Friend Email</th>
                    <th>Status</th>
                    <th>Sent Date </th>
                    <th>Is Registered </th>
                    </tr>
                    </thead>
                    <tbody id="invitefrdlist">
                    <?php if(!empty($this->invite) && $this->invite > 0) {
                    foreach($this->invite as $key) { ?>
                    <tr class="even pointer">
                    <td class=" "><?php echo $this->escape($key['id']); ?></td>
                    <td class=" "><?php echo $this->escape($key['friend_email']); ?></td>
                    <td class=" last"><a class=" btn-success btn-xs" type="button">
                    <?php if($key['isinvited'] == 1) { echo 'Sent'; } else if($key['isinvited'] == 0) { echo 'Not Sent'; }  ?>
                    </a></td>
                    <td class=" "><?php $sentdate = $this->escape($key['invitedate']); $expdate= explode(' ', $sentdate); echo $expdate[0]; ?></td>
                    <td class=" "><?php $isregister = $key['isregistered']; if($isregister == 1) { echo "Yes"; } else { echo "No"; } ?></td>
                    </tr>
                    <?php }

                    } ?>
                    </tbody>
                    </table>
                    <div class="recp">
                    <p>
                    <?php if(empty($this->invite)) { echo "There is no recipient/friend invited by you."; } ?>
                    </p>
                    </div>
                    </div>
                    </div>
                    <div class="col-md-12 invitefrd1" style="margin-top: 10px;">
                    <h4>My Chain</h4>
                    <br/>
                    <style>

                    .invitefrd1{
                    width: 100%;
                    background: #eeeeee none repeat scroll 0 0;
                    clear: both;
                    overflow-y: scroll;
                    overflow: auto;
                    padding: 8px 0;
                    }
                    table.increrewad {
                    font-family: arial;
                    font-size: 12px;
                    width: 100%;
                    }
                    table.increrewad td, table.increrewad th {
                    border: 1px solid #e5e5e5;
                    padding: 6px 7px 0;
                    position: relative;
                    text-align: left;
                    vertical-align: middle;
                    text-align: center;
                    }
                    table.increrewad th {
                    background: none;
                    border: 1px solid #e5e5e5;
                    padding: 6px 5px;
                    }
                    </style>
                    <table class="increrewad">
                    <tr>
                    <th>ID</th>
                    <th style="width: 20%;">PROFILE IMAGE</th>
                    <th>NAME</th>
                    <th>CITY</th>
                    <th>ZIP CODE</th>
                    <th>AMOUNT SPENT</th>
                    <th>PENDING</th>
                    <th>PAID</th>
                    <?php if($this->record['data'][0]['is_driver'] != 1){?>
                    <th>EARN AMPLES</th>
                    <?php } ?>
                    <?php if($this->record['data'][0]['is_driver'] == 1){?>
                    <th>EARN AMOUNT</th>
                    <?php } ?>
                    <th>DATE</th>
                    </tr>
                    <?php

                    $invitedata = $admin_model_obj->getuserchaindataforcustomers($this->record['data'][0]['email']);
                    if(!empty($invitedata)){
                    foreach($invitedata as $useinvite){

                    $amountspenddata = $admin_model_obj->custgetcustomertotalpurchase($useinvite['user_id']);
                    $Existpaid = $admin_model_obj->getpaidchaindata($useinvite['user_id']);
                    //echo "<pre>";print_R($Existpaid);
                    $amountspend = $amountspenddata[0]['totalpurchase'];
                    $pendingstatus = 'Pending';
                    $paidstatus = 'Un Paid';
                    $displaypaybutton = 0;
                    $paidamount = 0.00;
                    $paidearnamount = 0.00;
                    $paiddate = '-';

                    if($amountspend > 100){

                    $pendingstatus = "Qualified";

                    $amountspend = 100.00;

                    $displaypaybutton = 1;

                    if(!empty($Existpaid)){

                    $paidstatus = "Paid";
                    $displaypaybutton = 0;
                    $paidamount = $Existpaid[0]['added_ample'];
                    $paidearnamount = $Existpaid[0]['added_amount'];
                    $paiddate = date('d/m/Y',strtotime($Existpaid[0]['date_added']));

                    }

                    }

                    ?>
                    <tr>
                    <td><?php echo $useinvite['user_id']; ?></td>
                    <td><img width="30%" src="<?php if(!empty($useinvite['user_image'])) { echo $admin_model_obj->cdnUrl('user_images/'.$useinvite['user_id'].'/profile_image/'.$useinvite['user_image']); } else { echo $admin_model_obj->cdnUrl('img/profile-img/avtar.jpg'); } ?>"></td>
                    <td><?php echo $useinvite['first_name']." ".$useinvite['last_name'];  ?></td>
                    <td><?php echo $useinvite['user_city']; ?></td>
                    <td><?php echo $useinvite['zip_code']; ?></td>
                    <td><?php echo $amountspend; ?></td>
                    <td><?php echo $pendingstatus; ?></td>
                    <td><?php echo $paidstatus; ?></td>
                    <?php if($this->record['data'][0]['is_driver'] != 1){?>
                    <td><?php echo $paidamount; ?></td>
                    <?php } ?>
                    <?php if($this->record['data'][0]['is_driver'] == 1){?>
                    <td>$<?php echo $paidearnamount; ?></td>
                    <?php } ?>
                    <td><?php echo $paiddate; ?></td>
                    </tr>
                    <?php } } ?>
                    </table>
                    </div>
                    </div>
                    </div>
                    </div>

                */ ?>

                        <?php if ($this->record['data'][0]['is_driver'] == 1) { ?>

                            <style type="text/css">
                                .refno {
                                    border: 5px solid #f75d00;
                                    border-radius: 5px;
                                    font-size: 20px;
                                    float: right;
                                }

                                table.increrewad {
                                    font-family: arial;
                                    font-size: 12px;
                                    width: 100%;
                                }

                                table.increrewad td, table.increrewad th {
                                    border: 1px solid #e5e5e5;
                                    padding: 6px 7px 0;
                                    position: relative;
                                    text-align: left;
                                    vertical-align: middle;
                                    text-align: center;
                                }

                                table.increrewad th {
                                    background: none;
                                    border: 1px solid #e5e5e5;
                                    padding: 6px 5px;
                                }

                            </style>

                            <div id="inviteUber" class="tab-pane fade in">
                                <div class="col-md-12 replace_my_invite_uber_lyft">
                                </div>
                            </div>
                        <?php } ?>

                        <style type="text/css">

                            .newinvitetxtbiss {
                                border: 2px solid #f75d00;
                                margin: 15px 0px 15px 15px;
                                width: 96%;
                                padding: 10px 10px 10px 10px;
                            }

                            .newinvitetxtbiss_span {
                                color: #07253F;
                                font-size: 28px;
                                text-transform: uppercase;
                                font-weight: bold;
                            }

                        </style>

                        <div id="invite_business" class="tab-pane fade in">
                            <style>
                                .st-btn {
                                    display: inline-block !important;
                                }
                            </style>
                            <div class="col-md-12">
                                <div class="user-personal-info">
                                    <h4>Invite Business</h4>
                                    <div class="col-md-12 newinvitetxtbiss">
                                        <span class="newinvitetxtbiss_span">REFER YOUR FAVORITE BUSINESS AND RECEIVE 4166 AMPLE REWARD POINTS (VALUED AT $500), WITH PAID SIGN-UP.</span>
                                    </div>
                                    <div class="clearfix"></div>
                                    <div class="col-md-12" style="padding-left: 0px;margin: 5px 0px 0px 15px;">
                                        <span style="font-weight: 700;">Invite Your Friends Via Link:  <span
                                                    style="color: #f75d00;"><?php echo 'https://www.amplepoints.com/businesssignupbyuser/' . preg_replace('/\s+/', '', $this->record['data'][0]['first_name'] . $this->record['data'][0]['last_name']) . '/' . $this->record['data'][0]['user_id']; ?></span></span>
                                    </div>
                                    <div class="clearfix"></div>
                                    <div class="share-link" style="margin: 10px 0px 0px 15px;">
                                        <span class="social-invite">Invite Your Friends Via Sharing Link On Social Media:</span>
                                        <div class="social-share">
                                            <div class="sharethis-inline-share-buttons"
                                                 data-url="<?php echo 'https://www.amplepoints.com/businesssignupbyuser/' . preg_replace('/\s+/', '', $this->record['data'][0]['first_name'] . $this->record['data'][0]['last_name']) . '/' . $this->record['data'][0]['user_id']; ?>"
                                                 data-title="Registration - amplepoints.com"
                                                 data-image="<?php echo $this->ogImage; ?>"
                                                 data-description="Today with online shopping, everything you need is right at your fingertips. On Ample Points you can shop the hottest brands, book hotels, find local deals, restaurants, properties and so much more. We reward our members for shopping, sharing and watching your favorite ads. Use your points at checkout towards free products and every time you shop you earn extra benefits. With Ample Points you can always rest assured about the quality of the products you are buying online at our website. Together with our trusted partners we promise to deliver only original and brand-new products.">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="clearfix"></div>
                                    <span class="refno">Your Referral Code: <?php echo $this->record['data'][0]['referral_no']; ?></span>

                                    <div class="replace_my_invite_business">


                                    </div>
                                </div>
                            </div>
                        </div>

                        <div id="blog-l" class="tab-pane fade in">
                            <div class="col-lg-7">
                                <div class="user-personal-info">
                                    <h4>Upload Blog</h4>
                                    <div class="">
                                        <div class="user-info-body">
                                            <form action="<?php echo $this->baseUrl('default/index/socialblogbyuser'); ?>"
                                                  method="post" enctype="multipart/form-data">
                                                <div class="col-sm-12">
                                                    <label>Category</label>
                                                    <select class="form-control" name="blog_category" required
                                                            style="height: 40px !important;max-width: 175px !important;">
                                                        <option value="">Select Blog Category</option>
                                                        <option value="Popular">Popular</option>
                                                        <option value="Editors Pick">Editor's Pick</option>
                                                        <option value="Everything">Everything</option>
                                                        <option value="Entertainment">Entertainment</option>
                                                        <option value="Art and Design">Art & Design</option>
                                                        <option value="Womens Fashion">Women's Fashion</option>
                                                        <option value="Health and Fitness">Health & Fitness</option>
                                                        <option value="Food and Drink">Food & Drink</option>
                                                        <option value="Hair and Beauty">Hair & Beauty</option>
                                                        <option value="Mens Fashion">Men's Fashion</option>
                                                        <option value="Trends and Lifestyle">Trends & Lifestyle</option>
                                                        <option value="Hobbies">Hobbies</option>
                                                        <option value="Home">Home</option>
                                                        <option value="Gardening">Gardening</option>
                                                        <option value="Music">Music</option>
                                                        <option value="Celebrities">Celebrities</option>
                                                        <option value="Movies">Movies</option>
                                                        <option value="Cars and Motorcycles">Cars & Motorcycles</option>
                                                        <option value="News and Politics">News & Politics</option>
                                                        <option value="Kids and Parenting">Kids & Parenting</option>
                                                        <option value="Finance">Finance</option>
                                                        <option value="Pets and Animals">Pets & Animals</option>
                                                        <option value="Comedy">Comedy</option>
                                                        <option value="Shopping">Shopping</option>
                                                        <option value="Local Offers and Services">Local Offers &
                                                            Services
                                                        </option>
                                                        <option value="Gifts">Gifts</option>
                                                        <option value="Sports and Outdoors">Sports & Outdoors</option>
                                                        <option value="Tech and Gadgets">Tech & Gadgets</option>
                                                        <option value="Games">Games</option>
                                                        <option value="Education">Education</option>
                                                        <option value="Travel">Travel</option>
                                                        <option value="Luxury">Luxury</option>
                                                        <option value="Wedding">Wedding</option>
                                                        <option value="Holidays and Events">Holidays & Events</option>
                                                        <option value="Career">Career</option>
                                                    </select>
                                                </div>
                                                <div class="clearfix"></div>
                                                <div class="col-sm-12">
                                                    <label>Blog Title</label>
                                                    <input type="text" class="form-control" id="inputPassword3"
                                                           placeholder="Title" name="blog_title" required="required">
                                                </div>
                                                <div class="col-sm-12">
                                                    <label>Blog Description</label>
                                                    <textarea placeholder="Description" id="current-address"
                                                              class="form-control" name="blog_descreption" rows="5"
                                                              required></textarea>
                                                </div>
                                                <div class="col-sm-12">
                                                    <label>Add Blog Photo
                                                        (Width:750px,Height:450px)<span></span></label>
                                                </div>
                                                <div class="multi-field-wrapper-filesnew">
                                                    <div class="multi-fields">
                                                        <div class="multi-field">
                                                            <div class="col-sm-12">
                                                                <div class="form-group broese">
                                                                    <input name="blogsimages[]" multiple type="file"
                                                                           onchange="ValidateSizeNew(this)"
                                                                           class="form-control" accept="image/*"
                                                                           required="required">
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-sm-12">
                                                        <input type="button" class="add-field" value="Add More Files"/>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <div class="col-sm-3 col-xs-offset-9">
                                                        <button type="submit">SAVE</button>
                                                    </div>
                                                </div>
                                            </form>
                                        </div>
                                        <script>

                                            function ValidateSizeNew(file) {

                                                var FileSize = file.files[0].size / 1024 / 1024; // in MB
                                                var FileType = file.files[0].type;
                                                if (FileSize > 2) {
                                                    alert('File size exceeds 2 MB Please Upload File Size < 2MB');
                                                    $(file).val('');
                                                }

                                                if (FileType != 'image/jpeg' && FileType != 'image/png' && FileType != 'image/gif' && FileType != 'image/jpg') {

                                                    alert('invalid File extension Allowed Only jpeg,png,gif,jpg Extension');
                                                    $(file).val('');
                                                }
                                            }

                                            var CustCountnew = 2;

                                            $('.multi-field-wrapper-filesnew').each(function () {
                                                var $wrapper = $('.multi-fields', this);
                                                $(".add-field", $(this)).click(function (e) {

                                                    var htmltoadd = '<div class="multi-field">';
                                                    htmltoadd += '<div class="col-sm-8">';
                                                    htmltoadd += '<div class="form-group">';
                                                    htmltoadd += '<input name="blogsimages[]" multiple type="file" onchange="ValidateSizeNew(this)" class="form-control" accept="image/*" required="required">';
                                                    htmltoadd += '</div>';
                                                    htmltoadd += '</div>';
                                                    htmltoadd += '<div class="col-sm-4">';
                                                    htmltoadd += '<button type="button" class="remove-field" style="margin-top: 0px;">Remove</button>';
                                                    htmltoadd += '</div>';
                                                    htmltoadd += '</div>';

                                                    $wrapper.append(htmltoadd);

                                                    CustCountnew++;

                                                    $('.multi-field .remove-field', $wrapper).click(function () {

                                                        CustCountnew++;
                                                        $(this).closest('.multi-field').remove();
                                                    });

                                                });

                                                $('.multi-field .remove-field', $wrapper).click(function () {
                                                    CustCountnew++;
                                                    $(this).parent('.multi-field').remove();


                                                });

                                            });

                                        </script>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-5 replace_my_blog">

                            </div>
                        </div>
                        <div id="photo" class="tab-pane fade in">
                            <div class="col-lg-7">
                                <div class="user-personal-info">
                                    <h4>Upload Photo</h4>
                                    <div class="">
                                        <div class="user-info-body">
                                            <form action="<?php echo $this->baseUrl('default/index/socialphotosbyuser'); ?>"
                                                  method="post" enctype="multipart/form-data">
                                                <div class="col-sm-12">
                                                    <label>Category</label>
                                                    <select class="form-control" name="photo_category" required
                                                            style="height: 40px !important;max-width: 175px !important;">
                                                        <option value="">Select Category</option>
                                                        <option value="Popular">Popular</option>
                                                        <option value="Editors Pick">Editor's Pick</option>
                                                        <option value="Everything">Everything</option>
                                                        <option value="Entertainment">Entertainment</option>
                                                        <option value="Art and Design">Art & Design</option>
                                                        <option value="Womens Fashion">Women's Fashion</option>
                                                        <option value="Health and Fitness">Health & Fitness</option>
                                                        <option value="Food and Drink">Food & Drink</option>
                                                        <option value="Hair and Beauty">Hair & Beauty</option>
                                                        <option value="Mens Fashion">Men's Fashion</option>
                                                        <option value="Trends and Lifestyle">Trends & Lifestyle</option>
                                                        <option value="Hobbies">Hobbies</option>
                                                        <option value="Home">Home</option>
                                                        <option value="Gardening">Gardening</option>
                                                        <option value="Music">Music</option>
                                                        <option value="Celebrities">Celebrities</option>
                                                        <option value="Movies">Movies</option>
                                                        <option value="Cars and Motorcycles">Cars & Motorcycles</option>
                                                        <option value="News and Politics">News & Politics</option>
                                                        <option value="Kids and Parenting">Kids & Parenting</option>
                                                        <option value="Finance">Finance</option>
                                                        <option value="Pets and Animals">Pets & Animals</option>
                                                        <option value="Comedy">Comedy</option>
                                                        <option value="Shopping">Shopping</option>
                                                        <option value="Local Offers and Services">Local Offers &
                                                            Services
                                                        </option>
                                                        <option value="Gifts">Gifts</option>
                                                        <option value="Sports and Outdoors">Sports & Outdoors</option>
                                                        <option value="Tech and Gadgets">Tech & Gadgets</option>
                                                        <option value="Games">Games</option>
                                                        <option value="Education">Education</option>
                                                        <option value="Travel">Travel</option>
                                                        <option value="Luxury">Luxury</option>
                                                        <option value="Wedding">Wedding</option>
                                                        <option value="Holidays and Events">Holidays & Events</option>
                                                        <option value="Career">Career</option>
                                                    </select>
                                                </div>
                                                <div class="clearfix"></div>
                                                <div class="col-sm-12">
                                                    <label>Title</label>
                                                    <input type="text" class="form-control" id="inputPassword3"
                                                           placeholder="Title" name="photo_title" required="required">
                                                </div>
                                                <div class="col-sm-12">
                                                    <label>Description</label>
                                                    <textarea placeholder="Description" id="current-address"
                                                              class="form-control" name="photo_descreption" rows="5"
                                                              required></textarea>
                                                </div>
                                                <div class="col-sm-12">
                                                    <label>Add Photo (Width:750px,Height:450px)<span></span></label>
                                                </div>
                                                <div class="multi-field-wrapper-files">
                                                    <div class="multi-fields">
                                                        <div class="multi-field">
                                                            <div class="col-sm-12">
                                                                <div class="form-group">
                                                                    <input name="photosimages[]" multiple type="file"
                                                                           onchange="ValidateSize(this)"
                                                                           class="form-control" accept="image/*"
                                                                           required="required">
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-sm-12">
                                                        <input type="button" class="add-field" value="Add More Files"/>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <div class="col-sm-3 col-xs-offset-9">
                                                        <button type="submit">SAVE</button>
                                                    </div>
                                                </div>
                                            </form>
                                         
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-5 replace_my_photos">
                            </div>
                        </div>
                        <div id="video" class="tab-pane fade in">
                            <div class="col-lg-7">
                                <div class="user-personal-info">
                                    <h4>Upload Video</h4>
                                    <style>
                                    </style>
                                    <div class="">
                                        <div class="user-info-body">
                                            <form action="<?php echo $this->baseUrl('default/index/socialvideobyuser'); ?>"
                                                  method="post" enctype="multipart/form-data">
                                                <div class="col-sm-12">
                                                    <label>Category</label>
                                                    <select class="form-control" name="video_category" required
                                                            style="height: 40px !important;max-width: 100% !important;width: 100% !important;left: 0px !important;top: 0px;margin: 4px 0 5px 0 !important;">
                                                        <option value="">Select Category</option>
                                                        <option value="Popular">Popular</option>
                                                        <option value="Editors Pick">Editor's Pick</option>
                                                        <option value="Everything">Everything</option>
                                                        <option value="Entertainment">Entertainment</option>
                                                        <option value="Art and Design">Art & Design</option>
                                                        <option value="Womens Fashion">Women's Fashion</option>
                                                        <option value="Health and Fitness">Health & Fitness</option>
                                                        <option value="Food and Drink">Food & Drink</option>
                                                        <option value="Hair and Beauty">Hair & Beauty</option>
                                                        <option value="Mens Fashion">Men's Fashion</option>
                                                        <option value="Trends and Lifestyle">Trends & Lifestyle</option>
                                                        <option value="Hobbies">Hobbies</option>
                                                        <option value="Home">Home</option>
                                                        <option value="Gardening">Gardening</option>
                                                        <option value="Music">Music</option>
                                                        <option value="Celebrities">Celebrities</option>
                                                        <option value="Movies">Movies</option>
                                                        <option value="Cars and Motorcycles">Cars & Motorcycles</option>
                                                        <option value="News and Politics">News & Politics</option>
                                                        <option value="Kids and Parenting">Kids & Parenting</option>
                                                        <option value="Finance">Finance</option>
                                                        <option value="Pets and Animals">Pets & Animals</option>
                                                        <option value="Comedy">Comedy</option>
                                                        <option value="Shopping">Shopping</option>
                                                        <option value="Local Offers and Services">Local Offers &
                                                            Services
                                                        </option>
                                                        <option value="Gifts">Gifts</option>
                                                        <option value="Sports and Outdoors">Sports & Outdoors</option>
                                                        <option value="Tech and Gadgets">Tech & Gadgets</option>
                                                        <option value="Games">Games</option>
                                                        <option value="Education">Education</option>
                                                        <option value="Travel">Travel</option>
                                                        <option value="Luxury">Luxury</option>
                                                        <option value="Wedding">Wedding</option>
                                                        <option value="Holidays and Events">Holidays & Events</option>
                                                        <option value="Career">Career</option>
                                                    </select>
                                                </div>
                                                <div class="clearfix"></div>
                                                <div class="col-sm-12">
                                                    <label>Choose Video Type</label>
                                                    <select class="form-control" name="video_type" id="video_type"
                                                            required
                                                            style="height: 40px !important;max-width: 100% !important;width: 100% !important;left: 0px !important;top: 0px;">
                                                        <option value="">Select</option>
                                                        <option value="youtube">YouTube</option>
                                                        <option value="vimeo">Vimeo</option>
                                                        <option value="dailymotion">Dailymotion</option>
                                                    </select>
                                                </div>
                                                <div class="clearfix"></div>
                                                <div class="col-sm-12">
                                                    <label>Enter Video Code*</label>
                                                    <label>EX: "https://www.youtube.com/watch?v=<u>vCaZcanop6E</u>" Code
                                                        = <b>vCaZcanop6E</b></label>
                                                    <label>EX: "https://vimeo.com/<u>247094810</u>" Code =
                                                        <b>247094810</b></label>
                                                    <label>EX: "https://www.dailymotion.com/video/<u>x6bkz3p</u>" Code =
                                                        <b>x6bkz3p</b></label>
                                                    <input type="text" class="form-control"
                                                           placeholder="Please Enter Code" id="vediourl" name="vediourl"
                                                           required="required">
                                                </div>
                                                <div class="col-sm-12">
                                                    <div class="col-sm-12" id="loadiframe"></div>
                                                </div>
                                                <div class="col-sm-12">
                                                    <label>Enter Time Duration*</label>
                                                    <input type="text" class="form-control"
                                                           placeholder="Enter Video Time Duration" id="video_duration"
                                                           name="video_duration" required="required">
                                                </div>
                                                <div class="col-sm-12">
                                                    <label>Enter Video Title*</label>
                                                    <input type="text" class="form-control"
                                                           placeholder="Enter Video Title" id="vediotitle"
                                                           name="vediotitle" required="required">
                                                </div>
                                                <div class="col-sm-12">
                                                    <label>Video Description*</label>
                                                    <textarea placeholder="Description" name="discription"
                                                              id="discription" class="form-control" rows="5"
                                                              required></textarea>
                                                </div>
                                                <div class="col-sm-12">
                                                    <label>Tags*</label>
                                                    <input type="text" class="form-control"
                                                           placeholder="Eg(amplepoints,ten,twenty,....)" id="tags"
                                                           name="tags" required="required">
                                                    <label>Separate All Tags With A Comma.</label>
                                                </div>
                                                <div class="form-group">
                                                    <div class="col-sm-3 col-xs-offset-9">
                                                        <button type="submit">SAVE</button>
                                                    </div>
                                                </div>
                                            </form>
                                            <script>

                                                $("#vediourl").change(function () {

                                                    var loadedifram = $(this).val();

                                                    var videotype = $('#video_type').val();

                                                    if (videotype != "") {

                                                        var iframcode = '';

                                                        if (videotype == 'youtube') {

                                                            iframcode = '<iframe width="854" height="480" src="https://www.youtube.com/embed/' + loadedifram + '?showinfo=0" frameborder="0" gesture="media" allow="encrypted-media" allowfullscreen></iframe>';

                                                        } else if (videotype == 'vimeo') {

                                                            iframcode = '<iframe src="https://player.vimeo.com/video/' + loadedifram + '?byline=0&portrait=0" width="640" height="360" frameborder="0" webkitallowfullscreen mozallowfullscreen allowfullscreen></iframe>';

                                                        } else if (videotype == 'dailymotion') {

                                                            iframcode = '<iframe frameborder="0" width="480" height="270" src="https://www.dailymotion.com/embed/video/' + loadedifram + '" allowfullscreen></iframe>';

                                                        } else {

                                                            iframcode = '';
                                                        }


                                                        if (iframcode.indexOf('iframe') >= 0) {

                                                            $('#loadiframe').html(iframcode);

                                                        } else {

                                                            alert('Please insert Ifram Embeded code only');
                                                        }

                                                    } else {

                                                        alert("Please First Select Video Type");
                                                    }


                                                });

                                                $("#video_type").change(function () {
                                                    $('#vediourl').val('');
                                                    $('#loadiframe').html('');
                                                })

                                            </script>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-5 replace_my_video">

                            </div>
                        </div>
                        <div id="Movies-TV" class="tab-pane fade in">
                            <style>
                                #mtv_loadiframe iframe {
                                    width: 100%;
                                    height: 300px;
                                }
                            </style>
                            <div class="col-lg-7">
                                <div class="user-personal-info">
                                    <h4>Upload Movies & TV</h4>
                                    <div class="">
                                        <div class="user-info-body">
                                            <form action="<?php echo $this->baseUrl('default/index/socialmovietvbyuser'); ?>"
                                                  method="post" enctype="multipart/form-data">
                                                <div class="col-sm-12">
                                                    <label>Category</label>
                                                    <select class="form-control" name="movitv_category" required
                                                            style="height: 40px !important;max-width: 100% !important;width: 100% !important;left: 0px !important;top: 0px;">
                                                        <option value="">Select Category</option>
                                                        <option value="Popular">Popular</option>
                                                        <option value="Editors Pick">Editor's Pick</option>
                                                        <option value="Everything">Everything</option>
                                                        <option value="Entertainment">Entertainment</option>
                                                        <option value="Art and Design">Art & Design</option>
                                                        <option value="Womens Fashion">Women's Fashion</option>
                                                        <option value="Health and Fitness">Health & Fitness</option>
                                                        <option value="Food and Drink">Food & Drink</option>
                                                        <option value="Hair and Beauty">Hair & Beauty</option>
                                                        <option value="Mens Fashion">Men's Fashion</option>
                                                        <option value="Trends and Lifestyle">Trends & Lifestyle</option>
                                                        <option value="Hobbies">Hobbies</option>
                                                        <option value="Home">Home</option>
                                                        <option value="Gardening">Gardening</option>
                                                        <option value="Music">Music</option>
                                                        <option value="Celebrities">Celebrities</option>
                                                        <option value="Movies">Movies</option>
                                                        <option value="Cars and Motorcycles">Cars & Motorcycles</option>
                                                        <option value="News and Politics">News & Politics</option>
                                                        <option value="Kids and Parenting">Kids & Parenting</option>
                                                        <option value="Finance">Finance</option>
                                                        <option value="Pets and Animals">Pets & Animals</option>
                                                        <option value="Comedy">Comedy</option>
                                                        <option value="Shopping">Shopping</option>
                                                        <option value="Local Offers and Services">Local Offers &
                                                            Services
                                                        </option>
                                                        <option value="Gifts">Gifts</option>
                                                        <option value="Sports and Outdoors">Sports & Outdoors</option>
                                                        <option value="Tech and Gadgets">Tech & Gadgets</option>
                                                        <option value="Games">Games</option>
                                                        <option value="Education">Education</option>
                                                        <option value="Travel">Travel</option>
                                                        <option value="Luxury">Luxury</option>
                                                        <option value="Wedding">Wedding</option>
                                                        <option value="Holidays and Events">Holidays & Events</option>
                                                        <option value="Career">Career</option>
                                                    </select>
                                                </div>
                                                <div class="clearfix"></div>
                                                <div class="col-sm-12">
                                                    <label>Choose Video Type</label>
                                                    <select class="form-control" name="mtv_video_type"
                                                            id="mtv_video_type" required
                                                            style="height: 40px !important;max-width: 100% !important;width: 100% !important;left: 0px !important;top: 0px;">
                                                        <option value="">Select</option>
                                                        <option value="youtube">YouTube</option>
                                                        <option value="vimeo">Vimeo</option>
                                                        <option value="dailymotion">Dailymotion</option>
                                                    </select>
                                                </div>
                                                <div class="clearfix"></div>
                                                <div class="col-sm-12">
                                                    <label>Enter Video Code*</label>
                                                    <label>EX: "https://www.youtube.com/watch?v=<u>vCaZcanop6E</u>" Code
                                                        = <b>vCaZcanop6E</b></label>
                                                    <label>EX: "https://vimeo.com/<u>247094810</u>" Code =
                                                        <b>247094810</b></label>
                                                    <label>EX: "https://www.dailymotion.com/video/<u>x6bkz3p</u>" Code =
                                                        <b>x6bkz3p</b></label>
                                                    <input type="text" class="form-control"
                                                           placeholder="Please Enter Code" id="mtv_vediourl"
                                                           name="mtv_vediourl" required="required">
                                                </div>
                                                <div class="col-sm-12">
                                                    <div class="col-sm-12" id="mtv_loadiframe"></div>
                                                </div>
                                                <div class="col-sm-12">
                                                    <label>Enter Time Duration*</label>
                                                    <input type="text" class="form-control"
                                                           placeholder="Enter Video Time Duration"
                                                           id="mtv_video_duration" name="mtv_video_duration"
                                                           required="required">
                                                </div>
                                                <div class="col-sm-12">
                                                    <label>Enter Video Title*</label>
                                                    <input type="text" class="form-control"
                                                           placeholder="Enter Video Title" id="mtv_vediotitle"
                                                           name="mtv_vediotitle" required="required">
                                                </div>
                                                <div class="col-sm-12">
                                                    <label>Video Description*</label>
                                                    <textarea placeholder="Description" name="mtv_discription"
                                                              id="mtv_discription" class="form-control" rows="5"
                                                              required></textarea>
                                                </div>
                                                <div class="col-sm-12">
                                                    <label>Tags*</label>
                                                    <input type="text" class="form-control"
                                                           placeholder="Eg(amplepoints,ten,twenty,....)" id="mtv_tags"
                                                           name="mtv_tags" required="required">
                                                    <label>Separate All Tags With A Comma.</label>
                                                </div>
                                                <div class="form-group">
                                                    <div class="col-sm-3 col-xs-offset-9">
                                                        <button type="submit">SAVE</button>
                                                    </div>
                                                </div>
                                            </form>
                                            
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-5 replace_my_movie_tv">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="modal fade bs-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel">
            <div class="modal-dialog modal-lg">
                <div class="modal-content popup-h">
                    <h3>Women's Clothing</h3>
                    <div class="row">
                        <div class="col-xs-3"><a href="#" class="thumbnail inter"> <img
                                        src="<?php echo $admin_model_obj->cdnUrl('images/4.jpg'); ?>" alt="125x125">
                                <div class="text-chackbox">
                                    <div class="col-lg-10 col-padding">
                                        <p><span>Women's Clothing</span></p>
                                    </div>
                                    <div class="col-lg-2 col-padding" style="float:right;">
                                        <div class="squaredThree">
                                            <input type="checkbox" value="None" id="squaredThree" name="check"
                                                   class="squared">
                                            <label for="squaredThree" class="btn btn-primary" data-toggle="modal"
                                                   data-target=".bs-example-modal-lg"></label>
                                        </div>
                                    </div>
                                </div>
                            </a></div>
                        <div class="col-xs-3"><a href="#" class="thumbnail  inter"> <img
                                        src="<?php echo $admin_model_obj->cdnUrl('images/4.jpg'); ?>" alt="125x125">
                                <div class="text-chackbox">
                                    <div class="col-lg-10 col-padding">
                                        <p><span>Women's Clothing</span></p>
                                    </div>
                                    <div class="col-lg-2 col-padding" style="float:right;">
                                        <div class="squaredThree">
                                            <input type="checkbox" value="None" id="squaredThree" name="check"
                                                   class="squared">
                                            <label for="squaredThree"></label>
                                        </div>
                                    </div>
                                </div>
                            </a></div>
                        <div class="col-xs-3"><a href="#" class="thumbnail  inter"> <img
                                        src="<?php echo $admin_model_obj->cdnUrl('images/4.jpg'); ?>" alt="125x125">
                                <div class="text-chackbox">
                                    <div class="col-lg-10 col-padding">
                                        <p><span>Women's Clothing</span></p>
                                    </div>
                                    <div class="col-lg-2 col-padding" style="float:right;">
                                        <div class="squaredThree">
                                            <input type="checkbox" value="None" id="squaredThree" name="check"
                                                   class="squared">
                                            <label for="squaredThree"></label>
                                        </div>
                                    </div>
                                </div>
                            </a></div>
                        <div class="col-xs-3"><a href="#" class="thumbnail  inter"> <img
                                        src="<?php echo $admin_model_obj->cdnUrl('images/4.jpg'); ?>" alt="125x125">
                                <div class="text-chackbox">
                                    <div class="col-lg-10 col-padding">
                                        <p><span>Women's Clothing</span></p>
                                    </div>
                                    <div class="col-lg-2 col-padding" style="float:right;">
                                        <div class="squaredThree">
                                            <input type="checkbox" value="None" id="squaredThree" name="check"
                                                   class="squared">
                                            <label for="squaredThree"></label>
                                        </div>
                                    </div>
                                </div>
                            </a></div>
                    </div>
                    <div class="row">
                        <div class="col-xs-3"><a href="#" class="thumbnail inter"> <img
                                        src="<?php echo $admin_model_obj->cdnUrl('images/4.jpg'); ?>" alt="125x125">
                                <div class="text-chackbox">
                                    <div class="col-lg-10 col-padding">
                                        <p><span>Women's Clothing</span></p>
                                    </div>
                                    <div class="col-lg-2 col-padding" style="float:right;">
                                        <div class="squaredThree">
                                            <input type="checkbox" value="None" id="squaredThree" name="check"
                                                   class="squared">
                                            <label for="squaredThree" class="btn btn-primary" data-toggle="modal"
                                                   data-target=".bs-example-modal-lg"></label>
                                        </div>
                                    </div>
                                </div>
                            </a></div>
                        <div class="col-xs-3"><a href="#" class="thumbnail  inter"> <img
                                        src="<?php echo $admin_model_obj->cdnUrl('images/4.jpg'); ?>" alt="125x125">
                                <div class="text-chackbox">
                                    <div class="col-lg-10 col-padding">
                                        <p><span>Women's Clothing</span></p>
                                    </div>
                                    <div class="col-lg-2 col-padding" style="float:right;">
                                        <div class="squaredThree">
                                            <input type="checkbox" value="None" id="squaredThree" name="check"
                                                   class="squared">
                                            <label for="squaredThree"></label>
                                        </div>
                                    </div>
                                </div>
                            </a></div>
                        <div class="col-xs-3"><a href="#" class="thumbnail  inter"> <img
                                        src="<?php echo $admin_model_obj->cdnUrl('images/4.jpg'); ?>" alt="125x125">
                                <div class="text-chackbox">
                                    <div class="col-lg-10 col-padding">
                                        <p><span>Women's Clothing</span></p>
                                    </div>
                                    <div class="col-lg-2 col-padding" style="float:right;">
                                        <div class="squaredThree">
                                            <input type="checkbox" value="None" id="squaredThree" name="check"
                                                   class="squared">
                                            <label for="squaredThree"></label>
                                        </div>
                                    </div>
                                </div>
                            </a></div>
                        <div class="col-xs-3"><a href="#" class="thumbnail  inter"> <img
                                        src="<?php echo $admin_model_obj->cdnUrl('images/4.jpg'); ?>" alt="125x125">
                                <div class="text-chackbox">
                                    <div class="col-lg-10 col-padding">
                                        <p><span>Women's Clothing</span></p>
                                    </div>
                                    <div class="col-lg-2 col-padding" style="float:right;">
                                        <div class="squaredThree">
                                            <input type="checkbox" value="None" id="squaredThree" name="check"
                                                   class="squared">
                                            <label for="squaredThree"></label>
                                        </div>
                                    </div>
                                </div>
                            </a></div>
                    </div>
                    <div class="row">
                        <div class="col-xs-3"><a href="#" class="thumbnail inter"> <img
                                        src="<?php echo $admin_model_obj->cdnUrl('images/4.jpg'); ?>" alt="125x125">
                                <div class="text-chackbox">
                                    <div class="col-lg-10 col-padding">
                                        <p><span>Women's Clothing</span></p>
                                    </div>
                                    <div class="col-lg-2 col-padding" style="float:right;">
                                        <div class="squaredThree">
                                            <input type="checkbox" value="None" id="squaredThree" name="check"
                                                   class="squared">
                                            <label for="squaredThree" class="btn btn-primary" data-toggle="modal"
                                                   data-target=".bs-example-modal-lg"></label>
                                        </div>
                                    </div>
                                </div>
                            </a></div>
                        <div class="col-xs-3"><a href="#" class="thumbnail  inter"> <img
                                        src="<?php echo $admin_model_obj->cdnUrl('images/4.jpg'); ?>" alt="125x125">
                                <div class="text-chackbox">
                                    <div class="col-lg-10 col-padding">
                                        <p><span>Women's Clothing</span></p>
                                    </div>
                                    <div class="col-lg-2 col-padding" style="float:right;">
                                        <div class="squaredThree">
                                            <input type="checkbox" value="None" id="squaredThree" name="check"
                                                   class="squared">
                                            <label for="squaredThree"></label>
                                        </div>
                                    </div>
                                </div>
                            </a></div>
                        <div class="col-xs-3"><a href="#" class="thumbnail  inter"> <img
                                        src="<?php echo $admin_model_obj->cdnUrl('images/4.jpg'); ?>" alt="125x125">
                                <div class="text-chackbox">
                                    <div class="col-lg-10 col-padding">
                                        <p><span>Women's Clothing</span></p>
                                    </div>
                                    <div class="col-lg-2 col-padding" style="float:right;">
                                        <div class="squaredThree">
                                            <input type="checkbox" value="None" id="squaredThree" name="check"
                                                   class="squared">
                                            <label for="squaredThree"></label>
                                        </div>
                                    </div>
                                </div>
                            </a></div>
                        <div class="col-xs-3"><a href="#" class="thumbnail  inter"> <img
                                        src="<?php echo $admin_model_obj->cdnUrl('images/4.jpg'); ?>" alt="125x125">
                                <div class="text-chackbox">
                                    <div class="col-lg-10 col-padding">
                                        <p><span>Women's Clothing</span></p>
                                    </div>
                                    <div class="col-lg-2 col-padding" style="float:right;">
                                        <div class="squaredThree">
                                            <input type="checkbox" value="None" id="squaredThree" name="check"
                                                   class="squared">
                                            <label for="squaredThree"></label>
                                        </div>
                                    </div>
                                </div>
                            </a></div>
                    </div>
                </div>
            </div>
        </div>
        <div id="gridSystemModal" class="modal" tabindex="-1" role="dialog" aria-labelledby="gridModalLabel"
             style="display: none;z-index: 9999999999;">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                                    aria-hidden="true">&times;</span></button>
                        <h4 class="modal-title" style="font-size:18px; font-weight:bold;" id="gridSystemModalLabel">
                            Followers</h4>
                    </div>
                    <div class="modal-body" id="followers-list"></div>
                    <div class="clearfix"></div>
                    <div class="modal-footer">
                        <!--<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>-->
                        <!--<button type="button" class="btn btn-primary">Save changes</button>-->
                    </div>
                </div>
                <!-- /.modal-content -->
            </div>
            <!-- /.modal-dialog -->
        </div>
        <!-- /.modal -->

        <div id="myModal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
             style="display: none;z-index: 9999999999;">
            <div class="modal-dialog following_model" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                                    aria-hidden="true">&times;</span></button>
                        <h4 class="modal-title" style="font-size:18px; font-weight:bold;" id="myModalLabel">
                            Followings</h4>
                    </div>
                    <div class="modal-body" id="following-list"></div>
                    <div class="clearfix"></div>
                    <div class="modal-footer">
                        <!--<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>-->
                        <!--<button type="button" class="btn btn-primary">Save changes</button>-->
                    </div>
                </div>
                <!-- /.modal-content -->
            </div>
            <!-- /.modal-dialog -->
        </div>
        <!-- /.modal -->

        <div class="modal fade" id="changeprofile" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
             style="top: 130px;z-index: 9999;">
            <div class="modal-dialog" role="document">
                <form id="changeprofileform" action="<?php echo $this->baseUrl('default/index/changeprofileimage'); ?>"
                      method="post" enctype="multipart/form-data">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                            <h4 class="modal-title">Change Profile Image</h4>
                        </div>
                        <div class="modal-body">
                            <div class="form-group">
                                <label for="profile_image">Change Profile Image <span>(W-80 / H-80)</span> </label>
                                <input type="file" name="profile_image" class="form-control" required>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="submit" style="width: auto;height: auto;" class="btn btn-default">Submit
                            </button>
                            <button type="button" style="width: auto;height: auto;" class="btn btn-default"
                                    data-dismiss="modal">Close
                            </button>
                        </div>
                    </div>
            </div>
        </div>
      

        <div class="modal fade" id="giftcardmodel" role="dialog">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                        <h4 class="modal-title">Your Gift Card Details:</h4>
                    </div>
                    <div class="gift-card-modal-body" id="gift_card_model_body">


                    </div>
                    <div class="modal-footer">
                        <button type="button" style="width: auto;height: auto;" class="btn btn-default"
                                data-dismiss="modal">Close
                        </button>
                    </div>
                </div>
            </div>
        </div>

        <div id="messegemodel" class="modal fade" role="dialog">
            <div class="modal-dialog">
                <!-- Modal content-->
                <form id="messegeform" method="post" enctype="multipart/form-data">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                            <h4 class="modal-title">New conversation</h4>
                        </div>
                        <div class="modal-body">
                            <input type="hidden" id="msgproductid" name="msgproductid" value="">
                            <input type="hidden" id="msguserid" name="msguserid" value="<?php echo $this->usrmakey; ?>">
                            <input type="hidden" id="msgvendorid" name="msgvendorid" value="">
                            <div class="form-group">
                                <label for="msgsubject">Subject:</label>
                                <input type="text" id="msgsubject" name="msgsubject" value="" class="form-control"
                                       id="msgsubject" required>
                            </div>
                            <div class="form-group">
                                <label for="msgdetail">Messege:</label>
                                <textarea name="msgdetail" cols="5" rows="5" class="form-control" required></textarea>
                            </div>
                            <div class="form-group">
                                <label for="msgsubject">Attachments</label>
                            </div>
                            <div class="input_fields_wrap">
                                <div class="form-group">
                                    <input type="file" name="msgfiles[]" class="form-control">
                                </div>
                            </div>
                            <button style="width: auto;height: auto;" class="add_field_button btn btn-default">Add More
                                Files
                            </button>
                        </div>
                        <div class="modal-footer">
                            <button type="submit" style="width: auto;height: auto;" class="btn btn-default">Submit
                            </button>
                            <button type="button" style="width: auto;height: auto;" class="btn btn-default"
                                    data-dismiss="modal">Close
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
        <div id="confirmorder" class="modal fade" role="dialog">
            <div class="modal-dialog">
                <!-- Modal content-->
                <form id="confirmorderform" method="post" enctype="multipart/form-data">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                            <h4 class="modal-title">Redeem Order</h4>
                        </div>
                        <div class="modal-body">
                            <input type="hidden" id="productadded_id" name="productadded_id" value="">
                            <input type="hidden" id="order_user_id" name="order_user_id"
                                   value="<?php echo $this->usrmakey; ?>">
                            <div class="form-group">
                                <label for="msgsubject">Enter Reedem Code:</label>
                                <input type="text" id="order_confirm_vendor_id" name="order_confirm_vendor_id" value=""
                                       class="form-control" required>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="submit" style="width: auto;height: auto;" class="btn btn-default">Submit
                            </button>
                            <button type="button" style="width: auto;height: auto;" class="btn btn-default"
                                    data-dismiss="modal">Close
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
     

@include('includes.footer')