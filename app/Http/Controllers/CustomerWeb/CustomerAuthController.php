<?php

namespace App\Http\Controllers\CustomerWeb;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class CustomerAuthController extends Controller
{


/*
  Index Page
*/
    public function indexPage(){
        return view('Layouts.home');
    }





/*
 Member Login Page
*/
    public function memberLogin(){
       return view('member.login');
    }






/*
 Member Registration Page
*/
    public function memberSignup(){
      return view('member.signup');
    }






}
