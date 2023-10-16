@extends('Layouts.app')
@section('title')
<title>Amplepoints | Vendor Registration</title>
@endsection

@include('includes.head')
@include('includes.header')


@section('content')

    <div class="user-login-sec">
        <h4 class="modal-heading">Vendor Sign Up</h4>
        <div class="sign-up" id="memberSignUpContent">
            <form>
                <div class="row">
                    <div class="col-md-6 col-12 mb-3">
                        <label for="fname" class="form-label">First Name</label>
                        <input type="text" class="form-control" id="fname">
                    </div>
                    <div class="col-md-6 col-12 mb-3">
                        <label for="lname" class="form-label">Last Name</label>
                        <input type="text" class="form-control" id="lname">
                    </div>
                    <div class="col-md-6 col-12 mb-3">
                        <label for="dname" class="form-label">Display Name</label>
                        <input type="text" class="form-control" id="dname">
                    </div>
                    <div class="col-md-6 col-12 mb-3">
                        <label for="exampleInputEmail1" class="form-label">Email address</label>
                        <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                    </div>
                    <div class="col-md-6 col-12 mb-3">
                        <label for="exampleInputPassword1" class="form-label">Password</label>
                        <input type="password" class="form-control" id="exampleInputPassword1">
                    </div>
                    <div class="col-md-6 col-12 mb-3">
                        <label for="cpassword" class="form-label">Confirm Password</label>
                        <input type="password" class="form-control" id="cpassword">
                    </div>
                    <div class="col-md-12 mb-3">
                        <label for="rno" class="form-label">Referral No</label>
                        <input type="text" class="form-control" id="rno">
                    </div>
                    <div class="col-md-12 mb-3 form-check">
                        <input type="checkbox" class="form-check-input" id="exampleCheck1">
                        <label class="form-check-label" for="exampleCheck1">
                            By creating an account, you agree to Amplepoints.com's <a href="#">electronic vendor
                                agreement</a>
                            And <a href="">vendor terms and conditions.</a>
                        </label>
                    </div>
                </div>
                <button type="submit" class="btn checkout mt-3">Sign Up</button>
            </form>
        </div>
    </div>
@include('includes.footer')
@include('includes.script')
@endsection
