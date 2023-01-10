<?php

namespace App\View\Components;

use App\Models\School;
use Illuminate\View\Component;

class NavbarAdmin extends Component
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
        if ($school) {
            $logo = url($school->logo);
            $nama = $school->nama;
        }else {
            $logo = asset('assets/images/logo-sm.png');
            $nama = 'SEKOLAH';
        }
        return view('components.navbar-admin', compact('logo', 'nama'));
    }
}
