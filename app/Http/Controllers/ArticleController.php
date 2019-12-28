<?php

namespace App\Http\Controllers;

use App\Article;
use Illuminate\Http\Request;
use App\Http\Requests\StoreArticle;

class ArticleController extends Controller
{
    public function index()
    {
        $articles = Article::paginate();

        return view('article.index', compact('articles'));
    }

    public function create()
    {
        $article = new Article();
        return view('article.create', compact('article'));
    }

    public function store(StoreArticle $request)
    {
        $validated = $request->validated();

        $article = new Article();
        $article->fill($validated);
        $article->save();

        $request->session()->flash('status', 'Article created successfully!');

        return redirect()
            ->route('articles.index');
    }

    public function show(Article $article)
    {
        return view('article.show', compact('article'));
    }

    public function edit(Article $article)
    {
        return view('article.edit', compact('article'));
    }

    public function update(StoreArticle $request, Article $article)
    {
        $validated = $request->validated();

        $article->fill($validated);
        $article->save();

        $request->session()->flash('status', 'Article updated successfully!');

        return redirect()
            ->route('articles.show', $article);
    }

    public function destroy(Request $request, Article $article)
    {
        if ($article) {
            $article->delete();
        }

        $request->session()->flash('status', 'Article delete successfully!');

        return redirect()->route('articles.index');
    }
}
