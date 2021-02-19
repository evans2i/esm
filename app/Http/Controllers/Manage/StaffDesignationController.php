<?php

namespace App\Http\Controllers\Manage;

use Inertia\Inertia;
use Illuminate\Http\Request;
use App\Models\StaffDesignation;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class StaffDesignationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $vans = StaffDesignation::all();
        $option = ['show' => false,'edit' => false,'delete' => false, 'create'=>false];
        return Inertia::render('Crud/NewCrud', ['vans'=>$vans,'urls'=>"staffDesignations", 'pagetitle'=>"Staff Designation", 'option'=>$option]);
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
            'created_by' => Auth::Id(),
        ];
        $van = StaffDesignation::create($input);
        return response()->json($van);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\StaffDesignation  $staffDesignation
     * @return \Illuminate\Http\Response
     */
    public function show(StaffDesignation $staffDesignation)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\StaffDesignation  $staffDesignation
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, StaffDesignation $staffDesignation)
    {
        if ($request->has('title')) {
            $staffDesignation->title = $request->title;
        }
        if ($request->has('status')) {
            $staffDesignation->status = $request->status;
        }
        if ($staffDesignation->isDirty()) {
            $staffDesignation->update();
        }
        return response()->json($staffDesignation);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\StaffDesignation  $staffDesignation
     * @return \Illuminate\Http\Response
     */
    public function destroy(StaffDesignation $staffDesignation)
    {
        $staffDesignation->delete();
    }
}
