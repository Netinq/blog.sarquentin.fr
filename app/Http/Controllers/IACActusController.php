<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Article;
use Illuminate\Http\Request;

class IACActusController extends Controller
{
    public function index()
    {
        $articles = Article::published()->with('categories')
            ->whereHas('categories', function($query) {
                $query->where('name', 'LIKE', 'IAC Actus');
            })
            ->orderBy('published_at', 'desc')->get();
        return view('iacactu', compact('articles'));
    }
}
