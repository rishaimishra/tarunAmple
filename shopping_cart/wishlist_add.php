<?php
    /*
    ********================================*****************
    * Wishlist Script v1.0 
    * Written by Vivek Kumar 9716003265 (er.vivek.rgec.cs@gmail.com)
    *********=================================****************
    */
    session_start(); //Start a session which should always be at the very top of your page as defined here

    include("db.php"); //Include the database connection settings file

    $_SESSION["REMOTE_ADDR"] = session_id();

    if(isset($_POST['page']) && !empty($_POST['page']))
    {
        if($_POST['page'] == "submit_cart")
        {
            $vpb_fullname = strip_tags($_POST["vpb_fullname"]);
            $vpb_email = strip_tags($_POST["vpb_email"]);
            $vpb_address = strip_tags($_POST["vpb_address"]);
            $vpb_phone = strip_tags($_POST["vpb_phone"]);

            $vpb_check_items = mysqli_query($con,"select * from `wishlist_added` where `username` = '".mysqli_real_escape_string($con,$_SESSION["REMOTE_ADDR"])."'");


            if(mysqli_num_rows($vpb_check_items) < 1)
            {
            ?>
            <div id="vpb_shopping_cart_is_currently_empty" align="left">
                Hello There, <br /><br />Your shopping cart is empty at the moment. <br />Please click on the add to cart buttons at the bottom of each item at the left to add an item of your choice to cart.<br /><br />Thanks You...
            </div>
            <?php
            }
            else
            {
                while($vpb_get_all_items = mysqli_fetch_array($vpb_check_items))
                {	
                    $item_name = strip_tags($vpb_get_all_items["item_added"]);
                    $price = strip_tags($vpb_get_all_items["price"]);
                    $quantity = strip_tags($vpb_get_all_items["quantity"]);
                    $amount = strip_tags($vpb_get_all_items["amount"]);

                    mysqli_query($con,"insert into `products_bought` values('', '".mysqli_real_escape_string($con,$vpb_fullname)."', '".mysqli_real_escape_string($con,$vpb_email)."', '".mysqli_real_escape_string($con,$vpb_address)."', '".mysqli_real_escape_string($con,$vpb_phone)."', '".mysqli_real_escape_string($con,$item_name)."', '".mysqli_real_escape_string($con,$price)."', '".mysqli_real_escape_string($con,$quantity)."', '".mysqli_real_escape_string($con,$amount)."', '".mysqli_real_escape_string($con,date("d-m-Y"))."')");
                }
                mysqli_query($con,"delete from `wishlist_added` where `username` = '".mysqli_real_escape_string($con,$_SESSION["REMOTE_ADDR"])."'");
            ?>
            <div id="vpb_shopping_cart_is_currently_empty" align="left">
                Congrats <?php echo $vpb_fullname; ?>, <br /><br />Your items have been submitted to us successfully.<br /><br />We will get back to you as soon as possible.<br /><br />Thanks You...<br /><br /><b>Information! Information!! Information!!!</b><br /><br />Well, as you can see, the cart has been submitted successfully. Here you can redirect every user that successfully submits a cart to your payment page or a Paypal website where the user can make payment as you wish.<br /><br />This is only for demonstration purpose and that's it.<br /><br />Have fun...
            </div>
            <?php
            }

        }
        elseif($_POST['page'] == "clear_cart") //Clear the entire cart
        {
            mysqli_query($con,"delete from `wishlist_added` where `username` = '".mysqli_real_escape_string($con,$_SESSION["REMOTE_ADDR"])."'");
        ?>

        <?php
        }
        elseif($_POST['page'] == "remove_this_item") //Remove a specific item from the cart
        {
            mysqli_query($con,"delete from `wishlist_added` where `product_id` = '".mysqli_real_escape_string($con,strip_tags($_POST["item_id"]))."' and `customer_Id` = '".mysqli_real_escape_string($con,$_POST['item_usrkey'])."'");
            $vpb_check_items = mysqli_query($con,"select * from `wishlist_added` where `customer_Id` = '".mysqli_real_escape_string($con,$_POST['item_usrkey'])."'");
            if(mysqli_num_rows($vpb_check_items) < 0)
            {
                echo '<font style="font-size:0px;">empty</font>';
            ?>

            <?php
            }
            else 
            {

                $baseurl = (!empty($_SERVER['HTTPS']) ? 'https' : 'http') . '://' . $_SERVER['HTTP_HOST'];
                $vpb_check_itemsTotal = mysqli_query($con,"select sum(amount) as `items_total`, sum(quantity) as `items_quant` from `wishlist_added` where `customer_Id` = '".mysqli_real_escape_string($con,$_POST['item_usrkey'])."'");

                $vpb_get_itemsTotal = mysqli_fetch_array($vpb_check_itemsTotal);
                //$groundtotal = ($vpb_get_itemsTotal["items_total"]); //Get total of all added items
                $groundquant = ($vpb_get_itemsTotal["items_quant"]); //Get total of all added items
                //$carttotal=number_format($groundtotal,2);

            ?>

            <?php if(!empty($groundquant) && $groundquant != '') { echo $groundquant; } else { echo "0"; } ?>###

            <?php 

                $vpb_check_itemsdata = mysqli_query($con,"select item_added as `item_name`, quantity as `item_quant`, amount as `item_price`, product_id as `pid` from `wishlist_added` where `customer_Id` = '".mysqli_real_escape_string($con,$_POST['item_usrkey'])."'");

                if(mysqli_num_rows($vpb_check_itemsdata)>0) {
                    while($key = mysqli_fetch_assoc($vpb_check_itemsdata)) {

                        //$vpb_check_image = mysqli_query($con,"select image_name as `product_image` from product_images where product_id ='".$key['pid']."' and is_primary_image = '1'");
                        $vpb_check_image = mysqli_query($con,"select image as `product_image` from products where id ='".$key['pid']."'");
                        $vpb_get_image = mysqli_fetch_array($vpb_check_image);

                    ?>
                    <li class="product-info">
                        <div class="p-left">
                            <a onclick="remove_this_item('<?php echo $key['pid']; ?>');" href="javascript: void(0);" class="remove_link"></a>
                            <a href="#">
                                <img class="img-responsive" src="<?php echo cdnUrl('product_images/'.$key['pid'].'/'.$vpb_get_image['product_image']); ?>" alt="p10">
                            </a>
                        </div>
                        <div class="p-right">
                            <p class="p-name" id="item-name"><?php echo strip_tags($key['item_name']); ?></p>
                            <p class="p-rice" id="item-quant">$ <?php echo strip_tags($key['item_price']); ?></p>
                            <p id="item-price">Qty: <?php echo strip_tags($key['item_quant']); ?></p>
                        </div>
                    </li>
                    <?php } } ?>

            <?php 

            }
        }
        else //The below code performs Add to Cart process and as well displays the cart status
        {
            //Check for valid item name and item price to add a specified item to cart
            if(isset($_POST['item_name']) && !empty($_POST['item_name']) && isset($_POST['prod_id']) && !empty($_POST['prod_id']) &&  isset($_POST['quant']) && !empty($_POST['quant']) && isset($_POST['item_price']) && !empty($_POST['item_price']) && isset($_POST['item_usrkey']) && !empty($_POST['item_usrkey']))
            {

                //Check if a specified user has already added a specified item to cart by checking the database wishlist_added's table
                $vpb_check_items = mysqli_query($con,"select * from `wishlist_added` where `customer_Id` = '".mysqli_real_escape_string($con,$_POST['item_usrkey'])."' and `item_added` = '".mysqli_real_escape_string($con,$_POST['item_name'])."'");

                //If the specified user has not already added the specified item to database wishlist_added's table
                if(mysqli_num_rows($vpb_check_items) < 1)
                {
                    //Add the specified item to the database wishlist_added's table now
                    $tota_amount = (strip_tags($_POST['item_price']) * strip_tags($_POST['quant']));
                    mysqli_query($con,"insert into `wishlist_added` values('','".mysqli_real_escape_string($con,$_SESSION["REMOTE_ADDR"])."','".mysqli_real_escape_string($con,$_POST['item_name'])."','".mysqli_real_escape_string($con,$_POST['item_price'])."','".mysqli_real_escape_string($con,$_POST['quant'])."','".mysqli_real_escape_string($con,$tota_amount)."','".mysqli_real_escape_string($con,date("d-m-Y"))."','".mysqli_real_escape_string($con,$_POST['item_usrkey'])."','".mysqli_real_escape_string($con,$_POST['prod_id'])."')");

                    //Check all the items that the specified user has added to the database wishlist_added's table
                    $vpb_check_all_items = mysqli_query($con,"select * from `wishlist_added` where `customer_Id` = '".mysqli_real_escape_string($con,$_POST['item_usrkey'])."' order by `id` asc");

                    //If no product has been added still, display a no product added to cart message to the specified user
                    if(mysqli_num_rows($vpb_check_all_items) < 1)
                    {
                    ?>

                    <?php
                    }
                    else
                    {
                        $baseurl = (!empty($_SERVER['HTTPS']) ? 'https' : 'http') . '://' . $_SERVER['HTTP_HOST'];

                        //Check the databse wishlist_added's table and sum up the total of all added items to cart
                        $vpb_check_itemsTotal = mysqli_query($con,"select sum(amount) as `items_total`, sum(quantity) as `items_quant` from `wishlist_added` where `customer_Id` = '".mysqli_real_escape_string($con,$_POST['item_usrkey'])."'");

                        //Get all these items
                        $vpb_get_itemsTotal = mysqli_fetch_array($vpb_check_itemsTotal);
                        //$groundtotal = ($vpb_get_itemsTotal["items_total"]); //Get total of all added items
                        $groundquant = ($vpb_get_itemsTotal["items_quant"]); //Get total of all added items
                        //$carttotal=number_format($groundtotal,2);

                    ?>

                    <?php echo $groundquant; ?>###

                    <?php 

                        $vpb_check_itemsdata = mysqli_query($con,"select item_added as `item_name`, quantity as `item_quant`, amount as `item_price`, product_id as `pid` from `wishlist_added` where `customer_Id` = '".mysqli_real_escape_string($con,$_POST['item_usrkey'])."'");

                        if(mysqli_num_rows($vpb_check_itemsdata)>0) {
                            while($key = mysqli_fetch_assoc($vpb_check_itemsdata)) {

                                //$vpb_check_image = mysqli_query($con,"select image_name as `product_image` from product_images where product_id ='".$key['pid']."' and is_primary_image = '1'");
                                $vpb_check_image = mysqli_query($con,"select image as `product_image` from products where id ='".$key['pid']."'");
                                $vpb_get_image = mysqli_fetch_array($vpb_check_image);

                            ?>
                            <li class="product-info">
                                <div class="p-left">
                                    <a onclick="remove_this_item('<?php echo $key['pid']; ?>');" href="javascript: void(0);" class="remove_link"></a>
                                    <a href="#">
                                        <img class="img-responsive" src="<?php echo cdnUrl('product_images/'.$key['pid'].'/'.$vpb_get_image['product_image']); ?>" alt="p10">
                                    </a>
                                </div>
                                <div class="p-right">
                                    <p class="p-name" id="item-name"><?php echo strip_tags($key['item_name']); ?></p>
                                    <p class="p-rice" id="item-quant">$ <?php echo strip_tags($key['item_price']); ?></p>
                                    <p id="item-price">Qty: <?php echo strip_tags($key['item_quant']); ?></p>
                                </div>
                            </li>
                            <?php } } ?>

                    <?php
                    }
                }

            }
            else
            {
            ?>
            <div id="vpb_shopping_cart_is_currently_empty" align="left">
                Hello There, <br /><br />No data is passed at the moment. Please try again or contact the site admin to report this error message if the problem persist.<br /><br />Thanks You...
            </div>
            <?php
            }

        }
    }
    else
    {
    ?>
    <div id="vpb_shopping_cart_is_currently_empty" align="left">
        Hello There, <br /><br />No data is passed at the moment. Please try again or contact the site admin to report this error message if the problem persist.<br /><br />Thanks You...
    </div>
    <?php
    }
?>