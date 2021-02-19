<?php

namespace App\Http\Controllers\Accounts;

use Inertia\Inertia;
use App\Models\Faculty;
use App\Models\FeeHead;
use App\Models\StudentBatch;
use Illuminate\Http\Request;
use App\Models\FeeCollection;
use App\Http\Controllers\Controller;
use App\Http\Resources\TitleResource;
use App\Http\Resources\FacultyResource;
use App\Http\Resources\Fee\FeeDataResource;
use App\Http\Resources\Fee\FeeHeadResource;
use App\Http\Resources\Fee\FeeMasterCollectResource;
use App\Http\Resources\Fee\StudentFeeMaterResource;
use App\Http\Resources\Students\StudentResource;
use App\Models\FeeMaster;
use App\Models\Student;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;

class FeeCollectionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['students'] = StudentFeeMaterResource::collection(FeeMaster::orderBy('id', 'desc')->groupBy('student_id')->latest()->take(200)->Active()->get());
        $data['faculties'] = FacultyResource::collection(Faculty::orderBy('id', 'desc')->Active()->get());
        $data['batch'] =TitleResource::collection(StudentBatch::Active()->get());
        return Inertia::render('Fee/FeeCollection', ['vans'=>$data,'urls'=>"/accountant/feeCollections", 'pagetitle'=>" Fee Collection"]);
    }

    public function quickReceiveFee()
    {
        return Inertia::render('Fee/QuickCollection', ['urls'=>"/accountant/feeCollections", 'pagetitle'=>" Quick Collection"]);
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $student = Student::find($request->student_id);
        $rules = [
            'student_id' => 'required',
            'fee_master_id' => 'required',
            'date' => 'required',
            'paid_amount' =>'required',
            'payment_mode' => 'required'
        ];
        $this->validate($request, $rules);
        $input= $request->all();
        $input['created_by'] = Auth::id();
        $input['payment_no'] = "PMN-".$request->fee_master_id."-".$student->faculty."-".Carbon::now()->format('Y');
        $paym = FeeCollection::create($input);
        return response()->json($paym);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\FeeCollection  $feeCollection
     * @return \Illuminate\Http\Response
     */
    public function show(FeeCollection $feeCollection)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\FeeCollection  $feeCollection
     * @return \Illuminate\Http\Response
     */
    public function destroy(FeeCollection $feeCollection)
    {
        $feeCollection->delete();
        return response()->json('success');
    }

    public function loadStudentFeeMaster($studentId)
    {
        $stdID = Student::Find($studentId);
        $data['student'] = new StudentResource($stdID);
        $data['master'] = FeeMasterCollectResource::collection(FeeMaster::orderBy('id', 'desc')->where('student_id',$studentId)->latest()->Active()->get());
        $data['fee_amount'] = $stdID->feeMaster()->sum('fee_amount');
        $data['discount'] = $stdID->feeCollect()->sum('discount');
        $data['fine'] = $stdID->feeCollect()->sum('fine');
        $data['paid_amount'] = $stdID->feeCollect()->sum('paid_amount');
        $data['balance'] =($data['fee_amount'] - ($data['paid_amount'] + $data['discount']))+ $data['fine'];
        return response()->json($data);
    }
    public function loadStudentFacultySemesterFeeMaster($faculty, $semester)
    {
        $data = StudentFeeMaterResource::collection(FeeMaster::orderBy('id', 'desc')
                            ->groupBy('student_id')
                            ->where('faculty_id',$faculty)->where('semester_id',$semester)
                            ->latest()->Active()
                            ->get());
        return response()->json($data);

    }


}
