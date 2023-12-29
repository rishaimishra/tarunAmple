<?php
    /*
    ********================================*****************
    * Shopping Cart Script v1.0 
    * Written by Vivek Kumar 9716003265 (er.vivek.rgec.cs@gmail.com)
    *********=================================****************
    */
    session_start(); //Start a session which should always be at the very top of your page as defined here

    include("db.php"); //Include the database connection settings file

    $_SESSION["REMOTE_ADDR"] = session_id();

    if($_POST['page'] == "add_to_cart_with_amples") //Add a specific item into cart purchased through user amples
    {

        $uskid   =  $_POST['userid'];

        if(!empty($uskid)) {
            $vpb_check_items = mysqli_query($con,"select * from `api_products_added` where `customer_Id` = '".mysqli_real_escape_string($con,$uskid)."' and `id` = '".mysqli_real_escape_string($con,$_POST['item_id'])."' and `is_purchased` = 0");
            //echo("select * from `products_added` where `customer_Id` = '".mysqli_real_escape_string($con,$uskid)."' and `item_added` = '".mysqli_real_escape_string($con,$_POST['item_name'])."' and `is_purchased` = 0");
            //echo $v=mysqli_num_rows($vpb_check_items);
        }

        $productNumRow = mysqli_num_rows($vpb_check_items);   

        $vpb_get_items = mysqli_fetch_array($vpb_check_items);


        if($productNumRow > 0){

            //$item_price_byample = strip_tags($vpb_get_items["newprice_byamples"]);


            if($productNumRow == 1 && $vpb_get_items['is_purchased'] == 0) 
            {

                $itemid = strip_tags($vpb_get_items["id"]);

                $total_amount = number_format(strip_tags($_POST['usrnewitem_pricebyamples']), 2); 

                $usr_applied_amples = number_format(strip_tags($_POST['usr_applied_amples']), 2,'.','');

                $new_total_amples = number_format((strip_tags($_POST['usr_total_amples']) - strip_tags($_POST['usr_applied_amples'])), 2,'.','');

                mysqli_query($con,"update `api_products_added` set `final_amount` = '".mysqli_real_escape_string($con,$total_amount)."', `newprice_byamples` = '".mysqli_real_escape_string($con,$_POST['usrnewitem_pricebyamples'])."', `apply_amples` = '".mysqli_real_escape_string($con,$usr_applied_amples)."',`earned_amples` = '".mysqli_real_escape_string($con,$_POST['earn_amples'])."',`usr_total_amples` = '".mysqli_real_escape_string($con,$_POST['usr_total_amples'])."' where `customer_Id` = '".mysqli_real_escape_string($con,$uskid)."' and `is_purchased` = 0 and id = '".$itemid."'");

                //echo("update `products_added` set `quantity` = '".mysqli_real_escape_string($con,$item_quantitynew)."', `amount` = '".mysqli_real_escape_string($con,$item_amountnew)."', `newprice_byamples` = '".mysqli_real_escape_string($con,$item_newprice_bytotalamples)."', `apply_amples` = '".mysqli_real_escape_string($con,$usr_applied_amples)."', `user_total_amples` = '".mysqli_real_escape_string($con,$_POST['usr_total_amples'])."' where `customer_Id` = '".mysqli_real_escape_string($con,$uskid)."' and `item_added` = '".mysqli_real_escape_string($con,$_POST['item_name'])."' and `is_purchased` = 0 and id = '".$itemid."'");

                //    echo("update `products_added` set `quantity` = '".mysqli_real_escape_string($con,$item_quantitynew)."', `amount` = '".mysqli_real_escape_string($con,$total_amount)."', `newprice_byamples` = '".mysqli_real_escape_string($con,$item_newprice_bytotalamples)."', `apply_amples` = '".mysqli_real_escape_string($con,$usr_applied_amples)."', `user_total_amples` = '".mysqli_real_escape_string($con,$_POST['usr_total_amples'])."' where `customer_Id` = '".mysqli_real_escape_string($con,$uskid)."' and `item_added` = '".mysqli_real_escape_string($con,$_POST['item_name'])."' and `is_purchased` = 0 and id = '".$itemid."'");

            }
            else {
                //Do Nothing
            }
            
            echo "done";

        }
    }
    
    die;
?>