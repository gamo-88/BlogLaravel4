<?php

use App\Http\Controllers\ArticleController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Route;


Route::middleware(['guest'])->group(function () {
   
Route::get('/login', [AuthController::class, 'showFormLogin'])->name('login');
Route::post('/login', [AuthController::class, 'login'])->name('login');

Route::get('/register', [AuthController::class, 'showFormRegister'])->name('register');
Route::post('/register', [AuthController::class, 'register'])->name('register');


});


Route::get('/', [HomeController::class, 'home'])->name('home');

Route::get('/article/detail/{id}', [ArticleController::class, 'detailArticle'])->whereNumber('id')->name('article.detail');


Route::middleware(['auth'])->group(function () {
   
    
    Route::get('/article/create', [ArticleController::class, 'showFormArticle'])->name('article.create');

    Route::post('/article/create', [ArticleController::class, 'storeArticle'])->name('article.store');


    Route::post('/article/commentaire/{id}', [ArticleController::class, 'commentArticle'])
            ->whereNumber('id')
            ->name('article.commentaire');


    Route::get('/logout', [AuthController::class, 'logout'])->name('logout');


});
