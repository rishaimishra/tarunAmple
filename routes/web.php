<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CustomerWeb\CustomerAuthController;
use App\Http\Controllers\VendorWeb\VendorAuthController;
use App\Http\Controllers\AdminWeb\AdminAuthController;
use App\Http\Controllers\CustomerWeb\StoreCategoryController;
use App\Http\Controllers\CustomerWeb\ProductsController;
use App\Http\Controllers\CustomerWeb\StaticPageController;

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


Route::get('/password-hash-member',[CustomerAuthController::class, 'passwordHashMember']);
Route::get('/password-hash-vendor',[VendorAuthController::class, 'passwordHashVendor']);



// =========================== Customer Routes Start =============================================//

// login and reg
Route::get('/member-signup',[CustomerAuthController::class, 'memberSignup'])->name('member.signup.page');
Route::post('/member-register',[CustomerAuthController::class, 'memberRegister'])->name('member.register.post');
Route::get('member-verification/{id}/{link}',[CustomerAuthController::class, 'memberVerification'])->name('member.verification.email');


Route::get('/member-login',[CustomerAuthController::class, 'memberLogin'])->name('member.login.page');
Route::post('/member-login/post',[CustomerAuthController::class, 'memberLoginPost'])->name('member.login.post');


// store and category
Route::get('/stores',[StoreCategoryController::class, 'StorePage'])->name('store.page');
Route::get('/category',[StoreCategoryController::class, 'CategoryPage'])->name('category.page');



// product and product details
Route::get('/products',[ProductsController::class, 'productsPage'])->name('member.products.page');
Route::get('/product-details',[ProductsController::class, 'productDetailsPage'])->name('member.product.details.page');
// =========================== Customer Routes End =============================================//












// =========================== Vendor Routes Start =============================================//
Route::get('/vendor-signup',[VendorAuthController::class, 'vendorSignup'])->name('vendor.signup.page');
Route::post('/vendor-register',[VendorAuthController::class, 'vendorRegister'])->name('vendor.register.post');


Route::get('/vendor-login',[VendorAuthController::class, 'vendorLogin'])->name('vendor.login.page');
Route::post('/vendor-login/post',[VendorAuthController::class, 'vendorLoginPost'])->name('vendor.login.post');

// =========================== Vendor Routes Start =============================================//











// =========================== Admin Routes Start =============================================//
Route::get('/admin-login',[AdminAuthController::class, 'adminLogin'])->name('admin.login.page');
Route::post('/admin-login/post',[AdminAuthController::class, 'adminLoginPost'])->name('admin.login.post');

// =========================== Admin Routes End =============================================//