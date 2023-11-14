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

use Illuminate\Support\Facades\DB;
Route::get('/admin/all-brands', function () {
    // $countryCode = $this->getUserRemoteData();

    $query = DB::table('tbl_admin')
        ->select(
            'tbl_admin.ufullname as vendor_name',
            'tbl_admin.uemail as vendor_email',
            'tbl_admin.ustatus as vendor_status',
            'tbl_vendor.tbl_vndr_phone as vendor_phone',
            'tbl_vendor.tbl_vndr_adr as vendor_address',
            'tbl_vendor.tbl_vndr_city as vendor_city',
            'tbl_vendor.tbl_vndr_state as vendor_state',
            'tbl_vendor.tbl_vndr_country as vendor_country',
            'tbl_vendor.tbl_vndr_comp as vendor_company',
            'tbl_vendor.tbl_vndr_dispname as vendor_displayname',
            'tbl_vendor_images.tbl_vndr_img_pro as vendor_profileimage'
        )
        ->leftJoin('tbl_vendor', 'tbl_vendor.tbl_admin_uid', '=', 'tbl_admin.u_id')
        ->leftJoin('tbl_vendor_images', 'tbl_vendor_images.tbl_vndr_uid', '=', 'tbl_vendor.tbl_vndr_id')
        ->where('tbl_vndr_comp', 'LIKE', @$letter . '%')
        ->where('tbl_admin.ustatus', '!=', 0)
        ->where('tbl_admin.utype', '=', 2)
        ->where('tbl_admin.isdeleted', '=', 0)
        ->where('tbl_vendor.tbl_vndr_brand_status', '=', 0)
        ->where('tbl_vendor.tbl_vndr_store_status', '=', 1);

    // if (!empty($countryCode) && $countryCode['is_enable'] == 1) {
    //     $codeCountry = $countryCode['country_code'];
    //     $query->where('tbl_vendor.vendor_country', '=', $codeCountry);
    // }

    $query->orderBy('tbl_vendor.tbl_vndr_id');

    $result = $query->get();
    
    return $result;
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


// =========================== Admin Routes End =============================================//