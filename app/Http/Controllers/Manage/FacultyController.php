<?php

namespace App\Http\Controllers\Manage;

use Inertia\Inertia;
use App\Models\Faculty;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class FacultyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $vans = Faculty::with('semesters')->get();
        $option = ['show' => false,'edit' => false,'delete' => false, 'create'=>false];
        return Inertia::render('Academic/Faculties', ['vans'=>$vans,'urls'=>"faculties", 'pagetitle'=>"Faculty/Classes", 'option'=>$option]);
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
            'faculty' => 'required',
            'faculty_code' => 'required',
        ];
        $this->validate($request, $rules);
        $input = [
            'faculty' => $request->faculty,
            'created_by' => Auth::id(),
            'faculty_code' => $request->faculty_code,
            'status' => $request->status,
        ];
        $van = Faculty::create($input);
        $semesters = [];
        if($request->semesters){
            //update & add grade scales
          foreach ($request->semesters as $key => $semester) {
               $semesters[$semester['id']] = [
                  'semester_id' => $semester['id'],
              ];
           }
       }
        $van->semesters()->sync($semesters);
        $van = Faculty::with('semesters')->find($van->id);
        return response()->json($van);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Faculty  $faculty
     * @return \Illuminate\Http\Response
     */
    public function show(Faculty $faculty)
    {
        //
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Faculty  $faculty
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Faculty $faculty)
    {
        if ($request->has('faculty')) {
            $faculty->faculty = $request->faculty;
        }
        if ($request->has('faculty_code')) {
            $faculty->faculty_code = $request->faculty_code;
        }
        if ($request->has('status')) {
            $faculty->status = $request->status;
        }
        if ($faculty->isDirty()) {
            $faculty->last_updated_by = Auth::id();
            $faculty->update();
        }
        if ($request->has('semesters')) {
            $semesters = [];
            if($request->semesters){
            //update & add grade scales
                foreach ($request->semesters as $key => $semester) {
                    $semesters[$semester['id']] = [
                        'semester_id' => $semester['id'],
                    ];
                }
            }
            $faculty->semesters()->sync($semesters);
        }
        $van = Faculty::with('semesters')->find($faculty->id);
        return response()->json($faculty);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Faculty  $faculty
     * @return \Illuminate\Http\Response
     */
    public function destroy(Faculty $faculty)
    {
        $faculty->semesters()->sync([]);
        $faculty->delete();
    }
}
