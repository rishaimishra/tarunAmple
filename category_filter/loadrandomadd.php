<?php
    $rootUrl = (!empty($_SERVER['HTTPS']) ? 'https' : 'http') . '://' . $_SERVER['HTTP_HOST'];
    
    $userid = $_GET['user_id'];
    $fromrow = $_GET['from_add'];

    require("db_config.php");

    //$sql = "SELECT * FROM `tbl_advertises` ORDER BY `adver_id` DESC LIMIT $fromrow,1";
    
    $sql = "SELECT * FROM `tbl_advertises` WHERE `status` = '1' ORDER BY `adver_id` DESC LIMIT $fromrow,1";

    $adverdata = mysqli_query($con,$sql);

    $key = mysqli_fetch_array($adverdata);

?>
<div class="ads-setss">
    <div  id="dd_<?=$key['adver_id'];?>"  class="main-logo"><img  src="<?php echo $rootUrl.'/adver_images/image/'.$key['adver_logo'];?>"/>
    </div>
    <input type="hidden" name="hiddenvaldd" value="<?=$key['adver_id']?>">
    <input type="hidden" class="commentId" name="hiddenvaldver" value="<?=$key['adver_type']?>">
    <input type="hidden" class="commentId" name="hiddenuserid" value="<?php echo $userid; ?>">
    <div class="ads-band">
        <h2 class="ads-band-left"><span><?php if($key['view']==''){ echo '0'; }else{
                    echo $key['view']; } ?></span> View</h2>

        <!--<span>you are earning <?=$key['ad_price']?> amples<span>-->
        <?php if($key['adver_type']=='video'){ ?>
            <div class="ads-band-right"><span class="timer"><?=$key['length_video']?>Sec<img src="<?php echo $rootUrl.'/adver_images/icon-viedo.png';?>"></span> </div>
            <?php }else{?>
            <div class="ads-band-right"><span class="timer">15Sec<img src="<?php echo $rootUrl.'/adver_images/icon-static.png';?>"></span> </div>
            <?php } ?>
        <div class="clear"></div>
    </div>
</div>