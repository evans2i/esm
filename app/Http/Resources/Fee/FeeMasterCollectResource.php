<?php

namespace App\Http\Resources\Fee;

use Illuminate\Http\Resources\Json\JsonResource;

class FeeMasterCollectResource extends JsonResource
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
            'student' =>$this->student->first_name." ".$this->student->middle_name." ".$this->student->last_name,
            'fee_due_date' => $this->fee_due_date,
            'faculty' => $this->faculty->faculty, 
            'semester' => $this->semester->semester,
            'faculty_id' => $this->faculty_id, 
            'semester_id' => $this->semester_id,
            'toggle' => $this->toggle,
            'year' => $this->year->title,
            'fee_amount' => $this->fee_amount,
            'discount' => $this->feeCollection()->sum('discount'),
            'fine' => $this->feeCollection()->sum('fine'),
            'balance' => $this->fee_amount - ($this->feeCollection()->sum('paid_amount') + $this->feeCollection()->sum('discount')) + $this->feeCollection()->sum('fine'),
            'paid' => $this->feeCollection()->sum('paid_amount'),
            'remark' => $this->fee_amount > $this->feeCollection()->sum('paid_amount') ?"Due":"Paid",
            'fees' =>$this->feeCollection,
            'fee_head' => $this->feeHead->fee_head_title,
            'batch' => $this->student->batch
        ];
    }
}
