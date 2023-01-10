<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\GalleryRequest;
use App\Http\Services\GalleryService;
use App\Models\Gallery;

class GalleryAdminController extends Controller
{
    protected $galleryService;

    public function __construct(GalleryService $galleryService)
    {
        $this->galleryService = $galleryService;
    }    
    public function index()
    {
        $galleries = Gallery::all();
        return view('apps.admin.galleries.index', compact('galleries'));
    }
    public function create()
    {
        return view('apps.admin.galleries.create');
    }
    public function store(GalleryRequest $galleryRequest)
    {
        try {
            $data = $galleryRequest->all();
            $data['gambar'] = $this->galleryService->imageStoreHandler($galleryRequest->file('gambar'));
            Gallery::create($data);
            return redirect()->route('admin.gallery.index')->with('success', 'Galeri berhasil ditambahkan!');
        } catch (\Throwable $th) {
            return back()->with('error', $th->getMessage());;
        }
    }
    public function edit(Gallery $gallery)
    {
        return view('apps.admin.galleries.edit', compact('gallery'));
    }
    public function update(Gallery $gallery, GalleryRequest $galleryRequest)
    {
        try {
            $data = $galleryRequest->all();
            if ($galleryRequest->hasFile('gambar')) {
                if ($gallery->gambar != null) $this->galleryService->imageDeleteHandler($gallery->gambar);
                $data['gambar'] = $this->galleryService->imageStoreHandler($galleryRequest->file('gambar'));
            }else {
                $data['gambar'] = $gallery->gambar;
            }
            $gallery->update($data);
            return redirect()->route('admin.gallery.index')->with('success', 'Galeri berhasil diubah!');
        } catch (\Throwable $th) {
            return back()->with('error', $th->getMessage());;
        }
    }
    public function destroy(Gallery $gallery)
    {
        try {
            $this->galleryService->imageDeleteHandler($gallery->gambar);
            $gallery->deleteOrFail();
            return redirect()->route('admin.gallery.index')->with('success', 'Galeri berhasil dihapus!');
        } catch (\Throwable $th) {
            return back()->with('error', $th->getMessage());;
        }
    }
}
