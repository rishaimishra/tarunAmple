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



public function adminDashboard(){
  $admin = Auth::guard('admin')->user();
    // dd($admin);
   return view('admin.dashboard.dashboard');
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

        // dd('successful admin Login',$adminDataEmail);
       
       // Authenticate the admin using the 'admin' guard
        Auth::guard('admin')->login($adminDataEmail);

        // Access the authenticated admin user
        $admin = Auth::guard('admin')->user();

        return redirect()->route('admin.dashboard');
    }else{
         return back()->with("error","Admin Credential is wrong.");
    }
}





 public function logout(Request $request) {
  if(@Auth::user()->user_type=="User"){
      Auth::logout();
      return redirect()->route('index.page');
   }else{
      Auth::logout();
      return redirect()->route('admin.login.page');
   }
 }







}
