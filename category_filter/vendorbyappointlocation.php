<?php
    $rootUrl = (!empty($_SERVER['HTTPS']) ? 'https' : 'http') . '://' . $_SERVER['HTTP_HOST'];
    require("db_config.php");
    if($_GET['id']){
        
        $cat_id = $_GET['id'];
        
        $sql = "SELECT * FROM vendor_location WHERE vendor_id = '".$cat_id."'"; 
        
        $query = mysqli_query($con,$sql);
        
        $count = mysqli_num_rows($query); 
        
        if($count > 0){
        ?>
        <select id="locbyappoint" name="locbyappoint[]" class="date-picker form-control col-md-7 col-xs-12">
            <option value="">Select Store</option>


            <?php while($location_result = mysqli_fetch_array($query)){ ?>
                <option value="<?=$location_result['loc_store']?>"><?=$location_result['loc_store']?></option>
                <?php } ?> 


        </select>
        <input type="hidden" name="hiddenvendorid" value="<?=$cat_id;?>">

        <?php } else{?>
        <h2>No By Appointment Location Found</h2>
        <?php } ?>
    <!--<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>-->
    <script>
        $(document).ready(function(){
            $('#locbyappoint').change(function(){
                //alert('hi');
                var locstore = $('#locbyappoint').val();
                var vid = $("#locbyappoint").siblings("input[name=hiddenvendorid]").val();
                $.ajax({
                    url: '<?php echo $rootUrl; ?>/category_filter/vendorstoreapponitaddress.php',
                    data: {locstore: locstore,vid: vid},
                    type: 'GET'
                })
                .done(function(data){
                    // alert(data);
                    $('#storebyappointloc').css('display' , 'block');
                    $('#storebyappointloc').html(data);

                })
            });
        });
    </script>

    <?php }
    mysqli_close($con);
?>

    
                                
