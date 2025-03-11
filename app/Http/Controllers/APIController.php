<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Article;
use App\Models\ArticleCategory;
use App\Models\ArticleContent;
use App\Models\Category;
use Illuminate\Http\Request;

class APIController extends Controller
{
    public function createIACPost(Request $request)
    {
        $authHeader = $request->header('Authorization');

        // Vérifier que le token correspond à celui défini dans .env
        if (!$authHeader || $authHeader !== 'Bearer ' . env('API_SECRET_TOKEN')) {
            return response()->json(['message' => 'Unauthorized'], 401);
        }

        $category = Category::firstOrCreate([
            'name' => 'IAC Actus'
        ]);

        $article = Article::create([
            'name' => $request->name,
            'editor' => 1,
            'published_at' => now(),
            'image' => $request->image,
            'pin' => 1,
            'link_only' => 0,
            'description' => $request->description,
            'banner_image' => $request->banner_image,
            'keywords' => $request->keywords
        ]);

        $article->categories()->attach($category->id);

        $content = ArticleContent::create([
            'article_id' => $article->id,
            'markdown' => $request->markdown
        ]);

        return response()->json([
            'message' => 'Article created',
            'data' => [
                'title' => $request->title,
                'content' => $request->content,
                'category' => $category->name
            ]
        ]);
    }
}
