@extends('Layouts.app')

@section('meta')
    {{-- all meta tags --}}
@endsection

@section('title')
    <title>Amplepoints | Checkout</title>
@endsection

@include('includes.head')
@include('includes.new_head')
@include('includes.header')
@include('member.checkout.checkout_style')


<?php
$baseUrl = url('/');
$admin_model_obj =  new \App\Models\AdminImpFunctionModel;
?>
















<?php
/*
require '/home/tony241/public_html/mytax/TaxRates.php';
use Brookside\TaxRates\TaxRates;
if(!empty($this->record['data'][0]['zip_code']))
{

$tr = new TaxRates('l2vIp/ttk0d/6gIZMoDzYPQ9NHoGZtE+aJbyq8Hwt6VE4n/GKFlZKGzasSKXXdWrnSc39jAC+pWkGJKXmrmsZg==');
$rates = $tr->getRates(array(

//'city'    => $this->record['data'][0]['user_city'],
//'state'   => $this->record['data'][0]['user_state'],
//'country' => $this->record['data'][0]['user_country'],
'postal'  => $this->record['data'][0]['zip_code'],
));
$ukrt = $rates['totalRate'];
}else{$ukrt = 0;}
//print_r($rates);

*/



$ukrt = 0;

//////$app_path = explode('application', APPLICATION_PATH);

///////require $app_path[0] . "library/avataxt/vendor/autoload.php";

// Create a new client
/*$client = new Avalara\AvaTaxClient('phpTestApp', '1.0', 'localhost', 'sandbox');
$client->withSecurity('hirenbuhecha@gmail.com', 'Amplepoints$123'); */

//////$client = new Avalara\AvaTaxClient('AMPLEPOINTSLLC', '1.0', 'localhost', 'https://rest.avatax.com');
//////$client->withSecurity('office.amplepoints@yahoo.com', 'AmpleBlast123');

// If I am debugging, I can call 'Ping' to see if I am connected to the server
////////$p = $client->ping();

//echo "<pre>";print_R($this->record['data'][0]);








//------part-1 ---------------
$db_host_port = env('DB_PORT');
$db_host_name = env('DB_HOST');
$db_user_name = env('DB_USERNAME');
$db_user_password = env('DB_PASSWORD');
$db_database_name = env('DB_DATABASE');

$connection = mysqli_connect($db_host_name, $db_user_name, $db_user_password, $db_database_name, $db_host_port);

if (!$connection) {
    die('Could not connect: ' . mysqli_error($connection));
}
mysqli_select_db($connection, $db_database_name);









//--------part-2 -----------------
/*Calculate Total checkout Special Fees*/

$checkSpecialFeesTotal = 0;
$checkProductsShippingFeesTotal = 0;

if (!empty($usrmakey)) {

    $specialFeesCalData = $admin_model_obj->calculateCartSpecialFeesData($usrmakey);

    if (!empty($specialFeesCalData)) {

        foreach ($specialFeesCalData as $spLdt) {

            if (!empty($spLdt->special_fee) && $spLdt->special_fee > 0) {

                $checkSpecialFeesTotal += $spLdt->special_fee;
            }

            if (!empty($spLdt->special_fee_percentage) && $spLdt->special_fee_percentage > 0) {

                $FinalSpecialPercentageAmount = ((($spLdt->item_single_price * $spLdt->item_added_quantity) * $spLdt->special_fee_percentage) / 100);

                $checkSpecialFeesTotal += $FinalSpecialPercentageAmount;
            }
        }
    }







    $productsShippinCalData = $admin_model_obj->calculateCartShippingFeesDetail($usrmakey);

    if (!empty($productsShippinCalData)) {

        foreach ($productsShippinCalData as $shipFee) {

            if (!empty($shipFee->shipp_price) && $shipFee->shipp_price > 0) {

                $checkProductsShippingFeesTotal += $shipFee->shipp_price;
            }
        }
    }
}

?>
























{{-- part-3 --}}

<!-- page wapper-->
<div class="columns-container chk_main_div">
    <div class="container" id="columns">
        <!-- breadcrumb -->
        <div class="breadcrumb clearfix">
            <a class="home" href="<?php echo $baseUrl; ?>" title="Return to Home">Home</a>
            <span class="navigation-pipe">></span>
            <span class="navigation_page">Checkout</span>
        </div>
        <!-- ./breadcrumb -->
        <!-- page heading-->
        <h2 class="page-heading">
            <span class="page-heading-title2">Checkout</span>
        </h2>





        <!-- ../page heading-->
        <form id="mycheckoutform" action="{{route('checkout.submit')}}" method="post" onsubmit="return validateForm();">
            @csrf
            <div class="page-content checkout-page">
                <h3 class="checkout-sep">1. Checkout Method</h3>
                <div class="box-border method_box">
                    <div class="row">
                        <div class="col-sm-6">

                            <?php if (empty($usrmakey)) {

                                ?>

                                <h4>Checkout as a Guest or Register</h4>
                                <p>Register with us for future convenience:</p>
                                <ul>
                                    <li><label><input type="radio" name="regcheck" value="2" id="regcheck" required>Register</label>
                                    </li>
                                </ul>
                                <br>
                                <h4>Register and save time!</h4>
                                <p>Register with us for future convenience:</p>
                                <p><i class="fa fa-check-circle text-primary"></i> Fast and easy check out</p>
                                <p><i class="fa fa-check-circle text-primary"></i> Easy access to your order history and status</p>
                           
                            <?php } else { ?>
                                <h4>Checkout as <a style="color:#f2676b;" target="_blank"  href="{{-- {{route('index.dashboard')}} --}}"> <?php echo $record->first_name; ?></a>
                                </h4>
                            <?php } ?>
                        </div>

                      <!--<div class="col-sm-6">
                        <h4>Login</h4>
                    <p>Already registered? Please log in below:</p>
                    <label>Email address</label>
                    <input type="text" class="form-control input">
                    <label>Password</label>
                    <input type="password" class="form-control input">
                    <p><a href="#">Forgot your password?</a></p>
                    <button class="button">Login</button>
                    </div>-->

                    </div>
                </div>




                <h3 class="checkout-sep">2. Billing Information</h3>
                <div class="box-border">
                    <ul>
                        <li class="row two_inp_cnt">
                            <div class="col-sm-6">
                                <label for="b_first_name" class="required">First Name</label>
                                <input type="text" class="input form-control ap_checkout_inp" name="b_first_name"
                                       id="b_first_name"
                                       value="<?php if (!empty($usrmakey)) {
                                           echo $record->first_name;
                                       } ?>" required>
                                <div style="color:red;"><span id="first_error"></span></div>
                            </div><!--/ [col] -->
                            <div class="col-sm-6">
                                <label for="b_last_name" class="required">Last Name</label>
                                <input type="text" name="b_last_name" class="input form-control ap_checkout_inp"
                                       id="b_last_name"
                                       value="<?php if (!empty($usrmakey)) {
                                           echo $record->last_name;
                                       } ?>" required>
                                <div style="color:red;"><span id="last_error"></span></div>
                            </div><!--/ [col] -->
                        </li><!--/ .row -->
                        <li class="row two_inp_cnt">
                            <div class="col-sm-6">
                                <label for="b_email_address" class="required">Email Address</label>
                                <input type="text" class="input form-control ap_checkout_inp" name="b_email_address"
                                       id="b_email_address"
                                       value="<?php if (!empty($usrmakey)) {
                                           echo $record->email;
                                       } ?>" required>
                                <div style="color:red;"><span id="email_error"></span></div>

                            </div><!--/ [col] -->
                            <div class="col-sm-6">
                                <label for="b_address" class="required">Address</label>
                                <input type="text" class="input form-control ap_checkout_inp" name="b_address"
                                       id="b_address" value="<?php if (!empty($usrmakey)) {
                                    echo $record->address;
                                } ?>">
                                <div style="color:red;"><span id="adr_error"></span></div>
                            </div><!--/ [col] -->
                        </li><!--/ .row -->





                        <li class="row two_inp_cnt">




                            <div class="col-sm-6">
                                <label for="b_country" class="required">Country</label>
                                <select id="b_country" name="b_country" onchange="billChangeCount(this.value);"
                                        class="input form-control ap_checkout_select_inp" required>

                                    <?php if ($record->user_countrykey) { ?>

                                        <option value="<?php echo $record->user_countrykey; ?>"
                                                selected><?php echo $record->user_country; ?></option>

                                    <?php } else { ?>

                                        <option value="" disabled="disabled" selected>Select Country</option>

                                    <?php } ?>

                                    <?php foreach ($countrylist as $contlst) { ?>
                                        <option value="<?php echo $contlst->id; ?>"><?php echo $contlst->name; ?></option>
                                    <?php } ?>
                                </select>
                                <div style="color:red;"><span id="country_error"></span></div>
                            </div><!--/ [col] -->






                            <div class="col-sm-6">
                                <label for="b_state" class="required">State/Province</label>
                                <select class="input form-control ap_checkout_select_inp" id="b_state"
                                        name="b_state"
                                        onchange="BillChangeCity(this.value);" required>

                                    <?php if ($record->user_statekey) { ?>

                                        <option value="<?php echo $record->user_statekey; ?>"
                                                selected><?php echo $record->user_state; ?></option>

                                        <?php if ($record->user_countrykey) {

                                            $resultBlSt = $admin_model_obj->showstatelist($record->user_countrykey);

                                            foreach ($resultBlSt as $getst) { ?>
                                                <option value="<?php echo $getst->stateid; ?>"><?php echo $getst->statename; ?></option>
                                            <?php } ?>

                                        <?php } ?>

                                    <?php } else { ?>

                                        <option value="" disabled="disabled" selected>Select State</option>

                                    <?php } ?>
                                </select>
                                <div style="color:red;"><span id="state_error"></span></div>
                            </div><!--/ [col] -->
                        </li><!--/ .row -->


















{{-- part-4   --}}
                        <li class="row two_inp_cnt">
                            <div class="col-sm-6">
                                <label for="b_city" class="required">City</label>
                                <select class="input form-control ap_checkout_select_inp" id="b_city"
                                        name="b_city"
                                        required>
                                    <?php if ($record->user_citykey) { ?>

                                        <option value="<?php echo $record->user_citykey; ?>"
                                                selected><?php echo $record->user_city; ?></option>

                                        <?php if ($record->user_statekey) {

                                            $resultBlCity = $admin_model_obj->showcitylist($record->user_statekey);

                                            foreach ($resultBlCity as $getst) { ?>
                                                <option value="<?php echo $getst->id; ?>"><?php echo $getst->name; ?></option>
                                            <?php } ?>

                                        <?php } ?>

                                    <?php } else { ?>

                                        <option value="" disabled="disabled" selected>Select City</option>

                                    <?php } ?>
                                </select>
                                <div style="color:red;"><span id="city_error"></span></div>
                            </div><!--/ [col] -->






                            <div class="col-sm-6">
                                <label for="b_postal_code" class="required">Zip/Postal Code</label>
                                <input class="input form-control ap_checkout_inp" type="text" name="b_postal_code"
                                       id="postal_code"
                                       value="<?php if (!empty($usrmakey)) {
                                           echo $record->zip_code;
                                       } ?>" required>
                                <div style="color:red;"><span id="zip_error"></span></div>
                            </div><!--/ [col] -->

                        </li><!--/ .row -->

















{{-- part-5 --}}
                        <li class="row two_inp_cnt">
                            <div class="col-sm-6">
                                <label for="b_telephone" class="required">Telephone</label>
                                <input class="input form-control ap_checkout_inp" type="text" name="b_telephone"
                                       id="b_telephone"
                                       value="<?php if (!empty($usrmakey)) {
                                           echo $record->mobile;
                                       } ?>" required>
                                <div style="color:red;"><span id="tel_error"></span></div>
                            </div><!--/ [col] -->

                            <div class="col-sm-6">
                                <label for="b_fax">Fax</label>
                                <input class="input form-control ap_checkout_inp" type="text" name="b_fax" id="b_fax"
                                       value="<?php if (!empty($usrmakey)) {
                                           echo $record->mobile;
                                       } ?>" required>
                                <div style="color:red;"><span id="fax_error"></span></div>
                            </div><!--/ [col] -->

                            <!-- <div class="col-sm-6">
                            <label for="fax">Company Name(Optional)</label>
                            <input class="input form-control" type="text" name="company_name" id="company_name" value="" disabled>
                        </div>-->

                        </li><!--/ .row -->
                        <?php /*
                                <li class="row" id="create-account-row" style="display: none;">
                                <div class="col-sm-6" >
                                <label for="password" type="hidden" class="required" id="passwordlabel">Password</label>
                            <input class="input form-control" type="password" name="password" id="password">
                            </div><!--/ [col] -->

                            <div class="col-sm-6">
                            <label for="confirm" type="hidden" class="required" id="confirmlabel">Confirm Password</label>
                            <input class="input form-control" type="password" name="confirm" id="confirm">
                            <div  style="color:red;"><span id="fax_error2"></span></div>
                            </div><!--/ [col] -->
                            </li><!--/ .row -->
                        <?php */ ?>

                    </ul>
                </div>






                <?php

                if (!empty($usrmakey)) {
                    ?>
                    <h3 class="checkout-sep">3. Shipping Information</h3>
                    <div class="box-border">
                        <ul>
                            <li class="row two_inp_cnt">




                                <div class="col-sm-6">
                                    <label for="first_name" class="required">First Name</label>
                                    <input type="text" class="input form-control ap_checkout_inp" name="sfirst_name"
                                           id="sfirst_name"
                                           value="<?php if (!empty($usrmakey)) {
                                               echo $record->first_name;
                                           } ?>" required>
                                    <div style="color:red;"><span id="sfirst_error"></span></div>
                                </div><!--/ [col] -->
                                <div class="col-sm-6">
                                    <label for="last_name" class="required">Last Name</label>
                                    <input type="text" name="slast_name" class="input form-control ap_checkout_inp"
                                           id="slast_name"
                                           value="<?php if (!empty($usrmakey)) {
                                               echo $record->last_name;
                                           } ?>" required>
                                    <div style="color:red;"><span id="slast_error"></span></div>
                                </div><!--/ [col] -->
                            </li><!--/ .row -->




                            <li class="row two_inp_cnt">
                                <div class="col-sm-6">
                                    <label for="email_address" class="required">Email Address</label>
                                    <input type="text" class="input form-control ap_checkout_inp" name="semail_address"
                                           id="semail_address" value="<?php if (!empty($usrmakey)) {
                                        echo $record->email;
                                    } ?>" required>
                                    <div style="color:red;"><span id="semail_error"></span></div>
                                </div><!--/ [col] -->
                                <div class="col-sm-6">
                                    <label for="address" class="required">Address</label>
                                    <input type="text" class="input form-control ap_checkout_inp" name="saddress"
                                           id="saddress" value="<?php if (!empty($usrmakey)) {
                                        echo $record->address;
                                    } ?>" required>
                                    <div style="color:red;"><span id="sadd_error"></span></div>
                                </div><!--/ [col] -->
                            </li><!--/ .row -->



















{{-- part-6 --}}
                            <li class="row two_inp_cnt">
                                <div class="col-sm-6 ap_clear_container">
                                    <label for="user_countrys" class="required">Country</label>
                                    <select id="user_countrys" name="scountry" onchange="schangecount(this.value);"
                                            class="input form-control ap_checkout_select_inp" required>
                                        <?php if ($record->user_countrykey) { ?>

                                            <option value="<?php echo $record->user_countrykey; ?>"
                                                    selected><?php echo $record->user_country; ?></option>

                                        <?php } else { ?>

                                            <option value="" disabled="disabled" selected>Select Country</option>

                                        <?php } ?>

                                        <?php foreach ($countrylist as $contlst) { ?>
                                            <option value="<?php echo $contlst->id; ?>"><?php echo $contlst->name; ?></option>
                                        <?php } ?>
                                    </select>

                                    <div style="color:red;"><span id="scountry_error"></span></div>
                                </div><!--/ [col] -->

                                <div class="col-sm-6 ap_clear_container">
                                    <label class="required">State/Province</label>
                                    <select class="input form-control ap_checkout_select_inp" id="user_sstate"
                                            name="sstate"
                                            onchange="schangecity(this.value);" required>
                                        <?php if ($record->user_statekey) { ?>

                                            <option value="<?php echo $record->user_statekey; ?>"
                                                    selected><?php echo $record->user_state; ?></option>

                                            <?php if ($record->user_countrykey) {

                                                $resultBlSt = $admin_model_obj->showstatelist($record->user_countrykey);

                                                foreach ($resultBlSt as $getst) { ?>
                                                    <option value="<?php echo $getst->stateid; ?>"><?php echo $getst->statename; ?></option>
                                                <?php } ?>

                                            <?php } ?>

                                        <?php } else { ?>

                                            <option value="" disabled="disabled" selected>Select State</option>

                                        <?php } ?>
                                    </select>
                                    <div style="color:red;"><span id="sstate_error"></span></div>
                                </div><!--/ [col] -->
                            </li><!--/ .row -->






                            <li class="row two_inp_cnt">
                                <div class="col-sm-6 ap_clear_container">
                                    <label for="city" class="required">City</label>
                                    <select class="input form-control ap_checkout_select_inp" id="user_scity"
                                            name="scity"
                                            required>
                                        <?php if ($record->user_citykey) { ?>

                                            <option value="<?php echo $record->user_citykey; ?>"
                                                    selected><?php echo $record->user_city; ?></option>

                                            <?php if ($record->user_statekey) {

                                                $resultBlCity = $admin_model_obj->showcitylist($record->user_statekey);

                                                foreach ($resultBlCity as $getst) { ?>
                                                    <option value="<?php echo $getst->id; ?>"><?php echo $getst->name; ?></option>
                                                <?php } ?>

                                            <?php } ?>

                                        <?php } else { ?>

                                            <option value="" disabled="disabled" selected>Select City</option>

                                        <?php } ?>
                                    </select>
                                    <div style="color:red;"><span id="scity_error"></span></div>
                                </div><!--/ [col] -->







                                <div class="col-sm-6 ap_clear_container">
                                    <label for="postal_code" class="required">Zip/Postal Code</label>
                                    <input class="input form-control ap_checkout_inp" type="text" name="spostal_code"
                                           id="spostal_code"
                                           value="<?php if (!empty($usrmakey)) {
                                               echo $record->zip_code;
                                           } ?>" required>
                                    <div style="color:red;"><span id="szip_error"></span></div>
                                </div><!--/ [col] -->
                            </li><!--/ .row -->

                            <li class="row two_inp_cnt">
                                <div class="col-sm-6">
                                    <label for="telephone" class="required">Telephone</label>
                                    <input class="input form-control ap_checkout_inp" type="text" name="stelephone"
                                           id="stelephone"
                                           value="<?php if (!empty($usrmakey)) {
                                               echo $record->mobile;
                                           } ?>" required>
                                    <div style="color:red;"><span id="stel_error"></span></div>
                                </div><!--/ [col] -->

                                <div class="col-sm-6">
                                    <label for="fax">Fax</label>
                                    <input class="input form-control ap_checkout_inp" type="text" name="sfax" id="sfax"
                                           value="<?php if (!empty($usrmakey)) {
                                               echo $record->mobile;
                                           } ?>">
                                    <div style="color:red;"><span id="sfax_error"></span></div>
                                </div><!--/ [col] -->

                                <!-- <div class="col-sm-6">
                            <label for="fax">Company Name(Optional)</label>
                            <input class="input form-control" type="text" name="scompany" id="company" value="">
                            </div>-->

                            </li><!--/ .row -->


                        </ul>
                    </div>
                <?php } ?>
























{{-- part-7 --}}

                <?php if ((isset($itemsTotal) && $itemsTotal > 0) || $checkSpecialFeesTotal > 0 || $checkProductsShippingFeesTotal > 0) { ?>

                    <input type="hidden" name="payment_type" value="by_stripe">

                <?php } else { ?>

                    <input type="hidden" name="payment_type" value="by_amplepoints">

                <?php } ?>

                <h3 class="checkout-sep">4. Order Summary</h3>
                <div class="box-border" style="overflow:auto;">
                    <table class="table table-bordered table-responsive cart_summary">
                        <thead>
                        <tr>
                            <th class="cart_product">Product</th>
                            <th>Description</th>
                            <th>Amples</th>
                            <th>Pickup / Delivery</th>
                            <th>Unit price</th>
                            <th>Qty</th>
                            <th>Tax</th>
                            <th>Special Fees</th>
                            <th>Shipping OR Delivery</th>
                            <th>Total</th>
                            <th>Total amount</th>
                            <th class="action"><i class="fa fa-trash-o"></i></th>
                        </tr>
                        </thead>
                        <tbody id="checkoutitemlist">

                        <?php //echo "<pre>";print_r($this->totalcartdata);die; ?>

                        <?php

                        $keycount = 1;
                        $FinalTotal = 0;
                        $finalTextTotal = 0;
                        $finalShipingTotal = 0;
                        $finalSpecialFeesTotal = 0;
                        $overAllTotal = 0;

                        if (count($totalcartdata)>0) {
                            //echo "<pre>";print_r($this->totalcartdata);die;
                            foreach ($totalcartdata as $key) {
                                //print_r($this->totalcartdata);

                                $CurrentVendorIdIs = $key->vendor_id;

                                $is_buy_without_ample_pro = $key->is_buy_without_ample;

                                ?>

                                <tr>
                                    <td class="cart_product">

                                        <?php if ($is_buy_without_ample_pro) { ?>

                                            {{-- <a href="<?php echo $this->baseUrl('/productdetail/') . $key['product_id'] . '/no_ample/true'; ?>"><img
                                                        src="<?php echo $admin_model_obj->OnlyCdnUrl('/product_images/') . $key['product_id'] . '/' . $key['imaged']; ?>"
                                                        alt="Product"></a> --}}

                                                        <a href="{{ url('/productdetail/' . $key->product_id . '/no_ample/true') }}">
                                                            <img src="https://amplepoints.com/product_images/{{$key->product_id}}/{{$key->imaged}}" alt="Product">
                                                        </a>

                                        <?php } else { ?>

                                            {{-- <a href="<?php echo $this->baseUrl('/productdetail/') . $key['product_id']; ?>"><img
                                                        src="<?php echo $admin_model_obj->OnlyCdnUrl('/product_images/') . $key['product_id'] . '/' . $key['imaged']; ?>"
                                                        alt="Product"></a> --}}

                                                        <a href="{{ url('/productdetail/' . $key->product_id) }}">
                                                            <img src="{{ asset('product_images/' . $key->product_id . '/' . $key->imaged) }}" alt="Product">
                                                        </a>
                                        <?php } ?>
                                    </td>


















{{-- part-8 --}}
                                    <td class="cart_description">

                                        <?php if ($is_buy_without_ample_pro) { ?>

                                            <p class="product-name">
                                                {{-- <a href="<?php echo $this->baseUrl('/productdetail/') . '' . $key['product_id'] . '/no_ample/true'; ?>"><?php echo $key['item_added']; ?> </a> --}}

                                                <a href="{{ url('/productdetail/' . $key->product_id . '/no_ample/true') }}">
                                                    {{ $key->item_added }}
                                                </a>

                                            </p>

                                        <?php } else { ?>

                                            <p class="product-name">
                                               {{--  <a
                                                        href="<?php echo $this->baseUrl('/productdetail/') . '' . $key['product_id']; ?>"><?php echo $key['item_added']; ?> </a> --}}

                                                        <a href="{{ url('/productdetail/' . $key->product_id) }}">
                                                            {{ $key->item_added }}
                                                        </a>

                                            </p>

                                        <?php } ?>
                                        <small class="cart_ref">SKU : #123654999</small>
                                        <br>



                                        <small>Color :
                                            <div style="margin:-21px 0px 0px 50px;width:20px;height:20px;background-color:<?php echo $key->cacolor; ?>;"></div>
                                        </small>
                                        <small>Size : <?php echo $key->casize; ?></small>
                                    </td>
                                    <td class="cart_avail">
                                        <?php if ($key->is_buy_without_ample == 1) { ?>
                                            Product Without Amplepoints
                                        <?php } else { ?>
                                            <span class="label label-success">Earn Amples : <?php echo (int)strip_tags($key->earned_amples); ?></span>
                                            <span class="label label-success">Redeem Amples : <?php echo (int)strip_tags($key->apply_amples); ?></span>
                                        <?php } ?>
                                    </td>






                                    <!--delivery detail-->
                                    <td class="cart_pickup_delivery">

                                        <?php

                                        if (empty($usrmakey)) {
                                            $userid = 0;
                                        } else {
                                            $userid = $usrmakey;
                                        }

                                        $deliverysetnew = $admin_model_obj->getDeliverySet($key->vendor_id, $key->product_id, $userid, $key->is_buy_without_ample, $key->is_buy_free);

                                        $keycount = 1;

                                       // dd($deliverysetnew);

                                        ?>
                                        <strong>&nbsp; &nbsp; &nbsp; &nbsp;
                                            <?php

                                            //echo "<pre>";print_r($deliverysetnew);

                                            $mydeleviryType = $deliverysetnew;

                                            //echo "<pre>";print_r($mydeleviryType);

                                            if (!empty($mydeleviryType) and $mydeleviryType->delivery_type == 'pickup') {

                                                //echo "<pre>";print_r($key);

                                                $Location_id = $mydeleviryType->del_loc_id;
                                                $Location_address = $mydeleviryType->pickuplocation;

                                                $PvendorId = $key->vendor_id;

                                                $AddedId = $key->productaddedid;

                                                $vendorTableDta = DB::table('tbl_vendor')->where('tbl_vndr_id', $PvendorId)->first();

                                                $vendor_unique_key = $vendorTableDta->vendor_qnique_id;

                                                //echo  $vendor_unique_key; address_id

                                                $uqryresult = mysqli_query($connection, "UPDATE `products_added` SET  `delivery-type` =  'pickup' ,`order_confirm_vendor_id` =  '$vendor_unique_key' ,`address_id` =  '$Location_id' ,`full_address` =  '$Location_address' WHERE  `id` = $AddedId");
                                                ?>

                                                <input type="hidden" name="deliverytype[]" value="pickup">
                                                <input type="checkbox" <?php if ($mydeleviryType->delivery_type == 'pickup') {
                                                    echo 'checked';
                                                } ?> class="pickdate" id="vdrpickupdivadr<?php echo $keycount; ?>"
                                                       value="PickUp" disabled="disabled" name="deliverytypepickup">
                                                </input>Pickup &nbsp; &nbsp; &nbsp;</br>
                                                Store Name :- <?= $mydeleviryType->pickuplocation; ?></br>
                                                <input type="hidden" name="pickupstore"
                                                       value="<?= $mydeleviryType->pickuplocation; ?>">
                                                Date :- <?= date('m/d/Y', strtotime($mydeleviryType->pickup_date)); ?></br>
                                                <input type="hidden" name="pickupdate"
                                                       value="<?= $mydeleviryType->pickup_date; ?>">
                                                Time  :- <?= $mydeleviryType->pickup_time; ?>
                                                <input type="hidden" name="pickuptime"
                                                       value="<?= $mydeleviryType->pickup_time; ?>">

                                            <?php } ?>























{{-- part-9 --}}
                                            <?php if (!empty($mydeleviryType) and $mydeleviryType->delivery_type == 'online') {

                                                $onlineAddedId = $key->productaddedid;

                                                $onlineresult = mysqli_query($connection, "UPDATE `products_added` SET  `delivery-type` =  'online' WHERE  `id` = $onlineAddedId");

                                                ?>

                                                <input type="hidden" name="deliverytype[]" value="online">
                                                <input type="checkbox" <?php if ($mydeleviryType->delivery_type == 'online') {
                                                    echo 'checked';
                                                } ?> class="pickonine" id="vdronlinedivadr<?php echo $keycount; ?>"
                                                       value="online" disabled="disabled" name="deliverytypeonline">
                                                </input>Online &nbsp; &nbsp; &nbsp;</br>
                                                Location Name :- <?= $mydeleviryType->onlinelocation; ?></br>
                                                <input type="hidden" name="onlinestore"
                                                       value="<?= $mydeleviryType->onlinelocation; ?>">
                                            <?php } ?>


                                            <?php if (!empty($mydeleviryType) and $mydeleviryType->delivery_type == 'delivery') {

                                                $delvendor = $key->vendor_id;

                                                $AddedId = $key->productaddedid;

                                                //$del_vendorTableDta = $admin_model_obj->getvendortabledata($delvendor);

                                                $del_vendorTableDta = DB::table('tbl_vendor')->where('tbl_vndr_id', $delvendor)->first();

                                                $del_vendor_unique_key = $del_vendorTableDta->vendor_qnique_id;

                                                $deliveryuqryresult = mysqli_query($connection, "UPDATE `products_added` SET  `delivery-type` =  'delivery',`order_confirm_vendor_id` =  '$del_vendor_unique_key' WHERE  `id` = $AddedId");

                                                ?>

                                                <input type="hidden" name="deliverytype[]" value="delivery">
                                                <input type="radio" <?php if ($mydeleviryType->delivery_type == 'delivery') {
                                                    echo 'checked';
                                                } ?> class="delivrydata" id="cstdelverdivadr<?php echo $keycount; ?>"
                                                       disabled="disabled" value="delivery"
                                                       name="deliverytype_delivery"></input>Delivery &nbsp; &nbsp; &nbsp;</br>

                                                <!--<input type="textarea" value="" id="delivry_adress" name="deladdresss"> -->

                                                <?php if (!empty($mydeleviryType->delivery_address)) {
                                                    echo "Delivery Address :" . $mydeleviryType->delivery_address;
                                                } ?>

                                            <?php } ?>























{{-- part-10 --}}
                                            <?php if (!empty($mydeleviryType) and $mydeleviryType->delivery_type == 'byappoint') {

                                                $vid = $key->vendor_id;
                                                $pid = $key->product_id;

                                                $AddedId = $key->productaddedid;

                                                $byappointuqryresult = mysqli_query($connection, "UPDATE `products_added` SET  `delivery-type` =  'byappoint' WHERE  `id` = $AddedId");

                                                ?>
                                                <input type="hidden" name="deliverytype[]" value="byappoint">
                                                <input type="radio"
                                                       class="byappointdata" <?php if ($mydeleviryType->delivery_type == 'byappoint') {
                                                    echo 'checked';
                                                } ?> id="vdrbyappointkupdivadr<?php echo $keycount; ?>"
                                                       value="By Appointment" name="deliverytype_byappoint"
                                                       disabled="disabled">
                                                </input>By Appointment</br>

                                                Appointment Date: <?= $mydeleviryType->byappoint_date ?>
                                                </br>
                                                <input type="hidden" name="appointdate"
                                                       value="<?= $mydeleviryType->byappoint_date ?>">
                                                Appointment Time: <?= $mydeleviryType->byappoint_time ?> </br>
                                                <input type="hidden" name="appointtime"
                                                       value="<?= $mydeleviryType->byappoint_time ?>">
















{{-- part-11 --}}
                                                <?php
                                                $appoint_id = $mydeleviryType->byappoint_location;
                                                $byappoint = $admin_model_obj->get_appointlocation($appoint_id, $vid, $pid);
                                                 ?>
                                                Appointment Empoyee Name: <?= $byappoint->employee ?>

                                                </br>
                                                <input type="hidden" name="employessName"
                                                       value="<?= $byappoint->employee ?>">
                                                Appointment Store Name:<?= $byappoint->store ?>
                                                </br>
                                                <input type="hidden" name="byappointstore"
                                                       value="<?= $byappoint->store ?>">
                                                <?php
                                                $byappointstore = $byappoint->store;
                                                $byappointlocation = $admin_model_obj->get_appointlocationbystore($byappointstore, $vid); ?>
                                                Appointment Location:<?= $byappointlocation->loc_address ?>
                                                </br>
                                                <input type="hidden" name="byappointloction"
                                                       value="<?= $byappointlocation->loc_address ?>">

                                            <?php } ?>



















{{-- part-12  --}}
                                            <?php if (!empty($mydeleviryType) and $mydeleviryType->delivery_type == 'shipment') {

                                                $AddedId = $key->productaddedid;

                                                $shipmentuqryresult = mysqli_query($connection, "UPDATE `products_added` SET  `delivery-type` =  'shipment' WHERE  `id` = $AddedId");

                                                ?>
                                                <input type="hidden" name="deliverytype[]" value="shipment">
                                                <input type="checkbox"
                                                       class="shipping" <?php if ($mydeleviryType->delivery_type== 'shipment') {
                                                    echo 'checked';
                                                } ?> disabled="disabled" id="vdrshippupdivadr<?php echo $keycount; ?>"
                                                       value="shippment" name="deliverytype_shipment">
                                                </input>





                                                Shipping
                                                <div class="shipp type">
                                                    shipment Type:-
                                                    <?php if ($mydeleviryType->shipping_type == 'ss') { ?>
                                                        Standard Shipping
                                                        <input type="hidden" name="shiptype" value="Standard Shipping">
                                                    <?php } else if ($mydeleviryType->shipping_type == 'CS') { ?>
                                                        Cexpress Shipping
                                                        <input type="hidden" name="shiptype" value="Cexpress Shipping">
                                                    <?php } else if ($mydeleviryType->shipping_type == 'Fedex') { ?>
                                                        Fedex
                                                        <input type="hidden" name="shiptype" value="Fedex">
                                                    <?php } else if ($mydeleviryType->shipping_type == 'UPS') { ?>
                                                        UPS
                                                        <input type="hidden" name="shiptype" value="UPS">
                                                    <?php } ?>

                                                </div>

                                            <?php } ?>
                                        </strong> <br/>
                                    </td>




















{{-- part-13 --}}
                                    <!--end delivery detail-->
                                    <td class="price"><span><?php echo $currencySymbol; ?><?php echo $key->item_single_price;

                                            /* if(($key->apply_amples == 0.00) && ($key->newprice_byamples == 0.00)) { echo $key->item_single_price; } else { echo $key->newprice_byamples; } */

                                            ?></span></td>
                                    <td class="qty">
                                        <input class="form-control input-sm" type="text"
                                               value="<?php echo $key->item_added_quantity; ?>" disabled readonly/>
                                        <?php if (($key->apply_amples == 0.00) && ($key->newprice_byamples == 0.00)) { ?>

                                            <?php if ($key->is_buy_without_ample == 1) { ?>


                                                <a href="javascript:void(0);"
                                                   onclick="increase_iteam('<?php echo $key->item_added; ?>','<?php echo $key->product_id; ?>','<?php echo @$key->min_order_quantity; ?>','<?php echo @$key->discount_price_without_ample; ?>','0.00','<?php if (!empty($record->total_ample)) {
                                                       echo $record->total_ample;
                                                   } else {
                                                       echo "0.00";
                                                   } ?>','<?php echo $usrmakey; ?>','<?php echo $key->vendor_id; ?>','add',1);"><i
                                                            class="fa fa-caret-up"></i></a>

                                            <?php } else { ?>




                                                <a href="javascript:void(0);"
                                                   onclick="increase_iteam('<?php echo $key->item_added; ?>','<?php echo $key->product_id; ?>','<?php echo @$key->min_order_quantity; ?>','<?php echo $key->item_single_price; ?>','<?php if (!empty($key->earned_amples)) {
                                                       echo $key->earned_amples;
                                                   } else {
                                                       echo "0.00";
                                                   } ?>','<?php if (!empty($record->total_ample)) {
                                                       echo $record->total_ample;
                                                   } else {
                                                       echo "0.00";
                                                   } ?>','<?php echo $usrmakey; ?>','<?php echo $key->vendor_id; ?>','add',0);"><i
                                                            class="fa fa-caret-up"></i></a>

                                            <?php } ?>








                                            <?php if ($key->is_buy_without_ample == 1) { ?>


                                                <a href="javascript:void(0);"
                                                   onclick="decrease_iteam('<?php echo $key->item_added; ?>','<?php echo $key->product_id; ?>','<?php echo @$key->min_order_quantity; ?>','<?php echo @$key->discount_price_without_ample; ?>','<?php echo $usrmakey; ?>','del',1);"><i
                                                            class="fa fa-caret-down"></i></a>

                                            <?php } else { ?>

                                                <a href="javascript:void(0);"
                                                   onclick="decrease_iteam('<?php echo $key->item_added; ?>','<?php echo $key->product_id; ?>','<?php echo @$key->min_order_quantity; ?>','<?php echo $key->item_single_price; ?>','<?php echo $usrmakey; ?>','del',0);"><i
                                                            class="fa fa-caret-down"></i></a>

                                            <?php } ?>


                                        <?php } ?>
                                    </td>

















 {{-- part-14  --}}
                                    <?php /*now calculate text*/ ?>

                                    <?php

                                    $MyItemPrice = 0;
                                    $MyText = 0;
                                    $MyTotal = 0;
                                    $MyTotalAmount = 0;
                                    $MyShipingCharge = 0;
                                    $MySpecialFeeCharge = 0;

                                    $myItemTotal = $key->item_added_quantity;

                                    $MyItemPrice = $key->item_single_price;

                                    $MyTotal = $key->item_added_price;


                                    $SpecialFeesDataVdr = $admin_model_obj->GetVendorSpecialFeesDetail($CurrentVendorIdIs);

                                    if (@$SpecialFeesDataVdr) {

                                        if (!empty($SpecialFeesDataVdr->special_fee) && $SpecialFeesDataVdr->special_fee > 0) {

                                            $MySpecialFeeCharge += $SpecialFeesDataVdr->special_fee;
                                        }

                                        if (!empty($SpecialFeesDataVdr->special_fee_percentage) && $SpecialFeesDataVdr->special_fee_percentage > 0) {

                                            $FinalSpecialPercentageAmount = ((($key->item_single_price * $key->item_added_quantity) * $SpecialFeesDataVdr->special_fee_percentage) / 100);

                                            $MySpecialFeeCharge += $FinalSpecialPercentageAmount;
                                        }

                                    }

                                    /* if(($key['apply_amples'] == 0.00) && ($key['newprice_byamples'] == 0.00)) {

                                    $MyItemPrice = $key['item_single_price'];
                                    $MyTotal = $key['item_added_quantity']*$key['item_single_price'];

                                    }else{

                                    $MyItemPrice = $key['newprice_byamples'];
                                    $MyTotal = $key['item_added_quantity']*$key['newprice_byamples'];
                                    }*/

                                    if (!empty($mydeleviryType) and $mydeleviryType->delivery_type == 'shipment') {

                                        $shipprice = $admin_model_obj->get_shipp_price($key->product_id);

                                        if (!empty($shipprice)) {

                                            $MyShipingCharge = (int)$shipprice->shipp_price;
                                           //(int) dd( (int)$shipprice->shipp_price );

                                        }
                                    }




                                    if (!empty($mydeleviryType) and $mydeleviryType->delivery_type == 'delivery') {

                                        $deleveryshipprice = $admin_model_obj->get_delivery_price_detail($key->product_id);

                                        if (!empty($deleveryshipprice)) {

                                            if (!empty($mydeleviryType) and $mydeleviryType->delivery_type == 'delivery') {

                                                $MyShipingCharge = (int)$deleveryshipprice->delivery_fee;

                                            }

                                        }

                                    }

                                    $tax_detail = '';


                                    if (!empty($usrmakey)) {

                                        if ($record->user_state == 'Nevada' && $record->user_statekey == '3951') {

                                            $UserName = $record->first_name . " " . $record->last_name;

                                            $UserAddress = $record->address;
                                            $UserZipCode = $record->zip_code;
                                            $UserCity = $record->user_city;

                                            $tb = new Avalara\TransactionBuilder($client, "AMPLEPOINTSLLC", Avalara\DocumentType::C_SALESINVOICE, $UserName);
                                            $t = $tb->withAddress('SingleLocation', $UserAddress, null, null, $UserCity, 'NV', $UserZipCode, 'US')
                                                ->withLine($MyTotal, 1, $key->product_id, "P0000000")
                                                ->create();

                                            if (!empty($t)) {

                                                //echo "<pre>";print_r($t);

                                                $MyText = $t->totalTax;

                                                $tax_detail = $t->code;

                                            }

                                        }
                                    }

                                    $MyTotalAmount = (float)$MyTotal + (float)$MyText + (float)$MySpecialFeeCharge + (float)$MyShipingCharge;

                                    //dd( $MyTotalAmount);

                                    ?>

                                    <td class="price">
                                        <span><?php echo $currencySymbol; ?><?php echo number_format((float)$MyText, 2); ?></span>
                                    </td>
                                    <?php /*now calculate Special Fees over*/ ?>
                                    <td class="price">
                                        <span><?php echo $currencySymbol; ?><?php echo number_format((float)$MySpecialFeeCharge, 2); ?></span>
                                    </td>
                                    <?php /*now calculate text over*/ ?>
                                    <td class="price">
                                        <span><?php echo $currencySymbol; ?><?php echo number_format((float)($MyShipingCharge), 2); ?></span>
                                    </td>
                                    <td class="price">
                                        <span><?php echo $currencySymbol; ?><?php echo number_format((float)($MyTotal), 2); ?></span>
                                    </td>
                                    <td class="price">
                                        <span><?php echo $currencySymbol; ?><?php echo number_format((float)($MyTotalAmount), 2); ?></span>
                                    </td>
                                    <td class="action">
                                        <a href="javascript:void(0);"
                                           onclick="remove_this_item('<?php echo $key->productaddedid; ?>','<?php echo $usrmakey; ?>');">Delete
                                            item</a>
                                    </td>
                                </tr>

                                <?php
                                $FinalTotal += (float)$MyTotal;
                                $finalTextTotal += (float)$MyText;
                                $finalShipingTotal += (float)$MyShipingCharge;
                                $finalSpecialFeesTotal += (float)$MySpecialFeeCharge;
                                $overAllTotal += (float)$MyTotalAmount;
                                $urid = $usrmakey;
                                $prid = $key->product_id;
                                $poductaddedID = $key->productaddedid;


                                ///////$uqry = mysqli_query($connection, "UPDATE products_added set tax='$MyText',shipping='$MyShipingCharge',special_fees_amount = '$MySpecialFeeCharge',tax_detail = '$tax_detail' WHERE id = '$poductaddedID' AND product_id='$prid' AND customer_Id = '$urid'");

                                //dd($MyText,$MyShipingCharge,$MySpecialFeeCharge,$tax_detail);

                                $uqry = DB::table('products_added')
                                        ->where('id', $poductaddedID)
                                        ->where('product_id', $prid)
                                        ->where('customer_Id', $urid)
                                        ->update([
                                            'tax' => $MyText,
                                            'shipping' => $MyShipingCharge,
                                            'special_fees_amount' => $MySpecialFeeCharge,
                                            'tax_detail' => $tax_detail,
                                        ]);


                                // echo "UPDATE products_added set tax='$MyText',shipping='$MyShipingCharge' WHERE product_id='$prid' and customer_Id = '$urid' ";

                               /////// mysqli_query($connection, $uqry);
                                $keycount++;
                            }

                        } else {
                            echo "<tr> <td> No Item Available in My Cart </td> </tr>";
                        } ?>

                        </tbody>
                        <tfoot>
                        <tr>
                            <td colspan="2" rowspan="2"></td>
                            <td colspan="3">Total Products</td>
                            <td colspan="7"><span
                                        id="totalcheckouttaxamount"> <?php echo $currencySymbol; ?><?php echo number_format(($FinalTotal), 2); ?></span>
                            </td>
                        </tr>
                        <tr>
                            <td colspan="3">Total Tax</td>
                            <td colspan="7"><span
                                        id="totalcheckoutamount"><?php echo $currencySymbol; ?><?php echo number_format(($finalTextTotal), 2); ?></span>
                            </td>
                        </tr>
                        <tr>
                            <td colspan="5">Special Fees Charges</td>
                            <td colspan="7"><span
                                        id="totalcheckoutamount"><?php echo $currencySymbol; ?><?php echo number_format(($finalSpecialFeesTotal), 2); ?></span>
                            </td>
                        </tr>
                        <tr>
                            <td colspan="2" rowspan="2"></td>
                            <td colspan="3">Total Shipping</td>
                            <td colspan="7"><span
                                        id="totalcheckouttaxamount"><?php echo $currencySymbol; ?><?php echo number_format(($finalShipingTotal), 2); ?></span>
                            </td>
                        </tr>
                        <tr>
                            <td colspan="3"><strong>Total</strong></td>
                            <td colspan="7"><strong><span
                                            id="totalcheckouttaxamount"><?php echo $currencySymbol; ?><?php echo number_format((round($overAllTotal)), 2); ?></span></strong>
                            </td>
                        </tr>
                        </tfoot>
                    </table>
                    <input type="hidden" name="overalltotal" value="<?php echo $overAllTotal; ?>">
                    <?php if (count($totalcartdata) > 0) { ?>
                        <button type="submit" id="savecheckoutdata" style="display:none;"></button>
                        <button type="sunmit" class="button pull-right" id="checkpickdelivery">Process Order</button>
                    <?php } ?>
                    <!--<button type="sunmit" class="button pull-right" id="checkpickdelivery" >Place Order</button>-->
                </div>
            </div>
        </form>
    </div>
</div>






{{-- @include('includes.footer') --}}
@include('includes.script')
@include('member.checkout.checkout_scripts')
