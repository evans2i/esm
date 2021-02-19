<?php

namespace App\Http\Controllers\Manage;

use Inertia\Inertia;
use App\Models\PayrollHead;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class PayrollHeadController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $vans = PayrollHead::all();
        $option = ['show' => false,'edit' => false,'delete' => false, 'create'=>false];
        return Inertia::render('Crud/NewCrud', ['vans'=>$vans,'urls'=>"payrollHeads", 'pagetitle'=>"Payroll Head", 'option'=>$option]);
    }

    public function store(Request $request)
    {
        $rules = [
            'title' => 'required',
        ];
        $this->validate($request, $rules);
        $input = [
            'title' => $request->title,
            'status' => $request->status,
        ];
        $van = PayrollHead::create($input);
        return response()->json($van);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\PayrollHead  $payrollHead
     * @return \Illuminate\Http\Response
     */
    public function show(PayrollHead $payrollHead)
    {
        //
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\PayrollHead  $payrollHead
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, PayrollHead $payrollHead)
    {
        if ($request->has('title')) {
            $payrollHead->title = $request->title;
        }
        if ($request->has('status')) {
            $payrollHead->status = $request->status;
        }
        if ($payrollHead->isDirty()) {
            $payrollHead->update();
        }
        return response()->json($payrollHead);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\PayrollHead  $payrollHead
     * @return \Illuminate\Http\Response
     */
    public function destroy(PayrollHead $payrollHead)
    {
        $payrollHead->delete();
    }
}
