<?php 

    require("db_config.php");
    
    if ($_POST['isSelected']== 'true') {

        $sql = 'UPDATE users SET add_keyword = 1 WHERE user_id = ' . $_POST['id'];
        mysqli_query($con,$sql);
        // check if the query was executed
        if(mysqli_query($con,$sql)){
            // everything is Ok, the data was inserted
            print(1);    
        } else {
            // error happened
            print(0);
        }
    }

    if ($_POST['isSelected']== 'false') {

        $sql = 'UPDATE users SET add_keyword = 0 WHERE user_id = ' . $_POST['id'];
        mysqli_query($con,$sql);
        // check if the query was executed
        if(mysqli_query($con,$sql)){
            // everything is Ok, the data was inserted
            print(1);    
        } else {
            // error happened
            print(0);
        }
} ?>