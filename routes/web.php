<?php

use App\Http\Controllers\CardboardController;
use App\Http\Controllers\CityController;
use App\Http\Controllers\CountryController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\StateController;
use Illuminate\Support\Facades\Route;

// No auth routes
Route::get('/', [DashboardController::class, 'index'])->name('dashboard.index');

Route::middleware(['auth:sanctum', config('jetstream.auth_session'), 'verified',])->group(function () {
    // Auth routes
    Route::get('/dashboard', [DashboardController::class, 'dashboard'])->name('dashboard');
    Route::resource('/countries',CountryController::class);
    Route::resource('/states',StateController::class);
    Route::resource('/cities',CityController::class);
    Route::resource('/cardboards',CardboardController::class);
});
