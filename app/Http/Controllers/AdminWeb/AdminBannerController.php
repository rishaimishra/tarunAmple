<?php

namespace App\Http\Controllers\AdminWeb;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Auth;
use App\Models\BannerModel;


class AdminBannerController extends Controller
{


/*
banner list page
Jeet
*/   
    public function admin_banner_list(){
     return view('admin.banner.banner_list');
    }





/*
banner add page
Jeet
*/
    public function admin_banner_add_page(){
         return view('admin.banner.banner_create');
    }




// public function admin_banner_add_post(Request $request){
//     // dd($request->all());
//     // Validate the incoming request data

//     $request->validate([
//         'banner_title' => 'required',
//         'tag_line' => 'required',
//     ]);

//     $pdata = [];
//     $allImages = $request->file('images');
//     // dd($allImages);

//     if(count($allImages) > 0){

//         if(count($allImages) > 6){
//             return back()->with('error','Maximum 6 images allowed');
//         }else{
            
//             foreach($allImages as $val){
//                 $filename = time() . '_' . $val->getClientOriginalName();
//                 $val->move("storage/app/public/banner_image", $filename);
                

//                 $imgInst= new BannerModel;
//                 $imgInst->banner_title=$request->banner_title;
//                 $imgInst->tag_line=$request->tag_line;
//                 $imgInst->banner_image=$filename;
//                 $imgInst->banner_status=1; //active
//                 $imgInst->banner_isdeleted=0; //not deleted
//                 $imgInst->create_date=date('Y-m-d H:i:s');
//                 $imgInst->type="image";
//                 $imgInst->showstatus=0;
//                 $imgInst->deletevid=0;
//                 $imgInst->banner_order=null;
//                 $imgInst->save();
//             }
//         }
//     }

//     $video = $request->file('video');
//     //check that a video is active or not

//     if ($video) {
//        $filenameVideo = time() . '_' . $video->getClientOriginalName();
//        $video->move(storage_path('app/public/banner_video'), $filenameVideo); 


//         $imgInst= new BannerModel;
//         $imgInst->banner_title=$request->banner_title;
//         $imgInst->tag_line=$request->tag_line;
//         $imgInst->banner_image=$filenameVideo;
//         $imgInst->banner_status=1; //active
//         $imgInst->banner_isdeleted=0; //not deleted
//         $imgInst->create_date=date('Y-m-d H:i:s');
//         $imgInst->type="video";
//         $imgInst->showstatus=0;
//         $imgInst->deletevid=0;
//         $imgInst->banner_order=null;
//         $imgInst->save();
//     }

//     return redirect()->back()->with('success','Banner uploaded');
// }








/*
banner add post 
Jeet
*/
public function admin_banner_add_post(Request $request)
{
    // Validate the incoming request data
   $customMessages = [
        'banner_title.required' => 'The banner title field is required.',
        'tag_line.required' => 'The tag line field is required.',
        'images.*.image' => 'Each uploaded file must be an image (jpg, jpeg, png, or gif).',
        'images.*.mimes' => 'Each image must be in one of the following formats: jpg, jpeg, png, or gif.',
        'images.*.max' => 'Each image must not exceed 5MB in size.',
        'images.max' => 'You can upload a maximum of 6 images.',
        'video.file' => 'The uploaded file must be a video.',
        'video.mimes' => 'The video must be in one of the following formats: mp4, avi, or mov.',
    ];

    $request->validate([
        'banner_title' => 'required',
        'tag_line' => 'required',
        'images.*' => 'image|mimes:jpg,jpeg,png,gif|max:5242880',
        'images' => 'max:6',
        'video' => 'file|mimes:mp4,avi,mov',
    ], $customMessages);
    if ($request->hasFile('images')) {
        $images = $request->file('images');
        
        foreach ($images as $image) {
            $filename = time() . '_' . $image->getClientOriginalName();
            $image->move(storage_path('app/public/banner_image'), $filename);
            
            $imgInst = new BannerModel;
            $imgInst->banner_title = $request->banner_title;
            $imgInst->tag_line = $request->tag_line;
            $imgInst->banner_image = $filename;
            $imgInst->banner_status = 1; // Active
            $imgInst->banner_isdeleted = 0; // Not deleted
            $imgInst->create_date = now();
            $imgInst->type = 'image';
            $imgInst->showstatus = 0;
            $imgInst->deletevid = 0;
            $imgInst->banner_order = null;
            $imgInst->save();
        }
    }

    if ($request->hasFile('video')) {
        //check that a active video present
        $chk=BannerModel::where('type','video')->where('banner_status',1)->where('banner_isdeleted',0)->first();
        if($chk){
            return back()->with('error','Already videa is there.To upload video, first delete the video from banner list page.');
        }

        $video = $request->file('video');
        $filenameVideo = time() . '_' . $video->getClientOriginalName();
        $video->move(storage_path('app/public/banner_video'), $filenameVideo);
        
        $imgInst = new BannerModel;
        $imgInst->banner_title = $request->banner_title;
        $imgInst->tag_line = $request->tag_line;
        $imgInst->banner_image = $filenameVideo;
        $imgInst->banner_status = 1; // Active
        $imgInst->banner_isdeleted = 0; // Not deleted
        $imgInst->create_date = now();
        $imgInst->type = 'video';
        $imgInst->showstatus = 0;
        $imgInst->deletevid = 0;
        $imgInst->banner_order = null;
        $imgInst->save();
    }

    return redirect()->back()->with('success', 'Banner uploaded');
}








}
