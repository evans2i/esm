<?php

namespace App\Http\Resources\Academic;

use Illuminate\Http\Resources\Json\JsonResource;

class AssigmentResource extends JsonResource
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
            'year_id' => $this->year_id,
            'year' => $this->year->title,
            'faculty' => $this->faculty->faculty,
            'faculty_id' => $this->faculty_id,
            'faculty_code' => $this->faculty->faculty_code,
            'semester_id' => $this->semester_id,
            'semester' => $this->semester->semester,
            'subject_id' => $this->subject_id,
            'subject' => $this->subject->title,
            'publish_date' => $this->publish_date,
            'end_date' => $this->end_date,
            'title' => $this->title,
            'description' => $this->description,
            'file' => $this->file,
            'status' => $this->status,
        ];
    }
}
