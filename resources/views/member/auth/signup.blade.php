@extends('Layouts.app')

@section('meta')
{{-- all meta tags --}}
@endsection

@section('title')
<title>Amplepoints | Member Registration</title>
@endsection

@include('includes.head')
@include('includes.header')


@section('content')
    <div class="user-login-sec">
         @include('includes.message')
        <h4 class="modal-heading">Member Sign Up</h4>
        <div class="sign-up" id="memberSignUpContent">
             <form id="frm" method="post" action="{{route('member.register.post')}}">
                @csrf
                <div class="row">
                    <div class="col-md-6 col-12 mb-3">
                        <label for="fname" class="form-label">First Name</label>
                        <input type="text" name="first_name" class="form-control" id="fname">
                    </div>
                    <div class="col-md-6 col-12 mb-3">
                        <label for="lname" class="form-label">Last Name</label>
                        <input type="text"  name="last_name" class="form-control" id="lname">
                    </div>
            
                    <div class="col-md-6 col-12 mb-3">
                        <label for="exampleInputEmail1" class="form-label">Email address</label>
                        <input type="email" name="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                    </div>
                    <div class="col-md-6 col-12 mb-3">
                        <label for="mobile" class="form-label">Mobile</label>
                        <input type="number" name="mobile_no" class="form-control" id="mobile">
                    </div>
                    <div class="col-md-6 col-12 mb-3">
                        <label for="exampleInputPassword1" class="form-label">Password</label>
                        <input type="password" name="password" class="form-control" id="password">
                    </div>
                    <div class="col-md-6 col-12 mb-3">
                        <label for="cpassword" class="form-label">Confirm Password</label>
                        <input type="password" name="cpassword" class="form-control" id="cpassword">
                    </div>
                    <div class="col-md-6 col-12 mb-3">
                        <label for="rno" class="form-label">Referral No</label>
                        <input type="text" name="referral_no" class="form-control" id="rno">
                    </div>
                    <div class="col-md-6 col-12 mb-3">
                        <label for="rno" class="form-label">Store Referral No</label>
                        <input type="text" name="store_referral_no" class="form-control" id="store_referral_no">
                    </div>
                    <div class="col-md-12 mb-3 form-check">
                        <input type="checkbox" class="form-check-input" id="exampleCheck1">
                        <label class="form-check-label" for="exampleCheck1">
                            By creating an account, you agree to Amplepoints.com's <a href="#">electronic vendor
                                agreement</a>
                            And <a href="#">vendor terms and conditions</a>.
                        </label>
                    </div>
                </div>
                <button type="submit" class="btn checkout mt-3">Sign Up</button>
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
            first_name: "required",
            last_name: "required",
            email: {
                required: true,
                email: true
            },
            mobile_no: {
                required: true,
                digits: true,
                minlength: 10,
                maxlength: 10,
            },
            password: {
                required: true,
                minlength: 6
            },
            cpassword: {
                required: true,
                equalTo: "#password" // Ensure 'cpassword' matches 'password'
            }
        },
        messages: {
            first_name: "Please enter your first name",
            last_name: "Please enter your last name",
            email: {
                required: "Please enter your email",
                email: "Please enter a valid email address"
            },
            mobile_no: {
                required: "Please enter your mobile number",
                digits: "Please enter digits only",
                minlength: "Mobile number must be 10 digits",
                maxlength: "Mobile number must be 10 digits"
            },
            password: {
                required: "Please enter a password",
                minlength: "Password must be at least 6 characters"
            },
            cpassword: {
                required: "Please confirm your password",
                equalTo: "Passwords do not match"
            },
            referral_no: "Please enter a referral number",
            store_referral_no: "Please enter a store referral number"
        }
    });
});
</script>
@endsection
