<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\PostController;
use Illuminate\Support\Facades\Route;

Route::get('/', [PostController::class, 'index']);
Route::get( '/posts/create', [PostController::class,'create']);
Route::post('/posts', [PostController::class,'store']);
Route::get('/posts/{post}/edit', [PostController::class,'edit']);
Route::put('/posts/{post}', [PostController::class,'update']);
Route::delete('/posts/{post}', [PostController::class,'destroy']);

Route::get('/categories', [CategoryController::class,'index']);
