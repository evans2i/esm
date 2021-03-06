<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class FacultyResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return [ 'id' => $this->id, 'faculty' => $this->faculty, 'faculty_code' => $this->faculty_code, 'label' => $this->faculty. " - ".$this->faculty_code ];
    }
}
