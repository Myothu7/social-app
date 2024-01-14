<?php

use App\Http\Controllers\Api\CommentController;
use App\Http\Controllers\Api\LikeController;
use App\Http\Controllers\Api\PostController;
use App\Http\Controllers\Api\UserController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;


Route::get('like', [LikeController::class, 'index']);
Route::post('like', [LikeController::class, 'store']);
Route::post('like/del', [LikeController::class, 'destory']);

Route::get('comment/{id}', [CommentController::class, 'show']);
?>
