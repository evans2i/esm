<?php

namespace App\Http\Controllers\Accademic;

use App\Http\Controllers\Controller;
use App\Http\Resources\Academic\AssigmentResource;
use App\Http\Resources\AssignSubjectResource;
use App\Http\Resources\FacultyResource;
use App\Http\Resources\NameResource;
use App\Http\Resources\SubjectResource;
use App\Http\Resources\TitleResource;
use App\Models\Assignment;
use App\Models\AssignSubject;
use App\Models\Faculty;
use App\Models\Semester;
use App\Models\Staff;
use App\Models\Year;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use Inertia\Inertia;
use PhpParser\Node\Stmt\Return_;

class AssignmentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $staff = Staff::where('user_id',Auth::id())->first();
        if (Auth::user()->hasRole(['academic', 'superadministrator'])){
            $sub = AssignSubject::orderBy('id', 'desc')->groupBy('subject_id')->get()->take(10);
            $subId = $sub?$sub->pluck('subject_id'):null;
        }elseif (Auth::user()->hasRole('staff')){
            $staff = Staff::where('user_id',Auth::id())->first();
            $sub = AssignSubject::where('staff_id',$staff->id)->groupBy('subject_id')->get();
            $subId = $sub?$sub->pluck('subject_id'):null;
        }else{
            $subId= [];
        }
        $vans['year'] = TitleResource::collection(Year::orderBy('id', 'desc')->get());
        $vans['faculty'] = FacultyResource::collection(Faculty::orderBy('id', 'desc')->Active()->get());
        $vans['staff'] = NameResource::collection(Staff::latest()->whereHas('user',function($q){$q->whereRoleIs('staff');})->Active()->get());
        $vans['assigns'] = AssigmentResource::collection(Assignment::whereIn('subject_id',$subId)->orderBy('id', 'desc')->get());
        return Inertia::render('Assigment/Assignment', ['vans'=>$vans,'urls'=>"/assignment/assignments", 'pagetitle'=>"Assigment"]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'faculty_id' =>'required',
            'semester_id' =>'required',
            'publish_date' =>'required',
            'end_date' =>'required',
            'subject_id' =>'required',
            'title' =>'required'
        ]);
        $year = Year::orderBy('id', 'desc')->ActiveStatus()->latest()->first();
        $input = [
            'year_id' => $year->id,
            'faculty_id' =>$request->faculty_id,
            'semester_id' =>$request->semester_id,
            'subject_id' =>$request->subject_id,
            'publish_date' =>Carbon::parse($request->publish_date),
            'end_date' =>Carbon::parse($request->end_date),
            'title' =>$request->title,
            'status' =>"not-active",
            'description' =>$request->description,
            'created_by' =>Auth::Id(),
        ];
        if ($request->hasFile('file')) {
             $fileName = time().'.'.$request->file->getClientOriginalExtension();
             $request->file->move(public_path('Documents/Assignments'), $fileName);
            $input['file'] = $fileName;
        }
        $van = Assignment::create($input);
        return response()->json(new AssigmentResource($van));

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Assignment  $assignment
     * @return \Illuminate\Http\Response
     */
    public function show(Assignment $assignment)
    {
        $van = new AssigmentResource($assignment);
        return Inertia::render('Assigment/AssignmentAnswer', ['vans'=>$van,'urls'=>"/assignment/assignments", 'pagetitle'=>"Assigment"]);

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Assignment  $assignment
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Assignment $assignment)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Assignment  $assignment
     * @return \Illuminate\Http\Response
     */
    public function destroy(Assignment $assignment)
    {
        if($assignment->created_by === Auth::id()){
            $assignment->delete();
        }
    }
    public function loadSubjectForStaff($staffId = null, $semester = null)
    {
        $semesters = Semester::FindOrFail($semester);
        if (Auth::user()->hasRole(['academic', 'superadministrator'])){
            $sub = AssignSubject::where('staff_id',$staffId)->where('semester_id',$semester)->groupBy('subject_id')->get();
            $subId = $sub?$sub->pluck('subject_id'):null;

        }elseif (Auth::user()->hasRole('staff')){
            $staff = Staff::where('user_id',Auth::id())->first();
            $sub = AssignSubject::where('staff_id',$staff->id)->where('semester_id',$semester)->groupBy('subject_id')->get();
            $subId = $sub?$sub->pluck('subject_id'):null;
        }else{
            $subId= [];
        }
        $van = SubjectResource::collection($semesters->subjects->whereIn('id',$subId));
        return response()->json($van);
    }

    public function loadSubjectForStaffCurrent($semester = null)
    {
        $semesters = Semester::FindOrFail($semester);
        if (Auth::user()->hasRole('staff')){
            $staff = Staff::where('user_id',Auth::id())->first();
            $sub = AssignSubject::where('staff_id',$staff->id)->where('semester_id',$semester)->groupBy('subject_id')->get();
            $subId = $sub?$sub->pluck('subject_id'):null;
        }else{
            $subId= [];
        }
        $van = SubjectResource::collection($semesters->subjects->whereIn('id',$subId));
        return response()->json($van);
    }

    public function findAssignment(Request $request)
    {
        $vans['error'] = false;

        $van = Assignment::where('subject_id',$request->subject_id)
                        ->where('faculty_id',$request->faculty_id)
                        ->where('semester_id',$request->semester_id)
                        ->where('subject_id',$request->subject_id)
                        ->orderBy('id', 'desc')->get();
        if($request->year_id){
            $van = $van->where('year_id',$request->year_id);
        }
        if($van->isEmpty()){
            $vans['error'] = true;
            $vans['message'] = "Sorry No Any Assignment have Been Created in this Year Selected";
        }else{
            $vans['subj'] = AssigmentResource::collection($van);
        }
        return response()->json($vans);
    }
}
