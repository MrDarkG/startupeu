<?php 
use Illuminate\Support\Facades\Route;


use App\Http\Controllers\Mentors\ProfileController;


Route::middleware(["auth"])->group(function(){
	Route::get("/mentor",[ProfileController::class,"index"]);
	Route::post("/mentor",[ProfileController::class,"update"]);

});