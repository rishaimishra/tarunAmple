<?php

    require("db_config.php");

    if(!empty($_POST['keywords'])){
        $keywords=$_POST['keywords'];
        $user_id=$_POST['userid'];
        $sqlupdate="Update users SET member_cat='".$keywords."' where user_id='".$user_id."'";

        $update_run= mysqli_query($con,$sqlupdate)or die(mysql_error());

        if(!empty($update_run)){
            echo"<h2 style='color:green'>Updated Keyword</h2>";

        }

    }
?>

