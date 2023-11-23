<?php 

    require("db_config.php");
    
    if(!empty($_POST['banner_id']))
    {
        $banner_id = $_POST['banner_id'];
        $user_id = $_POST['user_id'];
        $sql="SELECT * From playlistlplayer where adver_id='".$banner_id."' and user_id='".$user_id."'";
        $fetch = mysqli_query($con,$sql);
        $rowcount=mysqli_num_rows($fetch);
        if($rowcount==0){
            $ins1="INSERT into playlistlplayer (adver_id,user_id) Values ('$banner_id','$user_id')";
            $ins1_query = mysqli_query($con,$ins1);
            echo"Added Succsessful";
        }else{

            echo"Already Added....!";
        }
    }
    if(!empty($_POST['banner_id_fav']))
    {
        $banner_fav_id = $_POST['banner_id_fav'];
        $user_id = $_POST['user_id'];
        $sql="SELECT * From favlplayer where add_id='".$banner_fav_id."' and user_id='".$user_id."'";
        $fetch = mysqli_query($con,$sql);
        $rowcount=mysqli_num_rows($fetch);
        if($rowcount==0){
            $ins1="INSERT into favlplayer (add_id,user_id) Values ('$banner_fav_id','$user_id')";
            $ins1_query = mysqli_query($con,$ins1);
            echo"Added Succsessful";
        }else{

            echo"Already Added....!";
        }
    }


?>