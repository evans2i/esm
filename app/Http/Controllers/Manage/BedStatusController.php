<?php

namespace App\Http\Controllers\Manage;

use Inertia\Inertia;
use App\Models\BedStatus;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class BedStatusController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $vans = BedStatus::all();
        $option = ['show' => false,'edit' => false,'delete' => false, 'create'=>false];
            
        return Inertia::render('Crud/NewCrud', ['vans'=>$vans,'urls'=>"bedStatuses", 'pagetitle'=>"Bed Status", 'option'=>$option]);
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
        $van = BedStatus::create($input);
        return response()->json($van);
    }


    /**
     * Display the specified resource.
     *
     * @param  \App\Models\BedStatus  $bedStatus
     * @return \Illuminate\Http\Response
     */
    public function show(BedStatus $bedStatus)
    {
        //
    }



    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\BedStatus  $bedStatus
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, BedStatus $bedStatus)
    {
        if ($request->has('title')) {
            $bedStatus->title = $request->title;
        }
        if ($request->has('status')) {
            $bedStatus->status = $request->status;
        }
        if ($bedStatus->isDirty()) {
            $bedStatus->update();
        }
        return response()->json($bedStatus);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\BedStatus  $bedStatus
     * @return \Illuminate\Http\Response
     */
    public function destroy(BedStatus $bedStatus)
    {
        $bedStatus->delete();
    }
}
