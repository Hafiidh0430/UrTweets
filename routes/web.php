<?php

use App\Http\Controllers\LoginController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ResgisterController;
use App\Http\Controllers\StoriesController;
use Illuminate\Support\Facades\Route;

Route::get('/', [PostController::class, 'index'])->name('pages.index');

Route::prefix('/')->middleware('auth')->group(function () {
    // post
    Route::get('/search', [PostController::class, 'index'])->name('pages.search');
    Route::get('/post/{id}', [PostController::class, 'post'])->name('pages.post');
    Route::get('/create', [PostController::class, 'add'])->name('pages.create');
    Route::post('/create', [PostController::class, 'addStore'])->name('pages.create.addStore');
    Route::get('/update/{id}', [PostController::class, 'update'])->name('pages.update');
    Route::patch('/update/{id}', [PostController::class, 'updateStore'])->name('pages.updateStore');
    Route::delete('/delete/{id}', [PostController::class, 'deleteStore'])->name('pages.deleteStore');

    //stories
    Route::get('/stories', [StoriesController::class, 'index'])->name('pages.stories');
    Route::get('/stories/drafts', [StoriesController::class, 'draftsStories'])->name('pages.stories.drafts');
    
    //profile
    Route::get('/profile', [ProfileController::class, 'index'])->name('pages.profile.index');
    Route::get('/profile/likes', [ProfileController::class, 'likesActivity'])->name('pages.profile.likes');
    Route::get('/profile/comments', [ProfileController::class, 'commentsActivity'])->name('pages.profile.comments');
});

Route::prefix('/')->group(function () {
    //login
    Route::get('/login', [LoginController::class, 'login'])->name('login');
    Route::post('/login', [LoginController::class, 'userLogin'])->name('login.user');
    Route::get('/logout', [LoginController::class, 'logout'])->name('logout');
});
Route::prefix('/')->group(function () {
    //register
    Route::get('/register', [ResgisterController::class, 'register'])->name('register');
    Route::post('/register', [ResgisterController::class, 'registerStore'])->name('registerStore');
});
