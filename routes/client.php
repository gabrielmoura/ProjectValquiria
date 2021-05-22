<?php

use App\Http\Controllers\Auth\DashController;
use App\Http\Controllers\Client\OrderController;
use Illuminate\Support\Facades\Route;

Route::group(['middleware' => 'auth:web'], function () {
    Route::get('/redirDASH', [DashController::class, '__invoke'])->name('redirDASH');


    /*
    |------------------------------------------------------------------------------------
    | Admin
    |------------------------------------------------------------------------------------
    */


//Route::get('/dash', [\App\Http\Controllers\DashboardController::class, 'index'])->name('dash');
    Route::get('/me/setting', function () {
        return view('auth.profile.profile');
    })->name('user.setting');

    Route::group(['prefix' => 'dash'], function () {
        //Route::get('/dash', [HomeController::class, 'index'])->name('dash.index');
        Route::get('/', [OrderController::class, 'index'])->name('client.index');
    });
});
