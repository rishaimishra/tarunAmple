<?php

    require("db_config.php");

    if(isset($_POST['cmp_id']))
    {

        $cmp_id = $_POST['cmp_id'];

        $from_row =  $_POST['from_row'];

        $to_row = $_POST['to_row'];

        $sql="SELECT * FROM `tbl_email_list` WHERE `campaign_id` = $cmp_id";

        $counter = 1;

        if($from_row >= 0 && $to_row > 0){

            $RecordCount = ($to_row - $from_row);

            $offset =  $from_row;

            $sql="SELECT * FROM `tbl_email_list` WHERE `campaign_id` = $cmp_id LIMIT $offset,$RecordCount";

            $counter = $from_row;
        }
        
        //echo $sql;

        $result = mysqli_query($con,$sql);
    ?>
    <div class="table-responsive"> 

        <table class="table table-striped table-bordered" cellspacing="0" width="100%">
            <thead>
                <tr class="headings">
                    <th>Select <input type="checkbox" id="ckbCheckAll" /></th>
                    <th>Email</th>
                    <th>Name</th>
                    <th>City</th>
                    <th>State</th>
                    <th>Country</th>
                    <th>Zip</th>
                    <th>Ethnicity</th>
                    </th>
                </tr>
            </thead>
            <tbody>

                <?php 

                    while($row = mysqli_fetch_array($result)) 
                    {

                    ?>
                    <tr>
                        <td><input type="checkbox" class="checkBoxClass" name="selectedemails[]" value="<?php echo $row['email']; ?>"> <?=$counter?></td>
                        <td><?php echo $row['email'];?></td>
                        <td><?php echo $row['fname']." ".$row['lname'];?></td>
                        <td><?php echo $row['city'];?></td>
                        <td><?php echo $row['state'];?></td>
                        <td><?php echo $row['country'];?></td>
                        <td><?php echo $row['zip'];?></td>
                        <td><?php echo $row['ethnicity'];?></td>
                    </tr>

                    <?php
                        $counter++;
                    }

                ?>

            </tbody>

        </table>
    </div> 
    <script type="text/javascript">
        $(document).ready(function () {

            $("#ckbCheckAll").click(function () {
                $(".checkBoxClass").prop('checked', $(this).prop('checked'));
            });

            $(".checkBoxClass").change(function(){
                if (!$(this).prop("checked")){
                    $("#ckbCheckAll").prop("checked",false);
                }
            });
        })

    </script>
    <?php 
    }

?>
