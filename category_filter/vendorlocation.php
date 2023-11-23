<?php
    $rootUrl = (!empty($_SERVER['HTTPS']) ? 'https' : 'http') . '://' . $_SERVER['HTTP_HOST'];
    require("db_config.php");
    // dd(1);
    if($_GET['id']){
        $cat_id = $_GET['id'];
        $sql = "SELECT * FROM vendor_location WHERE vendor_id = '".$cat_id."'"; 
        //echo $sql;die;
        $query = mysqli_query($con,$sql);
        $count = mysqli_num_rows($query); 
        if($count > 0){
        ?>
        <select id="locpick" name="locpick" class="selectpicker" data-style="btn btn-primary btn-round" data-live-search="false" data-size="7" title="Select Store">
            <option value="">Select Store</option>


            <?php while($location_result = mysqli_fetch_array($query)){ ?>
                <option value="<?=$location_result['loc_store']?>"><?=$location_result['loc_store']?></option>
                <?php } ?> 


        </select>
        <input type="hidden" name="hiddenvendorids" id="hiddenvendorids" value="<?=$cat_id;?>">

        <?php } else{?>
        <h2>No Pickup Location Found</h2>
        <?php } ?>
    <!--<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>-->
    <script>
        $(document).ready(function(){
            $('#locpick').change(function(){
                //alert('hi');
                var locstore = $(this).val();
                var vendid = $('#hiddenvendorids').val();
                
                //alert(vendid);
                
                $.ajax({
                    url: '<?php echo $rootUrl; ?>/category_filter/vendorstoreaddress.php',
                    data: {locstore: locstore,vid: vendid},
                    type: 'GET'
                })
                .done(function(data){
                    //alert(data);
                    $('#storeuploc').css('display' , 'block');
                    $('#storeuplocs').html(data);

                })
            });
        });
    </script>

    <?php }
    mysqli_close($con);
?>

    
                                
