<?php

    $rootUrl = (!empty($_SERVER['HTTPS']) ? 'https' : 'http') . '://' . $_SERVER['HTTP_HOST'];

    require("db_config.php");

    if(!empty($_GET['mall_id'])) {

        $coun_id = $_GET["mall_id"];           
        $query ="SELECT * FROM mall_dir_pro WHERE mall_id IN ($coun_id)";
        $results = mysqli_query($con,$query);

        if(!empty($results)){

        ?>

        <option value="">Select Mall Category</option>

        <?php

            while($result = mysqli_fetch_array($results)){
                
                $mymall_id = $result['mall_id'];
                
                $displayMall = "SELECT display_name FROM mall WHERE venr_mall_id = $mymall_id";
                $mallres = mysqli_query($con,$displayMall);
                $Dismallresult = mysqli_fetch_array($mallres); 

                $mallcat = "SELECT * FROM mall_directory WHERE  mall_direct_id ='".$result['dir_id']."'";
                $mall = mysqli_query($con,$mallcat);
                $mall_result = mysqli_fetch_array($mall);

            ?>

            <option value="<?=$mall_result['mall_direct_id']?>"><?=$mall_result['directory_name'].' ('.$Dismallresult['display_name'].')'?></option>

            <?php

            }


        }else{

            echo '<option value="">Select Mall Category</option>';  
        }
    }else{

        echo '<option value="">Select Mall Category</option>';
    } 

?>
