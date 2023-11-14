<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SubCategoryModel extends Model
{
    use HasFactory;
     protected $table="sub_category";

     public function categoryDetails(){
        return $this->hasOne('App\Models\CategoryModel', 'id', 'maincategory_id');
    }
}
