<?php
    $q = intval($_GET['q']);

    require("db_config.php");

    $sql="SELECT * FROM subscription WHERE id = '".$q."'";
    $result = mysqli_query($con,$sql);


    while($row = mysqli_fetch_array($result)) {
    ?>

    <div class="form-group">
        <label for="Plan_fee" class="bmd-label-floating"> Plan Fee *</label>
        <input type="text" class="form-control" name="Plan_fee" id="Plan_fee" value="<?php echo $row['Plan_Fee2'] ?>">
    </div> 

    <?php
    }

    mysqli_close($con);
?>
