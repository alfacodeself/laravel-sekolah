<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Announcement;
use Illuminate\Http\Request;

class AnnouncementController extends Controller
{
    public function index()
    {
        $announcementActive = Announcement::whereDate('tanggal_akhir', '>=', Carbon::now())->orderBy('tanggal_awal', 'ASC')->get();
        $announcementNonactive = Announcement::whereDate('tanggal_akhir', '<', Carbon::now())->orderBy('tanggal_akhir', 'DESC')->paginate(10);
        return view('apps.landingpage.announcement.index', compact('announcementActive', 'announcementNonactive'));
    }
    public function show(Announcement $announcement)
    {
        return view('apps.landingpage.announcement.show', compact('announcement'));
    }
}
