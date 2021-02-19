<?php

namespace App\Http\Controllers\Accademic;

use Carbon\Carbon;
use App\Models\Exam;
use App\Models\Year;
use Inertia\Inertia;
use App\Models\Month;
use App\Models\Faculty;
use App\Models\ExamSchedule;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Resources\TitleResource;
use App\Http\Resources\FacultyResource;
use App\Http\Resources\ExamScheduleResource;

class ExamScheduleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $vans['examdatas'] = ExamScheduleResource::collection(ExamSchedule::Active()
                            ->groupByRaw('years_id,months_id,exams_id,faculty_id,publish_status,status')
                            ->orderBy('years_id', 'desc')
                            ->orderBy('months_id', 'asc')
                            ->limit (50)
                            ->get());
        $vans['months'] = TitleResource::collection(Month::Active()->get());
        $vans['year'] = TitleResource::collection(Year::orderBy('id', 'desc')->take(5)->get());
        $vans['faculty'] = FacultyResource::collection(Faculty::orderBy('id', 'desc')->Active()->get());
        $vans['exam'] = TitleResource::collection(Exam::orderBy('id', 'desc')->Active()->get());
        $option = ['show' => false,'edit' => false,'delete' => false, 'create'=>false];
        return Inertia::render('Academic/ExamShedule', ['vans'=>$vans,'urls'=>"examSchedules", 'pagetitle'=>"Exam Shedule", 'option'=>$option]);
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $year = $request->year_id;
        $month = $request->month_id;
        $exam = $request->exam_id;
        $faculty = $request->faculty_id;
        $semester = $request->semester_id;

        $retStatus = "";
      

        if($request->subjects) {
            foreach ($request->subjects as $key => $subject) {
                /*Find Subject Which is Already Scheduled*/
                $selectedSubject = ExamSchedule::where([
                                        ['years_id', '=' , $year],
                                        ['months_id', '=' , $month],
                                        ['exams_id', '=' , $exam],
                                        ['faculty_id', '=' , $faculty],
                                        // ['semester_id', '=' , $semester],
                                        ['subjects_id', '=' , $subject['id']]
                                    ])->first();
       

                if ($selectedSubject != null) {
                    /*Update Already Scheduled Subject*/
                    $subjectUpdate = [
                        'years_id' => $year,
                        'months_id' => $month,
                        'exams_id' => $exam,
                        'faculty_id' => $faculty,
                        'semesters_id' => $semester,
                        'subjects_id' => $subject['id'],
                        'date' => Carbon::parse($subject['date'])->format('Y-m-d'),
                        'start_time' => Carbon::parse($subject['start_time'])->format('H:i'),
                        'end_time' => Carbon::parse($subject['end_time'])->format('H:i'), 
                        'full_mark_theory' => $subject['full_mark_theory']?$subject['full_mark_theory']:0,
                        'pass_mark_theory' => $subject['pass_mark_theory'] ? $subject['pass_mark_theory']:0, 
                        'full_mark_practical' => $subject['full_mark_practical'] ? $subject['full_mark_practical']:0,
                        'pass_mark_practical' => $subject['pass_mark_practical'] ?$subject['pass_mark_practical']:0,
                        'sorting_order' => $key+1,
                        'updated_by' => auth()->user()->id
                    ];

                    $selectedSubject->update($subjectUpdate);

                }else{
                    ExamSchedule::create([
                        'years_id' => $year,
                        'months_id' => $month,
                        'exams_id' => $exam,
                        'faculty_id' => $faculty,
                        'semesters_id' => $semester,
                        'subjects_id' => $subject['id'],
                        'date' => Carbon::parse($subject['date'])->format('Y-m-d H:i:s'),
                        'start_time' => Carbon::parse($subject['start_time'])->format('H:i'),
                        'end_time' => Carbon::parse($subject['end_time'])->format('H:i'), 
                        'full_mark_theory' => $subject['full_mark_theory']?$subject['full_mark_theory']:0,
                        'pass_mark_theory' => $subject['pass_mark_theory'] ? $subject['pass_mark_theory']:0, 
                        'full_mark_practical' => $subject['full_mark_practical'] ? $subject['full_mark_practical']:0,
                        'pass_mark_practical' => $subject['pass_mark_practical'] ?$subject['pass_mark_practical']:0,
                        'created_by' => auth()->user()->id,
                    ]);
                }
            }
            $retStatus = "successfull";
        }else{
            $retStatus = "failure";
        }

       return response()->json($retStatus);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\ExamSchedule  $examSchedule
     * @return \Illuminate\Http\Response
     */
    public function show(ExamSchedule $examSchedule)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\ExamSchedule  $examSchedule
     * @return \Illuminate\Http\Response
     */
    public function edit(ExamSchedule $examSchedule)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\ExamSchedule  $examSchedule
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, ExamSchedule $examSchedule)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\ExamSchedule  $examSchedule
     * @return \Illuminate\Http\Response
     */
    public function destroy(ExamSchedule $examSchedule)
    {
        
    }

    public function deletingFullDetail($year, $month, $faculty, $exam  )
    {
        $deletingData = ExamSchedule::where([
            ['years_id', '=' , $year],
            ['months_id', '=' , $month],
            ['exams_id', '=' , $exam],
            ['faculty_id', '=' , $faculty] 
            ])->get()->pluck('id');

            $deleteQuery = ExamSchedule::whereIn('id',$deletingData)->delete();
    }

    
}
