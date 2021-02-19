<?php

namespace App\Http\Controllers\Manage;

use Inertia\Inertia;
use Illuminate\Http\Request;
use App\Models\CustomerStatus;
use App\Http\Controllers\Controller;

class CustomerStatusController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $vans = CustomerStatus::all();
        $option = ['show' => false,'edit' => false,'delete' => false, 'create'=>false];
        return Inertia::render('Crud/NewCrud', ['vans'=>$vans,'urls'=>"customerStatuses", 'pagetitle'=>"Customer Status", 'option'=>$option]);
    }

    public function store(Request $request){
        $rules = [
            'title' => 'required',
        ];
        $this->validate($request, $rules);
        $input = [
            'title' => $request->title,
            'status' => $request->status,
        ];
        $van = CustomerStatus::create($input);
        return response()->json($van);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\CustomerStatus  $customerStatus
     * @return \Illuminate\Http\Response
     */
    public function show(CustomerStatus $customerStatus)
    {
        //
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\CustomerStatus  $customerStatus
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, CustomerStatus $customerStatus)
    {
        if ($request->has('title')) {
            $customerStatus->title = $request->title;
        }
        if ($request->has('status')) {
            $customerStatus->status = $request->status;
        }
        if ($customerStatus->isDirty()) {
            $customerStatus->update();
        }
        return response()->json($customerStatus);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\CustomerStatus  $customerStatus
     * @return \Illuminate\Http\Response
     */
    public function destroy(CustomerStatus $customerStatus)
    {
        $customerStatus->delete();
    }
}
