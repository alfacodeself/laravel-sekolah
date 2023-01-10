<?php

namespace App\Http\Controllers\Admin;

use App\Models\School;
use App\Http\Controllers\Controller;
use App\Http\Requests\SchoolRequest;
use App\Http\Services\SchoolService;

class SchoolAdminController extends Controller
{
    public $schoolService;
    public function __construct(SchoolService $schoolService)
    {
        $this->schoolService = $schoolService;
    }
    public function index()
    {
        $school = School::first();
        if ($school) {
            return view('apps.admin.school.index', compact('school'));
        } else {
            return view('apps.admin.school.index');
        }
    }
    public function store(SchoolRequest $schoolRequest)
    {
        try {
            $data = $schoolRequest->all();
            $school = School::first();
            if ($school) {
                if ($schoolRequest->hasFile('logo')) {
                    if ($school->logo != null) $this->schoolService->logoDeleteHandler($school->logo);
                    $data['logo'] = $this->schoolService->logoStoreHandler($schoolRequest->file('logo'));
                } else {
                    $data['logo'] = $school->logo;
                }
                $school->updateOrFail($data);
            } else {
                $data['logo'] = $this->schoolService->logoStoreHandler($schoolRequest->file('logo'));
                School::create($data);
            }
            return redirect()->route('admin.school.index')->with('success', 'Berhasil memperbarui data sekolah!');
        } catch (\Throwable $th) {
            return back()->with('error', $th->getMessage());
        }
    }
}
