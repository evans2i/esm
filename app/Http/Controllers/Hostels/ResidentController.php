<?php

namespace App\Http\Controllers\Hostels;

use App\Http\Controllers\Controller;
use App\Http\Resources\Hostel\BedResource;
use App\Http\Resources\Hostel\HostelResource;
use App\Http\Resources\Hostel\ResidentResource;
use App\Http\Resources\Hostel\RoomResource;
use App\Http\Resources\NameResource;
use App\Http\Resources\TitleResource;
use App\Models\Bed;
use App\Models\BedStatus;
use App\Models\Hostel;
use App\Models\Resident;
use App\Models\Room;
use App\Models\RoomType;
use App\Models\Staff;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Inertia\Inertia;

class ResidentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $vans['residents'] = ResidentResource::collection(Resident::where('leave_date', null)->limit(100)->get());
        $vans['hostels'] = HostelResource::collection(Hostel::Active()->get());
        return Inertia::render('Hostels/Resident', ['vans'=>$vans,'urls'=>"/hostel/residents", 'pagetitle'=>"Resident"]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $error['status'] = false;
        $hostel = Hostel::find($request->hostel_id);
        $check = Resident::where('room_id', $request->room_id)
                            ->where('hostel_id', $request->hostel_id)
                            ->where('bed_id', $request->bed_id)
                            ->where('leave_date', null)
                            ->Active()
                            ->latest()->first();


        if(!$check){
            $available = Resident::where('student_id', $request->student_id)->where('leave_date', null)->latest()->first();
            $error['status'] = false;
            if (!$available){
                $data = $hostel->residents()->create([
                    'room_id' => $request->room_id,
                    'register_date' => Carbon::now(),
                    'bed_id' => $request->bed_id,
                    'student_id' => $request->student_id,
                ]);
            }elseif($available){
                $status = $available->status;
                if($status == "in-active"){
                    $data = $available->update([
                        'hostel_id' => $request->hostel_id,
                        'room_id' => $request->room_id,
                        'register_date' => Carbon::now(),
                        'bed_id' => $request->bed_id,
                        'student_id' => $request->student_id,
                    ]);
                }else{
                    $data = $available;
                    $error['status'] = true;
                    $error['message'] = "Hello, Sorry " . $available->student->first_name ." ".$available->student->last_name." has \n". $available->hostel->name. " Room No".$available->room->room_number." Bed No ".$available->bed->bed_number;
                }

            }
            $bed = Bed::find($request->bed_id);
            $bed = $bed->update(['bed_status'=> 2]);
        }else{
            $error['status'] = true;
            $error['message'] = "Hello, Sorry Bed  is  Taken By " . $check->student->first_name ." ".$check->student->last_name;
            $data = $check;

        }
        $data = new ResidentResource($data);
        return response()->json([$data,$error]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Resident  $resident
     * @return \Illuminate\Http\Response
     */
    public function show(Resident $resident)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param Request $request
     * @return \Illuminate\Http\Response
     */
    public function findResident(Request $request)
    {
        $data = [];
        $hostel = $request->hostel_id ? $request->hostel_id:null;
        $room = $request->room_id ? $request->room_id:null;
        $bed = $request->bed_id?$request->bed_id:null;
        if ($room !== null && $bed !== null){
            $data = ResidentResource::collection(Resident::where('hostel_id',$hostel)->where('room_id',$room)->where('bed_id',$bed)->Active()->get());
        }
        elseif ($room !== null){
            $data = ResidentResource::collection(Resident::where('hostel_id',$hostel)->where('room_id',$room)->Active()->get());
        }else{
            $data = ResidentResource::collection(Resident::where('hostel_id',$hostel)->Active()->get());
        }
        return response()->json($data);

    }
    public function findRooms($hostel=null)
    {
        $data = RoomResource::collection(Room::where('hostel_id',$hostel)->Active()->get());
        return response()->json($data);
    }
    public function findBeds($hostel=null, $room= null)
    {
        $data = BedResource::collection(Bed::where('hostel_id',$hostel)->where('room_id',$room)->where('bed_status',1)->get());
        return response()->json($data);
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Resident  $resident
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Resident $resident)
    {
        $bed = Bed::find($resident->bed_id);
        if ($bed){
            $bed = $bed->update(['bed_status'=> 1]);
        }

        if ($request->has('hostel_id')){
            $resident->hostel_id = $request->hostel_id;
        }
        if ($request->has('room_id')){
            $resident->room_id = $request->room_id;
        }
        if ($request->has('bed_id')){
            $resident->bed_id = $request->bed_id;
            $bed = Bed::find($request->bed_id);
            $bed->update(['bed_status'=> 2]);
        }
        $resident->update();
        $data = new ResidentResource($resident);
        return response()->json($data);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Resident  $resident
     * @return \Illuminate\Http\Response
     */
    public function destroy(Resident $resident)
    {
        $bed = Bed::find($resident->bed_id);
        $bed = $bed->update(['bed_status'=> 1]);

        $resident->delete();
    }

    public function leaveResident($id)
    {
        $data = Resident::find($id);
        $bed = Bed::find($data->bed_id);
        $bed = $bed->update(['bed_status'=> 1]);
        $data = $data->update([
            'room_id' => null,
            'bed_id' => null,
            'status' => 0,
        ]);
        $data = new ResidentResource(Resident::find($id));
        return response()->json($data);
    }

    public function finalResident($id)
    {
        $data = Resident::find($id);
        $bed = Bed::find($data->bed_id);
        $bed = $bed->update(['bed_status'=> 1]);
        $data = $data->update([
            'room_id' => null,
            'bed_id' => null,
            'leave_date' => Carbon::now(),
            'status' => 0,
        ]);
    }
}
