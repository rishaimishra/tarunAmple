<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use DB;
use App\Models\ProductModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class AdminImpFunctionModel extends Model
{
    use HasFactory;


    public function formatPricingValues($priceValue)
    {
        $returnPriceVal = '';
        if (!empty($priceValue)) {
            $returnPriceVal = number_format($priceValue, 2);
        }
        // dd($returnPriceVal);
        return $returnPriceVal;
    }





    public function displayAmplePoints($userAmples)
    {
        $finalAmplePoints = '';

        $userAmples = floatval($userAmples);
        $userAmples = number_format($userAmples, 2, '.', '');

        $newRewardsPoint = explode('.', $userAmples);

        $myNewLeftDigit = $newRewardsPoint[0];
        $myNewRightDigit = $newRewardsPoint[1];

        if ($myNewRightDigit == 60) {
            $finalAmplePoints = $myNewLeftDigit + 1;
            $finalAmplePoints = number_format($finalAmplePoints, 2, '.', '');
        } elseif ($myNewRightDigit > 60) {
            $secondsAmple = $myNewRightDigit;
            $iAmple = ($secondsAmple / 60) % 60;
            $sAmple = $secondsAmple % 60;
            $myMinuteAmple = $iAmple;
            $mySecondAmple = sprintf("%02d", $sAmple);

            $myNewLeftDigit = $myNewLeftDigit + $myMinuteAmple;

            $calculateRightAmple = $mySecondAmple;
            $calculateRightAmple = sprintf("%02d", $calculateRightAmple);

            $finalAmplePoints = $myNewLeftDigit . '.' . $calculateRightAmple;
        } else {
            $finalAmplePoints = $userAmples;
        }
         // dd( $finalAmplePoints);
        return $finalAmplePoints;
    }




 public function get_all_vendor_address($vid)
    {
       $result = DB::table('vendor_location')
        ->select('*')
        ->where('vendor_location.vendor_id', '=', $vid)
        ->first();

    return $result;

    }



 public function get_all_vendor_address_multiple($vid)
    {
       $result = DB::table('vendor_location')
        ->select('*')
        ->where('vendor_location.vendor_id', '=', $vid)
        ->get();

    return $result;

    }


public function get_shipp_address($pid)
{
    $result = DB::table('shipp_address')
        ->select('*')
        ->where('shipp_address.pro_id', '=', $pid)
        ->get();

    return $result;
}

public function get_country($pid)
{
    $result = DB::table('tbl_countries')
        ->select('*')
        ->where('tbl_countries.id', '=', 1)
        ->first();
// dd($result);
// die();
    return $result;
}


public function get_state($pid)
{
    $result = DB::table('tbl_states')
        ->select('*')
        ->where('tbl_states.stateid', '=', $pid)
        ->first();

    return $result;
}



public function get_city($pid)
{
    $result = DB::table('tbl_cities')
        ->select('*')
        ->where('tbl_cities.id', '=', $pid)
        ->first();

    return $result;
}


public function get_byappoint_detail($pid, $vid)
{
    $result = DB::table('byappoint_location')
        ->select('*')
        ->where('byappoint_location.pro_id', '=', $pid)
        ->where('byappoint_location.vid', '=', $vid)
        ->get();

    return $result;
}

public function get_vendor_address($vid, $store)
{
    $result = DB::table('vendor_location')
        ->select('*')
        ->where('vendor_location.loc_store', '=', $store)
        ->where('vendor_location.vendor_id', '=', $vid)
        ->first();

    return $result;
}





public function featureProductOnOffer($condition, $productKey)
{
    if ($condition == 'feature') {
        $whr = 'is_featured = 1';
    } elseif ($condition == 'hotdeal') {
        $whr = 'is_featured = 0';
    } else {
        $whr = 'deal_type = 0';
    }
// dd($productKey);
    $result = ProductModel::select(
        'products.id as pid',
        'products.vendor_uid as vendor_key',
        'products.product_name as pname',
        'products.single_price as pprice',
        'products.prod_front_fromdate as pfrmdate',
        'products.prod_front_todate as ptodate',
        'products.stock_availability as pstock',
        'quantity',
        'products.min_order_quantity as pminqty',
        'product_images.image_name as pimage',
        'products.deal_type as pdltype',
        'products.product_discount as pdiscount',
        'products.no_of_amples as pamples',
        'products.free_with_amples as pfwamples',
        'products.supplier_name as pvendor',
        'products.discount_price as pdiscountprice'
    )
       ->leftJoin('product_images', 'product_images.product_id', '=', 'products.id')
        ->where('products.id', '=', $productKey)
        ->first();

    return $result;
}






public function featureProductOnSale($condition, $productKey)
{
    if ($condition == 'feature') {
        $whr = 'is_featured = 1';
    } elseif ($condition == 'hotdeal') {
        $whr = 'is_featured = 0';
    } else {
        $whr = 'deal_type = 0';
    }

    $result = ProductModel::select(
        'products.id as pid',
        'products.vendor_uid as vendor_key',
        'products.product_type_key',
        'products.product_name as pname',
        'products.single_price as pprice',
        'products.prod_front_fromdate as pfrmdate',
        'products.prod_front_todate as ptodate',
        'products.stock_availability as pstock',
        'quantity',
        'products.min_order_quantity as pminqty',
        'product_images.image_name as pimage',
        'products.deal_type as pdltype',
        'products.product_discount as pdiscount',
        'products.no_of_amples as pamples',
        'products.free_with_amples as pfwamples',
        'products.supplier_name as pvendor',
        'products.discount_price as pdiscountprice'
    )
        ->leftJoin('product_images', 'product_images.product_id', '=', 'products.id')
        ->where('products.id', '=', $productKey)
        ->first();

    return $result;
}





public function get_vendord_details($vid)
{
    $result =  DB::table('tbl_vendor')->where('tbl_vndr_id', $vid)->first();
    return $result;
}




public function get_delivery_set($vid, $pid, $userid, $withoutample = 0, $free_product = 0)
    {
        $result = array();

        $result = DB::table('product_delivery_type')->where('pro_id', $pid)
            ->where('vid', $vid)
            ->where('userid', $userid)
            ->where('ship_without_ample', $withoutample)
            ->where('ship_free_product', $free_product)
            ->where('orderid', '')
            ->first();

        return $result;
    }





public function get_pickup_locationaddress($pid)
    {
        $result = array();
        $result =  DB::table('pickup_location')->where('pro_id', $pid)->get();
        return $result;
    }




public function get_online_locationaddress($pid)
    {
        $result = DB::table('online_locations')->where('pro_id', $pid)->get();
        return $result;
    }




    public function get_shipp_type($pid)
    {
        $result = DB::table('pro_shipp')->where('pro_id', $pid)->first();
        return $result;
    }





    public function get_delivery_location($pid)
    {
        $result =  DB::table('deliver_location')->where('pro_id', $pid)->get();
        return $result;
    }


     public function get_delivery_price_detail($pid)
    {
        $result = DB::table('product_delivery_fees')->where('pro_id', $pid)->first();
        return $result;
    }





 public function get_shipp_price($pid)
    {
        $result = DB::table('shipp_fee')->where('pro_id', $pid)->first();
        return $result;
    }


 public function GetVendorTabsDetail($vendor_id)
    {
        // $result = DB::select("SELECT * FROM vendor_tabs WHERE vendor_id = ?", [$vendor_id]);
           $result = DB::table('vendor_tabs')->where('vendor_id',$vendor_id)->get();
        return $result;
    }




    public function getProDetailImg($proId)
    {
        $result = DB::table('pro_detail_images')
            ->where('product_id', $proId)
            ->get();

        return $result;
    }










    public function getStarUsers($pdctkey, $usrRating)
    {
        $result = DB::table('products_rating_comments')
            ->select(DB::raw("count(*) as total{$usrRating}starusers"))
            ->leftJoin('users', 'users.user_id', '=', 'products_rating_comments.customer_id')
            ->where('products_rating_comments.product_id', $pdctkey)
            ->where('products_rating_comments.usr_rating', $usrRating)
            ->where('products_rating_comments.isstatus', 1)
            ->where('products_rating_comments.isdeleted', 0)
            ->get();

        return $result;
    }

    public function getOneStarUsers($pdctkey)
    {
        return $this->getStarUsers($pdctkey, 1);
    }

    public function getTwoStarUsers($pdctkey)
    {
        return $this->getStarUsers($pdctkey, 2);
    }

    public function getThreeStarUsers($pdctkey)
    {
        return $this->getStarUsers($pdctkey, 3);
    }

    public function getFourStarUsers($pdctkey)
    {
        return $this->getStarUsers($pdctkey, 4);
    }

    public function getFiveStarUsers($pdctkey)
    {
        return $this->getStarUsers($pdctkey, 5);
    }




    public function get_vendor_hours($vendorId)
{
    $result = DB::table('tbl_vendor_hours')->where('vendor_id', $vendorId)->get();
    return $result;
}





public function getyoumightlikeproductIdsbympid($mspId)
{
    $result = DB::table('tbl_mightalsolike_products')->select('tbl_mightalsolike_products.mal_pid')
        ->leftJoin('products', 'products.id', '=', 'tbl_mightalsolike_products.mal_pid')
        ->where('mal_mpid', $mspId)
        ->where('products.status', 1)
        ->groupBy('mal_pid')
        ->get();

    return $result;
}






public function getCardDetailsWithShippingDetail($user_id)
{
    // $products_added = 'products_added';
    
    $result = DB::table('products_added')
        ->select(
            DB::raw('SUM(price * quantity) AS total_amount'),
            'vendor_id',
            'product_delivery_type.delivery_type',
            'tbl_vendor.is_allow_min_total',
            'tbl_vendor.min_allowed_total',
            'tbl_vendor.tbl_vndr_comp',
            'tbl_vendor.tbl_vndr_dispname'
        )
        ->leftJoin('product_delivery_type', 'product_delivery_type.pro_id', '=', "products_added.product_id")
        ->leftJoin('tbl_vendor', 'tbl_vendor.tbl_vndr_id', '=', "products_added.vendor_id")
        ->where("products_added.customer_Id", $user_id)
        ->where("products_added.is_purchased", 0)
        ->where('product_delivery_type.is_purchased', 0)
        ->where('product_delivery_type.delivery_type', 'shipment')
        ->where('tbl_vendor.is_allow_min_total', 1)
        ->groupBy("products_added.vendor_id", 'product_delivery_type.delivery_type', 'tbl_vendor.is_allow_min_total', 'tbl_vendor.min_allowed_total', 'tbl_vendor.tbl_vndr_comp', 'tbl_vendor.tbl_vndr_dispname')
       
        ->get();

    return $result;
}
















public function calculateCartSpecialFeesData($user_id)
{
    $tableName = 'products_added';

    $result = DB::table($tableName)
        ->select([
            'products_added.id as product_added_id',
            'products_added.vendor_id',
            'products_added.item_added',
            'products_added.price as item_single_price',
            'products_added.amount as item_added_price',
            'products_added.quantity as item_added_quantity',
            'tbl_vendor.special_fee',
            'tbl_vendor.special_fee_percentage'
        ])
        ->leftJoin('tbl_vendor', 'tbl_vendor.tbl_vndr_id', '=', 'products_added.vendor_id')
        ->where('products_added.customer_Id', $user_id)
        ->where('is_purchased', 0)
        ->get();

        // dd($result );

    return $result;
}



public function calculateCartShippingFeesDetail($user_id)
{
    $tableName = 'products_added';

    $result = DB::table($tableName)
        ->select([
            'products_added.id as product_added_id',
            'products_added.vendor_id',
            'products_added.item_added',
            'products_added.price as item_single_price',
            'products_added.amount as item_added_price',
            'products_added.quantity as item_added_quantity',
            'shipp_fee.shipp_price'
        ])
        ->leftJoin('shipp_fee', 'shipp_fee.pro_id', '=', 'products_added.product_id')
        ->where('products_added.customer_Id', $user_id)
        ->where('is_purchased', 0)
        ->get();

        // dd( $result);

    return $result;
}









public function showstatelist($countryId)
{

    $result = DB::table('tbl_states')
        ->select('stateid', 'statename')
        ->where('country_id', $countryId)
        ->get();

    return $result;
}



public function showcitylist($stateId)
{
    $result = DB::table('tbl_cities')
        ->select('id', 'name')
        ->leftJoin('tbl_states', 'tbl_states.stateid', '=', 'tbl_cities.state_id')
        ->where('tbl_cities.state_id', '=', $stateId)
        ->get();

    return $result;
}










public function select_cart_numericdata($values)
{
    $tableName = 'products_added';

    // if (empty($values['user_id'])) {
    //     $values['user_id'] = '';
    // }

    // if (empty($values['username'])) {
    //     $values['username'] = '';
    // }

    $userKey = $values;

    if (!empty($userKey)) {
        $result = DB::table($tableName)
            ->select(
                'products_added.item_added',
                'products_added.price as item_single_price',
                'products_added.amount as item_added_price',
                'products_added.quantity as item_added_quantity',
                'products_added.newprice_byamples',
                'products_added.apply_amples',
                'products_added.earned_amples',
                'products_added.cacolor as cacolor',
                'products_added.casize as casize',
                'products_added.product_id',
                'products_added.vendor_id',
                'products.image as imaged',
                'products_added.id as productaddedid',
                'products_added.without_ample as is_buy_without_ample',
                'products_added.is_buy_free'
            )
            ->leftJoin('products', 'products.id', '=', 'products_added.product_id')
            ->where('products_added.customer_Id', '=', $values)
            ->where('is_purchased', '=', 0)
            ->get();
    } else {
        $result = DB::table($tableName)
            ->select(
                'products_added.item_added',
                'products_added.price as item_single_price',
                'products_added.amount as item_added_price',
                'products_added.quantity as item_added_quantity',
                'products_added.newprice_byamples',
                'products_added.apply_amples',
                'products_added.earned_amples',
                'products_added.cacolor as cacolor',
                'products_added.casize as casize',
                'products_added.product_id',
                'products_added.vendor_id',
                'products.image as imaged',
                'products_added.id as productaddedid',
                'products_added.without_ample as is_buy_without_ample',
                'products_added.is_buy_free'
            )
            ->leftJoin('products', 'products.id', '=', 'products_added.product_id')
            ->where('products_added.username', '=', $values)
            ->where('is_purchased', '=', 0)
            ->get();
    }

    return $result->toArray();
}





public function getDeliverySet($vid, $pid, $userid, $withoutample = 0, $free_product = 0)
{
    // dd($vid, $pid, $userid, $withoutample, $free_product);
    $result = array();
    $tableName = 'product_delivery_type';

    $query = DB::table($tableName)
        ->where('pro_id', $pid)
        ->where('vid', $vid)
        ->where('userid', $userid)
        // ->where('ship_without_ample', $withoutample)
        ->where('ship_free_product', $free_product)
        ->where('orderid', '');

    $result = $query->first();

    return $result;
}





public function get_appointlocation($appointId, $vid, $pid)
{
    $result = DB::table('byappoint_location')->where('pro_id', $pid)
        ->where('vid', $vid)
        ->where('byappoint_id', $appointId)
        ->first();

    return $result;
}





public function get_appointlocationbystore($appointId, $vid)
{
    $result = DB::table('vendor_location')->where('vendor_id', $vid)
        ->where('loc_store', $appointId)
        ->first();
        // dd($result);

    return $result;
}






public function GetVendorSpecialFeesDetail($vendorId)
{
    $resultData = array();

    $result = DB::table('tbl_vendor')
        ->select('special_fee', 'special_fee_percentage')
        ->where('tbl_vndr_id', $vendorId)
        ->first();

    if (!empty($result)) {
        $resultData['special_fee'] = $result->special_fee;
        $resultData['special_fee_percentage'] = $result->special_fee_percentage;
    }

    return $resultData;
}






  public function getcontstatcitidata($contId, $statId, $citId)
    {
        $result = DB::table('tbl_cities')
            ->select([
                'tbl_countries.name as contname',
                'tbl_states.statename',
                'tbl_cities.name as citiname'
            ])
            ->leftJoin('tbl_states', 'tbl_states.stateid', '=', 'tbl_cities.state_id')
            ->leftJoin('tbl_countries', 'tbl_countries.id', '=', 'tbl_states.country_id')
            ->where('tbl_states.country_id', '=', $contId)
            ->where('tbl_cities.state_id', '=', $statId)
            ->where('tbl_cities.id', '=', $citId)
            ->first();

        return $result;
    }






public function userinsertorderdata($values)
{
    $tableName = 'tbl_order';

    $sales = [];
    foreach ($values as $key => $value) {
        $sales[$key] = $value;
    }

    $orderId = DB::table($tableName)->insertGetId($sales);

    return $orderId;
}


public function userinsertorderaddressdata($values)
{
    $tableName = 'order_address';

    $sales = [];
    foreach ($values as $key => $value) {
        $sales[$key] = $value;
    }

    DB::table($tableName)->insert($sales);
}





public function updateproductaddeddata($userKey, $transactionId)
{
    $tableName = 'products_added';

    $orderData = [
        'order_id' => $transactionId,
        'is_purchased' => 1,
        'date' => now(), // Laravel equivalent of date('Y-m-d H:i:s')
        'purchase_date' => now(),
    ];

    $result = DB::table($tableName)
        ->where('customer_Id', $userKey)
        ->where('is_purchased', 0)
        ->update($orderData);

    return $result;
}






public function updatedeliverytypedata($userKey, $transactionId)
{
    $tableName = 'product_delivery_type';

    $orderData = [
        'orderid' => $transactionId,
        'is_purchased' => 1,
    ];

    $result = DB::table($tableName)
        ->where('userid', $userKey)
        ->where('is_purchased', 0)
        ->update($orderData);

    return $result;
}










public function updateuseramplesdata($userId, $transactionId)
{
    $productsAddedTable = 'products_added';
    $loginTable = 'users';

    $result1 = DB::table($productsAddedTable)
        ->select('earned_amples')
        ->where('customer_Id', $userId)
        ->where('order_id', $transactionId)
        ->get();

    $earnedAmple = 0.00;
    $totalEarnedAmple = 0.00;

    $result2 = DB::table($loginTable)
        ->select('total_ample')
        ->where('user_id', $userId)
        ->first();

    $totalUserAmple = $result2->total_ample;

    foreach ($result1 as $cartProductKey) {
        $totalEarnedAmple += $cartProductKey->earned_amples;
    }

    $totalUserAmple += $totalEarnedAmple;

    $userTotalAmple = ['total_ample' => $totalUserAmple];
    $result = DB::table($loginTable)
        ->where('user_id', $userId)
        ->update($userTotalAmple);

    return $result;
}





public function selectdistincOrderVendor($orderId)
{
    $tableName = 'products_added';

    $result = DB::table($tableName)
        ->select('vendor_id')
        ->distinct()
        ->where('order_id', $orderId)
        ->where('is_purchased', 1)
        ->orderByDesc('id')
        ->get();

    return $result;
}





public function getFullOrderDetailForGiftToUsers($orderId)
{
    $productsAddedTable = 'products_added';
    $orderTable = 'tbl_order';
    $productsTable = 'products';
    $productImagesTable = 'product_images';
    $productDeliveryTypeTable = 'product_delivery_type';

    $result = DB::table($productsAddedTable)
        ->select(
            'products_added.*',
            'tbl_order.*',
            'products.*',
            'product_images.*',
            'product_delivery_type.*',
            'products_added.quantity as total_product_quantity',
            'products_added.id as productadded_id',
            'products_added.shipping as shipcharge',
            'products_added.tax as applytax'
        )
        ->leftJoin($orderTable, "tbl_order.order_id", '=', "products_added.order_id")
        ->leftJoin($productsTable, "products.id", '=', "products_added.product_id")
        ->leftJoin($productImagesTable, "product_images.product_id", '=', "products_added.product_id")
        ->leftJoin(
            $productDeliveryTypeTable,
            function ($join) use ($productsAddedTable, $productDeliveryTypeTable) {
                $join->on("product_delivery_type.pro_id", '=', "products_added.product_id")
                    ->where("product_delivery_type.orderid", '=', "products_added.order_id");
            }
        )
        ->where("$productsAddedTable.order_id", '=', $orderId)
        ->where("$productsAddedTable.is_purchased", '=', 1)
        ->where("$productsAddedTable.is_gift_card", '=', 1)
        ->where("$productsAddedTable.gift_card_for", '=', 2)
        ->groupBy("$productsAddedTable.id")
        ->orderByDesc("$productsAddedTable.id")
        ->get();

    return $result;
}





 public function all_amples_data($limit = null)
    {
        $tableName = 'tbl_advertises'; // Adjust the table name based on your actual database structure

        $query = DB::table($tableName)
            ->select('*')
            ->where('status', '=', 1)
            ->orderByDesc('ad_price');

        if (!is_null($limit)) {
            $query->limit($limit);
        }

        $result = $query->get();

        return $result;
    }






  public function cdnUrl($url)
    {
        if (empty($url)) {
            throw new \Exception('Path is missing');
        }

        $pattern = '/^http/i';

        if (preg_match($pattern, $url)) {
            throw new \Exception('Invalid usage. ' .
                'Use: /htdocs/images instead of the full URL ' .
                'http://example.com/htdocs/images.'
            );
        }

        $pattern = '|^/|';
        if (!preg_match($pattern, $url)) {
            $url = '/' . $url;
        }

        // Assuming 'siteurl' is a key in your config file
        $cdn_hostname = config('your-config-file-name.siteurl', 'https://amplepoints.com');

        $uri = asset($url, $cdn_hostname);

        return $uri;
    }






public function OnlyCdnUrl($url)
    {
        if (empty($url)) {
            throw new \Exception('Path is missing');
        }

        $pattern = '/^http/i';

        if (preg_match($pattern, $url)) {
            throw new \Exception('Invalid usage. ' .
                'Use: /htdocs/images instead of the full URL ' .
                'http://example.com/htdocs/images.'
            );
        }

        $pattern = '|^/|';
        if (!preg_match($pattern, $url)) {
            $url = '/' . $url;
        }

        // Assuming 'siteurl' is a key in your config file
        $cdnHostname = config('your-config-file-name.siteurl', 'https://amplepoints.com');

        $uri = asset($url, $cdnHostname);

        return $uri;
    }











     public function getNewSidebarProductsList($countryCode = 'DEFAULT')
    {
        $includeVendors = '';

        $selectedVendor = DB::select("SELECT * FROM `sidebar_products_add` WHERE `country_code` = ?", [$countryCode]);

        if (!empty($selectedVendor)) {
            $orArray = explode(',', $selectedVendor[0]->selected_vendors);

            $incVdrArra = array_map(function ($value) {
                return "products.vendor_uid = $value";
            }, $orArray);

            $includeVendors = implode(' OR ', $incVdrArra);
        }

        $products = DB::table('products')->select(
            'products.id as product_id',
            'products.product_name',
            'products.product_discount',
            'products.free_with_amples',
            'products.image',
            'products.no_of_amples',
            'products.discount_price',
            'products.product_discount',
            'products.single_price',
            'products.supplier_name',
            'products.product_type_key'
        )
            ->leftJoin('tbl_vendor', 'tbl_vendor.tbl_vndr_id', '=', 'products.vendor_uid')
            ->where('products.status', '=', '1')
            ->inRandomOrder()
            ->limit(50);

        if (!empty($includeVendors)) {
            $products->whereRaw($includeVendors);
        }

        $result = $products->get();

        return $result;
    }








 public function GetUserRemoteCountryFromIP($request)
    {
        $countryCode = [];

        $defaultCountry = $this->Get_Options('default_country');

        $myCode = '';

        if (!$request->cookie('user_remote_country')) {
            $ipAddress = $request->ip(); // Get client's IP address

            $apiKey = 'deb3edadc6e5fb165a24eb79b0780ca5c67967f9e443865d3232bed729de2386';

            $userDetails = @json_decode(Http::get("https://api.ipinfodb.com/v3/ip-country/?key=$apiKey&ip=$ipAddress&format=json")->body());

            if (!empty($userDetails)) {
                $myCode = $userDetails->countryCode != '' && $userDetails->countryCode != '-' ? $userDetails->countryCode : $defaultCountry;
            }

            return response()->json(['country_code' => $myCode])->cookie('user_remote_country', $myCode, 30 * 24 * 60); // 30 days expiration
        }

        $myCode = $request->cookie('user_remote_country');

        $countryCode['country_code'] = $myCode;

        return response()->json($countryCode);
    }








    // Helper function to get options, replace with your actual implementation
    public function Get_Options($optionName)
    {
        $option = DB::table('tbl_options')->where('option_name', $optionName)->first();

        if ($option) {
            return $option->option_value;
        }

        return null; // Or handle accordingly if the option doesn't exist
    }












public function almplePointsUrl($url)
{
    if (empty($url)) {
        throw new \Exception('Path is missing');
    }

    $pattern = '/^http/i';

    if (preg_match($pattern, $url)) {
        throw new \Exception('Invalid usage. Use: /htdocs/images instead of the full URL http://example.com/htdocs/images.');
    }

    $pattern = '|^/|';

    if (!preg_match($pattern, $url)) {
        $url = '/' . $url;
    }

    $cdnHostname = 'https://www.amplepoints.com';
    // Uncomment the line below if you want to use the siteurl from options
    // $cdnHostname = $this->getOptions('siteurl');

    if (empty($cdnHostname)) {
        $cdnHostname = 'https://www.amplepoints.com';
    }

    $uri = $cdnHostname . $url;

    return $uri;
}









public function getGameVideoData($limitfrom, $rowperrpage)
{
    $result = DB::table('game_vedio')
        ->offset($limitfrom)
        ->limit($rowperrpage)
        ->get();

    return $result;
}







public function getGameVideoDataByCat($limitfrom, $rowperrpage, $vedio_category)
{
    $result = DB::table('game_vedio')
        ->where('vedio_category', '=', $vedio_category)
        ->skip($limitfrom)
        ->take($rowperrpage)
        ->get();

    return $result;
}












// payments


public function cart_total_amount($values)
{
    $result = [];

    $tableName = 'products_added';

    if (empty($values['user_id'])) {
        $values['user_id'] = '';
    }

    if (empty($values['username'])) {
        $values['username'] = '';
    }

    $userKey = $values['user_id'];

    if (!empty($userKey)) {
        $query = DB::table($tableName)
            ->select(
                DB::raw('SUM(amount) as items_total'),
                DB::raw('SUM(tax) as tax_total'),
                DB::raw('SUM(shipping) as shipping_total'),
                DB::raw('SUM(quantity) as items_quant')
            )
            ->where('customer_Id', $values['user_id'])
            ->where('is_purchased', 0);
    } else {
        $query = DB::table($tableName)
            ->select(
                DB::raw('SUM(amount) as items_total'),
                DB::raw('SUM(tax) as tax_total'),
                DB::raw('SUM(shipping) as shipping_total'),
                DB::raw('SUM(quantity) as items_quant')
            )
            ->where('username', $values['username'])
            ->where('is_purchased', 0);
    }

    $result = $query->get();

    return $result;
}








public function wishlist_cart($values)
{
    $result = [];

    $tableName = 'wishlist_added';

    if (empty($values['user_id'])) {
        $values['user_id'] = '';
    }

    if (empty($values['username'])) {
        $values['username'] = '';
    }

    $userKey = $values['user_id'];

    $query = DB::table($tableName)
        ->select(
            'wishlist_added.item_added',
            'wishlist_added.amount as item_added_price',
            'wishlist_added.quantity as item_added_quantity',
            'wishlist_added.product_id',
            'products.image as image_name'
        )
        ->leftJoin('products', 'products.id', '=', 'wishlist_added.product_id');

    if (!empty($userKey)) {
        $query->where('wishlist_added.customer_Id', $values['user_id']);
    } else {
        $query->where('wishlist_added.username', $values['username']);
    }

    $result = $query->get();

    return $result;
}






public function gethomcatdata()
{
    $tableName = 'main_category';

    $result = DB::table($tableName)
        ->select('*')
        ->where('status', '=', 1)
        ->where('id', '!=', 1)
        ->get();

    return $result;
}







public function gethomsubcatdata()
{
    $tableName = 'sub_category';

    $result = DB::table($tableName)
        ->select('*')
        ->where('status', '=', 1)
        ->get();

    return $result;
}





public function ExecuteRowQuery($sql)
{
    $result = DB::select($sql);
    return $result ? $result[0] : null;
}








public function getfrontvendorlist()
{
    $result = DB::table('tbl_admin')
        ->select(
            'tbl_admin.ufullname as vendor_name',
            'tbl_admin.uemail as vendor_email',
            'tbl_admin.ustatus as vendor_status',
            'tbl_vendor.tbl_vndr_phone as vendor_phone',
            'tbl_vendor.tbl_vndr_adr as vendor_address',
            'tbl_vendor.tbl_vndr_city as vendor_city',
            'tbl_vendor.tbl_vndr_state as vendor_state',
            'tbl_vendor.tbl_vndr_country as vendor_country',
            'tbl_vendor.tbl_vndr_comp as vendor_company',
            'tbl_vendor.tbl_vndr_dispname as vendor_displayname'
        )
        ->leftJoin('tbl_vendor', 'tbl_vendor.tbl_admin_uid', '=', 'tbl_admin.u_id')
        ->where('tbl_admin.ustatus', '!=', 0)
        ->where('tbl_admin.utype', 2)
        ->where('tbl_admin.isdeleted', 0)
        ->where('tbl_vendor.tbl_vndr_store_status', 1)
        ->orderBy('tbl_vendor.tbl_vndr_id')
        ->limit(10)
        ->get();

    return $result;
}









public function getmaincatdata()
{
    $result = DB::table('main_category')
        ->where('id', '!=', 1)
        ->where('status', 1)
        ->orderBy('id')
        ->get();

    return $result;
}






public function getsubcatdata()
{
    $result = DB::table('sub_category')
        ->select('sub_category.id as subcatid', 'sub_category.subcategory_name as subcategory_name', 'main_category.id as maincatid')
        ->leftJoin('main_category', 'main_category.id', '=', 'sub_category.maincategory_id')
        ->orderBy('sub_category.maincategory_id')
        ->orderBy('sub_category.id')
        ->get();

    return $result;
}










public function getsubcatlastdata()
{
    $result = DB::table('sub_category2')
        ->select(
            'sub_category2.id as subcat2id',
            'sub_category2.subcategory2_name as subcategory2_name',
            'sub_category.id as subcatid',
            'main_category.id as maincatid'
        )
        ->leftJoin('sub_category', 'sub_category.id', '=', 'sub_category2.ssubcategory_id')
        ->leftJoin('main_category', 'main_category.id', '=', 'sub_category.maincategory_id')
        ->orderBy('main_category.id')
        ->orderBy('sub_category.id')
        ->orderBy('sub_category2.id')
        ->get();

    return $result;
}








public function getbrandlist()
{
    $result = DB::table('tbl_brands')
        ->select('id as brand_key', 'brand as brand_name')
        ->orderBy('id')
        ->get();

    return $result;
}








public function UpdateAnyTableData($table_name, $values, $where)
{
    $result = DB::table($table_name)
        ->whereRaw($where) // Assuming $where is a raw SQL condition
        ->update($values);

    return $result;
}




















}
