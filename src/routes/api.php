<?php

use App\Http\Controllers\Admin\ImagesController;
use App\Http\Controllers\Admin\UsersController;
use App\Http\Controllers\AppController;
use App\Http\Controllers\HowWorkController;
use App\Http\Controllers\PostsController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::post('/galerie/store',[ImagesController::class, 'store'])->name('Images.store');
Route::get('/transported/objects',[PostsController::class, 'objects'])->name('Images.store');
Route::post('/message-us',[AppController::class, 'senMessage'])->name('contact-us');

route::get('posts',[PostsController::class, 'posts'])->name('Posts.index');
route::get('posts/travels',[PostsController::class, 'travels'])->name('Posts.travels');
route::get('posts/packets',[PostsController::class, 'packets'])->name('Posts.packets');
route::get('/all-posts',[PostsController::class, 'all'])->name('Posts.all');

//Admin
route::get('/admin/posts',[\App\Http\Controllers\Admin\PostsController::class, 'posts']);
route::post('/post/validate/{post}',[\App\Http\Controllers\Admin\PostsController::class, 'validatePost']);
route::post('/post/destroy/{post}',[\App\Http\Controllers\Admin\PostsController::class, 'destroy']);
route::get('/admin/users',[UsersController::class, 'users']);
route::post('/user/destroy/{user}',[UsersController::class, 'destroy']);
