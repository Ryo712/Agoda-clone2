<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HotelController;

Route::get('/', [HotelController::class, 'index']);

Route::get('/hotels/{id}', [HotelController::class, 'show'])->name('hotels.show');
    
