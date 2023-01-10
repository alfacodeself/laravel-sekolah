<?php

namespace App\Http\Controllers\Admin;

use App\Models\Banner;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;

class BannerAdminController extends Controller
{
    public function index()
    {
        $banners = Banner::all();
        return view('apps.admin.banner.index', compact('banners'));
    }
    public function create()
    {
        return view('apps.admin.banner.create');
    }
    public function store(Request $request)
    {
        $request->validate([
            'gambar' => 'required|image|mimes:png,jpg,jpeg,gif|max:5000',
        ]);
        try {
            $ext = $request->file('gambar')->extension();
            $imageName = 'banner-' . time() . '.' . $ext;
            $store = $request->file('gambar')->storeAs('public/img/banner', $imageName);
            $path = Storage::url($store);
            Banner::create(['gambar' => $path]);
            return redirect()->route('admin.banner.index')->with('success', 'Banner baru berhasil dibuat!');
        } catch (\Throwable $th) {
            return back()->with('error', $th->getMessage());
        }
    }
    public function destroy(Banner $banner)
    {
        try {
            @unlink(public_path($banner->gambar));
            $banner->deleteOrFail();
            return redirect()->route('admin.banner.index')->with('success', 'Banner berhasil dihapus!');
        } catch (\Throwable $th) {
            return back()->with('error', $th->getMessage());
        }
    }
}
