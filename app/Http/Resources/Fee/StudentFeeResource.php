<?php

namespace App\Http\Resources\Fee;

use Illuminate\Http\Resources\Json\JsonResource;

class StudentFeeResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return [ 'id' => $this->id, 'check' => false,
                 'name' =>$this->first_name." ".$this->middle_name." ".$this->last_name, 
                 'faculty' => $this->faculty, 'semester' => $this->semester,
                 'facultyName' => $this->facultyData->faculty, 
                 'semesterName' => $this->semesterData->semester,
                  'reg_no' => $this->reg_no, 'batch' => $this->batch
        ];

    }
}
