<?php
    session_start();

    $baseurl = (!empty($_SERVER['HTTPS']) ? 'https' : 'http') . '://' . $_SERVER['HTTP_HOST'];
    //include('includes/dbfunctions.php');
    //$db = new DB_FUNCTIONS();

    $con = mysqli_connect("localhost","amplepoi_main_db","amplepoi_main_db","amplepoi_main_db"); 

    if (!$con)
    {
        die('could not connect To Database Change db_config.php File '.mysqli_error($con));
    }

    mysqli_select_db($con,"amplepoi_main_db");


    function Get_Options($option_name){

        $connew = mysqli_connect("localhost","amplepoi_main_db","amplepoi_main_db","amplepoi_main_db");
        $sql = "SELECT option_value FROM `tbl_options` WHERE `option_name` = '$option_name'";
        $query = mysqli_query($connew,$sql);
        $result = mysqli_fetch_array($query);
        return $result['option_value'];
    }

    function cdnUrl($url) {

        if(empty($url)){
            echo "Path is missing";
            die;
        }

        $pattern = '/^http/i'; 

        if(preg_match($pattern, $url))
        {
            throw new Exception('Invalid usage. ' .
            'Use: /htdocs/images instead of the full URL ' .
            'http://example.com/htdocs/images.'
            );
        }

        $pattern = '|^/|';        
        if(!preg_match($pattern, $url)) {
            $url = '/' . $url;
        }

        $cdn_hostname = Get_Options('siteurl');

        if(empty($cdn_hostname)){

            $cdn_hostname = 'https://amplepoints.com'; 
        }

        $uri = $cdn_hostname . $url;

        return $uri;
    }    

    function OnlyCdnUrl($url) {

        if(empty($url)){
            echo "Path is missing";
            die;
        }

        $pattern = '/^http/i'; 

        if(preg_match($pattern, $url))
        {
            throw new Exception('Invalid usage. ' .
            'Use: /htdocs/images instead of the full URL ' .
            'http://example.com/htdocs/images.'
            );
        }

        $pattern = '|^/|';        
        if(!preg_match($pattern, $url)) {
            $url = '/' . $url;
        }

        $cdn_hostname = 'https://cdn.amplepoints.com';

        //$cdn_hostname = Get_Options('siteurl');

        if(empty($cdn_hostname)){

            $cdn_hostname = 'https://amplepoints.com'; 
        }

        $uri = $cdn_hostname . $url;

        return $uri;
    } 


    $usrmakey = '';

    //echo "<pre>";print_r($_SESSION);die;

    if(isset($_SESSION['Zend_Auth']['storage']['user_id']) && !empty($_SESSION['Zend_Auth']['storage']['user_id'])){

        $usrmakey = $_SESSION['Zend_Auth']['storage']['user_id'];  

    }

    $ht_location = isset($_REQUEST['ht_location']) ? $_REQUEST['ht_location'] : '';
    $ht_checkin_date = isset($_REQUEST['ht_checkin_date']) ? $_REQUEST['ht_checkin_date'] : '';
    $ht_checkout_date = isset($_REQUEST['ht_checkout_date']) ? $_REQUEST['ht_checkout_date'] : '';
    $ht_num_adult = isset($_REQUEST['ht_num_adult']) ? $_REQUEST['ht_num_adult'] : '';
    $ht_num_child = isset($_REQUEST['ht_num_child']) ? $_REQUEST['ht_num_child'] : '';
    $ht_num_room= isset($_REQUEST['ht_num_room']) ? $_REQUEST['ht_num_room'] : '';
    $ht_price_range = isset($_REQUEST['ht_price_range']) ? $_REQUEST['ht_price_range'] : '';
    $ht_ample_range = isset($_REQUEST['ht_ample_range']) ? $_REQUEST['ht_ample_range'] : ''; 
    $ht_filter = isset($_REQUEST['ht_filter']) ? $_REQUEST['ht_filter'] : '';
    $vendor_id = isset($_REQUEST['vendor_id']) ? $_REQUEST['vendor_id'] : '';

    $bookingParameters = '';

    if(!empty($ht_location)){

        $bookingParameters.= "/location/".$ht_location;
    }

    if(!empty($ht_checkin_date)){

        $bookingParameters.= "/checkin_date/".$ht_checkin_date;
    } 

    if(!empty($ht_checkout_date)){

        $bookingParameters.= "/checkout_date/".$ht_checkout_date;
    } 

    if(!empty($ht_num_adult)){

        $bookingParameters.= "/num_adult/".$ht_num_adult;
    } 

    if(!empty($ht_num_child)){

        $bookingParameters.= "/num_child/".$ht_num_child;
    } 

    if(!empty($ht_num_room)){

        $bookingParameters.= "/num_room/".$ht_num_room;

    }else{

        $bookingParameters.= "/num_room/0"; 
    }
    

    $WHERE = array(); $inner = $w = '';
    $GroupBy = '';

    if(isset($ht_location) && !empty($ht_location) && $ht_location != 'undefined') {        
        $WHERE[] = "(r.city_name LIKE '%$ht_location%')";
    }  

    if(isset($ht_num_adult) && !empty($ht_num_adult) && $ht_num_adult != 'undefined') {        
        $WHERE[] = "(r.no_of_adult >= $ht_num_adult)";
    }  

    if(isset($ht_num_child) && !empty($ht_num_child) && $ht_num_child != 'undefined') {        
        $WHERE[] = "(r.no_of_child >= $ht_num_child)";
    }  

  
    if(!empty($ht_num_room) && $ht_num_room != 'undefined'){

        $WHERE[] = "(r.no_of_room - COALESCE(t.bookedRooms,0) >= $ht_num_room)";

    }else{

        $WHERE[] = "(r.no_of_room - COALESCE(t.bookedRooms,0) >= 0)";
    }


    if(isset($vendor_id) && !empty($vendor_id) && $vendor_id != 'undefined') {        
        $WHERE[] = '(r.vendor_id = '.$vendor_id.')';
    }

    /*  if(isset($ht_price_range) && !empty($ht_price_range) && $ht_price_range != 'undefined') {
    $data3 = explode('-',$ht_price_range);
    $arrcount = count($data3)-1;
    $WHERE[] = "(r.single_price between $data3[0] and $data3[$arrcount])";
    }  

    if(isset($ht_ample_range) && !empty($ht_ample_range) && $ht_ample_range != 'undefined') {
    $data_rr = explode('-',$ht_ample_range);
    $arrcount_rr = count($data_rr)-1;
    $WHERE[] = "(r.free_with_amples between $data_rr[0] and $data_rr[$arrcount_rr])";
    }    */



    if(isset($ht_filter) && !empty($ht_filter) && $ht_filter != 'undefined') {
        if(strstr($ht_filter,',')) {
            $data3 = explode(',',$ht_filter);
            $sarray = array();
            foreach($data3 as $c) {
                $sarray[] = "sfil.filter_id = $c";
            }
            $WHERE[] = '('.implode(' OR ',$sarray).')';
        } else {
            $WHERE[] = '(sfil.filter_id = '.$ht_filter.')';
        }

        $inner = 'LEFT JOIN tbl_room_filters AS sfil ON r.room_id = sfil.room_id';

        $GroupBy .= 'GROUP BY r.room_id';
    }



    //$innervndr = 'LEFT JOIN tbl_vendor AS tvdr ON t1.vendor_id = tvdr.tbl_vndr_id';

    //$WHERE[] = 'tvdr.tbl_vndr_store_status  = 1';

    $WHERE[] = "r.room_status = '1'";

    $w = implode(' AND ',$WHERE);
    if(!empty($w)) $w = 'WHERE '.$w;

    //$query = mysqli_query($con,"SELECT DISTINCT  t1 . * FROM  `tbl_rooms` AS t1 $inner $innervndr $w group by t1.room_id");

    //echo "SELECT DISTINCT  t1 . * FROM  `tbl_rooms` AS t1 $inner $w group by t1.room_id";

   // echo "SELECT r.*,r.no_of_room - COALESCE(t.bookedRooms,0) AS available_rooms FROM tbl_rooms AS r LEFT JOIN ( SELECT room_id, SUM(total_rooms) AS bookedRooms FROM tbl_room_bookings WHERE `checkin_date` <= '$ht_checkin_date' AND `checkout_date` >= '$ht_checkout_date' AND `is_purchased` = 1 GROUP BY room_id ) AS t ON r.room_id = t.room_id $inner $w $GroupBy";

    //die;
    
    $totalRoomsCount = 0;

    $query = mysqli_query($con,"SELECT r.*,r.no_of_room - COALESCE(t.bookedRooms,0) AS available_rooms FROM tbl_rooms AS r LEFT JOIN ( SELECT room_id, SUM(total_rooms) AS bookedRooms FROM tbl_room_bookings WHERE `checkin_date` <= '$ht_checkin_date' AND `checkout_date` >= '$ht_checkout_date' AND `is_purchased` = 1 GROUP BY room_id ) AS t ON r.room_id = t.room_id $inner $w $GroupBy");
    
    if(mysqli_num_rows($query)>0) {  

        while($key = mysqli_fetch_assoc($query)) { 

            $includeRoom = 1;  

            $room_id = $key['room_id'];

            $single_price = 0.00;
            $free_with_amples = 0.00;
            $no_of_amples = 0.00;
            $discount_price = 0.00;
            $dicount = 0.00;
            $FinalTextAmount = 0.00;

            $checkIndate = $ht_checkin_date;

            $prev_date = date('Y-m-d',strtotime("-1 day", strtotime($ht_checkout_date)));

            $checkOutdate = $prev_date;

            $CHKINDATE = new DateTime($ht_checkin_date);
            $CHKOUTDATE = new DateTime($ht_checkout_date);

            // this calculates the diff between two dates, which is the number of nights
            $numberOfNights= $CHKOUTDATE->diff($CHKINDATE)->format("%a");

            $MYsql = "SELECT SUM(added_price) AS added_price FROM `tbl_rooms_prices` WHERE `room_id` = $room_id AND `price_date` BETWEEN '$checkIndate' AND '$checkOutdate'";

            $resulrmprice = mysqli_query($con,$MYsql);

            if(mysqli_num_rows($resulrmprice) > 0) { 

                while($TodayPrice = mysqli_fetch_assoc($resulrmprice)) {

                    if(!empty($TodayPrice) && $TodayPrice['added_price'] > 0){

                        $wholesale_price = ($TodayPrice['added_price']);

                        $single_price =  ($wholesale_price * 2);

                        $calculateDiscount = ((($single_price - $wholesale_price)*100)/$single_price);

                        $dicount = round($calculateDiscount,2);

                        $discount_price = (($single_price*$dicount)/100);

                        $discount_margin =    $discount_price; 

                        $buyandearnamples = ($discount_margin/.12);

                        $no_of_amples = $buyandearnamples;

                        $free_with_amples = ($single_price/.12);

                    }else{


                        $wholesale_price = ($key['wholesale_price'] * $numberOfNights);

                        $single_price =  ($key['single_price'] * $numberOfNights);

                        $calculateDiscount = ((($single_price - $wholesale_price)*100)/$single_price);

                        $dicount = round($calculateDiscount,2);

                        $discount_price = (($single_price*$dicount)/100);

                        $discount_margin =    $discount_price; 

                        $buyandearnamples = ($discount_margin/.12);

                        $no_of_amples = $buyandearnamples;

                        $free_with_amples = ($single_price/.12);
                    }
                }

            }else{

                $wholesale_price = ($key['wholesale_price'] * $numberOfNights);

                $single_price =  ($key['single_price'] * $numberOfNights);

                $calculateDiscount = ((($single_price - $wholesale_price)*100)/$single_price);

                $dicount = round($calculateDiscount,2);

                $discount_price = (($single_price*$dicount)/100);

                $discount_margin =    $discount_price; 

                $buyandearnamples = ($discount_margin/.12);

                $no_of_amples = $buyandearnamples;

                $free_with_amples = ($single_price/.12); 

            }

            $TaxPercentageMount = (($key['tax_percentage'] / 100) * $single_price);

            $extraCharges = 0.00;

            if(!empty($key['extra_charges'])){

                $extraChargesData = json_decode($key['extra_charges'],True);

                if(!empty($extraChargesData)){

                    foreach($extraChargesData as $mycharges){

                        $extraCharges += $mycharges['charge_amount']; 
                    }
                } 
            }

            $FinalTextAmount = ($TaxPercentageMount + $extraCharges);

            if(isset($ht_price_range) && !empty($ht_price_range) && $ht_price_range != 'undefined') {
                $data3 = explode('-',$ht_price_range);
                $arrcount = count($data3)-1; 

                $start_price =  $data3[0];
                $end_price =  $data3[$arrcount];

                if(($start_price <= $single_price) && ($single_price <= $end_price) ){

                    $includeRoom = 1;  

                }else{

                    $includeRoom = 0;
                }


            }  

            if(isset($ht_ample_range) && !empty($ht_ample_range) && $ht_ample_range != 'undefined') {
                $data_rr = explode('-',$ht_ample_range);
                $arrcount_rr = count($data_rr)-1;

                $start_ample =  $data_rr[0];
                $end_ample =  $data_rr[$arrcount_rr];


                if(($start_ample <= $free_with_amples) && ($free_with_amples <= $end_ample) ){

                    $includeRoom = 1;  

                }else{

                    $includeRoom = 0;
                }


            }

            if($includeRoom){

            ?>


            <li class="col-sm-4 product_new_container">
                <div class="filter-data">
                    <div class="pro_head">
                        <h5 class="Butter_aria"><?php echo substr($key['room_name'],0,15); ?></h5>
                        <div class="content_price3">
                            <h5> Free&nbsp;</h5>
                            <span>with&nbsp;</span>
                            <h6><?php echo number_format($free_with_amples,2,'.',''); ?></h6> 
                            &nbsp;AmplePoints
                            <div class="amp-logo"></div> 
                        </div>                                    
                    </div>
                  
                    <?php if($numberOfNights > 0 || $ht_num_adult > 0 || $ht_num_child > 0){ ?>

                        <div class="tax_and_info">

                            <p><?php if($numberOfNights > 0){ echo $numberOfNights." nights"; } ?> <?php if($ht_num_adult > 0){ echo ", ".$ht_num_adult." adults"; } ?> <?php if($ht_num_child > 0){ echo ", ".$ht_num_child." children"; } ?></p>
                        </div>

                        <?php } ?>

                    <div class="pro_image" style="padding:0px;"> 
                        <a href="<?php echo $baseurl.'/roomdetail/'.$key['room_id'].$bookingParameters; ?>"><img class="img-responsive" alt="product" src="<?php echo $baseurl.'/room_images/'.$key['room_id'].'/'.$key['primary_image']; ?>"></a> 
                    </div>

                    <div class="pro_short_desc">

                        <p><?php echo $key['room_description']; ?></p>

                    </div>


                    <div class="pro_discription">
                        <div class="col-sm-4 pad0" id="borderright">
                            <div class="content_price4">
                                <p>Buy &amp; Earn</p>
                                <span><?php echo number_format($no_of_amples,2,'.',''); ?> </span> <br> 
                            <span>Amples </span> </div>
                        </div>
                        <div class="col-sm-5 pad0" id="borderright">
                            <div class="price7"> 
                                <p>Reward value</p>
                                <span>$<?php echo number_format($discount_price,2,'.',''); ?></span> 

                            </div>
                        </div>
                        <div class="col-sm-3 align">
                            <div class="save5">
                                <p>You Earn</p>
                                <span><?php echo number_format($dicount,2,'.',''); ?>%</span> 
                            </div>
                        </div>
                    </div>

                    <?php 

                        $VendorName = '';

                        $vendorId = $key['vendor_id'];

                        $sqlVdr = "SELECT tbl_vndr_dispname FROM tbl_vendor WHERE tbl_vndr_id = $vendorId";

                        $resultvdr = mysqli_query($con,$sqlVdr);

                        if(mysqli_num_rows($resultvdr) > 0) { 

                            while($vdrName = mysqli_fetch_assoc($resultvdr)) {

                                $VendorName =  $vdrName['tbl_vndr_dispname'];
                            }

                        }

                        $VendorName = substr($VendorName,0,15);
                        $UrlVendorAppend = strtolower(preg_replace('/\s+/', '', $VendorName));

                    ?>

                    <div class="pro_price">
                        <div class="price2"> <a href="#">$<?php echo number_format($single_price,2,'.',''); ?></a> </div>
                        <div class="by_aria">
                            <a href="<?php echo $baseurl.'/roomsbysellerlist/'.$UrlVendorAppend.'/'.$key['vendor_id'].$bookingParameters; ?>"><?php echo $VendorName; ?></a>
                            <h6>By:&nbsp;</h6>
                        </div>

                        <div class="add-to-cart">

                            <a title="Add to Cart" href="<?php echo $baseurl.'roomdetail/'.$key['room_id'].$bookingParameters; ?>">Book Now</a>
                        </div>
                    </div>
                </div>

            </li>

            <?php 

                $totalRoomsCount++; 

            }    

        }

        if($totalRoomsCount == 0){

        ?>

        <div align="center"><h2 style="font-family:'Arial Black', Gadget, sans-serif;font-size:30px;color:#0099FF;">No Room Found.</h2></div>    

        <?php   }

    }else{
    ?>
    <div align="center"><h2 style="font-family:'Arial Black', Gadget, sans-serif;font-size:30px;color:#0099FF;">No Room Found.</h2></div>
    <?php        

    }
?>
