<?php 
use Illuminate\Support\Facades\Route;


use App\Http\Controllers\Mentors\ProfileController;
use App\Http\Controllers\Startups\ProfileController as Startup;


Route::middleware(["auth"])->group(function(){
	Route::get("/mentor",[ProfileController::class,"index"]);
	Route::post("/mentor",[ProfileController::class,"update"]);

	Route::get("/startup",[Startup::class,"index"]);
	Route::post("/startup",[Startup::class,"update"]);

});