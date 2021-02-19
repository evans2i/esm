<?php

namespace App\Http\Controllers\Manage;

use Inertia\Inertia;
use Illuminate\Http\Request;
use App\Models\VisitorPurpose;
use App\Http\Controllers\Controller;

class VisitorPurposeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $vans = VisitorPurpose::all();
        $option = ['show' => false,'edit' => false,'delete' => false, 'create'=>false];
        return Inertia::render('Crud/NewCrud', ['vans'=>$vans,'urls'=>"visitorPurposes", 'pagetitle'=>"Visitor Purpose", 'option'=>$option]);
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
            'status' => 'required',
        ];
        $this->validate($request, $rules);
        $input = [
            'title' => $request->title,
            'status' => $request->status,
        ];
        $van = VisitorPurpose::create($input);
        return response()->json($van);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\VisitorPurpose  $visitorPurpose
     * @return \Illuminate\Http\Response
     */
    public function show(VisitorPurpose $visitorPurpose)
    {
        //
    }

  
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\VisitorPurpose  $visitorPurpose
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, VisitorPurpose $visitorPurpose)
    {
        if ($request->has('title')) {
            $visitorPurpose->title = $request->title;
        }
        if ($request->has('status')) {
            $visitorPurpose->status = $request->status;
        }
        if ($visitorPurpose->isDirty()) {
            $visitorPurpose->update();
        }
        return response()->json($visitorPurpose);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\VisitorPurpose  $visitorPurpose
     * @return \Illuminate\Http\Response
     */
    public function destroy(VisitorPurpose $visitorPurpose)
    {
        $visitorPurpose->delete();
    }
}
