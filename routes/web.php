<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ArticleController;
use App\Http\Controllers\CommentController;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/articles', [ArticleController::class, "index"]);
Route::get('/article', [ArticleController::class, "fetch"]);
Route::post('/article/post', [ArticleController::class, "post"]);

Route::get('/comments/{articleId}', [CommentController::class, "index"]);
Route::post('/comment/post', [CommentController::class, "post"]);
