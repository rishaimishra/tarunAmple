@extends('admin.admin_includes.layout')

<?php

    $baseUrl = url('/');
    $baseurl = url('/');
    $catList=(isset($_GET->cat_list)?$_GET->cat_list:'');
    $vendorList=(isset($_GET->vendor_list)?$_GET->vendor_list:'');
    $search_term=(isset($_GET->search_term)?$_GET->search_term:'');
?>

@section('head')
    @include('admin.admin_includes.admin_head')
    <link rel="stylesheet" href="https://cdn.datatables.net/1.11.5/css/dataTables.bootstrap4.min.css">
    {{-- Include additional CSS or scripts if needed --}}
    <style type="text/css">
    .bootstrap-select:not([class*="col-"]):not([class*="form-control"]):not(.input-group-btn) {
        width: 190px;
    }
    .table .td-actions .btn {
        margin: 5px;
    }

    .td_nowrap {
        white-space:nowrap;
    }

    .specialproduct {
        background: #f75d00;
        height: 25px;
        width: 25px;
        position: absolute;
        border-radius: 50%;
        font-weight: bold;
        color: #fff;
        line-height: 25px;
        right: 0;
        top: 5px;
    }

    .searchinput {
        width: 255px;
        margin-left: 15px;
        border: 2px solid #701c7e;
        border-radius: 5px;
        height: 40px;
        text-align: center;
    }
    .w-5{
    overflow: hidden;
    width: 20px;
}

</style>
@endsection

@section('title')
    <title>Amplepoint | Show Category</title>
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
                            <h4 class="card-title">Manage Products</h4>
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

                            <div class="toolbar">
                                @if (Auth::guard('admin')->user()->utype == 1 || Auth::guard('admin')->user()->utype == 4)
                                   <form action="{{route('admin.product.list')}}" method="post">
                                   	@csrf
									    <label>Filter By:</label>
									    <select id="vendor_list" class="selectpicker" data-style="btn btn-primary btn-round" data-live-search="true" data-size="10" title="Select Vendor" name="vendor_list" onchange="this.form.submit()">
									        <option value="">All Stores</option>
									        <option value="0" {{ @$vendorList == 0 ? 'selected="selected"' : '' }}>Amplepoints</option>
									        @foreach($vendordata as $vendorkey)
									            <option value="{{ $vendorkey->tbl_vndr_id }}" {{ @$vendor_list == $vendorkey->tbl_vndr_id ? 'selected="selected"' : '' }}>
									                {{ $vendorkey->tbl_vndr_dispname }}
									            </option>
									        @endforeach
									    </select>

									    <select id="cat_list" class="selectpicker" data-style="btn btn-primary btn-round" data-live-search="true" data-size="10" title="Select Category" name="cat_list" onchange="this.form.submit()">
									        <option value="">Select Category</option>
									        @foreach(@$allmainCategory as $catKey)
									            <option value="{{ $catKey->id }}" {{ @$cat_list == $catKey->id ? 'selected="selected"' : '' }}>
									                {{ $catKey->category_name }}
									            </option>
									        @endforeach
									    </select>

									    <input type="text" class="searchinput" placeholder="Type Name | SKU | ID" name="search_term" id="search_term" value="{{ @$search_term }}">

									    <input type="submit" class="btn btn-primary" id="myBtn" value="Submit">
									</form>

                                    <hr>
                                @endif
                            </div>

                            <div class="table-responsive">
                                <table class="table table-striped">
                                    <thead>
                                        <tr>
                                            <th class="text-center td_nowrap">Product ID #</th>
                                            <th class="disabled-sorting text-center td_nowrap">Product Image</th>
                                            <th class="text-center td_nowrap">Product Title</th>
                                            <th class="text-center td_nowrap">Vendor Name</th>
                                            <th class="text-center td_nowrap">SKU</th>
                                            <th class="text-center td_nowrap">Product Qty</th>
                                            <th class="text-center td_nowrap">Category</th>
                                            <th class="text-center td_nowrap">Product Price</th>
                                            <th class="text-center td_nowrap">Wholesale Price</th>
                                            <th class="text-center td_nowrap">Discount</th>
                                            <th class="text-center td_nowrap">Status</th>
                                            <th class="text-center td_nowrap">Change Status</th>
                                            <th class="disabled-sorting text-right">Action</th>
                                        </tr>
                                    </thead>
                                    <tfoot>
                                        <tr>
                                            <th class="text-center">Product ID #</th>
                                            <th class="disabled-sorting text-center">Product Image</th>
                                            <th class="text-center">Product Title</th>
                                            <th class="text-center">Vendor Name</th>
                                            <th class="text-center">SKU</th>
                                            <th class="text-center">Product Qty</th>
                                            <th class="text-center">Category</th>
                                            <th class="text-center">Product Price</th>
                                            <th class="text-center">Wholesale Price</th>
                                            <th class="text-center">Discount</th>
                                            <th class="text-center">Status</th>
                                            <th class="text-center">Change Status</th>
                                            <th class="disabled-sorting text-right">Action</th>
                                        </tr>
                                    </tfoot>
                                    <tbody id="product_list">

                                        @forelse(@$paginator as $key)
                                        @php
                                         $is_SpecialProduct = 0;
                                                $specialPro =DB::table('tbl_vendor_sidebar_product')->where('product_id', '=',$key->pid)->first(); 

                                                if(!empty($specialPro)){
                                                    $is_SpecialProduct = 1;
                                                }
                                        @endphp

                                            <tr>
                                                <td class="text-center">
                                                    {{ $key->pid }}
                                                </td>
                                                <td class="text-center" style="position: relative;">
                                                    @if($is_SpecialProduct)
                                                        <span class="specialproduct"><i class="material-icons">star</i></span>
                                                    @endif
                                                    <img class="myImg" onclick="showImagePopup(this);" src="https://amplepoints.com/product_images/{{$key->pid}}/{{$key->image}}" style="width:100px;height:100px;">
                                                </td>
                                                <td class="text-center">{{ $key->product_name }}</td>
                                                @if($key->vendor_uid == 0)
                                                    <td class="text-center">Amplifyon</td>
                                                @else
                                                    <td class="text-center">
                                                    	@php
                                                    	 $vendor = DB::table('tbl_vendor')->where('tbl_vndr_id',$key->vendor_uid)->first();
														    if ($vendor) {
														       $name=$vendor->tbl_vndr_dispname;
														    } else {
														        $name='AmplePoints';
														    }
                                                    	@endphp
                                                    	{{$name}}
                                                    </td>
                                                @endif
                                                <td class="text-center">{{ $key->product_sku }}</td>
                                                <td class="text-center">{{ $key->quantity }}</td>
                                                <td class="text-center">{{ $key->category_name }}</td>
                                                <td class="text-center">${{ $key->single_price }}</td>
                                                <td class="text-center">${{ $key->wholesale_price }}</td>
                                                <td class="text-center">{{ $key->product_discount }}%</td>
                                                <td class="text-center">
                                                    <button class="btn btn-success btn-sm" type="button">
                                                        @if($key->product_status == 1)
                                                            Published
                                                        @elseif($key->product_status == 2)
                                                            Unpublished
                                                        @else
                                                            Pending Approval
                                                        @endif
                                                    </button>
                                                </td>
                                                <td>
                                                    <select name="product_statusnew" class="selectpicker" onchange="UpdateProductSatus(this.value,'{{ $key->pid }}');">
                                                        <option value="">change Status</option>
                                                        <option value="1" {{ $key->product_status == 1 ? 'selected' : '' }}>Published</option>
                                                        <option value="2" {{ $key->product_status == 2 ? 'selected' : '' }}>Unpublished</option>
                                                    </select>
                                                </td>
                                                <td class="td-actions text-center">
                                                    <a class="btn btn-success" href="{{route('product_edit',$key->pid) }}" rel="tooltip" title="Edit {{ $key->product_name }}">
                                                        <i class="material-icons">edit</i>
                                                    </a>
                                                    <a class="btn btn-danger" href="javascript:void(0);" onclick="productdel('{{ $key->pid }}');" rel="tooltip" title="Delete {{ $key->product_name }}">
                                                        <i class="material-icons">close</i>
                                                    </a>
                                                </td>
                                            </tr>
                                        @empty
                                            <tr>
                                                <td colspan="13" class="text-center">No products found.</td>
                                            </tr>
                                        @endforelse
                                    </tbody>
                                </table>

                                {{ $paginator->links() }}
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
    <script src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.11.5/js/dataTables.bootstrap4.min.js"></script>
    <script>
        $(document).ready(function () {
            $('#datatables').DataTable();
        });

        // Your existing image popup script here
    </script>



    <script>
    function UpdateProductSatus(pro_status, pro_id) {
        //alert(orderstatus);
        //alert(orderid);

        if(pro_status != ''){

            var check = confirm('Are you want to sure to Change Status?');

            if(check){

                $.ajax({
                    url:'<?php echo $baseurl; ?>/category_filter/changeproductstatus.php',
                    data: {product_status: pro_status,product_id: pro_id},
                    type: 'POST'
                })
                .done(function(data){
                    // console.log(data.length);

                    if(data.length == 7){
                        // console.log(22222222);

                        window.setTimeout(function(){location.reload()},1000);
                        //alert(data);

                    }else{
                        // console.log(3333333)

                        alert("somthing Wrong Try Again");
                    }

                })

            }

        }else{

            alert("Please Select Status");
        }

    }

</script>




<script>
    var xmlHttpRequest;
    function createXMLHttpRequest()
    {
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

    function productdel(prodid)
    {
         $.ajaxSetup({
                headers: {
                'X-CSRF-TOKEN': "{{csrf_token()}}"
                }
                });

        var check = confirm('Are you want to sure to delete?');
        if(check){
          
                $.ajax({
                    url: "{{route('remproduct')}}",
                    type: 'post',
                    data: {
                        prodid: prodid,
                    },
                    beforeSend: function () {
                        $(".loadcustmore").text("Loading...");
                    },
                    success: function (response) {
                        console.log(response)
                        if(response==1){
                            alert('successfully deleted');
                            window.setTimeout(function(){location.reload()},1000);
                        }else{
                            alert("something went wrong")
                        }



                    }
                });

        }

    }

    function deleteproductresponse()
    {
        if(xmlHttpRequest.readyState == 4)
            {
            if(xmlHttpRequest.status == 200)
                {
                var ss = xmlHttpRequest.responseText;
                var result1 = ss;
                location.reload(true);
            }
        }
    }


    function filterproductlist(vendorid) {
        var xhttp = new XMLHttpRequest();
        var baseurl = '<?PHP echo $baseurl;?>';
        var SITEROOT = baseurl;
        var url = SITEROOT+'/admin/index/productlist';
        //alert(url);
        var strURL = url;
        //var query ="vendorid="+vendorid;

        window.location.href = strURL+'/vendorid/'+vendorid;
    }


</script>
@endsection
