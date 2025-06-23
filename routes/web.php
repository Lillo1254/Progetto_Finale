<?php

use App\Http\Controllers\ArticleController;
use App\Http\Controllers\PublicController;
use Illuminate\Support\Facades\Route;

Route::get('/', [PublicController::class, 'home'])->name('home');
Route::get('/article/create',[ArticleController::class, 'create'])->name('article.create');
Route::get('article/{article}', [ArticleController::class, 'show'])->name('article.show');
Route::get('article/index', [ArticleController::class, 'index'])->name('article.index');
Route::get('article/{article}/edit', [ArticleController::class, 'edit'])->name('article.edit');
Route::delete('article/{article}', [ArticleController::class, 'destroy'])->name('article.destroy');