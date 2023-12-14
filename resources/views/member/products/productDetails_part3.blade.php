<div class="addressdetails">
	<p class="address_val"></p>
	<p class="phone_val"></p>
</div>
<?php
$baseurl=url('/');
$currencySymbol="$";
$admin_model_obj = new \App\Models\AdminImpFunctionModel;
?>


<!-- ./block category  -->
<!-- left silide -->
<?php if (!empty($offerproductIdsdata)) { ?>

<div class="block left-module onsalle">
	<div class="block_content product-onsale">
		<ul class="product-list owl-carousel owl-theme owl-loaded" data-loop="true"
			data-nav="false" data-margin="0" data-autoplaytimeout="1000"
			data-autoplayhoverpause="true" data-items="1" data-autoplay="true">
			<?php
			if (count($offerproductIdsdata) > 0) {
			foreach ($offerproductIdsdata as $onofferproductkay) {
			$onofferproducts = $admin_model_obj->featureproductonoffer('feature', $onofferproductkay->off_pid);
			//dd(count($onofferproducts));


			if ($onofferproducts) {
			//foreach ($onofferproducts as $key) { ?>
			<li>
				<div class="right-block">
					<h5 class="Butter_aria"><?php echo strip_tags(ucwords(strtolower(substr($onofferproducts->pname, 0, 20)))); ?></h5>
					<?php if ($onofferproducts->pdiscount >= 50) {
					echo "<div class='content_price3'>
						<h5> Free&nbsp;</h5>
						<span>with&nbsp;</span>
						<h6>" . $admin_model_obj->DisplayAmplePoints($onofferproducts->pfwamples). "</h6>
					<span1> Amples</span1>
					<div class='amp-logo'></div>
				</div>";
				} else {
				echo "<div class='price2'>
					<a class='same' href='#'>$currencySymbol" . $onofferproducts->pprice . "</a>
				</div>";
				} ?>
			</div>
			<div class="left-block"><a
				href="{{ url('/product-details/' . $onofferproducts->pid) }}" >

				<img class="img-responsive" alt="product"
			src="https://amplepoints.com/product_images/{{$onofferproducts->pid}}/{{$onofferproducts->pimage}}"/></a>
			<div class="price_main">
				<div class="price">
					<div class="price2"><a class="same"
					href="#"><?php echo $currencySymbol; ?><?php echo $onofferproducts->pprice; ?></a>
				</div>
				<div class="content_price4">Buy & Earn
					<span> <?php echo $admin_model_obj->DisplayAmplePoints($onofferproducts->pamples); ?> </span>
					<span style="padding-left:0px;">Amples </span>
				</div>
				<div class="price7"> Reward
					value&nbsp;<span><?php echo $currencySymbol; ?><?php echo $onofferproducts->pdiscountprice; ?></span>
					<br>
				</div>
				<div class="save5">You Earn&nbsp;
					<span><?php echo (int)$onofferproducts->pdiscount; ?>%</span>
				</div>
				<?php $MyVendorName = strtolower(preg_replace('/\s+/', '', $onofferproducts->pvendor)); ?>
				<div class="by_aria">
					<h6>By:&nbsp;</h6>
					<a href="{{-- <?php echo $baseurl('/productbyseller/' . $MyVendorName . '/') . $onofferproducts->vendor_key; ?> --}}"><?php echo $onofferproducts->pvendor; ?></a>
				</div>
			</div>
		</div>
		<div class="quick-view"><a title="Add to my wishlist"
		class="heart" <?php if (!empty(@$usrmakey)) { ?> href="javascript:void(0);" onclick="wishlist_cart('<?php echo $onofferproducts->pname; ?>','<?php echo $onofferproducts->pid; ?>','1','<?php echo $onofferproducts->pprice; ?>','<?php echo @$usrmakey; ?>','add');"    <?php } else { ?>  id="modal_trigger" href="#modal" <?php } ?>></a>
		<!--<a title="Quick view" class="search" href="#"></a>-->
	</div>
	<div class="add-to-cart">
		<a title="Add to Cart"
			href="{{ url('/product-details/' . $onofferproducts->pid) }}">Add
		to Cart</a></div>
	</div>
</li>
<?php   
//}  //foreach end
}
}
}
?>
</ul>
</div>
</div>
<?php } ?>
<!--./left silde-->











<!-- block best sellers -->
<?php if (count($onsaleproductIdsdata)>0) { ?>
<div class="block left-module onsalle">
<p class="title_block">ON SALE</p>
<div class="block_content product-onsale">
<ul class="product-list owl-carousel owl-theme owl-loaded" data-loop="true"
data-nav="false" data-margin="0" data-autoplaytimeout="1000"
data-autoplayhoverpause="true" data-items="1" data-autoplay="true">
<?php
if (count($onsaleproductIdsdata) > 0) {
foreach ($onsaleproductIdsdata as $onsaleproductkay) {
$onsaleproducts = $admin_model_obj->featureproductonsale('feature', $onsaleproductkay->os_pid);


if ($onsaleproducts) {
//foreach ($onsaleproducts as $key) { ?>
<li>
	<div class="right-block">
		<h5 class="Butter_aria"><?php echo strip_tags(ucwords(strtolower(substr($onsaleproducts->pname, 0, 20)))); ?></h5>
		<?php if ($onsaleproducts->pdiscount >= 50) {
		echo "<div class='content_price3'>
			<h5> Free&nbsp;</h5>
			<span>with&nbsp;</span>
			<h6>" . $admin_model_obj->DisplayAmplePoints($onsaleproducts->pfwamples) . "</h6>
		<span1> Amples</span1>
		<div class='amp-logo'></div>
	</div>";
	} else {
	echo "<div class='price2'>
		<a class='same' href='#'>$currencySymbol" . $onsaleproducts->pprice . "</a>
	</div>";
	} ?>
</div>
<div class="left-block"><a
	href="{{ url('/product-details/' . $onsaleproducts->pid) }}"
>
	<img class="img-responsive" alt="product"
src="https://amplepoints.com/product_images/ {{$onsaleproducts->pid}}'/'{{$onsaleproducts->pimage}} ?>"/></a>
<div class="price_main">
	<div class="price">
		<div class="price2"><a class="same"
		href="#"><?php echo $currencySymbol; ?><?php echo $onsaleproducts->pprice; ?></a>
	</div>
	<div class="content_price4">Buy & Earn
		<span> <?php echo $admin_model_obj->DisplayAmplePoints($onsaleproducts->pamples); ?> </span>
		<span>Amples </span></div>
		<div class="price7"> Reward
			value&nbsp;<span><?php echo $currencySymbol; ?><?php echo $onsaleproducts->pdiscountprice; ?></span>
			<br>
		</div>
		<div class="save5">You Earn&nbsp;
			<span><?php echo  $onsaleproducts->pdiscount; ?>%</span>
		</div>
		<?php $MyVendorName = strtolower(preg_replace('/\s+/', '', $onsaleproducts->pvendor)); ?>
		<div class="by_aria">
			<h6>By:&nbsp;</h6>
			<a href="{{-- <?php echo $baseurl('/productbyseller/' . $MyVendorName . '/') . $onsaleproducts->vendor_key; ?> --}}"><?php echo  $onsaleproducts->pvendor; ?></a>
		</div>
	</div>
</div>
<div class="quick-view"><a title="Add to my wishlist"
class="heart" <?php if (!empty(@$usrmakey)) { ?> href="javascript:void(0);" onclick="wishlist_cart('<?php echo $onsaleproducts->pname; ?>','<?php echo $onsaleproducts->pid; ?>','1','<?php echo $onsaleproducts->pprice; ?>','<?php echo @$usrmakey; ?>','add');"    <?php } else { ?>  id="modal_trigger" href="#modal" <?php } ?>></a>
<!--  <a title="Quick view" class="search" href="#"></a> -->
</div>
<div class="add-to-cart">

<a title="Add to Cart" href="{{-- {{ url('/product-details/' . $onsaleproducts->pid) }} --}}
">Add to Cart</a>
</div>
</div>
</li>
<?php 

//}  //end foreach
}
}
}
?>
</ul>
</div>
</div>
<?php } ?>
<!-- ./block best sellers  -->
<!-- left silide
 -->
<!--./left silde-->
</div>
<!-- ./left colunm -->
<!-- Center colunm-->