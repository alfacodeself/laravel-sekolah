<?php

namespace App\Http\Controllers\Admin;

use App\Models\News;
use Illuminate\Http\Request;
use App\Http\Requests\NewsRequest;
use App\Http\Services\NewsService;
use App\Http\Controllers\Controller;

class NewsAdminController extends Controller
{
    protected $newsService;

    public function __construct(NewsService $newsService)
    {
        $this->newsService = $newsService;
    }
    public function index()
    {
        $news = News::all();
        return view('apps.admin.articles.index', compact('news'));
    }
    public function create()
    {
        return view('apps.admin.articles.create');
    }
    public function store(NewsRequest $newsRequest)
    {
        try {
            $data = $newsRequest->all();
            $data['thumbnail'] = $this->newsService->thumbnailStoreHandler($newsRequest->file('thumbnail'));
            News::create($data);
            return redirect()->route('admin.news.index')->with('success', 'Berita baru berhasil dibuat!');
        } catch (\Throwable $th) {
            return back()->with('error', $th->getMessage());
        }
    }
    public function edit(News $news)
    {
        return view('apps.admin.articles.edit', compact('news'));
    }
    public function update(News $news, NewsRequest $newsRequest)
    {
        try {
            $data = $newsRequest->all();
            if ($newsRequest->hasFile('thumbnail')) {
                if ($news->thumbnail != null) $this->newsService->thumbnailDeleteHandler($news->thumbnail);
                $data['thumbnail'] = $this->newsService->thumbnailStoreHandler($newsRequest->file('thumbnail'));
            }else {
                $data['thumbnail'] = $news->thumbnail;
            }
            $news->update($data);
            return redirect()->route('admin.news.index')->with('success', 'Berita berhasil diubah!');
        } catch (\Throwable $th) {
            return back()->with('error', $th->getMessage());
        }
    }
    public function destroy(News $news)
    {
        try {
            $this->newsService->thumbnailDeleteHandler($news->thumbnail);
            $news->deleteOrFail();
            return redirect()->route('admin.news.index')->with('success', 'Berita berhasil dihapus!');
        } catch (\Throwable $th) {
            return back()->with('error', $th->getMessage());
        }
    }
}
