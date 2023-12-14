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





public function getVendorDetail($vid)
{
    $result =  DB::table('tbl_vendor')->where('tbl_vndr_id', $vid)->first();
    return $result;
}

















}
