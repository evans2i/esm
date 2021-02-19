<?php

namespace App\Http\Resources\Fee;

use Illuminate\Http\Resources\Json\ResourceCollection;

class FeeDataResource extends ResourceCollection
{
    /**
     * Transform the resource collection into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return [ 
            'id' => $this->id,
            'student_id' => $this->student_id, 
            'fee_master_id' => $this->fee_master_id, 
            'payment_no' => $this->payment_no,
            'date' => $this->date,
            'paid_amount' => $this->paid_amount, 
            'discount' => $this->discount,
            'accountant' =>$this->userCreate->name,
            'fine' => $this->fine,
            'note' => $this->note,
            'payment_mode' => $this->payment_mode,
            'response' => $this->response,
            'receipt_no' => $this->receipt_no,
            'status' => $this->status,
        ];
    }
}
