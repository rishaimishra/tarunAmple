<?php

    require("db_config.php");

    if(isset($_POST['vendor_id']))
    {

        $vendorId = $_POST['vendor_id'];

        $sql="SELECT * FROM `tbl_vendor_images` WHERE `tbl_vndr_uid` = $vendorId";

        $result = mysqli_query($con,$sql);

        while($row = mysqli_fetch_array($result)) 
        {

        ?>
        <div class="col-md-12 text-center"><h4>Select Vendor Banner</h4></div>
        <div class="col-md-12" style="margin-top: 5px;">
            <div class="row">
                <div class="col-md-3">
                    <div class="choice" data-toggle="wizard-banner-checkbox">

                        <input type="checkbox" class="selected_banner" id="banner_1" name="banner" value="<?=$row['tbl_vndr_img_banr2'];?>"> 

                        <div class="banner_container">

                            <img style="width: 100%;height: 150px;" src="https://amplepoints.com/vendor-data/<?=$vendorId;?>/banner/<?=$row['tbl_vndr_img_banr2'];?>"/>

                        </div>

                    </div>
                </div>

                <div class="col-md-3">
                    <div class="choice" data-toggle="wizard-banner-checkbox">

                        <input type="checkbox" class="selected_banner" id="banner_2" name="banner" value="<?=$row['tbl_vndr_img_banr3'];?>"> 

                        <div class="banner_container">

                            <img style="width: 100%;height: 150px;" src="https://amplepoints.com/vendor-data/<?=$vendorId;?>/banner/<?=$row['tbl_vndr_img_banr3'];?>"/>

                        </div>

                    </div>
                </div>

                <div class="col-md-3">
                    <div class="choice" data-toggle="wizard-banner-checkbox">

                        <input type="checkbox" class="selected_banner" id="banner_3" name="banner" value="<?=$row['tbl_vndr_img_banr4'];?>"> 

                        <div class="banner_container">

                            <img style="width: 100%;height: 150px;" src="https://amplepoints.com/vendor-data/<?=$vendorId;?>/banner/<?=$row['tbl_vndr_img_banr4'];?>"/>
                        </div>

                    </div>
                </div>

                <div class="col-md-3">
                    <div class="choice" data-toggle="wizard-banner-checkbox">

                        <input type="checkbox" class="selected_banner" id="banner_3" name="banner" value="<?=$row['tbl_vndr_img_banr5'];?>"> 

                        <div class="banner_container">

                            <img style="width: 100%;height: 150px;" src="https://amplepoints.com/vendor-data/<?=$vendorId;?>/banner/<?=$row['tbl_vndr_img_banr5'];?>"/> 

                        </div>
                    </div>
                </div>

            </div>
        </div>
        <?php
        }

    }

?>
