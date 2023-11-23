<?php
    $rootUrl = (!empty($_SERVER['HTTPS']) ? 'https' : 'http') . '://' . $_SERVER['HTTP_HOST'];

    $maincateid = $_POST['mainid'];

    if(!empty($maincateid)){

        require("db_config.php");

        $sql = "select * from tbl_filters where ftype IN ($maincateid)";

        $filterdata = mysqli_query($con,$sql);
        echo "<option value=''>Select Sub Filter</option>";
        while($key = mysqli_fetch_array($filterdata)){ ?>

        <option value="<?=$key['id']?>"><?=$key['title']?></option>    

        <?php  }

    }

?>