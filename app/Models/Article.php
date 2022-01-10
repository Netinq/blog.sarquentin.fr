<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Sitemap\Contracts\Sitemapable;
use Spatie\Sitemap\Tags\Url;

class Article extends Model implements Sitemapable
{
    use HasFactory;

    public function categories() {
        return $this->belongsToMany('\App\Models\Category', 'article_categories', 'article_id', 'category_id');
    }
    protected static function boot()
    {
        parent::boot();
        static::saving(function($article) {
            $name = $article->name;
            $clean = str_replace(' ', '-', $name);
            $clean = strtr(utf8_decode($clean), utf8_decode('àáâãäçèéêëìíîïñòóôõöùúûüýÿÀÁÂÃÄÇÈÉÊËÌÍÎÏÑÒÓÔÕÖÙÚÛÜÝ'), 'aaaaaceeeeiiiinooooouuuuyyAAAAACEEEEIIIINOOOOOUUUUY');
            $article->link = preg_replace('/[^A-Za-z0-9\-]/', '', $clean);
        });
    }

    public static function published() : Builder
    {
        return Article::whereNotNull('published_at');
    }

    public function toSitemapTag(): Url
    {
        return Url::create(route('article', ['link' => $this->link]))
            ->setPriority(0.5)
            ->setLastModificationDate($this->updated_at)
            ->setChangeFrequency(Url::CHANGE_FREQUENCY_MONTHLY);
    }
}
