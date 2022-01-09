<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Article extends Model
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
}
