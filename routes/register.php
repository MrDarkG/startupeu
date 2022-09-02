<?php 
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Mentors\ProfileController as Mentor;
use App\Http\Controllers\Startups\ProfileController as Startup;
use App\Http\Controllers\Investors\ProfileController as Investor;

Route::middleware(["auth"])->group(function(){
	Route::get("/mentor",[Mentor::class,"index"]);
	Route::post("/mentor",[Mentor::class,"update"]);

	Route::get("/startup",[Startup::class,"index"]);
	Route::post("/startup",[Startup::class,"update"]);

	Route::get("/investor",[Investor::class,"index"]);
	Route::post("/investor",[Investor::class,"update"]);
});