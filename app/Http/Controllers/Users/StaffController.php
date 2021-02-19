<?php

namespace App\Http\Controllers\Users;

use App\Models\Role;
use App\Models\User;
use Inertia\Inertia;
use App\Models\Staff;
use Illuminate\Http\Request;
use App\Models\StaffDesignation;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class StaffController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $vans['staffs'] = Staff::with('user.roles')->latest()->get();
        //$vans['staffs'] = Staff::with('user.roles')->latest()->whereHas('user',function($q){
        //	$q->whereRoleIs('staff');})->get();
        $vans['designation'] = StaffDesignation::latest()->get();
        $vans['roles'] = Role::where('id','>=',4)->latest()->get();
        $option = ['show' => false,'edit' => false,'delete' => false, 'create'=>false];
        return Inertia::render('Users/Staff', ['vans'=>$vans,'urls'=>"staffs", 'pagetitle'=>"Staff", 'option'=>$option]);
    }

    /**
     * Store a newly created resource in storage.
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
            'mobile_1' => 'required',
            'qualification' => 'required',
            'roles' => 'required'
        ];
        $this->validate($request, $rules);

        $input= [
            'name'=> $request->first_name ." ".$request->middle_name." ".$request->last_name,
            'email'=> $request->email,
            'address'=>$request->address,
            'contact_number'=>$request->mobile_1,
        ];
        $input['password'] = Hash::make($request->last_name);
        $user = User::create($input);
        $staffs = $request->all();
        $user->attachRoles($request->roles);
        $staffs = $user->staff()->create($staffs);

        return response()->json($staffs);

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Staff  $staff
     * @return \Illuminate\Http\Response
     */
    public function show(Staff $staff)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Staff  $staff
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Staff $staff)
    {
        if ($request->has('email')) {
            $staff->email = $request->email;
        }
        if ($request->has('last_name')) {
            $staff->last_name = $request->last_name;
        }
        if ($request->has('middle_name')) {
            $staff->middle_name = $request->middle_name;
        }
        if ($request->has('first_name')) {
            $staff->first_name = $request->first_name;
        }

        if ($request->has('date_of_birth')) {
            $staff->date_of_birth = $request->date_of_birth;
        }

        if ($request->has('address')) {
            $staff->address = $request->address;
        }
        if ($request->has('mobile_1')) {
            $staff->mobile_1 = $request->mobile_1;
        }
        if ($request->has('gender')) {
            $staff->gender = $request->gender;
        }

        if ($staff->isDirty()) {
            $staff->last_updated_by = Auth::Id();
            $staff->update();
        }
        return response()->json($staff);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Staff  $staff
     * @return \Illuminate\Http\Response
     */
    public function destroy(Staff $staff)
    {
        $staff->delete();
    }
}
