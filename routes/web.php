<?php

use App\Http\Controllers\BookingController;

Route::get('/', [BookingController::class, 'index']); 

Route::resource('bookings', BookingController::class);