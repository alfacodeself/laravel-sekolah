<?php

namespace App\View\Components\Landingpage;

use App\Models\School;
use Illuminate\View\Component;

class Footer extends Component
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
        return view('components.landingpage.footer', compact('school'));
    }
}
