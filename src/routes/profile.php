<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\User\ProfilesController;

Route::group(['prefix' => 'dashboard', 'middleware' => 'auth'], function() {

    Route::get('/{user}/index', [ProfilesController::class, 'index'])->name('users.profile');
    Route::patch('/update/{user}', [ProfilesController::class, 'update'])->name('users.update');
    Route::get('/update/password/{user}', [ProfilesController::class, 'password_index'])->name('users.password.index');
    Route::patch('/update/password/{user}', [ProfilesController::class, 'password_update'])->name('users.password.update');

    Route::get('/{user}/chat', [ProfilesController::class, 'messages'])->name('user.messages');
    Route::get('/{user}/notifications', [ProfilesController::class, 'notifications'])->name('user.notifications');

    Route::get('/{user}/reservations', [ProfilesController::class, 'reservations'])->name('user.reservations');
    Route::get('/{user}/factures', [ProfilesController::class, 'factures'])->name('user.factures');

    Route::get('/{user}/demandes', [ProfilesController::class, 'reservations'])->name('user.demandes');
    Route::get('/{user}/travels', [ProfilesController::class, 'travels'])->name('user.travels');
    Route::get('/{user}/packs', [ProfilesController::class, 'packets'])->name('user.packets');

    //inviter un ami
    Route::get('/invitation', [ProfilesController::class, 'inviter'])->name('users.invitation');
    Route::post('/invitation', [ProfilesController::class, 'sendEmailInvitation']);

});
