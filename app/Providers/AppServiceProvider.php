<?php

namespace App\Providers;

use App\Models\Article;
use Carbon\Carbon;
use Illuminate\Support\ServiceProvider;
use Spatie\Sitemap\Sitemap;
use Spatie\Sitemap\SitemapGenerator;
use Spatie\Sitemap\Tags\Url;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
//Route::get('/nouveautes', [HomeController::class, 'news'])->name('news');
//Route::get('/tous-les-articles', [HomeController::class, 'all'])->name('all');
//Route::get('/articles-courts', [HomeController::class, 'short'])->name('short');
//Route::get('/dataactu', [HomeController::class, 'dataactu'])->name('dataactu');
//Route::get('/articles', [HomeController::class, 'search'])->name('search');
    public function boot()
    {
        Carbon::setLocale("fr");
    }
}
