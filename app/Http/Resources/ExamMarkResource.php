<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class ExamMarkResource extends JsonResource
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
            'faculty' => $this->examSchedule->faculty->faculty, 
            'subject'=>$this->examSchedule->subject->title, 
            'semester'=>$this->examSchedule->semester->semester,
            'exam'=>$this->examSchedule->exam->title,
            'month'=>$this->examSchedule->month->title,
            'year'=>$this->examSchedule->year->title,
            'name' => $this->students->first_name ." " .$this->students->middle_name ." " .$this->students->last_name, 
            'reg_no' => $this->students->reg_no, 
            'obtain_mark_theory'=>$this->obtain_mark_theory, 
            'obtain_mark_practical'=>$this->obtain_mark_practical,
            'absent_theory'=>$this->absent_theory,
            'absent_practical'=>$this->absent_practical,
            'status'=>$this->status,
        ];
    }
}
