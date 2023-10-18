<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class VendorImageModel extends Model
{
    use HasFactory;

    protected $table = 'tbl_vendor_images';
    protected $primaryKey = 'tbl_vndr_img_id'; 
}
