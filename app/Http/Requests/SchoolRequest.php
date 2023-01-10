<?php

namespace App\Http\Requests;

use App\Models\School;
use Illuminate\Foundation\Http\FormRequest;

class SchoolRequest extends FormRequest
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
        $school = School::first();
        $school ? $logo = 'nullable' : $logo = 'required';
        return [
            'logo' => $logo . '|image|mimes:png,jpg,jpeg,gif|max:5000',
            'nama' => 'required',
            'alamat' => 'required',
            'sejarah' => 'required',
            'visi' => 'required',
            'misi' => 'required',
            'email' => 'nullable|email',
            'nomor_telpon' => 'nullable|numeric',
            'facebook' => 'nullable',
            'instagram' => 'nullable',
            'whatsapp' => 'nullable|numeric',
        ];
    }
    public function messages()
    {
        return [
            'logo.required' => 'Logo sekolah tidak boleh kosong!',
            'logo.image' => 'Logo sekolah harus berupa gambar!',
            'logo.mimes' => 'Logo sekolah harus memiliki format png,jpg,jpeg,gif!',
            'logo.max' => 'Logo sekolah maksimal 5MB!',
            'nama.required' => 'Nama sekolah tidak boleh kosong!',
            'alamat.required' => 'Alamat sekolah tidak boleh kosong!',
            'sejarah.required' => 'Sejarah sekolah tidak boleh kosong!',
            'visi.required' => 'Visi sekolah tidak boleh kosong!',
            'misi.required' => 'Misi sekolah tidak boleh kosong!',
            'email.email' => 'Harap masukkan email sekolah yang valid!',
            'nomor_telpon.numeric' => 'Nomor telpon sekolah harus berupa angka!',
            'whatsapp.numeric' => 'Nomor whatsapp sekolah harus berupa angka!'
        ];
    }
}
