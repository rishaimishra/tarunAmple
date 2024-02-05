<?php
    $rootUrl = (!empty($_SERVER['HTTPS']) ? 'https' : 'http') . '://' . $_SERVER['HTTP_HOST'];
    
    function GetVideoThumbnail($VideoType,$VideoCode){

        $videoimageUrl = '';


        if($VideoType == 'youtube'){

            $videoimageUrl = "https://img.youtube.com/vi/$VideoCode/0.jpg";

        }else if($VideoType == 'vimeo'){

                $vimeo = unserialize(file_get_contents("http://vimeo.com/api/v2/video/$VideoCode.php"));
                //$small = $vimeo[0]['thumbnail_small'];
                //$medium = $vimeo[0]['thumbnail_medium'];
                $large = $vimeo[0]['thumbnail_large'];
                $videoimageUrl = $large;

            }else if($VideoType == 'dailymotion'){

                    $videoimageUrl = "https://www.dailymotion.com/thumbnail/video/$VideoCode";

                }else{

                    $videoFram = ''; 
        }

        return $videoimageUrl;
    }

?>
<?php if(!empty($allvideosData)){ ?>
    <?php if($allvideosData){
            $i = 1;
            foreach($allvideosData as $key2){

            ?>
            <li class="all-a video col-sm-3 product-container no-space a1 vid"  id='<?php echo $key2->vedio_name; ?>' style="">
                <div class="left-block"> 
                    <?php 

                        $videoVode = $key2->video_code;
                        $videoType = $key2->video_type;

                        $thumbURL = '';

                        $thumbURL = GetVideoThumbnail($videoType,$videoVode);

                        if(empty($thumbURL)){

                            $thumbURL = "$rootUrl/images/defaultvideo.png"; 
                        }
                    ?>
                    <figure><img src="<?php echo $thumbURL;?>" style="height: 100%;width: 100%;"></figure>
                </div>
                <div class="box-text-a">
                    <div class="blog-text-a">
                        <!--p> <a href="#"></a>
                        <?php //echo $key2->tags; ?></p>-->
                        <h5><?php echo $key2->vediotitle; ?></h5>
                    </div>
                    <div style=padding-left:10px><span style="float:left; padding-right:5px; color:#ff0000">By:</span> <a href="#">Amplepoints</a> </div>

                    <div class="by_aria">
                        <a href="#" title="Add to Cart"><i class="fa fa-play"></i> PLAY</a> 
                    </div>
                </div>
            </li>


            <?php
            }
        }
    }else{

        echo "novideo";
} ?>
