@if(@Auth::user()->user_id)

<script src="
https://cdn.jsdelivr.net/npm/countdowntimer@2.0.1/dist/js/jQuery.countdownTimer.min.js
"></script>
<link href="
https://cdn.jsdelivr.net/npm/countdowntimer@2.0.1/dist/css/jQuery.countdownTimer.min.css
" rel="stylesheet">

<?php 
$baseUrl = url('/');
$admin_model_obj  =  new \App\Models\AdminImpFunctionModel;?>
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
                } catch (exception_2) {}
            }
        } else if (window.XMLHttpRequest) {
            xmlHttpRequest = new XMLHttpRequest();
        }
    }

</script>
<?php /* Sidebar Advertisement */ ?>

<style>
    .main-wpappers {
        height: 262px !important;
        width: 378px !important;
    }
    .images-popsme {
    	width: 350px;
        position: absolute;
        z-index: 99999999;
        cursor: pointer;
    } 
    .top-slider .main-wpappers .images-popsme {
        border: 3px solid #000;
    }
    .ads-band .timer img {
        padding: 0 0 0 8px;
        width: 22px;
        margin: 0 3px 0 0 !important;
    }
    @media screen and (max-width: 359px OR max-height: 260px) {
    .socail-adss {
    height: 260px;
    width: 359px;
    }
    #header {
    display: none !important;
    }
    }

    .popsup {
    background: #000000 none repeat scroll 0 0;
    bottom: auto;
    color: #ffffff;
    font-size: 11px;
    left: 32%;
    position: absolute;
    text-align: center;
    top: 0;
    width: 56px;
    z-index: 99999;
    }
    .row.ash-col {
    position: relative;
    }

    .myrevrd span{
    display: none;
    }

    @media(max-width: 660px) {
    .popsup {
    font-size: 0;
    }
    .myrevrd {
    background: #ff4500 none repeat scroll 0 0;
    border-radius: 20px 20px 0 0;
    color: #fff !important;
    display: block;
    font-size: 26px;
    left: 41%;
    padding: 0 0 6px;
    position: fixed !important;
    top: 29px !important;
    z-index: 999999999;
    }
    .myrevrd span {
    display: block;
    font-size: 7px;
    margin: -4px 0 0;
    text-transform: uppercase;
    width: 64px;
    }
    .main-wpappers {
    bottom: 0;
    left: 0;
    position: fixed;
    right: 0 !important;
    top: 82px;
    z-index: 2147483647;
    }
    .first-forth {
    height: 100% !important;
    position: absolute;
    width: 100% !important;
    }

    .col-lgk.kl-menu {
    /* display: none;*/
    }
    .respo-logo {
    display: block;
    margin: 0 auto !important;
    padding: 3px 0;
    text-align: center;
    width: 100%;
    }
    .top-icons {
    }
    .cd-search-trigger {
    }
    .top-icons .top-icon {
    display: block;
    }

    .account-list.animated.fadeInDown {
    /*display: none !important;*/
    }
    .main-wpappers {
    height: 260px;
    }.row.ash-col {
    margin: 82px 0 0 !important;
    }

    .tab-content > .tab-pane {
    display: block;
    }

    .carousel-caption {
    display: block;
    }
    .respo-logo img {
    width: 167px !important;
    }
    }
    .myunick {
    position: absolute;
    top: 0;
    left: 0;
    right: 0;
    bottom: 0;
    z-index: 999999;
    background-color: #ffffff;
    opacity: 0.8;
    }
    .sixtysectime{
    top: 42px;
    position: absolute;
    left: 171px;
    color: #f75d00;
    font-size: 26px;
    }
    .sixtysec{
    top: 73px;
    position: absolute;
    left: 116px;
    color: #f75d00;
    font-size: 26px;
    }
    .myunicknointerest {
    position: absolute;
    top: 0;
    left: 0;
    right: 0;
    bottom: 0;
    z-index: 999;
    background-color: #ffffff;
    border: 4px solid #f75d00;
    /*opacity: 0.8;*/
    }

    .nointerest{
    top: 18px;
    position: absolute;
    left: 10px;
    /*color: #f75d00;*/
    color: #07253F;
    font-size: 22px;
    text-align:center;
    margin-top:70px;

    }
</style>



@php
$amplesresult = $admin_model_obj->all_amples_data();
$amplesdatas=$amplesresult;
// dd($amplesdatas);

   $record=DB::table('users')->where('user_id',@Auth::user()->user_id)->first();
   $usrmakey=@Auth::user()->user_id;
   $myno = $usrmakey;
@endphp


<div id="wpbs_slider" class="hidden-xs hidden-sm" style="left: -380px;">
    <div id="icon_label" class="icon_label">
        <div class="wpbs_handle">
            <img src="https://amplepoints.com/newcss/img/be_1.jpg" alt="">
        </div>
        <div class="wpbs_handle blink">
<<<<<<< HEAD
            <img src="https://amplepoints.com/newcss/img/af_1.jpg" alt="" style="display:none">
=======
            <img src="https://amplepoints.com/newcss/img/af_1.jpg" alt="">
>>>>>>> 8182c1bfea5192ae8802182fb800768d4155eae0
        </div>
    </div>

    <div id="wpbs__cont">
        <div class="widgetcont">
            <div>

                <!--start code for video-->
                <!--<iframe src="http://www.webproce.com/amples/"></iframe> -->
                <div class="main-wpappers">
                    <img src="https://amplepoints.com/img/gof.gif" class="images-popsme"/>

                    <?php 

                        $adverise = array();

                        $toatalAdds = 0;

                        if(count($amplesdatas) > 0){
                            
                            $db_host_name = env('DB_HOST');
						    $db_user_name = env('DB_USERNAME');
						    $db_user_password = env('DB_PASSWORD');
						    $db_database_name = env('DB_DATABASE');
						    $port = env('DB_PORT');

						    $con = mysqli_connect($db_host_name, $db_user_name, $db_user_password, $db_database_name,$port);

                           if (!$con)
                           {
                               die('could not connect'.mysqli_error($con));
                           }
                           mysqli_select_db($con,$db_database_name);

                            $igd =38441; //$record->user_id;

                            //$forTotalRecord = mysqli_query($con,"SELECT * FROM `tbl_advertises` WHERE `status` = '1'");
                            //$toatalAdds = mysqli_num_rows($forTotalRecord);

                            $resrfff = mysqli_query($con,"SELECT  * FROM `tbl_user_interest` where customerId = '$igd' and isselected = 1 ");

                            $interestrow = mysqli_num_rows($resrfff);

                            if($interestrow > 0){

                                while ($rowyrff = mysqli_fetch_row($resrfff)){
                                    $datarff[] = $rowyrff['2'];
                                }

                                $arrd1 = array_unique($datarff);

                                foreach($amplesdatas as $key){

                                    $my_id = $key->adver_id;

                                    $datarhh = array();    

                                    $resrhh = mysqli_query($con,"SELECT  * FROM `adver_intrest` where add_id = '$my_id' ");

                                    $adverinterst =  mysqli_num_rows($resrhh);

                                    if($adverinterst > 0) {

                                        while ($rowyrhh = mysqli_fetch_row($resrhh)){
                                            $datarhh[] = $rowyrhh['2'];
                                        }
                                        $arrd2 = array_unique($datarhh);
                                        //print_r($arrd2);
                                        //print_r($arrd1);
                                        //print_r($arrd2);
                                        $resultfix = array_intersect($arrd2,$arrd1);

                                        $resultfixrow = count($resultfix);
                                        //echo $resultfixrow;
                                        if($resultfixrow > 0){

                                            $adverise[] = $key;  
                                        }

                                    }

                                }
                            }
                        } 

                        // echo "<pre>";print_r($adverise);die;

                    ?>

                    <?php if(!empty($adverise)){ ?>

                        <!-- <div class='myunick'>
                        <span class="sixtysectime"></span>
                        <div class="clearfix"></div>
                        <span class="sixtysec">Please Wait...</span>
                        </div>-->
                        <ul class="first-forth">
                            <?php
                                $toatalAdds = count($adverise);
                                $i = 1;
                                foreach($adverise as $key){

                                    if($i == 5){

                                        break;

                                    }else{

                                    ?>

                                    <li id="addid_<?php echo $i; ?>" style="width: 100px;">
                                        <div class="ads-setss">
                                            <div  id="dd_<?=$key->adver_id;?>"  class="main-logo"><img  
                                            	{{-- src="<?php echo $admin_model_obj->cdnUrl('adver_images/image/'.$key->adver_logo);?>" --}}
                                            	src="https://amplepoints.com/adver_images/image/{{$key->adver_logo}}"
                                            	{{-- https://amplepoints.com/adver_images/image/1676610451_t_plogo_250x149.png --}}
                                            	/>
                                            </div>
                                            <input type="hidden" name="hiddenvaldd" value="<?=$key->adver_id?>">
                                            <input type="hidden" class="commentId" name="hiddenvaldver" value="<?=$key->adver_type?>">
                                            <input type="hidden" class="commentId" name="hiddenuserid" value="<?php echo $myno; ?>">
                                            <div class="ads-band">
                                                <h2 class="ads-band-left"><span><?php if($key->view==''){ echo '0'; }else{
                                                            echo $key->view; } ?></span> View</h2>

                                                <!--<span>you are earning <?=$key->ad_price?> amples<span>-->
                                                <?php if($key->adver_type=='video'){ ?>
                                                    <div class="ads-band-right"><span class="timer"><?=$key->length_video?>Sec<img src="<?php echo $admin_model_obj->cdnUrl('adver_images/icon-viedo.png');?>"></span> </div>
                                                    <?php }else{?>
                                                    <div class="ads-band-right"><span class="timer">15Sec<img src="<?php echo $admin_model_obj->cdnUrl('adver_images/icon-static.png');?>"></span> </div>
                                                    <?php } ?>
                                                <div class="clear"></div>
                                            </div>
                                        </div>
                                    </li>   

                                    <?php 

                                    }
                                    $i++;
                            }?>
                        </ul>

                        <?php }else{ ?>

                        <div class='myunicknointerest'>
                            <span class="nointerest">Please choose at least 5 interests from the <a href="{{url('/')}}/dashboard" style="color: #f75d00;text-decoration: underline;">interests</a> Page.</span>
                        </div>  

                        <?php   } ?>

                </div>


                <!-------------end home page----------------->
                <!------------strat video page---------------->
                <div id="member">


                </div>
                <div id="guddies">


                </div>
                <div id="adverpro">


                </div>
                <!--end code for video-->

<<<<<<< HEAD

 <script src="https://cdnjs.cloudflare.com/ajax/libs/countdown/2.6.0/countdown.min.js" integrity="sha512-FkM4ZGExuYz4rILLbNzw8f3HxTN9EKdXrQYcYfdluxJBjRLthYPxxZixV/787qjN3JLs2607yN5XknR/cQMU8w==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
=======
>>>>>>> 8182c1bfea5192ae8802182fb800768d4155eae0
                <script>

                    var incadd = 1; 
                    var from_row = 3;
                    var totalAdds = '<?php echo $toatalAdds - 1; ?>';
                    var UserIdAdd = '<?php echo $myno; ?>';
                    var rotationaddInterval;

                    function startAddRotation(){

                        rotationaddInterval = setInterval(function(){
                            /* $('.first-forth li').fadeTo();
                            $('.first-forth li:nth-child(1)').appendTo('.first-forth');*/
                            if(totalAdds == from_row){
                                from_row = 0;  
                            }else{
                                from_row = from_row + 1;  
                            }


                            if(incadd == 1){
                                $.ajax({
                                    url:'<?php echo $baseUrl; ?>/category_filter/loadrandomaddnew.php',
                                    data: {user_id: UserIdAdd,from_add:from_row},
                                    type: 'GET'
                                })
                                .done(function(data){
                                    //alert(data);                                                                    
                                    $('#addid_1').html(data);                    
                                })
                                incadd = 4;
                            }else if(incadd == 4){
                                $.ajax({
                                    url:'<?php echo $baseUrl; ?>/category_filter/loadrandomaddnew.php',
                                    data: {user_id: UserIdAdd,from_add:from_row},
                                    type: 'GET'
                                })
                                .done(function(data){
                                    //alert(data);                                                                    
                                    $('#addid_4').html(data);                    
                                })
                                incadd = 2 
                            }else if(incadd == 2){
                                $.ajax({
                                    url:'<?php echo $baseUrl; ?>/category_filter/loadrandomaddnew.php',
                                    data: {user_id: UserIdAdd,from_add:from_row},
                                    type: 'GET'
                                })
                                .done(function(data){
                                    //alert(data);                                                                    
                                    $('#addid_2').html(data);                    
                                })
                                incadd = 3 
                            }else if(incadd == 3){
                                $.ajax({
                                    url:'<?php echo $baseUrl; ?>/category_filter/loadrandomaddnew.php',
                                    data: {user_id: UserIdAdd,from_add:from_row},
                                    type: 'GET'
                                })
                                .done(function(data){
                                    //alert(data);                                                                    
                                    $('#addid_3').html(data);                    
                                })
                                incadd = 1 
                            }


                        }, 4000);  

                    }

                    function stopAddRotation(){

                        clearInterval(rotationaddInterval);
<<<<<<< HEAD
                        console.log("Stop Add Rotation 1"); 
=======
                        console.log("Stop Add Rotation"); 
>>>>>>> 8182c1bfea5192ae8802182fb800768d4155eae0
                    }

                    $("body").on("click", ".main-logo", function(event){

                        stopAddRotation();
                        var ID = $(this).attr('id');
                        var total_ample_present = '<?php echo (int) ($record->total_ample); ?>';
                        var total_reward_time = '<?php if(!empty($reward_minutes)){ echo round($reward_minutes); }else{ echo "0"; }  ?>';
                        //alert(total_ample_present);
                        //alert(total_reward_time);
                        var camid = $("#" + ID).siblings("input[name=hiddenvaldd]").val();
                        var advertype = $("#" + ID).siblings("input[name=hiddenvaldver]").val();
                        var userid = $("#" + ID).siblings("input[name=hiddenuserid]").val();
                        //alert(userid);
                        var baseurl = '<?PHP echo $baseUrl; ?>';
                        var SITEROOT = baseurl;
                        /*    $.ajax({
                        url: SITEROOT+'/category_filter/analytics.php',
                        data: {adverid: camid,userid: userid},
                        type: 'POST'
                        })
                        .done(function(data){
                        //$('#adverpro').css('display','block');
                        //$('.main-wpappers').css('display','none');
                        $('#adverproductid').html(data);

                        })    */         

                        if(advertype=='static'){
                            $.ajax({
                                url: SITEROOT+'/category_filter/adver.php',
                                cache:false,
                                data: {adverid: camid,userid: userid},
                                type: 'GET'
                            })
                            .done(function(data){
                                $('#adverpro').css('display','block');
                                $('.main-wpappers').css('display','none');
                                $('#adverpro').html(data);

                            })
                        }else{
                            $.ajax({
                                url: SITEROOT+'/category_filter/advervideo.php',
                                cache:false,
                                data: {camid: camid,userid: userid},
                                type: 'GET'
                            })
                            .done(function(data){
                                $('#member').css('display','block');
                                $('.main-wpappers').css('display','none');
                                $('#member').html(data);

                            })    
                        }
                    });


                    <?php if(!empty($adverise)){ ?>

                        $("body").on("click", ".images-popsme", function(event){ 
                            $(this).remove();
                            <?php if($toatalAdds > 4){ ?>
                                startAddRotation();
                                <?php } ?>

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

                        <?php }else{ ?>

                        $("body").on("click", ".images-popsme", function(event){ 
                            $(this).remove();

                        });  

                        <?php  } ?>


                </script>


            </div>        
        </div>
    </div>

</div>

<script>
    $(document).ready(function(){
        $(".close-close-b").click(function(){
            $(".b").remove();
        });
        $(".b-b").click(function(){
            $(".b").show();
        });

    });
</script>

<style type="text/css">
    #wpbs_slider {
        background: transparent;
        border-bottom-right-radius: 6px;
        border-top-right-radius: 6px;
        height: 40px;
        left: -200px;
        position: fixed;
        top: 200px;
        width: 420px;
        z-index: 999999;

    }
    .icon_label {
        float: right;
        font-size: 12pt;
        font-weight: bold;
        height: 40px;
        position: relative;
        width: 47px;
        cursor: pointer;
        top: -5px;
    }
    .wpbs_handle {
        color: #000000;
        line-height: 30px;
        text-align: center;
        padding: 5px;
    }
    #wpbs_slider img.login_text {
        margin: 5px;
    }
    #wpbs__cont {
        background: #ffffff none repeat scroll 0 0;
        border-bottom-right-radius: 6px;
        border-top-right-radius: 6px;
        height: auto;
        min-height: 260px;
        width: 378px;
        z-index: 999999;
        color: #000000;
        box-shadow: 0 2px 10px 2px #3a3535;
    }
    .widget_content {
        display: inline-block;
        margin: 2%;
        text-align: center;
        width: 14%;
    }
    .widget_content a {
        border: 1px solid #ddd;
        display: inline-block;
        font-size: 15px;
        font-weight: bold;
        width: 100%;
    }
    .widget_content a:hover {
        background: #c32247 none repeat scroll 0 0;
        color: #fff;
    }
</style>


<script type="text/javascript">
    var wpssclose_ = 0;
    jQuery('#icon_label').click(function () {
        if (wpssclose_ == 1) {
            jQuery('#wpbs_slider').animate({
                left: '-=380'
            }, 400, function () {
                // Animation complete.
            });
            wpssclose_ = 0;
        } else {
            jQuery('#wpbs_slider').animate({
                left: '+=380'
            }, 400, function () {
                // Animation complete.
            });
            wpssclose_ = 1;
        }
    });
</script>


@endif