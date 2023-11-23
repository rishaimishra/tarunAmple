<?php

require("db_config.php");

$proid = $_POST['proid'];
$vid = $_POST['vid'];
$userid = $_POST['userid'];

$without_ample = 0;

$is_free_product = 0;

if (isset($_POST['is_without_ample']) && !empty($_POST['is_without_ample']) && $_POST['is_without_ample'] == 1) {

    $without_ample = $_POST['is_without_ample'];

}

if (isset($_POST['is_free_product']) && !empty($_POST['is_free_product']) && $_POST['is_free_product'] == 1) {

    $is_free_product = $_POST['is_free_product'];

}

$sql1 = "SELECT * FROM product_delivery_type WHERE pro_id = '$proid' AND vid = '$vid' AND userid = '$userid' AND ship_without_ample = $without_ample AND ship_free_product = $is_free_product AND orderid = ''";

$fetch = mysqli_query($con, $sql1);

$fetch_count = mysqli_num_rows($fetch);

if ($fetch_count > 0) {

    echo 'found';

} else {

    echo 'nofound';

}
die;

?>
