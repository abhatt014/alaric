<?php
//admin controllers
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\AssetController;
use App\Http\Controllers\Admin\AssetAssignmentController;
use App\Http\Controllers\Admin\LoginController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\AssetReturnRequestController;
//user controllers
use App\Http\Controllers\User\LoginController as UserLoginController;
use App\Http\Controllers\User\DashboardController as UserDashboardController;
use App\Http\Controllers\User\AssetController as UserAssetController;
use App\Http\Controllers\User\AssetAssignmentController as UserAssetAssignmentController;
use App\Http\Controllers\User\AssetReturnRequestController as UserAssetReturnRequestController;
//hr controllers
use App\Http\Controllers\Hr\LoginController as HrLoginController;
use App\Http\Controllers\Hr\DashboardController as HrDashboardController;
use App\Http\Controllers\Hr\AssetController as HrAssetController;
use App\Http\Controllers\Hr\AssetAssignmentController as HrAssetAssignmentController;
use App\Http\Controllers\Hr\AssetReturnRequestController as HrAssetReturnRequestController;




//User Routes
Route::prefix('user')->group(function () {
    Route::middleware('guest')->group(function () {
        Route::get('login', [UserLoginController::class, 'index'])->name('user.login');
        Route::post('authenticate', [UserLoginController::class, 'authenticate'])->name('user.authenticate');
    });
    Route::middleware('auth')->group(function () {
        Route::get('dashboard', [UserDashboardController::class, 'index'])->name('user.dashboard');
        Route::get('logout', [UserLoginController::class, 'logout'])->name('user.logout');
        Route::get('assets', [UserAssetController::class, 'index'])->name('user.assets');
        Route::get('assets/{asset}/view', [UserAssetController::class, 'show'])->name('user.assets.view');
        Route::get('return', [UserAssetAssignmentController::class, 'index'])->name('user.return');
        Route::post('return', [UserAssetReturnRequestController::class, 'store'])->name('user.returnasset');
        Route::get('returnrequest/{id}', [UserAssetReturnRequestController::class, 'show'])->name('user.return-request.show');
        Route::patch('returnrequest/{id}', [UserAssetReturnRequestController::class, 'cancel'])->name('user.return-request.cancel');
    });
});



//admin routes
Route::group(['prefix' => 'admin'], function () {

    //guest middleware for admin
    Route::group(['middleware' => 'admin.guest'], function () {
        //show admin login form
        Route::get('login', [LoginController::class, 'index'])->name('admin.login');
        //authenticate admin user
        Route::post('authenticate', [LoginController::class, 'authenticate'])->name('admin.authenticate');
    });
    //auth middleware for admin
    Route::group(['middleware' => 'admin.auth'], function () {
        //show admin dashboard
        Route::get('dashboard', [DashboardController::class, 'index'])->name('admin.dashboard');
        // admin logout
        Route::get('logout', [LoginController::class, 'logout'])->name('admin.logout');

        //show all assets
        Route::get('assets', [AssetController::class, 'index'])->name('admin.assets');
        //show add new asset form
        Route::get('addnewasset', [AssetController::class, 'create'])->name('admin.addnewasset');
        //store new asset to db with image processing 
        Route::post('addnewasset', [AssetController::class, 'store'])->name('admin.storenewasset');
        //show edit  asset form
        Route::get('assets/{asset}/edit', [AssetController::class, 'edit'])->name('admin.assets.edit');
        //update existing asset
        Route::put('assets/update/{id}', [AssetController::class, 'update'])->name('admin.assets.update');

        //show assign asset form AssetAssignmentController
        Route::get('assign', [AssetAssignmentController::class, 'index'])->name('admin.assign');
        //store asset assignment to db
        Route::post('assign', [AssetAssignmentController::class, 'assign'])->name('admin.assignasset');

        //show asset return form
        Route::get('return/{asset}/{user}', [AssetReturnRequestController::class, 'create'])->name('admin.return');

        //show view returns requests page 
        Route::get('returns/view/{assetReturnRequest}', [AssetReturnRequestController::class, 'index'])->name('admin.viewreturns');

        //create new return request
        Route::post('return/create/{asset}/{user}', [AssetReturnRequestController::class, 'requestcreate'])->name('admin.createreturn');
        //Process return request
        Route::post('returns/process/{assetReturnRequest}', [AssetReturnRequestController::class, 'store'])->name('admin.processreturn');
        //Cancel return request
        Route::get('returns/cancel/{assetReturnRequest}', [AssetReturnRequestController::class, 'cancel'])->name('admin.cancelreturn');

        //show users page
        Route::get('users', [UserController::class, 'index'])->name('admin.users');
        //show add user page
        Route::get('users/create', [UserController::class, 'create'])->name('admin.user.create');
        //store new user
        Route::post('users', [UserController::class, 'store'])->name('admin.user.store');
        //show edit user page
        Route::get('users/{user}/edit', [UserController::class, 'edit'])->name('admin.user.edit');
        //update user
        Route::put('users/{user}/update/', [UserController::class, 'update'])->name('admin.user.update');
    });
});

//hr routes
Route::group(['prefix' => 'hr'], function () {

    //guest middleware for hr
    Route::group(['middleware' => 'hr.guest'], function () {
        //show admin login form
        Route::get('login', [HrLoginController::class, 'index'])->name('hr.login');
        //authenticate hr user
        Route::post('authenticate', [HrLoginController::class, 'authenticate'])->name('hr.authenticate');
    });

    //auth middleware for hr
    Route::group(['middleware' => 'hr.auth'], function () {
        //show hr dashboard
        Route::get('dashboard', [HrDashboardController::class, 'index'])->name('hr.dashboard');
        // hr logout
        Route::get('logout', [HrLoginController::class, 'logout'])->name('hr.logout');

        //show all assets
        Route::get('assets', [HrAssetController::class, 'index'])->name('hr.assets');

        // display return request details
        Route::get('returnrequest/{id}', [HrAssetReturnRequestController::class, 'show'])->name('hr.return-request.show');

        //Process return request
        Route::post('returns/process/{assetReturnRequest}', [HrAssetReturnRequestController::class, 'store'])->name('hr.processreturn');
        //Cancel return request
        Route::get('returns/cancel/{assetReturnRequest}', [HrAssetReturnRequestController::class, 'cancel'])->name('hr.cancelreturn');
    });
});
