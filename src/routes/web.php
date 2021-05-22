<?php

use App\Http\Controllers\AppController;
use App\Http\Controllers\Booking\PayPalPaymentController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\SocialMediaAuthController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

//pages
Route::get('/', [AppController::class,'home'])->name('accueil');

//Paypal
Route::get('handle-payment/thankYou/{reservation}', [PayPalPaymentController::class, 'thankYou'])->name('thankYou');
Route::get('handle-payment/cancel/{reservation}', [PayPalPaymentController::class, 'cancel'])->name('cancel');

Route::get('/about-us', [AppController::class, 'about'])->name('whoAreWe');
Route::get('/principes', [AppController::class, 'principes'])->name('principes');
Route::get('/termsOfservice', [AppController::class, 'termsOfservice'])->name('termsOfservice');
Route::get('/impressum', [AppController::class, 'impressum'])->name('impressum');
Route::get('/agb', [AppController::class, 'agb'])->name('agb');


Route::get('/faq', [AppController::class, 'faq'])->name('faq');

Route::get('/contact-us', [AppController::class, 'contactUs'])->name('contactUs');

Route::get('/howItWork', [AppController::class, 'howItWork'])->name('howItWork');
Route::get('/home', [HomeController::class, 'index'])->name('home');

// Auth
Auth::routes(['verify' => true]);

//social
Route::get('auth/facebook', [SocialMediaAuthController::class, 'facebookRedirect'])->name('facebook');
Route::get('auth/facebook/callback', [SocialMediaAuthController::class, 'loginWithFacebook']);

Route::get('auth/google', [SocialMediaAuthController::class, 'googleRedirect'])->name('google');
Route::get('auth/google/callback', [SocialMediaAuthController::class, 'loginWithGoogle']);
