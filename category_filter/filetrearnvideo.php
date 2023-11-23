<?php 
    session_start();

    require("db_config.php");

    if(!empty($_POST['cat_id']))
    {
        $cat = $_POST['cat_id'];
        $query = "SELECT * From game_vedio where vedio_category = '".$cat."'";
        //echo $query;
        $result = mysqli_query($con,$query);
        $videocount = mysqli_num_rows($result);
        if($videocount>0){
        ?>

        <?php while($video = mysqli_fetch_array($result)){?> 
            <li class="all-a video col-sm-3 product-container no-space a1 vid"  id='<?php echo $video['vedio_name']; ?>' style="">
                <div class="left-block"> 
                    <figure><?php echo $video['vedio_name']; ?></figure>
                </div>
                <div class="box-text-a">
                    <div class="blog-text-a">
                        <h5><?php echo $video['vediotitle']; ?></h5>
                    </div>
                    <div style=padding-left:10px><span style="float:left; padding-right:5px; color:#ff0000">By:</span> <a href="#">Amplepoints</a> </div>

                    <div class="by_aria">
                        <a href="#" title="Add to Cart"><i class="fa fa-play"></i> PLAY</a> 
                    </div>
                </div>
            </li>
            <?php }  ?>

        <script>
            $(document).ready(function() {
                $('.vid').on('click', function(ev) {
                    console.log('call this');
                    var ID = $(this).attr('id');

                    $(".frame .mediaplayer").html('');
                    $(".frame .mediaplayer").append(ID);
                    $('.game-left-box > .frame').css('zIndex',3000);
                    $('.mynewgame .video-player').css('zIndex',0);
                    var _src = $(".mediaplayer iframe").attr("src");

                    if(_src.indexOf("?") >= 0){

                        $(".mediaplayer iframe").attr("src", _src + '&enablejsapi=1&autoplay=1');

                    }else{

                        $(".mediaplayer iframe").attr("src", _src + '?enablejsapi=1&autoplay=1');  
                    }

                    ev.preventDefault();

                });
            });
        </script> 

        <?php } else { ?>
        <h2> No Video Found!!</h2>

        <?php } 

    }
    die;
?>