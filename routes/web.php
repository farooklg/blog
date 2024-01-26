<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});


Route::resource('posts', App\Http\Controllers\PostsController::class);
Route::get('/', [App\Http\Controllers\PostsController::class, 'latestPost'])->name('welcome');
Route::resource('comments', App\Http\Controllers\CommentsController::class);
Route::get('/categories', [App\Http\Controllers\CategoryController::class, 'userindex'])->name('categories');
//Route::get('/team', [App\Http\Controllers\TeamController::class, 'index'])->name('team');
Route::get('/about', [App\Http\Controllers\AboutController::class, 'index'])->name('about');
Route::get('/contact', [App\Http\Controllers\ContactController::class, 'index'])->name('contact');



Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');



Route::prefix('admin')->middleware(['auth', 'role:Admin'])->name('admin.')->group(function () {
    Route::get('/', function () {

    return view('Admin.index');
    })->name('admin');

    Route::resource('posts', App\Http\Controllers\Admin\PostsController::class);
    Route::resource('categories', App\Http\Controllers\Admin\CategoryController::class);
    Route::resource('team', App\Http\Controllers\Admin\TeamController::class);
    Route::resource('about', App\Http\Controllers\Admin\AboutController::class);
    Route::resource('contact', App\Http\Controllers\Admin\ContactController::class);

});;
