<?php

namespace App\Http\Controllers\CustomerWeb;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;
use App\Models\ProductModel;
use App\Models\User;
use Auth;
use App\Models\AdminImpFunctionModel;


class ProductsController extends Controller
{


/*
product page
Jeet
*/
 
 public function productsPage(){
    return view('member.products.products');
 }




/*
product details page according id
Jeet
*/
 
 public function productDetailsPage($id){

   //search
   $srch=ProductModel::where('id',$id)->first();
   if(!$srch){
      dd('no');
      return back()->with('error','id missmatch');
   }

   $productDetails = DB::table('products')
    ->select(
        'products.id',
        'vendor_uid as vendor_key',
        'product_type_key as pro_key',
        'product_type_id as product_type_key',
        'category_id as cat_key',
        'subcategory_id as subcat_key',
        'product_name',
        'long_desc',
        'single_price',
        'shoe_size',
        'shoe_color',
        'prod_front_fromdate',
        'prod_front_todate',
        'stock_availability',
        'quantity',
        'min_order_quantity',
        'product_images.image_name as image',
        'deal_type',
        'products.product_discount as pdiscount',
        'products.no_of_amples as pamples',
        'products.free_with_amples as pfwamples',
        'products.supplier_name as pvendor',
        'products.discount_price as pdiscountprice',
        'products.pickUp',
        'products.delivery',
        'products.byappointment',
        'products.shipping',
        'products.productdetail_image',
        'products.is_custom_location',
        'products.is_without_ample',
        'products.wholesel_without_ample',
        'products.discount_without_ample',
        'products.discount_price_without_ample',
        'products.is_free_product'
    )
    ->leftJoin('product_images', 'product_images.product_id', '=', 'products.id')
    ->where('products.id', $id)
    ->whereIn('products.status', ['1','2'])
    // ->groupBy('products.id')
    ->first();

     // dd($productDetails);

        $vendor_id = $productDetails->vendor_key;

        if ($vendor_id > 0) {
            $vendor_email = DB::table('tbl_vendor')->where('tbl_vndr_id', $vendor_id)->first();
            $data['tbl_vndr_mail'] = $vendor_email->tbl_vndr_mail;
            $data['tbl_vndr_dispname'] = $vendor_email->tbl_vndr_dispname;
        } else {
            $data['tbl_vndr_mail'] = 'info@amplepoints.com';
            $data['tbl_vndr_dispname'] = 'Amplepoints';
        }



    
    $data['product_images']=DB::table('product_images')->where('product_id',@$productDetails->id)->get();
    // dd($data['product_images']);
    $data['productDetails']=$productDetails;



    $data['checkalldates'] = DB::table('datewise_price')->where('product_id', @$productDetails->id)->whereDate('show_date', '>=', now()->toDateString())->get();




    $data['respro'] = DB::table('products')
    ->select(
        'products.id',
        'products.pro_mess',
        'vendor_uid as vendor_key',
        'product_sku as sku',
        'product_type_key as pro_key',
        'product_type_id as product_type_key',
        'category_id as cat_key',
        'subcategory_id as subcat_key',
        'product_name',
        'long_desc',
        'single_price',
        'color',
        'size',
        'shoe_size',
        'shoe_color',
        'prod_front_fromdate',
        'prod_front_todate',
        'stock_availability',
        'quantity',
        'min_order_quantity',
        'deal_type',
        'products.product_discount as pdiscount',
        'products.no_of_amples as pamples',
        'products.free_with_amples as pfwamples',
        'products.supplier_name as pvendor',
        'products.discount_price as pdiscountprice',
        'products.movie_id'
    )
    ->where('products.id', $id)
    ->first();



        $vendorId=$data['respro']->vendor_key;
        $data['vendordatabyproduct'] = DB::table('tbl_vendor')->select(
                'tbl_vendor.tbl_vndr_id as vendor_id',
                'tbl_vndr_dispname as vendor_name',
                'tbl_vndr_adr as vendor_address',
                'tbl_vndr_city as vendor_city',
                'tbl_vndr_state as vendor_state',
                'tbl_vndr_country as vendor_country',
                'tbl_vndr_zip as vendor_zip',
                'tbl_vndr_comment as vndr_comment',
                'tbl_vndr_feedback as vndr_feedback',
                'tbl_vndr_complant as vndr_complant',
                'display_shipping',
                'display_return',
                'display_nutritional',
                'nutritional_facts',
                'display_specialties',
                'specialties',
                'display_specification',
                'specification',
                'display_hours',
                'display_venue',
                'venue_detail',
                'venue_image',
                'display_online_detail',
                'online_detail'
            )
            ->leftJoin('tbl_vendor_images', 'tbl_vendor_images.tbl_vndr_uid', '=', 'tbl_vendor.tbl_vndr_id')
            ->where('tbl_vndr_id', $vendorId)
            ->orderBy('tbl_vndr_id')
            ->first();
            // dd($data['vendordatabyproduct'] );

        // return $result;


    $data['resdelivery'] = DB::table('products')
        ->select('products.*') // Adjust the columns as needed
        ->where('products.id', '=', $id)
        // ->where('products.status', '=', '1')
        // ->groupBy('products.id')
        ->first();
        // dd($data['resdelivery']);



         $data['offerproductIdsdata'] = DB::table('tbl_offer_products')
         ->where('tbl_offer_products.off_mpid', '=', $productDetails->id)
         // ->groupBy('tbl_offer_products.off_pid')
         ->get();
         // dd( $data['offerproductIdsdata']);
         // return $result;


          $data['onsaleproductIdsdata'] =DB::table('tbl_onsale_products')
        // ->leftJoin('products', 'products.id', '=', 'tbl_onsale_products.os_pid')
        ->where('tbl_onsale_products.os_mpid', '=', $productDetails->id)
        // ->where('products.status', '=', '1')
        // ->groupBy('tbl_onsale_products.os_pid')
        ->get();
       
        // dd($data['onsaleproductIdsdata']);
         //return $result;


        $data['noOfPurchased']=DB::table('products_added')->where('product_id', $productDetails->id)
        ->where('product_order_status', '!=', 'Cancelled')
        ->where('is_purchased', 1)
        ->get();
    


    // userDetails if login
    if(@Auth::user()->user_id){
       $user_id=@Auth::user()->user_id;
       $data['record'] = User::where('user_id', @$user_id)
        ->where('status', '1')
        ->first();
        // dd($data['record']);

        // amplepoints
          $finalAmplepoints = '';
          // dd(Auth::user()->total_ample);

          $userAmples = floatval(Auth::user()->total_ample);
          $userAmples = number_format($userAmples, 2, '.', '');

          $newRewardsPoint = explode('.', $userAmples);

          $myNewLeftDigit = $newRewardsPoint[0];
          $myNewRightDigit = $newRewardsPoint[1];

          if ($myNewRightDigit == 60) {
              $finalAmplepoints = $myNewLeftDigit + 1;
              $finalAmplepoints = number_format($finalAmplepoints, 2, '.', '');
          } elseif ($myNewRightDigit > 60) {
              $secondsAmple = $myNewRightDigit;
              $iAmple = ($secondsAmple / 60) % 60;
              $sAmple = $secondsAmple % 60;
              $myMinuteAmple = $iAmple;
              $mySecondAmple = sprintf("%02d", $sAmple);

              $myNewLeftDigit = $myNewLeftDigit + $myMinuteAmple;
              $calculateRightAmple = $mySecondAmple;

              $calculateRightAmple = sprintf("%02d", $calculateRightAmple);

              $finalAmplepoints = $myNewLeftDigit . '.' . $calculateRightAmple;
          } else {
              $finalAmplepoints = $userAmples;
          }

          $data['user_total_alample']=$finalAmplepoints;
          $data['usrmakey']=$user_id;
          $data['resuser']=User::where('user_id', @$user_id)
                             ->where('status', '1')
                             ->first();
     }else{
       $data['user_total_alample']=0;
       $data['usrmakey']=null;
       $data['resuser']=null;
     }

    // dd( $data['checkproductalldates']);


     //ratting and comment
      $productratingcomments = DB::table('products_rating_comments')->select(
          'products_rating_comments.rat_id as rat_key',
          'products_rating_comments.usr_coments as user_comments',
          'products_rating_comments.usr_rating as user_rating',
          'products_rating_comments.iscreated as commentdated',
          'products_rating_comments.customer_id as cstkey',
          'users.first_name',
          'users.last_name',
          'users.user_image as profile_photo'
      )
      ->leftJoin('users', 'users.user_id', '=', 'products_rating_comments.customer_id')
      ->where('products_rating_comments.product_id', $productDetails->id)
      ->where('products_rating_comments.isstatus', 1)
      ->where('products_rating_comments.isdeleted', 0)
      ->get();
      $data['pratingcommentsdata']=$productratingcomments;




      $data['producttotalrating'] =DB::table('products_rating_comments')->select(DB::raw('SUM(usr_rating) as total_rating'))
      ->leftJoin('users', 'users.user_id', '=', 'products_rating_comments.customer_id')
      ->where('products_rating_comments.product_id', $productDetails->id)
      ->where('products_rating_comments.isstatus', 1)
      ->where('products_rating_comments.isdeleted', 0)
      ->first();


       // $data['pdctavgratingbyusr'] = number_format((($data['producttotalrating']->total_rating) / (count($data['pratingcommentsdata']))), 1);



        $admin_model_obj = new \App\Models\AdminImpFunctionModel;
        $productid=$productDetails->id;
        $onestarusers = $admin_model_obj->getonestarusers($productid);
        $twostarusers = $admin_model_obj->gettwostarusers($productid);
        $threestarusers = $admin_model_obj->getthreestarusers($productid);
        $fourstarusers = $admin_model_obj->getfourstarusers($productid);
        $fivestarusers = $admin_model_obj->getfivestarusers($productid);


     //  $data = [
     //     'pdctavgratingbyusr' => count($productratingcomments) > 0 ? number_format(($producttotalrating->total_rating / count($productratingcomments)), 1) : 0,


     //     'pdctonestarrating' => count($productratingcomments) > 0 ? (int)(($onestarusers->totalonestarusers / count($productratingcomments)) * 100) : 0,
     //     'pdcttwostarrating' => count($productratingcomments) > 0 ? (int)(($twostarusers->totaltwostarusers / count($productratingcomments)) * 100) : 0,
     //     'pdctthreestarrating' => count($productratingcomments) > 0 ? (int)(($threestarusers->totalthreestarusers / count($productratingcomments)) * 100) : 0,
     //     'pdctfourstarrating' => count($productratingcomments) > 0 ? (int)(($fourstarusers->totalfourstarusers / count($productratingcomments)) * 100) : 0,
     //     'pdctfivestarrating' => count($productratingcomments) > 0 ? (int)(($fivestarusers->totalfivestarusers / count($productratingcomments)) * 100) : 0,


     //     'pdctonestarusers' => count($productratingcomments) > 0 ? $onestarusers->totalonestarusers : 0,
     //     'pdcttwostarusers' => count($productratingcomments) > 0 ? $twostarusers->totaltwostarusers : 0,
     //     'pdctthreestarusers' => count($productratingcomments) > 0 ? $threestarusers->totalthreestarusers : 0,
     //     'pdctfourstarusers' => count($productratingcomments) > 0 ? $fourstarusers->totalfourstarusers : 0,
     //     'pdctfivestarusers' => count($productratingcomments) > 0 ? $fivestarusers->totalfivestarusers : 0,



     //     'pdctavgratingbyusr'=> count($productratingcomments) > 0 ? number_format((($data['producttotalrating']->total_rating) / (count($data['pratingcommentsdata']))), 1) : 0 ,


     // ];


$data['pdctavgratingbyusr'] = count($productratingcomments) > 0 ? number_format(($producttotalrating->total_rating / count($productratingcomments)), 1) : 0;

$data['pdctonestarrating'] = count($productratingcomments) > 0 ? (int)(($onestarusers->totalonestarusers / count($productratingcomments)) * 100) : 0;
$data['pdcttwostarrating'] = count($productratingcomments) > 0 ? (int)(($twostarusers->totaltwostarusers / count($productratingcomments)) * 100) : 0;
$data['pdctthreestarrating'] = count($productratingcomments) > 0 ? (int)(($threestarusers->totalthreestarusers / count($productratingcomments)) * 100) : 0;
$data['pdctfourstarrating'] = count($productratingcomments) > 0 ? (int)(($fourstarusers->totalfourstarusers / count($productratingcomments)) * 100) : 0;
$data['pdctfivestarrating'] = count($productratingcomments) > 0 ? (int)(($fivestarusers->totalfivestarusers / count($productratingcomments)) * 100) : 0;

$data['pdctonestarusers'] = count($productratingcomments) > 0 ? $onestarusers->totalonestarusers : 0;
$data['pdcttwostarusers'] = count($productratingcomments) > 0 ? $twostarusers->totaltwostarusers : 0;
$data['pdctthreestarusers'] = count($productratingcomments) > 0 ? $threestarusers->totalthreestarusers : 0;
$data['pdctfourstarusers'] = count($productratingcomments) > 0 ? $fourstarusers->totalfourstarusers : 0;
$data['pdctfivestarusers'] = count($productratingcomments) > 0 ? $fivestarusers->totalfivestarusers : 0;

$data['pdctavgratingbyusr'] = count($productratingcomments) > 0 ? number_format((($producttotalrating->total_rating) / (count($data['pratingcommentsdata']))), 1) : 0;






$data['relatedproductIdsdata'] = DB::table('tbl_related_products')->select('tbl_related_products.relp_pid')
        ->leftJoin('products', 'products.id', '=', 'tbl_related_products.relp_pid')
        ->where('relp_mpid', $productid)
        ->where('products.status', 1)
        ->groupBy('relp_pid')
        ->get();

    // return $result;

   $resultyoumightlikeproductIds = $admin_model_obj->getyoumightlikeproductIdsbympid($productid);
  $data['mightlikeproductIdsdata'] =$resultyoumightlikeproductIds;

    // return $data;
    return view('member.products.productDetails')->with($data);
 }








public function add_to_cart(Request $request)
{
   // dd($request->all());
   $vpb_check_all_items = DB::table('products_added')
    ->select('*')
    ->where('customer_Id', '=', $request->usrmaid)
    ->where('is_purchased', '=', 0)
    ->orderBy('id', 'asc')
    ->get();

    $data['currencySymbol']="$";
      $data['usrmakey']= @Auth::user()->user_id;;
    // dd($vpb_check_all_items);
    $data['data']=$vpb_check_all_items;

$count = DB::table('products_added')->where('customer_Id', $request->usrmaid)
    ->where('is_purchased', 0)
    ->get();

// Calculate sums
$data['itemsTotal'] = $count->sum('amount');
$data['taxTotal'] = $count->sum('tax');
$data['shippingTotal'] = $count->sum('shipping');
$data['itemsQuant'] = $count->sum('quantity');

// dd($data);


    return view('member.products.add_to_cart_modal')->with($data);
}

}
