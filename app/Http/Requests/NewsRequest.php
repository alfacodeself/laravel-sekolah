<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class NewsRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }
    public function rules()
    {
        if (request()->routeIs('admin.news.store')) {
            $thumbnail = 'required';
        }elseif (request()->routeIs('admin.news.update')) {
            $thumbnail = 'nullable';
        }
        return [
            'thumbnail' => $thumbnail. '|image|mimes:png,jpg,jpeg,gif|max:20000',
            'judul' => 'required',
            'isi' => 'required',
            'penulis' => 'required' 
        ];
    }
    public function messages()
    {
        return [
            'thumbnail.required' => 'Thumbnail berita tidak boleh kosong!',
            'thumbnail.image' => 'Thumbnail berita harus berupa gambar!',
            'thumbnail.mimes' => 'Thumbnail berita harus memiliki format png,jpg,jpeg,gif!',
            'thumbnail.max' => 'Thumbnail berita maksimal 20MB!',
            'judul.required' => 'Judul berita tidak boleh kosong!',
            'isi.required' => 'Isi berita tidak boleh kosong!',
            'penulis.required' => 'Penulis berita tidak boleh kosong!',
        ];
    }
}
