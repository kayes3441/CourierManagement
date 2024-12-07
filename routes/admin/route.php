<?php

use App\Enums\ViewPath\Admin\Dashboard;
use App\Enums\ViewPath\Admin\CourierEnum;
use App\Enums\ViewPath\Admin\PackageEnum;
use App\Http\Controllers\Admin\Auth\LoginController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\CourierController;
use App\Http\Controllers\Admin\PackageController;
use Illuminate\Support\Facades\Route;
Route::get('/', function () { return redirect()->route('login');});

Route::group(['prefix' => 'login'], function () {
    Route::get('', [LoginController::class, 'index'])->name('login');
    Route::post('', [LoginController::class, 'login']);
});

Route::group(['prefix'=>'admin','as'=>'admin.',],function (){
    Route::group(['middleware'=>'admin',],function (){
        Route::get(Dashboard::INDEX[URI],[DashboardController::class,'index'])->name('dashboard.index');

        Route::get('/logout',[LoginController::class,'logout'])->name('logout');

        Route::controller(PackageController::class)->prefix('package')->name('package.')->group(function (){
            Route::get(PackageEnum::LIST[URI].'/'.'{status}','getList')->name('list');
            Route::group(['middleware'=>['module:package_management']], function () {
                Route::get(PackageEnum::INDEX[URI],'index')->name('index');
                Route::post(PackageEnum::INDEX[URI],'add');
                Route::get(PackageEnum::UPDATE[URI].'/'.'{id}','getUpdateView')->name('update');
                Route::post(PackageEnum::UPDATE[URI].'/'.'{id}','update');
                Route::get(PackageEnum::DELETE[URI].'/'.'{id}','delete')->name('delete');
            });

            Route::group(['middleware'=>['module:package_management_update']], function () {
                Route::get(PackageEnum::UPDATE_STATUS[URI].'/'.'{id}','getUpdateStatusView')->name('update-status');
                Route::post(PackageEnum::UPDATE_STATUS[URI].'/'.'{id}','updateStatus');

            });
        });

        Route::controller(CourierController::class)->prefix('courier')->name('courier.')->group(function (){
            Route::group(['middleware'=>['module:courier_management']], function () {
                Route::get(CourierEnum::INDEX[URI],'index')->name('index');
                Route::post(CourierEnum::INDEX[URI],'add');
                Route::get(CourierEnum::LIST[URI],'getList')->name('list');
                Route::get(CourierEnum::DELETE[URI].'/'.'{id}','delete')->name('delete');
            });
        });
    });
});
