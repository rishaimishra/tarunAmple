<?php
    $rootUrl = (!empty($_SERVER['HTTPS']) ? 'https' : 'http') . '://' . $_SERVER['HTTP_HOST'];

    $maincateid = $_POST['subcateid'];

    if(!empty($maincateid)){

        require("db_config.php");

        //$sql = "SELECT * FROM `tbl_advertises` ORDER BY `adver_id` DESC LIMIT $fromrow,1";

        $sql = "select * from tbl_subfilter where main_filtertype IN ($maincateid)";

        $filterdata = mysqli_query($con,$sql);
        echo "<option value=''>Select Sub2 Filter</option>";
        while($key = mysqli_fetch_array($filterdata)){ ?>

        <option value="<?=$key['id']?>"><?=$key['name']?></option>    

        <?php  }

    }

?>