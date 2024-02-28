<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DP\DPDashboardController;
use App\Http\Controllers\DSD\DSDServiceController;
use App\Http\Controllers\DPK\DPKDashboardController;
use App\Http\Controllers\DSD\DSDDashboardController;
use App\Http\Controllers\DSD\DSDAdministrationController;
use App\Http\Controllers\Qurban\QurbanDashboardController;
use App\Http\Controllers\Ramadhan\RamadhanDashboardController;

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
    return view('index');
});

Route::prefix('dpk')
    ->group(function() {
        Route::get('/', [DPKDashboardController::class, 'index']);
    });

Route::prefix('dp')
    ->group(function() {
        Route::get('/', [DPDashboardController::class, 'index']);
    });

Route::prefix('dsd')
    ->group(function() {
        Route::get('/', [DSDDashboardController::class, 'index']);
        Route::resource('/administrations', DSDAdministrationController::class, [
            'names' => [
                'index' => 'dsd.administration.index',
                'show' => 'dsd.administration.show',
                'create' => 'dsd.administration.create',
                'store' => 'dsd.administration.store',
                'destroy' => 'dsd.administration.destroy',
            ]
        ]);

        Route::resource('/services', DSDServiceController::class, [
            'names' => [
                'index' => 'dsd.service.index',
                'show' => 'dsd.service.show',
                'create' => 'dsd.service.create',
                'store' => 'dsd.service.store',
                'destroy' => 'dsd.service.destroy',
            ]
        ]);
    });

Route::prefix('ramadhan')
    ->group(function() {
        Route::get('/', [RamadhanDashboardController::class, 'index']);
    });

Route::prefix('qurban')
    ->group(function() {
        Route::get('/', [QurbanDashboardController::class, 'index']);
    });