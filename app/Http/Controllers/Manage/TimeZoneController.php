<?php

namespace App\Http\Controllers\Manage;

use Inertia\Inertia;
use App\Models\TimeZone;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class TimeZoneController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $vans = TimeZone::all();
        $option = ['show' => false,'edit' => false,'delete' => false, 'create'=>false];
        return Inertia::render('Crud/NewCrud', ['vans'=>$vans,'urls'=>"timeZones", 'pagetitle'=>"TimeZone", 'option'=>$option]);
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
        $van = TimeZone::create($input);
        return response()->json($van);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\TimeZone  $timeZone
     * @return \Illuminate\Http\Response
     */
    public function show(TimeZone $timeZone)
    {
        //
    }

    

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\TimeZone  $timeZone
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, TimeZone $timeZone)
    {
        if ($request->has('title')) {
            $timeZone->title = $request->title;
        }
        if ($request->has('status')) {
            $timeZone->status = $request->status;
        }
        if ($timeZone->isDirty()) {
            $timeZone->update();
        }
        return response()->json($timeZone);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\TimeZone  $timeZone
     * @return \Illuminate\Http\Response
     */
    public function destroy(TimeZone $timeZone)
    {
        $timeZone->delete();
    }
}
