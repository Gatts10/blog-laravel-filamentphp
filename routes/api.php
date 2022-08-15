<?php

use App\Models\Tag;
use App\Models\Post;
use App\Models\Event;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Resources\TagResource;
use App\Http\Resources\PostResource;
use App\Http\Resources\EventResource;
use Illuminate\Support\Facades\Route;
use App\Http\Resources\CategoryResource;

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

Route::get('/categories', function () {
    $categories = Category::orderBy('name')->get();

    return CategoryResource::collection($categories);
});

Route::get('/posts', function () {
    $posts = Post::all();

    return PostResource::collection($posts);
});

Route::get('/tags', function () {
    $tags = Tag::orderBy('name')->get();

    return TagResource::collection($tags);
});

Route::get('/events', function () {
    $events = Event::all();

    return EventResource::collection($events);
});
