<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PublicController;
use App\Http\Controllers\ArticleController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\RevisorController;
use App\Http\Controllers\RoleProfile;

Route::get('/', [PublicController::class, 'home'])->name('home');

Route::get('/article/create',[ArticleController::class, 'create'])->name('article.create')->middleware('auth');

Route::get('/article/catalogo', [ArticleController::class, 'index'])->name('article.catalogo');

Route::get('article/{article}', [ArticleController::class, 'show'])->name('article.show');

Route::get('article/{article}/edit', [ArticleController::class, 'edit'])->name('article.edit')->middleware('auth');

Route::delete('article/{article}', [ArticleController::class, 'destroy'])->name('article.destroy')->middleware('auth');

Route::put('article/{article}', [ArticleController::class, 'update'])->name('article.update')->middleware('auth');

Route::get('/categories/{category}',[ArticleController::class,'showcategory'])->name('category.articles');

Route::post('/logout', function () {Auth::logout();return redirect()->route('home');})->name('logout')->middleware('auth'); 

Route::get('/profile/{user}', [ProfileController::class, 'profile'])->name('profile')->middleware('auth');

Route::get('/revisor/index', [RevisorController::class, 'index'])->name('revisor.index');

Route::post('/revisor/request', [RoleProfile::class, 'send'])->name('revisor.request')->middleware('auth');

Route::get('/form-revisor',[PublicController::class,'SendForm'])->name('form.revisor')->middleware('auth');

Route::get('/revisor/profile/{user}', [RevisorController::class, 'revisorProfile'])->name('revisor.profile');

Route::patch('/accept/{article}', [RevisorController::class, 'accept'])->name('revisor.accept');

Route::patch('/reject/{article}', [RevisorController::class, 'reject'])->name('revisor.reject');


Route::get('/revisor/table/decline', [RevisorController::class, 'showDecline'])->name('revisor.articledecline');
Route::patch('/revisor/article/annulla/{article}', [RevisorController::class, 'annulla'])->name('revisor.annulla');

Route::get('/search/article',[ArticleController::class, 'search'])->name('article.search');







// // all user
// Route::get('/', [PublicController::class, 'home'])->name('home');
// Route::get('/article/catalogo', [ArticleController::class, 'index'])->name('article.catalogo');
// Route::get('article/{article}', [ArticleController::class, 'show'])->name('article.show');
// Route::get('/categories/{category}',[ArticleController::class,'showcategory'])->name('category.articles');
// Route::get('/search/article',[ArticleController::class, 'search'])->name('article.search');

// Route::get('/article/create',[ArticleController::class, 'create'])->name('article.create')->middleware('auth');

// // route user auth
// Route::middleware(['auth'])->group(function () {

// Route::get('article/{article}/edit', [ArticleController::class, 'edit'])->name('article.edit');
// Route::delete('article/{article}', [ArticleController::class, 'destroy'])->name('article.destroy');
// Route::put('article/{article}', [ArticleController::class, 'update'])->name('article.update');
// Route::post('/logout', function () {Auth::logout();return redirect()->route('home');})->name('logout'); 
// Route::get('/profile/{user}', [ProfileController::class, 'profile'])->name('profile');
// Route::post('/revisor/request', [RoleProfile::class, 'send'])->name('revisor.request');
// Route::get('/form-revisor',[PublicController::class,'SendForm'])->name('form.revisor');
// });
// // fine route user auth

// // route revisor
// Route::middleware(['auth','isRevisor'])->group(function () {

// Route::get('/revisor/index', [RevisorController::class, 'index'])->name('revisor.index');
// Route::get('/revisor/profile/{user}', [RevisorController::class, 'revisorProfile'])->name('revisor.profile');   
// Route::patch('/accept/{article}', [RevisorController::class, 'accept'])->name('revisor.accept');
// Route::patch('/reject/{article}', [RevisorController::class, 'reject'])->name('revisor.reject');
// Route::get('/revisor/table/decline', [RevisorController::class, 'showDecline'])->name('revisor.articledecline');
// Route::patch('/revisor/article/annulla/{article}', [RevisorController::class, 'annulla'])->name('revisor.annulla');
// });
// // fine route revisor


