<?php

use Illuminate\Support\Facades\Route;


use App\Http\Controllers\Mentors\ProfileController;
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

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::group(['prefix' => '{language_id}',], function () {
    Route::get("/",function(){
        return view("welcome");
    });
});

Route::get("/mentor",function(){
    return view("registration.mentor");
});

Route::get("/mentor/info",[ProfileController::class,"index"]);
Route::get("/investor",function(){
    return view("registration.investor");
});