<?php

use Illuminate\Support\Facades\Route;


use App\Http\Controllers\Mentors\ProfileController;
use App\Http\Controllers\Search\SearchController;
use App\Http\Controllers\GuestController;

Route::get("/",[GuestController::class,"index"]);
Route::get('/search',[SearchController::class,"mentors"]);
Route::get('/investor/investor',[SearchController::class,"investors"]);
