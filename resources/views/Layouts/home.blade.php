@extends('Layouts.app')
@section('title')
<title>Amplepoint</title>
@endsection

@include('includes.head')
@include('includes.header')


@section('content')
<div class="hero-sec">
  <video class="background" autoplay muted loop>
    <source src="https://amplepoints.com/home_banners/aboutamplepoints.mp4" type="video/mp4">
  </video>
</div>



@include('includes.footer')
@include('includes.script')
@endsection