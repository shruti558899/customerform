<?php

use App\Http\Controllers\API\indexcontroller;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\StripePaymentController;
use App\Http\Controllers\razorpayController;
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
    return view('welcome');
});
Route::get('/stripe', [StripePaymentController::class, 'showForm'])->name('stripe.form');
Route::post('/stripe/payment', [StripePaymentController::class, 'processPayment'])->name('stripe.payment');
Route::get('/razorpay', [razorpayController::class, 'showForm'])->name('razor.form');
Route::post('/razorpay/payment', [razorpayController::class, 'store'])->name('razor.store');


Route::get('/user/userview', [indexcontroller::class, 'viewpage']);
