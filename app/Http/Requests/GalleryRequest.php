<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class GalleryRequest extends FormRequest
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

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        if (request()->routeIs('admin.gallery.store')) {
            $gambar = 'required';
        }elseif (request()->routeIs('admin.gallery.update')) {
            $gambar = 'nullable';
        }
        return [
            'gambar' => $gambar . '|image|mimes:png,jpg,jpeg,gif|max:20000',
            'catatan' => 'required',
            'deskripsi' => 'required',
            'tanggal_pengambilan' => 'required|date'
        ];
    }
    public function messages()
    {
        return [
            'gambar.required' => 'Gambar Galeri sekolah tidak boleh kosong!',
            'gambar.image' => 'Galeri sekolah harus berupa gambar!',
            'gambar.mimes' => 'Galeri sekolah harus memiliki format png,jpg,jpeg,gif!',
            'gambar.max' => 'Galeri sekolah maksimal 20MB!',
            'catatan.required' => 'Catatan Galeri sekolah tidak boleh kosong!',
            'deskripsi.required' => 'Deskripsi Galeri sekolah tidak boleh kosong!',
            'tanggal_pengambilan.required' => 'Tanggal Pengambilan Galeri sekolah tidak boleh kosong!',
            'tanggal_pengambilan.date' => 'Format Tanggal Pengambilan Galeri sekolah tidak valid!',
        ];
    }
}
