<?php

namespace App\Http\Controllers;
use App\Http\Controllers\Controller;

use App\Models\Year;
use Inertia\Inertia;
use App\Models\Staff;
use App\Models\Faculty;
use Illuminate\Http\Request;
use App\Models\AssignSubject;
use App\Http\Resources\NameResource;
use App\Http\Resources\TitleResource;
use App\Http\Resources\FacultyResource;
use App\Http\Resources\AssignFucultyResource;
use App\Http\Resources\AssignSubjectResource;
use App\Http\Resources\SemesterResource;
use App\Http\Resources\SubjectResource;
use App\Models\Semester;
use App\Models\Subject;

class AssignSubjectController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $vans['assign'] = AssignSubjectResource::collection(AssignSubject::orderBy('id', 'desc')->take(30)->get());
        $vans['staff'] = NameResource::collection(Staff::latest()->whereHas('user',function($q){$q->whereRoleIs('staff');})->Active()->get());
        $vans['year'] = TitleResource::collection(Year::orderBy('id', 'desc')->take(5)->get());
        $vans['faculty'] = FacultyResource::collection(Faculty::orderBy('id', 'desc')->Active()->get());
        $vans['semester'] = SemesterResource::collection(Semester::Active()->get());
        $vans['subject'] = SubjectResource::collection(Subject::Active()->get());
        $option = ['show' => false,'edit' => false,'delete' => false, 'create'=>false];
        return Inertia::render('Academic/AssignSubject', ['vans'=>$vans,'urls'=>"assignSubjects", 'pagetitle'=>"Assign Class", 'option'=>$option]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $rules = [
            'year_id' => 'required',
            'staff_id' => 'required',
            'faculty_id' => 'required',
            'subject_id' => 'required',
        ];
        $this->validate($request, $rules);
        $input = [
            'year_id' => $request->year_id,
            'staff_id' => $request->staff_id,
            'faculty_id' => $request->faculty_id,
            'semester_id' => $request->semester_id,
            'subject_id' => $request->subject_id,
        ];
        $chekData = "proceed";
        $van = AssignSubject::where('year_id',$request->year_id)
                            ->where('faculty_id',$request->faculty_id)
                            ->where('subject_id',$request->subject_id)
                            ->where('staff_id',$request->staff_id)
                            ->first();
        if(!$van){
            $van = AssignSubject::create($input);
        }else{
            $chekData = "nothing";
        }
        $van = new AssignSubjectResource($van);
        return response()->json([$van,$chekData]);
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\AssignSubject  $assignSubject
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, AssignSubject $assignSubject)
    {
        if ($request->has('staff_id')) {
            $assignSubject->staff_id = $request->staff_id;
        }
        if ($assignSubject->isDirty()) {
            $assignSubject->update();
        }
        $van = new AssignSubjectResource($assignSubject);
        return response()->json($van);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\AssignSubject  $assignSubject
     * @return \Illuminate\Http\Response
     */
    public function destroy(AssignSubject $assignSubject)
    {
        $assignSubject->delete();
    }
}
