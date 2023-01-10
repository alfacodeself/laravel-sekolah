<?php

namespace App\View\Components;

use App\Models\School;
use Illuminate\View\Component;

class LoginHeader extends Component
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
            $name = $school->nama;
        }else {
            $logo = asset('assets/images/favicon.ico');
            $name = 'APLIKASI SEKOLAH';
        }
        return view('components.login-header', compact('logo', 'name'));
    }
}
