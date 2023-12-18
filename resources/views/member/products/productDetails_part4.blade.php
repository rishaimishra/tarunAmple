<?php
$baseurl=url('/');
$currencySymbol="$";
$admin_model_obj = new \App\Models\AdminImpFunctionModel;
$pid = $resdelivery->id;
$vid = $resdelivery->vendor_uid;
?>

 <div class="center_column col-xs-12 col-sm-9 juilk" id="center_column">
                        <!-- Product -->
                        <div id="product">
                            <div class="primary-box main-produtboxcon">
                                <div class="pb-left-column col-xs-12 col-sm-7">



{{-- part-1 --}}
                                    <!-- product-imge-->
                                    <div class="picZoomer"><img
                                                src="https://amplepoints.com/product_images/{{$product_images[0]->id}}/{{$product_images[0]->image_name}}"
                                                style="width:100%; height:100%;" alt=""></div>
                                    <div class="works_item alignleft clear zoom-a">
                                        <div id="fourd" class="carouseller"><a href="javascript:void(0)"
                                                                               class="carousel-button-left"> ‹ </a>
                                            <div class="carousel-wrapper">
                                                <div class="carousel-items">
                                                    <?php if ($product_images) {
                                                        foreach ($product_images as $key) { ?>
                                                            <div class="span6 carousel-block piclist">
                                                                <li>
                                                                    <img src="https://amplepoints.com/product_images/{{$key->id}}/{{$key->image_name}}"
                                                                         alt=""></li>
                                                            </div>
                                                            <?php
                                                        }
                                                    } ?>
                                                </div>
                                            </div>
                                            <a href="javascript:void(0)" class="carousel-button-right"> › </a></div>
                                        <script type="text/javascript">
                                            $(function () {
                                                $(fourd).carouseller();
                                            });
                                        </script>
                                    </div>
                                    <!-- product-imge-->
                                </div>














{{-- part-2 --}}
                                <div class="pb-right-column col-xs-12 col-sm-5">
                                    <h1 class="product-name"
                                        id="<?php echo $productDetails->product_name; ?>">
                                        <?php echo htmlspecialchars_decode($productDetails->product_name); ?></h1>

                                    <span style="font-size: 15px;color: #f75d00 !important;"><a
                                                {{-- href="<?php echo $this->baseUrl('productbyseller/' . $UrlVendorAppend . '/' . $productDetails->vendor_key); ?>" --}}
                                                href="#{{-- {{ url('productbyseller/' . $UrlVendorAppend . '/' . $productDetails->vendor_key) }} --}}"

                                                style="color: #f75d00 !important;">By: <?php echo $productDetails->pvendor; ?></a></span>
                                    <div class="product-comments">
                                        <!--<div class="product-star">
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star-half-o"></i>
                                        </div>-->

                                    </div>




                                    <?php if ($productDetails->pro_key == '0') { ?>

                                        <div class="product-price-group">
                                            <?php if ($productDetails->pdiscount >= 50) {
                                                ?>
                                                <p class="kit" style="font-size:16px;font-weight:600;">GET IT FREE WITH
                                                    :
                                                    <span style="font-size:16px;font-weight:600;"> <?php echo $admin_model_obj->FormatPricingValues($admin_model_obj->DisplayAmplePoints($productDetails->pfwamples)); ?> Amples</span>
                                                </p>
                                                <?php
                                            } ?>
                                            <span class="price">Price: <?php echo $currencySymbol; ?><?php echo $admin_model_obj->FormatPricingValues($productDetails->single_price); ?></span>
                                        </div>




                                        <div class="product-price-group price-det">
                                            <p>Buy & Earn:
                                                <span><?php echo $admin_model_obj->FormatPricingValues($admin_model_obj->DisplayAmplePoints($productDetails->pamples)); ?> Amples</span>
                                            </p>
                                            <p>Reward Value:
                                                <span><?php echo $currencySymbol; ?><?php echo $admin_model_obj->FormatPricingValues($productDetails->pdiscountprice); ?> </span>
                                            </p>
                                            <p>You Earn: <span><?php echo (int)$productDetails->pdiscount; ?>% </span>
                                            </p>
                                            <?php if (!empty($GiftcardDetail)) { ?>

                                                <?php $per_of_bill = $GiftcardDetail->per_of_bill; ?>

                                                <p>Applied To: <span><?php echo $per_of_bill; ?>% Total Bill </span></p>

                                            <?php } ?>
                                        </div>














{{-- part-3 --}}
                                        <div class="info-orther">
                                            <?php if (!empty($productDetails->quantity)) { ?>
                                                <p>Offer Available : <span
                                                            class="in-stock"><?php echo $productDetails->quantity;  //count($this->noOfPurchased); ?></span>
                                                </p>
                                                <!--<p> Stock Availability: <span class="in-stock"><?php //echo (int) $productDetails->stock_availability; ?></span></p>-->
                                                <?php

                                            }
                                            ?>



                                            <!--<p>Availability: <span class="in-stock"><?php echo (int)$productDetails->pdiscount; ?>In stock</span></p>-->

                                            <p>Product Message: <span
                                                        class="in-stock"><?php echo htmlspecialchars_decode($respro->pro_mess); ?></span>
                                            </p>
                                            <p>Item Code: #453217907</p>
                                            <?php if ($productDetails->is_without_ample) { ?>
                                                <a href="#{{-- {{ url('productdetail/' . $productdetail->id . '/no_ample/true') }} --}}"
                                                   class="btn btn-default"
                                                   style="background: #f75d00 !important;color: #fff;font-weight: bold;border-color: #f75d00;width: auto;">Buy
                                                    Product Without Ample</a>
                                            <?php } ?>
                                        </div>


                                    <?php } else { ?>


                                        <?php if (isset($contactMePrice) && !empty($contactMePrice)) { ?>

                                            <div class="product-price-group price-det">
                                                <p>Buy & Earn:
                                                    <span><?php echo $admin_model_obj->FormatPricingValues($contactMePrice->ctm_no_of_amples); ?> Amples</span>
                                                </p>
                                                <p>Reward Value:
                                                    <span><?php echo $this->currencySymbol; ?><?php echo $admin_model_obj->FormatPricingValues($contactMePrice->ctm_discount_price); ?> </span>
                                                </p>
                                            </div>










{{-- part-4 --}}
                                            <div class="info-orther">
                                                <p>Product Message: <span
                                                            class="in-stock"><?php echo htmlspecialchars_decode($respro->pro_mess); ?></span>
                                                </p>


                                            </div>

                                        <?php } else { ?>

                                            <div class="product-price-group">
                                                <?php if ($productDetails->pdiscount >= 50) {
                                                    ?>
                                                    <p class="kit" style="font-size:16px;font-weight:600;">GET IT FREE
                                                        WITH : <span
                                                                style="font-size:16px;font-weight:600;"> <?php echo $admin_model_obj->FormatPricingValues($admin_model_obj->DisplayAmplePoints($productDetails->pfwamples)); ?> Amples</span>
                                                    </p>
                                                    <?php
                                                } ?>
                                                <span class="price">Price: <?php echo $currencySymbol; ?><?php echo $admin_model_obj->FormatPricingValues($productDetails->single_price); ?></span>
                                            </div>

                                            <div class="product-price-group price-det">
                                                <p>Buy & Earn:
                                                    <span><?php echo $admin_model_obj->FormatPricingValues($admin_model_obj->DisplayAmplePoints($productDetails->pamples)); ?> Amples</span>
                                                </p>
                                                <p>Reward Value:
                                                    <span><?php echo $this->currencySymbol; ?><?php echo $admin_model_obj->FormatPricingValues($productDetails->pdiscountprice); ?> </span>
                                                </p>
                                                <p>You Earn:
                                                    <span><?php echo (int)$productDetails->pdiscount; ?>% </span></p>
                                            </div>
                                            <div class="info-orther">
                                                <?php if (!empty($productDetails->quantity)) { ?>
                                                    <p>Offer Available : <span
                                                                class="in-stock"><?php echo $productDetails->quantity - count($noOfPurchased); ?></span>
                                                    </p>
                                                    <!--<p> Stock Availability: <span class="in-stock"><?php //echo (int) $productDetails->stock_availability; ?></span></p>-->

                                                    <?php

                                                }
                                                ?>
                                                <!--<p>Availability: <span class="in-stock"><?php echo (int)$productDetails->pdiscount; ?>In stock</span></p>-->

                                                <p>Product Message: <span
                                                            class="in-stock"><?php echo htmlspecialchars_decode($respro->pro_mess); ?></span>
                                                </p>
                                                <p>Item Code: #453217907</p>
                                                <?php if ($productDetails->is_without_ample) { ?>
                                                    <a href="{{-- <?php echo $this->baseUrl('productdetail/' . $this->main_product_id . "/no_ample/true"); ?> --}}"
                                                       class="btn btn-default"
                                                       style="background: #f75d00 !important;color: #fff;font-weight: bold;border-color: #f75d00;width: auto;">Buy
                                                        Product Without Ample</a>
                                                <?php } ?>
                                            </div>

                                        <?php } ?>


                                    <?php } ?>















{{-- part-5 --}}
                                    <?php if ($usrmakey > 0) { ?>
                                        <div>
                                            <button type="button" style="width: auto;height: auto;"
                                                    class="btn btn-default" data-toggle="modal"
                                                    data-target="#messegemodel">Ask a questions
                                            </button>
                                        </div>
                                        <div id="messegemodel" class="modal fade" role="dialog">
                                            <div class="modal-dialog">
                                                <!-- Modal content-->
                                                <form id="messegeform" method="post" enctype="multipart/form-data">
                                                    <?php

                                                    $vendorname = '';
                                                    $msgvendorid = 0;

                                                    if ($productDetails->vendor_key > 0) {

                                                        $myvendordata = $admin_model_obj->getvendorddetail($productDetails->vendor_key);
                                                        $vendorname = $myvendordata->tbl_vndr_dispname;
                                                        $msgvendorid = $myvendordata->tbl_vndr_id;

                                                    } else {

                                                        $vendorname = 'Amplepoints';
                                                    }

                                                    ?>

                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <button type="button" class="close" data-dismiss="modal">
                                                                &times;
                                                            </button>
                                                            <h4 class="modal-title">New conversation
                                                                With <?php echo $vendorname; ?></h4>
                                                        </div>
                                                        <div class="modal-body">
                                                            <input type="hidden" name="msgproductid"
                                                                   value="<?php echo $productDetails->id; ?>">
                                                            <input type="hidden" name="msguserid"
                                                                   value="<?php echo @$usrmakey; ?>">
                                                            <input type="hidden" name="msgvendorid"
                                                                   value="<?php echo @$msgvendorid; ?>">
                                                            <div class="form-group">
                                                                <label for="msgsubject">Subject:</label>
                                                                <input type="text" name="msgsubject"
                                                                       value="<?php echo $productDetails->product_name; ?>"
                                                                       class="form-control" id="msgsubject" required>
                                                            </div>
                                                            <div class="form-group">
                                                                <label for="msgdetail">Messege:</label>
                                                                <textarea name="msgdetail" cols="5" rows="5"
                                                                          class="form-control"
                                                                          required>{{ url('/product-details/' . $productDetails->id) }} 
                                                                         {{--  <?php echo $this->baseUrl() . '/productdetail/' . $this->main_product_id; ?> --}}
                                                                     </textarea>
                                                            </div>
                                                            <div class="form-group">
                                                                <label for="msgsubject">Attachments</label>
                                                            </div>
                                                            <div class="input_fields_wrap">
                                                                <div class="form-group">
                                                                    <input type="file" name="msgfiles[]"
                                                                           class="form-control">
                                                                </div>
                                                            </div>
                                                            <button style="width: auto;height: auto;"
                                                                    class="add_field_button btn btn-default">Add More
                                                                Files
                                                            </button>
                                                        </div>
                                                        <div class="modal-footer">
                                                            <button type="submit" style="width: auto;height: auto;"
                                                                    class="btn btn-default">Submit
                                                            </button>
                                                            <button type="button" style="width: auto;height: auto;"
                                                                    class="btn btn-default" data-dismiss="modal">Close
                                                            </button>
                                                        </div>
                                                    </div>
                                                </form>
                                                <script>

                                                    var max_fields = 5; //maximum input boxes allowed
                                                    var wrapper = $(".input_fields_wrap"); //Fields wrapper
                                                    var add_button = $(".add_field_button"); //Add button ID

                                                    var x = 1; //initlal text box count
                                                    $(add_button).click(function (e) { //on add input button click
                                                        e.preventDefault();
                                                        if (x < max_fields) { //max input box allowed
                                                            x++; //text box increment
                                                            $(wrapper).append('<div class="form-group"><input type="file" name="msgfiles[]" class="form-control"><a href="#" class="remove_field">Remove</a></div>'); //add input box
                                                        }
                                                    });

                                                    $(wrapper).on("click", ".remove_field", function (e) { //user click on remove text
                                                        e.preventDefault();
                                                        $(this).parent('div').remove();
                                                        x--;
                                                    })

                                                    $("form#messegeform").submit(function () {

                                                        var formData = new FormData(this);

                                                        $.ajax({
                                                            url: "{{ url('index/savemessegedata') }}",
                                                            type: 'POST',
                                                            data: formData,
                                                            async: false,
                                                            success: function (data) {
                                                                if (data == 'done') {
                                                                    alert("Your Messege has been Submited!");
                                                                    location.reload(true)
                                                                } else {
                                                                    alert("Somthing Wrong Please Try Again");
                                                                    location.reload(true)
                                                                }
                                                            },
                                                            cache: false,
                                                            contentType: false,
                                                            processData: false
                                                        });

                                                        return false;
                                                    });
                                                </script>
                                            </div>
                                        </div>
                                    <?php }else{ ?>
                                        <a href="javascript:void(0);" onclick="mytriggermodel();"
                                           class="btn btn-default">Ask a questions</a>

                                        <script>
                                            function mytriggermodel() {
                                                $("#modal_trigger").trigger("click");
                                            }
                                        </script>
                                    <?php } ?>

























{{-- part-6 --}}
                                    <!-- <div class="product-desc">
                                    Vestibulum eu odio. Suspendisse potenti. Morbi mollis tellus ac sapien. Praesent egestas tristique nibh. Nullam dictum felis eu pede mollis pretium.Fusce egestas elit eget lorem.
                                    </div>-->
                                    <div class="form-option">
                                        <p class="form-option-title">Available Options:</p>
                                        <?php if (!empty($respro->color)) { ?>
                                            <div class="attributes">
                                                <div class="attribute-label">Color:</div>
                                                <div class="attribute-list">
                                                    <ul class="list-color">
                                                        <?php $allcolors = explode(',', $respro->color); ?>
                                                        <?php foreach ($allcolors as $key => $value) { ?>
                                                            <li style="background:<?php echo $value; ?>;"><a
                                                                        href="#"><?php echo $value; ?></a></li>
                                                        <?php } ?>
                                                    </ul>
                                                </div>
                                            </div>
                                        <?php } ?>


                                        <?php if (!empty($respro->size)){ ?>
                                        <div class="attributes">
                                            <div class="attribute-label">Size:</div>
                                            <div class="attribute-list">
                                                <select>
                                                    <option value="">Select</option>
                                                    <?php $allsize = explode(',', $respro->size); ?>
                                                    <?php foreach ($allsize as $key => $value) { ?>
                                                        <option value="<?php echo $value; ?>"><?php echo $value; ?></option>
                                                    <?php } ?>
                                                </select>
                                            </div>
                                            <?php } ?>
                                        </div>


                                        <div class="attributes" data-step="1" data-intro="Choose Number of Quantity">
                                            <div class="attribute-label">Qty:</div>
                                            <div class="custom pull-left">
                                                <button id="btn_add_one" class="increase items-count" type="button"><i
                                                            class="fa fa-plus">&nbsp;</i></button>
                                                <input type="text" class="input-text qty mainqty" title="Qty" value="1"
                                                       maxlength="12" id="qty" name="qty">
                                                <button id="btn_minus_one" class="reduced items-count" type="button"><i
                                                            class="fa fa-minus">&nbsp;</i></button>
                                            </div>
                                        </div>


                                        <div class="attributes">

                                            <a class="btn btn-large btn-success"
                                               style="background: #f75d00 !important;color: #fff;font-weight: bold;border-color: #f75d00;width: auto;"
                                               href="javascript:void(0);" onclick="javascript:introJs().start();"><i
                                                        class="fa fa-cog fa-spin fa-1x fa-fw"></i> Show Me How To Buy ?
                                                <i class="fa fa-cog fa-spin fa-1x fa-fw"></i></a>

                                        </div>




                                        <div class="attributes" id="wait_list_btn">
                                            <?php if (empty(@$usrmakey)) { ?>

                                                <script>
                                                    $(document).ready(function () {
                                                        $('#btn_wait_list').click(function () {
                                                            $('#modal').addClass('mynewloginbox');
                                                        });

                                                    });
                                                </script>

                                                <a href="javascript:void(0)" class="btn btn-primary" id="btn_wait_list">Add
                                                    Me To The Waiting List</a>

                                            <?php }else{ ?>

                                                <form action="{{-- {{ url('index/waitrequest') }} --}}"
                                                      method="post">
                                                    <?php $fname = @$resuser->first_name;
                                                    $lname = @$resuser->last_name;
                                                    $coustmer_name = $fname . ' ' . $lname;;

                                                    ?>
                                                    <input type="hidden" name="wait_user_id"
                                                           value="<?= $usrmakey; ?>">
                                                    <input type="hidden" name="wait_user_name"
                                                           value="<?= $coustmer_name; ?>">
                                                    <input type="hidden" name="wait_user_email"
                                                           value="<?= @$resuser->email; ?>">
                                                    <input type="hidden" name="wait_user_mobile"
                                                           value="<?= @$resuser->mobile; ?>">
                                                    <input type="hidden" name="wait_pro_id"
                                                           value="<?= $productDetails->id; ?>">
                                                    <input type="hidden" name="wait_vendor_id"
                                                           value="<?= $productDetails->vendor_key; ?>">
                                                    <input type="hidden" name="wait_vendor_mail"
                                                           value="<?= @$tbl_vndr_mail; ?>">
                                                    <input type="hidden" name="wait_vendor_name"
                                                           value="<?= @$tbl_vndr_dispname; ?>">
                                                    <input type="hidden" name="wait_pro_name"
                                                           value="<?= @$respro->product_name; ?>">
                                                    <input type="hidden" name="wait_pro_sku"
                                                           value="<?= @$respro->sku; ?>">
                                                    <input type="hidden" name="wait_pro_img"
                                                           value="<?= @$respro->image_name; ?>">
                                                    <input type="hidden" name="wait_pro_price"
                                                           value="<?= @$respro->single_price; ?>">
                                                    <input type="hidden" name="wait_pro_discount"
                                                           value="<?= @$respro->pdiscount; ?>">
                                                    <input type="hidden" name="wait_pro_discount_price"
                                                           value="<?= @$respro->pdiscount; ?>">
                                                    <input type="hidden" name="wait_pro_amples"
                                                           value="<?= @$respro->pamples; ?>">
                                                    <input type="hidden" name="wait_pro_amples_free"
                                                           value="<?= @$respro->pfwamples; ?>">
                                                    <input type="hidden" name="wait_product_type" value="1">
                                                    <button type="submit" class="btn btn-primary" id="btn_wait_list_smt"
                                                            onclick="return confirm('Are you sure you want to do that?');">
                                                        Add Me To The Waiting List
                                                    </button>
                                                </form>

                                            <?php } ?>

                                        </div>

                                        <!-- Start code for delivery-->

                                        <div class="attributes mainbox-forurs"
                                             style="margin-top: 50px;margin-bottom: 8px;" data-step="2"
                                             data-intro="Select Your delivery method" data-position='right'
                                             data-scrollTo='tooltip'><span class="close-mypop">X</span>
                                            <script>
                                                $(document).ready(function () {
                                                    $('.pickdate').click(function () {
                                                        $('#vdrpickupadr').toggle();
                                                        $('#onlinepickupadr').css('display', 'none');
                                                        $('#usrdeliveryadrs').css('display', 'none');
                                                        $('#vdrbyappointadr').css('display', 'none');
                                                        $('#shipadd').css('display', 'none');
                                                    });
                                                    $('#onlineradio').click(function () {
                                                        $('#onlinepickupadr').toggle();
                                                        $('#usrdeliveryadrs').css('display', 'none');
                                                        $('#vdrbyappointadr').css('display', 'none');
                                                        $('#shipadd').css('display', 'none');
                                                    });
                                                    $('.delivrydata').click(function () {
                                                        $('#deliveryadd').toggle();
                                                        $('#onlinepickupadr').css('display', 'none');
                                                        $('#vdrpickupadr').css('display', 'none');
                                                        $('#vdrbyappointadr').css('display', 'none');
                                                        $('#shipadd').css('display', 'none');
                                                    });
                                                    $('.byappointdata').click(function () {
                                                        $('#vdrbyappointadr').toggle();
                                                        $('#onlinepickupadr').css('display', 'none');
                                                        $('#vdrpickupadr').css('display', 'none');
                                                        $('.usrdeliveryadrs').css('display', 'none');
                                                        $('#shipadd').css('display', 'none');
                                                    });

                                                    $('#vdrshipdivadr').click(function () {
                                                        $('#shipadd').toggle();
                                                        $('#onlinepickupadr').css('display', 'none');
                                                        $('#vdrpickupadr').css('display', 'none');
                                                        $('.usrdeliveryadrs').css('display', 'none');
                                                        $('#vdrbyappointadr').css('display', 'none');
                                                    });

                                                    $('.mainradio input[type="radio"]').click(function () {
                                                        $('.mainbox-forurs').addClass('mainbox-forurs-boxs-final');
                                                        // $('.close-mypop').css('display','block');
                                                        // $('.mainbox-forurs').removeClass('mainbox-forurs-boxs-final');
                                                    });
                                                    // $('.close-mypop').click(function(){
                                                    // $('.mainbox-forurs').addClass('mainbox-forurs-boxs-final');
                                                    // $('.mainbox-forurs').removeClass('mainbox-forurs-boxs');
                                                    // $('.close-mypop').css('display','none');
                                                    // });

                                                });
                                            </script>
                                            <!-- delivery code start-->


















{{-- part-7 --}}
                                            <?php
                                            if (empty(@$usrmakey)) {
                                                $userid = 0;
                                            } else {
                                                $userid = @$usrmakey;
                                            }
                                            $deliveryset = $admin_model_obj->get_delivery_set($vid, $pid, $userid);
                                           // dd($deliveryset);
                                            ?>

                                            <?php if (!empty($resdelivery->pickUp)) { ?>
                                                <style type="text/css">
                                                    .mainradio.shiping {
                                                        left: 0px !important;
                                                    }
                                                </style>
                                            <?php if (!empty(@$deliveryset)){ ?>
                                            <div class="mainradio pickup">
                                                <input type="radio"
                                                       class="pickdate" <?php if (@$deliveryset->delivery_type == 'pickup') ?>  id="vdrpickupdivadr" value="1" name="pickdelivery">
                                                </input>
                                                Pickup / Dining </div>
                                            <?php }else{ ?>
                                                <div class="mainradio pickup">
                                                    <input type="radio" class="pickdate" id="vdrpickupdivadr" value="1"
                                                           name="pickdelivery">
                                                    </input>
                                                    Pickup / Dining
                                                </div>
                                            <?php } ?>
                                                <link rel="stylesheet"
                                                      href="https://code.jquery.com/ui/1.10.3/themes/smoothness/jquery-ui.css"/>
                                                <!--<script src="https://code.jquery.com/jquery-1.9.1.js"></script>-->
                                                <script src="https://code.jquery.com/ui/1.10.3/jquery-ui.js"></script>
                                                <style type="text/css">
                                                    #vdrpickupadr > .showbox {
                                                        margin-top: 4px;
                                                        width: 95%;
                                                        text-align: center;
                                                    }
                                                </style>










 {{-- part-8  --}}
                                                <div id="vdrpickupadr" style="display:none;">
                                                    <div id="flash" align="left"></div>
                                                    <div id="show" align="left"></div>
                                                    <form method="post" action="">
                                                        <?php

                                                        if (!empty($vid) && $productDetails->is_custom_location != 1) {

                                                            /*$pickupaddres = $admin_model_obj->get_pickup_location($vid, $pid);

                                                                if(count($pickupaddres) > 0) {
                                                                $store = $pickupaddres[0]['store'];
                                                                if(!empty($store)){
                                                                $pickuplocationadd = $admin_model_obj->get_vendor_address($vid, $store);
                                                                } }  */

                                                            $allVendorAddr = $admin_model_obj->get_all_vendor_address_multiple($vid);

                                                            if (!empty($allVendorAddr)) {
                                                                echo '<div style="max-height: 200px;overflow-y: auto;">';
                                                                foreach ($allVendorAddr as $vdraddr) { ?>
                                                                    <div class="clearfix"><i
                                                                                class="fa fa-map-marker"></i>
                                                                        <input type="radio"
                                                                               onclick="codeAddress(this.value,'<?php echo $vdraddr->loc_phone; ?>');"
                                                                               id="<?php echo $vdraddr->loc_id; ?>"
                                                                               name="picadd"
                                                                               value="<?= $vdraddr->loc_address; ?>">
                                                                        <?php echo $vdraddr->loc_store . " :- " . $vdraddr->loc_address; ?>
                                                                    </div>
                                                                    <?php

                                                                }
                                                                echo '</div>';
                                                            } else {
                                                                echo "Sorry! No address available for pickup of this product.";
                                                            }

                                                        } else {
                                                            $pickupaddres = $admin_model_obj->get_pickup_locationaddress($pid);
                                                            if (count($pickupaddres) > 0) {
                                                                echo '<div style="max-height: 200px;overflow-y: auto;">';
                                                                foreach ($pickupaddres as $mycustPic) {
                                                                    ?>
                                                                    <div class="clearfix"><i
                                                                                class="fa fa-map-marker"></i>
                                                                        <input type="radio"
                                                                               onclick="codeAddress(this.value,'');"
                                                                               id="<?php echo $mycustPic->pickup_id; ?>"
                                                                               name="picadd"
                                                                               value="<?= $mycustPic->address ?>">
                                                                        <?php echo $mycustPic->address; ?> </div>
                                                                <?php }
                                                                echo '</div>';
                                                            } else {
                                                                echo "Sorry! No address available for pickup of this product.";
                                                            }
                                                        }
                                                        ?>
                                                        <style type="text/css">
                                                            .dttwiseinput {
                                                                width: 126px !important;
                                                                background: #fefefe none repeat scroll 0 0 !important;
                                                                border: 2px solid #cecece !important;
                                                                display: block !important;
                                                                height: 28px !important;
                                                                max-width: 100% !important;
                                                                position: relative !important;
                                                                border-radius: 10em !important;
                                                                font-size: 12px !important;
                                                                color: #333 !important;
                                                                margin: 0px 0px 0px 10px !important;
                                                                float: left !important;
                                                            }
                                                        </style>








{{-- part-9 --}}

                                                        <div class="control-group">
                                                            <div class="controls">
                                                                <?php if ($datewisePriceAvailable == 1) { ?>
                                                                    <?php if (!empty(@$show_date)) { ?>
                                                                        <input value="<?php echo date('Y/m/d', strtotime(@$show_date)); ?>"
                                                                               type="text" placeholder="Pickup Date"
                                                                               name="picdate"
                                                                               class="form-control dttwiseinput"
                                                                               readonly id="picdate">
                                                                        <div id="flash" align="left"></div>
                                                                        <input value="<?php echo @$show_time; ?>"
                                                                               type="text" placeholder="Pickup Time"
                                                                               name="pictime"
                                                                               class="form-control dttwiseinput"
                                                                               readonly id="dtwiseptime">
                                                                    <?php } else { ?>
                                                                        <span style="font-size: 11px;color: #f75d00;">*Please Select Date And Time from Given Below Price List</span>
                                                                    <?php } ?>
                                                                <?php } else { ?>
                                                                    <input style="width: 126px;" value="" type="text"
                                                                           placeholder="Pickup Date" name="picdate"
                                                                           class="form-control mypicupdate"
                                                                           id="datepicker">
                                                                    <div id="flash" align="left"></div>
                                                                    <select style="width:126px;" name="pictime"
                                                                            class="form-control" id="pictime">
                                                                        <option value="">Select Time</option>
                                                                    </select>
                                                                <?php } ?>
                                                            </div>
                                                        </div>


                                                        <input type="hidden" id="proid" name="proid"
                                                               value="<?= $pid ?>">
                                                        <input type="hidden" id="vid" name="vid" value="<?= $vid ?>">
                                                        <?php if (!empty(@$usrmakey)) { ?>
                                                            <input type="hidden" id="userid" name="userid"
                                                                   value="<?= @$usrmakey; ?>">
                                                        <?php } else { ?>
                                                            <input type="hidden" id="userid" name="userid" value="0">
                                                        <?php } ?>
                                                        <input type="hidden" id="dilivery_type" name="dilivery_type"
                                                               value="pickup">
                                                        <div class="clearfix"></div>
                                                        <?php if ($datewisePriceAvailable == 1) { ?>
                                                            <?php if (!empty(@$show_date)) { ?>
                                                                <input type="button" name="submit" class="submit_button"
                                                                       value="Submit">
                                                            <?php } ?>
                                                        <?php } else { ?>
                                                            <input type="button" name="submit" class="submit_button"
                                                                   value="Submit">
                                                        <?php } ?>
                                                    </form>
                                                    <script>


                                                        $(document).ready(
                                                            function () {
                                                                $(".mypicupdate").change(function () {
                                                                    var pickerval = $(this).val();
                                                                    var vendorid = $('#vid').val();
                                                                    $.ajax({
                                                                        type: "POST",
                                                                        url: "{{url('/category_filter/getvendorhours.php')}}",
                                                                        data: {fordate: pickerval, vid: vendorid},
                                                                        cache: true,
                                                                        success: function (data) {
                                                                            $('#pictime').html(data);
                                                                        }
                                                                    });
                                                                });
                                                            });


                                                        $(".submit_button").click(function () {
                                                            //alert('hi');

                                                            <?php if(!empty($show_date)){ ?>
                                                            var picdate = $('#picdate').val();
                                                            var pictime = $('#dtwiseptime').val();
                                                            <?php }else{ ?>
                                                            var picdate = $('#datepicker').val();
                                                            var pictime = $('#pictime').val();
                                                            <?php } ?>


                                                            //var picloc = $('#picadd').val();
                                                            var picloc = $("input[name='picadd']:checked").val();
                                                            var locationID = $("input[name='picadd']:checked").attr('id');


                                                            var proid = $('#proid').val();
                                                            var vid = $('#vid').val();
                                                            var userid = $('#userid').val();
                                                            //var dilivery_type = $('#dilivery_type').val();
                                                            var dilivery_type = 'pickup';
                                                            if (picdate == '') {
                                                                alert("Please Select Date!!..");
                                                            } else if (pictime == '') {
                                                                alert("Please Select Time!!..");

                                                            } else if (typeof (picloc) == "undefined") {
                                                                alert("Please Select Picup Location!!..");

                                                            } else {

                                                                $("#flash").show();
                                                                $("#flash").fadeIn(400).html('<span class="load">Loading..</span>');
                                                                $.ajax({
                                                                    type: "POST",
                                                                    url: "<?php echo $this->baseUrl(); ?>/category_filter/action.php",
                                                                    data: {
                                                                        picloc: picloc,
                                                                        picdate: picdate,
                                                                        pictime: pictime,
                                                                        proid: proid,
                                                                        vid: vid,
                                                                        userid: userid,
                                                                        pickup_type: dilivery_type,
                                                                        loc_id: locationID
                                                                    },
                                                                    cache: true,
                                                                    success: function (html) {
                                                                        //alertt(data);
                                                                        $("#show").after(html);
                                                                        setTimeout(function () {
                                                                            $('.showbox').remove();
                                                                        }, 5000);
                                                                        $("#flash").hide();
                                                                    }
                                                                });
                                                            }
                                                            return false;
                                                        });
                                                    </script>
                                                    <style type="text/css">

                                                        .loadbyappoint {
                                                            color: #06C;
                                                        }

                                                        .load {
                                                            color: #06C;
                                                        }

                                                        .loadship {
                                                            color: #06C;
                                                        }

                                                        .loaddiv {
                                                            color: #06C;
                                                        }

                                                        .showbox {
                                                            border-bottom: 1px #09C solid;
                                                            width: 100%;
                                                            color: #033;
                                                            font-weight: bold;
                                                            word-wrap: break-word;
                                                            font-size: 14px;
                                                            font-family: Tahoma, Geneva, sans-serif;
                                                            margin-bottom: 15px;
                                                            margin-top: -30px;
                                                            text-align: center;
                                                        }

                                                        .showboxship {
                                                            border-bottom: 1px #09C solid;
                                                            width: 490px;
                                                            color: #033;
                                                            font-weight: bold;
                                                            word-wrap: break-word;
                                                            padding: 10px;
                                                            font-size: 14px;
                                                            font-family: Tahoma, Geneva, sans-serif;
                                                            margin-bottom: 5px;
                                                        }

                                                        .showbyappoint {
                                                            border-bottom: 1px #09C solid;
                                                            width: 490px;
                                                            color: #033;
                                                            font-weight: bold;
                                                            word-wrap: break-word;
                                                            padding: 10px;
                                                            font-size: 14px;
                                                            font-family: Tahoma, Geneva, sans-serif;
                                                            margin-bottom: 5px;
                                                        }

                                                        .showdiv {
                                                            border-bottom: 1px #09C solid;
                                                            width: 490px;
                                                            color: #033;
                                                            font-weight: bold;
                                                            word-wrap: break-word;
                                                            padding: 10px;
                                                            font-size: 14px;
                                                            font-family: Tahoma, Geneva, sans-serif;
                                                            margin-bottom: 5px;
                                                        }


                                                    </style>
                                                </div>
                                                <script>
                                                    $(document).ready(
                                                        function () {
                                                            $("#datepicker").datepicker({
                                                                dateFormat: 'yy/mm/dd',
                                                                minDate: new Date(),
                                                                changeMonth: true,//this option for allowing user to select month
                                                                changeYear: true //this option for allowing user to select from year range
                                                            });
                                                        });
                                                </script>
                                            <?php } ?>
                                            <?php if (!empty($resdelivery->online)) { ?>
                                                <style type="text/css">
                                                    .attributes.mainbox-forurs.mainbox-forurs-boxs-final > div#onlinepickupadr {
                                                        background: #333 none repeat scroll 0 0;
                                                        /* height: auto; */
                                                        clear: both;
                                                        height: auto;
                                                        padding: 31px 0 0 0;
                                                    }

                                                    .mainbox-forurs-boxs-final #onlinepickupadr > form {
                                                        color: #ffffff;
                                                        font-size: 12px;
                                                        margin: 0;
                                                        padding: 0 2px;
                                                    }

                                                    #onlinepickupadr > .showbox {
                                                        margin-top: 4px;
                                                        width: 95%;
                                                        text-align: center;
                                                    }

                                                    #onlinepickupadr > form input[type="button"] {
                                                        background: #f75d00 none repeat scroll 0 0;
                                                        border: 0 none;
                                                        color: #ffffff !important;
                                                        height: 28px;
                                                        max-width: 100% !important;
                                                        width: 50%;
                                                        margin: 14px auto 0 auto !important;
                                                        position: static;
                                                        font-size: 12px !important;
                                                        display: block;
                                                        clear: both;
                                                    }
                                                </style>
                                                <div class="mainradio online">
                                                    <input type="radio" id="onlineradio" value="1"
                                                           name="onlinedelivery">
                                                    </input>
                                                    Online
                                                </div>
                                                <div id="onlinepickupadr" style="display:none;">
                                                    <div id="flash" align="left"></div>
                                                    <div id="show" align="left"></div>
                                                    <form method="post" action="">
                                                        <?php
                                                        $onlineLocation = $admin_model_obj->get_online_locationaddress($pid);
                                                        if (count($onlineLocation) > 0) {
                                                            echo '<div style="max-height: 200px;overflow-y: auto;">';
                                                            foreach ($onlineLocation as $Myloca) {
                                                                ?>
                                                                <div class="clearfix"><i class="fa fa-map-marker"></i>
                                                                    <input type="radio"
                                                                           onclick="codeAddress(this.value);"
                                                                           id="piconlineadd" name="piconlineadd"
                                                                           value="<?= $Myloca->address ?>">
                                                                    <?php echo $Myloca->address; ?> </div>
                                                            <?php }
                                                            echo '</div>';
                                                        } else {
                                                            echo "Sorry! No address available for pickup of this product.";
                                                        }

                                                        ?>
                                                        <input type="hidden" id="online_proid" name="online_proid"
                                                               value="<?= $pid ?>">
                                                        <input type="hidden" id="online_vid" name="online_vid"
                                                               value="<?= $vid ?>">
                                                        <?php if (!empty(@$usrmakey)) { ?>
                                                            <input type="hidden" id="oline_userid" name="oline_userid"
                                                                   value="<?= @$usrmakey; ?>">
                                                        <?php } else { ?>
                                                            <input type="hidden" id="oline_userid" name="oline_userid"
                                                                   value="0">
                                                        <?php } ?>
                                                        <input type="hidden" id="dilivery_type" name="dilivery_type"
                                                               value="online">
                                                        <div class="clearfix"></div>
                                                        <input type="button" name="submit" class="submit_online"
                                                               value="Submit">
                                                    </form>
                                                </div>
                                                <script>

                                                    $(".submit_online").click(function () {
                                                        //var picloc = $('#picadd').val();
                                                        var piconlineloc = $("input[name='piconlineadd']:checked").val();
                                                        //console.log(picloc);
                                                        var proid = $('#online_proid').val();
                                                        var vid = $('#online_vid').val();
                                                        var userid = $('#oline_userid').val();
                                                        //var dilivery_type = $('#dilivery_type').val();
                                                        var dilivery_type = 'online';

                                                        if (typeof (piconlineloc) == "undefined") {
                                                            alert("Please Select Location!!..");

                                                        } else {

                                                            $("#flash").show();
                                                            $("#flash").fadeIn(400).html('<span class="load">Loading..</span>');
                                                            $.ajax({
                                                                type: "POST",
                                                                url: "{{url('category_filter/action.php')}}",
                                                                data: {
                                                                    picloc: piconlineloc,
                                                                    proid: proid,
                                                                    vid: vid,
                                                                    userid: userid,
                                                                    online_type: dilivery_type
                                                                },
                                                                cache: true,
                                                                success: function (html) {
                                                                    //alertt(data);
                                                                    $("#show").after(html);
                                                                    setTimeout(function () {
                                                                        $('.showbox').remove();
                                                                    }, 5000);
                                                                    $("#flash").hide();
                                                                }
                                                            });
                                                        }
                                                        return false;
                                                    });
                                                </script>
                                            <?php } ?>











{{-- Part-10  --}}
                                            <?php if (!empty($resdelivery->shipping)) { ?>
                                                <style type="text/css">
                                                    #shipadd > .showbox {
                                                        border-bottom: 1px #09C solid;
                                                        width: 100%;
                                                        color: #033;
                                                        font-weight: bold;
                                                        word-wrap: break-word;
                                                        font-size: 14px;
                                                        font-family: Tahoma, Geneva, sans-serif;
                                                        margin-bottom: 15px;
                                                        margin-top: -30px;
                                                        text-align: center;
                                                    }
                                                </style>
                                                <?php if (!empty(@$deliveryset)) { ?>
                                                    <div class="mainradio shiping">
                                                        <input type="radio" class="ship" id="vdrshipdivadr"
                                                               value="1" <?php /* if($deliveryset[0]['delivery_type'] == 'shipment'){ echo 'checked';} */ ?>
                                                               name="pickdelivery">
                                                        </input>
                                                        Shipping
                                                    </div>
                                                <?php } else { ?>
                                                    <div class="mainradio shiping">
                                                        <input type="radio" class="ship" id="vdrshipdivadr" value="1"
                                                               name="pickdelivery">
                                                        </input>
                                                        Shipping
                                                    </div>
                                                <?php } ?>
                                                <div id="shipadd" style="display:none;">
                                                    <div id="flashship" align="left"></div>
                                                    <div id="showship" align="left"></div>
                                                    <form method="post" action="">
                                                        <?php
                                                        /*
                                                            $shippinglocationadd = $admin_model_obj->get_shipp_address($pid);
                                                            foreach($shippinglocationadd as $shipp){
                                                            $country_key = $shipp['country_key'];
                                                            $country_name = $admin_model_obj->get_country($country_key);
                                                            $state_key = $shipp['state_key'];
                                                            $state_name = $admin_model_obj->get_state($state_key);
                                                            $city_key = $shipp['city_key'];
                                                            $city_name = $admin_model_obj->get_city($city_key);
                                                            $zipcode = $shipp['zipcode'];

                                                            $locationAddress =  $country_name[0]['name'].','.$state_name[0]['statename'].','.$city_name[0]['name'].','.$zipcode;

                                                            ?>
                                                            <i class="fa fa-map-marker"></i><div class="myrdo"><input type="radio" name="shipaddress" onclick="codeAddress(this.value);" id="shipadds" value="<?php echo $country_name[0]['name']; ?>, &nbsp; <?=$state_name[0]['statename']?>, &nbsp; <?=$city_name[0]['name'];?>, &nbsp; (<?=$zipcode?>)"> <?php echo $country_name[0]['name']; ?>, &nbsp; <?=$state_name[0]['statename']?>, &nbsp; <?=$city_name[0]['name'];?>, &nbsp; (<?=$zipcode?>)
                                                            </div>
                                                        <?php } */ ?>
                                                        <div class="shipptype">
                                                            <?php $shippingtype = $admin_model_obj->get_shipp_type($pid); ?>
                                                            <?php if (!empty($shippingtype->standard_shipping)) { ?>
                                                                <div class="myrdo">
                                                                    <input <?php /* if(!empty($deliveryset)){if($deliveryset[0]['shipping_type'] == $shippingtype[0]['standard_shipping']){echo 'checked == "checked"';} } */ ?>
                                                                            type="radio" name="shiptype" id="shiptype1"
                                                                            value="<?= $shippingtype->standard_shipping ?>">
                                                                    </input>
                                                                    Standard Shipping
                                                                </div>
                                                            <?php } else if (!empty($shippingtype->cexpress_shipping)) { ?>
                                                                <div class="myrdo">
                                                                    <input type="radio" <?php /* if(!empty($deliveryset)){if($deliveryset[0]['shipping_type'] == $shippingtype[0]['cexpress_shipping']){echo 'checked == "checked"';} } */ ?>
                                                                           name="shiptype" id="shiptype2"
                                                                           value="<?= $shippingtype->cexpress_shipping ?>">
                                                                    </input>
                                                                    CexpressShipping
                                                                </div>
                                                            <?php } else if (!empty($shippingtype->ups)) { ?>
                                                                <div class="myrdo">
                                                                    <input type="radio" <?php /* if(!empty($deliveryset)){if($deliveryset[0]['shipping_type'] == $shippingtype[0]['ups']){echo 'checked == "checked"';} } */ ?>
                                                                           name="shiptype" id="shiptype3"
                                                                           value="<?= $shippingtype->ups ?>">
                                                                    </input>
                                                                    UPS
                                                                </div>
                                                            <?php } else if (!empty($shippingtype->fedex)) { ?>
                                                                <div class="myrdo">
                                                                    <input type="radio" <?php /* if(!empty($deliveryset)){if($deliveryset[0]['shipping_type'] == $shippingtype[0]['fedex']){echo 'checked == "checked"';} } */ ?>
                                                                           name="shiptype" id="shiptype4"
                                                                           value="<?= $shippingtype->fedex?>">
                                                                    </input>
                                                                    Fedex
                                                                </div>
                                                            <?php } else { ?>
                                                                <div class="myrdo">
                                                                    <input type="radio" name="shiptype" id="shiptype5"
                                                                           value="ss">
                                                                    </input>
                                                                    Standard Shipping
                                                                </div>
                                                            <?php } ?>
                                                        </div>
                                                        <input type="hidden" id="proid" name="proid"
                                                               value="<?= $pid ?>">
                                                        <input type="hidden" id="vid" name="vid" value="<?= $vid ?>">
                                                        <?php if (!empty(@$usrmakey)) { ?>
                                                            <input type="hidden" id="userid" name="userid"
                                                                   value="<?= @$usrmakey; ?>">
                                                        <?php } else { ?>
                                                            <input type="hidden" id="userid" name="userid" value="0">
                                                        <?php } ?>
                                                        <input type="hidden" id="dilivery_types" name="dilivery_types"
                                                               value="shipment">
                                                        <div class="clearfix"></div>
                                                        <input type="button" name="sub" class="submit_ship"
                                                               value="submit"
                                                               style="max-width: 100%;background: #f75d00 none repeat scroll 0 0;color: #ffffff !important;border: 0 none;height: 35px;width: 100%;font-size: 20px;">
                                                    </form>
                                                    <script>
                                                        $(".submit_ship").click(function () {

                                                            //var shiploc = $('#shipadds').val();
                                                            var shiploc = '';
                                                            var shiptype = $('input:radio[name=shiptype]:checked').val();
                                                            //alert(shiptype);
                                                            //alert(shiptype);
                                                            var proid = $('#proid').val();
                                                            var vid = $('#vid').val();
                                                            var userid = $('#userid').val();
                                                            //var dilivery_types = $('#dilivery_types').val();
                                                            var dilivery_types = 'shipment';
                                                            //alert(dilivery_types);
                                                            $("#flashship").show();
                                                            $("#flashship").fadeIn(400).html('<span class="loadship">Loading..</span>');
                                                            $.ajax({
                                                                type: "POST",
                                                                url: "{{url('/category_filter/action.php')}}",
                                                                data: {
                                                                    shiploc: shiploc,
                                                                    shiptype: shiptype,
                                                                    proid: proid,
                                                                    vid: vid,
                                                                    userid: userid,
                                                                    shippment_type: dilivery_types
                                                                },
                                                                cache: true,
                                                                success: function (html) {
                                                                    //alertt(data);
                                                                    //alertt(data);
                                                                    $("#showship").after(html);
                                                                    setTimeout(function () {
                                                                        $('.showbox').remove();
                                                                    }, 5000);
                                                                    $("#flashship").hide();
                                                                }
                                                            });
                                                            return false;
                                                        });
                                                    </script>
                                                </div>
                                            <?php } ?>
























{{--   part-11   --}}
                                            &nbsp; &nbsp; &nbsp;
                                            <?php if (!empty($resdelivery->delivery)) {

                                                $delivysall = $admin_model_obj->get_delivery_location($pid);

                                                if (!empty($usrmakey)) {

                                                    $isdeleveryaailable = false;

                                                    $Usercuntrykey = $record->user_countrykey;
                                                    $Userstatekey = $record->user_statekey;
                                                    $Usercitykey = $record->user_citykey;
                                                    $Userzipcode = $record->zip_code;

                                                    //echo "<pre>";print_R($delivysall);
                                                    //echo "<pre>";print_R($this->record['data']);

                                                    foreach ($delivysall as $deladdress) {

                                                        $cuntrykey = $deladdress->country;
                                                        $statekey = $deladdress->state;
                                                        $citykey = $deladdress->city;
                                                        $zipcode = $deladdress->postl_code;

                                                        if ($cuntrykey == $Usercuntrykey && $statekey == $Userstatekey && $citykey == $Usercitykey && $zipcode == $Userzipcode) {

                                                            $isdeleveryaailable = true;

                                                        }
                                                    } ?>


                                                    <div class="mainradio ddlivery">
                                                        <input type="radio"
                                                               class="delivrydata" <?php /* if(!empty($deliveryset)){ if($deliveryset[0]['delivery_type'] == 'delivery'){ echo 'checked';}} */ ?>
                                                               id="cstdelverdivadr" value="1" name="pickdelivery">
                                                        </input>
                                                        Delivery
                                                    </div>
                                                    <div id="deliveryadd" style="display:none;height: auto;">
                                                        <?php

                                                        if ($isdeleveryaailable) { ?>
                                                            <div id="flashdiv" align="left"></div>
                                                            <div id="showdiv" align="left"></div>
                                                            <form method="post" action="">
                                                                <input type="hidden" id="userid" name="userid"
                                                                       value="<?= @$usrmakey; ?>">
                                                                <input type="hidden" id="proid" name="proid"
                                                                       value="<?= $pid ?>">
                                                                <input type="hidden" id="vid" name="vid"
                                                                       value="<?= $vid ?>">
                                                                <input type="hidden" id="zipcode" name="zipcode"
                                                                       value="<?= $Userzipcode ?>">
                                                                <input type="hidden" id="dilivery_typed"
                                                                       name="dilivery_typed" value="delivery">
                                                                <textarea cols="2" rows="2" name="new_address"
                                                                          id="new_address"
                                                                          style="width: 100%;font-size: 15px;color: #000;"
                                                                          placeholder="Enter Your Delivery Address"></textarea>
                                                                </br>
                                                                <input type="button" name="sib" class="sub_delivery"
                                                                       value="Submit"
                                                                       style="background-color:f75d00 !important;">
                                                            </form>
                                                            <script>
                                                                $(".sub_delivery").click(function () {
                                                                    var zipcode = $('#zipcode').val();
                                                                    var proid = $('#proid').val();
                                                                    var new_address = $('#new_address').val();
                                                                    var vid = $('#vid').val();
                                                                    var userid = $('#userid').val();
                                                                    //var dilivery_typed = $('#dilivery_typed').val();
                                                                    var dilivery_typed = 'delivery';

                                                                    if (new_address.trim() == '') {
                                                                        alert("Please Enter Your Delivery Address");
                                                                        return false;
                                                                    } else {

                                                                        $("#flashdiv").show();
                                                                        $("#flashdiv").fadeIn(400).html('<span class="loaddiv">Loading..</span>');
                                                                        $.ajax({
                                                                            type: "POST",
                                                                            url: "{{url('/category_filter/action.php')}}",
                                                                            data: {
                                                                                user_zipcode: zipcode,
                                                                                address: new_address,
                                                                                proid: proid,
                                                                                vid: vid,
                                                                                userid: userid,
                                                                                deliveryd_type: dilivery_typed
                                                                            },
                                                                            cache: true,
                                                                            success: function (html) {
                                                                                //alertt(data);
                                                                                //alertt(html);
                                                                                $("#showdiv").after(html);
                                                                                $('#new_address').val('');
                                                                                setTimeout(function () {
                                                                                    $('.showbox').remove();
                                                                                }, 5000);
                                                                                $("#flashdiv").hide();
                                                                            }
                                                                        });
                                                                        return false;
                                                                    }

                                                                });
                                                            </script>
                                                        <?php } else {

                                                            echo "<span>Delivery Not Available At Your Region</span></br>";

                                                        }
                                                        ?>
                                                        <div class="clearfix"></div>
                                                        <style type="text/css">
                                                            .deliveryfees {
                                                                margin: 5px 0px 0px 2px;
                                                                font-weight: 600;
                                                            }
                                                        </style>
                                                        <div class="deliveryfees">
                                                            <?php

                                                            $deliveryPricing = $admin_model_obj->get_delivery_price_detail($pid);

                                                            if (!empty($deliveryPricing)) {

                                                                if ($deliveryPricing->delivery_type == 'free') {

                                                                    echo "<span> Delivery Type : FREE</span>";

                                                                } else {

                                                                    echo "<span> Delivery Type : Not FREE</span></br>";
                                                                    $delcharge = $deliveryPricing->delivery_fee;
                                                                    echo "<span> Delivery Charge :$ $delcharge</span>";

                                                                }
                                                            }

                                                            ?>
                                                        </div>
                                                    </div>
                                                <?php } else { ?>
                                                    <div class="mainradio ddlivery">
                                                        <input type="radio"
                                                               class="delivrydata" <?php /* if(!empty($deliveryset)){ if($deliveryset[0]['delivery_type'] == 'delivery'){ echo 'checked';}} */ ?>
                                                               id="cstdelverdivadr" value="1" name="pickdelivery">
                                                        </input>
                                                        Delivery
                                                    </div>
                                                    <div id="deliveryadd" style="display:none;"><span>Delivery Available At Following Region</span></br>
                                                        <?php
                                                        foreach ($delivysall as $deladdress) {

                                                            $cuntrykey = $deladdress->country;
                                                            $country_name = $admin_model_obj->get_country($cuntrykey);
                                                            $statekey = $deladdress->state;
                                                            $state_name = $admin_model_obj->get_state($statekey);
                                                            $citykey = $deladdress->city;
                                                            $city_name = $admin_model_obj->get_city($citykey);
                                                            $zipcode = $deladdress->postl_code;
                                                            $miles = $deladdress->miles;

                                                            $country = @$country_name->name;
                                                            $state = @$state_name->statename;
                                                            $city = @$city_name->name;
                                                            $del1 = $city . ', &nbsp; ' . $state . ', &nbsp; ' . $country . ', &nbsp; ' . $zipcode;

                                                            ?>
                                                            <i class="fa fa-map-marker"></i>
                                                            <?= $del1 ?>
                                                            </br>
                                                        <?php }
                                                        ?>
                                                    </div>
                                                <?php } ?>
                                            <?php } ?>



















{{--  part-12  --}}
                                            <?php if (!empty($resdelivery->byappointment)) { ?>
                                                <style type="text/css">

                                                    .mainbox-forurs.mainbox-forurs-boxs-final #vdrbyappointadr #datepicker1.form-control.hasDatepicker, form select {
                                                        background: #fefefe none repeat scroll 0 0 !important;
                                                        border: 2px solid #cecece !important;
                                                        display: block;
                                                        height: 28px !important;
                                                        max-width: 100% !important;
                                                        position: relative;
                                                        border-radius: 10em;
                                                        font-size: 12px;
                                                        color: #333 !important;
                                                        width: 169px !important;
                                                    }

                                                    .mainbox-forurs.mainbox-forurs-boxs-final > form input, #vdrbyappointadr > form input#datepicker1, #vdrbyappointadr > form select {
                                                        height: 28px !important;
                                                        left: 25px !important;
                                                        margin: 0 0 0 3px;
                                                        text-align: center;
                                                    }

                                                    #byapointtime.form-control {
                                                        bottom: 18px;
                                                        padding: 2px 0px 4px 8px !important;
                                                        position: relative;
                                                    }

                                                    input.subbyappoint {
                                                        background: #f75d00 none repeat scroll 0 0;
                                                        border: 0 none;
                                                        color: #ffffff !important;
                                                        height: 28px;
                                                        max-width: 100% !important;
                                                        width: 50%;
                                                        margin: 53px 105px 15px 74px !important;
                                                        position: static;
                                                        font-size: 12px !important;
                                                        display: block;
                                                        clear: both;
                                                    }

                                                </style>
                                            <?php if (!empty(@$deliveryset)){ ?>
                                                <div class="mainradio appointments">
                                                    <input type="radio"
                                                           class="byappointdata" <?php if (@$deliveryset->delivery_type == 'byappoint') {
                                                        echo 'checked';
                                                    } ?> id="vdrbyappointkupdivadr" value="1"
                                                           onclick="openvendorbyappoint(this.value);"
                                                           name="pickdelivery">
                                                    </input>
                                                    By Appointment
                                                </div>
                                            <?php }else{ ?>
                                                <div class="mainradio appointments">
                                                    <input type="radio" class="byappointdata" id="vdrbyappointkupdivadr"
                                                           value="1" onclick="openvendorbyappoint(this.value);"
                                                           name="pickdelivery">
                                                    </input>
                                                    By Appointment
                                                </div>
                                            <?php } ?>
                                                </strong> <br/>



                                                <div id="vdrbyappointadr" style="display:none;">
                                                    <div id="flashbyappoint" align="left"></div>
                                                    <div id="showbyappoint" align="left"></div>
                                                    <form method="post" action="">
                                                        <?php if (!empty($vid)) {
                                                            $byappointaddress = $admin_model_obj->get_byappoint_detail($pid, $vid);

                                                            ?>
                                                            <table border="1">
                                                                <tr>
                                                                    <td></td>
                                                                    <td>Start Datetime</td>
                                                                    <td>End Datetime</td>
                                                                    <td>Employee</td>
                                                                    <td>Address</td>
                                                                </tr>
                                                                <?php foreach ($byappointaddress as $byapp) {
                                                                    $store = $byapp->store;
                                                                    $byapointstoreadd = $admin_model_obj->get_vendor_address($vid, $store);

                                                                    //    print_r($deliveryset);die;
                                                                    ?>
                                                                    <tr>
                                                                        <td>
                                                                            <input type="radio" <?php if (!empty(@$deliveryset)) {
                                                                                if (@$deliveryset->byappoint_location == $byapp->byappoint_id) {
                                                                                    echo 'checked';
                                                                                }
                                                                            } ?> id="locationadd" name="locationadd"
                                                                                   value="<?php echo $byapp->byappoint_id; ?>">
                                                                        </td>
                                                                        <!--<td><?php // echo $deliveryset->byappoint_location; ?></td>-->
                                                                        <td><?php echo $byapp->startdate; ?></td>
                                                                        <td><?php echo $byapp->enddate; ?></td>
                                                                        <td><?php echo $byapp->employee; ?></td>
                                                                        <td><?php echo $byapointstoreadd->loc_address; ?></td>
                                                                    </tr>
                                                                <?php } ?>
                                                            </table>
                                                        <?php } ?>

























 {{-- part-13 --}}
                                                        <div class="control-group">
                                                            <div class="controls">
                                                                <input style="width: 126px;"
                                                                       value="<?php if (!empty(@$deliveryset)) {
                                                                           echo @$deliveryset->byappoint_date;
                                                                       } ?>" type="text" placeholder="Pickup Date"
                                                                       name="byapointdate" class="form-control"
                                                                       id="datepicker1">
                                                                <select style="width:126px;" name="byapointtime"
                                                                        id="byapointtime" class="form-control">
                                                                    <option value="">Select Time</option>
                                                                    <option <?php if (!empty(@$deliveryset)) {
                                                                        if (@$deliveryset->byappoint_time == '12:00 AM') {
                                                                            echo 'selected == "selected"';
                                                                        }
                                                                    } ?> value="12:00 AM">12:00 AM
                                                                    </option>
                                                                    <option <?php if (!empty(@$deliveryset)) {
                                                                        if (@$deliveryset->byappoint_time == '12:15 AM') {
                                                                            echo 'selected == "selected"';
                                                                        }
                                                                    } ?> value="12:15 AM">12:15 AM
                                                                    </option>
                                                                    <option <?php if (!empty(@$deliveryset)) {
                                                                        if (@$deliveryset->byappoint_time == '12:30 AM') {
                                                                            echo 'selected == "selected"';
                                                                        }
                                                                    } ?> value="12:30 AM">12:30 AM
                                                                    </option>
                                                                    <option <?php if (!empty(@$deliveryset)) {
                                                                        if (@$deliveryset->byappoint_time == '12:45 AM') {
                                                                            echo 'selected == "selected"';
                                                                        }
                                                                    } ?> value="12:45 AM">12:45 AM
                                                                    </option>
                                                                    <option <?php if (!empty(@$deliveryset)) {
                                                                        if (@$deliveryset->byappoint_time == '1:00 AM') {
                                                                            echo 'selected == "selected"';
                                                                        }
                                                                    } ?> value="1:00 AM">1:00 AM
                                                                    </option>
                                                                    <option <?php if (!empty(@$deliveryset)) {
                                                                        if (@$deliveryset->byappoint_time == '1:15 AM') {
                                                                            echo 'selected == "selected"';
                                                                        }
                                                                    } ?> value="1:15 AM">1:15 AM
                                                                    </option>
                                                                    <option <?php if (!empty(@$deliveryset)) {
                                                                        if (@$deliveryset->byappoint_time == '1:30 AM') {
                                                                            echo 'selected == "selected"';
                                                                        }
                                                                    } ?> value="1:30 AM">1:30 AM
                                                                    </option>
                                                                    <option <?php if (!empty(@$deliveryset)) {
                                                                        if (@$deliveryset->byappoint_time == '1:45 AM') {
                                                                            echo 'selected == "selected"';
                                                                        }
                                                                    } ?> value="1:45 AM">1:45 AM
                                                                    </option>
                                                                    <option <?php if (!empty(@$deliveryset)) {
                                                                        if (@$deliveryset->byappoint_time == '2:00 AM') {
                                                                            echo 'selected == "selected"';
                                                                        }
                                                                    } ?> value="2:00 AM">2:00 AM
                                                                    </option>
                                                                    <option <?php if (!empty(@$deliveryset)) {
                                                                        if (@$deliveryset->byappoint_time == '2:15 AM') {
                                                                            echo 'selected == "selected"';
                                                                        }
                                                                    } ?> value="2:15 AM">2:15 AM
                                                                    </option>
                                                                    <option <?php if (!empty(@$deliveryset)) {
                                                                        if (@$deliveryset->byappoint_time == '2:30 AM') {
                                                                            echo 'selected == "selected"';
                                                                        }
                                                                    } ?> value="2:30 AM">2:30 AM
                                                                    </option>
                                                                    <option <?php if (!empty(@$deliveryset)) {
                                                                        if (@$deliveryset->byappoint_time == '2:45 AM') {
                                                                            echo 'selected == "selected"';
                                                                        }
                                                                    } ?> value="2:45 AM">2:45 AM
                                                                    </option>
                                                                    <option <?php if (!empty(@$deliveryset)) {
                                                                        if (@$deliveryset->byappoint_time == '3:00 AM') {
                                                                            echo 'selected == "selected"';
                                                                        }
                                                                    } ?> value="3:00 AM">3:00 AM
                                                                    </option>
                                                                    <option <?php if (!empty(@$deliveryset)) {
                                                                        if (@$deliveryset->byappoint_time == '3:15 AM') {
                                                                            echo 'selected == "selected"';
                                                                        }
                                                                    } ?> value="3:15 AM">3:15 AM
                                                                    </option>
                                                                    <option <?php if (!empty(@$deliveryset)) {
                                                                        if (@$deliveryset->byappoint_time == '3:30 AM') {
                                                                            echo 'selected == "selected"';
                                                                        }
                                                                    } ?> value="3:30 AM">3:30 AM
                                                                    </option>
                                                                    <option <?php if (!empty(@$deliveryset)) {
                                                                        if (@$deliveryset->byappoint_time == '3:45 AM') {
                                                                            echo 'selected == "selected"';
                                                                        }
                                                                    } ?> value="3:45 AM">3:45 AM
                                                                    </option>
                                                                    <option <?php if (!empty(@$deliveryset)) {
                                                                        if (@$deliveryset->byappoint_time == '4:00 AM') {
                                                                            echo 'selected == "selected"';
                                                                        }
                                                                    } ?> value="4:00 AM">4:00 AM
                                                                    </option>
                                                                    <option <?php if (!empty(@$deliveryset)) {
                                                                        if (@$deliveryset->byappoint_time == '4:15 AM') {
                                                                            echo 'selected == "selected"';
                                                                        }
                                                                    } ?> value="4:15 AM">4:15 AM
                                                                    </option>
                                                                    <option <?php if (!empty(@$deliveryset)) {
                                                                        if (@$deliveryset->byappoint_time == '4:30 AM') {
                                                                            echo 'selected == "selected"';
                                                                        }
                                                                    } ?> value="4:30 AM">4:30 AM
                                                                    </option>
                                                                    <option <?php if (!empty(@$deliveryset)) {
                                                                        if (@$deliveryset->byappoint_time == '4:45 AM') {
                                                                            echo 'selected == "selected"';
                                                                        }
                                                                    } ?> value="4:45 AM">4:45 AM
                                                                    </option>
                                                                    <option <?php if (!empty(@$deliveryset)) {
                                                                        if (@$deliveryset->byappoint_time == '5:00 AM') {
                                                                            echo 'selected == "selected"';
                                                                        }
                                                                    } ?> value="5:00 AM">5:00 AM
                                                                    </option>
                                                                    <option <?php if (!empty(@$deliveryset)) {
                                                                        if (@$deliveryset->byappoint_time == '5:15 AM') {
                                                                            echo 'selected == "selected"';
                                                                        }
                                                                    } ?> value="5:15 AM">5:15 AM
                                                                    </option>
                                                                    <option <?php if (!empty(@$deliveryset)) {
                                                                        if (@$deliveryset->byappoint_time == '5:30 AM') {
                                                                            echo 'selected == "selected"';
                                                                        }
                                                                    } ?> value="5:30 AM">5:30 AM
                                                                    </option>
                                                                    <option <?php if (!empty(@$deliveryset)) {
                                                                        if (@$deliveryset->byappoint_time == '5:45 AM') {
                                                                            echo 'selected == "selected"';
                                                                        }
                                                                    } ?> value="5:45 AM">5:45 AM
                                                                    </option>
                                                                    <option <?php if (!empty(@$deliveryset)) {
                                                                        if (@$deliveryset->byappoint_time == '6:00 AM') {
                                                                            echo 'selected == "selected"';
                                                                        }
                                                                    } ?> value="6:00 AM">6:00 AM
                                                                    </option>
                                                                    <option <?php if (!empty(@$deliveryset)) {
                                                                        if (@$deliveryset->byappoint_time == '6:15 AM') {
                                                                            echo 'selected == "selected"';
                                                                        }
                                                                    } ?> value="6:15 AM">6:15 AM
                                                                    </option>
                                                                    <option <?php if (!empty(@$deliveryset)) {
                                                                        if (@$deliveryset->byappoint_time == '6:30 AM') {
                                                                            echo 'selected == "selected"';
                                                                        }
                                                                    } ?> value="6:30 AM">6:30 AM
                                                                    </option>
                                                                    <option <?php if (!empty(@$deliveryset)) {
                                                                        if (@$deliveryset->byappoint_time == '6:45 AM') {
                                                                            echo 'selected == "selected"';
                                                                        }
                                                                    } ?> value="6:45 AM">6:45 AM
                                                                    </option>
                                                                    <option <?php if (!empty(@$deliveryset)) {
                                                                        if (@$deliveryset->byappoint_time == '7:00 AM') {
                                                                            echo 'selected == "selected"';
                                                                        }
                                                                    } ?> value="7:00 AM">7:00 AM
                                                                    </option>
                                                                    <option <?php if (!empty(@$deliveryset)) {
                                                                        if (@$deliveryset->byappoint_time == '7:45 AM') {
                                                                            echo 'selected == "selected"';
                                                                        }
                                                                    } ?> value="7:15 AM">7:15 AM
                                                                    </option>
                                                                    <option <?php if (!empty(@$deliveryset)) {
                                                                        if (@$deliveryset->byappoint_time == '7:30 AM') {
                                                                            echo 'selected == "selected"';
                                                                        }
                                                                    } ?> value="7:30 AM">7:30 AM
                                                                    </option>
                                                                    <option <?php if (!empty(@$deliveryset)) {
                                                                        if (@$deliveryset->byappoint_time == '7:45 AM') {
                                                                            echo 'selected == "selected"';
                                                                        }
                                                                    } ?> value="7:45 AM">7:45 AM
                                                                    </option>
                                                                    <option <?php if (!empty(@$deliveryset)) {
                                                                        if (@$deliveryset->byappoint_time == '8:00 AM') {
                                                                            echo 'selected == "selected"';
                                                                        }
                                                                    } ?> value="8:00 AM">8:00 AM
                                                                    </option>
                                                                    <option <?php if (!empty(@$deliveryset)) {
                                                                        if (@$deliveryset->byappoint_time == '8:15 AM') {
                                                                            echo 'selected == "selected"';
                                                                        }
                                                                    } ?> value="8:15 AM">8:15 AM
                                                                    </option>
                                                                    <option <?php if (!empty(@$deliveryset)) {
                                                                        if (@$deliveryset->byappoint_time == '8:30 AM') {
                                                                            echo 'selected == "selected"';
                                                                        }
                                                                    } ?> value="8:30 AM">8:30 AM
                                                                    </option>
                                                                    <option <?php if (!empty(@$deliveryset)) {
                                                                        if (@$deliveryset->byappoint_time == '8:45 AM') {
                                                                            echo 'selected == "selected"';
                                                                        }
                                                                    } ?> value="8:45 AM">8:45 AM
                                                                    </option>
                                                                    <option <?php if (!empty(@$deliveryset)) {
                                                                        if (@$deliveryset->byappoint_time == '9:00 AM') {
                                                                            echo 'selected == "selected"';
                                                                        }
                                                                    } ?> value="9:00 AM">9:00 AM
                                                                    </option>
                                                                    <option <?php if (!empty(@$deliveryset)) {
                                                                        if (@$deliveryset->byappoint_time == '9:15 AM') {
                                                                            echo 'selected == "selected"';
                                                                        }
                                                                    } ?> value="9:15 AM">9:15 AM
                                                                    </option>
                                                                    <option <?php if (!empty(@$deliveryset)) {
                                                                        if (@$deliveryset->byappoint_time == '9:30 AM') {
                                                                            echo 'selected == "selected"';
                                                                        }
                                                                    } ?> value="9:30 AM">9:30 AM
                                                                    </option>
                                                                    <option <?php if (!empty(@$deliveryset)) {
                                                                        if (@$deliveryset->byappoint_time == '9:45 AM') {
                                                                            echo 'selected == "selected"';
                                                                        }
                                                                    } ?> value="9:45 AM">9:45 AM
                                                                    </option>
                                                                    <option <?php if (!empty(@$deliveryset)) {
                                                                        if (@$deliveryset->byappoint_time == '10:00 AM') {
                                                                            echo 'selected == "selected"';
                                                                        }
                                                                    } ?> value="10:00 AM">10:00 AM
                                                                    </option>
                                                                    <option <?php if (!empty(@$deliveryset)) {
                                                                        if (@$deliveryset->byappoint_time == '10:15 AM') {
                                                                            echo 'selected == "selected"';
                                                                        }
                                                                    } ?> value="10:15 AM">10:15 AM
                                                                    </option>
                                                                    <option <?php if (!empty(@$deliveryset)) {
                                                                        if (@$deliveryset->byappoint_time == '10:30 AM') {
                                                                            echo 'selected == "selected"';
                                                                        }
                                                                    } ?> value="10:30 AM">10:30 AM
                                                                    </option>
                                                                    <option <?php if (!empty(@$deliveryset)) {
                                                                        if (@$deliveryset->byappoint_time == '10:45 AM') {
                                                                            echo 'selected == "selected"';
                                                                        }
                                                                    } ?> value="10:45 AM">10:45 AM
                                                                    </option>
                                                                    <option <?php if (!empty(@$deliveryset)) {
                                                                        if (@$deliveryset->byappoint_time == '11:00 AM') {
                                                                            echo 'selected == "selected"';
                                                                        }
                                                                    } ?> value="11:00 AM">11:00 AM
                                                                    </option>
                                                                    <option <?php if (!empty(@$deliveryset)) {
                                                                        if (@$deliveryset->byappoint_time == '11:15 AM') {
                                                                            echo 'selected == "selected"';
                                                                        }
                                                                    } ?> value="11:15 AM">11:15 AM
                                                                    </option>
                                                                    <option <?php if (!empty(@$deliveryset)) {
                                                                        if (@$deliveryset->byappoint_time == '11:30 AM') {
                                                                            echo 'selected == "selected"';
                                                                        }
                                                                    } ?> value="11:30 AM">11:30 AM
                                                                    </option>
                                                                    <option <?php if (!empty(@$deliveryset)) {
                                                                        if (@$deliveryset->byappoint_time == '11:45 AM') {
                                                                            echo 'selected == "selected"';
                                                                        }
                                                                    } ?> value="11:45 AM">11:45 AM
                                                                    </option>
                                                                    <option <?php if (!empty(@$deliveryset)) {
                                                                        if (@$deliveryset->byappoint_time == '12:00 PM') {
                                                                            echo 'selected == "selected"';
                                                                        }
                                                                    } ?> value="12:00 PM">12:00 PM
                                                                    </option>
                                                                    <option <?php if (!empty(@$deliveryset)) {
                                                                        if (@$deliveryset->byappoint_time == '12:15 PM') {
                                                                            echo 'selected == "selected"';
                                                                        }
                                                                    } ?> value="12:15 PM">12:15 PM
                                                                    </option>
                                                                    <option <?php if (!empty(@$deliveryset)) {
                                                                        if (@$deliveryset->byappoint_time == '12:30 PM') {
                                                                            echo 'selected == "selected"';
                                                                        }
                                                                    } ?> value="12:30 PM">12:30 PM
                                                                    </option>
                                                                    <option <?php if (!empty(@$deliveryset)) {
                                                                        if (@$deliveryset->byappoint_time == '12:45 PM') {
                                                                            echo 'selected == "selected"';
                                                                        }
                                                                    } ?> value="12:45 PM">12:45 PM
                                                                    </option>
                                                                    <option <?php if (!empty(@$deliveryset)) {
                                                                        if (@$deliveryset->byappoint_time == '1:00 PM') {
                                                                            echo 'selected == "selected"';
                                                                        }
                                                                    } ?> value="1:00 PM">1:00 PM
                                                                    </option>
                                                                    <option <?php if (!empty(@$deliveryset)) {
                                                                        if (@$deliveryset->byappoint_time == '1:15 PM') {
                                                                            echo 'selected == "selected"';
                                                                        }
                                                                    } ?> value="1:15 PM">1:15 PM
                                                                    </option>
                                                                    <option <?php if (!empty(@$deliveryset)) {
                                                                        if (@$deliveryset->byappoint_time == '1:30 PM') {
                                                                            echo 'selected == "selected"';
                                                                        }
                                                                    } ?> value="1:30 PM">1:30 PM
                                                                    </option>
                                                                    <option <?php if (!empty(@$deliveryset)) {
                                                                        if (@$deliveryset->byappoint_time == '1:45 PM') {
                                                                            echo 'selected == "selected"';
                                                                        }
                                                                    } ?> value="1:45 PM">1:45 PM
                                                                    </option>
                                                                    <option <?php if (!empty(@$deliveryset)) {
                                                                        if (@$deliveryset->byappoint_time == '2:00 PM') {
                                                                            echo 'selected == "selected"';
                                                                        }
                                                                    } ?> value="2:00 PM">2:00 PM
                                                                    </option>
                                                                    <option <?php if (!empty(@$deliveryset)) {
                                                                        if (@$deliveryset->byappoint_time == '2:15 PM') {
                                                                            echo 'selected == "selected"';
                                                                        }
                                                                    } ?> value="2:15 PM">2:15 PM
                                                                    </option>
                                                                    <option <?php if (!empty(@$deliveryset)) {
                                                                        if (@$deliveryset->byappoint_time == '2:30 PM') {
                                                                            echo 'selected == "selected"';
                                                                        }
                                                                    } ?>value="2:30 PM">2:30 PM
                                                                    </option>
                                                                    <option <?php if (!empty(@$deliveryset)) {
                                                                        if (@$deliveryset->byappoint_time == '2:45 PM') {
                                                                            echo 'selected == "selected"';
                                                                        }
                                                                    } ?> value="2:45 PM">2:45 PM
                                                                    </option>
                                                                    <option <?php if (!empty(@$deliveryset)) {
                                                                        if (@$deliveryset->byappoint_time == '3:00 PM') {
                                                                            echo 'selected == "selected"';
                                                                        }
                                                                    } ?> value="3:00 PM">3:00 PM
                                                                    </option>
                                                                    <option <?php if (!empty(@$deliveryset)) {
                                                                        if (@$deliveryset->byappoint_time == '3:15 PM') {
                                                                            echo 'selected == "selected"';
                                                                        }
                                                                    } ?> value="3:15 PM">3:15 PM
                                                                    </option>
                                                                    <option <?php if (!empty(@$deliveryset)) {
                                                                        if (@$deliveryset->byappoint_time == '3:30 PM') {
                                                                            echo 'selected == "selected"';
                                                                        }
                                                                    } ?> value="3:30 PM">3:30 PM
                                                                    </option>
                                                                    <option <?php if (!empty(@$deliveryset)) {
                                                                        if (@$deliveryset->byappoint_time == '3:45 PM') {
                                                                            echo 'selected == "selected"';
                                                                        }
                                                                    } ?> value="3:45 PM">3:45 PM
                                                                    </option>
                                                                    <option <?php if (!empty(@$deliveryset)) {
                                                                        if (@$deliveryset->byappoint_time == '4:00 PM') {
                                                                            echo 'selected == "selected"';
                                                                        }
                                                                    } ?> value="4:00 PM">4:00 PM
                                                                    </option>
                                                                    <option <?php if (!empty(@$deliveryset)) {
                                                                        if (@$deliveryset->byappoint_time == '4:15 PM') {
                                                                            echo 'selected == "selected"';
                                                                        }
                                                                    } ?> value="4:15 PM">4:15 PM
                                                                    </option>
                                                                    <option <?php if (!empty(@$deliveryset)) {
                                                                        if (@$deliveryset->byappoint_time == '4:30 PM') {
                                                                            echo 'selected == "selected"';
                                                                        }
                                                                    } ?> value="4:30 PM">4:30 PM
                                                                    </option>
                                                                    <option <?php if (!empty(@$deliveryset)) {
                                                                        if (@$deliveryset->byappoint_time == '4:45 PM') {
                                                                            echo 'selected == "selected"';
                                                                        }
                                                                    } ?> value="4:45 PM">4:45 PM
                                                                    </option>
                                                                    <option <?php if (!empty(@$deliveryset)) {
                                                                        if (@$deliveryset->byappoint_time == '5:00 PM') {
                                                                            echo 'selected == "selected"';
                                                                        }
                                                                    } ?> value="5:00 PM">5:00 PM
                                                                    </option>
                                                                    <option <?php if (!empty(@$deliveryset)) {
                                                                        if (@$deliveryset->byappoint_time == '5:15 PM') {
                                                                            echo 'selected == "selected"';
                                                                        }
                                                                    } ?> value="5:15 PM">5:15 PM
                                                                    </option>
                                                                    <option <?php if (!empty(@$deliveryset)) {
                                                                        if (@$deliveryset->byappoint_time == '5:30 PM') {
                                                                            echo 'selected == "selected"';
                                                                        }
                                                                    } ?> value="5:30 PM">5:30 PM
                                                                    </option>
                                                                    <option <?php if (!empty(@$deliveryset)) {
                                                                        if (@$deliveryset->byappoint_time == '5:45 PM') {
                                                                            echo 'selected == "selected"';
                                                                        }
                                                                    } ?> value="5:45 PM">5:45 PM
                                                                    </option>
                                                                    <option <?php if (!empty(@$deliveryset)) {
                                                                        if (@$deliveryset->byappoint_time == '6:00 PM') {
                                                                            echo 'selected == "selected"';
                                                                        }
                                                                    } ?> value="6:00 PM">6:00 PM
                                                                    </option>
                                                                    <option <?php if (!empty(@$deliveryset)) {
                                                                        if (@$deliveryset->byappoint_time == '6:15 PM') {
                                                                            echo 'selected == "selected"';
                                                                        }
                                                                    } ?> value="6:15 PM">6:15 PM
                                                                    </option>
                                                                    <option <?php if (!empty(@$deliveryset)) {
                                                                        if (@$deliveryset->byappoint_time == '6:30 PM') {
                                                                            echo 'selected == "selected"';
                                                                        }
                                                                    } ?> value="6:30 PM">6:30 PM
                                                                    </option>
                                                                    <option <?php if (!empty(@$deliveryset)) {
                                                                        if (@$deliveryset->byappoint_time == '6:45 PM') {
                                                                            echo 'selected == "selected"';
                                                                        }
                                                                    } ?> value="6:45 PM">6:45 PM
                                                                    </option>
                                                                    <option <?php if (!empty(@$deliveryset)) {
                                                                        if (@$deliveryset->byappoint_time == '7:00 PM') {
                                                                            echo 'selected == "selected"';
                                                                        }
                                                                    } ?> value="7:00 PM">7:00 PM
                                                                    </option>
                                                                    <option <?php if (!empty(@$deliveryset)) {
                                                                        if (@$deliveryset->byappoint_time == '7:15 PM') {
                                                                            echo 'selected == "selected"';
                                                                        }
                                                                    } ?> value="7:15 PM">7:15 PM
                                                                    </option>
                                                                    <option <?php if (!empty(@$deliveryset)) {
                                                                        if (@$deliveryset->byappoint_time == '7:30 PM') {
                                                                            echo 'selected == "selected"';
                                                                        }
                                                                    } ?> value="7:30 PM">7:30 PM
                                                                    </option>
                                                                    <option <?php if (!empty(@$deliveryset)) {
                                                                        if (@$deliveryset->byappoint_time == '7:45 PM') {
                                                                            echo 'selected == "selected"';
                                                                        }
                                                                    } ?> value="7:45 PM">7:45 PM
                                                                    </option>
                                                                    <option <?php if (!empty(@$deliveryset)) {
                                                                        if (@$deliveryset->byappoint_time == '8:00 PM') {
                                                                            echo 'selected == "selected"';
                                                                        }
                                                                    } ?> value="8:00 PM">8:00 PM
                                                                    </option>
                                                                    <option <?php if (!empty(@$deliveryset)) {
                                                                        if (@$deliveryset->byappoint_time == '8:15 PM') {
                                                                            echo 'selected == "selected"';
                                                                        }
                                                                    } ?> value="8:15 PM">8:15 PM
                                                                    </option>
                                                                    <option <?php if (!empty(@$deliveryset)) {
                                                                        if (@$deliveryset->byappoint_time == '8:30 PM') {
                                                                            echo 'selected == "selected"';
                                                                        }
                                                                    } ?> value="8:30 PM">8:30 PM
                                                                    </option>
                                                                    <option <?php if (!empty(@$deliveryset)) {
                                                                        if (@$deliveryset->byappoint_time == '8:45 PM') {
                                                                            echo 'selected == "selected"';
                                                                        }
                                                                    } ?> value="8:45 PM">8:45 PM
                                                                    </option>
                                                                    <option <?php if (!empty(@$deliveryset)) {
                                                                        if (@$deliveryset->byappoint_time == '9:00 PM') {
                                                                            echo 'selected == "selected"';
                                                                        }
                                                                    } ?> value="9:00 PM">9:00 PM
                                                                    </option>
                                                                    <option <?php if (!empty(@$deliveryset)) {
                                                                        if (@$deliveryset->byappoint_time == '9:15 PM') {
                                                                            echo 'selected == "selected"';
                                                                        }
                                                                    } ?> value="9:15 PM">9:15 PM
                                                                    </option>
                                                                    <option <?php if (!empty(@$deliveryset)) {
                                                                        if (@$deliveryset->byappoint_time == '9:30 PM') {
                                                                            echo 'selected == "selected"';
                                                                        }
                                                                    } ?> value="9:30 PM">9:30 PM
                                                                    </option>
                                                                    <option <?php if (!empty(@$deliveryset)) {
                                                                        if (@$deliveryset->byappoint_time == '9:45 PM') {
                                                                            echo 'selected == "selected"';
                                                                        }
                                                                    } ?> value="9:45 PM">9:45 PM
                                                                    </option>
                                                                    <option <?php if (!empty(@$deliveryset)) {
                                                                        if (@$deliveryset->byappoint_time == '10:00 PM') {
                                                                            echo 'selected == "selected"';
                                                                        }
                                                                    } ?> value="10:00 PM">10:00 PM
                                                                    </option>
                                                                    <option <?php if (!empty(@$deliveryset)) {
                                                                        if (@$deliveryset->byappoint_time == '10:15 PM') {
                                                                            echo 'selected == "selected"';
                                                                        }
                                                                    } ?> value="10:15 PM">10:15 PM
                                                                    </option>
                                                                    <option <?php if (!empty(@$deliveryset)) {
                                                                        if (@$deliveryset->byappoint_time == '10:30 PM') {
                                                                            echo 'selected == "selected"';
                                                                        }
                                                                    } ?> value="10:30 PM">10:30 PM
                                                                    </option>
                                                                    <option <?php if (!empty(@$deliveryset)) {
                                                                        if (@$deliveryset->byappoint_time == '10:45 PM') {
                                                                            echo 'selected == "selected"';
                                                                        }
                                                                    } ?> value="10:45 PM">10:45 PM
                                                                    </option>
                                                                    <option <?php if (!empty(@$deliveryset)) {
                                                                        if (@$deliveryset->byappoint_time == '11:00 PM') {
                                                                            echo 'selected == "selected"';
                                                                        }
                                                                    } ?> value="11:00 PM">11:00 PM
                                                                    </option>
                                                                    <option <?php if (!empty(@$deliveryset)) {
                                                                        if (@$deliveryset->byappoint_time == '11:15 PM') {
                                                                            echo 'selected == "selected"';
                                                                        }
                                                                    } ?> value="11:15 PM">11:15 PM
                                                                    </option>
                                                                    <option <?php if (!empty(@$deliveryset)) {
                                                                        if (@$deliveryset->byappoint_time == '11:30 PM') {
                                                                            echo 'selected == "selected"';
                                                                        }
                                                                    } ?> value="11:30 PM">11:30 PM
                                                                    </option>
                                                                    <option <?php if (!empty(@$deliveryset)) {
                                                                        if (@$deliveryset->byappoint_time == '11:45 PM') {
                                                                            echo 'selected == "selected"';
                                                                        }
                                                                    } ?> value="11:45 PM">11:45 PM
                                                                    </option>
                                                                </select>
                                                            </div>
                                                        </div>
                                                        <input type="hidden" id="proid" name="proid"
                                                               value="<?= $pid ?>">
                                                        <input type="hidden" id="vid" name="vid" value="<?= $vid ?>">
                                                        <?php if (!empty($usrmakey)) { ?>
                                                            <input type="hidden" id="userid" name="userid"
                                                                   value="<?= $usrmakey; ?>">
                                                        <?php } else { ?>
                                                            <input type="hidden" id="userid" name="userid" value="0">
                                                        <?php } ?>
                                                        <input type="hidden" id="dilivery_typeby" name="dilivery_typeby"
                                                               value="byappoint">
                                                        <input type="button" class="subbyappoint" value="appoint"
                                                               style="background-color:f75d00 !important;color:white;">
                                                        <!--<input type="submit" id="subbyappoint"> -->
                                                    </form>
                                                </div>

























{{-- part-14 --}}

                                                <script>
                                                    $(".subbyappoint").click(function () {
                                                        var byappointdate = $('#datepicker1').val();
                                                        var byappointloc = $('#locationadd').val();
                                                        var byappointime = $('#byapointtime').val();
                                                        var proid = $('#proid').val();
                                                        var vid = $('#vid').val();
                                                        var userid = $('#userid').val();
                                                        //var dilivery_typeby = $('#dilivery_typeby').val();
                                                        var dilivery_typeby = 'byappoint';
                                                        if (byappointdate == '') {
                                                            alert("Please Select Date!!..");
                                                        } else if (byappointime == '') {
                                                            alert("Please Select Time!!..");

                                                        } else {
                                                            $("#flashbyappoint").show();
                                                            $("#flashbyappoint").fadeIn(400).html('<span class="loadbyappoint">Loading..</span>');
                                                            $.ajax({
                                                                type: "POST",
                                                                url: "{{url('/category_filter/action.php')}}",
                                                                data: {
                                                                    byappointloc: byappointloc,
                                                                    byappointdate: byappointdate,
                                                                    byappointime: byappointime,
                                                                    proid: proid,
                                                                    vid: vid,
                                                                    userid: userid,
                                                                    byappoint_type: dilivery_typeby
                                                                },
                                                                cache: true,
                                                                success: function (html) {
                                                                    //alertt(data);
                                                                    $("#showbyappoint").after(html);
                                                                    $("#flashbyappoint").hide();
                                                                }
                                                            });
                                                        }
                                                        return false;
                                                    });
                                                </script>
                                                <script>
                                                    $(document).ready(
                                                        function () {
                                                            // $.noConflict();
                                                            $("#datepicker1").datepicker({
                                                                dateFormat: 'yy/mm/dd',
                                                                changeMonth: true,//this option for allowing user to select month
                                                                changeYear: true //this option for allowing user to select from year range
                                                            });


                                                        });


                                                    //function gotoNode(namessss){
                                                    //  $.noConflict();

                                                    //  alert(namessss);
                                                    //}

                                                </script>
                                            <?php } ?>

                                            <!-- delivery code start-->
                                        </div>













{{-- part-15 --}}
                                        <?php if (!empty($resdelivery->shipping)) {

                                            $shipprice = $admin_model_obj->get_shipp_price($pid);

                                            if (!empty($shipprice)) {

                                                ?>
                                                <div style="background: #555555;color: #fff;font-size: 12px;font-family: sans-serif;">
                                                    <label style="margin-left: 10px;">Shipping Price:
                                                        $<?php echo $shipprice->shipp_price; ?></label>
                                                </div>
                                            <?php }

                                            $shiptype = $admin_model_obj->get_shipp_type($pid);

                                            if (!empty($shiptype)) {

                                                if ($shiptype->type_of_shipfee == 'free') { ?>
                                                    <div style="background: #555555;color: #fff;font-size: 12px;font-family: sans-serif;">
                                                        <label style="margin-left: 10px;">Shipping Type: FREE</label>
                                                    </div>
                                                <?php }
                                            }
                                        } ?>

                                        <!-- end code for deliver -->
                                        <?php if (!empty($checkalldates)) { ?>
                                            <style type="text/css">
                                                .table-hover > tbody > tr:hover {
                                                    background-color: #f75d00;
                                                    cursor: pointer;
                                                    color: #fff;
                                                }

                                                /*.nowrapdt{
                                                white-space: nowrap;
                                                } */

                                            </style>
                                            <div style="max-height: 265px;overflow-y: auto;margin-bottom: 15px;">

                                                <div style="margin-top: 15px;">
                                                    <button type="button" style="width: auto;height: auto;"
                                                            class="btn btn-default" data-toggle="modal"
                                                            data-target="#dtpricemodel">SEE MORE DEALS
                                                    </button>
                                                </div>

                                                <div id="dtpricemodel" class="modal fade" role="dialog">
                                                    <div class="modal-dialog">
                                                        <!-- Modal content-->

                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <button type="button" class="close"
                                                                        data-dismiss="modal">&times;
                                                                </button>
                                                                <h4 class="modal-title">Date Wise Pricing</h4>
                                                            </div>
                                                            <div class="modal-body">
                                                                <div class="tbl-responsive">
                                                                    <table class='table table-hover'>
                                                                        <thead>
                                                                        <tr>
                                                                            <th style="text-align: left;">Descreption
                                                                            </th>
                                                                            <th class="nowrapdt">Date</th>
                                                                            <th class="nowrapdt">Time</th>
                                                                            <th class="nowrapdt">Price</th>
                                                                            <th class="nowrapdt">Buy & Earn</th>
                                                                            <th class="nowrapdt">Reward Value</th>
                                                                            <th class="nowrapdt">You Earn</th>
                                                                        </tr>
                                                                        </thead>
                                                                        <tbody>
                                                                        <?php
                                                                        $i = 1;

                                                                        foreach ($checkalldates as $alldatekeys) {

                                                                            $myrpoductName = str_replace("'", "", $alldatekeys->dtp_detail);

                                                                            $myrpoductName = preg_replace("/\r|\n/", "", $myrpoductName);
                                                                            ?>


                                                                            <tr <?php if (!empty($slectedPrice) && $slectedPrice == $alldatekeys->id) { ?> style="background-color: #f75d00;color: #fff;" <?php } ?>
                                                                                    class="datechecknew"
                                                                                    onclick="myFunctionnew('<?php echo $alldatekeys->price; ?>', '<?php echo $alldatekeys->no_of_amples; ?>', '<?php echo $alldatekeys->free_with_amples; ?>', '<?php echo $alldatekeys->discount_price; ?>', '<?php echo $alldatekeys->discount_amp; ?>','<?php echo $alldatekeys->id; ?>','<?php echo $alldatekeys->show_date; ?>','<?php echo $alldatekeys->show_time; ?>','<?php echo $myrpoductName; ?>')">
                                                                                <td class="nowrapdt"
                                                                                    style="text-align: left;"><?php echo $alldatekeys->dtp_detail; ?></td>
                                                                                <td style="text-align: center;"
                                                                                    class="nowrapdt"><?php if (!empty($alldatekeys->month)) {
                                                                                        echo ($alldatekeys->month) . "/" . ($alldatekeys->adate) . "/" . ($alldatekeys->year);
                                                                                    } else {
                                                                                        echo "-";
                                                                                    } ?></td>
                                                                                <td style="text-align: center;"
                                                                                    class="nowrapdt"><?php if (!empty($alldatekeys->show_time)) {
                                                                                        echo($alldatekeys->show_time);
                                                                                    } else {
                                                                                        echo "-";
                                                                                    } ?></td>
                                                                                <td class='cloneprice nowrapdt'
                                                                                    style="text-align: center;"><?php if ($alldatekeys->price != '') {
                                                                                        echo $currencySymbol . number_format($alldatekeys->price, 2, ".", ",");
                                                                                    } else {
                                                                                        echo "-";
                                                                                    } ?></td>
                                                                                <td class='cloneprice nowrapdt'
                                                                                    style="text-align: center;"><?php if ($alldatekeys->no_of_amples != '') {
                                                                                        echo number_format($alldatekeys->no_of_amples, 2, ".", ",") . " Amples";
                                                                                    } else {
                                                                                        echo "-";
                                                                                    } ?></td>
                                                                                <td class='cloneprice nowrapdt'
                                                                                    style="text-align: center;"><?php if ($alldatekeys->discount_price != '') {
                                                                                        echo $currencySymbol . number_format($alldatekeys->discount_price, 2, ".", ",");
                                                                                    } else {
                                                                                        echo "-";
                                                                                    } ?></td>

                                                                                <td class='cloneprice nowrapdt'
                                                                                    style="text-align: center;"><?php if ($alldatekeys->discount_amp != '') {
                                                                                        echo number_format($alldatekeys->discount_amp, 2, ".", ",") . "%";
                                                                                    } else {
                                                                                        echo "-";
                                                                                    } ?></td>
                                                                            </tr>
                                                                            <?php

                                                                            $i++;

                                                                        }

                                                                        ?>

                                                                        </tbody>
                                                                    </table>

                                                                </div>
                                                            </div>
                                                            <div class="modal-footer">
                                                                <button type="button" style="width: auto;height: auto;"
                                                                        class="btn btn-default" data-dismiss="modal">
                                                                    Close
                                                                </button>
                                                            </div>
                                                        </div>

                                                    </div>
                                                </div>
                                            </div>

                                        <?php } ?>


                                        <style>
                                            .form-action {
                                                padding: 5px !important;
                                            }

                                            .social-share {
                                                width: 103%;
                                            }

                                            .form-action-a {
                                                position: absolute;
                                                text-align: left;
                                                top: -10px;
                                                left: -7px;
                                                z-index: 999999;
                                                right: -11px;
                                                bottom: -27px;
                                            }

                                            .social-share {
                                                position: relative;
                                            }
                                        </style>
























{{-- part-16 --}}
                                        <?php

                                        $OGDesc = '';

                                        if ($this->data[0]['pdiscount'] >= 50) {

                                            $OGDesc .= "GET IT FREE WITH :" . $admin_model_obj->DisplayAmplePoints($this->data[0]['pfwamples']) . " Amples ";
                                        }
                                        $OGDesc .= "Price:$" . $this->data[0]['single_price'] . " ";
                                        $OGDesc .= "Buy & Earn:" . $admin_model_obj->DisplayAmplePoints($this->data[0]['pamples']) . " Amples ";
                                        $OGDesc .= "Reward Value: $" . $this->data[0]['pdiscountprice'] . " ";
                                        $OGDesc .= "You Earn:" . $this->data[0]['pdiscount'] . "% ";
                                        $OGDesc .= "Product By:" . $this->data[0]['pvendor'] . " ";

                                        ?>

                                        <div class="form-action">
                                            <div class="social-share">

                                                <!--<script type="text/javascript" src="//s7.addthis.com/js/300/addthis_widget.js#pubid=ra-56dfcbecf5edb89a"></script>-->
                                                <!--<div class="addthis_native_toolbox"></div>-->
                                                <!-- Go to www.addthis.com/dashboard to customize your tools -->
                                                <script type="text/javascript"
                                                        src="https://platform-api.sharethis.com/js/sharethis.js#property=6481adb08bdd800012e15f44&product=inline-share-buttons&source=platform"
                                                        async="async"></script>
                                                <!-- Go to www.addthis.com/dashboard to customize your tools -->
                                                <div class="sharethis-inline-share-buttons"
                                                     data-url="<?php echo 'https://amplepoints.com/productdetail/' . $this->main_product_id ?>"
                                                     data-title="<?php echo strip_tags($this->data[0]['product_name']); ?>"
                                                     data-image="<?php echo $this->ogImage; ?>"
                                                     data-description="<?php echo $OGDesc; ?>"></div>
                                            </div>
                                            <h3 class="h3a"
                                                style="font-size: 14px !important;color: #111111 !important;font-weight: bold;line-height: 1.5;">
                                                Earn 1 Ample Point every time you share your favorite finds!</h3>
                                            <script type="text/javascript">

                                                $("body").on("click", ".st-btn", function (event) {

                                                    var UserId = "<?php echo $this->UserId; ?>";

                                                    if (UserId != '') {

                                                        $.ajax({
                                                            url: '<?php echo $this->baseUrl(); ?>/index/addampletouser',
                                                            data: {userId: UserId},
                                                            type: 'POST',
                                                            dataType: "json"
                                                        })
                                                            .done(function (data) {

                                                                if (data) {

                                                                    if (data['error'] == 'no') {

                                                                        if (data['ReplaceAmple'] != '') {

                                                                            //$('#amplcount').text(data['ReplaceAmple']);

                                                                            $('.Replace_Amples').text(data['ReplaceAmple']);

                                                                            $('.celebration').css('display', 'block');
                                                                        }

                                                                        if (data['ReplaceReward'] != '') {

                                                                            //$('.extra-des').html(data['ReplaceReward'] + "<span>Reward Time</span>");

                                                                            $('.extra-des').text(data['ReplaceReward']);
                                                                        }

                                                                    } else {

                                                                        alert("Please Increase Your Reward Time");
                                                                    }

                                                                }


                                                            });

                                                    } else {

                                                        //do nothing
                                                    }
                                                });


                                            </script>

                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- tab product -->
                            <style type="text/css">
                                .product-tab p img {
                                    max-width: 100%;
                                }

                                .product-tab .nav-tabs {
                                    width: 100%;
                                    overflow: hidden;
                                    z-index: 1;
                                    position: relative;
                                    height: auto;
                                    border-bottom: none;
                                    box-shadow: none;
                                }

                                .product-tab .nav-tabs > li {
                                    margin-top: 5px !important;
                                }

                                .product-tab .nav-tabs > li {
                                    height: 50px;
                                    line-height: 50px;
                                    float: left;
                                    display: inline;
                                    /*background: #e2e2e2;
                                    border: 1px solid #e2e2e2;
                                    color: #333; */
                                    background: #FF4500;
                                    border: 1px solid #FF4500;
                                    color: #fff;
                                    text-align: center;
                                    margin-right: 2px;
                                    font-weight: 700;
                                }

                                .product-tab .nav-tabs > li > a {
                                    /*color: #333;*/
                                    color: #fff;
                                    /*padding: 0 19.55px;*/
                                    height: 50px;
                                    float: left;
                                    text-transform: uppercase;
                                    margin-right: 0px;
                                }

                                .product-tab .nav-tabs > li.active > a, .product-tab .nav-tabs > li:hover > a {
                                    /*background: #fff;*/
                                    background: #f75d00;
                                    color: #fff;
                                }

                                .product-tab .tab-content {
                                    padding: 20px;
                                    border: 1px solid #e2e2e2;
                                    margin-top: -1px;
                                    z-index: 1;
                                    position: relative;
                                }

                                .product-tab .tab-content .tab-pane {
                                    line-height: 24px;
                                    top: 0;
                                    left: 0;
                                    width: 100%;
                                }

                            </style>
                            <?php

                            $tabsDetails = $admin_model_obj->GetVendorTabsDetail($this->data[0]['vendor_key']);

                            ?>
                            <div class="product-tab">

                                <!-- Nav tabs -->
                                <ul class="nav nav-tabs" role="tablist">
                                    <li role="presentation" class="active"><a href="#detail_tab"
                                                                              aria-controls="detail_tab" role="tab"
                                                                              data-toggle="tab">Product Details</a></li>
                                    <li role="presentation"><a href="#review_rating_tab"
                                                               aria-controls="review_rating_tab" role="tab"
                                                               data-toggle="tab">Reviews & Rating</a></li>
                                    <?php if ($this->vendordatabyproduct[0]['display_hours'] == 1) { ?>
                                        <li role="presentation"><a href="#working_hours_tab"
                                                                   aria-controls="working_hours_tab" role="tab"
                                                                   data-toggle="tab">Working Hours</a></li>
                                    <?php } ?>
                                    <?php
                                    if (!empty($tabsDetails)) {

                                        foreach ($tabsDetails as $key => $tbdata) {

                                            ?>
                                            <li role="presentation"><a
                                                        href="#<?php echo 'display_tab_' . $tbdata['tab_id']; ?>"
                                                        aria-controls="<?php echo 'display_tab_' . $tbdata['tab_id']; ?>"
                                                        role="tab"
                                                        data-toggle="tab"><?php echo $tbdata['tab_name']; ?></a></li>
                                            <?php

                                        }

                                    }
                                    ?>

                                    <?php if (!empty($GiftcardDetail)) { ?>

                                        <li role="presentation"><a href="#giftcard_tab" aria-controls="giftcard_tab"
                                                                   role="tab" data-toggle="tab">Gift Card Details</a>
                                        </li>

                                        <?php if ($GiftcardDetail['redeemed_for'] == 1) { ?>
                                            <li role="presentation"><a
                                                        href="<?php echo $this->baseUrl('product_images/' . $this->escape($this->main_product_id) . '/' . $this->escape($GiftcardDetail['price_sheet'])); ?>"
                                                        role="tab">Special Price</a></li>
                                        <?php } ?>

                                    <?php } ?>

                                </ul>

                                <!-- Tab panes -->
                                <div class="tab-content">
                                    <div role="tabpanel" class="tab-pane active" id="detail_tab">
                                        <?php if (!empty($this->data[0]['productdetail_image'])) { ?>
                                            <img src="<?php echo $admin_model_obj->cdnUrl('product_images/' . $this->escape($this->main_product_id) . '/' . $this->escape($this->data[0]['productdetail_image'])); ?>"
                                                 style="width: 100%;" class="img-responsive" alt="">
                                        <?php } ?>
                                        <?php

                                        $allDetailImg = $admin_model_obj->Getprodetailimg($this->main_product_id);

                                        if (!empty($allDetailImg)) {
                                            foreach ($allDetailImg as $imgdata) { ?>
                                                <img src="<?php echo $admin_model_obj->cdnUrl('product_images/' . $this->escape($this->main_product_id) . '/' . $this->escape($imgdata['image_name'])); ?>"
                                                     style="width: 100%;" class="img-responsive" alt="">
                                            <?php }
                                        } ?>
                                        <p><?php echo htmlspecialchars_decode($this->data[0]['long_desc']); ?></p>
                                    </div>
                                    <div role="tabpanel" class="tab-pane" id="review_rating_tab">
                                        <div class="container product-comments-block-tab">
                                            <div class="row">
                                                <div class="col-sm-5">
                                                    <div class="rating-block rating-div-select">
                                                        <h4>Average Customer Rating</h4>
                                                        <h2 class="bold padding-bottom-7"><?php echo $this->pdctavgratingbyusr; ?>
                                                            <small>/ 5</small>
                                                        </h2>
                                                        <?php
                                                        $pdtotalavgrating = $this->pdctavgratingbyusr;
                                                        for ($i = 1; $i <= 5; $i++) {
                                                            $selected = "";
                                                            if (!empty($pdtotalavgrating) && $i <= $pdtotalavgrating) {
                                                                $selected = "btn btn-warning btn-xs";
                                                            } else {
                                                                $selected = "btn btn-default btn-grey btn-xs";
                                                            }
                                                            ?>
                                                            <button type="button" class="<?php echo $selected; ?>"
                                                                    aria-label="Left Align"><span
                                                                        class="glyphicon glyphicon-star"
                                                                        aria-hidden="true"></span></button>
                                                            <?php
                                                        }
                                                        ?>
                                                    </div>
                                                    <div>
                                                        <span class="user-users glyphicon glyphicon-user"></span><?php echo count($this->pratingcommentsdata); ?>
                                                        total
                                                    </div>
                                                    <p><a class="btn-comment"
                                                          style="margin-top:15px; padding:5px 15px; text-align:center; width:66%; font-family:sans-serif; color:orangered;" <?php if ($this->usrmakey) { ?> href="#" id="open-review-box" <?php } else { ?>  id="modal_trigger" href="#modal" <?php } ?>>Write
                                                            your review !</a></p>
                                                </div>
                                                <div class="col-sm-7 sdassasa">
                                                    <h4 class="rating-breakdown">Rating breakdown</h4>
                                                    <div class="pull-left rating-div-select">
                                                        <div class="pull-left" style="width:35px; line-height:1;">
                                                            <div style="height:9px; margin:5px 0;">5 <span
                                                                        class="glyphicon glyphicon-star"></span></div>
                                                        </div>
                                                        <div class="pull-left" style="width:180px;">
                                                            <div class="progress" style="height:9px; margin:8px 0;">
                                                                <div class="progress-bar progress-bar-success"
                                                                     role="progressbar" aria-valuenow="5"
                                                                     aria-valuemin="0" aria-valuemax="5"
                                                                     style="width: <?php echo $this->pdctfivestarrating; ?>%">
                                                                    <span class="sr-only"><?php echo $this->pdctfivestarrating; ?>%</span>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="pull-right"
                                                             style="margin-left:10px;"><?php echo $this->pdctfivestarusers; ?></div>
                                                    </div>
                                                    <div class="pull-left rating-div-select">
                                                        <div class="pull-left" style="width:35px; line-height:1;">
                                                            <div style="height:9px; margin:5px 0;">4 <span
                                                                        class="glyphicon glyphicon-star"></span></div>
                                                        </div>
                                                        <div class="pull-left" style="width:180px;">
                                                            <div class="progress" style="height:9px; margin:8px 0;">
                                                                <div class="progress-bar progress-bar-primary"
                                                                     role="progressbar" aria-valuenow="4"
                                                                     aria-valuemin="0" aria-valuemax="5"
                                                                     style="width: <?php echo $this->pdctfourstarrating; ?>%">
                                                                    <span class="sr-only"><?php echo $this->pdctfourstarrating; ?>%</span>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="pull-right"
                                                             style="margin-left:10px;"><?php echo $this->pdctfourstarusers; ?></div>
                                                    </div>
                                                    <div class="pull-left rating-div-select">
                                                        <div class="pull-left" style="width:35px; line-height:1;">
                                                            <div style="height:9px; margin:5px 0;">3 <span
                                                                        class="glyphicon glyphicon-star"></span></div>
                                                        </div>
                                                        <div class="pull-left" style="width:180px;">
                                                            <div class="progress" style="height:9px; margin:8px 0;">
                                                                <div class="progress-bar progress-bar-info"
                                                                     role="progressbar" aria-valuenow="3"
                                                                     aria-valuemin="0" aria-valuemax="5"
                                                                     style="width: <?php echo $this->pdctthreestarrating; ?>%">
                                                                    <span class="sr-only"><?php echo $this->pdctthreestarrating; ?>%</span>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="pull-right"
                                                             style="margin-left:10px;"><?php echo $this->pdctthreestarusers; ?></div>
                                                    </div>
                                                    <div class="pull-left rating-div-select">
                                                        <div class="pull-left" style="width:35px; line-height:1;">
                                                            <div style="height:9px; margin:5px 0;">2 <span
                                                                        class="glyphicon glyphicon-star"></span></div>
                                                        </div>
                                                        <div class="pull-left" style="width:180px;">
                                                            <div class="progress" style="height:9px; margin:8px 0;">
                                                                <div class="progress-bar progress-bar-warning"
                                                                     role="progressbar" aria-valuenow="2"
                                                                     aria-valuemin="0" aria-valuemax="5"
                                                                     style="width: <?php echo $this->pdcttwostarrating; ?>%">
                                                                    <span class="sr-only"><?php echo $this->pdcttwostarrating; ?>%</span>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="pull-right"
                                                             style="margin-left:10px;"><?php echo $this->pdcttwostarusers; ?></div>
                                                    </div>
                                                    <div class="pull-left rating-div-select">
                                                        <div class="pull-left" style="width:35px; line-height:1;">
                                                            <div style="height:9px; margin:5px 0;">1 <span
                                                                        class="glyphicon glyphicon-star"></span></div>
                                                        </div>
                                                        <div class="pull-left" style="width:180px;">
                                                            <div class="progress" style="height:9px; margin:8px 0;">
                                                                <div class="progress-bar progress-bar-danger"
                                                                     role="progressbar" aria-valuenow="1"
                                                                     aria-valuemin="0" aria-valuemax="5"
                                                                     style="width: <?php echo $this->pdctonestarrating; ?>%">
                                                                    <span class="sr-only"><?php echo $this->pdctonestarrating; ?>%</span>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="pull-right"
                                                             style="margin-left:10px;"><?php echo $this->pdctonestarusers; ?></div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row" id="post-review-box" style="display:none;">
                                                <div class="col-sm-12" style="margin-top:10px;">
                                                    <form accept-charset="UTF-8" action="" method="post">
                                                        <input id="ratings-hidden" name="rating" type="hidden">
                                                        <textarea class="form-control animated " cols="60"
                                                                  id="new-review" name="comment"
                                                                  placeholder="Enter your review here..."
                                                                  rows="5"></textarea>
                                                        <span class="new-review-error" style="display:none;"> Please enter your review. </span>
                                                        <div class="text-right">
                                                            <div id="stars" class="starrr"></div>
                                                            You gave a rating of <span id="count">0</span> star(s) <a
                                                                    class="btn btn-danger btn-sm cancel-btn" href="#"
                                                                    id="close-review-box"
                                                                    style="display:none; margin-right: 10px;"> <span
                                                                        class="glyphicon glyphicon-remove"></span>Cancel</a>
                                                            <button class="btn btn-success success-btn" type="button">
                                                                <span class="glyphicon glyphicon-ok"></span>Save
                                                            </button>
                                                        </div>
                                                    </form>
                                                </div>
                                            </div>
                                            <div class="row" id="success-review-msg" style="display:none;">
                                                <div class="col-sm-6" style="margin-top:10px; width:47%;"><span
                                                            class="success-review-msg"> Thank you for submitting your review & rating. </span>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-sm-12">
                                                    <hr/>
                                                    <div class="review-block rating-div-select">
                                                        <?php if ($this->pratingcommentsdata > 0) {
                                                            foreach ($this->pratingcommentsdata as $keyrcomments) { ?>
                                                                <div class="row">
                                                                    <div class="col-sm-3 text-center"><img
                                                                                src="<?php if (!empty($keyrcomments['profile_photo'])) {
                                                                                    echo $admin_model_obj->cdnUrl('user_images/' . $keyrcomments['cstkey'] . '/profile_image/' . $keyrcomments['profile_photo']);
                                                                                } else {
                                                                                    echo $admin_model_obj->cdnUrl('img/profile-img/avtar.jpg');
                                                                                } ?>" class="img-rounded"
                                                                                style="width:30%">
                                                                        <div class="review-block-name"><?php echo $keyrcomments['first_name'] . ' ' . $keyrcomments['last_name']; ?></div>
                                                                        <div class="review-block-date"><?php echo date('F d, Y', strtotime($keyrcomments['commentdated'])); ?>
                                                                            <br/>
                                                                            <?php
                                                                            $seconds = time() - strtotime($keyrcomments['commentdated']);
                                                                            $years = floor($seconds / 31104000);
                                                                            $seconds %= 31104000;
                                                                            $months = floor($seconds / 2592000);
                                                                            $seconds %= 2592000;
                                                                            $days = floor($seconds / 86400);
                                                                            $seconds %= 86400;
                                                                            $hours = floor($seconds / 3600);
                                                                            $seconds %= 3600;
                                                                            $minuts = floor($seconds / 60);
                                                                            $seconds %= 60;
                                                                            if ($years > 1) {
                                                                                echo $years . ' years ago';
                                                                            } else if ($months >= 1) {
                                                                                echo $months . ' months ago';
                                                                            } else if ($days >= 1) {
                                                                                echo $days . ' days ago';
                                                                            } else if ($hours >= 1) {
                                                                                echo $hours . ' hours ago';
                                                                            } else if ($minuts >= 1) {
                                                                                echo $minuts . ' minutes ago';
                                                                            } else if ($seconds >= 1) {
                                                                                echo $seconds . ' seconds ago';
                                                                            } else {
                                                                                echo 'Just now';
                                                                            } ?>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-sm-9">
                                                                        <div class="review-block-rate">
                                                                            <?php

                                                                            for ($i = 1; $i <= 5; $i++) {
                                                                                $selected = "";
                                                                                if (!empty($keyrcomments['user_rating']) && $i <= $keyrcomments['user_rating']) {
                                                                                    $selected = "btn btn-warning btn-xs";
                                                                                } else {
                                                                                    $selected = "btn btn-default btn-grey btn-xs";
                                                                                }
                                                                                ?>
                                                                                <button type="button"
                                                                                        class="<?php echo $selected; ?>"
                                                                                        aria-label="Left Align"><span
                                                                                            class="glyphicon glyphicon-star"
                                                                                            aria-hidden="true"></span>
                                                                                </button>
                                                                                <?php
                                                                            }
                                                                            ?>
                                                                        </div>
                                                                        <!--<div class="review-block-title"><?php //echo $keyrcomments['comment_title']; ?></div>-->
                                                                        <div class="review-block-description"><?php echo $keyrcomments['user_comments']; ?></div>
                                                                    </div>
                                                                </div>
                                                                <hr/>
                                                            <?php }
                                                        } ?>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <?php if ($this->vendordatabyproduct[0]['display_hours'] == 1) { ?>
                                        <div role="tabpanel" class="tab-pane" id="working_hours_tab">
                                            <?php
                                            $dayArray = array('Mon' => 'Monday', 'Tue' => 'Tuesday', 'Wed' => 'Wednsday', 'Thu' => 'Thursday', 'Fri' => 'Friday', 'Sat' => 'Saturday', 'Sun' => 'Sunday');
                                            $VdrHours = $admin_model_obj->get_vendor_hours($this->vendordatabyproduct[0]['vendor_id']);

                                            if (!empty($VdrHours)) { ?>
                                                <table class="table table-striped table-bordered" id="hourstable">
                                                    <tr>
                                                        <th>Day</th>
                                                        <th>Open / Close</th>
                                                        <th>Start Time</th>
                                                        <th>End Time</th>
                                                    </tr>
                                                    <?php
                                                    foreach ($VdrHours as $hrdata) {

                                                        ?>
                                                        <tr>
                                                            <td style="text-align: center"><?php echo $dayArray[$hrdata['day']]; ?></td>
                                                            <td style="text-align: center"><?php echo $hrdata['open_close']; ?></td>
                                                            <?php if ($hrdata['open_close'] == 'open') { ?>
                                                                <td style="text-align: center"><?php echo $hrdata['start_time']; ?></td>
                                                                <td style="text-align: center"><?php echo $hrdata['end_time']; ?></td>
                                                            <?php } else { ?>
                                                                <td style="text-align: center">-</td>
                                                                <td style="text-align: center">-</td>
                                                            <?php } ?>
                                                        </tr>
                                                    <?php } ?>
                                                </table>
                                            <?php } ?>
                                        </div>
                                    <?php } ?>
                                    <?php
                                    if (!empty($tabsDetails)) {

                                        foreach ($tabsDetails as $key => $tbdata) {

                                            ?>
                                            <div role="tabpanel" class="tab-pane"
                                                 id="<?php echo 'display_tab_' . $tbdata['tab_id']; ?>"><?php echo $tbdata['tab_content']; ?></div>
                                            <?php

                                        }

                                    }
                                    ?>

                                    <?php if (!empty($GiftcardDetail)) { ?>

                                        <style type="text/css">
                                            .gfhead {

                                                font-weight: bold;
                                            }

                                            .gfcontent {

                                                font-weight: bold;
                                                margin: 10px 0px 0px 0px;
                                            }

                                            .gfcol li {
                                                list-style: inherit;
                                                font-size: 16px;
                                                font-weight: bold;
                                                margin: 10px 0px 0px 10px;
                                            }
                                        </style>

                                        <div role="tabpanel" class="tab-pane" id="giftcard_tab">


                                            <ol class="gfcol">
                                                <li>Gift Cards without AmplePoints, customers
                                                    get <?php echo $GiftcardDetail['per_without_ample']; ?>% discount
                                                </li>
                                                <li>Gift Cards with AmplePoints customers
                                                    get <?php echo $GiftcardDetail['per_with_ample']; ?>% in AmplePoints
                                                </li>
                                                <li>

                                                    Customers can use Gift
                                                    Cards <?php if ($GiftcardDetail['no_hours'] == 0) {
                                                        echo "during these hours only";
                                                    } else {
                                                        echo "all the time";
                                                    } ?>

                                                    <?php if ($GiftcardDetail['no_hours'] == 0) {

                                                        if (!empty($GiftcardDetail['hours_of_use'])) {

                                                            $hourlist = json_decode($GiftcardDetail['hours_of_use'], true);

                                                        } else {

                                                            $hourlist = array();
                                                        }

                                                        if (!empty($hourlist)) {

                                                            ?>

                                                            <table class="table table-striped table-bordered"
                                                                   style="margin-top: 10px;">
                                                                <thead>
                                                                <th>Day</th>
                                                                <th>From Time</th>
                                                                <th>TO Time</th>
                                                                </thead>
                                                                <tbody>
                                                                <?php foreach ($hourlist as $hrdtl) { ?>

                                                                    <tr style="text-align: center;font-weight: normal;">
                                                                        <td><?php echo $hrdtl['hr_day']; ?></td>
                                                                        <td><?php echo $hrdtl['start_time']; ?></td>
                                                                        <td><?php echo $hrdtl['end_time']; ?></td>

                                                                    </tr>

                                                                <?php } ?>

                                                                </tbody>
                                                            </table>

                                                        <?php } else { ?>

                                                            <p>NO Time Define </p>

                                                        <?php }

                                                    } ?>

                                                </li>
                                                <?php

                                                if ($GiftcardDetail['redeemed_for'] == 1) {

                                                    $priceItem = 'Special priced items';

                                                } else {

                                                    $priceItem = 'Regular priced items';
                                                }

                                                ?>
                                                <li>This Gift Card can be used only for <?php echo $priceItem; ?></li>
                                                <li>Gift Card can be redeemed
                                                    on <?php echo $GiftcardDetail['per_of_bill']; ?>% of total bill
                                                </li>
                                                <li><?php if ($GiftcardDetail['combine_with'] == 0) {
                                                        echo 'Cannot';
                                                    } else {
                                                        echo 'Can';
                                                    } ?> be combined with any other offers
                                                </li>
                                                <?php if ($GiftcardDetail['ask_which_product'] == 1) { ?>
                                                    <li>Ask which products and services can be redeemed with 100%
                                                        AmplePoints.
                                                    </li>
                                                <?php } ?>
                                                <?php if ($GiftcardDetail['inform_advance'] == 1) { ?>
                                                    <li>Let the business know in advance if you will be using a Gift
                                                        Card
                                                    </li>
                                                <?php } ?>
                                                <?php if ($GiftcardDetail['is_appointment'] == 1) { ?>
                                                    <li>Call for appointment</li>
                                                <?php } ?> <?php if ($GiftcardDetail['no_cash_back'] == 1) { ?>
                                                    <li>No cash back. Must use entire amount in one transaction</li>
                                                <?php } ?>
                                                <li>Only <?php echo $GiftcardDetail['no_of_time']; ?> Gift Card per
                                                    visit
                                                </li>
                                                <?php if ($GiftcardDetail['final_sale'] == 1) { ?>
                                                    <li>Final Sale</li>
                                                <?php } ?>
                                                <?php if (!empty($GiftcardDetail['detail_note'])) { ?>
                                                    <li>
                                                        <p>Detail Note :</p>
                                                        <p style="margin-top: 10px;font-weight: normal;"><?php echo $GiftcardDetail['detail_note']; ?></p>
                                                    </li>
                                                <?php } ?>
                                            </ol>


                                        </div>

                                    <?php } ?>

                                </div>
                            </div>

                            <!-- ./tab product -->
                            <!-- box product -->
                            <?php

                            //echo "<pre>";print_r($this->relatedproductIdsdata);

                            if (!empty($this->relatedproductIdsdata)) { ?>
                                <div class="row">
                                    <div class="page-product-box nv_r  col-md-12 col-sm-12 col-xs-12">
                                        <h3 class="heading">Related Products</h3>
                                        <ul class="nv_relate product-list owl-carousel owl-theme owl-loaded"
                                            data-dots="false" data-loop="true" data-nav="true" data-margin="18"
                                            data-autoplaytimeout="1000" data-autoplayhoverpause="true">
                                            <?php

                                            if ($this->relatedproductIdsdata > 0) {
                                                foreach ($this->relatedproductIdsdata as $relatedproductkay) {
                                                    $relatedproducts = $admin_model_obj->featureproductonsale('feature', $relatedproductkay['relp_pid']);

                                                    if ($relatedproducts > 0) {
                                                        foreach ($relatedproducts as $key) { ?>
                                                            <li class="product-container">
                                                                <div class="right-block">
                                                                    <h5 class="Butter_aria"><?php echo strip_tags(ucwords(strtolower(substr($key['pname'], 0, 20)))); ?></h5>
                                                                    <?php if ($key['pdiscount'] >= 50) {
                                                                        echo "<div class='content_price3 smallprod'>
                                                                            <h5> Free&nbsp;</h5>
                                                                            <span>with&nbsp;</span>
                                                                            <h6>" . $this->escape($admin_model_obj->DisplayAmplePoints($key['pfwamples'])) . "</h6> 
                                                                            <span1> Amples</span1>
                                                                            <div class='amp-logo'></div> 
                                                                            </div>";
                                                                    } else {
                                                                        echo "<div class='price2'>
                                                                            <a class='same' href='#'>$this->currencySymbol" . $this->escape($key['pprice']) . "</a>
                                                                            </div>";
                                                                    } ?>
                                                                </div>
                                                                <div class="left-block">
                                                                    <a href="<?php echo $this->baseUrl('/productdetail/') . $this->escape($key['pid']); ?>">
                                                                        <img class="img-responsive" alt="product"
                                                                             src="<?php echo $admin_model_obj->cdnUrl('product_images/' . $this->escape($key['pid']) . '/' . $this->escape($key["pimage"])); ?>"/></a>
                                                                    <div class="price_main">
                                                                        <div class="price">
                                                                            <div class="price2"><a class="same"
                                                                                                   href="#"><?php echo $this->currencySymbol; ?><?php echo $this->escape($key['pprice']); ?></a>
                                                                            </div>
                                                                            <div class="content_price4">Buy & Earn
                                                                                <span> <?php echo $this->escape($admin_model_obj->DisplayAmplePoints($key['pamples'])); ?> </span>
                                                                                <span>Amples </span></div>
                                                                            <div class="price7"> Reward
                                                                                value&nbsp;<span><?php echo $this->currencySymbol; ?><?php echo $this->escape($key['pdiscountprice']); ?></span>
                                                                                <br>
                                                                            </div>
                                                                            <div class="save5">You Earn&nbsp;
                                                                                <span><?php echo (int)$this->escape($key['pdiscount']); ?>%</span>
                                                                            </div>
                                                                            <?php $MyVendorName = strtolower(preg_replace('/\s+/', '', $key['pvendor'])); ?>
                                                                            <div class="by_aria">
                                                                                <h6>By:&nbsp;</h6>
                                                                                <a href="<?php echo $this->baseUrl('/productbyseller/' . $MyVendorName . '/' . $this->escape($key['vendor_key'])); ?>"><?php echo $this->escape($key['pvendor']); ?></a>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="quick-view"><a
                                                                                title="Add to my wishlist"
                                                                                class="heart" <?php if (!empty($this->usrmakey)) { ?> href="javascript:void(0);" onclick="wishlist_cart('<?php echo $this->escape($key['pname']); ?>','<?php echo $this->escape($key['pid']); ?>','1','<?php echo $this->escape($key['pprice']); ?>','<?php echo $this->usrmakey; ?>','add');"    <?php } else { ?>  id="modal_trigger" href="#modal" <?php } ?>></a>
                                                                        <!-- <a title="Quick view" class="search" href="#"></a>-->
                                                                    </div>
                                                                    <div class="add-to-cart">
                                                                        <?php if ($key['product_type_key'] == '0') { ?>
                                                                            <?php /*

                                                                            <a title="Add to Cart" <?php if($key['pdiscount'] >= 50){ ?> href="<?php echo $this->baseUrl('/productdetail/').$this->escape($key['pid']);?>" <?php } else { ?> href="javascript:void(0);" onclick="vpb_add_to_cart('<?php echo $this->escape($key['pname']); ?>','<?php echo $this->escape($key['pid']); ?>','1','<?php echo $this->escape($key['pprice']); ?>','<?php echo $this->escape($key['pamples']); ?>','<?php if(!empty($this->record['data'][0]['total_ample'])) { echo $this->record['data'][0]['total_ample']+1; } else { echo "0.00"; } ?>','<?php echo $this->usrmakey; ?>','<?php echo $this->escape($key['vendor_key']); ?>','add');" <?php } ?>>Add to Cart</a> */ ?>
                                                                            <a title="Add to Cart"
                                                                               href="<?php echo $this->baseUrl('/productdetail/') . $this->escape($key['pid']); ?>">Add
                                                                                to Cart</a>
                                                                        <?php } else { ?>
                                                                            <a title="Add to Cart"
                                                                               href="<?php echo $this->baseUrl('/productdetail/') . $this->escape($key['pid']); ?>">
                                                                                Contact Me</a>
                                                                        <?php } ?>
                                                                    </div>
                                                                </div>
                                                            </li>
                                                        <?php }
                                                    }
                                                }
                                            }
                                            ?>
                                        </ul>
                                    </div>
                                </div>
                            <?php } ?>
                            <!-- ./box product -->
                            <!-- box product -->
                            <?php if (!empty($this->mightlikeproductIdsdata)) { ?>
                                <div class="row">
                                    <div class="page-product-box nv-like col-md-12 col-sm-12 col-xs-12">
                                        <h3 class="heading">You might also like</h3>
                                        <ul class="product-list owl-carousel owl-theme owl-loaded" data-dots="false"
                                            data-loop="true" data-nav="true" data-margin="30"
                                            data-autoplaytimeout="1000" data-autoplayhoverpause="true">
                                            <?php
                                            if ($this->mightlikeproductIdsdata > 0) {
                                                foreach ($this->mightlikeproductIdsdata as $mightlikeproductkay) {
                                                    $mightlikeproducts = $admin_model_obj->featureproductonsale('feature', $mightlikeproductkay['mal_pid']);

                                                    if ($mightlikeproducts) {
                                                        foreach ($mightlikeproducts as $key) { ?>
                                                            <li class="product-container">
                                                                <div class="right-block">
                                                                    <h5 class="Butter_aria"><?php echo strip_tags(ucwords(strtolower(substr($key['pname'], 0, 20)))); ?></h5>
                                                                    <?php if ($key['pdiscount'] >= 50) {
                                                                        echo "<div class='content_price3 smallprod'>
                                                                            <h5> Free&nbsp;</h5>
                                                                            <span>with&nbsp;</span>
                                                                            <h6>" . $this->escape($admin_model_obj->DisplayAmplePoints($key['pfwamples'])) . "</h6> 
                                                                            <span1> Amples</span1>
                                                                            <div class='amp-logo'></div> 
                                                                            </div>";
                                                                    } else {
                                                                        echo "<div class='price2'>
                                                                            <a class='same' href='#'>$this->currencySymbol" . $this->escape($key['pprice']) . "</a>
                                                                            </div>";
                                                                    } ?>
                                                                </div>
                                                                <div class="left-block"><a
                                                                            href="<?php echo $this->baseUrl('/productdetail/') . $this->escape($key['pid']); ?>">
                                                                        <img class="img-responsive" alt="product"
                                                                             src="<?php echo $admin_model_obj->cdnUrl('product_images/' . $this->escape($key['pid']) . '/' . $this->escape($key["pimage"])); ?>"/></a>
                                                                    <div class="price_main">
                                                                        <div class="price">
                                                                            <div class="price2"><a class="same"
                                                                                                   href="#"><?php echo $this->currencySymbol; ?><?php echo $this->escape($key['pprice']); ?></a>
                                                                            </div>
                                                                            <div class="content_price4">Buy & Earn
                                                                                <span> <?php echo $this->escape($admin_model_obj->DisplayAmplePoints($key['pamples'])); ?> </span>
                                                                                <span>Amples </span></div>
                                                                            <div class="price7"> Reward
                                                                                value&nbsp;<span><?php echo $this->currencySymbol; ?><?php echo $this->escape($key['pdiscountprice']); ?></span>
                                                                                <br>
                                                                            </div>
                                                                            <div class="save5">You Earn&nbsp;
                                                                                <span><?php echo (int)$this->escape($key['pdiscount']); ?>%</span>
                                                                            </div>
                                                                            <?php $MyVendorName = strtolower(preg_replace('/\s+/', '', $key['pvendor'])); ?>
                                                                            <div class="by_aria">
                                                                                <h6>By:&nbsp;</h6>
                                                                                <a href="<?php echo $this->baseUrl('/productbyseller/' . $MyVendorName . '/' . $this->escape($key['vendor_key'])); ?>"><?php echo $this->escape($key['pvendor']); ?></a>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="quick-view"><a
                                                                                title="Add to my wishlist"
                                                                                class="heart" <?php if (!empty($this->usrmakey)) { ?> href="javascript:void(0);" onclick="wishlist_cart('<?php echo $this->escape($key['pname']); ?>','<?php echo $this->escape($key['pid']); ?>','1','<?php echo $this->escape($key['pprice']); ?>','<?php echo $this->usrmakey; ?>','add');"    <?php } else { ?>  id="modal_trigger" href="#modal" <?php } ?>></a>
                                                                        <!--   <a title="Quick view" class="search" href="#"></a>-->
                                                                    </div>
                                                                    <div class="add-to-cart">
                                                                        <?php if ($key['product_type_key'] == '0') { ?>
                                                                            <?php /*
                                                                            <a title="Add to Cart" <?php if($key['pdiscount'] >= 50){ ?> href="<?php echo $this->baseUrl('/productdetail/').$this->escape($key['pid']);?>" <?php } else { ?> href="javascript:void(0);" onclick="vpb_add_to_cart('<?php echo $this->escape($key['pname']); ?>','<?php echo $this->escape($key['pid']); ?>','1','<?php echo $this->escape($key['pprice']); ?>','<?php echo $this->escape($key['pamples']); ?>','<?php if(!empty($this->record['data'][0]['total_ample'])) { echo $this->record['data'][0]['total_ample']; } else { echo "0.00"; } ?>','<?php echo $this->usrmakey; ?>','<?php echo $this->escape($key['vendor_key']); ?>','add');" <?php } ?>>Add to Cart</a> */ ?>
                                                                            <a title="Add to Cart"
                                                                               href="<?php echo $this->baseUrl('/productdetail/') . $this->escape($key['pid']); ?>">Add
                                                                                to Cart</a>
                                                                        <?php } else { ?>
                                                                            <a title="Add to Cart"
                                                                               href="<?php echo $this->baseUrl('/productdetail/') . $this->escape($key['pid']); ?>">
                                                                                Contact Me</a>
                                                                        <?php } ?>
                                                                    </div>
                                                                </div>
                                                            </li>
                                                        <?php }
                                                    }
                                                }
                                            }
                                            ?>
                                        </ul>
                                    </div>
                                </div>
                            <?php } ?>
                            <!-- ./box product -->
                        </div>
                        <!-- Product -->
                    </div>

