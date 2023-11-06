@extends('admin.admin_includes.layout')

{{-- head section --}}
@section('head')
@include('admin.admin_includes.admin_head') 
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
@endsection

{{-- title section --}}
@section('title')
<title>Amplepoint | Admin List</title>
@endsection

{{-- sidebar section --}}
@section('sideber')
   @include('admin.admin_includes.admin_sideber')
@endsection




@section('content')
<div class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header card-header-primary card-header-icon">
                        <div class="card-icon">
                            <i class="material-icons">assignment</i>
                        </div>
                        <h4 class="card-title">Manage Administrators</h4>
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
                        <div class="material-datatables">
                            <table id="datatables" class="table table-striped table-no-bordered table-hover" cellspacing="0" width="100%" style="width:100%">
                                <thead>
                                    <tr>
                                        <th class="text-center">First Name</th>
                                        <th class="text-center">Last Name</th>
                                        <th class="text-center">Email</th>
                                        <th class="text-center">Title</th>
                                        <th class="text-center">Created</th>
                                        <th class="disabled-sorting text-center">Status</th>
                                        <th class="disabled-sorting text-center">Api Key</th>
                                        <th class="disabled-sorting text-right">Actions</th>
                                    </tr>
                                </thead>
                                <tfoot>
                                    <tr>
                                        <th class="text-center">First Name</th>
                                        <th class="text-center">Last Name</th>
                                        <th class="text-center">Email</th>
                                        <th class="text-center">Title</th>
                                        <th class="text-center">Created</th>
                                        <th class="disabled-sorting text-center">Status</th>
                                        <th class="disabled-sorting text-center">Api Key</th>
                                        <th class="disabled-sorting text-right">Actions</th>
                                    </tr>
                                </tfoot>
                                <tbody>
                                    @if(count($adminlistdata) > 0)
                                        @foreach($adminlistdata as $key)
                                            <tr>
                                                <td class="text-center">{{ $key['u_fname'] }}</td>
                                                <td class="text-center">{{ $key['u_lname'] }}</td>
                                                <td class="text-center">{{ $key['uemail'] }}</td>
                                                <td class="text-center">{{ $key['u_title'] }}</td>
                                                <td class="text-center">{{ date('d F Y', strtotime($key['created'])) }}</td>
                                                <td class="text-center">
                                                    <button class="btn btn-success btn-sm" type="button">
                                                        @if($key['ustatus'] == 1)
                                                            Active
                                                        @else
                                                            Inactive
                                                        @endif
                                                    </button>
                                                </td>
                                                <td class="text-center">{{ $key['api_key'] }}</td>
                                                <td class="td-actions text-center">
                                                    <a class="btn btn-success" href="{{ route('admin.edit.page', ['eak' => $key['u_id']]) }}">
                                                         <i class="fas fa-edit"></i>
                                                    </a>
                                                    @if($key['u_id'] != 1 && $key['u_id'] != $result[0]['u_id'])
                                                        <a class="btn btn-danger" href="javascript:void(0);" onclick="vndrdel('{{ $key['u_id'] }}');">
                                                             <i class="fas fa-trash-alt"></i> 
                                                        </a>
                                                    @endif
                                                </td>
                                            </tr>
                                        @endforeach
                                    @endif
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@include('admin.admin_includes.admin_script')