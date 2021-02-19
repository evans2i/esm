<?php

namespace App\Http\Controllers\Manage;

use Inertia\Inertia;
use Illuminate\Http\Request;
use App\Models\StudentStatus;
use App\Http\Controllers\Controller;

class StudentStatusController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $vans = StudentStatus::all();
        $option = ['show' => false,'edit' => false,'delete' => false, 'create'=>false];
        return Inertia::render('Crud/NewCrud', ['vans'=>$vans,'urls'=>"studentStatuses", 'pagetitle'=>"Student Status", 'option'=>$option]);
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
        $van = StudentStatus::create($input);
        return response()->json($van);
    }
    /**
     * Display the specified resource.
     *
     * @param  \App\Models\StudentStatus  $studentStatus
     * @return \Illuminate\Http\Response
     */
    public function show(StudentStatus $studentStatus)
    {
        //
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\StudentStatus  $studentStatus
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, StudentStatus $studentStatus)
    {
        if ($request->has('title')) {
            $studentStatus->title = $request->title;
        }
        if ($request->has('status')) {
            $studentStatus->status = $request->status;
        }
        if ($studentStatus->isDirty()) {
            $studentStatus->update();
        }
        return response()->json($studentStatus);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\StudentStatus  $studentStatus
     * @return \Illuminate\Http\Response
     */
    public function destroy(StudentStatus $studentStatus)
    {
        $studentStatus->delete();
    }
}
