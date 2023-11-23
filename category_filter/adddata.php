<?php 
    /* Please Do Not Change Any Code In this File If you want To change Please contact Mr.Tony*/ 

    session_start();

    require("db_config.php");

    $user_id = $_POST['user_id'];

    $adver_id = $_POST['adver_id'];

    if(isset($_POST['amples']) && !empty($_POST['amples']))
    {


        $data = "select * from users WHERE user_id = '$user_id'";

        $datas_query = mysqli_query($con,$data);

        $data1 = mysqli_fetch_array($datas_query); 

        $amples = $_POST['amples'];

        $oldamples = $data1['total_ample'];

        $finalAmplses = $data1['total_ample'];

        $videolenghtAmple = 15;

        $MyrewardtimeAmple = $data1['total_ample'];

        $CurrentTrewardtimeAmple = number_format($MyrewardtimeAmple , 2,'.','');

        $CrurrrewardFractionalAmple = explode('.',$CurrentTrewardtimeAmple);

        $MyLeftDigitAmple  = $CrurrrewardFractionalAmple[0];
        $MyRightDigitAmple  = $CrurrrewardFractionalAmple[1];

        $FinalRewardTimeAmple = $data1['total_ample'];

        //echo "Your Current Reward Time Is => $CurrentTrewardtime </br>";
        //echo "Your Current Reward Time Is => $CurrentTrewardtime </br>";


        if($videolenghtAmple == 60){

            $FinalRewardTimeAmple =  $CurrentTrewardtimeAmple + 1;

            $FinalRewardTimeAmple = number_format($FinalRewardTimeAmple ,2,'.','');

        }else if($videolenghtAmple > 60){

                $secondsAmple = $videolenghtAmple;
                $iAmple = ($secondsAmple / 60) % 60;
                $sAmple = $secondsAmple % 60;
                $myMinuteAmple = $iAmple;
                $mySecondAmple = sprintf("%02d",$sAmple);

                $FinalLeftAmple = $MyLeftDigitAmple + $myMinuteAmple;

                $calculateRightAmple = $MyRightDigitAmple + $mySecondAmple;

                if($calculateRightAmple > 60){

                    //echo "inside";die;

                    $finalTimeOutAmple = $mySecondAmple + $MyRightDigitAmple;
                    //$finalTimeOutAmple = sprintf("%02d",$finalTimeOutAmple);
                    $FinalSecondAmple = $finalTimeOutAmple - 60;
                    $finalTimeOutAmple = sprintf("%02d",$FinalSecondAmple);
                    $FinalLeftAmple = $FinalLeftAmple + 1;
                    $FinalRewardTimeAmple = $FinalLeftAmple.'.'.$finalTimeOutAmple;

                }else{

                    $calculateRightAmple = sprintf("%02d",$calculateRightAmple);
                    $FinalRewardTimeAmple = $FinalLeftAmple.'.'.$calculateRightAmple;
                }


            }else{

                $secondsAmple = $videolenghtAmple;

                $mySecondAmple = sprintf("%02d",$secondsAmple);

                $FinalLeftAmple = $MyLeftDigitAmple;

                $calculateRightAmple = $MyRightDigitAmple + $mySecondAmple;

                if($calculateRightAmple > 60){

                    $finalTimeOutAmple = $mySecondAmple + $MyRightDigitAmple;
                    //$finalTimeOutAmple = sprintf("%02d",$finalTimeOutAmple);
                    $FinalSecondAmple = $finalTimeOutAmple - 60;
                    $finalTimeOutAmple = sprintf("%02d",$FinalSecondAmple);
                    $FinalLeftAmple = $FinalLeftAmple + 1;
                    $FinalRewardTimeAmple = $FinalLeftAmple.'.'.$finalTimeOutAmple;

                }else{

                    $calculateRightAmple = sprintf("%02d",$calculateRightAmple);
                    $FinalRewardTimeAmple = $FinalLeftAmple.'.'.$calculateRightAmple;
                }
        }

        $datarewardample = "UPDATE  users SET total_ample='$FinalRewardTimeAmple' WHERE user_id='$user_id'";

        $datas_query2 = mysqli_query($con,$datarewardample);

        /*Reward Calculation*/

        $RewardVideoLength = 15;

        $Myrewardtime = $data1['reward_time'];

        $FinalRewardTime = $Myrewardtime;

        $CurrentTrewardtime = number_format($Myrewardtime , 2,'.','');

        $CrurrrewardFractional = explode('.',$CurrentTrewardtime);

        $MyLeftDigit  = $CrurrrewardFractional[0];
        $MyRightDigit  = $CrurrrewardFractional[1];


        //echo "Your Current Reward Time Is => $CurrentTrewardtime </br>";
        //echo "Your Current Reward Time Is => $CurrentTrewardtime </br>";


        if($RewardVideoLength == 60){

            $FinalRewardTime =  $CurrentTrewardtime - 1;

            $FinalRewardTime = number_format($FinalRewardTime , 2,'.','');

        }else if($RewardVideoLength > 60){

                $Rewardseconds = $RewardVideoLength;
                $i = ($Rewardseconds / 60) % 60;
                $s = $Rewardseconds % 60;
                $myMinute = $i;
                $mySecond = sprintf("%02d",$s);

                $FinalLeft = $MyLeftDigit - $myMinute;

                $calculateRight = $MyRightDigit - $mySecond;

                if($calculateRight < 0){

                    //echo "inside";die;

                    $finalTimeOut = $mySecond - $MyRightDigit;
                    $finalTimeOut = sprintf("%02d",$finalTimeOut);
                    $FinalSecond = 60 - $finalTimeOut;
                    $finalTimeOut = sprintf("%02d",$FinalSecond);
                    $FinalLeft = $FinalLeft - 1;
                    $FinalRewardTime = $FinalLeft.'.'.$finalTimeOut;

                }else{

                    $calculateRight = sprintf("%02d",$calculateRight);
                    $FinalRewardTime = $FinalLeft.'.'.$calculateRight;
                }


            }else{

                $Rewardseconds = $RewardVideoLength;

                $mySecond = sprintf("%02d",$Rewardseconds);

                $FinalLeft = $MyLeftDigit;

                $calculateRight = $MyRightDigit - $mySecond;

                if($calculateRight < 0){

                    $finalTimeOut = $mySecond - $MyRightDigit;
                    $finalTimeOut = sprintf("%02d",$finalTimeOut);
                    $FinalSecond = 60 - $finalTimeOut;
                    $finalTimeOut = sprintf("%02d",$FinalSecond);
                    $FinalLeft = $FinalLeft - 1;
                    $FinalRewardTime = $FinalLeft.'.'.$finalTimeOut;

                }else{

                    $calculateRight = sprintf("%02d",$calculateRight);
                    $FinalRewardTime = $FinalLeft.'.'.$calculateRight;
                }
        }

        $rewardquery = "UPDATE  users SET reward_time = '$FinalRewardTime' WHERE user_id='$user_id'";

        $rewardresult = mysqli_query($con,$rewardquery);


        $data3 = "select * from tbl_advertises  WHERE adver_id = '$adver_id'";

        $datas_query3 = mysqli_query($con,$data3);

        $data4 = mysqli_fetch_array($datas_query3); 

        $views=$data4['view'];


        $newview=$views + "1" ;


        $data5="UPDATE tbl_advertises SET view='$newview' WHERE adver_id='$adver_id'";

        $datas_query4 = mysqli_query($con,$data5);

        $RetunrResult = array('ReplaceAmple' => str_replace('.',':',$FinalRewardTimeAmple),'ReplaceReward' => str_replace('.',':',$FinalRewardTime));

        echo json_encode($RetunrResult);

        die;
    }
    if(isset($_POST['length_video']) && !empty($_POST['length_video']))
    {
        //old-amp-----------------


        $data7 = "select * from users WHERE user_id = '$user_id'";

        $datas_query7 = mysqli_query($con,$data7);

        $data8 = mysqli_fetch_array($datas_query7);

        //print_r($data8); 

        //--view ----------------count -------------  


        $data3 = "select * from tbl_advertises  WHERE adver_id = '$adver_id'";

        $datas_query3 = mysqli_query($con,$data3);

        $data4 = mysqli_fetch_array($datas_query3); 

        //print_r($data4); 

        $views=$data4['view'];

        $newview=$views + "1" ;

        $data5="UPDATE tbl_advertises SET view='$newview' WHERE adver_id='$adver_id'";
        $datas_query4 = mysqli_query($con,$data5);

        $videolenghtAmple = $_POST['length_video'];

        $MyrewardtimeAmple = $data8['total_ample'];

        $CurrentTrewardtimeAmple = number_format($MyrewardtimeAmple , 2,'.','');

        $CrurrrewardFractionalAmple = explode('.',$CurrentTrewardtimeAmple);

        $MyLeftDigitAmple  = $CrurrrewardFractionalAmple[0];
        $MyRightDigitAmple  = $CrurrrewardFractionalAmple[1];

        $FinalRewardTimeAmple = $data8['total_ample'];

        //echo "Your Current Reward Time Is => $CurrentTrewardtime </br>";
        //echo "Your Current Reward Time Is => $CurrentTrewardtime </br>";


        if($videolenghtAmple == 60){

            $FinalRewardTimeAmple =  $CurrentTrewardtimeAmple + 1;

            $FinalRewardTimeAmple = number_format($FinalRewardTimeAmple ,2,'.','');

        }else if($videolenghtAmple > 60){

                $secondsAmple = $videolenghtAmple;
                $iAmple = ($secondsAmple / 60) % 60;
                $sAmple = $secondsAmple % 60;
                $myMinuteAmple = $iAmple;
                $mySecondAmple = sprintf("%02d",$sAmple);

                $FinalLeftAmple = $MyLeftDigitAmple + $myMinuteAmple;

                $calculateRightAmple = $MyRightDigitAmple + $mySecondAmple;

                if($calculateRightAmple > 60){

                    //echo "inside";die;

                    $finalTimeOutAmple = $mySecondAmple + $MyRightDigitAmple;
                    //$finalTimeOutAmple = sprintf("%02d",$finalTimeOutAmple);
                    $FinalSecondAmple = $finalTimeOutAmple - 60;
                    $finalTimeOutAmple = sprintf("%02d",$FinalSecondAmple);
                    $FinalLeftAmple = $FinalLeftAmple + 1;
                    $FinalRewardTimeAmple = $FinalLeftAmple.'.'.$finalTimeOutAmple;

                }else{

                    $calculateRightAmple = sprintf("%02d",$calculateRightAmple);
                    $FinalRewardTimeAmple = $FinalLeftAmple.'.'.$calculateRightAmple;
                }


            }else{

                $secondsAmple = $videolenghtAmple;

                $mySecondAmple = sprintf("%02d",$secondsAmple);

                $FinalLeftAmple = $MyLeftDigitAmple;

                $calculateRightAmple = $MyRightDigitAmple + $mySecondAmple;

                if($calculateRightAmple > 60){

                    $finalTimeOutAmple = $mySecondAmple + $MyRightDigitAmple;
                    //$finalTimeOutAmple = sprintf("%02d",$finalTimeOutAmple);
                    $FinalSecondAmple = $finalTimeOutAmple - 60;
                    $finalTimeOutAmple = sprintf("%02d",$FinalSecondAmple);
                    $FinalLeftAmple = $FinalLeftAmple + 1;
                    $FinalRewardTimeAmple = $FinalLeftAmple.'.'.$finalTimeOutAmple;

                }else{

                    $calculateRightAmple = sprintf("%02d",$calculateRightAmple);
                    $FinalRewardTimeAmple = $FinalLeftAmple.'.'.$calculateRightAmple;
                }
        }

        $datarewardample = "UPDATE  users SET total_ample='$FinalRewardTimeAmple' WHERE user_id='$user_id'";

        $datas_query2 = mysqli_query($con,$datarewardample);

        /*Reward Calculation*/

        $RewardVideoLength = $_POST['length_video'];

        $Myrewardtime = $data8['reward_time'];

        $FinalRewardTime = $Myrewardtime;

        $CurrentTrewardtime = number_format($Myrewardtime , 2,'.','');

        $CrurrrewardFractional = explode('.',$CurrentTrewardtime);

        $MyLeftDigit  = $CrurrrewardFractional[0];
        $MyRightDigit  = $CrurrrewardFractional[1];


        //echo "Your Current Reward Time Is => $CurrentTrewardtime </br>";
        //echo "Your Current Reward Time Is => $CurrentTrewardtime </br>";


        if($RewardVideoLength == 60){

            $FinalRewardTime =  $CurrentTrewardtime - 1;

            $FinalRewardTime = number_format($FinalRewardTime , 2,'.','');

        }else if($RewardVideoLength > 60){

                $Rewardseconds = $RewardVideoLength;
                $i = ($Rewardseconds / 60) % 60;
                $s = $Rewardseconds % 60;
                $myMinute = $i;
                $mySecond = sprintf("%02d",$s);

                $FinalLeft = $MyLeftDigit - $myMinute;

                $calculateRight = $MyRightDigit - $mySecond;

                if($calculateRight < 0){

                    //echo "inside";die;

                    $finalTimeOut = $mySecond - $MyRightDigit;
                    $finalTimeOut = sprintf("%02d",$finalTimeOut);
                    $FinalSecond = 60 - $finalTimeOut;
                    $finalTimeOut = sprintf("%02d",$FinalSecond);
                    $FinalLeft = $FinalLeft - 1;
                    $FinalRewardTime = $FinalLeft.'.'.$finalTimeOut;

                }else{

                    $calculateRight = sprintf("%02d",$calculateRight);
                    $FinalRewardTime = $FinalLeft.'.'.$calculateRight;
                }


            }else{

                $Rewardseconds = $RewardVideoLength;

                $mySecond = sprintf("%02d",$Rewardseconds);

                $FinalLeft = $MyLeftDigit;

                $calculateRight = $MyRightDigit - $mySecond;

                if($calculateRight < 0){

                    $finalTimeOut = $mySecond - $MyRightDigit;
                    $finalTimeOut = sprintf("%02d",$finalTimeOut);
                    $FinalSecond = 60 - $finalTimeOut;
                    $finalTimeOut = sprintf("%02d",$FinalSecond);
                    $FinalLeft = $FinalLeft - 1;
                    $FinalRewardTime = $FinalLeft.'.'.$finalTimeOut;

                }else{

                    $calculateRight = sprintf("%02d",$calculateRight);
                    $FinalRewardTime = $FinalLeft.'.'.$calculateRight;
                }
        }

        $rewardquery = "UPDATE  users SET reward_time = '$FinalRewardTime' WHERE user_id='$user_id'";

        $rewardresult = mysqli_query($con,$rewardquery);

        $RetunrResult = array('ReplaceAmple' => str_replace('.',':',$FinalRewardTimeAmple),'ReplaceReward' => str_replace('.',':',$FinalRewardTime));

        echo json_encode($RetunrResult);

        die;

    }    

?>

