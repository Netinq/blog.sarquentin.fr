<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

    protected $fillable = ['name'];

    public function articles() {
        return $this->belongsToMany('Article', 'article_categories', 'category_id', 'article_id');
    }
}
