<?php

namespace App\Http\Controllers\Manage;

use App\Http\Controllers\Controller;
use App\Models\Institution;
use App\Models\Meeting;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Inertia\Inertia;

class InstituteContoller extends Controller
{
    public function contacts(Request $request)
    {
//        dd($request->email);
        $rules = [
            'name' => 'required',
            'email' => 'required|email',
            'note' => 'required',
        ];
        $this->validate($request, $rules);

        $finder = Institution::where('email',$request->email)->where('created_at','>=',Carbon::now()->subMonth())->latest()->first();

        if($finder){
            $finder->update(['note'=>$request->note]);
        }else{
            $finder = Institution::create($request->all());
        }

        return "success";
    }

    public function meeting()
    {
        $vans = Meeting::where('created_at','>=',Carbon::now())->get();
        return Inertia::render('Frontend/Event', ['vans'=>$vans]);
    }

    public function allEvent()
    {

    }

    public function examEvent()
    {

    }
}
