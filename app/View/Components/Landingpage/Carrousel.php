<?php

namespace App\View\Components\Landingpage;

use App\Models\Banner;
use App\Models\School;
use Illuminate\View\Component;

class Carrousel extends Component
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

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        $banners = Banner::get();
        $school = School::first();
        return view('components.landingpage.carrousel', compact('banners', 'school'));
    }
}
