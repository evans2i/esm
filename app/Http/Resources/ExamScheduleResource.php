<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class ExamScheduleResource extends JsonResource
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
            'years_id' => $this->years_id,
            'months_id' => $this->months_id,
            'exams_id' => $this->exams_id,
            'faculty_id' => $this->faculty_id,
            'semesters_id' => $this->semesters_id,
            'subjects_id' => $this->subjects_id,
            'faculty' => $this->faculty->faculty, 
            'faculty_code' => $this->faculty_code, 
            'subject'=>$this->subject->title, 
            'semester'=>$this->semester->semester,
            'exam'=>$this->exam->title,
            'month'=>$this->month->title,
            'year'=>$this->year->title,
            'status'=>$this->status,
            'publish_status'=>$this->publish_status,
        ];

    }
}
