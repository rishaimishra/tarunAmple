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
                    <form method="POST" action="{{route('admin.product.insert')}}" enctype="multipart/form-data">
                        @csrf
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


                                @include('admin.product.basic_details')

                                @include('admin.product.chose_category')

                                @include('admin.product.pricing_details')
                                
                                @include('admin.product.chose_product_slider')
                                
                                @include('admin.product.chose_product_images')
                                
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