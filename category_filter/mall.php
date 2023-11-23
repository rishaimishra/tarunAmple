<?php
    require("db_config.php");
    if($_GET['id']){
        $cat_id = $_GET['id'];

        $sql = "SELECT * FROM mall_dir_pro WHERE mall_id='".$cat_id."'";
        $query = mysqli_query($con,$sql);
        echo '<option value="">Select Sub Category</option>';
        while($result = mysqli_fetch_array($query)){ 
            $mallcat = "SELECT * FROM mall_directory WHERE  mall_direct_id ='".$result['dir_id']."'";
            $mall = mysqli_query($con,$mallcat);
            $mall_result = mysqli_fetch_array($mall);
        ?>
        <option value="<?=$mall_result['mall_direct_id']?>"><?=$mall_result['directory_name']?></option>
        <?php }
    }
    mysqli_close($con);


?>
