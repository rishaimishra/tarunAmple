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

class AdminCrudController extends Controller
{
    

/*
  Admin add Page
  Jeet
*/
    public function admin_add_page(){
        return view('admin.adminCrud.create');
    }



/*
  api ket gen fun
  Jeet
*/
    public function userUniqueNo($len = 5)
    {

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
  admin add post
  Jeet
*/
    public function different_type_admin_add(Request $request){
        // dd($request->all());
        $admin_email = $request->input('admin_email');
        $adminCheckEmail = AdminModel::where('uemail', $admin_email)->first();

        if (!$adminCheckEmail) {
            $admin = new AdminModel();
            $adminfname = $request->input('admin_fname');
            $adminlname = $request->input('admin_lname');
            $adminpwd = $request->input('admin_pwd');
            $adminjtitle = $request->input('job_title');
            $user_type = $request->input('user_type');

            if (!empty($adminfname)) {
                $admin->u_fname = $adminfname;
            }

            if (!empty($adminlname)) {
                $admin->u_lname = $adminlname;
            }

            if (!empty($adminfname) || !empty($adminlname)) {
                $admin->ufullname = $adminfname . ' ' . $adminlname;
            }

            if (!empty($admin_email)) {
                $admin->uemail = $admin_email;
            }

            if (!empty($adminpwd)) {
                $admin->upwd = Hash::make($adminpwd);
            }

            if (!empty($adminjtitle)) {
                $admin->u_title = $adminjtitle;
            }

            if (!empty($user_type)) {
                $admin->utype = $user_type;

                if ($user_type == 5) {
                    $Api_key = $this->userUniqueNo(10);
                    $admin->api_key = $Api_key;
                    $admin->website = $request->input('website');
                }
            } else {
                $admin->utype = 1;
            }

            $admin->ustatus = 1;
            $admin->isdeleted = 0;
            $admin->created = date('Y-m-d H:i:s'); 

            $file = $request->file('filemain');
            if (!empty($file)) {
                $filename = time() . '_' . $file->getClientOriginalName();
                $file->move("storage/app/public/admin_images", $filename);
                $admin->u_img = $filename;
            }

            $admin->save(); // Save the record to the database
            dd("You have successfully added a new admin account");
            // session()->flash('success', 'You have successfully added a new admin account!');
            // return redirect()->route('admin.list'); // Redirect to the admin list page
        } else {
             dd("User with entered email already exists");
            // session()->flash('error', 'User with entered email already exists!');
            // return redirect()->route('admin.list'); // Redirect to the admin list page
        }
    }

        



   
}
