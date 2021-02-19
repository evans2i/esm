<?php


    namespace App\Http\Resources\Hostel;


    use App\Models\RoomType;
    use Illuminate\Http\Resources\Json\JsonResource;

    class HostelResource extends JsonResource
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
                'name' => $this->name,
                'type' => $this->type,
                'address' => $this->address,
                'contact_detail' => $this->contact_detail,
                'staff' => $this->staff->first_name ." ".$this->staff->last_name,
                'staff_id' => $this->warden,
                'warden_contact' => $this->warden_contact,
                'description' => $this->description,
                'roomsCount' => $this->rooms->count(),
                'bedsCount' => $this->beds->count(),
                'status' => $this->status,
            ];
        }
    }
