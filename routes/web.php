<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Guest\PageController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\PostController;
use App\Http\Controllers\Admin\AuthorController;
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

Route::get('/', [PageController::class, 'index'])->name('home');
//
// raggruppare le rotte
Route::middleware(['auth','verified'])
->name('admin.')
->prefix('admin')
->group(function(){
    Route::get('/', [DashboardController::class, 'index'])->name('home');
    Route::resource('posts', PostController::class);
    Route::resource('authors', AuthorController::class);
    Route::get('orderby/{direction}', [PostController::class, 'orderby'])->name('orderby');
    Route::get('authorPosts', [PostController::class, 'authorPosts'])->name('authorPosts');
});

require __DIR__.'/auth.php';
