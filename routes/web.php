<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('Layouts.home');
});
Route::get('/member-login', function () {
    return view('member.login');
});
Route::get('/member-signup', function () {
    return view('member.signup');
});
Route::get('/vendor-signup', function () {
    return view('vendor.signup');
});
Route::get('/vendor-login', function () {
    return view('vendor.login');
});
