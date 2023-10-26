<?php

namespace App\Http\Controllers\CustomerWeb;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ProductsController extends Controller
{


/*
product page
Jeet
*/
 
 public function productsPage(){
    return view('member.products.products');
 }




/*
product details page
Jeet
*/
 
 public function productDetailsPage(){
    return view('member.products.productDetails');
 }




}
