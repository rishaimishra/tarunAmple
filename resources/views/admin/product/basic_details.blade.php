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
?>





<div class="tab-pane active" id="product_basic_details">
	<h5 class="info-text"> Let's start with the Basic Details</h5>
	<div class="row">
		@if (Auth::guard('admin')->user()->utype == 1 || Auth::guard('admin')->user()->utype == 4)
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
		@endif









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
								<img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcRFLwDkTYFPJCZVh9iRZ7mu8zjxu6QoiIg_8NnC0ka-fA&s"
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
									onchange="countrychange(this);" id="country_1"
									data-style="btn btn-primary btn-round"
									data-live-search="true" data-size="7"
									title="Select Country">
									<?php echo $coutryValueOption; ?>
								</select>
							</div>
						</div>

					
						{{--  <div class="col-sm-4">
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
						--}}
						<div class="col-sm-4">
							<div class="form-group" id="state_id">
								<label for="state_1" class="bmd-label-floating">Select State</label>
								<select name="delstate[]" id="state_1"
									>
									<option value=''>Select</option>
									
								</select>
							</div>
						</div>
						<div class="col-sm-4">
							<div class="form-group" id="city_id">
								<label for="city_1" class="bmd-label-floating">Select City</label>
								<select name="delcity[]"  id="city_1">
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
									onchange="shipcountrychange(this);"
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
									<img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcRFLwDkTYFPJCZVh9iRZ7mu8zjxu6QoiIg_8NnC0ka-fA&s"
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










<script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
<script>

function countrychange(element) {
    var countryId = $(element).val();
    if (countryId) {
        $.ajax({
            url: '{{url('/')}}/load-states/' + countryId,
            type: 'GET',
            success: function (data) {
            	// console.log(data)
              $("#state_id").html(data)
            }
        });
    } 
}


    $('.vampli').click(function () {
            var amplival = $('.vampli').val();
            if (amplival == '5') {
                //$('#pics').css('display' , 'block');
                $(".vendorsl").hide();
                $('#pickupstore').css('display', 'none');
                $('#ampdilv').css('display', 'none');
                $('#ampbyappoint').css('display', 'none');
                $(".filter").hide();
            }
        });

        $('.vamplis').click(function () {
            var amplival = $('.vamplis').val();
            if (amplival == '6') {
                //$('#pics').css('display' , 'none');
                $(".vendorsl").show();
                $('#pickupstore').css('display', 'block');
                $('#ampdilv').css('display', 'block');
                $('#ampbyappoint').css('display', 'block');
                $(".filter").show();
            }

        });




@php
$baseurl=url('/');
@endphp

     function VendorEvents(MyvdrID) {
alert(MyvdrID)
        var pvendorID = MyvdrID;
        //alert(pvendor);
        var baseurl = '<?php echo $baseurl;?>';
        var SITEROOT = baseurl;

        $.ajax({
            url: SITEROOT + '/category_filter/vendorfilter.php',
            data: {id: pvendorID},
            cache: false,
            type: 'GET'
        })
            .done(function (data) {
                // alert(data);
                $('#s1').html(data);
                $("#s1").selectpicker('refresh');

            })

        $.ajax({
            url: SITEROOT + '/category_filter/vendorlocation.php',
            data: {id: pvendorID},
            cache: false,
            type: 'GET'
        })
            .done(function (data) {
                //alert(data);
                //$('#pics').css('display' , 'none');
                $('#SelectStr').css('display', 'block');
                $('#pickupstore').html(data);

                $("#locpick").selectpicker('refresh');


                //$('#pics')css('display', 'none');

            })


        $.ajax({
            url: SITEROOT + '/category_filter/vendorbyappointlocation.php',
            data: {id: pvendorID},
            cache: false,
            type: 'GET'
        })
            .done(function (data) {
                //alert(data);


                $('#byappointstore').html(data);

                //$('#pics')css('display', 'none');

            })

    }

	
</script>