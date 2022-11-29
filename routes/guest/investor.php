<?php

use Illuminate\Support\Facades\Route;


use App\Http\Controllers\Mentors\ProfileController;
use App\Http\Controllers\Search\SearchController;
use App\Http\Controllers\GuestController;

Route::get('/search',[SearchController::class,"investors"]);
Route::get('/{investor_id}',[GuestController::class,"singleInvestorPage"]);
