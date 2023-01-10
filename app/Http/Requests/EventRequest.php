<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class EventRequest extends FormRequest
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
            'thumbnail' => 'nullable|image|mimes:png,jpg,jpeg,gif|max:5000',
            'catatan' => 'required',
            'lokasi' => 'required',
            'tanggal' => 'required|date',
            'waktu' => 'required' 
        ];
    }
    public function messages()
    {
        return [
            'thumbnail.image' => 'Thumbnail agenda harus berupa gambar!',
            'thumbnail.mimes' => 'Thumbnail agenda harus memiliki format png,jpg,jpeg,gif!',
            'thumbnail.max' => 'Thumbnail agenda maksimal 5MB!',
            'catatan.required' => 'Catatan agenda tidak boleh kosong!',
            'lokasi.required' => 'Lokasi agenda tidak boleh kosong!',
            'tanggal.required' => 'Tanggal agenda tidak boleh kosong!',
            'tanggal.date' => 'Tanggal agenda tidak valid!',
            'waktu.required' => 'Waktu agenda tidak boleh kosong!',
        ];
    }
}
