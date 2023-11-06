<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CustomerWeb\CustomerAuthController;
use App\Http\Controllers\VendorWeb\VendorAuthController;
use App\Http\Controllers\AdminWeb\AdminAuthController;
use App\Http\Controllers\CustomerWeb\StoreCategoryController;
use App\Http\Controllers\CustomerWeb\ProductsController;
use App\Http\Controllers\CustomerWeb\StaticPageController;
use App\Http\Controllers\AdminWeb\AdminCrudController;
use App\Http\Controllers\AdminWeb\AdminBannerController;

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

Route::get('/admin/login', function () {
    return view('admin.auth.login');
});

Route::get('/admin/dashboard', function () {
    return view('member.static.adminPannel');
});

Route::get('/faq', function () {
    return view('member.static.faq');
});

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













// ===================== Super Admin and Admin Routes Start =============================================//
Route::get('/admin-login',[AdminAuthController::class, 'adminLogin'])->name('admin.login.page');
Route::post('/admin-login/post',[AdminAuthController::class, 'adminLoginPost'])->name('admin.login.post');
Route::any('/logout', [AdminAuthController::class, 'logout'])->name('admin.logout');

//dashboard
Route::get('/admin-dashboard',[AdminAuthController::class, 'adminDashboard'])->name('admin.dashboard');


//admin crud
Route::get('/admin-add', [AdminCrudController::class, 'admin_add_page'])->name('admin.add.page');
Route::post('/different-types-admin-add', [AdminCrudController::class, 'different_type_admin_add'])->name('different.types.admin.add');
Route::get('/admin-list', [AdminCrudController::class, 'admin_list_page'])->name('admin.list.page');
Route::get('/admin-edit', [AdminCrudController::class, 'admin_edit_page'])->name('admin.edit.page');


//banner crud
Route::get('/admin-banner-list', [AdminBannerController::class, 'admin_banner_list'])->name('admin.banner.list');
Route::get('/admin-banner-add', [AdminBannerController::class, 'admin_banner_add_page'])->name('admin.banner.add.page');
Route::post('/admin-banner-add/post', [AdminBannerController::class, 'admin_banner_add_post'])->name('admin.banner.add.post');

// =========================== Admin Routes End =============================================//