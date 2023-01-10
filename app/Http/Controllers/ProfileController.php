<?php

namespace App\Http\Controllers;

use App\Models\School;

class ProfileController extends Controller
{
    protected $school;

    public function __construct()
    {
        $this->school = School::first();
    }
    public function history()
    {
        return view('apps.landingpage.profile.sejarah', [
            'sejarah' => $this->school->sejarah
        ]);
        
    }
    public function purpose()
    {
        return view('apps.landingpage.profile.visi-misi', [
            'visi' => $this->school->visi,
            'misi' => $this->school->misi,
        ]);
    }
}
