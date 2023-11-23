
{{-- 0=not display
1=display --}}
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
                                                                   name="is_free_product" value="0" checked> No
                                                            <span class="circle">
                                                            <span class="check"></span>
                                                        </span>
                                                        </label>
                                                    </div>
                                                    <div class="form-check" style="display: inline-block;">
                                                        <label class="form-check-label">
                                                            <input class="form-check-input is_free_product_yes"
                                                                   type="radio"
                                                                   name="is_free_product" value="1"> Yes
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
                                                           id="p_retail" value="" required>

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
                                                           id="p_wholesel" value="" required>

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
                                                           id="discount_amplifyon" value="0.00%" disabled="disabled">

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
                                                               name="is_without_ample" value="0" checked> No
                                                        <span class="circle">
                                                            <span class="check"></span>
                                                        </span>
                                                    </label>
                                                </div>
                                                <div class="form-check" style="display: inline-block;">
                                                    <label class="form-check-label">
                                                        <input class="form-check-input without_yes" type="radio"
                                                               name="is_without_ample" value="1"> Yes
                                                        <span class="circle">
                                                            <span class="check"></span>
                                                        </span>
                                                    </label>
                                                </div>
                                            </div>

                                        </div>

                                        <div class="col-sm-6" id="display_without_ample" style="display: none;">
                                            <div class="input-group form-control-lg">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text">
                                                        <i class="material-icons">sell</i>
                                                    </span>
                                                </div>
                                                <div class="form-group">
                                                    <label for="wholesel_without_ample" class="bmd-label-floating">Wholesale
                                                        Price For Without Ample</label>

                                                    <input type="number" name="wholesel_without_ample"
                                                           class="form-control" id="wholesel_without_ample" value="">

                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-sm-6" id="display_discount_without_ample"
                                             style="display: none;">
                                            <div class="input-group form-control-lg">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text">
                                                        <i class="material-icons">loyalty</i>
                                                    </span>
                                                </div>
                                                <div class="form-group is-filled">
                                                    <label for="discount_without_ample" class="bmd-label-floating">Discount
                                                        Without Amplepoints</label>

                                                    <input type="text" name="discount_without_ample"
                                                           class="form-control" id="discount_without_ample"
                                                           value="0.00%" disabled="disabled">

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

                                                                <input type="number"
                                                                       name="date_wise_detail[1][newprices]"
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

                                                                <input type="number"
                                                                       name="date_wise_detail[1][wholesel]"
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

                                                                <input type="text"
                                                                       name="date_wise_detail[1][discount_amp]"
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
                                                                       class="form-control" id="dtp_quantity_1"
                                                                       value="">

                                                            </div>
                                                        </div>
                                                    </div>


                                                    <button type="button" class="remove-field btn btn-danger col-sm-2"
                                                            style="margin-left: 82%;"><i
                                                                class="material-icons">clear</i> Remove
                                                    </button>

                                                </div>
                                            </div>
                                            <button type="button" class="btn btn-primary add-field"
                                                    style="margin-left: 25px"><i class="material-icons">add</i> Add
                                                Another Date Wise Price
                                            </button>
                                        </div>


                                        <div class="col-sm-12" id="contact_me_price" style="display: none;">

                                            <hr>

                                            <div style="margin-left: 25px;">

                                                <span>Enable Contact me Only Without Price </span>

                                                <input type="button" id="enblctmpricing" onclick="toggledctmtdiv()"
                                                       class="btn btn-success"
                                                       value="Click To Enable Contact me Only Without Price"
                                                       style="color: #fff;">
                                            </div>

                                        </div>

                                        <div class="col-sm-12" id="ctmfields" style="display: none;">

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
                                                                   value="">

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
                                                            <label for="ctm_no_of_amples" class="bmd-label-floating">Buy
                                                                & Earn</label>

                                                            <input type="text" name="ctm_no_of_amples"
                                                                   class="form-control" id="ctm_no_of_amples" value="">

                                                        </div>
                                                    </div>
                                                </div>

                                            </div>

                                        </div>


                                        <div class="col-sm-12">
                                            <hr>
                                            <div class="form-group" style="margin-left: 25px;">
                                                <label for="offerS" class="bmd-label-floating">Select Apply Button For
                                                    Offer Price: </label>
                                                <div class="form-check" style="display: inline-block;margin-left: 5px;">
                                                    <label class="form-check-label">
                                                        <input class="form-check-input apply_offer" type="radio"
                                                               name="offerS" value="3"> Apply
                                                        <span class="circle">
                                                            <span class="check"></span>
                                                        </span>
                                                    </label>
                                                </div>
                                                <div class="form-check" style="display: inline-block;">
                                                    <label class="form-check-label">
                                                        <input class="form-check-input not_apply_offer" type="radio"
                                                               name="offerS" value="4" checked> Don't Apply
                                                        <span class="circle">
                                                            <span class="check"></span>
                                                        </span>
                                                    </label>
                                                </div>
                                            </div>

                                        </div>

                                        <div class="col-sm-12" id="offer_box" style="display: none;">


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
                                                                   id="p_offer" value="">

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
                                                                   value="">

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
                                                                   value="">

                                                        </div>
                                                    </div>
                                                </div>

                                            </div>

                                        </div>

                                        <div class="col-sm-12">

                                            <div class="form-group">

                                                <label for="promess" class="bmd-label-floating">Product Message</label>

                                                <textarea name="promess" id="promess" class="form-control"
                                                          required></textarea>

                                            </div>

                                        </div>


                                    </div>
                                </div>
