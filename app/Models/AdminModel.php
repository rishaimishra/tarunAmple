<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;

class AdminModel extends Authenticatable
{
    use HasFactory;
    protected $table = 'tbl_admin'; 
    protected $primaryKey = 'u_id'; 

      protected $fillable = [
        'ufullname',
        'uemail',
        'upwd',
        'follower_keyword',
        'utype',
        'ustatus',
        'created',
        'isdeleted',
        'reset',
    ];


    public function vendorDetails(){
      return $this->hasOne('App\Models\VendorModel','tbl_admin_uid','u_id');
    }


}
