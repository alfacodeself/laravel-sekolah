<?php

namespace App\View\Components;

use App\Models\Portal;
use App\Models\School;
use Illuminate\View\Component;

class Navbar extends Component
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
        $school = School::first();
        $portal = Portal::get();
        $portal->count() <= 0 ? $portal = null : $portal;
        return view('components.navbar', compact('school', 'portal'));
    }
}
