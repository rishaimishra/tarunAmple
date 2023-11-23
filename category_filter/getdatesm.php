<script src= "https://cdn.zingchart.com/zingchart.min.js"></script>
<?php

   require("db_config.php");
   
    if(!empty($_POST['start'])){

        $date=($_POST['start']);
        $end=($_POST['end']);   

        echo "<table id='datatable-responsive' class='table table-striped table-bordered nowrap' cellspacing='0' width='100%' style='margin: 20px 0 0 100px;'><thead><tr><td>Day</td><td>month</td><td>day_name</td><td>Year</td><td>Retail Price</td><td>Wholesale Prices</td><td> Discount Amplifyon</td></tr></thead>";
        $i=1;
        while(strtotime($date) <= strtotime($end)) {
            $day_num = date('d', strtotime($date));
            $day_name = date('l', strtotime($date));
            $month = date('m', strtotime($date));
            $year = date('Y', strtotime($date));
            $date = date("Y-m-d", strtotime("+1 day", strtotime($date)));
            //echo "<td>$day_num <br/> $day_name</td>";

            echo "<tr><td><input type='hidden' name='days[]' value='".$day_num."'>".$day_num."</td>"; 
            echo "<td><input type='hidden' name='months[]' value='".$month."'>".$month."</td>"; 
            echo "<td><input type='hidden' name='daynames[]' value='".$day_name."'>". $day_name."</td>"; 
            echo "<td><input type='hidden' name='years[]' value='".$year."'>". $year."</td>"; 
            echo "<td><input type='text' class='dtpretail' id='dtpretail_".$i."' name='newprices[]' placeholder='Enter price without $'></td>"; 
            echo "<td><input type='text' class='dtpwholsale' onchange='changedprice(".$i.")' id='dtpwholsale_".$i."' name='wholesel[]' placeholder='Enter price without $'></td>"; 
            echo "<td><input type='text' disabled id='discountampl_".$i."'  name='discount_amp[]'></td></tr>"; 

            $i++;
        }
        echo"</table>"; 
    }
    if(!empty($_POST['rewardstart'])){
        $rewardstart=($_POST['rewardstart']);
        $rewardend=($_POST['rewardend']); 
        $users_id=($_POST['usrid']); 

        $query="SELECT * FROM tbl_order WHERE DATE(updated_date) BETWEEN '".$rewardstart."' AND '".$rewardend."' AND user_id='".$users_id."'";
        $data_pro = mysqli_query($con,$query);
        $totalspentnew= 0;
        while($data_fetch = mysqli_fetch_array($data_pro)){
            //print_r($data_fetch);
            $totalspentnew += $data_fetch['total_price'];


        }
        $reward_timenew=0;
        $reward_minutesnew=0;

        if($totalspentnew <= 500 ){


            $reward_timenew= $totalspentnew*5/100;



            $reward_minutesnew= $reward_timenew*100/12;
            //    echo "</br>";

        }else if($totalspentnew <= 1000){

                //    echo "Ample Gold";
                $reward_timenew= $totalspentnew*7/100;
                $reward_minutesnew= $reward_timenew*100/12;


            }else if($totalspentnew >= 1000){

                    //echo "Ample Platinum";
                    $reward_timenew= $totalspentnew*10/100;
                    $reward_minutesnew= $reward_timenew*100/12;
                }

                $reward_minutesnew;




    ?>
    <div id='myChart2'>
        <span class="popfrom"><?php echo $rewardstart; ?></span> To <span><?php echo $rewardend; ?></span>
        <?php echo round($reward_minutesnew); ?>

    </div>

    <?php


    }

?>



