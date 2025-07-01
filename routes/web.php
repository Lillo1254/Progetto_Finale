<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PublicController;
use App\Http\Controllers\ArticleController;
use App\Http\Controllers\isAdmin;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\RevisorController;
use App\Http\Controllers\RoleProfile;





// all user
Route::get('/', [PublicController::class, 'home'])->name('home');
Route::get('/article/catalogo', [ArticleController::class, 'index'])->name('article.catalogo');
Route::get('/search/article', [ArticleController::class, 'search'])->name('article.search');


// route user auth
Route::middleware(['auth'])->group(function () {

    Route::get('/article/create', [ArticleController::class, 'create'])->name('article.create');
    Route::post('/logout', function () {
        Auth::logout();
        return redirect()->route('home');
    })->name('logout');
    Route::post('/revisor/request', [RoleProfile::class, 'send'])->name('revisor.request');
    Route::get('/form-revisor', [PublicController::class, 'SendForm'])->name('form.revisor');
    Route::get('/article/{article}/edit', [ArticleController::class, 'edit'])->name('article.edit');
    Route::get('/profile/{user}', [ProfileController::class, 'profile'])->name('profile');
    Route::delete('/article/{article}', [ArticleController::class, 'destroy'])->name('article.destroy');
    Route::put('/article/{article}', [ArticleController::class, 'update'])->name('article.update');
});

// route revisor
Route::middleware(['auth', 'isRevisor'])->group(function () {

    // accettazione revisor
    Route::get('/revisor/accept/{user}', [isAdmin::class, 'accept'])->name('revisor.acceptUser');
    Route::get('/revisor/reject/{user}', [isAdmin::class, 'reject'])->name('revisor.rejectUser');


    Route::get('/revisor/index', [RevisorController::class, 'index'])->name('revisor.index');
    Route::get('/revisor/table/decline', [RevisorController::class, 'showDecline'])->name('revisor.articledecline');
    Route::get('/revisor/profile/{user}', [RevisorController::class, 'revisorProfile'])->name('revisor.profile');
    Route::patch('/accept/{article}', [RevisorController::class, 'accept'])->name('revisor.accept');
    Route::patch('/reject/{article}', [RevisorController::class, 'reject'])->name('revisor.reject');
    Route::patch('/revisor/article/annulla/{article}', [RevisorController::class, 'annulla'])->name('revisor.annulla');
});
// fine route revisor

// rotte parametriche
Route::get('/article/{article}', [ArticleController::class, 'show'])->name('article.show');
Route::get('/categories/{category}', [ArticleController::class, 'showcategory'])->name('category.articles');

Route::post('/lingua/{lang}', [PublicController::class, 'setLanguage'])->name('setlocale');
    


// Route::get('/', [PublicController::class, 'home'])->name('home');

// Route::get('/article/create',[ArticleController::class, 'create'])->name('article.create')->middleware('auth');

// Route::get('/article/catalogo', [ArticleController::class, 'index'])->name('article.catalogo');

// Route::get('article/{article}', [ArticleController::class, 'show'])->name('article.show');

// Route::get('article/{article}/edit', [ArticleController::class, 'edit'])->name('article.edit')->middleware('auth');

// Route::delete('article/{article}', [ArticleController::class, 'destroy'])->name('article.destroy')->middleware('auth');

// Route::put('article/{article}', [ArticleController::class, 'update'])->name('article.update')->middleware('auth');

// Route::get('/categories/{category}',[ArticleController::class,'showcategory'])->name('category.articles');

// Route::post('/logout', function () {Auth::logout();return redirect()->route('home');})->name('logout')->middleware('auth'); 

// Route::get('/profile/{user}', [ProfileController::class, 'profile'])->name('profile')->middleware('auth');

// Route::get('/revisor/index', [RevisorController::class, 'index'])->name('revisor.index');

// Route::post('/revisor/request', [RoleProfile::class, 'send'])->name('revisor.request')->middleware('auth');

// // accettazione revisor
// Route::get('/revisor/accept/{user}', [isAdmin::class, 'accept'])->name('revisor.acceptUser');
// Route::get('/revisor/reject/{user}', [isAdmin::class, 'reject'])->name('revisor.rejectUser');


// Route::get('/form-revisor',[PublicController::class,'SendForm'])->name('form.revisor')->middleware('auth');

// Route::get('/revisor/profile/{user}', [RevisorController::class, 'revisorProfile'])->name('revisor.profile');

// Route::patch('/accept/{article}', [RevisorController::class, 'accept'])->name('revisor.accept');

// Route::patch('/reject/{article}', [RevisorController::class, 'reject'])->name('revisor.reject');


// Route::get('/revisor/table/decline', [RevisorController::class, 'showDecline'])->name('revisor.articledecline');
// Route::patch('/revisor/article/annulla/{article}', [RevisorController::class, 'annulla'])->name('revisor.annulla');

// Route::get('/search/article',[ArticleController::class, 'search'])->name('article.search');


// fine route user auth