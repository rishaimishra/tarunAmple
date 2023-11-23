<?php

require("db_config.php");

if (isset($_POST['cmp_id'])) {

    $cmp_id = $_POST['cmp_id'];


    $send_type = $_POST['send_type'];


    $from_row = $_POST['from_row'];


    $to_row = $_POST['to_row'];


    $wereSendType = '';

    if (!empty($send_type)) {

        if ($send_type == 'send_both') {

            $wereSendType = " AND (phone != '' OR email != '')";

        } else if ($send_type == 'send_email') {

            $wereSendType = " AND email != ''";

        } else if ($send_type == 'send_sms') {

            $wereSendType = " AND phone != ''";
        }

    }


    $sql = "SELECT * FROM `tbl_vendor_campaign_data` WHERE `campaign_id` = $cmp_id $wereSendType";


    $counter = 1;


    if ($from_row >= 0 && $to_row > 0) {


        $RecordCount = ($to_row - $from_row);


        $offset = $from_row;


        $sql = "SELECT * FROM `tbl_vendor_campaign_data` WHERE `campaign_id` = $cmp_id $wereSendType LIMIT $offset,$RecordCount";


        $counter = $from_row;

    }


    //echo $sql;


    $result = mysqli_query($con, $sql);

    ?>

    <div class="table-responsive">


        <table class="table table-striped table-bordered" cellspacing="0" width="100%">

            <thead>

            <tr class="headings">

                <th>Select <input type="checkbox" id="ckbCheckAll"/></th>

                <th>Name</th>

                <th>Email</th>

                <th>phone</th>

                </th>

            </tr>

            </thead>

            <tbody>


            <?php


            while ($row = mysqli_fetch_array($result)) {


                ?>

                <tr>

                    <td><input type="checkbox" class="checkBoxClass" name="selectedemails[]"
                               value="<?php echo $row['email'] . ',' . $row['phone']; ?>"> <?= $counter ?></td>

                    <td><?php echo $row['full_name']; ?></td>

                    <td><?php echo $row['email']; ?></td>

                    <td><?php echo $row['phone']; ?></td>

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


            $(".checkBoxClass").change(function () {

                if (!$(this).prop("checked")) {

                    $("#ckbCheckAll").prop("checked", false);

                }

            });

        })


    </script>

    <?php

}

?>