<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Mentors\ProfileController;
use App\Http\Controllers\GuestController as GuestController;
use App\Services\DataService;
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
Route::get('/', [GuestController::class,'home']);
Auth::routes();
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::group(['prefix' => '{language_id}',], function () {
    Route::get("/",function(){
        return view("welcome");
    });
});
Route::get("/mentor/info",[ProfileController::class,"index"]);
Route::prefix("/browse")->group(function(){
    Route::get("/mentors" ,[GuestController::class,'index']);
    Route::get("/startups" ,[GuestController::class,'startupPage']);
});

Route::get('/news/{slug}.{id}', [GuestController::class, 'show'])->name('news.details');
Route::group(['prefix' => 'admin'], function () {
    Voyager::routes();
});
