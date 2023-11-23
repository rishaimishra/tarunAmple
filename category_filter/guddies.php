<?php 
    session_start();
    $q = intval($_GET['adverid']);
    require("db_config.php");
    $sql="SELECT * FROM tbl_guddies INNER JOIN tbl_guddies_question ON tbl_guddies.guddies_id = tbl_guddies_question.goodi_id WHERE status = 'A'";
    $result = mysqli_query($con,$sql);
    $goodies = mysqli_fetch_array($result);
?>


<div class="main-wpappers bonce">
    <div class="mainpop1">
        <table>
            <tbody><tr>
                    <td><img src="http://amplepoints.com/goodies_image/<?=$goodies['pro_image'];?>">
                    </td><td>
                        <h5>You Have Earned</h5>
                        <h4>A Goodie!</h4>
                        <span class="cust"></span>
                        <div class="blackband">
                            Free <?=$goodies['pro_title'];?> Value <span>$<?=$goodies['retail_price'];?></span>
                        </div>
                    </td>
                </tr>
                <tr class="last-btn">
                    <td colspan="2"><a href="#" class="active second yestostart">Yes</a><a href="#"  class="first closeme">No thanks</a></td>
                </tr>
            </tbody></table>
    </div>
    <div class="mainpop2"  style="display:none;">
        <h2>Survey</h2>
        <p>Please answer these 2 Survey Qustion !</p>
        <!--<form method="post" action="">-->
        <input type="hidden" name="adverid" value="<?=$q;?>">
        <div class="div-qustionsa" id="hihher">

            <div class="qustionsa">
                <p>1. <?=$goodies['question'];?></p>
                <ul>
                    <li>
                        <input type="radio" name="ans1" value="<?=$goodies['ans1'];?>"> <?=$goodies['ans1'];?>
                    </li>
                    <li>
                        <input type="radio" name="ans1" value="<?=$goodies['ans2'];?>"> <?=$goodies['ans2'];?>
                    </li>
                    <li>
                        <input type="radio" name="ans1" value="<?=$goodies['ans3'];?>"> <?=$goodies['ans3'];?>
                    </li>
                </ul>        
            </div>
            <a href="#"  style="display:none;" id="next1" class="next-btns">Next</a>
        </div>
        <div class="div-qustionsa" id="hihher2">
            <div class="qustionsa">
                <p>

                    2. <?=$goodies['question2'];?>
                </p>

                <ul>
                    <li>
                        <input type="radio" name="ans2" value="<?=$goodies['ans21'];?>"> <?=$goodies['ans21'];?>
                    </li>
                    <li>
                        <input type="radio" name="ans2" value="<?=$goodies['ans22'];?>"> <?=$goodies['ans22'];?>
                    </li>
                    <li>
                        <input type="radio" name="ans2" value="<?=$goodies['ans23'];?>"> <?=$goodies['ans23'];?>
                    </li>
                </ul>
            </div>
            <a href="#" style="display:none;" id="next2" class="next-btns">Next</a>
        </div>
        <div class="div-qustionsa" id="hihher3">
            <div class="qustionsa">

                <p>
                    3. <?=$goodies['question3'];?>
                </p>

                <ul>
                    <li>
                        <input type="radio" name="ans3" value="<?=$goodies['ans31'];?>"> <?=$goodies['ans31'];?>
                    </li>
                    <li>
                        <input type="radio" name="ans3" value="<?=$goodies['ans32'];?>"> <?=$goodies['ans32'];?>
                    </li>
                    <li>
                        <input type="radio" name="ans3" value="<?=$goodies['ans33'];?>"> <?=$goodies['ans33'];?>
                    </li>
                </ul>
            </div>
            <!--<input type="submit" name="submitgodd" style="display:none;" id="next3" value="CLAIM GOODIE!">-->
            <a href="#" style="display:none;" id="next3" class="claiomnext-btns">CLAIM GOODIE!</a>
        </div>
        <!--</form>-->
    </div>
    <!--<div class="mainpop3 mainpop1" style="display:none;">
    <div class="thanksmsg">
    <span class="mecloser">X</span>
    <img src="http://amplepoints.com/category_filter/imgss.gif"/>
    </div>
    </div>-->
</div>



<script>
    $(document).ready(function(){
        $("input[name='ans1']").click(function () {
            $("#next1").show();
        });     

        $("input[name='ans2']").click(function () {
            $("#next2").show();
        });    

        $("input[name='ans3']").click(function () {
            $("#next3").show();
        });            
    });
</script>
<script>
    $(document).ready(function(){
        $('.closeme').click(function(){
            var id = "<?=$q;?>";
            $.ajax({
                url: 'http://amplepoints.com/category_filter/adver.php',
                data: {adverid: id},
                type: 'GET'
            })
            .done(function(data){
                $('#adverpro').css('display','block');
                $('#guddies').css('display','none');
                $('#adverpro').html(data);
            });
        });
        $('.yestostart').click(function(){
            $('.mainpop2').css('display','block');
            $('#hihher').css('display','block');
            $('.mainpop1').css('display','none');
        });
        $('.mecloser').click(function(){
            var id = "<?=$q;?>";
            $.ajax({
                url: 'http://amplepoints.com/category_filter/adver.php',
                data: {adverid: id},
                type: 'GET'
            })
            .done(function(data){
                $('#adverpro').css('display','block');
                $('#guddies').css('display','none');
                $('#adverpro').html(data);
            });

        });

        $('.next-btns').click(function(){
            $(this).parent().addClass('hidethisbox');
            $(this).parent().css('display' , 'none');
            $('.mainpop1').css('display','none');
        });

        $('.claiomnext-btns').click(function(){
            var id = "<?=$q;?>";
            $.ajax({
                url: 'http://amplepoints.com/category_filter/adver.php',
                data: {adverid: id},
                type: 'GET'
            })
            .done(function(data){
                $('#adverpro').css('display','block');
                $('.mainpop2').css('display','none');
                $('.mainpop1').css('display','none');
                $('#adverpro').html(data);
            });
        });
    });
</script>
<style>
    .claiomnext-btns{
        background: #858585 none repeat scroll 0 0;
        border-radius: 3px;
        bottom: -21px;
        box-shadow: 0 2px 1px #b9b9b9;
        box-sizing: border-box;
        color: #fff;
        float: right;
        font-size: 15px;
        font-weight: bold;
        height: auto;
        margin: 18px 0 0 6px;
        padding: 5px 0;
        right: -18px;
        text-align: center;
        text-decoration: none;
        width: 106px;
    }
</style>