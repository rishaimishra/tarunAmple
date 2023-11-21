<?php

namespace App\Http\Controllers\AdminWeb;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Auth;
use App\Models\BannerModel;
use App\Models\CategoryModel;
use App\Models\SubCategoryModel;
use App\Models\Sub2CategoryModel;
use App\Models\ProductModel;
use App\Models\AdminModel;
use DB;


class ProductController extends Controller
{
    public function product_add_page(){
        // dd(Auth::guard('admin')->user());
         $query = AdminModel::leftJoin('tbl_vendor', 'tbl_vendor.tbl_admin_uid', '=', 'tbl_admin.u_id')
        ->leftJoin('tbl_vendor_images', 'tbl_vendor_images.tbl_vndr_uid', '=', 'tbl_vendor.tbl_vndr_id')
        ->where('tbl_admin.ustatus', '!=', 0)
        ->where('tbl_admin.utype', '=', 2)
        ->where('tbl_admin.isdeleted', '=', 0)
        ->where('tbl_vendor.tbl_vndr_brand_status', '=', 0)
        ->where('tbl_vendor.tbl_vndr_store_status', '=', 1)
        ->orderBy('tbl_vendor.tbl_vndr_id');

        $result = $query->get();
    
        $data['vendor_data']= $result;
        // dd($data['vendor_data']);
       return view('admin.product.product_main_add')->with($data);
    }



    public function getStates($country_id)
    {
        $data['states'] = DB::table('tbl_states')->where('country_id', $country_id)->get();
        return view('admin.product.state')->with($data);
        // return response()->json($states);
    }

    public function getCity($state_id)
    {
        $data['cities'] = DB::table('tbl_cities')->where('state_id', $state_id)->get();
        // dd($data);
        return view('admin.product.city')->with($data);
        // return response()->json($cities);
    }
}
