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

        
        $filters = DB::table('tbl_filter_type')->where('status', 1)
        ->orderBy('id')
        ->get();
        $data['filters']=$filters;

       // Auth::guard('admin')->user()->u_id //876
        $allow_free_products = AdminModel::where('u_id', Auth::guard('admin')->user()->u_id)
        ->where('ustatus', '1')
        ->where('isdeleted', '0')
        ->join('tbl_vendor', 'tbl_vendor.tbl_admin_uid', '=', 'tbl_admin.u_id')
        ->first();
        if($allow_free_products){
            //for vendor
            $data['allow_free_products']=@$allow_free_products->allow_free_products;
        }else{
            //for admin
            $data['allow_free_products']=1;
        }
        // dd(@$data['allow_free_products']);
        $data['categories'] = CategoryModel::where('isdeleted', '!=', 1)->orderBy('id')->get();

        // movies
        $data['movies'] = DB::table('theater_videos')
            ->select('video_id as id', 'video_title as name')
            // ->where('video_title', 'LIKE', '%' . $q . '%');
        ->get();

       return view('admin.product.product_main_add')->with($data);
    }



    public function getStates($id)
    {
        // dd($id);
        $result =DB::table('tbl_states')->where('country_id', $id)->get(); 
        echo "<option value=''>Select State</option>";
        foreach ($result as $getst) {
            echo "<option value=" . $getst->stateid . ">" . $getst->statename . "</option>";
        }
    }






    public function getCity($state_id)
    {
        $cities = DB::table('tbl_cities')->where('state_id', $state_id)->get();
        echo "<option value=''>Select City</option>";
        foreach ($cities as $getst) {
            echo "<option value=" . $getst->id . ">" . $getst->name . "</option>";
        }
    }





    public function filterviewproductsnew(Request $request){
      // return $request->all();
      if ($request->isMethod('post')) {
            $row = @$request->input('row');
            $prdkey = @$request->input('prodid');
            $productvendor = @$request->input('vendorid');
            $productcatkey = @$request->input('catid');
            $productsubcatkey = @$request->input('subcateid');
            $productsub2catkey = @$request->input('sub2cateid');

            $productdatalist = $this->filterviewproductNEW($prdkey, $productvendor, $productcatkey, $productsubcatkey, $productsub2catkey, $row, 9);

             $data['resultproductlist'] = $productdatalist;

            if (isset($prdkey) && !empty($prdkey)) {

                $rpdatalist = $this->getrelatedproductslist($prdkey);
                $data['countrelatedplist'] = $rpdatalist;

                $malpdatalist = $this->getmightlikeproductslist($prdkey);
                $data['countmightlikeplist'] = $malpdatalist;

                $ospdatalist = $this->getonsaleproductslist($prdkey);
                $data['countonsaleplist'] = $ospdatalist;

                $offpdatalist = $this->getofferproductslist($prdkey);
                $data['countofferplist'] = $offpdatalist;

            }

            // Pass the data to the view
            return view('admin.product.product_list_on_product_slider')->with($data);
        }
    }








    public function filterviewproductNEW($prdkey, $myvdrid, $mycatkey, $mysubcatekey, $mysub2catekey, $limitfrom, $rowperrpage)
    {
        $query = ProductModel::select('id as pid', 'product_name as pname', 'vendor_uid as vendor_key', 'single_price as pprice', 'prod_front_fromdate as pfrmdate', 'prod_front_todate as ptodate', 'stock_availability as pstock', 'quantity', 'min_order_quantity as pminqty', 'image as img_name', 'deal_type as pdltype', 'product_discount as pdiscount', 'no_of_amples as pamples', 'free_with_amples as pfwamples', 'supplier_name as pvendor', 'discount_price as pdiscountprice')
            ->where('id', '!=', @$prdkey)
            ->where('status', '=', '1')
            ->where('is_deleted', '=', '0');

        if (!empty($myvdrid)) {
            $query->whereIn('vendor_uid', $myvdrid);
        }

        if (!empty($mycatkey)) {
            $query->whereIn('product_type_id', $mycatkey);
        }

        if (!empty($mysubcatekey)) {
            $query->whereIn('category_id', $mysubcatekey);
        }

        if (!empty($mysub2catekey)) {
            $query->whereIn('subcategory_id', $mysub2catekey);
        }

        $result = $query->orderBy('id', 'ASC')
            ->skip($limitfrom)
            ->take($rowperrpage)
            ->get();

        return $result;
    }









     public function getRelatedProductsList($mpid)
    {
        $tableName = 'tbl_related_products';

        $result = DB::table($tableName)
            ->where('relp_mpid', $mpid)
            ->get();

        return $result;
    }

    public function getMightLikeProductsList($mpid)
    {
        $tableName = 'tbl_mightalsolike_products';

        $result = DB::table($tableName)
            ->where('mal_mpid', $mpid)
            ->get();

        return $result;
    }

    public function getOnSaleProductsList($mpid)
    {
        $tableName = 'tbl_onsale_products';

        $result = DB::table($tableName)
            ->where('os_mpid', $mpid)
            ->get();

        return $result;
    }

    public function getOfferProductsList($mpid)
    {
        $tableName = 'tbl_offer_products';

        $result = DB::table($tableName)
            ->where('off_mpid', $mpid)
            ->get();

        return $result;
    }











public function product_insert(Request $request){
    dd($request->all());
}








public function product_list(Request $request){
   
    if($request->all()){
      // dd($request->all());
        $data['cat_list']=$request->cat_list;
        $data['vendor_list']=$request->vendor_list;
        $data['search_term']=$request->search_term;
        
       $filter = array();
        $filter['cat_list'] = $request->cat_list;
        $filter['vendor_list'] = $request->vendor_list;
        $filter['search_term'] = $request->search_term;

        $query = ProductModel::select(
            'products.*',
            'products.id as pid',
            'products.product_type_key',
            'products.status as product_status',
            'main_category.category_name as category_name',
            'products.image as image'
        )
        ->leftJoin('main_category', 'main_category.id', '=', 'products.product_type_id')
        ->where(function ($query) {
            $query->where('products.status', '=', 1)
                ->orWhere('products.status', '=', 2);
        })
        ->where('products.is_deleted', '=', 0);

            if (isset($filter['cat_list']) && $filter['cat_list']) {
                $query->where('products.product_type_id', '=', $filter['cat_list']);
            }

            if (isset($filter['vendor_list']) && $filter['vendor_list']) {
                $query->where('products.vendor_uid', '=', $filter['vendor_list']);
            }

            if (isset($filter['search_term']) && $filter['search_term']) {
                $searchTerm = $filter['search_term'];
                $query->where(function ($query) use ($searchTerm) {
                    $query->where('products.id', '=', $searchTerm)
                        ->orWhere('products.product_name', '=', $searchTerm)
                        ->orWhere('products.product_sku', '=', $searchTerm);
                });
            }

            $query->orderBy('products.id');

            $results = $query->paginate(10);
            $data['paginator']=$results;

            // dd($data);
    }


    else{
      $vndrid = AdminModel::select('tbl_vendor.tbl_vndr_id as vdrid')
        ->leftJoin('tbl_vendor', 'tbl_vendor.tbl_admin_uid', '=', 'tbl_admin.u_id')
        ->where('tbl_admin.u_id', '=', Auth::guard('admin')->user()->u_id)
        ->where('tbl_admin.ustatus', '=', '1')
        ->where('tbl_admin.isdeleted', '=', '0')
        ->first();

       // dd($vndrid->vdrid);
        if($vndrid->vdrid){
              $results = ProductModel::select('products.*', 'products.id as pid', 'products.product_type_key', 'products.status as product_status', 'main_category.category_name as category_name', 'products.image as image')
                ->leftJoin('main_category', 'main_category.id', '=', 'products.product_type_id')
                ->where('products.vendor_uid', '=', $vndrid->vndrid)
                ->where(function ($query) {
                    $query->where('products.status', '=', '1')
                          ->orWhere('products.status', '=', '2');
                })
                ->where('products.is_deleted', '=', '0')
                ->orderBy('products.id')
                ->paginate(10);
                // dd($results);

        }else{
              $results = ProductModel::select('products.*', 'products.id as pid', 'products.product_type_key', 'products.status as product_status', 'main_category.category_name as category_name', 'products.image as image')
                ->leftJoin('main_category', 'main_category.id', '=', 'products.product_type_id')
                // ->where('products.vendor_uid', '=', $vndrid->vndrid)
                ->where(function ($query) {
                    $query->where('products.status', '=', '1')
                          ->orWhere('products.status', '=', '2');
                })
                ->where('products.is_deleted', '=', '0')
                ->orderBy('products.id')
                ->paginate(10);
                // dd($results);

        }
      $data['paginator']=$results;
    // dd($data['paginator']);
    }




    // vendor list
    $query = AdminModel::leftJoin('tbl_vendor', 'tbl_vendor.tbl_admin_uid', '=', 'tbl_admin.u_id')
        ->leftJoin('tbl_vendor_images', 'tbl_vendor_images.tbl_vndr_uid', '=', 'tbl_vendor.tbl_vndr_id')
        ->where('tbl_admin.ustatus', 1)
        ->where('tbl_admin.utype', '=', 2)
        ->where('tbl_admin.isdeleted', '=', 0)
        // ->where('tbl_vendor.tbl_vndr_brand_status', '=', 0)
        ->where('tbl_vendor.tbl_vndr_store_status', '=', 1)
        ->orderBy('tbl_vendor.tbl_vndr_id');
        $result = $query->get();
        $data['vendordata']= $result;
        // dd($data['vendordata']);


    // category list
     $categorys = CategoryModel::where('isdeleted', '!=', 1)->orderBy('id')->get();
     $data['allmainCategory']= $categorys;

    
    return view('admin.product_list.product_list')->with($data);
}


















}
