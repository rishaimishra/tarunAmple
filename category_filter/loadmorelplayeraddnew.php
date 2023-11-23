<?php
    $rootUrl = (!empty($_SERVER['HTTPS']) ? 'https' : 'http') . '://' . $_SERVER['HTTP_HOST'];

    $userid = $_GET['user_id'];
    $fromrow = $_GET['from_add'];

    require("db_config.php");

    $adverise = array();

    $sql = "SELECT * FROM `tbl_advertises` WHERE `status` = '1' ORDER BY `ad_price` DESC";

    $adverdata = mysqli_query($con,$sql);

    //$key = mysqli_fetch_array($adverdata);    


    $igd = $userid;

    //$forTotalRecord = mysqli_query($con,"SELECT * FROM `tbl_advertises` WHERE `status` = '1'");
    //$toatalAdds = mysqli_num_rows($forTotalRecord);

    $resrfff = mysqli_query($con,"SELECT  * FROM `tbl_user_interest` where customerId = '$igd' and isselected = 1 ");

    $interestrow = mysqli_num_rows($resrfff);

    if($interestrow > 0){

        while ($rowyrff = mysqli_fetch_row($resrfff)){
            $datarff[] = $rowyrff['2'];
        }

        $arrd1 = array_unique($datarff);

        while($key = mysqli_fetch_assoc($adverdata)){

            $my_id = $key['adver_id'];

            $datarhh = array();    

            $resrhh = mysqli_query($con,"SELECT  * FROM `adver_intrest` where add_id = '$my_id' ");

            $adverinterst =  mysqli_num_rows($resrhh);

            if($adverinterst > 0) {

                while ($rowyrhh = mysqli_fetch_row($resrhh)){
                    $datarhh[] = $rowyrhh['2'];
                }
                $arrd2 = array_unique($datarhh);
                //print_r($arrd2);
                //print_r($arrd1);
                //print_r($arrd2);
                $resultfix = array_intersect($arrd2,$arrd1);

                $resultfixrow = count($resultfix);
                //echo $resultfixrow;
                if($resultfixrow > 0){

                    $adverise[] = $key;  
                }

            }

        }
    }

    if(!empty($adverise)){

        $displayadd = $adverise[$fromrow]; 

    }
    if(isset($displayadd) && !empty($displayadd)){
    ?>
    <div class="ads-setss">
        <div  id="dd_<?=$displayadd['adver_id'];?>"  class="main-logo">
            <img src="<?php echo cdnUrl('adver_images/image/'.$displayadd['adver_logo']);?>" class="bigsize"/>
        </div>
        <input type="hidden" name="hiddenvaldd" value="<?=$displayadd['adver_video']?>">
        <input type="hidden" class="commentId" name="hiddenvaldver" value="<?=$displayadd['adver_type']?>">
        <input type="hidden"  name="hiddenposter" value="<?=$displayadd['adver_logo']?>">
        <input type="hidden"  name="hiddenaddverid" value="<?=$displayadd['adver_id']?>">
        <input type="hidden"  name="hiddenuserid" id="user" value="<?php echo $user=$userid;?>">

        <div class="ads-band">
            <h2 class="ads-band-left"><span><?php if($displayadd['view']==''){ echo '0'; }else{
                        echo $displayadd['view']; } ?><span> Views</h2>
            <?php if($displayadd['adver_type']=='video'){ ?>
                <div class="ads-band-right"><span class="timer"><?=$displayadd['length_video']?>Sec<img src="<?php echo cdnUrl('adver_images/icon-viedo.png');?>"></span> </div>
                <?php }else{?>
                <div class="ads-band-right"><span class="timer">15Sec<img src="<?php echo cdnUrl('adver_images/icon-static.png');?>"></span> </div>
                <?php } ?>

        </div>
    </div>
    <?php } ?>