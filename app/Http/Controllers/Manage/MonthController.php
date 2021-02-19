<?php

namespace App\Http\Controllers\Manage;

use App\Http\Controllers\Controller;
use App\Models\Month;
use Illuminate\Http\Request;
use Inertia\Inertia;

class MonthController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Inertia\Response
     */
    public function index()
    {
        $vans = Month::latest()->get();
        $option = ['show' => false,'edit' => false,'delete' => false,'create'=>false];
        return Inertia::render('Days/Day', ['vans'=>$vans,'urls'=>"months",'pagetitle'=>"Months", 'option'=>$option]);
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
        $van = Month::create($input);
        return response()->json($van);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Month  $month
     * @return \Illuminate\Http\Response
     */
    public function show(Month $month)
    {
        
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Month  $month
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Month $month)
    {
        if ($request->has('title')) {
            $month->title = $request->title;
        }
        if ($request->has('status')) {
            $month->status = $request->status;
        }
        if ($month->isDirty()) {
            $month->update();
        }
        return response()->json($month);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Month  $month
     * @return \Illuminate\Http\Response
     */
    public function destroy(Month $month)
    {
        $month->delete();
    }
}
