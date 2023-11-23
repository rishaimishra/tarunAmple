<?php 
    //session_start();

    require("db_config.php");

    if(!empty($_POST['user_history_id']))
    {

        $add_id = $_POST['adver_id_history'];
        $user_id = $_POST['user_history_id'];
        $respond = $_POST['respond'];
        $dateadded = date('Y-m-d H:i:s');

        $adver_pro="INSERT INTO tbl_history (user_id, adver_id,respond,date_added)VALUES ('".$user_id."', '".$add_id ."','".$respond."', '".$dateadded ."')";

        $data_pro = mysqli_query($con,$adver_pro);
    }

    if(!empty($_POST['checkuser_id']))
    {
        //$add_id =$_POST['check_add_id'];
       echo '<span class="clocse-my-historytab">X</span>';
        $user_id=$_POST['checkuser_id'];

        $sql="SELECT * FROM tbl_history WHERE  user_id = '".$user_id."' ORDER BY id DESC LIMIT 20";
        $result = mysqli_query($con,$sql);

        while($row = mysqli_fetch_array($result)) 
        {
            //print_r($row);
            $add_ids = $row['adver_id'];
            $Responds = $row['respond'];
            $sql2 = "SELECT * FROM tbl_advertises WHERE adver_id = '".$add_ids."'";
            $result2 = mysqli_query($con,$sql2);
            $row2 = mysqli_fetch_array($result2);
            //print_r($row2);



            echo"<ul>";
            echo"<li>Respond : $Responds</li>";
            //echo "<li><p>'".$row2['campagine_name']."'</li>";
            echo "<li>Earned Amples'".$row2['length_video']."'</p></li>";
        ?>
        <li><p><img src="http://amplepoints.com/adver_images/image/<?=$row2['adver_logo'];?>"/></p></li>

        <?php
            echo"</ul>";




        }

    }


?>