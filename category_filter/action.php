<?php

require("db_config.php");

if (isset($_POST['pickup_type'])) {

    $pickup_type = $_POST['pickup_type'];
    $picdate = $_POST['picdate'];
    $picloc = $_POST['picloc'];
    $pictime = $_POST['pictime'];
    $proid = $_POST['proid'];
    $vid = $_POST['vid'];
    $userid = $_POST['userid'];
    $loc_id = $_POST['loc_id'];

    $without_ample = 0;
    $is_free_product = 0;

    if (isset($_POST['is_without_ample']) && !empty($_POST['is_without_ample']) && $_POST['is_without_ample'] == 1) {

        $without_ample = $_POST['is_without_ample'];

    }

    if (isset($_POST['is_free_product']) && !empty($_POST['is_free_product']) && $_POST['is_free_product'] == 1) {

        $is_free_product = $_POST['is_free_product'];

    }

    $sql1 = "SELECT * FROM product_delivery_type WHERE pro_id = '$proid' AND vid = '$vid' AND userid = '$userid' AND ship_without_ample = $without_ample AND ship_free_product = $is_free_product AND orderid = ''";
    $fetch = mysqli_query($con, $sql1);
    $fetch_count = mysqli_num_rows($fetch);
    if ($fetch_count > 0) {
        //echo 'hello';die;
        $update = "UPDATE product_delivery_type SET delivery_type = '$pickup_type', pickuplocation = '$picloc', pickup_date = '$picdate', pickup_time = '$pictime' , del_loc_id = $loc_id WHERE pro_id = '$proid' AND vid = '$vid' AND userid = '$userid' AND ship_without_ample = $without_ample AND ship_free_product = $is_free_product AND orderid = ''";
        $update_sql = mysqli_query($con, $update);
    } else {
        //echo 'hi';die;
        $sql = "INSERT INTO product_delivery_type (pro_id, vid, userid, delivery_type, pickuplocation, pickup_date, pickup_time,ship_without_ample,ship_free_product,del_loc_id) VALUES ('$proid', '$vid', '$userid', '$pickup_type', '$picloc', '$picdate', '$pictime',$without_ample,$is_free_product,$loc_id)";
        $query = mysqli_query($con, $sql);
    }

    ?>

    <div class="showbox">Pickup Detail Add!!...</div>
<?php } else if (isset($_POST['shippment_type'])) {
    $shippment_type = $_POST['shippment_type'];
    $shiploc = $_POST['shiploc'];
    $shiptype = $_POST['shiptype'];
    $proid = $_POST['proid'];
    $vid = $_POST['vid'];
    $userid = $_POST['userid'];

    $without_ample = 0;
    $is_free_product = 0;

    if (isset($_POST['is_without_ample']) && !empty($_POST['is_without_ample']) && $_POST['is_without_ample'] == 1) {

        $without_ample = $_POST['is_without_ample'];

    }

    if (isset($_POST['is_free_product']) && !empty($_POST['is_free_product']) && $_POST['is_free_product'] == 1) {

        $is_free_product = $_POST['is_free_product'];

    }

    $sql = "SELECT * FROM product_delivery_type WHERE pro_id = '$proid' AND vid = '$vid' AND userid = '$userid' AND ship_without_ample = $without_ample AND ship_free_product = $is_free_product AND orderid = ''";
    //print_r($sql);die;
    $fetch = mysqli_query($con, $sql);
    $fetch_count = mysqli_num_rows($fetch);
    if ($fetch_count > 0) {
        //$update = mysql_query("UPDATE services_tbl set service_name='$a',cost='$c',about_serv='$d',map_add='$e' WHERE id='$aa'");

        $update = "UPDATE product_delivery_type SET delivery_type = '$shippment_type', shipp_loc = '$shiploc', shipping_type = '$shiptype' WHERE pro_id = '$proid' AND vid = '$vid' AND userid = '$userid' AND ship_without_ample = $without_ample AND ship_free_product = $is_free_product AND orderid = ''";
        $update_sql = mysqli_query($con, $update);

    } else {
        $insert = "INSERT INTO product_delivery_type (pro_id, vid, userid, delivery_type, shipp_loc, shipping_type,ship_without_ample,ship_free_product) VALUES ('$proid', '$vid', '$userid', '$shippment_type', '$shiploc', '$shiptype',$without_ample,$is_free_product)";

        $query = mysqli_query($con, $insert);
    }
    ?>
    <div class="showbox">Shipping Detail Add!!...</div>

<?php } else if (isset($_POST['byappoint_type'])) {
    $byappoint_type = $_POST['byappoint_type'];
    $byappointloc = $_POST['byappointloc'];
    $byappointdate = $_POST['byappointdate'];
    $byappointtime = $_POST['byappointime'];
    $proid = $_POST['proid'];
    $vid = $_POST['vid'];
    $userid = $_POST['userid'];
    $shiptype = $_POST['byappoint_type'];

    $without_ample = 0;
    $is_free_product = 0;

    if (isset($_POST['is_without_ample']) && !empty($_POST['is_without_ample']) && $_POST['is_without_ample'] == 1) {

        $without_ample = $_POST['is_without_ample'];

    }

    if (isset($_POST['is_free_product']) && !empty($_POST['is_free_product']) && $_POST['is_free_product'] == 1) {

        $is_free_product = $_POST['is_free_product'];

    }

    $sql = "SELECT * FROM product_delivery_type WHERE pro_id = '$proid' AND vid = '$vid' AND userid = '$userid' AND ship_without_ample = $without_ample AND ship_free_product = $is_free_product AND orderid = ''";
    //print_r($sql);die;
    $fetch = mysqli_query($con, $sql);
    $fetch_count = mysqli_num_rows($con, $fetch);

    if ($fetch_count > 0) {
        $update = "UPDATE product_delivery_type SET delivery_type = '$byappoint_type', byappoint_location = '$byappointloc', byappoint_date = '$byappointdate', byappoint_time = '$byappointtime' WHERE pro_id = '$proid' AND vid = '$vid' AND userid = '$userid' AND ship_without_ample = $without_ample AND ship_free_product = $is_free_product AND orderid = ''";
        $update_sql = mysqli_query($con, $update);

    } else {
        $insert = "INSERT INTO product_delivery_type (pro_id, vid, userid, delivery_type, byappoint_location, shipping_type, byappoint_date, byappoint_time,ship_without_ample,ship_free_product) VALUES ('$proid', '$vid', '$userid', '$byappoint_type', '$byappointloc', '$shiptype', '$byappointdate', '$byappointtime',$without_ample,$is_free_product)";
        $query = mysqli_query($con, $insert);
    }
    ?>
    <div class="showbox">By Appointment Detail Add!!...</div>

<?php } else if (isset($_POST['deliveryd_type'])) {

    $deliveryd_type = $_POST['deliveryd_type'];
    $new_zip = $_POST['user_zipcode'];
    $address = $_POST['address'];
    $proid = $_POST['proid'];
    $vid = $_POST['vid'];
    $userid = $_POST['userid'];

    $without_ample = 0;
    $is_free_product = 0;

    if (isset($_POST['is_without_ample']) && !empty($_POST['is_without_ample']) && $_POST['is_without_ample'] == 1) {

        $without_ample = $_POST['is_without_ample'];

    }

    if (isset($_POST['is_free_product']) && !empty($_POST['is_free_product']) && $_POST['is_free_product'] == 1) {

        $is_free_product = $_POST['is_free_product'];

    }

    $sql1 = "SELECT * FROM product_delivery_type WHERE pro_id = '$proid' AND vid = '$vid' AND userid = '$userid'  AND delivery_type='delivery' AND ship_without_ample = $without_ample AND ship_free_product = $is_free_product AND orderid = ''";
    $fetch = mysqli_query($con, $sql1);
    $fetch_count = mysqli_num_rows($fetch);
    if ($fetch_count > 0) {
        //echo 'hello';die;
        $update = "UPDATE product_delivery_type SET delivery_type = '$deliveryd_type', delivery_zipcode = '$new_zip', delivery_address = '$address' WHERE pro_id = '$proid' AND vid = '$vid' AND userid = '$userid' AND ship_without_ample = $without_ample AND ship_free_product = $is_free_product AND orderid = ''";
        $update_sql = mysqli_query($con, $update);
    } else {
        //echo 'hi';die;
        $sql = "INSERT INTO product_delivery_type (pro_id, vid, userid, delivery_type, delivery_zipcode, delivery_address,ship_without_ample,ship_free_product) VALUES ('$proid', '$vid', '$userid', '$deliveryd_type', '$new_zip', '$address',$without_ample,$is_free_product)";
        $query = mysqli_query($con, $sql);
    }

    ?>

    <div class="showbox" style="margin: -25px 0px 10px 0;">Delivery Address Add!!...</div>

<?php } else if (isset($_POST['online_type'])) {
    $online_type = $_POST['online_type'];
    $picloc = $_POST['picloc'];
    $proid = $_POST['proid'];
    $vid = $_POST['vid'];
    $userid = $_POST['userid'];

    $without_ample = 0;
    $is_free_product = 0;

    if (isset($_POST['is_without_ample']) && !empty($_POST['is_without_ample']) && $_POST['is_without_ample'] == 1) {

        $without_ample = $_POST['is_without_ample'];

    }

    if (isset($_POST['is_free_product']) && !empty($_POST['is_free_product']) && $_POST['is_free_product'] == 1) {

        $is_free_product = $_POST['is_free_product'];

    }

    $sql1 = "SELECT * FROM product_delivery_type WHERE pro_id = '$proid' AND vid = '$vid' AND userid = '$userid' AND ship_without_ample = $without_ample AND ship_free_product = $is_free_product AND orderid = ''";
    $fetch = mysqli_query($con, $sql1);
    $fetch_count = mysqli_num_rows($fetch);
    if ($fetch_count > 0) {
        //echo 'hello';die;
        $update = "UPDATE product_delivery_type SET delivery_type = '$online_type', onlinelocation = '$picloc' WHERE pro_id = '$proid' AND vid = '$vid' AND userid = '$userid' AND ship_without_ample = $without_ample AND ship_free_product = $is_free_product AND orderid = ''";
        $update_sql = mysqli_query($con, $update);
    } else {
        //echo 'hi';die;
        $sql = "INSERT INTO product_delivery_type (pro_id, vid, userid, delivery_type, onlinelocation,ship_without_ample,ship_free_product) VALUES ('$proid', '$vid', '$userid', '$online_type', '$picloc',$without_ample,$is_free_product)";
        $query = mysqli_query($con, $sql);
    }

    ?>

    <div class="showbox">Your Detail Add!!...</div>
<?php } ?>
