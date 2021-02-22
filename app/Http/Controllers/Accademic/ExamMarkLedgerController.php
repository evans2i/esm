<?php

namespace App\Http\Controllers\Accademic;

use App\Http\Resources\ExamMarkResource;
use App\Http\Resources\Marks\MarkResource;
use App\Http\Resources\Marks\StudentForResultResource;
use App\Http\Resources\SubjectResource;
use App\Http\Resources\Users\StudentDetailResource;
use App\Models\Exam;
use App\Models\Semester;
use App\Models\Year;
use Inertia\Inertia;
use App\Models\Month;
use App\Models\Staff;
use App\Models\Faculty;
use App\Models\Student;
use App\Models\ExamSchedule;
use Illuminate\Http\Request;
use App\Models\AssignSubject;
use App\Models\ExamMarkLedger;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Http\Resources\TitleResource;
use App\Http\Resources\FacultyResource;
use App\Http\Resources\Marks\MarkStudentResource;
use App\Http\Resources\Marks\StudentMarkResource;

class ExamMarkLedgerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $vans['months'] = TitleResource::collection(Month::Active()->get());
        $vans['year'] = TitleResource::collection(Year::orderBy('id', 'desc')->take(5)->get());
        $vans['faculty'] = FacultyResource::collection(Faculty::orderBy('id', 'desc')->Active()->get());
        $vans['exam'] = TitleResource::collection(Exam::orderBy('id', 'desc')->Active()->get());
        $option = ['show' => false,'edit' => false,'delete' => false, 'create'=>false];
        return Inertia::render('Academic/ExamLedger', ['vans'=>$vans,'urls'=>"examMarkLedger", 'pagetitle'=>"Examination Marks", 'option'=>$option]);
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        /*For Mark Schedule*/
        $examScheduleCondition = [
            ['years_id', '=' , $request->year_id],
            ['months_id', '=' , $request->month_id],
            ['exams_id', '=' , $request->exam_id],
            ['faculty_id', '=' , $request->faculty_id],
            ['semesters_id', '=' , $request->semester_id],
            ['subjects_id', '=' , $request->subject_id],
        ];
        /*Find Exam Schedule Id*/
        $examScheduleId = ExamSchedule::select('id')->where($examScheduleCondition)->first();
        if($request->exams) {
            foreach ($request->exams as $key => $student) {

                if (isSet($student['absent_theory'])) {
                    if($student['absent_theory']=== true) {
                        $trAbsentStudent = 1;
                    }else {
                        $trAbsentStudent = 0;
                    }
                } else {
                    $trAbsentStudent = 0;
                }

                if (isSet($student['absent_practical'])) {
                    if($student['absent_practical']=== true) {
                        $prAbsentStudent = 1;
                    }else {
                        $prAbsentStudent = 0;
                    }
                } else {
                    $prAbsentStudent = 0;
                }

                if (isSet($student['id'])) {
                    $ledgerExist = ExamMarkLedger::find($student['id']);
                    $ledgerUpdate = [
                        'exam_schedule_id' => $examScheduleId->id,
                        'student_id' => $student['student_id'],
                        'obtain_mark_theory' => $student['obtain_mark_theory']?$student['obtain_mark_theory']:0,
                        'obtain_mark_practical' => $student['obtain_mark_practical']?$student['obtain_mark_practical']:0,
                        'absent_theory' => $trAbsentStudent,
                        'absent_practical' => $prAbsentStudent,
                        'sorting_order' => $key+1,
                        'last_updated_by' => auth()->user()->id
                    ];
                    $ledgerExist->update($ledgerUpdate);
                }else{
                    if (isset($student['obtain_mark_theory']) || isset($student['obtain_mark_practical'])) {
                        ExamMarkLedger::create([
                            'exam_schedule_id' => $examScheduleId->id,
                            'student_id' => $student['student_id'],
                            'obtain_mark_theory' => isset($student['obtain_mark_theory'])?$student['obtain_mark_theory']:0,
                            'obtain_mark_practical' => isset($student['obtain_mark_practical'])?$student['obtain_mark_practical']:0,
                            'absent_theory' => $trAbsentStudent,
                            'absent_practical' => $prAbsentStudent,
                            'sorting_order' => $key+1,
                            'created_by' => auth()->user()->id,
                        ]);
                    } else {}
                }
            }
        $data['error'] = false;
        }else{
        $data['error']= 'You Have No Manage Student Mark Yet, Mark Ledger Not Manage. ';
        }
        return response()->json($data['error']);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\ExamMarkLedger  $examMarkLedger
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, ExamMarkLedger $examMarkLedger)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\ExamMarkLedger  $examMarkLedger
     * @return \Illuminate\Http\Response
     */
    public function destroy(ExamMarkLedger $examMarkLedger)
    {
        //
    }

    public function examinationMarkLedger($year,$month,$exam,$faculty,$semester,$subject)
    {
        /*For Student List*/
        $studentCondition = [['faculty', '=' , $faculty], ['semester', '=' , $semester] ];
        $examScheduleCondition = [ ['years_id', '=', $year], ['months_id', '=', $month], ['exams_id', '=', $exam],['faculty_id', '=', $faculty],['semesters_id', '=', $semester],['subjects_id', '=', $subject]];

        $examScheduleId = ExamSchedule::where($examScheduleCondition)->get()->first();
        if($examScheduleId){
            $examScheduleId = $examScheduleId->id;
            $ledgerExist = MarkStudentResource::collection(ExamMarkLedger::with('student')->where('exam_schedule_id',$examScheduleId)->get());
            $existStudentId  = $ledgerExist->pluck('student_id');
            $activeStudent = Student::where($studentCondition)->Active()->orderBy('id','asc')->get()->count();

            if($activeStudent > 0) {
                $activeStudents = StudentMarkResource::collection( Student::where($studentCondition)->whereNotIn('id',$existStudentId)->Active()->orderBy('id','asc')->get());



                if($activeStudents) {
                    if($ledgerExist){
                        $response['error'] = false;
                        $response['exist'] = $ledgerExist;
                        $response['students'] = $activeStudents;
                        $response['message'] = 'Active Students Found. Please, Manage Mark.';
                    }else{
                        $response['error'] = false;
                        $response['exist'] = [];
                        $response['students'] = $activeStudents;
                        $response['message'] = 'Active Students Found. Please, Manage Mark.';
                    }
                }else{
                    $response['error'] = false;
                    $response['students'] = [];
                    $response['exist'] = $ledgerExist;
                    $response['message'] = 'Active Students Found. Please, Manage Mark.';
                }

            }else{
                $response['error'] = 'No Any Active Students in This Faculty/Semester.';
            }
        }else{
            $response['error'] = 'Exam Not Scheduled. Please Schedule First';
        }
        return response()->json($response);
    }

    public function loadExamMarks($year,$month,$exam,$faculty,$semester,$subject)
    {

        $staff = Staff::where('user_id',Auth::Id())->first();

        if($year && $month && $exam && $faculty && $semester && $subject) {
            $examScheduleCondition = [ ['years_id', '=', $year], ['months_id', '=', $month],
                                        ['exams_id', '=', $exam], ['faculty_id', '=', $faculty],
                                        ['semesters_id', '=', $semester],['subjects_id', '=', $subject]
                                     ];

            $staffCondition = [ ['year_id', '=', $year],['staff_id', '=', $staff->id], ['faculty_id', '=', $faculty],
                                     ['semester_id', '=', $semester],['subject_id', '=', $subject]
                                    ];
                $examScheduleId = ExamSchedule::where($examScheduleCondition)->get()->first();

                if ($examScheduleId) {

                    $staffData = AssignSubject::where($staffCondition)->get()->first();

                    if (Auth::user()->hasRole('academic') || $staffData) {
                        $examScheduleId = $examScheduleId->id;
                        $response['exist'] = MarkStudentResource::collection(ExamMarkLedger::where('exam_schedule_id',$examScheduleId)->get());
                        if ($response['exist']->isEmpty()) {
                            $response['error'] = 'No Data Found. Please Add Examination legder';
                        }else{
                            $response['error']= false;
                        }
                    }else{
                        $response['error']= "I'm Sorry, It is not Assigned To You";
                    }


                }else{
                    $response['error'] = 'Exam Not Scheduled. Please Schedule First Examination';
                }
        }
        return response()->json($response);
    }

    public function examResult()
    {
        $vans['years'] = TitleResource::collection(Year::orderBy('id', 'desc')->take(5)->get());
        $vans['faculties'] = FacultyResource::collection(Faculty::orderBy('id', 'desc')->Active()->get());
        return Inertia::render('Academic/StudentsResult', ['vans'=>$vans,'urls'=>"examResult", 'pagetitle'=>"Examination Result"]);
    }

    public function findExamResult($year = null, $faculty = null, $semester = null)
    {
        $examScheduleCondition = [ ['years_id', '=', $year], ['faculty_id', '=', $faculty],['semesters_id', '=', $semester]];
        $examScheduleId = ExamSchedule::where($examScheduleCondition)->get()->pluck('id');
         $semester = Semester::find($semester);
        $response['subjects'] = SubjectResource::collection($semester->subjects);
        $response['marks'] = MarkResource::collection(ExamMarkLedger::with('examSchedule')->whereIn('exam_schedule_id',$examScheduleId)->get());
        $response['exams']= ExamMarkLedger::with('examSchedule.exam')
                                            ->whereHas('examSchedule.exam',function ($q){
                                                $q->groupBy('id');})
                                            ->groupBy('exam_schedule_id')->get()
                                            ->pluck('examSchedule.exam')->unique('id');
//        $stud = ExamMarkLedger::whereIn('exam_schedule_id',$examScheduleId)->groupBy('student_id')->get();
//        $stdID = [];
//        if ($stud){
//            $stdID = $stud->pluck('student_id');
//            $response['students'] = StudentDetailResource::collection(Student::whereIn('id',$stdID)->get());
//        }
        $response['students'] = StudentForResultResource::collection(ExamMarkLedger::whereIn('exam_schedule_id',$examScheduleId)->groupBy('student_id')->get());
        return response()->json($response);
    }

//    public function findSingleExamResult($year = null, $faculty = null, $semester = null, $exam = null)
//    {
//        $examScheduleCondition = [ ['years_id', '=', $year], ['faculty_id', '=', $faculty],['semesters_id', '=', $semester],['exams_id', '=', $exam]];
//        $examScheduleId = ExamSchedule::where($examScheduleCondition)->get()->pluck('id');
//        $semester = Semester::find($semester);
//        $response['subjects'] = SubjectResource::collection($semester->subjects);
//        $response['marks'] = MarkStudentResource::collection(ExamMarkLedger::whereIn('exam_schedule_id',$examScheduleId)->get());
//        $response['exams']= ExamMarkLedger::with('examSchedule')
//            ->whereIn('exam_schedule_id',$examScheduleId)
//            ->groupBy('exam_schedule_id')->get();
//        dd($response['exams']);
//        $response['students'] = MarkStudentResource::collection(ExamMarkLedger::whereIn('exam_schedule_id',$examScheduleId)->groupBy('student_id')->get());
//        return response()->json($response);
//    }
}
