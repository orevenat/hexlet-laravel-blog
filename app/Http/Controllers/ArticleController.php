<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Article;
use App\Http\Requests\StoreArticle;

class ArticleController extends Controller
{
    public function index()
    {
        $articles = Article::paginate();

        return view('article.index', compact('articles'));
    }

    public function show($id)
    {
        $article = Article::findOrFail($id);
        return view('article.show', compact('article'));
    }

    public function edit($id)
    {
        $article = Article::findOrFail($id);
        return view('article.edit', compact('article'));
    }

    public function update(StoreArticle $request, $id)
    {
        $article = Article::findOrFail($id);

        $validated = $request->validated();

        $article->fill($validated);
        $article->save();

        $request->session()->flash('status', 'Article updated successfully!');

        return redirect()
            ->route('articles.index');
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
}
