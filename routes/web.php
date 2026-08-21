<?php

use App\Http\Controllers\BlogController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\TagController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::prefix('category')->group(function () {
    Route::get('/', [CategoryController::class, 'index'])->name('category.index');
    Route::get('/create', [CategoryController::class, 'create'])->name('category.create');
    Route::post('/store', [CategoryController::class, 'store'])->name('category.store');
    Route::get('edit/{category}', [CategoryController::class, 'edit'])->name('category.edit');
    Route::put('update/{category}', [CategoryController::class, 'update'])->name('category.update');
    Route::delete('delete/{category}', [CategoryController::class, 'destroy'])->name('category.destroy');
});

Route::prefix('tag')->group(function () {
    Route::get('/', [TagController::class, 'index'])->name('tag.index');
    Route::get('/create', [TagController::class, 'create'])->name('tag.create');
    Route::post('/store', [TagController::class, 'store'])->name('tag.store');
    Route::get('edit/{tag}', [TagController::class, 'edit'])->name('tag.edit');
    Route::put('update/{tag}', [TagController::class, 'update'])->name('tag.update');
    Route::delete('delete/{tag}', [TagController::class, 'destroy'])->name('tag.destroy');
});

Route::prefix('post')->group(function () {
    Route::get('/', [PostController::class, 'index'])->name('post.index');
    Route::get('/create', [PostController::class, 'create'])->name('post.create');
    Route::post('/store', [PostController::class, 'store'])->name('post.store');
    Route::get('/edit/{post}', [PostController::class, 'edit'])->name('post.edit');
    Route::put('update/{post}', [PostController::class, 'update'])->name('post.update');
    Route::delete('delete/{post}', [PostController::class, 'destroy'])->name('post.destroy');
});

Route::prefix('blog')->group(function () {
    Route::get('/', [BlogController::class, 'index'])->name('blog.index');
});
