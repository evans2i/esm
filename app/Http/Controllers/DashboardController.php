<?php

namespace App\Http\Controllers;

use App\Http\Resources\Academic\AssigmentResource;
use App\Http\Resources\Books\IssueResource;
use App\Models\Assignment;
use App\Models\AssignSubject;
use App\Models\Book;
use App\Models\BookIssue;
use App\Models\BookMaster;
use App\Models\FeeCollection;
use App\Models\Hostel;
use App\Models\Room;
use App\Models\LibraryMember;
use App\Models\Staff;
use App\Models\Student;
use App\Models\Year;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Inertia\Inertia;

class DashboardController extends Controller
{
    public function dashboard()
    {
        $year = Year::latest('id')->first();
        $startDate = Carbon::now(); //returns current day
        $firstDay = $startDate->firstOfMonth();


        if(Auth::user()->hasRole('student')){
            $student = Student::where('user_id',Auth::Id())->first();
            $libmember = LibraryMember::where('member_id',$student->id)->where('user_type',1)->first();
            if ($libmember){
                $vans['books'] = IssueResource::collection(BookIssue::where('member_id',$libmember->id)->get());
            }else{ $vans['books'] = []; }
            $vans['assignment'] = AssigmentResource::collection(Assignment::where('faculty_id',$student->faculty_id)->where('semester_id',$student->semester_id)->get());
            $vans['results'] = [];
        }
        elseif(Auth::user()->hasRole(['superadministrator', 'administrator', 'manager'])){
            $vans['students'] = Student::Active()->latest()->get();
            $vans['staffs'] = Staff::Active()->get();
            $vans['books'] = BookMaster::latest()->take(4)->get();
            $vans['booksNo'] = Book::get()->count();
            $vans['fee'] = FeeCollection::where('date', '>', $firstDay)->get();
            $vans['feeamount'] = $vans['fee']->sum('paid_amount');
        }else{
//            $staff = Staff::where('user_id',Auth::Id())->first();
//            $libmember = LibraryMember::where('member_id',$staff->id)->where('user_type',2)->first();
//            $vans['assignment'] = AssignSubject::where('staff_id',$staff->id)->where('year_id',$year->id)->Active()->latest()->get();
//            $vans['staffs'] = Staff::Active()->get();
//            if ($libmember) {
//                $vans['booksNo'] = BookIssue::where('member_id',$libmember->id)->get()->count();
//                $vans['books'] = IssueResource::collection(BookIssue::where('member_id', $libmember->id)->get());
//            }else{ $vans['books'] =[]; }
            $vans['hostelNo'] =Hostel::get()->count();
            $vans['hostelRoom'] = Room::get()->count();
        }
        return Inertia::render('Dashboard', ['vans'=>$vans, 'pagetitle'=>"DashBoard"]);
    }
}
