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
    
    $data['product_images']=DB::table('product_images')->where('product_id',@$productDetails->id)->get();
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


    $data['resdelivery'] = DB::table('products')
        ->select('products.*') // Adjust the columns as needed
        ->where('products.id', '=', $id)
        // ->where('products.status', '=', '1')
        // ->groupBy('products.id')
        ->first();
        // dd($data['resdelivery']);
    


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
     }else{
       $data['user_total_alample']=0;
       $data['usrmakey']=null;
     }

    // dd( $data['checkproductalldates']);

    // return $data;
    return view('member.products.productDetails')->with($data);
 }




}
