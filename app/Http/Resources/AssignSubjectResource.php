<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class AssignSubjectResource extends JsonResource
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
            'subject_id' => $this->subject_id,
            'semester_id' => $this->semester_id,
            'year_id' => $this->year_id,
            'year' => $this->year->title,
            'staff' => $this->staff->first_name ." ".$this->staff->last_name,
            'semester' => $this->semester->semester,
            'subject' => $this->subject->title,
            'faculty_code' => $this->faculty->faculty_code,
            'faculty' => $this->faculty->faculty,
        ];
    }
}
