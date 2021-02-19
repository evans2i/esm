<?php

namespace App\Http\Controllers\Users;

use App\Models\User;
use App\Models\Staff;
use App\Models\Student;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Resources\Users\StudentStaffResource;
use App\Http\Resources\Users\StaffStudentResource as UsersStaffStudentResource;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $user)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        //
    }

    public function findStudentOrStaff($q)
    {
        $data['student']=StudentStaffResource::collection(Student::where('first_name', 'LIKE', '%' .$q . '%')
                                ->orWhere('last_name', 'LIKE', '%' .$q . '%')
                                ->orWhere('reg_no', 'LIKE', '%' .$q . '%')->Active()
                                ->take(3)->get());
        $data['staff']=UsersStaffStudentResource::collection(Staff::where('first_name', 'LIKE', '%' .$q . '%')
                                ->orWhere('last_name', 'LIKE', '%' .$q . '%')
                                ->orWhere('reg_no', 'LIKE', '%' .$q . '%')->Active()
                                ->take(3)->get());
        return response()->json($data);
    }
}
