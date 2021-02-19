<?php

namespace App\Http\Controllers\Subjects;

use Inertia\Inertia;
use App\Models\Staff;
use App\Models\Subject;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class SubjectController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       $vans['subject'] = Subject::select('id', 'title', 'code', 'full_mark_theory', 'pass_mark_theory',
           'full_mark_practical', 'pass_mark_practical', 'credit_hour', 'sub_type', 'class_type', 'staff_id',
           'description','status')->orderBy('title')->get();
       $vans['staffs'] = Staff::select('id','first_name','middle_name','last_name')->Active()->get() ;
            $option = ['show' => false,'edit' => false,'delete' => false, 'create'=>false];
            return Inertia::render('Academic/Subject', ['vans'=>$vans,'urls'=>"subjects", 'pagetitle'=>"Subject/Course", 'option'=>$option]);
    }

 

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request['created_by'] = Auth::id();
        $subject = Subject::create($request->all());
        return response()->json($subject);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Subject  $subject
     * @return \Illuminate\Http\Response
     */
    public function show(Subject $subject)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Subject  $subject
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Subject $subject)
    {
        if ($request->has('title')) {
            $subject->title = $request->title;
        }
        if ($request->has('status')) {
            $subject->status = $request->status;
        }
        if ($request->has('code')) {
            $subject->code = $request->code;
        }
        if ($request->has('full_mark_theory')) {
            $subject->full_mark_theory = $request->full_mark_theory;
        }

        if ($request->has('pass_mark_theory')) {
            $subject->pass_mark_theory = $request->pass_mark_theory;
        }
        if ($request->has('full_mark_practical')) {
            $subject->full_mark_practical = $request->full_mark_practical;
        }
        if ($request->has('pass_mark_practical')) {
            $subject->pass_mark_practical = $request->pass_mark_practical;
        }
        if ($request->has('full_mark_theory')) {
            $subject->full_mark_theory = $request->full_mark_theory;
        }


        if ($request->has('credit_hour')) {
            $subject->credit_hour = $request->credit_hour;
        }

        if ($request->has('sub_type')) {
            $subject->sub_type = $request->sub_type;
        }
        if ($request->has('class_type')) {
            $subject->class_type = $request->class_type;
        }
        if ($request->has('staff_id')) {
            $subject->staff_id = $request->staff_id;
        }
        if ($request->has('description')) {
            $subject->description = $request->description;
        }


        if ($subject->isDirty()) {
            $subject->last_updated_by = Auth::Id();
            $subject->update();
        }
        
        return response()->json($subject);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Subject  $subject
     * @return \Illuminate\Http\Response
     */
    public function destroy(Subject $subject)
    {
        //
    }
}
