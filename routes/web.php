<?php

use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\CheckoutController;
use App\Http\Controllers\DetailController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\Admin\TravelPackageController;
use App\Http\Controllers\Admin\GalleryController;
use App\Http\Controllers\Admin\TransactionController;
use App\Http\Controllers\TransactionController as OrderController;
use App\Http\Controllers\TravelPackageController as TravelController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', [HomeController::class, 'index'])->name('home');

Route::get('/detail/{slug}', [DetailController::class, 'index'])->name('detail');

Route::get('/travel', [TravelController::class, 'index'])->name('travel');

Route::get('/orders', [OrderController::class, 'index'])->name('orders');

Route::prefix('checkout')->name('checkout.')->middleware(['auth', 'verified'])->group(function(){
    Route::get('/{id}', [CheckoutController::class, 'index'])->name('index');
    Route::post('/{id}', [CheckoutController::class, 'process'])->name('process');
    Route::post('/create/{id}', [CheckoutController::class, 'create'])->name('create');
    Route::get('/remove/{detail_id}', [CheckoutController::class, 'remove'])->name('remove');
    Route::get('/confirm/{id}', [CheckoutController::class, 'success'])->name('success');
    Route::get('/cancel/{id}', [CheckoutController::class, 'cancel'])->name('cancel');
});

Route::prefix('admin')->name('admin.')->middleware(['auth', 'admin'])->group(function(){
    Route::get('/', [DashboardController::class, 'index'])->name('dashboard');
    Route::resource('travel-package', TravelPackageController::class);
    Route::resource('gallery', GalleryController::class)->except('show');
    Route::resource('transaction', TransactionController::class)->except(['create', 'store']);
});

Auth::routes(['verify' => true]);
