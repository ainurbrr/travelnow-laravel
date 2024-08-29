<?php

use App\Http\Controllers\Admin\GalleryController;
use App\Http\Controllers\Admin\TransactionController;
use App\Http\Controllers\CheckoutController;
use App\Http\Controllers\MidtransController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\DetailController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\TravelPackageController;

Auth::routes(['verify' => true]);

Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/detail/{slug}', [DetailController::class, 'index'])->name('detail');


Route::post('/checkout/{id}', [CheckoutController::class, 'process'])->name('checkout-process')->middleware(['auth', 'verified']);
Route::get('/checkout/{id}', [CheckoutController::class, 'index'])->name('checkout')->middleware(['auth', 'verified']);
Route::post('/checkout/create/{detail_id}', [CheckoutController::class, 'create'])->name('checkout-create')->middleware(['auth', 'verified']);
Route::get('/checkout/remove/{detail_id}', [CheckoutController::class, 'remove'])->name('checkout-remove')->middleware(['auth', 'verified']);
Route::get('/checkout/confirm/{id}', [CheckoutController::class, 'success'])->name('checkout-success')->middleware(['auth', 'verified']);



Route::prefix('admin')->middleware(['auth', 'isAdmin'])
    ->group(function () {
        Route::get('/', [DashboardController::class, 'index'])->name('dashboard');

        Route::resource('/travel-package', TravelPackageController::class);
        Route::resource('/gallery', GalleryController::class);
        Route::resource('/transaction', TransactionController::class);
    });

//midtrans
Route::namespace('App\Http\Controllers')->group(function (){
    Route::post('/midtrans/callback', [MidtransController::class, 'notificationHandler']);
    Route::get('/midtrans/finish', [MidtransController::class, 'finishRedirect']);
    Route::get('/midtrans/unfinish', [MidtransController::class, 'unfinishRedirect']);
    Route::get('/midtrans/error', [MidtransController::class, 'errorRedirect']);
});
