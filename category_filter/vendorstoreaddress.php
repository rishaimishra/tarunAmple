<?php

    require("db_config.php");

    if($_GET['vid']){
        
        $vid = $_GET['vid'];
        $locstore = $_GET['locstore'];
        $sql = "SELECT * FROM vendor_location WHERE loc_store = '".$locstore."' AND vendor_id = '".$vid."'";
        
        //echo $sql;die;
        
        $query = mysqli_query($con,$sql);
        $location_result = mysqli_fetch_array($query);

    ?>



    <div class="col-sm-6">
        <div class="form-group">
            <label for="store_display" class="bmd-label-floating">Store Name</label>
            <input type="text" class="form-control" id="store_display" disabled="disabled" value="<?=@$location_result['loc_store']?>">
        </div>
    </div>

    <div class="col-sm-6">
        <div class="form-group">
            <label for="user_country" class="bmd-label-floating">Country Name</label>
            <?php 
                $sqlcountry = "SELECT * FROM tbl_countries WHERE id = '".@$location_result['loc_country_key']."'";
                $querycountry = mysqli_query($con,$sqlcountry);
                $country_result = mysqli_fetch_array($querycountry);
            ?>
            <input type="text" class="form-control" id="user_country" disabled="disabled" value="<?=@$country_result['name']?>">
        </div>
    </div>

    <div class="col-sm-6">
        <div class="form-group">
            <label for="user_state" class="bmd-label-floating">State Name</label>
            <?php 
                $sqlstate = "SELECT * FROM tbl_states WHERE stateid = '".@$location_result['loc_state_key']."'";
                $querystate = mysqli_query($con,$sqlstate);
                $state_result = mysqli_fetch_array($querystate);
            ?>
            <input type="text" class="form-control" id="user_state" disabled="disabled" value="<?=@$state_result['statename']?>">
        </div>
    </div>


    <div class="col-sm-6">
        <div class="form-group">
            <label for="user_city" class="bmd-label-floating">City Name</label>
            <?php 
                $sqlcity = "SELECT * FROM tbl_cities WHERE id = '".@$location_result['loc_city_key']."'";
                $querycity = mysqli_query($con,$sqlcity);
                $city_result = mysqli_fetch_array($querycity);
            ?>
            <input type="text" class="form-control" id="user_city" disabled="disabled" value="<?=@$city_result['name']?>">
        </div>
    </div>

    <div class="col-sm-6">
        <div class="form-group">
            <label for="user_address" class="bmd-label-floating">Address</label>
            <input type="text" class="form-control" id="user_address" disabled="disabled" value="<?=@$location_result['loc_address']?>">
        </div>
    </div>

    <div class="col-sm-6">
        <div class="form-group">
            <label for="user_zip" class="bmd-label-floating">Zip Code</label>
            <input type="text" class="form-control" id="user_zip" disabled="disabled" value="<?=@$location_result['loc_zip']?>">
        </div>
    </div>

    <div class="col-sm-6">
        <div class="form-group">
            <label for="user_mobile" class="bmd-label-floating">Mobile Number</label>
            <input type="text" class="form-control" id="user_mobile" disabled="disabled" value="<?=@$location_result['loc_mobile']?>">
        </div>
    </div>


    <div class="col-sm-6">
        <div class="form-group">
            <label for="user_phone" class="bmd-label-floating">Landline Number</label>
            <input type="text" class="form-control" id="user_phone" disabled="disabled" value="<?=@$location_result['loc_phone']?>">
        </div>
    </div>

    <div class="actionBar"></div>


    <?php }
    mysqli_close($con);
?>

    
                                
