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





















}
