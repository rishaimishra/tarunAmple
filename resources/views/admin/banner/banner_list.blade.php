@extends('admin.admin_includes.layout')
@section('head')
@include('admin.admin_includes.admin_head')
@endsection
@section('title')
<title>Amplepoint | SHOW BANNER</title>
@endsection
@section('sideber')
@include('admin.admin_includes.admin_sideber')
</section>
@section('content')
<div class="content">
<div class="container-fluid">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header card-header-primary card-header-icon">
                    
                    <h4 class="card-title">SHOW BANNER</h4>
                </div>
                <div class="card-body">
                    @include('includes.message')
                    
                    <div class="col-md-12">
                        <video controls style="width:100%;">
                            <source src="{{ url('/') }}/storage/app/public/banner_video/{{$video->banner_image}}" type="video/mp4">
                        </video>
                    </div>
                    
                    <div class="row" style="margin-left: 0px;">
                        <div class="col-md-2">
                            <a href="{{route('admin.show.banner')}}" class="btn btn-primary">Show Banner</a>
                            <br>
                            
                        </div>
                        <div class="col-md-2">
                            
                            <a href="{{route('admin.show.video')}}" class="btn btn-primary">Show Video</a>
                        </div>
                        @if($banner_show_status->image=="Y")
                        Image is now Active
                        @else
                        Video is now active
                        @endif
                    </div>
                    <div class="material-datatables">
                        <table id="datatables" class="table table-striped table-no-bordered table-hover" cellspacing="0" width="100%" style="width:100%">
                            <thead>
                                <tr>
                                    <th class="disabled-sorting text-center">BANNER IMAGE</th>
                                    <th class="text-center">BANNER TITLE</th>
                                    <th class="text-center">BANNER TAG</th>
                                    <th class="text-center">DATE BANNER</th>
                                    <th class="disabled-sorting text-right">Actions</th>
                                </tr>
                            </thead>
                            <tfoot>
                            <tr>
                                <th class="disabled-sorting text-center">BANNER IMAGE</th>
                                <th class="text-center">BANNER TITLE</th>
                                <th class="text-center">BANNER TAG</th>
                                <th class="text-center">DATE BANNER</th>
                                <th class="disabled-sorting text-right">Actions</th>
                            </tr>
                            </tfoot>
                            <tbody>
                                @if($banners->count() > 0)
                                @foreach($banners as $val)
                                
                                <tr>
                                    <td class="text-center"><img class="myImg" onclick="showImagePopup(this);" style="width: 200px;height: 100px;" src="{{ url('/') }}/storage/app/public/banner_image/{{$val->banner_image}}" /></td>
                                    
                                    <td class="text-center">{{ ucfirst($val->banner_title) }}</td>
                                    <td class="text-center">{{ ucfirst($val->tag_line) }}</td>
                                    <td class="text-center">{{ ucfirst($val->create_date) }}</td>
                                    <td class="td-actions text-center">
                                        <a class="btn btn-success" href="{{ route('admin.banner.edit.page',$val->id) }}"><i class="fas fa-edit"></i></a>
                                        <a class="btn btn-danger" href="{{ route('admin.banner.delete',$val->id) }}" onclick="return confirm('are you sure want to delete?')"> <i class="fas fa-trash-alt"></i> </a>
                                    </td>
                                </tr>
                                @endforeach
                                @endif
                            </tbody>
                        </table>
                    </div>
                </div>
                <!-- end content-->
            </div>
            <!--  end card  -->
        </div>
        <!-- end col-md-12 -->
    </div>
    <!-- end row -->
</div>
</div>
@endsection
@section('script')
@include('admin.admin_includes.admin_script')
{{--    <script>
var xmlHttpRequest;
function createXMLHttpRequest() {
if (xmlHttpRequest != null) {
return;
}
if (window.ActiveXObject) {
try {
xmlHttpRequest = new ActiveXObject('Msxml2.XMLHTTP');
} catch (exception_1) {
try {
xmlHttpRequest = new ActiveXObject('Microsoft.XMLHTTP');
} catch (exception_2) {
}
}
} else if (window.XMLHttpRequest) {
xmlHttpRequest = new XMLHttpRequest();
}
}
function vndrdel(vdrid) {
var check = confirm('Are you sure you want to delete?');
if (check) {
var baseurl = '{{ url('/') }}';
var SITEROOT = baseurl;
createXMLHttpRequest();
var url = SITEROOT + '/admin/index/delhbanner/';
var strURL = url;
if (vdrid != '') {
var query = "vdelid=" + vdrid;
if (xmlHttpRequest != null) {
xmlHttpRequest.open("post", strURL, true);
xmlHttpRequest.onreadystatechange = deletevdrresponse;
xmlHttpRequest.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
xmlHttpRequest.send(query);
}
}
}
}
function deletevdrresponse() {
if (xmlHttpRequest.readyState == 4) {
if (xmlHttpRequest.status == 200) {
var ss = xmlHttpRequest.responseText;
var result1 = ss;
location.reload(true);
}
}
}
</script> --}}
@endsection