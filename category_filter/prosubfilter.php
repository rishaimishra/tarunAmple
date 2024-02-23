<?php 
    $rootUrl = (!empty($_SERVER['HTTPS']) ? 'https' : 'http') . '://' . $_SERVER['HTTP_HOST'];
     
    $protocol = isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? 'https' : 'http';
    $host = $_SERVER['HTTP_HOST'];
    $script_path = $_SERVER['SCRIPT_NAME'];

    // Extract the directory part from the script path
    $project_path = dirname($script_path);
    $base_url_full = $protocol . '://' . $host . $project_path;
    // Remove "/category_filter"
    $base_url = str_replace("/category_filter", "", $base_url_full);

    require("db_config.php");
    session_start();
    $main = $_GET['mainid'];
    $sub = $_GET['subid'];
    $vendor = $_GET['vendorid'];
    //print_r($_GET);
    
    $selectpro = "SELECT products.id as pid,products.vendor_uid as vendor_key,products.product_type_key,products.product_name as pname,products.single_price as pprice,image as img_name,products.prod_front_fromdate as pfrmdate,products.prod_front_todate as ptodate,products.stock_availability as pstock,quantity,products.min_order_quantity as pminqty,product_images.image_name as pimage,products.deal_type as pdltype,products.product_discount as pdiscount,products.no_of_amples as pamples, products.free_with_amples as pfwamples,products.supplier_name as pvendor, products.discount_price as pdiscountprice FROM  products INNER JOIN tbl_filter_pro ON products.id=tbl_filter_pro.pro_id INNER JOIN tbl_pro_sub_filter ON products.id = tbl_pro_sub_filter.spro_id INNER JOIN product_images ON products.id = product_images.product_id WHERE tbl_filter_pro.main_filter_id='".$main."' AND tbl_pro_sub_filter.sub_filterid='".$sub."' AND svendor_id='".$vendor."' AND products.status = '1' GROUP BY tbl_pro_sub_filter.spro_id";
    $query=mysqli_query($con,$selectpro);
    $count = mysqli_num_rows($query);
    //print_r($data);
    if($count>0){
        while($key=mysqli_fetch_array($query)){
        ?>
        <li class="col-sm-3 product-container">
            <div class="subfil"></div>

            <div class="filter-data">


            <div class="">
                <div class="right-block">
                    <?php

                        if(!empty($vendor) && $vendor == 217) {   

                            $DisplayPname = strip_tags(ucwords($key->pname));

                        }else{

                            $DisplayPname = strip_tags(ucwords(strtolower(substr($key->pname,0,20))));  
                        }

                    ?>
                    <h5 class="Butter_aria"><?php echo $DisplayPname; ?></h5>
                    <?php if($key->pdiscount >= 50){
                            echo "<div class='content_price3'>
                            <h5> Free&nbsp;</h5>
                            <span>with&nbsp;</span>
                            <h6>".$key->pfwamples."</h6> 
                            <span1> Amples</span1>
                            <div class='amp-logo'></div> 
                            </div>";  
                        } else { echo "<div class='price2'>
                            <a href='#'>$".$key->pprice."</a>
                            </div>"; } ?>
                </div>    

                <div class="left-block"> 
                    <a href="<?php echo $base_url.'/productdetail/'.$key->pid ?>">
                        <img class="img-responsive" alt="product" src="<?php echo $base_url.'/product_images/'.$key->pid.'/'.$key->img_name; ?>" /></a>
                    <div class="price_main">
                        <div class="price">
                            <div class="price2">
                                <a href="#">$<?php echo $key->pprice; ?></a>
                            </div>
                            <div class="content_price4">Buy & Earn
                                <span> <?php echo $key->pamples; ?> </span> 
                                <span>Amples </span>
                            </div>
                            <div class="price7">
                                Reward value&nbsp;<span>$<?php echo $key->pdiscountprice; ?></span>
                                <br>
                            </div>
                            <div class="save5">You Earn&nbsp;
                                <span><?php echo $key->pdiscount; ?>%</span>
                            </div>
                            <div class="by_aria"><h6>By:&nbsp;</h6>
                                <a href="#"><?php echo $key->pvendor; ?></a> 
                            </div>
                        </div>
                    </div>

                    <div class="quick-view"> 

                        <a title="Add to my wishlist" class="heart" <?php if(!empty($_SESSION['user_id'])) { ?> href="javascript:void(0);" onclick="wishlist_cart('<?php echo $key->pname; ?>','<?php echo $key->pid; ?>','1','<?php echo $key->pprice; ?>','<?php echo $_SESSION['user_id'] ?>','add');"    <?php } else { ?>  id="modal_trigger" href="#modal" <?php } ?>></a> 
                        <a title="Quick view" class="search" href="#"></a> 

                    </div>
                    <div class="add-to-cart"> 
                        <?php if($key->product_type_key=='0'){ ?>

                            <?php /*  <a title="Add to Cart" <?php if($key->pdiscount >= 50){ ?> href="<?php echo $base_url.'/productdetail/'.$key->pid;?>" <?php } else { ?> href="javascript:void(0);" onclick="vpb_add_to_cart('<?php echo $key->pname; ?>','<?php echo $key->pid; ?>','1','<?php echo $key->pprice; ?>','<?php echo $key->pamples; ?>','<?php  echo "0.00"; ?>','<?php echo $_SESSION['user_id']; ?>','<?php echo $key->vendor_key; ?>','add');" <?php } ?>>Add to Cart</a> */?>
                            <a title="Add to Cart" href="<?php echo $base_url.'/productdetail/'.$key->pid;?>">Add to Cart</a>
                            <?php }else{?>
                            <a title="Add to Cart" href="<?php echo $base_url.'/productdetail/'.$key->pid;?>">  Contact Me</a> 
                            <?php } ?>
                    </div>
                </div>    

            </div>

        </li>

        <?php }
    }


?>
<?php mysqli_close($con);?>
 