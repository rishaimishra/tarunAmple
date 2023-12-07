
                            <div class="tab-pane" id="product_images_details">
                                <h5 class="info-text"> Let's start with the Images Details</h5>
                                <div class="row">

                                    <div class="col-sm-12" style="margin-bottom: 20px;">
                                        <hr>
                                        <span>Available Product Images</span>
                                    </div>

                                    <?php foreach ($product_images as $key) { ?>

                                        <div class="col-md-4" id="removeimage_<?php echo $key->id; ?>">

                                            <div class="fileinput fileinput-new text-center">
                                                <div class="fileinput-new thumbnail">
                                                    <img class="myImg" onclick="showImagePopup(this);"
                                                         src="https://amplepoints.com/product_images/{{$key->product_id}}/{{$key->image_name}}"
                                                         alt="...">
                                                </div>
                                                <div class="fileinput-preview fileinput-exists thumbnail"></div>

                                            </div>

                                            <button type="button" class="btn btn-danger btn-round"
                                                    style="float: right;padding: 11px 11px;margin: -15px 0px 0px 25px;position: absolute;left: 215px;"
                                                    onclick="deletepimg('<?php echo $key->id; ?>');">
                                                <i class="material-icons">clear</i>
                                                <div class="ripple-container"></div>
                                            </button>

                                        </div>

                                    <?php } ?>

                                    <div class="col-sm-12" style="margin-bottom: 20px;">
                                        <hr>
                                        <span>Product Main Images (size=700*850 pixel)</span>
                                    </div>

                                    <div class="col-sm-12">

                                        <div class="fileinput fileinput-new text-center" data-provides="fileinput">
                                            <div class="fileinput-new thumbnail">
                                                <img src="<?php echo $baseurl; ?>/admin_dir/material/img/image_placeholder.jpg"
                                                     alt="...">
                                            </div>
                                            <div class="fileinput-preview fileinput-exists thumbnail"></div>
                                            <div>
                                                    <span class="btn btn-rose btn-round btn-file expect_dark_gradiant_bg">
                                                        <span class="fileinput-new">Select image</span>
                                                        <span class="fileinput-exists">Change</span>
                                                        <input type="file" id="file" name="file-1"/>
                                                    </span>
                                                <a href="#pablo" class="btn btn-danger btn-round fileinput-exists"
                                                   data-dismiss="fileinput"><i class="fa fa-times"></i> Remove</a>
                                            </div>
                                        </div>
                                    </div>


                                    <div class="col-sm-12" style="margin-bottom: 20px;">
                                        <hr>
                                        <span>Product Detail Images (size=700*850 pixel)</span>
                                    </div>

                                    <div class="multi-field-wrapper-files col-sm-12">

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
                                                                <input type="file" id="file_1" name="file[]"/>
                                                            </span>
                                                        <a href="#pablo"
                                                           class="btn btn-danger btn-round fileinput-exists"
                                                           data-dismiss="fileinput"><i class="fa fa-times"></i>
                                                            Remove</a>
                                                    </div>
                                                </div>

                                                <button type="button" class="btn btn-danger btn-round remove-field"
                                                        style="float: right;padding: 11px 11px;margin: -15px 0px 0px 25px;position: absolute;left: 215px;">
                                                    <i class="material-icons">clear</i>
                                                    <div class="ripple-container"></div>
                                                </button>

                                            </div>

                                        </div>

                                        <button type="button" class="btn btn-primary btn-round add-field">
                                            <i class="material-icons">add</i> Add Another Image
                                            <div class="ripple-container"></div>
                                        </button>

                                    </div>

                                </div>
                            </div>