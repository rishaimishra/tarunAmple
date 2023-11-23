<?php 

    require("db_config.php");

    if ($_POST['type']== 'ample') {

        /* $sql = "select * from addpoints WHERE customer_id = '$_POST['u_id']'";

        // check if the query was executed
        $qsql = mysql_query($sql);
        $arrayd = mysql_fetch_array($qsql); */
    ?>
    <div>amit</div>
    <?php
        //print_r($arrayd);
    }

    if ($_POST['type']== 'reward') {

        $sql = 'select * from addpoints WHERE customer_id = ' . $_POST['u_id'];
        $qsql = mysqli_query($con,$sql);
        $arrayd = mysqli_fetch_array($qsql);
        print_r($arrayd);
} ?>
