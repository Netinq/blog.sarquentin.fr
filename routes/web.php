<?php

use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Route;

Route::get('/', [HomeController::class, 'home'])->name('home');
Route::get('/nouveautes', [HomeController::class, 'news'])->name('news');
Route::get('/tous-les-articles', [HomeController::class, 'all'])->name('all');
Route::get('/articles-courts', [HomeController::class, 'short'])->name('short');
Route::get('/iacactu', [\App\Http\Controllers\IACActusController::class, 'index'])->name('iacactu');
Route::get('/logistique-automatise', [\App\Http\Controllers\LogistiqueAutomatiseController::class, 'index'])->name('logistique-automatise');
Route::get('/articles', [HomeController::class, 'search'])->name('search');
Route::get('/articles/{link}', [HomeController::class, 'article'])->name('article');

Route::get('/legal', function() {return view('legal');})->name('legal');

Route::post('/read', [HomeController::class, 'read_time'])->name('read');
