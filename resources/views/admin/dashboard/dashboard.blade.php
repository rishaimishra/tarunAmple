@extends('admin.admin_includes.layout')

{{-- head section --}}
@section('head')
@include('admin.admin_includes.admin_head') 
@endsection

{{-- title section --}}
@section('title')
<title>Amplepoint | Admin Dashboard</title>
@endsection

{{-- sidebar section --}}
@section('sideber')
   @include('admin.admin_includes.admin_sideber')
@endsection



@section('content')
    <h2>Main Content</h2>
    <p>This is the main content section.</p>
@endsection



{{-- footer and script section --}}
@section('footerAndScript')
   @include('admin.admin_includes.admin_footer')
   @include('admin.admin_includes.admin_script')
@endsection

