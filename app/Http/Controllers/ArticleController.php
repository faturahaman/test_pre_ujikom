<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request; 
use App\Models\Article;
use Carbon\Carbon;

class ArticleController extends Controller
{
    public function index(Request $request) 
    {
        $query = Article::query()
            ->where('status', 'published')
            ->where('published_at', '<=', Carbon::now())
            ->latest('published_at');

        if ($request->filled('search')) {
            $query->where('title', 'like', '%' . $request->search . '%');
        }

        $articles = $query->paginate(9)->withQueryString(); 

        return view('pages.articlePage', [
            'articles' => $articles
        ]);
    }
    public function show(Article $article)
    {
        if ($article->status !== 'published' || $article->published_at > Carbon::now()) {
            abort(404);
        }

        return view('pages.articleDetail', [
            'article' => $article
        ]);
    }
}