<?php
    //session_start();
    require("db_config.php");
    
    if(!empty($_POST['orderstatus'])){
        $status=$_POST['orderstatus'];
        //die;
        $order_id=$_POST['order_id'];
        /*
        if($status =="Completed"){

        $sqlrunquerytest="SELECT * from tbl_order where order_id='".$order_id."'";

        $runneww2= mysqli_query($con,$sqlrunquerytest)or die(mysql_error());
        $getprice=mysql_fetch_array($runneww2);
        print_r($getprice);
        //    echo $getprice['total_price']; 
        }*/


        //$sqlupdate="Update tbl_order SET order_status='".$status."' where order_id='".$order_id."'";

        $sqlupdate="Update api_products_added SET product_order_status = '".$status."' where id = $order_id ";

        $update_run= mysqli_query($con,$sqlupdate)or die(mysql_error());

        if(!empty($update_run)){

            echo"<h2 style='color:green'>Updated Order Status </h2>";

        }

    }
?>

