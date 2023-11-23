<?php
    //session_start();
    require("db_config.php");
    
    if(!empty($_POST['vendorid'])){
        $q = $_POST['vendorid'];
        $sql="SELECT `tbl_order`.*, `products_added`.* FROM `tbl_order` LEFT JOIN `products_added` ON products_added.order_id = tbl_order.order_id Where vendor_id='".$q."' ";
        $data_order = mysqli_query($con,$sql)or die(mysql_error());
        if(empty($data_order)){

            echo "<h1> No Order Found</h1>";
        }else{
        ?>

        <thead>
            <tr class="headings">
                <th>
                    <input type="checkbox" class="tableflat">
                </th>
                <th>S.N</th>
                <th>Order ID</th>
                <th>Product Name </th>
                <th>Product Image</th>
                <th>Product Price </th>
                <th>Product Qty</th>
                <!--<th>City</th>-->
                <th>Order Amount</th>
                <th>Order By</th>
                <th>Order Status</th>
                <th>Order Type</th>
                <th>Order Date</th>
                <th class=" no-link last"><span class="nobr">Action</span>
                </th>
            </tr>
        </thead>
        <tbody>
        <?php
            $i=1;
            while($key = mysqli_fetch_array($data_order)){

                //print_r($data_fetch);



            ?>
            <?php //print_r($key);
            ?>

            <tr class="even pointer">
                <td class="a-center ">
                    <input type="checkbox" class="tableflat">
                </td>
                <td ><?php echo $i;?></td>
                <td ><?php echo $key['order_id']; ?></td>

                <td ><?php echo $key['item_added']; ?></td>

                <?php

                    if(!empty($key['product_id']))
                    {
                        $pid = $key['product_id'];
                        // $proimageresult = $admin_model_obj->getproimage($pid);
                        $sql2="SELECT * FROM product_images where product_id='".$pid."'";
                        $data_order_images = mysqli_query($con,$sql2)or die(mysql_error());
                        $proimageresult=mysqli_fetch_array($data_order_images);
                        //print_r($proimageresult);die;
                        $imgname=$proimageresult["image_name"];

                        //echo "";

                    ?>

                    <td>
                        <img style="width: 100px;" class="img-responsive" alt="product" 
                            src="http://amplepoints.com/product_images/<?php echo $pid."/".$imgname; ?>"/></td>
                    <?php } else{ ?>

                    <img style="width: 100px;" class="img-responsive" alt="product" 
                        src="http://amplepoints.com/product_images/"/></td>
                    <?php }  ?>
                <td ><?php echo $key['price']; ?></td>
                <td ><?php echo $key['quantity']; ?></td>
                <td ><?php echo $key['amount']; ?></td>
                <td>
                    <?php 
                        $sql3="SELECT * FROM users where status !='0'";
                        $data_order_vendor = mysqli_query($con,$sql3)or die(mysql_error());
                        $proresult=mysqli_fetch_array($data_order_vendor);
                        //print_r($proresult);

                        foreach($proresult as $keys)


                        {
                            // echo $keys['user_id'];
                            //echo "</br>";

                            // echo $key['customer_Id'];
                            // echo "</br>";
                            if($keys['user_id']==$key['customer_Id'])
                            {
                                //echo "hyyyyyyyy"; 
                                $fname= $keys['first_name']; 
                                $lname= $keys['last_name']; 
                                $fulname="$fname" ."&nbsp;" . "$lname" ;
                                echo $fulname;
                            }
                } ?></td>
                <td ><?php echo $key['order_status']; ?></td>
                <td ><?php echo $key['order_type']; ?></td>
                <td ><?php echo $key['order_date']; ?></td>

                <td>    <a class="btn btn-danger btn-xs" 
                        href="http://amplepoints.com/admin/index/deleteorder/did/<?php echo $key['order_id']; ?>"
                        onclick="javascript:return confirm('Are you sure you want to delete?')"><i class="fa fa-trash-o"></i>Delete</a>
                    <a class="btn btn-primary btn-xs" 
                        href="http://amplepoints.com/admin/index/viewallorderdata/vhp/<?php echo $key['id'].'/blk/'.$key['order_id']; ?>"><i class="fa fa-folder"></i> View</a> 
                </td></tr>

            <?php

                $i++;
            }
        }
    }
    if(!empty($_POST['orderstatus'])){
        $status=$_POST['orderstatus'];
        //die;
        $order_id=$_POST['order_id'];
        /*
        if($status =="Completed"){

        $sqlrunquerytest="SELECT * from tbl_order where order_id='".$order_id."'";

        $runneww2= mysqli_query($con,$sqlrunquerytest)or die(mysql_error());
        $getprice=mysql_fetch_array($runneww2);
        print_r($getprice);
        //    echo $getprice['total_price']; 
        }*/


        //$sqlupdate="Update tbl_order SET order_status='".$status."' where order_id='".$order_id."'";

        $sqlupdate="Update products_added SET product_order_status = '".$status."' where id = $order_id ";

        $update_run= mysqli_query($con,$sqlupdate)or die(mysql_error());

        if(!empty($update_run)){



            echo"<h2 style='color:green'>Updated Order Status </h2>";

        }

    }
?>

