<link rel="stylesheet" type="text/css" href="http://amplepoints.com/slider/demoStyleSheet.css" />

<script type="text/javascript" src="http://amplepoints.com/product_filter/js/jquery-1.10.1.min.js"></script>
<script type="text/javascript" src="http://amplepoints.com/slider/fadeSlideShow.js"></script>
<script type="text/javascript">
    $(document).ready(function(){
        //alert('hi');
        $('#slideshow').fadeSlideShow();


    });
</script>
<?php 
    session_start();

    require("db_config.php");

    if(!empty($_GET['cat_id']))
    {
        $cat=$_GET['cat_id'];
        $query="SELECT * From game_vedio where vedio_category = '".$cat."'";
        $result = mysqli_query($con,$query);
        $videocount = mysqli_num_rows($result);
        if($videocount>0){
        ?>
        <ul class="first-forth">
            <?php while($video= mysqli_fetch_array($result)){?>
                <li style="width:150px;height:150px;" class="vid"><?php echo $video['vedio_name']; ?></li>
                <?php }  ?>

        </ul>

        <?php } else { ?>
        <h2> No Video Found!!</h2>

        <?php } 

    }
    if(!empty($_POST['game_banner_id']))
    {
        $game_banner_id=$_POST['game_banner_id'];
        $query2="SELECT * From bannersgame where game_banner_category = '".$game_banner_id."'";
        $result2 = mysqli_query($con,$query2);
        $videocount2 = mysqli_num_rows($result2);
    ?>
    <div id="slideshowWrapper">
    <ul id="slideshow">
    <?php
        if($videocount2>0){

            while($data=mysqli_fetch_assoc($result2)){

                $vendorid = $data['vendor_id'];  
                $queryvdrname = "SELECT * FROM tbl_vendor WHERE tbl_vndr_id = $vendorid";  
                $resultname = mysqli_query($con,$queryvdrname);
                $vendordata = mysqli_fetch_assoc($resultname);
            ?>
            <li><a href="http://amplepoints.com/productbyseller/<?php echo str_replace(' ', '', $vendordata['tbl_vndr_dispname']); ?>/<?php echo $data['vendor_id']; ?>" target="_blank"> <img src="http://amplepoints.com/public/game_images/<?php echo $data['banner_image']; ?>"/></a>
                <div class="category_banner"><?php $banner_id=$data['user_id'];  ?></div>

                <div class="bottom-catergorylisting">
                    <a class="addplay" id="<?php echo $banner_id; ?>" href="javascript:void(0);" >Add to Playlist</a>
                    <a class="aadfav" id="<?php echo $banner_id; ?>" id="<?php echo $banner_id; ?>"  href="javascript:void(0);" >Favorite</a>

                </div>
            </li>
            <?php }
            echo"</ul></div>";

        }else{

            echo "<h2> No Related Banner Found!!</h2>";
        }
    }


?>

<script>
    $(document).ready(function() {
        $(".first-lbtn").click(function(){
            alert();
        });
    });
</script>