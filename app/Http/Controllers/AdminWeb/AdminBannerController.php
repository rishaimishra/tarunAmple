<?php

namespace App\Http\Controllers\AdminWeb;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Auth;
use App\Models\BannerModel;
use App\Models\BannerShowStatus;
use Illuminate\Support\Facades\File;


class AdminBannerController extends Controller
{


/*
banner list page
Jeet
*/   
    public function admin_banner_list(){
        $data['banners']=BannerModel::where('banner_status','!=',0)->where('type','image')->orderBy('id','desc')->get();
          $data['video']=BannerModel::where('banner_status','!=',0)->where('type','video')->orderBy('id','desc')->first();
          $data['banner_show_status']=BannerShowStatus::first();
        return view('admin.banner.banner_list')->with($data);
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






/*
banner image active 
Jeet
*/
public function admin_banner_show_status(){
  $updt=BannerShowStatus::where('id',1)->update(['video'=>'N', 'image'=>'Y']);
  return back()->with('success','Banner now set to image');
}




/*
banner video active
Jeet
*/
public function admin_video_show_status(){
  $updt=BannerShowStatus::where('id',1)->update(['video'=>'Y', 'image'=>'N']);
  return back()->with('success','Banner now set to video');
}





/*
banner edit page
Jeet
*/
public function admin_banner_edit_page($id){
     $chk=BannerModel::where('id',$id)->where('banner_status',1)->where('banner_isdeleted',0)->first();
        if(!$chk){
            return back()->with('error','id not found.');
        }
        $data['banner']=$chk;
        return view('admin.banner.banner_edit')->with($data);
}





/*
banner update
Jeet
*/
public function admin_banner_update(Request $request){
      $customMessages = [
        'banner_title.required' => 'The banner title field is required.',
        'tag_line.required' => 'The tag line field is required.',
        'image.image' => 'Each uploaded file must be an image (jpg, jpeg, png, or gif).',
        'image.mimes' => 'Each image must be in one of the following formats: jpg, jpeg, png, or gif.',
        'image.max' => 'Each image must not exceed 5MB in size.',
    ];
        
        

    $request->validate([
        'banner_title' => 'required',
        'tag_line' => 'required',
        'image' => 'image|mimes:jpg,jpeg,png,gif|max:5242880',
    ], $customMessages);

    $banner = BannerModel::find($request->id);

    if (!$banner) {
        return redirect()->back()->with('error', 'Banner not found');
    }

    $oldImage = $banner->banner_image;
    $upd=[];

    // Check if a new image is uploaded
    if ($request->hasFile('image')) {
        // Upload the new image
        $newImage = $request->file('image');
        $filename = time() . '_' . $newImage->getClientOriginalName();
        $newImage->move(storage_path('app/public/banner_image'), $filename);
        
       $upd['banner_image'] = $filename;

       // Unlink the old image
           if (isset($oldImage)) {
                $oldImagePath = storage_path('app/public/banner_image') . '/' . $oldImage;
                
                if (file_exists($oldImagePath)) {
                    unlink($oldImagePath);
                }
            }

    }

   $upd['banner_title'] = $request->banner_title;
   $upd['tag_line'] = $request->tag_line;
   $updt=BannerModel::where('id',$request->id)->update($upd);


    return redirect()->back()->with('success', 'Banner updated successfully');
}






/*
banner delete
Jeet
*/
public function admin_banner_delete($id){
     $chk=BannerModel::where('id',$id)->where('banner_status',1)->where('banner_isdeleted',0)->first();
        if(!$chk){
            return back()->with('error','id not found.');
        }
        $upd['banner_status']=0;
        $upd['banner_isdeleted']=1;

         $updt=BannerModel::where('id',$id)->update($upd);
         return redirect()->back()->with('success', 'Banner image deleted successfully');
}





}
