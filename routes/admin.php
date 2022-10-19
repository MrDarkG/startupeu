<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController as AdminController;
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
Route::get('/events', [AdminController::class, 'events'])->name('voyager.events.index');
Route::post('/add/event', [AdminController::class, 'addEvent'])->name('addEvent');
Route::post('/edit/event', [AdminController::class, 'editEvent'])->name('editEvent');
Route::get('/delete/event/{event_id}', [AdminController::class, 'deleteEvent'])->name('deleteEvent');

Route::prefix('single-page')->group(function() {
    Route::get('/', [AdminController::class, 'singlePage'])->name('singlePage');
    Route::post('/create', [AdminController::class, 'singlePageCreate'])->name('singlePageCreate');
    Route::get('/delete', [AdminController::class, 'singlePageDelete'])->name('singlePageDelete');
});
