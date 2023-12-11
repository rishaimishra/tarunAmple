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
use App\Http\Controllers\AdminWeb\CategoryController;
use App\Http\Controllers\AdminWeb\BrandController;
use App\Http\Controllers\AdminWeb\ProductController;


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

// Route::get('/admin/dashboard', function () {
//     return view('member.static.adminPannel');
// });




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
Route::get('/product-details/{id}',[ProductsController::class, 'productDetailsPage'])->name('member.product.details.page');

// =========================== Customer Routes End =============================================//


























// =========================== Vendor Routes Start =============================================//
Route::get('/vendor-signup',[VendorAuthController::class, 'vendorSignup'])->name('vendor.signup.page');
Route::post('/vendor-register',[VendorAuthController::class, 'vendorRegister'])->name('vendor.register.post');


Route::get('/vendor-login',[VendorAuthController::class, 'vendorLogin'])->name('vendor.login.page');
Route::post('/vendor-login/post',[VendorAuthController::class, 'vendorLoginPost'])->name('vendor.login.post');

// =========================== Vendor Routes Start =============================================//


























// ===================== Super Admin and Admin Routes Start ========================================//
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
Route::get('/admin/banner-management/list', [AdminBannerController::class, 'admin_banner_list'])->name('admin.banner.list');
Route::get('/admin/banner-management/add', [AdminBannerController::class, 'admin_banner_add_page'])->name('admin.banner.add.page');
Route::post('/admin/banner-management/add/post', [AdminBannerController::class, 'admin_banner_add_post'])->name('admin.banner.add.post');
Route::get('/admin/banner-management/show-status', [AdminBannerController::class, 'admin_banner_show_status'])->name('admin.show.banner');
Route::get('/admin-video-add-status', [AdminBannerController::class, 'admin_video_show_status'])->name('admin.show.video');
Route::get('/admin/banner-management/edit/{id}', [AdminBannerController::class, 'admin_banner_edit_page'])->name('admin.banner.edit.page');
Route::post('/admin/banner-management/update', [AdminBannerController::class, 'admin_banner_update'])->name('admin.banner.update');
Route::get('/admin/banner-management/delete/{id}', [AdminBannerController::class, 'admin_banner_delete'])->name('admin.banner.delete');



// category crud
Route::get('admin/category-management/add', [CategoryController::class, 'create'])->name('admin.category.add');
Route::post('admin/category-management/add', [CategoryController::class, 'store'])->name('admin.category.store');
Route::get('admin/category-management/list', [CategoryController::class, 'index'])->name('admin.category.list');
Route::get('admin/category-management/update/{id}', [CategoryController::class, 'edit'])->name('admin.category.edit');
Route::post('admin/category-management/update', [CategoryController::class, 'update'])->name('admin.category.update');
Route::get('admin/category-management/delete/{id}', [CategoryController::class, 'delete'])->name('admin.category.delete');
Route::get('admin/category-management/active/{id}', [CategoryController::class, 'active'])->name('admin.category.active');
Route::get('admin/category-management/deactive/{id}', [CategoryController::class, 'deactive'])->name('admin.category.deactive');



// sub category crud
Route::get('admin/sub-category-management/add', [CategoryController::class, 'sub_create'])->name('admin.sub.category.add');
Route::post('admin/sub-category-management/add', [CategoryController::class, 'sub_store'])->name('admin.sub.category.store');
Route::get('admin/sub-category-management/list', [CategoryController::class, 'sub_index'])->name('admin.sub.category.list');
Route::get('admin/sub-category-management/update/{id}', [CategoryController::class, 'sub_edit'])->name('admin.sub.category.edit');
Route::post('admin/sub-category-management/update', [CategoryController::class, 'sub_update'])->name('admin.sub.category.update');
Route::get('admin/sub-category-management/delete/{id}', [CategoryController::class, 'sub_delete'])->name('admin.sub.category.delete');
Route::get('admin/sub-category-management/active/{id}', [CategoryController::class, 'sub_active'])->name('admin.sub.category.active');
Route::get('admin/sub-category-management/deactive/{id}', [CategoryController::class, 'sub_deactive'])->name('admin.sub.category.deactive');




// sub2 category crud
Route::get('admin/sub2-category-management/add', [CategoryController::class, 'sub2_create'])->name('admin.sub2.category.add');
Route::post('admin/sub2-category-management/add', [CategoryController::class, 'sub2_store'])->name('admin.sub2.category.store');
Route::get('admin/sub2-category-management/list', [CategoryController::class, 'sub2_index'])->name('admin.sub2.category.list');
Route::get('admin/sub2-category-management/update/{id}', [CategoryController::class, 'sub2_edit'])->name('admin.sub2.category.edit');
Route::post('admin/sub2-category-management/update', [CategoryController::class, 'sub2_update'])->name('admin.sub2.category.update');
Route::get('admin/sub2-category-management/delete/{id}', [CategoryController::class, 'sub2_delete'])->name('admin.sub2.category.delete');
Route::get('admin/sub2-category-management/active/{id}', [CategoryController::class, 'sub2_active'])->name('admin.sub2.category.active');
Route::get('admin/sub2-category-management/deactive/{id}', [CategoryController::class, 'sub2_deactive'])->name('admin.sub2.category.deactive');




//home brand banner
Route::get('admin/home-brand-banner/list', [BrandController::class, 'index'])->name('admin.home.brand.slider');
Route::post('admin/home-brand-banner/add', [BrandController::class, 'addBrandSlider'])->name('admin.home.brand.slider.add');
Route::post('admin/home-brand-banner/update', [BrandController::class, 'updateBrandSlider'])->name('admin.home.brand.slider.update');
Route::get('admin/home-brand-banner/delete/{id}', [BrandController::class, 'deleteBrandSlider'])->name('admin.home.brand.slider.delete');




//product crud
Route::get('admin/product-management/add', [ProductController::class, 'product_add_page'])->name('admin.product.add.page');
Route::any('/load-states/{id}', [ProductController::class, 'getStates']);
Route::any('/load-cities/{state_id}', [ProductController::class, 'getCity']);
Route::post('/filterviewproductsnew', [ProductController::class, 'filterviewproductsnew'])->name('filterviewproductsnew');
Route::post('/admin/product-management/insert', [ProductController::class, 'product_insert'])->name('admin.product.insert');
Route::any('/admin/product-management/list', [ProductController::class, 'product_list'])->name('admin.product.list');
Route::post('/remproduct', [ProductController::class, 'remproduct'])->name('remproduct');
Route::get('admin/product-edit/{id}', [ProductController::class, 'product_edit'])->name('product_edit');
Route::get('admin/deletedetailproimg/{id}', [ProductController::class, 'deletedetailproimg'])->name('deletedetailproimg');
Route::get('admin/deleteproattributes/{id}', [ProductController::class, 'deleteproattributes'])->name('deleteproattributes');
Route::get('admin/deletedatewiseproduct/{id}', [ProductController::class, 'deletedatewiseproduct'])->name('deletedatewiseproduct');
Route::get('admin/deleteproductdetailimage/{id}', [ProductController::class, 'deleteproductdetailimage'])->name('deleteproductdetailimage');

// =========================== Admin Routes End =============================================//