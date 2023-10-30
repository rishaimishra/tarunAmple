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






/*
Admin login post
Jeet
utype=2 vendor. 
utype=1 admin


 ustatus=0 deleted 
 ustatus=1 active 
 ustatus=2 deactive 
*/
 public function adminLoginPost(Request $request){
    // dd($request->all());
    $username = $request->email;
    $password = $request->password;

    $adminDataEmail=AdminModel::where('uemail',$username)->where('utype',1)->where('ustatus', '!=', 0)->first();

    if ($adminDataEmail) {
       if (!\Hash::check($request->password, $adminDataEmail->upwd)) {
            return redirect()->back()->with('error','Incorrect Password');
        }

        dd('successful admin Login',$adminDataEmail);
        // Auth::login($adminDataEmail);
         // return redirect()->route('cust.dashboard');
    }else{
         return back()->with("error","Admin Credential is wrong.");
    }
}







}
