<?php /* Please Do Not Change Any Code In this File If you want To change Please contact Mr.Tony*/ ?>
<?php $rootUrl = (!empty($_SERVER['HTTPS']) ? 'https' : 'http') . '://' . $_SERVER['HTTP_HOST']; ?>
<style>

    .current-time.timersspan.urgentmnewamples {
        width: auto;
    }
    .top-set-video-sound .fa.fa-volume-up, .top-set-video-sound .fa.fa-volume-off {
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
        padding: 13px 0 0;
        position: absolute;
        right: 7px;
        text-align: center;
        text-shadow: 0 1px 0 #555555;
        top: 27px;
        width: 58px;
        z-index: 9999;
    }
    .top-set-video-sound{display:none;}
    .video-player:hover .top-set-video-sound{display:block;}
    .ads_logo_container{
        position: absolute;
        bottom: 6px;
    }

    .ads_logo{
        width: 100px;
    }
</style>
<?php 
    $q1 =$_GET['user_id'];
    $q2 = $_GET['vedio_link'];
    $q3 =$_GET['adver_id'];
    $q4 =$_GET['poster'];
    //print_r($_GET);die;

    require("db_config.php");

    $sql="SELECT * FROM tbl_advertises WHERE adver_id = '".$q3."'";
    $result = mysqli_query($con,$sql);
    $row = mysqli_fetch_array($result);
?>
<a class="pause clocse-my-video">x<a/>
<div class="top-set-video-sound">
    <i class="fa fa-volume-up" onclick="enableMute()" aria-hidden="true" style="display: block;"></i>
    <i class="fa fa-volume-off" style="display: none;" onclick="disableMute()" aria-hidden="true"></i>
</div>
<script>
    var vid = document.getElementById("newmyvideo");

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

    $('.clocse-my-video').click(function(){
        console.log('clocse-my-video in videohomefilet call');
        clearTimeout(mytimeout);
        $('.game-left-box .main-wpappers .myunick').remove();
        $('.video-player').html('');
        $('.game-left-box > .frame').css('zIndex',3000);
        $('.mynewgame .video-player').css('zIndex',0);
        toggleVideo();
        startAddRotation();
    });
</script> 

<div class="player">
<div class="ads_logo_container">

    <img class="ads_logo" src="<?php echo cdnUrl('adver_images/image/'.$row['adver_logo']); ?>">

</div>
<div class="mediaplayer">
    <video id="newmyvideo" poster="<?=$q2;?>" autoplay>
        <source src="<?=$q2;?>" type="video/mp4" />
        <source src="<?=$q2;?>" type="video/webm" />
    </video>
</div>
<div class="blank-disable-div">

    you are earning <span style="color:#ff4500"> 0:<span id="timersspans" class="current-times timersspans"></span></span><span>amples</span>

</div>


<div class="top-set-video">

    <input value="play" type="button" class="play" />
    <span><span  id="timersspanss" class="timersspan"></span></span>
    <div class="last-times">You are Earning <span class="current-time timersspan urgentmnewamples"></span><span class="amils-clr">Amples</span></div>
</div>

<!--<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>-->

<script>
    var count=<?=$row['length_video'];?>;

    var counter=setInterval(timer, 1000);
    function timer()
    {
        count=count-1;
        if (count < 0)
            {
            clearInterval(counter);
            return;
        }

        document.getElementById("timersspans").innerHTML=count; // watch for spelling
        document.getElementById("timersspanss").innerHTML=count; // watch for spelling
    }

</script>
<script>
    var mytimeout;
    var mytime = "<?=$row['length_video'];?>";
    var Bytime = mytime * 1000;
    mytimeout = setTimeout(function(){ 
        console.log('Video Time Over');
        $('.game-left-box > .frame').css('zIndex',3000);
        $('.mynewgame .video-player').css('zIndex',0);
        toggleVideo();
        //alert();
        var adver_id = "<?=$q3;?>";
        var u_id = "<?=$q1;?>";
        //alert(adver_id);
        //    alert(u_id);
        $.ajax({
            //alert();           
            //url: 'http://amplepoints.com/public/category_filter/staticfilter.php',
            url: '<?=$rootUrl;?>/category_filter/staticfilter.php',
            data: {adverid: adver_id,user_id: u_id},
            type: 'GET'
        })
        .done(function(data){
            // alert(data);
            //$('.cf').addClass('slider-mainbox');
            //$('.main-slider-shocase-box').css('display','block');
            //alert(data);
            //    $('.l-player-slid').html(data);
            //    $('.slider').html(data);

            $('.main-slider-shocase-box').css('display','block');
            $('.box-l-player-slid').html(data);

            $('.l-player-slid li:nth-child(1)').addClass('first-l');
            $('.l-player-slid li:nth-child(2)').addClass('second-l');
            $('.l-player-slid li:nth-child(3)').addClass('third-l');
            $('.l-player-slid li:nth-child(4)').addClass('forth-l');
            $('.l-player-slid li:nth-child(5)').addClass('fifth-l');


        })
    }, Bytime);
</script>
<script>
    /*$(document).ready(function () {
    alert("hy");

    });*/

    //add some controls

    //$(function() {
    $('div.player').each(function () {
        var player = this;
        var getSetCurrentTime = createGetSetHandler(

        function () {
            $('input.time-slider', player).prop('value', $.prop(this, 'currentTime'));
        }, function () {

        });

        $('video, audio', this).bind('durationchange updateMediaState', function () {
            var duration = $.prop(this, 'duration');
            if (!duration) {
                return;
            }

            /*$('span.duration', player).text(duration);*/
        }).bind('timeupdate', function () {
            var durations = $.prop(this, 'duration');
            var current = $.prop(this, 'currentTime');
            //alert(durations);
            var cr = Math.round(current);
            var dr = Math.round(durations);

            /*if(cr == dr){

            }  */

            var cur = $.prop(this, 'currentTime');
            var c = Math.round(cur);

            //alert(c);

            $('span.current-time', player).text('0:'+c);

            /*$('span.current-time', player).text($.prop(this, 'currentTime'));*/
        }).bind('timeupdate', getSetCurrentTime.get).bind('emptied', function () {
            $('input.time-slider', player).prop('disabled', true);
            $('span.duration', player).text('--');
            $('span.current-time', player).text(0);
        })

        $('input.play', player).bind('click', function () {
            $('video, audio', player)[0].play();
        });
        $('input.pause', player).bind('click', function () {
            $('video, audio', player)[0].pause();
        });

    });
    //});
    function createGetSetHandler(get, set) {

        return {
            get: function () {
                /*if (blocked) {
                return;
                }*/
                return get.apply(this, arguments);
            },

        };
    };
</script>
