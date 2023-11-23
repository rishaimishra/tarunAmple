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
    <div  id="dd_<?=$key['adver_id'];?>"  class="main-logo">
        <img src="<?php echo cdnUrl('adver_images/image/'.$key['adver_logo']);?>" class="bigsize"/>
    </div>
    <input type="hidden" name="hiddenvaldd" value="<?=$key['adver_video']?>">
    <input type="hidden" class="commentId" name="hiddenvaldver" value="<?=$key['adver_type']?>">
    <input type="hidden"  name="hiddenposter" value="<?=$key['adver_logo']?>">
    <input type="hidden"  name="hiddenaddverid" value="<?=$key['adver_id']?>">
    <input type="hidden"  name="hiddenuserid" id="user" value="<?php echo $user=$userid;?>">

    <div class="ads-band">
        <h2 class="ads-band-left"><span><?php if($key['view']==''){ echo '0'; }else{
                    echo $key['view']; } ?><span> Views</h2>
        <?php if($key['adver_type']=='video'){ ?>
            <div class="ads-band-right"><span class="timer"><?=$key['length_video']?>Sec<img src="<?php echo cdnUrl('adver_images/icon-viedo.png');?>"></span> </div>
            <?php }else{?>
            <div class="ads-band-right"><span class="timer">15Sec<img src="<?php echo cdnUrl('adver_images/icon-static.png');?>"></span> </div>
            <?php } ?>

    </div>
</div>