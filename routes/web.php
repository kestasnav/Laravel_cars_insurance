<?php


use App\Http\Controllers\CarController;

use App\Http\Controllers\ShortCodeController;
use App\Models\Car;
use App\Http\Controllers\OwnerController;
use App\Http\Controllers\LangController;
use App\Http\Controllers\ImageController;
use App\Models\Owner;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

Route::get('cars', [CarController::class, 'index'])->name('cars.index');

Route::middleware(['auth','ShortC','userType'])->group(function () {
    Route::resource('cars', CarController::class)->except(['index']);

});

Route::middleware( 'ShortC')->group(function () {
    Route::resource('owners', OwnerController::class);

});

Route::get('/image/{name}',[CarController::class, 'display'])
    ->name('image.cars')
    ->middleware('auth');

//Route::get('/carImage/{id}',[CarController::class, 'carImage'])
//    ->name('image.cars')
//    ->middleware('auth');

Route::get('setLang/{lang}', [LangController::class, 'setLang'])->name('setLang');

Route::resource('shorts', ShortCodeController::class);

Route::resource('images', ImageController::class);

Auth::routes();

