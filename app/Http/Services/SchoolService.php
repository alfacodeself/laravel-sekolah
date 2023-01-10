<?php

namespace App\Http\Services;

use Illuminate\Support\Facades\Storage;

Class SchoolService {
    public function logoStoreHandler($image)
    {
        $ext = $image->extension();
        $imageName = 'logo-' . time() . '.' . $ext;
        $store = $image->storeAs('public/img/logo', $imageName);
        $path = Storage::url($store);
        return $path;
    }
    public function logoDeleteHandler($image)
    {
        @unlink(public_path($image));
    }
}