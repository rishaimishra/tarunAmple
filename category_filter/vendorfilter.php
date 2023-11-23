<?php
    require("db_config.php");
    if($_GET['id']){
        $cat_id = $_GET['id'];
        //print_r($cat_id);die;
        $sql = "SELECT * FROM vendor_main_fil WHERE vid ='".$cat_id."'";
        $query = mysqli_query($con,$sql);?>

    <option value="">---Select Filter(s)---</option>
    <?php 
        while($result = mysqli_fetch_array($query)){ 
            $mallcat = "SELECT * FROM tbl_filter_type WHERE id ='".$result['main_filter']."'";
            $mall = mysqli_query($con,$mallcat);?>

        <?php $mall_result = mysqli_fetch_array($mall);?> 
        <option value="<?=$mall_result['id']?>"><?=$mall_result['name']?></option>
        <?php } ?>

    <?php }
    mysqli_close($con);
?>

    
                                
