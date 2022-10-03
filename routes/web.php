<?php


use App\Http\Controllers\CarController;
use App\Models\Car;
use App\Http\Controllers\OwnerController;
use App\Models\Owner;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

Route::middleware('auth')->group(function () {
    Route::resource('cars', CarController::class);
    Route::resource('owners', OwnerController::class);

});

Auth::routes();
Route::get('/cars.index', [CarController::class, 'cars.index'])->name('home');
