<?php

namespace App\Http\Resources\Marks;

use Illuminate\Http\Resources\Json\JsonResource;

class MarkStudentResource extends JsonResource
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
            'student_id' => $this->student_id,
            'name' => $this->student->first_name ." " .$this->student->middle_name ." " .$this->student->last_name,
            'exam_id' => $this->examSchedule->exams_id,
            'reg_no' => $this->student->reg_no,
            'obtain_mark_theory'=>$this->obtain_mark_theory,
            'obtain_mark_practical'=>$this->obtain_mark_practical,
            'obtained' => (int)$this->obtain_mark_theory + (int)$this->obtain_mark_practical,
            'absent_theory'=>$this->absent_theory,
            'absent_practical'=>$this->absent_practical,
            'status'=>$this->status,
        ];
    }
}
