<?php

use App\Http\Controllers\ArticleController;
use App\Http\Controllers\PublicController;
use Illuminate\Support\Facades\Route;

Route::get('/', [PublicController::class, 'home'])->name('home');

Route::get('/article/create',[ArticleController::class, 'create'])->name('article.create')->middleware('auth');

Route::get('/article/catalogo', [ArticleController::class, 'index'])->name('article.catalogo');

Route::get('article/{article}', [ArticleController::class, 'show'])->name('article.show');

Route::get('article/{article}/edit', [ArticleController::class, 'edit'])->name('article.edit')->middleware('auth');

Route::delete('article/{article}', [ArticleController::class, 'destroy'])->name('article.destroy')->middleware('auth');

Route::put('article/{article}', [ArticleController::class, 'update'])->name('article.update')->middleware('auth');