<?php
    require("db_config.php");
    if($_GET['id']){
        $cat_id = $_GET['id'];

        $sql = "SELECT * FROM sub_category WHERE maincategory_id='".$cat_id."'";
        $query = mysqli_query($con,$sql);
        echo '<option value="">Select Sub Category</option>';
        while($result = mysqli_fetch_array($query)){ ?>
        <option value="<?=$result['id']?>"><?=$result['subcategory_name']?></option>
        <?php }
    }else if($_GET['sid']){
            $sub_id = $_GET['sid'];
            $sql = "SELECT * FROM sub_category2 WHERE      ssubcategory_id='".$sub_id."'";
            $query = mysqli_query($con,$sql);
            echo '<option value="">Select Sub2 Category</option>';
            while($result = mysqli_fetch_array($query)){ ?>
            <option value="<?=$result['id']?>"><?=$result['subcategory2_name']?></option>
            <?php }    
        }
        mysqli_close($con);


?>
