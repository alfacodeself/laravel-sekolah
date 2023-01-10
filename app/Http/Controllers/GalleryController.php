<?php

namespace App\Http\Controllers;

use App\Models\Gallery;
use Illuminate\Http\Request;

class GalleryController extends Controller
{
    public function index()
    {
        $galleries = Gallery::paginate(12);
        return view('apps.landingpage.galleries.index', compact('galleries'));
    }
    public function show(Gallery $gallery)
    {
        return response()->json($gallery);
    }
}
