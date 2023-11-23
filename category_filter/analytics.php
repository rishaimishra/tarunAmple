<?php
    session_start();
    unset($_SESSION['count']);

    if(!empty($_POST['logo'])){
        $_SESSION['logo']= $_POST['logo'];
        $_SESSION['count']= $_POST['count'];

    }

    require("db_config.php");

    if(isset($_POST['adverid']))
    {
        $ad = $_POST['adverid'];
        $userids = $_POST['userid'];
        $respond = $_POST['respond'];
        $productid = $_POST['productid'];
        $addtime = $_POST['addtime'];
        $add_type = $_POST['addtype'];

        if($respond == 'Buynow'){

            $ins1="INSERT into tbl_analytics (adver_id,client_id,adver_product,buy_now,total_minutes,add_type) Values ('$ad','$userids','$productid',1,'$addtime','$add_type')";

        }else if($respond == 'Info'){

                $ins1="INSERT into tbl_analytics (adver_id,client_id,adver_product,more_info,total_minutes,add_type) Values ('$ad','$userids','$productid',1,'$addtime','$add_type')";

            }else if($respond == 'Wishlist'){

                    $ins1="INSERT into tbl_analytics (adver_id,client_id,adver_product,whislist,total_minutes,add_type) Values ('$ad','$userids','$productid',1,'$addtime','$add_type')";

                }else if($respond == 'Viewed'){

                        $ins1="INSERT into tbl_analytics (adver_id,client_id,adver_product,total_views,total_minutes,add_type) Values ('$ad','$userids','$productid',1,'$addtime','$add_type')";

                    }else{

                        $ins1="INSERT into tbl_analytics (adver_id,client_id) Values ('$ad','$userids')";

        }


        $ins1_query = mysqli_query($con,$ins1);
        $insert_id=mysqli_insert_id($con);
        mysqli_close($con);
    }

?>
