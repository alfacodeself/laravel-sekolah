<?php

namespace App\View\Components\Landingpage;

use App\Models\School;
use Illuminate\View\Component;

class TopBar extends Component
{
    public function __construct()
    {
        //
    }
    public function render()
    {
        $school = School::first();
        if ($school) {
            $phone = $school->nomor_telpon;
            $email = $school->email;
        }else {
            $phone = '+123 456 789';
            $email = 'example@school.test';
        }
        return view('components.landingpage.top-bar', compact('phone', 'email'));
    }
}
