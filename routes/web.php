<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CustomerWeb\CustomerAuthController;
use App\Http\Controllers\VendorWeb\VendorAuthController;
use App\Http\Controllers\AdminWeb\AdminAuthController;

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

Route::get('/',[CustomerAuthController::class, 'indexPage'])->name('index.page');



// =========================== Customer Routes Start =============================================//

Route::get('/member-login',[CustomerAuthController::class, 'memberLogin'])->name('member.login.page');
Route::get('/member-signup',[CustomerAuthController::class, 'memberSignup'])->name('member.signup.page');

// =========================== Customer Routes End =============================================//




// =========================== Vendor Routes Start =============================================//
Route::get('/vendor-signup',[VendorAuthController::class, 'vendorSignup'])->name('vendor.signup.page');
Route::get('/vendor-login',[VendorAuthController::class, 'vendorLogin'])->name('vendor.login.page');

// =========================== Vendor Routes Start =============================================//