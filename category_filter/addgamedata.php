<?php 
session_start();

require("db_config.php");

$user_id=$_POST['user_id'];

$adver_id=$_POST['adver_id'];
//print_r($_POST);die;

if(!empty($_POST['amples']))
{

    $data = "select * from users WHERE user_id = '".$user_id."'";

    $datas_query = mysqli_query($con,$data);

    $data1 = mysqli_fetch_array($datas_query); 


    $amples=$_POST['amples'];


    $oldamples=$data1['total_ample'];

    echo "check=".$check=$amples + $oldamples;

    $var = explode('.',$check);

    echo"after=".$digits = $var[1];

    echo"</br>";
    echo "before=".$leftdigit = $var[0];

    if($digits>=60 || $digits == 6 || $digits == 1 || $digits == 2 || $digits == 3 || $digits == 4 || $digits == 5 || $digits == 7 || $digits == 8 || $digits == 9 )
    {

        if($digits == 1 || $digits == 2 || $digits == 3 || $digits == 4 || $digits == 5 || $digits == 7 || $digits == 8 || $digits == 9 || $digits == 6)
        {
            $digi=$digits."0";
            echo"true diff=". $diffrence=$digi - 60;
        }else
        {
            echo"else diff=". $diffrence=$digits - 60;
        }            
        if($diffrence == 1 || $diffrence == 2 || $diffrence == 3 || $diffrence == 4 || $diffrence == 5 || $diffrence == 6 || $diffrence == 7 || $diffrence == 8 || $diffrence == 9)
        {
            echo "points=".$diff="0.0".$diffrence;

            echo "addleftside=".$dataamp=$leftdigit + 1 ;

            echo"</br>";

            echo"new amples=".$newamp=$dataamp + $diff;

            echo"</br>";

            echo $dataamp2 = "UPDATE  users SET total_ample='".$newamp."' WHERE user_id='".$user_id."'";


            $datas_amp2 = mysqli_query($con,$dataamp2);

        }else
        {

            echo "points=".$diff="0.".$diffrence;
            echo"leftincrease=".$dataamp=$leftdigit + 1;

            echo"</br>";

            echo"new amples=".$newamp=$dataamp + $diff;

            echo"</br>";
            echo $dataamp2 = "UPDATE  users SET total_ample='".$newamp."' WHERE user_id='".$user_id."'";


            $datas_amp2 = mysqli_query($con,$dataamp2);

        }

    }else
    {

        $newamp=$oldamples + $amples;

        echo"</br>";

        $data2 = "UPDATE  users SET total_ample='".$newamp."' WHERE user_id='".$user_id."'";


        $datas_query2 = mysqli_query($con,$data2);
    }

    $data3 = "select * from tbl_advertises  WHERE adver_id = '".$adver_id."'";

    $datas_query3 = mysqli_query($con,$data3);

    $data4 = mysqli_fetch_array($datas_query3); 

    $views=$data4['view'];


    $newview=$views + "1" ;


    $data5="UPDATE tbl_advertises

    SET view='$newview' WHERE adver_id='".$adver_id."'";

    $datas_query4 = mysqli_query($con,$data5);

    exit();
}