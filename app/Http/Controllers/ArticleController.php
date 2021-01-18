<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Models\User;
use Illuminate\Http\Request;

class ArticleController extends Controller
{
    public function index() {
        $articles  = Article::all()->toArray();
        return view('article.index', compact('articles'));
    }

    public function create()
    {
        return view('article.create', [
            'action' => route('article.store'),
            'method' => 'post'
        ]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|min:5',
            'header' => 'required|min:6',
            'text' => 'required|min:20']);

        $article = Article::create($request->all());
        $article->save();
        return redirect()->route('article.index');
    }

    public function destroy(Article $article)
    {
        $article->delete();
        return redirect()->route('article.index');
    }

    public function edit(Article $article)
    {
        return view('article.edit', [
            'action' => route('article.update', $article->id),
            'method' =>  'put',
            'model' => $article
        ])->with('article', $article);
    }

    public function update(Request $request, Article $article)
    {
        $request->validate([
            'title' => 'required|min:5',
            'header' => 'required|min:6',
            'text' => 'required|min:20']);

        $article->update($request->all());
        return redirect()->route('article.index');
    }

}
