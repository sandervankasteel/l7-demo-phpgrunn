<?php

use App\Http\Controllers\EventsController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\WelcomeController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

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

Route::get('/', [WelcomeController::class, 'index']);

Route::namespace('App\Http\Controllers')->group(function() {
    Auth::routes();
});

// Profile routes
Route::get('/profile', [ProfileController::class, 'index'])->name('profile.index');
Route::get('/profile/edit', [ProfileController::class, 'edit'])->name('profile.edit');
Route::resource('profile', ProfileController::class)->except(['index', 'edit']);

// Event routes
Route::resource('events', EventsController::class)->except('show');
Route::get('/event/{event:slug}', [EventsController::class, 'show'])->name('event.show');
Route::post('/event/{event:slug}/attends/{user}', [EventsController::class, 'userAttendsEvent'])->name('event.attending');
