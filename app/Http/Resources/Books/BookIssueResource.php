<?php

namespace App\Http\Resources\Books;

use App\Models\Staff;
use App\Models\Student;
use Illuminate\Http\Resources\Json\ResourceCollection;

class BookIssueResource extends ResourceCollection
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
            'member_id' => $this->member_id,  
            'memberType' => $this->libMember->libCirculation->user_type,
            'member' => $this->libMember->libCirculation->user_type =='Student'? Student::find($this->member_id): Staff::find($this->member_id),
            'book_id' => $this->book_id, 
            'book' => $this->libBooks->book_code, 
            'issued_on' => $this->issued_on, 
            'due_date' => $this->due_date,
            'status' => $this->status,
            'return_date' => $this->return_date  
        ];
    }
}
