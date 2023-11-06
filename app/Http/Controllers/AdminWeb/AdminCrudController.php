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











/*
  admin list page
  Jeet
  here admin roll is utype
  admin id is u_id
*/

    public function admin_list_page(){
        $userLID= Auth::guard('admin')->user()->u_id;
        // dd($userLID);

    $result = AdminModel::select([
            'tbl_admin.*',
            'tbl_vendor.tbl_vndr_store_status as store_status',
            'tbl_vendor.allow_booking as allow_booking'
        ])
        ->leftJoin('tbl_vendor', 'tbl_vendor.tbl_admin_uid', '=', 'tbl_admin.u_id')
        ->leftJoin('tbl_vendor_images', 'tbl_vendor_images.tbl_vndr_uid', '=', 'tbl_vendor.tbl_vndr_id')
        ->leftJoin('tbl_charity_stores', 'tbl_charity_stores.tbl_admin_uid', '=', 'tbl_admin.u_id')
        ->where('tbl_admin.u_id', $userLID)
        ->where('tbl_admin.ustatus', 1)
        ->where('tbl_admin.isdeleted', 0)
        ->get();
        $data['result']= $result;

    // return $result;

       if ($result->count() > 0 && $result[0]['u_id'] != 1) {
          return redirect()->route('admin.dashboard');
       }

        $admintype = @Auth::guard('admin')->user()->utype;
        $store_status = $result[0]['store_status'];

        if ($admintype == 1) {
            view()->share('store_status', 1);
        } else {
            view()->share('store_status', $store_status);
        }

        $data['adminlistdata']= AdminModel::where(function ($query) {
                            $query->where('utype', 1)
                                  ->orWhere('utype', 4)
                                  ->orWhere('utype', 5)
                                  ->orWhere('utype', 9);
                            })
                            ->where('ustatus', '!=', 0)
                            ->where('isdeleted', 0)->orderBy('u_id','desc')
                            ->get();
    
      return view('admin.adminCrud.list')->with($data);

    }

        



   
}
