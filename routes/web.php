<?php

use Doctrine\DBAL\Schema\Schema;
use Illuminate\Database\Schema\Blueprint;
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
//Route::group(['prefix' => '{language_id}',], function () {
//    Route::get("/",function(){
//        return view("welcome");
//    });
//});
Route::get("/mentor/info",[ProfileController::class,"index"]);
Route::prefix("/browse")->group(function(){
    Route::get("/mentors" ,[GuestController::class,'index']);
    Route::get("/investors" ,[GuestController::class,'investorsPage']);
    Route::get("/startups" ,[GuestController::class,'startupPage']);
});
Route::prefix("/events")->group(function(){

    Route::get('/main/{slug?}.{id}', [GuestController::class, 'showEvent'])->name('events.main');
    Route::get("/{event_id}.{slug}" ,[GuestController::class,'eventSinglePage'])->name('singleEvent');
    Route::get("/" ,[GuestController::class,'allEvent'])->name('allEvent');
});

Route::prefix("/startup-ecosystem")->group(function(){
    Route::get("/{startup_ecosystem_id}" ,[GuestController::class,'singleStartupEcosystem'])->name('singleStartupEcosystem');
    Route::get("/" ,[GuestController::class,'allStartupEcosystem'])->name('allStartupEcosystem');
});

Route::get('/news', [GuestController::class, 'allNews'])->name('allNews');
Route::get('/news/{id}', [GuestController::class, 'show'])->name('news.details');
Route::group(['prefix' => 'admin'], function () {
    Voyager::routes();
});

Route::get('/get/menu-items',[GuestController::class,'getWelcomeMenu']);

//"v=spf1 include:_spf.google.com ip4:95.216.167.70 ~all"
//STARTUP_CENTRAL_EURASIA
// ssh 188.34.202.239 -l root
//pass: WsAnJXaaXPqj9hjWLXp3
// cd /home/admin/web/startupcentraleurasia.com/public_html
//user:root
