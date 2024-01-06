<?php

use App\Http\Controllers\PostController;
use App\Http\Controllers\Api\UserController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

// Route::resource('posts', PostController::class);

Route::controller(PostController::class)->group(function() {
    Route::get('posts', 'index');
    Route::post('posts', 'store')->name('posts.store');
});
// Route::middleware('auth', function() {

// });
Route::get('login', [LoginController::class, 'showLoginForm']);
Route::post('login', [LoginController::class, 'login'])->name('login');
Route::post('logout', [LoginController::class, 'logout'])->name('logout');
Route::post('register', [RegisterController::class, 'create'])->name('register');
?>