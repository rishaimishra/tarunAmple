 <div class="tab-pane" id="product_price_details">
                                    <h5 class="info-text"> Let's start with the Price And Discount Details</h5>
                                    <div class="row">

                                        <?php if ($allow_free_products==1) { ?>

                                            <div class="col-sm-12">
                                                <div class="form-group" style="margin-left: 25px;">
                                                    <label for="is_free_product" class="bmd-label-floating">Display
                                                        Product
                                                        As Free Product: </label>
                                                    <div class="form-check"
                                                         style="display: inline-block;margin-left: 5px;">
                                                        <label class="form-check-label">
                                                            <input class="form-check-input is_free_product_no"
                                                                   type="radio"
                                                                   name="is_free_product"
                                                                   value="0" <?php if ($productDetails->is_free_product == 0) {
                                                                echo "checked";
                                                            } ?>> No
                                                            <span class="circle">
                                                            <span class="check"></span>
                                                        </span>
                                                        </label>
                                                    </div>
                                                    <div class="form-check" style="display: inline-block;">
                                                        <label class="form-check-label">
                                                            <input class="form-check-input is_free_product_yes"
                                                                   type="radio"
                                                                   name="is_free_product"
                                                                   value="1" <?php if ($productDetails->is_free_product == 1) {
                                                                echo "checked";
                                                            } ?>> Yes
                                                            <span class="circle">
                                                            <span class="check"></span>
                                                        </span>
                                                        </label>
                                                    </div>
                                                </div>

                                            </div>

                                        <?php } ?>

                                        <div class="col-sm-4">
                                            <div class="input-group form-control-lg">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text">
                                                        <i class="material-icons">sell</i>
                                                    </span>
                                                </div>
                                                <div class="form-group">
                                                    <label for="p_retail" class="bmd-label-floating">Retail
                                                        Price</label>

                                                    <input type="number" name="p_retail" class="form-control"
                                                           id="p_retail"
                                                           value="<?php echo $productDetails->retail_price; ?>"
                                                           required>

                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-sm-4">
                                            <div class="input-group form-control-lg">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text">
                                                        <i class="material-icons">sell</i>
                                                    </span>
                                                </div>
                                                <div class="form-group">
                                                    <label for="p_wholesel" class="bmd-label-floating">Wholesale
                                                        Price</label>

                                                    <input type="number" name="p_wholesel" class="form-control"
                                                           id="p_wholesel"
                                                           value="<?php echo $productDetails->wholesale_price; ?>"
                                                           required>

                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-sm-4">
                                            <div class="input-group form-control-lg">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text">
                                                        <i class="material-icons">loyalty</i>
                                                    </span>
                                                </div>
                                                <div class="form-group is-filled">
                                                    <label for="discount_amplifyon" class="bmd-label-floating">Discount
                                                        to Amplepoints</label>

                                                    <input type="text" name="discount_amplifyon" class="form-control"
                                                           id="discount_amplifyon"
                                                           value="<?php echo $productDetails->product_discount; ?>"
                                                           disabled="disabled">

                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-sm-12">
                                            <div class="form-group" style="margin-left: 25px;">
                                                <label for="is_without_ample" class="bmd-label-floating">Display Product
                                                    Without Amplepoints: </label>
                                                <div class="form-check" style="display: inline-block;margin-left: 5px;">
                                                    <label class="form-check-label">
                                                        <input class="form-check-input without_no" type="radio"
                                                               name="is_without_ample"
                                                               value="0" <?php if ($productDetails->is_without_ample == 0) {
                                                            echo "checked";
                                                        } ?>> No
                                                        <span class="circle">
                                                            <span class="check"></span>
                                                        </span>
                                                    </label>
                                                </div>
                                                <div class="form-check" style="display: inline-block;">
                                                    <label class="form-check-label">
                                                        <input class="form-check-input without_yes" type="radio"
                                                               name="is_without_ample"
                                                               value="1" <?php if ($productDetails->is_without_ample == 1) {
                                                            echo "checked";
                                                        } ?>> Yes
                                                        <span class="circle">
                                                            <span class="check"></span>
                                                        </span>
                                                    </label>
                                                </div>
                                            </div>

                                        </div>

                                        <div class="col-sm-6" id="display_without_ample" style
                                        = "<?php if ($productDetails->is_without_ample) { ?> display: block; <?php } else { ?>display: none; <?php } ?>
                                        ">
                                        <div class="input-group form-control-lg">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text">
                                                    <i class="material-icons">sell</i>
                                                </span>
                                            </div>
                                            <div class="form-group">
                                                <label for="wholesel_without_ample" class="bmd-label-floating">Wholesale
                                                    Price For Without Ample</label>

                                                <input type="number" name="wholesel_without_ample" class="form-control"
                                                       id="wholesel_without_ample"
                                                       value="<?php echo $productDetails->wholesel_without_ample; ?>">

                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-sm-6" id="display_discount_without_ample"
                                         style="<?php if ($productDetails->is_without_ample) { ?> display: block; <?php } else { ?>display: none; <?php } ?>">
                                        <div class="input-group form-control-lg">
                                            <div class="input-group-prepend">
                                                    <span class="input-group-text">
                                                        <i class="material-icons">loyalty</i>
                                                    </span>
                                            </div>
                                            <div class="form-group is-filled">
                                                <label for="discount_without_ample" class="bmd-label-floating">Discount
                                                    Without Amplepoints</label>

                                                <input type="text" name="discount_without_ample" class="form-control"
                                                       id="discount_without_ample"
                                                       value="<?php echo $productDetails->discount_without_ample; ?>"
                                                       disabled="disabled">

                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-sm-12">

                                        <hr>

                                        <div style="margin-left: 25px;">

                                            <span>Enable Date Wise Price </span>

                                            <input type="button" id="enbldwsprice" onclick="toggledtdiv()"
                                                   class="btn btn-success" value="Click To Enable Date Wise Price"
                                                   style="color: #fff;">
                                        </div>

                                    </div>

                                    <?php
                                    $checkproductalldates = DB::table('datewise_price')
                                                            ->where('product_id', $productDetails->id)
                                                            ->whereRaw('show_date >= CURDATE()')
                                                            ->get();
                                    if (!empty($checkproductalldates)) { ?>

                                        <div class="col-md-12">

                                            <hr>
                                            <h5>Date Wise Pricing Detail</h5>
                                            <hr>

                                            <div class="table-responsive">

                                                <table class="table table-striped">
                                                    <thead>
                                                    <tr>
                                                        <td>Descreption</td>
                                                        <td>Date</td>
                                                        <td>Time</td>
                                                        <td>Retail Price</td>
                                                        <td>Wholesale Prices</td>
                                                        <td>Discount Amplepoints</td>
                                                        <td>Quantity</td>
                                                        <td>Action</td>
                                                    </tr>
                                                    </thead>
                                                    <tbody>

                                                    <?php foreach ($checkproductalldates as $pricepro) { ?>

                                                        <tr id="pptrid_<?php echo $pricepro->id; ?>">
                                                            <td><?php echo $pricepro->dtp_detail; ?></td>
                                                            <td><?php if (!empty($pricepro->show_date)) {
                                                                    echo date('m/d/Y', strtotime($pricepro->show_date));
                                                                } ?></td>
                                                            <td><?php echo $pricepro->show_time; ?></td>
                                                            <td>$<?php echo $pricepro->price; ?></td>
                                                            <td>$<?php echo $pricepro->wholesel; ?></td>
                                                            <td><?php echo $pricepro->discount_amp; ?>%</td>
                                                            <td><?php echo $pricepro->dtp_quantity; ?></td>
                                                            <td><a href="javascript:void(0);"
                                                                   onclick="deletedtwiserow('<?php echo $pricepro->id; ?>')"
                                                                   class="btn btn-danger">Delete</a></td>
                                                        </tr>


                                                    <?php } ?>

                                                    </tbody>
                                                </table>

                                            </div>
                                        </div>

                                    <?php } ?>

                                    <div class="multi-field-wrapperdtwiseprice col-sm-12" id="dtpfields"
                                         style="display: none;">
                                        <div class="multi-fields">
                                            <div class="multi-field row">

                                                <div class="col-sm-12 mtop35Px">

                                                    <div class="input-group form-control-lg">
                                                        <div class="input-group-prepend">
                                                                <span class="input-group-text">
                                                                    <i class="material-icons">assignment</i>
                                                                </span>
                                                        </div>
                                                        <div class="form-group">

                                                            <label for="dtp_detail_1" class="bmd-label-floating">Descreption</label>

                                                            <textarea name="date_wise_detail[1][dtp_detail]"
                                                                      class="form-control"
                                                                      id="dtp_detaile_1"></textarea>

                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="col-sm-6 mtop35Px">

                                                    <div class="input-group form-control-lg">
                                                        <div class="input-group-prepend">
                                                                <span class="input-group-text">
                                                                    <i class="material-icons">date_range</i>
                                                                </span>
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="dtdate_1" class="bmd-label-floating">Select
                                                                Date</label>

                                                            <input type="text" name="date_wise_detail[1][dtdtae]"
                                                                   class="form-control datepicker" id="dtdate_1"
                                                                   value="">

                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="col-sm-6">
                                                    <div class="form-group">
                                                        <label for="dttime_1" class="bmd-label-floating">Select
                                                            Time</label>

                                                        <select name="date_wise_detail[1][dttime]"
                                                                class="selectpicker searchdropdown" id="dttime_1"
                                                                data-style="btn btn-primary btn-round"
                                                                data-live-search="true" data-size="10"
                                                                title="Select Time">

                                                            <?php echo $TimeValueOption; ?>

                                                        </select>

                                                    </div>
                                                </div>

                                                <div class="col-sm-4">

                                                    <div class="input-group form-control-lg">
                                                        <div class="input-group-prepend">
                                                                <span class="input-group-text">
                                                                    <i class="material-icons">sell</i>
                                                                </span>
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="dtpretail_1" class="bmd-label-floating">Enter
                                                                Retail Price</label>

                                                            <input type="number" name="date_wise_detail[1][newprices]"
                                                                   class="form-control" id="dtpretail_1" value="">

                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="col-sm-4">

                                                    <div class="input-group form-control-lg">
                                                        <div class="input-group-prepend">
                                                                <span class="input-group-text">
                                                                    <i class="material-icons">sell</i>
                                                                </span>
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="dtpwholsale_1" class="bmd-label-floating">Enter
                                                                Wholesale Price</label>

                                                            <input type="number" name="date_wise_detail[1][wholesel]"
                                                                   onchange="changedprice(1)" class="form-control"
                                                                   id="dtpwholsale_1" value="">

                                                        </div>
                                                    </div>
                                                </div>


                                                <div class="col-sm-4">

                                                    <div class="input-group form-control-lg">
                                                        <div class="input-group-prepend">
                                                                <span class="input-group-text">
                                                                    <i class="material-icons">loyalty</i>
                                                                </span>
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="discountampl_1" class="bmd-label-floating">Discount
                                                                Amplepoints</label>

                                                            <input type="text" name="date_wise_detail[1][discount_amp]"
                                                                   class="form-control" id="discountampl_1"
                                                                   value="0.00%" disabled="disabled">

                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="col-sm-12">

                                                    <div class="input-group form-control-lg">
                                                        <div class="input-group-prepend">
                                                                <span class="input-group-text">
                                                                    <i class="material-icons">shopping_cart</i>
                                                                </span>
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="dtp_quantity_1" class="bmd-label-floating">Quantity</label>

                                                            <input type="number"
                                                                   name="date_wise_detail[1][dtp_quantity]"
                                                                   class="form-control" id="dtp_quantity_1" value="">

                                                        </div>
                                                    </div>
                                                </div>


                                                <button type="button" class="remove-field btn btn-danger col-sm-2"
                                                        style="margin-left: 82%;"><i class="material-icons">clear</i>
                                                    Remove
                                                </button>

                                            </div>
                                        </div>
                                        <button type="button" class="btn btn-primary add-field"
                                                style="margin-left: 25px"><i class="material-icons">add</i> Add Another
                                            Date Wise Price
                                        </button>
                                    </div>

                                    <div class="col-sm-12" id="contact_me_price"
                                         style="<?php if ($productDetails->product_type_key == 1) { ?> display: block; <?php } else { ?> display: none;  <?php } ?>">

                                        <hr>

                                        <div style="margin-left: 25px;">

                                            <span>Enable Contact me Only Without Price </span>

                                            <input type="button" id="enblctmpricing" onclick="toggledctmtdiv()"
                                                   class="btn btn-success"
                                                   value="Click To Enable Contact me Only Without Price"
                                                   style="color: #fff;">
                                        </div>

                                    </div>

                                    <?php $contactMePrice = DB::table('contact_me_price')
                                                            ->where('ctm_product_id', $productDetails->id)
                                                            ->first(); 
                                    ?>

                                    <div class="col-sm-12" id="ctmfields"
                                         style="<?php if ($productDetails->product_type_key == 1 && !empty($contactMePrice)) { ?> display: block; <?php } else { ?> display: none;  <?php } ?>">

                                        <div class="row">

                                            <div class="col-sm-6 mtop35Px">

                                                <div class="input-group form-control-lg">
                                                    <div class="input-group-prepend">
                                                            <span class="input-group-text">
                                                                <i class="material-icons">sell</i>
                                                            </span>
                                                    </div>
                                                    <div class="form-group">

                                                        <label for="ctm_discount_price" class="bmd-label-floating">Reward
                                                            Value</label>

                                                        <input type="text" name="ctm_discount_price"
                                                               onchange="changedctmprice(this.value)"
                                                               class="form-control" id="ctm_discount_price"
                                                               value="<?php if (!empty($contactMePrice)) {
                                                                   echo $contactMePrice->ctm_discount_price;
                                                               } ?>">

                                                    </div>
                                                </div>
                                            </div>

                                            <div class="col-sm-6 mtop35Px">

                                                <div class="input-group form-control-lg">
                                                    <div class="input-group-prepend">
                                                            <span class="input-group-text">
                                                                <i class="material-icons">loyalty</i>
                                                            </span>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="ctm_no_of_amples" class="bmd-label-floating">Buy &
                                                            Earn</label>

                                                        <input type="text" name="ctm_no_of_amples" class="form-control"
                                                               id="ctm_no_of_amples"
                                                               value="<?php if (!empty($contactMePrice)) {
                                                                   echo $contactMePrice->ctm_no_of_amples;
                                                               } ?>">

                                                    </div>
                                                </div>
                                            </div>

                                        </div>

                                    </div>


                                    <div class="col-sm-12">
                                        <hr>
                                        <div class="form-group" style="margin-left: 25px;">
                                            <label for="offerS" class="bmd-label-floating">Select Apply Button For Offer
                                                Price: </label>
                                            <div class="form-check" style="display: inline-block;margin-left: 5px;">
                                                <label class="form-check-label">
                                                    <input class="form-check-input apply_offer" type="radio"
                                                           name="offerS"
                                                           value="3" <?php if ($productDetails->special_priceavailability == 3) {
                                                        echo "checked";
                                                    } ?>> Apply
                                                    <span class="circle">
                                                            <span class="check"></span>
                                                        </span>
                                                </label>
                                            </div>
                                            <div class="form-check" style="display: inline-block;">
                                                <label class="form-check-label">
                                                    <input class="form-check-input not_apply_offer" type="radio"
                                                           name="offerS"
                                                           value="4" <?php if ($productDetails->special_priceavailability == 4) {
                                                        echo "checked";
                                                    } ?>> Don't Apply
                                                    <span class="circle">
                                                            <span class="check"></span>
                                                        </span>
                                                </label>
                                            </div>
                                        </div>

                                    </div>

                                    <div class="col-sm-12" id="offer_box"
                                         style="<?php if ($productDetails->special_priceavailability == 3) { ?> display: block; <?php } else { ?> display: none;  <?php } ?>">


                                        <div class="row">

                                            <div class="col-sm-4">

                                                <div class="input-group form-control-lg">
                                                    <div class="input-group-prepend">
                                                            <span class="input-group-text">
                                                                <i class="material-icons">sell</i>
                                                            </span>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="p_offer" class="bmd-label-floating">Offer
                                                            Price</label>

                                                        <input type="number" name="p_offer" class="form-control"
                                                               id="p_offer"
                                                               value="<?php echo $productDetails->special_price; ?>">

                                                    </div>
                                                </div>
                                            </div>

                                            <div class="col-sm-4">

                                                <div class="input-group form-control-lg">
                                                    <div class="input-group-prepend">
                                                            <span class="input-group-text">
                                                                <i class="material-icons">date_range</i>
                                                            </span>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="offerfromdate" class="bmd-label-floating">Form
                                                            Date</label>

                                                        <input type="text" name="offerfromdate"
                                                               class="form-control usdatepicker" id="offerfromdate"
                                                               value="<?php echo $productDetails->special_price_fromdate; ?>">

                                                    </div>
                                                </div>
                                            </div>

                                            <div class="col-sm-4">

                                                <div class="input-group form-control-lg">
                                                    <div class="input-group-prepend">
                                                            <span class="input-group-text">
                                                                <i class="material-icons">date_range</i>
                                                            </span>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="offertodate" class="bmd-label-floating">To
                                                            Date</label>

                                                        <input type="text" name="offertodate"
                                                               class="form-control usdatepicker" id="offertodate"
                                                               value="<?php echo $productDetails->special_price_todate; ?>">

                                                    </div>
                                                </div>
                                            </div>

                                        </div>

                                    </div>

                                    <div class="col-sm-12">

                                        <div class="form-group">

                                            <label for="promess" class="bmd-label-floating">Product Message</label>

                                            <textarea name="promess" id="promess" class="form-control"
                                                      required><?php echo $productDetails->pro_mess; ?></textarea>

                                        </div>

                                    </div>


                                </div>
                            </div>