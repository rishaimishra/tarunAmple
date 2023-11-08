@extends('admin.admin_includes.layout')
{{-- head section --}}
@section('head')
@include('admin.admin_includes.admin_head')
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
<style>
.preview-image {
max-width: 100px; /* Adjust the maximum width as needed */
height: auto;
margin: 5px; /* Add margin for spacing */
}
</style>
@endsection
{{-- title section --}}
@section('title')
<title>Amplepoint | Banner Edit</title>
@endsection
{{-- sidebar section --}}
@section('sideber')
@include('admin.admin_includes.admin_sideber')
@endsection
@section('content')
@include('includes.message')
<div class="container mt-5">
    <form id="uploadForm" action="{{route('admin.banner.update')}}" method="post" enctype="multipart/form-data">
        @csrf
        <input type="hidden" name="id" value="{{$banner->id}}">
        @if($banner->type=="image")
        <div class="form-group">
            <label for="images">Select Images:</label>
            <input type="file" name="image" id="images" accept="image/*">
        </div>
        @else
        <div class="form-group">
            <label for="video">Select Video:</label>
            <input type="file" name="video" id="video" accept="video/*">
        </div>
        @endif
        <div class="form-group">
            <label for="banner_title">Banner Title:</label>
            <input type="text" name="banner_title" id="banner_title" value="{{ $banner->banner_title }}">
        </div>
        <div class="form-group">
            <label for="tag_line">Tag Line:</label>
            <input type="text" name="tag_line" id="tag_line" value="{{ $banner->tag_line }}">
        </div>
        <input type="submit" value="Edit" >
    </form>
    <hr>
    <hr><div class="row">
        @if($banner->type=="image")
        <div class="col-md-6">
            <h3>Previous Image</h3>
            <div  class="d-flex flex-wrap">
                <img class="myImg" onclick="showImagePopup(this);" style="width: 200px;height: 100px;" src="{{ url('/') }}/storage/app/public/banner_image/{{$banner->banner_image}}" />
            </div>
        </div>
        @else
        <div class="col-md-6">
            <h3>Previous Video</h3>
            <div id="video-preview">
                <!-- Video preview will be displayed here -->
            </div>
        </div>
        @endif
    </div>
    <br><hr>
    <div class="row">
        @if($banner->type=="image")
        <div class="col-md-6">
            <h3>Image Previews</h3>
            <div id="image-preview" class="d-flex flex-wrap">
                <!-- Image previews will be displayed here -->
            </div>
        </div>
        @else
        <div class="col-md-6">
            <h3>Video Preview</h3>
            <div id="video-preview">
                <!-- Video preview will be displayed here -->
            </div>
        </div>
        @endif
    </div>
    {{-- custom script tag  --}}
    @endsection
    @section('script')
    @include('admin.admin_includes.admin_script')
    <script src="https://cdn.jsdelivr.net/jquery.validation/1.16.0/jquery.validate.min.js"></script>
    <script>
    $(document).ready(function() {
    $("#uploadForm").validate({
    rules: {
    banner_title: "required",
    tag_line: "required"
    },
    messages: {
    banner_title: "Banner title is required.",
    tag_line: "Tag line is required."
    }
    });
    });
    </script>
    <script>
    document.getElementById('images').addEventListener('change', function () {
    displayImages(this.files);
    });
    document.getElementById('video').addEventListener('change', function () {
    displayVideo(this.files[0]);
    });
    function displayImages(files) {
    var imagePreview = document.getElementById('image-preview');
    imagePreview.innerHTML = '';
    for (var i = 0; i < files.length; i++) {
    var image = document.createElement('img');
    image.src = URL.createObjectURL(files[i]);
    image.className = 'preview-image';
    imagePreview.appendChild(image);
    }
    }
    function displayVideo(file) {
    var videoPreview = document.getElementById('video-preview');
    videoPreview.innerHTML = '';
    var video = document.createElement('video');
    video.src = URL.createObjectURL(file);
    video.controls = true;
    video.style.maxWidth = '100%';
    videoPreview.appendChild(video);
    }
    </script>
    @endsection