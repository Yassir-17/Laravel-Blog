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

Route::group(['middleware' => ['web']], function() {

    Route::get('/', [App\Http\Controllers\PagesController::class, 'getIndex'])->name('index');
    Route::get('about', [App\Http\Controllers\PagesController::class, 'getAbout'])->name('about');
    Route::get('contact', [App\Http\Controllers\PagesController::class, 'getContact'])->name('contact');
    Route::post('contact', [App\Http\Controllers\PagesController::class, 'postContact'])->name('postContact');
    Route::resource('posts', App\Http\Controllers\PostController::class);
    Route::resource('categories', App\Http\Controllers\CategoryController::class,)->except('create');
    Route::resource('tags', App\Http\Controllers\TagController::class)->except('create');

    Route::get('blog/{slug}',[App\Http\Controllers\BlogController::class, 'getSingle'])->where('slug', '[\w\d\-\_]+')->name('blog.single');
    Route::get('blog', [App\Http\Controllers\BlogController::class, 'getIndex'])->name('blog.index');

    // Route::resource('comments', 'CommentsController');
    //Manually Route for Comments:
        Route::post('comments/{post_id}', [App\Http\Controllers\CommentsController::class, 'store'])->name('comments.store');
        Route::get('comments/{id}/edit', [App\Http\Controllers\CommentsController::class, 'edit'])->name('comments.edit');
        Route::put('comments/{id}', [App\Http\Controllers\CommentsController::class, 'update'])->name('comments.update');
        Route::delete('comments/{id}', [App\Http\Controllers\CommentsController::class, 'destroy'])->name('comments.destroy');
        Route::get('comments/{id}/delete', [App\Http\Controllers\CommentsController::class, 'delete'])->name('comments.delete');



});



####laravel 8 routes #######

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
#### End laravel 8 Routes ######