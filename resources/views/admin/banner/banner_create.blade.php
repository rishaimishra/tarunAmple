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
<title>Amplepoint | Banner Add</title>
@endsection
{{-- sidebar section --}}
@section('sideber')
@include('admin.admin_includes.admin_sideber')
@endsection
@section('content')
@include('includes.message')
<div class="container mt-5">
    <h2>Upload Images and a Video</h2>
    <form id="uploadForm" action="{{route('admin.banner.add.post')}}" method="post" enctype="multipart/form-data">
        @csrf
        <div class="form-group">
            <label for="images">Select Multiple Images:</label>
            <input type="file" name="images[]" id="images" multiple accept="image/*">
        </div>
        <div class="form-group">
            <label for="video">Select Video:</label>
            <input type="file" name="video" id="video" accept="video/*">
        </div>
        <div class="form-group">
            <label for="banner_title">Banner Title:</label>
            <input type="text" name="banner_title" id="banner_title">
        </div>
        <div class="form-group">
            <label for="tag_line">Tag Line:</label>
            <input type="text" name="tag_line" id="tag_line">
        </div>
        <input type="submit" value="upload" >
    </form>
    <hr>
    <div class="row">
        <div class="col-md-6">
            <h3>Image Previews</h3>
            <div id="image-preview" class="d-flex flex-wrap">
                <!-- Image previews will be displayed here -->
            </div>
        </div>
        <div class="col-md-6">
            <h3>Video Preview</h3>
            <div id="video-preview">
                <!-- Video preview will be displayed here -->
            </div>
        </div>
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