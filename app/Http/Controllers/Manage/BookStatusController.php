<?php

namespace App\Http\Controllers\Manage;

use Inertia\Inertia;
use App\Models\BookStatus;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class BookStatusController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $vans = BookStatus::all();
        $option = ['show' => false,'edit' => false,'delete' => false, 'create'=>false];
            
        return Inertia::render('Crud/NewCrud', ['vans'=>$vans,'urls'=>"bookStatuses", 'pagetitle'=>"Book Status", 'option'=>$option]);
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
            'title' => 'required',
        ];
        $this->validate($request, $rules);
        $input = [
            'title' => $request->title,
            'status' => $request->status,
        ];
        $van = BookStatus::create($input);
        return response()->json($van);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\BookStatus  $bookStatus
     * @return \Illuminate\Http\Response
     */
    public function show(BookStatus $bookStatus)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\BookStatus  $bookStatus
     * @return \Illuminate\Http\Response
     */
    public function edit(BookStatus $bookStatus)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\BookStatus  $bookStatus
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, BookStatus $bookStatus)
    {
        if ($request->has('title')) {
            $bookStatus->title = $request->title;
        }
        if ($request->has('status')) {
            $bookStatus->status = $request->status;
        }
        if ($bookStatus->isDirty()) {
            $bookStatus->update();
        }
        return response()->json($bookStatus);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\BookStatus  $bookStatus
     * @return \Illuminate\Http\Response
     */
    public function destroy(BookStatus $bookStatus)
    {
        $bookStatus->delete();
    }
}
