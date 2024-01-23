<?php

use App\Http\Controllers\Api\UserController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;


Route::get('/', [LoginController::class,'showLoginForm']);
Route::post('/', [LoginController::class, 'login'])->name('login');
Route::post('register', [RegisterController::class, 'create'])->name('register');

Route::middleware('auth')->group(function(){
    Route::post('logout',[LoginController::class, 'logout'])->name('logout');
    Route::controller(PostController::class)->group(function() {
        Route::get('posts', 'index')->name('posts'); // all users posts
        Route::post('posts', 'store')->name('posts.store');
        Route::get('profile','posts')->name('profile'); // This route for user profile and user posts
    });

});

?>
