<?php

namespace App\Http\Controllers;

use App\Models\News;

class NewsController extends Controller
{
    public function index()
    {
        $news = News::latest()->get();
        return view('apps.landingpage.articles.index', compact('news'));
    }
    public function show(News $news)
    {
        $news->update(['dibaca' => $news->dibaca + 1]);
        $popularNews = News::orderBy('dibaca', 'DESC')->where('id', '!=', $news->id)->take(5)->get();
        $latestNews = News::where('id', '!=', $news->id)->latest()->take(5)->get();
        return view('apps.landingpage.articles.show', compact('news', 'popularNews', 'latestNews'));
    }
}
