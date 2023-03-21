<?php
use App\Http\Controllers\HomeController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\ServiceController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ZoneController;
use App\Http\Controllers\ZonepartnerController;
use App\Http\Controllers\CompAnnouncementController;
use App\Http\Controllers\DealsoftheDayController;
use App\Http\Controllers\RecentlyviewedController;
use App\Http\Controllers\BestDiscountController;
use App\Http\Controllers\ZonalFranchiseController;
use App\Http\Controllers\DistrictFranchiseController;
use App\Http\Controllers\BlockFranchiseController;
use App\Http\Controllers\DistrictpartnerController;
use App\Http\Controllers\BlockpartnerController;
use App\Http\Controllers\EmployeeFranchiseController;
use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\MerchantFranchiseController;
use App\Http\Controllers\MerchantController;
use App\Http\Controllers\WebsitebannerController;
use App\Http\Controllers\ClientReviewController;
use App\Http\Controllers\SubcategoryController;
use App\Http\Controllers\MegacategoryController;
use App\Http\Controllers\TeamMemberController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\MonthlyfeeController;
use App\Http\Controllers\DeliverytypeController;
use Illuminate\Support\Facades\Route;



// Frontend Routes Start Here..........................................
Route::controller(HomeController::class)->group(function(){
    Route::get('/','index');
    Route::get('/about-us','about_us');
    Route::get('/mission','mission');
    Route::get('/services','services');
    Route::get('/block-franchise','block_franchise');
    Route::get('/district-franchise','district_franchise');
    Route::get('/zonal-franchise','zonal_franchise');
    Route::get('/career','career');
    Route::get('/contact-us','contact_us');
    Route::get('/thankyou','thankyou');
    Route::post('/submit_contact','submit_contact');
});

// Frontend Routes End Here..........................................





// Admin Routes Start Here################################################
Route::controller(AdminController::class)->group(function(){
    Route::get('/admin','index');
    Route::post('/admin_login','admin_login');
    Route::get('/admin/admin_logout','admin_logout');
});
Route::group(['middleware'=>'admin'],function(){
    Route::get('/admin/dashboard',[AdminController::class,'dashboard']);
    Route::get('/admin/profile',[AdminController::class,'profile']);
    Route::post('/admin/update_profile',[AdminController::class,'update_profile']);
    Route::post('/admin/update_password',[AdminController::class,'update_password']);
    Route::get('/admin/change-password',[AdminController::class,'change_password']);

    Route::resource('/admin/user', UserController::class);
    Route::resource('/admin/service', ServiceController::class);
    Route::resource('/admin/category', CategoryController::class);
    Route::resource('/admin/subcategory', SubcategoryController::class);
    Route::resource('/admin/megacategory', MegacategoryController::class);
    Route::post('/admin/get_subcategory', [MegacategoryController::class,'get_subcategory']);
    Route::resource('/admin/zone', ZoneController::class);
    Route::resource('/admin/zonepartner', ZonepartnerController::class);

    Route::get('/admin/districtpartner', [DistrictpartnerController::class,'index']);
    Route::get('/admin/districtpartner/edit/{id}', [DistrictpartnerController::class, 'edit']);
    Route::post('/admin/districtpartner/update', [DistrictpartnerController::class, 'update']);
    Route::post('/admin/districtpartner/delete', [DistrictpartnerController::class, 'destroy']);

    Route::get('/admin/blockpartner', [BlockpartnerController::class,'index']);
    Route::get('/admin/blockpartner/edit/{id}', [BlockpartnerController::class, 'edit']);
    Route::post('/admin/blockpartner/update', [BlockpartnerController::class, 'update']);
    Route::post('/admin/blockpartner/delete', [BlockpartnerController::class, 'destroy']);


    Route::get('/admin/employee', [EmployeeController::class,'index']);
    Route::get('/admin/employee/edit/{id}', [EmployeeController::class, 'edit']);
    Route::post('/admin/employee/update', [EmployeeController::class, 'update']);
    Route::post('/admin/employee/delete', [EmployeeController::class, 'destroy']);

    Route::get('/admin/merchant', [MerchantController::class,'index']);
    Route::get('/admin/merchant/edit/{id}', [MerchantController::class, 'edit']);
    Route::post('/admin/merchant/update', [MerchantController::class, 'update']);
    Route::post('/admin/merchant/delete', [MerchantController::class, 'destroy']);

    Route::resource('/admin/websitebanner', WebsitebannerController::class);
    Route::get('/admin/websitebanner/edit/{id}', [WebsitebannerController::class, 'edit']);
    Route::post('/admin/websitebanner/update', [WebsitebannerController::class, 'update']);
    Route::post('/admin/websitebanner/delete', [WebsitebannerController::class, 'destroy']);

    Route::resource('/admin/company-announcement', CompAnnouncementController::class);
    Route::get('/admin/company-announcement/edit/{id}', [CompAnnouncementController::class, 'edit']);
    Route::post('/admin/company-announcement/update', [CompAnnouncementController::class, 'update']);
    Route::post('/admin/company-announcement/delete', [CompAnnouncementController::class, 'destroy']);

    Route::resource('/admin/deals-of-the-day', DealsoftheDayController::class);
    Route::get('/admin/deals-of-the-day/edit/{id}', [DealsoftheDayController::class, 'edit']);
    Route::post('/admin/deals-of-the-day/update', [DealsoftheDayController::class, 'update']);
    Route::post('/admin/deals-of-the-day/delete', [DealsoftheDayController::class, 'destroy']);

    Route::resource('/admin/recently-viewed', RecentlyviewedController::class);
    Route::get('/admin/recently-viewed/edit/{id}', [RecentlyviewedController::class, 'edit']);
    Route::post('/admin/recently-viewed/update', [RecentlyviewedController::class, 'update']);
    Route::post('/admin/recently-viewed/delete', [RecentlyviewedController::class, 'destroy']);

    Route::resource('/admin/best-discount', BestDiscountController::class);
    Route::get('/admin/best-discount/edit/{id}', [BestDiscountController::class, 'edit']);
    Route::post('/admin/best-discount/update', [BestDiscountController::class, 'update']);
    Route::post('/admin/best-discount/delete', [BestDiscountController::class, 'destroy']);

    Route::resource('/admin/teammember', TeamMemberController::class);
    Route::get('/admin/teammember/edit/{id}', [TeamMemberController::class, 'edit']);
    Route::post('/admin/teammember/update', [TeamMemberController::class, 'update']);
    Route::post('/admin/teammember/delete', [TeamMemberController::class, 'destroy']);


    Route::resource('/admin/clientreview', ClientReviewController::class);
    Route::get('/admin/clientreview/edit/{id}', [ClientReviewController::class, 'edit']);
    Route::post('/admin/clientreview/update', [ClientReviewController::class, 'update']);
    Route::post('/admin/clientreview/delete', [ClientReviewController::class, 'destroy']);

    Route::get('/admin/razorpay', [AdminController::class, 'razorpay']);
    Route::post('/admin/update_razorpay', [AdminController::class, 'update_razorpay']);


    Route::resource('/admin/monthlyfee', MonthlyfeeController::class);
    Route::resource('/admin/deliverytype', DeliverytypeController::class);

    });
// Admin Routes End Here####################################################


// Zonal Franchise Routes Start Here################################################
Route::controller(ZonalFranchiseController::class)->group(function(){
    Route::get('/zonal-franchise','index');
    Route::post('/zonal-franchise/login','login');
    Route::get('/zonal-franchise/logout','logout');
});

Route::group(['middleware'=>'zonepartner'],function(){
    Route::get('/zonal-franchise/dashboard',[ZonalFranchiseController::class,'dashboard']);
    Route::get('/zonal-franchise/profile',[ZonalFranchiseController::class,'profile']);
    Route::post('/zonal-franchise/update_profile',[ZonalFranchiseController::class,'update_profile']);
    Route::get('/zonal-franchise/change-password',[ZonalFranchiseController::class,'change_password']);
    Route::post('/zonal-franchise/update_password',[ZonalFranchiseController::class,'update_password']);
    Route::get('/zonal-franchise/logout',[ZonalFranchiseController::class,'logout']);

    Route::get('/zonal-franchise/district-partner',[ZonalFranchiseController::class,'view_districtpartner']);
    Route::get('/zonal-franchise/districtpartner/create',[ZonalFranchiseController::class,'create_districtpartner']);
    Route::post('/zonal-franchise/districtpartner/store',[ZonalFranchiseController::class,'store_districtpartner']);
    Route::get('/zonal-franchise/districtpartner/edit/{id}', [ZonalFranchiseController::class, 'edit_districtpartner']);
    Route::post('/zonal-franchise/districtpartner/update', [ZonalFranchiseController::class, 'update_districtpartner']);
    Route::post('/zonal-franchise/districtpartner/delete', [ZonalFranchiseController::class, 'destroy_districtpartner']);

    Route::get('/zonal-franchise/block-partner',[ZonalFranchiseController::class,'view_blockpartner']);
    Route::get('/zonal-franchise/employee',[ZonalFranchiseController::class,'view_employee']);
    Route::get('/zonal-franchise/merchant',[ZonalFranchiseController::class,'view_merchant']);

    });
// Zonal Franchise Routes End Here################################################


// District Franchise Routes Start Here################################################
Route::controller(DistrictFranchiseController::class)->group(function(){
    Route::get('/district-franchise','index');
    Route::post('/district-franchise/login','login');
    Route::get('/district-franchise/logout','logout');
});

Route::group(['middleware'=>'districtpartner'],function(){
    Route::get('/district-franchise/dashboard',[DistrictFranchiseController::class,'dashboard']);
    Route::get('/district-franchise/profile',[DistrictFranchiseController::class,'profile']);
    Route::post('/district-franchise/update_profile',[DistrictFranchiseController::class,'update_profile']);
    Route::get('/district-franchise/change-password',[DistrictFranchiseController::class,'change_password']);
    Route::post('/district-franchise/update_password',[DistrictFranchiseController::class,'update_password']);
    Route::get('/district-franchise/logout',[DistrictFranchiseController::class,'logout']);

    Route::get('/district-franchise/blockpartner',[DistrictFranchiseController::class,'view_blockpartner']);
    Route::get('/district-franchise/blockpartner/create',[DistrictFranchiseController::class,'create_blockpartner']);
    Route::post('/district-franchise/blockpartner/store',[DistrictFranchiseController::class,'store_blockpartner']);
    Route::get('/district-franchise/blockpartner/edit/{id}', [DistrictFranchiseController::class, 'edit_blockpartner']);
    Route::post('/district-franchise/blockpartner/update', [DistrictFranchiseController::class, 'update_blockpartner']);
    Route::post('/district-franchise/blockpartner/delete', [DistrictFranchiseController::class, 'destroy_blockpartner']);

    Route::get('/district-franchise/employee',[DistrictFranchiseController::class,'view_employee']);
    Route::get('/district-franchise/merchant',[DistrictFranchiseController::class,'view_merchant']);
    });
// District Franchise Routes End Here################################################


// Block Franchise Routes Start Here################################################
Route::controller(BlockFranchiseController::class)->group(function(){
    Route::get('/block-franchise','index');
    Route::post('/block-franchise/login','login');
    Route::get('/block-franchise/logout','logout');
});

Route::group(['middleware'=>'blockpartner'],function(){
    Route::get('/block-franchise/dashboard',[BlockFranchiseController::class,'dashboard']);
    Route::get('/block-franchise/profile',[BlockFranchiseController::class,'profile']);
    Route::post('/block-franchise/update_profile',[BlockFranchiseController::class,'update_profile']);
    Route::get('/block-franchise/change-password',[BlockFranchiseController::class,'change_password']);
    Route::post('/block-franchise/update_password',[BlockFranchiseController::class,'update_password']);
    Route::get('/block-franchise/logout',[BlockFranchiseController::class,'logout']);

    Route::get('/block-franchise/employee',[BlockFranchiseController::class,'view_employee']);
    Route::get('/block-franchise/employee/create',[BlockFranchiseController::class,'create_employee']);
    Route::post('/block-franchise/employee/store',[BlockFranchiseController::class,'store_employee']);
    Route::get('/block-franchise/employee/edit/{id}', [BlockFranchiseController::class, 'edit_employee']);
    Route::post('/block-franchise/employee/update', [BlockFranchiseController::class, 'update_employee']);
    Route::post('/block-franchise/employee/delete', [BlockFranchiseController::class, 'destroy_employee']);

    Route::get('/block-franchise/merchant',[BlockFranchiseController::class,'view_merchant']);
    });
// District Franchise Routes End Here################################################


// Employee Franchise Routes Start Here################################################
Route::controller(EmployeeFranchiseController::class)->group(function(){
    Route::get('/employee','index');
    Route::post('/employee/login','login');
    Route::get('/employee/logout','logout');
});

Route::group(['middleware'=>'employee'],function(){
    Route::get('/employee/dashboard',[EmployeeFranchiseController::class,'dashboard']);
    Route::get('/employee/profile',[EmployeeFranchiseController::class,'profile']);
    Route::post('/employee/update_profile',[EmployeeFranchiseController::class,'update_profile']);
    Route::get('/employee/change-password',[EmployeeFranchiseController::class,'change_password']);
    Route::post('/employee/update_password',[EmployeeFranchiseController::class,'update_password']);
    Route::get('/employee/logout',[EmployeeFranchiseController::class,'logout']);

    Route::get('/employee/merchant',[EmployeeFranchiseController::class,'view_merchant']);
    Route::get('/employee/merchant/create',[EmployeeFranchiseController::class,'create_merchant']);
    Route::post('/employee/merchant/store',[EmployeeFranchiseController::class,'store_merchant']);

    
    });
// Employee Franchise Routes End Here################################################


// Merchant Franchise Routes Start Here################################################
Route::controller(MerchantFranchiseController::class)->group(function(){
    Route::get('/merchant','index');
    Route::post('/merchant/login','login');
    Route::get('/merchant/logout','logout');
});

Route::group(['middleware'=>'merchant'],function(){
    Route::get('/merchant/dashboard',[MerchantFranchiseController::class,'dashboard']);
    Route::get('/merchant/profile',[MerchantFranchiseController::class,'profile']);
    Route::post('/merchant/update_profile',[MerchantFranchiseController::class,'update_profile']);
    Route::get('/merchant/change-password',[MerchantFranchiseController::class,'change_password']);
    Route::post('/merchant/update_password',[MerchantFranchiseController::class,'update_password']);
    Route::get('/merchant/logout',[MerchantFranchiseController::class,'logout']);

    Route::resource('/merchant/product', ProductController::class);
    Route::post('/merchant/get_subcategory', [ProductController::class,'get_subcategory']);
    Route::post('/merchant/get_megacategory', [ProductController::class,'get_megacategory']);

    });
// Merchant Franchise Routes End Here################################################
    