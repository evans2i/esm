<?php

namespace App\Http\Controllers\Accounts;

use Carbon\Carbon;
use Inertia\Inertia;
use App\Models\Faculty;
use App\Models\FeeHead;
use App\Models\Student;
use App\Models\FeeMaster;
use App\Models\StudentBatch;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Resources\TitleResource;
use App\Http\Resources\FacultyResource;
use App\Http\Resources\Fee\FeeHeadResource;
use App\Models\Year;

class FeeMasterController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['faculties'] = FacultyResource::collection(Faculty::orderBy('id', 'desc')->Active()->get());
        $data['batch'] =TitleResource::collection(StudentBatch::Active()->get());
        $data['fee_heads'] =FeeHeadResource::collection(FeeHead::Active()->get());
        return Inertia::render('Fee/AddFee', ['vans'=>$data,'urls'=>"feeMasters", 'pagetitle'=>"Add Fee"]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        if (isset($request->year_id)) {
            $year = $request->year_id;
        }else{
            $year = Year::latest('id')->first()->id;
        }

        $response = false;

        
        if ($request->students) {
            foreach ($request->students as $row) {
                if ($row['check'] === true) {
                    if ($row && $request->fees) {
                        foreach ($request->fees as $key => $fee) {
                            $date = Carbon::parse($fee['fee_due_date'])->format('Y-m-d');
                            $checkIn = FeeMaster::where('student_id', $row['id'])
                                                    ->where('semester_id',$row['semester'])->where('faculty_id',$row['faculty'])
                                                    ->where('year_id',$year)->where('fee_head_id', $fee['id'])->first();
                            if ($checkIn) {
                                $checkIn->update([
                                    'student_id' => $row['id'],
                                    'faculty_id' => $row['faculty'],
                                    'year_id' => $year,
                                    'semester_id' => $row['semester'],
                                    'fee_head_id' => $fee['id'],
                                    'fee_due_date' => $date,
                                    'fee_amount' => $fee['fee_head_amount'],
                                    'last_updated_by' => auth()->user()->id,
                                ]);
                                $response = false;
                            } else {
                                FeeMaster::create([
                                    'student_id' => $row['id'],
                                    'year_id' => $year,
                                    'faculty_id' => $row['faculty'],
                                    'semester_id' => $row['semester'],
                                    'fee_head_id' => $fee['id'],
                                    'fee_due_date' => $date,
                                    'fee_amount' => $fee['fee_head_amount'] ,
                                    'created_by' => auth()->user()->id,
                                ]);
                                $response = false;
                            }
                            
                            
                        }
                    }else {
                        $response = "Please, Add Fee Master at least one row.";
                    }
                }
            }
        }else {
            $response = "please Fill atleast One Student";
        }

        return $response;

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\FeeMaster  $feeMaster
     * @return \Illuminate\Http\Response
     */
    public function show(FeeMaster $feeMaster)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\FeeMaster  $feeMaster
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, FeeMaster $feeMaster)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\FeeMaster  $feeMaster
     * @return \Illuminate\Http\Response
     */
    public function destroy(FeeMaster $feeMaster)
    {
        //
    }
}
