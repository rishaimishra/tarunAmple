@extends('Layouts.app')
@section('title')
<title>Amplepoints | Member Login</title>
@endsection

@include('includes.head')
@include('includes.header')


@section('content')
  <div class="user-login-sec">
    <h4 class="modal-heading">Member Login</h4>
    <div class="sign-in" id="memberSignInContent">
      <form>
        <div class="mb-3">
          <label for="exampleInputEmail1" class="form-label">Email address</label>
          <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
        </div>
        <div class="mb-3">
          <label for="exampleInputPassword1" class="form-label">Password</label>
          <input type="password" class="form-control" id="exampleInputPassword1">
        </div>
        <div class="forget">
          <div class="mb-3 form-check">
            <input type="checkbox" class="form-check-input" id="exampleCheck1">
            <label class="form-check-label" for="exampleCheck1">Remember Me</label>
          </div>
          <a href="#">Forget Password?</a>
        </div>
        <button type="submit" class="btn checkout">Sign In</button>
      </form>
    </div>
  </div>


@include('includes.footer')
@include('includes.script')
@endsection