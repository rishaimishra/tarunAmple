@extends('Layouts.app')
@section('meta')
{{-- all meta tags --}}
@endsection
@section('title')
<title>Amplepoints | Category By Mail</title>
@endsection
@include('includes.head')
@include('includes.new_head')
@include('includes.header')
@include('member.storeAndCategory.productBySallerCss')

{{--  <link rel="stylesheet" type="text/css" href="https://amplepoints.com/newcss/css/font-awesome/css/font-awesome.css" />
    <link rel="stylesheet" type="text/css" href="https://amplepoints.com/newcss/css/font-awesome/css/font-awesome.min.css" />

    <link rel="stylesheet" type="text/css" href="https://amplepoints.com/newcss/fonts/glyphicons-halflings-regular.ttf" />
    <link rel="stylesheet" type="text/css" href="https://amplepoints.com/newcss/css/bootstrap.min.css" />
    <link rel="stylesheet" type="text/css" href="https://amplepoints.com/newcss/css/main-style.css" />
    <link rel="stylesheet" type="text/css" href="https://amplepoints.com/newcss/css/amplepoint-style.css" />
    <link rel="stylesheet" type="text/css" href="https://amplepoints.com/newcss/css/amples.css" />
    <link rel="stylesheet" type="text/css" href="https://amplepoints.com/newcss/css/replica.css" />
    <link rel="stylesheet" type="text/css" href="https://amplepoints.com/newcss/css/variables.css" >
    <link rel="stylesheet" type="text/css" href="https://amplepoints.com/newcss/css/prodect-a.css" >
    <link rel="stylesheet" type="text/css" href="https://amplepoints.com/newcss/css/prodect-b.css" >
    <link rel="stylesheet" type="text/css" href="https://amplepoints.com/newcss/css/search-header.css" />
    <link rel="stylesheet" type="text/css" href="https://amplepoints.com/newcss/css/POPUP.css" >
    <link rel="stylesheet" type="text/css" href="https://amplepoints.com/newcss/css/responsive.css" >
    <link rel="stylesheet" type="text/css" href="https://amplepoints.com/newcss/css/flyPanels.css" >
    <link rel="stylesheet" type="text/css" href="https://amplepoints.com/newcss/css/prodect-detail.css" >
    <link rel="stylesheet" type="text/css" href="https://amplepoints.com/newcss/css/jquery-ui.css" >
    <link rel="stylesheet" type="text/css" href="https://amplepoints.com/newcss/css/animate-login.css" >

 <script type="text/javascript" src="https://amplepoints.com/newcss/js/jquery.flexslider.js"></script>
 <link rel="stylesheet" type="text/css" href="https://amplepoints.com/newcss/css/newtiles.css"/>

     <script type="text/javascript" language="javascript" src="https://amplepoints.com/newcss/js/animation-style.js"></script>
    <script type="text/javascript" language="javascript" src="https://amplepoints.com/newcss/js/select2.min.js"></script>
    <script type="text/javascript" language="javascript" src="https://amplepoints.com/newcss/js/theme-script.js"></script>
    <script type="text/javascript" language="javascript" src="https://amplepoints.com/newcss/js/owl.carousel.min.js"></script>
    <script type="text/javascript" language="javascript" src="https://amplepoints.com/newcss/js/jquery-ui/jquery-ui.min.js"></script>

    <script type="text/javascript" language="javascript" src="https://amplepoints.com/newcss/js/jquery.leanModal.min.js"></script>

        <script type="text/javascript" language="javascript" src="https://amplepoints.com/newcss/js/bootstrap.min.js"></script>
    <!--<script src="https://maps.google.com/maps/api/js?sensor=true" type="text/javascript"></script>-->
    <script type='text/javascript' src='https://amplepoints.com/newcss/js/gmaps.js'></script>
 --}}




<!-- page wapper-->
<?php
$admin_model_obj =  new \App\Models\AdminImpFunctionModel;
?>
<link rel="stylesheet" type="text/css" href="<?php echo $admin_model_obj->cdnUrl('newcss/css/newtiles.css'); ?>"/>
<?php
$db_host_name = env('DB_HOST');
$db_user_name = env('DB_USERNAME');
$db_user_password = env('DB_PASSWORD');
$db_database_name = env('DB_DATABASE');
$con = mysqli_connect($db_host_name, $db_user_name, $db_user_password, $db_database_name);
if (!$con) {
die('could not connect' . mysqli_error($con));
}
mysqli_select_db($con, $db_database_name);
?>













{{-- part-1 --}}
<section>
	<div class="">
		<div class="all-start-a social-img-social nvslider">
			<div id="carousel-example-generic" class="vendor-section-bnr carousel fadeIn slider-inner-page"
				data-ride="carousel" data-interval="2000">
				<!-- Indicators -->
				<!-- Wrapper for slides -->
				
				<div class="carousel-inner slidr_blue" role="listbox">
					<div class="item  item-inner-page active"
						style="background:url(<?php if ($vendordata[0]->vendor_banner1) {
						echo $admin_model_obj->OnlyCdnUrl('vendor-data/' . $vdrid . '/banner/' . str_replace(' ', '%20', $vendordata[0]->vendor_banner1));
						} else {
						echo $admin_model_obj->OnlyCdnUrl('images/loock-boock.jpg');
						} ?>) no-repeat;  height:500px;"> &nbsp;
					</div>

					<div class="item item-inner-page"
						style="background:url(<?php if ($vendordata[0]->vendor_banner2) {
						echo $admin_model_obj->OnlyCdnUrl('vendor-data/' . $vdrid . '/banner/' . str_replace(' ', '%20', $vendordata[0]->vendor_banner2));
						} else {
						echo $admin_model_obj->OnlyCdnUrl('images/loock-boock.jpg');
						} ?>) no-repeat ;  height:500px;"> &nbsp;
					</div>

					<div class="item item-inner-page"
						style="background:url(<?php if ($vendordata[0]->vendor_banner3) {
						echo $admin_model_obj->OnlyCdnUrl('vendor-data/' . $vdrid . '/banner/' . str_replace(' ', '%20', $vendordata[0]->vendor_banner3));
						} else {
						echo $admin_model_obj->OnlyCdnUrl('images/loock-boock.jpg');
						} ?>) no-repeat ;  height:500px;"> &nbsp;
					</div>

					<div class="item item-inner-page"
						style="background:url(<?php if ($vendordata[0]->vendor_banner4) {
						echo $admin_model_obj->OnlyCdnUrl('vendor-data/' . $vdrid . '/banner/' . str_replace(' ', '%20', $vendordata[0]->vendor_banner4));
						} else {
						echo $admin_model_obj->OnlyCdnUrl('images/loock-boock.jpg');
						} ?>) no-repeat ;  height:500px;"> &nbsp;
					</div>
				</div>




				<div id="parallex-div-div">
					<div class="container">
						<div class="col-lg-3 img-parallax-img-img" style="width: auto;">
							<div class="img-parallax">
								<div class="top-banner-img-a"><img
									src="<?php if ($vendordata[0]->vendor_image) {
									echo $admin_model_obj->OnlyCdnUrl('vendor-data/' . $vdrid . '/profile/' . $vendordata[0]->vendor_image);
									} else {
									echo $admin_model_obj->OnlyCdnUrl('images/img/user2.jpg');
								} ?>" class="imgrounded"></div>
								<div class="top-banner-text-a">
									<h6><?php echo $vendordata[0]->vendor_displayname; ?></h6>
								</div>
							</div>
						</div>
					</div>
				</div>





















{{-- part-2 --}}
				<div id="parallex-div-div-a">
					<div class="container">
						<ul class="mall-des">
							<li><a href="{{-- <?php echo $this->baseUrl('/about-us'); ?> --}}">About Us</a></li>
							<li><a href="">Map</a></li>
							<li><a href="#">Hours</a></li>
							<li><a href="#">Events</a></li>
							<li><a href="#">Video Reviews</a></li>
							<li><a href="{{-- <?php echo $this->baseUrl('/social'); ?> --}}">Social</a></li>
						</ul>
						<div class="button_byseller">
							<?php if ($vendordata[0]->assign_user_id > 0) { ?>
							<div class="channe_left">
								<?php if (!empty($usrmakey)) { ?>
								<a href="{{-- <?php echo $this->baseUrl("portfolioview/pfv/" . $vendordata[0]->assign_user_id . '/' . $portfolilink); ?> --}}"
								class="btn btn-primary" style="float: right;width: auto;">MY CHANNEL</a>
								<?php }else{ ?>
								<script>
								function custtriggermodel() {
								$("#modal_trigger").trigger("click");
								}
								</script>
								<a href="javascript:void(0);" onclick="custtriggermodel();"
								class="btn btn-primary" style="float: right;">MY CHANNEL</a>
								<?php } ?>
							</div>
							<?php } ?>





							<div class="col-lg-3 img-parallax-img-img  parallax-img-a ">
								<div class="img-parallax">
									<?php /*
									<div class="top-banner-text-a">
										<h6><?php echo $this->vendordata[0]['vendor_displayname']; ?></h6>
									</div>
									*/ ?>
									<div class="top-banner-img-a"><img
										src="<?php if ($vendordata[0]->vendor_image) {
										echo $admin_model_obj->OnlyCdnUrl('vendor-data/' . $vdrid . '/profile/' . $vendordata[0]->vendor_image);
										} else {
										echo $admin_model_obj->OnlyCdnUrl('images/img/user2.jpg');
									} ?>" class="imgrounded"></div>
								</div>
							</div>
						</div>
						<div class="col-lg-6  no-space"></div>
					</div>
				</div>
			</div>
		</section>






















{{-- part-3--}}
		<section>
			<div class="nvprd">
				<div class="columns-container">
					<div class="container" id="columns" style="z-index:999; background:#fff;">
						<div class="vender-desh">
							<!-- Left colunm -->
							<div class="column col-xs-12 col-sm-3" id="left_column">
								<!-- block category -->
								<h2 class="page-heading hidden-lg" style="text-align: center;margin-top: 0px;">
								<span class="page-heading-title"><?php echo $vendordata[0]->vendor_displayname; ?></span>
								</h2>
								<!-- ./block category  -->
								<!-- block filter -->
								<div class="block left-module">
									<p class="title_block">Filter selection</p>
									<div class="block_content">
										<!-- layered -->
										<div class="layered layered-filter-price">
											<?php
											$countzeroto50 = 0;
											$count50to100 = 0;
											$count100to500 = 0;
											$count500to1000 = 0;
											$count1000to50000 = 0;
											$fltVdrID = $vendordata[0]->tbl_vndr_uid;
											$countzeroto50 = count($admin_model_obj->getfilterproductcount('', '', '', $fltVdrID, '0-50'));
											$count50to100 = count($admin_model_obj->getfilterproductcount('', '', '', $fltVdrID, '50-100'));
											$count100to500 = count($admin_model_obj->getfilterproductcount('', '', '', $fltVdrID, '100-500'));
											$count500to1000 = count($admin_model_obj->getfilterproductcount('', '', '', $fltVdrID, '500-1000'));
											$count1000to5000 = count($admin_model_obj->getfilterproductcount('', '', '', $fltVdrID, '1000-5000'));
											$count5000to1000000 = count($admin_model_obj->getfilterproductcount('', '', '', $fltVdrID, '5000-1000000'));
											?>
											<!-- filter price -->
											<input type="hidden" name="mysellid" id="myselid"
											value="<?php echo $vendordata[0]->tbl_vndr_uid; ?>">
											<div class="layered_subtitle">price</div>
											{{-- <div class="layered-content slider-range">
												<div data-label-reasult="Range:" data-min="0" data-max="1000" data-unit="$"
													id="slider-range-price-filter" class="slider-range-price"
												data-value-min="0" data-value-max="250"></div>
												<div class="amount-range-price" id="product-price-complete-range">
													Range: <?php echo $currencySymbol; ?>0
													- <?php echo $currencySymbol; ?>250
												</div>
												<input type="hidden" name="amount-price-complete-amount"
												id="amount-price-complete-amount" class="amount-price-complete-range"
												value=""/> --}}

												<div class="layered-content slider-range">
    <div id="slider-range-price-filter" class="slider-range-price"></div>
    <div class="amount-range-price" id="product-price-complete-range">
        Range: $<span id="price-min">0</span> - $<span id="price-max">250</span>
    </div>
    <input type="hidden" name="amount-price-complete-amount" id="amount-price-complete-amount" class="amount-price-complete-range" value=""/>
</div>


												<ul class="check-box-list">
													<li>
														<input type="checkbox" id="p1" value="0-50" name="price_range"/>
														<label for="p1"> <span
														class="button"></span> <?php echo $currencySymbol; ?>0
														- <?php echo $currencySymbol; ?>50<span
														class="count">(<?php echo $countzeroto50; ?>)</span>
													</label>
												</li>
												<li>
													<input type="checkbox" id="p2" value="50-100" name="price_range"/>
													<label for="p2"> <span
													class="button"></span> <?php echo $currencySymbol; ?>
													50 - <?php echo $currencySymbol; ?>100<span
													class="count">(<?php echo $count50to100; ?>)</span> </label>
												</li>
												<li>
													<input type="checkbox" id="p3" value="100-500" name="price_range"/>
													<label for="p3"> <span
													class="button"></span> <?php echo $currencySymbol; ?>
													100 - <?php echo $currencySymbol; ?>500<span
													class="count">(<?php echo $count100to500; ?>)</span>
												</label>
											</li>
											<li>
												<input type="checkbox" id="p4" value="500-1000" name="price_range"/>
												<label for="p4"> <span
												class="button"></span> <?php echo $currencySymbol; ?>
												500 - <?php echo $currencySymbol; ?>1000<span
												class="count">(<?php echo $count500to1000; ?>)</span>
											</label>
										</li>
										<li>
											<input type="checkbox" id="p5" value="1000-5000" name="price_range"/>
											<label for="p5"> <span
											class="button"></span> <?php echo $currencySymbol; ?>
											1000 - <?php echo $currencySymbol; ?>5000<span
											class="count">(<?php echo $count1000to5000; ?>)</span>
										</label>
									</li>
									<li>
										<input type="checkbox" id="p6" value="5000-1000000" name="price_range"/>
										<label for="p6"> <span class="button"></span>Greater
										Than <?php echo $currencySymbol; ?>5000<span
										class="count">(<?php echo $count5000to1000000; ?>)</span>
									</label>
								</li>
							</ul>
						</div>
						<!-- ./filter price -->



























{{-- part-4 --}}

						<!-- Dicount Filter -->
						<div class="layered_subtitle">Filter By Reward</div>
						<?php
						$count0to24Reward = $admin_model_obj->GetCoutForProductTable2($fltVdrID,0,24,1);

						$count25to49Reward = $admin_model_obj->GetCoutForProductTable2($fltVdrID,25,49,1);

						$count50to74Reward = $admin_model_obj->GetCoutForProductTable2($fltVdrID,50,74,1);

						$count75to100Reward = $admin_model_obj->GetCoutForProductTable2($fltVdrID,75,100,1);

						?>
						<ul class="check-box-list">
							<li>
								<input type="checkbox" id="rew_1" value="0-24" name="reward_range"/>
								<label for="rew_1"> <span class="button"></span>0 - 24%<span
							class="count">(<?php echo $count0to24Reward; ?>)</span>
						</label>
					</li>
					<li>
						<input type="checkbox" id="rew_2" value="25-49" name="reward_range"/>
						<label for="rew_2"> <span class="button"></span> 25 - 49%<span
					class="count">(<?php echo $count25to49Reward; ?>)</span>
				</label>
			</li>
			<li>
				<input type="checkbox" id="rew_3" value="50-74" name="reward_range"/>
				<label for="rew_3"> <span class="button"></span> 50 - 74%<span
			class="count">(<?php echo $count50to74Reward; ?>)</span>
		</label>
	</li>
	<li>
		<input type="checkbox" id="rew_4" value="75-100" name="reward_range"/>
		<label for="rew_4"> <span class="button"></span> 75 - 100%<span
	class="count">(<?php echo $count75to100Reward; ?>)</span>
</label>
</li>
</ul>
<hr>
<!-- filter categgory -->































{{-- part-5 --}}

<?php
$admin_model_obj = new \App\Models\AdminImpFunctionModel;

if (count($resultproductsubcat2list) > 0) {
foreach ($resultproductsubcat2list as $productsubcat2kay) {
$vendor_id = $productsubcat2kay->vendor_uid;
$catfilterlist = $admin_model_obj->getfiltersforfront($vendor_id);
$catfilterlists = $admin_model_obj->getforfrontbysubcat2Id();

if (!empty($catfilterlist)) {
$inccfl = 1;
?>


<ul class="filter ul-reset main-filetr-ul check-box-list">
<?php foreach ($catfilterlist as $filtertypekay) { ?>
<?php /*  <div class='layered_subtitle'><?php echo $filtertypekay['name']; ?></div> */ ?>
<?php
foreach ($catfilterlists as $catfilterkey) {
if (($catfilterkey->ftype == $filtertypekay->id) && !empty($catfilterkey->title)) {
//$catfilterkey = $catfilterkey['id'];

$sub2filterlist = $admin_model_obj->getsubfiltersforfront($catfilterkey->id);
?>



<li class="filter-item <?php if ($inccfl == 1) {
echo 'add-border-top';
} ?>">
<section class="filter-item-inner">
	<?php if (!empty($sub2filterlist)) { ?>
	<h1 class="filter-item-inner-heading minus">
	<input type="checkbox"
	id="colour-attribute-<?php echo $catfilterkey->id; ?>"
	name="sub-filter-checkbox"
	class="filter-attribute-checkbox ib-m"
	value="<?php echo $catfilterkey->id; ?>">
	<label for="colour-attribute-<?php echo $catfilterkey->id; ?>"
		class="filter-attribute-label ib-m main-filter-lable">
		<span class="button"
		style="margin:0px;"></span> <?php echo $catfilterkey->title; ?>
	</label>
	</h1>


	<?php } else { ?>
	<h1 class="filter-item-inner-nosub-fileter">
	<input type="checkbox"
	id="colour-attribute-<?php echo $catfilterkey->id; ?>"
	name="sub-filter-checkbox"
	class="filter-attribute-checkbox ib-m"
	value="<?php echo $catfilterkey->id; ?>">
	<label for="colour-attribute-<?php echo $catfilterkey->id; ?>"
		class="filter-attribute-label ib-m main-filter-lable">
		<span class="button"
		style="margin:0px;"></span> <?php echo $catfilterkey->title; ?>
	</label>
	</h1>
	<?php } ?>




	<ul class="filter-attribute-list ul-reset check-box-list"
		style="">
		<div class="filter-attribute-list-inner">
			<?php
			if (!empty($sub2filterlist)) { ?>
			<?php foreach ($sub2filterlist as $sub2filter) { ?>
			<li class="filter-attribute-item">
				<input type="checkbox"
				name="sub2-filter-checkbox"
				id="colour-attribute-<?php echo $sub2filter->id; ?>"
				class="filter-attribute-checkbox ib-m"
				value="<?php echo $sub2filter->id; ?>">
				<label for="colour-attribute-<?php echo $sub2filter->id; ?>"
					class="filter-attribute-label ib-m sub-filter-lable">
					<span class="button"
					style="margin:0px;"></span> <?php echo $sub2filter->name; ?>
				</label>
			</li>
			<?php
			}
			}
			?>
		</div>
	</ul>
</section>
</li>
<?php
$inccfl++;
}
}
?>
























{{-- part-6 --}}
<?php }
?>
</ul>
<?php
}
}
} ?>

<!-- ./filter categgory -->
</div>
<!-- ./layered -->
</div>
</div>
<!-- ./block filter  -->
<!-- left silide -->


<?php
$vdridhere = $vdrid;
$resf = mysqli_query($con, "SELECT  banner_image FROM `tbl_adv_foobanner` WHERE vendor_id = $vdridhere");
//mysql_query($resf);
while ($rowy1 = mysqli_fetch_array($resf)) {
$data1[] = $rowy1;
}
?>


<div class="col-left-slide left-module nv_grl">
<?php if (isset($data1) && !empty($data1)) { ?>
<?php
$coursalcount = count($data1);
if ($coursalcount == 1) {
$datloop = 'false';
} else {
$datloop = 'true';
}
?>






<ul class="owl-carousel owl-style2 owl-theme owl-loaded"
data-loop="<?php echo $datloop; ?>" data-nav="false" data-margin="30"
data-autoplaytimeout="1000" data-autoplayhoverpause="true" data-items="1"
data-autoplay="true">
<?php
foreach ($data1 as $row1) { ?>
<li><a href="#"><img
src="<?php echo $admin_model_obj->OnlyCdnUrl('home_banners/sidebarbanners/' . $row1->banner_image); ?>"
alt="..."></a></li>
<?php } ?>
</ul>
<?php } ?>
</div>
<?php
$prodresf = mysqli_query($con, "SELECT * FROM `tbl_vendor_sidebar_product` WHERE vendor_id = $vdridhere");


while ($prodrowy1 = mysqli_fetch_array($prodresf)) {
$proddata1[] = $prodrowy1;
}
?>
<!--./left silde-->























<?php if (isset($proddata1) && !empty($proddata1)) { ?>
<div class="block left-module nvn-one spproduct">
	<p class="title_block">PROMOTIONAL PRODUCT</p>
	<?php foreach ($proddata1 as $rowtest) {
	$productId = $rowtest['product_id'];
	$slectproduct = mysqli_query($con, "SELECT * FROM `products` WHERE id = $productId");
	$proddatarowy1 = mysqli_fetch_array($slectproduct);
	//dd($proddatarowy1,$productId);
	//die();
	                                    //echo "<pre>";print_r($proddatarowy1);die;
		                                    $contactMePriceSP = $admin_model_obj->GetContactMePriceDetail($productId);
		                                    $vendorKey = $proddatarowy1['vendor_uid'];
		                                    $vendorAddres = $admin_model_obj->ExecuteRowQuery("SELECT tbl_vndr_adr,retailer_type FROM `tbl_vendor` WHERE `tbl_vndr_id` = $vendorKey");
		                                    $buy_and_earn = 0.00;
		                                    $reward_value = 0.00;
		                                    $you_earn = 0.00;
		                                    $free_with_ample = 0.00;
		                                    $display_free_with = 0;
		                                    if ($proddatarowy1['product_type_key'] == '0') {
		                                        $buy_and_earn = $admin_model_obj->FormatPricingValues($proddatarowy1['no_of_amples']);
		                                        $reward_value = $currencySymbol . '' . $admin_model_obj->FormatPricingValues($proddatarowy1['discount_price']);
		                                        $you_earn = (int)$proddatarowy1['product_discount'];
		                                    } else {
		                                        if (isset($contactMePriceSP) && !empty($contactMePriceSP)) {
		                                            $buy_and_earn = $admin_model_obj->FormatPricingValues($contactMePriceSP->ctm_no_of_amples);
		                                            $reward_value = $currencySymbol . '' . $admin_model_obj->FormatPricingValues($contactMePriceSP->ctm_discount_price);
		                                        } else {
		                                            $buy_and_earn = $admin_model_obj->FormatPricingValues($proddatarowy1['no_of_amples']);
		                                            $reward_value = $currencySymbol . '' . $admin_model_obj->FormatPricingValues($proddatarowy1['discount_price']);
		                                            $you_earn = (int)$proddatarowy1['product_discount'];
		                                        }
		                                    }
		                                    if ($proddatarowy1['product_discount'] >= 50) {
		                                        if ($proddatarowy1['product_type_key'] == '0') {
		                                            $free_with_ample = $admin_model_obj->FormatPricingValues($proddatarowy1['free_with_amples']);
		                                            $display_free_with = 1;
		                                        } else {
		                                            if (isset($contactMePriceSP) && !empty($contactMePriceSP)) {
		                                                $display_free_with = 0;
		                                            } else {
		                                                $free_with_ample = $admin_model_obj->FormatPricingValues($proddatarowy1['free_with_amples']);
		                                                $display_free_with = 1;
		                                            }
		                                        }
		                                    }
		?>



                                    <ul class="product-list ni nv-two row" style="margin-top: 10px !important;">
                                        <li class="product_new_container">
                                            <div class="filter-data">
                                                <div class="pro_head">
	                                                <?php
	                                                    if ($proddatarowy1['vendor_uid'] == 217) {
	                                                        //$DisplayPname = strip_tags(ucwords($key->pname));
	                                                        $DisplayPnameSS = strip_tags(ucwords($proddatarowy1['product_name']));
	                                                        //$DisplayPname = strip_tags(ucwords(strtolower(substr($key->pname,0,80))));
	                                                    } else {
	                                                        //$DisplayPname = strip_tags(ucwords(strtolower(substr($key->pname,0,20))));
	                                                        $DisplayPnameSS = strip_tags(ucwords($proddatarowy1['product_name']));
	                                                        //$DisplayPname = strip_tags(ucwords(strtolower(substr($key['pname'],0,65))));
	                                                    }
	                                               ?>
	                                               <h5 class="Butter_aria"><?php echo $DisplayPnameSS; ?></h5>
								                </div>


















{{-- part-8 --}}
								

								<div class="pro_image" style="padding:0px;">
								<a href="{{route('member.product.details.page',$proddatarowy1['id'])}}">
									<img class="img-responsive" alt="product"
									src="<?php echo $admin_model_obj->OnlyCdnUrl('product_images/' . $proddatarowy1['id'] . '/' . $proddatarowy1['image']); ?>"/>
								</a>
								</div>
								<div class="vendor_info">
								<h5 class="vdr_name"><?php echo $proddatarowy1['supplier_name']; ?></h5>
								<?php if ($vendorAddres->retailer_type != 2) { ?>
								<p class="vdr_address"><?php echo $vendorAddres->tbl_vndr_adr; ?></p>
								<?php } else { ?>
								<p class="vdr_address_blank">&nbsp;</p>
								<?php } ?>
								</div>
								<div class="ap_price_area">
								<div class="ap_display_price">
									<span><?php echo $currencySymbol; ?><?php echo $admin_model_obj->FormatPricingValues($proddatarowy1['single_price']); ?></span>
								</div>
								<div class="ap_display_percentage">
									<span><?php echo $you_earn; ?>% Back</span>
								</div>
								</div>



								<div class="ap_display_ample">
								<p class="ap_display_ample_p">Get <span
								class="ample_color"><?php echo $buy_and_earn; ?></span>
								AmplePoints (<span
								class="reward_price"><?php echo $reward_value; ?></span>)
								</p>
								</div>
								<?php if ($display_free_with == 1) { ?>
								<div class="ap_display_ample_free">
								<p class="ap_display_ample_free_p">or get it <span
								class="ample_color">FREE</span> with <span
								class="ample_color"><?php echo $free_with_ample; ?></span>
								points</p>
								</div>
								<?php } ?>




								<div class="pro_price">
								<div class="quick-view"><a title="Add to my wishlist"
								class="heart" <?php if (!empty($usrmakey)) { ?> href="javascript:void(0);" onclick="wishlist_cart('<?php echo $proddatarowy1['product_name']; ?>','<?php echo $proddatarowy1->id; ?>','1','<?php echo $proddatarowy1['single_price']; ?>','<?php echo $usrmakey; ?>','add');"    <?php } else { ?>  id="modal_trigger" href="#modal" <?php } ?>></a>


								<!--  <a title="Quick view" class="search" href="#"></a> -->
								</div>
								<div class="add-to-cart">
								<?php if ($proddatarowy1['product_type_key'] == '0') { ?>
								<a title="Add to Cart"
								href="{{route('member.product.details.page',$proddatarowy1['id'])}}">Add
								to Cart</a>
								<?php } else { ?>
								<a title="Add to Cart"
								href="{{route('member.product.details.page',$proddatarowy1['id'])}}">
								Contact Me</a>
								<?php } ?>
								</div>
								</div>
								</li>
								</ul>
								<?php } ?>
								</div>
								<?php } ?>






















{{-- part-9 --}}
								<?php
								$tagresf = mysqli_query($con, "SELECT * FROM `tbl_vendor_metatags` WHERE vendor_id = $vdridhere");
								while ($tagrowy1 = mysqli_fetch_array($tagresf)) {
								$tagdata1[] = $tagrowy1;
								}
								?>
								<?php if (isset($tagdata1) && !empty($tagdata1)) { ?>
								<!-- ./SPECIAL -->
								<!-- TAGS -->
								<div class="block left-module">
								<p class="title_block">TAGS</p>
								<div class="block_content">
								<div class="tags">
								<?php foreach ($tagdata1 as $rowtest) { ?>
								<?php
								$allTags = explode(',', $rowtest->metatag);
								foreach ($allTags as $key => $value) {
								?>
								<a href="javascript:void(0);"><span
								class="level2"><?php echo $value; ?></span></a>
								<?php }
								} ?>
								</div>
								</div>
								</div>
								<!-- ./TAGS -->



								<!-- Testimonials -->
<?php
                        }
                        $resfdata = mysqli_query($con, "SELECT  banner_image,banner_title,tag_line FROM `tbl_adv_testimonial` where vendor_id = $vdridhere");
                        //mysql_query($resf);

                        while ($rowynew1 = mysqli_fetch_array($resfdata)) {
                            $datanew1[] = $rowynew1;
                        }
                        if (isset($datanew1) && !empty($datanew1)) {
                            $coursalcount1 = count($datanew1);
                            if ($coursalcount1 == 1) {
                                $datloop1 = 'false';
                            } else {
                                $datloop1 = 'true';
                            }
?>

				<div class="block left-module nv_testimonial">
					<p class="title_block">Testimonials</p>
					<div class="block_content">
						<ul class="testimonials owl-carousel" data-loop="<?php echo $datloop1; ?>"
							data-nav="false" data-margin="30" data-autoplayTimeout="1000"
							data-autoplay="true" data-autoplayHoverPause="true" data-items="1">
							<?php foreach ($datanew1 as $rowtest) { ?>

							<li>
								<div class="client-mane"><?php echo $rowtest['banner_title']; ?></div>
								<div class="client-avarta"><img
									src="<?php echo $admin_model_obj->OnlyCdnUrl('home_banners/testinomialsliders/' . $rowtest['banner_image']); ?>"
								alt="..."></div>
								<div class="testimonial testinomial1"> <?php echo $rowtest['tag_line']; ?> </div>
							</li>
							<?php } ?>
						</ul>
					</div>
				</div>
				<?php } ?>
				<!-- ./Testimonials -->
				<?php if ($usrmakey > 0) {
				$vdrHpId = $vendordata[0]->vendorid;
				$vendorHpDetails = $admin_model_obj->ExecuteRowQuery("SELECT enable_help_sidebar FROM `tbl_vendor` WHERE `tbl_vndr_id` = $vdrHpId");
				if ($vendorHpDetails->enable_help_sidebar == 1) {
				?>
				<div class="block left-module nv_how_help">
					<p class="title_block">How can I help?</p>
					<div class="block_content">
						<a href="javascript:void(0)" data-toggle="modal" data-target="#messegemodel"
							class="btn btn-default"
							style="background: #f75d00 !important;color: #fff;font-weight: bold;border-color: #f75d00;width: 100%;font-size: 18px;text-transform: uppercase;">
							<!--<i class="fa fa-envelope"></i>--> Contact me</a>
						</div>
					</div>
<?php }
} ?>
                    </div>
<!-- ./left colunm -->






















{{-- part-10 --}}

<!-- Center colunm-->
<!-----flickity end-------------->
                    <div class="center_column col-xs-12 col-sm-9 pad_res" id="center_column">
<!-- category-slider -->
<!-- ./category-slider -->
<!-- subcategories -->
<!-- ./subcategories -->
<!-- view-product-list-->
<input type="hidden" id="phatonpen" value="<?php echo $usrmakey; ?>">
                        <input type="hidden" id="targeton"value="<?php echo @$record->total_ample; ?>">
                        <div id="view-product-list" class="view-product-list">
                            <h2 class="page-heading hidden-xs">
                             <span class="page-heading-title"><?php echo $vendordata[0]->vendor_displayname; ?></span>
                            </h2>

                            <?php
                            $vendorName1 = strtolower(preg_replace('/\s+/', '', $vendordata[0]->vendor_displayname));
                            ?>
                            <div class="well well-sm">
                                <strong>Tiles View</strong>
                                <div class="btn-group">
                                  <a href="{{url('/')}}/productbyseller/{{$vendorName1}}/{{$vdrid}}"
                                       id="list" class="btn btn-default btn-sm" style="color: #f75d00;width: auto;">
                                        <span class="glyphicon glyphicon-th"
                                              style="font-weight: 400;font-size: 12px;color: #f75d00;"></span>
                                        <span>Products With Amples</span>
                                    </a>
                                    <a href="{{url('/')}}/productbyseller/{{$vendorName1}}/{{$vdrid}}?no_ample=true"
                                       id="grid" class="btn btn-default btn-sm" style="width: auto;">
                                        <span class="glyphicon glyphicon-th"
                                              style="font-weight: 400;font-size: 12px;color: #000;"></span>
                                        <span>Products Without Amples</span>
                                    </a>
                                </div>





								<?php if ($vdrid == 898) { ?>
								<a href="#synergy_balance_popup" data-toggle="modal" id="synergy_balance_check"
									class="btn btn-default btn-sm">
									<span class="glyphicon glyphicon-usd"
									style="font-weight: 400;font-size: 12px;color: #000;"></span>
									<span>Check Synergy Gift Card Balance</span>
								</a>
								<?php } ?>
								</div>


								<!--<ul class="display-product-option">
								                            <li class="view-as-grid selected"> <span>grid</span> </li>
								                            <li class="view-as-list"> <span>list</span> </li>
								</ul>-->






















{{-- part-11 --}}

<!-- PRODUCT LIST -->
                            <input type='hidden' id='current_page'/>
                            <input type='hidden' id='show_per_page'/>
                            <ul class="product-list ni nv-two row" id="productContainer">
                                <div class="subfil"></div>
                                  <?php if (count($paginator) > 0) {
                                    foreach ($paginator as $key) {
                                        $contactMePrice = $admin_model_obj->GetContactMePriceDetail($key->pid);
                                        $vendorKey = $key->vendor_key;
                                        $vendorAddres = $admin_model_obj->ExecuteRowQuery("SELECT tbl_vndr_adr,retailer_type FROM `tbl_vendor` WHERE `tbl_vndr_id` = $vendorKey");
                                        $buy_and_earn = 0.00;
                                        $reward_value = 0.00;
                                        $you_earn = 0.00;
                                        $free_with_ample = 0.00;
                                        $display_free_with = 0;
                                        if ($key->product_type_key == '0') {
                                            $buy_and_earn = $admin_model_obj->FormatPricingValues($key->pamples);
                                            $reward_value = $currencySymbol . '' . $admin_model_obj->FormatPricingValues($key->pdiscountprice);
                                            $you_earn = (int)$key->pdiscount;
                                        } else {
                                            if (isset($contactMePrice) && !empty($contactMePrice)) {
                                                $buy_and_earn = $admin_model_obj->FormatPricingValues($contactMePrice->ctm_no_of_amples);


                                                $reward_value = $currencySymbol . '' . $admin_model_obj->FormatPricingValues($contactMePrice->ctm_discount_price);
                                            } else {
                                                $buy_and_earn = $admin_model_obj->FormatPricingValues($key->pamples);
                                                $reward_value = $currencySymbol . '' . $admin_model_obj->FormatPricingValues($key->pdiscountprice);
                                                $you_earn = (int)$key->pdiscount;
                                            }
                                        }



                                        if ($key->pdiscount >= 50) {
                                            if ($key->product_type_key == '0') {
                                                $free_with_ample = $admin_model_obj->FormatPricingValues($key->pfwamples);
                                                $display_free_with = 1;
                                            } else {
                                                if (isset($contactMePrice) && !empty($contactMePrice)) {
                                                    $display_free_with = 0;
                                                } else {
                                                    $free_with_ample = $admin_model_obj->FormatPricingValues($key->pfwamples);
                                                    $display_free_with = 1;
                                                }
                                            }
                                        }
                                      ?>







                                        <li class="col-sm-4 product_new_container">
                                            <div class="filter-data">
                                                <div class="pro_head">
                                                  <?php
                                                    if ($vdrid == 217) {
                                                        //$DisplayPname = strip_tags(ucwords($key['pname']));
                                                        $DisplayPname = strip_tags(ucwords($key->pname));
                                                        //$DisplayPname = strip_tags(ucwords(strtolower(substr($key->pname,0,80))));
                                                    } else {
                                                        //$DisplayPname = strip_tags(ucwords(strtolower(substr($key->pname,0,20))));
                                                        $DisplayPname = strip_tags(ucwords($key->pname));
                                                        //$DisplayPname = strip_tags(ucwords(strtolower(substr($key->pname,0,65))));
                                                    }
                                                   ?>




























{{-- part-12 --}}
									<h5 class="Butter_aria"><?php echo $DisplayPname; ?></h5>
									</div>
									<div class="pro_image" style="padding:0px;"><a
									href="{{route('member.product.details.page',$key->pid)}}">
									<img class="img-responsive" alt="product"
									src="<?php echo $admin_model_obj->OnlyCdnUrl('product_images/' . $key->pid . '/' . $key->img_name); ?>"/></a>
									</div>
									<div class="vendor_info">
									<h5 class="vdr_name"><?php echo $key->pvendor; ?></h5>
									<?php if ($vendorAddres->retailer_type != 2) { ?>
									<p class="vdr_address"><?php echo $vendorAddres->tbl_vndr_adr; ?></p>
									<?php } else { ?>
									<p class="vdr_address_blank">&nbsp;</p>
									<?php } ?>
									</div>


									<div class="ap_price_area">
									<div class="ap_display_price">
									<span><?php echo $currencySymbol; ?><?php echo $admin_model_obj->FormatPricingValues($key->pprice); ?></span>
									</div>
									<div class="ap_display_percentage">
									<span><?php echo $you_earn; ?>% Back</span>
									</div>
									</div>
									<div class="ap_display_ample">
									<p class="ap_display_ample_p">Get <span
									class="ample_color"><?php echo $buy_and_earn; ?></span>
									AmplePoints (<span
									class="reward_price"><?php echo $reward_value; ?></span>)
									</p>
									</div>


									<?php if ($display_free_with == 1) { ?>
									<div class="ap_display_ample_free">
									<p class="ap_display_ample_free_p">or get it <span
									class="ample_color">FREE</span> with <span
									class="ample_color"><?php echo $free_with_ample; ?></span>
									points</p>
									</div>
									<?php } ?>




									<div class="pro_price">
									<div class="quick-view"><a title="Add to my wishlist"
									class="heart" <?php if (!empty($usrmakey)) { ?> href="javascript:void(0);" onclick="wishlist_cart('<?php echo $key->pname; ?>','<?php echo $key->pid; ?>','1','<?php echo $key->pprice; ?>','<?php echo $usrmakey; ?>','add');"    <?php } else { ?>  id="modal_trigger" href="#modal" <?php } ?>></a>
									<!--  <a title="Quick view" class="search" href="#"></a> -->
									</div>
									<div class="add-to-cart">
									<?php if ($key->product_type_key == '0') { ?>
									<a title="Add to Cart"
									href="{{route('member.product.details.page',$key->pid)}}">Add
									to Cart</a>
									<?php } else { ?>
									<a title="Add to Cart"
									href="{{route('member.product.details.page',$key->pid)}}">
									Contact Me</a>
									<?php } ?>
									</div>
									</div>



									</li>
									<?php 

								     }

									 }
									 else {
									echo "<div class='soon_cls'>
									<h2 style='font-family:Arial Black, Gadget, sans-serif;font-size:35px;color:#f75d00 !important;'>Coming Soon...</h2></div>";
									} ?>
									</div>
									</ul>
									<!-- ./PRODUCT LIST -->
                                </div>















{{-- part-13  --}}

							<!-- ./view-product-list-->
							{{-- <?php if (count($this->paginator) > 0) {
							                        echo $this->paginationControl($this->paginator, 'Sliding', 'index/pagination.phtml');
							} ?> --}}

                                 {{ $paginator->links() }}
                             </div>
<!-- ./ Center colunm -->
            </div>
        </div>
<!-- ./row-->
    </div>
    </div>
</section>








<div id="synergy_balance_popup" class="modal fade" role="dialog">
    <div class="modal-dialog">
<!-- Modal content-->
        <form id="synergy_balance_popup_form" method="post" enctype="multipart/form-data">
        	@csrf
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title">Check Synergy Gift Card Balance</h4>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <label for="msgsubject">Enter Your Synergy Card Number:</label>
                        <input type="text" id="synergy_card_no" name="synergy_card_no" value=""
                               class="form-control" required>
                    </div>
                    <div id="waiting_syn_dt"
                         style="display:none;text-align: center;font-weight: bold;font-size: 18px;line-height: 35px;">
                        <p style="color: green;">Please Wait We Are Fetching Your Card Detail.....</p>
                    </div>
                    <div id="balance_data"
                         style="display:none;text-align: center;font-weight: bold;font-size: 18px;line-height: 35px;border: 2px solid #f75d00;border-radius: 5px;">
                        <p id="card_num_resp">Your Card Number: 8003-9401-4527</p>
                        <p id="card_bal_resp">Your Current Balance: $50.00</p>
                    </div>
                    <div id="balance_err_data"
                         style="display:none;text-align: center;font-weight: bold;font-size: 18px;line-height: 35px;border: 2px solid #f75d00;border-radius: 5px;">
                        <p id="card_error" style="color: red;">INVALID CARDHOLDER-1</p>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" style="width: auto;height: auto;" id="sys_sbt_btn" class="btn btn-default">
                        Submit
                    </button>
                    <button type="button" style="width: auto;height: auto;" class="btn btn-default"
                            data-dismiss="modal">Close
                    </button>
                </div>
            </div>
        </form>
    </div>
</div>










 @include('includes.footer')
 @include('includes.script')
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.min.js"></script>
<link rel="stylesheet" href="https://code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
<script type="text/javascript" src="{{url('/')}}/public/product_filter_new/js/jquery-1.10.1.min.js"></script>
<script type="text/javascript" src="{{url('/')}}/public/product_filter_new/js/productfilter.js"></script>


 <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css">
<script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js"></script>
<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick.min.css"/>
<script src="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick.min.js"></script>
<!-- jQuery library -->
{{-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script> --}}
<!-- jQuery UI library -->
<script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js"></script>


<script>
    $("form#synergy_balance_popup_form").submit(function () {
        var formData = new FormData(this);
        $.ajax({
            url: "{{route('checksynergybalance')}}",
            type: 'POST',
            data: formData,
            dataType: "json",
            beforeSend: function () {
                $('#waiting_syn_dt').show();
                $('#balance_data').hide();
                $('#balance_err_data').hide();
                $('#sys_sbt_btn').text("Please Wait...");
            },
            complete: function () {
                $('#waiting_syn_dt').hide();
                $('#sys_sbt_btn').text("Submit");
            },
            success: function (data) {
                if (data['xml']['status'] == 'success') {
                    $('#synergy_card_no').val('');
                    $('#balance_data').show();
                    $('#card_num_resp').text("Your Card Number: " + data['xml']['CardNumber']);
                    $('#card_bal_resp').text("Your Current Balance: $" + data['xml']['GiftCardBalance']);
                } else if (data['xml']['status'] == 'failure') {
                    $('#synergy_card_no').val('');
                    $('#balance_err_data').show();
                    $('#card_error').text(data['xml']['error']);
                } else {
                    $('#synergy_card_no').val('');
                    $('#balance_err_data').show();
                    $('#card_error').text("Something Went Wrong Try Again");
                }
            },
            contentType: false,
            processData: false
        });
        return false;
    });
</script>
<div id="messegemodel" class="modal fade" role="dialog">
    <div class="modal-dialog">
<!-- Modal content-->
        <form id="messegeform" method="post" enctype="multipart/form-data">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">
                        &times;
                    </button>
                    <h4 class="modal-title">Send Contact Request</h4>
                </div>
                <div class="modal-body" style="padding: 0px;">
                 <input type="hidden" name="vendor_id" value="<?php echo $vendordata[0]->vendorid; ?>">
                    <div class="col-md-12" style="margin-top: 15px;">
                        <div class="form-group">
                            <label for="sender_full_name">Full Name*</label>
                            <input type="text" name="sender_full_name" value="" class="form-control"
                                   id="sender_full_name" required>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="sender_email">Email*</label>
                            <input type="text" name="sender_email" value="" class="form-control" id="sender_email"
                                   required>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="sender_phone">Phone*</label>
                            <input type="text" name="sender_phone" value="" class="form-control" id="sender_phone"
                                   required>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="form-group">
                            <label for="msgsubject">Subject*</label>
                            <input type="text" name="msgsubject" value="" class="form-control" id="msgsubject" required>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="form-group">
                            <label for="msgdetail">Message*</label>
                            <textarea name="msgdetail" cols="5" rows="5" class="form-control" required></textarea>
                        </div>
                    </div>
                    <div id="waiting_snd_msg"
                         style="display:none;text-align: center;font-weight: bold;font-size: 18px;line-height: 35px;">
                        <p style="color: green;">Please Wait We Are Sending Your Message.....</p>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" style="width: auto;height: auto;" id="sndmsg_sbt_btn" class="btn btn-default">
                        Submit
                    </button>
                    <button type="button" style="width: auto;height: auto;"
                            class="btn btn-default" data-dismiss="modal">Close
                    </button>
                </div>
            </div>
        </form>
    </div>
</div>
<script>
    $("form#messegeform").submit(function () {
        var formData = new FormData(this);
        $.ajax({
            url: "{{route('sendcontactmereqtovendor')}}",
            type: 'POST',
            data: formData,
            beforeSend: function () {
                $('#waiting_snd_msg').show();
                $('#sndmsg_sbt_btn').text("Please Wait...");
            },
            complete: function () {
                $('#waiting_snd_msg').hide();
                $('#sndmsg_sbt_btn').text("Submit");
            },
            success: function (data) {
                if (data == 'done') {
                    alert("Your Message has been Submitted!");
                    location.reload(true)
                } else {
                    alert("Something Wrong Please Try Again");
                    location.reload(true)
                }
            },
            contentType: false,
            processData: false
        });
        return false;
    });
</script>













<script>
    $(document).ready(function () {
        $(".filterval").click(function () {
            var ID = $(this).attr('id');
            var mainfilid = $("#" + ID).siblings("input[name=mainfilterid]").val();
            var subfilid = $("#" + ID).siblings("input[name=subfilterid]").val();
            var vendid = $("#" + ID).siblings("input[name=vendorid]").val();
            var baseurl = '{{url('/')}}';
            var SITEROOT = baseurl;
            $.ajax({
                url: SITEROOT + '/category_filter/prosubfilter.php',
                data: {mainid: mainfilid, subid: subfilid, vendorid: vendid},
                type: 'GET'
            })
                .done(function (data) {
                    //$('.subfil').css('display','block');
                    //$('.filter-data').css('display','none');
                    //$('.subfil').html(data);
                    $('#productContainer').html(data);
                    $('.pagination').css('display', 'none');
                })
        });







        $(".subfilterval").click(function () {
            var ID = $(this).attr('id');
            var mainfilid = $("#" + ID).siblings("input[name=submainfilterid]").val();
            var subfilid = $("#" + ID).siblings("input[name=subsubfilterid]").val();
            var vendid = $("#" + ID).siblings("input[name=subvendorid]").val();
            var baseurl = '{{url('/')}}';
            var SITEROOT = baseurl;
            $.ajax({
                url: SITEROOT + '/category_filter/prosub2filter.php',
                data: {mainid: mainfilid, sub2id: subfilid, vendorid: vendid},
                type: 'GET'
            })
                .done(function (data) {
                    //$('.subfil').css('display','block');
                    //$('.filter-data').css('display','none');
                    //$('.subfil').html(data);
                    $('#productContainer').html(data);
                    $('.pagination').css('display', 'none');
                })
        });
    });





    $(document).ready(function () {
        $("#owl-demo").owlCarousel({
            navigation: true, // Show next and prev buttons
            slideSpeed: 300,
            paginationSpeed: 400,
            singleItem: true
            // "singleItem:true" is a shortcut for:
            // items : 1,
            // itemsDesktop : false,
            // itemsDesktopSmall : false,
            // itemsTablet: false,
            // itemsMobile : false
        });
    });
</script>
<script type="text/javascript">
    $(document).ready(function () {
        //how much items per page to show
        var show_per_page = 25;
        //getting the amount of elements inside content div
        var number_of_items = $('#productContainer').children().size();
        //calculate the number of pages we are going to have
        var number_of_pages = Math.ceil(number_of_items / show_per_page);
        //set the value of our hidden input fields
        $('#current_page').val(0);
        $('#show_per_page').val(show_per_page);
        //now when we got all we need for the navigation let's make it '
        /*
        what are we going to have in the navigation?
        - link to previous page
        - links to specific pages
        - link to next page
        */
        var navigation_html = '<a class="previous_link" href="javascript:previous();">Prev</a>';
        var current_link = 0;
        while (number_of_pages > current_link) {
            navigation_html += '<a class="page_link" href="javascript:go_to_page(' + current_link + ')" longdesc="' + current_link + '">' + (current_link + 1) + '</a>';
            current_link++;
        }
        navigation_html += '<a class="next_link" href="javascript:next();">Next</a>';
        $('#page_navigation').html(navigation_html);
        //add active_page class to the first page link
        $('#page_navigation .page_link:first').addClass('active_page');
        //hide all the elements inside content div
        $('#productContainer').children().css('display', 'none');
        //and show the first n (show_per_page) elements
        $('#productContainer').children().slice(0, show_per_page).css('display', 'block');
    });
    function previous() {
        new_page = parseInt($('#current_page').val()) - 1;
        //if there is an item before the current active link run the function
        if ($('.active_page').prev('.page_link').length == true) {
            go_to_page(new_page);
        }
    }
    function next() {
        new_page = parseInt($('#current_page').val()) + 1;
        //if there is an item after the current active link run the function
        if ($('.active_page').next('.page_link').length == true) {
            go_to_page(new_page);
        }
    }
    function go_to_page(page_num) {
        //get the number of items shown per page
        var show_per_page = parseInt($('#show_per_page').val());
        //get the element number where to start the slice from
        start_from = page_num * show_per_page;
        //get the element number where to end the slice
        end_on = start_from + show_per_page;
        //hide all children elements of content div, get specific items and show them
        $('#productContainer').children().css('display', 'none').slice(start_from, end_on).css('display', 'block');
        /*get the page link that has longdesc attribute of the current page and add active_page class to it
        and remove that class from previously active page link*/
        $('.page_link[longdesc=' + page_num + ']').addClass('active_page').siblings('.active_page').removeClass('active_page');
        //update the current page input field
        $('#current_page').val(page_num);
    }
</script>


<script>
//// filter accordion
function accordion(section, heading, list) {
$(section).each(function () {
var that = this,
listHeight = $(this).find(list).height();
$(this).find(heading).click(function () {
$(this).toggleClass('plus minus');
$(that).find(list).slideToggle(250);
});
});
};
accordion('.filter-item', '.filter-item-inner-heading', '.filter-attribute-list');
</script>

<script type="text/javascript">
        $(function () {
            $(".main-li-check > input").click(function () {
                if ($(this).is(":checked")) {
                    $(".main-li-check ul").show();
                } else {
                    $(".main-li-check ul").hide();
                }
            });
        });


    $(function() {
    $("#slider-range-price-filter").slider({
        range: true,
        min: 0,
        max: 1000,
        values: [0, 250],
        slide: function(event, ui) {
            $("#price-min").text(ui.values[0]);
            $("#price-max").text(ui.values[1]);
            $("#amount-price-complete-amount").val(ui.values[0] + " - " + ui.values[1]);
        }
    });
});
</script>