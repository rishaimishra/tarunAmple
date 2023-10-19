<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class VendorModel extends Model
{
    use HasFactory;
    protected $table = 'tbl_vendor';
    protected $primaryKey = 'tbl_vndr_id'; 

    protected $fillable = [
        'tbl_admin_uid',
        'tbl_vndr_dispname',
        'tbl_vndr_fname',
        'tbl_vndr_lname',
        'tbl_vndr_mail',
        'vendor_ref_code',
        'ref_user_id',
        'vendor_register_date',
    ];
}
