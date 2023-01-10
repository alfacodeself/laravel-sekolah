<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Announcement;
use App\Models\Event;
use App\Models\Gallery;
use App\Models\News;
use Carbon\Carbon;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(Request $request)
    {
        // dd(Carbon::now());
        $data['gallery'] = [
            'title' => 'Galeri',
            'total' => Gallery::count()
        ];
        $data['news'] = [
            'title' => 'Berita',
            'total' => News::count()
        ];
        $data['news'] = [
            'title' => 'Berita',
            'total' => News::count()
        ];
        $data['event'] = [
            'title' => 'Agenda',
            'total' => Event::count(),
            'note' => Event::whereDate('tanggal', '>=', Carbon::now())->count() . ' Aktif'
        ];
        $data['announcement'] = [
            'title' => 'Pengumuman',
            'total' => Announcement::count(),
            'note' => Announcement::whereDate('tanggal_akhir', '>=', Carbon::now())->count() . ' Aktif'
        ];
        $data['tables'] = [
            [
                'title' => 'Agenda Aktif',
                'headers' => ['Thumbnail', 'Agenda', 'Lokasi', 'Tanggal', 'Waktu'],
                'body' => ['thumbnail', 'catatan', 'lokasi', 'tanggal', 'waktu'],
                'data' => Event::whereDate('tanggal', '>=', Carbon::now())->get()->toArray()
            ],
            [
                'title' => 'Pengumuman Aktif',
                'headers' => ['Pengumuman', 'Deskripsi', 'Mulai', 'Selesai', 'Dokumen'],
                'body' => ['catatan', 'deskripsi', 'tanggal_awal', 'tanggal_akhir', 'dokumen_pengumuman'],
                'data' => Announcement::whereDate('tanggal_akhir', '>=', Carbon::now())->get()->toArray()
            ],
        ];
        // dd($data);
        return view('apps.admin.dashboard', $data);
    }
}
