<?php 

    $rootUrl = (!empty($_SERVER['HTTPS']) ? 'https' : 'http') . '://' . $_SERVER['HTTP_HOST'];

    require("db_config.php");

    if(!empty($_GET['category_id'])) {
        
        $coun_id = $_GET["category_id"];           
        $query ="SELECT * FROM sub_category WHERE maincategory_id IN ($coun_id)";
        $results = mysqli_query($con,$query);

        if(!empty($results)){

        ?>

        <option value="">Select Sub Category</option>

        <?php

            while($state = mysqli_fetch_array($results)){

            ?>

            <option value="<?php echo $state["id"]; ?>"><?php echo $state["subcategory_name"]; ?></option>
            
            <?php

            }


        }else{

            echo '<option value="">Select Sub Category</option>';  
        }
    }else{

        echo '<option value="">Select Sub Category</option>';
    } 

?>