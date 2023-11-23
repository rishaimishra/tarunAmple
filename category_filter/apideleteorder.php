<?php
    //session_start();
    require("db_config.php");
    
    if(!empty($_POST['order_id'])){
        //die;
        $order_id=$_POST['order_id'];
       
        $sqlupdate="DELETE FROM api_products_added where id = $order_id ";

        $update_run= mysqli_query($con,$sqlupdate);

        if(!empty($update_run)){

            echo "done";

        }

    }
?>

