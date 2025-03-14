<?php

namespace App\Models;

use App\Support\MarkdownParser;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Mail\Markdown;

class ArticleContent extends Model
{
    use HasFactory;

    protected $fillable = ['article_id', 'markdown', 'html'];

    protected static function boot()
    {
        parent::boot();
        static::saving(function ($article) {
            $article->html = MarkdownParser::parse($article->markdown);
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

    public function article() {
        return $this->belongsTo(Article::class);
    }
}
