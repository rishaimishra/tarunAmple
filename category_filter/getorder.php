<?php

    require("db_config.php");

    $q=$_POST['storeid'];
    if($_POST['year'] =="2016-01-01")
    {
        $year=$_POST['year'];
        $previous="2016-12-30";

        $sql1= "select * FROM products_added WHERE date BETWEEN '".$year."' AND '".$previous."' AND vendor_id = '".$q."' AND is_purchased = 1";

        $rowdata3 = mysqli_query($con,$sql1);

        $num_rows1 = mysqli_num_rows($rowdata3);

        if($num_rows1 > 0){

            $sql2= "select SUM(amount) AS totalprice FROM products_added WHERE date BETWEEN '".$year."' AND '".$previous."' AND  vendor_id = '".$q."' AND is_purchased = 1";
            $rowdata4=mysqli_query($con,$sql2);
            $row1=mysqli_fetch_array($rowdata4,MYSQLI_ASSOC);

            $averages= $row1['totalprice'] /  $num_rows1 ;
            //echo "<td>".$row1['totalprice']."</td><td>".$averages."</td><td>".$num_rows1."</td>";  
            echo "<td class='first-s'>".$_POST['campagine_name']."</td><td><span>Total Amount<span>".$row1['totalprice']."</span></span></td><td><span>Average Amount<span>".$averages."</span></span></td><td><span>Total Order<span>".$num_rows1."</span></span></td>";  
        }else{
            echo "<td class='first-s'>".$_POST['campagine_name']."</td><td><span>Total Amount<span>0.00</span></span></td><td><span>Average Amount<span>0.00</span></span></td><td><span>Total Order<span>0</span></span></td>";  
        }

    }else{
        
        $year2=$_POST['year'];
        $previousnew = explode("-", $year2);
        $third="12-30";
        $previous2=$previousnew[0]."-".$third;
        $sql3= "select * FROM products_added WHERE date BETWEEN '".$year2."' AND '".$previous2."' AND vendor_id = '".$q."' AND is_purchased = 1";


        //echo $sql3;
        //echo "<br/>";
        //echo $sql4;

        $rowdata1=mysqli_query($con,$sql3);

        $num_rows = mysqli_num_rows($rowdata1);


        if($num_rows > 0){

            $sql4= "select SUM(amount) AS totalprice FROM products_added WHERE date BETWEEN '".$year2."' AND '".$previous2."' AND  vendor_id = '".$q."' AND is_purchased = 1";
            $rowdata2=mysqli_query($con,$sql4);
            $row=mysqli_fetch_array($rowdata2,MYSQLI_ASSOC);

            //echo "<td>".$adddata['campagine_name']."</td>";
            $average= $row['totalprice'] /  $num_rows ;
            //echo "<td>".$row['totalprice']."</td><td>".$average."</td><td>".$num_rows."</td>";  
            echo "<td class='first-s'>".$_POST['campagine_name']."</td><td><span>Total Amount<span>".$row['totalprice']."</span></span></td><td><span>Average Amount<span>".$average."</span></span></td><td><span>Total Order<span>".$num_rows."</span></span></td>";  

        }else{
            echo "<td class='first-s'>".$_POST['campagine_name']."</td><td><span>Total Amount<span>0.00</span></span></td><td><span>Average Amount<span>0.00</span></span></td><td><span>Total Order<span>0</span></span></td>";    

        }

    }

    die;

?>