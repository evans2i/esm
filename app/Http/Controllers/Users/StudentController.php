<?php

namespace App\Http\Controllers\Users;

use App\Http\Resources\Users\StudentDetailResource;
use App\Models\Addressinfo;
use App\Models\ParentDetail;
use Carbon\Carbon;
use App\Models\Role;
use App\Models\User;
use Inertia\Inertia;
use App\Models\Faculty;
use App\Models\Student;
use App\Models\StudentBatch;
use Illuminate\Http\Request;
use App\Models\StudentStatus;
use App\Models\GuardianDetail;
use App\Models\StudentGuardian;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Http\Resources\Fee\StudentFeeResource;
use App\Http\Resources\Students\StudentResource;

class StudentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $vans['students'] = Student::with('address','parent','guardian')->Active()->latest()->take(200)->get();
        $vans['faculty'] = Faculty::get();
        $vans['batches'] =StudentBatch::get();
        $vans['statuses'] =StudentStatus::get();
        $option = ['show' => false,'edit' => false,'delete' => false, 'create'=>false];
        return Inertia::render('Users/Student', ['vans'=>$vans,'urls'=>"students", 'pagetitle'=>"Student", 'option'=>$option]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function studentTransfer()
    {
        $vans['students'] = Student::where('')->latest()->get();
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
            'email' => 'required|email|unique:users',
            'last_name' => 'required',
            'middle_name' => 'required',
            'first_name' => 'required',
            'date_of_birth' => 'required',
            'address' => 'required',
            'parent' => 'required',
        ];
        $this->validate($request, $rules);
        $input= [
            'name'=> $request->first_name ." ".$request->middle_name." ".$request->last_name,
            'email'=> $request->email,
            'address'=>$request->address,
            'contact_number'=>$request->address['home_phone'],
        ];
        $input['password'] = Hash::make($request->last_name);
        $students = [
            'first_name' => $request->first_name,
            'middle_name' => $request->middle_name,
            'academic_status' => $request->academic_status,
            'last_name' => $request->last_name,
            'reg_date' => Carbon::now()->format('Y-m-d'),
            'faculty' => $request->faculty,
            'semester' => $request->semester,
            'batch' => $request->batch,
            'date_of_birth' => $request->date_of_birth,
            'gender' => $request->gender,
            'religion' => $request->religion,
            'blood_group' => $request->blood_group,
            'nationality' => $request->nationality,
            'mother_tongue' => $request->mother_tongue,
            'email' => $request->email,
            'created_by' => Auth::Id(),

        ];

        $user = User::create($input);
        $parent = ParentDetail::create($request->parent);
        $address = Addressinfo::create($request->address);

        $students['parent_id'] = $parent->id;
        $students['address_id'] = $address->id;
        $regno = Student::where('faculty',$request->faculty)->where('semester', $request->semester)->latest()->count();
        $code = Faculty::where('id',$request->faculty)->latest()->first()->faculty_code;
        if(!$regno){
            $no = 1;
            $reg_no = "STD/".Carbon::now()->format('Y')."/".$code."/00".$no;
        }else{
            if($regno >= 9 && $regno < 99 ){
                $no = $regno+1;
                $reg_no = "STD/".Carbon::now()->format('Y')."/".$code."/0".$no;
            }elseif($regno >= 1 && $regno < 9 ){
                $no = $regno+1;
                $reg_no = "STD/".Carbon::now()->format('Y')."/".$code."/00".$no;
            }
            else{
                $no = $regno+1;
                $reg_no = "STD/".Carbon::now()->format('Y')."/".$code."/".$no;
            }
        }
        $students['reg_no'] = $reg_no;
         $student = Role::whereName('student')->first();
        $user->attachRole($student);
        if($request->guardian_link_id){
            $students['guardian_id'] = $request->guardian_link_id;
        }else{
            $guardian = GuardianDetail::create($request->guardian);
            $students['guardian_id'] = $guardian->id;
        }
        $students = $user->student()->create($students);
        $van = Student::with('address','parent','guardian')->find($students->id);
        return response()->json($van);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Student  $student
     * @return \Illuminate\Http\Response
     */
    public function show(Student $student)
    {
        $van = new StudentDetailResource($student);
        return response()->json($van);
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Student  $student
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Student $student)
    {
        $rules = [
            // 'email' => 'sometimes|required|email|unique:users,' . $student->user_id,
            'last_name' => 'required',
            'middle_name' => 'required',
            'first_name' => 'required',
            'date_of_birth' => 'required',
            'address' => 'required',
        ];
        $this->validate($request, $rules);
        $input= [
            'name'=> $request->first_name ." ".$request->middle_name." ".$request->last_name,
            'email'=> $request->email,
            'address'=>$request->address,
            'contact_number'=>$request->address['home_phone'],
        ];
        $input['password'] = Hash::make($request->last_name);
        $user = User::find($student->user_id)->update($input);

        $students = [
            'first_name' => $request->first_name,
            'middle_name' => $request->middle_name,
            'academic_status' => $request->academic_status,
            'last_name' => $request->last_name,
            'faculty' => $request->faculty,
            'semester' => $request->semester,
            'batch' => $request->batch,
            'date_of_birth' => $request->date_of_birth,
            'gender' => $request->gender,
            'blood_group' => $request->blood_group,
            'nationality' => $request->nationality,
            'religion' => $request->religion,
            'mother_tongue' => $request->mother_tongue,
            'email' => $request->email,
            'reg_date' => $request->reg_date,
            'created_by' => Auth::Id(),
        ];
        $students = $student->update($students);
        $students = $student->address()->update($request->address);
        $parent = $request->parent;
        $parent['status'] = 1;
        $parent['updated_at'] = Carbon::now();;
        $parents = $student->parent()->update($parent);
        $van = Student::with('address','parent','guardian')->find($student->id);
        return response()->json($van);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Student  $student
     * @return \Illuminate\Http\Response
     */
    public function destroy(Student $student)
    {
        $student->delete();
    }

    public function loadStudentFromFacultyAndSemester($faculty= null, $semester = null)
    {
        $vans = StudentFeeResource::collection(Student::where('faculty',$faculty)->where('semester',$semester)->Active()->get());
        return response()->json($vans);
    }

    public function findStudentDetails($q)
    {
        $data=StudentResource::collection(Student::where('first_name', 'LIKE', '%' .$q . '%')
                                ->orWhere('last_name', 'LIKE', '%' .$q . '%')
                                ->orWhere('reg_no', 'LIKE', '%' .$q . '%')
                                ->Active()->take(10)
                                ->paginate(10));
        return response()->json($data);
    }
}
