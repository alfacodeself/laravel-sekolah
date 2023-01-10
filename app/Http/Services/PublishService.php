<?php

namespace App\Http\Services;

use Illuminate\Support\Facades\Storage;

Class PublishService {
    public function fileStoreHandler($file, $storePath = 'public/document')
    {
        $ext = $file->extension();
        $fileName = 'thumbnail-' . time() . '.' . $ext;
        $store = $file->storeAs($storePath, $fileName);
        $path = Storage::url($store);
        return $path;
    }
    public function fileDeleteHandler($file)
    {
        @unlink(public_path($file));
    }
}