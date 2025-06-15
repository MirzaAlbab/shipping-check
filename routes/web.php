<?php

use App\Http\Controllers\ShippingController;
use Illuminate\Support\Facades\Route;

Route::get('/', [ShippingController::class, 'index'])->name('shipping.index');
Route::get('/api/province/{code}/cities', [ShippingController::class, 'getCitiesByProvince'])->name('shipping.cities');
Route::post('/api/cities', [ShippingController::class, 'searchCities'])->name('shipping.searchCities');
Route::post('/shipping/store', [ShippingController::class, 'store'])->name('shipping.store');
