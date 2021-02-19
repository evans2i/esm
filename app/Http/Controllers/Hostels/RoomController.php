<?php

namespace App\Http\Controllers\Hostels;

use App\Http\Controllers\Controller;
use App\Http\Resources\Hostel\HostelResource;
use App\Http\Resources\Hostel\RoomResource;
use App\Http\Resources\Hostel\BedResource;
use App\Http\Resources\TitleResource;
use App\Models\Bed;
use App\Models\BedStatus;
use App\Models\Hostel;
use App\Models\Room;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Inertia\Inertia;

class RoomController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $start = (int)$request->start;
        $end = (int)$request->end;

        while ($start <= $end){
            $check = Room::where('hostel_id',$request->hostel_id)->where('room_number',$start)->first();
            if (!$check){
                Room::create([
                    'hostel_id' => $request->hostel_id,
                    'room_type' => $request->room_type,
                    'description' => $request->description,
                    'room_number' => $start,
                    'rate_perbed' => 0,
                    'created_by' => Auth::id(),
                ]);
            }
            $start++;
        }
        $van = new HostelResource(Hostel::find($request->hostel_id));
        return  response()->json($van);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Room  $room
     * @return \Illuminate\Http\Response
     */
    public function show(Room $room)
    {
        $vans['bedstatus'] = TitleResource::collection (BedStatus::all());
        $vans['beds'] = BedResource::collection ($room->beds);
        $vans['rooms'] = new RoomResource($room);
        return Inertia::render('Hostels/SingleRoom', ['vans'=>$vans,'urls'=>"/hostel/beds", 'pagetitle'=>$room->hostel->name. " Room .".$room->room_number]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Room  $room
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Room $room)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Room  $room
     * @return \Illuminate\Http\Response
     */
    public function destroy(Room $room)
    {
        $room->beds()->delete();
        $room->delete();
    }
}
