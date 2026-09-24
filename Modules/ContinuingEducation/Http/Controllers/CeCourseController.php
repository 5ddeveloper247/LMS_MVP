<?php

namespace Modules\ContinuingEducation\Http\Controllers;

use App\Http\Controllers\Controller;

class CeCourseController extends Controller
{
    public function index()
    {
        return view('continuingeducation::courses.index');
    }
}
