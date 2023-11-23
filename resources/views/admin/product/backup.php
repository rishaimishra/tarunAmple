@extends('admin.admin_includes.layout')
{{-- head section --}}
@section('head')
@include('admin.admin_includes.admin_head')
{{-- Include additional CSS or scripts if needed --}}
@endsection
{{-- title section --}}
@section('title')
<title>Amplepoint | Product Add</title>
@endsection
{{-- sidebar section --}}
@section('sideber')
@include('admin.admin_includes.admin_sideber')
@endsection

@section('content')
@include('includes.message')
<?php
$coutryValueOption = '<option value="0">Select Country</option>';
$allCountry=DB::table('tbl_countries')->get();
foreach ($allCountry as $contdellst) {
$countryId = $contdellst->id;
$countryName = $contdellst->name;
$coutryValueOption .= '<option  value=' . '"' . "$countryId" . '"' . '>' . str_replace("'", " ", $countryName) . '</option>';
}
$stateValueOption = '<option value="">Select State</option>';
$allState=DB::table('tbl_states')->get();
foreach ($allState as $getdelst) {
$stateId = $getdelst->stateid;
$statename = $getdelst->statename;
$stateValueOption .= '<option  value=' . '"' . "$stateId" . '"' . '>' . str_replace("'", " ", $statename) . '</option>';
}
$cityValueOption = '<option value="">Select City</option> ';
$allCity=DB::table('tbl_cities')->get();
foreach ($allCity as $getdelcity) {
$cityId = $getdelcity->id;
$cityname = $getdelcity->name;
$cityValueOption .= '<option  value=' . '"' . "$cityId" . '"' . '>' . str_replace("'", " ", $cityname) . '</option>';
}
$timeArray = array('12:00 AM', '12:15 AM', '12:30 AM', '12:45 AM', '1:00 AM', '1:15 AM', '1:30 AM', '1:45 AM', '2:00 AM', '2:15 AM', '2:30 AM', '2:45 AM', '3:00 AM', '3:15 AM', '3:30 AM', '4:00 AM', '4:15 AM', '4:30 AM', '4:45 AM', '5:00 AM', '5:15 AM', '5:30 AM', '5:45 AM', '6:00 AM', '6:15 AM', '6:30 AM', '6:45 AM', '7:00 AM', '7:15 AM', '7:30 AM', '7:45 AM', '8:00 AM', '8:15 AM', '8:30 AM', '8:45 AM', '9:00 AM', '9:15 AM', '9:30 AM', '9:45 AM', '10:00 AM', '10:15 AM', '10:30 AM', '10:45 AM', '11:00 AM', '11:15 AM', '11:30 AM', '11:45 AM', '12:00 PM', '12:00 PM', '12:15 PM', '12:30 PM', '12:45 PM', '1:00 PM', '1:15 PM', '1:30 PM', '1:45 PM', '2:00 PM', '2:15 PM', '2:30 PM', '2:45 PM', '3:00 PM', '3:15 PM', '3:30 PM', '4:00 PM', '4:15 PM', '4:30 PM', '4:45 PM', '5:00 PM', '5:15 PM', '5:30 PM', '5:45 PM', '6:00 PM', '6:15 PM', '6:30 PM', '6:45 PM', '7:00 PM', '7:15 PM', '7:30 PM', '7:45 PM', '8:00 PM', '8:15 PM', '8:30 PM', '8:45 PM', '9:00 PM', '9:15 PM', '9:30 PM', '9:45 PM', '10:00 PM', '10:15 PM', '10:30 PM', '10:45 PM', '11:00 PM', '11:15 PM', '11:30 PM', '11:45 PM');
$TimeValueOption = '<option value="">Select Time</option> ';
foreach ($timeArray as $key => $value) {
$timedata = $value;
$TimeValueOption .= '<option value=' . '"' . "$timedata" . '"' . '>' . $timedata . '</option>';
}

$baseurl=url('/');
?>

   <div class="content resp_nopadding">
    <div class="container-fluid resp_nopadding">


        <div class="col-md-12 col-12 mr-auto ml-auto">
            <!--      Wizard container        -->
            <div class="wizard-container">
                <div class="card card-wizard active" data-color="rose" id="wizardProfile">
                    <form method="POST" action="" enctype="multipart/form-data">
                        <!--        You can switch " data-color="primary" "  with one of the next bright colors: "green", "orange", "red", "blue"       -->

                        <div class="row">

                            <div class="col-sm-12">

                                @include('includes.message')

                            </div>
                        </div>

                        <div class="card-header text-center">
                            <h3 class="card-title">
                                Add Your Store Product
                            </h3>
                            <h5 class="card-description">This information will let us know more about Your
                                Products.</h5>
                        </div>
                        <div class="wizard-navigation">
                            <ul class="nav nav-pills">
                                <li class="nav-item">
                                    <a class="nav-link active" href="#product_basic_details" data-toggle="tab"
                                       role="tab">
                                        Basic Details
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="#product_category_details" data-toggle="tab" role="tab">
                                        Chose Categories
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="#product_price_details" data-toggle="tab" role="tab">
                                        Pricing Details
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="#product_slider_details" data-toggle="tab" role="tab">
                                        Chose Product Sliders
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="#product_images_details" data-toggle="tab" role="tab">
                                        Chose Product Images
                                    </a>
                                </li>
                            </ul>
                        </div>
                        <div class="card-body">
                            <div class="tab-content">
















                                <div class="tab-pane active" id="product_basic_details">
                                    <h5 class="info-text"> Let's start with the Basic Details</h5>
                                    <div class="row">

                                        <?php if (Auth::guard('admin')->user()->utype == 1 || Auth::guard('admin')->user()->utype == 4) { ?>

                                            <div class="col-sm-12">
                                                <div class="form-group">
                                                    <label for="vamplifyon" class="bmd-label-floating">Product Added By
                                                        : </label>
                                                    <div class="form-check"
                                                         style="display: inline-block;margin-left: 5px;">
                                                        <label class="form-check-label">
                                                            <input class="form-check-input vampli" type="radio"
                                                                   name="vamplifyon" value="5" checked> AmpleMall
                                                            <span class="circle">
                                                                <span class="check"></span>
                                                            </span>
                                                        </label>
                                                    </div>
                                                    <div class="form-check" style="display: inline-block;">
                                                        <label class="form-check-label">
                                                            <input class="form-check-input vamplis" type="radio"
                                                                   name="vamplifyon" value="6"> Vendors
                                                            <span class="circle">
                                                                <span class="check"></span>
                                                            </span>
                                                        </label>
                                                    </div>
                                                </div>

                                            </div>



                                            <div class="col-sm-12 vendorsl" style="display:none;">
                                                <div class="form-group">
                                                    <label for="pvendorId" class="bmd-label-floating">Select
                                                        Vendor</label>
                                                    <select class="selectpicker searchdropdown pvendor" name="p_vendor"
                                                            id="pvendorId" data-style="btn btn-primary btn-round"
                                                            data-live-search="true" data-size="7" title="Select Vendor"
                                                            onchange="VendorEvents(this.value);">
                                                       <?php foreach ($vendor_data as $val) { ?>
                                                            <option value="{{$val->tbl_vndr_id}}">{{$val->tbl_vndr_dispname}}</option>
                                                        <?php } ?>
                                                    </select>
                                                </div>

                                            </div>

                                            <input type="hidden" id="showVendorName" name="showVendorName"/>

                                        <?php } ?>

                                        <div class="col-sm-12">

                                            <div class="form-group">
                                                <label for="p_title" class="bmd-label-floating">Product Title</label>
                                                <input type="text" class="form-control" name="p_title" id="p_title"
                                                       required>
                                            </div>
                                        </div>

                                        <div class="col-sm-6">

                                            <div class="form-group">
                                                <label for="d_p_title" class="bmd-label-floating">Product
                                                    Description</label>
                                                <textarea class="form-control" name="d_p_title" id="d_p_title"
                                                          required></textarea>
                                            </div>
                                        </div>

                                        <div class="col-sm-6">

                                            <div class="form-group">
                                                <label for="meta_title" class="bmd-label-floating">Meta Title</label>
                                                <textarea class="form-control" name="meta_title"
                                                          id="meta_title"></textarea>
                                            </div>
                                        </div>

                                        <div class="col-sm-6">

                                            <div class="form-group">
                                                <label for="meta_description" class="bmd-label-floating">Meta
                                                    description</label>
                                                <textarea class="form-control" name="meta_description"
                                                          id="meta_description"></textarea>
                                            </div>
                                        </div>

                                        <div class="col-sm-6">

                                            <div class="form-group">
                                                <label for="meta_keyword" class="bmd-label-floating">Meta
                                                    keywords</label>
                                                <textarea class="form-control" name="meta_keyword"
                                                          id="meta_keyword"></textarea>
                                            </div>
                                        </div>

                                        <div class="col-md-12 col-sm-12">

                                            <h4 class="title">Produc Detail Image</h4>

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

                                                <button type="button" class="btn btn-primary btn-round add-field">
                                                    <i class="material-icons">add</i> Add Another Image
                                                    <div class="ripple-container"></div>
                                                </button>

                                            </div>

                                        </div>

                                        <div class="col-sm-6">

                                            <div class="form-group">
                                                <label for="p_sku" class="bmd-label-floating">SKU</label>
                                                <input type="text" class="form-control" name="p_sku" id="p_sku"
                                                       required>
                                            </div>
                                        </div>

                                        <div class="col-sm-6">

                                            <div class="form-group">
                                                <label for="p_qty" class="bmd-label-floating">Product Qty</label>
                                                <input type="number" class="form-control" name="p_qty" id="p_qty"
                                                       required>
                                            </div>
                                        </div>

                                        <div class="col-sm-6">
                                            <div class="form-group">
                                                <label for="salert" class="bmd-label-floating">Stock Alert : </label>
                                                <div class="form-check" style="display: inline-block;margin-left: 5px;">
                                                    <label class="form-check-label">
                                                        <input class="form-check-input salertradio" type="radio"
                                                               name="salert" value="1"> Yes
                                                        <span class="circle">
                                                            <span class="check"></span>
                                                        </span>
                                                    </label>
                                                </div>
                                                <div class="form-check" style="display: inline-block;">
                                                    <label class="form-check-label">
                                                        <input class="form-check-input salertradio" type="radio"
                                                               name="salert" value="2" checked> No
                                                        <span class="circle">
                                                            <span class="check"></span>
                                                        </span>
                                                    </label>
                                                </div>
                                            </div>

                                        </div>

                                        <div class="col-sm-6" style="display:none;" id="stockqty1">

                                            <div class="form-group">
                                                <label for="stockqty" class="bmd-label-floating">Enter minimum quantity
                                                    to show stock alert</label>
                                                <input type="number" class="form-control" name="stockqty" id="stockqty">
                                            </div>

                                        </div>

                                        <div class="col-sm-6">
                                            <div class="form-group">
                                                <label for="typepro" class="bmd-label-floating">Type of Product</label>
                                                <select class="selectpicker" name="type_of_pro" id="typepro"
                                                        data-style="btn btn-primary btn-round" data-live-search="false"
                                                        data-size="7" title="Type of Product" required>
                                                    <option value="">Type of Product</option>
                                                    <option value="0">Add To Cart</option>
                                                    <option value="1">Contact Me</option>
                                                </select>
                                            </div>

                                        </div>

                                        <div class="col-sm-6" id="vendoremail" style="display:none;">

                                            <div class="form-group">
                                                <label for="vemail" class="bmd-label-floating">Email Address</label>
                                                <input type="email" class="form-control" id="vemail" name="vemail">
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
                                                           class="form-check-input del_checkbox"> PickUp/Dining
                                                    <span class="form-check-sign">
                                                        <span class="check"></span>
                                                    </span>
                                                </label>
                                            </div>
                                            <div class="form-check form-check-inline">
                                                <label class="form-check-label">
                                                    <input type="checkbox" id="online" name="online" value="online"
                                                           class="form-check-input del_checkbox"> Online
                                                    <span class="form-check-sign">
                                                        <span class="check"></span>
                                                    </span>
                                                </label>
                                            </div>
                                            <div class="form-check form-check-inline">
                                                <label class="form-check-label">
                                                    <input type="checkbox" id="delivery" name="delivery"
                                                           value="delivery" class="form-check-input del_checkbox">
                                                    Delivery
                                                    <span class="form-check-sign">
                                                        <span class="check"></span>
                                                    </span>
                                                </label>
                                            </div>
                                            <div class="form-check form-check-inline">
                                                <label class="form-check-label">
                                                    <input type="checkbox" id="shipping" name="shipping"
                                                           value="shipping" class="form-check-input del_checkbox">
                                                    Shipping
                                                    <span class="form-check-sign">
                                                        <span class="check"></span>
                                                    </span>
                                                </label>
                                            </div>
                                        </div>

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

                                            <div class="col-sm-12" id="pics" style="margin-top: 25px;display: none;">

                                                <div class="multi-field-wrapperpicaddress">
                                                    <div class="multi-fields">
                                                        <div class="multi-field">

                                                            <div class="form-group" style="width: 80%;float: left;">
                                                                <label for="address_1" class="bmd-label-floating">PicuUp
                                                                    Address</label>
                                                                <textarea id="address_1" name="picaddress[]"
                                                                          class="form-control"></textarea>
                                                            </div>

                                                            <button type="button" class="remove-field btn btn-danger"
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

                                        <div class="col-sm-12" id="onlineloc" style="display:none;">

                                            <div class="multi-field-wrapperonlineadd">
                                                <div class="multi-fields">
                                                    <div class="multi-field">

                                                        <div class="form-group" style="width: 80%;float: left;">
                                                            <label for="online_address_1" class="bmd-label-floating">Online
                                                                Address</label>
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
                                                            class="material-icons">add</i> Add Another Online Address
                                                </button>
                                            </div>


                                        </div>

                                        <div class="col-sm-12" id="diliveradddilv" style="display:none;">

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
                                                            <option value="free" selected="selected">Free Delivery
                                                            </option>
                                                            <option value="paid">Paid Delivery</option>
                                                        </select>
                                                    </div>
                                                </div>

                                                <div class="col-sm-6 mtop35Px" id="delfee" style="display:none;">
                                                    <div class="form-group">
                                                        <label for="delfee_text" class="bmd-label-floating">Delivery
                                                            Price</label>
                                                        <input type="number" id="delfee_text" name="delfee"
                                                               class="form-control">
                                                    </div>
                                                </div>

                                            </div>


                                            <div class="multi-field-wrapperg">

                                                <div class="multi-fields">
                                                    <div class="multi-field row">
                                                        <div class="col-sm-4">
                                                            <div class="form-group">
                                                                <label for="country_1" class="bmd-label-floating"
                                                                       for="country">Select Country</label>

                                                                <select name="delcountry[]"
                                                                        class="selectpicker searchdropdown"
                                                                        onchange="coutrychange(this);" id="country_1"
                                                                        data-style="btn btn-primary btn-round"
                                                                        data-live-search="true" data-size="7"
                                                                        title="Select Country">

                                                                    <?php echo $coutryValueOption; ?>

                                                                </select>

                                                            </div>
                                                        </div>

                                                        <div class="col-sm-4">
                                                            <div class="form-group">
                                                                <label for="state_1" class="bmd-label-floating">Select
                                                                    State</label>

                                                                <select name="delstate[]"
                                                                        class="selectpicker searchdropdown"
                                                                        onchange="changecity(this);" id="state_1"
                                                                        data-style="btn btn-primary btn-round"
                                                                        data-live-search="true" data-size="7"
                                                                        title="Select State">

                                                                    <option value='0'>Select State</option>

                                                                </select>

                                                            </div>
                                                        </div>

                                                        <div class="col-sm-4">
                                                            <div class="form-group">
                                                                <label for="city_1" class="bmd-label-floating">Select
                                                                    City</label>

                                                                <select name="delcity[]"
                                                                        class="selectpicker searchdropdown" id="city_1"
                                                                        data-style="btn btn-primary btn-round"
                                                                        data-live-search="true" data-size="7"
                                                                        title="Select City">

                                                                    <option value='0'>Select City</option>

                                                                </select>

                                                            </div>
                                                        </div>

                                                        <div class="col-sm-6 mtop35Px">

                                                            <div class="form-group">
                                                                <label class="bmd-label-floating" for="delpost-code1">Zip
                                                                    Code</label>

                                                                <input type="text" id="delpost-code1"
                                                                       name="delpost-code[]" class="form-control">

                                                            </div>
                                                        </div>

                                                        <div class="col-sm-6">

                                                            <div class="form-group">
                                                                <label class="bmd-label-floating" for="miles1">Miles
                                                                    Ratio</label>
                                                                <select class="selectpicker" name="delmiles[]"
                                                                        id="miles1"
                                                                        data-style="btn btn-primary btn-round"
                                                                        data-live-search="false" data-size="7"
                                                                        title="Select Miles">
                                                                    <option value="">Select</option>
                                                                    <option value="5">5 Miles</option>
                                                                    <option value="10">10 Miles</option>
                                                                    <option value="20">20 Miles</option>
                                                                    <option value="50">50 Miles</option>
                                                                </select>

                                                            </div>
                                                        </div>

                                                        <button type="button" class="remove-field btn btn-danger"
                                                                style="margin-left: 85%;"><i class="material-icons">clear</i>
                                                            Remove
                                                        </button>
                                                    </div>

                                                </div>
                                                <button type="button" class="add-field btn btn-primary"><i
                                                            class="material-icons">add</i> Add Another Delivery Address
                                                </button>

                                            </div>


                                        </div>

                                        <div class="col-sm-12" id="shippingcat" style="display:none;">


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
                                                                   value="ss" class="form-check-input"> Standard
                                                            Shipping
                                                            <span class="form-check-sign">
                                                                <span class="check"></span>
                                                            </span>
                                                        </label>
                                                    </div>
                                                    <div class="form-check form-check-inline">
                                                        <label class="form-check-label">
                                                            <input type="checkbox" id="cexpressship" name="cexpressship"
                                                                   value="CS" class="form-check-input"> Express Shipping
                                                            <span class="form-check-sign">
                                                                <span class="check"></span>
                                                            </span>
                                                        </label>
                                                    </div>
                                                    <div class="form-check form-check-inline">
                                                        <label class="form-check-label">
                                                            <input type="checkbox" id="ups" name="ups" value="UPS"
                                                                   class="form-check-input"> UPS
                                                            <span class="form-check-sign">
                                                                <span class="check"></span>
                                                            </span>
                                                        </label>
                                                    </div>
                                                    <div class="form-check form-check-inline">
                                                        <label class="form-check-label">
                                                            <input type="checkbox" id="fedex" name="fedex" value="Fedex"
                                                                   class="form-check-input"> Fedex
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
                                                            <option value="FF">Flat Fee</option>
                                                            <option value="CCT">Calculate at Checkout Time</option>
                                                            <option value="free">Free Shipping</option>
                                                        </select>

                                                    </div>
                                                </div>

                                                <div class="col-sm-4 mtop35Px" id="shipflatfee" style="display:none;">

                                                    <div class="form-group">
                                                        <label for="flatfeeprice" class="bmd-label-floating">Shipping
                                                            Price</label>
                                                        <input type="number" class="form-control" name="flatfeeprice"
                                                               id="flatfeeprice">
                                                    </div>

                                                </div>

                                                <div class="col-sm-4 mtop35Px" id="shipflatfeeqty"
                                                     style="display:none;">

                                                    <div class="form-group">
                                                        <label for="flatfeequantity" class="bmd-label-floating">Maximum
                                                            Quantity</label>
                                                        <input type="number" class="form-control" name="flatfeequantity"
                                                               id="flatfeequantity">
                                                    </div>

                                                </div>


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
                                                            <option value="OSL">Own Shipping Label</option>
                                                            <option value="ESL">Email Shipping Label</option>
                                                        </select>

                                                    </div>
                                                </div>

                                                <div class="col-sm-4 mtop35Px" id="emailshipplab" style="display:none;">

                                                    <div class="form-group">
                                                        <label for="shipplabelemail" class="bmd-label-floating">Email
                                                            Address For Shiiping label</label>
                                                        <input type="email" class="form-control" name="shipplabelemail"
                                                               id="shipplabelemail">
                                                    </div>

                                                </div>


                                            </div>

                                            <div class="row">

                                                <div class="col-md-12">
                                                    <hr>
                                                    <h5>Shipping From Address</h5>
                                                    <hr>
                                                </div>
                                            </div>


                                            <div class="multi-field-wrappers">

                                                <div class="multi-fields">
                                                    <div class="multi-field row">
                                                        <div class="col-sm-3">
                                                            <div class="form-group">
                                                                <label for="shipcount_1" class="bmd-label-floating">Select
                                                                    Country</label>

                                                                <select name="country[]"
                                                                        class="selectpicker searchdropdown"
                                                                        onchange="shipcoutrychange(this);"
                                                                        id="shipcount_1"
                                                                        data-style="btn btn-primary btn-round"
                                                                        data-live-search="true" data-size="7"
                                                                        title="Select Country">

                                                                    <?php echo $coutryValueOption; ?>

                                                                </select>

                                                            </div>
                                                        </div>

                                                        <div class="col-sm-3">
                                                            <div class="form-group">
                                                                <label for="shipstate_1" class="bmd-label-floating">Select
                                                                    State</label>

                                                                <select name="state[]"
                                                                        class="selectpicker searchdropdown"
                                                                        onchange="shipchangecity(this);"
                                                                        id="shipstate_1"
                                                                        data-style="btn btn-primary btn-round"
                                                                        data-live-search="true" data-size="7"
                                                                        title="Select State">

                                                                    <option value='0'>Select State</option>

                                                                </select>

                                                            </div>
                                                        </div>

                                                        <div class="col-sm-3">
                                                            <div class="form-group">
                                                                <label for="shipcity_1" class="bmd-label-floating">Select
                                                                    City</label>

                                                                <select name="city[]"
                                                                        class="selectpicker searchdropdown"
                                                                        id="shipcity_1"
                                                                        data-style="btn btn-primary btn-round"
                                                                        data-live-search="true" data-size="7"
                                                                        title="Select City">

                                                                    <option value='0'>Select City</option>

                                                                </select>

                                                            </div>
                                                        </div>

                                                        <div class="col-sm-3 mtop35Px">

                                                            <div class="form-group">
                                                                <label class="bmd-label-floating" for="post-code1">Zip
                                                                    Code</label>

                                                                <input type="text" id="post-code1" name="post-code[]"
                                                                       class="form-control">

                                                            </div>
                                                        </div>


                                                        <button type="button" class="remove-field btn btn-danger"
                                                                style="margin-left: 85%;"><i class="material-icons">clear</i>
                                                            Remove
                                                        </button>
                                                    </div>

                                                </div>
                                                <button type="button" class="add-field btn btn-primary"><i
                                                            class="material-icons">add</i> Add Another Shipping From
                                                    Address
                                                </button>

                                            </div>


                                        </div>

                                        <div class="col-sm-12">

                                            <div class="row">

                                                <div class="col-md-12">
                                                    <hr>
                                                    <h5>Set Product Attributes</h5>
                                                    <hr>
                                                </div>
                                            </div>

                                            <div class="row">

                                                <div class="col-sm-12">
                                                    <div class="form-group">
                                                        <label for="display_color" class="bmd-label-floating">Display
                                                            Color On Product : </label>
                                                        <div class="form-check"
                                                             style="display: inline-block;margin-left: 5px;">
                                                            <label class="form-check-label">
                                                                <input class="form-check-input nocolor" type="radio"
                                                                       name="display_color" value="0" checked> No
                                                                <span class="circle">
                                                                    <span class="check"></span>
                                                                </span>
                                                            </label>
                                                        </div>
                                                        <div class="form-check" style="display: inline-block;">
                                                            <label class="form-check-label">
                                                                <input class="form-check-input yescolor" type="radio"
                                                                       name="display_color" value="1"> Yes
                                                                <span class="circle">
                                                                    <span class="check"></span>
                                                                </span>
                                                            </label>
                                                        </div>
                                                    </div>

                                                </div>

                                                <div class="col-sm-12" id="displaycolor" style="display: none;">

                                                    <div class="multi-field-wrappercolor">
                                                        <div class="multi-fields">
                                                            <div class="multi-field row">

                                                                <div class="col-sm-9">

                                                                    <div class="form-group">
                                                                        <label class="bmd-label-floating"
                                                                               for="prodcolor1">Color</label>

                                                                        <input type="color" id="prodcolor1"
                                                                               name="prodcolor[]" class="form-control">

                                                                    </div>
                                                                </div>

                                                                <button type="button"
                                                                        class="remove-field btn btn-danger col-sm-2"><i
                                                                            class="material-icons">clear</i> Remove
                                                                </button>
                                                            </div>
                                                        </div>
                                                        <button type="button" class="add-field btn btn-primary"><i
                                                                    class="material-icons">add</i> Add Another Color
                                                        </button>
                                                    </div>

                                                </div>

                                                <div class="col-sm-12" id="displaychooseradio">
                                                    <div class="form-group">
                                                        <label for="display_chose_image" class="bmd-label-floating">Display
                                                            Chose Image Option on Product : </label>
                                                        <div class="form-check"
                                                             style="display: inline-block;margin-left: 5px;">
                                                            <label class="form-check-label">
                                                                <input class="form-check-input nochooseimg" type="radio"
                                                                       name="display_chose_image" value="0" checked> No
                                                                <span class="circle">
                                                                    <span class="check"></span>
                                                                </span>
                                                            </label>
                                                        </div>
                                                        <div class="form-check" style="display: inline-block;">
                                                            <label class="form-check-label">
                                                                <input class="form-check-input yeschooseimg"
                                                                       type="radio" name="display_chose_image"
                                                                       value="1"> Yes
                                                                <span class="circle">
                                                                    <span class="check"></span>
                                                                </span>
                                                            </label>
                                                        </div>
                                                    </div>

                                                </div>

                                                <div class="multi-field-wrapperchooseimg col-sm-12"
                                                     id="displaychooseimg" style="display: none;">

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
                                                                        <input type="file" id="pro_choose_img_1"
                                                                               name="pro_choose_img[]"/>
                                                                    </span>
                                                                    <a href="#pablo"
                                                                       class="btn btn-danger btn-round fileinput-exists"
                                                                       data-dismiss="fileinput"><i
                                                                                class="fa fa-times"></i> Remove</a>
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

                                                    <button type="button" class="btn btn-primary btn-round add-field">
                                                        <i class="material-icons">add</i> Add Another Image
                                                        <div class="ripple-container"></div>
                                                    </button>

                                                </div>

                                                <div class="col-sm-12">
                                                    <div class="form-group">
                                                        <label for="display_color" class="bmd-label-floating">Display
                                                            Size On Product : </label>
                                                        <div class="form-check"
                                                             style="display: inline-block;margin-left: 5px;">
                                                            <label class="form-check-label">
                                                                <input class="form-check-input nosize" type="radio"
                                                                       name="display_size" value="0" checked> No
                                                                <span class="circle">
                                                                    <span class="check"></span>
                                                                </span>
                                                            </label>
                                                        </div>
                                                        <div class="form-check" style="display: inline-block;">
                                                            <label class="form-check-label">
                                                                <input class="form-check-input yessize" type="radio"
                                                                       name="display_size" value="1"> Yes
                                                                <span class="circle">
                                                                    <span class="check"></span>
                                                                </span>
                                                            </label>
                                                        </div>
                                                    </div>

                                                </div>

                                                <div class="col-sm-12" id="displaysize" style="display: none;">

                                                    <div class="multi-field-wrappersize">
                                                        <div class="multi-fields">
                                                            <div class="multi-field row">

                                                                <div class="col-sm-9">

                                                                    <div class="form-group">
                                                                        <label class="bmd-label-floating" for="psize1">Size</label>

                                                                        <input type="text" id="psize1" name="psize[]"
                                                                               class="form-control">

                                                                    </div>
                                                                </div>

                                                                <button type="button"
                                                                        class="remove-field btn btn-danger col-sm-2"><i
                                                                            class="material-icons">clear</i> Remove
                                                                </button>
                                                            </div>
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

                                                <div class="col-sm-12">
                                                    <div class="form-group">
                                                        <label for="movie_id" class="bmd-label-floating">Select
                                                            Movie</label>

                                                        <select class="selectpicker searchdropdown" id="rel_id"
                                                                name="rel_id" data-style="btn btn-primary btn-round"
                                                                data-live-search="true" title="Select Movie">
                                                            <!--<option value="0">Select Movie</option>-->
                                                        </select>
                                                    </div>

                                                </div>

                                            </div>
                                        </div>


                                    </div>
                                </div>



















                                <div class="tab-pane" id="product_category_details">
                                    <h5 class="info-text"> Let's start with the Category Details</h5>
                                    <div class="row">

                                        <div class="col-sm-4">
                                            <div class="form-group">
                                                <label for="Category" class="bmd-label-floating">Select Category</label>

                                                <select name="Category" class="selectpicker searchdropdown"
                                                        onchange="load_options(this.value, 'Subcategory');"
                                                        id="Category" data-style="btn btn-primary btn-round"
                                                        data-live-search="true" data-size="7" title="Select Category"
                                                        required>

                                                    <option value="0">Select Category</option>

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

                                                    <option value="0">Select Sub Category</option>

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

                                                    <option value="0">Select Sub Category</option>

                                                </select>

                                            </div>
                                        </div>


                                    </div>

                                    <div class="filter row" style="display:none;">

                                        <div class="col-md-12">


                                            <hr>
                                            <h5>Select Filter For Products</h5>
                                            <hr>

                                        </div>

                                        <div class="col-sm-4">
                                            <div class="form-group">
                                                <label for="f_type" class="bmd-label-floating">Filter Category</label>

                                                <select name="f_type[]" class="selectpicker searchdropdown"
                                                        onchange="ajaxfunctions();" id="s1"
                                                        data-style="btn btn-primary btn-round" data-live-search="true"
                                                        data-size="7" title="Select Category" multiple>

                                                    <option value="">---Select Filter(s)---</option>
                                                   @if (@count($filters)> 0) 
                                                        @foreach (@$filters as $filterkey) 
                                                            <option value="{{$filterkey->id}}">{{$filterkey->name}}</option>
                                                     @endforeach
                                                     @endif

                                                </select>

                                            </div>
                                        </div>

                                        <div class="col-sm-4">
                                            <div class="form-group">
                                                <label for="sf_type" class="bmd-label-floating">Sub Filter
                                                    Category</label>

                                                <select name="sf_type[]" class="selectpicker searchdropdown"
                                                        onchange="ajaxfunction();" id="s2"
                                                        data-style="btn btn-primary btn-round" data-live-search="true"
                                                        data-size="7" title="Filter Category" multiple>

                                                    <option value="">---Select Sub Filter(s)---</option>

                                                </select>

                                            </div>
                                        </div>

                                        <div class="col-sm-4">
                                            <div class="form-group">
                                                <label for="subf_type" class="bmd-label-floating">Sub Sub Filter
                                                    Category</label>

                                                <select name="subf_type[]" class="selectpicker searchdropdown" id="s3"
                                                        data-style="btn btn-primary btn-round" data-live-search="true"
                                                        data-size="7" title="Filter Category" multiple>

                                                    <option value="">---Select Sub Filter(s)---</option>

                                                </select>

                                            </div>
                                        </div>


                                    </div>

                                    <div class="row" id="gift_card_details" style="display: none;">


                                        <div class="col-sm-12 text-center">
                                            <hr>
                                            <h5 class="info-text">Please Fill Out The Gift Card Purchase Details:</h5>
                                            <hr>
                                        </div>


                                        <div class="col-sm-12">

                                            <p class="note">Gift Card Transactions Without AmplePoints*</p>
                                            <p class="note">Sell Gift Cards With Cash (Customers cannot use AmplePoints
                                                in this purchase)</p>

                                            <div class="form-group">
                                                <label for="gf_per_without_ample" class="bmd-label-floating">Discount %
                                                    offered on Gift Cards</label>

                                                <select name="gf_per_without_ample"
                                                        class="selectpicker searchdropdown gf_drp"
                                                        id="gf_per_without_ample" data-style="btn btn-primary btn-round"
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
                                            <p class="note">Sell Gift Cards With Cash (Customers cannot use AmplePoints
                                                in this purchase)</p>

                                            <div class="form-group">
                                                <label for="gf_per_with_ample" class="bmd-label-floating">AmplePoints %
                                                    rewards offered on Gift Cards</label>

                                                <select name="gf_per_with_ample"
                                                        class="selectpicker searchdropdown gf_drp"
                                                        id="gf_per_with_ample" data-style="btn btn-primary btn-round"
                                                        data-live-search="true" data-size="7" title="DISCOUNT">

                                                    <?php for ($i = 0; $i <= 100; $i++) { ?>
                                                        <option value="<?php echo $i; ?>" <?php if ($i == 50) {
                                                            echo "selected";
                                                        } ?>><?php echo $i; ?></option>
                                                    <?php } ?>

                                                </select>

                                            </div>

                                            <p class="note">*AmplePoints can be used to make this purchase. Amplepoints
                                                will be rewarded to the customer for this purchase. </p>
                                            <p class="note">**If you offer a discount over 50%, customers can buy that
                                                particular product for free using their AmplePoints.</p>

                                            <hr>

                                        </div>

                                        <div class="col-sm-12">

                                            <p class="note">Gift Card Hours of Use. Applicable hours for Gift Cards to
                                                be redeemed in store</p>

                                        </div>

                                        <div class="col-sm-12">
                                            <div class="form-group">

                                                <div class="form-check" style="display: inline-block;margin-left: 5px;">
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
                                                                    class="selectpicker searchdropdown" id="hr_day_1"
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

                                                    <button type="button" class="remove-field btn btn-danger col-sm-2"
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

                                                <div class="form-check" style="display: inline-block;margin-left: 5px;">
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

                                            <div class="fileinput fileinput-new text-center" data-provides="fileinput">
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
                                                    <a href="#pablo" class="btn btn-danger btn-round fileinput-exists"
                                                       data-dismiss="fileinput"><i class="fa fa-times"></i> Remove</a>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-sm-12">

                                            <hr>

                                            <p class="note">Gift Card can be redeemed on % of total bill</p>


                                            <div class="form-group">
                                                <label for="per_of_bill" class="bmd-label-floating">% of total
                                                    bill</label>

                                                <select name="per_of_bill" class="selectpicker searchdropdown gf_drp"
                                                        id="per_of_bill" data-style="btn btn-primary btn-round"
                                                        data-live-search="true" data-size="7" title="% of total bill">

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

                                                <div class="form-check" style="display: inline-block;margin-left: 5px;">
                                                    <label class="form-check-label">
                                                        <input class="form-check-input" type="radio" name="combine_with"
                                                               value="0" checked> Cannot
                                                        <span class="circle">
                                                            <span class="check"></span>
                                                        </span>
                                                    </label>
                                                </div>
                                                <div class="form-check" style="display: inline-block;">
                                                    <label class="form-check-label">
                                                        <input class="form-check-input" type="radio" name="combine_with"
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

                                            <p class="note">Ask which products and services can be redeemed with 100%
                                                AmplePoints.</p>

                                            <div class="form-group">

                                                <div class="form-check" style="display: inline-block;margin-left: 5px;">
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

                                                <div class="form-check" style="display: inline-block;margin-left: 5px;">
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

                                                <div class="form-check" style="display: inline-block;margin-left: 5px;">
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

                                                <div class="form-check" style="display: inline-block;margin-left: 5px;">
                                                    <label class="form-check-label">
                                                        <input class="form-check-input" type="radio" name="no_cash_back"
                                                               value="0"> NO
                                                        <span class="circle">
                                                            <span class="check"></span>
                                                        </span>
                                                    </label>
                                                </div>
                                                <div class="form-check" style="display: inline-block;">
                                                    <label class="form-check-label">
                                                        <input class="form-check-input" type="radio" name="no_cash_back"
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
                                                        data-live-search="true" data-size="7" title="% of total bill">

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

                                                <div class="form-check" style="display: inline-block;margin-left: 5px;">
                                                    <label class="form-check-label">
                                                        <input class="form-check-input" type="radio" name="final_sale"
                                                               value="0"> No
                                                        <span class="circle">
                                                            <span class="check"></span>
                                                        </span>
                                                    </label>
                                                </div>
                                                <div class="form-check" style="display: inline-block;">
                                                    <label class="form-check-label">
                                                        <input class="form-check-input" type="radio" name="final_sale"
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

                                </div>

















{{-- 
                                <div class="tab-pane" id="product_price_details">
                                    <h5 class="info-text"> Let's start with the Price And Discount Details</h5>
                                    <div class="row">

                                        <?php if ($this->allow_free_products) { ?>

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
 --}}


















                            {{--     <div class="tab-pane" id="product_slider_details">
                                    <h5 class="info-text"> Let's start with the Sliders Details</h5>
                                    <div class="row">

                                        <div class="col-sm-3">
                                            <div class="form-group">
                                                <label for="lmorevendor" class="bmd-label-floating">Select
                                                    Vendor</label>
                                                <select class="selectpicker searchdropdown mtop35px" name="lmorevendor"
                                                        id="lmorevendor" multiple data-style="btn btn-primary btn-round"
                                                        data-live-search="true" data-size="7" title="Select Category">

                                                    <?php foreach ($this->vendordata as $key) { ?>
                                                        <option value="<?php echo $key['tbl_vndr_id']; ?>"><?php echo $key['vendor_displayname']; ?></option>
                                                    <?php } ?>

                                                </select>
                                            </div>

                                        </div>

                                        <div class="col-sm-3">
                                            <div class="form-group">
                                                <label for="lmorecategory" class="bmd-label-floating">Select
                                                    Category</label>
                                                <select class="selectpicker searchdropdown mtop35px"
                                                        name="lmorecategory" id="lmorecategory" multiple
                                                        data-style="btn btn-primary btn-round" data-live-search="true"
                                                        data-size="7" title="Select Category"
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
                                                <select class="selectpicker searchdropdown mtop35px"
                                                        name="lmoresubcategory" id="lmoresubcategory" multiple
                                                        data-style="btn btn-primary btn-round" data-live-search="true"
                                                        data-size="7" title="Sub Category"
                                                        onchange="getSub2category();">
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
                                            <button type="button" class="btn btn-primary mtop45px loadprod">Load
                                                Products
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
                                </div> --}}












{{-- 
                                <div class="tab-pane" id="product_images_details">
                                    <h5 class="info-text"> Let's start with the Images Details</h5>
                                    <div class="row">

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
                                                        <input type="file" id="file" name="filemain" required/>
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
 --}}





                            </div>
                        </div>
                        <div class="card-footer">
                            <div class="mr-auto">
                                <input type="button"
                                       class="btn btn-previous btn-fill btn-default btn-wd disabled expect_dark_gradiant_bg"
                                       name="previous" value="Previous">
                            </div>
                            <div class="ml-auto">
                                <input type="button"
                                       class="btn btn-next btn-fill btn-rose btn-wd expect_dark_gradiant_bg" name="next"
                                       value="Next">
                                <input type="submit"
                                       class="btn btn-finish btn-fill btn-rose btn-wd expect_dark_gradiant_bg"
                                       name="finish" value="Finish" style="display: none;">
                            </div>
                            <div class="clearfix"></div>
                        </div>
                    </form>
                </div>
            </div>
            <!-- wizard container -->
        </div>
    </div>
</div>
@endsection

@section('script')
    @include('admin.admin_includes.admin_script')
    @include('admin.product.customJavaScript')
     @include('admin.product.multiSelectFieldsJavascript')
@endsection
