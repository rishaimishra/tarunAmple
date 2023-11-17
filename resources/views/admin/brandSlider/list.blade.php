@extends('admin.admin_includes.layout')
@section('head')
@include('admin.admin_includes.admin_head')
<link rel="stylesheet" href="https://cdn.datatables.net/1.11.5/css/dataTables.bootstrap4.min.css">
{{-- Include additional CSS or scripts if needed --}}
@endsection
@section('title')
<title>Amplepoint | Home Brand Slider</title>
@endsection
@section('sideber')
@include('admin.admin_includes.admin_sideber')
@endsection
@section('content')
@include('includes.message')
<div class="content">
    <div class="container-fluid">
        
        
        <h4 class="card-title">ADD BRAND SLIDERS</h4>
        
        
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <form method="post" action="{{ route('admin.home.brand.slider.add') }}" enctype="multipart/form-data" class="form-horizontal" id="categoryForm">
                        @csrf
                        <div class="row">
                            <div class="col-md-6">
                                <!-- Category Slug -->
                                <div class="form-group">
                                    <label for="brandName">Brand Name</label>
                                    <br>
                                    <select style="margin-top: 26px;" class="form-control" name="brand_id" id="brandName">
                                        <option value="">Select</option>
                                        @foreach($brands as $val)
                                        <option value="{{ $val->vendor_id }}">{{ $val->vendor_displayname }}</option>
                                        @endforeach
                                        <!-- Add more options as needed -->
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="sliderNumber">Slider no.</label>
                                    <input style="margin-top: 29px;" type="number" class="form-control" name="slider_no" id="sliderNumber">
                                </div>
                            </div>
                        </div>
                        <br>
                        <br>
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header card-header-primary card-header-icon">
                    <div class="card-icon">
                        <i class="material-icons">assignment</i>
                    </div>
                    <h4 class="card-title">SHOW BRAND SLIDERS</h4>
                </div>
                <div class="card-body">
                    @if(isset($message))
                    <div class="alert alert-info">
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <i class="material-icons">close</i>
                        </button>
                        <span>{{ $message }}</span>
                    </div>
                    @endif
                    <div class="toolbar"></div>
                    <div class="table-responsive">
                        <div class="material-datatables">
                            <table id="datatables" class="table table-striped table-no-bordered table-hover" cellspacing="0" width="100%">
                                <thead>
                                    <tr>
                                        <th class="text-center">ID</th>
                                        <th class="text-center">BRAND NAME</th>
                                        <th class="text-center">SLIDER NO.</th>
                                        <th class="disabled-sorting text-center">Actions</th>
                                    </tr>
                                </thead>
                                
                                <tbody>
                                    @forelse($sliders as $key)
                                    <tr class="even pointer">
                                        <td class="text-center">{{ $key->id }}</td>
                                        <td class="text-center">{{ $key->vendorDetails->tbl_vndr_dispname }}</td>
                                        <td class="text-center">{{ ucfirst($key['slider_no']) }}</td>
                                        
                                        <td class="td-actions text-center">
                                            <a class="btn btn-primary" href="#" data-toggle="modal" data-target="#editModal{{$key->id}}"><i class="material-icons">edit</i></a>

                                            <a class="btn btn-danger" style="margin-top: 5px" href="{{route('admin.home.brand.slider.delete',$key->id)}}" onclick="javascript:return confirm('Are you sure you want to delete?')"><i class="material-icons">delete</i></a>
                                        </td>
                                    </tr>
                                    




                                    <!-- Edit Modal -->
                                    <div class="modal fade" id="editModal{{$key->id}}" tabindex="-1" role="dialog" aria-labelledby="editModalLabel" aria-hidden="true">
                                        <div class="modal-dialog" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="editModalLabel">Edit Category</h5>
                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                                <div class="modal-body">
                                                    <form method="post" action="{{ route('admin.home.brand.slider.update') }}" enctype="multipart/form-data" class="form-horizontal" >
                                                        @csrf
                                                        <input type="hidden" name="id" value="{{$key->id}}">
                                                        <div class="row">
                                                            <div class="col-md-6">
                                                                <!-- Category Slug -->
                                                                <div class="form-group">
                                                                    <label for="brandName">Brand Name</label>
                                                                    <br>
                                                                    <select class="form-control" name="brand_id" required id="brandName">
                                                                        @foreach($brands as $val)
                                                                        <option value="{{ $val->vendor_id }}" @if($val->vendor_id==$key->vendor_id) selected @endif>{{ $val->vendor_displayname }}</option>
                                                                        @endforeach
                                                                        <!-- Add more options as needed -->
                                                                    </select>
                                                                </div>
                                                            </div>
                                                            <div class="col-md-6">
                                                                <div class="form-group">
                                                                    <label for="sliderNumber">Slider no.</label>
                                                                    <input type="number" class="form-control" required max="5" value="{{@$key->slider_no}}" name="slider_no" id="sliderNumber">
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <br>
                                                        <br>
                                                        <button type="submit" class="btn btn-primary">Submit</button>
                                                    </form>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>





                                    @empty
                                    <tr>
                                        <td colspan="10" class="text-center">No categories found.</td>
                                    </tr>
                                    @endforelse
                                </tbody>
                            </table>
                        </div>
                    </div>
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
@endsection
@section('script')
@include('admin.admin_includes.admin_script')
<script src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.11.5/js/dataTables.bootstrap4.min.js"></script>
<script>
$(document).ready(function () {
$('#datatables').DataTable();
});
// Your existing image popup script here
</script>
<script src="https://cdn.jsdelivr.net/jquery.validation/1.16.0/jquery.validate.min.js"></script>
<script>
$(document).ready(function () {
// Add validation rules and messages
$("#categoryForm").validate({
rules: {
brand_id: {
required: true
},
slider_no: {
required: true,
max: 5,
},
},
});
});
</script>
@endsection