<?php /* Please Do Not Change Any Code In this File If you want To change Please contact Mr.Tony*/ ?>
<?php 
$rootUrl = (!empty($_SERVER['HTTPS']) ? 'https' : 'http') . '://' . $_SERVER['HTTP_HOST']; 


$protocol = isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? 'https' : 'http';
$host = $_SERVER['HTTP_HOST'];
$script_path = $_SERVER['SCRIPT_NAME'];

// Extract the directory part from the script path
$project_path = dirname($script_path);
$base_url = $protocol . '://' . $host . $project_path;
// echo $base_url;
// die();
?>
<style>
    .pause.clocse-my-video { font-size: 16px;height: 23px;width: 23px;}
    .top-set-video .fa.fa-volume-up, .top-set-video .fa.fa-volume-off {
        background: rgba(255, 255, 255, 0.3) none repeat scroll 0 0;
        border: 1px solid rgba(255, 255, 255, 0.5);
        border-radius: 36px;
        bottom: auto;
        color: #dedede;
        cursor: pointer;
        display: none;
        font-size: 29px;
        height: 58px;
        left: auto;
        padding: 8px 0 0;
        position: absolute;
        right: 0;
        text-align: center;
        text-shadow: 0 1px 0 #555555;
        top: 27px;
        width: 58px;
        z-index: 9999;
        right: 7px;
    }
    .top-set-video:hover .fa{display:block;}
    /*.player .top-set-video{display:none;} */
    .player:hover .top-set-video{display:block;}

    .currenttimers {
        bottom: 0;
        position: absolute;
        right: 3px;
        top: 3px;
    }
    .currenttimers > span {
        bottom: 5px;
        color: #ff0000;
        font-weight: bold;
        height: 17px;
        overflow: hidden;
        position: absolute;
    }

    .ads_logo_container{
        position: absolute;   
    }

    .ads_logo{
        width: 75px;
    }

</style>


<?php 
    $q = intval($_GET['camid']);
    $userid = intval($_GET['userid']);
    require("db_config.php");


    $sql="SELECT * FROM tbl_advertises WHERE adver_id = '".$q."'";
    $result = mysqli_query($con,$sql);
    // $row = mysqli_fetch_array($result);
    //  print_r($row);
    // die();
    while($row = mysqli_fetch_array($result)) {
    ?>


    <div class="video-player">    
        <div class="player">
            <div class="ads_logo_container">
                
           <img class="ads_logo" src="https://amplepoints.com/adver_images/image/<?php echo $row['adver_logo']; ?>">          
            </div>


        <div class="mediaplayer">

                <video autoplay playsinline muted id="myVideo" style="width: 375px;">
                <source type="video/mp4" src="https://amplepoints.com/adver_images/video/<?php echo $row['adver_video']; ?>">
                <source type="video/webm" src="https://amplepoints.com/adver_images/video/<?php echo $row['adver_video']; ?>">
            </video>



            </div>
            <div class="blank-disable-div">
                <!--you are earning <span><?=$row['length_video'];?>" amples</span>-->
                you are earning <span style="color:#ff4500">0:<span class="current-times timersspans"></span></span><span> amples</span>
            </div>


            <div class="top-set-video">

                <!--<input value="play" type="button" class="play" />-->


                <i class="fa fa-volume-up" style="display:none;" onclick="enableMute()" aria-hidden="true"></i>
                <i class="fa fa-volume-off" onclick="disableMute()" aria-hidden="true"></i>
            </div>
            <div class="currenttimers">
                <input value="X" type="button" class="pause clocse-my-video" />
                <span><span class="current-time timersspan"></span><br/><span class="duration"></span></span>
            </div>
        </div>
    </div>

 
    <script>
        var mytimeout;
        var mytime = "<?=$row['length_video'];?>";
        var Bytime = mytime * 1000;
        mytimeout = setTimeout(function(){ 
            var id = "<?=$q;?>";
            var user_id = "<?=$userid;?>";
            //alert(id);
            alert(user_id);
            $.ajax({
                url: '<?php echo $base_url; ?>/adver.php',
                //cache:false,
                data: {adverid: id,userid: user_id},
                type: 'GET'
            })
            .done(function(data){
                // alert(data); 
                console.log(data)   

                $('#member').css('display','none');
                $('.main-wpappers').css('display','none');
                $('#adverpro').css('display','block');
                $('#adverpro').html(data);
            });
            //$('.video-player').css('display','none');
            // $('.main-wpappers').css('display','none');
            // $('.bonce').css('display','block');
        }, 1000);

    </script>

    <script>

        //setTimeout(function() { disableMute(); }, 2000);

        $(function(){
            $('.current-time').countdowntimer({
                seconds :<?=$row['length_video'];?>
                // size : "lg"
            });
        });
    </script>

    <script>


        //add some controls
        $(function () {
            //var current;

            var player = this;
            var getSetCurrentTime = createGetSetHandler(

            function () {
                $('input.time-slider', player).prop('value', $.prop(this, 'currentTime'));
            }, function () {

            });

            $('video, audio', this).bind('durationchange updateMediaState', function () {
                var duration = $.prop(this, 'duration');
                //alert(duration);
                if (!duration) {
                    return;
                }

                $('span.duration', player).text(duration);

            }).bind('timeupdate', function () {
                var durations = $.prop(this, 'duration');
                var current = $.prop(this, 'currentTime');
                //alert(durations);
                var cr = Math.round(current);
                var dr = Math.round(durations);

                /* if(cr == dr){
                alert("Hello");
                befor code here setTimeout function
                } */

                var cur = $.prop(this, 'currentTime');
                var c = Math.round(cur);

                //alert(c);
                $('span.current-times', player).text(c);


            }).bind('timeupdate', getSetCurrentTime.get).bind('emptied', function () {
                $('input.time-slider', player).prop('disabled', true);
                $('span.duration', player).text('--');
                $('span.current-times', player).text(0);


            })

            $('input.play', player).bind('click', function () {

                $('video, audio', player)[0].play();
            });
            $('input.pause', player).bind('click', function () {
                $('video, audio', player)[0].pause();

            });


        });
        function createGetSetHandler(get, set) {

            return {
                get: function () {

                    /* if (blocked) {
                    return;
                    }*/
                    return get.apply(this, arguments);
                },

            };
        };
    </script>
    <script>
        $(document).ready(function () {
            //alert('hier');
            $('.clocse-my-video').click(function(){
                //alert('hi');
                clearTimeout(mytimeout);
                $('#member').html('');
                $('#member').css('display','none');
                $('.main-wpappers').css('display','block');
                startAddRotation(); 
            });
        });

    </script>

    <!------------end slider page----------------->

    <?php
    }

    mysqli_close($con);
?>

<script>
$('.amples-valuess-box').click(function () {
    alert();
$(this).remove();
     });
     
</script>
<script>

var vid = document.getElementById("myVideo");

function enableMute() { 
    vid.muted = true;
    $('.fa-volume-off').css('display','block');
    $('.fa-volume-up').css('display','none');
} 

function disableMute() { 
    vid.muted = false;
    $('.fa-volume-up').css('display','block');
    $('.fa-volume-off').css('display','none');
    
} 

</script> 
