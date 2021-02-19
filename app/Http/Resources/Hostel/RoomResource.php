<?php


    namespace App\Http\Resources\Hostel;


    use Illuminate\Http\Resources\Json\JsonResource;

    class RoomResource extends JsonResource
    {
        public function toArray($request)
        {
            return [
                'id' => $this->id,
                'hostel_id' => $this->hostel_id,
                'hostel' => $this->hostel->name,
                'name' => "Room No : ". $this->room_number,
                'type' => $this->hostel->type,
                'beds' => BedResource::collection($this->beds),
                'bedsCount' => $this->beds()->count(),
                'room_type' => $this->room_type,
                'roomType' => $this->roomTy->title,
                'rate_perbed' => $this->rate_perbed,
                'description' => $this->description,
                'status' => $this->status,
            ];
        }
    }
