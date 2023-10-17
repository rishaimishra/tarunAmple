@extends('Layouts.app')
@section('title')
<title>Amplepoints | Member Login</title>
@endsection

@include('includes.head')
@include('includes.header')


@section('content')
  <div class="user-login-sec">
     @include('includes.message')
    <h4 class="modal-heading">Member Login</h4>
    <div class="sign-in" id="memberSignInContent">
      <form id="frm" method="post" action="{{route('member.login.post')}}">
        @csrf
        <div class="mb-3">
          <label for="exampleInputEmail1" class="form-label">Email address</label>
          <input type="email" name="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
        </div>
        <div class="mb-3">
          <label for="exampleInputPassword1" class="form-label">Password</label>
          <input type="password" name="password" class="form-control" id="exampleInputPassword1">
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
<script src="https://cdn.jsdelivr.net/jquery.validation/1.16.0/jquery.validate.min.js"></script>
<script>
$(document).ready(function() {
    $("#frm").validate({
        rules: {
            email: {
                required: true,
                email: true
            }
            password: {
                required: true,
                minlength: 6
            }
        },
        messages: {
           
            email: {
                required: "Please enter your email",
                email: "Please enter a valid email address"
            },
          
            password: {
                required: "Please enter a password",
                minlength: "Password must be at least 6 characters"
            },
           
        }
    });
});
</script>
@endsection