<?php

   require("db_config.php");
   
    $return = 'ok';
    $userid = $_POST['userid'];
    $catid = $_POST['catid'];
    $ischk = $_POST['ischk'];

    $mynewsql = "SELECT  * FROM `tbl_user_interest` where customerId = '$userid' and isselected = 1";
    $fetchnew = mysqli_query($con,$mynewsql);
    $fetchnew_count = mysqli_num_rows($fetchnew);


    $totalcount = $fetchnew_count + 1;

    if($ischk == 'checked'){

        if($totalcount == 5){

            $sql1 = "SELECT  * FROM `tbl_user_interest` where customerId = '$userid' and umaincatId = '$catid' ";
            $fetch = mysqli_query($con,$sql1);
            $fetch_count = mysqli_num_rows($fetch);
            $rowchbox = mysqli_fetch_row($fetch);
            if($fetch_count > 0){

                if($rowchbox[5] == 1){  
                    //echo 'hello';die;
                    $update = "UPDATE tbl_user_interest SET isselected = 0 where customerId = '$userid' and umaincatId = '$catid' ";
                    $update_sql = mysqli_query($con,$update);
                }else{
                    $update = "UPDATE tbl_user_interest SET isselected = 1 where customerId = '$userid' and umaincatId = '$catid' ";
                    $update_sql = mysqli_query($con,$update); 

                }
            }
            else{
                //echo 'hi';die;
                $sql = "INSERT INTO tbl_user_interest (customerId, umaincatId, isselected) VALUES ('$userid', '$catid', 1)";
                $query = mysqli_query($con,$sql);
            }

            $sqluser = "SELECT  * FROM `users` where user_id = '$userid'";
            $fetchuser = mysqli_query($con,$sqluser);
            $rowuser = mysqli_fetch_array($fetchuser,MYSQLI_ASSOC);

            if($rowuser['isinteampleearn'] == 1){
                
                $return = 'reaload';

            }else{

                $updatesql = "UPDATE users SET total_ample = total_ample + 10.00,isinteampleearn = 1 WHERE user_id = $userid";
                $updquery = mysqli_query($con,$updatesql);
                $return = 'done';
 
            }
   

        }else{

            $sql1 = "SELECT  * FROM `tbl_user_interest` where customerId = '$userid' and umaincatId = '$catid' ";
            $fetch = mysqli_query($con,$sql1);
            $fetch_count = mysqli_num_rows($fetch);
            $rowchbox = mysqli_fetch_row($fetch);
            if($fetch_count > 0){

                if($rowchbox[5] == 1){  
                    //echo 'hello';die;
                    $update = "UPDATE tbl_user_interest SET isselected = 0 where customerId = '$userid' and umaincatId = '$catid' ";
                    $update_sql = mysqli_query($con,$update);
                }else{
                    $update = "UPDATE tbl_user_interest SET isselected = 1 where customerId = '$userid' and umaincatId = '$catid' ";
                    $update_sql = mysqli_query($con,$update); 

                }
            }
            else{
                //echo 'hi';die;
                $sql = "INSERT INTO tbl_user_interest (customerId, umaincatId, isselected) VALUES ('$userid', '$catid', 1)";
                $query = mysqli_query($con,$sql);
            }

        }

    }else{

        //echo $fetchnew_count;die;

        if($fetchnew_count == 5){

            $return = 'notok';  

        }else{

            $sql1 = "SELECT  * FROM `tbl_user_interest` where customerId = '$userid' and umaincatId = '$catid' ";
            $fetch = mysqli_query($con,$sql1);
            $fetch_count = mysqli_num_rows($fetch);
            $rowchbox = mysqli_fetch_row($fetch);
            if($fetch_count > 0){

                if($rowchbox[5] == 1){  
                    //echo 'hello';die;
                    $update = "UPDATE tbl_user_interest SET isselected = 0 where customerId = '$userid' and umaincatId = '$catid' ";
                    $update_sql = mysqli_query($con,$update);
                }else{
                    $update = "UPDATE tbl_user_interest SET isselected = 1 where customerId = '$userid' and umaincatId = '$catid' ";
                    $update_sql = mysqli_query($con,$update); 

                }
            }
            else{
                //echo 'hi';die;
                $sql = "INSERT INTO tbl_user_interest (customerId, umaincatId, isselected) VALUES ('$userid', '$catid', 1)";
                $query = mysqli_query($con,$sql);
            }

        }   

    }

    echo $return;
    die;
?>

