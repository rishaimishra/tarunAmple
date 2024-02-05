<?php /* Please Do Not Change Any Code In this File If you want To change Please contact Mr.Tony*/ ?>
<?php
    $rootUrl = (!empty($_SERVER['HTTPS']) ? 'https' : 'http') . '://' . $_SERVER['HTTP_HOST'];
     // $rootUrl="http://localhost:8080/tarunAmple";

    $protocol = isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? 'https' : 'http';
    $host = $_SERVER['HTTP_HOST'];
    $script_path = $_SERVER['SCRIPT_NAME'];

    // Extract the directory part from the script path
    $project_path = dirname($script_path);
    $base_url_full = $protocol . '://' . $host . $project_path;
    // Remove "/category_filter"
    $base_url = str_replace("/category_filter", "", $base_url_full);

    // echo $base_url;
    // die();


    require("db_config.php");
?>
<style>
    /*********** custom style ********/
    .pause.clocse-my-video { font-size: 16px;height: 23px;width: 23px;}
    .contact_me_btn{font-size: 12px !important;padding: 3px 0 0 3px !important;}
    .byur{ float: left; display: inline-block; width: 50%; }
    .byur2 { float: left; display: inline-block; width: 47%;     width: 47%;
    text-align: right !important;}
    .byur2 strong , .byur2 span{ text-align: right !important;}
    .byur2 strong{    position: relative;
    top: 1px;}
    .byur3 { float: left; display: inline-block; width: 100%; margin-top: 7px; }
    .padto { padding-top: 0px; }
    .byur3 span { line-height: 0px; }
    .byur3 strong { margin-bottom: 5px; }
    .pricess { width: 100%; display: inline-block; }
    .right-image-slider strong { text-align: left; font-size: 8px !important; letter-spacing: 0.5px; width: 101%; text-transform: uppercase; margin-bottom: 5px; color: #000 !important; }
    .right-image-slider span { float: left; text-align: left; width: 100%; }
    .newr span { color: #ff4201; font-family: sans-serif; font-weight: 200; letter-spacing: 0px; }
    .newr strong { float: right;   text-align: right;  width: 85px;
    padding-top: 15px; }
    .newr { font-size: 11px; color: #ff4201; font-family: sans-serif; font-weight: 200; letter-spacing: 0px; position: relative; top: -20px;float: right;right: 7px;text-align: right;font-weight: bold;width: 47%;}
    .right-image-slider-first > span { width: auto !important; display: block; }

    /*.product_with{ width: 150px;text-align: left;overflow: hidden;display: -webkit-box;-webkit-line-clamp: 2;-webkit-box-orient: vertical;margin-bottom: 3px;} */
    .product_with{ width: 150px;text-align: left;overflow: hidden;margin-bottom: 3px;height: 25px;/*max-height: 30px;*/}
    .carousel-caption { padding: 4px 0 0 10px; }
    .right-image-slider-first { color: #000; width: 173px; font-family: sans-serif; font-weight: 200; font-size: 12px; letter-spacing: 0px; }
    .right-image-slider-first.contact_first { padding-bottom: 8px;}
    .right-image-slider-second span, .right-image-slider-third span { line-height: 14px; font-size: 17.5px ; color: #ff4201; font-family: 'Bebas'; font-weight: 200; padding-top: 4px; }
    .right-image-slider span.pricess { float: left; font-size: 19px; margin: 0px 0 0; display: inline-block; }
    .right-image-slider-second b { font-size: 10px; color: #ff4201; font-family: sans-serif; font-weight: 200; letter-spacing: 0px; }
    .right-image-slider-first { font-weight: bold; margin-bottom: 6px; padding-bottom: 20px; }
    b.bnh { font-weight: 200; color: #000;  padding-right: 3px; }

    @media only screen and (max-width: 1024px) and (min-width: 768px){
    .right-image-slider span {
    /*  font-size: 17.5px;*/
    }

    }
    @media screen and (max-width: 767px) {
    .sliders-leftsection { width: 50% !important; float: left !important; }
    .carousel-caption { width: 50% !important; float: right !important; }
    .carousel-caption {
    padding: 4px 0 0 4px;
    }
    .sliders-leftsection { width: 50% !important; float: left !important; }
    .carousel-caption { width: 50% !important; float: right !important; }
    }

    @media screen and (max-width: 367px) {
    .byur{ width: 54%; }
    .byur2{ width: 46%;     padding-right: 3px;}
    .byur3 {
    margin-top: 9px;
    }
    .newr strong {
    padding-top: 3px;
    }
    }
    @media screen and (max-width: 500px) {
    .byur2 strong {
    position: relative;
    top: -1px;
    }
    }
    .amples-valuess-box { position: absolute; top: 0; bottom: 0; left: 0; display: none; right: 0;  background: url(<?php echo cdnUrl('img/winample.gif');?>);z-index: 999999999999; }
    .amples-valuess-box > span { position: absolute; top: -22px; left: 88px; color: #ffffff; font-size: 28px; right: 0; height: 200px; font-weight: bold; width: 200px; text-align: center; bottom: 0; padding: 23% 0 0 0; }
    .amples-valuess-box strong { background: #c84500 none repeat scroll 0 0; border-radius: 10em; color: #fff; cursor: pointer; font-size: 16px; font-weight: bold; height: 23px; left: 335px; margin: 2px 0 0 7px; padding: 1px 0 0; position: absolute; right: 5px; text-align: center; width: 23px; }
    .amples-valuess-box br { display: none; height: 3px; }
    .amples-valuess-box-2 { position: absolute; top: 0; bottom: 0; left: 0; display: none; right: 0; background: rgba(255,255,255,0.8); z-index: 999999999999; }
    .amples-valuess-box-2 > span { /*
    background: url(https://www.amplifyon.com/img/img-amples-win.gif);
    */
    position: absolute; top: 15px; left: 100px; color: #f75d00; right: 0; height: 200px; width: 200px; text-align: center; bottom: 0; padding: 5% 0 0 0; }
    span.amples-valuess-2 { color: #f75d00; font-size: 25px; display: block; font-weight: bold; }
    .amples-valuess-box-2 strong { background: #c84500 none repeat scroll 0 0; border-radius: 10em; color: #fff; cursor: pointer; font-size: 12px; font-weight: bold; height: 20px; left: 346px; margin: 2px 0 0 7px; padding: 2px 0 0; position: absolute; right: 5px; text-align: center; width: 20px; }
    .amples-valuess-box-2 br { display: none; height: 3px; }
    .top-slider .main-wpappers .images-popsme { border: 3px solid #000; }
    .clocktimerspan { background: transparent none repeat scroll 0 0; border: 0 none; color: #fff; font-weight: bold; width: 30px; min-width: 30px; }
    .last-times { width: 30px; }
    .amples_feedback { position: absolute; top: 0; bottom: 0; left: 0; display: none; right: 0;  background: #f75d00;z-index: 999999999999;padding: 15px 0 0px 25px;color:#ffffff; }
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
<?php

    //session_start();

    $q = intval($_GET['adverid']);
    $userid = $_GET['userid'];

    $checkrewardtime = "select * from tbl_order WHERE user_id = '".$userid."' AND order_status ='Completed'";
    $checkrewardtimedata = mysqli_query($con,$checkrewardtime);
    //$checkrewardtimefetch = mysqli_fetch_array($checkrewardtimedata);
    if(!empty($checkrewardtimedata)){
        $totalspentnew= 0;
        $reward_timenew=0;
        $reward_minutesnew=0;
        while($checkrewardtimefetch = mysqli_fetch_array($checkrewardtimedata)){

            $totalspentnew += $checkrewardtimefetch['total_price'];

        }
        if(!empty($totalspentnew)){
            if($totalspentnew <= 500 ){

                //echo "Ample silver";

                $totalspentnew;
                //echo "</br>";
                $reward_timenew= $totalspentnew*5/100;
                //echo "</br>";

                $reward_minutesnew= $reward_timenew*100/12;

            }else if($totalspentnew <= 1000){

                    //    echo "Ample Gold";
                    $reward_timenew= $totalspentnew*7/100;
                    $reward_minutesnew= $reward_timenew*100/12;


                }else if($totalspentnew >= 1000){

                        //echo "Ample Platinum";
                        $reward_timenew= $totalspentnew*10/100;
                        $reward_minutesnew= $reward_timenew*100/12;
                    }
        }

    }

?>
<link rel="stylesheet" type="text/css" href="<?php echo cdnUrl('slider/demoStyleSheet.css');?>" />
<link rel="stylesheet" type="text/css" href="<?php echo cdnUrl('newcss/css/bebas.css'); ?>"/>
<!-- <script type="text/javascript" src="<?php echo $base_url; ?>/slider/fadeSlideShow.js"></script> -->
 <script type="text/javascript" src="<?php echo $base_url; ?>/slider/fadeSlideShow.js"></script>
 
<script type="text/javascript">
    jQuery(document).ready(function(){

        //jQuery('#slideshow').fadeSlideShow();

        jQuery('#slideshow').fadeSlideShow({speed: 'slow',interval: 3000,autoplay: true});

    });
</script>
<script>

    var c = 30;
    var t;
    var newtimeout;
    var timer_is_on = 0;

    function timedCount() {
        //document.getElementById("txt").value = c;
        $('.clocktimerspan').text(c);
        c = c - 1;
        t = setTimeout(function(){ timedCount() }, 1000);
        //alert(t);
        if (c == -2) {

            clearTimeout(newtimeout);
            clearTimeout(t);
            $('#adverpro').html('');
            $('#adverpro').css('display','none');
            $('#member').html('');
            $('#member').css('display','none');
            $('#guddies').html('');
            $('#guddies').css('display','none');
            $('.main-wpappers').css('display','block');
            startAddRotation();
            console.log('Time Clear');

        }
    }

    $(".four-btns").delay(15000).fadeIn();
    $(".four-btns-2").delay(15000).fadeIn();
    $(".staticamp").delay(15000).fadeOut();
    myFunctionn();
    function myFunctionn() {
        newtimeout = setTimeout(function(){
            stopAutoplay();
            timedCount();
        }, 15000);
    }

</script>

<div id="container" class="cf">
    <input value="X" type="button" class="pause clocse-my-video" />
    <script>
        $(document).ready(function () {
            //alert('hier');
            $('.clocse-my-video').click(function(){
                clearTimeout(newtimeout);
                clearTimeout(t);
                $('#adverpro').html('');
                $('#adverpro').css('display','none');
                $('#member').html('');
                $('#member').css('display','none');
                $('#guddies').html('');
                $('#guddies').css('display','none');
                $('.main-wpappers').css('display','block');
                startAddRotation();
                console.log('done here');
            });
        });

    </script>
    <div id="slideshowWrapper">
        <?php $adver_pro="SELECT * FROM adver_pro WHERE adver_id = '".$q."' GROUP BY adver_product ORDER BY adver_pro_id DESC limit 5";
            //echo "SELECT * FROM adver_pro WHERE adver_id = '".$q."' GROUP BY adver_product ORDER BY adver_pro_id DESC limit 5";
            $data_pro = mysqli_query($con,$adver_pro);
            $count = mysqli_num_rows($data_pro);
            // $data_fetch = mysqli_fetch_array($data_pro);
            // print_r($data_fetch);
            // die();
        ?>
        <ul id="slideshow">
            <?php

                $i =1;
                while($data_fetch = mysqli_fetch_array($data_pro)){

                    // $pro_immages="SELECT * FROM products INNER JOIN  product_images ON products.id = product_images.product_id WHERE product_images.product_id = '".$data_fetch['adver_product']."'";


                    $pro_immages="SELECT * FROM products INNER JOIN  product_images ON products.id = product_images.product_id WHERE product_images.product_id = 58098";

                    $data_images = mysqli_query($con,$pro_immages);
                    @$images_fetch = mysqli_fetch_array($data_images);
                    // print_r($data_fetch['adver_product']);
                    //    die();

                    $amples = "SELECT * FROM tbl_advertises WHERE adver_id = '".$data_fetch['adver_id']."'";
                    $amples_data = mysqli_query($con,$amples);
                    $amples_fetch = mysqli_fetch_array($amples_data);
                       // print_r(@$images_fetch);
                       // die();

                    $ProductId = $data_fetch['adver_product'];

                    $countQuery = "SELECT count(*) as 'total_purchased' FROM `products_added` WHERE `product_id` = $ProductId AND `product_order_status` != 'Cancelled' AND is_purchased = 1";

                    $CountQeyVar = mysqli_query($con,$countQuery);

                    $countQueryRow = mysqli_fetch_array($CountQeyVar);

                    //$OfferAvailable =  @$images_fetch['quantity'] - $countQueryRow['total_purchased'];

                    $OfferAvailable =  @$images_fetch['quantity'];

                ?>
                <li>
                    <div class="sliders-leftsection"><img src="<?php echo cdnUrl('product_images/'.$data_fetch['adver_product'].'/'.@$images_fetch['image_name']); ?>" width="640" height="480" border="0" alt="" /></div>
                    <div class="carousel-caption">
                        <div class="right-image-slider">
                            <?php if(@$images_fetch['product_type_key']=='0'){ ?>
                                <div class="right-image-slider-first">
                                    <p class="product_with"> <?=ucfirst(@$images_fetch['product_name']);?></p>
                                    <div class="clear"></div>
                                    <?php if(@$images_fetch['product_discount'] >= 50){ ?>
                                        <span>FREE <b class="bnh">with</b> </span> <span><?php echo @$images_fetch['free_with_amples']; ?> <b class="bnh">Amples</b></span>
                                        <?php } ?>
                                </div>
                                <div class="right-image-slider-second byur">
                                    <strong>Buy & Earn</strong>
                                    <span>
                                        <?=@$images_fetch['no_of_amples'];?>
                                        <br>
                                        <b>Amples</b>
                                        <strong class="padto">Offers Available</strong>
                                        <div class="ofer">
                                            <?=$OfferAvailable;?>
                                        </div>
                                        <br>
                                        <span class="pricess"> $
                                            <?=(int) @$images_fetch['single_price'];?>
                                            <div class="clear"></div>
                                        </span>
                                    </span>
                                    <div class="clear"></div>
                                </div>
                                <?php }else{ ?>
                                <!-- This Code is use For Contact Me -->
                                <div class="right-image-slider-first contact_first">
                                    <p class="product_with"> <?=ucfirst(@$images_fetch['product_name']);?></p>
                                    <div class="clear"></div>
                                </div>
                                <div class="right-image-slider-second byur">
                                    <strong>Buy & Earn</strong> <span>
                                        <?=@$images_fetch['no_of_amples'];?>
                                        <br>
                                        <b>Amples</b>
                                        <strong class="padto">Offers Available</strong>
                                        <div class="ofer">
                                            <?=$OfferAvailable;?>
                                        </div>
                                        <br>
                                        <span class="pricess"> $
                                            <?=(int) @$images_fetch['single_price'];?>
                                            <div class="clear"></div>
                                        </span>
                                    </span>
                                    <div class="clear"></div>
                                </div>
                                <?php }  ?>
                            <div class="right-image-slider-third byur2">
                                <strong>Reward value</strong><span style="padding-left:9px;">$<?php echo @$images_fetch['discount_price'];?></span>
                                <div class="clear"></div>
                                <br>
                                <div class="right-image-slider-second byur3"> <strong>You Earn</strong><span style="padding-left: 9px;"><?php echo (int) @$images_fetch['product_discount'];?>%</span>
                                    <div class="clear"></div>
                                    <br>
                                </div>
                            </div>
                            <div class="newr"> <strong>By</strong><br>
                                <?=@$images_fetch['supplier_name'];?>
                                <div class="clear"></div>
                            </div>
                        </div>
                    </div>
                    <ul class="four-btns" style="display:none;">
                        <li id="Buynow">
                            <?php if(@$images_fetch['product_type_key']=='0'){ ?>
                                <a  id="buynowa" target = "_blank" href="<?php echo $base_url; ?>/productdetail/<?=$data_fetch['adver_product'];?>">Buy Now</a>
                                <?php }else{ ?>
                                <a title="Add to Cart" class="contact_me_btn" id="buynowa" target = "_blank" href="<?php echo $base_url; ?>/productdetail/<?=$data_fetch['adver_product'];?>">Contact Me</a>
                                <?php }  ?>
                            <input type="hidden" class="hiddenproductId" name="hiddenproduct" value="<?php echo $ProductId ; ?>">
                        </li>
                        <li id="Info"> <a  id="infoa" target = "_blank" href="<?php echo $base_url; ?>/productdetail/<?=$data_fetch['adver_product'];?>">Info</a>
                            <input type="hidden" class="hiddenproductId" name="hiddenproduct" value="<?php echo $ProductId ; ?>">
                        </li>
                        <li id="Wishlist"><a id="addwisha" title="Add to my wishlist" href="javascript:void(0);" onclick="wishlist_cart('<?php echo @$images_fetch['product_name']; ?>','<?php echo $data_fetch['adver_product']; ?>','1','<?php echo strip_tags(@$images_fetch['single_price']); ?>','<?php echo $userid ; ?>','add');">Wishlist</a>
                            <input type="hidden" class="hiddenproductId" name="hiddenproduct" value="<?php echo $ProductId ; ?>">
                        </li>
                        <li id="Viewed"><a href="#" class="view" id="viewa">Viewed</a>
                            <input type="hidden" name="hiddenvaldver" value="<?=$amples_fetch['adver_type']?>">
                            <input type="hidden" name="hiddenvalamp" value="<?=$amples_fetch['length_video'];?>">
                            <input type="hidden" name="hiddenvaladver" value="<?= $data_fetch['adver_id']; ?>">
                            <input type="hidden" name="hiddenvaluser" value="<?php echo $userid ; ?>">
                            <input type="hidden" class="hiddenproductId" name="hiddenproduct" value="<?php echo $ProductId ; ?>">
                        </li>
                    </ul>
                    <div class="staticamp">
                        <?php $datast = "select * from tbl_advertises WHERE adver_id = '".$q."'";
                            $datassss = mysqli_query($con,$datast);
                            $data1s = mysqli_fetch_array($datassss); ?>
                        <?php $sqls="SELECT * FROM tbl_advertises WHERE adver_id = '".$q."'";
                            $results = mysqli_query($con,$sqls);

                            while($rows = mysqli_fetch_array($results)) {
                                if(empty($rows['length_video'])){ ?>
                                <div class="last-times-msg">You Are Earinig <span class="amplis-no">0:15 </span> <span class="amils-clr">Amples</span></div>
                                <?php }
                            ?>
                            <?php } ?>
                    </div>
                    <div class="four-btns-2" style="display:none;">
                        <!--<div class="last-times"><input type="text" id="txt"></div>-->
                        <div class="last-times"><span class="clocktimerspan"></span></div>
                        <?php $data = "select * from tbl_advertises WHERE adver_id = '".$q."'";
                            $datas = mysqli_query($con,$data);
                            $data1 = mysqli_fetch_array($datas); ?>
                        <?php $sql="SELECT * FROM tbl_advertises WHERE adver_id = '".$q."'";
                            $result = mysqli_query($con,$sql);

                            while($row = mysqli_fetch_array($result)) {
                            ?>
                            <div class="last-times-msg">Respond Above to get <span class="amplis-no">0:
                                    <?php if(empty($row['length_video'])){ echo "15";}else{ echo $row['length_video'];}?>
                                </span> <span class="amils-clr">Amples</span></div>
                            <?php } ?>
                    </div>
                </li>
                <?php } ?>
            <!-- This is the last image in the slideshow -->
            <!-- <li><img src="https://www.amplifyon.com/assets/images/3.jpg" width="640" height="480" border="0" alt="" /></li>
            <li><img src="https://www.amplifyon.com/assets/images/2.jpg" width="640" height="480" border="0" alt="" /></li>
            <li><img src="https://www.amplifyon.com/assets/images/1.jpg" width="640" height="480" border="0" alt="" /></li> --><!-- This is the first image in the slideshow -->
        </ul>
        <br clear="all" />
        <div class="amples-valuess-box" onclick="cogevup()"> <strong>X </strong>
            <!--<span>
            You have earned <span class="amples-valuess"></span><br/>Amples
            </span>-->
        <span class="amples-valuess"></span> </div>
        <script>
            function cogevup() {
                $('.celebration').css('display' , 'none');
                $('.amples-valuess-box').remove();
            }
        </script>
        <div class="amples-valuess-box-2"> <strong>X </strong> <span> <span class="amples-valuess-2"></span><br/>
            </span>
        </div>
        <div class="amples_feedback">
            <label style="margin-bottom: 5px;font-size: 17px;">Please Share Your Feedback With Us!</label>
            <label style="margin-bottom: 17px;font-size: 17px;">How Did You Like This Ad ?</label>
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
            <button class="btn btn-success" id="submit_feedback" onclick="add_feedback();" style="width: 75px;border: 1px dotted #000;">Submit</button>
            <div class="clearfix"></div>
            <label style="color: yellow;font-size: 12px;margin-top: 5px;" class="feedback_err"></label>
        </div>
    </div>
</div>
<audio id="chaching">
    <source src="<?php echo cdnUrl('img/cha-ching.mp3'); ?>" type="audio/mpeg">
</audio>
<script>
    var x = document.getElementById("chaching");
    function playAudiochaching() {
        x.play();
    }
</script>
<?php //if(!empty($reward_minutesnew)){

    $resrfff = mysqli_query($con,"SELECT  * FROM `users` where user_id = '$userid'");
    $rowyrff = mysqli_fetch_array($resrfff);
    $rtm = $rowyrff['reward_time'];
    $ptm = $rtm * 60;
    $lth = $amples_fetch['length_video'];
    if($ptm > $lth){    ?>
    <script>

        var isAmpleEarned = false;

        $('.four-btns li').one( "click", function(){

            clearTimeout(t);

            $('.last-times').remove();

            $('.last-times-msg').remove();

            var adver_type = "<?php echo $amples_fetch['adver_type']?>";
            var length_video = "<?=$amples_fetch['length_video'];?>";
            var slength_video = "0:<?=$amples_fetch['length_video'];?>";
            var adver_id = "<?php echo $q; ?>";
            var user_id = "<?php echo $userid ; ?>";
            var respondtext = $(this).attr("id");
            var myproductid = $(this).find(".hiddenproductId").val();
            var C_name = "history";

            var amples ='0.15';
            var samples ='0:15';

            if(!isAmpleEarned){

                $.ajax({
                    //url: 'http://amplepoints.com/public/category_filter/history.php',
                    url: '<?php echo $base_url; ?>/category_filter/history.php',
                    data: {adver_id_history: adver_id,user_history_id: user_id,respond:respondtext},
                    type: 'POST'
                }).done(function(data){
                    console.log("User History Added");
                });

                if(adver_type=='static'){

                    $.ajax({
                        url: '<?php echo $base_url; ?>/category_filter/analytics.php',
                        data: {adverid: adver_id,userid: user_id,respond:respondtext,productid:myproductid,addtime:15,addtype:'static'},
                        type: 'POST'
                    })

                    $.ajax({
                        url: '<?php echo $base_url; ?>/category_filter/adddata.php',
                        data: {adver_id: adver_id,amples: amples,user_id: user_id},
                        type: 'POST',
                        dataType: "json"
                    })
                    .done(function(data){
                        $('.amples-valuess-box').css('display' , 'block')
                        playAudiochaching();
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
                }else{

                    $.ajax({
                        url: '<?php echo $base_url; ?>/category_filter/analytics.php',
                        data: {adverid: adver_id,userid: user_id,respond:respondtext,productid:myproductid,addtime:length_video,addtype:'video'},
                        type: 'POST'
                    })

                    $.ajax({
                        url: '<?php echo $base_url; ?>/category_filter/adddata.php',
                        data: {adver_id: adver_id,length_video: length_video,user_id: user_id},
                        type: 'POST',
                        dataType: "json"
                    })
                    .done(function(data){

                        $('.amples-valuess-box').css('display' , 'block');
                        playAudiochaching();
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
    <?php }else{  ?>
    <script>
        $('.four-btns li').one( "click", function(){
            clearTimeout(t);
            $('.last-times').remove();

            var adver_type = "<?php echo $amples_fetch['adver_type']?>";
            var length_video = "<?=$amples_fetch['length_video'];?>";
            var slength_video = "0:<?=$amples_fetch['length_video'];?>";
            var adver_id = "<?php echo $q; ?>";
            var user_id = "<?php echo $userid ; ?>";

            var C_name = "history";

            var amples ='0.15';
            var samples ='0:15';

            $('.amples-valuess-box-2').css('display' , 'block')
            var mesage="Thank you for watching add please increase reward time to earn amples.";
            $('.amples-valuess-2').html(mesage);


        });
    </script>
    <?php } ?>
<script>
    $('.amples-valuess-box').click(function () {
        $('.celebration').css('display' , 'none');
        $(this).remove();
    });
    $('.amples-valuess-box-2').click(function () {
        $('.celebration').css('display' , 'none');
        $(this).remove();
    });

</script>

<script>

    function add_feedback(){

        var adver_id = "<?php echo $q; ?>";
        var user_id = "<?php echo $userid ; ?>";

        var feedback_val = $("input[name='radio_feedback']:checked").val();

        if(feedback_val){

            $.ajax({
                url: '<?php echo $base_url; ?>/category_filter/add_adver_feedback.php',
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
