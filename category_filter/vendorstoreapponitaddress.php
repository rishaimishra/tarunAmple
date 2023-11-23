<?php

    require("db_config.php");

    if($_GET['vid']){
        $vid = $_GET['vid'];
        $locstore = $_GET['locstore'];
        $sql = "SELECT * FROM vendor_location WHERE loc_store = '".$locstore."' AND vendor_id = '".$vid."'";
        $query = mysqli_query($con,$sql);
        $location_result = mysqli_fetch_array($query);

    ?>

    <div class="form-group">
        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="country">Store Name <span class="required">*</span>
        </label>
        <div class="col-md-6 col-sm-6 col-xs-12">
            <input type="text" id="store_display" DISABLED value="<?=$location_result['loc_store']?>"  class="form-control col-md-7 col-xs-12">

        </div>
    </div>
    <div class="form-group">
        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="country">Country Name <span class="required">*</span>
        </label>
        <div class="col-md-6 col-sm-6 col-xs-12">
            <?php 
                $sqlcountry = "SELECT * FROM tbl_countries WHERE id = '".$location_result['loc_country_key']."'";
                $querycountry = mysqli_query($con,$sqlcountry);
                $country_result = mysqli_fetch_array($querycountry);
            ?>
            <input type="text" id="user_country" DISABLED value="<?=$country_result['name']?>"  class="form-control col-md-7 col-xs-12">

        </div>
    </div>
    <div class="form-group">
        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="state">State Name<span class="required">*</span>
        </label>
        <?php 
            $sqlstate = "SELECT * FROM tbl_states WHERE stateid = '".$location_result['loc_state_key']."'";
            $querystate = mysqli_query($con,$sqlstate);
            $state_result = mysqli_fetch_array($querystate);
        ?>
        <div class="col-md-6 col-sm-6 col-xs-12">
            <input type="text" id="user_state" DISABLED value="<?=$state_result['statename']?>"  class="form-control col-md-7 col-xs-12">

        </div>
    </div>

    <div class="form-group">
        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="city">City Name<span class="required">*</span>
        </label>
        <div class="col-md-6 col-sm-6 col-xs-12">
            <?php 
                $sqlcity = "SELECT * FROM tbl_cities WHERE id = '".$location_result['loc_city_key']."'";
                $querycity = mysqli_query($con,$sqlcity);
                $city_result = mysqli_fetch_array($querycity);
            ?>
            <input type="text" id="user_city" DISABLED value="<?=$city_result['name']?>"  class="form-control col-md-7 col-xs-12">
        </div>
    </div>
    <div class="form-group">
        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="address">Address<span class="required">*</span>
        </label>
        <div class="col-md-6 col-sm-6 col-xs-12">
        <input type="text" id="user_address" DISABLED value="<?=$location_result['loc_address']?>"  class="form-control col-md-7 col-xs-12">                                                    </div>
    </div>
    <div class="form-group">
        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="post-code">Zip Code<span class="required">*</span>
        </label>
        <div class="col-md-6 col-sm-6 col-xs-12">
            <input type="text" id="user_zip" DISABLED value="<?=$location_result['loc_zip']?>"  class="form-control col-md-7 col-xs-12"> 
        </div>
    </div>

    <div class="form-group">
        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="mobile">Mobile Number<span class="required">*</span>
        </label>
        <div class="col-md-6 col-sm-6 col-xs-12">
            <input type="text" id="user_mobile" DISABLED value="<?=$location_result['loc_mobile']?>"  class="form-control col-md-7 col-xs-12"> 
        </div>
    </div>

    <div class="form-group">
        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="phone">Landline Number<span class="required">*</span>
        </label>
        <div class="col-md-6 col-sm-6 col-xs-12">
            <input type="text" id="user_phone" DISABLED value="<?=$location_result['loc_phone']?>"  class="form-control col-md-7 col-xs-12"> 
        </div>
    </div>
    <div class="actionBar"></div>


    <?php }
    mysqli_close($con);
?>

    
                                
