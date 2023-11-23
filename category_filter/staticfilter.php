<?php /* Please Do Not Change Any Code In this File If you want To change Please contact Mr.Tony*/ ?>
<?php $rootUrl = (!empty($_SERVER['HTTPS']) ? 'https' : 'http') . '://' . $_SERVER['HTTP_HOST']; ?>
<?php 
    session_start();
    $q =$_GET['adverid'];
    $user_id=$_GET['user_id'];

    require("db_config.php");

?>
<!--<link rel="stylesheet" type="text/css" href="https://www.amplifyon.com/slider/demoStyleSheet.css" />

<script type="text/javascript" src="https://www.amplifyon.com/product_filter/js/jquery-1.10.1.min.js"></script>
<script type="text/javascript" src="https://www.amplifyon.com/slider/fadeSlideShow.js"></script>
<script type="text/javascript">
$(document).ready(function(){
//alert('hi');
$('#slideshow').fadeSlideShow();


});
</script>-->
<style>

    /*Hiren CSS Start*/
    .main-imagess {
        display: inline-block;
        overflow: hidden;
        height: auto !important;
    }

    .l-player-slid .main-imagess>img {
        height: auto;
        width: auto;
        max-width: 100%;
        display: block;
        min-height: 345px;
    }
    /*Hiren CSS END*/

    .hidefourbtn { position: absolute; top: 542px; left: 0; right: 0; bottom: 0; z-index: 999; height: 103px; }
    /************* new tiles style ********************/
    .borderright {

        height: 16px;

        border-right: 1px solid #000;

        border-left: 1px solid #000;

    }
    .top-slider-txt { font-size: 13px !important; color: #000 !important; }
    .paty1:first-child{width: 33.33%; }
    .paty1:last-child{width: 28.33%;float: right; }
    .tilter {  width: 215px;
        text-align: left;
        overflow: hidden;
        display: -webkit-box;
        -webkit-line-clamp: 2;
    -webkit-box-orient: vertical; }
    .paty1 { float: left; display: inline-block; width: 38.33%; }
    .paty1 strong { font-size: 12px !important;display: inline-block; color: #000 !important; text-align: center; width: 100%; }
    .paty1 span { text-align: center; width: 100%; height: 50px; position: relative; top: 10px; display: inline-block; }
    .pri_bod { float: left; display: inline-block; width: 100%; margin-top: 0; }
    .sel_Price.pricess { line-height: 14px; font-size: 17.5px; color: #ff4201; font-family: 'Bebas'; font-weight: 200 !important; }
    .paty1 span b {padding-bottom: 5px; line-height: 14px; font-size: 16.5px; color: #ff4201; font-family: 'Bebas'; font-weight: 200 !important; text-align: center !important; width: 100%; display: inline-block; }
    .sel_by { float: right; display: inline-block; }
    .sel_Price.pricess { color: #ff4201; float: left; width: auto; }
    .amples_feedback { background: #f75d00;bottom: 0;display: none;height: 100%;left: 0;position: absolute;right: 0;top: 0;z-index: 2147483647;color:#ffffff;padding: 50px 0 0 5px;}
    .feedback_radio { display: block;position: relative;padding-left: 35px;margin-bottom: 12px;cursor: pointer;font-size: 22px;-webkit-user-select: none;-moz-user-select: none;-ms-user-select: none;user-select: none;}
    /* Hide the browser's default radio button */
    .feedback_radio input { position: absolute;opacity: 0;cursor: pointer;}
    /* Create a custom radio button */
    .checkmark { position: absolute;top: 0;left: 0;height: 25px;width: 25px;background-color: #eee;border-radius: 50%;border: 1px dotted #000;}
    /* On mouse-over, add a grey background color */
    .feedback_radio:hover input ~ .checkmark { background-color: #ccc;}
    /* When the radio button is checked, add a blue background */
    .feedback_radio input:checked ~ .checkmark { background-color: #2196F3;}
    /* Create the indicator (the dot/circle - hidden when not checked) */
    .checkmark:after { content: "";position: absolute;display: none;}
    /* Show the indicator (dot/circle) when checked */
    .feedback_radio input:checked ~ .checkmark:after {display: block;}
    /* Style the indicator (dot/circle) */
    .feedback_radio .checkmark:after { top: 8px;left: 8px;width: 8px;height: 8px;border-radius: 50%;background: white;}
</style>

<div class="hidefourbtn"></div>
<link rel="stylesheet" type="text/css" href="<?php echo cdnUrl('newcss/css/bebas.css'); ?>"/>
<div class="main-slider-shocase">
    <ul class="l-player-slid">
        <?php
            $adver_pro="SELECT * FROM adver_pro WHERE adver_id = '".$q."' GROUP BY adver_product ORDER BY adver_pro_id DESC limit 5";
            $data_pro = mysqli_query($con,$adver_pro);
            $count = mysqli_num_rows($data_pro);
            $myi = 0;
            while($data_fetch = mysqli_fetch_array($data_pro))
            {
                $pro_immages="SELECT * FROM products INNER JOIN  product_images ON products.id = product_images.product_id WHERE product_images.product_id = '".$data_fetch['adver_product']."'";
                $data_images = mysqli_query($con,$pro_immages);
                $images_fetch = mysqli_fetch_array($data_images);
                $amples = "SELECT * FROM tbl_advertises WHERE adver_id = '".$data_fetch['adver_id']."'";
                $amples_data = mysqli_query($con,$amples);
                $amples_fetch = mysqli_fetch_array($amples_data);
                $ProductId = $data_fetch['adver_product'];

            ?>
            <li style="width: 235px; margin-right: 0px; float: left; display: <?php if($myi == 0){ echo 'block'; }else{ echo 'none'; } ?>;" data-thumb-alt="">
                <div class="top-slider-txt">
                    <div class="tilter">
                        <?=ucfirst($images_fetch['product_name']);?>
                    </div>
                    <?php if($images_fetch['product_discount'] >= 50){ ?>
                        <span>Free</span> with <span><?php echo $images_fetch['free_with_amples']; ?> Amples</span>
                        <?php } ?>
                </div>
                <a class="main-imagess" href="<?php echo $rootUrl; ?>/productdetail/<?=$data_fetch['adver_product'];?>" target="_blank">
                    <img src="<?php echo cdnUrl('product_images/'.$data_fetch['adver_product'].'/'.$images_fetch['image_name']); ?>" />
                </a>
                <div class="bottom-slider-txt">
                    <div class="three_bod">
                        <div class="paty1"> <strong>Buy & Earn</strong><br>
                            <span><b>
                                    <?=$images_fetch['no_of_amples'];?>
                                </b><br>
                            Amples</span> </div>
                        <div class="paty1 borderright"> <strong>Reward value</strong><br>
                        <span><b>$<?php echo $images_fetch['discount_price'];?></b></span> </div>
                        <div class="paty1"> <strong>You Earn</strong><br>
                        <span><b><?php echo (int) $images_fetch['product_discount'];?>%</b></span> </div>
                    </div>
                    <div class="pri_bod">
                        <div class="sel_Price pricess"><span class=""> $
                                <?=$images_fetch['single_price'];?>
                            </span></div>
                        <div class="sel_by"><strong>By</strong>:&nbsp; <span>
                                <?=$images_fetch['supplier_name'];?>
                            </span></div>
                    </div>
                </div>
                <ul class="four-btns">
                    <li id="Buynow">
                        <?php if($images_fetch['product_type_key']=='0'){ ?>
                            <a title="Add to Cart" target = "_blank" href="<?php echo $rootUrl; ?>/productdetail/<?=$data_fetch['adver_product'];?>">Add To Cart</a>
                            <?php }else{ ?>
                            <a title="Contact Me" href="<?php echo $rootUrl; ?>/productdetail/<?=$data_fetch['adver_product'];?>" target = "_blank">Contact Me</a>
                            <?php }  ?>
                        <input type="hidden" class="hiddenproductId" name="hiddenproduct" value="<?php echo $ProductId ; ?>">
                    </li>
                    <li id="Info"><a  target = "_blank" href="<?php echo $rootUrl; ?>/productdetail/<?=$data_fetch['adver_product'];?>">Info</a>
                        <input type="hidden" class="hiddenproductId" name="hiddenproduct" value="<?php echo $ProductId ; ?>">
                    </li>
                    <li id="Wishlist"><a title="Add to my wishlist" href="javascript:void(0);" onclick="wishlist_cart('<?php echo $images_fetch['product_name']; ?>','<?php echo $data_fetch['adver_product']; ?>','1','<?php echo strip_tags($images_fetch['single_price']); ?>','<?php echo $user_id; ?>','add');">Wishlist</a>
                        <input type="hidden" class="hiddenproductId" name="hiddenproduct" value="<?php echo $ProductId ; ?>">
                    </li>
                    <li id="Viewed"><a href="#" class="view" id="V_<?= $data_fetch['adver_id']; ?>">Viewed</a>
                        <input type="hidden" name="hiddenvaldver" value="<?=$amples_fetch['adver_type']?>">
                        <input type="hidden" name="hiddenvalamp" value="<?=$amples_fetch['length_video'];?>">
                        <input type="hidden" name="hiddenvaladver" value="<?= $data_fetch['adver_id']; ?>">
                        <input type="hidden" name="hiddenvaluser" value="<?php echo $user_id; ?>">
                        <input type="hidden" class="hiddenproductId" name="hiddenproduct" value="<?php echo $ProductId ; ?>">
                    </li>
                </ul>
            </li>
            <?php $myi++;  } ?>
    </ul>
    <ul class="l-player-slidbtn">
        <li class="first-lbtn">1</li>
        <li class="second-lbtn">2</li>
        <li class="third-lbtn">3</li>
        <li class="forth-lbtn">4</li>
        <li class="fifth-lbtn">5</li>
    </ul>
    <ul class="dimbutoonn">
        <li><a id="history" style="pointer-events: none;"  class="" href="javascript:void(0);" >History</a></li>
        <li><a  id="dim" href="javascript:void(0);" >Dim</a></li>
    </ul>
    <script>
        $('.first-lbtn').click(function(){
            $('.l-player-slid li').css('display','none');
            $('.first-l').css('display','block');
            $('.l-player-slidbtn li').removeClass('atvclr'); 
            $(this).addClass('atvclr'); 
        });
        $('.second-lbtn').click(function(){
            $('.l-player-slid li').css('display','none');
            $('.second-l').css('display','block');
            $('.l-player-slidbtn li').removeClass('atvclr'); 
            $(this).addClass('atvclr'); 
        });

        $('.third-lbtn').click(function(){
            $('.l-player-slid li').css('display','none');
            $('.third-l').css('display','block');
            $('.l-player-slidbtn li').removeClass('atvclr'); 
            $(this).addClass('atvclr'); 
        });

        $('.forth-lbtn').click(function(){
            $('.l-player-slid li').css('display','none');
            $('.forth-l').css('display','block');
            $('.l-player-slidbtn li').removeClass('atvclr'); 
            $(this).addClass('atvclr'); 
        });

        $('.fifth-lbtn').click(function(){
            $('.l-player-slid li').css('display','none');
            $('.fifth-l').css('display','block');
            $('.l-player-slidbtn li').removeClass('atvclr'); 
            $(this).addClass('atvclr'); 
        });
    </script> 
    <script>
        if($('.main-slider-shocase-box').css('display') == 'block')
            {

            newmyFunction();
        }
        $(document).ready(function(){

            $('a#dim').click(function(){
                //$('.slideshow-histroybox-main').css('display','block');
                $('.lshapright').css('display','block');
                $('.lshapbottom').css('display','block');
                $('.video-player').addClass('video-player-index');
            });
            myFunctionn();
            function myFunctionn() {
                //alert("stop");
                setTimeout(function(){ 
                    //stopAutoplay(); 
                    //timedCount();
                }, 17000);
            }
        });
    </script> 
    <br clear="all" />
    <div class="amples-valuess-box"> <strong>X </strong> 
        <!--<span>
        You have earned <span class="amples-valuess"></span><br/>Amples
        </span> --> 
        <span class="amples-valuess"></span> 
    </div>
    <div class="amples_feedback">
        <label style="margin-bottom: 14px;font-size: 18px;">Please Share Your Feedback With Us!</label>
        <label style="margin-bottom: 17px;font-size: 18px;">How Did You Like This Ad ?</label>
        <label class="feedback_radio">I like It.
            <input type="radio" name="radio_feedback" value="1">
            <span class="checkmark"></span>
        </label>
        <label class="feedback_radio">It's Ok.
            <input type="radio" name="radio_feedback" value="2">
            <span class="checkmark"></span>
        </label>
        <label class="feedback_radio">I don't Like It.
            <input type="radio" name="radio_feedback" value="3">
            <span class="checkmark"></span>
        </label>
        <button class="btn btn-success" id="submit_feedback" onclick="add_feedback();" style="width: 75px;border: 1px dotted #000;margin: 10px 0px 0px 4px;">Submit</button>
        <div class="clearfix"></div>
        <label style="color: yellow;font-size: 12px;margin-top: 5px;" class="feedback_err"></label>
    </div>
    <style>

        .last-times.youhave30s {
            bottom: 154px;
            left: 0;
            position: absolute;
            top: auto;
            color:#ffffff;
            font-size: 12px;
        }
        .l-player-slid .four-btns {
            bottom: 6px;
            height: 153px;
            position: absolute;
            width: 100% !important;
            }.l-player-slid .four-btns > li {
            display: inline;
            float: left;
            margin: 0 9px -1px 0 !important;
            padding: 0;
            width: 46%;
        }
        .amples-valuess-box strong{
            height: 10px;
            left: 0;
            position: absolute;
            right: 0;
            top: 0;
            width: 10px;
            display: block;
            width: 20px;
            height: 20px;
        }
        #myAcount{
            font-size: 15px;
        }
        .main-slider-shocase-box.main-sliderfixedd{display:block !important;}
    </style>
    <audio id="chaching">
        <source src="<?php echo cdnUrl('img/cha-ching.mp3'); ?>" type="audio/mpeg">
    </audio>
    <script>
        var x = document.getElementById("chaching"); 
        function playAudiochaching() { 
            x.play(); 
        } 
    </script>
    <div class="last-times youhave30s" style="display:none;">You have <span id="myAcount"></span> seconds to respond below</div>
    <script>
        var MyfirstTimer;
        var MysecondTimer;
        var MythirdTimer;
        var timeres;

        $(document).ready(function(){
            MyfirstTimer = setTimeout(function(){
                clearInterval(timeres);
                return false;
            }, 4000);
        });
        $('.main-logo').click(function(){
            clearInterval(timeres);
            return false;
        });

        MysecondTimer = setTimeout(function(){
            var sec = 30;
            $('.hidefourbtn').css('display','none'); 
            timeres = setInterval(function() { 
                $('#myAcount').text(sec--);
                if (sec == -1) {
                    clearTimeout(MyfirstTimer);
                    clearTimeout(MysecondTimer);
                    $('.main-slider-shocase-box').css('display','none');
                    $('.myunick').remove();
                    $('.youhave30s').html('');     
                    clearInterval(timeres);
                    startAddRotation(); 
                    return false;
                } 
            }, 1000);
        }, 14000);
    </script> 
</div>
<script>
    $("a#history").click(function()
    {
        var uuser_id = "<?php echo $user_id ; ?>";
        //  alert(uuser_id);
        $.ajax({
            url: '<?php echo $rootUrl; ?>/category_filter/history.php',
            //url: 'http://amplepoints.local/category_filter/history.php',
            data: {checkuser_id: uuser_id},
            type: 'POST'
        }).done(function(data){
            // alert(data);
            //$('.amples-valuess-box').css('display' , 'block')                
            $('.slideshow-histroybox').html(data);

            //$('.slideshow-histroybox-main').css('display','block');
            $('.slideshow-histroybox').css('display','block');

        })
    });
</script>
<?php //if(!empty($reward_minutesnew)){
    //$igd = $this->record['data'][0]['user_id'];

    $resrfff = mysqli_query($con,"SELECT  * FROM `users` where user_id = '$user_id'");
    $rowyrff = mysqli_fetch_array($resrfff);
    $rtm = $rowyrff['reward_time'];
    $ptm = $rtm * 60;
    $lth = $amples_fetch['length_video'];
    if($ptm > $lth){    ?>
    <script>

        var isAmpleEarned = false;

        $('.four-btns li').one( "click", function(){

            var adver_type = "<?php echo $amples_fetch['adver_type']?>";
            var length_video = "<?=$amples_fetch['length_video'];?>";
            var slength_video = "0:<?php echo $amples_fetch['length_video']; ?>";
            var adver_id = "<?php echo $q; ?>";
            var user_id = "<?php echo $user_id ; ?>";
            var amples ='0.15';
            var samples ='0:15';
            var respondtext = $(this).attr("id");
            var myproductid = $(this).find(".hiddenproductId").val();
            //alert(adver_type);
            //alert(adver_id);
            //alert(user_id);

            if(!isAmpleEarned){

                clearTimeout(MyfirstTimer);
                //clearTimeout(MysecondTimer);
                clearInterval(timeres);

                $('#history').css('pointer-events','all');

                $.ajax({
                    url: '<?php echo $rootUrl; ?>/category_filter/history.php',
                    //url: 'http://amplepoints.local/category_filter/history.php',
                    data: {adver_id_history: adver_id,user_history_id: user_id,respond:respondtext},
                    type: 'POST'
                }).done(function(data){
                    console.log("User History Added");
                });

                if(adver_type=='static'){

                    $.ajax({
                        url: '<?php echo $rootUrl; ?>/category_filter/analytics.php',
                        //url: 'http://amplepoints.local/category_filter/analytics.php',
                        data: {adverid: adver_id,userid: user_id,respond:respondtext,productid:myproductid,addtime:15,addtype:'static'},
                        type: 'POST'
                    })

                    $.ajax({
                        url: '<?php echo $rootUrl; ?>/category_filter/adddata.php',
                        //url: 'http://amplepoints.local/category_filter/adddata.php',
                        data: {adver_id: adver_id,amples: amples,user_id: user_id},
                        type: 'POST',
                        dataType: "json"
                    })
                    .done(function(data){
                        // alert(data);
                        $('.youhave30s').css('display','none'); 
                        $('.amples-valuess-box').css('display' , 'block');
                        playAudiochaching();

                        $('.main-slider-shocase-box').addClass('main-sliderfixedd');            
                        $('.amples-valuess').html(samples); 

                        if(data){

                            if(data['ReplaceAmple'] != ''){

                                $('.Replace_Amples').text(data['ReplaceAmple']);
                                $('.celebration').css('display' , 'block');
                                //$('#amplcount').text(data['ReplaceAmple']);
                                //$('#amplcountmob').text(data['ReplaceAmple']);
                            }

                            if(data['ReplaceReward'] != ''){

                                $('.extra-des').text(data['ReplaceReward']);
                                //$('.extra-des').html(data['ReplaceReward'] + "<span>Reward Time</span>");
                                //$('.rewardmob').html(data['ReplaceReward'] + "<span>Reward Time</span>");
                            }

                        }

                    })
                }
                else{
                    //alert("video");
                    // alert(length_video);

                    $.ajax({
                        url: '<?php echo $rootUrl; ?>/category_filter/analytics.php',
                        //url: 'http://amplepoints.local/category_filter/analytics.php',
                        data: {adverid: adver_id,userid: user_id,respond:respondtext,productid:myproductid,addtime:length_video,addtype:'video'},
                        type: 'POST'
                    })

                    $.ajax({
                        url: '<?php echo $rootUrl; ?>/category_filter/adddata.php',
                        //url: 'http://amplepoints.local/category_filter/adddata.php',
                        data: {adver_id: adver_id,length_video: length_video,user_id: user_id},
                        type: 'POST',
                        dataType: "json"
                    })
                    .done(function(data){
                        //alert(data);
                        $('.youhave30s').css('display','none'); 
                        $('.amples-valuess-box').css('display' , 'block');      
                        playAudiochaching();
                        $('.main-slider-shocase-box').addClass('main-sliderfixedd');
                        $('.amples-valuess').html(slength_video);

                        if(data){

                            if(data['ReplaceAmple'] != ''){

                                $('.Replace_Amples').text(data['ReplaceAmple']);
                                $('.celebration').css('display' , 'block');
                                //$('#amplcount').text(data['ReplaceAmple']);
                                //$('#amplcountmob').text(data['ReplaceAmple']);
                            }

                            if(data['ReplaceReward'] != ''){

                                $('.extra-des').text(data['ReplaceReward']);
                                //$('.extra-des').html(data['ReplaceReward'] + "<span>Reward Time</span>");
                                //$('.rewardmob').html(data['ReplaceReward'] + "<span>Reward Time</span>");
                            }
                            
                            $('.amples_feedback').css('display' , 'block');

                        }

                    })    
                }

                isAmpleEarned = true; 
            }

        });
    </script>
    <?php } else{ ?>
    <script>
        $('.four-btns li').one( "click", function(){

            clearTimeout(MyfirstTimer);
            clearTimeout(MysecondTimer);
            $('.last-times').remove();
            var mesage="Thank you for watching ad please increase reward time to earn ample.";
            alert(mesage);

        });
    </script>
    <?php } ?>
<script>
    $(document).ready(function(){

        $('.slideshow-histroybox-main').click(function(){
            $('.slideshow-histroybox-main').css('display','none');
            //$('.slideshow-histroybox').css('display','none');

        });


    });
</script> 
<script>
    $('.amples-valuess-box strong').click(function () {
        $('.celebration').css('display' , 'none');
        $('.amples-valuess-box').remove();
    });
</script> 
<script>

    function add_feedback(){

        var adver_id = "<?php echo $q; ?>";
        var user_id = "<?php echo $user_id ; ?>";

        var feedback_val = $("input[name='radio_feedback']:checked").val();

        if(feedback_val){

            $.ajax({
                url: '<?php echo $rootUrl; ?>/category_filter/add_adver_feedback.php',
                data: {adver_id: adver_id,user_id: user_id,feedback:feedback_val},
                type: 'POST',
            })
            .done(function(data){

                if(data){

                    $('.amples_feedback').css('display' , 'none');

                }
            });    

        }else{
            
            $(".feedback_err").text("please Select Any One Feedback!");

        }


    }
</script>
