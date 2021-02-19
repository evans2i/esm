<?php

namespace App\Http\Controllers\Accademic;

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

class ExaminationController extends Controller
{
    public function index()
    {
        $vans['months'] = TitleResource::collection(Month::Active()->get());
        $vans['year'] = TitleResource::collection(Year::orderBy('id', 'desc')->take(5)->get());
        $vans['faculty'] = FacultyResource::collection(Faculty::orderBy('id', 'desc')->Active()->get());
        $vans['exam'] = TitleResource::collection(Exam::orderBy('id', 'desc')->Active()->get());
        $option = ['show' => false,'edit' => false,'delete' => false, 'create'=>false];
        return Inertia::render('Academic/ExamShedule', ['vans'=>$vans,'urls'=>"examShedules", 'pagetitle'=>"Exam Shedule", 'option'=>$option]);
    }

    public function store(Request $request)
    {
        $year = $request->years_id;
        $month = $request->months_id;
        $exam = $request->exams_id;
        $faculty = $request->faculty;
        $semester = $request->semester_id;

        $retStatus = "";

        if($request->has('subjects')) {
            foreach ($request->subjects as $key => $subject) {
                /*Find Subject Which is Already Scheduled*/
                $selectedSubject = ExamSchedule::where([
                                        ['years_id', '=' , $year],
                                        ['months_id', '=' , $month],
                                        ['exams_id', '=' , $exam],
                                        ['faculty_id', '=' , $faculty],
                                        ['semesters_id', '=' , $semester],
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
                        'date' => $subject['date'],
                        'start_time' => $subject['start_time'],
                        'end_time' => $subject['end_time'], 
                        'full_mark_theory' => $subject['full_mark_theory'],
                        'pass_mark_theory' => $subject['pass_mark_theory'], 
                        'full_mark_practical' => $subject['full_mark_practical'],
                        'pass_mark_practical' => $subject['pass_mark_practical'],
                        'sorting_order' => $key+1,
                        'updated_by' => auth()->user()->id
                    ];

                    $selectedSubject->update($subjectUpdate);

                }else{
                    /*Schedule When Not Scheduled Yet*/
                    ExamSchedule::create([
                        'years_id' => $year,
                        'months_id' => $month,
                        'exams_id' => $exam,
                        'faculty_id' => $faculty,
                        'semesters_id' => $semester,
                        'subjects_id' => $subject,
                        'date' => $subject['date'],
                        'start_time' => $subject['start_time'],
                        'end_time' => $subject['end_time'], 
                        'full_mark_theory' => $subject['full_mark_theory'],
                        'pass_mark_theory' => $subject['pass_mark_theory'], 
                        'full_mark_practical' => $subject['full_mark_practical'],
                        'pass_mark_practical' => $subject['pass_mark_practical'],
                        'sorting_order' => $key+1,
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
}
