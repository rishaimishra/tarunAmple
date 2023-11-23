<?php

    require("db_config.php");

    $timeArray = array('12:00 AM','12:15 AM','12:30 AM','12:45 AM','1:00 AM','1:15 AM','1:30 AM','1:45 AM','2:00 AM','2:15 AM','2:30 AM','2:45 AM','3:00 AM','3:15 AM','3:30 AM','4:00 AM','4:15 AM','4:30 AM','4:45 AM','5:00 AM','5:15 AM','5:30 AM','5:45 AM','6:00 AM','6:15 AM','6:30 AM','6:45 AM','7:00 AM','7:15 AM','7:30 AM','7:45 AM','8:00 AM','8:15 AM','8:30 AM','8:45 AM','9:00 AM','9:15 AM','9:30 AM','9:45 AM','10:00 AM','10:15 AM','10:30 AM','10:45 AM','11:00 AM','11:15 AM','11:30 AM','11:45 AM','12:00 PM','12:00 PM','12:15 PM','12:30 PM','12:45 PM','1:00 PM','1:15 PM','1:30 PM','1:45 PM','2:00 PM','2:15 PM','2:30 PM','2:45 PM','3:00 PM','3:15 PM','3:30 PM','4:00 PM','4:15 PM','4:30 PM','4:45 PM','5:00 PM','5:15 PM','5:30 PM','5:45 PM','6:00 PM','6:15 PM','6:30 PM','6:45 PM','7:00 PM','7:15 PM','7:30 PM','7:45 PM','8:00 PM','8:15 PM','8:30 PM','8:45 PM','9:00 PM','9:15 PM','9:30 PM','9:45 PM','10:00 PM','10:15 PM','10:30 PM','10:45 PM','11:00 PM','11:15 PM','11:30 PM','11:45 PM');

    $newtimearryaa = array('12:00 AM','12:15 AM','12:30 AM','12:45 AM','1:00 AM','1:15 AM','1:30 AM','1:45 AM','2:00 AM','2:15 AM','2:30 AM','2:45 AM','3:00 AM','3:15 AM','3:30 AM','4:00 AM','4:15 AM','4:30 AM','4:45 AM','5:00 AM');

    if(isset($_POST['fordate']) && isset($_POST['vid'])){

        $fordate = $_POST['fordate'];
        $vid = $_POST['vid'];

        $forday = date('D',strtotime($fordate));

        $query = "SELECT * FROM `tbl_vendor_hours` WHERE `day` = '$forday' AND `open_close` = 'open' AND `vendor_id` = $vid";

        $results = mysqli_query($con,$query);

        $hoursdata = mysqli_fetch_assoc($results);

        if(!empty($hoursdata)){

            $startTime = $hoursdata['start_time'];
            $EndTime = $hoursdata['end_time'];

            $fromKey = array_search($startTime, $timeArray);
            $ToKey = array_search($EndTime, $timeArray);

            $arrayToCompare = array($fromKey,$ToKey);

            $matchedArray = array();

            $matchedFirst = false;
            $matchedLast = false;

            if(in_array($EndTime,$newtimearryaa)){

                foreach ($timeArray as $key => $value) {

                    if($key >= $fromKey || $key <= $ToKey){

                        $matchedArray[$key] = $value;
                    }

                } 

            }else{

                foreach ($timeArray as $key => $value) {
                    if ($key == $arrayToCompare[0]) {
                        $matchedFirst = true;
                    }

                    if ($key == $arrayToCompare[1]) {
                        $matchedLast = true;
                    }

                    if ($matchedFirst == true) {
                        $matchedArray[$key] = $value;
                    }

                    if ($matchedLast == true) {
                        $matchedArray[$key] = $value;
                        break;
                    }

                }

            }


            /*foreach ($timeArray as $key => $value) {
            if ($key == $arrayToCompare[0]) {
            $matchedFirst = true;
            }

            if ($key == $arrayToCompare[1]) {
            $matchedLast = true;
            }

            if ($matchedFirst == true) {
            $matchedArray[$key] = $value;
            }

            if ($matchedLast == true) {
            $matchedArray[$key] = $value;
            break;
            }

            }*/

            //echo "<pre>";print_r($matchedArray);die;

            $alltimes = '<option value="">Select Time</option>';

            foreach($matchedArray as $key => $value){

                $alltimes .= '<option value='.'"'."$value".'"'.'>'.$value.'</option>'; 
            }

            echo $alltimes;

        }else{

            echo '<option value="">Select Time</option>';

        }


    ?>
    <?php } else {

        echo '<option value="">Select Time</option>'; 
    }

    die;
?>
