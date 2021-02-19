<?php

namespace App\Http\Resources\Marks;

use Illuminate\Http\Resources\Json\JsonResource;

class StudentMarkResource extends JsonResource
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
            'student_id' => $this->id, 
            'reg_no' => $this->reg_no,
            'name' => $this->first_name." ".$this->middle_name." ".$this->last_name ,
        ];
    }
}
