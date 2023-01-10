<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Portal;
use Illuminate\Http\Request;

class PortalAdminController extends Controller
{
    public function index()
    {
        $portals = Portal::all();
        return view('apps.admin.portals.index', compact('portals'));
    }
    public function store(Request $request)
    {
        $data = $request->validate([
            'nama_portal' => 'required',
            'link_portal' => 'required',
        ]);
        try {
            Portal::create($data);
            return redirect()->route('admin.portals.index')->with('success', 'Portal aplikasi baru berhasil dibuat!');
        } catch (\Throwable $th) {
            return back()->with('error', $th->getMessage());
        }
    }
    public function edit(Portal $portal)
    {
        return view('apps.admin.portals.edit', compact('portal'));
    }
    public function update(Portal $portal, Request $request)
    {
        $data = $request->validate([
            'nama_portal' => 'required',
            'link_portal' => 'required',
        ]);
        try {
            $portal->update($data);
            return redirect()->route('admin.portals.index')->with('success', 'Portal aplikasi berhasil diubah!');
        } catch (\Throwable $th) {
            return back()->with('error', $th->getMessage());
        }
    }
    public function destroy(Portal $portal)
    {
        try {
            $portal->deleteOrFail();
            return redirect()->route('admin.portals.index')->with('success', 'Portal aplikasi berhasil dihapus!');
        } catch (\Throwable $th) {
            return back()->with('error', $th->getMessage());
        }
    }
}
