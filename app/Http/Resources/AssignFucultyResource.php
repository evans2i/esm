<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class AssignFucultyResource extends JsonResource
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
            'staff_id' => $this->staff_id,
            'faculty_id' => $this->faculty_id,
            'year_id' => $this->year_id,
            'year' => $this->year->title,
            'staff' => $this->staff->first_name ." ".$this->staff->last_name,
            'faculty' => $this->faculty->faculty,
            'faculty_code' => $this->faculty->faculty_code,
            'status' => $this->status,
        ];
    }
}
