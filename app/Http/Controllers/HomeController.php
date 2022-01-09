<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Models\Category;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class HomeController extends Controller
{
    public function home()
    {
        $articles = Article::where(['pin' => true])->orderBy('published_at', 'desc')->get();
        return view('home', compact('articles'));
    }

    public function article($link) {
        $article = Article::where('link', 'LIKE', $link)
            ->leftJoin('article_contents', function($join) {
                $join->on('articles.id', '=', 'article_contents.article_id');
                $join->on('article_contents.updated_at', '=',
                    DB::raw('(select max(updated_at) from article_contents where article_id = articles.id)'));
            })->first();
        return view('article', compact('article'));
    }

    public function search(Request $request) {
        $search = request('search');

        $articles = Article::with('categories')
            ->leftJoin('article_contents', function($join) {
                $join->on('articles.id', '=', 'article_contents.article_id');
                $join->on('article_contents.updated_at', '=',
                DB::raw('(select max(updated_at) from article_contents where article_id = articles.id)'));
            })
            ->where('html', 'LIKE', '%'.$search.'%')
            ->orWhere('name', 'LIKE', '%'.$search.'%')
            ->orWhereHas('categories', function($query) use ($search) {
                $query->where('name', 'LIKE', '%'.$search.'%');
            })
            ->get();

        if (count($articles) == 0) {
            $array = Category::all()->toArray();
            $searcher = explode(" ", $search);
            $tryto = $this->match($searcher, $array, 'name', 5);
            return view('search', compact('articles', 'search', 'tryto'));
        }

        return view('search', compact('articles', 'search'));
    }

    private function sanitizeString($str)
    {
        $str = preg_replace('/[áàãâä]/ui', 'a', $str);
        $str = preg_replace('/[éèêë]/ui', 'e', $str);
        $str = preg_replace('/[íìîï]/ui', 'i', $str);
        $str = preg_replace('/[óòõôö]/ui', 'o', $str);
        $str = preg_replace('/[úùûü]/ui', 'u', $str);
        $str = preg_replace('/[ç]/ui', 'c', $str);
        $str = preg_replace('/[^a-z0-9]/i', '_', $str);
        $str = preg_replace('/_+/', '_', $str);

        return $str;
    }

    private function match($array, $matchWith, $field, $length)
    {
        $result = null;
        for ($i = 0; $i < count($array); $i++) {
            $word = Str::lower($array[$i]);
            for ($j = 0; $j < count($matchWith); $j++) {
                $name = Str::lower($matchWith[$j][$field]);
                $name = $this->sanitizeString($name);
                $str1chars = str_split($word, $length);
                $str2chars = str_split($name, $length);
                $diff = array_diff($str1chars, $str2chars);
                if (strlen(implode($diff)) < strlen($word)) {
                    if ($result == null) $result = array();
                    if (strtolower(str_replace('_', ' ', $name)) != strtolower(implode(" ", $array))) array_push($result, str_replace('_', ' ', $name));
                }
            }
        }
        if ($result == null && $length > 3) {
            return $this->match($array, $matchWith, $field, $length - 1);
        } else {
            return $result;
        }
    }
}
