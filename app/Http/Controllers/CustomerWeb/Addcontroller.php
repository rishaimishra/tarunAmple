<?php

namespace App\Http\Controllers\CustomerWeb;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Hash;
use Mail;
use Auth;
use App\Mail\EmpRegisterMail;
use App\Models\HomeBrandSliderModel;
use App\Models\AdminModel;
use App\Models\VendorModel;
use App\Models\AddModel;
use DB;

class Addcontroller extends Controller
{
    


    public function all_videos(Request $request){

      if(@Auth::user()->user_id){
	       $admin_model_obj =  new \App\Models\AdminImpFunctionModel;

	       $amplesresult = $admin_model_obj->all_amples_data();
	       $data['amplesdatas']=$amplesresult;

	       $data['record']=User::where('user_id',Auth::user()->user_id)->first();
	       $data['usrmakey']=@Auth::user()->user_id;
	       // dd($data);

	        $userCountryCodeData = $admin_model_obj->GetUserRemoteCountryFromIP($request);
			$originalData = $userCountryCodeData->getData();
			$countryCode = $originalData->country_code;

            $data['currentRemoteCountryCode'] = $countryCode;

		    $data['maincatdata']= DB::table('main_category')->where('id', '!=', 1)
		        ->where('status', 1)
		        ->orderBy('id')
		        ->get();

		    $data['gamevedioscat']=DB::table('game_category')->get();

		    $data['allvideosData']=$admin_model_obj->getGameVideoData(0, 20);

           // dd($data);

	       return view('member.videos.all_videos')->with($data);

      }else{
      	dd("please login");

      }
    
    }










    public function loadmoreearnvideos(Request $request){
    	 $user_id = Auth::user()->user_id;
        $adminModelObj =  new \App\Models\AdminImpFunctionModel;

        if ($request->isMethod('post')) {
            $row = $request->input('row');
            $gameVideos = $adminModelObj->getGameVideoData($row, 20);
            // return response()->json(['allvideosData' => $gameVideos]);
        }

        return view('member.videos.loadmorevideos', [
            'usrmakey' => $user_id,
            'myno' => $user_id,
            'myadminmodelobj' => $adminModelObj,
            'allvideosData' => $gameVideos
        ]);
    }
    









    public function loadmorearncatevideos(Request $request){
    	$user_id = Auth::user()->user_id;
    $usrmakey = $user_id;
    $myno = $user_id;
    
    $admin_model_obj = new \App\Models\AdminImpFunctionModel;
    $myadminmodelobj = $admin_model_obj;

    if ($request->isMethod('post')) {
        $row = $request->input('row');
        $cateId = $request->input('catid');

        $gamevedios = $admin_model_obj->getGameVideoDataByCat($row, 20, $cateId);
        
        return view('member.videos.loadmorearncatevideos', [
            'usrmakey' => $usrmakey,
            'myno' => $myno,
            'myadminmodelobj' => $myadminmodelobj,
            'allvideosData' => $gamevedios,
        ]);
    }
    }















    
}
