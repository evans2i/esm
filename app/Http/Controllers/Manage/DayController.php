<?php

namespace App\Http\Controllers\Manage;

use App\Models\Day;
use Inertia\Inertia;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class DayController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Inertia\Response
     */
    public function index()
    {
        $vans = Day::all();
        $option = ['show' => false,'edit' => false,'delete' => false, 'create'=>false];  
        return Inertia::render('Days/Day', ['vans'=>$vans,'urls'=>"days", 'pagetitle'=>"Days", 'option'=>$option]);
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
        $van = Day::create($input);
        return response()->json($van);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Models\Day  $day
     * @return \Illuminate\Http\Response
     */
    public function show(Day $day)
    {
        //
    }

 

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Models\Day  $day
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Day $day)
    {
        if ($request->has('title')) {
            $day->title = $request->title;
        }
        if ($request->has('status')) {
            $day->status = $request->status;
        }
        if ($day->isDirty()) {
            $day->update();
        }
        return response()->json($day);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Models\Day  $day
     * @return \Illuminate\Http\Response
     */
    public function destroy(Day $day)
    {
        $day->delete();
    }
}
