<?php

namespace App\Http\Controllers\Semester;

use Inertia\Inertia;
use App\Models\Staff;
use App\Models\Semester;
use App\Models\GradingType;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\VarDumper\Cloner\Data;

class SemesterController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $vans = Semester::with('subjects')->select('id', 'semester', 'staff_id', 'gradingType_id', 'status')->orderBy('semester')->get();
        $option = ['show' => false,'edit' => false,'delete' => false, 'create'=>false];
        return Inertia::render('Academic/Semester', ['vans'=>$vans,'urls'=>"semesters", 'pagetitle'=>"Semesters", 'option'=>$option]);
    }



    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request['created_by'] = Auth::Id();
        $request['slug'] = Str::slug($request->get('semester'));
        $semiU = Semester::where('semester',$request['semester'])->first();

        if(!$semiU){ 
            $semiU = Semester::create($request->all());}else{  $sem = $semiU; 
        }
         $subjects = [];
         if($request->subjects){
            foreach ($request->subjects as $key => $subject) {
                 $subjects[$subject['id']] = [
                    'semester_id' => $semiU['id'],
                    'subject_id' => $subject['id']
                ];
             }
         }
         $semiU->subjects()->sync($subjects);
        $van = Semester::with('subjects')->find($semiU->id);
        return response()->json($van);
 

    }


    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Semester  $semester
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Semester $semester)
    {
        $request['last_updated_by'] = Auth::Id();
        $request['slug'] = Str::slug($request->get('semester'));
       $semester->update($request->all());
        $subjects = [];
        if($request->subjects){
            //update & add grade scales
          foreach ($request->subjects as $key => $subject) {
               $subjects[$subject['id']] = [
                  'semester_id' => $semester['id'],
                  'subject_id' => $subject['id']
              ];
           }
       }
       $semester->subjects()->sync($subjects);
        $van = Semester::with('subjects')->find($semester->id);
        return response()->json($van);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Semester  $semester
     * @return \Illuminate\Http\Response
     */
    public function destroy(Semester $semester)
    {
        $semester->subjects()->sync([]);
        $semester->delete();
    }
}
