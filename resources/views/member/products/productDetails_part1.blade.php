@php
$baseurl=url('/');
$currencySymbol="$";
//creating obj of that model
$admin_model_obj = new \App\Models\AdminImpFunctionModel;
@endphp

<div id="addtocartmodal">jeeeeeeeeeeeeeeeeeeeeet</div>
<div class="block left-module" style="margin-top:100px">
	<?php
	if (($productDetails->pdiscount) >= 50) { ?>
	<div class='sidebar-booking-box'>
		<h3 class='text-center'>USE AMPLE POINTS TO GET THIS PRODUCT</h3>
		<div class='booking-box-body' data-step="3"
			data-intro="Apply Amples To Get Discount" data-position='left'>
			<!---->
			<?php if (($productDetails->pro_key == 0)) { ?>
			<form>
				<div class='col-md-12 col-sm-12 col-xs-12 no-space'>
					<div class='col-md-5 col-sm-5 col-xs-5 no-space'>
						<label>Price</label>
					</div>
					<div class='input-group margin-bottom-sm col-md-7 col-sm-7 col-xs-7'>
						<input type='text' id='itemprice' name='itemprice'
						class='form-control'
						value='<?php echo $currencySymbol; ?><?php echo $admin_model_obj->FormatPricingValues($productDetails->single_price); ?>'
						disabled>
						<!--<span class='input-group-addon'><i class='fa fa-calendar fa-fw'></i></span>-->
					</div>
				</div>
				<div class='col-md-12 col-sm-12 col-xs-12 no-space'>
					<div class='col-md-5 col-sm-5 col-xs-5 no-space'>
						<label>Buy & Earn</label>
					</div>
					<div class='input-group margin-bottom-sm col-md-7 col-sm-7 col-xs-7'>
						<input type='text' id='buyearnamples' name='buyearnamples'
						class='form-control' placeholder='D'
						value='<?php echo $admin_model_obj->FormatPricingValues($admin_model_obj->DisplayAmplePoints($productDetails->pamples)); ?>'
						disabled>
						<!--<span class='input-group-addon'><i class='fa fa-calendar fa-fw'></i></span>-->
					</div>
				</div>
				<div class='col-md-12 col-sm-12 col-xs-12 no-space'>
					<div class='col-md-5 col-sm-5 col-xs-5 no-space'>
						<label>Amples Needed to Redeem</label>
					</div>
					<div class='input-group margin-bottom-sm col-md-7 col-sm-7 col-xs-7'>
						<input type='text' id='useamplestoshop' name='useamplestoshop'
						class='form-control'
						value='<?php echo $admin_model_obj->DisplayAmplePoints($productDetails->pfwamples); ?> Amples'
						disabled>
						<!--<span class='input-group-addon'><i class='fa fa-calendar fa-fw'></i></span>-->
					</div>
				</div>
				<div class='col-md-12 col-sm-12 col-xs-12 no-space'>
					<div class='col-md-5 col-sm-5 col-xs-5 no-space'>
						<label>Apply Amples</label>
					</div>
					<div class='input-group margin-bottom-sm col-md-7 col-sm-7 col-xs-7'>
						<input type='text' id='inputamples' name='inputamples'
						class='form-control'>
						<!--<span class='input-group-addon'><i class='fa fa-calendar fa-fw'></i></span>-->
					</div>
				</div>
				<div class='clearfix'></div>
				<div class='grand-total1 text-center'>
					<div class='col-md-8 col-sm-8 col-xs-8 no-space'
						id='newpricesection' style='display:none;'><span
						style="width: 42%;">New Price : </span>
						<h4 id='newitemprice' style="margin: 15px 10px;">&nbsp;
						<?php echo $currencySymbol; ?><?php echo $admin_model_obj->FormatPricingValues($productDetails->single_price); ?></h4>
						<span class='res-collection-sub'
						style='display:none;margin: 12px 0 0 -10px;'>FREE</span>
						<input type="hidden" id="usernewitemprice"
						value="<?php echo $productDetails->single_price; ?>"/>
					</div>
					<div class='col-md-4 col-sm-4 col-xs-4 no-space add-cart-submit'>
						<button id='applyamples' type='button'>APPLY</button>
					</div>
				</div>
				<div class='res-collection-sub1'>
					<div class='col-md-12 col-sm-12 col-xs-12 no-space'
						id='earnrewardsection' style='display:none;'>
						<div class='col-md-5 col-sm-5 col-xs-5 no-space'>
							<label>Earn Reward</label>
						</div>
						<div class='input-group margin-bottom-sm col-md-7 col-sm-7 col-xs-7'>
							<input type='text' id='earnrewardamples'
							name='earnrewardamples' class='form-control'
							disabled>
							<!--<span class='input-group-addon'><i class='fa fa-calendar fa-fw'></i></span>-->
						</div>
					</div>
					<div class='col-md-12 col-sm-12 col-xs-12 no-space'>
						<div class='col-md-5 col-sm-5 col-xs-5 no-space'>
							<label>Reward Value</label>
						</div>
						<div class='input-group margin-bottom-sm col-md-7 col-sm-7 col-xs-7'>
							<input type='text' id='earnrewardonitem'
							name='earnrewardonitem'
							value='<?php echo $admin_model_obj->FormatPricingValues($productDetails->pdiscountprice); ?>'
							class='form-control' disabled>
						</div>
					</div>
					<div class='col-md-12 col-sm-12 col-xs-12 no-space'>
						<div class='col-md-5 col-sm-5 col-xs-5 no-space'>
							<label>You Earn</label>
						</div>
						<div class='input-group margin-bottom-sm col-md-7 col-sm-7 col-xs-7'>
							<input type='text' id='youearndiscount'
							name='youearndiscount'
							value='<?php echo (int)$productDetails->pdiscount; ?>%'
							class='form-control' disabled>
						</div>
					</div>
				</div>
				<div class='clearfix'></div>
				<?php if ($productDetails->pdiscount < 100) { ?>
				<?php if (!empty($usrmakey)) { ?>
				<h2 class='earn-reward text-center'><a
					href="<?php echo url('dashboard'); ?>">EARN
				UP TO 10% EXTRA IN REWARD TIME</a></h2>
				<?php } else { ?>
				<h2 class='earn-reward text-center'><a
					href="javascript:void(0);" onclick="triggerLogin()">EARN
				UP TO 10% EXTRA IN REWARD TIME</a></h2>
				<?php } ?>
				<?php } ?>
				<div class='grand-total text-center' data-step="4"
					data-intro="Add Product To cart" data-position='left'>
					<!--<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>-->
					
					<?php
					if ($is_accepting_orders > 0) {
					if ($AvailableQuantity > 0) {
					?>
					<div class='col-md-12 col-sm-12 col-xs-12'>
						<div class='button-group' id='atax'
							style="display:none"><a class='btn-add-cart'
								id="cartwithample"
								href='javascript:void(0);'>Add
							to cart wa</a></div>
							<div class='button-group' id='btax'><a
								class='btn btn-primary' id="cartwithoutample"
							href='javascript:void(0);'>Add to cart woa</a>
						</div>
					</div>
					<?php } else { ?>
					<div class='col-md-12 col-sm-12 col-xs-12'>
						<div class='button-group'><a class='btn-add-cart'
							href='javascript:void(0);'
							onclick="showqyalert();">Add
						to cart</a></div>
					</div>
					<?php
					}
					} else {
					?>
					<div class='col-md-12 col-sm-12 col-xs-12'>
						<div class='button-group'><a class='btn-add-cart'
							href='javascript:void(0);'
							onclick="shownotacceptingorders();">Add
						to cart</a></div>
					</div>
					<?php } ?>
				</div>
			</form>
			<?php } else { ?>
			<?php if (isset($contactMePrice) && !empty($contactMePrice)) { ?>
			<div class='col-md-12 col-sm-12 col-xs-12 no-space'>
				<div class='col-md-5 col-sm-5 col-xs-5 no-space'>
					<label>Buy & Earn</label>
				</div>
				<div class='input-group margin-bottom-sm col-md-7 col-sm-7 col-xs-7'>
					<input type='text' id='buyearnamples' name='buyearnamples'
					class='form-control' placeholder='D'
					value='<?php echo $admin_model_obj->FormatPricingValues($contactMePrice['ctm_no_of_amples']); ?>'
					disabled>
				</div>
			</div>
			<div class='col-md-12 col-sm-12 col-xs-12 no-space'>
				<div class='col-md-5 col-sm-5 col-xs-5 no-space'>
					<label>Reward Value</label>
				</div>
				<div class='input-group margin-bottom-sm col-md-7 col-sm-7 col-xs-7'>
					<input type='text' id='earnrewardonitem' name='earnrewardonitem'
					value='<?php echo $admin_model_obj->FormatPricingValues($contactMePrice['ctm_discount_price']); ?>'
					class='form-control' disabled>
				</div>
			</div>
			<?php } else { ?>
			<div class='col-md-12 col-sm-12 col-xs-12 no-space'>
				<div class='col-md-5 col-sm-5 col-xs-5 no-space'>
					<label>Price</label>
				</div>
				<div class='input-group margin-bottom-sm col-md-7 col-sm-7 col-xs-7'>
					<input type='text' id='itemprice' name='itemprice'
					class='form-control'
					value='<?php echo $currencySymbol; ?><?php echo $admin_model_obj->FormatPricingValues($productDetails->single_price); ?>'
					disabled>
				</div>
			</div>
			<div class='col-md-12 col-sm-12 col-xs-12 no-space'>
				<div class='col-md-5 col-sm-5 col-xs-5 no-space'>
					<label>Buy & Earn</label>
				</div>
				<div class='input-group margin-bottom-sm col-md-7 col-sm-7 col-xs-7'>
					<input type='text' id='buyearnamples' name='buyearnamples'
					class='form-control' placeholder='D'
					value='<?php echo $admin_model_obj->FormatPricingValues($admin_model_obj->DisplayAmplePoints($productDetails->pamples)); ?>'
					disabled>
				</div>
			</div>
			<div class='col-md-12 col-sm-12 col-xs-12 no-space'>
				<div class='col-md-5 col-sm-5 col-xs-5 no-space'>
					<label>Amples Needed to Redeem</label>
				</div>
				<div class='input-group margin-bottom-sm col-md-7 col-sm-7 col-xs-7'>
					<input type='text' id='useamplestoshop' name='useamplestoshop'
					class='form-control'
					value='<?php echo $admin_model_obj->DisplayAmplePoints($productDetails->pfwamples); ?> Amples'
					disabled>
				</div>
			</div>
			<div class='clearfix'></div>
			<div class='grand-total1 text-center'>
				<div class='col-md-8 col-sm-8 col-xs-8 no-space'
					id='newpricesection' style='display:none;'>
					<span>New Price : </span>
					<h4 id='newitemprice'>&nbsp;
					<?php echo $currencySymbol; ?><?php echo $admin_model_obj->FormatPricingValues($productDetails->single_price); ?></h4>
					<span class='res-collection-sub'
					style='display:none;'>FREE</span>
					<input type="hidden" id="usernewitemprice"
					value="<?php echo $productDetails->single_price; ?>"/>
				</div>
			</div>
			<div class='res-collection-sub1'>
				<div class='col-md-12 col-sm-12 col-xs-12 no-space'
					id='earnrewardsection' style='display:none;'>
					<div class='col-md-5 col-sm-5 col-xs-5 no-space'>
						<label>Earn Reward</label>
					</div>
					<div class='input-group margin-bottom-sm col-md-7 col-sm-7 col-xs-7'>
						<input type='text' id='earnrewardamples'
						name='earnrewardamples' class='form-control'
						disabled>
						<!--<span class='input-group-addon'><i class='fa fa-calendar fa-fw'></i></span>-->
					</div>
				</div>
				<div class='col-md-12 col-sm-12 col-xs-12 no-space'>
					<div class='col-md-5 col-sm-5 col-xs-5 no-space'>
						<label>Reward Value</label>
					</div>
					<div class='input-group margin-bottom-sm col-md-7 col-sm-7 col-xs-7'>
						<input type='text' id='earnrewardonitem'
						name='earnrewardonitem'
						value='<?php echo $productDetails->pdiscountprice; ?>'
						class='form-control' disabled>
					</div>
				</div>
				<div class='col-md-12 col-sm-12 col-xs-12 no-space'>
					<div class='col-md-5 col-sm-5 col-xs-5 no-space'>
						<label>You Earn</label>
					</div>
					<div class='input-group margin-bottom-sm col-md-7 col-sm-7 col-xs-7'>
						<input type='text' id='youearndiscount'
						name='youearndiscount'
						value='<?php echo (int)$productDetails->pdiscount; ?>%'
						class='form-control' disabled>
					</div>
				</div>
			</div>
			<?php } ?>
			<div class='clearfix'></div>
			<div class='grand-total text-center' data-step="4"
				data-intro="Send Contact Request" data-position='left'>
				
				
				<div class='col-md-12 col-sm-12 col-xs-12'>
					<div class='button-group'>
						<?php if (empty($usrmakey)) { ?>
						<button id="contactme"><i class="fa fa-shopping-cart"></i>
						Contact Me
						</button>
						<input type="hidden" id="contact"
						value="<?= $usrmakey; ?>">
						<?php } else { ?>
						<style type="text/css">
						/* #sendcontactreq{
						line-height: 35px !important;
						height: 35px;
						width: auto;
						display: inline-block;
						margin: 0 auto;
						text-align: center;
						clear: both;
						padding: 0 15px 0 15px;
						font-size: 13px !important;
						color: #FFF;
						background: #FF4500;
						} */
						</style>
						<form action="<?php echo $this->baseUrl('index/contactmail'); ?>"
							method="post">
							<?php $fname = $this->resuser[0]['first_name'];
							$lname = $this->resuser[0]['last_name'];
							$coustmer_name = $fname . ' ' . $lname;;
							?>
							<input type="hidden" name="userid"
							value="<?= $usrmakey; ?>">
							<input type="hidden" name="username"
							value="<?= $coustmer_name; ?>">
							<input type="hidden" name="useremail"
							value="<?= $this->resuser[0]['email']; ?>">
							<input type="hidden" name="usermobile"
							value="<?= $this->resuser[0]['mobile']; ?>">
							<input type="hidden" name="product_id"
							value="<?= $productDetails->id; ?>">
							<input type="hidden" name="vendor_mail"
							value="<?= $this->data_email[0]['tbl_vndr_mail']; ?>">
							<input type="hidden" name="vendor_name"
							value="<?= $this->data_email[0]['tbl_vndr_dispname']; ?>">
							<input type="hidden" name="pro_name"
							value="<?= $this->respro[0]['product_name']; ?>">
							<input type="hidden" name="pro_sku"
							value="<?= $this->respro[0]['sku']; ?>">
							<input type="hidden" name="pro_img"
							value="<?= $this->respro[0]['image_name']; ?>">
							<input type="hidden" name="pro_price"
							value="<?= $this->respro[0]['single_price']; ?>">
							<input type="hidden" name="pro_discount"
							value="<?= $this->respro[0]['pdiscount']; ?>">
							<input type="hidden" name="pdiscountprice"
							value="<?= $this->respro[0]['pdiscount']; ?>">
							<input type="hidden" name="pro_amples"
							value="<?= $this->respro[0]['pamples']; ?>">
							<input type="hidden" name="pro_amples_free"
							value="<?= $this->respro[0]['pfwamples']; ?>">
							<button type="submit" id="sendcontactreq"><i
							class="fa fa-shopping-cart"></i> Contact Me
							</button>
						</form>
						<?php } ?>
					</a> </div>
				</div>
			</div>
			<?php } ?>
		</div>
	</div>
	<?php } else { ?>
	<div class='booking-box-body'>
		<!---->
		<?php if (($productDetails->pro_key == 0)) { ?>
		<form>
			<div class='col-md-12 col-sm-12 col-xs-12 no-space'>
				<div class='col-md-5 col-sm-5 col-xs-5 no-space'>
					<label>Price</label>
				</div>
				<div class='input-group margin-bottom-sm col-md-7 col-sm-7 col-xs-7'>
					<input type='text' id='itemprice' name='itemprice'
					class='form-control'
					value='<?php echo $currencySymbol; ?><?php echo $admin_model_obj->FormatPricingValues($productDetails->single_price); ?>'
					disabled>
					<!--<span class='input-group-addon'><i class='fa fa-calendar fa-fw'></i></span>-->
				</div>
			</div>
			<div class='col-md-12 col-sm-12 col-xs-12 no-space'>
				<div class='col-md-5 col-sm-5 col-xs-5 no-space'>
					<label>Buy & Earn</label>
				</div>
				<div class='input-group margin-bottom-sm col-md-7 col-sm-7 col-xs-7'>
					<input type='text' id='buyearnamples' name='buyearnamples'
					class='form-control' placeholder='D'
					value='<?php echo $admin_model_obj->FormatPricingValues($admin_model_obj->DisplayAmplePoints($productDetails->pamples)); ?> Amples'
					disabled>
					<!--<span class='input-group-addon'><i class='fa fa-calendar fa-fw'></i></span>-->
				</div>
			</div>
			<div class='col-md-12 col-sm-12 col-xs-12 no-space'>
				<div class='col-md-5 col-sm-5 col-xs-5 no-space'>
					<label>Reward Value</label>
				</div>
				<div class='input-group margin-bottom-sm col-md-7 col-sm-7 col-xs-7'>
					<input type='text' id='earnrewardonitem' name='earnrewardonitem'
					value='<?php echo $admin_model_obj->FormatPricingValues($productDetails->pdiscountprice); ?>'
					class='form-control' disabled>
				</div>
			</div>
			<div class='col-md-12 col-sm-12 col-xs-12 no-space'>
				<div class='col-md-5 col-sm-5 col-xs-5 no-space'>
					<label>You Earn</label>
				</div>
				<div class='input-group margin-bottom-sm col-md-7 col-sm-7 col-xs-7'>
					<input type='text' id='youearndiscount' name='youearndiscount'
					value='<?php echo (int)$productDetails->pdiscount; ?>%'
					class='form-control' disabled>
				</div>
			</div>
			<div class='clearfix'></div>
			
			<?php if ($productDetails->pdiscount < 100) { ?>
			<?php if (!empty($usrmakey)) { ?>
			<h2 class='earn-reward-fixed text-center'><a
				href="<?php echo $this->baseUrl('dashboard'); ?>">EARN
			UP TO EXTRA 10% IN REWARD TIME</a></h2>
			<?php } else { ?>
			<h2 class='earn-reward-fixed text-center'><a
				href="javascript:void(0);" onclick="triggerLogin()">EARN
			UP TO EXTRA 10% IN REWARD TIME</a></h2>
			<?php } ?>
			<?php } ?>
			<div class='grand-total text-center' data-step="3"
				data-intro="Add Product To Cart" data-position='left'>
				<?php
				if ($is_accepting_orders > 0) {
				if ($AvailableQuantity > 0) { ?>
				<div class='col-md-12 col-sm-12 col-xs-12'>
					<div class='button-group'><a class='btn-add-cart'
						id="cartfornomargine"
						href='javascript:void(0);'>Add
					to cart jjjjjjjjjjjjjjjjjj</a></div>
				</div>
				<?php } else { ?>
				<div class='col-md-12 col-sm-12 col-xs-12'>
					<div class='button-group'><a class='btn-add-cart'
						href='javascript:void(0);'
						onclick="showqyalert();">Add to
					cart</a></div>
				</div>
				<?php }
				} else {
				?>
				<div class='col-md-12 col-sm-12 col-xs-12'>
					<div class='button-group'><a class='btn-add-cart'
						href='javascript:void(0);'
						onclick="shownotacceptingorders();">Add
					to cart</a></div>
				</div>
				<?php } ?>
			</div>
		</form>
		<?php } else { ?>
		<?php if (isset($contactMePrice) && !empty($contactMePrice)) { ?>
		<div class='col-md-12 col-sm-12 col-xs-12 no-space'>
			<div class='col-md-5 col-sm-5 col-xs-5 no-space'>
				<label>Buy & Earn</label>
			</div>
			<div class='input-group margin-bottom-sm col-md-7 col-sm-7 col-xs-7'>
				<input type='text' id='buyearnamples' name='buyearnamples'
				class='form-control' placeholder='D'
				value='<?php echo $admin_model_obj->FormatPricingValues($contactMePrice['ctm_no_of_amples']); ?> Amples'
				disabled>
				<!--<span class='input-group-addon'><i class='fa fa-calendar fa-fw'></i></span>-->
			</div>
		</div>
		<div class='col-md-12 col-sm-12 col-xs-12 no-space'>
			<div class='col-md-5 col-sm-5 col-xs-5 no-space'>
				<label>Reward Value</label>
			</div>
			<div class='input-group margin-bottom-sm col-md-7 col-sm-7 col-xs-7'>
				<input type='text' id='earnrewardonitem' name='earnrewardonitem'
				value='<?php echo $admin_model_obj->FormatPricingValues($contactMePrice['ctm_discount_price']); ?>'
				class='form-control' disabled>
			</div>
		</div>
		<?php } else { ?>
		<div class='col-md-12 col-sm-12 col-xs-12 no-space'>
			<div class='col-md-5 col-sm-5 col-xs-5 no-space'>
				<label>Price</label>
			</div>
			<div class='input-group margin-bottom-sm col-md-7 col-sm-7 col-xs-7'>
				<input type='text' id='itemprice' name='itemprice'
				class='form-control'
				value='<?php echo $currencySymbol; ?><?php echo $admin_model_obj->FormatPricingValues($productDetails->single_price); ?>'
				disabled>
				<!--<span class='input-group-addon'><i class='fa fa-calendar fa-fw'></i></span>-->
			</div>
		</div>
		<div class='col-md-12 col-sm-12 col-xs-12 no-space'>
			<div class='col-md-5 col-sm-5 col-xs-5 no-space'>
				<label>Buy & Earn</label>
			</div>
			<div class='input-group margin-bottom-sm col-md-7 col-sm-7 col-xs-7'>
				<input type='text' id='buyearnamples' name='buyearnamples'
				class='form-control' placeholder='D'
				value='<?php echo $admin_model_obj->FormatPricingValues($admin_model_obj->DisplayAmplePoints($productDetails->pamples)); ?> Amples'
				disabled>
				<!--<span class='input-group-addon'><i class='fa fa-calendar fa-fw'></i></span>-->
			</div>
		</div>
		<div class='col-md-12 col-sm-12 col-xs-12 no-space'>
			<div class='col-md-5 col-sm-5 col-xs-5 no-space'>
				<label>Reward Value</label>
			</div>
			<div class='input-group margin-bottom-sm col-md-7 col-sm-7 col-xs-7'>
				<input type='text' id='earnrewardonitem' name='earnrewardonitem'
				value='<?php echo $admin_model_obj->FormatPricingValues($productDetails->pdiscountprice); ?>'
				class='form-control' disabled>
			</div>
		</div>
		<div class='col-md-12 col-sm-12 col-xs-12 no-space'>
			<div class='col-md-5 col-sm-5 col-xs-5 no-space'>
				<label>You Earn</label>
			</div>
			<div class='input-group margin-bottom-sm col-md-7 col-sm-7 col-xs-7'>
				<input type='text' id='youearndiscount' name='youearndiscount'
				value='<?php echo (int)$productDetails->pdiscount; ?>%'
				class='form-control' disabled>
			</div>
		</div>
		<?php } ?>
		<div class='clearfix'></div>
		<div class='grand-total text-center' data-step="4"
			data-intro="Send Contact Request" data-position='left'>
			
			
			<div class='col-md-12 col-sm-12 col-xs-12'>
				<div class='button-group'>
					<?php if (empty($usrmakey)) { ?>
					<button id="contactme"><i class="fa fa-shopping-cart"></i>
					Contact Me
					</button>
					<input type="hidden" id="contact"
					value="<?= $usrmakey; ?>">
					<?php } else { ?>
					<form action="<?php echo $this->baseUrl('index/contactmail'); ?>"
						method="post">
						<?php $fname = $this->resuser[0]['first_name'];
						$lname = $this->resuser[0]['last_name'];
						$coustmer_name = $fname . ' ' . $lname;;
						?>
						<input type="hidden" name="userid"
						value="<?= $usrmakey; ?>">
						<input type="hidden" name="username"
						value="<?= $coustmer_name; ?>">
						<input type="hidden" name="useremail"
						value="<?= $this->resuser[0]['email']; ?>">
						<input type="hidden" name="usermobile"
						value="<?= $this->resuser[0]['mobile']; ?>">
						<input type="hidden" name="product_id"
						value="<?= $productDetails->id; ?>">
						<input type="hidden" name="vendor_mail"
						value="<?= $this->data_email[0]['tbl_vndr_mail']; ?>">
						<input type="hidden" name="vendor_name"
						value="<?= $this->data_email[0]['tbl_vndr_dispname']; ?>">
						<input type="hidden" name="pro_name"
						value="<?= $this->respro[0]['product_name']; ?>">
						<input type="hidden" name="pro_sku"
						value="<?= $this->respro[0]['sku']; ?>">
						<input type="hidden" name="pro_img"
						value="<?= $this->respro[0]['image_name']; ?>">
						<input type="hidden" name="pro_price"
						value="<?= $this->respro[0]['single_price']; ?>">
						<input type="hidden" name="pro_discount"
						value="<?= $this->respro[0]['pdiscount']; ?>">
						<input type="hidden" name="pdiscountprice"
						value="<?= $this->respro[0]['pdiscount']; ?>">
						<input type="hidden" name="pro_amples"
						value="<?= $this->respro[0]['pamples']; ?>">
						<input type="hidden" name="pro_amples_free"
						value="<?= $this->respro[0]['pfwamples']; ?>">
						<button type="submit" id="sendcontactme"><i
						class="fa fa-shopping-cart"></i> Contact Me
						</button>
					</form>
					<?php } ?>
				</div>
			</div>
		</div>
	</form>
	<?php } ?>
</div>
<?php } ?>
</div>
<script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
<script>
$("body").on("click", "#cartwithample", function (event) {
var product_name = "<?php echo strip_tags($productDetails->product_name); ?>";
var product_id = '<?php echo strip_tags($productDetails->id); ?>';
var quentity = $('#qty').val();
var single_price = '<?php echo strip_tags($productDetails->single_price); ?>';
var pamples = '<?php echo $productDetails->pamples; ?>';
var total_ample = '<?php if (!empty($record->total_ample)) {
echo $admin_model_obj->DisplayAmplePoints($record->total_ample);
} else {
echo "0.00";
} ?>';
var usrmakey = '<?php echo $usrmakey; ?>';
var vendor_key = '<?php echo strip_tags($productDetails->vendor_key); ?>';
var actiondata = 'add';
var usernewitemprice = $('#usernewitemprice').val();
var inputamples = $('#inputamples').val();
var earnrewardamples = $('#earnrewardamples').val();
if (usrmakey != '') {
$.ajax({
url: '<?php echo $baseUrl; ?>/category_filter/checkprodelevery.php',
data: {
proid: product_id,
vid: vendor_key,
userid: usrmakey
},
type: 'POST'
})
.done(function (data) {
if (data.trim() == 'found') {
if (usrmakey != '') {
vpb_add_to_cart_with_amples(product_name, product_id, quentity, single_price, usernewitemprice, inputamples, total_ample, earnrewardamples, usrmakey, vendor_key, actiondata);
} else {
vpb_add_to_cart(product_name, product_id, quentity, single_price, pamples, total_ample, usrmakey, vendor_key, actiondata);
}
} else {
alert("Please Select One Of Delivery Method");
}
});
} else {
$('#modal_trigger').trigger("click");
alert("no 1")
}
});
$("body").on("click", "#cartwithoutample", function (event) {
var product_name = "<?php echo strip_tags($productDetails->product_name); ?>";
var product_id = '<?php echo strip_tags($productDetails->id); ?>';
var quentity = $('#qty').val();
var single_price = '<?php echo strip_tags($productDetails->single_price); ?>';
var pamples = '<?php echo $productDetails->pamples; ?>';
var total_ample = '<?php if (!empty($record->total_ample)) {
echo $admin_model_obj->DisplayAmplePoints($record->total_ample);
} else {
echo "0.00";
} ?>';
var usrmakey = '<?php echo $usrmakey; ?>';
var vendor_key = '<?php echo strip_tags($productDetails->vendor_key); ?>';
var actiondata = 'add';
if (usrmakey != '') {
$.ajax({
url: '<?php echo $baseUrl; ?>/category_filter/checkprodelevery.php',
data: {
proid: product_id,
vid: vendor_key,
userid: usrmakey
},
type: 'POST'
})
.done(function (data) {
if (data.trim() == 'found') {
vpb_add_to_cart(product_name, product_id, quentity, single_price, pamples, total_ample, usrmakey, vendor_key, actiondata);
} else {
alert("Please Select One Of Delivery Method");
}
});
} else {
$('#modal_trigger').trigger("click");
alert("no 2")
}
});
</script>
<script>
$(document).ready(function () {
$('#contactme').click(function () {
var usrid = $('#contact').val();
//alert(usrid);
if (usrid == '') {
$('#modal').addClass('mynewloginbox');
}
});
});
</script>
<script>
$(document).ready(function () {
$("#cartfornomargine").click(function () {
var product_name = "<?php echo strip_tags($productDetails->product_name); ?>";
var product_id = '<?php echo strip_tags($productDetails->id); ?>';
var quentity = $('#qty').val();
var single_price = '<?php echo strip_tags($productDetails->single_price); ?>';
var pamples = '<?php echo $productDetails->pamples; ?>';
var total_ample = '<?php if (!empty($record->total_ample)) {
echo $admin_model_obj->DisplayAmplePoints($record->total_ample);
} else {
echo "0.00";
} ?>';
var usrmakey = '<?php echo $usrmakey; ?>';
var vendor_key = '<?php echo strip_tags($productDetails->vendor_key); ?>';
var actiondata = 'add';
if (usrmakey != '') {
$.ajax({
url: '<?php echo $baseUrl; ?>/category_filter/checkprodelevery.php',
data: {
proid: product_id,
vid: vendor_key,
userid: usrmakey
},
type: 'POST'
})
.done(function (data) {
if (data.trim() == 'found') {
vpb_add_to_cart(product_name, product_id, quentity, single_price, pamples, total_ample, usrmakey, vendor_key, actiondata);
} else {
alert("Please Select One Of Delivery Method");
}
});
} else {
$('#modal_trigger').trigger("click");
alert("no")
}
});
});
</script>
<script>
$(document).ready(function () {
$('#contactme').click(function () {
var usrid = $('#contact').val();
//alert(usrid);
if (usrid == '') {
//alert('Please Login First');
$('#modal').addClass('mynewloginbox');
}
});
});










function vpb_add_to_cart(product_name, product_id, quentity, single_price, pamples, total_ample, usrmakey, vendor_key, actiondata){
console.log(product_name, product_id, quentity, single_price, pamples, total_ample, usrmakey, vendor_key, actiondata);
// alert(1);
   $.ajaxSetup({
	headers: {
	'X-CSRF-TOKEN': "{{csrf_token()}}"
	}
	});




$.ajax({
type: "POST",
url: '<?php echo $baseUrl; ?>/shopping_cart/shopping_cart_operation.php',
data: "item_name=" + product_name + "&prod_id=" + product_id + "&quant=" + quentity + "&item_price=" + single_price + "&earn_amples=" + pamples + "&usr_tot_amples=" + total_ample + "&usrmaid=" + usrmakey + "&vdrmaid=" + vendor_key + "&page=add_to_cart&is_without_ample=1",
success: function (b) {
var a = b.split("###");
// console.log(b)
// $("#totalitemcount").html(a[0]);
// $("#totalitemcount4mob").html(a[0]);
// $(".totalitemnewcount").html(a[0]);
// $(".cart-title").html(a[0] + " Items in my cart");
// $(".totalitemdata").html(a[1]);
// $(".totalitemamount").html("$ " + a[2]);
},
});





$.ajax({
type: "POST",
url: '<?php echo $baseUrl; ?>/add-to-cart',
data: "item_name=" + product_name + "&prod_id=" + product_id + "&quant=" + quentity + "&item_price=" + single_price + "&earn_amples=" + pamples + "&usr_tot_amples=" + total_ample + "&usrmaid=" + usrmakey + "&vdrmaid=" + vendor_key + "&page=add_to_cart&is_without_ample=1",
success: function (b) {
console.log(b)
 $('#addtocartmodal').html(b);
 // $('#openModalBtn').click();

},
});



}
</script>