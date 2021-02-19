<?php

namespace App\Http\Controllers\Hostels;

use App\Http\Controllers\Controller;
use App\Http\Resources\Hostel\BedResource;
use App\Http\Resources\Hostel\HostelResource;
use App\Http\Resources\Hostel\RoomResource;
use App\Models\Bed;
use App\Models\BedStatus;
use App\Models\Hostel;
use App\Models\Room;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class BedController extends Controller
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
        $bedstatus = BedStatus::where('title','available')->first();
        $bed_status = $bedstatus->id;
            if(!$bed_status){
                $bed_status = 1;
            }
            $room = Room::find($request->room_id);
            $itarate = $request->end - $request->start;
            for ($i=0; $i<= $itarate; $i++){

                $check = Bed::where('hostel_id',$request->hostel_id)->where('room_id', $request->room_id)->where('bed_number',($request->start + $i))->first();
                if (!$check){
                    $room->beds()->create([
                        'hostel_id' => $request->hostel_id,
                        'bed_number' => ($request->start + $i),
                        'bed_status' => $bed_status,
                        'created_by' => Auth::id(),
                    ]);
                }
            }
        $van = new RoomResource(Room::find($request->room_id));
        return  response()->json($van);

    }


    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Bed  $bed
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Bed $bed)
    {
        if ($request->has('status')){
            $bed->bed_status = $request->status;
            $bed->update();
        }
        return  response()->json(new BedResource($bed));

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Bed  $bed
     * @return \Illuminate\Http\Response
     */
    public function destroy(Bed $bed)
    {
        $bed->delete();
    }
}
