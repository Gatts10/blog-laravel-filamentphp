<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\TagController;
use App\Http\Controllers\Api\PostController;
use App\Http\Controllers\Api\EventController;
use App\Http\Controllers\Api\CommentController;
use App\Http\Controllers\Api\CategoryController;

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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::apiResource('categories', CategoryController::class);
Route::apiResource('events', EventController::class);
Route::apiResource('posts', PostController::class);
Route::apiResource('tags', TagController::class);
Route::apiResource('comments', CommentController::class);
