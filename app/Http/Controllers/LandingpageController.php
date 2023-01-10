<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\News;
use App\Models\Event;
use App\Models\School;
use App\Models\Gallery;
use Illuminate\Support\Str;
use App\Models\Announcement;

class LandingpageController extends Controller
{
    public function index()
    {
        $events = Event::whereDate('tanggal', '>=', Carbon::now())->latest()->limit(6)->get();
        $announcements = Announcement::whereDate('tanggal_akhir', '>=', Carbon::now())->latest()->limit(3)->get();
        $newsPopular = News::orderBy('dibaca', 'DESC')->first();
        $news = News::query();
        if ($newsPopular) {
            $news = $news->where('id', '!=', $newsPopular->id);
        }
        $news = $news->latest()->limit(5)->get();
        $galleries = Gallery::all();
        $school = School::first();
        $school->sejarah = Str::limit($school->sejarah, 100, '...');
        return view('apps.landingpage.index', compact('events', 'news', 'newsPopular', 'announcements', 'galleries', 'school'));
    }
}
