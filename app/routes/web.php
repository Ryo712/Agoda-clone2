<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HotelController;
use App\Http\Controllers\BookingController;

Route::get('/', [HotelController::class, 'index']) ;

Route::get('/hotels/{id}', [HotelController::class, 'show'])->name('hotels.show');

Route::middleware(['auth'])->group(function () {
    Route::get('/bookings/create', [BookingController::class, 'create'])->name('bookings.create');
    Route::post('/bookings', [BookingController::class, 'store'])->name('bookings.store');
    Route::get('/bookings', [BookingController::class, 'index'])->name('bookings.index');
    Route::get('/bookings/{id}', [BookingController::class, 'show'])->name('bookings.show');
    Route::get('/bookings/{id}/edit', [BookingController::class, 'edit'])->name('bookings.edit');
    Route::put('/bookings/{id}', [BookingController::class, 'update'])->name('bookings.update');
    Route::delete('/bookings/{id}', [BookingController::class, 'destroy'])->name('bookings.destroy');
});
    
Route::get('/test', function () {
    return view('test');
})->middleware('auth')->name('test');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
