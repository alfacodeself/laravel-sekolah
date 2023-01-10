<?php

namespace App\View\Components;

use App\Models\School;
use Illuminate\View\Component;

class Logo extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }
    public function render()
    {
        $school = School::first();
        if ($school) {
            $logo = url($school->logo);
        }else {
            $logo = asset('assets/images/favicon.ico');
        }
        return view('components.logo', compact('logo'));
    }
}
