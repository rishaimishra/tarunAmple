   <div class="tab-pane" id="product_category_details">
    <h5 class="info-text"> Let's start with the Category Details</h5>
    <div class="row">


{{-- @php 
dd($productDetails->product_type_id)
 @endphp --}}
        <div class="col-sm-4">
            <div class="form-group">
                <label for="Category" class="bmd-label-floating">Select Category</label>
                <select name="Category" class="selectpicker searchdropdown"
                    onchange="load_options(this.value, 'Subcategory');"
                    id="CategoryEdit" data-style="btn btn-primary btn-round"
                    data-live-search="true" data-size="7" title="Select Category"
                    required>
                    <?php foreach ($categories as $key) { ?>
                    <option value="<?php echo $key->id; ?>" <?php if ($productDetails->product_type_id == $key->id) {
                        echo "selected";
                    } ?>><?php echo $key->category_name; ?></option>
                    <?php } ?>
                </select>
            </div>
        </div>




        <div class="col-sm-4">
            <div class="form-group">
                <label for="Subcategory" class="bmd-label-floating">Select Sub
                Category</label>
                <select name="Subcategory" class="selectpicker searchdropdown"
                    onchange="load_options(this.value, 'Subcategory2'); filterproductlist(this.value);"
                    id="Subcategory" data-style="btn btn-primary btn-round"
                    data-live-search="true" data-size="7"
                    title="Select Sub Category">
                    <?php foreach ($sub_categories as $key) { ?>
                    <option value="<?php echo $key->id; ?>" <?php if ($productDetails->category_id == $key->id) {
                        echo "selected";
                    } ?>><?php echo $key->subcategory_name; ?></option>
                    <?php } ?>
                </select>
            </div>
        </div>




        <div class="col-sm-4">
            <div class="form-group">
                <label for="Subcategory2" class="bmd-label-floating">Select Sub
                Category</label>
                <select name="Subcategory2" class="selectpicker searchdropdown"
                    onchange="getfilterbycat(this.value);" id="Subcategory2"
                    data-style="btn btn-primary btn-round" data-live-search="true"
                    data-size="7" title="Select Sub Category">
                    <?php foreach ($sub2_categories as $key) { ?>
                    <option value="<?php echo $key->id; ?>" <?php if ($productDetails->subcategory_id == $key->id) {
                        echo "selected";
                    } ?>><?php echo $key->subcategory2_name; ?></option>
                    <?php } ?>
                </select>
            </div>
        </div>
    </div>























                                    <?php if (!empty($productDetails->vendor_uid)) { ?>

                                        <div class="filter row">

                                            <div class="col-md-12">


                                                <hr>
                                                <h5>Select Filter For Products</h5>
                                                <hr>

                                            </div>

                                            <?php

                                            $product_mainFilters =  DB::table('tbl_filter_pro')->where('pro_id', $productDetails->id)->get();
                                          //  dd(count($product_mainFilters));
                                            $mainFilterSearch = array();

                                            if (count($product_mainFilters)>0) {
                                                foreach ($product_mainFilters as $filtersd) {
                                                    $mainFilterSearch[] = $filtersd->main_filter_id;
                                                }
                                            }




                                            $product_subFilters = DB::table('tbl_pro_sub_filter')->where('spro_id', $productDetails->id)->get();
                                            //echo "<pre>";print_r($product_subFilters);




                                            $product_sub2Filters =DB::table('tbl_pro_sub2filter')->where('s2pro_id', $productDetails->id)->get();
                                            //echo "<pre>";print_r($product_sub2Filters);

                                            ?>

                                            <div class="col-sm-4">
                                                <div class="form-group">
                                                    <label for="f_type" class="bmd-label-floating">Filter
                                                        Category</label>

                                                    <select name="f_type[]" class="selectpicker searchdropdown"
                                                            onchange="ajaxfunctions();" id="s1"
                                                            data-style="btn btn-primary btn-round"
                                                            data-live-search="true" data-size="7"
                                                            title="Select Category" multiple>

                                                        <option value="">---Select Filter(s)---</option>
                                                        <?php if (count($filters) > 0) {
                                                            foreach ($filters as $filterkey) { ?>
                                                                <option value="<?php echo $filterkey->id; ?>" <?php if (in_array($filterkey->id, $mainFilterSearch)) {
                                                                    echo "selected";
                                                                } ?>><?php echo $filterkey->name; ?></option>
                                                            <?php }
                                                        } ?>

                                                    </select>

                                                </div>
                                            </div>











                                            <div class="col-sm-4">
                                                <div class="form-group">
                                                    <label for="sf_type" class="bmd-label-floating">Sub Filter
                                                        Category</label>

                                                    <select name="sf_type[]" class="selectpicker searchdropdown"
                                                            onchange="ajaxfunction();" id="s2"
                                                            data-style="btn btn-primary btn-round"
                                                            data-live-search="true" data-size="7"
                                                            title="Filter Category" multiple>

                                                        <option value="">---Select Sub Filter(s)---</option>

                                                        <?php

                                                        if (!empty($product_subFilters)) {

                                                            foreach ($product_subFilters as $sbdt) {

                                                                $suId = $sbdt->sub_filterid;

                                                                $subfilterdata =DB::table('tbl_filters')->where('id', $suId)->first();

                                                                ?>

                                                                <option value="<?php echo $subfilterdata->id ?>"
                                                                        selected="selected"><?php echo $subfilterdata->title?></option>

                                                                <?php

                                                            }
                                                        }

                                                        ?>

                                                    </select>

                                                </div>
                                            </div>










                                            <div class="col-sm-4">
                                                <div class="form-group">
                                                    <label for="subf_type" class="bmd-label-floating">Sub Sub Filter
                                                        Category</label>

                                                    <select name="subf_type[]" class="selectpicker searchdropdown"
                                                            id="s3" data-style="btn btn-primary btn-round"
                                                            data-live-search="true" data-size="7"
                                                            title="Filter Category" multiple>

                                                        <option value="">---Select Sub Filter(s)---</option>

                                                        <?php

                                                        if (!empty($product_sub2Filters)) {

                                                            foreach ($product_sub2Filters as $s2bdt) {

                                                                $su2Idd = $s2bdt->s2filterid;

                                                                $sub2filterdata = DB::table('tbl_subfilter')->where('id', $su2Idd)->first();

                                                                ?>

                                                                <option value="<?php echo $sub2filterdata->id ?>"
                                                                        selected="selected"><?php echo $sub2filterdata->name ?></option>
                                                                <?php

                                                            }
                                                        }

                                                        ?>

                                                    </select>

                                                </div>
                                            </div>
                                        </div>

                                    <?php } ?>




















                                    <?php if ($productDetails->category_id == 208) {

                                        $GiftcardDetail = DB::table('tbl_giftcard_detail')->where('product_id', $productDetails->id)->first();

                                        if (!empty($GiftcardDetail)) { ?>

                                            <input type="hidden" name="is_gift_available" value="1">

                                            <div class="row" id="gift_card_details">


                                                <div class="col-sm-12 text-center">
                                                    <hr>
                                                    <h5 class="info-text">Please Fill Out The Gift Card Purchase
                                                        Details:</h5>
                                                    <hr>
                                                </div>


                                                <div class="col-sm-12">

                                                    <p class="note">Gift Card Transactions Without AmplePoints*</p>
                                                    <p class="note">Sell Gift Cards With Cash (Customers cannot use
                                                        AmplePoints in this purchase)</p>

                                                    <div class="form-group">
                                                        <label for="gf_per_without_ample" class="bmd-label-floating">Discount
                                                            % offered on Gift Cards</label>

                                                        <select name="gf_per_without_ample"
                                                                class="selectpicker searchdropdown gf_drp"
                                                                id="gf_per_without_ample"
                                                                data-style="btn btn-primary btn-round"
                                                                data-live-search="true" data-size="7" title="DISCOUNT">

                                                            <?php for ($i = 0; $i <= 100; $i++) { ?>
                                                                <option value="<?php echo $i; ?>" <?php if ($GiftcardDetail->per_without_ample == $i) {
                                                                    echo "selected";
                                                                } ?>><?php echo $i; ?></option>
                                                            <?php } ?>

                                                        </select>

                                                    </div>

                                                    <p class="note">*No AmplePoints can be used with this purchase. No
                                                        AmplePoints are rewarded in this purchase.</p>

                                                    <hr>

                                                </div>

                                                <div class="col-sm-12">

                                                    <p class="note">Gift Card Transactions With AmplePoints*</p>
                                                    <p class="note">Sell Gift Cards With Cash (Customers cannot use
                                                        AmplePoints in this purchase)</p>

                                                    <div class="form-group">
                                                        <label for="gf_per_with_ample" class="bmd-label-floating">AmplePoints
                                                            % rewards offered on Gift Cards</label>

                                                        <select name="gf_per_with_ample"
                                                                class="selectpicker searchdropdown gf_drp"
                                                                id="gf_per_with_ample"
                                                                data-style="btn btn-primary btn-round"
                                                                data-live-search="true" data-size="7" title="DISCOUNT">

                                                            <?php for ($i = 0; $i <= 100; $i++) { ?>
                                                                <option value="<?php echo $i; ?>" <?php if ($GiftcardDetail->per_with_ample == $i) {
                                                                    echo "selected";
                                                                } ?>><?php echo $i; ?></option>
                                                            <?php } ?>

                                                        </select>

                                                    </div>

                                                    <p class="note">*AmplePoints can be used to make this purchase.
                                                        Amplepoints will be rewarded to the customer for this
                                                        purchase. </p>
                                                    <p class="note">**If you offer a discount over 50%, customers can
                                                        buy that particular product for free using their
                                                        AmplePoints.</p>

                                                    <hr>

                                                </div>

                                                <div class="col-sm-12">

                                                    <p class="note">Gift Card Hours of Use. Applicable hours for Gift
                                                        Cards to be redeemed in store</p>

                                                </div>

                                                <div class="col-sm-12">
                                                    <div class="form-group">

                                                        <div class="form-check"
                                                             style="display: inline-block;margin-left: 5px;">
                                                            <label class="form-check-label">
                                                                <input class="form-check-input nohours" type="radio"
                                                                       name="no_hours"
                                                                       value="1" <?php if ($GiftcardDetail->no_hours == 1) {
                                                                    echo "checked";
                                                                } ?>> All the time
                                                                <span class="circle">
                                                                    <span class="check"></span>
                                                                </span>
                                                            </label>
                                                        </div>
                                                        <div class="form-check" style="display: inline-block;">
                                                            <label class="form-check-label">
                                                                <input class="form-check-input nohours" type="radio"
                                                                       name="no_hours"
                                                                       value="0" <?php if ($GiftcardDetail->no_hours == 0) {
                                                                    echo "checked";
                                                                } ?>> Specific Time
                                                                <span class="circle">
                                                                    <span class="check"></span>
                                                                </span>
                                                            </label>
                                                        </div>
                                                    </div>

                                                </div>

                                                <?php

                                                if (!empty($GiftcardDetail->hours_of_use)) {

                                                    $hourlist = json_decode($GiftcardDetail->hours_of_use, true);

                                                } else {

                                                    $hourlist = array();
                                                }

                                                ?>

                                                <div class="multi-field-wrappergchr col-sm-12" id="specific_hours"
                                                     style="<?php if ($GiftcardDetail->no_hours == 0) { ?> display: block; <?php } else { ?> display: none; <?php } ?>">

                                                    <div class="multi-fields">

                                                        <?php if (!empty($hourlist)) {

                                                            $hrincrement = 5;

                                                            foreach ($hourlist as $hrdtl) { ?>

                                                                <div class="multi-field row">

                                                                    <div class="col-sm-4">

                                                                        <div class="form-group">
                                                                            <label for="hr_day_<?php echo $hrincrement; ?>"
                                                                                   class="bmd-label-floating">Slect
                                                                                Day</label>

                                                                            <select name="hours_of_use[<?php echo $hrincrement; ?>][hr_day]"
                                                                                    class="selectpicker searchdropdown"
                                                                                    id="hr_day_<?php echo $hrincrement; ?>"
                                                                                    data-style="btn btn-primary btn-round"
                                                                                    data-live-search="true"
                                                                                    data-size="7" title="Select Day">

                                                                                <option value="Monday" <?php if ($hrdtl['hr_day'] == 'Monday') {
                                                                                    echo "selected";
                                                                                } ?>>Monday
                                                                                </option>
                                                                                <option value="Tuesday" <?php if ($hrdtl['hr_day'] == 'Tuesday') {
                                                                                    echo "selected";
                                                                                } ?>>Tuesday
                                                                                </option>
                                                                                <option value="Wednsday" <?php if ($hrdtl['hr_day'] == 'Wednsday') {
                                                                                    echo "selected";
                                                                                } ?>>Wednsday
                                                                                </option>
                                                                                <option value="Thursday" <?php if ($hrdtl['hr_day'] == 'Thursday') {
                                                                                    echo "selected";
                                                                                } ?>>Thursday
                                                                                </option>
                                                                                <option value="Friday" <?php if ($hrdtl['hr_day'] == 'Friday') {
                                                                                    echo "selected";
                                                                                } ?>>Friday
                                                                                </option>
                                                                                <option value="Saturday" <?php if ($hrdtl['hr_day'] == 'Saturday') {
                                                                                    echo "selected";
                                                                                } ?>>Saturday
                                                                                </option>
                                                                                <option value="Sunnday" <?php if ($hrdtl['hr_day'] == 'Sunnday') {
                                                                                    echo "selected";
                                                                                } ?>>Sunnday
                                                                                </option>

                                                                            </select>

                                                                        </div>
                                                                    </div>

                                                                    <div class="col-sm-3 mtop45px">

                                                                        <div class="form-group">
                                                                            <label for="hr_start_time_<?php echo $hrincrement; ?>"
                                                                                   class="bmd-label-floating">Start
                                                                                Time</label>
                                                                            <input type="text"
                                                                                   id="hr_start_time_<?php echo $hrincrement; ?>"
                                                                                   name="hours_of_use[<?php echo $hrincrement; ?>][start_time]"
                                                                                   value="<?php echo $hrdtl['start_time']; ?>"
                                                                                   class="form-control mytimepicker">

                                                                        </div>
                                                                    </div>

                                                                    <div class="col-sm-3 mtop45px">

                                                                        <div class="form-group">
                                                                            <label for="hr_end_time_<?php echo $hrincrement; ?>"
                                                                                   class="bmd-label-floating">End
                                                                                Time</label>
                                                                            <input type="text"
                                                                                   id="hr_end_time_<?php echo $hrincrement; ?>"
                                                                                   name="hours_of_use[<?php echo $hrincrement; ?>][end_time]"
                                                                                   value="<?php echo $hrdtl['end_time']; ?>"
                                                                                   class="form-control mytimepicker">

                                                                        </div>
                                                                    </div>

                                                                    <button type="button"
                                                                            class="remove-field btn btn-danger col-sm-2"
                                                                            style="margin: 45px 0px 15px 0px;"><i
                                                                                class="material-icons">clear</i> Remove
                                                                    </button>

                                                                </div>

                                                                <?php $hrincrement++;
                                                            }
                                                        } else { ?>

                                                            <div class="multi-field row">

                                                                <div class="col-sm-4">

                                                                    <div class="form-group">
                                                                        <label for="hr_day_501"
                                                                               class="bmd-label-floating">Slect
                                                                            Day</label>

                                                                        <select name="hours_of_use[501][hr_day]"
                                                                                class="selectpicker searchdropdown"
                                                                                id="hr_day_501"
                                                                                data-style="btn btn-primary btn-round"
                                                                                data-live-search="true" data-size="7"
                                                                                title="Select Day">

                                                                            <option value="Monday">Monday</option>
                                                                            <option value="Tuesday">Tuesday</option>
                                                                            <option value="Wednsday">Wednsday</option>
                                                                            <option value="Thursday">Thursday</option>
                                                                            <option value="Friday">Friday</option>
                                                                            <option value="Saturday">Saturday</option>
                                                                            <option value="Sunnday">Sunnday</option>

                                                                        </select>

                                                                    </div>
                                                                </div>

                                                                <div class="col-sm-3 mtop45px">

                                                                    <div class="form-group">
                                                                        <label for="hr_start_time_501"
                                                                               class="bmd-label-floating">Start
                                                                            Time</label>
                                                                        <input type="text" id="hr_start_time_501"
                                                                               name="hours_of_use[501][start_time]"
                                                                               class="form-control mytimepicker">

                                                                    </div>
                                                                </div>

                                                                <div class="col-sm-3 mtop45px">

                                                                    <div class="form-group">
                                                                        <label for="hr_end_time_501"
                                                                               class="bmd-label-floating">End
                                                                            Time</label>
                                                                        <input type="text" id="hr_end_time_501"
                                                                               name="hours_of_use[501][end_time]"
                                                                               class="form-control mytimepicker">

                                                                    </div>
                                                                </div>

                                                                <button type="button"
                                                                        class="remove-field btn btn-danger col-sm-2"
                                                                        style="margin: 45px 0px 15px 0px;"><i
                                                                            class="material-icons">clear</i> Remove
                                                                </button>

                                                            </div>

                                                        <?php } ?>

                                                    </div>

                                                    <button type="button" class="btn btn-primary add-field"><i
                                                                class="material-icons">add</i> Add Another Day Time
                                                    </button>

                                                </div>

                                                <div class="col-sm-12">

                                                    <hr>

                                                    <p class="note">Gift Card can be redeemed for</p>

                                                </div>

                                                <div class="col-sm-12">
                                                    <div class="form-group">

                                                        <div class="form-check"
                                                             style="display: inline-block;margin-left: 5px;">
                                                            <label class="form-check-label">
                                                                <input class="form-check-input redeemedfor" type="radio"
                                                                       name="redeemed_for"
                                                                       value="0" <?php if ($GiftcardDetail->redeemed_for == 0) {
                                                                    echo "checked";
                                                                } ?>> regular priced items
                                                                <span class="circle">
                                                                    <span class="check"></span>
                                                                </span>
                                                            </label>
                                                        </div>
                                                        <div class="form-check" style="display: inline-block;">
                                                            <label class="form-check-label">
                                                                <input class="form-check-input redeemedfor" type="radio"
                                                                       name="redeemed_for"
                                                                       value="1" <?php if ($GiftcardDetail->redeemed_for == 1) {
                                                                    echo "checked";
                                                                } ?>> special priced items
                                                                <span class="circle">
                                                                    <span class="check"></span>
                                                                </span>
                                                            </label>
                                                        </div>
                                                    </div>

                                                </div>

                                                <div class="col-sm-12" id="price_sheet_div"
                                                     style="<?php if ($GiftcardDetail->redeemed_for == 0) { ?> display: none; <?php } else { ?> display: block; <?php } ?>">

                                                    <p class="note">Please provide special price sheet</p>

                                                    <div class="fileinput fileinput-new text-center"
                                                         data-provides="fileinput">
                                                        <div class="fileinput-new thumbnail">
                                                            <img src="<?php echo $baseurl; ?>/admin_dir/material/img/image_placeholder.jpg"
                                                                 alt="...">
                                                        </div>
                                                        <div class="fileinput-preview fileinput-exists thumbnail"></div>
                                                        <div>
                                                            <span class="btn btn-rose btn-round btn-file expect_dark_gradiant_bg">
                                                                <span class="fileinput-new">select sheet </span>
                                                                <span class="fileinput-exists">Change</span>
                                                                <input type="file" id="price_sheet" name="price_sheet"/>
                                                            </span>
                                                            <a href="#pablo"
                                                               class="btn btn-danger btn-round fileinput-exists"
                                                               data-dismiss="fileinput"><i class="fa fa-times"></i>
                                                                Remove</a>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="col-sm-12">

                                                    <hr>

                                                    <p class="note">Gift Card can be redeemed on % of total bill</p>


                                                    <div class="form-group">
                                                        <label for="per_of_bill" class="bmd-label-floating">% of total
                                                            bill</label>

                                                        <select name="per_of_bill"
                                                                class="selectpicker searchdropdown gf_drp"
                                                                id="per_of_bill" data-style="btn btn-primary btn-round"
                                                                data-live-search="true" data-size="7"
                                                                title="% of total bill">

                                                            <?php for ($i = 0; $i <= 100; $i++) { ?>
                                                                <option value="<?php echo $i; ?>" <?php if ($GiftcardDetail->per_of_bill == $i) {
                                                                    echo "selected";
                                                                } ?>><?php echo $i; ?></option>
                                                            <?php } ?>

                                                        </select>

                                                    </div>

                                                </div>

                                                <div class="col-sm-12">

                                                    <hr>

                                                    <p class="note">[Cannot/Can] be used or combined with any other
                                                        promotion</p>

                                                    <div class="form-group">

                                                        <div class="form-check"
                                                             style="display: inline-block;margin-left: 5px;">
                                                            <label class="form-check-label">
                                                                <input class="form-check-input" type="radio"
                                                                       name="combine_with"
                                                                       value="0" <?php if ($GiftcardDetail->combine_with == 0) {
                                                                    echo "checked";
                                                                } ?>> Cannot
                                                                <span class="circle">
                                                                    <span class="check"></span>
                                                                </span>
                                                            </label>
                                                        </div>
                                                        <div class="form-check" style="display: inline-block;">
                                                            <label class="form-check-label">
                                                                <input class="form-check-input" type="radio"
                                                                       name="combine_with"
                                                                       value="1" <?php if ($GiftcardDetail->combine_with == 1) {
                                                                    echo "checked";
                                                                } ?>> Can
                                                                <span class="circle">
                                                                    <span class="check"></span>
                                                                </span>
                                                            </label>
                                                        </div>
                                                    </div>

                                                </div>

                                                <div class="col-sm-12">

                                                    <hr>

                                                    <p class="note">Ask which products and services can be redeemed with
                                                        100% AmplePoints.</p>

                                                    <div class="form-group">

                                                        <div class="form-check"
                                                             style="display: inline-block;margin-left: 5px;">
                                                            <label class="form-check-label">
                                                                <input class="form-check-input" type="radio"
                                                                       name="ask_which_product"
                                                                       value="0" <?php if ($GiftcardDetail->ask_which_product == 0) {
                                                                    echo "checked";
                                                                } ?>> No
                                                                <span class="circle">
                                                                    <span class="check"></span>
                                                                </span>
                                                            </label>
                                                        </div>
                                                        <div class="form-check" style="display: inline-block;">
                                                            <label class="form-check-label">
                                                                <input class="form-check-input" type="radio"
                                                                       name="ask_which_product"
                                                                       value="1" <?php if ($GiftcardDetail->ask_which_product == 1) {
                                                                    echo "checked";
                                                                } ?>> Yes
                                                                <span class="circle">
                                                                    <span class="check"></span>
                                                                </span>
                                                            </label>
                                                        </div>
                                                    </div>

                                                </div>

                                                <div class="col-sm-12">

                                                    <hr>

                                                    <p class="note">Guest must mention gift card before ordering to let
                                                        the business know that guest will be redeeming Gift Card in
                                                        advance </p>

                                                    <div class="form-group">

                                                        <div class="form-check"
                                                             style="display: inline-block;margin-left: 5px;">
                                                            <label class="form-check-label">
                                                                <input class="form-check-input" type="radio"
                                                                       name="inform_advance"
                                                                       value="0" <?php if ($GiftcardDetail->inform_advance == 0) {
                                                                    echo "checked";
                                                                } ?>> not required
                                                                <span class="circle">
                                                                    <span class="check"></span>
                                                                </span>
                                                            </label>
                                                        </div>
                                                        <div class="form-check" style="display: inline-block;">
                                                            <label class="form-check-label">
                                                                <input class="form-check-input" type="radio"
                                                                       name="inform_advance"
                                                                       value="1" <?php if ($GiftcardDetail->inform_advance == 1) {
                                                                    echo "checked";
                                                                } ?>> required
                                                                <span class="circle">
                                                                    <span class="check"></span>
                                                                </span>
                                                            </label>
                                                        </div>
                                                    </div>

                                                </div>

                                                <div class="col-sm-12">

                                                    <hr>

                                                    <p class="note">Call for appointment after purchasing [required/not
                                                        required]</p>

                                                    <div class="form-group">

                                                        <div class="form-check"
                                                             style="display: inline-block;margin-left: 5px;">
                                                            <label class="form-check-label">
                                                                <input class="form-check-input" type="radio"
                                                                       name="is_appointment"
                                                                       value="0" <?php if ($GiftcardDetail->is_appointment == 0) {
                                                                    echo "checked";
                                                                } ?>> not required
                                                                <span class="circle">
                                                                    <span class="check"></span>
                                                                </span>
                                                            </label>
                                                        </div>
                                                        <div class="form-check" style="display: inline-block;">
                                                            <label class="form-check-label">
                                                                <input class="form-check-input" type="radio"
                                                                       name="is_appointment"
                                                                       value="1" <?php if ($GiftcardDetail->is_appointment == 1) {
                                                                    echo "checked";
                                                                } ?>> required
                                                                <span class="circle">
                                                                    <span class="check"></span>
                                                                </span>
                                                            </label>
                                                        </div>
                                                    </div>

                                                </div>

                                                <div class="col-sm-12">

                                                    <hr>

                                                    <p class="note">No cash back. Must use entire amount in one time</p>

                                                    <div class="form-group">

                                                        <div class="form-check"
                                                             style="display: inline-block;margin-left: 5px;">
                                                            <label class="form-check-label">
                                                                <input class="form-check-input" type="radio"
                                                                       name="no_cash_back"
                                                                       value="0" <?php if ($GiftcardDetail->no_cash_back == 0) {
                                                                    echo "checked";
                                                                } ?>> NO
                                                                <span class="circle">
                                                                    <span class="check"></span>
                                                                </span>
                                                            </label>
                                                        </div>
                                                        <div class="form-check" style="display: inline-block;">
                                                            <label class="form-check-label">
                                                                <input class="form-check-input" type="radio"
                                                                       name="no_cash_back"
                                                                       value="1" <?php if ($GiftcardDetail->no_cash_back == 1) {
                                                                    echo "checked";
                                                                } ?>> Yes
                                                                <span class="circle">
                                                                    <span class="check"></span>
                                                                </span>
                                                            </label>
                                                        </div>
                                                    </div>

                                                </div>

                                                <div class="col-sm-12">

                                                    <hr>

                                                    <p class="note">No of Gift Card can be redeemed per guest per
                                                        visit</p>


                                                    <div class="form-group">
                                                        <label for="no_of_time" class="bmd-label-floating">No of Gift
                                                            Card</label>

                                                        <select name="no_of_time"
                                                                class="selectpicker searchdropdown gf_drp"
                                                                id="no_of_time" data-style="btn btn-primary btn-round"
                                                                data-live-search="true" data-size="7"
                                                                title="% of total bill">

                                                            <?php for ($i = 0; $i <= 100; $i++) { ?>
                                                                <option value="<?php echo $i; ?>" <?php if ($GiftcardDetail->no_of_time == $i) {
                                                                    echo "selected";
                                                                } ?>><?php echo $i; ?></option>
                                                            <?php } ?>

                                                        </select>

                                                    </div>

                                                </div>

                                                <div class="col-sm-12">

                                                    <hr>

                                                    <p class="note">Final Sale</p>

                                                    <div class="form-group">

                                                        <div class="form-check"
                                                             style="display: inline-block;margin-left: 5px;">
                                                            <label class="form-check-label">
                                                                <input class="form-check-input" type="radio"
                                                                       name="final_sale"
                                                                       value="0" <?php if ($GiftcardDetail->final_sale == 0) {
                                                                    echo "checked";
                                                                } ?>> No
                                                                <span class="circle">
                                                                    <span class="check"></span>
                                                                </span>
                                                            </label>
                                                        </div>
                                                        <div class="form-check" style="display: inline-block;">
                                                            <label class="form-check-label">
                                                                <input class="form-check-input" type="radio"
                                                                       name="final_sale"
                                                                       value="1" <?php if ($GiftcardDetail->final_sale == 1) {
                                                                    echo "checked";
                                                                } ?>> Yes
                                                                <span class="circle">
                                                                    <span class="check"></span>
                                                                </span>
                                                            </label>
                                                        </div>
                                                    </div>

                                                </div>

                                                <div class="col-sm-12">

                                                    <hr>

                                                    <p class="note">Detail Note</p>

                                                    <div class="form-group">
                                                        <label for="detail_note" class="bmd-label-floating">Note</label>
                                                        <textarea class="form-control" name="detail_note"
                                                                  id="detail_note"><?php echo $GiftcardDetail->detail_note; ?></textarea>
                                                    </div>
                                                </div>

                                            </div>


                                        <?php } else { ?>

                                            <input type="hidden" name="is_gift_available" value="0">

                                            <div class="row" id="gift_card_details">


                                                <div class="col-sm-12 text-center">
                                                    <hr>
                                                    <h5 class="info-text">Please Fill Out The Gift Card Purchase
                                                        Details:</h5>
                                                    <hr>
                                                </div>


                                                <div class="col-sm-12">

                                                    <p class="note">Gift Card Transactions Without AmplePoints*</p>
                                                    <p class="note">Sell Gift Cards With Cash (Customers cannot use
                                                        AmplePoints
                                                        in this purchase)</p>

                                                    <div class="form-group">
                                                        <label for="gf_per_without_ample" class="bmd-label-floating">Discount
                                                            %
                                                            offered on Gift Cards</label>

                                                        <select name="gf_per_without_ample"
                                                                class="selectpicker searchdropdown gf_drp"
                                                                id="gf_per_without_ample"
                                                                data-style="btn btn-primary btn-round"
                                                                data-live-search="true" data-size="7" title="DISCOUNT">

                                                            <?php for ($i = 0; $i <= 100; $i++) { ?>
                                                                <option value="<?php echo $i; ?>" <?php if ($i == 20) {
                                                                    echo "selected";
                                                                } ?>><?php echo $i; ?></option>
                                                            <?php } ?>

                                                        </select>

                                                    </div>

                                                    <p class="note">*No AmplePoints can be used with this purchase. No
                                                        AmplePoints are rewarded in this purchase.</p>

                                                    <hr>

                                                </div>

                                                <div class="col-sm-12">

                                                    <p class="note">Gift Card Transactions With AmplePoints*</p>
                                                    <p class="note">Sell Gift Cards With Cash (Customers cannot use
                                                        AmplePoints
                                                        in this purchase)</p>

                                                    <div class="form-group">
                                                        <label for="gf_per_with_ample" class="bmd-label-floating">AmplePoints
                                                            %
                                                            rewards offered on Gift Cards</label>

                                                        <select name="gf_per_with_ample"
                                                                class="selectpicker searchdropdown gf_drp"
                                                                id="gf_per_with_ample"
                                                                data-style="btn btn-primary btn-round"
                                                                data-live-search="true" data-size="7" title="DISCOUNT">

                                                            <?php for ($i = 0; $i <= 100; $i++) { ?>
                                                                <option value="<?php echo $i; ?>" <?php if ($i == 50) {
                                                                    echo "selected";
                                                                } ?>><?php echo $i; ?></option>
                                                            <?php } ?>

                                                        </select>

                                                    </div>

                                                    <p class="note">*AmplePoints can be used to make this purchase.
                                                        Amplepoints
                                                        will be rewarded to the customer for this purchase. </p>
                                                    <p class="note">**If you offer a discount over 50%, customers can
                                                        buy that
                                                        particular product for free using their AmplePoints.</p>

                                                    <hr>

                                                </div>

                                                <div class="col-sm-12">

                                                    <p class="note">Gift Card Hours of Use. Applicable hours for Gift
                                                        Cards to
                                                        be redeemed in store</p>

                                                </div>

                                                <div class="col-sm-12">
                                                    <div class="form-group">

                                                        <div class="form-check"
                                                             style="display: inline-block;margin-left: 5px;">
                                                            <label class="form-check-label">
                                                                <input class="form-check-input nohours" type="radio"
                                                                       name="no_hours" value="1" checked> All the time
                                                                <span class="circle">
                                                            <span class="check"></span>
                                                        </span>
                                                            </label>
                                                        </div>
                                                        <div class="form-check" style="display: inline-block;">
                                                            <label class="form-check-label">
                                                                <input class="form-check-input nohours" type="radio"
                                                                       name="no_hours" value="0"> Specific Time
                                                                <span class="circle">
                                                            <span class="check"></span>
                                                        </span>
                                                            </label>
                                                        </div>
                                                    </div>

                                                </div>

                                                <div class="multi-field-wrappergchr col-sm-12" id="specific_hours"
                                                     style="display: none;">

                                                    <div class="multi-fields">

                                                        <div class="multi-field row">

                                                            <div class="col-sm-4">

                                                                <div class="form-group">
                                                                    <label for="hr_day_1" class="bmd-label-floating">Slect
                                                                        Day</label>

                                                                    <select name="hours_of_use[1][hr_day]"
                                                                            class="selectpicker searchdropdown"
                                                                            id="hr_day_1"
                                                                            data-style="btn btn-primary btn-round"
                                                                            data-live-search="true" data-size="7"
                                                                            title="Select Day">

                                                                        <option value="Monday">Monday</option>
                                                                        <option value="Tuesday">Tuesday</option>
                                                                        <option value="Wednsday">Wednsday</option>
                                                                        <option value="Thursday">Thursday</option>
                                                                        <option value="Friday">Friday</option>
                                                                        <option value="Saturday">Saturday</option>
                                                                        <option value="Sunnday">Sunnday</option>

                                                                    </select>

                                                                </div>
                                                            </div>

                                                            <div class="col-sm-3 mtop45px">

                                                                <div class="form-group">
                                                                    <label for="hr_start_time_1"
                                                                           class="bmd-label-floating">Start
                                                                        Time</label>
                                                                    <input type="text" id="hr_start_time_1"
                                                                           name="hours_of_use[1][start_time]"
                                                                           class="form-control mytimepicker">

                                                                </div>
                                                            </div>

                                                            <div class="col-sm-3 mtop45px">

                                                                <div class="form-group">
                                                                    <label for="hr_end_time_1"
                                                                           class="bmd-label-floating">End
                                                                        Time</label>
                                                                    <input type="text" id="hr_end_time_1"
                                                                           name="hours_of_use[1][end_time]"
                                                                           class="form-control mytimepicker">

                                                                </div>
                                                            </div>

                                                            <button type="button"
                                                                    class="remove-field btn btn-danger col-sm-2"
                                                                    style="margin: 45px 0px 15px 0px;"><i
                                                                        class="material-icons">clear</i> Remove
                                                            </button>

                                                        </div>

                                                    </div>

                                                    <button type="button" class="btn btn-primary add-field"><i
                                                                class="material-icons">add</i> Add Another Day Time
                                                    </button>

                                                </div>

                                                <div class="col-sm-12">

                                                    <hr>

                                                    <p class="note">Gift Card can be redeemed for</p>

                                                </div>

                                                <div class="col-sm-12">
                                                    <div class="form-group">

                                                        <div class="form-check"
                                                             style="display: inline-block;margin-left: 5px;">
                                                            <label class="form-check-label">
                                                                <input class="form-check-input redeemedfor" type="radio"
                                                                       name="redeemed_for" value="0" checked> regular
                                                                priced
                                                                items
                                                                <span class="circle">
                                                            <span class="check"></span>
                                                        </span>
                                                            </label>
                                                        </div>
                                                        <div class="form-check" style="display: inline-block;">
                                                            <label class="form-check-label">
                                                                <input class="form-check-input redeemedfor" type="radio"
                                                                       name="redeemed_for" value="1"> special priced
                                                                items
                                                                <span class="circle">
                                                            <span class="check"></span>
                                                        </span>
                                                            </label>
                                                        </div>
                                                    </div>

                                                </div>

                                                <div class="col-sm-12" id="price_sheet_div" style="display: none;">

                                                    <p class="note">Please provide special price sheet</p>

                                                    <div class="fileinput fileinput-new text-center"
                                                         data-provides="fileinput">
                                                        <div class="fileinput-new thumbnail">
                                                            <img src="<?php echo $baseurl; ?>/admin_dir/material/img/image_placeholder.jpg"
                                                                 alt="...">
                                                        </div>
                                                        <div class="fileinput-preview fileinput-exists thumbnail"></div>
                                                        <div>
                                                    <span class="btn btn-rose btn-round btn-file expect_dark_gradiant_bg">
                                                        <span class="fileinput-new">select sheet </span>
                                                        <span class="fileinput-exists">Change</span>
                                                        <input type="file" id="price_sheet" name="price_sheet"/>
                                                    </span>
                                                            <a href="#pablo"
                                                               class="btn btn-danger btn-round fileinput-exists"
                                                               data-dismiss="fileinput"><i class="fa fa-times"></i>
                                                                Remove</a>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="col-sm-12">

                                                    <hr>

                                                    <p class="note">Gift Card can be redeemed on % of total bill</p>


                                                    <div class="form-group">
                                                        <label for="per_of_bill" class="bmd-label-floating">% of total
                                                            bill</label>

                                                        <select name="per_of_bill"
                                                                class="selectpicker searchdropdown gf_drp"
                                                                id="per_of_bill" data-style="btn btn-primary btn-round"
                                                                data-live-search="true" data-size="7"
                                                                title="% of total bill">

                                                            <?php for ($i = 0; $i <= 100; $i++) { ?>
                                                                <option value="<?php echo $i; ?>" <?php if ($i == 50) {
                                                                    echo "selected";
                                                                } ?>><?php echo $i; ?></option>
                                                            <?php } ?>

                                                        </select>

                                                    </div>

                                                </div>

                                                <div class="col-sm-12">

                                                    <hr>

                                                    <p class="note">[Cannot/Can] be used or combined with any other
                                                        promotion</p>

                                                    <div class="form-group">

                                                        <div class="form-check"
                                                             style="display: inline-block;margin-left: 5px;">
                                                            <label class="form-check-label">
                                                                <input class="form-check-input" type="radio"
                                                                       name="combine_with"
                                                                       value="0" checked> Cannot
                                                                <span class="circle">
                                                            <span class="check"></span>
                                                        </span>
                                                            </label>
                                                        </div>
                                                        <div class="form-check" style="display: inline-block;">
                                                            <label class="form-check-label">
                                                                <input class="form-check-input" type="radio"
                                                                       name="combine_with"
                                                                       value="1"> Can
                                                                <span class="circle">
                                                            <span class="check"></span>
                                                        </span>
                                                            </label>
                                                        </div>
                                                    </div>

                                                </div>

                                                <div class="col-sm-12">

                                                    <hr>

                                                    <p class="note">Ask which products and services can be redeemed with
                                                        100%
                                                        AmplePoints.</p>

                                                    <div class="form-group">

                                                        <div class="form-check"
                                                             style="display: inline-block;margin-left: 5px;">
                                                            <label class="form-check-label">
                                                                <input class="form-check-input" type="radio"
                                                                       name="ask_which_product" value="0"> No
                                                                <span class="circle">
                                                            <span class="check"></span>
                                                        </span>
                                                            </label>
                                                        </div>
                                                        <div class="form-check" style="display: inline-block;">
                                                            <label class="form-check-label">
                                                                <input class="form-check-input" type="radio"
                                                                       name="ask_which_product" value="1" checked> Yes
                                                                <span class="circle">
                                                            <span class="check"></span>
                                                        </span>
                                                            </label>
                                                        </div>
                                                    </div>

                                                </div>

                                                <div class="col-sm-12">

                                                    <hr>

                                                    <p class="note">Guest must mention gift card before ordering to let
                                                        the
                                                        business know that guest will be redeeming Gift Card in
                                                        advance </p>

                                                    <div class="form-group">

                                                        <div class="form-check"
                                                             style="display: inline-block;margin-left: 5px;">
                                                            <label class="form-check-label">
                                                                <input class="form-check-input" type="radio"
                                                                       name="inform_advance" value="0" checked> not
                                                                required
                                                                <span class="circle">
                                                            <span class="check"></span>
                                                        </span>
                                                            </label>
                                                        </div>
                                                        <div class="form-check" style="display: inline-block;">
                                                            <label class="form-check-label">
                                                                <input class="form-check-input" type="radio"
                                                                       name="inform_advance" value="1"> required
                                                                <span class="circle">
                                                            <span class="check"></span>
                                                        </span>
                                                            </label>
                                                        </div>
                                                    </div>

                                                </div>

                                                <div class="col-sm-12">

                                                    <hr>

                                                    <p class="note">Call for appointment after purchasing [required/not
                                                        required]</p>

                                                    <div class="form-group">

                                                        <div class="form-check"
                                                             style="display: inline-block;margin-left: 5px;">
                                                            <label class="form-check-label">
                                                                <input class="form-check-input" type="radio"
                                                                       name="is_appointment" value="0" checked> not
                                                                required
                                                                <span class="circle">
                                                            <span class="check"></span>
                                                        </span>
                                                            </label>
                                                        </div>
                                                        <div class="form-check" style="display: inline-block;">
                                                            <label class="form-check-label">
                                                                <input class="form-check-input" type="radio"
                                                                       name="is_appointment" value="1"> required
                                                                <span class="circle">
                                                            <span class="check"></span>
                                                        </span>
                                                            </label>
                                                        </div>
                                                    </div>

                                                </div>

                                                <div class="col-sm-12">

                                                    <hr>

                                                    <p class="note">No cash back. Must use entire amount in one time</p>

                                                    <div class="form-group">

                                                        <div class="form-check"
                                                             style="display: inline-block;margin-left: 5px;">
                                                            <label class="form-check-label">
                                                                <input class="form-check-input" type="radio"
                                                                       name="no_cash_back"
                                                                       value="0"> NO
                                                                <span class="circle">
                                                            <span class="check"></span>
                                                        </span>
                                                            </label>
                                                        </div>
                                                        <div class="form-check" style="display: inline-block;">
                                                            <label class="form-check-label">
                                                                <input class="form-check-input" type="radio"
                                                                       name="no_cash_back"
                                                                       value="1" checked> Yes
                                                                <span class="circle">
                                                            <span class="check"></span>
                                                        </span>
                                                            </label>
                                                        </div>
                                                    </div>

                                                </div>

                                                <div class="col-sm-12">

                                                    <hr>

                                                    <p class="note">No of Gift Card can be redeemed per guest per
                                                        visit</p>


                                                    <div class="form-group">
                                                        <label for="no_of_time" class="bmd-label-floating">No of Gift
                                                            Card</label>

                                                        <select name="no_of_time"
                                                                class="selectpicker searchdropdown gf_drp"
                                                                id="no_of_time" data-style="btn btn-primary btn-round"
                                                                data-live-search="true" data-size="7"
                                                                title="% of total bill">

                                                            <?php for ($i = 0; $i <= 100; $i++) { ?>
                                                                <option value="<?php echo $i; ?>" <?php if ($i == 1) {
                                                                    echo "selected";
                                                                } ?>><?php echo $i; ?></option>
                                                            <?php } ?>

                                                        </select>

                                                    </div>

                                                </div>

                                                <div class="col-sm-12">

                                                    <hr>

                                                    <p class="note">Final Sale</p>

                                                    <div class="form-group">

                                                        <div class="form-check"
                                                             style="display: inline-block;margin-left: 5px;">
                                                            <label class="form-check-label">
                                                                <input class="form-check-input" type="radio"
                                                                       name="final_sale"
                                                                       value="0"> No
                                                                <span class="circle">
                                                            <span class="check"></span>
                                                        </span>
                                                            </label>
                                                        </div>
                                                        <div class="form-check" style="display: inline-block;">
                                                            <label class="form-check-label">
                                                                <input class="form-check-input" type="radio"
                                                                       name="final_sale"
                                                                       value="1" checked> Yes
                                                                <span class="circle">
                                                            <span class="check"></span>
                                                        </span>
                                                            </label>
                                                        </div>
                                                    </div>

                                                </div>

                                                <div class="col-sm-12">

                                                    <hr>

                                                    <p class="note">Detail Note</p>

                                                    <div class="form-group">
                                                        <label for="detail_note" class="bmd-label-floating">Note</label>
                                                        <textarea class="form-control" name="detail_note"
                                                                  id="detail_note"></textarea>
                                                    </div>
                                                </div>

                                            </div>

                                        <?php } ?>


                                    <?php } else { ?>

                                        <input type="hidden" name="is_gift_available" value="0">

                                        <div class="row" id="gift_card_details" style="display: none;">


                                            <div class="col-sm-12 text-center">
                                                <hr>
                                                <h5 class="info-text">Please Fill Out The Gift Card Purchase
                                                    Details:</h5>
                                                <hr>
                                            </div>


                                            <div class="col-sm-12">

                                                <p class="note">Gift Card Transactions Without AmplePoints*</p>
                                                <p class="note">Sell Gift Cards With Cash (Customers cannot use
                                                    AmplePoints
                                                    in this purchase)</p>

                                                <div class="form-group">
                                                    <label for="gf_per_without_ample" class="bmd-label-floating">Discount
                                                        %
                                                        offered on Gift Cards</label>

                                                    <select name="gf_per_without_ample"
                                                            class="selectpicker searchdropdown gf_drp"
                                                            id="gf_per_without_ample"
                                                            data-style="btn btn-primary btn-round"
                                                            data-live-search="true" data-size="7" title="DISCOUNT">

                                                        <?php for ($i = 0; $i <= 100; $i++) { ?>
                                                            <option value="<?php echo $i; ?>" <?php if ($i == 20) {
                                                                echo "selected";
                                                            } ?>><?php echo $i; ?></option>
                                                        <?php } ?>

                                                    </select>

                                                </div>

                                                <p class="note">*No AmplePoints can be used with this purchase. No
                                                    AmplePoints are rewarded in this purchase.</p>

                                                <hr>

                                            </div>

                                            <div class="col-sm-12">

                                                <p class="note">Gift Card Transactions With AmplePoints*</p>
                                                <p class="note">Sell Gift Cards With Cash (Customers cannot use
                                                    AmplePoints
                                                    in this purchase)</p>

                                                <div class="form-group">
                                                    <label for="gf_per_with_ample" class="bmd-label-floating">AmplePoints
                                                        %
                                                        rewards offered on Gift Cards</label>

                                                    <select name="gf_per_with_ample"
                                                            class="selectpicker searchdropdown gf_drp"
                                                            id="gf_per_with_ample"
                                                            data-style="btn btn-primary btn-round"
                                                            data-live-search="true" data-size="7" title="DISCOUNT">

                                                        <?php for ($i = 0; $i <= 100; $i++) { ?>
                                                            <option value="<?php echo $i; ?>" <?php if ($i == 50) {
                                                                echo "selected";
                                                            } ?>><?php echo $i; ?></option>
                                                        <?php } ?>

                                                    </select>

                                                </div>

                                                <p class="note">*AmplePoints can be used to make this purchase.
                                                    Amplepoints
                                                    will be rewarded to the customer for this purchase. </p>
                                                <p class="note">**If you offer a discount over 50%, customers can buy
                                                    that
                                                    particular product for free using their AmplePoints.</p>

                                                <hr>

                                            </div>

                                            <div class="col-sm-12">

                                                <p class="note">Gift Card Hours of Use. Applicable hours for Gift Cards
                                                    to
                                                    be redeemed in store</p>

                                            </div>

                                            <div class="col-sm-12">
                                                <div class="form-group">

                                                    <div class="form-check"
                                                         style="display: inline-block;margin-left: 5px;">
                                                        <label class="form-check-label">
                                                            <input class="form-check-input nohours" type="radio"
                                                                   name="no_hours" value="1" checked> All the time
                                                            <span class="circle">
                                                            <span class="check"></span>
                                                        </span>
                                                        </label>
                                                    </div>
                                                    <div class="form-check" style="display: inline-block;">
                                                        <label class="form-check-label">
                                                            <input class="form-check-input nohours" type="radio"
                                                                   name="no_hours" value="0"> Specific Time
                                                            <span class="circle">
                                                            <span class="check"></span>
                                                        </span>
                                                        </label>
                                                    </div>
                                                </div>

                                            </div>

                                            <div class="multi-field-wrappergchr col-sm-12" id="specific_hours"
                                                 style="display: none;">

                                                <div class="multi-fields">

                                                    <div class="multi-field row">

                                                        <div class="col-sm-4">

                                                            <div class="form-group">
                                                                <label for="hr_day_1" class="bmd-label-floating">Slect
                                                                    Day</label>

                                                                <select name="hours_of_use[1][hr_day]"
                                                                        class="selectpicker searchdropdown"
                                                                        id="hr_day_1"
                                                                        data-style="btn btn-primary btn-round"
                                                                        data-live-search="true" data-size="7"
                                                                        title="Select Day">

                                                                    <option value="Monday">Monday</option>
                                                                    <option value="Tuesday">Tuesday</option>
                                                                    <option value="Wednsday">Wednsday</option>
                                                                    <option value="Thursday">Thursday</option>
                                                                    <option value="Friday">Friday</option>
                                                                    <option value="Saturday">Saturday</option>
                                                                    <option value="Sunnday">Sunnday</option>

                                                                </select>

                                                            </div>
                                                        </div>

                                                        <div class="col-sm-3 mtop45px">

                                                            <div class="form-group">
                                                                <label for="hr_start_time_1" class="bmd-label-floating">Start
                                                                    Time</label>
                                                                <input type="text" id="hr_start_time_1"
                                                                       name="hours_of_use[1][start_time]"
                                                                       class="form-control mytimepicker">

                                                            </div>
                                                        </div>

                                                        <div class="col-sm-3 mtop45px">

                                                            <div class="form-group">
                                                                <label for="hr_end_time_1" class="bmd-label-floating">End
                                                                    Time</label>
                                                                <input type="text" id="hr_end_time_1"
                                                                       name="hours_of_use[1][end_time]"
                                                                       class="form-control mytimepicker">

                                                            </div>
                                                        </div>

                                                        <button type="button"
                                                                class="remove-field btn btn-danger col-sm-2"
                                                                style="margin: 45px 0px 15px 0px;"><i
                                                                    class="material-icons">clear</i> Remove
                                                        </button>

                                                    </div>

                                                </div>

                                                <button type="button" class="btn btn-primary add-field"><i
                                                            class="material-icons">add</i> Add Another Day Time
                                                </button>

                                            </div>

                                            <div class="col-sm-12">

                                                <hr>

                                                <p class="note">Gift Card can be redeemed for</p>

                                            </div>

                                            <div class="col-sm-12">
                                                <div class="form-group">

                                                    <div class="form-check"
                                                         style="display: inline-block;margin-left: 5px;">
                                                        <label class="form-check-label">
                                                            <input class="form-check-input redeemedfor" type="radio"
                                                                   name="redeemed_for" value="0" checked> regular priced
                                                            items
                                                            <span class="circle">
                                                            <span class="check"></span>
                                                        </span>
                                                        </label>
                                                    </div>
                                                    <div class="form-check" style="display: inline-block;">
                                                        <label class="form-check-label">
                                                            <input class="form-check-input redeemedfor" type="radio"
                                                                   name="redeemed_for" value="1"> special priced items
                                                            <span class="circle">
                                                            <span class="check"></span>
                                                        </span>
                                                        </label>
                                                    </div>
                                                </div>

                                            </div>

                                            <div class="col-sm-12" id="price_sheet_div" style="display: none;">

                                                <p class="note">Please provide special price sheet</p>

                                                <div class="fileinput fileinput-new text-center"
                                                     data-provides="fileinput">
                                                    <div class="fileinput-new thumbnail">
                                                        <img src="<?php echo $baseurl; ?>/admin_dir/material/img/image_placeholder.jpg"
                                                             alt="...">
                                                    </div>
                                                    <div class="fileinput-preview fileinput-exists thumbnail"></div>
                                                    <div>
                                                    <span class="btn btn-rose btn-round btn-file expect_dark_gradiant_bg">
                                                        <span class="fileinput-new">select sheet </span>
                                                        <span class="fileinput-exists">Change</span>
                                                        <input type="file" id="price_sheet" name="price_sheet"/>
                                                    </span>
                                                        <a href="#pablo"
                                                           class="btn btn-danger btn-round fileinput-exists"
                                                           data-dismiss="fileinput"><i class="fa fa-times"></i>
                                                            Remove</a>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="col-sm-12">

                                                <hr>

                                                <p class="note">Gift Card can be redeemed on % of total bill</p>


                                                <div class="form-group">
                                                    <label for="per_of_bill" class="bmd-label-floating">% of total
                                                        bill</label>

                                                    <select name="per_of_bill"
                                                            class="selectpicker searchdropdown gf_drp"
                                                            id="per_of_bill" data-style="btn btn-primary btn-round"
                                                            data-live-search="true" data-size="7"
                                                            title="% of total bill">

                                                        <?php for ($i = 0; $i <= 100; $i++) { ?>
                                                            <option value="<?php echo $i; ?>" <?php if ($i == 50) {
                                                                echo "selected";
                                                            } ?>><?php echo $i; ?></option>
                                                        <?php } ?>

                                                    </select>

                                                </div>

                                            </div>

                                            <div class="col-sm-12">

                                                <hr>

                                                <p class="note">[Cannot/Can] be used or combined with any other
                                                    promotion</p>

                                                <div class="form-group">

                                                    <div class="form-check"
                                                         style="display: inline-block;margin-left: 5px;">
                                                        <label class="form-check-label">
                                                            <input class="form-check-input" type="radio"
                                                                   name="combine_with"
                                                                   value="0" checked> Cannot
                                                            <span class="circle">
                                                            <span class="check"></span>
                                                        </span>
                                                        </label>
                                                    </div>
                                                    <div class="form-check" style="display: inline-block;">
                                                        <label class="form-check-label">
                                                            <input class="form-check-input" type="radio"
                                                                   name="combine_with"
                                                                   value="1"> Can
                                                            <span class="circle">
                                                            <span class="check"></span>
                                                        </span>
                                                        </label>
                                                    </div>
                                                </div>

                                            </div>

                                            <div class="col-sm-12">

                                                <hr>

                                                <p class="note">Ask which products and services can be redeemed with
                                                    100%
                                                    AmplePoints.</p>

                                                <div class="form-group">

                                                    <div class="form-check"
                                                         style="display: inline-block;margin-left: 5px;">
                                                        <label class="form-check-label">
                                                            <input class="form-check-input" type="radio"
                                                                   name="ask_which_product" value="0"> No
                                                            <span class="circle">
                                                            <span class="check"></span>
                                                        </span>
                                                        </label>
                                                    </div>
                                                    <div class="form-check" style="display: inline-block;">
                                                        <label class="form-check-label">
                                                            <input class="form-check-input" type="radio"
                                                                   name="ask_which_product" value="1" checked> Yes
                                                            <span class="circle">
                                                            <span class="check"></span>
                                                        </span>
                                                        </label>
                                                    </div>
                                                </div>

                                            </div>

                                            <div class="col-sm-12">

                                                <hr>

                                                <p class="note">Guest must mention gift card before ordering to let the
                                                    business know that guest will be redeeming Gift Card in advance </p>

                                                <div class="form-group">

                                                    <div class="form-check"
                                                         style="display: inline-block;margin-left: 5px;">
                                                        <label class="form-check-label">
                                                            <input class="form-check-input" type="radio"
                                                                   name="inform_advance" value="0" checked> not required
                                                            <span class="circle">
                                                            <span class="check"></span>
                                                        </span>
                                                        </label>
                                                    </div>
                                                    <div class="form-check" style="display: inline-block;">
                                                        <label class="form-check-label">
                                                            <input class="form-check-input" type="radio"
                                                                   name="inform_advance" value="1"> required
                                                            <span class="circle">
                                                            <span class="check"></span>
                                                        </span>
                                                        </label>
                                                    </div>
                                                </div>

                                            </div>

                                            <div class="col-sm-12">

                                                <hr>

                                                <p class="note">Call for appointment after purchasing [required/not
                                                    required]</p>

                                                <div class="form-group">

                                                    <div class="form-check"
                                                         style="display: inline-block;margin-left: 5px;">
                                                        <label class="form-check-label">
                                                            <input class="form-check-input" type="radio"
                                                                   name="is_appointment" value="0" checked> not required
                                                            <span class="circle">
                                                            <span class="check"></span>
                                                        </span>
                                                        </label>
                                                    </div>
                                                    <div class="form-check" style="display: inline-block;">
                                                        <label class="form-check-label">
                                                            <input class="form-check-input" type="radio"
                                                                   name="is_appointment" value="1"> required
                                                            <span class="circle">
                                                            <span class="check"></span>
                                                        </span>
                                                        </label>
                                                    </div>
                                                </div>

                                            </div>

                                            <div class="col-sm-12">

                                                <hr>

                                                <p class="note">No cash back. Must use entire amount in one time</p>

                                                <div class="form-group">

                                                    <div class="form-check"
                                                         style="display: inline-block;margin-left: 5px;">
                                                        <label class="form-check-label">
                                                            <input class="form-check-input" type="radio"
                                                                   name="no_cash_back"
                                                                   value="0"> NO
                                                            <span class="circle">
                                                            <span class="check"></span>
                                                        </span>
                                                        </label>
                                                    </div>
                                                    <div class="form-check" style="display: inline-block;">
                                                        <label class="form-check-label">
                                                            <input class="form-check-input" type="radio"
                                                                   name="no_cash_back"
                                                                   value="1" checked> Yes
                                                            <span class="circle">
                                                            <span class="check"></span>
                                                        </span>
                                                        </label>
                                                    </div>
                                                </div>

                                            </div>

                                            <div class="col-sm-12">

                                                <hr>

                                                <p class="note">No of Gift Card can be redeemed per guest per visit</p>


                                                <div class="form-group">
                                                    <label for="no_of_time" class="bmd-label-floating">No of Gift
                                                        Card</label>

                                                    <select name="no_of_time" class="selectpicker searchdropdown gf_drp"
                                                            id="no_of_time" data-style="btn btn-primary btn-round"
                                                            data-live-search="true" data-size="7"
                                                            title="% of total bill">

                                                        <?php for ($i = 0; $i <= 100; $i++) { ?>
                                                            <option value="<?php echo $i; ?>" <?php if ($i == 1) {
                                                                echo "selected";
                                                            } ?>><?php echo $i; ?></option>
                                                        <?php } ?>

                                                    </select>

                                                </div>

                                            </div>

                                            <div class="col-sm-12">

                                                <hr>

                                                <p class="note">Final Sale</p>

                                                <div class="form-group">

                                                    <div class="form-check"
                                                         style="display: inline-block;margin-left: 5px;">
                                                        <label class="form-check-label">
                                                            <input class="form-check-input" type="radio"
                                                                   name="final_sale"
                                                                   value="0"> No
                                                            <span class="circle">
                                                            <span class="check"></span>
                                                        </span>
                                                        </label>
                                                    </div>
                                                    <div class="form-check" style="display: inline-block;">
                                                        <label class="form-check-label">
                                                            <input class="form-check-input" type="radio"
                                                                   name="final_sale"
                                                                   value="1" checked> Yes
                                                            <span class="circle">
                                                            <span class="check"></span>
                                                        </span>
                                                        </label>
                                                    </div>
                                                </div>

                                            </div>

                                            <div class="col-sm-12">

                                                <hr>

                                                <p class="note">Detail Note</p>

                                                <div class="form-group">
                                                    <label for="detail_note" class="bmd-label-floating">Note</label>
                                                    <textarea class="form-control" name="detail_note"
                                                              id="detail_note"></textarea>
                                                </div>
                                            </div>

                                        </div>

                                    <?php } ?>

                                </div>
