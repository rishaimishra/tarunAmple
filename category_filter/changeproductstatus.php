<?php

    require("db_config.php");

    if(!empty($_POST['product_status']) && !empty($_POST['product_id'])){

        $product_status =$_POST['product_status'];
        //die;
        $product_id = $_POST['product_id'];

        //$sqlupdate="Update tbl_order SET order_status='".$status."' where order_id='".$order_id."'";

        $sqlupdate = "Update products SET status = '".$product_status."' where id = $product_id ";

        $update_run = mysqli_query($con,$sqlupdate)or die(mysql_error());

        if(!empty($update_run)){

            echo "done";

        }else {

            echo "notdone";
        }

    }

    die;

?>

