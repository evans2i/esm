<?php

namespace App\Http\Controllers\Manage;

use Inertia\Inertia;
use Illuminate\Http\Request;
use App\Models\AttendanceStatus;
use App\Http\Controllers\Controller;

class AttendanceStatusController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $vans = AttendanceStatus::all();
        $option = ['show' => false,'edit' => false,'delete' => false, 'create'=>false];
            
        return Inertia::render('Crud/NewCrud', ['vans'=>$vans,'urls'=>"attendanceStatuses", 'pagetitle'=>"Attendance Status", 'option'=>$option]);

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
            'title' => 'required',
        ];
        $this->validate($request, $rules);
        $input = [
            'title' => $request->title,
            'status' => $request->status,
        ];
        $van = AttendanceStatus::create($input);
        return response()->json($van);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\AttendanceStatus  $attendanceStatus
     * @return \Illuminate\Http\Response
     */
    public function show(AttendanceStatus $attendanceStatus)
    {
        //
    }



    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\AttendanceStatus  $attendanceStatus
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, AttendanceStatus $attendanceStatus)
    {
        if ($request->has('title')) {
             $attendanceStatus->title = $request->title;
        }
        if ($request->has('status')) {
             $attendanceStatus->status = $request->status;
        }
        if ( $attendanceStatus->isDirty()) {
             $attendanceStatus->update();
        }
        return response()->json( $attendanceStatus);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\AttendanceStatus  $attendanceStatus
     * @return \Illuminate\Http\Response
     */
    public function destroy(AttendanceStatus $attendanceStatus)
    {
         $attendanceStatus->delete();
    }
}
