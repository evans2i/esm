<?php

namespace App\Http\Resources\Students;

use Illuminate\Http\Resources\Json\JsonResource;

class StudentResource extends JsonResource
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
            'name' =>$this->first_name." ".$this->middle_name." ".$this->last_name, 
            'faculty' => $this->faculty, 
            'gender' => $this->gender,
            'email' => $this->email,
            'semester' => $this->semester,
            'facultyName' => $this->facultyData->faculty, 
            'semesterName' => $this->semesterData->semester,
            'reg_no' => $this->reg_no, 
            'batch' => $this->batch,
            'date_of_birth' => $this->date_of_birth,
            'gender' => $this->gender,
            'studentBatch' => $this->studentBatch->title,
        ];
    }
}
