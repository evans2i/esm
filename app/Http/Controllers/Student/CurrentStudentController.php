<?php

namespace App\Http\Controllers\Student;

use App\Http\Resources\Marks\MarkStudentResource;
use App\Http\Resources\Marks\SingleStudentMarkResource;
use App\Http\Resources\Students\StudentResource;
use App\Http\Resources\SubjectResource;
use App\Http\Resources\Users\StudentDetailResource;
use App\Models\Exam;
use App\Models\ExamMarkLedger;
use App\Models\ExamSchedule;
use App\Models\GeneralSetting;
use App\Models\Semester;
use App\Models\Student;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Controllers\Library\BookIssueController;
use App\Http\Resources\Academic\AssigmentResource;
use App\Http\Resources\Books\IssueResource;
use App\Models\Assignment;
use App\Models\BookIssue;
use App\Models\LibraryMember;
use Illuminate\Support\Facades\Auth;
use Inertia\Inertia;

class CurrentStudentController extends Controller
{
    public function getAllStudent()
    {
        $student = Student::where('user_id',Auth::Id())->first();
        $libmember = LibraryMember::where('member_id',$student->id)->where('user_type',1)->first();
        $vans['books'] = IssueResource::collection(BookIssue::where('member_id',$libmember->id)->get());
        $vans['assignment'] = AssigmentResource::collection( Assignment::where('faculty_id',$student->faculty_id)->where('semester_id',$student->semester_id)->get());
        $vans['results'] = IssueResource::collection(BookIssue::where('member_id',$libmember->id)->get());
        return Inertia::render('Students/Student', ['vans'=>$vans,'urls'=>"/student", 'pagetitle'=>"Student"]);
    }

    public function getStudentBook()
    {
        $student = Student::where('user_id',Auth::Id())->first();
        $libmember = LibraryMember::where('member_id',$student->id)->where('user_type',1)->first();
        $vans['books'] = IssueResource::collection(BookIssue::where('member_id',$libmember->id)->get());
        return Inertia::render('Students/BookIssue', ['vans'=>$vans,'urls'=>"/student", 'pagetitle'=>"Student"]);
    }

    public function getStudentResult()
    {
        $student = Student::where('user_id',Auth::Id())->first();
        $examScheduleId =ExamMarkLedger::where('student_id', $student->id)->groupBy('exam_schedule_id')->pluck('exam_schedule_id');
        $response['year'] =ExamMarkLedger::with('examSchedule.year')->where('student_id', $student->id)
                                ->whereHas('examSchedule',function ($q){
                                $q->groupBy('year_id');})->get()->pluck('examSchedule.year');
        $response['faculty'] =ExamMarkLedger::with('examSchedule.faculty')->where('student_id', $student->id)
            ->whereHas('examSchedule',function ($q){
                $q->groupBy('faculty_id');})->get()->pluck('examSchedule.faculty')->unique();

        $response['semester'] =ExamMarkLedger::with('examSchedule.semester')->where('student_id', $student->id)
            ->whereHas('examSchedule',function ($q){
                $q->groupBy('semester_id');
            })->get()->pluck('examSchedule.semester')->unique();


        if ($examScheduleId && $student){
            $studentId = $student->id;
            $response['exams']= ExamSchedule::with('exam')->whereIn('id',$examScheduleId)->get()->unique('exams_id');
            $response['subjects']= ExamSchedule::with('subject')->whereIn('id',$examScheduleId)->get()->pluck('subject')->unique('id');
            $response['marks'] =ExamMarkLedger::with('examSchedule')->where('student_id', $student->id)->get();
            $response['settings'] = GeneralSetting::get()->first();
            $response['student'] = new StudentDetailResource($student);
        }else{
            $response['marks'] = [];
            $response['settings'] = [];
            $response['student'] = new StudentDetailResource($student);
        }


        return Inertia::render('Students/StudentResult', ['vans'=>$response,'urls'=>"/student", 'pagetitle'=>"Student"]);

    }

    public function getStudentMarks()
    {
        $student = Student::where('user_id',Auth::Id())->first();

        $examScheduleId =ExamMarkLedger::where('student_id', $student->id)->groupBy('exam_schedule_id')->pluck('exam_schedule_id');
        $data['exams']= ExamSchedule::with('exam')->whereIn('id',$examScheduleId)->get()->unique('exams_id');
        $data['subjects']= ExamSchedule::with('subject')->whereIn('id',$examScheduleId)->get()->pluck('subject')->unique('id');
        $schedules = ExamSchedule::whereIn('id',$examScheduleId)->whereHas('markLedger',function($q) use($student){
            $q->where('student_id',$student->id);
        })->get();

//        ExamSchedule::whereIn('id',$examScheduleId)->with(['markLedger',function($q) use($studentId){
//            $q->where('student_id',$studentId);}])->get();
        $data['marks'] = SingleStudentMarkResource::collection();


            ExamMarkLedger::where('student_id', $student->id)->groupBy('exam_schedule_id')->pluck('exam_schedule_id');
        return Inertia::render('Students/StudentResult', ['vans'=>$data,'urls'=>"/student", 'pagetitle'=>"Student"]);

    }


    public function getExaminFacultySemister($faculty, $semester,$subject,$exam,$student)
    {

    }
}
