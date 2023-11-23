<?php

    require("db_config.php");

    if(!empty($_POST['rewardstart']) && !empty($_POST['rewardend'])){

        $startdate = $_POST['rewardstart'].' 00:00:00';
        $enddate = $_POST['rewardend'].' 23:59:59';   
        $usrId = $_POST['usrid'];   

        $myquery = mysqli_query($con,"SELECT * FROM `tbl_reward_history` WHERE `user_id` = $usrId AND `date_added` BETWEEN '$startdate' AND '$enddate'");

        $numrow = mysqli_num_rows($myquery);


        if($numrow > 0){

            while($rhistory = mysqli_fetch_assoc($myquery)) {

                $totalPercent = ($rhistory['five_percent_total'] + $rhistory['seven_percent_total'] + $rhistory['ten_percent_total']); 

            ?>

            <tr>

                <td style="text-align: center;"><?php echo date('d M Y',strtotime($rhistory['date_added'])); ?></td>
                <td style="text-align: center;">$<?php echo number_format($rhistory['order_amount'],2); ?></td>
                <td style="text-align: center;">$<?php echo number_format($rhistory['five_percent_total'],2); ?></td>
                <td style="text-align: center;">$<?php echo number_format($rhistory['seven_percent_total'],2); ?></td>
                <td style="text-align: center;">$<?php echo number_format($rhistory['ten_percent_total'],2); ?></td>
                <td style="text-align: center;">$<?php echo number_format($totalPercent,2); ?></td>
                <td style="text-align: center;"><?php echo str_replace('.',':',number_format($rhistory['total_reward'],2,'.','')); ?></td>
            </tr>

            <?php 

            }
        }else {

            echo "<tr>";
            echo '<td colspan="8" style="text-align: center;">No Data Found</td>'; 
            echo "</tr>"; 
        }

    }

?>



