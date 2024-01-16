<?php

namespace App\Http\Controllers\CustomerWeb;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;
use App\Models\ProductModel;
use App\Models\User;
use Auth;
use App\Models\AdminImpFunctionModel;
use Illuminate\Support\Str;

class ProductsController extends Controller
{



public function createrandomstring()
{
    $length = 5;

    $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
    $charactersLength = strlen($characters);
    $randomString = '';

    for ($i = 0; $i < $length; $i++) {
        $randomString .= $characters[rand(0, $charactersLength - 1)];
    }

    $randomString .= uniqid();

    return substr(str_shuffle($randomString), 0, 5);
}



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








public function add_to_cart_count(Request $request){
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


    return $data;
}





public function add_to_cart_header(Request $request)
{
   // dd($request->all());
    $usrmaid=@Auth::user()->user_id;
   $vpb_check_all_items = DB::table('products_added')
    ->select('*')
    ->where('customer_Id', '=', $usrmaid)
    ->where('is_purchased', '=', 0)
    ->orderBy('id', 'asc')
    ->get();

    $data['currencySymbol']="$";
      $data['usrmakey']= @Auth::user()->user_id;;
    // dd($vpb_check_all_items);
    $data['data']=$vpb_check_all_items;

$count = DB::table('products_added')->where('customer_Id', $usrmaid)
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









public function checkbeforecheckout(Request $request){

    if ($request->isMethod('post')) {
        $user_id = $request->input('userid');
        $admin_model_obj = new \App\Models\AdminImpFunctionModel;

        $allData = $admin_model_obj->getCardDetailsWithShippingDetail($user_id);
         // return response($allData);

        if (!empty($allData)) {
            $displayMsg = '';

            foreach ($allData as $dataVal) {
                if ($dataVal['total_amount'] < $dataVal['min_allowed_total']) {
                    $displayMsg .= "MINIMUM BUYS FOR " . $dataVal['tbl_vndr_dispname'] . " STORE $" . $dataVal['min_allowed_total'] . "\n";
                }
            }

            if (!empty($displayMsg)) {
                return response($displayMsg);
            } else {
                return response("process");
            }
        } else {
            return response("process");
        }
    }

    return response("Invalid Request");

}






public function checkout(){

    $admin_model_obj = new \App\Models\AdminImpFunctionModel;
    if(@Auth::user()->user_id){

    $usrmaid=@Auth::user()->user_id;

    $data['record'] = User::where('user_id', $usrmaid)
        ->where('status', '1')
        ->first();


    $data['countrylist'] = DB::table('tbl_countries')
        ->select('name', 'id', 'sortname')
        ->orderBy('name', 'ASC')
        ->get();

    $data['usrmakey']= @Auth::user()->user_id;

     $count = DB::table('products_added')->where('customer_Id', $usrmaid)
    ->where('is_purchased', 0)
    ->get();

    // Calculate sums
    $data['itemsTotal'] = $count->sum('amount');
    $data['taxTotal'] = $count->sum('tax');
    $data['shippingTotal'] = $count->sum('shipping');
    $data['itemsQuant'] = $count->sum('quantity');

    $data['totalcartdata']=$admin_model_obj->select_cart_numericdata($usrmaid);
    // dd($data);

    $data['currencySymbol']="$";



    return view('member.checkout.checkout')->with($data);
    }else{
        echo"login first";
    }
}

















public function checkout_submit(Request $request){
    // dd($request->all());
    if ($request->all()) {
            $admin_model_obj = new \App\Models\AdminImpFunctionModel;

            //echo "<pre>";print_r($_POST);die;
            $user_id=Auth::user()->user_id;

            $contuseridata =DB::table('users')->where('user_id',$user_id)->first();
            // dd($contuseridata);
            //print_r($contuseridata); die();
            $contid = $contuseridata->user_countrykey; //$this->_getParam('country');
            $statid = $contuseridata->user_statekey;  //$this->_getParam('state');
            $citid = $contuseridata->user_citykey; //$this->_getParam('city');





            $contstatcitidata = $admin_model_obj->getcontstatcitidata($contid, $statid, $citid);
            // dd($contstatcitidata );
            //print_r($contstatcitidata); die();
            $user_country = @$contstatcitidata->contname;
            $user_state = @$contstatcitidata->statename;
            $user_city = @$contstatcitidata->citiname;


            $udetail['user_type'] = $contuseridata->user_type;
            $udetail['first_name'] = $contuseridata->first_name;//$request->getParam('first_name');
            $udetail['last_name'] = $contuseridata->last_name; //$request->getParam('last_name');
            //$udetail['cname'] = $request->getParam('company_name');
            $udetail['email'] = $contuseridata->email; //$request->getParam('email_address');

            $udetail['address'] = $contuseridata->address; //$request->getParam('address');
            $udetail['ucity'] = $user_city;
            $udetail['ustate'] = $user_state;
            $udetail['ucountry'] = $user_country;
            $udetail['user_citykey'] = $citid;
            $udetail['user_statekey'] = $statid;
            $udetail['user_countrykey'] = $contid;
            $udetail['uzip'] = $contuseridata->zip_code; //$request->getParam('postal_code');
            $udetail['mobile'] = $contuseridata->mobile; //$request->getParam('telephone');
            $udetail['user_id'] = $user_id;

            $ccname = $udetail['first_name'] . ' ' . $udetail['last_name'];




            $checkOutTotal = $request->overalltotal;
            $payment_type_check = $request->payment_type;

            /*Store User Address ForOrder*/

            $orderdetail['customer_id'] = $user_id;
            $orderdetail['first_name'] = $request->b_first_name;
            $orderdetail['last_name'] = $request->b_last_name;
            $orderdetail['cname'] = $request->b_first_name . ' ' . $request->b_last_name;
            $orderdetail['email'] = $request->b_email_address;
            $orderdetail['address'] = $request->b_address;

            $b_country = $request->b_country;
            $b_state = $request->b_state;
            $b_city = $request->b_city;





            $getscountcitydataBill = $admin_model_obj->getcontstatcitidata($b_country, $b_state, $b_city);
// dd($getscountcitydataBill);
            $orderdetail['ucity'] = @$getscountcitydataBill->citiname;
            $orderdetail['ustate'] = @$getscountcitydataBill->statename;
            $orderdetail['ucountry'] = @$getscountcitydataBill->contname;

            $orderdetail['user_citykey'] = $b_city;
            $orderdetail['user_statekey'] = $b_state;
            $orderdetail['user_countrykey'] = $b_country;

            $orderdetail['uzip'] = $request->b_postal_code;
            $orderdetail['mobile'] = $request->b_telephone;
            $orderdetail['ufax'] = $request->b_fax;
            $sfirst_name = $request->sfirst_name;
            $slast_name = $request->slast_name;
            $semail_address = $request->semail_address;
            $saddress = $request->saddress;
            $scountry = $request->scountry;
            $sstate = $request->sstate;
            $scity = $request->scity;
            $spostal_code = $request->spostal_code;
            $stelephone = $request->stelephone;
            $sfax = $request->sfax;
            $orderdetail['sfirst_name'] = $sfirst_name;
            $orderdetail['slast_name'] = $slast_name;
            $orderdetail['scname'] = $ccname;
            $orderdetail['semail'] = $semail_address;
            $orderdetail['saddress'] = $saddress;




            $getscountcitydata = $admin_model_obj->getcontstatcitidata($scountry, $sstate, $scity);
            // dd($getscountcitydata);
            $suser_country = @$getscountcitydata->contname;
            $suser_state = @$getscountcitydata->statename;
            $suser_city = @$getscountcitydata->citiname;
            $orderdetail['sucity'] = $suser_city;
            $orderdetail['sustate'] = $suser_state;
            $orderdetail['sucountry'] = $suser_country;
            $orderdetail['suser_citykey'] = $scity;
            $orderdetail['suser_statekey'] = $sstate;
            $orderdetail['suser_countrykey'] = $scountry;
            $orderdetail['suzip'] = $spostal_code;
            $orderdetail['smobile'] = $stelephone;
            $orderdetail['sufax'] = $sfax;

            // dd("1st",$orderdetail);




            if (!empty($payment_type_check) && $payment_type_check == 'by_stripe') {

                $OrdRandStr = $this->createrandomstring();
                // dd($OrdRandStr);
                $orderid = "AMPLI" . $OrdRandStr;

                $transaction_id = $orderid;

                $order_amt = number_format($checkOutTotal, 2, '.', '');

                // if(empty($valid)) {
                $first_name = $udetail['first_name'];
                $last_name = $udetail['last_name'];
                $email = $udetail['email'];
                //echo $email; die();
                // $password = $udetail['password'];
                $mobile = $udetail['mobile'];
                $image = '';
                $zip_code = $udetail['uzip'];
                $birthdays = '';
                $educations = '';
                $incomes = '';
                $interestss = '';
                $user = 'User';

                // $ustatus = $udetail['status'];
                $fulname = "$first_name" . "$last_name";
                $ucreated = date('Y-m-d H:i:s');
                if (!empty($fulname)) {
                    $n_ample = 5;
                } else {
                    $n_ample = 0;
                }
                if (!empty($mobile)) {
                    $m_ample = 4;
                } else {
                    $m_ample = 0;
                }
                if (!empty($email)) {
                    $e_ample = 5;

                } else {
                    $e_ample = 0;
                }
                if (!empty($image)) {
                    $i_ample = 4;
                } else {
                    $i_ample = 0;
                }
                if (!empty($zip_code)) {

                    $zip_ample = 5;
                } else {
                    $zip_ample = 0;
                }
                if (!empty($birthdays)) {

                    $b_ample = 5;
                } else {
                    $b_ample = 0;
                }
                if (!empty($educations)) {

                    $edu_ample = 5;
                } else {
                    $edu_ample = 0;
                }
                if (!empty($incomes)) {

                    $in_ample = 4;
                } else {
                    $in_ample = 0;
                }
                if (!empty($interestss)) {

                    $intest_ample = 5;
                } else {
                    $intest_ample = 0;
                }

                $default_ample = ($n_ample + $m_ample + $e_ample + $i_ample + $zip_ample + $b_ample + $edu_ample + $in_ample + $intest_ample);

                // dd($default_ample);
                 // dd($udetail);
                $userkey = $udetail['user_id'];


                /*NEW END CODE*/
                $address1 = $udetail['address'] . ',' . $user_city . ',' . $user_state . ',' . $user_country . '-' . $udetail['uzip'];
                $deliverytype = $request->deliverytype;
                $orderdata['user_id'] = $user_id;
                $orderdata['order_date'] = date('Y-m-d H:i:s');
                $orderdata['total_price'] = $order_amt;
                $orderdata['shipping_price'] = '0';
                $orderdata['updated_date'] = date('Y-m-d H:i:s');
                $orderdata['order_status'] = 'In Process';
                $orderdata['payment_mode'] = 'stripe';
                $orderdata['account_number'] = '';
                $orderdata['card_type'] = '';
                $orderdata['retail_price'] = '0';
                $orderdata['buyer_comments'] = 'awesome product';
                $orderdata['order_id'] = $transaction_id;
                $orderdata['currency'] = 'USD';
                $orderdata['current_rate'] = '0';
                $orderdata['order_type'] = implode(',', $deliverytype);
                $orderdata['order_payment_status'] = 0;

                // dd($orderdata);


                $insertorderdata = $admin_model_obj->userinsertorderdata($orderdata);

                $LastOrderInsert = $insertorderdata;
                // dd($LastOrderInsert);

                $order_date = date('Y-m-d H:i:s');

                $orderdetail['order_id'] = $transaction_id;

                $insertorderadressdata = $admin_model_obj->userinsertorderaddressdata($orderdetail);
                dd("next payment gateway");
                return redirect("/processcheckoutpayment/order_id/$transaction_id/user_id/$user_id");
                // $this->_redirect("/processcheckoutpayment/order_id/$transaction_id/user_id/$user_id");

            } 








            else if (!empty($payment_type_check) && $payment_type_check == 'by_amplepoints') {


                $OrdRandStr = $this->createrandomstring();
                $orderid = "AMPLI" . $OrdRandStr;
                $transaction_id = $orderid;

                $address1 = $udetail['address'] . ',' . $user_city . ',' . $user_state . ',' . $user_country . '-' . $udetail['uzip'];
                $deliverytype = $request->deliverytype;
                $orderdata['user_id'] = $user_id;
                $orderdata['order_date'] = date('Y-m-d H:i:s');
                $orderdata['total_price'] = 0.00;
                $orderdata['shipping_price'] = '0';
                $orderdata['updated_date'] = date('Y-m-d H:i:s');
                $orderdata['order_status'] = 'In Process';
                $orderdata['payment_mode'] = 'byamples';
                $orderdata['account_number'] = '';
                $orderdata['card_type'] = '';
                $orderdata['retail_price'] = '0';
                $orderdata['buyer_comments'] = 'awesome product';
                $orderdata['order_id'] = $transaction_id;
                $orderdata['currency'] = 'USD';
                $orderdata['current_rate'] = '0';
                $orderdata['order_type'] = implode(',', $deliverytype);
                $orderdata['order_payment_status'] = 1;
                // print_r($orderdata);die;

                $insertorderdata = $admin_model_obj->userinsertorderdata($orderdata);

                $LastOrderInsert = $insertorderdata;

                $order_date = date('Y-m-d H:i:s');

                $resultupdateproductadded = $admin_model_obj->updateproductaddeddata($user_id, $transaction_id);

                $resultupdateproductpickup = $admin_model_obj->updatedeliverytypedata($user_id, $transaction_id);

                $resultupdateuseramples = $admin_model_obj->updateuseramplesdata($user_id, $transaction_id);

                $orderdetail['order_id'] = $transaction_id;

                $insertorderadressdata = $admin_model_obj->userinsertorderaddressdata($orderdetail);

                dd("done");





                $this->updateGiftCardRelatedCheckoutData($transaction_id, $user_id);

                $this->customerdermail($transaction_id, $user_id);

                $this->ordermail($transaction_id, $user_id);

                $vendorData = $admin_model_obj->selectdistincOrderVendor($transaction_id);



                foreach ($vendorData as $vdata) {

                    $this->vendorordermail($transaction_id, $user_id, $vdata->vendor_id);

                }

                $this->sendmessegeTocustomer($transaction_id);

                $giftCardToData = $admin_model_obj->getFullOrderDetailForGiftToUsers($transaction_id);

                if (!empty($giftCardToData)) {

                    foreach ($giftCardToData as $orderInfo) {

                        $gfOrderId = $orderInfo['orderid'];
                        $gfuserId = $orderInfo['customer_Id'];

                        $this->gifrcardOrderEmail($gfOrderId, $orderInfo, $gfuserId);

                        $this->sendGiftcardMsgTOUser($gfOrderId, $orderInfo);
                    }
                }

                $this->addUserPurchaseReward($user_id, $transaction_id);

                $this->UpdateProductQuantity($transaction_id);


                $this->_redirect("/ordersuccess/msg/1/order_id/$transaction_id/user_id/$user_id");

            } else {

                $this->_redirect("/ordersuccess/msg/2/");
            }


        }

}











public function cityList($city)
{
    $stateId = $city;

    $cities = DB::table('tbl_cities')
        ->select('tbl_cities.id', 'tbl_cities.name')
        ->join('tbl_states', 'tbl_states.stateid', '=', 'tbl_cities.state_id')
        ->where('tbl_cities.state_id', '=', $stateId)
        ->get();

   echo "<option value=''>Select City</option>";

    foreach ($cities as $val) {
         echo "<option value=" . $val->id . ">" . $val->name . "</option>";
    }
   die();
}



 public function statelist($statename)
    {
        $countryId = $statename;

        echo "<option value=''>Select State</option>";
       $result = DB::table('tbl_states')
            ->select('stateid', 'statename')
            ->where('country_id', '=', $countryId)
            ->get();

        foreach ($result as $getst) {
            echo "<option value=" . $getst->stateid . ">" . $getst->statename . "</option>";
        }
        die;
    }





}
