<?php
    //print_r($_POST);
    /* Please Do Not Change Any Code In this File If you want To change Please contact Mr.Tony*/
    
    require("db_config.php");
    
    if($_POST['buttext']=="buynow")
    {
        $add_id = $_POST['add_id'];

        $sql2="SELECT * FROM user_activity where adver_id='".$add_id."'";
        $query2 = mysqli_query($con,$sql2);
        echo"rows=".$num_rows = mysqli_num_rows($query2)or die(mysqli_error());

        if(!empty($num_rows))
        {
            $sql3="Update user_activity SET `buynow`= `buynow` + 1  WHERE  `adver_id` = '".$add_id."'";
            $update_query = mysqli_query($con,$sql3);

        }else
        {
            $insert="INSERT INTO user_activity (buynow,adver_id) Values ('1','$add_id')";
            $insert_query = mysqli_query($con,$insert);
            // $insert_id=mysqli_insert_id($con);
        }
    }
    if($_POST['buttext']=="info")
    {
        // buy now count 

        $add_id = $_POST['add_id'];

        $sql2="SELECT * FROM user_activity where adver_id='".$add_id."'";
        $query2 = mysqli_query($con,$sql2);
        echo"rows=".$num_rows = mysqli_num_rows($query2)or die(mysqli_error());
        if(!empty($num_rows))
        {
            echo $sql3="Update user_activity SET `info`= `info` + 1  WHERE  `adver_id` = '".$add_id."'";
            $update_query = mysqli_query($con,$sql3);

        }else
        {
            echo $insert="INSERT INTO user_activity (info,adver_id) Values ('1','$add_id')";
            $insert_query = mysqli_query($con,$insert);
            // $insert_id=mysqli_insert_id($con);
        }
    }
    if($_POST['buttext']=="view")
    {
        // buy now count 

        $add_id = $_POST['add_id'];

        $sql2="SELECT * FROM user_activity where adver_id='".$add_id."'";
        $query2 = mysqli_query($con,$sql2);
        echo"rows=".$num_rows = mysqli_num_rows($query2)or die(mysqli_error());
        if(!empty($num_rows))
        {
            $sql3="Update user_activity SET `view`= `view` + 1  WHERE  `adver_id` = '".$add_id."'";
            $update_query = mysqli_query($con,$sql3);

        }else
        {
            $insert="INSERT INTO user_activity (view,adver_id) Values ('1','$add_id')";
            $insert_query = mysqli_query($con,$insert);
            // $insert_id=mysqli_insert_id($con);
        }
    }

    if($_POST['buttext']=="addwish")
    {
        // buy now count 

        $add_id = $_POST['add_id'];

        $sql2="SELECT * FROM user_activity where adver_id='".$add_id."'";
        $query2 = mysqli_query($con,$sql2);
        echo"rows=".$num_rows = mysqli_num_rows($query2)or die(mysqli_error());
        if(!empty($num_rows))
        {
            $sql3="Update user_activity SET `wishlist`= `wishlist` + 1  WHERE  `adver_id` = '".$add_id."'";
            $update_query = mysqli_query($con,$sql3);

        }else
        {
            $insert="INSERT INTO user_activity (wishlist,adver_id) Values ('1','$add_id')";
            $insert_query = mysqli_query($con,$insert);
            // $insert_id=mysqli_insert_id($con);
        }
    }

?>
