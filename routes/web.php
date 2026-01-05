<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;



use App\Http\Controllers\Auth\CustomAuthController;
use App\Http\Controllers\Auth\ForgotPasswordController;

Route::get('/', [CustomAuthController::class, 'showAuthOptions'])->name('auth.options');
Route::get('/login', [CustomAuthController::class, 'showLoginForm'])->name('login');
Route::post('/login', [CustomAuthController::class, 'login']);
Route::post('/logout', [CustomAuthController::class, 'logout'])->name('logout');



Route::get('/forgot-password', [ForgotPasswordController::class, 'showForgotPasswordForm'])->name('password.request');
Route::post('/forgot-password', [ForgotPasswordController::class, 'sendResetLinkEmail'])->name('password.email');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware('auth')->name('dashboard');

Route::get('/register', [CustomAuthController::class, 'showRegisterForm'])->name('register');
Route::post('/register', [CustomAuthController::class, 'register']);

Route::get('/daily-order', function () {
    return view('daily-order');
})->name('daily.order');

use App\Http\Controllers\DailyOrderController;

Route::get('/daily-order', [DailyOrderController::class, 'index'])->name('daily.order');
Route::post('/daily-order', [DailyOrderController::class, 'store'])->name('daily.order.store');
Route::get('/daily-order/details', [DailyOrderController::class, 'show'])->name('daily.order.details');

Route::get('/daily-orders', [DailyOrderController::class, 'index'])->name('daily.order');
Route::post('/daily-orders/store', [DailyOrderController::class, 'store'])->name('daily.orders.store');
Route::get('/daily-orders/details', [DailyOrderController::class, 'show'])->name('daily.order.details');


Route::get('/daily-orders/create', [DailyOrderController::class, 'create'])->name('daily-orders.create');
Route::post('/daily-orders/store', [DailyOrderController::class, 'store'])->name('daily-orders.store');


use App\Http\Controllers\DrugReceiveController;

Route::get('/drug-receive', [DrugReceiveController::class, 'create'])->name('drug-receive.create');
Route::post('/drug-receive', [DrugReceiveController::class, 'store'])->name('drug-receive.store');
Route::get('/drug-receiving-details', [DrugReceiveController::class, 'showDetails'])->name('drug-receive.details');



use App\Http\Controllers\ExpiryDateController;



Route::get('/close-expiry-drugs', [ExpiryDateController::class, 'index'])->name('drug.close-expiry');
Route::delete('/close-expiry-drugs/{id}', [ExpiryDateController::class, 'destroy'])->name('drug.destroy');


Route::get('/close-expiry-drugs', [ExpiryDateController::class, 'index'])->name('drug.close-expiry');
Route::delete('/close-expiry-drugs/{id}', [ExpiryDateController::class, 'destroy'])->name('close-expiry-drugs.destroy');

Route::get('/drug-receive-details', [DrugController::class, 'showDrugReceives'])->name('drug.receive.details');

Route::get('/drug-receive-details', [DrugReceiveController::class, 'showDrugReceiveDetails'])->name('drug-receive-details.index');



Route::get('/daily-order', [DailyOrderController::class, 'index'])->name('daily-order.index');
Route::post('/daily-orders/store', [DailyOrderController::class, 'store'])->name('daily-orders.store');
Route::get('/daily-order-details', [DailyOrderController::class, 'show'])->name('daily-order.details');

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
    route('drug.destroy', $drug->id);
});



Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
