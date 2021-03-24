<?php

namespace App\Http\Controllers\manage;

use App\Http\Controllers\Controller;
use App\Models\GeneralSetting;
use Inertia\Inertia;
use Illuminate\Http\Request;

class GeneralSettingController extends Controller
{
    public function welcome()
    {
        $van = GeneralSetting::get()->first();
        return Inertia::render('Fronted',['van'=>$van,'urls'=>"/"]);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $van = GeneralSetting::get()->first();
        return  response()->json($van);

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\GeneralSetting  $generalSetting
     * @return \Illuminate\Http\Response
     */
    public function show(GeneralSetting $generalSetting)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\GeneralSetting  $generalSetting
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, GeneralSetting $generalSetting)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\GeneralSetting  $generalSetting
     * @return \Illuminate\Http\Response
     */
    public function destroy(GeneralSetting $generalSetting)
    {
        //
    }
}
