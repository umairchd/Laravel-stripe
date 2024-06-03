<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashboardController;

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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', [DashboardController::class, 'plans'])->name('dashboard')->middleware('auth:sanctum', 'verified');
Route::get('/pay', [DashboardController::class, 'pay'])->name('pay')->middleware('auth:sanctum', 'verified');
Route::post('/subscription', [DashboardController::class, 'subscription'])->name('subscription')->middleware('auth:sanctum', 'verified');
Route::get('/success', [DashboardController::class, 'success'])->name('success')->middleware('auth:sanctum', 'verified', 'subscription');
