<?php

namespace App\Http\Controllers\Manage;

use Inertia\Inertia;
use Illuminate\Support\Str;
use App\Models\BookCategory;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class BookCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $vans = BookCategory::all();
        $option = ['show' => false,'edit' => false,'delete' => false, 'create'=>false];
        return Inertia::render('Crud/NewCrud', ['vans'=>$vans,'urls'=>"bookCategories", 'pagetitle'=>"Book Category", 'option'=>$option]);
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
        $input['slug'] = Str::slug($request->title);
        $van = BookCategory::create($input);
        return response()->json($van);
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\BookCategory  $bookCategory
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, BookCategory $bookCategory)
    {
        if ($request->has('title')) {
            $bookCategory->title = $request->title;
            $bookCategory->slug = Str::slug($request->title);
        }
        if ($request->has('status')) {
            $bookCategory->status = $request->status;
        }
        if ($bookCategory->isDirty()) {
            $bookCategory->update();
        }
        return response()->json($bookCategory);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\BookCategory  $bookCategory
     * @return \Illuminate\Http\Response
     */
    public function destroy(BookCategory $bookCategory)
    {
        $bookCategory->delete();
    }
}
