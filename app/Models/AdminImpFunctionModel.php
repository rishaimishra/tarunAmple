<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use DB;
use App\Models\ProductModel;

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
    $loginTable = 'login';

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


























}
