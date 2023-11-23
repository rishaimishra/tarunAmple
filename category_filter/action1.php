<?php

    require("db_config.php");

    if($_POST['deliveryd_type']){
        $deliveryd_type = $_POST['deliveryd_type'];
        $new_zip = $_POST['new_zip'];
        $address = $_POST['address'];
        $proid = $_POST['proid'];
        $vid = $_POST['vid'];
        $userid = $_POST['userid'];

        $sql1 = "SELECT * FROM product_delivery_type WHERE pro_id = '$proid' AND vid = '$vid' AND userid = '$userid'  AND delivery_type='deliveryd' AND orderid = ''";
        $fetch = mysqli_query($con,$sql1);
        $fetch_count = mysqli_num_rows($fetch);
        if($fetch_count>0){
            //echo 'hello';die;
            $update = "UPDATE product_delivery_type SET delivery_type = '$deliveryd_type', delivery_zipcode = '$new_zip', delivery_address = '$address' WHERE pro_id = '$proid' AND vid = '$vid' AND userid = '$userid' AND orderid = ''";
            $update_sql = mysqli_query($con,$update);
        }else{
            //echo 'hi';die;
            $sql = "INSERT INTO product_delivery_type (pro_id, vid, userid, delivery_type, delivery_zipcode, delivery_address) VALUES ('$proid', '$vid', '$userid', '$deliveryd_type', '$new_zip', '$address')";
            $query = mysqli_query($con,$sql);
        }

    ?>

    <div class="showboxsss">Delivery Address Add!!...</div>
    <?php } ?>