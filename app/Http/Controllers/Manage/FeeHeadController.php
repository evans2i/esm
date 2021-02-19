<?php

namespace App\Http\Controllers\Manage;

use Inertia\Inertia;
use App\Models\FeeHead;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class FeeHeadController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $vans = FeeHead::all();
        $option = ['show' => false,'edit' => false,'delete' => false, 'create'=>false];
        return Inertia::render('Fee/FeeHead', ['vans'=>$vans,'urls'=>"feeHeads", 'pagetitle'=>"Fee Head", 'option'=>$option]);
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
            'fee_head_title' => 'required',
            'fee_head_amount' => 'required',
        ];
        $this->validate($request, $rules);
        $input = [
            'fee_head_title' => $request->fee_head_title,
            'fee_head_amount' => $request->fee_head_amount,
            'status' => $request->status,
        ];
        $van = FeeHead::create($input);
        return response()->json($van);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\FeeHead  $feeHead
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, FeeHead $feeHead)
    {
        if ($request->has('fee_head_title')) {
            $feeHead->fee_head_title = $request->fee_head_title;
        }
        if ($request->has('fee_head_amount')) {
            $feeHead->fee_head_amount = $request->fee_head_amount;
        }
        if ($request->has('status')) {
            $feeHead->status = $request->status;
        }
        if ($feeHead->isDirty()) {
            $feeHead->update();
        }
        return response()->json($feeHead);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\FeeHead  $feeHead
     * @return \Illuminate\Http\Response
     */
    public function destroy(FeeHead $feeHead)
    {
        $feeHead->delete();
    }
}
