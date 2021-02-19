<?php

namespace App\Http\Resources\Fee;

use Illuminate\Http\Resources\Json\JsonResource;

class StudentFeeMaterResource extends JsonResource
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
            'student_id' => $this->student->id,
            'name' =>$this->student->first_name." ".$this->student->middle_name." ".$this->student->last_name, 
            'faculty_id' => $this->faculty_id, 
            'semester_id' => $this->semester_id,
            'faculty' => $this->faculty->faculty, 
            'semester' => $this->semester->semester,
            'reg_no' => $this->student->reg_no, 
            'fee_head_id' => $this->fee_head_id,
            'fee_head' => $this->feeHead->fee_head_title,
            'batch' => $this->student->batch
        ];
    }
}
