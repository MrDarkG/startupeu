<?php

use Illuminate\Support\Facades\Route;


use App\Http\Controllers\Startups\DashboardController;
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
Route::get('/index', [DashboardController::class,"index"]);
Route::get('/cards', [DashboardController::class,"cards"]);
Route::get('/apply/{id}', [DashboardController::class,"show"]);

Route::get('/account', [DashboardController::class,"my_account"]);
