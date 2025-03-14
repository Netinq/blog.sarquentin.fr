<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;
use Spatie\Sitemap\Contracts\Sitemapable;
use Spatie\Sitemap\Tags\Url;

class Article extends Model implements Sitemapable
{
    use HasFactory;

    protected $fillable = ['name', 'published_at', 'editor', 'image', 'pin', 'link_only', 'description', 'banner_image'];

    public function categories() {
        return $this->belongsToMany('\App\Models\Category', 'article_categories', 'article_id', 'category_id');
    }
    protected static function boot()
    {
        parent::boot();
        static::saving(function($article) {
            $name = $article->name;
            $slug = Str::slug($name);
            $article->link = $slug;
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
