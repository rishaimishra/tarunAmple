<?php

    include("db.php");

    if(isset($_REQUEST['quantity']) && isset($_REQUEST['table_id']))
    {

        $quantity=$_REQUEST['quantity'];

        $check_items = mysqli_query($con,"select * from `products_added` where `username` = '".mysqli_real_escape_string($con,$_SESSION["REMOTE_ADDR"])."' and `id` = '".mysqli_real_escape_string($con,$_REQUEST['table_id'])."'");
        if(mysqli_num_rows($check_items) > 0)
        {
            $get_items = mysqli_fetch_array($check_items);
            $item_amount=strip_tags($get_items['price'])*$quantity;
            // $total_amount = strip_tags($get_items["amount"])+ $item_amount;
            //Update products_added's table to avoid repetition of a specified item and increment items quantity and amount to display new info
            mysqli_query($con,"update `products_added` set `quantity` = '".mysqli_real_escape_string($con,$quantity)."', `amount` = '".mysqli_real_escape_string($con,$item_amount)."' where `username` = '".mysqli_real_escape_string($con,$_SESSION["REMOTE_ADDR"])."' and `id` = '".mysqli_real_escape_string($con,$_REQUEST['table_id'])."'");
        }			
        echo "1";
    }
    if(isset($_REQUEST['itemid']) && isset($_REQUEST['action']) == "delete" )
    {

        //echo $_REQUEST['itemid'];
        //echo "delete from `products_added` where `id` = '".mysqli_real_escape_string($con,strip_tags($_REQUEST["itemid"]))."' and `username` = '".mysqli_real_escape_string($con,$_SESSION["REMOTE_ADDR"])."'";	
        mysqli_query($con,"delete from `products_added` where `id` = '".mysqli_real_escape_string($con,strip_tags($_REQUEST["itemid"]))."' and `username` = '".mysqli_real_escape_string($con,$_SESSION["REMOTE_ADDR"])."'");

    }

    if(isset($_REQUEST['minorderquantity']) && isset($_REQUEST['mode']) == "minorderquant" )
    {

        session_start();
        $_SESSION["minorderquantity"]=$_REQUEST['minorderquantity']; 

        echo $_SESSION["minorderquantity"];
    }
?>