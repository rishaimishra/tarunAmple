<?php /* Please Do Not Change Any Code In this File If you want To change Please contact Mr.Tony*/ ?>
<?php $rootUrl = (!empty($_SERVER['HTTPS']) ? 'https' : 'http') . '://' . $_SERVER['HTTP_HOST']; ?>
<style>

    /*before change amplewin image*/
    /*
    .amples-valuess-box {
    position: absolute;
    top: 0;
    bottom: 0;
    left: 0;display:none;
    right: 0;
    background: rgba(255,255,255,0.8);
    z-index: 999999999999;
    } 

    .amples-valuess-box > span {
    background: url(<?php echo $rootUrl; ?>/img/img-amples-win.gif);
    position: absolute;
    top: 23px;
    left: 100px;
    color: #f75d00;
    right: 0;
    height: 200px;
    width: 200px;
    text-align: center;
    bottom: 0;    padding: 14% 0 0 0;
    }  
    span.amples-valuess{
    color: #f75d00;
    font-size: 28px;
    display: block;
    font-weight: bold;
    } 
    */
    .amples-valuess-box {
        position: absolute;
        top: 0;
        bottom: 0;
        left: 0;display:none;
        right: 0;
        background: url(<?php echo $rootUrl; ?>/img/winample.gif);
        z-index: 999999999999;
    }

    .amples-valuess-box > span {
        position: absolute;
        top: -22px;
        left: 88px;
        color: #ffffff;
        font-size: 28px;
        right: 0;
        height: 200px;
        font-weight: bold;
        width: 200px;
        text-align: center;
        bottom: 0;    
        padding: 23% 0 0 0;
    }

    .amples-valuess-box strong {
        background: #c84500 none repeat scroll 0 0;
        border-radius: 10em;
        color: #fff;
        cursor: pointer;
        font-size: 12px;
        font-weight: bold;
        height: 20px;
        left: 335px;
        margin: 2px 0 0 7px;
        padding: 2px 0 0;
        position: absolute;
        right: 5px;
        text-align: center;
        width: 20px;
    }
    .amples-valuess-box br {
        display: none;
        height: 3px;
    }

    .amples-valuess-box-2 {
        position: absolute;
        top: 0;
        bottom: 0;
        left: 0;
        display:none;
        right: 0;
        background: rgba(255,255,255,0.8);
        z-index: 999999999999;
    }
    .amples-valuess-box-2 > span {
        /*
        background: url(https://www.amplifyon.com/img/img-amples-win.gif);
        */
        position: absolute;
        top: 15px;
        left: 100px;
        color: #f75d00;
        right: 0;
        height: 200px;
        width: 200px;
        text-align: center;
        bottom: 0;    padding: 5% 0 0 0;
    }
    span.amples-valuess-2{
        color: #f75d00;
        font-size: 25px;
        display: block;
        font-weight: bold;
    }
    .amples-valuess-box-2 strong {
        background: #c84500 none repeat scroll 0 0;
        border-radius: 10em;
        color: #fff;
        cursor: pointer;
        font-size: 12px;
        font-weight: bold;
        height: 20px;
        left: 346px;
        margin: 2px 0 0 7px;
        padding: 2px 0 0;
        position: absolute;
        right: 5px;
        text-align: center;
        width: 20px;
    }
    .amples-valuess-box-2 br {
        display: none;
        height: 3px;
    }

    .top-slider .main-wpappers .images-popsme {
        border: 3px solid #000;
    }
    .clocktimerspan{
        background: transparent none repeat scroll 0 0;
        border: 0 none;
        color: #fff;
        font-weight: bold;
        width: 30px;
        min-width: 30px;
    }
    .last-times{
        width: 30px;
    }
</style>
<?php session_start();
    $q = intval($_GET['adverid']);
    $userid = $_GET['userid'];

    $con = mysqli_connect('localhost','db_ampllifyon','db_ampllifyon','db_ampllifyon');
    if (!$con) {
        die('Could not connect: ' . mysqli_error($con));
    }

    mysqli_select_db($con,"db_ampllifyon");

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


    /*$data = "select * from tbl_advertises WHERE adver_id = '".$q."'";
    $datas = mysqli_query($con,$data);
    $data1 = mysqli_fetch_array($datas);
    $advertype = $data1['adver_type'];
    if($advertype=='static'){
    $view = "select * FROM tbl_advertises WHERE adver_id = '".$q."'";
    $views = mysqli_query($con,$view);
    $view_fetch = mysqli_fetch_array($views);
    $vie_num = $view_fetch['view']+1;
    $update = "UPDATE tbl_advertises SET `view` = '".$vie_num."' WHERE adver_id = '".$q."'";
    $update_dat = mysqli_query($con,$update);

    }*/
    //print_r($_SESSION);
?>
<link rel="stylesheet" type="text/css" href="<?php echo $rootUrl; ?>/slider/demoStyleSheet.css" />
<script type="text/javascript" src="<?php echo $rootUrl; ?>/slider/fadeSlideShow.js"></script>
<script type="text/javascript">
    jQuery(document).ready(function(){
        //jQuery('#myslideshowdiv').fadeSlideShow();
        jQuery('#slideshow').fadeSlideShow();
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
            // print_r($count);
        ?>

        <ul id="slideshow">
            <?php 

                $i =1; 
                while($data_fetch = mysqli_fetch_array($data_pro)){

                    $pro_immages="SELECT * FROM products INNER JOIN  product_images ON products.id = product_images.product_id WHERE product_images.product_id = '".$data_fetch['adver_product']."'";
                    $data_images = mysqli_query($con,$pro_immages);
                    $images_fetch = mysqli_fetch_array($data_images);

                    $amples = "SELECT * FROM tbl_advertises WHERE adver_id = '".$data_fetch['adver_id']."'";
                    $amples_data = mysqli_query($con,$amples);
                    $amples_fetch = mysqli_fetch_array($amples_data);
                    //    print_r($images_fetch);

                    $ProductId = $data_fetch['adver_product'];

                    $countQuery = "SELECT count(*) as 'total_purchased' FROM `products_added` WHERE `product_id` = $ProductId AND `product_order_status` != 'Cancelled' AND is_purchased = 1";

                    $CountQeyVar = mysqli_query($con,$countQuery);

                    $countQueryRow = mysqli_fetch_array($CountQeyVar);

                    $OfferAvailable =  $images_fetch['quantity'] - $countQueryRow['total_purchased'];

                ?>
                <li>
                    <div class="sliders-leftsection"><img src="<?php echo $rootUrl; ?>/product_images/<?=$data_fetch['adver_product'];?>/<?=$images_fetch['image_name']?>" width="640" height="480" border="0" alt="" /></div>
                    <div class="carousel-caption">
                        <div class="right-image-slider">

                            <?php if($images_fetch['product_type_key']=='0'){ ?>
                                <div class="right-image-slider-first">
                                    <?=ucfirst($images_fetch['product_name']);?>
                                    <div class="clear"></div>
                                    <?php if($images_fetch['product_discount'] >= 50){ ?>
                                        <span>Free</span> with <span><?php echo $images_fetch['free_with_amples']; ?> Amples</span>
                                        <?php } ?>
                                </div>
                                <div class="right-image-slider-second">
                                    <span class="pricess"> $<?=$images_fetch['single_price'];?><div class="clear"></div>
                                    </span><br/><strong>Buy & Earn</strong> <span>&nbsp;<?=$images_fetch['no_of_amples'];?> Amples
                                    </span><div class="clear"></div>
                                </div>
                                <?php }else{ ?>
                                <div class="right-image-slider-first">
                                    <?=ucfirst($images_fetch['product_name']);?>
                                    <div class="clear"></div>
                                    <span>Buy</span> & Earn <span><?=$images_fetch['no_of_amples'];?> Amples</span></div>
                                <div class="right-image-slider-second">
                                    <span class="pricess"> $<?=$images_fetch['single_price'];?><div class="clear"></div>
                                    </span><div class="clear"></div>
                                </div>
                                <?php }  ?>
                            <div class="right-image-slider-third">
                                <strong>Reward value</strong><span>$<?php echo $images_fetch['discount_price'];?></span><div class="clear"></div>
                            </div>
                            <div class="right-image-slider-second">

                                <strong>You Earn</strong>&nbsp; <span><?php echo (int) $images_fetch['product_discount'];?>%</span><div class="clear"></div>
                                <strong>Offer Available</strong>:&nbsp; <span style="font-size: 20px;"><?=$OfferAvailable;?></span><div class="clear" style="margin-bottom: 8px;"></div>
                                <strong>Product By</strong>:&nbsp; <span><?=$images_fetch['supplier_name'];?></span><div class="clear"></div>
                            </div>
                        </div>

                    </div>
                    <ul class="four-btns" style="display:none;">
                        <li id="Buynow">

                            <?php if($images_fetch['product_type_key']=='0'){ ?>
                                <a  id="buynowa" target = "_blank" href="<?php echo $rootUrl; ?>/productdetail/<?=$data_fetch['adver_product'];?>">Buy Now</a>
                                <?php }else{ ?>
                                <a title="Add to Cart" id="buynowa" target = "_blank" href="<?php echo $rootUrl; ?>/productdetail/<?=$data_fetch['adver_product'];?>">Contact Me</a>

                                <?php }  ?>
                            <input type="hidden" class="hiddenproductId" name="hiddenproduct" value="<?php echo $ProductId ; ?>">
                        </li>
                        <li id="Info">
                            <a  id="infoa" target = "_blank" href="<?php echo $rootUrl; ?>/productdetail/<?=$data_fetch['adver_product'];?>">Info</a>
                            <input type="hidden" class="hiddenproductId" name="hiddenproduct" value="<?php echo $ProductId ; ?>">
                        </li>
                        <li id="Wishlist"><a id="addwisha" title="Add to my wishlist" href="javascript:void(0);" onclick="wishlist_cart('<?php echo $images_fetch['product_name']; ?>','<?php echo $data_fetch['adver_product']; ?>','1','<?php echo strip_tags($images_fetch['single_price']); ?>','<?php echo $userid ; ?>','add');">Wishlist</a>
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

                                <div class="last-times-msg">You Are Earinig <span class="amplis-no">0:15
                                    </span> <span class="amils-clr">Amples</span></div>
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
                                <?php if(empty($row['length_video'])){ echo "15";}else{ echo $row['length_video'];}?></span> <span class="amils-clr">Amples</span></div>
                            <?php } ?>
                    </div>

                </li>
                <?php } ?>
            <!-- This is the last image in the slideshow -->
            <!-- <li><img src="https://www.amplifyon.com/assets/images/3.jpg" width="640" height="480" border="0" alt="" /></li>
            <li><img src="https://www.amplifyon.com/assets/images/2.jpg" width="640" height="480" border="0" alt="" /></li>
            <li><img src="https://www.amplifyon.com/assets/images/1.jpg" width="640" height="480" border="0" alt="" /></li> --><!-- This is the first image in the slideshow -->
        </ul><br clear="all" />
        <div class="amples-valuess-box" onclick="cogevup()">
            <strong>X
            </strong>
            <!--<span>
            You have earned <span class="amples-valuess"></span><br/>Amples
            </span>-->
            <span class="amples-valuess"></span>
        </div>
        <script>
            function cogevup() {
                $('.amples-valuess-box').remove();
            }
        </script>
        <div class="amples-valuess-box-2">
            <strong>X
            </strong>
            <span>
                <span class="amples-valuess-2"></span><br/>
            </span>
        </div>
    </div>
</div>
<audio id="chaching">
    <source src="<?php echo $rootUrl; ?>/img/cha-ching.mp3" type="audio/mpeg">
</audio> 
<script>
    var x = document.getElementById("chaching"); 
    function playAudiochaching() { 
        x.play(); 
    } 
</script>
<script>
    $(document).ready(function()
    {
        /*
        $("a#buynowa").click(function()
        {

        var add_id = "<?php echo $q; ?>";
        var buttext ="buynow";
        //alert(add_id);
        //alert(buttext);
        $.ajax({

        url: '<?php echo $rootUrl; ?>/category_filter/useractivity.php',
        data: {add_id: add_id,buttext: buttext},
        type: 'POST'
        })
        .done(function(data){
        // alert(data);
        })

        });
        $("a#addwisha").click(function()
        {
        //alert("addwish");
        var add_id = "<?php echo $q; ?>";
        var buttext ="addwish";
        $.ajax({
        url: '<?php echo $rootUrl; ?>/category_filter/useractivity.php',
        data: {add_id: add_id,buttext: buttext},
        type: 'POST'
        })
        .done(function(data){
        //alert(data);
        })


        });
        $("a#infoa").click(function()
        {
        //alert("info");

        var add_id = "<?php echo $q; ?>";
        var buttext ="info";
        $.ajax({
        url: '<?php echo $rootUrl; ?>/category_filter/useractivity.php',
        data: {add_id: add_id,buttext: buttext},
        type: 'POST'
        })
        .done(function(data){
        // alert(data);
        })



        });
        $("a#viewa").click(function()
        {
        //alert("view");
        var add_id = "<?php echo $q; ?>";
        var buttext ="view";
        $.ajax({
        url: '<?php echo $rootUrl; ?>/category_filter/useractivity.php',
        data: {add_id: add_id,buttext: buttext},
        type: 'POST'
        })
        .done(function(data){
        // alert(data);
        })        
        });
        */
    });
</script>
<?php //if(!empty($reward_minutesnew)){
    $con=mysql_connect('localhost','db_ampllifyon','db_ampllifyon','db_ampllifyon'); 
    if (!$con)
    {
        die('could not connect'.mysql_error);
    }
    mysql_select_db('db_ampllifyon',$con);
    //$igd = $this->record['data'][0]['user_id'];

    $resrfff = mysql_query("SELECT  * FROM `users` where user_id = '$userid'");
    $rowyrff = mysql_fetch_array($resrfff);
    $rtm = $rowyrff['reward_time'];
    $ptm = $rtm * 60;
    $lth = $amples_fetch['length_video'];
    if($ptm > $lth){    ?>
    <script>

        var isAmpleEarned = false;

        $('.four-btns li').one( "click", function(){

            clearTimeout(t);

            $('.last-times').remove();

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
                    url: '<?php echo $rootUrl; ?>/category_filter/history.php',
                    data: {adver_id_history: adver_id,user_history_id: user_id,respond:respondtext},
                    type: 'POST'
                }).done(function(data){
                    console.log("User History Added");
                });

                if(adver_type=='static'){

                    $.ajax({
                        url: '<?php echo $rootUrl; ?>/category_filter/analytics.php',
                        data: {adverid: adver_id,userid: user_id,respond:respondtext,productid:myproductid,addtime:15,addtype:'static'},
                        type: 'POST'
                    })

                    $.ajax({
                        url: '<?php echo $rootUrl; ?>/category_filter/adddata.php',
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
                                //$('#amplcount').text(data['ReplaceAmple']);
                                //$('#amplcountmob').text(data['ReplaceAmple']);
                            }

                            if(data['ReplaceReward'] != ''){

                                $('.extra-des').text(data['ReplaceReward']);
                                //$('.extra-des').html(data['ReplaceReward'] + "<span>Reward Time</span>");
                                //$('.rewardmob').html(data['ReplaceReward'] + "<span>Reward Time</span>");
                            }

                        }

                        /*replace current ample from given url*/ 
                        //$('#amplcount').load(document.URL +  '#amplcount');
                        //$('.extra-des').load(document.URL +  '.extra-des');
                        /*
                        var newample = samples.replace(":", ".");
                        var getampl = $.trim(newample);
                        console.log('get ample =>'+getampl);
                        var currampel = $.trim($("#amplcount").text());
                        var parsevalue = parseFloat(currampel);
                        console.log('Current ample =>'+parsevalue);
                        var totalamplcount = parsevalue + parseFloat(getampl); 
                        */

                        //console.log(data);

                    })
                }else{

                    $.ajax({
                        url: '<?php echo $rootUrl; ?>/category_filter/analytics.php',
                        data: {adverid: adver_id,userid: user_id,respond:respondtext,productid:myproductid,addtime:length_video,addtype:'video'},
                        type: 'POST'
                    })

                    $.ajax({
                        url: '<?php echo $rootUrl; ?>/category_filter/adddata.php',
                        data: {adver_id: adver_id,length_video: length_video,user_id: user_id},
                        type: 'POST',
                        dataType: "json"
                    })
                    .done(function(data){

                        $('.amples-valuess-box').css('display' , 'block')         
                        playAudiochaching();                    
                        $('.amples-valuess').html(slength_video); 

                        if(data){

                            if(data['ReplaceAmple'] != ''){

                                $('.Replace_Amples').text(data['ReplaceAmple']);
                                //$('#amplcount').text(data['ReplaceAmple']);
                                //$('#amplcountmob').text(data['ReplaceAmple']);
                            }

                            if(data['ReplaceReward'] != ''){

                                 $('.extra-des').text(data['ReplaceReward']);
                                //$('.extra-des').html(data['ReplaceReward'] + "<span>Reward Time</span>");
                                //$('.rewardmob').html(data['ReplaceReward'] + "<span>Reward Time</span>");
                            }

                        }

                        //console.log(data);

                        /*replace current ample from given url*/ 
                        //$('#amplcount').load(document.URL +  '#amplcount');
                        //$('.extra-des').load(document.URL +  '.extra-des');
                        /*
                        var newample = slength_video.replace(":", ".");
                        var getampl = $.trim(newample);
                        console.log('get ample =>'+getampl);
                        var currampel = $.trim($("#amplcount").text());
                        var parsevalue = parseFloat(currampel);
                        console.log('Current ample =>'+parsevalue);
                        var totalamplcount = parsevalue + parseFloat(getampl); 
                        var rwdtime = $(".extra-des").text();
                        var nwrdwdtm = $.trim(rwdtime);
                        var parserwdvalue = parseFloat(nwrdwdtm);
                        console.log('curr rwdtime => ' + parserwdvalue);
                        var leftrwdtm = parserwdvalue - parseFloat(getampl);
                        console.log('New rwdtime => ' + leftrwdtm); 
                        $(".extra-des").html(leftrwdtm.toFixed(2) + " <span>Reward Time</span>");
                        */

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

            /* $.ajax({
            url: '<?php echo $rootUrl; ?>/category_filter/analytics.php',
            data: {adverid: adver_id,userid: user_id,C_name: C_name},
            type: 'POST'
            })*/

            $('.amples-valuess-box-2').css('display' , 'block')           
            var mesage="Thank you for watching add please increase reward time to earn amples.";
            $('.amples-valuess-2').html(mesage);   


        });
    </script>
    <?php } ?>


<script>
    $('.amples-valuess-box').click(function () {
        $(this).remove();
    });
    $('.amples-valuess-box-2').click(function () {
        $(this).remove();
    });

</script>
