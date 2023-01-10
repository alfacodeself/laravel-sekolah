<?php

namespace App\Http\Services;

use Illuminate\Support\Facades\Storage;

Class GalleryService {
    public function imageStoreHandler($image)
    {
        $ext = $image->extension();
        $imageName = 'gallery-' . time() . '.' . $ext;
        $store = $image->storeAs('public/img/gallery', $imageName);
        $path = Storage::url($store);
        return $path;
    }
    public function imageDeleteHandler($image)
    {
        @unlink(public_path($image));
    }
}