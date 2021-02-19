<?php

namespace App\Http\Controllers\Ajax;

use App\Models\Staff;
use App\Models\Subject;
use App\Models\GradingType;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Resources\NameResource;
use App\Http\Resources\SubjectResource;
use App\Http\Resources\SemesterResource;
use App\Models\Faculty;
use App\Models\Semester;

class AjaxController extends Controller
{
    public function staffGrading(){
        $vars['staffs'] = NameResource::collection(Staff::Active()->get());
        $vars['grading'] = GradingType::select('id','title')->Active()->get();
        $vars['subjects'] = SubjectResource::collection(Subject::select('id','title','code')->Active()->get());
        // $auth = new AuthUserResource(Auth::user());
        return response()->json($vars);
    }

    public function semeter(){
        $vans =SemesterResource::collection(Semester::select('id','semester')->Active()->get());
        return response()->json($vans);
    }
    public function loadSemisterFromFaculty($id)
    { $ivan = Faculty::FindOrFail($id);
        $van = $ivan->semesters;
        return response()->json($van); 
    }

    public function loadSubjectFromSemester($id)
    {
        $semester = Semester::FindOrFail($id);
        $van = SubjectResource::collection($semester->subjects);
        return response()->json($van); 
    }


}
