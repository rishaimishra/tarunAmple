<?php

namespace App\Http\Controllers\AdminWeb;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\HomeBrandSliderModel;
use App\Models\AdminModel;
use App\Models\VendorModel;

class BrandController extends Controller
{
    

    public function index(){
        // $countryCode = $this->getUserRemoteData();
        $query = AdminModel::select(
            'tbl_admin.ufullname as vendor_name',
            'tbl_admin.uemail as vendor_email',
            'tbl_admin.ustatus as vendor_status',
            'tbl_vendor.tbl_vndr_id  as vendor_id',
            'tbl_vendor.tbl_vndr_phone as vendor_phone',
            'tbl_vendor.tbl_vndr_adr as vendor_address',
            'tbl_vendor.tbl_vndr_city as vendor_city',
            'tbl_vendor.tbl_vndr_state as vendor_state',
            'tbl_vendor.tbl_vndr_country as vendor_country',
            'tbl_vendor.tbl_vndr_comp as vendor_company',
            'tbl_vendor.tbl_vndr_dispname as vendor_displayname',
            'tbl_vendor_images.tbl_vndr_img_pro as vendor_profileimage'
        )
        ->leftJoin('tbl_vendor', 'tbl_vendor.tbl_admin_uid', '=', 'tbl_admin.u_id')
        ->leftJoin('tbl_vendor_images', 'tbl_vendor_images.tbl_vndr_uid', '=', 'tbl_vendor.tbl_vndr_id')
        ->where('tbl_admin.ustatus', '!=', 0)
        ->where('tbl_admin.utype', '=', 2)
        ->where('tbl_admin.isdeleted', '=', 0)
        ->where('tbl_vendor.tbl_vndr_brand_status', '=', 0)
        ->where('tbl_vendor.tbl_vndr_store_status', '=', 1);

        // if (!empty($countryCode) && $countryCode['is_enable'] == 1) {
        //     $codeCountry = $countryCode['country_code'];
        //     $query->where('tbl_vendor.vendor_country', '=', $codeCountry);
        // }

        $query->orderBy('tbl_vendor.tbl_vndr_id');

        $result = $query->get();
    
        $data['brands']= $result;
        $data['sliders']=HomeBrandSliderModel::where('status',1)->with('vendorDetails.adminDetails')->orderBy('id','desc')->get();
        // return $data['sliders'];
        return view('admin.brandSlider.list')->with($data);
    }





    public function addBrandSlider(Request $request){
        // dd($request->all());
         $request->validate([
            'brand_id' => 'required',
            'slider_no' => 'required',
        ]);

        $chk=HomeBrandSliderModel::where('vendor_id',$request->brand_id)->first();
        if($chk){
             return back()->with('error','slider for this brand already exist');
        }

        $ins=new HomeBrandSliderModel;
        $ins->vendor_id=$request->brand_id;
        $ins->slider_no=$request->slider_no;
        $ins->save();
        return back()->with('success','slider added for home page');

    }




    public function updateBrandSlider(Request $request){
        $request->validate([
            'id' => 'required',
            'brand_id' => 'required',
            'slider_no' => 'required',
        ]);

        //chk
        $chk=HomeBrandSliderModel::where('id','!=',$request->id)->where('vendor_id',$request->brand_id)->first();
        if($chk){
             return back()->with('error','slider for this brand already exist');
        }

        $upd=[];
        $upd['vendor_id']=$request->brand_id;
        $upd['slider_no']=$request->slider_no;
        $update=HomeBrandSliderModel::where('id',$request->id)->update($upd);
         return back()->with('success','slider updated for home page');

    }






    public function deleteBrandSlider($id){
        $chk=HomeBrandSliderModel::where('id',$id)->first();
        if(!$chk){
             return back()->with('error','id not found');
        }
        $update=HomeBrandSliderModel::where('id',$id)->delete();
        return back()->with('success','slider deleted for home page');

    }












}
