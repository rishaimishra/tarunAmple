<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sub2CategoryModel extends Model
{
    use HasFactory;
     protected $table="sub_category2";

     public function subcategoryDetails(){
        return $this->hasOne('App\Models\SubCategoryModel', 'id', 'ssubcategory_id');
    }
}
