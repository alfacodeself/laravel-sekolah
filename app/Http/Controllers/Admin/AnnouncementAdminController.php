<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\AnnouncementRequest;
use App\Http\Services\PublishService;
use App\Models\Announcement;

class AnnouncementAdminController extends Controller
{
    protected $publishService;

    public function __construct(PublishService $publishService)
    {
        $this->publishService = $publishService;
    }
    public function index()
    {
        $announcements = Announcement::all();
        return view('apps.admin.announcement.index', compact('announcements'));
    }
    public function edit(Announcement $announcement)
    {
        // return $announcement->catatan;
        return view('apps.admin.announcement.edit', compact('announcement'));
    }
    public function store(AnnouncementRequest $announcementRequest)
    {
        try {
            $data = $announcementRequest->all();
            if ($announcementRequest->hasFile('dokumen_pengumuman')) {
                $data['dokumen_pengumuman'] = $this->publishService->fileStoreHandler($announcementRequest->file('dokumen_pengumuman'), 'public/document/announcement');
            }
            Announcement::create($data);
            return redirect()->route('admin.announcement.index')->with('success', 'Pengumuman baru berhasil dibuat!');
        } catch (\Throwable $th) {
            return back()->with('error', $th->getMessage());
        }
    }
    public function update(Announcement $announcement, AnnouncementRequest $announcementRequest)
    {
        try {
            $data = $announcementRequest->all();
            if ($announcementRequest->hasFile('dokumen_pengumuman')) {
                if ($announcement->dokumen_pengumuman != null) $this->publishService->fileDeleteHandler($announcement->dokumen_pengumuman);
                $data['dokumen_pengumuman'] = $this->publishService->fileStoreHandler($announcementRequest->file('dokumen_pengumuman'), 'public/img/agenda');
            }else {
                $data['dokumen_pengumuman'] = $announcement->dokumen_pengumuman;
            }
            $announcement->update($data);
            return redirect()->route('admin.announcement.index')->with('success', 'Pengumuman berhasil diubah!');
        } catch (\Throwable $th) {
            return back()->with('error', $th->getMessage());
        }
    }
    public function destroy(Announcement $announcement)
    {
        try {
            $this->publishService->fileDeleteHandler($announcement->dokumen_pengumuman);
            $announcement->deleteOrFail();
            return redirect()->route('admin.announcement.index')->with('success', 'Pengumuman baru berhasil dihapus!');
        } catch (\Throwable $th) {
            return back()->with('error', $th->getMessage());
        }
    }
}
