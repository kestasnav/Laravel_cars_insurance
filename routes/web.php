<?php


use App\Http\Controllers\CarController;
use App\Http\Controllers\redirectTo;
use App\Http\Controllers\ShortCodeController;
use App\Models\Car;
use App\Http\Controllers\OwnerController;
use App\Models\Owner;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

Route::middleware(['auth','ShortC'])->group(function () {
    Route::resource('cars', CarController::class);

});


Route::middleware( 'ShortC')->group(function () {
    Route::resource('owners', OwnerController::class);

});

Route::middleware( 'userType')->group(function () {

    Route::resource('cars.create',CarController::class);

//    Route::get('/cars.create', function () {
//        return view('cars.index');
//    });

    Route::get('/cars.{id).edit',[CarController::class]);
//    Route::post('/owners.create',[CarController::class]);
//    Route::post('/owners.{id).edit',[CarController::class]);
});

Route::resource('shorts', ShortCodeController::class);

Auth::routes();
//Route::get('/cars.index', [CarController::class, 'cars.index'])->name('cars');
