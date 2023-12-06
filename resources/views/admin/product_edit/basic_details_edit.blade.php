   <div class="tab-pane active" id="product_basic_details">
                                    <h5 class="info-text"> Let's start with the Basic Details</h5>
                                    <div class="row">

                                        <?php if (Auth::guard('admin')->user()->utype == 1 || Auth::guard('admin')->user()->utype == 4) { ?>






{{-- part-1 --}}
                                            <div class="col-sm-12">
                                                <div class="form-group">
                                                    <label for="vamplifyon" class="bmd-label-floating">Product Added By
                                                        : </label>
                                                    <div class="form-check"
                                                         style="display: inline-block;margin-left: 5px;">
                                                        <label class="form-check-label">
                                                            <input class="form-check-input vampli" type="radio"
                                                                   name="vamplifyon"
                                                                   value="5" <?php $selectvendorky = $productDetails->vendor_uid;
                                                            if ($selectvendorky == 0) {
                                                                echo "checked";
                                                            } ?>> AmpleMall
                                                            <span class="circle">
                                                                <span class="check"></span>
                                                            </span>
                                                        </label>
                                                    </div>
                                                    <div class="form-check" style="display: inline-block;">
                                                        <label class="form-check-label">
                                                            <input class="form-check-input vamplis" type="radio"
                                                                   name="vamplifyon"
                                                                   value="6" <?php $selectvendorky = $productDetails->vendor_uid;
                                                            if ($selectvendorky != 0) {
                                                                echo "checked";
                                                            } ?>> Vendors
                                                            <span class="circle">
                                                                <span class="check"></span>
                                                            </span>
                                                        </label>
                                                    </div>
                                                </div>

                                            </div>

                                            <div class="col-sm-12 vendorsl" style="<?php if ($selectvendorky != 0) {
                                                echo "display:block;";
                                            } else {
                                                echo "display:none;";
                                            } ?>">
                                                <div class="form-group">
                                                    <label for="pvendorId" class="bmd-label-floating">Select
                                                        Vendor</label>
                                                    <select class="selectpicker searchdropdown pvendor" name="p_vendor"
                                                            id="pvendorId" data-style="btn btn-primary btn-round"
                                                            data-live-search="true" data-size="7" title="Select Vendor"  onchange="VendorEvents(this.value);">
                                                        <?php foreach ($vendor_data as $key) { ?>
                                                            <option value="<?php echo $key->tbl_vndr_id; ?>" <?php if ($selectvendorky != 0) {
                                                                if ($selectvendorky == $key->tbl_vndr_id) {
                                                                    echo "selected='selected'";
                                                                }
                                                            } ?>><?php echo $key->tbl_vndr_dispname; ?></option>
                                                        <?php } ?>
                                                    </select>
                                                </div>

                                            </div>

                                            <input type="hidden" id="showVendorName" name="showVendorName"
                                                   value="<?php if ($selectvendorky != 0) {
                                                       echo $productDetails->supplier_name;
                                                   } ?>"/>

                                        <?php } ?>

                                        <div class="col-sm-12">

                                            <div class="form-group">
                                                <label for="p_title" class="bmd-label-floating">Product Title</label>
                                                <input type="text" class="form-control" name="p_title" id="p_title"
                                                       value="<?php echo $productDetails->product_name; ?>"
                                                       required>
                                            </div>
                                        </div>

                                        <div class="col-sm-6">

                                            <div class="form-group">
                                                <label for="d_p_title" class="bmd-label-floating">Product
                                                    Description</label>
                                                <textarea class="form-control" name="d_p_title" id="d_p_title"
                                                          required><?php echo $productDetails->long_desc; ?></textarea>
                                            </div>
                                        </div>

                                       
                                        <div class="col-sm-6">

                                            <div class="form-group">
                                                <label for="meta_title" class="bmd-label-floating">Meta Title</label>
                                                <textarea class="form-control" name="meta_title"
                                                          id="meta_title"><?php echo $productDetails->meta_title; ?></textarea>
                                            </div>
                                        </div>

                                        <div class="col-sm-6">

                                            <div class="form-group">
                                                <label for="meta_description" class="bmd-label-floating">Meta
                                                    description</label>
                                                <textarea class="form-control" name="meta_description"
                                                          id="meta_description"><?php echo $productDetails->meta_description; ?></textarea>
                                            </div>
                                        </div>

                                        <div class="col-sm-6">

                                            <div class="form-group">
                                                <label for="meta_keyword" class="bmd-label-floating">Meta
                                                    keywords</label>
                                                <textarea class="form-control" name="meta_keyword"
                                                          id="meta_keyword"><?php echo $productDetails->meta_keyword; ?></textarea>
                                            </div>
                                        </div>






                                        <?php

                                        $allDetailImg =DB::table('pro_detail_images')->where('product_id',$productDetails->id)->get();

                                        if (count($allDetailImg) > 0) {

                                            ?>
                                            <div class="col-md-12 col-sm-12">

                                                <h4 class="title">Available Produc Detail Images</h4>

                                                <div class="row">

                                                    <?php foreach ($allDetailImg as $imgdata) { ?>

                                                        <div class="col-md-4"
                                                             id="delete_detail_img_<?php echo $imgdata->id; ?>">

                                                            <div class="fileinput fileinput-new text-center">
                                                                <div class="fileinput-new thumbnail">
                                                                    <img class="myImg" onclick="showImagePopup(this);"
                                                                         src="https://amplepoints.com/product_images/{{$imgdata->product_id}}/{{$imgdata->image_name}}"
                                                                         alt="...">
                                                                </div>
                                                                <div class="fileinput-preview fileinput-exists thumbnail"></div>

                                                            </div>

                                                            <button type="button" class="btn btn-danger btn-round"
                                                                    style="float: right;padding: 11px 11px;margin: -15px 0px 0px 25px;position: absolute;left: 215px;"
                                                                    onclick="delete_detail_img('<?php echo $imgdata->id; ?>')">
                                                                <i class="material-icons">clear</i>
                                                                <div class="ripple-container"></div>
                                                            </button>

                                                        </div>

                                                    <?php } ?>

                                                </div>

                                            </div>
                                        <?php } ?>

{{-- upto product image part, end part-1 --}}




















{{-- part-2 --}}
                                                    <div class="col-md-12 col-sm-12">
                                                        <h4 class="title">Add New Produc Detail Image</h4>
                                                        <div class="multi-field-wrapperprodetailimg">
                                                            <div class="row multi-fields">
                                                                <div class="col-md-4 multi-field">
                                                                    <div class="fileinput fileinput-new text-center"
                                                                        data-provides="fileinput">
                                                                        <div class="fileinput-new thumbnail">
                                                                            <img src="<?php echo $baseurl; ?>/admin_dir/material/img/image_placeholder.jpg"
                                                                            alt="...">
                                                                        </div>
                                                                        <div class="fileinput-preview fileinput-exists thumbnail"></div>
                                                                        <div>
                                                                            <span class="btn btn-rose btn-round btn-file expect_dark_gradiant_bg">
                                                                                <span class="fileinput-new">Select image</span>
                                                                                <span class="fileinput-exists">Change</span>
                                                                                <input type="file" id="pro_detail_image_1"
                                                                                name="pro_detail_image[]"/>
                                                                            </span>
                                                                            <a href="#pablo"
                                                                                class="btn btn-danger btn-round fileinput-exists"
                                                                                data-dismiss="fileinput"><i class="fa fa-times"></i>
                                                                            Remove</a>
                                                                        </div>
                                                                    </div>
                                                                    <button type="button"
                                                                    class="btn btn-danger btn-round remove-field"
                                                                    style="float: right;padding: 11px 11px;margin: -15px 0px 0px 25px;position: absolute;left: 215px;">
                                                                    <i class="material-icons">clear</i>
                                                                    <div class="ripple-container"></div>
                                                                    </button>
                                                                </div>
                                                            </div>
                                                            <button type="button" class="btn btn-primary btn-round add-field"
                                                            style="margin-bottom: 10px;">
                                                            <i class="material-icons">add</i> Add Another Image
                                                            <div class="ripple-container"></div>
                                                            </button>
                                                        </div>
                                                    </div>







                                        <div class="col-sm-6">
                                            <div class="form-group">
                                                <label for="p_sku" class="bmd-label-floating">SKU</label>
                                                <input type="text" class="form-control" name="p_sku" id="p_sku"
                                                       value="<?php echo $productDetails->product_sku?>"
                                                       required>
                                            </div>
                                        </div>





                                        <div class="col-sm-6">
                                            <div class="form-group">
                                                <label for="p_qty" class="bmd-label-floating">Product Qty</label>
                                                <input type="number" class="form-control" name="p_qty" id="p_qty"
                                                       value="<?php echo $productDetails->quantity ?>" required>
                                            </div>
                                        </div>




                                        <div class="col-sm-6">
                                            <div class="form-group">
                                                <label for="salert" class="bmd-label-floating">Stock Alert : </label>
                                                <div class="form-check" style="display: inline-block;margin-left: 5px;">
                                                    <label class="form-check-label">
                                                        <input class="form-check-input salertradio" type="radio"
                                                               name="salert"
                                                               value="1" <?php if ($productDetails->stock_availability == 1) {
                                                            echo "checked";
                                                        } ?>> Yes
                                                        <span class="circle">
                                                            <span class="check"></span>
                                                        </span>
                                                    </label>
                                                </div>
                                                <div class="form-check" style="display: inline-block;">
                                                    <label class="form-check-label">
                                                        <input class="form-check-input salertradio" type="radio"
                                                               name="salert"
                                                               value="2" <?php if ($productDetails->stock_availability == 2) {
                                                            echo "checked";
                                                        } ?>> No
                                                        <span class="circle">
                                                            <span class="check"></span>
                                                        </span>
                                                    </label>
                                                </div>
                                            </div>
                                        </div>





                                        <div class="col-sm-6"
                                             style="<?php if ($productDetails->stock_availability == 1) {
                                                 echo "display:block;";
                                             } else {
                                                 echo "display:none;";
                                             } ?>" id="stockqty1">

                                            <div class="form-group">
                                                <label for="stockqty" class="bmd-label-floating">Enter minimum quantity to show stock alert</label>
                                                <input type="number" class="form-control" name="stockqty" id="stockqty"
                                                       value="<?php echo $productDetails->stockqty; ?>">
                                            </div>
                                        </div>



                                        <div class="col-sm-6">
                                            <div class="form-group">
                                                <label for="typepro" class="bmd-label-floating">Type of Product</label>
                                                <select class="selectpicker" name="type_of_pro" id="typepro"
                                                        data-style="btn btn-primary btn-round" data-live-search="false"
                                                        data-size="7" title="Type of Product" required>
                                                    <option value="">Type of Product</option>
                                                    <option <?php if ($productDetails->product_type_key == 0) {
                                                        echo 'selected';
                                                    } ?> value="0">Add To Cart
                                                    </option>
                                                    <option <?php if ($productDetails->product_type_key == 1) {
                                                        echo 'selected';
                                                    } ?> value="1">Contact Me
                                                    </option>
                                                </select>
                                            </div>
                                        </div>

{{-- upto type of product . end part-2 --}}





















{{-- part-3 --}}

                                        <div class="col-sm-6" id="vendoremail"
                                             style="<?php if ($productDetails->product_type_key == 1) {
                                                 echo "display:block;";
                                             } else {
                                                 echo "display:none;";
                                             } ?>">

                                            <div class="form-group">
                                                <label for="vemail" class="bmd-label-floating">Email Address</label>
                                                <input type="email" class="form-control" id="vemail" name="vemail"
                                                       value="<?php echo $productDetails->email; ?>">
                                            </div>
                                        </div>






                                        <div class="clearfix"></div>
                                        <div class="col-sm-12">
                                            <hr>
                                        </div>

                                        <label class="col-sm-2 col-form-label label-checkbox">Set Delivery
                                            Attributes</label>
                                        <div class="col-sm-10 checkbox-radios">
                                            <div class="form-check form-check-inline">
                                                <label class="form-check-label">
                                                    <input type="checkbox" id="pickups" name="pickup" value="pickup"
                                                           class="form-check-input del_checkbox" <?php if (!empty($productDetails->pickUp)) {
                                                        echo "checked";
                                                    } ?>> PickUp/Dining
                                                    <span class="form-check-sign">
                                                        <span class="check"></span>
                                                    </span>
                                                </label>
                                            </div>


                                            <div class="form-check form-check-inline">
                                                <label class="form-check-label">
                                                    <input type="checkbox" id="online" name="online" value="online"
                                                           class="form-check-input del_checkbox" <?php if (!empty($productDetails->online)) {
                                                        echo "checked";
                                                    } ?>> Online
                                                    <span class="form-check-sign">
                                                        <span class="check"></span>
                                                    </span>
                                                </label>
                                            </div>


                                            <div class="form-check form-check-inline">
                                                <label class="form-check-label">
                                                    <input type="checkbox" id="delivery" name="delivery"
                                                           value="delivery"
                                                           class="form-check-input del_checkbox" <?php if ($productDetails->delivery !== '') {
                                                        echo "checked";
                                                    } ?>> Delivery
                                                    <span class="form-check-sign">
                                                        <span class="check"></span>
                                                    </span>
                                                </label>
                                            </div>


                                            <div class="form-check form-check-inline">
                                                <label class="form-check-label">
                                                    <input type="checkbox" id="shipping" name="shipping"
                                                           value="shipping"
                                                           class="form-check-input del_checkbox" <?php if ($productDetails->shipping !== '') {
                                                        echo "checked";
                                                    } ?>> Shipping
                                                    <span class="form-check-sign">
                                                        <span class="check"></span>
                                                    </span>
                                                </label>
                                            </div>
                                        </div>


{{-- end of part-3, upto all check box of attributes --}}



















{{-- part-4 --}}


                                        <?php if ($productDetails->vendor_uid > 0 && !empty($productDetails->pickUp)) { ?>

                                            <div id="pickuploc" class="col-sm-12">

                                                <div class="col-sm-12">
                                                    <div class="form-group">
                                                        <label for="salert" class="bmd-label-floating">Display Custome Location </label>
                                                        <div class="form-check"
                                                             style="display: inline-block;margin-left: 5px;">
                                                            <label class="form-check-label">
                                                                <input class="form-check-input nocustloc" type="radio"
                                                                       name="is_custom_location"
                                                                       value="0" <?php if ($productDetails->is_custom_location == 0) {
                                                                    echo "checked";
                                                                } ?>> No
                                                                <span class="circle">
                                                                    <span class="check"></span>
                                                                </span>
                                                            </label>
                                                        </div>
                                                        <div class="form-check" style="display: inline-block;">
                                                            <label class="form-check-label">
                                                                <input class="form-check-input custloc" type="radio"
                                                                       name="is_custom_location"
                                                                       value="1" <?php if ($productDetails->is_custom_location == 1) {
                                                                    echo "checked";
                                                                } ?>> Yes
                                                                <span class="circle">
                                                                    <span class="check"></span>
                                                                </span>
                                                            </label>
                                                        </div>
                                                    </div>
                                                </div>













                                                <?php if ($productDetails->is_custom_location == 1) { ?>

                                                    <div class="col-sm-12" id="storelistdiv">
                                                        <label for="locpick" class="bmd-label-floating" id="SelectStr"
                                                               style="display: none;">Select Store</label>
                                                        <div id="pickupstore" style="display:none;">

                                                            <h2>No Pickup Location Found</h2>

                                                        </div>
                                                    </div>


                                                    <div id="storeuploc" style="display:none;margin-top: 15px;">
                                                        <div class="row">
                                                            <div class="col-sm-12">
                                                                <hr>
                                                                <h4>Selected Store Address :</h4>
                                                                <hr>
                                                            </div>
                                                        </div>
                                                        <div class="row" id="storeuplocs">

                                                        </div>
                                                    </div>
{{-- bothfield above is display none, if 1 then show all pickup address. as loop --}}


                                                    <?php $SinglePicup = DB::table('pickup_location')
                                                                        ->where('pickup_location.pro_id', '=',$productDetails->id)
                                                                        ->get();

                                                     ?>

                                                    <div class="col-sm-12" id="pics" style="margin-top: 25px;">
                                                        <?php $picInc = 1; ?>
                                                        <div class="multi-field-wrapperpicaddress">
                                                            <div class="multi-fields">
                                                                <?php foreach ($SinglePicup as $mycustPic) { ?>
                                                                    <div class="multi-field">

                                                                        <div class="form-group"
                                                                             style="width: 80%;float: left;">
                                                                            <label for="address_<?php echo $picInc; ?>"
                                                                                   class="bmd-label-floating">PicuUp
                                                                                Address</label>
                                                                            <textarea
                                                                                    id="address_<?php echo $picInc; ?>"
                                                                                    name="picaddress[]"
                                                                                    class="form-control"><?php echo $mycustPic->address; ?></textarea>
                                                                        </div>

                                                                        <button type="button"
                                                                                class="remove-field btn btn-danger"
                                                                                style="margin-top: 20px;margin-left: 10px;">
                                                                            <i class="material-icons">clear</i> Remove
                                                                        </button>
                                                                    </div>

                                                                    <?php $picInc++;
                                                                } ?>
                                                            </div>
                                                            <button type="button" class="btn btn-primary add-field"><i
                                                                        class="material-icons">add</i> Add Another
                                                                PicuUp Address
                                                            </button>
                                                        </div>
                                                    </div>








{{-- if value is 0, then this else part works, and store dropdown , 24532--}}

                                                <?php } else { ?>

                                                    <div class="col-sm-12" id="storelistdiv">
                                                        <label for="locpick" class="bmd-label-floating" id="SelectStr">Select
                                                            Store</label>
                                                        <div id="pickupstore">

                                                            <?php

                                                            $CurrVdrId = $productDetails->vendor_uid;
                                                            $sql = "SELECT * FROM vendor_location WHERE vendor_id = '" . $CurrVdrId . "'";
                                                            $query = mysqli_query($con, $sql);
                                                            $count = mysqli_num_rows($query);
                                                            if ($count > 0) {

                                                                $sqlad = "SELECT * FROM pickup_location WHERE vid = '" . $CurrVdrId . "' and pro_id = '" . $productDetails->id . "'";

                                                                $adrquery = mysqli_query($con, $sqlad);

                                                                $adrcount = mysqli_num_rows($adrquery);

                                                                $currStore = '';

                                                                if ($adrcount > 0) {

                                                                    ?>
                                                                    <input type="hidden" name="ispick" value="yes">
                                                                    <?php

                                                                    $storeResult = mysqli_fetch_assoc($adrquery);
                                                                    $currStore = $storeResult['store'];

                                                                } else {

                                                                    ?>
                                                                    <input type="hidden" name="ispick" value="no">
                                                                <?php } ?>

                                                                <select id="locpick" name="locpick" class="selectpicker"
                                                                        data-style="btn btn-primary btn-round"
                                                                        data-live-search="false" data-size="7"
                                                                        title="Select Store">
                                                                    <option value="">Select Store</option>


                                                                    <?php while ($location_result = mysqli_fetch_array($query)) { ?>
                                                                        <option value="<?= $location_result['loc_store'] ?>" <?php if ($currStore == $location_result['loc_store']) {
                                                                            echo "selected";
                                                                        } ?>><?= $location_result['loc_store'] ?></option>
                                                                    <?php } ?>


                                                                </select>
                                                                <input type="hidden" name="hiddenvendorids"
                                                                       id="hiddenvendorids" value="<?= $CurrVdrId; ?>">


                                                            <?php } else { ?>
                                                                <h2>No Pickup Location Found</h2>
                                                            <?php } ?>

                                                            <script>
                                                                $(document).ready(function () {
                                                                    $('#locpick').change(function () {
                                                                        // alert('hi');
                                                                        var locstore = $(this).val();
                                                                        // if(locstore==""){
                                                                        //    return false
                                                                        // }
                                                                        var vendid = $('#hiddenvendorids').val();

                                                                        //alert(vendid);

                                                                        $.ajax({
                                                                            url: '<?php echo $baseurl; ?>/category_filter/vendorstoreaddress.php',
                                                                            data: {locstore: locstore, vid: vendid},
                                                                            type: 'GET'
                                                                        })
                                                                            .done(function (data) {
                                                                                //alert(data);
                                                                                $('#storeuploc').css('display', 'block');
                                                                                $('#storeuplocs').html(data);

                                                                            })
                                                                    });
                                                                });
                                                            </script>


                                                        </div>

                                                    </div>


{{-- end of part-4, upto store name or pickup address and Selected Store Address : --}}






















{{-- part -5, 
1st time when page load, its showing by deafult value then it will change on prev code ajax --}}
                                                    <div id="storeuploc" style="margin-top: 15px;">
                                                    <div class="row">
                                                        <div class="col-sm-12">
                                                            <hr>
                                                            <h4>Selected Store Address :</h4>
                                                            <hr>
                                                        </div>
                                                    </div>
                                                    <div class="row" id="storeuplocs">

                                                    <?php
                                                    if (!empty($currStore)) {

                                                        $viddata = $CurrVdrId;
                                                        $locstoredata = $currStore;
                                                        $sqlstr = "SELECT * FROM vendor_location WHERE loc_store = '" . $locstoredata . "' AND vendor_id = '" . $viddata . "'";
                                                        $querystr = mysqli_query($con, $sqlstr);
                                                        $location_resultdata = mysqli_fetch_array($querystr);

                                                        ?>

                                                        <div class="col-sm-6">
                                                            <div class="form-group">
                                                                <label for="store_display" class="bmd-label-floating">Store
                                                                    Name</label>
                                                                <input type="text" class="form-control"
                                                                       id="store_display" disabled="disabled"
                                                                       value="<?= $location_resultdata['loc_store'] ?>">
                                                            </div>
                                                        </div>

                                                        <div class="col-sm-6">
                                                            <div class="form-group">
                                                                <label for="user_country" class="bmd-label-floating">Country
                                                                    Name</label>
                                                                <?php
                                                                $sqlcountry = "SELECT * FROM tbl_countries WHERE id = '" . $location_resultdata['loc_country_key'] . "'";
                                                                $querycountry = mysqli_query($con, $sqlcountry);
                                                                $country_result = mysqli_fetch_array($querycountry);
                                                                ?>
                                                                <input type="text" class="form-control"
                                                                       id="user_country" disabled="disabled"
                                                                       value="<?= $country_result['name'] ?>">
                                                            </div>
                                                        </div>

                                                        <div class="col-sm-6">
                                                            <div class="form-group">
                                                                <label for="user_state" class="bmd-label-floating">State
                                                                    Name</label>
                                                                <?php
                                                                $sqlstate = "SELECT * FROM tbl_states WHERE stateid = '" . $location_resultdata['loc_state_key'] . "'";
                                                                $querystate = mysqli_query($con, $sqlstate);
                                                                $state_result = mysqli_fetch_array($querystate);
                                                                ?>
                                                                <input type="text" class="form-control" id="user_state"
                                                                       disabled="disabled"
                                                                       value="<?= $state_result['statename'] ?>">
                                                            </div>
                                                        </div>


                                                        <div class="col-sm-6">
                                                            <div class="form-group">
                                                                <label for="user_city" class="bmd-label-floating">City
                                                                    Name</label>
                                                                <?php
                                                                $sqlcity = "SELECT * FROM tbl_cities WHERE id = '" . $location_resultdata['loc_city_key'] . "'";
                                                                $querycity = mysqli_query($con, $sqlcity);
                                                                $city_result = mysqli_fetch_array($querycity);
                                                                ?>
                                                                <input type="text" class="form-control" id="user_city"
                                                                       disabled="disabled"
                                                                       value="<?= $city_result['name'] ?>">
                                                            </div>
                                                        </div>

                                                        <div class="col-sm-6">
                                                            <div class="form-group">
                                                                <label for="user_address" class="bmd-label-floating">Address</label>
                                                                <input type="text" class="form-control"
                                                                       id="user_address" disabled="disabled"
                                                                       value="<?= $location_resultdata['loc_address'] ?>">
                                                            </div>
                                                        </div>

                                                        <div class="col-sm-6">
                                                            <div class="form-group">
                                                                <label for="user_zip" class="bmd-label-floating">Zip
                                                                    Code</label>
                                                                <input type="text" class="form-control" id="user_zip"
                                                                       disabled="disabled"
                                                                       value="<?= $location_resultdata['loc_zip'] ?>">
                                                            </div>
                                                        </div>

                                                        <div class="col-sm-6">
                                                            <div class="form-group">
                                                                <label for="user_mobile" class="bmd-label-floating">Mobile
                                                                    Number</label>
                                                                <input type="text" class="form-control" id="user_mobile"
                                                                       disabled="disabled"
                                                                       value="<?= $location_resultdata['loc_mobile'] ?>">
                                                            </div>
                                                        </div>


                                                        <div class="col-sm-6">
                                                            <div class="form-group">
                                                                <label for="user_phone" class="bmd-label-floating">Landline
                                                                    Number</label>
                                                                <input type="text" class="form-control" id="user_phone"
                                                                       disabled="disabled"
                                                                       value="<?= $location_resultdata['loc_phone'] ?>">
                                                            </div>
                                                        </div>

                                                        </div>
                                                        </div>
{{-- part 5 end, upto Selected Store Address : by default load part --}}




























                                                        <div class="col-sm-12" id="pics"
                                                             style="margin-top: 25px;display: none;">

                                                            <div class="multi-field-wrapperpicaddress">
                                                                <div class="multi-fields">
                                                                    <div class="multi-field">

                                                                        <div class="form-group"
                                                                             style="width: 80%;float: left;">
                                                                            <label for="address_1"
                                                                                   class="bmd-label-floating">PicuUp
                                                                                Address</label>
                                                                            <textarea id="address_1" name="picaddress[]"
                                                                                      class="form-control"></textarea>
                                                                        </div>

                                                                        <button type="button"
                                                                                class="remove-field btn btn-danger"
                                                                                style="margin-top: 20px;margin-left: 10px;">
                                                                            <i class="material-icons">clear</i> Remove
                                                                        </button>
                                                                    </div>
                                                                </div>
                                                                <button type="button" class="btn btn-primary add-field">
                                                                    <i class="material-icons">add</i> Add Another PicuUp
                                                                    Address
                                                                </button>
                                                            </div>
                                                        </div>

                                                    <?php } ?>

                                                <?php } ?>


                                            </div>

                                        <?php } else { ?>

                                            <div id="pickuploc" class="col-sm-12" style="display:none;">

                                                <div class="col-sm-12">
                                                    <div class="form-group">
                                                        <label for="salert" class="bmd-label-floating">Display Custome
                                                            Location </label>
                                                        <div class="form-check"
                                                             style="display: inline-block;margin-left: 5px;">
                                                            <label class="form-check-label">
                                                                <input class="form-check-input nocustloc" type="radio"
                                                                       name="is_custom_location" value="0"
                                                                       checked="checked"> No
                                                                <span class="circle">
                                                                    <span class="check"></span>
                                                                </span>
                                                            </label>
                                                        </div>
                                                        <div class="form-check" style="display: inline-block;">
                                                            <label class="form-check-label">
                                                                <input class="form-check-input custloc" type="radio"
                                                                       name="is_custom_location" value="1"> Yes
                                                                <span class="circle">
                                                                    <span class="check"></span>
                                                                </span>
                                                            </label>
                                                        </div>
                                                    </div>

                                                </div>

                                                <div class="col-sm-12" id="storelistdiv">

                                                    <label for="locpick" class="bmd-label-floating" id="SelectStr"
                                                           style="<?php if (isset($productDetails->vendor_uid) && !empty($productDetails->vendor_uid)) { ?>display: block;<?php } else { ?> display: none; <?php } ?>">Select
                                                        Store</label>
                                                    <div id="pickupstore"
                                                         style="<?php if (isset($productDetails->vendor_uid) && !empty($productDetails->vendor_uid)) { ?>display: block;<?php } else { ?> display: none; <?php } ?>">

                                                        <?php

                                                        if (isset($productDetails->vendor_uid) && !empty($productDetails->vendor_uid)) {

                                                            $CurrVdrId = $productDetails->vendor_uid;
                                                            $sql = "SELECT * FROM vendor_location WHERE vendor_id = '" . $CurrVdrId . "'";
                                                            $query = mysqli_query($con, $sql);
                                                            $count = mysqli_num_rows($query);
                                                        if ($count > 0) {

                                                            $sqlad = "SELECT * FROM pickup_location WHERE vid = '" . $CurrVdrId . "' and pro_id = '" . $productDetails->id . "'";

                                                            $adrquery = mysqli_query($con, $sqlad);

                                                            $adrcount = mysqli_num_rows($adrquery);

                                                            $currStore = '';

                                                        if ($adrcount > 0) {

                                                            ?>
                                                        <input type="hidden" name="ispick" value="yes">
                                                            <?php

                                                            $storeResult = mysqli_fetch_assoc($adrquery);
                                                            $currStore = $storeResult['store'];

                                                        }else {

                                                            ?>
                                                        <input type="hidden" name="ispick" value="no">
                                                        <?php } ?>

                                                            <select id="locpick" name="locpick" class="selectpicker"
                                                                    data-style="btn btn-primary btn-round"
                                                                    data-live-search="false" data-size="7"
                                                                    title="Select Store">
                                                                <option value="">Select Store</option>


                                                                <?php while ($location_result = mysqli_fetch_array($query)) { ?>
                                                                    <option value="<?= $location_result['loc_store'] ?>" <?php if ($currStore == $location_result['loc_store']) {
                                                                        echo "selected";
                                                                    } ?>><?= $location_result['loc_store'] ?></option>
                                                                <?php } ?>


                                                            </select>
                                                        <input type="hidden" name="hiddenvendorids" id="hiddenvendorids"
                                                               value="<?= $CurrVdrId; ?>">


                                                        <?php } else { ?>
                                                            <h2>No Pickup Location Found</h2>
                                                        <?php } ?>

                                                            <script>
                                                                $(document).ready(function () {
                                                                    $('#locpick').change(function () {
                                                                        //alert('hi');
                                                                        var locstore = $(this).val();
                                                                        var vendid = $('#hiddenvendorids').val();

                                                                        //alert(vendid);

                                                                        $.ajax({
                                                                            url: '<?php echo $baseurl; ?>/category_filter/vendorstoreaddress.php',
                                                                            data: {locstore: locstore, vid: vendid},
                                                                            type: 'GET'
                                                                        })
                                                                            .done(function (data) {
                                                                                //alert(data);
                                                                                $('#storeuploc').css('display', 'block');
                                                                                $('#storeuplocs').html(data);

                                                                            })
                                                                    });
                                                                });
                                                            </script>

                                                        <?php }else{ ?>
                                                            <h2>No Pickup Location Found</h2>
                                                        <?php } ?>

                                                    </div>

                                                </div>

                                                <div id="storeuploc" style="display:none;margin-top: 15px;">
                                                    <div class="row">
                                                        <div class="col-sm-12">
                                                            <hr>
                                                            <h4>Selected Store Address :</h4>
                                                            <hr>
                                                        </div>
                                                    </div>
                                                    <div class="row" id="storeuplocs">

                                                    </div>
                                                </div>

                                                <div class="col-sm-12" id="pics"
                                                     style="margin-top: 25px;display: none;">

                                                    <div class="multi-field-wrapperpicaddress">
                                                        <div class="multi-fields">
                                                            <div class="multi-field">

                                                                <div class="form-group" style="width: 80%;float: left;">
                                                                    <label for="address_1" class="bmd-label-floating">PicuUp
                                                                        Address</label>
                                                                    <textarea id="address_1" name="picaddress[]"
                                                                              class="form-control"></textarea>
                                                                </div>

                                                                <button type="button"
                                                                        class="remove-field btn btn-danger"
                                                                        style="margin-top: 20px;margin-left: 10px;"><i
                                                                            class="material-icons">clear</i> Remove
                                                                </button>
                                                            </div>
                                                        </div>
                                                        <button type="button" class="btn btn-primary add-field"><i
                                                                    class="material-icons">add</i> Add Another PicuUp
                                                            Address
                                                        </button>
                                                    </div>
                                                </div>


                                            </div>

                                        <?php } ?>

                                        <?php $onlineLocation = DB::table('online_locations')
    ->where('online_locations.pro_id', '=', $productDetails->id)
    ->get(); ?>

                                        <?php if (!empty($onlineLocation) && !empty($productDetails->online)) { ?>


                                            <div class="col-sm-12" id="onlineloc">

                                                <hr>
                                                <h4>Online Delevery Address :</h4>
                                                <hr>

                                                <div class="multi-field-wrapperonlineadd">
                                                    <div class="multi-fields">
                                                        <?php foreach ($onlineLocation as $Myloca) { ?>
                                                            <div class="multi-field">

                                                                <div class="form-group" style="width: 80%;float: left;">
                                                                    <label for="online_address_<?php echo $Myloca->location_id; ?>"
                                                                           class="bmd-label-floating">Online
                                                                        Address</label>
                                                                    <textarea
                                                                            id="online_address_<?php echo $Myloca->location_id; ?>"
                                                                            name="onlineddress[]"
                                                                            class="form-control"><?php echo $Myloca->address; ?></textarea>
                                                                </div>

                                                                <button type="button"
                                                                        class="remove-field btn btn-danger"
                                                                        style="margin-top: 20px;margin-left: 10px;"><i
                                                                            class="material-icons">clear</i> Remove
                                                                </button>
                                                            </div>
                                                        <?php } ?>
                                                    </div>

                                                    <button type="button" class="btn btn-primary add-field"><i
                                                                class="material-icons">add</i> Add Another Online
                                                        Address
                                                    </button>
                                                </div>


                                            </div>

                                        <?php } else { ?>

                                            <div class="col-sm-12" id="onlineloc" style="display:none;">

                                                <div class="multi-field-wrapperonlineadd">
                                                    <div class="multi-fields">
                                                        <div class="multi-field">

                                                            <div class="form-group" style="width: 80%;float: left;">
                                                                <label for="online_address_1"
                                                                       class="bmd-label-floating">Online Address</label>
                                                                <textarea id="online_address_1" name="onlineddress[]"
                                                                          class="form-control"></textarea>
                                                            </div>

                                                            <button type="button" class="remove-field btn btn-danger"
                                                                    style="margin-top: 20px;margin-left: 10px;"><i
                                                                        class="material-icons">clear</i> Remove
                                                            </button>
                                                        </div>
                                                    </div>

                                                    <button type="button" class="btn btn-primary add-field"><i
                                                                class="material-icons">add</i> Add Another Online
                                                        Address
                                                    </button>
                                                </div>


                                            </div>

                                        <?php } ?>

                                        <div class="col-sm-12" id="diliveradddilv"
                                             style="<?php if ($productDetails->delivery !== '') { ?> display:block; <?php } else { ?> display:none; <?php } ?>">

                                            <?php

                                            $DeliveryFeeQuery = "SELECT * FROM  product_delivery_fees WHERE pro_id = '" . $productDetails->id . "'";
                                            $DeliveryFeeRes = mysqli_query($con, $DeliveryFeeQuery);

                                            $DeliveryFeedata = mysqli_fetch_assoc($DeliveryFeeRes)

                                            ?>

                                            <div class="row">

                                                <div class="col-sm-6">
                                                    <div class="form-group">
                                                        <label for="typedelfee" class="bmd-label-floating">Type of
                                                            Delivery Fee</label>
                                                        <select class="selectpicker" name="typedelfee" id="typedelfee"
                                                                data-style="btn btn-primary btn-round"
                                                                data-live-search="false" data-size="7"
                                                                title="Type of Delivery Fee">
                                                            <option value="">Type of Delivery Fee</option>

                                                            <option value="free" <?php if (isset($DeliveryFeedata['delivery_type']) && $DeliveryFeedata['delivery_type'] == 'free') {
                                                                echo "selected";
                                                            } ?>>Free Delivery
                                                            </option>
                                                            <option value="paid" <?php if (isset($DeliveryFeedata['delivery_type']) && $DeliveryFeedata['delivery_type'] == 'paid') {
                                                                echo "selected";
                                                            } ?>>Paid Delivery
                                                            </option>
                                                        </select>
                                                    </div>
                                                </div>

                                                <div class="col-sm-6 mtop35Px" id="delfee"
                                                     style="<?php if (isset($DeliveryFeedata['delivery_type']) && $DeliveryFeedata['delivery_type'] == 'paid') { ?> display: block; <?php } else { ?> display: none;  <?php } ?>">
                                                    <div class="form-group">
                                                        <label for="delfee_text" class="bmd-label-floating">Delivery
                                                            Price</label>
                                                        <input type="number" id="delfee_text" name="delfee"
                                                               value="<?php if (isset($DeliveryFeedata['delivery_fee']) && $DeliveryFeedata['delivery_fee'] != '') {
                                                                   echo $DeliveryFeedata['delivery_fee'];
                                                               } ?>" class="form-control">
                                                    </div>
                                                </div>

                                            </div>

                                            <?php

                                            $Deliverydressqry = "SELECT * FROM  deliver_location WHERE pro_id = '" . $productDetails->id . "'";

                                            $Deliveryddressresult = mysqli_query($con, $Deliverydressqry);

                                            $Deliveryaddressresultcount = mysqli_num_rows($Deliveryddressresult);

                                            $delincvalid = 700;

                                            ?>


                                            <div class="multi-field-wrapperg">

                                                <div class="multi-fields">

                                                    <?php

                                                    if ($Deliveryaddressresultcount > 0) {

                                                        while ($DeliveryaddressResultdata = mysqli_fetch_assoc($Deliveryddressresult)) {

                                                            $contstatcitidata = $admin_model_obj->getcontstatcitidata($DeliveryaddressResultdata['country'], $DeliveryaddressResultdata['state'], $DeliveryaddressResultdata['city']);

                                                            $user_country = $contstatcitidata[0]['contname'];
                                                            $user_state = $contstatcitidata[0]['statename'];
                                                            $user_city = $contstatcitidata[0]['citiname'];

                                                            ?>

                                                            <div class="multi-field row">
                                                                <div class="col-sm-4">
                                                                    <div class="form-group">
                                                                        <label for="country_<?php echo $delincvalid; ?>"
                                                                               class="bmd-label-floating" for="country">Select
                                                                            Country</label>

                                                                        <select name="delcountry[]"
                                                                                class="selectpicker searchdropdown"
                                                                                onchange="coutrychange(this);"
                                                                                id="country_<?php echo $delincvalid; ?>"
                                                                                data-style="btn btn-primary btn-round"
                                                                                data-live-search="true" data-size="7"
                                                                                title="Select Country">

                                                                            <option value="<?php echo $DeliveryaddressResultdata['country'] ?>"
                                                                                    selected="selected"><?php echo $user_country; ?></option>
                                                                            <?php echo $coutryValueOption; ?>

                                                                        </select>

                                                                    </div>
                                                                </div>

                                                                <div class="col-sm-4">
                                                                    <div class="form-group">
                                                                        <label for="state_<?php echo $delincvalid; ?>"
                                                                               class="bmd-label-floating">Select
                                                                            State</label>

                                                                        <select name="delstate[]"
                                                                                class="selectpicker searchdropdown"
                                                                                onchange="changecity(this);"
                                                                                id="state_<?php echo $delincvalid; ?>"
                                                                                data-style="btn btn-primary btn-round"
                                                                                data-live-search="true" data-size="7"
                                                                                title="Select State">

                                                                            <option value="<?php echo $DeliveryaddressResultdata['state'] ?>"
                                                                                    selected="selected"><?php echo $user_state; ?></option>
                                                                            <?php echo $stateValueOption; ?>

                                                                        </select>

                                                                    </div>
                                                                </div>

                                                                <div class="col-sm-4">
                                                                    <div class="form-group">
                                                                        <label for="city_<?php echo $delincvalid; ?>"
                                                                               class="bmd-label-floating">Select
                                                                            City</label>

                                                                        <select name="delcity[]"
                                                                                class="selectpicker searchdropdown"
                                                                                id="city_<?php echo $delincvalid; ?>"
                                                                                data-style="btn btn-primary btn-round"
                                                                                data-live-search="true" data-size="7"
                                                                                title="Select City">

                                                                            <option value="<?php echo $DeliveryaddressResultdata['city'] ?>"
                                                                                    selected="selected"><?php echo $user_city; ?></option>
                                                                            <?php echo $cityValueOption; ?>

                                                                        </select>

                                                                    </div>
                                                                </div>

                                                                <div class="col-sm-6 mtop35Px">

                                                                    <div class="form-group">
                                                                        <label class="bmd-label-floating"
                                                                               for="delpost-code<?php echo $delincvalid; ?>">Zip
                                                                            Code</label>

                                                                        <input type="text"
                                                                               id="delpost-code<?php echo $delincvalid; ?>"
                                                                               name="delpost-code[]"
                                                                               value="<?php echo $DeliveryaddressResultdata['postl_code']; ?>"
                                                                               class="form-control">

                                                                    </div>
                                                                </div>

                                                                <div class="col-sm-6">

                                                                    <div class="form-group">
                                                                        <label class="bmd-label-floating"
                                                                               for="miles<?php echo $delincvalid; ?>">Miles
                                                                            Ratio</label>
                                                                        <select class="selectpicker" name="delmiles[]"
                                                                                id="miles<?php echo $delincvalid; ?>"
                                                                                data-style="btn btn-primary btn-round"
                                                                                data-live-search="false" data-size="7"
                                                                                title="Select Miles">
                                                                            <option value="">Select</option>
                                                                            <option value="5" <?php if ($DeliveryaddressResultdata['miles'] == '5') {
                                                                                echo "selected";
                                                                            } ?>>5 Miles
                                                                            </option>
                                                                            <option value="10" <?php if ($DeliveryaddressResultdata['miles'] == '10') {
                                                                                echo "selected";
                                                                            } ?>>10 Miles
                                                                            </option>
                                                                            <option value="20" <?php if ($DeliveryaddressResultdata['miles'] == '20') {
                                                                                echo "selected";
                                                                            } ?>>20 Miles
                                                                            </option>
                                                                            <option value="50" <?php if ($DeliveryaddressResultdata['miles'] == '50') {
                                                                                echo "selected";
                                                                            } ?>>50 Miles
                                                                            </option>
                                                                        </select>

                                                                    </div>
                                                                </div>

                                                                <button type="button"
                                                                        class="remove-field btn btn-danger"
                                                                        style="margin-left: 85%;"><i
                                                                            class="material-icons">clear</i> Remove
                                                                </button>
                                                            </div>

                                                            <?php $delincvalid++;
                                                        }
                                                    } ?>


                                                </div>
                                                <button type="button" class="add-field btn btn-primary"><i
                                                            class="material-icons">add</i> Add Another Delivery Address
                                                </button>

                                            </div>


                                        </div>

                                        <?php

                                        $shipqry = "SELECT * FROM  pro_shipp WHERE pro_id = '" . $productDetails->id . "'";

                                        $shipresult = mysqli_query($con, $shipqry);

                                        $shipcount = mysqli_num_rows($shipresult);

                                        $shipResult = mysqli_fetch_assoc($shipresult);

                                        ?>

                                        <div class="col-sm-12" id="shippingcat"
                                             style="<?php if ($productDetails->shipping !== '') { ?> display:block; <?php } else { ?> display:none; <?php } ?>">


                                            <div class="row">

                                                <div class="col-md-12">
                                                    <hr>
                                                    <h5>Select Shipping Types</h5>
                                                    <hr>
                                                </div>
                                            </div>

                                            <div class="row">

                                                <label class="col-sm-2 col-form-label label-checkbox">Type of
                                                    Shipping</label>
                                                <div class="col-sm-10 checkbox-radios">
                                                    <div class="form-check form-check-inline">
                                                        <label class="form-check-label">
                                                            <input type="checkbox" id="standerdship" name="standerdship"
                                                                   value="ss"
                                                                   class="form-check-input" <?php if (!empty($shipResult) && $shipResult['standard_shipping'] == 'ss') { ?> checked="checked" <?php } ?>>
                                                            Standard Shipping
                                                            <span class="form-check-sign">
                                                                <span class="check"></span>
                                                            </span>
                                                        </label>
                                                    </div>
                                                    <div class="form-check form-check-inline">
                                                        <label class="form-check-label">
                                                            <input type="checkbox" id="cexpressship" name="cexpressship"
                                                                   value="CS"
                                                                   class="form-check-input" <?php if (!empty($shipResult) && $shipResult['cexpress_shipping'] == 'CS') { ?> checked="checked" <?php } ?>>
                                                            Express Shipping
                                                            <span class="form-check-sign">
                                                                <span class="check"></span>
                                                            </span>
                                                        </label>
                                                    </div>
                                                    <div class="form-check form-check-inline">
                                                        <label class="form-check-label">
                                                            <input type="checkbox" id="ups" name="ups" value="UPS"
                                                                   class="form-check-input" <?php if (!empty($shipResult) && $shipResult['ups'] == 'UPS') { ?> checked="checked" <?php } ?>>
                                                            UPS
                                                            <span class="form-check-sign">
                                                                <span class="check"></span>
                                                            </span>
                                                        </label>
                                                    </div>
                                                    <div class="form-check form-check-inline">
                                                        <label class="form-check-label">
                                                            <input type="checkbox" id="fedex" name="fedex" value="Fedex"
                                                                   class="form-check-input" <?php if (!empty($shipResult) && $shipResult['fedex'] != '') { ?> checked="checked" <?php } ?>>
                                                            Fedex
                                                            <span class="form-check-sign">
                                                                <span class="check"></span>
                                                            </span>
                                                        </label>
                                                    </div>
                                                </div>

                                            </div>

                                            <div class="row">

                                                <div class="col-md-12">
                                                    <hr>
                                                    <h5>Select Shipping Fees Option</h5>
                                                    <hr>
                                                </div>
                                            </div>

                                            <div class="row">

                                                <div class="col-sm-4">

                                                    <div class="form-group">
                                                        <label class="bmd-label-floating" for="typeshippfee">Type of
                                                            Shipping Fee</label>
                                                        <select class="selectpicker" name="type_of_shippfee"
                                                                id="typeshippfee" data-style="btn btn-primary btn-round"
                                                                data-live-search="false" data-size="7"
                                                                title="Select Shipping Fee">
                                                            <option value="">Type of Shipping Fee</option>
                                                            <option value="FF" <?php if (!empty($shipResult) && $shipResult['type_of_shipfee'] == 'FF') { ?> selected="selected" <?php } ?>>
                                                                Flat Fee
                                                            </option>
                                                            <option value="CCT" <?php if (!empty($shipResult) && $shipResult['type_of_shipfee'] == 'CCT') { ?> selected="selected" <?php } ?>>
                                                                Calculate at Checkout Time
                                                            </option>
                                                            <option value="free" <?php if (!empty($shipResult) && $shipResult['type_of_shipfee'] == 'free') { ?> selected="selected" <?php } ?>>
                                                                Free Shipping
                                                            </option>
                                                        </select>

                                                    </div>
                                                </div>

                                                <?php if (!empty($shipResult) && $shipResult['type_of_shipfee'] == 'FF') {


                                                    $Feeqry = "SELECT * FROM  shipp_fee WHERE pro_id = '" . $productDetails->id . "'";

                                                    $shipfeeresult = mysqli_query($con, $Feeqry);

                                                    $shipfeecount = mysqli_num_rows($shipfeeresult);

                                                    $shipfeeResultdata = mysqli_fetch_assoc($shipfeeresult);

                                                    ?>

                                                    <div class="col-sm-4 mtop35Px" id="shipflatfee">

                                                        <div class="form-group">
                                                            <label for="flatfeeprice" class="bmd-label-floating">Shipping
                                                                Price</label>
                                                            <input type="number" class="form-control"
                                                                   name="flatfeeprice" id="flatfeeprice"
                                                                   value="<?php if (!empty($shipfeeResultdata) && $shipfeeResultdata['shipp_price'] != '') {
                                                                       echo $shipfeeResultdata['shipp_price'];
                                                                   } ?>">
                                                        </div>

                                                    </div>

                                                    <div class="col-sm-4 mtop35Px" id="shipflatfeeqty">

                                                        <div class="form-group">
                                                            <label for="flatfeequantity" class="bmd-label-floating">Maximum
                                                                Quantity</label>
                                                            <input type="number" class="form-control"
                                                                   name="flatfeequantity" id="flatfeequantity"
                                                                   value="<?php if (!empty($shipfeeResultdata) && $shipfeeResultdata['quantity'] != '') {
                                                                       echo $shipfeeResultdata['quantity'];
                                                                   } ?>">
                                                        </div>

                                                    </div>

                                                <?php } else { ?>

                                                    <div class="col-sm-4 mtop35Px" id="shipflatfee"
                                                         style="display:none;">

                                                        <div class="form-group">
                                                            <label for="flatfeeprice" class="bmd-label-floating">Shipping
                                                                Price</label>
                                                            <input type="number" class="form-control"
                                                                   name="flatfeeprice" id="flatfeeprice">
                                                        </div>

                                                    </div>

                                                    <div class="col-sm-4 mtop35Px" id="shipflatfeeqty"
                                                         style="display:none;">

                                                        <div class="form-group">
                                                            <label for="flatfeequantity" class="bmd-label-floating">Maximum
                                                                Quantity</label>
                                                            <input type="number" class="form-control"
                                                                   name="flatfeequantity" id="flatfeequantity">
                                                        </div>

                                                    </div>

                                                <?php } ?>


                                                <div class="col-sm-4">

                                                    <div class="form-group">
                                                        <label class="bmd-label-floating" for="typeshipplabel">Shipping
                                                            Label</label>
                                                        <select class="selectpicker" name="shippinglabel"
                                                                id="typeshipplabel"
                                                                data-style="btn btn-primary btn-round"
                                                                data-live-search="false" data-size="7"
                                                                title="Select Shipping Label">
                                                            <option value="">Select Shipping Label</option>
                                                            <option value="OSL" <?php if (!empty($shipResult) && $shipResult['shipp_label'] == 'OSL') { ?> selected="selected" <?php } ?>>
                                                                Own Shipping Label
                                                            </option>
                                                            <option value="ESL" <?php if (!empty($shipResult) && $shipResult['shipp_label'] == 'ESL') { ?> selected="selected" <?php } ?>>
                                                                Email Shipping Label
                                                            </option>
                                                        </select>

                                                    </div>
                                                </div>

                                                <?php if (!empty($shipResult) && $shipResult['shipp_label'] == 'ESL') {

                                                    $shipp_labelqry = "SELECT * FROM  shipp_label WHERE pro_id = '" . $productDetails->id . "'";

                                                    $shipp_labelqryRes = mysqli_query($con, $shipp_labelqry);

                                                    $shipp_labelcount = mysqli_num_rows($shipp_labelqryRes);

                                                    $shipp_labelqryResUltdata = mysqli_fetch_assoc($shipp_labelqryRes);

                                                    ?>

                                                    <div class="col-sm-4 mtop35Px" id="emailshipplab">

                                                        <div class="form-group">
                                                            <label for="shipplabelemail" class="bmd-label-floating">Email
                                                                Address For Shiiping label</label>
                                                            <input type="email" class="form-control"
                                                                   name="shipplabelemail" id="shipplabelemail"
                                                                   value="<?php if (!empty($shipp_labelqryResUltdata)) {
                                                                       echo $shipp_labelqryResUltdata['label_email'];
                                                                   } ?>">
                                                        </div>

                                                    </div>

                                                <?php } else { ?>

                                                    <div class="col-sm-4 mtop35Px" id="emailshipplab"
                                                         style="display: none;">

                                                        <div class="form-group">
                                                            <label for="shipplabelemail" class="bmd-label-floating">Email
                                                                Address For Shiiping label</label>
                                                            <input type="email" class="form-control"
                                                                   name="shipplabelemail" id="shipplabelemail">
                                                        </div>

                                                    </div>

                                                <?php } ?>


                                            </div>

                                            <div class="row">

                                                <div class="col-md-12">
                                                    <hr>
                                                    <h5>Shipping From Address</h5>
                                                    <hr>
                                                </div>
                                            </div>

                                            <?php

                                            $shipaddressqry = "SELECT * FROM  shipp_address WHERE pro_id = '" . $productDetails->id . "'";

                                            $shipaddressresult = mysqli_query($con, $shipaddressqry);

                                            $shipaddressresultcount = mysqli_num_rows($shipaddressresult);

                                            $incvalid = 200;

                                            ?>


                                            <div class="multi-field-wrappers">

                                                <div class="multi-fields">

                                                    <?php
                                                    if ($shipaddressresultcount > 0) {
                                                        while ($shipaddressResultdata = mysqli_fetch_assoc($shipaddressresult)) {

                                                            $contstatcitidata1 = $admin_model_obj->getcontstatcitidata($shipaddressResultdata['country_key'], $shipaddressResultdata['state_key'], $shipaddressResultdata['city_key']);

                                                            $user_country1 = $contstatcitidata1[0]['contname'];
                                                            $user_state1 = $contstatcitidata1[0]['statename'];
                                                            $user_city1 = $contstatcitidata1[0]['citiname'];

                                                            ?>

                                                            <div class="multi-field row">
                                                                <div class="col-sm-3">
                                                                    <div class="form-group">
                                                                        <label for="shipcount_<?php echo $incvalid; ?>"
                                                                               class="bmd-label-floating">Select
                                                                            Country</label>

                                                                        <select name="country[]"
                                                                                class="selectpicker searchdropdown"
                                                                                onchange="shipcoutrychange(this);"
                                                                                id="shipcount_<?php echo $incvalid; ?>"
                                                                                data-style="btn btn-primary btn-round"
                                                                                data-live-search="true" data-size="7"
                                                                                title="Select Country">

                                                                            <option value="<?php echo $shipaddressResultdata['country_key'] ?>"
                                                                                    selected="selected"><?php echo $user_country1; ?></option>
                                                                            <?php echo $coutryValueOption; ?>

                                                                        </select>

                                                                    </div>
                                                                </div>

                                                                <div class="col-sm-3">
                                                                    <div class="form-group">
                                                                        <label for="shipstate_<?php echo $incvalid; ?>"
                                                                               class="bmd-label-floating">Select
                                                                            State</label>

                                                                        <select name="state[]"
                                                                                class="selectpicker searchdropdown"
                                                                                onchange="shipchangecity(this);"
                                                                                id="shipstate_<?php echo $incvalid; ?>"
                                                                                data-style="btn btn-primary btn-round"
                                                                                data-live-search="true" data-size="7"
                                                                                title="Select State">

                                                                            <option value="<?php echo $shipaddressResultdata['state_key'] ?>"
                                                                                    selected="selected"><?php echo $user_state1; ?></option>
                                                                            <?php echo $stateValueOption; ?>

                                                                        </select>

                                                                    </div>
                                                                </div>

                                                                <div class="col-sm-3">
                                                                    <div class="form-group">
                                                                        <label for="shipcity_<?php echo $incvalid; ?>"
                                                                               class="bmd-label-floating">Select
                                                                            City</label>

                                                                        <select name="city[]"
                                                                                class="selectpicker searchdropdown"
                                                                                id="shipcity_<?php echo $incvalid; ?>"
                                                                                data-style="btn btn-primary btn-round"
                                                                                data-live-search="true" data-size="7"
                                                                                title="Select City">

                                                                            <option value="<?php echo $shipaddressResultdata['city_key'] ?>"
                                                                                    selected="selected"><?php echo $user_city1; ?></option>
                                                                            <?php echo $cityValueOption; ?>

                                                                        </select>

                                                                    </div>
                                                                </div>

                                                                <div class="col-sm-3 mtop35Px">

                                                                    <div class="form-group">
                                                                        <label class="bmd-label-floating"
                                                                               for="post-code<?php echo $incvalid; ?>">Zip
                                                                            Code</label>

                                                                        <input type="text"
                                                                               id="post-code<?php echo $incvalid; ?>"
                                                                               name="post-code[]" class="form-control"
                                                                               value="<?php echo $shipaddressResultdata['zipcode']; ?>">

                                                                    </div>
                                                                </div>


                                                                <button type="button"
                                                                        class="remove-field btn btn-danger"
                                                                        style="margin-left: 85%;"><i
                                                                            class="material-icons">clear</i> Remove
                                                                </button>
                                                            </div>

                                                            <?php
                                                            $incvalid++;
                                                        }
                                                    } ?>

                                                </div>
                                                <button type="button" class="add-field btn btn-primary"><i
                                                            class="material-icons">add</i> Add Another Shipping From
                                                    Address
                                                </button>

                                            </div>


                                        </div>

















                                        <?php if (Auth::guard('admin')->user()->utype == 1 || Auth::guard('admin')->user()->utype == 4) { ?>

                                            <div class="col-sm-12">

                                                <div class="row">

                                                    <div class="col-md-12">
                                                        <hr>
                                                        <h5>Set Product Status</h5>
                                                        <hr>
                                                    </div>
                                                </div>

                                                <div class="row">

                                                    <div class="col-sm-12">
                                                        <div class="form-group">
                                                            <label for="p_status" class="bmd-label-floating">Select
                                                                Status</label>

                                                            <select name="p_status" class="selectpicker" id="p_status"
                                                                    data-style="btn btn-primary btn-round"
                                                                    data-live-search="false" data-size="7"
                                                                    title="Select Status">

                                                                <option value="<?php echo $productDetails->prdt_status; ?>"
                                                                        selected="selected"><?php if ($productDetails->prdt_status == 1) {
                                                                        echo "Published";
                                                                    } else if ($productDetails->prdt_status == 2) {
                                                                        echo "UnPublished";
                                                                    } else {
                                                                        echo "Pending Approval";
                                                                    } ?></option>
                                                                <option value="1">Publish</option>
                                                                <option value="2">Unpublish</option>

                                                            </select>

                                                        </div>
                                                    </div>
                                                </div>

                                            </div>

                                        <?php } ?>

                                        <div class="col-sm-12">

                                            <div class="row">

                                                <div class="col-md-12">
                                                    <hr>
                                                    <h5>Set Product Attributes</h5>
                                                    <hr>
                                                </div>
                                            </div>

                                            <?php if ($productDetails->productcolor) {

                                                $colorAvailable = 1;

                                            } else {

                                                $colorAvailable = 0;

                                            } ?>

                                            <div class="row">

                                                <div class="col-sm-12">
                                                    <div class="form-group">
                                                        <label for="display_color" class="bmd-label-floating">Display
                                                            Color On Product : </label>
                                                        <div class="form-check"
                                                             style="display: inline-block;margin-left: 5px;">
                                                            <label class="form-check-label">
                                                                <input class="form-check-input nocolor" type="radio"
                                                                       name="display_color"
                                                                       value="0" <?php if ($colorAvailable == 0) {
                                                                    echo "checked";
                                                                } ?>> No
                                                                <span class="circle">
                                                                    <span class="check"></span>
                                                                </span>
                                                            </label>
                                                        </div>
                                                        <div class="form-check" style="display: inline-block;">
                                                            <label class="form-check-label">
                                                                <input class="form-check-input yescolor" type="radio"
                                                                       name="display_color"
                                                                       value="1" <?php if ($colorAvailable == 1) {
                                                                    echo "checked";
                                                                } ?>> Yes
                                                                <span class="circle">
                                                                    <span class="check"></span>
                                                                </span>
                                                            </label>
                                                        </div>
                                                    </div>

                                                </div>

                                                <div class="col-sm-12" id="displaycolor"
                                                     style="display:<?php if ($colorAvailable == 1) {
                                                         echo 'block;';
                                                     } else {
                                                         echo 'none;';
                                                     } ?>">

                                                    <div class="multi-field-wrappercolor">
                                                        <div class="multi-fields">

                                                            <?php if ($productDetails->productcolor) { ?>

                                                                <?php

                                                                $allcolors = explode(',', $productDetails->productcolor);

                                                                foreach ($allcolors as $key => $value) { ?>
                                                                    <div class="multi-field row">

                                                                        <div class="col-sm-9">

                                                                            <div class="form-group">
                                                                                <label class="bmd-label-floating"
                                                                                       for="prodcolor1">Color</label>

                                                                                <input type="color" id="prodcolor1"
                                                                                       name="prodcolor[]"
                                                                                       value="<?php echo $value; ?>"
                                                                                       class="form-control">

                                                                            </div>
                                                                        </div>

                                                                        <button type="button"
                                                                                class="remove-field btn btn-danger col-sm-2">
                                                                            <i class="material-icons">clear</i> Remove
                                                                        </button>
                                                                    </div>
                                                                <?php } ?>

                                                            <?php } ?>
                                                        </div>
                                                        <button type="button" class="add-field btn btn-primary"><i
                                                                    class="material-icons">add</i> Add Another Color
                                                        </button>
                                                    </div>

                                                </div>

                                                <?php

                                                $ChoseImagesData = DB::table('tbl_product_attributes')
                                                                    ->where('product_id', $productDetails->id)
                                                                    ->where('attribute_type', 'image')
                                                                    ->get();

                                                                


                                                if (isset($ChoseImagesData) && !empty($ChoseImagesData)) {

                                                    $is_choose_available = 1;

                                                } else {

                                                    $is_choose_available = 0;
                                                }

                                                ?>

                                                <div class="col-sm-12" id="displaychooseradio">
                                                    <div class="form-group">
                                                        <label for="display_chose_image" class="bmd-label-floating">Display
                                                            Chose Image Option on Product : </label>
                                                        <div class="form-check"
                                                             style="display: inline-block;margin-left: 5px;">
                                                            <label class="form-check-label">
                                                                <input class="form-check-input nochooseimg" type="radio"
                                                                       name="display_chose_image"
                                                                       value="0" <?php if ($is_choose_available == 0) {
                                                                    echo "checked";
                                                                } ?>> No
                                                                <span class="circle">
                                                                    <span class="check"></span>
                                                                </span>
                                                            </label>
                                                        </div>
                                                        <div class="form-check" style="display: inline-block;">
                                                            <label class="form-check-label">
                                                                <input class="form-check-input yeschooseimg"
                                                                       type="radio" name="display_chose_image"
                                                                       value="1" <?php if ($is_choose_available == 1) {
                                                                    echo "checked";
                                                                } ?>> Yes
                                                                <span class="circle">
                                                                    <span class="check"></span>
                                                                </span>
                                                            </label>
                                                        </div>
                                                    </div>

                                                </div>

                                                <?php

                                                if (!empty($ChoseImagesData)) {

                                                    ?>
                                                    <div class="col-md-12 col-sm-12">

                                                        <h4 class="title">Available Images</h4>

                                                        <div class="row">

                                                            <?php foreach ($ChoseImagesData as $imgdata) { ?>

                                                                <div class="col-md-4"
                                                                     id="delete_choose_img_<?php echo $imgdata->id; ?>">

                                                                    <div class="fileinput fileinput-new text-center">
                                                                        <div class="fileinput-new thumbnail">
                                                                            <img class="myImg"
                                                                                 onclick="showImagePopup(this);"
                                                                                 src="<?php echo $this->BaseUrl('/product_images/' . $imgdata->product_id . '/' . $imgdata->attribute_value); ?>"
                                                                                 alt="...">
                                                                        </div>
                                                                        <div class="fileinput-preview fileinput-exists thumbnail"></div>

                                                                    </div>

                                                                    <button type="button"
                                                                            class="btn btn-danger btn-round"
                                                                            style="float: right;padding: 11px 11px;margin: -15px 0px 0px 25px;position: absolute;left: 215px;"
                                                                            onclick="delete_choose_img('<?php echo $imgdata->id; ?>')">
                                                                        <i class="material-icons">clear</i>
                                                                        <div class="ripple-container"></div>
                                                                    </button>

                                                                </div>

                                                            <?php } ?>

                                                        </div>

                                                    </div>
                                                <?php } ?>

                                                <div class="multi-field-wrapperchooseimg col-sm-12"
                                                     id="displaychooseimg"
                                                     style="display:<?php if ($is_choose_available == 1) {
                                                         echo 'block;';
                                                     } else {
                                                         echo 'none;';
                                                     } ?>">

                                                    <div class="row multi-fields">


                                                    </div>

                                                    <button type="button" class="btn btn-primary btn-round add-field">
                                                        <i class="material-icons">add</i> Add Another Image
                                                        <div class="ripple-container"></div>
                                                    </button>

                                                </div>

                                                <?php if ($productDetails->productsize) {

                                                    $sizeAvailable = 1;

                                                } else {

                                                    $sizeAvailable = 0;

                                                } ?>

                                                <div class="col-sm-12">
                                                    <div class="form-group">
                                                        <label for="display_color" class="bmd-label-floating">Display
                                                            Size On Product : </label>
                                                        <div class="form-check"
                                                             style="display: inline-block;margin-left: 5px;">
                                                            <label class="form-check-label">
                                                                <input class="form-check-input nosize" type="radio"
                                                                       name="display_size"
                                                                       value="0" <?php if ($sizeAvailable == 0) {
                                                                    echo "checked";
                                                                } ?>> No
                                                                <span class="circle">
                                                                    <span class="check"></span>
                                                                </span>
                                                            </label>
                                                        </div>
                                                        <div class="form-check" style="display: inline-block;">
                                                            <label class="form-check-label">
                                                                <input class="form-check-input yessize" type="radio"
                                                                       name="display_size"
                                                                       value="1" <?php if ($sizeAvailable == 1) {
                                                                    echo "checked";
                                                                } ?>> Yes
                                                                <span class="circle">
                                                                    <span class="check"></span>
                                                                </span>
                                                            </label>
                                                        </div>
                                                    </div>

                                                </div>

                                                <div class="col-sm-12" id="displaysize"
                                                     style="display:<?php if ($sizeAvailable == 1) {
                                                         echo 'block;';
                                                     } else {
                                                         echo 'none;';
                                                     } ?>">

                                                    <div class="multi-field-wrappersize">
                                                        <div class="multi-fields">
                                                            <?php if ($productDetails->productsize) { ?>

                                                                <?php

                                                                $allsize = explode(',', $productDetails->productsize);

                                                                $sixx = 1;

                                                                foreach ($allsize as $key => $value) { ?>
                                                                    <div class="multi-field row">

                                                                        <div class="col-sm-9">

                                                                            <div class="form-group">
                                                                                <label class="bmd-label-floating"
                                                                                       for="psize<?php echo $sixx; ?>">Size</label>

                                                                                <input type="text"
                                                                                       id="psize<?php echo $sixx; ?>"
                                                                                       name="psize[]"
                                                                                       value="<?php echo $value; ?>"
                                                                                       class="form-control">

                                                                            </div>
                                                                        </div>

                                                                        <button type="button"
                                                                                class="remove-field btn btn-danger col-sm-2">
                                                                            <i class="material-icons">clear</i> Remove
                                                                        </button>
                                                                    </div>
                                                                    <?php $sixx++;
                                                                } ?>

                                                            <?php } ?>
                                                        </div>
                                                        <button type="button" class="add-field btn btn-primary"><i
                                                                    class="material-icons">add</i> Add Another Size
                                                        </button>
                                                    </div>

                                                </div>

                                            </div>

                                        </div>

                                        <div class="col-sm-12">

                                            <div class="row">

                                                <div class="col-md-12">
                                                    <hr>
                                                    <h5>Select AmpleTheater Related Movie</h5>
                                                    <hr>
                                                </div>

                                                <?php

                                                $selectedMv = '';

                                                if (!empty($productDetails->movie_id) && $productDetails->movie_id > 0) {

                                                    $VidID = $productDetails->movie_id;

                                                    $VideoDetail = $admin_model_obj->ExecuteRowQuery("SELECT video_id,video_title FROM `theater_videos` WHERE video_id = $VidID");

                                                    $selectedMv = "<option value='$VidID' selected>" . $VideoDetail['video_title'] . "</option>";

                                                }

                                                ?>

                                                <div class="col-sm-12">
                                                    <div class="form-group">
                                                        <label for="movie_id" class="bmd-label-floating">Select
                                                            Movie</label>

                                                        <select class="selectpicker searchdropdown" id="rel_id"
                                                                name="rel_id" data-style="btn btn-primary btn-round"
                                                                data-live-search="true" title="Select Movie">
                                                            <!--<option value="0">Select Movie</option>-->
                                                            <?php echo $selectedMv; ?>
                                                        </select>
                                                    </div>

                                                </div>

                                            </div>
                                        </div>


                                    </div>
                                </div>