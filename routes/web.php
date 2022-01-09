<?php

use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Route;

Route::get('/', [HomeController::class, 'home'])->name('home');
Route::get('/articles', [HomeController::class, 'search'])->name('search');
Route::get('/articles/{link}', [HomeController::class, 'article'])->name('article');

Route::group(['prefix' => 'gestion'], function () {
    Voyager::routes();
});
