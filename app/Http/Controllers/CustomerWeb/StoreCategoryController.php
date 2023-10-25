<?php

namespace App\Http\Controllers\CustomerWeb;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class StoreCategoryController extends Controller
{
    

/*
  store Page
  Jeet
*/
    public function StorePage(){
        return view('member.storeAndCategory.store');
    }



/*
  category Page
  Jeet
*/
    public function CategoryPage(){
         return view('member.storeAndCategory.category');
    }
}
