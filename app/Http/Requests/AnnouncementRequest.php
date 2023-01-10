<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AnnouncementRequest extends FormRequest
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
        return [
            'catatan' => 'required',
            'deskripsi' => 'required',
            'tanggal_awal' => 'required|date',
            'tanggal_akhir' => 'required|date',
            'dokumen_pengumuman' => 'nullable|file' 
        ];
    }
    public function messages()
    {
        return [
            'catatan.required' => 'Catatan pengumuman tidak boleh kosong!',
            'deskripsi.required' => 'Deskripsi pengumuman tidak boleh kosong!',
            'tanggal_awal.required' => 'Tanggal awal pengumuman tidak boleh kosong!',
            'tanggal_awal.date' => 'Tanggal awal pengumuman tidak valid!',
            'tanggal_akhir.required' => 'Tanggal akhir pengumuman tidak boleh kosong!',
            'tanggal_akhir.date' => 'Tanggal akhir pengumuman tidak valid!',
            'dokumen_pengumuman.file' => 'Dokumen pengumuman harus berupa file!'
        ];
    }
}
