<?php

   require("db_config.php");

    $xx = $_POST['xx'];
    $yy = $_POST['yy'];


    $sql1 = "SELECT  * FROM `tbl_user_interest` where customerId = '$xx' and umaincatId = '$yy' ";
    $fetch = mysqli_query($con,$sql1);
    $fetch_count = mysqli_num_rows($fetch);
    $rowchbox = mysqli_fetch_row($fetch);
    if($fetch_count>0){

        if($rowchbox[5] == 1){  
            //echo 'hello';die;
            $update = "UPDATE tbl_user_interest SET isselected = 0 where customerId = '$xx' and umaincatId = '$yy' ";
            $update_sql = mysqli_query($con,$update);
        }else{
            $update = "UPDATE tbl_user_interest SET isselected = 1 where customerId = '$xx' and umaincatId = '$yy' ";
            $update_sql = mysqli_query($con,$update); 

        }
    }
    else{
        //echo 'hi';die;
        $sql = "INSERT INTO tbl_user_interest (customerId, umaincatId, isselected) VALUES ('$xx', '$yy', 1)";
        $query = mysqli_query($con,$sql);
    }

?>

<div class="showbox">Interest Add!!...</div>

