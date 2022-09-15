<?php

use Illuminate\Support\Facades\Route;


use App\Http\Controllers\MentorDashboardController;
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
Route::get('/index', [MentorDashboardController::class,"index"]);
Route::get('/calendar', [MentorDashboardController::class,"opportunities"]);
Route::get('/account', [MentorDashboardController::class,"my_account"]);
