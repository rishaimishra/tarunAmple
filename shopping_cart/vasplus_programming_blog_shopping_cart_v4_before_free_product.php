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

if (isset($_SESSION["currencySymbol"]) && !empty($_SESSION["currencySymbol"])) {

    $currencySymbol = $_SESSION["currencySymbol"];

} else {

    $currencySymbol = '$';

}

if (isset($_POST['page']) && !empty($_POST['page'])) {
    if ($_POST['page'] == "submit_cart") {
        $vpb_fullname = strip_tags($_POST["vpb_fullname"]);
        $vpb_email = strip_tags($_POST["vpb_email"]);
        $vpb_address = strip_tags($_POST["vpb_address"]);
        $vpb_phone = strip_tags($_POST["vpb_phone"]);

        $vpb_check_items = mysqli_query($con, "select * from `products_added` where `username` = '" . mysqli_real_escape_string($con, $_SESSION["REMOTE_ADDR"]) . "'");


        if (mysqli_num_rows($vpb_check_items) < 1) {
            ?>
            <div id="vpb_shopping_cart_is_currently_empty" align="left">
                Hello There, <br/><br/>Your shopping cart is empty at the moment. <br/>Please click on the add to cart
                buttons at the bottom of each item at the left to add an item of your choice to cart.<br/><br/>Thanks
                You...
            </div>
            <?php
        } else {
            while ($vpb_get_all_items = mysqli_fetch_array($vpb_check_items)) {
                $item_name = strip_tags($vpb_get_all_items["item_added"]);
                $price = strip_tags($vpb_get_all_items["price"]);
                $quantity = strip_tags($vpb_get_all_items["quantity"]);
                $amount = strip_tags($vpb_get_all_items["amount"]);

                mysqli_query($con, "insert into `products_bought` values('', '" . mysqli_real_escape_string($con, $vpb_fullname) . "', '" . mysqli_real_escape_string($con, $vpb_email) . "', '" . mysqli_real_escape_string($con, $vpb_address) . "', '" . mysqli_real_escape_string($con, $vpb_phone) . "', '" . mysqli_real_escape_string($con, $item_name) . "', '" . mysqli_real_escape_string($con, $price) . "', '" . mysqli_real_escape_string($con, $quantity) . "', '" . mysqli_real_escape_string($con, $amount) . "', '" . mysqli_real_escape_string($con, date("d-m-Y")) . "')");
            }
            mysqli_query($con, "delete from `products_added` where `username` = '" . mysqli_real_escape_string($con, $_SESSION["REMOTE_ADDR"]) . "'");
            ?>
            <div id="vpb_shopping_cart_is_currently_empty" align="left">
                Congrats <?php echo $vpb_fullname; ?>, <br/><br/>Your items have been submitted to us successfully.<br/><br/>We
                will get back to you as soon as possible.<br/><br/>Thanks You...<br/><br/><b>Information! Information!!
                    Information!!!</b><br/><br/>Well, as you can see, the cart has been submitted successfully. Here you
                can redirect every user that successfully submits a cart to your payment page or a Paypal website where
                the user can make payment as you wish.<br/><br/>This is only for demonstration purpose and that's
                it.<br/><br/>Have fun...
            </div>
            <?php
        }

    } elseif ($_POST['page'] == "clear_cart") //Clear the entire cart
    {
        mysqli_query($con, "delete from `products_added` where `username` = '" . mysqli_real_escape_string($con, $_SESSION["REMOTE_ADDR"]) . "'");
        ?>

        <?php
    } elseif ($_POST['page'] == "remove_this_item") //Remove a specific item from the cart
    {
        $uskid = $_POST['usrmaid'];

        if (!empty($uskid)) {
            $vpb_check_appliedamples = mysqli_query($con, "select apply_amples as `user_applied_amples` from `products_added` where `id` = '" . mysqli_real_escape_string($con, strip_tags($_POST["item_id"])) . "' and `customer_Id` = '" . mysqli_real_escape_string($con, $uskid) . "' and `is_purchased` = 0");
            $vpb_get_appliedamples = mysqli_fetch_array($vpb_check_appliedamples);
            if ($vpb_get_appliedamples['user_applied_amples'] > 0.00) {
                $vpb_check_useramples = mysqli_query($con, "select total_ample from `users` where `user_id` = '" . mysqli_real_escape_string($con, $uskid) . "'");
                $vpb_get_useramples = mysqli_fetch_array($vpb_check_useramples);
                $user_total_amples = number_format(($vpb_get_useramples['total_ample'] + $vpb_get_appliedamples['user_applied_amples']), 2, '.', '');
                mysqli_query($con, "update `users` set `total_ample` = '" . mysqli_real_escape_string($con, $user_total_amples) . "' where `user_id` = '" . mysqli_real_escape_string($con, $uskid) . "'");
            }
        }

        $vpb_check_usertotalamples = mysqli_query($con, "select total_ample from `users` where `user_id` = '" . mysqli_real_escape_string($con, $uskid) . "'");
        $vpb_get_usertotalamples = mysqli_fetch_array($vpb_check_usertotalamples);

        if (!empty($uskid)) {
            mysqli_query($con, "delete from `products_added` where `id` = '" . mysqli_real_escape_string($con, strip_tags($_POST["item_id"])) . "' and `customer_Id` = '" . mysqli_real_escape_string($con, $uskid) . "' and `is_purchased` = 0");

            $vpb_check_items = mysqli_query($con, "select * from `products_added` where `customer_Id` = '" . mysqli_real_escape_string($con, $uskid) . "' and `is_purchased` = 0");
        } else {
            mysqli_query($con, "delete from `products_added` where `id` = '" . mysqli_real_escape_string($con, strip_tags($_POST["item_id"])) . "' and `username` = '" . mysqli_real_escape_string($con, $_SESSION["REMOTE_ADDR"]) . "' and `is_purchased` = 0");

            $vpb_check_items = mysqli_query($con, "select * from `products_added` where `username` = '" . mysqli_real_escape_string($con, $_SESSION["REMOTE_ADDR"]) . "' and `is_purchased` = 0");
        }

        if (mysqli_num_rows($vpb_check_items) < 0) {
            echo '<font style="font-size:0px;">empty</font>';
            ?>

            <?php
        } else {

            $baseurl = (!empty($_SERVER['HTTPS']) ? 'https' : 'http') . '://' . $_SERVER['HTTP_HOST'];

            if (!empty($uskid)) {
                $vpb_check_itemsTotal = mysqli_query($con, "select sum(amount) as `items_total`, sum(quantity) as `items_quant` from `products_added` where `customer_Id` = '" . mysqli_real_escape_string($con, $uskid) . "' and `is_purchased` = 0");
            } else {
                $vpb_check_itemsTotal = mysqli_query($con, "select sum(amount) as `items_total`, sum(quantity) as `items_quant` from `products_added` where `username` = '" . mysqli_real_escape_string($con, $_SESSION["REMOTE_ADDR"]) . "' and `is_purchased` = 0");
            }

            $vpb_get_itemsTotal = mysqli_fetch_array($vpb_check_itemsTotal);
            $groundtotal = ($vpb_get_itemsTotal["items_total"]); //Get total of all added items
            $groundquant = ($vpb_get_itemsTotal["items_quant"]); //Get total of all added items
            $carttotal = number_format($groundtotal, 2);

            ?>

            <?php if (!empty($groundquant) && $groundquant != '') {
                echo $groundquant;
            } else {
                echo "0";
            } ?>###

            <?php

            if (!empty($uskid)) {
                $vpb_check_itemsdata = mysqli_query($con, "select item_added as `item_name`, quantity as `item_quant`, amount as `item_price`, product_id as `pid` from `products_added` where `customer_Id` = '" . mysqli_real_escape_string($con, $uskid) . "' and `is_purchased` = 0");
            } else {
                $vpb_check_itemsdata = mysqli_query($con, "select item_added as `item_name`, quantity as `item_quant`, amount as `item_price`, product_id as `pid` from `products_added` where `username` = '" . mysqli_real_escape_string($con, $_SESSION["REMOTE_ADDR"]) . "' and `is_purchased` = 0");
            }

            if (mysqli_num_rows($vpb_check_itemsdata) > 0) {
                while ($key = mysqli_fetch_assoc($vpb_check_itemsdata)) {

                    //$vpb_check_productimages = mysqli_query($con,"select image_name as `product_image` from product_images where product_id ='".$key['pid']."' and is_primary_image ='1'");
                    $vpb_check_productimages = mysqli_query($con, "select image as `product_image` from products where id ='" . $key['pid'] . "'");
                    $vpb_get_imagedata = mysqli_fetch_array($vpb_check_productimages);

                    ?>
                    <li class="product-info">
                        <div class="p-left">
                            <a href="<?php echo $baseurl . '/productdetail/' . $key['pid']; ?>">
                                <img class="img-responsive"
                                     src="<?php echo cdnUrl('product_images/' . $key['pid'] . '/' . $vpb_get_imagedata['product_image']); ?>"
                                     alt="p10">
                            </a>
                        </div>
                        <div class="p-right">
                            <p class="p-name" id="item-name"><?php echo strip_tags($key['item_name']); ?></p>
                            <p class="p-rice"
                               id="item-quant"><?php echo $currencySymbol; ?><?php echo strip_tags($key['item_price']); ?></p>
                            <p id="item-price">Qty: <?php echo strip_tags($key['item_quant']); ?></p>
                            <a onclick="remove_this_item('<?php echo $key['pid']; ?>', '<?php echo $uskid; ?>');"
                               href="javascript:void(0);" class="remove_link">Remove</a>
                        </div>
                    </li>
                <?php }
            } ?>

            ###<?php echo $carttotal; ?>###<?php echo (int)$vpb_get_usertotalamples['total_ample']; ?>###

            <?php

            if (!empty($uskid)) {
                $vpb_check_itemsdata = mysqli_query($con, "select item_added as `item_name`, quantity as `item_quant`, price as `item_single_amount`, amount as `item_price`, cacolor, casize, newprice_byamples, apply_amples, earned_amples, vendor_id as `vadrid`, product_id as `pid` from `products_added` where `customer_Id` = '" . mysqli_real_escape_string($con, $uskid) . "' and `is_purchased` = 0");
            } else {
                $vpb_check_itemsdata = mysqli_query($con, "select item_added as `item_name`, quantity as `item_quant`, price as `item_single_amount`, amount as `item_price`, cacolor, casize, newprice_byamples, apply_amples, earned_amples, vendor_id as `vadrid`, product_id as `pid` from `products_added` where `username` = '" . mysqli_real_escape_string($con, $_SESSION["REMOTE_ADDR"]) . "' and `is_purchased` = 0");
            }

            $keycount = 1;
            if (mysqli_num_rows($vpb_check_itemsdata) > 0) {
                while ($key = mysqli_fetch_assoc($vpb_check_itemsdata)) {

                    $vpb_check_productdata = mysqli_query($con, "select min_order_quantity from products where id ='" . $key['pid'] . "'");
                    $vpb_get_productdata = mysqli_fetch_array($vpb_check_productdata);

                    //$vpb_check_productimages = mysqli_query($con,"select image_name as `product_image` from product_images where product_id ='".$key['pid']."' and is_primary_image ='1'");
                    $vpb_check_productimages = mysqli_query($con, "select image as `product_image` from products where id ='" . $key['pid'] . "'");
                    $vpb_get_imagedata = mysqli_fetch_array($vpb_check_productimages);

                    $vpb_check_vendoraddress = mysqli_query($con, "select * from tbl_vendor_addresses where adr_vdr_id ='" . $key['vadrid'] . "'");

                    $vpb_check_useraddress = mysqli_query($con, "select * from users where user_id ='" . mysqli_real_escape_string($con, $uskid) . "'");
                    $vpb_get_useraddress = mysqli_fetch_array($vpb_check_useraddress);

                    ?>

                    <tr>
                        <td class="cart_product">
                            <a href="<?php echo $baseurl . '/productdetail/' . $key['pid']; ?>"><img
                                        src="<?php echo cdnUrl('product_images/' . $key['pid'] . '/' . $vpb_get_imagedata['product_image']); ?>"
                                        alt="Product"></a>
                        </td>
                        <td class="cart_description">
                            <p class="product-name"><a
                                        href="<?php echo $baseurl . '/index/productdetail/pid/' . '' . $key['pid']; ?>"><?php echo $key['item_name']; ?> </a>
                            </p>
                            <small class="cart_ref">SKU : #123654999</small>
                            <br>
                            <small>Color :
                                <div style="margin:-21px 0px 0px 50px;width:20px;height:20px;background-color:<?php echo $key['cacolor']; ?>;"></div>
                            </small>
                            <small>Size : <?php echo $key['casize']; ?></small>
                        </td>
                        <td class="cart_avail">
                            <span class="label label-success">Earn Amples : <?php echo (int)strip_tags($key['earned_amples']); ?></span>
                            <span class="label label-success">Redeem Amples : <?php echo (int)strip_tags($key['apply_amples']); ?></span>
                        </td>
                        <td class="cart_pickup_delivery">
                            <strong>&nbsp; &nbsp; &nbsp; &nbsp; <input type="radio"
                                                                       id="vdrpickupdivadr<?php echo $keycount; ?>"
                                                                       value="vdrpickupadr<?php echo $keycount; ?>"
                                                                       onclick="openvendoraddress(this.value,document.getElementById('cstdelverdivadr<?php echo $keycount; ?>').value);"
                                                                       name="pickdelivery<?php echo $keycount; ?>"></input>Pickup
                                &nbsp; &nbsp; &nbsp; <input type="radio" id="cstdelverdivadr<?php echo $keycount; ?>"
                                                            value="cstdelveradr<?php echo $keycount; ?>"
                                                            onclick="opencustomeraddress(this.value,document.getElementById('vdrpickupdivadr<?php echo $keycount; ?>').value);"
                                                            name="pickdelivery<?php echo $keycount; ?>"></input>Delivery</strong>
                            <br/>
                            <div id="vdrpickupadr<?php echo $keycount; ?>"
                                 style="display:none;"><?php if (mysqli_num_rows($vpb_check_itemsdata) > 0) {
                                    while ($vendoradrkey = mysqli_fetch_assoc($vpb_check_vendoraddress)) {
                                        if ($vendoradrkey['adr_vdr_id'] == $key['vadrid']) { ?><input type="radio"
                                                                                                      name="vendor_address<?php echo $keycount; ?>"> <?php echo $vendoradrkey['adr_street_line1'] . ", " . $vendoradrkey['adr_city'] . ", " . $vendoradrkey['adr_state'] . ", " . $vendoradrkey['adr_country'] . "-" . $vendoradrkey['adr_zip']; ?> </input> <?php echo "<br />";
                                        }
                                    }
                                } ?></div>
                            <div id="cstdelveradr<?php echo $keycount; ?>"
                                 style="display:none;"><?php if (!empty($vpb_get_useraddress['address']) && !empty($vpb_get_useraddress['user_city']) && !empty($vpb_get_useraddress['user_state']) && !empty($vpb_get_useraddress['zip_code'])) { ?>
                                <input type="radio"
                                       name="vendor_address<?php echo $keycount; ?>"> <?php echo $vpb_get_useraddress['address'] . ", " . $vpb_get_useraddress['user_city'] . ", " . $vpb_get_useraddress['user_state'] . ", " . $vpb_get_useraddress['user_country'] . "-" . $vpb_get_useraddress['zip_code']; ?></input><?php } else {
                                    echo "Sorry! You don't have a complete address information within your account.";
                                } ?></div>
                        </td>
                        <td class="price">
                            <span><?php echo $currencySymbol; ?> <?php if ((strip_tags($key['apply_amples']) == 0.00) && (strip_tags($key['newprice_byamples']) == 0.00)) {
                                    echo $key['item_single_amount'];
                                } else {
                                    echo strip_tags($key['newprice_byamples']);
                                } ?></span></td>
                        <td class="qty">
                            <input class="form-control input-sm" type="text" value="<?php echo $key['item_quant']; ?>"
                                   disabled readonly/>
                            <?php if ((strip_tags($key['apply_amples']) == 0.00) && (strip_tags($key['newprice_byamples']) == 0.00)) { ?>
                                <a href="javascript:void(0);"
                                   onclick="vpb_add_to_cart('<?php echo strip_tags($key['item_name']); ?>','<?php echo strip_tags($key['pid']); ?>','<?php echo strip_tags($vpb_get_productdata['min_order_quantity']); ?>','<?php echo strip_tags($key['item_single_amount']); ?>','<?php if (!empty($key['earned_amples'])) {
                                       echo $key['earned_amples'];
                                   } else {
                                       echo "0.00";
                                   } ?>','<?php if (!empty($vpb_get_useraddress['total_ample'])) {
                                       echo $vpb_get_useraddress['total_ample'];
                                   } else {
                                       echo "0.00";
                                   } ?>','<?php echo $uskid; ?>','<?php echo strip_tags($key['vadrid']); ?>','add');"><i
                                            class="fa fa-caret-up"></i></a>
                                <a href="javascript:void(0);"
                                   onclick="vpb_dcre_from_cart('<?php echo strip_tags($key['item_name']); ?>','<?php echo strip_tags($key['pid']); ?>','<?php echo strip_tags($vpb_get_productdata['min_order_quantity']); ?>','<?php echo strip_tags($key['item_single_amount']); ?>','<?php echo $uskid; ?>','del');"><i
                                            class="fa fa-caret-down"></i></a>
                            <?php } ?>
                        </td>
                        <td class="price">
                            <span><?php echo $currencySymbol; ?> <?php echo($key['item_price']); ?></span>
                        </td>
                        <td class="action">
                            <a href="javascript:void(0);"
                               onclick="remove_this_item('<?php echo $key['pid']; ?>', '<?php echo $uskid; ?>');">Delete
                                item</a>
                        </td>
                    </tr>


                    <?php $keycount++;
                }
            } else {
                echo "<tr> <td> No Item Available in My Cart </td> </tr>";
            } ?>


            <?php

        }
    } else if ($_POST['page'] == "decrement_this_item") //Remove a specific item from the cart
    {

        $uskid = $_POST['usrmaid'];

        $without_ample = 0;

        if (isset($_POST['is_without_ample']) && !empty($_POST['is_without_ample']) && $_POST['is_without_ample'] == 1) {

            $without_ample = $_POST['is_without_ample'];

        }

        if (!empty($uskid)) {
            $vpb_check_items = mysqli_query($con, "select * from `products_added` where `customer_Id` = '" . mysqli_real_escape_string($con, $uskid) . "' and `item_added` = '" . mysqli_real_escape_string($con, $_POST['item_name']) . "' and `without_ample` = $without_ample and `is_purchased` = 0");

        } else {
            $vpb_check_items = mysqli_query($con, "select * from `products_added` where `username` = '" . mysqli_real_escape_string($con, $_SESSION["REMOTE_ADDR"]) . "' and `item_added` = '" . mysqli_real_escape_string($con, $_POST['item_name']) . "' and `without_ample` = $without_ample and `is_purchased` = 0");
        }

        $vpb_get_items = mysqli_fetch_array($vpb_check_items);
        $item_quantity = strip_tags($vpb_get_items["quantity"]) - strip_tags($_POST['quant']);
        $item_amount = number_format(($item_quantity * strip_tags($_POST['item_price'])), 2, '.', '');
        $itemid = strip_tags($vpb_get_items["id"]);

        //Update products_added's table to avoid repetition of a specified item and increment items quantity and amount to display new info
        if ($vpb_get_items["quantity"] > 1) {
            if (!empty($uskid)) {
                mysqli_query($con, "update `products_added` set `quantity` = '" . mysqli_real_escape_string($con, $item_quantity) . "', `amount` = '" . mysqli_real_escape_string($con, $item_amount) . "' where `customer_Id` = '" . mysqli_real_escape_string($con, $uskid) . "' and `item_added` = '" . mysqli_real_escape_string($con, $_POST['item_name']) . "' and `is_purchased` = 0 and id = '" . $itemid . "'");
            } else {
                mysqli_query($con, "update `products_added` set `quantity` = '" . mysqli_real_escape_string($con, $item_quantity) . "', `amount` = '" . mysqli_real_escape_string($con, $item_amount) . "' where `username` = '" . mysqli_real_escape_string($con, $_SESSION["REMOTE_ADDR"]) . "' and `item_added` = '" . mysqli_real_escape_string($con, $_POST['item_name']) . "' and `is_purchased` = 0 and id = '" . $itemid . "'");
            }
        }

        if (!empty($uskid)) {
            $vpb_check_items = mysqli_query($con, "select * from `products_added` where `customer_Id` = '" . mysqli_real_escape_string($con, $uskid) . "' and `is_purchased` = 0");
        } else {
            $vpb_check_items = mysqli_query($con, "select * from `products_added` where `username` = '" . mysqli_real_escape_string($con, $_SESSION["REMOTE_ADDR"]) . "' and `is_purchased` = 0");
        }

        if (mysqli_num_rows($vpb_check_items) < 1) {
            ?>

            <?php
        } else {

            $baseurl = (!empty($_SERVER['HTTPS']) ? 'https' : 'http') . '://' . $_SERVER['HTTP_HOST'];

            if (!empty($uskid)) {
                $vpb_check_itemsTotal = mysqli_query($con, "select sum(amount) as `items_total`, sum(quantity) as `items_quant` from `products_added` where `customer_Id` = '" . mysqli_real_escape_string($con, $uskid) . "' and `is_purchased` = 0");
            } else {
                $vpb_check_itemsTotal = mysqli_query($con, "select sum(amount) as `items_total`, sum(quantity) as `items_quant` from `products_added` where `username` = '" . mysqli_real_escape_string($con, $_SESSION["REMOTE_ADDR"]) . "' and `is_purchased` = 0");
            }

            $vpb_get_itemsTotal = mysqli_fetch_array($vpb_check_itemsTotal);
            $groundtotal = ($vpb_get_itemsTotal["items_total"]); //Get total of all added items
            $groundquant = ($vpb_get_itemsTotal["items_quant"]); //Get total of all added items
            $carttotal = number_format($groundtotal, 2);

            ?>

            <?php if (!empty($groundquant) && $groundquant != '') {
                echo $groundquant;
            } else {
                echo "0";
            } ?>###

            <?php
            if (!empty($uskid)) {
                $vpb_check_itemsdata = mysqli_query($con, "select item_added as `item_name`, quantity as `item_quant`, amount as `item_price`, product_id as `pid` from `products_added` where `customer_Id` = '" . mysqli_real_escape_string($con, $uskid) . "' and `is_purchased` = 0");
            } else {
                $vpb_check_itemsdata = mysqli_query($con, "select item_added as `item_name`, quantity as `item_quant`, amount as `item_price`, product_id as `pid` from `products_added` where `username` = '" . mysqli_real_escape_string($con, $_SESSION["REMOTE_ADDR"]) . "' and `is_purchased` = 0");
            }

            if (mysqli_num_rows($vpb_check_itemsdata) > 0) {
                while ($key = mysqli_fetch_assoc($vpb_check_itemsdata)) {

                    //$vpb_check_productimages = mysqli_query($con,"select image_name as `product_image` from product_images where product_id ='".$key['pid']."' and is_primary_image ='1'");
                    $vpb_check_productimages = mysqli_query($con, "select image as `product_image` from products where id ='" . $key['pid'] . "'");
                    $vpb_get_imagedata = mysqli_fetch_array($vpb_check_productimages);

                    ?>
                    <li class="product-info">
                        <div class="p-left">
                            <a href="<?php echo $baseurl . '/productdetail/' . $key['pid']; ?>">
                                <img class="img-responsive"
                                     src="<?php echo cdnUrl('product_images/' . $key['pid'] . '/' . $vpb_get_imagedata['product_image']); ?>"
                                     alt="p10">
                            </a>
                        </div>
                        <div class="p-right">
                            <p class="p-name" id="item-name"><?php echo strip_tags($key['item_name']); ?></p>
                            <p class="p-rice" id="item-quant"><?php echo $currencySymbol; ?> <?php echo strip_tags($key['item_price']); ?></p>
                            <p id="item-price">Qty: <?php echo strip_tags($key['item_quant']); ?></p>
                            <a onclick="remove_this_item('<?php echo $key['pid']; ?>', '<?php echo $uskid; ?>');"
                               href="javascript:void(0);" class="remove_link">Remove</a>
                        </div>
                    </li>
                <?php }
            } ?>

            ###<?php echo $carttotal; ?>###


            <?php

            if (!empty($uskid)) {
                $vpb_check_itemsdata = mysqli_query($con, "select item_added as `item_name`, quantity as `item_quant`, price as `item_single_amount`, amount as `item_price`, cacolor, casize, newprice_byamples, apply_amples, earned_amples, vendor_id as `vadrid`, product_id as `pid` from `products_added` where `customer_Id` = '" . mysqli_real_escape_string($con, $uskid) . "' and `is_purchased` = 0");
            } else {
                $vpb_check_itemsdata = mysqli_query($con, "select item_added as `item_name`, quantity as `item_quant`, price as `item_single_amount`, amount as `item_price`, cacolor, casize, newprice_byamples, apply_amples, earned_amples, vendor_id as `vadrid`, product_id as `pid` from `products_added` where `username` = '" . mysqli_real_escape_string($con, $_SESSION["REMOTE_ADDR"]) . "' and `is_purchased` = 0");
            }

            $keycount = 1;
            if (mysqli_num_rows($vpb_check_itemsdata)) {
                while ($key = mysqli_fetch_assoc($vpb_check_itemsdata)) {

                    $vpb_check_productdata = mysqli_query($con, "select min_order_quantity from products where id ='" . $key['pid'] . "'");
                    $vpb_get_productdata = mysqli_fetch_array($vpb_check_productdata);

                    $vpb_check_productimages = mysqli_query($con, "select image as `product_image` from products where id ='" . $key['pid'] . "'");
                    $vpb_get_imagedata = mysqli_fetch_array($vpb_check_productimages);

                    $vpb_check_vendoraddress = mysqli_query($con, "select * from tbl_vendor_addresses where adr_vdr_id ='" . $key['vadrid'] . "'");

                    $vpb_check_useraddress = mysqli_query($con, "select * from users where user_id ='" . mysqli_real_escape_string($con, $uskid) . "'");
                    $vpb_get_useraddress = mysqli_fetch_array($vpb_check_useraddress);

                    ?>

                    <tr>
                        <td class="cart_product">
                            <a href="<?php echo $baseurl . '/productdetail/' . $key['pid']; ?>"><img
                                        src="<?php echo cdnUrl('product_images/' . $key['pid'] . '/' . $vpb_get_imagedata['product_image']); ?>"
                                        alt="Product"></a>
                        </td>
                        <td class="cart_description">
                            <p class="product-name"><a
                                        href="<?php echo $baseurl . '/index/productdetail/pid/' . '' . $key['pid']; ?>"><?php echo $key['item_name']; ?> </a>
                            </p>
                            <small class="cart_ref">SKU : #123654999</small>
                            <br>
                            <small>Color :
                                <div style="margin:-21px 0px 0px 50px;width:20px;height:20px;background-color:<?php echo $key['cacolor']; ?>;"></div>
                            </small>
                            <small>Size : <?php echo $key['casize']; ?></small>
                        </td>
                        <td class="cart_avail">
                            <span class="label label-success">Earn Amples : <?php echo (int)strip_tags($key['earned_amples']); ?></span>
                            <span class="label label-success">Redeem Amples : <?php echo (int)strip_tags($key['apply_amples']); ?></span>
                        </td>
                        <td class="cart_pickup_delivery">
                            <strong>&nbsp; &nbsp; &nbsp; &nbsp; <input type="radio"
                                                                       id="vdrpickupdivadr<?php echo $keycount; ?>"
                                                                       value="vdrpickupadr<?php echo $keycount; ?>"
                                                                       onclick="openvendoraddress(this.value,document.getElementById('cstdelverdivadr<?php echo $keycount; ?>').value);"
                                                                       name="pickdelivery<?php echo $keycount; ?>"></input>Pickup
                                &nbsp; &nbsp; &nbsp; <input type="radio" id="cstdelverdivadr<?php echo $keycount; ?>"
                                                            value="cstdelveradr<?php echo $keycount; ?>"
                                                            onclick="opencustomeraddress(this.value,document.getElementById('vdrpickupdivadr<?php echo $keycount; ?>').value);"
                                                            name="pickdelivery<?php echo $keycount; ?>"></input>Delivery</strong>
                            <br/>
                            <div id="vdrpickupadr<?php echo $keycount; ?>"
                                 style="display:none;"><?php if (mysqli_num_rows($vpb_check_itemsdata) > 0) {
                                    while ($vendoradrkey = mysqli_fetch_assoc($vpb_check_vendoraddress)) {
                                        if ($vendoradrkey['adr_vdr_id'] == $key['vadrid']) { ?><input type="radio"
                                                                                                      name="vendor_address<?php echo $keycount; ?>"> <?php echo $vendoradrkey['adr_street_line1'] . ", " . $vendoradrkey['adr_city'] . ", " . $vendoradrkey['adr_state'] . ", " . $vendoradrkey['adr_country'] . "-" . $vendoradrkey['adr_zip']; ?> </input> <?php echo "<br />";
                                        }
                                    }
                                } ?></div>
                            <div id="cstdelveradr<?php echo $keycount; ?>"
                                 style="display:none;"><?php if (!empty($vpb_get_useraddress['address']) && !empty($vpb_get_useraddress['user_city']) && !empty($vpb_get_useraddress['user_state']) && !empty($vpb_get_useraddress['zip_code'])) { ?>
                                <input type="radio"
                                       name="vendor_address<?php echo $keycount; ?>"> <?php echo $vpb_get_useraddress['address'] . ", " . $vpb_get_useraddress['user_city'] . ", " . $vpb_get_useraddress['user_state'] . ", " . $vpb_get_useraddress['user_country'] . "-" . $vpb_get_useraddress['zip_code']; ?></input><?php } else {
                                    echo "Sorry! You don't have a complete address information within your account.";
                                } ?></div>
                        </td>
                        <td class="price">
                            <span><?php echo $currencySymbol; ?> <?php if ((strip_tags($key['apply_amples']) == 0.00) && (strip_tags($key['newprice_byamples']) == 0.00)) {
                                    echo $key['item_single_amount'];
                                } else {
                                    echo strip_tags($key['newprice_byamples']);
                                } ?></span></td>
                        <td class="qty">
                            <input class="form-control input-sm" type="text" value="<?php echo $key['item_quant']; ?>"
                                   disabled readonly/>
                            <?php if ((strip_tags($key['apply_amples']) == 0.00) && (strip_tags($key['newprice_byamples']) == 0.00)) { ?>
                                <a href="javascript:void(0);"
                                   onclick="vpb_add_to_cart('<?php echo strip_tags($key['item_name']); ?>','<?php echo strip_tags($key['pid']); ?>','<?php echo strip_tags($vpb_get_productdata['min_order_quantity']); ?>','<?php echo strip_tags($key['item_single_amount']); ?>','<?php if (!empty($key['earned_amples'])) {
                                       echo $key['earned_amples'];
                                   } else {
                                       echo "0.00";
                                   } ?>','<?php if (!empty($vpb_get_useraddress['total_ample'])) {
                                       echo $vpb_get_useraddress['total_ample'];
                                   } else {
                                       echo "0.00";
                                   } ?>','<?php echo $uskid; ?>','<?php echo strip_tags($key['vadrid']); ?>','add');"><i
                                            class="fa fa-caret-up"></i></a>
                                <a href="javascript:void(0);"
                                   onclick="vpb_dcre_from_cart('<?php echo strip_tags($key['item_name']); ?>','<?php echo strip_tags($key['pid']); ?>','<?php echo strip_tags($vpb_get_productdata['min_order_quantity']); ?>','<?php echo strip_tags($key['item_single_amount']); ?>','<?php echo $uskid; ?>','del');"><i
                                            class="fa fa-caret-down"></i></a>
                            <?php } ?>
                        </td>
                        <td class="price">
                            <span><?php echo $currencySymbol; ?> <?php echo($key['item_price']); ?></span>
                        </td>
                        <td class="action">
                            <a href="javascript:void(0);"
                               onclick="remove_this_item('<?php echo $key['pid']; ?>', '<?php echo $uskid; ?>');">Delete
                                item</a>
                        </td>
                    </tr>


                    <?php $keycount++;
                }
            } else {
                echo "<tr> <td> No Item Available in My Cart </td> </tr>";
            } ?>


            <?php

        }
    } else if ($_POST['page'] == "add_to_cart_with_amples") //Add a specific item into cart purchased through user amples
    {

        $uskid = $_POST['usrmaid'];

        if (!empty($uskid)) {
            $vpb_check_items = mysqli_query($con, "select * from `products_added` where `customer_Id` = '" . mysqli_real_escape_string($con, $uskid) . "' and `item_added` = '" . mysqli_real_escape_string($con, $_POST['item_name']) . "' and `is_purchased` = 0 and `without_ample` = 0");
            //echo("select * from `products_added` where `customer_Id` = '".mysqli_real_escape_string($con,$uskid)."' and `item_added` = '".mysqli_real_escape_string($con,$_POST['item_name'])."' and `is_purchased` = 0");
            //echo $v=mysqli_num_rows($vpb_check_items);
        }

        $productNumRow = mysqli_num_rows($vpb_check_items);

        $vpb_get_items = mysqli_fetch_array($vpb_check_items);


        if ($productNumRow > 0) {

            //$item_price_byample = strip_tags($vpb_get_items["newprice_byamples"]);


            if ($productNumRow == 1 && $vpb_get_items['is_purchased'] == 0) {
                $myTotalprice = number_format((strip_tags($_POST['quant']) * strip_tags($_POST['item_price'])), 2, '.', '');

                $pricebyample = number_format((strip_tags($_POST['quant']) * strip_tags($_POST['usrnewitem_pricebyamples'])), 2, '.', '');

                $chekPrice = $myTotalprice - $pricebyample;


                if ($chekPrice == 0.00) {


                    $itemid = strip_tags($vpb_get_items["id"]);

                    $total_amount = number_format((strip_tags($_POST['quant']) * strip_tags($_POST['usrnewitem_pricebyamples'])), 2, '.', '');

                    $usr_applied_amples = number_format(strip_tags($_POST['usr_applied_amples']), 2, '.', '');

                    $new_total_amples = number_format((strip_tags($_POST['usr_total_amples']) - strip_tags($_POST['usr_applied_amples'])), 2, '.', '');

                    mysqli_query($con, "update `products_added` set `quantity` = '" . mysqli_real_escape_string($con, $_POST['quant']) . "', `amount` = '" . mysqli_real_escape_string($con, $total_amount) . "', `newprice_byamples` = '0.00', `apply_amples` = '0.00',`earned_amples` = '" . mysqli_real_escape_string($con, $_POST['earn_amples']) . "',`usr_total_amples` = '" . mysqli_real_escape_string($con, $_POST['usr_total_amples']) . "' where `customer_Id` = '" . mysqli_real_escape_string($con, $uskid) . "' and `item_added` = '" . mysqli_real_escape_string($con, $_POST['item_name']) . "' and `is_purchased` = 0 and `without_ample` = 0 and id = '" . $itemid . "'");

                    //echo("update `products_added` set `quantity` = '".mysqli_real_escape_string($con,$item_quantitynew)."', `amount` = '".mysqli_real_escape_string($con,$item_amountnew)."', `newprice_byamples` = '".mysqli_real_escape_string($con,$item_newprice_bytotalamples)."', `apply_amples` = '".mysqli_real_escape_string($con,$usr_applied_amples)."', `user_total_amples` = '".mysqli_real_escape_string($con,$_POST['usr_total_amples'])."' where `customer_Id` = '".mysqli_real_escape_string($con,$uskid)."' and `item_added` = '".mysqli_real_escape_string($con,$_POST['item_name'])."' and `is_purchased` = 0 and id = '".$itemid."'");

                    //    echo("update `products_added` set `quantity` = '".mysqli_real_escape_string($con,$item_quantitynew)."', `amount` = '".mysqli_real_escape_string($con,$total_amount)."', `newprice_byamples` = '".mysqli_real_escape_string($con,$item_newprice_bytotalamples)."', `apply_amples` = '".mysqli_real_escape_string($con,$usr_applied_amples)."', `user_total_amples` = '".mysqli_real_escape_string($con,$_POST['usr_total_amples'])."' where `customer_Id` = '".mysqli_real_escape_string($con,$uskid)."' and `item_added` = '".mysqli_real_escape_string($con,$_POST['item_name'])."' and `is_purchased` = 0 and id = '".$itemid."'");

                    mysqli_query($con, "update `users` set `total_ample` = '" . mysqli_real_escape_string($con, $new_total_amples) . "' where `user_id` = '" . mysqli_real_escape_string($con, $uskid) . "'");

                } else {


                    $itemid = strip_tags($vpb_get_items["id"]);

                    $total_amount = number_format(strip_tags($_POST['usrnewitem_pricebyamples']), 2, '.', '');

                    $usr_applied_amples = number_format(strip_tags($_POST['usr_applied_amples']), 2, '.', '');

                    $new_total_amples = number_format((strip_tags($_POST['usr_total_amples']) - strip_tags($_POST['usr_applied_amples'])), 2, '.', '');

                    mysqli_query($con, "update `products_added` set `quantity` = '" . mysqli_real_escape_string($con, $_POST['quant']) . "', `amount` = '" . mysqli_real_escape_string($con, $total_amount) . "', `newprice_byamples` = '" . mysqli_real_escape_string($con, $_POST['usrnewitem_pricebyamples']) . "', `apply_amples` = '" . mysqli_real_escape_string($con, $usr_applied_amples) . "',`earned_amples` = '" . mysqli_real_escape_string($con, $_POST['earn_amples']) . "',`usr_total_amples` = '" . mysqli_real_escape_string($con, $_POST['usr_total_amples']) . "' where `customer_Id` = '" . mysqli_real_escape_string($con, $uskid) . "' and `item_added` = '" . mysqli_real_escape_string($con, $_POST['item_name']) . "' and `is_purchased` = 0 and `without_ample` = 0 and id = '" . $itemid . "'");

                    //echo("update `products_added` set `quantity` = '".mysqli_real_escape_string($con,$item_quantitynew)."', `amount` = '".mysqli_real_escape_string($con,$item_amountnew)."', `newprice_byamples` = '".mysqli_real_escape_string($con,$item_newprice_bytotalamples)."', `apply_amples` = '".mysqli_real_escape_string($con,$usr_applied_amples)."', `user_total_amples` = '".mysqli_real_escape_string($con,$_POST['usr_total_amples'])."' where `customer_Id` = '".mysqli_real_escape_string($con,$uskid)."' and `item_added` = '".mysqli_real_escape_string($con,$_POST['item_name'])."' and `is_purchased` = 0 and id = '".$itemid."'");

                    //    echo("update `products_added` set `quantity` = '".mysqli_real_escape_string($con,$item_quantitynew)."', `amount` = '".mysqli_real_escape_string($con,$total_amount)."', `newprice_byamples` = '".mysqli_real_escape_string($con,$item_newprice_bytotalamples)."', `apply_amples` = '".mysqli_real_escape_string($con,$usr_applied_amples)."', `user_total_amples` = '".mysqli_real_escape_string($con,$_POST['usr_total_amples'])."' where `customer_Id` = '".mysqli_real_escape_string($con,$uskid)."' and `item_added` = '".mysqli_real_escape_string($con,$_POST['item_name'])."' and `is_purchased` = 0 and id = '".$itemid."'");

                    mysqli_query($con, "update `users` set `total_ample` = '" . mysqli_real_escape_string($con, $new_total_amples) . "' where `user_id` = '" . mysqli_real_escape_string($con, $uskid) . "'");

                }


            } else {
                //Do Nothing
            }

        } else {

            $item_newprice_byample = (strip_tags($_POST['item_price']) - strip_tags($_POST['usrnewitem_pricebyamples']));

            if ($item_newprice_byample == 0.00) {

                $total_amount = '0.00';
                $myNewPriceByAmple = '0.00';

            } else {

                $total_amount = number_format(strip_tags($_POST['usrnewitem_pricebyamples']), 2, '.', '');
                $myNewPriceByAmple = $_POST['usrnewitem_pricebyamples'];

            }

            $usr_applied_amples = number_format(strip_tags($_POST['usr_applied_amples']), 2, '.', '');
            $new_total_amples = number_format((strip_tags($_POST['usr_total_amples']) - strip_tags($_POST['usr_applied_amples'])), 2, '.', '');

            mysqli_query($con, "insert into `products_added` (`username`,`item_added`,`price`,`quantity`,`amount`,`newprice_byamples`,`apply_amples`,`earned_amples`,`usr_total_amples`,`cacolor`,`casize`,`is_purchased`,`date`,`customer_Id`,`vendor_id`,`product_id`,`order_id`,`delivery-type`)values('" . mysqli_real_escape_string($con, $_SESSION["REMOTE_ADDR"]) . "', '" . mysqli_real_escape_string($con, $_POST['item_name']) . "', '" . mysqli_real_escape_string($con, $_POST['item_price']) . "', '" . mysqli_real_escape_string($con, $_POST['quant']) . "', '" . mysqli_real_escape_string($con, $total_amount) . "', '" . mysqli_real_escape_string($con, $myNewPriceByAmple) . "', '" . mysqli_real_escape_string($con, $usr_applied_amples) . "', '" . mysqli_real_escape_string($con, $_POST['earn_amples']) . "', '" . mysqli_real_escape_string($con, $_POST['usr_total_amples']) . "', '', '', '', '" . mysqli_real_escape_string($con, date("d-m-Y")) . "', '" . mysqli_real_escape_string($con, $_POST['usrmaid']) . "', '" . mysqli_real_escape_string($con, $_POST['vdrmaid']) . "', '" . mysqli_real_escape_string($con, $_POST['prod_id']) . "','0','0')");
            //echo("insert into `products_added` values('".mysqli_real_escape_string($con,$_SESSION["REMOTE_ADDR"])."', '".mysqli_real_escape_string($con,$_POST['item_name'])."', '".mysqli_real_escape_string($con,$_POST['item_price'])."', '".mysqli_real_escape_string($con,$_POST['quant'])."', '".mysqli_real_escape_string($con,$total_amount)."', '".mysqli_real_escape_string($con,$_POST['usrnewitem_pricebyamples'])."', '".mysqli_real_escape_string($con,$usr_applied_amples)."', '".mysqli_real_escape_string($con,$_POST['earn_amples'])."', '".mysqli_real_escape_string($con,$_POST['usr_total_amples'])."', '', '', '', '".mysqli_real_escape_string($con,date("d-m-Y"))."', '".mysqli_real_escape_string($con,$_POST['usrmaid'])."', '".mysqli_real_escape_string($con,$_POST['vdrmaid'])."', '".mysqli_real_escape_string($con,$_POST['prod_id'])."', '0')");

            mysqli_query($con, "update `users` set `total_ample` = '" . mysqli_real_escape_string($con, $new_total_amples) . "' where `user_id` = '" . mysqli_real_escape_string($con, $uskid) . "'");

        }


        if (!empty($uskid)) {
            $vpb_check_items = mysqli_query($con, "select * from `products_added` where `customer_Id` = '" . mysqli_real_escape_string($con, $uskid) . "' and `is_purchased` = 0");
        }

        if (mysqli_num_rows($vpb_check_items) < 1) {
            ?>

            <?php
        } else {

            $baseurl = (!empty($_SERVER['HTTPS']) ? 'https' : 'http') . '://' . $_SERVER['HTTP_HOST'];

            if (!empty($uskid)) {
                $vpb_check_itemsTotal = mysqli_query($con, "select sum(amount) as `items_total`, sum(quantity) as `items_quant` from `products_added` where `customer_Id` = '" . mysqli_real_escape_string($con, $uskid) . "' and `is_purchased` = 0");
                //    echo("select sum(amount) as `items_total`, sum(quantity) as `items_quant` from `products_added` where `customer_Id` = '".mysqli_real_escape_string($con,$uskid)."' and `is_purchased` = 0");
                $vpb_check_usramples = mysqli_query($con, "select total_ample from `users` where `user_id` = '" . mysqli_real_escape_string($con, $uskid) . "'");
            }

            $vpb_get_itemsTotal = mysqli_fetch_array($vpb_check_itemsTotal);
            $vpb_get_usramples = mysqli_fetch_array($vpb_check_usramples);
            $groundtotal = ($vpb_get_itemsTotal["items_total"]); //Get total of all added items
            $groundquant = ($vpb_get_itemsTotal["items_quant"]); //Get total of all added items
            $carttotal = number_format($groundtotal, 2);
            $usertotalamples = ($vpb_get_usramples["total_ample"]);

            ?>

            <?php if (!empty($groundquant) && $groundquant != '') {
                echo $groundquant;
            } else {
                echo "0";
            } ?>###

            <?php
            if (!empty($uskid)) {

                $vpb_check_itemsdata = mysqli_query($con, "select item_added as `item_name`, quantity as `item_quant`, amount as `item_price`, product_id as `pid` from `products_added` where `customer_Id` = '" . mysqli_real_escape_string($con, $uskid) . "' and `is_purchased` = 0");
                //echo("select item_added as `item_name`, quantity as `item_quant`, amount as `item_price`, product_id as `pid` from `products_added` where `customer_Id` = '".mysqli_real_escape_string($con,$uskid)."' and `is_purchased` = 0");
            } else {
                $vpb_check_itemsdata = mysqli_query($con, "select item_added as `item_name`, quantity as `item_quant`, amount as `item_price`, product_id as `pid` from `products_added` where `username` = '" . mysqli_real_escape_string($con, $_SESSION["REMOTE_ADDR"]) . "' and `is_purchased` = 0");
            }

            if (mysqli_num_rows($vpb_check_itemsdata) > 0) {
                while ($key = mysqli_fetch_assoc($vpb_check_itemsdata)) {

                    //$vpb_check_productimages = mysqli_query($con,"select image_name as `product_image` from product_images where product_id ='".$key['pid']."' and is_primary_image ='1'");
                    $vpb_check_productimages = mysqli_query($con, "select image as `product_image` from products where id ='" . $key['pid'] . "'");
                    $vpb_get_imagedata = mysqli_fetch_array($vpb_check_productimages);

                    ?>
                    <li class="product-info">
                        <div class="p-left">
                            <a href="<?php echo $baseurl . '/productdetail/' . $key['pid']; ?>">
                                <img class="img-responsive"
                                     src="<?php echo cdnUrl('product_images/' . $key['pid'] . '/' . $vpb_get_imagedata['product_image']); ?>"
                                     alt="p10">
                            </a>
                        </div>
                        <div class="p-right">
                            <p class="p-name" id="item-name"><?php echo strip_tags($key['item_name']); ?></p>
                            <p class="p-rice" id="item-quant"><?php echo $currencySymbol; ?> <?php echo strip_tags($key['item_price']); ?></p>
                            <p id="item-price">Qty: <?php echo strip_tags($key['item_quant']); ?></p>
                            <a onclick="remove_this_item('<?php echo $key['pid']; ?>', '<?php echo $uskid; ?>');"
                               href="javascript:void(0);" class="remove_link">Remove</a>
                        </div>
                    </li>
                <?php }
            } ?>

            ###<?php echo $carttotal . 'm!K!B0T' . (int)$usertotalamples; ?>###


            <?php

            if (!empty($uskid)) {
                $vpb_check_itemsdata = mysqli_query($con, "select item_added as `item_name`, quantity as `item_quant`, price as `item_single_amount`, amount as `item_price`, cacolor, casize, product_id as `pid` from `products_added` where `customer_Id` = '" . mysqli_real_escape_string($con, $uskid) . "' and `is_purchased` = 0");
            } else {
                $vpb_check_itemsdata = mysqli_query($con, "select item_added as `item_name`, quantity as `item_quant`, price as `item_single_amount`, amount as `item_price`, cacolor, casize, product_id as `pid` from `products_added` where `username` = '" . mysqli_real_escape_string($con, $_SESSION["REMOTE_ADDR"]) . "' and `is_purchased` = 0");
            }
            $keycount = 1;
            if (mysqli_num_rows($vpb_check_itemsdata)) {
                while ($key = mysqli_fetch_assoc($vpb_check_itemsdata)) {

                    $vpb_check_productdata = mysqli_query($con, "select min_order_quantity from products where id ='" . $key['pid'] . "'");
                    $vpb_get_productdata = mysqli_fetch_array($vpb_check_productdata);

                    $vpb_check_productimages = mysqli_query($con, "select image as `product_image` from products where id ='" . $key['pid'] . "'");
                    $vpb_get_imagedata = mysqli_fetch_array($vpb_check_productimages);
                    $vpb_check_vendoraddress = mysqli_query($con, "select * from tbl_vendor_addresses where adr_vdr_id ='" . $key['vadrid'] . "'");

                    $vpb_check_useraddress = mysqli_query($con, "select * from users where user_id ='" . mysqli_real_escape_string($con, $uskid) . "'");
                    $vpb_get_useraddress = mysqli_fetch_array($vpb_check_useraddress);

                    ?>

                    <tr>
                        <td class="cart_product">
                            <a href="<?php echo $baseurl . '/productdetail/' . $key['pid']; ?>"><img
                                        src="<?php echo cdnUrl('product_images/' . $key['pid'] . '/' . $vpb_get_imagedata['product_image']); ?>"
                                        alt="Product"></a>
                        </td>
                        <td class="cart_description">
                            <p class="product-name"><a
                                        href="<?php echo $baseurl . '/productdetail/' . $key['pid']; ?>"><?php echo $key['item_name']; ?> </a>
                            </p>
                            <small class="cart_ref">SKU : #123654999</small>
                            <br>
                            <small>Color :
                                <div style="margin:-21px 0px 0px 50px;width:20px;height:20px;background-color:<?php echo $key['cacolor']; ?>;"></div>
                            </small>
                            <small>Size : <?php echo $key['casize']; ?></small>
                        </td>
                        <td class="cart_avail"><span class="label label-success">In stock</span></td>
                        <td class="price"><span><?php echo $currencySymbol; ?> <?php echo $key['item_single_amount']; ?></span></td>
                        <td class="qty">
                            <input class="form-control input-sm" type="text" value="<?php echo $key['item_quant']; ?>"
                                   disabled readonly/>
                            <a href="javascript:void(0);"
                               onclick="vpb_add_to_cart('<?php echo strip_tags($key['item_name']); ?>','<?php echo strip_tags($key['pid']); ?>','<?php echo strip_tags($vpb_get_productdata['min_order_quantity']); ?>','<?php echo strip_tags($key['item_single_amount']); ?>','<?php echo $uskid; ?>','add');"><i
                                        class="fa fa-caret-up"></i></a>
                            <a href="javascript:void(0);"
                               onclick="vpb_dcre_from_cart('<?php echo strip_tags($key['item_name']); ?>','<?php echo strip_tags($key['pid']); ?>','<?php echo strip_tags($vpb_get_productdata['min_order_quantity']); ?>','<?php echo strip_tags($key['item_single_amount']); ?>','<?php echo $uskid; ?>','del');"><i
                                        class="fa fa-caret-down"></i></a>
                        </td>
                        <td class="price">
                            <span><?php echo $currencySymbol; ?> <?php echo($key['item_price']); ?></span>
                        </td>
                        <td class="action">
                            <a href="javascript:void(0);"
                               onclick="remove_this_item('<?php echo $key['pid']; ?>', '<?php echo $uskid; ?>');">Delete
                                item</a>
                        </td>
                    </tr>

                    <?php $keycount++; ?>
                <?php }
            } else {
                echo "<tr> <td> No Item Available in My Cart </td> </tr>";
            } ?>


            <?php

        }
    } else {
        //The below code performs Add to Cart process and as well displays the cart status

        //Check for valid item name and item price to add a specified item to cart
        if (isset($_POST['item_name']) && !empty($_POST['item_name']) && isset($_POST['prod_id']) && !empty($_POST['prod_id']) && isset($_POST['quant']) && !empty($_POST['quant']) && isset($_POST['item_price']) && !empty($_POST['item_price'])) {
            //Check if a specified user has already added a specified item to cart by checking the database products_added's table
            $uskid = $_POST['usrmaid'];

            $without_ample = 0;

            if (isset($_POST['is_without_ample']) && !empty($_POST['is_without_ample']) && $_POST['is_without_ample'] == 1) {

                $without_ample = $_POST['is_without_ample'];

            }

            if (empty($uskid)) {

                $vpb_check_items = mysqli_query($con, "select * from `products_added` where `username` = '" . mysqli_real_escape_string($con, $_SESSION["REMOTE_ADDR"]) . "' and `item_added` = '" . mysqli_real_escape_string($con, $_POST['item_name']) . "' and `is_purchased` = 0 and `without_ample` = $without_ample");
                //echo $che =("select * from `products_added` where `username` = '".mysqli_real_escape_string($con,$_SESSION["REMOTE_ADDR"])."' and `item_added` = '".mysqli_real_escape_string($con,$_POST['item_name'])."' and `is_purchased` = 0");
            } else {
                $vpb_check_items = mysqli_query($con, "select * from `products_added` where `item_added` = '" . mysqli_real_escape_string($con, $_POST['item_name']) . "' and `customer_Id` = '" . mysqli_real_escape_string($con, $uskid) . "' and `is_purchased` = 0 and `without_ample` = $without_ample");
            }
            //If the specified user has not already added the specified item to database products_added's table

            if (mysqli_num_rows($vpb_check_items) < 1) {
                //Add the specified item to the database products_added's table now
                $tota_amount = number_format((strip_tags($_POST['item_price']) * strip_tags($_POST['quant'])), 2, '.', '');

                mysqli_query($con, "insert into `products_added` (`username`,`item_added`,`price`,`quantity`,`amount`,`newprice_byamples`,`apply_amples`,`earned_amples`,`usr_total_amples`,`cacolor`,`casize`,`is_purchased`,`date`,`customer_Id`,`vendor_id`,`product_id`,`order_id`,`delivery-type`,`without_ample`)values('" . mysqli_real_escape_string($con, $_SESSION["REMOTE_ADDR"]) . "', '" . mysqli_real_escape_string($con, $_POST['item_name']) . "', '" . mysqli_real_escape_string($con, $_POST['item_price']) . "', '" . mysqli_real_escape_string($con, $_POST['quant']) . "', '" . mysqli_real_escape_string($con, $tota_amount) . "', '0.00', '0.00', '" . mysqli_real_escape_string($con, $_POST['earn_amples']) . "', '" . mysqli_real_escape_string($con, $_POST['usr_tot_amples']) . "', '', '', '0', '" . mysqli_real_escape_string($con, date("d-m-Y")) . "', '" . mysqli_real_escape_string($con, $_POST['usrmaid']) . "', '" . mysqli_real_escape_string($con, $_POST['vdrmaid']) . "', '" . mysqli_real_escape_string($con, $_POST['prod_id']) . "','0','0','$without_ample')");
                //echo("insert into `products_added` (`username`,`item_added`,`price`,`quantity`,`amount`,`newprice_byamples`,`apply_amples`,`earned_amples`,`usr_total_amples`,`cacolor`,`casize`,`is_purchased`,`date`,`vendor_id`,`product_id`,`order_id`,`delivery-type`)values('".$_SESSION["REMOTE_ADDR"]."', '".$_POST['item_name']."', '".$_POST['item_price']."', '".$_POST['quant']."', '".$tota_amount."', '0.00', '0.00', '".$_POST['earn_amples']."', '".$_POST['usr_tot_amples']."', '', '', '0', '".date("d-m-Y")."', '".$_POST['usrmaid']."', '".$_POST['vdrmaid']."', '".$_POST['prod_id']."', '0')");
                //insert into `products_added`(`username`,`item_added`,`price`,`quantity`,`amount`,`newprice_byamples`,`apply_amples`,`earned_amples`,`usr_total_amples`,`cacolor`,`casize`,`is_purchased`,`date`,`vendor_id`,`product_id`,`order_id`,`delivery-type`)values('cu756vdj08buuvchs3fo1jc4q4', 'Abilene Swirl Embroidered Mesh Dress', '338.00', '1', '338.00', '0.00', '0.00', '845.00', '0.00', '', '', '0', '13-09-2016', '0', '48', '319', '0')
                //    echo("insert into `products_added` values('', '".mysqli_real_escape_string($con,$_SESSION["REMOTE_ADDR"])."', '".mysqli_real_escape_string($con,$_POST['item_name'])."', '".mysqli_real_escape_string($con,$_POST['item_price'])."', '".mysqli_real_escape_string($con,$_POST['quant'])."', '".mysqli_real_escape_string($con,$tota_amount)."', '0.00', '0.00', '".mysqli_real_escape_string($con,$_POST['earn_amples'])."', '".mysqli_real_escape_string($con,$_POST['usr_tot_amples'])."', '', '', '0', '".mysqli_real_escape_string($con,date("d-m-Y"))."', '".mysqli_real_escape_string($con,$_POST['usrmaid'])."', '".mysqli_real_escape_string($con,$_POST['vdrmaid'])."', '".mysqli_real_escape_string($con,$_POST['prod_id'])."', '0')");
                //Check all the items that the specified user has added to the database products_added's table
                if (!empty($uskid)) {
                    $vpb_check_all_items = mysqli_query($con, "select * from `products_added` where `customer_Id` = '" . mysqli_real_escape_string($con, $uskid) . "' and `is_purchased` = 0 order by `id` asc");
                } else {
                    $vpb_check_all_items = mysqli_query($con, "select * from `products_added` where `username` = '" . mysqli_real_escape_string($con, $_SESSION["REMOTE_ADDR"]) . "' and `is_purchased` = 0 order by `id` asc");
                }


                //If no product has been added still, display a no product added to cart message to the specified user
                if (mysqli_num_rows($vpb_check_all_items) < 1) {
                    ?>

                    <?php
                } else {
                    $baseurl = (!empty($_SERVER['HTTPS']) ? 'https' : 'http') . '://' . $_SERVER['HTTP_HOST'];

                    //Check the databse products_added's table and sum up the total of all added items to cart
                    if (!empty($uskid)) {
                        $vpb_check_itemsTotal = mysqli_query($con, "select sum(amount) as `items_total`,sum(quantity) as `items_quant` from `products_added` where `customer_Id` = '" . mysqli_real_escape_string($con, $uskid) . "' and `is_purchased` = 0");
                    } else {
                        $vpb_check_itemsTotal = mysqli_query($con, "select sum(amount) as `items_total`,sum(quantity) as `items_quant` from `products_added` where `username` = '" . mysqli_real_escape_string($con, $_SESSION["REMOTE_ADDR"]) . "' and `is_purchased` = 0");
                    }

                    //Get all these items
                    $vpb_get_itemsTotal = mysqli_fetch_array($vpb_check_itemsTotal);
                    $groundtotal = ($vpb_get_itemsTotal["items_total"]); //Get total of all added items
                    $groundquant = ($vpb_get_itemsTotal["items_quant"]); //Get total of all added items
                    $carttotal = number_format($groundtotal, 2);

                    ?>

                    <?php echo $groundquant; ?>###

                    <?php

                    if (!empty($uskid)) {
                        $vpb_check_itemsdata = mysqli_query($con, "select item_added as `item_name`, quantity as `item_quant`, amount as `item_price`, product_id as `pid` from `products_added` where `customer_Id` = '" . mysqli_real_escape_string($con, $uskid) . "' and `is_purchased` = 0");
                    } else {
                        $vpb_check_itemsdata = mysqli_query($con, "select item_added as `item_name`, quantity as `item_quant`, amount as `item_price`, product_id as `pid` from `products_added` where `username` = '" . mysqli_real_escape_string($con, $_SESSION["REMOTE_ADDR"]) . "' and `is_purchased` = 0");
                    }

                    if (mysqli_num_rows($vpb_check_itemsdata) > 0) {
                        while ($key = mysqli_fetch_assoc($vpb_check_itemsdata)) {

                            //$vpb_check_productimages = mysqli_query($con,"select image_name as `product_image` from product_images where product_id ='".$key['pid']."' and is_primary_image ='1'");
                            $vpb_check_productimages = mysqli_query($con, "select image as `product_image` from products where id ='" . $key['pid'] . "'");
                            $vpb_get_imagedata = mysqli_fetch_array($vpb_check_productimages);

                            ?>
                            <li class="product-info">
                                <div class="p-left">
                                    <a href="<?php echo $baseurl . '/productdetail/' . $key['pid']; ?>">
                                        <img class="img-responsive"
                                             src="<?php echo cdnUrl('product_images/' . $key['pid'] . '/' . $vpb_get_imagedata['product_image']); ?>"
                                             alt="p10">
                                    </a>
                                </div>
                                <div class="p-right">
                                    <p class="p-name" id="item-name"><?php echo strip_tags($key['item_name']); ?></p>
                                    <p class="p-rice" id="item-quant">
                                        <?php echo $currencySymbol; ?> <?php echo strip_tags($key['item_price']); ?></p>
                                    <p id="item-price">Qty: <?php echo strip_tags($key['item_quant']); ?></p>
                                    <a onclick="remove_this_item('<?php echo $key['pid']; ?>', '<?php echo $uskid; ?>');"
                                       href="javascript:void(0);" class="remove_link">Remove</a>
                                </div>
                            </li>
                        <?php }
                    } ?>

                    ###<?php echo $carttotal; ?>

                    <?php
                }
            } else {
                $vpb_get_items = mysqli_fetch_array($vpb_check_items);
                $item_quantity = strip_tags($vpb_get_items["quantity"]) + strip_tags($_POST['quant']);
                $item_amount = number_format(($item_quantity * strip_tags($_POST['item_price'])), 2, '.', '');
                $itemid = strip_tags($vpb_get_items["id"]);

                //Update products_added's table to avoid repetition of a specified item and increment items quantity and amount to display new info
                if (!empty($uskid)) {
                    mysqli_query($con, "update `products_added` set `quantity` = '" . mysqli_real_escape_string($con, $item_quantity) . "', `amount` = '" . mysqli_real_escape_string($con, $item_amount) . "', `without_ample` = '" . mysqli_real_escape_string($con, $without_ample) . "' where `customer_Id` = '" . mysqli_real_escape_string($con, $uskid) . "' and `item_added` = '" . mysqli_real_escape_string($con, $_POST['item_name']) . "' and `is_purchased` = 0 and `without_ample` = $without_ample and id = '" . $itemid . "'");
                } else {
                    mysqli_query($con, "update `products_added` set `quantity` = '" . mysqli_real_escape_string($con, $item_quantity) . "', `amount` = '" . mysqli_real_escape_string($con, $item_amount) . "', `without_ample` = '" . mysqli_real_escape_string($con, $without_ample) . "' where `username` = '" . mysqli_real_escape_string($con, $_SESSION["REMOTE_ADDR"]) . "' and `item_added` = '" . mysqli_real_escape_string($con, $_POST['item_name']) . "' and `is_purchased` = 0 and `without_ample` = $without_ample and id = '" . $itemid . "'");
                }

                //Check all added items to cart from the database repetition's table to display on the screen to the specified user
                if (!empty($uskid)) {
                    $vpb_check_all_items = mysqli_query($con, "select * from `products_added` where `customer_Id` = '" . mysqli_real_escape_string($con, $uskid) . "' and `is_purchased` = 0 order by `id` asc");

                } else {
                    $vpb_check_all_items = mysqli_query($con, "select * from `products_added` where `username` = '" . mysqli_real_escape_string($con, $_SESSION["REMOTE_ADDR"]) . "' and `is_purchased` = 0 order by `id` asc");
                }

                if (mysqli_num_rows($vpb_check_all_items) < 1)// If no item exist then, display a no item message to the specified user
                {
                    ?>

                    <?php
                } else {
                    $baseurl = (!empty($_SERVER['HTTPS']) ? 'https' : 'http') . '://' . $_SERVER['HTTP_HOST'];

                    //From this point, follow the same comments as specified on the codes above
                    if (!empty($uskid)) {
                        $vpb_check_itemsTotal = mysqli_query($con, "select sum(amount) as `items_total`,sum(quantity) as `items_quant` from `products_added` where `customer_Id` = '" . mysqli_real_escape_string($con, $uskid) . "' and `is_purchased` = 0");
                    } else {
                        $vpb_check_itemsTotal = mysqli_query($con, "select sum(amount) as `items_total`,sum(quantity) as `items_quant` from `products_added` where `username` = '" . mysqli_real_escape_string($con, $_SESSION["REMOTE_ADDR"]) . "' and `is_purchased` = 0");
                    }

                    $vpb_get_itemsTotal = mysqli_fetch_array($vpb_check_itemsTotal);
                    $groundtotal = ($vpb_get_itemsTotal["items_total"]);
                    $groundquant = ($vpb_get_itemsTotal["items_quant"]); //Get total of all added items
                    $carttotal = number_format($groundtotal, 2);

                    ?>

                    <?php echo $groundquant; ?>###

                    <?php

                    if (!empty($uskid)) {
                        $vpb_check_itemsdata = mysqli_query($con, "select item_added as `item_name`, quantity as `item_quant`, amount as `item_price`, product_id as `pid` from `products_added` where `customer_Id` = '" . mysqli_real_escape_string($con, $uskid) . "' and `is_purchased` = 0");
                    } else {
                        $vpb_check_itemsdata = mysqli_query($con, "select item_added as `item_name`, quantity as `item_quant`, amount as `item_price`, product_id as `pid` from `products_added` where `username` = '" . mysqli_real_escape_string($con, $_SESSION["REMOTE_ADDR"]) . "' and `is_purchased` = 0");
                    }

                    if (mysqli_num_rows($vpb_check_itemsdata) > 0) {
                        while ($key = mysqli_fetch_assoc($vpb_check_itemsdata)) {

                            //$vpb_check_productimages = mysqli_query($con,"select image_name as `product_image` from product_images where product_id ='".$key['pid']."' and is_primary_image ='1'");
                            $vpb_check_productimages = mysqli_query($con, "select image as `product_image` from products where id ='" . $key['pid'] . "'");
                            $vpb_get_imagedata = mysqli_fetch_array($vpb_check_productimages);

                            ?>
                            <li class="product-info">
                                <div class="p-left">
                                    <a href="<?php echo $baseurl . '/productdetail/' . $key['pid']; ?>">
                                        <img class="img-responsive"
                                             src="<?php echo cdnUrl('product_images/' . $key['pid'] . '/' . $vpb_get_imagedata['product_image']); ?>"
                                             alt="p10">
                                    </a>
                                </div>
                                <div class="p-right">
                                    <p class="p-name" id="item-name"><?php echo strip_tags($key['item_name']); ?></p>
                                    <p class="p-rice" id="item-quant">
                                        <?php echo $currencySymbol; ?> <?php echo strip_tags($key['item_price']); ?></p>
                                    <p id="item-price">Qty: <?php echo strip_tags($key['item_quant']); ?></p>
                                    <a onclick="remove_this_item('<?php echo $key['pid']; ?>', '<?php echo $uskid; ?>');"
                                       href="javascript:void(0);" class="remove_link">Remove</a>
                                </div>
                            </li>
                        <?php }
                    } ?>

                    ###<?php echo $carttotal; ?>###

                    <?php

                    if (!empty($uskid)) {
                        $vpb_check_itemsdata = mysqli_query($con, "select item_added as `item_name`, quantity as `item_quant`, price as `item_single_amount`, amount as `item_price`, casize, cacolor, newprice_byamples, apply_amples, earned_amples, vendor_id as `vadrid`, product_id as `pid` from `products_added` where `customer_Id` = '" . mysqli_real_escape_string($con, $uskid) . "' and `is_purchased` = 0");
                    } else {
                        $vpb_check_itemsdata = mysqli_query($con, "select item_added as `item_name`, quantity as `item_quant`, price as `item_single_amount`, amount as `item_price`, casize, cacolor, newprice_byamples, apply_amples, earned_amples, vendor_id as `vadrid`, product_id as `pid` from `products_added` where `username` = '" . mysqli_real_escape_string($con, $_SESSION["REMOTE_ADDR"]) . "' and `is_purchased` = 0");
                    }

                    $keycount = 1;
                    if (mysqli_num_rows($vpb_check_itemsdata) > 0) {
                        while ($key = mysqli_fetch_assoc($vpb_check_itemsdata)) {

                            $vpb_check_productdata = mysqli_query($con, "select min_order_quantity from products where id ='" . $key['pid'] . "'");
                            $vpb_get_productdata = mysqli_fetch_array($vpb_check_productdata);

                            //$vpb_check_productimages = mysqli_query($con,"select image_name as `product_image` from product_images where product_id ='".$key['pid']."' and is_primary_image ='1'");
                            $vpb_check_productimages = mysqli_query($con, "select image as `product_image` from products where id ='" . $key['pid'] . "'");
                            $vpb_get_imagedata = mysqli_fetch_array($vpb_check_productimages);

                            $vpb_check_vendoraddress = mysqli_query($con, "select * from tbl_vendor_addresses where adr_vdr_id ='" . $key['vadrid'] . "'");

                            $vpb_check_useraddress = mysqli_query($con, "select * from users where user_id ='" . mysqli_real_escape_string($con, $uskid) . "'");
                            $vpb_get_useraddress = mysqli_fetch_array($vpb_check_useraddress);

                            ?>

                            <tr>
                                <td class="cart_product">
                                    <a href="<?php echo $baseurl . '/productdetail/' . $key['pid']; ?>"><img
                                                src="<?php echo cdnUrl('product_images/' . $key['pid'] . '/' . $vpb_get_imagedata['product_image']); ?>"
                                                alt="Product"></a>
                                </td>
                                <td class="cart_description">
                                    <p class="product-name"><a
                                                href="<?php echo $baseurl . '/productdetail/' . $key['pid']; ?>"><?php echo $key['item_name']; ?> </a>
                                    </p>
                                    <small class="cart_ref">SKU : #123654999</small>
                                    <br>
                                    <small>Color :
                                        <div style="margin:-21px 0px 0px 50px;width:20px;height:20px;background-color:<?php echo $key['cacolor']; ?>;"></div>
                                    </small>
                                    <small>Size : <?php echo $key['casize']; ?></small>
                                </td>
                                <td class="cart_avail">
                                    <span class="label label-success">Earn Amples : <?php echo (int)strip_tags($key['earned_amples']); ?></span>
                                    <span class="label label-success">Redeem Amples : <?php echo (int)strip_tags($key['apply_amples']); ?></span>
                                </td>
                                <td class="cart_pickup_delivery">
                                    <strong>&nbsp; &nbsp; &nbsp; &nbsp; <input type="radio"
                                                                               id="vdrpickupdivadr<?php echo $keycount; ?>"
                                                                               value="vdrpickupadr<?php echo $keycount; ?>"
                                                                               onclick="openvendoraddress(this.value,document.getElementById('cstdelverdivadr<?php echo $keycount; ?>').value);"
                                                                               name="pickdelivery<?php echo $keycount; ?>"></input>Pickup
                                        &nbsp; &nbsp; &nbsp; <input type="radio"
                                                                    id="cstdelverdivadr<?php echo $keycount; ?>"
                                                                    value="cstdelveradr<?php echo $keycount; ?>"
                                                                    onclick="opencustomeraddress(this.value,document.getElementById('vdrpickupdivadr<?php echo $keycount; ?>').value);"
                                                                    name="pickdelivery<?php echo $keycount; ?>"></input>Delivery</strong>
                                    <br/>
                                    <div id="vdrpickupadr<?php echo $keycount; ?>"
                                         style="display:none;"><?php if (mysqli_num_rows($vpb_check_itemsdata) > 0) {
                                            while ($vendoradrkey = mysqli_fetch_assoc($vpb_check_vendoraddress)) {
                                                if ($vendoradrkey['adr_vdr_id'] == $key['vadrid']) { ?><input
                                                    type="radio"
                                                    name="vendor_address<?php echo $keycount; ?>"> <?php echo $vendoradrkey['adr_street_line1'] . ", " . $vendoradrkey['adr_city'] . ", " . $vendoradrkey['adr_state'] . ", " . $vendoradrkey['adr_country'] . "-" . $vendoradrkey['adr_zip']; ?> </input> <?php echo "<br />";
                                                }
                                            }
                                        } ?></div>
                                    <div id="cstdelveradr<?php echo $keycount; ?>"
                                         style="display:none;"><?php if (!empty($vpb_get_useraddress['address']) && !empty($vpb_get_useraddress['user_city']) && !empty($vpb_get_useraddress['user_state']) && !empty($vpb_get_useraddress['zip_code'])) { ?>
                                        <input type="radio"
                                               name="vendor_address<?php echo $keycount; ?>"> <?php echo $vpb_get_useraddress['address'] . ", " . $vpb_get_useraddress['user_city'] . ", " . $vpb_get_useraddress['user_state'] . ", " . $vpb_get_useraddress['user_country'] . "-" . $vpb_get_useraddress['zip_code']; ?></input><?php } else {
                                            echo "Sorry! You don't have a complete address information within your account.";
                                        } ?></div>
                                </td>
                                <td class="price">
                                    <span><?php echo $currencySymbol; ?><?php if ((strip_tags($key['apply_amples']) == 0.00) && (strip_tags($key['newprice_byamples']) == 0.00)) {
                                            echo $key['item_single_amount'];
                                        } else {
                                            echo strip_tags($key['newprice_byamples']);
                                        } ?></span></td>
                                <td class="qty">
                                    <input class="form-control input-sm" type="text"
                                           value="<?php echo $key['item_quant']; ?>" disabled readonly/>
                                    <?php if ((strip_tags($key['apply_amples']) == 0.00) && (strip_tags($key['newprice_byamples']) == 0.00)) { ?>
                                        <a href="javascript:void(0);"
                                           onclick="vpb_add_to_cart('<?php echo strip_tags($key['item_name']); ?>','<?php echo strip_tags($key['pid']); ?>','<?php echo strip_tags($vpb_get_productdata['min_order_quantity']); ?>','<?php echo strip_tags($key['item_single_amount']); ?>','<?php if (!empty($key['earned_amples'])) {
                                               echo $key['earned_amples'];
                                           } else {
                                               echo "0.00";
                                           } ?>','<?php if (!empty($vpb_get_useraddress['total_ample'])) {
                                               echo $vpb_get_useraddress['total_ample'];
                                           } else {
                                               echo "0.00";
                                           } ?>','<?php echo $uskid; ?>','<?php echo strip_tags($key['vadrid']); ?>','add');"><i
                                                    class="fa fa-caret-up"></i></a>
                                        <a href="javascript:void(0);"
                                           onclick="vpb_dcre_from_cart('<?php echo strip_tags($key['item_name']); ?>','<?php echo strip_tags($key['pid']); ?>','<?php echo strip_tags($vpb_get_productdata['min_order_quantity']); ?>','<?php echo strip_tags($key['item_single_amount']); ?>','<?php echo $uskid; ?>','del');"><i
                                                    class="fa fa-caret-down"></i></a>
                                    <?php } ?>
                                </td>
                                <td class="price">
                                    <span><?php echo $currencySymbol; ?> <?php echo($key['item_price']); ?></span>
                                </td>
                                <td class="action">
                                    <a href="javascript:void(0);"
                                       onclick="remove_this_item(<?php echo $key['pid']; ?>, '<?php echo $uskid; ?>');">Delete
                                        item</a>
                                </td>
                            </tr>


                            <?php $keycount++;
                        }
                    } ?>


                    <?php
                }
            }
        } else {
            ?>
            <div id="vpb_shopping_cart_is_currently_empty" align="left">
                Hello There, <br/><br/>No data is passed at the moment. Please try again or contact the site admin to
                report this error message if the problem persist.<br/><br/>Thanks You...
            </div>
            <?php
        }

    }
} else {
    ?>
    <div id="vpb_shopping_cart_is_currently_empty" align="left">
        Hello There, <br/><br/>No data is passed at the moment. Please try again or contact the site admin to report
        this error message if the problem persist.<br/><br/>Thanks You...
    </div>
    <?php
}
?>