@extends('admin.admin_includes.layout')

@section('head')
    @include('admin.admin_includes.admin_head')
    <link rel="stylesheet" href="https://cdn.datatables.net/1.11.5/css/dataTables.bootstrap4.min.css">
    {{-- Include additional CSS or scripts if needed --}}
@endsection

@section('title')
    <title>Amplepoint | Show Sub2 Category</title>
@endsection

@section('sideber')
    @include('admin.admin_includes.admin_sideber')
@endsection

@section('content')
    @include('includes.message')

    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header card-header-primary card-header-icon">
                            <div class="card-icon">
                                <i class="material-icons">assignment</i>
                            </div>
                            <h4 class="card-title">SHOW SUB2 CATEGORY</h4>
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
                                                <th class="text-center">SUB2 CATEGORY ID</th>
                                                <th class="text-center">SUB2 CATEGORY NAME</th>
                                                 <th class="text-center">SUB CATEGORY </th>
                                                <th class="disabled-sorting text-center">SUB2 CATEGORY ICON</th>
                                                <th class="disabled-sorting text-center">SUB2 CATEGORY THUMBNAIL </th>
                                                <th class="disabled-sorting text-center">SUB2 CATEGORY BANNER1 IMAGE</th>
                                                <th class="disabled-sorting text-center">SUB2 CATEGORY BANNER2 IMAGE</th>
                                                <th class="disabled-sorting text-center">SUB2 CATEGORY BANNER3 IMAGE</th>
                                                <th class="disabled-sorting text-center">SUB2 CATEGORY BANNER4 IMAGE</th>
                                                <th class="text-center">STATUS</th>
                                                <th class="disabled-sorting text-center">Actions</th>
                                            </tr>
                                        </thead>
                                        <tfoot>
                                            <tr>
                                                <th class="text-center">SUB2 CATEGORY ID</th>
                                                <th class="text-center">SUB2 CATEGORY NAME</th>
                                                 <th class="text-center">SUB CATEGORY </th>
                                                <th class="disabled-sorting text-center">SUB2 CATEGORY ICON</th>
                                                <th class="disabled-sorting text-center">SUB2 CATEGORY THUMBNAIL</th>
                                                <th class="disabled-sorting text-center">SUB2 CATEGORY BANNER1 IMAGE</th>
                                                <th class="disabled-sorting text-center">SUB2 CATEGORY BANNER2 IMAGE</th>
                                                <th class="disabled-sorting text-center">SUB2 CATEGORY BANNER3 IMAGE</th>
                                                <th class="disabled-sorting text-center">SUB2 CATEGORY BANNER4 IMAGE</th>
                                                <th class="text-center">STATUS</th>
                                                <th class="disabled-sorting text-center">Actions</th>
                                            </tr>
                                        </tfoot>
                                        <tbody>
                                            @forelse($sub2_categories as $key)
                                                <tr class="even pointer">
                                                    <td class="text-center">{{ $key['id'] }}</td>
                                                    <td class="text-center">{{ ucfirst($key['subcategory2_name']) }}</td>
                                                    <td class="text-center">{{$key->subcategoryDetails->subcategory_name }}</td>
                                                    <td class="text-center">
                                                        <img class="myImg" style="width: 100px !important;"  onclick="showImagePopup(this);" src="{{ url('/') }}/storage/app/public/sub2_category_icon/{{ $key['ssubcategory_image'] }}">
                                                    </td>
                                                    <td class="text-center">
                                                        <img class="myImg" onclick="showImagePopup(this);" style="width: 100px !important;" src="{{ url('/') }}/storage/app/public/sub2_category_thumbnail/{{ $key['sub2_thumbnail'] }}">
                                                    </td>
                                                    <td class="text-center">
                                                        <img class="myImg" onclick="showImagePopup(this);" style="width: 100px !important;" src="{{ url('/') }}/storage/app/public/sub2_category_banner_image/{{ $key['banner1'] }}">
                                                    </td>
                                                    <td class="text-center">
                                                        <img class="myImg" onclick="showImagePopup(this);" style="width: 100px !important;" src="{{ url('/') }}/storage/app/public/sub2_category_banner_image/{{ $key['banner2'] }}">
                                                    </td>
                                                    <td class="text-center">
                                                        <img class="myImg" onclick="showImagePopup(this);" style="width: 100px !important;" src="{{ url('/') }}/storage/app/public/sub2_category_banner_image/{{ $key['banner3'] }}">
                                                    </td>
                                                    <td class="text-center">
                                                        <img class="myImg" onclick="showImagePopup(this);" style="width: 100px !important;" src="{{ url('/') }}/storage/app/public/sub2_category_banner_image/{{ $key['banner4'] }}">
                                                    </td>
                                                    <td class="text-center">
                                                        @if($key['status'] == '1')
                                                            <a class="btn btn-success btn-sm" href="{{route('admin.sub2.category.deactive',$key->id)}}"
                                                               onclick="javascript:return confirm('Are you sure you want to Disable CATEGORY? When you Disable this CATEGORY, CATEGORY will not show in the website area')">Active</a>
                                                        @else
                                                            <a class="btn btn-danger btn-sm" href="{{route('admin.sub2.category.active',$key->id)}}"
                                                               onclick="javascript:return confirm('Are you sure you want to Enable CATEGORY? When you Enable this CATEGORY, CATEGORY will show in the website area')">Inactive</a>
                                                        @endif
                                                    </td>
                                                    <td class="td-actions text-center">
                                                        <a class="btn btn-primary" href="{{route('admin.sub2.category.edit',$key->id)}}"><i class="material-icons">edit</i></a>

                                                        <a class="btn btn-danger" style="margin-top: 5px" href="{{route('admin.sub2.category.delete',$key->id)}}"  onclick="javascript:return confirm('Are you sure you want to delete?')"><i class="material-icons">delete</i></a>
                                                    </td>
                                                </tr>
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
@endsection
