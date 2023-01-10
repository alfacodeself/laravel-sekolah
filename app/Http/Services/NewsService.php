<?php

namespace App\Http\Services;

use Illuminate\Support\Facades\Storage;

Class NewsService {
    public function thumbnailStoreHandler($image)
    {
        $ext = $image->extension();
        $imageName = 'thumbnail-' . time() . '.' . $ext;
        $store = $image->storeAs('public/img/news', $imageName);
        $path = Storage::url($store);
        return $path;
    }
    public function thumbnailDeleteHandler($image)
    {
        @unlink(public_path($image));
    }
}