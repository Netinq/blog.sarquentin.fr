<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Mail\Markdown;

class ArticleContent extends Model
{
    use HasFactory;

    protected static function boot()
    {
        parent::boot();
        static::saving(function ($article) {
            $article->html = Markdown::parse($article->markdown);
        });
        static::saved(function ($article) {
            $words = str_word_count(strip_tags($article->html));
            $minutes = floor($words / 230);
            $update = Article::where(['id' => $article->article_id])->first();
            $update->read_time = $minutes;
            $update->save();
        });
    }

    public function lastUpdate() {
        return $this->hasOne(ArticleContent::class)->latest();
    }
}
