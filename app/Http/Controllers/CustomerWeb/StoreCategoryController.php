<?php

namespace App\Http\Controllers\CustomerWeb;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Auth;

class StoreCategoryController extends Controller
{
    

/*
  store Page
  Jeet
*/
    public function StorePage(Request $request){
        if (@Auth::user()->user_id) {
            $user_id=@Auth::user()->user_id;
            $cartdetail['user_id'] = $user_id;
        } else {
            $cartdetail['username'] = session('REMOTE_ADDR');
        }

      $admin_model_obj =  new \App\Models\AdminImpFunctionModel;
      $totaldata = $admin_model_obj->cart_total_amount($cartdetail);
      $totalcartdata = $admin_model_obj->select_cart_numericdata($cartdetail);

      $wishlistshow = $admin_model_obj->wishlist_cart($cartdetail);
      $wishlisttotaldata = count($wishlistshow);

        $data['cartdata'] = $totaldata;
        $data['totalcartdata'] = $totalcartdata;
        $data['wishlistcartdata'] = $wishlisttotaldata;
        $data['wishcartdata'] = $wishlistshow;

        $resultdatapro = $admin_model_obj->gethomcatdata();
        $data['retdata'] = $resultdatapro;
        $resultdataspro = $admin_model_obj->gethomsubcatdata();
        $data['retsdata'] = $resultdataspro;

        $letter = @$request->input('filt');

        if (!empty($letter)) {
            // dd(1);
            $allvendorslistbyname = $admin_model_obj->FilterFrontVendorDataNew($letter);
            $data['allvendorslist'] = $allvendorslistbyname;
        } else {
            $allvendorslist = $admin_model_obj->getfrontvendorlistdata();
            $data['allvendorslist'] = $allvendorslist;
        }
        // dd($data);


        return view('member.storeAndCategory.store')->with($data);
    }











/*
  category Page
  Jeet
*/
    public function CategoryPage(){
         return view('member.storeAndCategory.category');
    }








    public function categorybymall($id){
     dd($id);
    }





    public function productbyseller($vendorName1,$tbl_vndr_id){
        dd($vendorName1,$tbl_vndr_id);
        
    }














}
