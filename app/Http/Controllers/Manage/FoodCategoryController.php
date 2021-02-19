<?php

namespace App\Http\Controllers\Manage;

use Inertia\Inertia;
use App\Models\FoodCategory;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class FoodCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $vans = FoodCategory::all();
        $option = ['show' => false,'edit' => false,'delete' => false, 'create'=>false];
        return Inertia::render('Crud/NewCrud', ['vans'=>$vans,'urls'=>"FoodCategories", 'pagetitle'=>"Food Category", 'option'=>$option]);
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
        $van = FoodCategory::create($input);
        return response()->json($van);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\FoodCategory  $foodCategory
     * @return \Illuminate\Http\Response
     */
    public function show(FoodCategory $foodCategory)
    {
        //
    }

   

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\FoodCategory  $foodCategory
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, FoodCategory $foodCategory)
    {
        if ($request->has('title')) {
            $foodCategory->title = $request->title;
        }
        if ($request->has('status')) {
            $foodCategory->status = $request->status;
        }
        if ($foodCategory->isDirty()) {
            $foodCategory->update();
        }
        return response()->json($foodCategory);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\FoodCategory  $foodCategory
     * @return \Illuminate\Http\Response
     */
    public function destroy(FoodCategory $foodCategory)
    {
        $foodCategory->delete();
    }
}
