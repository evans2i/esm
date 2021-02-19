<?php


    namespace App\Http\Resources\Hostel;


    use Illuminate\Http\Resources\Json\JsonResource;

    class BedResource extends JsonResource
    {
        public function toArray($request)
        {
            return [
                'id' => $this->id,
                'hostel_id' => $this->hostel_id,
                'hostel' => $this->hostel->name,
                'room_id' => $this->room_id,
                'room' => "Room No : ".$this->room->room_number,
                'type' => $this->type,
                'name' => "Bed No : ".$this->bed_number,
                'bed_number' => $this->bed_number,
                'bed_status' => $this->bed_status,
                'bedStatus' => $this->bedSta->title,
                'status' => $this->status,
            ];
        }
    }
