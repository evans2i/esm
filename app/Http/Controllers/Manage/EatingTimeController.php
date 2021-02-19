<?php

namespace App\Http\Controllers\Manage;

use Inertia\Inertia;
use App\Models\EatingTime;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class EatingTimeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $vans = EatingTime::all();
        $option = ['show' => false,'edit' => false,'delete' => false, 'create'=>false];
        return Inertia::render('Crud/NewCrud', ['vans'=>$vans,'urls'=>"eatingTime", 'pagetitle'=>"Eating Time", 'option'=>$option]);
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
        $van = EatingTime::create($input);
        return response()->json($van);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\EatingTime  $eatingTime
     * @return \Illuminate\Http\Response
     */
    public function show(EatingTime $eatingTime)
    {
        //
    }

    
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\EatingTime  $eatingTime
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, EatingTime $eatingTime)
    {
        if ($request->has('title')) {
            $eatingTime->title = $request->title;
        }
        if ($request->has('status')) {
            $eatingTime->status = $request->status;
        }
        if ($eatingTime->isDirty()) {
            $eatingTime->update();
        }
        return response()->json($eatingTime);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\EatingTime  $eatingTime
     * @return \Illuminate\Http\Response
     */
    public function destroy(EatingTime $eatingTime)
    {
        $eatingTime->delete();
    }
}
