<?php

namespace App\Http\Controllers\Manage;

use Inertia\Inertia;
use App\Models\StudentBatch;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class StudentBatchController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $vans = StudentBatch::all();
        $option = ['show' => false,'edit' => false,'delete' => false, 'create'=>false];
        return Inertia::render('Crud/NewCrud', ['vans'=>$vans,'urls'=>"studentBatches", 'pagetitle'=>"Student Batch", 'option'=>$option]);
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
        $van = StudentBatch::create($input);
        return response()->json($van);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\StudentBatch  $studentBatch
     * @return \Illuminate\Http\Response
     */
    public function show(StudentBatch $studentBatch)
    {
        //
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\StudentBatch  $studentBatch
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, StudentBatch $studentBatch)
    {
        if ($request->has('title')) {
            $studentBatch->title = $request->title;
        }
        if ($request->has('status')) {
            $studentBatch->status = $request->status;
        }
        if ($studentBatch->isDirty()) {
            $studentBatch->update();
        }
        return response()->json($studentBatch);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\StudentBatch  $studentBatch
     * @return \Illuminate\Http\Response
     */
    public function destroy(StudentBatch $studentBatch)
    {
        $studentBatch->delete();
    }
}
