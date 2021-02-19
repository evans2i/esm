<?php

namespace App\Http\Resources\Examination;

use Illuminate\Http\Resources\Json\JsonResource;

class ExaminationScheduleResource extends JsonResource
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
            'faculty' => $this->faculty->faculty, 
            'faculty_code' => $this->faculty_code, 
            'subject'=>$this->subject->title, 
            'semester'=>$this->semester->semester,
            'exam'=>$this->exam->title,
            'month'=>$this->month->title,
            'year'=>$this->year->title,
            'date'=>$this->date,
            'start_time'=>$this->start_time,
            'end_time'=>$this->end_time,
            'status'=>$this->status,
            'sorting_order'=>$this->sorting_order,
            'publish_status'=>$this->publish_status,
        ];

    }
}
