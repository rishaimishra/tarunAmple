<?php 
    $rootUrl = (!empty($_SERVER['HTTPS']) ? 'https' : 'http') . '://' . $_SERVER['HTTP_HOST'];
    require("db_config.php");
    if(!empty($_POST['load_slide'])){
    
        $game_banner_id=$_POST['load_slide'];
        $query2="SELECT * From bannersgame";
        $result2 = mysqli_query($con,$query2);
        $videocount2 = mysqli_num_rows($result2);
    ?>
    <?php
        if($videocount2 > 0){
            echo '<ul id="slideshow">';
            while($data=mysqli_fetch_assoc($result2)){

                $vendorid = $data['vendor_id'];  
                $queryvdrname = "SELECT * FROM tbl_vendor WHERE tbl_vndr_id = $vendorid";  
                $resultname = mysqli_query($con,$queryvdrname);
                $vendordata = mysqli_fetch_assoc($resultname);  
            ?>
            <li>
                <a href="<?php echo $rootUrl; ?>/productbyseller/<?php echo str_replace(' ', '', $vendordata['tbl_vndr_dispname']); ?>/<?php echo $data['vendor_id']; ?>" target="_blank"> 
                    <img src="<?php echo cdnUrl('game_images/'.$data['banner_image']); ?>"/>
                </a>
                <div class="category_banner">
                    <?php 
                       // $data['game_banner_category'];  
                        $banner_id=$data['user_id'];  
                    ?>
                </div>
                <div id="playlistreply">
                </div>
                <div class="bottom-catergorylisting">
                    <a class="addplay" id="<?php echo $banner_id; ?>" href="javascript:void(0);" >Add to Playlist</a>
                    <a class="aadfav" id="<?php echo $banner_id; ?>" id="<?php echo $banner_id; ?>"  href="javascript:void(0);" >Favorite</a>
                </div>
            </li>


            <?php }
            echo "</ul>";
        }else{

            echo 'nodata';
        }
    }


?>
