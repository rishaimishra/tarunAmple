<?php
session_start();

$baseurl = (!empty($_SERVER['HTTPS']) ? 'https' : 'http') . '://' . $_SERVER['HTTP_HOST'];
//include('includes/dbfunctions.php');
//$db = new DB_FUNCTIONS();

$con = mysqli_connect("localhost", "amplepoi_main_db", "amplepoi_main_db", "amplepoi_main_db");

if (!$con) {
    die('could not connect To Database Change db_config.php File ' . mysqli_error($con));
}

mysqli_select_db($con, "amplepoi_main_db");


function Get_Options($option_name)
{

    $connew = mysqli_connect("localhost", "amplepoi_main_db", "amplepoi_main_db", "amplepoi_main_db");
    $sql = "SELECT option_value FROM `tbl_options` WHERE `option_name` = '$option_name'";
    $query = mysqli_query($connew, $sql);
    $result = mysqli_fetch_array($query);
    return $result['option_value'];
}

function cdnUrl($url)
{

    if (empty($url)) {
        echo "Path is missing";
        die;
    }

    $pattern = '/^http/i';

    if (preg_match($pattern, $url)) {
        throw new Exception('Invalid usage. ' .
            'Use: /htdocs/images instead of the full URL ' .
            'http://example.com/htdocs/images.'
        );
    }

    $pattern = '|^/|';
    if (!preg_match($pattern, $url)) {
        $url = '/' . $url;
    }

    //$cdn_hostname = Get_Options('siteurl');

    $cdn_hostname = 'https://amplepoints.com';

    if (empty($cdn_hostname)) {

        $cdn_hostname = 'https://amplepoints.com';
    }

    $uri = $cdn_hostname . $url;

    return $uri;
}

function OnlyCdnUrl($url)
{

    if (empty($url)) {
        echo "Path is missing";
        die;
    }

    $pattern = '/^http/i';

    if (preg_match($pattern, $url)) {
        throw new Exception('Invalid usage. ' .
            'Use: /htdocs/images instead of the full URL ' .
            'http://example.com/htdocs/images.'
        );
    }

    $pattern = '|^/|';
    if (!preg_match($pattern, $url)) {
        $url = '/' . $url;
    }

    $cdn_hostname = 'https://cdn.amplepoints.com';

    //$cdn_hostname = Get_Options('siteurl');

    if (empty($cdn_hostname)) {

        $cdn_hostname = 'https://amplepoints.com';
    }

    $uri = $cdn_hostname . $url;

    return $uri;
}

function FormatPricingValues($priceValue)
{
    $returnPriceVal = '';

    if (!empty($priceValue)) {

        $returnPriceVal = number_format($priceValue, 2);
    }

    return $returnPriceVal;

}


$usrmakey = '';
$CountryCode = '';
$currencySymbol = '';
$Is_Country_Code_Enable = 0;

//echo "<pre>";print_r($_SESSION);die;

if (isset($_SESSION['Zend_Auth']['storage']['user_id']) && !empty($_SESSION['Zend_Auth']['storage']['user_id'])) {

    $usrmakey = $_SESSION['Zend_Auth']['storage']['user_id'];

}

if (isset($_SESSION["CountryCode"]) && !empty($_SESSION["CountryCode"])) {
    $CountryCode = $_SESSION["CountryCode"];
}

if (isset($_SESSION["currencySymbol"]) && !empty($_SESSION["currencySymbol"])) {
    $currencySymbol = $_SESSION["currencySymbol"];
}

if (isset($_SESSION["Is_Country_Code_Enable"]) && !empty($_SESSION["Is_Country_Code_Enable"])) {
    $Is_Country_Code_Enable = $_SESSION["Is_Country_Code_Enable"];
}

$myacheck = $_REQUEST['ptrmya'];
$totcheck = $_REQUEST['tping'];
$ptcheck = $_REQUEST['ptid'];
$ctcheck = $_REQUEST['ctid'];
$sbctcheck = $_REQUEST['sbctid'];
$selcheck = $_REQUEST['selid'];
$catcheck = $_REQUEST['catcheck'];
$bcheck = $_REQUEST['bevcheck'];
$scheck = $_REQUEST['scheck'];
$ccheck = $_REQUEST['ccheck'];
$price_range = $_REQUEST['price_range'];
$reward_range = $_REQUEST['reward_range'];
$discount_range = $_REQUEST['discount_range'];
$full_price_range = $_REQUEST['full_price_range'];
$sub_filter = $_REQUEST['sub_filter'];
$sub2_filter = $_REQUEST['sub2_filter'];
$without_ample = $_REQUEST['without_ample'];

$WHERE = array();
$inner = $w = '';

if (!empty($ptcheck) && $ptcheck != 'undefined') {
    $WHERE[] = '(t1.product_type_id = ' . $ptcheck . ')';
}

if (!empty($selcheck) && $selcheck != 'undefined') {
    $WHERE[] = '(t1.vendor_uid = ' . $selcheck . ')';
}

if (!empty($ctcheck) && $ctcheck != 'undefined') {
    $WHERE[] = '(t1.category_id = ' . $ctcheck . ')';
}

if (!empty($sbctcheck) && $sbctcheck != 'undefined') {
    $WHERE[] = '(t1.subcategory_id = ' . $sbctcheck . ')';
}

if (!empty($without_ample) && $without_ample != 'undefined') {
    $WHERE[] = '(t1.is_without_ample = ' . $without_ample . ')';
}

if (isset($_REQUEST['is_free_product']) && $_REQUEST['is_free_product'] != 'undefined') {

    $is_free_product = $_REQUEST['is_free_product'];

    $WHERE[] = '(t1.is_free_product = ' . $is_free_product . ')';

} else {

    $WHERE[] = '(t1.is_free_product = 0)';
}

if (!empty($full_price_range)) {
    $data3 = explode('-', $full_price_range);
    $arrcount = count($data3) - 1;
    $WHERE[] = "(t1.single_price between $data3[0] and $data3[$arrcount])";
}

if (!empty($price_range)) {
    $data3 = explode('-', $price_range);
    $arrcount = count($data3) - 1;
    $WHERE[] = "(t1.single_price between $data3[0] and $data3[$arrcount])";
}

if (!empty($reward_range)) {
    $data_rr = explode('-', $reward_range);
    $arrcount_rr = count($data_rr) - 1;
    $WHERE[] = "(t1.product_discount between $data_rr[0] and $data_rr[$arrcount_rr])";
}

if (!empty($discount_range)) {
    $data_dr = explode('-', $discount_range);
    $arrcount_dr = count($data_dr) - 1;
    $WHERE[] = "(t1.discount_without_ample between $data_dr[0] and $data_dr[$arrcount_dr])";
}

if (!empty($catcheck)) {
    if (strstr($catcheck, ',')) {
        $data1 = explode(',', $catcheck);
        $catarray = array();
        foreach ($data1 as $c) {
            $catarray[] = "t1.ptype = $c";
        }
        $WHERE[] = '(' . implode(' OR ', $catarray) . ')';
    } else {
        $WHERE[] = '(t1.ptype = ' . $catcheck . ')';
    }
}

if (!empty($bcheck)) {
    if (strstr($bcheck, ',')) {
        $data1 = explode(',', $bcheck);
        $barray = array();
        foreach ($data1 as $c) {
            $barray[] = "t1.brand = $c";
        }
        $WHERE[] = '(' . implode(' OR ', $barray) . ')';
    } else {
        $WHERE[] = '(t1.brand = ' . $bcheck . ')';
    }
}

if (!empty($ccheck)) {
    if (strstr($ccheck, ',')) {
        $data2 = explode(',', $ccheck);
        $carray = array();
        foreach ($data2 as $c) {
            $carray[] = "t1.color = '$c' ";
        }
        $WHERE[] = '(' . implode(' OR ', $carray) . ')';
    } else {
        $WHERE[] = "(t1.color = '$ccheck')";
    }
}

if (!empty($scheck)) {
    if (strstr($scheck, ',')) {
        $data3 = explode(',', $scheck);
        $sarray = array();
        foreach ($data3 as $c) {
            $sarray[] = "t2.sizeID = $c";
        }
        $WHERE[] = '(' . implode(' OR ', $sarray) . ')';
    } else {
        $WHERE[] = '(t2.sizeID = ' . $scheck . ')';
    }

    $inner = 'LEFT JOIN tbl_productsizes AS t2 ON t1.id = t2.ProductID';
}

if (!empty($sub_filter)) {
    if (strstr($sub_filter, ',')) {
        $data3 = explode(',', $sub_filter);
        $sarray = array();
        foreach ($data3 as $c) {
            $sarray[] = "sfil.sub_filterid = $c";
        }
        $WHERE[] = '(' . implode(' OR ', $sarray) . ')';
    } else {
        $WHERE[] = '(sfil.sub_filterid = ' . $sub_filter . ')';
    }

    $inner = 'LEFT JOIN tbl_pro_sub_filter AS sfil ON t1.id = sfil.spro_id';
}

if (!empty($sub2_filter)) {
    if (strstr($sub2_filter, ',')) {
        $data3 = explode(',', $sub2_filter);
        $sarray = array();
        foreach ($data3 as $c) {
            $sarray[] = "s2fil.s2filterid = $c";
        }
        $WHERE[] = '(' . implode(' OR ', $sarray) . ')';
    } else {
        $WHERE[] = '(s2fil.s2filterid = ' . $sub2_filter . ')';
    }

    $inner = 'LEFT JOIN tbl_pro_sub2filter AS s2fil ON t1.id = s2fil.s2pro_id';
}

$innervndr = 'LEFT JOIN tbl_vendor AS tvdr ON t1.vendor_uid = tvdr.tbl_vndr_id';

$WHERE[] = 'tvdr.tbl_vndr_store_status  = 1';

if (!empty($Is_Country_Code_Enable) && $Is_Country_Code_Enable == 1) {

    $WHERE[] = "tvdr.vendor_country  = '$CountryCode'";
}

$WHERE[] = "t1.status = '1'";

$w = implode(' AND ', $WHERE);
if (!empty($w)) $w = 'WHERE ' . $w;

//echo "SELECT DISTINCT  t1 . * FROM  `tbl_products` AS t1 $inner $w";
//echo "SELECT DISTINCT  t1 . * FROM  `products` AS t1 $inner $innervndr $w group by t1.id"; die;
$query = mysqli_query($con, "SELECT DISTINCT  t1 . * FROM  `products` AS t1 $inner $innervndr $w group by t1.id");

if (mysqli_num_rows($query) > 0) {
    while ($pro = mysqli_fetch_assoc($query)) {

        //$vpb_check_productimages = mysql_query("select image_name as `product_image` from product_images where product_id ='".$pro['id']."' and is_primary_image ='1'");
        //$vpb_get_imagedata = mysql_fetch_array($vpb_check_productimages);

        if (!empty($without_ample) && $without_ample != 'undefined') {
            ?>

            <!------------------------------------------------------------------------------------------------------------------------------------------------->

            <li class="col-sm-4 product_new_container">
                <div class="filter-data">
                    <div class="pro_head">
                        <?php

                        if (!empty($selcheck) && $selcheck != 'undefined' && $selcheck == 217) {

                            $DisplayPname = strip_tags(ucwords($pro['product_name']));

                        } else {

                            //$DisplayPname = strip_tags(ucwords(strtolower(substr($pro['product_name'],0,20))));
                            $DisplayPname = strip_tags(ucwords($pro['product_name']));
                        }

                        $vendorKey = $pro['vendor_uid'];

                        $slectproductVDR = mysqli_query($con, "SELECT tbl_vndr_adr,retailer_type FROM `tbl_vendor` WHERE `tbl_vndr_id` = $vendorKey");

                        $vendorAddres = mysqli_fetch_array($slectproductVDR);

                        ?>
                        <h5 class="Butter_aria"><?php echo $DisplayPname; ?></h5>
                    </div>
                    <div class="pro_image" style="padding:0px;"><a
                                href="<?php echo $baseurl . '/productdetail/' . $pro['id'] . '/no_ample/true'; ?>"><img
                                    class="img-responsive" alt="product"
                                    src="<?php echo cdnUrl('product_images/' . $pro['id'] . '/' . $pro['image']); ?>"/></a>
                    </div>
                    <div class="vendor_info">
                        <h5 class="vdr_name"><?php echo $pro['supplier_name']; ?></h5>
                        <?php if ($vendorAddres['retailer_type'] != 2) { ?>
                            <p class="vdr_address"><?php echo $vendorAddres['tbl_vndr_adr']; ?></p>
                        <?php } else { ?>
                            <p class="vdr_address_blank">&nbsp;</p>
                        <?php } ?>
                    </div>
                    <div class="ap_price_area">
                        <div class="ap_display_price">
                            <span><?php echo $currencySymbol; ?><?php echo FormatPricingValues($pro['discount_price_without_ample']); ?></span>
                        </div>
                        <div class="ap_display_percentage">
                            <span><?php echo (int)$pro['discount_without_ample']; ?>% Discount</span>
                        </div>
                    </div>

                    <div class="pro_price">
                        <div class="quick-view"><a title="Add to my wishlist"
                                                   class="heart" <?php if (!empty($usrmakey)) { ?> href="javascript:void(0);" onclick="wishlist_cart('<?php echo $pro['product_name']; ?>','<?php echo $pro['id']; ?>','1','<?php echo $pro['single_price']; ?>','<?php echo $usrmakey; ?>','add');"    <?php } else { ?>  id="modal_trigger" href="#modal" <?php } ?>></a>
                            <!--  <a title="Quick view" class="search" href="#"></a> -->
                        </div>
                        <div class="add-to-cart">
                            <a title="Add to Cart"
                               href="<?php echo $baseurl . '/productdetail/' . $pro['id'] . '/no_ample/true'; ?>">Add to
                                Cart</a>
                        </div>
                    </div>
            </li>


        <?php } else { ?>

            <li class="col-sm-4 product_new_container">
                <div class="filter-data">
                    <div class="pro_head">
                        <?php

                        if (!empty($selcheck) && $selcheck != 'undefined' && $selcheck == 217) {

                            $DisplayPname = strip_tags(ucwords($pro['product_name']));

                        } else {

                            //$DisplayPname = strip_tags(ucwords(strtolower(substr($pro['product_name'],0,20))));
                            $DisplayPname = strip_tags(ucwords($pro['product_name']));
                        }

                        $productId = $pro['id'];

                        $slectproductCT = mysqli_query($con, "SELECT * FROM `contact_me_price` WHERE ctm_product_id = $productId");

                        $contactMePriceSP = mysqli_fetch_array($slectproductCT);

                        $vendorKey = $pro['vendor_uid'];

                        $slectproductVDR = mysqli_query($con, "SELECT tbl_vndr_adr,retailer_type FROM `tbl_vendor` WHERE `tbl_vndr_id` = $vendorKey");

                        $vendorAddres = mysqli_fetch_array($slectproductVDR);

                        $buy_and_earn = 0.00;
                        $reward_value = 0.00;
                        $you_earn = 0.00;
                        $free_with_ample = 0.00;
                        $display_free_with = 0;

                        if ($pro['product_type_key'] == '0') {

                            $buy_and_earn = FormatPricingValues($pro['no_of_amples']);

                            $reward_value = $currencySymbol . '' . FormatPricingValues($pro['discount_price']);

                            $you_earn = (int)$pro['product_discount'];

                        } else {

                            if (isset($contactMePriceSP) && !empty($contactMePriceSP)) {

                                $buy_and_earn = FormatPricingValues($contactMePriceSP['ctm_no_of_amples']);

                                $reward_value = $currencySymbol . '' . FormatPricingValues($contactMePriceSP['ctm_discount_price']);

                            } else {

                                $buy_and_earn = FormatPricingValues($pro['no_of_amples']);

                                $reward_value = $currencySymbol . '' . FormatPricingValues($pro['discount_price']);

                                $you_earn = (int)$pro['product_discount'];
                            }
                        }

                        if ($pro['product_discount'] >= 50) {

                            if ($pro['product_type_key'] == '0') {

                                $free_with_ample = FormatPricingValues($pro['free_with_amples']);

                                $display_free_with = 1;

                            } else {

                                if (isset($contactMePriceSP) && !empty($contactMePriceSP)) {

                                    $display_free_with = 0;

                                } else {

                                    $free_with_ample = FormatPricingValues($pro['free_with_amples']);

                                    $display_free_with = 1;
                                }
                            }

                        }

                        ?>
                        <h5 class="Butter_aria"><?php echo $DisplayPname; ?></h5>

                    </div>
                    <div class="pro_image" style="padding:0px;"><a
                                href="<?php echo $baseurl . '/productdetail/' . $pro['id']; ?>"><img
                                    class="img-responsive" alt="product"
                                    src="<?php echo cdnUrl('product_images/' . $pro['id'] . '/' . $pro['image']); ?>"/></a>
                    </div>
                    <div class="vendor_info">
                        <h5 class="vdr_name"><?php echo $pro['supplier_name']; ?></h5>
                        <?php if ($vendorAddres['retailer_type'] != 2) { ?>
                            <p class="vdr_address"><?php echo $vendorAddres['tbl_vndr_adr']; ?></p>
                        <?php } else { ?>
                            <p class="vdr_address_blank">&nbsp;</p>
                        <?php } ?>
                    </div>

                    <div class="ap_price_area">
                        <div class="ap_display_price">
                            <span><?php echo $currencySymbol; ?><?php echo FormatPricingValues($pro['single_price']); ?></span>
                        </div>
                        <div class="ap_display_percentage">
                            <span><?php echo $you_earn; ?>% Back</span>
                        </div>
                    </div>

                    <div class="ap_display_ample">
                        <p class="ap_display_ample_p">Get <span class="ample_color"><?php echo $buy_and_earn; ?></span>
                            AmplePoints (<span
                                    class="reward_price"><?php echo $reward_value; ?></span>)
                        </p>
                    </div>

                    <?php if ($display_free_with == 1) { ?>
                        <div class="ap_display_ample_free">
                            <p class="ap_display_ample_free_p">or get it <span class="ample_color">FREE</span> with
                                <span
                                        class="ample_color"><?php echo $free_with_ample; ?></span>
                                points</p>
                        </div>
                    <?php } ?>

                    <div class="pro_price">

                        <div class="quick-view"><a title="Add to my wishlist"
                                                   class="heart" <?php if (!empty($usrmakey)) { ?> href="javascript:void(0);" onclick="wishlist_cart('<?php echo $pro['product_name']; ?>','<?php echo $pro['id']; ?>','1','<?php echo $pro['single_price']; ?>','<?php echo $usrmakey; ?>','add');"    <?php } else { ?>  id="modal_trigger" href="#modal" <?php } ?>></a>
                            <!--  <a title="Quick view" class="search" href="#"></a> -->
                        </div>
                        <div class="add-to-cart">

                            <?php if ($pro['product_type_key'] == '0') { ?>

                                <a title="Add to Cart"
                                   href="<?php echo $baseurl . '/productdetail/' . $pro['id']; ?>">Add
                                    to Cart</a>
                            <?php } else { ?>
                                <a title="Add to Cart"
                                   href="<?php echo $baseurl . '/productdetail/' . $pro['id']; ?>">
                                    Contact Me</a>
                            <?php } ?>

                        </div>
                    </div>
            </li>

        <?php } ?>

        <!------------------------------------------------------------------------------------------------------------------------------------------------->


        <?php
    }
} else {
    ?>
    <div align="center"><h2 style="font-family:'Arial Black', Gadget, sans-serif;font-size:30px;color:#0099FF;">No
            Products Found.</h2></div>
    <?php
}
?>
