<?php
$q = $_GET['q'];

require("db_config.php");
?>

<b>Advertisment for <?=$q;?></b> 
                                        
<input type="hidden" value="<?=$q;?>" id="catname" name="catname"  class="form-control col-md-7 col-xs-12">

<?php mysqli_close($con);?>
