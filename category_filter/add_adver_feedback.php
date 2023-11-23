<?php

    require("db_config.php");

    if(isset($_POST['adver_id']))
    {
        $ad = $_POST['adver_id'];
        $userids = $_POST['user_id'];
        $feedback = $_POST['feedback'];

        $adverquery = "SELECT adver_vendor_id FROM tbl_advertises WHERE adver_id = '".$ad."'";
        $adver_result = mysqli_query($con,$adverquery);
        $adver_data = mysqli_fetch_assoc($adver_result);
       
        $adver_vendor = $adver_data['adver_vendor_id'];

        $ins1="INSERT into adver_feedback (adver_id,user_id,vendor_id,feedback) Values ($ad,$userids,$adver_vendor,$feedback)";
        $ins1_query = mysqli_query($con,$ins1);
        $insert_id=mysqli_insert_id($con);
        mysqli_close($con);

        echo true;
        die;
    }

?>