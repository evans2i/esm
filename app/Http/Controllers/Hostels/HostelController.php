<?php

namespace App\Http\Controllers\Hostels;

use App\Http\Controllers\Controller;
use App\Http\Resources\Hostel\HostelResource;
use App\Http\Resources\Hostel\RoomResource;
use App\Http\Resources\NameResource;
use App\Http\Resources\SubjectResource;
use App\Http\Resources\TitleResource;
use App\Models\Hostel;
use App\Models\Room;
use App\Models\RoomType;
use App\Models\Staff;
use App\Models\Subject;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Inertia\Inertia;

class HostelController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $vans['roomtypes'] = TitleResource::collection(RoomType::Active()->get());
        $vans['hostels'] = HostelResource::collection(Hostel::Active()->get());
        $vans['staff'] = NameResource::collection(Staff::latest()->whereHas('user',function($q){$q->whereRoleIs('warden');})->Active()->get());
        return Inertia::render('Hostels/Hostel', ['vans'=>$vans,'urls'=>"/hostel/hostels", 'pagetitle'=>"Hostels"]);

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
            'name' => 'required | unique:hostels',
            'type' => 'required',
            'staff_id' => 'required',
            'roomsCount' => 'required',
            'room_type' => 'required',
        ];
        $this->validate($request, $rules);



        $input=$request->all();
        $input['warden'] = $request->staff_id;

        $hostel = Hostel::where('name',$request->name)->first();
        if(!$hostel){
            $hostel = Hostel::create($input);
        }
        if ($hostel){
            $i =$hostel->rooms->count() + 1;
            while ($i <= (int)$request->roomsCount){
                $hostel->rooms()->create([
                    'room_type' => $request->room_type,
                    'room_number'=> $i,
                    'rate_perbed'=>0,
                    'description'=>$request->description,
                    'created_by' => Auth::id(),
                ]);
                $i++;
            }

        }
        return  response()->json(new HostelResource(Hostel::find($hostel->id)));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Hostel  $hostel
     * @return \Illuminate\Http\Response
     */
    public function show(Hostel $hostel)
    {
        $vans['rooms'] = RoomResource::collection ($hostel->rooms);
        $vans['hostel'] = new HostelResource($hostel);
        return Inertia::render('Hostels/SingleHostel', ['vans'=>$vans,'urls'=>"/hostel/rooms", 'pagetitle'=> "Hostel .".$hostel->name]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Hostel  $hostel
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Hostel $hostel)
    {
        $rules = [
            'name' => 'required',
            'type' => 'required',
            'staff_id' => 'required',
            'roomsCount' => 'required',
        ];
        $this->validate($request, $rules);

        if ($request->has('name') && $hostel->name != $request->name){
            $hostel->name=$request->name;
        }
        if ($request->has('staff_id')){
            $hostel->warden=$request->staff_id;
        }
        if ($request->has('type')){
            $hostel->type=$request->type;
        }
        if ($hostel->isDirty()) {
            $hostel->update();
        }
        $availableRoom = $hostel->rooms()->count();
        if ($availableRoom < (int)$request->roomCount){
            $i = $availableRoom+1;
            while ($i <= (int)$request->roomsCount){
                Room::create([
                    'hostel_id' => $hostel->id,
                    'room_type' => $request->room_type,
                    'room_number'=> $i,
                    'rate_perbed'=>0,
                    'description'=>$request->description,
                    'created_by' => Auth::id(),
                ]);
                $i++;
            }
        }
        return  response()->json(new HostelResource($hostel));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Hostel  $hostel
     * @return \Illuminate\Http\Response
     */
    public function destroy(Hostel $hostel)
    {
        $hostel->beds()->delete();
        $hostel->rooms()->delete();
        $hostel->delete();
    }
}
