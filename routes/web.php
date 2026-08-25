<?php

use App\Http\Controllers\BlogController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\RegisteredUserController;
use App\Http\Controllers\SessionsController;
use App\Http\Controllers\TagController;
use Illuminate\Support\Facades\Route;

Route::get('/', [BlogController::class, 'index'])->name('blog.index')->middleware('auth');

Route::prefix('auth')->group(function () {
    Route::middleware('guest')->group(function() {
        Route::get('/register', [RegisteredUserController::class, 'create'])->name('auth.register');
        Route::post('/register', [RegisteredUserController::class, 'store'])->name('register');
        Route::get('/login', [SessionsController::class, 'create'])->name('auth.login');
        Route::post('/login', [SessionsController::class, 'store'])->name('login');
    });
    Route::delete('/logout', [SessionsController::class, 'destroy'])->name('logout');
});

Route::middleware('auth')->prefix('category')->group(function () {
    Route::get('/', [CategoryController::class, 'index'])->name('category.index');
    Route::get('/create', [CategoryController::class, 'create'])->name('category.create');
    Route::post('/store', [CategoryController::class, 'store'])->name('category.store');
    Route::get('edit/{category}', [CategoryController::class, 'edit'])->name('category.edit');
    Route::put('update/{category}', [CategoryController::class, 'update'])->name('category.update');
    Route::delete('delete/{category}', [CategoryController::class, 'destroy'])->name('category.destroy');
});

Route::middleware('auth')->prefix('tag')->group(function () {
    Route::get('/', [TagController::class, 'index'])->name('tag.index');
    Route::get('/create', [TagController::class, 'create'])->name('tag.create');
    Route::post('/store', [TagController::class, 'store'])->name('tag.store');
    Route::get('edit/{tag}', [TagController::class, 'edit'])->name('tag.edit');
    Route::put('update/{tag}', [TagController::class, 'update'])->name('tag.update');
    Route::delete('delete/{tag}', [TagController::class, 'destroy'])->name('tag.destroy');
});

Route::middleware('auth')->prefix('post')->group(function () {
    Route::get('/', [PostController::class, 'index'])->name('post.index');
    Route::get('/create', [PostController::class, 'create'])->name('post.create');
    Route::post('/store', [PostController::class, 'store'])->name('post.store');
    Route::get('/edit/{post}', [PostController::class, 'edit'])->name('post.edit');
    Route::put('update/{post}', [PostController::class, 'update'])->name('post.update');
    Route::delete('delete/{post}', [PostController::class, 'destroy'])->name('post.destroy');
});

Route::prefix('blog')->group(function () {
    Route::get('/show/{post}', [BlogController::class, 'show'])->name('blog.show')->middleware('auth');
});
