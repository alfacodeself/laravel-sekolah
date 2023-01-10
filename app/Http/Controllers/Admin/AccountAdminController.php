<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;

class AccountAdminController extends Controller
{
    public function index()
    {
        // dd(auth()->user());
        return view('apps.admin.account.index');
    }
    public function store(Request $request)
    {
        $data1 = $request->validate([
            'foto' => 'nullable|image|mimes:png,jpg,jpeg,gif|max:5000',
            'nama' => 'required',
            'username' => 'required',
        ], [
            'foto.image' => 'Foto Profil harus berupa gambar!',
            'foto.mimes' => 'Foto Profil harus memiliki format png,jpg,jpeg,gif!',
            'foto.max' => 'Foto Profil maksimal 5MB!',
            'nama.required' => 'Nama tidak boleh kosong!',
            'username.required' => 'Username tidak boleh kosong!',
        ]);
        if ($request->has('old_password') && $request->old_password != null) {
            $request->validate([
                'new_password' => 'required|min:3|confirmed'
            ], [
                'new_password.required' => 'Password baru tidak boleh kosong!',
                'new_password.min' => 'Password baru minimal 3 karakter!',
                'new_password.confirmed' => 'Konfirmasi password baru tidak sama!',
            ]);
        }
        try {
            $data = $data1;
            if ($request->hasFile('foto')) {
                if (auth()->user()->foto != null) @unlink(public_path(auth()->user()->foto));
                $ext = $request->file('foto')->extension();
                $imageName = 'foto-' . time() . '.' . $ext;
                $store = $request->file('foto')->storeAs('public/img/profil', $imageName);
                $path = Storage::url($store);
                $data['foto'] = $path;
            }
            if ($request->has('new_password') && $request->new_password != null) {
                $data['password'] = bcrypt($request->new_password);
            }
            auth()->user()->update($data);
            return redirect()->route('admin.account.index')->with('success', 'Berhasil mengubah profil akun!');
        } catch (\Throwable $th) {
            return back()->with('error', $th->getMessage());
        }
    }
}
