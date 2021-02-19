<?php

namespace App\Http\Controllers;

use App\Models\Year;
use Inertia\Inertia;
use App\Models\Staff;
use App\Models\Faculty;
use Illuminate\Http\Request;
use App\Models\AssignFaculty;
use App\Http\Controllers\Controller;
use App\Http\Resources\NameResource;
use Illuminate\Support\Facades\Auth;
use App\Http\Resources\TitleResource;
use App\Http\Resources\FacultyResource;
use App\Http\Resources\AssignFucultyResource;

class AssignFacultyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $vans['assign'] = AssignFucultyResource::collection(AssignFaculty::orderBy('id', 'desc')->take(7)->get());
        $vans['staff'] = NameResource::collection(Staff::latest()->whereHas('user',function($q){$q->whereRoleIs('staff');})->Active()->get());
        $vans['year'] = TitleResource::collection(Year::orderBy('id', 'desc')->take(5)->get());
        $vans['faculty'] = FacultyResource::collection(Faculty::orderBy('id', 'desc')->Active()->get());
        $option = ['show' => false,'edit' => false,'delete' => false, 'create'=>false];
        return Inertia::render('Academic/AssignFaculty', ['vans'=>$vans,'urls'=>"assignFaculties", 'pagetitle'=>"Assign Class", 'option'=>$option]);
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
        ];
        $this->validate($request, $rules);
        $seco = "stay";
        $input = [
            'year_id' => $request->year_id,
            'staff_id' => $request->staff_id,
            'faculty_id' => $request->faculty_id,
        ];
        $van = AssignFaculty::where('year_id',$request->year_id)->where('faculty_id',$request->faculty_id)->first();
        if (!$van) {
            $van = AssignFaculty::create($input);
        } else {
            $van->update(['staff_id' => $request->staff_id, 'last_updated_by' => Auth::Id()]);
            $seco = "replace";
        }
        $ivan = new AssignFucultyResource($van);
        return response()->json([$ivan,$seco]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\AssignFaculty  $assignFaculty
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, AssignFaculty $assignFaculty)
    {
        if ($request->has('staff_id')) {
            $assignFaculty->staff_id = $request->staff_id;
        }
        
        if ($assignFaculty->isDirty()) {
            $assignFaculty->last_updated_by = Auth::Id();
            $assignFaculty->update();
        }
        $van = new AssignFucultyResource($assignFaculty);
        return response()->json($van);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\AssignFaculty  $assignFaculty
     * @return \Illuminate\Http\Response
     */
    public function destroy(AssignFaculty $assignFaculty)
    {
        $assignFaculty->delete();
    }
}
