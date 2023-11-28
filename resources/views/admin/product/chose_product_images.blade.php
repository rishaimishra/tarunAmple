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
					<img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcRFLwDkTYFPJCZVh9iRZ7mu8zjxu6QoiIg_8NnC0ka-fA&s"
					alt="...">
				</div>
				<div class="fileinput-preview fileinput-exists thumbnail"></div>
				<div>
					<span class="btn btn-rose btn-round btn-file expect_dark_gradiant_bg">
						<span class="fileinput-new">Select image</span>
						<span class="fileinput-exists">Change</span>
						<input accept="image/*" type="file" id="file" name="filemain" required/>
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
							<img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcRFLwDkTYFPJCZVh9iRZ7mu8zjxu6QoiIg_8NnC0ka-fA&s"
							alt="...">
						</div>
						<div class="fileinput-preview fileinput-exists thumbnail"></div>
						<div>
							<span class="btn btn-rose btn-round btn-file expect_dark_gradiant_bg">
								<span class="fileinput-new">Select image</span>
								<span class="fileinput-exists">Change</span>
								<input accept="image/*" type="file" id="file_1" name="file[]"/>
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