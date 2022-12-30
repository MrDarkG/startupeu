<?php

use Illuminate\Support\Facades\Route;


use App\Http\Controllers\InvestorDashboardController;
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
Route::get('/index', [InvestorDashboardController::class,"index"]);
Route::get('/opportunities', [InvestorDashboardController::class,"opportunities"]);
Route::get('/all/startups', [InvestorDashboardController::class,"startups"]);
Route::get('/account', [InvestorDashboardController::class,"my_account"]);
Route::post('/change/startup/status', [InvestorDashboardController::class,"setStatusForStartup"]);
Route::get('/startups/{startup_id}', [InvestorDashboardController::class,"goToDashboardStartupSinglePage"]);
