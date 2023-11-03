@extends('Layouts.app')
@section('meta')
{{-- all meta tags --}}
@endsection
@section('title')
<title>Amplepoints | Admin Login</title>
@endsection
<style>
@import url(https://fonts.googleapis.com/css?family=Open+Sans:400,700);
body {
font-family: 'Open Sans', sans-serif;
}
.login {
width: 400px;
margin: 16px auto;
font-size: 16px;
}
.login-header,
.login p {
margin-top: 0;
margin-bottom: 0;
}
.login-triangle {
width: 0;
margin-right: auto;
margin-left: auto;
border: 12px solid transparent;
border-bottom-color: #fe696a;
}
.login-header {
background: #fe696a;
padding: 20px;
font-size: 1.4em;
font-weight: normal;
text-align: center;
text-transform: uppercase;
color: #fff;
word-spacing: 5px;
}
.login-container {
background: #ececec;
padding: 12px;
}
.login p {
padding: 12px;
}
.login input {
box-sizing: border-box;
display: block;
width: 100%;
border-width: 1px;
border-style: solid;
padding: 16px;
outline: 0;
font-family: inherit;
font-size: 0.95em;
}
.login input[type="email"],
.login input[type="password"] {
background: #fff;
border-color: #bbb;
color: #555;
}
.login input[type="email"]:focus,
.login input[type="password"]:focus {
border-color: #fe696a;
}
.login input[type="submit"] {
background: #fe696a;
border-color: transparent;
color: #fff;
cursor: pointer;
}
.login input[type="submit"]:hover {
background: #d80000;
}
.login input[type="submit"]:focus {
border-color: #ff0606;
}
.forgot {
display: flex;
align-items: center;
justify-content: right;
padding: 2px 10px;
}
.forgot a {
font-weight: 600;
color: #007cdf;
font-size: 14px;
}
.forgot a:hover {
color: #3F51B5;
}
.copy-right {
border-top: 1px solid #fe696a;
margin-top: 18px;
}
.copy-right p {
font-size: 10px;
text-align: justify;
}
@media (max-width: 500px) {
.login {
width: 350px;
}
}
@media (max-width: 320px) {
.login {
width: 300px;
}
}
</style>
@include('includes.head')
{{-- @include('includes.header') --}}




@section('content')

    <div class="login">
         @include('includes.message')
      <div class="login-triangle"></div>
      <h2 class="login-header">Login Form</h2>
      
        <form id="frm" method="post" action="{{route('admin.login.post')}}" class="login-container">
              @csrf
        <p><input type="email" name="email" placeholder="Email"></p>
        <p><input type="password" name="password" placeholder="Password"></p>
        <p><input type="submit" value="Log in"></p>
        <div class="forgot">
          <a href="#">Lost your password?</a>
        </div>
        <div class="copy-right">
          <p>Copyrights © 2023 Ample Points. All Rights Reserved. POWERED BY : amplePoints</p>
        </div>
      </form>
    </div>

@include('includes.script')
<script src="https://cdn.jsdelivr.net/jquery.validation/1.16.0/jquery.validate.min.js"></script>
<script>
$(document).ready(function() {
    $("#frm").validate({
        rules: {
            email: {
                required: true,
                email: true
            },
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
