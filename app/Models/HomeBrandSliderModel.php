<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HomeBrandSliderModel extends Model
{
    use HasFactory;
    protected $table="home_brand_slider";

    public function vendorDetails(){
      return $this->hasOne('App\Models\VendorModel','tbl_vndr_id','vendor_id');
    }
}
