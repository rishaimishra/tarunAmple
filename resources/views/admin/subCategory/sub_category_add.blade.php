@extends('admin.admin_includes.layout')
{{-- head section --}}
@section('head')
@include('admin.admin_includes.admin_head')
{{-- Include additional CSS or scripts if needed --}}
@endsection
{{-- title section --}}
@section('title')
<title>Amplepoint | Sub Category Add</title>
@endsection
{{-- sidebar section --}}
@section('sideber')
@include('admin.admin_includes.admin_sideber')
@endsection
@section('content')
@include('includes.message')
<div class="col-md-12">
	<div class="card">
		<div class="card-header card-header-rose card-header-text">
			<div class="card-text">
				<h4 class="card-title">Sub Category Add</h4>
			</div>

		<div class="row">
		    <div class="col-md-4">
		        <a href="{{ route('admin.category.add') }}" class="btn btn-success btn-block">Add Category</a>
		    </div>
		    <div class="col-md-4">
		        <a href="{{ route('admin.sub.category.add') }}" class="btn btn-primary btn-block">Add Sub Category</a>
		    </div>
		    <div class="col-md-4">
		        <a href="{{route('admin.sub2.category.add')}}" class="btn btn-success btn-block">Add Sub2 Category</a>
		    </div>
		</div>

		<div class="card-body">
			<form method="post" action="{{ route('admin.sub.category.store') }}" enctype="multipart/form-data"
				class="form-horizontal" id="categoryForm">
				@csrf
				<div class="row">
					<div class="col-md-6">
						<!-- Category Name -->
						<div class="form-group">
							<label class="bmd-label-floating">Sub Category Name</label>
							<input type="text" class="form-control" name="sub_category_name">
						</div>
					</div>
					<div class="col-md-6">
						<!-- Category Slug -->
						<div class="form-group">
							<label class="bmd-label-floating">Sub Category Slug</label>
							<input type="text" class="form-control" name="sub_category_slug">
						</div>
					</div>

					<div class="col-md-6">
					    <!-- Category Slug -->
					    <div class="form-group">
					        <label class="">Main Category</label>
					        <br>
					        <select class="form-control" name="category">
					        	 <option value="">Select category</option>
					        	@foreach($categories as $val)
					            <option value="{{$val->id}}">{{$val->category_name}}</option>
					            @endforeach
					            <!-- Add more options as needed -->
					        </select>
					    </div>
					</div>
				</div>
<br>
<br>

				<div class="row">
					<div class="col-md-6">
						<!-- Meta Title -->
						<div class="form-group">
							<label class="bmd-label-floating">Sub Category description</label>
							<input type="text" class="form-control" name="sub_cat_desc">
						</div>
					</div>

					<div class="col-md-6">
						<!-- Meta Title -->
						<div class="form-group">
							<label class="bmd-label-floating">Meta Title</label>
							<input type="text" class="form-control" name="sub_meta_title">
						</div>
					</div>
					<div class="col-md-6">
						<!-- Meta Description -->
						<div class="form-group">
							<label class="bmd-label-floating">Meta Description</label>
							<input type="text" class="form-control" name="sub_meta_description">
						</div>
					</div>
				</div>
				<!-- Keywords -->
				<div class="form-group">
					<label class="bmd-label-floating">Meta Keywords</label>
					<input type="text" class="form-control" name="sub_meta_keywords">
				</div>
				<br>
				<hr>
				<br>
				

				
				{{--  all images  --}}
				<!-- Category Icon and Category Thumbnail in a single row -->
				<div class="form-row">
					<div class="col-md-6">
						<div class="form-group">
							<label for="inputCategoryIcon">Sub Category Icon (20x22 pixels)</label>
							<div class="custom-file">
								<input type="file" accept="image/*" class="custom-file-input" name="sub_category_icon" id="inputCategoryIcon"
								onchange="previewImage(this, 'previewIcon')">
								<label class="custom-file-label" for="inputCategoryIcon">Choose file</label>
							</div>
							<img id="previewIcon" alt="Image Preview" class="img-thumbnail" style="max-width: 200px; max-height: 200px;">
						</div>
					</div>
					<div class="col-md-6">
						<div class="form-group">
							<label for="inputCategoryThumbnail">Sub Category Thumbnail (100x100 pixels)</label>
							<div class="custom-file">
								<input type="file" accept="image/*" class="custom-file-input" name="sub_category_thumbnail"
								id="inputCategoryThumbnail" onchange="previewImage(this, 'previewThumbnail')">
								<label class="custom-file-label" for="inputCategoryThumbnail">Choose file</label>
							</div>
							<img id="previewThumbnail" alt="Image Preview" class="img-thumbnail" style="max-width: 200px; max-height: 200px;">
						</div>
					</div>
				</div>
			

				<br>
				<br>


				<!-- Additional Category Banner Images -->
				<div class="form-row">
					@for ($i = 1; $i <= 4; $i++)
					<div class="col-md-3">
						<div class="form-group">
							<label for="inputCategoryBanner{{ $i }}"> Sub Category Banner{{ $i }} Image (871x288 pixels)</label>
							<div class="custom-file">
								<input type="file" accept="image/*" class="custom-file-input" name="sub_category_banner{{ $i }}"
								id="inputCategoryBanner{{ $i }}" onchange="previewImage(this, 'previewBanner{{ $i }}')">
								<label class="custom-file-label" for="inputCategoryBanner{{ $i }}">Choose file</label>
							</div>
							<img id="previewBanner{{ $i }}" alt="Image Preview" class="img-thumbnail" style="max-width: 200px; max-height: 200px;">
						</div>
					</div>
					@endfor
				</div>
				<br>
				<br>
				<button type="submit" class="btn btn-primary">Submit</button>
			</form>
		</div>
	</div>
</div>
@endsection


@section('script')
@include('admin.admin_includes.admin_script')
<script>
function previewImage(input, previewId) {
var preview = document.getElementById(previewId);
var file = input.files[0];
var reader = new FileReader();
reader.onloadend = function () {
preview.src = reader.result;
};
if (file) {
reader.readAsDataURL(file);
} else {
preview.src = "";
}
}
</script>
<script src="https://cdn.jsdelivr.net/jquery.validation/1.16.0/jquery.validate.min.js"></script>
<script>
$(document).ready(function () {
// Add validation rules and messages
$("#categoryForm").validate({
rules: {
sub_category_name: {
required: true
},
sub_category_slug: {
required: true
},
category: {
required: true
},
sub_cat_desc: {
required: true
},
sub_meta_title: {
required: true
},
sub_meta_description: {
required: true
},
sub_meta_keywords: {
required: true
},
sub_category_icon: {
required: true
},
sub_category_thumbnail: {
required: true
},
sub_category_banner1: {
required: true
},
sub_category_banner2: {
required: true
},
sub_category_banner3: {
required: true
},
sub_category_banner4: {
required: true
},
// Add rules for additional banners if needed
},
messages: {
sub_category_name: {
required: "Please enter the category name"
},
sub_category_slug: {
required: "Please enter the category slug"
},
sub_meta_title: {
required: "Please enter the meta title"
},
sub_meta_description: {
required: "Please enter the meta description"
},
sub_category_icon: {
required: "Please choose a category icon"
},
sub_category_thumbnail: {
required: "Please choose a category thumbnail"
},
sub_category_banner: {
required: "Please choose a category banner image"
},
// Add messages for additional banners if needed
}
});
// Additional custom validation if needed
});
</script>
@endsection