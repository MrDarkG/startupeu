<?php

use Illuminate\Support\Facades\Route;


use App\Http\Controllers\Mentors\ProfileController;
use App\Http\Controllers\Search\SearchController;
use App\Http\Controllers\GuestController;
Route::get('/search',[SearchController::class,"startups"]);
Route::get('/{startup_id}',[GuestController::class,"singleStartupPage"]);

