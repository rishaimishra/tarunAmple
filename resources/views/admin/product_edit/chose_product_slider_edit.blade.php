   <div class="tab-pane" id="product_slider_details">
                                <h5 class="info-text"> Let's start with the Sliders Details</h5>
                                <div class="row">

                                    <div class="col-sm-3">
                                        <div class="form-group">
                                            <label for="lmorevendor" class="bmd-label-floating">Select Vendor</label>
                                            <select class="selectpicker searchdropdown mtop35px" name="lmorevendor"
                                                    id="lmorevendor" multiple data-style="btn btn-primary btn-round"
                                                    data-live-search="true" data-size="7" title="Select Category">

                                                <?php foreach ($this->vendordata as $key) { ?>
                                                    <option value="<?php echo $key['tbl_vndr_id']; ?>" <?php if ($selectvendorky != 0) {
                                                        if ($selectvendorky == $key['tbl_vndr_id']) {
                                                            echo "selected='selected'";
                                                        }
                                                    } ?>><?php echo $key['vendor_displayname']; ?></option>
                                                <?php } ?>

                                            </select>
                                        </div>

                                    </div>

                                    <div class="col-sm-3">
                                        <div class="form-group">
                                            <label for="lmorecategory" class="bmd-label-floating">Select
                                                Category</label>
                                            <select class="selectpicker searchdropdown mtop35px" name="lmorecategory"
                                                    id="lmorecategory" multiple data-style="btn btn-primary btn-round"
                                                    data-live-search="true" data-size="7" title="Select Category"
                                                    onchange="getSubcategory();">
                                                <option value="">Select Category</option>
                                                <?php foreach ($this->mcategorydata as $key) { ?>
                                                    <option value="<?php echo $key['id']; ?>"><?php echo $key['category_name']; ?></option>
                                                <?php } ?>
                                            </select>
                                        </div>

                                    </div>

                                    <div class="col-sm-3">
                                        <div class="form-group">
                                            <label for="lmoresubcategory" class="bmd-label-floating">Sub
                                                Category</label>
                                            <select class="selectpicker searchdropdown mtop35px" name="lmoresubcategory"
                                                    id="lmoresubcategory" multiple
                                                    data-style="btn btn-primary btn-round" data-live-search="true"
                                                    data-size="7" title="Sub Category" onchange="getSub2category();">
                                                <option value="">Sub Category</option>

                                            </select>
                                        </div>

                                    </div>

                                    <div class="col-sm-3">
                                        <div class="form-group">
                                            <label for="lmoresub2category" class="bmd-label-floating">Sub Category
                                                2</label>
                                            <select class="selectpicker searchdropdown mtop35px"
                                                    name="lmoresub2category" id="lmoresub2category" multiple
                                                    data-style="btn btn-primary btn-round" data-live-search="true"
                                                    data-size="7" title="Sub Category 2">
                                                <option value="">Sub Category 2</option>

                                            </select>
                                        </div>

                                    </div>

                                    <div class="col-sm-12">
                                        <input type="hidden" id="rownew" name="rownew" value="0">
                                        <button type="button" class="btn btn-primary mtop45px loadprod">Load Products
                                        </button>
                                    </div>

                                    <div class="col-sm-12">

                                        <hr>

                                        <div class="table-responsive">

                                            <table class="table table-striped">
                                                <thead>
                                                <tr>
                                                    <th width="20%">Product Image</th>
                                                    <th width="20%">Product Title</th>
                                                    <th width="15%">Related Product Slider</th>
                                                    <th width="15%">You Might Also Like Slider</th>
                                                    <th width="15%">On Sale Product Slider</th>
                                                    <th width="15%">Offer Product Slider</th>
                                                </tr>
                                                </thead>
                                                <tbody id="product_list">


                                                </tbody>
                                            </table>
                                        </div>

                                    </div>

                                    <div class="col-sm-12 text-center myloadmorenew" style="display: none;">
                                        <input type="hidden" id="rownew" name="rownew" value="0">
                                        <button type="button" onclick="custloadmoreprod();"
                                                class="btn btn-primary mtop45px loadcustmore">Load More Products
                                        </button>
                                    </div>


                                </div>
                            </div>