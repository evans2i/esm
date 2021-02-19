<?php

namespace App\Http\Controllers\Assignment;

use App\Http\Controllers\Controller;
use App\Http\Resources\AssignFucultyResource;
use App\Models\AssignFaculty;
use Illuminate\Http\Request;

class AssignClassController extends Controller
{
    public function assignclass()
    {
        $vans = AssignFucultyResource::collection(AssignFaculty::orderBy('id', 'desc')->take(7)->get());
        dd($vans);

    }
}
