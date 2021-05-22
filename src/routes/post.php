<?php

use App\Http\Controllers\Booking\BookingController;
use App\Http\Controllers\PostsController;
use Illuminate\Support\Facades\Route;

Route::prefix('post')->group(function () {

    Route::get('/index', [PostsController::class, 'index'])->name('posts.index');
    Route::get('/travel/create', [PostsController::class, 'travel'])->name('travel.create')->middleware('auth');
    Route::get('/packet/create', [PostsController::class, 'packet'])->name('packet.create')->middleware('auth');
    route::post('/coli/create',[PostsController::class, 'saveColiPost'])->name('coli.create');
    route::post('/travel/create',[PostsController::class, 'saveTravelPost'])->name('travel.create');

    Route::get('/booking/{slug}/{user_id}', [BookingController::class, 'detail'])->name('post.booking')->middleware('auth');
    Route::post('/booking/{slug}/{user_id}', [BookingController::class, 'booking'])->middleware('auth');
    Route::get('/confirm/{id}/{toNotifyUser}', [BookingController::class, 'confirm'])->name('booking.confirmation')->middleware('auth');
    Route::get('/cancel/{id}/{toNotifyUser}', [BookingController::class, 'cancel'])->name('booking.cancel')->middleware('auth');
    Route::get('/pay/{user}/{reservation}', [BookingController::class, 'pay'])->name('booking.pay')->middleware('auth');


});
