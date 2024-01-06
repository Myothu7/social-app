<?php

use App\Http\Controllers\Api\PostController;
use App\Http\Controllers\Api\UserController;
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
Route::apiResource('users', UserController::class);

?>