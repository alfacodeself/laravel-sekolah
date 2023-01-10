<?php

namespace App\Http\Middleware;

use App\Models\Banner;
use App\Models\School;
use Closure;
use Illuminate\Http\Request;

class SchoolIssetMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
        $school = School::count();
        $banner = Banner::count();
        if ($school <= 0) {
            return redirect()->route('login')->with('warning', 'Tidak ada data sekolah! Harap login untuk melengkapi data yang dibutuhkan!');
        }
        if ($banner <= 0) {
            return redirect()->route('login')->with('warning', 'Tidak ada banner sekolah! Harap login untuk melengkapi data yang dibutuhkan!');
        }
        return $next($request);
    }
}
