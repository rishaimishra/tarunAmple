<?php

namespace App\Http\Controllers\AdminWeb;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Auth;
use App\Models\BannerModel;
use App\Models\CategoryModel;
use App\Models\SubCategoryModel;
use App\Models\Sub2CategoryModel;


class CategoryController extends Controller
{
    

    public function create()
    {
        return view('admin.category.category_add');
    }





    public function store(Request $request)
    {
        // dd($request->all());
          $request->validate([
            'category_name' => 'required|string|max:255',
            'category_icon' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
            'category_thumbnail' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
            'category_banner1' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
            'category_banner2' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
            'category_banner3' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
            'category_banner4' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
            'category_slug' => 'required|string|max:255',
            // 'page_title' => 'required|string|max:255',
            'meta_title' => 'required|string|max:255',
            'keywords' => 'required|string|max:255',
            'meta_description' => 'required|string|max:255',
          ]);

        if ($request->hasFile('category_icon')) {
            $image = $request->file('category_icon');
            $category_icon = time() . '_' . $image->getClientOriginalName();
            $image->move(storage_path('app/public/category_icon'), $category_icon);
        }


         if ($request->hasFile('category_thumbnail')) {
            $image = $request->file('category_thumbnail');
            $category_thumbnail = time() . '_' . $image->getClientOriginalName();
            $image->move(storage_path('app/public/category_thumbnail'), $category_thumbnail);
        }

        if ($request->hasFile('category_banner1')) {
            $image = $request->file('category_banner1');
            $category_banner1 = time() . '_' . $image->getClientOriginalName();
            $image->move(storage_path('app/public/category_banner_image'), $category_banner1);
        }

         if ($request->hasFile('category_banner2')) {
            $image = $request->file('category_banner2');
            $category_banner2 = time() . '_' . $image->getClientOriginalName();
            $image->move(storage_path('app/public/category_banner_image'), $category_banner2);
        }

        if ($request->hasFile('category_banner3')) {
            $image = $request->file('category_banner3');
            $category_banner3 = time() . '_' . $image->getClientOriginalName();
            $image->move(storage_path('app/public/category_banner_image'), $category_banner3);
        }

         if ($request->hasFile('category_banner4')) {
            $image = $request->file('category_banner4');
            $category_banner4 = time() . '_' . $image->getClientOriginalName();
            $image->move(storage_path('app/public/category_banner_image'), $category_banner4);
        }

            $catdata=new CategoryModel;

            $catdata->category_name = $request->input('category_name');

            $catdata->cat_image = $category_icon;
            $catdata->main_thumbnail = $category_thumbnail;
            $catdata->banner1 = $category_banner1;
            $catdata->banner2 = $category_banner2;
            $catdata->banner3 = $category_banner3;
            $catdata->banner4 = $category_banner4;

            $catdata->created_date = now();
            $catdata->cat_slug = trim($request->input('category_slug'));
            // $catdata->page_title = $request->input('page_title');
            $catdata->meta_title = $request->input('meta_title');
            $catdata->meta_keyword = $request->input('keywords');
            $catdata->meta_description = $request->input('meta_description');
            $catdata->save();

            // Save $catdata to the database or perform other actions as needed
              return redirect()->back()->with('success', 'Category uploaded');

        }
    




    public function index()
    {
       
        $categories = CategoryModel::where('isdeleted', '!=', 1)->orderBy('id')->get();
        return view('admin.category.category_list', ['categories' => $categories]);
    }





    public function edit($id)
    {
        $category = CategoryModel::where('id',$id)->where('isdeleted',0)->first();
        if(!$category){
            return back()->with('error','id not found');
        }
        return view('admin.category.category_edit', ['category' => $category]);
    }






    public function update(Request $request)
    {
        // dd($request->all());
        $find = CategoryModel::where('id',$request->id)->where('isdeleted',0)->first();
        if(!$find){
            return back()->with('error','id not found');
        }

        $request->validate([
            'category_name' => 'required|string|max:255',
            // 'category_icon' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
            // 'category_thumbnail' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
            // 'category_banner1' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
            // 'category_banner2' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
            // 'category_banner3' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
            // 'category_banner4' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
            'category_slug' => 'required|string|max:255',
            // 'page_title' => 'required|string|max:255',
            'meta_title' => 'required|string|max:255',
            'keywords' => 'required|string|max:255',
            'meta_description' => 'required|string|max:255',
          ]);
        $upd=[];

         if ($request->hasFile('category_icon')) {
            $image = $request->file('category_icon');
            $category_icon = time() . '_' . $image->getClientOriginalName();
            $image->move(storage_path('app/public/category_icon'), $category_icon);
            $upd['cat_image']=$category_icon;
        }


         if ($request->hasFile('category_thumbnail')) {
            $image = $request->file('category_thumbnail');
            $category_thumbnail = time() . '_' . $image->getClientOriginalName();
            $image->move(storage_path('app/public/category_thumbnail'), $category_thumbnail);
            $upd['main_thumbnail']=$category_thumbnail;
        }

        if ($request->hasFile('category_banner1')) {
            $image = $request->file('category_banner1');
            $category_banner1 = time() . '_' . $image->getClientOriginalName();
            $image->move(storage_path('app/public/category_banner_image'), $category_banner1);
            $upd['banner1']=$category_banner1;
        }

         if ($request->hasFile('category_banner2')) {
            $image = $request->file('category_banner2');
            $category_banner2 = time() . '_' . $image->getClientOriginalName();
            $image->move(storage_path('app/public/category_banner_image'), $category_banner2);
            $upd['banner2']=$category_banner2;
        }

        if ($request->hasFile('category_banner3')) {
            $image = $request->file('category_banner3');
            $category_banner3 = time() . '_' . $image->getClientOriginalName();
            $image->move(storage_path('app/public/category_banner_image'), $category_banner3);
            $upd['banner3']=$category_banner3;
        }

         if ($request->hasFile('category_banner4')) {
            $image = $request->file('category_banner4');
            $category_banner4 = time() . '_' . $image->getClientOriginalName();
            $image->move(storage_path('app/public/category_banner_image'), $category_banner4);
            $upd['banner4']=$category_banner4;
        }


            $upd['category_name'] = $request->input('category_name');
            $upd['cat_slug'] = trim($request->input('category_slug'));
            $upd['meta_title'] = $request->input('meta_title');
            $upd['meta_keyword'] = $request->input('keywords');
            $upd['meta_description'] = $request->input('meta_description');
            $update=CategoryModel::where('id',$request->id)->update($upd);
          
            return redirect()->back()->with('success', 'Category updated');
    }



   

   public function delete($id){
     $category = CategoryModel::where('id',$id)->where('isdeleted',0)->first();
        if(!$category){
            return back()->with('error','id not found');
        }
        $update=CategoryModel::where('id',$id)->update(['isdeleted'=>1]);
         return redirect()->back()->with('success', 'Category deleted');
   }


   public function active($id){
     $category = CategoryModel::where('id',$id)->where('isdeleted',0)->first();
        if(!$category){
            return back()->with('error','id not found');
        }
        $update=CategoryModel::where('id',$id)->update(['status'=>1]);
         return redirect()->back()->with('success', 'Category activated');
   }


   public function deactive($id){
     $category = CategoryModel::where('id',$id)->where('isdeleted',0)->first();
        if(!$category){
            return back()->with('error','id not found');
        }
        $update=CategoryModel::where('id',$id)->update(['status'=>0]);
         return redirect()->back()->with('success', 'Category deactivted');
   }



























    // =================================== SUB CATEGORY ==============================================//

    
    public function sub_create()
    {
        //  sub_category_edit
        $data['categories'] = CategoryModel::where('id', '!=', 1)->orderBy('id')->get();
        return view('admin.subCategory.sub_category_add')->with($data);
    }



    public function sub_store(Request $request)
    {
        // dd($request->all());
        $request->validate([
            'sub_category_name' => 'required|string|max:255',
            'sub_category_icon' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
            'sub_category_thumbnail' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
            'sub_category_banner1' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
            'sub_category_banner2' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
            'sub_category_banner3' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
            'sub_category_banner4' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
            'sub_category_slug' => 'required|string|max:255',
            'sub_cat_desc' => 'required|string|max:255',
            'category' => 'required',
            'sub_meta_title' => 'required|string|max:255',
            'sub_meta_keywords' => 'required|string|max:255',
            'sub_meta_description' => 'required|string|max:255',
          ]);

        if ($request->hasFile('sub_category_icon')) {
            $image = $request->file('sub_category_icon');
            $sub_category_icon = time() . '_' . $image->getClientOriginalName();
            $image->move(storage_path('app/public/sub_category_icon'), $sub_category_icon);
        }


         if ($request->hasFile('sub_category_thumbnail')) {
            $image = $request->file('sub_category_thumbnail');
            $sub_category_thumbnail = time() . '_' . $image->getClientOriginalName();
            $image->move(storage_path('app/public/sub_category_thumbnail'), $sub_category_thumbnail);
        }

        if ($request->hasFile('sub_category_banner1')) {
            $image = $request->file('sub_category_banner1');
            $sub_category_banner1 = time() . '_' . $image->getClientOriginalName();
            $image->move(storage_path('app/public/sub_category_banner_image'), $sub_category_banner1);
        }

         if ($request->hasFile('sub_category_banner2')) {
            $image = $request->file('sub_category_banner2');
            $sub_category_banner2 = time() . '_' . $image->getClientOriginalName();
            $image->move(storage_path('app/public/sub_category_banner_image'), $sub_category_banner2);
        }

        if ($request->hasFile('sub_category_banner3')) {
            $image = $request->file('sub_category_banner3');
            $sub_category_banner3 = time() . '_' . $image->getClientOriginalName();
            $image->move(storage_path('app/public/sub_category_banner_image'), $sub_category_banner3);
        }

         if ($request->hasFile('sub_category_banner4')) {
            $image = $request->file('sub_category_banner4');
            $sub_category_banner4 = time() . '_' . $image->getClientOriginalName();
            $image->move(storage_path('app/public/sub_category_banner_image'), $sub_category_banner4);
        }

            $catdata=new SubCategoryModel;

            $catdata->subcategory_name = $request->input('sub_category_name');

            $catdata->subcategory_image = $sub_category_icon;
            $catdata->sub_thumbnail = $sub_category_thumbnail;
            $catdata->banner1 = $sub_category_banner1;
            $catdata->banner2 = $sub_category_banner2;
            $catdata->banner3 = $sub_category_banner3;
            $catdata->banner4 = $sub_category_banner4;

            $catdata->created_date = now();
            $catdata->subcategory_slug = trim($request->input('sub_category_slug'));
            $catdata->meta_title = $request->input('sub_meta_title');
            $catdata->meta_keyword = $request->input('sub_meta_keywords');
            $catdata->meta_description = $request->input('sub_meta_description');
            $catdata->maincategory_id  = $request->input('category');
            $catdata->subcategory_description = $request->input('sub_cat_desc');
            $catdata->save();

            // Save $catdata to the database or perform other actions as needed
              return redirect()->back()->with('success', 'Sub Category uploaded');
    }




    public function sub_index()
    {
        $sub_categories = SubCategoryModel::where('isdeleted', '!=', 1)->with('categoryDetails')->orderBy('id')->get();
        return view('admin.subCategory.sub_category_list', ['sub_categories' => $sub_categories]);
    }





    public function sub_edit($id)
    {   $data['categories'] = CategoryModel::where('id', '!=', 1)->orderBy('id')->get();
        $data['subCategory'] = SubCategoryModel::where('id',$id)->where('isdeleted',0)->first();
        if(!$data['subCategory']){
            return back()->with('error','id not found');
        }
        return view('admin.subCategory.sub_category_edit',$data);
    }





    public function sub_update(Request $request)
    {
       // dd($request->all());
        $request->validate([
            'sub_category_name' => 'required|string|max:255',
            // 'sub_category_icon' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
            // 'sub_category_thumbnail' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
            // 'sub_category_banner1' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
            // 'sub_category_banner2' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
            // 'sub_category_banner3' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
            // 'sub_category_banner4' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
            'sub_category_slug' => 'required|string|max:255',
            'sub_cat_desc' => 'required|string|max:255',
            'category' => 'required',
            'sub_meta_title' => 'required|string|max:255',
            'sub_meta_keywords' => 'required|string|max:255',
            'sub_meta_description' => 'required|string|max:255',
          ]);

         $upd=[];

        if ($request->hasFile('sub_category_icon')) {
            $image = $request->file('sub_category_icon');
            $sub_category_icon = time() . '_' . $image->getClientOriginalName();
            $image->move(storage_path('app/public/sub_category_icon'), $sub_category_icon);
            $upd['subcategory_image']=$sub_category_icon;
        }


         if ($request->hasFile('sub_category_thumbnail')) {
            $image = $request->file('sub_category_thumbnail');
            $sub_category_thumbnail = time() . '_' . $image->getClientOriginalName();
            $image->move(storage_path('app/public/sub_category_thumbnail'), $sub_category_thumbnail);
            $upd['sub_thumbnail']=$sub_category_thumbnail;
        }

        if ($request->hasFile('sub_category_banner1')) {
            $image = $request->file('sub_category_banner1');
            $sub_category_banner1 = time() . '_' . $image->getClientOriginalName();
            $image->move(storage_path('app/public/sub_category_banner_image'), $sub_category_banner1);
             $upd['banner1']=$sub_category_banner1;
        }

         if ($request->hasFile('sub_category_banner2')) {
            $image = $request->file('sub_category_banner2');
            $sub_category_banner2 = time() . '_' . $image->getClientOriginalName();
            $image->move(storage_path('app/public/sub_category_banner_image'), $sub_category_banner2);
             $upd['banner2']=$sub_category_banner2;
        }

        if ($request->hasFile('sub_category_banner3')) {
            $image = $request->file('sub_category_banner3');
            $sub_category_banner3 = time() . '_' . $image->getClientOriginalName();
            $image->move(storage_path('app/public/sub_category_banner_image'), $sub_category_banner3);
             $upd['banner3']=$sub_category_banner3;
        }

         if ($request->hasFile('sub_category_banner4')) {
            $image = $request->file('sub_category_banner4');
            $sub_category_banner4 = time() . '_' . $image->getClientOriginalName();
            $image->move(storage_path('app/public/sub_category_banner_image'), $sub_category_banner4);
             $upd['banner4']=$sub_category_banner4;
        }

            $upd['subcategory_name'] = $request->input('sub_category_name');
            $upd['subcategory_slug'] = trim($request->input('sub_category_slug'));
            $upd['meta_title'] = $request->input('sub_meta_title');
            $upd['meta_keyword'] = $request->input('sub_meta_keywords');
            $upd['meta_description'] = $request->input('sub_meta_description');
            $upd['maincategory_id'] = $request->input('category');
            $upd['subcategory_description'] = $request->input('sub_cat_desc');
          
          $update=SubCategoryModel::where('id',$request->id)->update($upd);
          return back()->with('success','Sub Category Updated');
    }





  public function sub_delete($id){
     $category = SubCategoryModel::where('id',$id)->where('isdeleted',0)->first();
        if(!$category){
            return back()->with('error','id not found');
        }
        $update=SubCategoryModel::where('id',$id)->update(['isdeleted'=>1]);
         return redirect()->back()->with('success', 'Sub Category deleted');
   }




   public function sub_active($id){
     $category = SubCategoryModel::where('id',$id)->where('isdeleted',0)->first();
        if(!$category){
            return back()->with('error','id not found');
        }
        $update=SubCategoryModel::where('id',$id)->update(['status'=>1]);
         return redirect()->back()->with('success', 'Sub Category activated');
   }




   public function sub_deactive($id){
     $category = SubCategoryModel::where('id',$id)->where('isdeleted',0)->first();
        if(!$category){
            return back()->with('error','id not found');
        }
        $update=SubCategoryModel::where('id',$id)->update(['status'=>0]);
         return redirect()->back()->with('success', 'Sub Category deactivted');
   }






























 // =================================== SUB 2 CATEGORY ==============================================//

    
    public function sub2_create()
    {
        //  sub_category_edit
        $data['sub_categories'] = SubCategoryModel::where('id', '!=', 1)->orderBy('id')->get();
        return view('admin.sub2Category.sub2cat_add')->with($data);
    }


    public function sub2_store(Request $request)
    {
        // dd($request->all());
        $request->validate([
            'sub2_category_name' => 'required|string|max:255',
            'sub2_category_icon' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
            'sub2_category_thumbnail' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
            'sub2_category_banner1' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
            'sub2_category_banner2' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
            'sub2_category_banner3' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
            'sub2_category_banner4' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
            'sub2_category_slug' => 'required|string|max:255',
            'sub2_cat_desc' => 'required|string|max:255',
            'sub_category' => 'required',
            'sub2_meta_title' => 'required|string|max:255',
            'sub2_meta_keywords' => 'required|string|max:255',
            'sub2_meta_description' => 'required|string|max:255',
          ]);

        if ($request->hasFile('sub2_category_icon')) {
            $image = $request->file('sub2_category_icon');
            $sub2_category_icon = time() . '_' . $image->getClientOriginalName();
            $image->move(storage_path('app/public/sub2_category_icon'), $sub2_category_icon);
        }


         if ($request->hasFile('sub2_category_thumbnail')) {
            $image = $request->file('sub2_category_thumbnail');
            $sub2_category_thumbnail = time() . '_' . $image->getClientOriginalName();
            $image->move(storage_path('app/public/sub2_category_thumbnail'), $sub2_category_thumbnail);
        }

        if ($request->hasFile('sub2_category_banner1')) {
            $image = $request->file('sub2_category_banner1');
            $sub2_category_banner1 = time() . '_' . $image->getClientOriginalName();
            $image->move(storage_path('app/public/sub2_category_banner_image'), $sub2_category_banner1);
        }

         if ($request->hasFile('sub2_category_banner2')) {
            $image = $request->file('sub2_category_banner2');
            $sub2_category_banner2 = time() . '_' . $image->getClientOriginalName();
            $image->move(storage_path('app/public/sub2_category_banner_image'), $sub2_category_banner2);
        }

        if ($request->hasFile('sub2_category_banner3')) {
            $image = $request->file('sub2_category_banner3');
            $sub2_category_banner3 = time() . '_' . $image->getClientOriginalName();
            $image->move(storage_path('app/public/sub2_category_banner_image'), $sub2_category_banner3);
        }

         if ($request->hasFile('sub2_category_banner4')) {
            $image = $request->file('sub2_category_banner4');
            $sub2_category_banner4 = time() . '_' . $image->getClientOriginalName();
            $image->move(storage_path('app/public/sub2_category_banner_image'), $sub2_category_banner4);
        }

            $catdata=new Sub2CategoryModel;

            $catdata->subcategory2_name = $request->input('sub2_category_name');

            $catdata->ssubcategory_image = $sub2_category_icon;
            $catdata->sub2_thumbnail = $sub2_category_thumbnail;
            $catdata->banner1 = $sub2_category_banner1;
            $catdata->banner2 = $sub2_category_banner2;
            $catdata->banner3 = $sub2_category_banner3;
            $catdata->banner4 = $sub2_category_banner4;

            $catdata->created_date = now();
            $catdata->sub2category_slug = trim($request->input('sub2_category_slug'));
            $catdata->meta_title = $request->input('sub2_meta_title');
            $catdata->meta_keyword = $request->input('sub2_meta_keywords');
            $catdata->meta_description = $request->input('sub2_meta_description');
            $catdata->ssubcategory_id  = $request->input('sub_category');
            $catdata->ssubcategory_description = $request->input('sub2_cat_desc');
            $catdata->save();

            // Save $catdata to the database or perform other actions as needed
              return redirect()->back()->with('success', 'Sub2 Category uploaded');
    }


    public function sub2_index()
    {
        $sub2_categories = Sub2CategoryModel::where('isdeleted', '!=', 1)->with('subcategoryDetails')->orderBy('id')->get();
        return view('admin.sub2Category.sub2cat_list', ['sub2_categories' => $sub2_categories]);
    }



    public function sub2_edit($id)
    {
        // dd($id);
        $data['sub_categories'] = SubCategoryModel::where('id', '!=', 1)->orderBy('id')->get();
        $data['sub2Category'] = Sub2CategoryModel::where('id',$id)->where('isdeleted',0)->first();
        if(!$data['sub2Category']){
            return back()->with('error','id not found');
        }
        return view('admin.sub2Category.sub2cat_edit')->with($data);
    }




    public function sub2_update(Request $request)
    {
        // dd($request->all());
          $request->validate([
            'sub2_category_name' => 'required|string|max:255',
            // 'sub2_category_icon' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
            // 'sub2_category_thumbnail' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
            // 'sub2_category_banner1' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
            // 'sub2_category_banner2' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
            // 'sub2_category_banner3' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
            // 'sub2_category_banner4' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
            'sub2_category_slug' => 'required|string|max:255',
            'sub2_cat_desc' => 'required|string|max:255',
            'sub_category' => 'required',
            'sub2_meta_title' => 'required|string|max:255',
            'sub2_meta_keywords' => 'required|string|max:255',
            'sub2_meta_description' => 'required|string|max:255',
          ]);

          $upd=[];

         if ($request->hasFile('sub2_category_icon')) {
            $image = $request->file('sub2_category_icon');
            $sub2_category_icon = time() . '_' . $image->getClientOriginalName();
            $image->move(storage_path('app/public/sub2_category_icon'), $sub2_category_icon);
             $upd['ssubcategory_image']=$sub2_category_icon;
        }


         if ($request->hasFile('sub2_category_thumbnail')) {
            $image = $request->file('sub2_category_thumbnail');
            $sub2_category_thumbnail = time() . '_' . $image->getClientOriginalName();
            $image->move(storage_path('app/public/sub2_category_thumbnail'), $sub2_category_thumbnail);
             $upd['sub2_thumbnail']=$sub2_category_thumbnail;
        }

        if ($request->hasFile('sub2_category_banner1')) {
            $image = $request->file('sub2_category_banner1');
            $sub2_category_banner1 = time() . '_' . $image->getClientOriginalName();
            $image->move(storage_path('app/public/sub2_category_banner_image'), $sub2_category_banner1);
             $upd['banner1']=$sub2_category_banner1;
        }

         if ($request->hasFile('sub2_category_banner2')) {
            $image = $request->file('sub2_category_banner2');
            $sub2_category_banner2 = time() . '_' . $image->getClientOriginalName();
            $image->move(storage_path('app/public/sub2_category_banner_image'), $sub2_category_banner2);
             $upd['banner2']=$sub2_category_banner2;
        }

        if ($request->hasFile('sub2_category_banner3')) {
            $image = $request->file('sub2_category_banner3');
            $sub2_category_banner3 = time() . '_' . $image->getClientOriginalName();
            $image->move(storage_path('app/public/sub2_category_banner_image'), $sub2_category_banner3);
             $upd['banner3']=$sub2_category_banner3;
        }

         if ($request->hasFile('sub2_category_banner4')) {
            $image = $request->file('sub2_category_banner4');
            $sub2_category_banner4 = time() . '_' . $image->getClientOriginalName();
            $image->move(storage_path('app/public/sub2_category_banner_image'), $sub2_category_banner4);
             $upd['banner4']=$sub2_category_banner4;
        }

            

            $upd['subcategory2_name'] = $request->input('sub2_category_name');
            $upd['sub2category_slug'] = trim($request->input('sub2_category_slug'));
            $upd['meta_title'] = $request->input('sub2_meta_title');
            $upd['meta_keyword'] = $request->input('sub2_meta_keywords');
            $upd['meta_description'] = $request->input('sub2_meta_description');
            $upd['ssubcategory_id'] = $request->input('sub_category');
            $upd['ssubcategory_description'] = $request->input('sub2_cat_desc');
            $update=Sub2CategoryModel::where('id',$request->id)->update($upd);
            

            // Save $catdata to the database or perform other actions as needed
              return redirect()->back()->with('success', 'Sub2 Category updated');
    }





     public function sub2_delete($id){
     $category = Sub2CategoryModel::where('id',$id)->where('isdeleted',0)->first();
        if(!$category){
            return back()->with('error','id not found');
        }
        $update=Sub2CategoryModel::where('id',$id)->update(['isdeleted'=>1]);
         return redirect()->back()->with('success', 'Sub2 Category deleted');
   }




   public function sub2_active($id){
     $category = Sub2CategoryModel::where('id',$id)->where('isdeleted',0)->first();
        if(!$category){
            return back()->with('error','id not found');
        }
        $update=Sub2CategoryModel::where('id',$id)->update(['status'=>1]);
         return redirect()->back()->with('success', 'Sub2 Category activated');
   }




   public function sub2_deactive($id){
     $category = Sub2CategoryModel::where('id',$id)->where('isdeleted',0)->first();
        if(!$category){
            return back()->with('error','id not found');
        }
        $update=Sub2CategoryModel::where('id',$id)->update(['status'=>0]);
         return redirect()->back()->with('success', 'Sub2 Category deactivted');
   }








}
