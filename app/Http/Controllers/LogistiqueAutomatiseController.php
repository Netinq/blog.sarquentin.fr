<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Article;
use Illuminate\Http\Request;

class LogistiqueAutomatiseController extends Controller
{
    public function index()
    {
        $articles = Article::published()->with('categories')
            ->whereHas('categories', function($query) {
                $query->where('name', 'LIKE', 'Logistique Automatisée');
            })
            ->orderBy('published_at', 'desc')->get();
        return view('mspr01', compact('articles'));
    }
}
