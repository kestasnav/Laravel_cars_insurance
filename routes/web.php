<?php


use App\Http\Controllers\CarController;
use App\Models\Car;
use App\Http\Controllers\OwnerController;
use App\Models\Owner;
use Illuminate\Support\Facades\Route;



Route::resource('cars', CarController::class);
Route::resource('owners', OwnerController::class);
