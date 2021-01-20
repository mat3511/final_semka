<?php

namespace App\Http\Controllers;

use App\Models\News;
use Illuminate\Http\Request;

class NewsController extends Controller
{
    public function index() {
        $news = News::all()->toArray();
        return view('news.index', compact('news'));
    }

    public function create()
    {
        return view('news.create', [
            'action' => route('news.store'),
            'method' => 'post'
        ]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|min:5',
            'text' => 'required|min:15']);

        $news = News::create($request->all());
        $news->save();
        return redirect()->route('news.index');
    }

    public function destroy(News $news)
    {
        $news->delete();
        return redirect()->route('news.index');
    }

    public function edit(News $news)
    {
        return view('news.edit', [
            'action' => route('news.update', $news->id),
            'method' =>  'put',
            'model' => $news
        ])->with('news', $news);
    }

    public function update(Request $request, News $news)
    {
        $request->validate([
            'title' => 'required|min:5',
            'text' => 'required|min:15']);

        $news->update($request->all());
        return redirect()->route('news.index');
    }
}
