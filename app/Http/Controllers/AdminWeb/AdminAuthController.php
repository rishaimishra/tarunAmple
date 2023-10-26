<?php

namespace App\Http\Controllers\AdminWeb;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\AdminModel;
use App\Models\VendorModel;
use App\Models\VendorImageModel;
use Hash;
use Mail;
use Auth;
use App\Mail\VendorRegMail;

class AdminAuthController extends Controller
{
    
/*
Admin login page
Jeet
*/
 
 public function adminLogin(){
    return view('admin.auth.login');
 }






}
