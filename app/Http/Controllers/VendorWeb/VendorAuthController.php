<?php

namespace App\Http\Controllers\VendorWeb;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class VendorAuthController extends Controller
{
    


/*
 Vendor Login Page
*/
    public function vendorLogin(){
     return view('vendor.login');
    }





/*
 Vendor Registration Page
*/
    public function vendorSignup(){
       return view('vendor.signup');
    }


}
