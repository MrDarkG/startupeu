<?php

use Illuminate\Support\Facades\Route;


use App\Http\Controllers\Mentors\ProfileController;
use App\Http\Controllers\Search\SearchController;


Route::get('/search',[SearchController::class,"mentors"]);
Route::get('/search/investor',[SearchController::class,"investors"]);