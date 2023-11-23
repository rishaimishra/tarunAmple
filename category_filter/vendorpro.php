<?php
    $q = $_GET['q'];

    require("db_config.php");

    //$pro_data = "SELECT products.id as pid,products.product_name as pname,products.vendor_uid as vendor_key,products.single_price as pprice,products.prod_front_fromdate as pfrmdate,products.prod_front_todate as ptodate,products.stock_availability as pstock,quantity,products.min_order_quantity as pminqty,image as img_name,products.deal_type as pdltype,products.product_discount as pdiscount,products.no_of_amples as pamples,products.free_with_amples as pfwamples,products.supplier_name as pvendor, products.discount_price as pdiscountprice FROM products INNER JOIN product_images ON product_images.product_id = products.id WHERE products.status = '1' AND products.vendor_uid = '".$q."' AND product_images.is_primary_image = '1'";
    $pro_data = "SELECT products.id as pid,products.product_name as pname,products.vendor_uid as vendor_key,products.single_price as pprice,products.prod_front_fromdate as pfrmdate,products.prod_front_todate as ptodate,products.stock_availability as pstock,quantity,products.min_order_quantity as pminqty,image as img_name,products.deal_type as pdltype,products.product_discount as pdiscount,products.no_of_amples as pamples,products.free_with_amples as pfwamples,products.supplier_name as pvendor, products.discount_price as pdiscountprice FROM products WHERE products.status = '1' AND products.vendor_uid = '".$q."'";

    $vendor_pro = mysqli_query($con,$pro_data); 


?>

<div>
    <label class="control-label col-md-3 col-sm-3 col-xs-12" ><b>Please select 5 product only</b>  <span class="required">*</span>
    </label>
    <ul class="product-list owl-carousel adver-product-view" data-dots="false" data-loop="true" data-nav = "true" data-margin = "10" data-autoplayTimeout="1000" data-autoplayHoverPause = "true" data-responsive='{"0":{"items":1},"600":{"items":3},"1000":{"items":5}}'>

        <?php $i = 1; while($product = mysqli_fetch_array($vendor_pro)){
            ?> 
            <li>
                <div class="right-block">
                    <h5 class="Butter_aria"><?php
                            echo ucfirst($product['pname']);
                    ?></h5>

                </div>

                <div class="left-block"> 
                    <a href="https://amplepoints.com/productdetail/<?php echo $product['pid']?>">
                        <img class="img-responsive" alt="product" src="https://amplepoints.com/product_images/<?=$product['pid'];?>/<?=$product["img_name"];?>" /></a></div>

                <div class="price_main">
                    <div class="price">
                        <div class="price2">
                            <a href="#">$<?php
                                    echo $product['pprice'];
                            ?></a>
                        </div>
                        <div class="content_price4">Buy & Earn
                            <span> <?php
                                    echo (int) $product['pamples'];
                            ?> </span> 
                            <span>Amples </span>
                            </br> 
                            Free With 
                            <span> <?php
                                    echo (int) $product['pfwamples'];
                            ?> </span> 
                            <span>Amples </span>
                        </div>
                        <div class="price7">
                            Reward value&nbsp;<span>$<?php
                                    echo $product['pdiscountprice'];
                            ?></span>
                            <br>
                        </div>
                        <div class="save5">You Earn&nbsp;
                            <span><?php
                                    echo (int) $product['pdiscount'];
                                ?>%</span>
                        </div>
                        <div class="by_aria"><h6>By:&nbsp;</h6>
                            <a href="https://amplepoints.com/productbyseller/selid/<?=$product['vendor_key'];?>"><?php
                                    echo $product['pvendor'];
                            ?></a> 
                        </div>
                    </div>
                </div>
                <div class="main-checkbox-clcik">
                    <div class="main-checkbox-clcik-inner">
                        <input type="checkbox" onclick="addClassCheck(this)" id="product_<?=$i;?>" name="product[]" value="<?php echo $product["pid"];?>"/>
                        <label for="product_<?=$i;?>"></label>
                    </div>
                </div>
            </li>

            <?php $i++; } ?>

    </ul>
</div>

<?php mysqli_close($con);
?>
