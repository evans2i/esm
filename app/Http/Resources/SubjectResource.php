<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class SubjectResource extends JsonResource
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
            'title' => $this->title, 
            'code' => $this->code, 
            'full_mark_theory' => $this->full_mark_theory, 
            'pass_mark_theory' => $this->pass_mark_theory,
            'full_mark_practical' => $this->full_mark_practical,
            'pass_mark_practical' => $this->pass_mark_practical,
            'label' => $this->title. " - ".$this->code ];
    }
}
