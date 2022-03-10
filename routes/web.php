<?php

use Illuminate\Support\Facades\Route;

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

// Route::get('/', function () {
//     return view('welcome');
// });

Auth::routes();


Route::get('/', [App\Http\Controllers\Blog\HomeController::class, 'index'])->name('home');
Route::resource('posts', App\Http\Controllers\Blog\PostController::class);
Route::resource('codings', App\Http\Controllers\Blog\CodingController::class);
Route::resource('portfolios', App\Http\Controllers\Blog\PortfolioController::class);
Route::post('/like-post/{post}', [App\Http\Controllers\Blog\PostController::class, 'likePost'])->name('post.like');
Route::post('/like-coding/{post}', [App\Http\Controllers\Blog\CodingController::class, 'likeCoding'])->name('coding.like');
Route::get('posts-by-category/{category}', [App\Http\Controllers\Blog\PostController::class, 'showPostsByCategory'])->name('posts-by-category');
Route::get('codings-by-category/{category}', [App\Http\Controllers\Blog\CodingController::class, 'showCodingsByCategory'])->name('codings-by-category');
// Route::resource('posts-by-category', App\Http\Controllers\Blog\CategoryController::class);
Route::get('/search', [App\Http\Controllers\Blog\SearchController::class, 'index'])->name('search.index');



// Route::get('/posts-show/{id}', [App\Http\Controllers\Blog\PostController::class, 'show'])->name('guest_post.show');



Route::middleware(['role:admin'])->prefix('admin_panel')->group(function () {
    Route::get('/', [App\Http\Controllers\Admin\HomeController::class, 'index']) -> name('admin_home');
    Route::resource('category', App\Http\Controllers\Admin\CategoryController::class);
    Route::resource('post', App\Http\Controllers\Admin\PostController::class);
    Route::resource('user', App\Http\Controllers\Admin\UserController::class);
    Route::resource('like', App\Http\Controllers\Admin\LikeController::class);
    Route::resource('coding', App\Http\Controllers\Admin\CodingController::class);
    Route::resource('portfolio', App\Http\Controllers\Admin\PortfolioController::class);
    Route::resource('all_comments', App\Http\Controllers\Admin\AllCommentsController::class);
});


Route::middleware(['role:user'])->prefix('/')->group(function () {


});
