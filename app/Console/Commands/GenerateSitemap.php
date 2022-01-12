<?php

namespace App\Console\Commands;

use App\Models\Article;
use Carbon\Carbon;
use Illuminate\Console\Command;
use Spatie\Sitemap\Sitemap;
use Spatie\Sitemap\SitemapGenerator;
use Spatie\Sitemap\Tags\Url;

class GenerateSitemap extends Command
{
    protected $signature = 'sitemap:generate';

    protected $description = 'Generate sitemap';

    public function __construct()
    {
        parent::__construct();
    }

    public function handle()
    {
        SitemapGenerator::create('https://blog.sarquentin.fr');
        Sitemap::create()
            ->add(Url::create('/')
                ->setLastModificationDate(Carbon::createFromTimeString(Article::published()->where('pin', true)->orderBy('published_at', 'desc')->first()->published_at))
                ->setChangeFrequency(Url::CHANGE_FREQUENCY_ALWAYS)
                ->setPriority(1))
            ->add(Url::create('/tous-les-articles')
                ->setLastModificationDate(Carbon::createFromTimeString(Article::published()->orderBy('published_at', 'desc')->first()->published_at))
                ->setChangeFrequency(Url::CHANGE_FREQUENCY_ALWAYS)
                ->setPriority(0.9))
            ->add(Url::create('/articles')
                ->setLastModificationDate(Carbon::today())
                ->setChangeFrequency(Url::CHANGE_FREQUENCY_WEEKLY)
                ->setPriority(0.8))
            ->add(Url::create('/nouveautes')
                ->setLastModificationDate(Carbon::createFromTimeString(Article::published()->where('published_at', '>=', Carbon::now()->subWeek())->orderBy('published_at', 'desc')->first()->published_at))
                ->setChangeFrequency(Url::CHANGE_FREQUENCY_WEEKLY)
                ->setPriority(0.7))
            ->add(Url::create('/articles-courts')
                ->setLastModificationDate(Carbon::createFromTimeString(Article::published()
                    ->where('read_time', '<=', 5)->orderBy('published_at', 'desc')->first()->published_at))
                ->setChangeFrequency(Url::CHANGE_FREQUENCY_WEEKLY)
                ->setPriority(0.7))
            ->add(Url::create('/dataactu')
                ->setLastModificationDate(Carbon::createFromTimeString(Article::published()->with('categories')
                    ->whereHas('categories', function($query) {
                        $query->where('name', 'LIKE', 'DataActu');
                    })->orderBy('published_at', 'desc')->first()->published_at))
                ->setChangeFrequency(Url::CHANGE_FREQUENCY_WEEKLY)
                ->setPriority(0.7))
            ->add(Article::published()->get())
            ->writeToFile(public_path('sitemap.xml'));
    }
}
