<?php

namespace App\Http\Controllers\VendorWeb;

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

class VendorAuthController extends Controller
{
    


/*
 Vendor Login Page
 Jeet
*/
    public function vendorLogin(){
     return view('vendor.auth.login');
    }


 public function passwordHashVendor(){
         AdminModel::orderBy('u_id','desc')
            ->chunk(200, function ($users) {
                foreach ($users as $user) {
                    $user->upwd = Hash::make($user->upwd);
                    $user->save();
                }
            });
        return 'Passwords encrypted successfully for vendor.';
    }





/*
 Vendor Login Post
 Jeet
 utype=2 vendor. 
 utype=1 admin

 ustatus=0 deleted 
 ustatus=1 active 
 ustatus=2 deactive 
*/
    public function vendorLoginPost(Request $request){

        $vendorDataEmail=AdminModel::where('uemail',$request->email)->where('utype',2)->where('ustatus','!=',2)->with('vendorDetails')->first();
            if ($vendorDataEmail) {
               if (!\Hash::check($request->password, $vendorDataEmail->upwd)) {
                    return redirect()->back()->with('error','Incorrect Password');
                }

                dd('successful vendor Login',$vendorDataEmail);
                // Auth::login($vendorDataEmail);
                 // return redirect()->route('cust.dashboard');
            }else{
                 return back()->with("error","Vendor Credential is wrong.");
            }
    }








/*
 Vendor Registration Page
 Jeet
*/
    public function vendorSignup(){
       return view('vendor.auth.signup');
    }



/*
A common function 
Jeet
*/
public function userUniqueNo($len = 5){

        $length = $len;

        $charactersSTR = 'AMPLEPOINTSabcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $charactersLength = strlen($charactersSTR);
        $randomString = '';
        for ($i = 0; $i < $length; $i++) {
            $randomString .= $charactersSTR[rand(0, $charactersLength - 1)];
        }
        $randomString .= uniqid();

        $getstring = substr(str_shuffle($randomString), 0, $length);

        return strtoupper($getstring);

    }








/*
 Vendor Registration Page
 Jeet
*/
    public function vendorRegister(Request $request){
        // dd($request->all());

          $request->validate([
            'first_name' => 'required',
            'last_name' => 'required',
            'email' => 'required',
            'password' => 'required',
        ]);
    
            $email = $request->email;
            $password = $request->password;
           
            //chk that email exist or not. 
            //vendor reg linked with admin and vendor table both.

           $result = AdminModel::where('uemail', $email)->count();
                if ($result > 0 ) {
                   return back()->with("error","This Email already exists");
                }


            $first_name = $request->first_name;
            $last_name = $request->last_name;
            $disp_name = $request->display_name;
            $vfollow = @$request->referral_no;
            $fulname = $first_name . ' ' . $last_name;
            $utype = 2;
            $ustatus = 1;
            $ucreated = date('Y-m-d H:i:s');

            $reffral_id = '';

            if (isset($vfollow) && !empty($vfollow)) {

                $vfollow = trim($vfollow);
                $Custdata = User::where('referral_no', $vfollow)->where('status', '!=', '0')->get();

                if (!empty($Custdata)) {
                    $reffral_id = $Custdata[0]['user_id'];
                } else {
                    $reffral_id = '';
                }
            }

        

           // =========== 1st it insert to admin table ================//*******
            $insertVendorToAdminTable = [
                'ufullname' => @$fulname,
                'uemail' => @$email,
                'upwd' =>Hash::make($password),
                'follower_keyword' => @$vfollow,
                'utype' => @$utype,
                'ustatus' => @$ustatus,
                'created' => @$ucreated,
                'isdeleted' => 0,
                'reset'=>0,
            ];

            $admin = new AdminModel($insertVendorToAdminTable);
            $admin->save();

            $lastvadminId = $admin->u_id;
            $reffralNo = $this->userUniqueNo(6);
 
           //=================  ************ 2nd insert part in to vendor table ===========********//
            $insertData = [
                'tbl_admin_uid' => $lastvadminId,
                'tbl_vndr_dispname' => $disp_name,
                'tbl_vndr_fname' => $first_name,
                'tbl_vndr_lname' => $last_name,
                'tbl_vndr_mail' => $email,
                'vendor_ref_code' => $reffralNo,
                'ref_user_id' => $reffral_id,
                'vendor_register_date' => date('Y-m-d'), 
            ];

            $vendor = new VendorModel($insertData);
            $vendor->save();

            $lastvendorId = $vendor->tbl_vndr_id;

            //==========*** 3nd insert data to vandor image table ===================**************//
             $vendorImageInsert=new VendorImageModel;
             $vendorImageInsert->tbl_vndr_uid=$lastvendorId;
             $vendorImageInsert->save();

            // email send
            $mailData = [
                        'title' => 'Mail from Amplepoint',
                        'body' => 'Vendor Registration.',
                        'first_name' =>$first_name,
                        'email' =>$email
                    ];

            Mail::to($request->email)->send(new VendorRegMail($mailData));
                     

           // dd('Vendor Registration Done');
             return redirect()->route('index.page')->with('success', 'Vendor Registration Done Successfully.');


            

        
    }


}
