<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HotelController;

Route::get('/', [HotelController::class, 'index']) ;

Route::get('/hotels/{id}', [HotelController::class, 'show'])->name('hotels.show');
    
Route::get('/test', function () {
    return view('test');
})->middleware('auth')->name('test');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
