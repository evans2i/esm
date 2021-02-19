<?php

namespace App\Http\Resources\Hostel;

use Illuminate\Http\Resources\Json\JsonResource;

class ResidentResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'hostel_id' => $this->hostel_id,
            'hostel' => $this->hostel->name,
            'room_id' => $this->room_id,
            'room' => $this->room_id? "Room No : ". $this->room->room_number :null,
            'bed_id' => $this->bed_id,
            'bed' => $this->bed_id? "Bed No : ". $this->bed->bed_number  : null,
            'student' => $this->student->first_name." ".$this->student->middle_name." ".$this->student->last_name ,
            'reg_no' => $this->student->reg_no,
            'type' => $this->hostel_id? $this->hostel->type:null,
            'room_type' => $this->room_type,
            'roomType' => $this->room_id? $this->room->roomTy->title:null,
            'rate_perbed' => $this->rate_perbed,
            'description' => $this->description,
            'register_date' => $this->register_date,
            'leave_date' => $this->leave_date,
            'status' => $this->status,
        ];
    }
}
