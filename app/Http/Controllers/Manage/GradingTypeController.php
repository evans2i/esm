<?php

namespace App\Http\Controllers\Manage;

use Inertia\Inertia;
use App\Models\GradingType;
use Illuminate\Support\Str;
use App\Models\GradingScale;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class GradingTypeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $vans = GradingType::with('gradingScale')->get();
        $option = ['show' => false,'edit' => false,'delete' => false, 'create'=>false];
        return Inertia::render('Academic/Grading', ['vans'=>$vans,'urls'=>"gradingTypes", 'pagetitle'=>"Grading Type", 'option'=>$option]);
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
            'created_by' => Auth::id(),
            'slug' =>Str::slug($request->get('title'))
        ];
        $van = GradingType::create($input);

        $scales = $request->scales;

        if($scales){
            foreach ($scales as $key => $value){
                $gradingScale = [
                    'gradingType_id' => $van->id,
                    'name' => $value['name'],
                    'percentage_from' => $value['percentage_from'],
                    'percentage_to' => $value['percentage_to'],
                    'grade_point' => $value['grade_point'],
                    'description' => $value['description'],
                    'created_by' => Auth::id(),
                ];
                GradingScale::create($gradingScale);
            }
        }
        $van = GradingType::with('gradingScale')->find($van->id);
       
        return response()->json($van);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Models\GradingType  $gradingType
     * @return \Illuminate\Http\Response
     */
    public function show(GradingType $gradingType)
    {
        //
    }

 
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Models\GradingType  $gradingType
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, GradingType $gradingType)
    {
        if ($request->has('title')) {
            $gradingType->title = $request->title;
        }
        if ($request->has('status')) {
            $gradingType->status = $request->status;
        }
        //update & add grade scales
        foreach ($request->scales as $key => $grade) {
            $gradingScale = [
                'gradingType_id' => $gradingType->id,
                'name' => $grade['name'],
                'percentage_from' => $grade['percentage_from'],
                'percentage_to' => $grade['percentage_to'],
                'grade_point' => $grade['grade_point'],
                'description' => $grade['description'],
                'created_by' => Auth::id(),
            ];
            if ($grade['id'] == null) {
                GradingScale::create($gradingScale); //create Value of Grade
            }else {
                // $grade_scale = GradingScale::where('id',$grade->id)->first();
                $grade_scale = GradingScale::find($grade['id']); // Finding grade to update
                $grade_scale->update($gradingScale); //Updating Value of Grade
            }
        }
        
        if ($gradingType->isDirty()) {
            $gradingType->last_updated_by = Auth::Id();
            $gradingType->update();
        }
        $van = GradingType::with('gradingScale')->find($gradingType->id);
        return response()->json($van);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Models\GradingType  $gradingType
     * @return \Illuminate\Http\Response
     */
    public function destroy(GradingType $gradingType)
    {
        $gradingType->delete();
        GradingScale::where('gradingType_id',$gradingType->id)->delete();
    }
}
