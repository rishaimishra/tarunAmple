<?php

namespace App\Http\Controllers\AdminWeb;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Auth;
use App\Models\BannerModel;


class AdminBannerController extends Controller
{
    public function admin_banner_list(){
     return view('admin.banner.banner_list');
    }



    public function admin_banner_add_page(){
         return view('admin.banner.banner_create');
    }




    public function admin_banner_add_post(Request $request){
        dd($request->all());
    }
}
